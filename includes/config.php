<?php
/**
 * PRC Group — central site configuration.
 * Business details live here; secrets (SMTP) come from environment variables.
 */

// --- Business identity -------------------------------------------------
define('BUSINESS_NAME',  'PRC Group');
define('BUSINESS_TAG',   'Painting · Carpentry · Remodeling');

define('BUSINESS_PHONE',     '(781) 520-8245');
define('BUSINESS_PHONE_RAW', '+17815208245');
define('BUSINESS_AREA',  'Massachusetts');
define('BUSINESS_FOUNDED', 2017);

// --- Address ------------------------------------------------------------
define('BUSINESS_STREET', '86 Albion St');
define('BUSINESS_CITY',   'Wakefield');
define('BUSINESS_STATE',  'MA');
define('BUSINESS_ZIP',    '01880');
define('BUSINESS_ADDRESS', BUSINESS_STREET . ', ' . BUSINESS_CITY . ', ' . BUSINESS_STATE . ' ' . BUSINESS_ZIP);
define('BUSINESS_HOURS', 'Mon–Sat, 8AM–6PM');
define('SITE_URL',       'https://prcgroupcompany.com');

// --- Google -------------------------------------------------------------
define('GA_MEASUREMENT_ID',  'G-Y43RH8X7K4');
define('CLARITY_PROJECT_ID', 'xh7j23a8m5');
define('GOOGLE_PROFILE_URL', 'https://g.page/r/Cej4IYrzsxhnEAI');
define('GOOGLE_REVIEW_URL',  'https://g.page/r/Cej4IYrzsxhnEAI/review');

// Where lead/booking emails are actually delivered (kept private, not shown on the site).
define('BUSINESS_EMAIL', 'prcgrouinc@gmail.com');

// Public-facing email shown on the site (branded address on your domain).
define('BUSINESS_EMAIL_PUBLIC', 'info@prcgroupcompany.com');

// "From" address for outgoing mail. When sending through Gmail SMTP the From
// must be the authenticated account, so we fall back to SMTP_USER before the
// domain address (Gmail rewrites/rejects a mismatched From otherwise).
define('FROM_EMAIL',     getenv('SMTP_FROM') ?: (getenv('SMTP_USER') ?: 'no-reply@prcgroupcompany.com'));

// Send the customer an automatic confirmation email for bookings?
define('SEND_AUTOREPLY', true);

// --- SMTP (set these as environment variables in Coolify) --------------
// Leave SMTP_HOST empty to fall back to PHP mail().
//   SMTP_SECURE = 'tls'  -> port 587 (STARTTLS, most common)
//   SMTP_SECURE = 'ssl'  -> port 465 (implicit TLS)
define('SMTP_HOST',   getenv('SMTP_HOST')   ?: '');
define('SMTP_PORT',   getenv('SMTP_PORT')   ?: '587');
define('SMTP_USER',   getenv('SMTP_USER')   ?: '');
define('SMTP_PASS',   getenv('SMTP_PASS')   ?: '');
define('SMTP_SECURE', getenv('SMTP_SECURE') ?: 'tls');
