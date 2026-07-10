<?php
/**
 * Mail delivery diagnostic — shows the SMTP configuration state (secrets
 * masked) and attempts a real test send to BUSINESS_EMAIL, reporting the
 * exact SMTP step that fails. Protected by a key.
 *
 *   /api/mailtest.php?key=prc-86albion   (override key with DIAG_KEY env var)
 */
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/mailer.php';

$expected = getenv('DIAG_KEY') ?: 'prc-86albion';
if (!hash_equals($expected, $_GET['key'] ?? '')) {
    http_response_code(404);
    exit;
}

header('Content-Type: application/json; charset=UTF-8');

$config = [
    'deliver_leads_to' => BUSINESS_EMAIL,
    'from_address'     => FROM_EMAIL,
    'smtp_host'        => SMTP_HOST !== '' ? SMTP_HOST : '(EMPTY - falls back to PHP mail(), which does NOT work in this container)',
    'smtp_port'        => SMTP_PORT,
    'smtp_secure'      => SMTP_SECURE,
    'smtp_user'        => SMTP_USER !== '' ? SMTP_USER : '(EMPTY)',
    'smtp_pass'        => SMTP_PASS !== '' ? '(set, ' . strlen(SMTP_PASS) . ' chars)' : '(EMPTY)',
];

$hint = '';
if (SMTP_HOST === '') {
    $hint = 'SMTP_HOST is empty. In Coolify -> Application -> Environment Variables set: '
          . 'SMTP_HOST=smtp.gmail.com, SMTP_PORT=587, SMTP_SECURE=tls, '
          . 'SMTP_USER=prcgrouinc@gmail.com, SMTP_PASS=<16-char Gmail App Password>, then Redeploy.';
} elseif (SMTP_PASS !== '' && strlen(SMTP_PASS) !== 16 && stripos(SMTP_HOST, 'gmail') !== false) {
    $hint = 'SMTP_PASS is ' . strlen(SMTP_PASS) . ' chars - a Gmail App Password is exactly 16. '
          . 'Generate one at myaccount.google.com/apppasswords (requires 2-step verification) '
          . 'and paste it without spaces.';
}

$sent = send_mail(BUSINESS_EMAIL, 'PRC website mail test — ' . date('Y-m-d H:i:s'), [
    'This is a test message from /api/mailtest.php.',
    'If you are reading it in ' . BUSINESS_EMAIL . ', form delivery works.',
]);

echo json_encode([
    'config'    => $config,
    'test_sent' => $sent,
    'error'     => $GLOBALS['SMTP_LAST_ERROR'] ?? '',
    'hint'      => $sent ? 'All good - check the inbox (and spam) of ' . BUSINESS_EMAIL . '.' : $hint,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
