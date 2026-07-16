<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Portfolio | ' . BUSINESS_NAME . ' Projects in ' . BUSINESS_AREA;
$pageDesc  = 'Recent painting, carpentry and remodeling projects by ' . BUSINESS_NAME . ' across ' . BUSINESS_AREA . ' — decks, custom trim, kitchens and bathrooms.';
$canonical = SITE_URL . '/portfolio.php';
$active    = 'projects';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';

$projects = [
  ['interior-painting-repaint-massachusetts.jpg', 'Interior Repaint', 'Interior Painting', 'Two-story living room refreshed with a clean, modern palette.'],
  ['kitchen-remodel-cabinets-countertop-massachusetts.jpg', 'Kitchen Remodel', 'Kitchen Remodeling', 'New white shaker cabinets, granite counters and undermount sink.'],
  ['exterior-siding-painting-massachusetts.jpg', 'Exterior &amp; Siding', 'Exterior Painting', 'Siding replacement and full exterior repaint on a brick building.'],
  ['custom-trim-wainscoting-carpentry-massachusetts.jpg', 'Custom Trim', 'Finish Carpentry', 'Custom vertical paneling, coat rail and crown molding, painted to match.'],
  ['bathroom-renovation-remodeling-massachusetts.jpg', 'Bathroom Renovation', 'Bathroom Remodeling', 'Wainscoting, marble-top vanity and new flooring in a full refresh.'],
  ['deck-construction-carpentry-massachusetts.jpg', 'Deck &amp; Carpentry', 'General Carpentry', 'New pressure-treated deck framing, built and flashed to code.'],
];
?>

  <!-- ===== HERO ===== -->
  <section class="fhero">
    <nav class="svc-breadcrumb"><a href="index.php">Home</a> / Portfolio</nav>
    <span class="section__eyebrow">Our Work</span>
    <h1>Painting, Carpentry &amp; Remodeling Projects in <?= BUSINESS_AREA ?></h1>
    <p>A selection of recent projects across the North Shore and Greater Boston. Swipe through more
      day-to-day work on our <a href="<?= INSTAGRAM_URL ?>" target="_blank" rel="noopener">Instagram</a>.</p>
  </section>

  <!-- ===== PORTFOLIO GRID ===== -->
  <section class="section" style="padding-top:0;">
    <div class="container">
      <div class="gallery">
        <?php foreach ($projects as $p): ?>
        <figure class="gallery__item">
          <img src="assets/projects/<?= $p[0] ?>" loading="lazy"
               alt="<?= strip_tags($p[1]) ?> — <?= $p[2] ?> by <?= BUSINESS_NAME ?> in <?= BUSINESS_AREA ?>" />
          <span><?= $p[1] ?></span>
        </figure>
        <?php endforeach; ?>
      </div>
      <p style="text-align:center; color:var(--muted); margin-top:2rem;">
        Want to see work like this in your home? <a href="index.php#contact">Request a free estimate →</a>
      </p>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Your project could be next</h2>
        <p>Free written estimates across <?= BUSINESS_AREA ?>.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "<?= BUSINESS_NAME ?> Portfolio",
    "url": "<?= $canonical ?>",
    "about": "Painting, carpentry and home remodeling projects in <?= BUSINESS_AREA ?>",
    "isPartOf": { "@type": "WebSite", "name": "<?= BUSINESS_NAME ?>", "url": "<?= SITE_URL ?>" }
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
