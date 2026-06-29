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
    return @mail($to, $encSubject, $body, implode("\r\n", $headers));
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
    $fail = function () use ($fp) { @fwrite($fp, "QUIT\r\n"); @fclose($fp); return false; };

    if ($code($read()) !== 220) return $fail();

    $ehloHost = $_SERVER['SERVER_NAME'] ?? 'localhost';
    if ($code($cmd('EHLO ' . $ehloHost)) !== 250) return $fail();

    if ($secure === 'tls') {
        if ($code($cmd('STARTTLS')) !== 220) return $fail();
        if (!stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) return $fail();
        if ($code($cmd('EHLO ' . $ehloHost)) !== 250) return $fail();
    }

    if (SMTP_USER !== '') {
        if ($code($cmd('AUTH LOGIN')) !== 334) return $fail();
        if ($code($cmd(base64_encode(SMTP_USER))) !== 334) return $fail();
        if ($code($cmd(base64_encode(SMTP_PASS))) !== 235) return $fail();
    }

    if ($code($cmd('MAIL FROM:<' . FROM_EMAIL . '>')) !== 250) return $fail();
    $rcpt = $code($cmd('RCPT TO:<' . $to . '>'));
    if ($rcpt !== 250 && $rcpt !== 251) return $fail();
    if ($code($cmd('DATA')) !== 354) return $fail();

    $message = build_message($to, $subject, $lines, $replyTo);
    fwrite($fp, $message . "\r\n.\r\n");
    $ok = $code($read()) === 250;

    @fwrite($fp, "QUIT\r\n");
    @fclose($fp);
    return $ok;
}
