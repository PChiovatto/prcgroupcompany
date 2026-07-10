<?php
/**
 * Email helper for PRC Group.
 *
 * If SMTP_HOST is configured (via env vars), mail is sent over SMTP using a
 * small, dependency-free client (native streams + OpenSSL). Otherwise it falls
 * back to PHP mail(). No Composer / PHPMailer required.
 */

require_once __DIR__ . '/config.php';

/**
 * Public entry point.
 *
 * @param string   $to       Recipient address.
 * @param string   $subject  Subject line (UTF-8 ok).
 * @param string[] $lines    Body lines (joined with CRLF).
 * @param string   $replyTo  Optional Reply-To address.
 * @return bool
 */
function send_mail($to, $subject, array $lines, $replyTo = null) {
    if (SMTP_HOST !== '') {
        return smtp_send($to, $subject, $lines, $replyTo);
    }
    return native_mail($to, $subject, $lines, $replyTo);
}

/** Fallback: PHP mail(). */
function native_mail($to, $subject, array $lines, $replyTo = null) {
    $body    = implode("\r\n", $lines);
    $headers = [];
    $headers[] = 'From: ' . BUSINESS_NAME . ' <' . FROM_EMAIL . '>';
    if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
        $headers[] = 'Reply-To: ' . $replyTo;
    }
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/plain; charset=UTF-8';
    $encSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
    $ok = @mail($to, $encSubject, $body, implode("\r\n", $headers));
    if (!$ok) {
        $GLOBALS['SMTP_LAST_ERROR'] = 'PHP mail() failed - no mail server in this container; configure SMTP env vars';
    }
    return $ok;
}

/** Build the RFC 5322 message (headers + dot-stuffed body). */
function build_message($to, $subject, array $lines, $replyTo = null) {
    $encSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
    $encName    = '=?UTF-8?B?' . base64_encode(BUSINESS_NAME) . '?=';

    $msg = [];
    $msg[] = 'Date: ' . date('r');
    $msg[] = 'From: ' . $encName . ' <' . FROM_EMAIL . '>';
    $msg[] = 'To: <' . $to . '>';
    $msg[] = 'Subject: ' . $encSubject;
    if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
        $msg[] = 'Reply-To: ' . $replyTo;
    }
    $msg[] = 'MIME-Version: 1.0';
    $msg[] = 'Content-Type: text/plain; charset=UTF-8';
    $msg[] = 'Content-Transfer-Encoding: 8bit';
    $msg[] = '';
    foreach ($lines as $line) {
        $line = rtrim((string) $line, "\r\n");
        if (isset($line[0]) && $line[0] === '.') {
            $line = '.' . $line; // dot-stuffing
        }
        $msg[] = $line;
    }
    return implode("\r\n", $msg);
}

/** Minimal SMTP sender. Returns true only if the server accepts the message. */
function smtp_send($to, $subject, array $lines, $replyTo = null) {
    $secure = strtolower(SMTP_SECURE);
    $port   = (int) SMTP_PORT;
    $remote = ($secure === 'ssl' ? 'ssl://' : '') . SMTP_HOST . ':' . $port;

    $ctx = stream_context_create(['ssl' => [
        'verify_peer'       => true,
        'verify_peer_name'  => true,
        'SNI_enabled'       => true,
    ]]);

    $fp = @stream_socket_client($remote, $errno, $errstr, 20, STREAM_CLIENT_CONNECT, $ctx);
    if (!$fp) {
        $GLOBALS['SMTP_LAST_ERROR'] = "connect -> $errno $errstr ($remote)";
        error_log("SMTP connect failed: $errno $errstr");
        return false;
    }
    stream_set_timeout($fp, 20);

    $read = function () use ($fp) {
        $data = '';
        while (($line = fgets($fp, 515)) !== false) {
            $data .= $line;
            // A space at position 3 marks the final line of a reply.
            if (strlen($line) < 4 || $line[3] === ' ') break;
        }
        return $data;
    };
    $code = function ($resp) { return (int) substr((string) $resp, 0, 3); };
    $cmd  = function ($line) use ($fp, $read) { fwrite($fp, $line . "\r\n"); return $read(); };
    $fail = function ($step, $resp = '') use ($fp) {
        $GLOBALS['SMTP_LAST_ERROR'] = trim($step . ' -> ' . trim((string) $resp));
        error_log('SMTP fail at ' . $GLOBALS['SMTP_LAST_ERROR']);
        @fwrite($fp, "QUIT\r\n"); @fclose($fp); return false;
    };

    $resp = $read();
    if ($code($resp) !== 220) return $fail('greeting', $resp);

    $ehloHost = $_SERVER['SERVER_NAME'] ?? 'localhost';
    $resp = $cmd('EHLO ' . $ehloHost);
    if ($code($resp) !== 250) return $fail('EHLO', $resp);

    if ($secure === 'tls') {
        $resp = $cmd('STARTTLS');
        if ($code($resp) !== 220) return $fail('STARTTLS', $resp);
        if (!stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) return $fail('TLS handshake');
        $resp = $cmd('EHLO ' . $ehloHost);
        if ($code($resp) !== 250) return $fail('EHLO after TLS', $resp);
    }

    if (SMTP_USER !== '') {
        $resp = $cmd('AUTH LOGIN');
        if ($code($resp) !== 334) return $fail('AUTH LOGIN', $resp);
        $resp = $cmd(base64_encode(SMTP_USER));
        if ($code($resp) !== 334) return $fail('AUTH user', $resp);
        $resp = $cmd(base64_encode(SMTP_PASS));
        if ($code($resp) !== 235) return $fail('AUTH password (wrong or not an App Password?)', $resp);
    }

    $resp = $cmd('MAIL FROM:<' . FROM_EMAIL . '>');
    if ($code($resp) !== 250) return $fail('MAIL FROM', $resp);
    $resp = $cmd('RCPT TO:<' . $to . '>');
    $rcpt = $code($resp);
    if ($rcpt !== 250 && $rcpt !== 251) return $fail('RCPT TO', $resp);
    $resp = $cmd('DATA');
    if ($code($resp) !== 354) return $fail('DATA', $resp);

    $message = build_message($to, $subject, $lines, $replyTo);
    fwrite($fp, $message . "\r\n.\r\n");
    $ok = $code($read()) === 250;

    @fwrite($fp, "QUIT\r\n");
    @fclose($fp);
    return $ok;
}
