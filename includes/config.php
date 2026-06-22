<?php
/**
 * PRC Group — central site configuration.
 * Change business details here once; the whole site updates.
 */

// --- Business identity -------------------------------------------------
define('BUSINESS_NAME',  'PRC Group');
define('BUSINESS_TAG',   'Painting · Carpentry · Remodeling');

// Where lead/booking emails are delivered:
define('BUSINESS_EMAIL', 'info@prcgroupcompany.com');

// "From" address for outgoing mail. Use an address on YOUR domain
// (e.g. no-reply@prcgroupcompany.com) so it doesn't get marked as spam.
define('FROM_EMAIL',     'no-reply@prcgroupcompany.com');

// Phone — display + tel: link (raw, digits with country code)
define('BUSINESS_PHONE',     '(000) 000-0000');
define('BUSINESS_PHONE_RAW', '+10000000000');

define('BUSINESS_AREA',  'Massachusetts');
define('BUSINESS_HOURS', 'Mon–Sat, 8AM–6PM');
define('SITE_URL',       'https://www.prcgroupcompany.com');

// Send the customer an automatic confirmation email for bookings?
define('SEND_AUTOREPLY', true);
