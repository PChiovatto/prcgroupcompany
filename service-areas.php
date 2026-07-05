<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/city-data.php';
$pageTitle = 'Service Areas | Painting & Remodeling North of Boston | ' . BUSINESS_NAME;
$pageDesc  = BUSINESS_NAME . ' serves Wakefield and the communities north of Boston with painting, carpentry and home remodeling — Winchester, Lynnfield, Reading, Melrose, Lexington, Andover, Marblehead and more.';
$canonical = SITE_URL . '/service-areas.php';
$active    = 'services';
$extraCSS  = ['css/service.css', 'css/city.css'];
include __DIR__ . '/includes/header.php';
?>

  <section class="cityhero">
    <div class="container">
      <nav class="svc-breadcrumb"><a href="index.php">Home</a> / Service Areas</nav>
      <h1>Serving Wakefield &amp; the North Shore</h1>
      <p>Based at <?= BUSINESS_ADDRESS ?>, our crews cover the communities north of Boston —
        close enough for fast estimates, easy scheduling and quick follow-ups. Find your town
        below, or call us: we regularly work throughout <?= BUSINESS_AREA ?>.</p>
      <div class="city-chips">
        <span>📍 Based in Wakefield, MA</span>
        <span>Licensed &amp; Insured</span>
        <span>Since <?= BUSINESS_FOUNDED ?></span>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Where We Work</span>
        <h2>Towns we serve</h2>
        <p>Every town page has local details, our services there and answers to common questions.</p>
      </div>
      <div class="svc-other" style="justify-content:center;">
        <?php foreach ($CITIES as $slug => $c): ?>
        <a href="painting-<?= $slug ?>-ma.php"><?= $c['name'] ?>, MA</a>
        <?php endforeach; ?>
      </div>
      <p style="text-align:center; color:var(--muted); margin-top:1.6rem;">
        Don't see your town? We serve all of <?= BUSINESS_AREA ?> —
        <a href="tel:<?= BUSINESS_PHONE_RAW ?>"><?= BUSINESS_PHONE ?></a>.
      </p>
    </div>
  </section>

  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Ready to start your project?</h2>
        <p>Free written estimates across the North Shore.</p>
      </div>
      <a href="index.php#contact" class="btn btn--light">Request an Estimate</a>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
