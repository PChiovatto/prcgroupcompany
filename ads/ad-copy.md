# PRC Group — Ad Copy Kit

Painting · Carpentry · Remodeling — Massachusetts
Phone **(781) 520-8245** · Site **prcgroupcompany.com**

Copy is written to fit each platform's character limits. Pair it with the
creatives in [`exports/`](exports/). Landing page suggestions: home page for
brand campaigns, or a service page (`interior-painting.php`,
`home-remodeling.php`, etc.) for tightly-themed ad sets.

---

## 1. Google Ads — Responsive Search Ad (RSA)

**Headlines** (≤ 30 characters — add up to 15):

| # | Headline | Chars |
|---|----------|-------|
| 1 | Painting, Carpentry, Remodel | 28 |
| 2 | Free Estimates in 1 Day | 23 |
| 3 | Licensed & Insured Pros | 23 |
| 4 | MA's 5-Star Contractor | 22 |
| 5 | Interior & Exterior Paint | 25 |
| 6 | Kitchen & Bath Remodeling | 25 |
| 7 | Custom Carpentry & Trim | 23 |
| 8 | Get Your Free Quote Today | 25 |
| 9 | Clean, On-Time, Done Right | 26 |
| 10 | Trusted Local Contractor | 24 |
| 11 | Whole-Home Renovations | 22 |
| 12 | Workmanship Warranty | 20 |
| 13 | Serving All of Massachusetts | 28 |
| 14 | Book a Free Consultation | 24 |
| 15 | Transform Your Home | 19 |

**Descriptions** (≤ 90 characters — add up to 4):

1. One trusted local team for painting, carpentry & remodeling across Massachusetts.
2. Licensed & insured. Free written estimates. Clean crews. Backed by a warranty.
3. From an accent wall to a full renovation — done on time, done right. Call today.
4. Kitchens, baths & full-room remodels, managed end to end. Get your free quote.

**Callout extensions:** Free Written Estimates · Licensed & Insured · Clean &
Respectful Crews · Workmanship Warranty · Since 2017 · On-Time Delivery

**Sitelink extensions:**
- Interior Painting → `interior-painting.php`
- Home Remodeling → `home-remodeling.php`
- Finish Carpentry → `finish-carpentry.php`
- Instant Quote Tool → `tools.php#calc-section`

**Suggested keyword themes:** house painters near me · interior painting [city] MA ·
kitchen remodeling contractor · bathroom renovation MA · finish carpentry ·
crown molding installation · home remodeling contractor near me

---

## 2. Facebook & Instagram — Feed / Reels / Stories

**Campaign objective:** Leads (form) or Traffic to the site.
**CTA button:** *Get Quote* (or *Book Now* for the remodeling angle).

### Ad A — Brand / all-services (pair with `social-1080x1080-remodel`)

**Primary text:**
> Your home deserves a team that shows up on time, works clean, and finishes right. 🛠️
> PRC Group handles it all — interior & exterior painting, carpentry and full remodels — across Massachusetts.
> ✅ Licensed & insured ✅ Free written estimate ✅ Workmanship warranty
> 👉 Get your FREE estimate today.

**Headline:** Painting · Carpentry · Remodeling
**Description:** Free estimate · Licensed & insured

### Ad B — Remodeling angle (pair with `social-1080x1350-bathroom`)

**Primary text:**
> Thinking about a kitchen or bathroom remodel? 🏡
> From demo to the final coat of paint, PRC Group manages the whole project — clear written pricing, one accountable crew, finished on schedule.
> Remodels that actually add value to your home.
> 👉 Book a free consultation today.

**Headline:** Remodels That Add Real Value
**Description:** Kitchens · Baths · Full renovations

### Ad C — Painting angle (pair with `social-1080x1920-painting`)

**Primary text:**
> A fresh coat changes everything. 🎨
> Premium paints, razor-sharp lines and crews that respect your home — interior or exterior. We prep it right so it lasts for years, not months.
> Serving homeowners across Massachusetts since 2017.
> 👉 Get your FREE estimate today.

**Headline:** A Fresh Look — In Days, Not Weeks
**Description:** Interior & exterior painting

### Ad D — Carpentry angle (pair with `social-1080x1350-carpentry`)

**Primary text:**
> It's the details that make a house feel custom. 🔨
> Crown molding, wainscoting, built-ins, custom trim and solid decks — finish and general carpentry with a flawless fit, every time.
> 👉 Tell us about your project for a free estimate.

**Headline:** Craftsmanship In Every Detail
**Description:** Finish & general carpentry

**Short caption (Reels / Stories overlay):**
> Painting · Carpentry · Remodeling in MA ✨ Free estimate → link in bio 📞 (781) 520-8245

---

## 3. Creative → Placement map

| File | Size | Best placement |
|------|------|----------------|
| `social-1080x1080-remodel.png` | 1080×1080 | FB & IG feed (square), Google 1200×1200 display |
| `social-1080x1350-bathroom.png` | 1080×1350 | IG & FB feed (portrait — most screen space) |
| `social-1080x1350-carpentry.png` | 1080×1350 | IG & FB feed (portrait) |
| `social-1080x1920-painting.png` | 1080×1920 | IG/FB Stories & Reels, TikTok |
| `social-1200x628-exterior.png` | 1200×628 | FB link ad, Google Display 1200×628 |
| `google-300x250-remodel.png` | 300×250 | Google Display — Medium Rectangle |
| `google-300x600-painting.png` | 300×600 | Google Display — Half Page |
| `google-728x90-exterior.png` | 728×90 | Google Display — Leaderboard |

---

## 4. Compliance quick-notes

- **Meta text-in-image** is no longer a hard rejection, but keep text under ~20%
  of the image for best delivery — all creatives here are well within that.
- Keep claims truthful: "Licensed & Insured", "5-Star Rated" and "Since 2017"
  should match your actual license, reviews and founding year.
- Story/Reel safe zone: the phone number sits low on `social-1080x1920` — if the
  IG UI overlaps it, the CTA + logo still read clearly. A version with the CTA
  raised can be generated from `build/gen.js` if needed.
