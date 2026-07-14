# PRC Group — Ad Creative Kit

Ready-to-run ad creatives for **Google, Facebook & Instagram**, matching the
site's black-and-white brand. Strong-appeal, direct-response layouts built on
the real project photos in `../assets/projects/`.

## What's here

```
ads/
├── index.html          # Visual gallery — open in a browser to preview all creatives
├── ad-copy.md          # Copy kit: Google RSA + Meta primary text, headlines, CTAs
├── exports/            # ✅ Ready-to-upload PNGs (exact ad dimensions)
├── creatives/          # Editable source — self-contained HTML per creative
└── build/              # Generator scripts (regenerate everything)
```

## Creatives (8)

| File | Size | Platform / placement |
|------|------|----------------------|
| `social-1080x1080-remodel` | 1080×1080 | FB & IG feed (square) |
| `social-1080x1350-bathroom` | 1080×1350 | IG & FB feed (portrait) |
| `social-1080x1350-carpentry` | 1080×1350 | IG & FB feed (portrait) |
| `social-1080x1920-painting` | 1080×1920 | IG/FB Stories & Reels |
| `social-1200x628-exterior` | 1200×628 | FB link ad / Google Display |
| `google-300x250-remodel` | 300×250 | Google Display — Medium Rectangle |
| `google-300x600-painting` | 300×600 | Google Display — Half Page |
| `google-728x90-exterior` | 728×90 | Google Display — Leaderboard |

## Use them

1. **Preview:** open `ads/index.html` in a browser.
2. **Upload:** grab the PNGs from `ads/exports/` — they're already at the exact
   pixel sizes each platform expects.
3. **Copy:** paste headlines / primary text from `ads/ad-copy.md`.

## Edit or add creatives

Each creative is a **self-contained HTML file** in `creatives/` (fonts and
photos are inlined, so it renders anywhere with no assets). Edit the text or
swap a photo, then re-export.

To change text/photos in bulk or add a new size, edit `build/gen.js`
(`social[]` / `banners[]` arrays) and regenerate:

```bash
cd ads/build
node gen.js        # rebuild the HTML in ../creatives
python3 shoot.py   # export PNGs to ../exports  (needs Chromium + Pillow)
```

`shoot.py` uses the Chromium at `/opt/pw-browsers` by default; override with
`CHROME=/path/to/chrome python3 shoot.py`.

> Fonts are Plus Jakarta Sans + Manrope (the site's fonts), embedded as base64
> in `build/fonts-embed.css`. Photos are base64-embedded from
> `assets/projects/` via `build/imgs.json`.
