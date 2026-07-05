<?php
/**
 * City page template with per-city layout variants.
 * Each city in city-data.php declares:
 *   'hero' => gradient | photo | split | bigtype
 *   'body' => list | grid | cols3
 *   'img'  => project photo used by photo/split heroes
 * All 12 cities use a UNIQUE hero+body combination, so no two pages share
 * the same layout — content (intro, neighborhoods, housing, FAQ) is also
 * unique per city.
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

$breadcrumb = '<nav class="svc-breadcrumb"><a href="index.php">Home</a> / <a href="service-areas.php">Service Areas</a> / ' . $cityName . ', MA</nav>';
$chips = function ($dark = false) use ($c) { ?>
      <div class="city-chips<?= $dark ? ' city-chips--dark' : '' ?>">
        <span>📍 <?= $c['drive'] ?></span>
        <span>Licensed &amp; Insured</span>
        <span>Since <?= BUSINESS_FOUNDED ?></span>
        <a href="tel:<?= BUSINESS_PHONE_RAW ?>">📞 <?= BUSINESS_PHONE ?></a>
      </div>
<?php };
?>

<?php /* ================= HERO VARIANTS ================= */ ?>
<?php if ($c['hero'] === 'gradient'): ?>
  <section class="cityhero">
    <div class="container">
      <?= $breadcrumb ?>
      <h1>Painting, Carpentry &amp; Remodeling in <?= $cityName ?>, MA</h1>
      <p><?= $c['intro'] ?></p>
      <?php $chips(); ?>
    </div>
  </section>

<?php elseif ($c['hero'] === 'photo'): ?>
  <section class="cityphoto-hero" style="background-image:
      linear-gradient(rgba(10,14,22,.66), rgba(10,14,22,.66)), url('<?= $c['img'] ?>');">
    <div class="container">
      <?= $breadcrumb ?>
      <h1>Painting, Carpentry &amp; Remodeling in <?= $cityName ?>, MA</h1>
      <p><?= $c['intro'] ?></p>
      <?php $chips(); ?>
    </div>
  </section>

<?php elseif ($c['hero'] === 'split'): ?>
  <section class="ihero-wrap">
    <div class="container ihero">
      <div>
        <?= $breadcrumb ?>
        <h1>Painting, Carpentry &amp; Remodeling in <?= $cityName ?>, MA</h1>
        <p><?= $c['intro'] ?></p>
        <?php $chips(true); ?>
      </div>
      <figure class="ihero__media">
        <img src="<?= $c['img'] ?>" alt="<?= BUSINESS_NAME ?> project near <?= $cityName ?>, MA" />
        <figcaption class="ihero__chip">Recent work near <?= $cityName ?></figcaption>
      </figure>
    </div>
  </section>

<?php else: /* bigtype */ ?>
  <section class="chero">
    <div class="container">
      <?= $breadcrumb ?>
      <h1><?= $cityName ?>, MA — painting, carpentry &amp; remodeling done right</h1>
      <p><?= $c['intro'] ?></p>
      <?php $chips(true); ?>
    </div>
  </section>
<?php endif; ?>

<?php /* ================= BODY VARIANTS ================= */ ?>
<?php if ($c['body'] === 'list'): ?>
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

<?php elseif ($c['body'] === 'grid'): ?>
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">What We Do Here</span>
        <h2>Our services in <?= $cityName ?></h2>
        <p><?= $c['housing'] ?></p>
      </div>
      <div class="cards">
        <article class="card">
          <h3><a href="interior-painting.php" class="card__title-link">Interior Painting</a></h3>
          <p>Walls, ceilings, trim and cabinets — clean crews and sharp lines, with minimal disruption.</p>
          <a href="interior-painting.php" class="card__more">Learn more →</a>
        </article>
        <article class="card">
          <h3><a href="exterior-painting.php" class="card__title-link">Exterior Painting</a></h3>
          <p>Full-prep exterior repaints built to survive New England winters.</p>
          <a href="exterior-painting.php" class="card__more">Learn more →</a>
        </article>
        <article class="card">
          <h3><a href="general-carpentry.php" class="card__title-link">General Carpentry</a></h3>
          <p>Decks, structural repairs, doors, windows and siding — solid and to code.</p>
          <a href="general-carpentry.php" class="card__more">Learn more →</a>
        </article>
        <article class="card">
          <h3><a href="finish-carpentry.php" class="card__title-link">Finish Carpentry</a></h3>
          <p>Crown molding, wainscoting, built-ins and custom trim with a flawless fit.</p>
          <a href="finish-carpentry.php" class="card__more">Learn more →</a>
        </article>
        <article class="card">
          <h3><a href="home-remodeling.php" class="card__title-link">Home Remodeling</a></h3>
          <p>Kitchens, bathrooms and full-room renovations managed end to end.</p>
          <a href="home-remodeling.php" class="card__more">Learn more →</a>
        </article>
        <article class="card card--accent">
          <h3>Planning something in <?= $cityName ?>?</h3>
          <p>Free written estimates — <?= strtolower($c['drive']) === 'our home base' ? 'we\'re based right here in town.' : 'we\'re ' . strtolower($c['drive']) . '.' ?></p>
          <a href="index.php#contact" class="card__link">Request an estimate →</a>
        </article>
      </div>
    </div>
  </section>

<?php else: /* cols3 */ ?>
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">What We Do Here</span>
        <h2>One team for your whole <?= $cityName ?> project</h2>
        <p><?= $c['housing'] ?></p>
      </div>
      <div class="x3">
        <div class="x3__col">
          <span class="x3__step">Painting</span>
          <h3>Interior &amp; Exterior</h3>
          <p>Meticulous prep, premium paints and clean crews — inside and out.</p>
          <p><a class="card__more" href="interior-painting.php">Interior →</a> &nbsp;
             <a class="card__more" href="exterior-painting.php">Exterior →</a></p>
        </div>
        <div class="x3__col">
          <span class="x3__step">Carpentry</span>
          <h3>Structural &amp; Finish</h3>
          <p>From deck frames and rot repair to crown molding and built-ins.</p>
          <p><a class="card__more" href="general-carpentry.php">General →</a> &nbsp;
             <a class="card__more" href="finish-carpentry.php">Finish →</a></p>
        </div>
        <div class="x3__col">
          <span class="x3__step">Remodeling</span>
          <h3>Kitchens &amp; Baths</h3>
          <p>Full renovations managed end to end by one accountable crew.</p>
          <p><a class="card__more" href="home-remodeling.php">Remodeling →</a></p>
        </div>
      </div>
      <div class="ihero__actions" style="justify-content:center; margin-top:2rem;">
        <a href="index.php#contact" class="btn btn--primary">Get a Free <?= $cityName ?> Estimate</a>
        <a href="tools.php#calc-section" class="btn btn--ghost city-ghost--light">Instant Quote</a>
      </div>
    </div>
  </section>
<?php endif; ?>

  <!-- ===== NEIGHBORHOODS ===== -->
  <section class="nbhd">
    <div class="container">
      <h2>Serving every <?= $cityName ?> neighborhood</h2>
      <div class="nbhd-tags">
        <?php foreach ($c['neighborhoods'] as $n): ?><span><?= $n ?></span><?php endforeach; ?>
      </div>
    </div>
  </section>

<?php if ($c['hero'] === 'gradient' || $c['hero'] === 'bigtype'): ?>
  <!-- ===== RECENT WORK STRIP (only on non-photo heroes) ===== -->
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
<?php endif; ?>

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
