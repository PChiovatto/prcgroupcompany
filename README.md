# PRC Group — Company Website

Website for **PRC Group** — painting, carpentry and home remodeling in Massachusetts.

## Stack

- **PHP** (no framework) with shared `includes/` for header/footer
- Plain **CSS + vanilla JS** front-end (no build step, no dependencies)
- Server-side email via PHP `mail()` — contact, instant-quote and booking forms
- Runs on any standard PHP hosting (Apache/Nginx + PHP 7.4+)

## Structure

```
.
├── index.php           # Home (hero, services, about, process, projects, reviews, contact)
├── tools.php           # Interactive tools: quote calculator, color visualizer, before/after
├── booking.php         # Calendar + appointment scheduling
├── includes/
│   ├── config.php      # ALL business details (phone, email, name) — edit here
│   ├── header.php      # Shared <head>, top bar, nav (+ LocalBusiness schema)
│   ├── footer.php      # Shared footer + script loading
│   ├── mailer.php      # send_mail() helper (PHP mail)
│   └── .htaccess       # Blocks direct web access to includes
├── api/
│   └── send.php        # Form handler for contact / quote / booking → email (JSON)
├── css/                # styles.css (core), tools.css, booking.css
├── js/                 # site.js (shared), main.js, tools.js, booking.js
├── assets/             # logo.svg, favicon.svg
├── .htaccess           # Default doc + security headers
├── robots.txt
└── sitemap.xml
```

## Configure (one place)

Open `includes/config.php` and set the real business details:

```php
define('BUSINESS_EMAIL', 'info@prcgroupcompany.com');  // where leads are emailed
define('FROM_EMAIL',     'no-reply@prcgroupcompany.com');
define('BUSINESS_PHONE',     '(000) 000-0000');
define('BUSINESS_PHONE_RAW', '+10000000000');
```

Phone, email and area name flow from here into every page automatically.

## Run locally

Requires PHP installed:

```bash
php -S localhost:8000
# then visit http://localhost:8000
```

> Note: `mail()` usually does nothing on a local machine without a mail server,
> so forms will report an error locally. They work once deployed to PHP hosting.

## Email delivery

Forms post to `api/send.php`, which sends mail server-side via PHP `mail()`.
For best deliverability (avoid spam), use a `FROM_EMAIL` on your own domain.
If your host blocks `mail()` or messages land in spam, swap the body of
`send_mail()` in `includes/mailer.php` for PHPMailer + SMTP — nothing else changes.

## Deploy

Upload all files to your PHP host's web root (e.g. `public_html`) via FTP/SFTP
or Git. Ensure PHP 7.4+ is enabled. No build step required.

## TODO before going live

- [ ] Set real phone / email in `includes/config.php`
- [ ] Confirm `mail()` works on the host (send a test through the contact form)
- [ ] Replace placeholder project photos in the gallery (index + tools)
- [ ] Replace sample testimonials with real reviews
- [ ] Add a real logo file / OG image if desired
