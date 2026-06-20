# PRC Group — Company Website

Static marketing website for **PRC Group** — painting, carpentry and home remodeling
in Massachusetts.

## Stack

- Plain **HTML + CSS + JS** (no build step, no dependencies)
- Hosted as a static site (Netlify / Cloudflare Pages / GitHub Pages)
- Contact form via **Netlify Forms** (zero backend) — submissions land in the Netlify dashboard / email

## Structure

```
.
├── index.html        # Single-page site (hero, services, about, process, projects, reviews, contact)
├── tools.html        # Interactive tools: quote calculator, color visualizer, before/after
├── booking.html      # Calendar + appointment scheduling with email dispatch
├── css/styles.css    # Core styles (responsive, mobile-first breakpoints)
├── css/tools.css     # Styles for the tools page
├── css/booking.css   # Styles for the booking page
├── js/main.js        # Nav toggle, scroll header, contact form
├── js/tools.js       # Quote calculator + color visualizer + before/after logic
├── js/booking.js     # Calendar, time slots, email dispatch (Web3Forms)
├── assets/           # logo.svg, favicon.svg
├── robots.txt
├── sitemap.xml
└── netlify.toml      # Netlify config + security headers
```

## Booking emails (Web3Forms — free, no backend)

The booking page (`booking.html`) sends appointment requests by email with **no server**.

1. Go to https://web3forms.com, enter your business email, and copy your **Access Key**.
2. Open `js/booking.js` and set `WEB3FORMS_ACCESS_KEY` to that key.
3. (Optional) In the Web3Forms dashboard, enable the **Autoresponder** so customers
   also get a confirmation email automatically.

Until a real key is set, the booking page runs in **demo mode** (shows the success
screen but does not send an email).

## Run locally

Just open `index.html` in a browser, or serve the folder:

```bash
# Python
python -m http.server 8080
# then visit http://localhost:8080
```

## TODO before going live (placeholders to replace)

- [ ] **Phone:** `(000) 000-0000` → real number (in `index.html`, search `0000000000` and `(000) 000-0000`)
- [ ] **Email:** confirm `info@prcgroupcompany.com`
- [ ] **Service area / city:** currently "Massachusetts"
- [ ] **Project photos:** replace the placeholder gallery tiles with real images
- [ ] **Reviews:** swap sample testimonials for real ones
- [ ] **Logo / OG image:** add `assets/og-image.jpg` and a favicon
- [ ] **Social links:** add Facebook / Instagram if applicable

## Deploy (Netlify, recommended)

1. Connect this GitHub repo in Netlify.
2. Build command: _none_. Publish directory: `.`
3. Add the custom domain `prcgroupcompany.com`.
4. Form submissions appear under **Forms** in the Netlify dashboard.
