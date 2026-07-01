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
define('BUSINESS_PHONE',     '(781) 520-8245');
define('BUSINESS_PHONE_RAW', '+17815208245');
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

## Email delivery (SMTP)

Forms post to `api/send.php` → `includes/mailer.php`. If `SMTP_HOST` is set it
sends over **SMTP** (dependency-free client, supports STARTTLS/SSL + AUTH LOGIN);
otherwise it falls back to PHP `mail()`.

Configure SMTP with environment variables (see `.env.example`). In Coolify:
**Application → Environment Variables**. Never commit real credentials.

```
LEAD_EMAIL   = info@prcgroupcompany.com   # where leads land
SMTP_FROM    = no-reply@prcgroupcompany.com
SMTP_HOST    = smtp.yourprovider.com
SMTP_PORT    = 587                         # 587 = tls, 465 = ssl
SMTP_SECURE  = tls
SMTP_USER    = your-smtp-username
SMTP_PASS    = your-smtp-password
```

Provider quick refs: Gmail (App Password), SendGrid (`SMTP_USER=apikey`),
Mailgun. Examples are in `.env.example`.

## Deploy (Docker / Coolify)

The repo ships a `Dockerfile` (PHP 8.3 + Apache, `mod_rewrite`/`mod_headers`,
`.htaccess` enabled).

- **Coolify:** set the build pack to **Dockerfile**, add the SMTP env vars above,
  exposed port **80**, then deploy. The repo must be reachable (public, or via a
  GitHub App / deploy key for private).
- **Traditional PHP hosting:** alternatively just upload all files to the web
  root (`public_html`); PHP 7.4+. The Dockerfile is ignored in that case.

## TODO before going live

- [ ] Set real phone / email in `includes/config.php`
- [ ] Add SMTP env vars in Coolify and send a test through the contact form
- [ ] Replace placeholder project photos in the gallery (index + tools)
- [ ] Replace sample testimonials with real reviews
- [ ] Add a real logo file / OG image if desired
