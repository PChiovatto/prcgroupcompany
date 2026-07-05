<?php
require_once __DIR__ . '/config.php';
$extraJS = $extraJS ?? [];
?>
  <footer class="footer">
    <div class="container footer__grid">
      <div class="footer__brand">
        <span class="brand brand--footer">
          <svg class="logo logo--footer" viewBox="0 0 168 120" role="img" aria-label="<?= BUSINESS_NAME ?> logo">
            <path class="logo__blob" d="M60 4 C28 4 3 28 3 60 C3 92 28 116 60 116 C80 116 92 109 97 99 C99 95 100 88 100 80 L100 30 C100 19 97 11 90 7 C85 4 78 3 69 3 Z"/>
            <text class="logo__prc" x="51" y="75" text-anchor="middle">PRC</text>
            <text class="logo__group" transform="translate(124 113) rotate(-90)">GROUP</text>
          </svg>
        </span>
        <p>Professional painting, carpentry and home remodeling across <?= BUSINESS_AREA ?>.
          Licensed, insured and committed to quality.</p>
      </div>
      <div class="footer__col">
        <h4>Services</h4>
        <a href="interior-painting.php">Interior Painting</a>
        <a href="exterior-painting.php">Exterior Painting</a>
        <a href="general-carpentry.php">General Carpentry</a>
        <a href="finish-carpentry.php">Finish Carpentry</a>
        <a href="home-remodeling.php">Home Remodeling</a>
      </div>
      <div class="footer__col">
        <h4>Quick Links</h4>
        <a href="tools.php#calc-section">Quote Calculator</a>
        <a href="tools.php#visualizer">Color Visualizer</a>
        <a href="booking.php">Book Appointment</a>
        <a href="service-areas.php">Service Areas</a>
        <a href="index.php#contact">Contact</a>
        <a href="<?= GOOGLE_REVIEW_URL ?>" target="_blank" rel="noopener">★ Review Us on Google</a>
      </div>
      <div class="footer__col">
        <h4>Contact</h4>
        <a href="tel:<?= BUSINESS_PHONE_RAW ?>"><?= BUSINESS_PHONE ?></a>
        <a href="mailto:<?= BUSINESS_EMAIL ?>"><?= BUSINESS_EMAIL_PUBLIC ?></a>
        <a href="<?= GOOGLE_PROFILE_URL ?>" target="_blank" rel="noopener"><?= BUSINESS_ADDRESS ?></a>
        <span>Serving all of <?= BUSINESS_AREA ?></span>
        <span><?= BUSINESS_HOURS ?></span>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="container">
        <p>&copy; <?= date('Y') ?> <?= BUSINESS_NAME ?>. All rights reserved. · Licensed &amp; Insured · Serving <?= BUSINESS_AREA ?> since <?= BUSINESS_FOUNDED ?></p>
      </div>
    </div>
  </footer>

  <script src="js/site.js"></script>
  <?php foreach ($extraJS as $js): ?>
  <script src="<?= htmlspecialchars($js) ?>"></script>
  <?php endforeach; ?>
</body>
</html>
