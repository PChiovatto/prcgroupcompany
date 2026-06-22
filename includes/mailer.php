<?php
/**
 * Minimal, dependency-free mail helper using PHP mail().
 *
 * On most shared PHP hosting mail() works out of the box. For more reliable
 * delivery (SPF/DKIM), swap the body of send_mail() for PHPMailer + SMTP —
 * the rest of the site doesn't change.
 */

require_once __DIR__ . '/config.php';

/**
 * Send a plain-text email.
 *
 * @param string   $to       Recipient address.
 * @param string   $subject  Subject line.
 * @param string[] $lines    Body lines (joined with newlines).
 * @param string   $replyTo  Optional Reply-To address.
 * @return bool
 */
function send_mail($to, $subject, array $lines, $replyTo = null) {
    $body = implode("\r\n", $lines);

    $headers   = [];
    $headers[] = 'From: ' . BUSINESS_NAME . ' <' . FROM_EMAIL . '>';
    if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
        $headers[] = 'Reply-To: ' . $replyTo;
    }
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/plain; charset=UTF-8';
    $headers[] = 'X-Mailer: PHP/' . phpversion();

    // The leading "=?UTF-8?B?...?=" keeps accented subjects readable.
    $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

    return @mail($to, $encodedSubject, $body, implode("\r\n", $headers));
}
