const fs = require('fs');
const path = require('path');
const SP = __dirname;                          // ads/build
const OUT = path.join(SP, '..', 'creatives');  // ads/creatives
fs.mkdirSync(OUT, { recursive: true });
const fonts = fs.readFileSync(path.join(SP, 'fonts-embed.css'), 'utf8');
const imgs = JSON.parse(fs.readFileSync(path.join(SP, 'imgs.json'), 'utf8'));

const PHONE = '(781) 520-8245';
const SITE = 'prcgroupcompany.com';

// White logo lockup (SVG) sized by height h
function logo(h) {
  return `<svg class="logo" width="${h * 2.55}" height="${h}" viewBox="0 0 255 100" xmlns="http://www.w3.org/2000/svg" aria-label="PRC Group">
    <path d="M50 4 C24 4 4 24 4 50 C4 76 24 96 50 96 C66 96 76 91 80 83 C82 79 83 73 83 66 L83 26 C83 16 80 10 74 7 C70 5 63 4 56 4 Z" fill="none" stroke="#fff" stroke-width="5"/>
    <text x="43" y="65" text-anchor="middle" fill="#fff" font-family="'Plus Jakarta Sans',sans-serif" font-weight="800" font-size="39" letter-spacing="1">PRC</text>
    <text x="103" y="47" fill="#fff" font-family="'Plus Jakarta Sans',sans-serif" font-weight="800" font-size="33" letter-spacing="5">GROUP</text>
    <text x="105" y="76" fill="#fff" font-family="'Manrope',sans-serif" font-weight="700" font-size="13" letter-spacing="4" opacity=".82">EST. 2017</text>
  </svg>`;
}

// Compact wordmark for small banners
function wordmark(color = '#fff') {
  return `<span class="wm"><span class="wm__mark">PRC</span><span class="wm__txt">GROUP</span></span>`;
}

function socialCreative({ w, h, img, eyebrow, headline, sub, cta, badge }) {
  const k = Math.min(w, h) / 1080;          // scale factor
  const pad = Math.round(Math.min(w, h) * 0.072);
  const hl = Math.round((Math.min(w, h) * 0.092) * (w > h ? 0.82 : 1));
  const logoH = Math.round(46 * k * (w > h ? 1.05 : 1));
  const eyeFS = Math.round(21 * k);
  const subFS = Math.round(25 * k);
  const ctaFS = Math.round(27 * k);
  const phoneFS = Math.round(30 * k);
  const badgeFS = Math.round(19 * k);
  const frame = Math.round(10 * k);
  const scrimStop = w > h ? '48%' : '40%';
  return `<!doctype html><html lang="en"><head><meta charset="utf-8">
<style>
${fonts}
*{margin:0;padding:0;box-sizing:border-box}
html,body{margin:0;padding:0}
.ad{position:relative;width:${w}px;height:${h}px;overflow:hidden;
  font-family:'Manrope',sans-serif;background:#000}
.ad__photo{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;filter:saturate(1.02) contrast(1.03)}
.ad__scrim{position:absolute;inset:0;background:
   linear-gradient(180deg, rgba(0,0,0,.55) 0%, rgba(0,0,0,0) 26%, rgba(0,0,0,0) ${scrimStop}, rgba(0,0,0,.72) 78%, rgba(0,0,0,.9) 100%)}
.ad__frame{position:absolute;inset:${Math.round(pad*0.62)}px;border:${frame}px solid rgba(255,255,255,.9);border-radius:${Math.round(6*k)}px;pointer-events:none}
.ad__in{position:absolute;inset:0;display:flex;flex-direction:column;justify-content:space-between;padding:${pad}px}
.top{display:flex;align-items:flex-start;justify-content:space-between;gap:${20*k}px}
.logo{display:block}
.badge{display:inline-flex;align-items:center;gap:${8*k}px;background:#fff;color:#000;
  font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:${badgeFS}px;letter-spacing:.4px;
  padding:${9*k}px ${16*k}px;border-radius:${50*k}px;white-space:nowrap;box-shadow:0 ${8*k}px ${24*k}px rgba(0,0,0,.35)}
.badge .star{color:#000}
.bottom{display:flex;flex-direction:column;gap:${18*k}px}
.eyebrow{display:inline-block;align-self:flex-start;color:#fff;font-family:'Plus Jakarta Sans',sans-serif;
  font-weight:800;font-size:${eyeFS}px;letter-spacing:${3*k}px;text-transform:uppercase;
  border-left:${5*k}px solid #fff;padding-left:${12*k}px;line-height:1.1;opacity:.95}
.hl{color:#fff;font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:${hl}px;line-height:1.02;
  letter-spacing:-.5px;text-shadow:0 ${3*k}px ${28*k}px rgba(0,0,0,.55);max-width:${w>h?'86%':'100%'}}
.sub{color:rgba(255,255,255,.92);font-size:${subFS}px;font-weight:500;line-height:1.35;max-width:${w>h?'70%':'92%'};
  text-shadow:0 ${2*k}px ${14*k}px rgba(0,0,0,.5)}
.ctarow{display:flex;align-items:center;gap:${22*k}px;flex-wrap:wrap;margin-top:${8*k}px}
.cta{display:inline-flex;align-items:center;gap:${10*k}px;background:#fff;color:#000;
  font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:${ctaFS}px;letter-spacing:.3px;
  padding:${16*k}px ${30*k}px;border-radius:${50*k}px;box-shadow:0 ${10*k}px ${30*k}px rgba(0,0,0,.4)}
.cta .arw{font-weight:800}
.phone{color:#fff;font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:${phoneFS}px;letter-spacing:.4px;
  display:inline-flex;align-items:center;gap:${9*k}px;text-shadow:0 ${2*k}px ${12*k}px rgba(0,0,0,.6)}
.phone .ic{font-size:${phoneFS*0.9}px}
</style></head><body>
<div class="ad">
  <img class="ad__photo" src="${imgs[img]}" alt="">
  <div class="ad__scrim"></div>
  <div class="ad__frame"></div>
  <div class="ad__in">
    <div class="top">
      ${logo(logoH)}
      <span class="badge"><span class="star">★</span>${badge}</span>
    </div>
    <div class="bottom">
      <span class="eyebrow">${eyebrow}</span>
      <h1 class="hl">${headline}</h1>
      ${sub ? `<p class="sub">${sub}</p>` : ''}
      <div class="ctarow">
        <span class="cta">${cta} <span class="arw">→</span></span>
        <span class="phone"><span class="ic">✆</span>${PHONE}</span>
      </div>
    </div>
  </div>
</div></body></html>`;
}

// ---- Google display banners (compact) ----
function banner({ w, h, img, headline, cta, orient }) {
  // orient: 'wide' (leaderboard), 'square' (rectangle), 'tall' (halfpage/skyscraper)
  const isWide = orient === 'wide';
  const isTall = orient === 'tall';
  const k = Math.min(w, h) / (isWide ? 90 : isTall ? 600 : 250);
  const scale = isWide ? 1 : isTall ? 1 : 1;
  const hl = isWide ? 22 : isTall ? 35 : 30;
  const ctaFS = isWide ? 15 : isTall ? 21 : 18;
  const wmFS = isWide ? 14 : isTall ? 20 : 17;
  const pad = isWide ? 16 : isTall ? 30 : 24;
  const layout = isWide ? 'row' : 'column';
  return `<!doctype html><html lang="en"><head><meta charset="utf-8"><style>
${fonts}
*{margin:0;padding:0;box-sizing:border-box}
.ad{position:relative;width:${w}px;height:${h}px;overflow:hidden;background:#000;font-family:'Manrope',sans-serif}
.ad__photo{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;filter:contrast(1.04)}
.ad__scrim{position:absolute;inset:0;background:${isWide
   ? 'linear-gradient(90deg, rgba(0,0,0,.86) 0%, rgba(0,0,0,.62) 55%, rgba(0,0,0,.3) 100%)'
   : 'linear-gradient(180deg, rgba(0,0,0,.5) 0%, rgba(0,0,0,.2) 40%, rgba(0,0,0,.82) 100%)'}}
.ad__frame{position:absolute;inset:${Math.round(6)}px;border:3px solid rgba(255,255,255,.9);border-radius:4px;pointer-events:none}
.ad__in{position:absolute;inset:0;display:flex;flex-direction:${layout};align-items:${isWide?'center':'flex-start'};
  justify-content:${isWide?'space-between':'space-between'};gap:${isWide?16:10}px;padding:${pad}px}
.wm{display:inline-flex;align-items:center;gap:8px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;color:#fff}
.wm__mark{background:#fff;color:#000;border-radius:6px;padding:${isWide?2:3}px ${isWide?7:8}px;font-size:${wmFS}px;letter-spacing:.5px}
.wm__txt{font-size:${wmFS}px;letter-spacing:3px}
.b-hl{color:#fff;font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:${hl}px;line-height:1.03;
  letter-spacing:-.3px;text-shadow:0 2px 16px rgba(0,0,0,.6);max-width:${isWide?'52%':'100%'}}
.b-cta{display:inline-flex;align-items:center;gap:7px;background:#fff;color:#000;font-family:'Plus Jakarta Sans',sans-serif;
  font-weight:800;font-size:${ctaFS}px;padding:${isWide?9:11}px ${isWide?16:20}px;border-radius:50px;white-space:nowrap;
  box-shadow:0 6px 18px rgba(0,0,0,.4)}
.b-top{display:flex;flex-direction:column;gap:${isTall?14:8}px}
.b-mid{flex:1;display:flex;align-items:${isTall?'flex-end':'center'}}
.b-bottom{display:flex;align-items:center;justify-content:space-between;gap:10px;width:100%}
.b-phone{color:#fff;font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:${ctaFS}px;text-shadow:0 2px 10px rgba(0,0,0,.7)}
.b-phone2{color:#fff;font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:${ctaFS+1}px;letter-spacing:.3px;margin-top:4px;text-shadow:0 2px 12px rgba(0,0,0,.8)}
</style></head><body>
<div class="ad">
  <img class="ad__photo" src="${imgs[img]}" alt="">
  <div class="ad__scrim"></div>
  <div class="ad__frame"></div>
  ${isWide ? `<div class="ad__in">
    <span class="wm"><span class="wm__mark">PRC</span><span class="wm__txt">GROUP</span></span>
    <div class="b-hl">${headline}</div>
    <span class="b-cta">${cta} →</span>
  </div>` : `<div class="ad__in">
    <div class="b-top">
      <span class="wm"><span class="wm__mark">PRC</span><span class="wm__txt">GROUP</span></span>
      <div class="b-hl">${headline}</div>
      ${isTall ? `<div class="b-phone2">✆ ${PHONE}</div>` : ''}
    </div>
    <div class="b-bottom">
      <span class="b-cta">${cta} →</span>
    </div>
  </div>`}
</div></body></html>`;
}

const social = [
  { file: 'social-1080x1080-remodel', w: 1080, h: 1080, img: 'kitchen',
    eyebrow: 'Kitchens · Baths · Full Renos', headline: 'Your Dream Home,<br>Done Right.',
    sub: 'One trusted local team for painting, carpentry & remodeling across Massachusetts.',
    cta: 'Get a FREE Estimate', badge: 'Licensed &amp; Insured' },
  { file: 'social-1080x1350-bathroom', w: 1080, h: 1350, img: 'bathroom',
    eyebrow: 'Home Remodeling', headline: 'Remodels That Add<br>Real Value.',
    sub: 'Kitchens, bathrooms & full-room renovations — managed end to end, finished on schedule.',
    cta: 'Book a Free Consult', badge: '5★ Rated' },
  { file: 'social-1080x1920-painting', w: 1080, h: 1920, img: 'interior',
    eyebrow: 'Interior & Exterior Painting', headline: 'A Fresh Look<br>In Days —<br>Not Weeks.',
    sub: 'Premium paints, sharp lines, clean crews. We prep it right so it lasts.',
    cta: 'Get a FREE Estimate', badge: 'Licensed &amp; Insured' },
  { file: 'social-1200x628-exterior', w: 1200, h: 628, img: 'exterior',
    eyebrow: 'Exterior Painting · Siding · Carpentry', headline: 'Protect &amp; Beautify Your Home.',
    sub: 'Built for New England weather with proper prep, priming & durable coatings.',
    cta: 'Get a FREE Estimate', badge: 'Licensed &amp; Insured' },
  { file: 'social-1080x1350-carpentry', w: 1080, h: 1350, img: 'trim',
    eyebrow: 'Finish & General Carpentry', headline: 'Craftsmanship In<br>Every Detail.',
    sub: 'Crown molding, built-ins, custom trim & decks — a flawless fit, every time.',
    cta: 'Get a FREE Estimate', badge: '5★ Rated' },
];

const banners = [
  { file: 'google-300x250-remodel', w: 300, h: 250, img: 'kitchen', orient: 'square',
    headline: 'Remodeling Done Right.', cta: 'Free Estimate' },
  { file: 'google-300x600-painting', w: 300, h: 600, img: 'interior', orient: 'tall',
    headline: 'Painting · Carpentry · Remodeling', cta: 'Free Estimate' },
  { file: 'google-728x90-exterior', w: 728, h: 90, img: 'exterior', orient: 'wide',
    headline: 'Transform Your Home — Free Estimate', cta: 'Get Quote' },
];

let manifest = [];
for (const s of social) {
  fs.writeFileSync(path.join(OUT, s.file + '.html'), socialCreative(s));
  manifest.push({ ...s, kind: 'social' });
  console.log('wrote', s.file, `${s.w}x${s.h}`);
}
for (const b of banners) {
  fs.writeFileSync(path.join(OUT, b.file + '.html'), banner(b));
  manifest.push({ ...b, kind: 'banner' });
  console.log('wrote', b.file, `${b.w}x${b.h}`);
}
fs.writeFileSync(path.join(SP, 'manifest.json'), JSON.stringify(manifest.map(m => ({ file: m.file, w: m.w, h: m.h, kind: m.kind })), null, 2));
console.log('DONE', manifest.length, 'creatives');
