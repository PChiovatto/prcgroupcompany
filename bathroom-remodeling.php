<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Bathroom Remodeling in ' . BUSINESS_AREA . ' | ' . BUSINESS_NAME;
$pageDesc  = 'Bathroom remodeling across ' . BUSINESS_AREA . ' — tile, vanities, showers, fixtures and layout changes, managed end to end by ' . BUSINESS_NAME . '. Licensed, insured, free estimates.';
$canonical = SITE_URL . '/bathroom-remodeling.php';
$active    = 'services';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ===== HERO (split with photo) ===== -->
  <section class="ihero-wrap">
    <div class="container ihero">
      <div>
        <nav class="svc-breadcrumb"><a href="index.php">Home</a> / <a href="home-remodeling.php">Home Remodeling</a> / Bathroom Remodeling</nav>
        <h1>Bathroom Remodeling in <?= BUSINESS_AREA ?></h1>
        <p>From a clean refresh to a full gut, <?= BUSINESS_NAME ?> rebuilds bathrooms that look
          sharp and hold up to daily use — tile, vanities, showers and fixtures, waterproofed and
          finished right, by one accountable crew.</p>
        <div class="ihero__actions">
          <a href="index.php#contact" class="btn btn--primary">Get a Free Estimate</a>
          <a href="tools.php#calc-section" class="btn btn--ghost">Instant Quote</a>
        </div>
      </div>
      <figure class="ihero__media">
        <img src="assets/projects/bathroom-renovation-remodeling-massachusetts.jpg"
             alt="Renovated bathroom with white wainscoting, marble-top vanity and new flooring by <?= BUSINESS_NAME ?>" />
        <figcaption class="ihero__chip">Recent bathroom renovation — <?= BUSINESS_AREA ?></figcaption>
      </figure>
    </div>
  </section>

  <!-- ===== WHAT WE DO (grid) ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">What We Handle</span>
        <h2>Every part of the bathroom</h2>
        <p>Waterproofing and prep are where bathrooms succeed or fail — so we never skip them.</p>
      </div>
      <div class="iroom-grid">
        <div class="iroom">Tile &amp; grout<small>Floors, walls and shower surrounds</small></div>
        <div class="iroom">Showers &amp; tubs<small>Custom tile showers, tub-to-shower conversions</small></div>
        <div class="iroom">Vanities &amp; tops<small>Stock or custom, with stone or solid-surface tops</small></div>
        <div class="iroom">Fixtures &amp; plumbing<small>Faucets, toilets, valves — licensed trades</small></div>
        <div class="iroom">Layout changes<small>Move walls and fixtures for a better plan</small></div>
        <div class="iroom">Lighting &amp; ventilation<small>Vanity lighting and proper exhaust fans</small></div>
        <div class="iroom">Wainscoting &amp; trim<small>Finish carpentry that adds character</small></div>
        <div class="iroom">Flooring<small>Waterproof tile and LVP that lasts</small></div>
      </div>
    </div>
  </section>

  <!-- ===== WHY / STANDARD ===== -->
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Done Right</span>
        <h2>Built to stay watertight</h2>
      </div>
      <ul class="xlist">
        <li>Proper waterproofing behind every tiled surface</li>
        <li>Backer board and membranes — never tile over drywall in wet areas</li>
        <li>Correctly sloped shower pans that actually drain</li>
        <li>Sealed penetrations around valves and fixtures</li>
        <li>Ventilation sized to prevent mold and moisture damage</li>
        <li>Clean, protected job site and daily cleanup</li>
        <li>Licensed plumbing &amp; electrical, permits pulled</li>
        <li>Written workmanship warranty</li>
      </ul>
    </div>
  </section>

  <!-- ===== FAQ ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Questions</span>
        <h2>Bathroom remodeling FAQ</h2>
      </div>
      <div class="svc-faq">
        <details>
          <summary>How long does a bathroom remodel take?</summary>
          <p>A typical full bathroom runs about 2–3 weeks on site. Layout changes, custom tile and
            fixture lead times can extend that — we give you a realistic schedule in the proposal.</p>
        </details>
        <details>
          <summary>How much does a bathroom remodel cost in <?= BUSINESS_AREA ?>?</summary>
          <p>Most full bathroom remodels fall between $12,000 and $30,000 depending on size, tile and
            fixtures; small refreshes cost less and primary-suite baths more. We confirm with a free
            written estimate.</p>
        </details>
        <details>
          <summary>Can you convert my tub into a walk-in shower?</summary>
          <p>Yes — tub-to-shower conversions are one of our most popular projects, including custom
            tile, glass and the plumbing changes involved.</p>
        </details>
        <details>
          <summary>Can we use the bathroom during the remodel?</summary>
          <p>The bathroom being remodeled is out of service during the work, but we keep the timeline
            tight and protect the rest of your home. If it's your only bath, we'll plan around that.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Ready to remodel your bathroom?</h2>
        <p>Free consultation and a written proposal across <?= BUSINESS_AREA ?>.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <section class="section">
    <div class="container" style="text-align:center;">
      <span class="section__eyebrow">Explore More</span>
      <div class="svc-other">
        <a href="kitchen-remodeling.php">Kitchen Remodeling</a>
        <a href="home-remodeling.php">Home Remodeling</a>
        <a href="finish-carpentry.php">Finish Carpentry</a>
        <a href="interior-painting.php">Interior Painting</a>
      </div>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Bathroom Remodeling",
    "provider": { "@type": "GeneralContractor", "name": "<?= BUSINESS_NAME ?>", "telephone": "<?= BUSINESS_PHONE_RAW ?>", "url": "<?= SITE_URL ?>" },
    "areaServed": { "@type": "State", "name": "<?= BUSINESS_AREA ?>" },
    "url": "<?= $canonical ?>",
    "description": "<?= $pageDesc ?>"
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      { "@type": "Question", "name": "How long does a bathroom remodel take?",
        "acceptedAnswer": { "@type": "Answer", "text": "A typical full bathroom runs about 2-3 weeks on site. Layout changes, custom tile and fixture lead times can extend that." } },
      { "@type": "Question", "name": "How much does a bathroom remodel cost in <?= BUSINESS_AREA ?>?",
        "acceptedAnswer": { "@type": "Answer", "text": "Most full bathroom remodels fall between $12,000 and $30,000 depending on size, tile and fixtures. We confirm with a free written estimate." } },
      { "@type": "Question", "name": "Can you convert my tub into a walk-in shower?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes - tub-to-shower conversions are one of our most popular projects, including custom tile, glass and the plumbing changes involved." } },
      { "@type": "Question", "name": "Can we use the bathroom during the remodel?",
        "acceptedAnswer": { "@type": "Answer", "text": "The bathroom being remodeled is out of service during the work, but we keep the timeline tight and protect the rest of your home." } }
    ]
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
