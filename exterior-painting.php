<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Exterior Painting in ' . BUSINESS_AREA . ' | ' . BUSINESS_NAME;
$pageDesc  = 'Exterior house painting built for New England weather — siding, trim, decks and doors with full prep, priming and durable coatings. Serving all of ' . BUSINESS_AREA . '.';
$canonical = SITE_URL . '/exterior-painting.php';
$active    = 'services';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ===== HERO (full-bleed photo) ===== -->
  <section class="xhero">
    <div class="container">
      <nav class="svc-breadcrumb"><a href="index.php">Home</a> / <a href="index.php#services">Services</a> / Exterior Painting</nav>
      <h1>Exterior Painting built for New England weather</h1>
      <p>Snow, salt air, humid summers and hard freezes punish a paint job. We prep, prime and
        coat exteriors across <?= BUSINESS_AREA ?> so they protect your biggest investment —
        and look sharp doing it.</p>
      <a href="index.php#contact" class="btn btn--light">Get a Free Exterior Estimate</a>
    </div>
  </section>

  <!-- ===== PREP / PRIME / PROTECT ===== -->
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Our Method</span>
        <h2>Paint fails at the prep — so we don't skip it</h2>
      </div>
      <div class="x3">
        <div class="x3__col">
          <span class="x3__step">Step 1 — Prep</span>
          <h3>Wash, scrape, sand, repair</h3>
          <p>Power washing, scraping to sound surface, sanding edges smooth, replacing rotted
            boards and caulking every gap. Lead-safe practices on pre-1978 homes.</p>
        </div>
        <div class="x3__col">
          <span class="x3__step">Step 2 — Prime</span>
          <h3>The coat you never see</h3>
          <p>Bare wood, patched spots and chalky surfaces get the right primer — bonding,
            stain-blocking or oil-based where needed — so the finish coat actually holds.</p>
        </div>
        <div class="x3__col">
          <span class="x3__step">Step 3 — Protect</span>
          <h3>Premium coatings, two coats</h3>
          <p>100% acrylic exterior paints rated for freeze-thaw cycles, applied in the right
            temperature window and backed by our written workmanship warranty.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== WHAT WE COAT ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Surfaces</span>
        <h2>What we paint &amp; stain outside</h2>
      </div>
      <ul class="xlist">
        <li>Clapboard, shingle &amp; fiber-cement siding</li>
        <li>Exterior trim, fascia and soffits</li>
        <li>Front doors and shutters</li>
        <li>Decks, porches and railings — paint or stain</li>
        <li>Fences and pergolas</li>
        <li>Foundations and bulkheads</li>
        <li>Garage doors and outbuildings</li>
        <li>Brick and masonry (limewash or paint)</li>
      </ul>
    </div>
  </section>

  <!-- ===== FAQ ===== -->
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Questions</span>
        <h2>Exterior painting FAQ</h2>
      </div>
      <div class="svc-faq">
        <details>
          <summary>When is the best season to paint a house in <?= BUSINESS_AREA ?>?</summary>
          <p>Late spring through early fall. Modern acrylics can be applied down to about 35°F,
            but we schedule around dry stretches with moderate temperatures for the best cure.</p>
        </details>
        <details>
          <summary>How long should an exterior paint job last?</summary>
          <p>With proper prep and quality paint, 8–12 years on siding and 4–6 on high-wear spots
            like decks and south-facing trim. Skipped prep is why cheap jobs peel in 2–3 years.</p>
        </details>
        <details>
          <summary>Do you replace rotted wood before painting?</summary>
          <p>Yes — our carpenters repair or replace rotted clapboards, trim and sills as part of
            the job, so you're not painting over problems.</p>
        </details>
        <details>
          <summary>Is your crew lead-safe certified?</summary>
          <p>Yes. On homes built before 1978 we follow EPA RRP lead-safe containment, cleanup
            and disposal practices.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Protect your home before the next season</h2>
        <p>Free written exterior estimates — we come to you.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <section class="section section--alt">
    <div class="container" style="text-align:center;">
      <span class="section__eyebrow">Explore More</span>
      <div class="svc-other">
        <a href="interior-painting.php">Interior Painting</a>
        <a href="general-carpentry.php">General Carpentry</a>
        <a href="finish-carpentry.php">Finish Carpentry</a>
        <a href="home-remodeling.php">Home Remodeling</a>
      </div>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Exterior Painting",
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
      { "@type": "Question", "name": "When is the best season to paint a house in <?= BUSINESS_AREA ?>?",
        "acceptedAnswer": { "@type": "Answer", "text": "Late spring through early fall. Modern acrylics can be applied down to about 35F, but we schedule around dry stretches with moderate temperatures for the best cure." } },
      { "@type": "Question", "name": "How long should an exterior paint job last?",
        "acceptedAnswer": { "@type": "Answer", "text": "With proper prep and quality paint, 8-12 years on siding and 4-6 on high-wear spots like decks and south-facing trim." } },
      { "@type": "Question", "name": "Do you replace rotted wood before painting?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes - our carpenters repair or replace rotted clapboards, trim and sills as part of the job." } },
      { "@type": "Question", "name": "Is your crew lead-safe certified?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes. On homes built before 1978 we follow EPA RRP lead-safe containment, cleanup and disposal practices." } }
    ]
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
