<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Interior Painting in ' . BUSINESS_AREA . ' | ' . BUSINESS_NAME;
$pageDesc  = 'Professional interior painting across ' . BUSINESS_AREA . ' — walls, ceilings, trim and cabinets with meticulous prep, premium paints and clean crews. Free written estimates.';
$canonical = SITE_URL . '/interior-painting.php';
$active    = 'services';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ===== HERO (split, light) ===== -->
  <section class="ihero-wrap">
    <div class="container ihero">
      <div>
        <nav class="svc-breadcrumb"><a href="index.php">Home</a> / <a href="index.php#services">Services</a> / Interior Painting</nav>
        <h1>Interior Painting that transforms your home from the inside out</h1>
        <p>Crisp lines, smooth finishes and colors that feel right in your light. <?= BUSINESS_NAME ?>
          paints interiors across <?= BUSINESS_AREA ?> with the careful prep and clean habits that
          make the difference between a paint job and a finish you love for years.</p>
        <div class="ihero__actions">
          <a href="index.php#contact" class="btn btn--primary">Get a Free Estimate</a>
          <a href="tools.php#calc-section" class="btn btn--ghost">Instant Quote</a>
        </div>
      </div>
      <figure class="ihero__media">
        <img src="assets/projects/interior-painting-repaint-massachusetts.jpg"
             alt="Two-story living room with floor-to-ceiling windows freshly repainted by <?= BUSINESS_NAME ?>" />
        <figcaption class="ihero__chip">Recent interior repaint — <?= BUSINESS_AREA ?></figcaption>
      </figure>
    </div>
  </section>

  <!-- ===== WHAT WE PAINT ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Room by Room</span>
        <h2>Every surface, done properly</h2>
        <p>From a single accent wall to a whole-house repaint, we treat prep as half the job —
          because it is.</p>
      </div>
      <div class="iroom-grid">
        <div class="iroom">Living rooms &amp; bedrooms<small>Walls, ceilings and accent colors</small></div>
        <div class="iroom">Kitchens &amp; bathrooms<small>Moisture-resistant, scrubbable finishes</small></div>
        <div class="iroom">Trim, doors &amp; baseboards<small>Sprayed or brushed enamel, sharp edges</small></div>
        <div class="iroom">Cabinets<small>Factory-smooth refinishing in place</small></div>
        <div class="iroom">Ceilings<small>Flat, uniform coverage — no flashing</small></div>
        <div class="iroom">Stairwells &amp; hallways<small>High-access work, fully protected</small></div>
        <div class="iroom">Home offices<small>Low-VOC paints, quick turnaround</small></div>
        <div class="iroom">Whole-house repaints<small>One crew, one schedule, one standard</small></div>
      </div>
    </div>
  </section>

  <!-- ===== HOW WE WORK ===== -->
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Our Standard</span>
        <h2>What "done right" means to us</h2>
      </div>
      <ul class="xlist">
        <li>Furniture moved and covered, floors fully masked</li>
        <li>Holes, cracks and nail pops repaired before any paint</li>
        <li>Surfaces sanded and primed — never paint over problems</li>
        <li>Premium low-VOC paints from Benjamin Moore &amp; Sherwin-Williams</li>
        <li>Two full coats, back-rolled for even coverage</li>
        <li>Daily cleanup — your home stays livable during the project</li>
        <li>Final walkthrough with touch-ups on the spot</li>
        <li>Workmanship warranty in writing</li>
      </ul>
    </div>
  </section>

  <!-- ===== FAQ ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Questions</span>
        <h2>Interior painting FAQ</h2>
      </div>
      <div class="svc-faq">
        <details>
          <summary>How long does it take to paint a room?</summary>
          <p>A standard bedroom takes about a day including prep and two coats. A whole-house
            interior typically runs 3–7 days depending on size, repairs and trim work.</p>
        </details>
        <details>
          <summary>Do I need to move out while you paint?</summary>
          <p>No. We work room by room, use low-odor low-VOC paints and clean up daily, so your
            home stays livable throughout the project.</p>
        </details>
        <details>
          <summary>Can you help me choose colors?</summary>
          <p>Yes — we advise on color and sheen for your light and use, and can sample colors on
            your walls before you commit.</p>
        </details>
        <details>
          <summary>How much does interior painting cost in <?= BUSINESS_AREA ?>?</summary>
          <p>Most single rooms fall between $400 and $1,200 depending on size, ceiling height and
            trim. Use our <a href="tools.php#calc-section">instant quote calculator</a> for a
            ballpark, then we confirm with a free written estimate.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Ready for a fresh interior?</h2>
        <p>Free, no-pressure written estimates across <?= BUSINESS_AREA ?>.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <section class="section">
    <div class="container" style="text-align:center;">
      <span class="section__eyebrow">Explore More</span>
      <div class="svc-other">
        <a href="exterior-painting.php">Exterior Painting</a>
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
    "serviceType": "Interior Painting",
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
      { "@type": "Question", "name": "How long does it take to paint a room?",
        "acceptedAnswer": { "@type": "Answer", "text": "A standard bedroom takes about a day including prep and two coats. A whole-house interior typically runs 3-7 days depending on size, repairs and trim work." } },
      { "@type": "Question", "name": "Do I need to move out while you paint?",
        "acceptedAnswer": { "@type": "Answer", "text": "No. We work room by room, use low-odor low-VOC paints and clean up daily, so your home stays livable throughout the project." } },
      { "@type": "Question", "name": "Can you help me choose colors?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes - we advise on color and sheen for your light and use, and can sample colors on your walls before you commit." } },
      { "@type": "Question", "name": "How much does interior painting cost in <?= BUSINESS_AREA ?>?",
        "acceptedAnswer": { "@type": "Answer", "text": "Most single rooms fall between $400 and $1,200 depending on size, ceiling height and trim. We confirm every job with a free written estimate." } }
    ]
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
