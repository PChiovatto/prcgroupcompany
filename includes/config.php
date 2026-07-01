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
define('BUSINESS_HOURS', 'Mon–Sat, 8AM–6PM');
define('SITE_URL',       'https://www.prcgroupcompany.com');

// Where lead/booking emails are delivered (override with LEAD_EMAIL env var).
define('BUSINESS_EMAIL', getenv('LEAD_EMAIL') ?: 'info@prcgroupcompany.com');

// "From" address for outgoing mail — use an address on YOUR domain.
define('FROM_EMAIL',     getenv('SMTP_FROM') ?: 'no-reply@prcgroupcompany.com');

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
