<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'About ' . BUSINESS_NAME . ' | ' . BUSINESS_AREA . ' Painting & Remodeling';
$pageDesc  = 'About ' . BUSINESS_NAME . ' — a Wakefield-based painting, carpentry and home remodeling company serving ' . BUSINESS_AREA . ' since ' . BUSINESS_FOUNDED . '. Licensed, insured, free written estimates.';
$canonical = SITE_URL . '/about.php';
$active    = 'about';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ===== HERO ===== -->
  <section class="chero">
    <div class="container">
      <nav class="svc-breadcrumb"><a href="index.php">Home</a> / About</nav>
      <h1>Your trusted painting, carpentry &amp; remodeling team in <?= BUSINESS_AREA ?></h1>
      <p><?= BUSINESS_NAME ?> is a full-service painting, carpentry and home remodeling company
        based at <?= BUSINESS_ADDRESS ?>. Since <?= BUSINESS_FOUNDED ?> we've helped homeowners and
        businesses across the North Shore and Greater Boston with work that's done carefully, cleanly
        and on time.</p>
    </div>
  </section>

  <!-- ===== STATS ===== -->
  <div class="trust">
    <div class="container trust__inner">
      <span>✔ Serving <?= BUSINESS_AREA ?> since <?= BUSINESS_FOUNDED ?></span>
      <span>✔ 500+ projects completed</span>
      <span>✔ Licensed &amp; Insured</span>
      <span>✔ Workmanship Warranty</span>
    </div>
  </div>

  <!-- ===== STORY ===== -->
  <section class="section">
    <div class="container about">
      <div class="about__media">
        <img src="assets/projects/custom-trim-wainscoting-carpentry-massachusetts.jpg"
             alt="Custom trim and paneling by <?= BUSINESS_NAME ?> — the craftsmanship behind every project" loading="lazy" />
        <div class="about__badge">
          <strong>Since <?= BUSINESS_FOUNDED ?></strong>
          <span>Craftsmanship in <?= BUSINESS_AREA ?></span>
        </div>
      </div>
      <div class="about__body">
        <span class="section__eyebrow">Who We Are</span>
        <h2>Craftsmanship you can see, service you can trust</h2>
        <p>We built our reputation on doing the small things right — careful surface prep, clean and
          protected job sites, honest communication and finishes that last. It's the same standard
          whether we're painting a single room or managing a full home remodel.</p>
        <p>Because our painters and carpenters work under one roof, you deal with one accountable team
          from the first estimate to the final walkthrough — no juggling separate trades, no
          finger-pointing when something needs attention.</p>
        <ul class="checklist">
          <li>Experienced, in-house painters &amp; carpenters</li>
          <li>Detailed, no-pressure written estimates</li>
          <li>Careful prep and clean, respectful job sites</li>
          <li>EPA lead-safe practices on pre-1978 homes</li>
          <li>Backed by a written workmanship warranty</li>
        </ul>
        <a href="index.php#contact" class="btn btn--primary">Request a Free Estimate</a>
      </div>
    </div>
  </section>

  <!-- ===== WHAT WE DO ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">What We Do</span>
        <h2>One team for the whole job</h2>
      </div>
      <div class="svc-other" style="justify-content:center;">
        <a href="interior-painting.php">Interior Painting</a>
        <a href="exterior-painting.php">Exterior Painting</a>
        <a href="general-carpentry.php">General Carpentry</a>
        <a href="finish-carpentry.php">Finish Carpentry</a>
        <a href="home-remodeling.php">Home Remodeling</a>
        <a href="kitchen-remodeling.php">Kitchen Remodeling</a>
        <a href="bathroom-remodeling.php">Bathroom Remodeling</a>
      </div>
    </div>
  </section>

  <!-- ===== SERVICE AREA ===== -->
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Where We Work</span>
        <h2>Serving Wakefield &amp; the North Shore</h2>
        <p>Based in Wakefield, we cover the communities north of Boston — close enough for fast
          estimates and easy scheduling. <a href="service-areas.php">See all service areas →</a></p>
      </div>
      <div class="svc-other" style="justify-content:center;">
        <a href="painting-wakefield-ma.php">Wakefield</a>
        <a href="painting-winchester-ma.php">Winchester</a>
        <a href="painting-lynnfield-ma.php">Lynnfield</a>
        <a href="painting-reading-ma.php">Reading</a>
        <a href="painting-melrose-ma.php">Melrose</a>
        <a href="painting-stoneham-ma.php">Stoneham</a>
        <a href="painting-lexington-ma.php">Lexington</a>
        <a href="painting-andover-ma.php">Andover</a>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Let's talk about your project</h2>
        <p>Free, no-obligation written estimates across <?= BUSINESS_AREA ?>.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "AboutPage",
    "url": "<?= $canonical ?>",
    "mainEntity": {
      "@type": "GeneralContractor",
      "name": "<?= BUSINESS_NAME ?>",
      "foundingDate": "<?= BUSINESS_FOUNDED ?>",
      "telephone": "<?= BUSINESS_PHONE_RAW ?>",
      "email": "<?= BUSINESS_EMAIL_PUBLIC ?>",
      "url": "<?= SITE_URL ?>",
      "address": { "@type": "PostalAddress", "streetAddress": "<?= BUSINESS_STREET ?>",
        "addressLocality": "<?= BUSINESS_CITY ?>", "addressRegion": "<?= BUSINESS_STATE ?>",
        "postalCode": "<?= BUSINESS_ZIP ?>", "addressCountry": "US" },
      "areaServed": { "@type": "State", "name": "<?= BUSINESS_AREA ?>" }
    }
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
