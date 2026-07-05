<?php
/**
 * City page template. Each painting-<slug>-ma.php sets $citySlug and includes
 * this file. Unique copy comes from includes/city-data.php.
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/city-data.php';

$c = $CITIES[$citySlug];
$cityName  = $c['name'];
$pageTitle = 'Painting, Carpentry & Remodeling in ' . $cityName . ', MA | ' . BUSINESS_NAME;
$pageDesc  = 'Local painting, carpentry and home remodeling in ' . $cityName . ', MA. ' . BUSINESS_NAME
           . ' is based in Wakefield — licensed, insured, free written estimates.';
$canonical = SITE_URL . '/painting-' . $citySlug . '-ma.php';
$active    = 'services';
$extraCSS  = ['css/service.css', 'css/city.css'];
include __DIR__ . '/header.php';
?>

  <!-- ===== CITY HERO ===== -->
  <section class="cityhero">
    <div class="container">
      <nav class="svc-breadcrumb"><a href="index.php">Home</a> / <a href="service-areas.php">Service Areas</a> / <?= $cityName ?>, MA</nav>
      <h1>Painting, Carpentry &amp; Remodeling in <?= $cityName ?>, MA</h1>
      <p><?= $c['intro'] ?></p>
      <div class="city-chips">
        <span>📍 <?= $c['drive'] ?></span>
        <span>Licensed &amp; Insured</span>
        <span>Since <?= BUSINESS_FOUNDED ?></span>
        <a href="tel:<?= BUSINESS_PHONE_RAW ?>">📞 <?= BUSINESS_PHONE ?></a>
      </div>
    </div>
  </section>

  <!-- ===== SERVICES IN CITY ===== -->
  <section class="section">
    <div class="container city-grid">
      <div>
        <span class="section__eyebrow">What We Do Here</span>
        <h2 style="margin:.5rem 0 1rem;">Our services in <?= $cityName ?></h2>
        <a class="city-svc" href="interior-painting.php">
          <div><h3>Interior Painting</h3><p>Walls, ceilings, trim and cabinets — clean crews, sharp lines.</p></div>
          <span class="arrow">→</span>
        </a>
        <a class="city-svc" href="exterior-painting.php">
          <div><h3>Exterior Painting</h3><p>Full-prep repaints built for New England weather.</p></div>
          <span class="arrow">→</span>
        </a>
        <a class="city-svc" href="general-carpentry.php">
          <div><h3>General Carpentry</h3><p>Decks, structural repairs, doors, windows and siding.</p></div>
          <span class="arrow">→</span>
        </a>
        <a class="city-svc" href="finish-carpentry.php">
          <div><h3>Finish Carpentry</h3><p>Crown molding, wainscoting, built-ins and custom trim.</p></div>
          <span class="arrow">→</span>
        </a>
        <a class="city-svc" href="home-remodeling.php">
          <div><h3>Home Remodeling</h3><p>Kitchens, bathrooms and full-room renovations, end to end.</p></div>
          <span class="arrow">→</span>
        </a>
      </div>
      <aside class="city-aside">
        <h3>Homes in <?= $cityName ?></h3>
        <p><?= $c['housing'] ?></p>
        <a href="index.php#contact" class="btn btn--primary">Get a Free <?= $cityName ?> Estimate</a>
        <a href="tools.php#calc-section" class="btn btn--ghost">Instant Quote Calculator</a>
      </aside>
    </div>
  </section>

  <!-- ===== NEIGHBORHOODS ===== -->
  <section class="nbhd">
    <div class="container">
      <h2>Serving every <?= $cityName ?> neighborhood</h2>
      <div class="nbhd-tags">
        <?php foreach ($c['neighborhoods'] as $n): ?><span><?= $n ?></span><?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ===== RECENT WORK STRIP ===== -->
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Nearby Work</span>
        <h2>Recent projects around the North Shore</h2>
      </div>
      <div class="city-strip">
        <img src="assets/projects/exterior-siding-painting-massachusetts.jpg" loading="lazy"
             alt="Exterior siding and painting project by <?= BUSINESS_NAME ?> near <?= $cityName ?>, MA" />
        <img src="assets/projects/kitchen-remodel-cabinets-countertop-massachusetts.jpg" loading="lazy"
             alt="Kitchen remodel by <?= BUSINESS_NAME ?> near <?= $cityName ?>, MA" />
        <img src="assets/projects/bathroom-renovation-remodeling-massachusetts.jpg" loading="lazy"
             alt="Bathroom renovation by <?= BUSINESS_NAME ?> near <?= $cityName ?>, MA" />
      </div>
    </div>
  </section>

  <!-- ===== FAQ ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Questions</span>
        <h2><?= $cityName ?> FAQ</h2>
      </div>
      <div class="svc-faq">
        <details>
          <summary><?= $c['faq_local_q'] ?></summary>
          <p><?= $c['faq_local_a'] ?></p>
        </details>
        <details>
          <summary>How do estimates work in <?= $cityName ?>?</summary>
          <p>We visit your home, measure and listen, then send a written, itemized estimate —
            free and no-pressure. <?= $c['drive'] === 'Our home base' ? 'Being based right here in town, scheduling is easy.' : 'Being based nearby in Wakefield (' . strtolower($c['drive']) . '), scheduling is easy.' ?></p>
        </details>
        <details>
          <summary>Are you licensed and insured to work in <?= $cityName ?>?</summary>
          <p>Yes — <?= BUSINESS_NAME ?> is fully licensed and insured across Massachusetts, we pull
            local permits when the work requires them, and every job is backed by our written
            workmanship warranty.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Planning a project in <?= $cityName ?>?</h2>
        <p>Free written estimate from your local painting &amp; carpentry team.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <!-- ===== ALSO SERVING ===== -->
  <section class="section">
    <div class="container" style="text-align:center;">
      <span class="section__eyebrow">Also Serving</span>
      <div class="svc-other">
        <?php foreach ($CITIES as $slug => $other): if ($slug === $citySlug) continue; ?>
        <a href="painting-<?= $slug ?>-ma.php"><?= $other['name'] ?>, MA</a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Painting, Carpentry and Home Remodeling",
    "provider": {
      "@type": "GeneralContractor",
      "name": "<?= BUSINESS_NAME ?>",
      "telephone": "<?= BUSINESS_PHONE_RAW ?>",
      "url": "<?= SITE_URL ?>",
      "address": { "@type": "PostalAddress", "streetAddress": "<?= BUSINESS_STREET ?>",
        "addressLocality": "<?= BUSINESS_CITY ?>", "addressRegion": "<?= BUSINESS_STATE ?>",
        "postalCode": "<?= BUSINESS_ZIP ?>", "addressCountry": "US" }
    },
    "areaServed": { "@type": "City", "name": "<?= $cityName ?>, MA" },
    "url": "<?= $canonical ?>",
    "description": "<?= htmlspecialchars($pageDesc, ENT_QUOTES) ?>"
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      { "@type": "Question", "name": <?= json_encode($c['faq_local_q']) ?>,
        "acceptedAnswer": { "@type": "Answer", "text": <?= json_encode(trim(preg_replace('/\s+/', ' ', $c['faq_local_a']))) ?> } },
      { "@type": "Question", "name": "How do estimates work in <?= $cityName ?>?",
        "acceptedAnswer": { "@type": "Answer", "text": "We visit your home, measure and listen, then send a written, itemized estimate - free and no-pressure." } },
      { "@type": "Question", "name": "Are you licensed and insured to work in <?= $cityName ?>?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes - PRC Group is fully licensed and insured across Massachusetts, and every job is backed by a written workmanship warranty." } }
    ]
  }
  </script>

<?php include __DIR__ . '/footer.php'; ?>
