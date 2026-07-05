<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Finish Carpentry & Custom Trim in ' . BUSINESS_AREA . ' | ' . BUSINESS_NAME;
$pageDesc  = 'Finish carpentry across ' . BUSINESS_AREA . ' — crown molding, wainscoting, built-ins, custom trim and millwork installed with a flawless fit and painted to match.';
$canonical = SITE_URL . '/finish-carpentry.php';
$active    = 'services';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ===== HERO (editorial, centered) ===== -->
  <section class="fhero">
    <nav class="svc-breadcrumb"><a href="index.php">Home</a> / <a href="index.php#services">Services</a> / Finish Carpentry</nav>
    <span class="section__eyebrow">The Detail Work</span>
    <h1>Finish Carpentry — where a house becomes a home</h1>
    <p>Crown molding, wainscoting, built-ins and custom trim. The last 5% of the work
      that defines 95% of the impression.</p>
  </section>

  <div class="f-photo container">
    <img src="assets/projects/custom-trim-wainscoting-carpentry-massachusetts.jpg"
         alt="Custom vertical paneling with coat hooks and crown molding installed and painted by <?= BUSINESS_NAME ?>" />
  </div>

  <!-- ===== EDITORIAL COLUMNS ===== -->
  <section class="section">
    <div class="container">
      <div class="f-cols">
        <p>Trim is the difference between a painted box and a finished room. It frames doorways,
          grounds the walls, hides the seams of construction and gives the eye a reason to
          linger. Done well, you barely notice it — you just feel that the room is complete.</p>
        <p>Our finish carpenters measure twice, cope inside corners instead of caulking gaps,
          scribe to walls that aren't straight (they never are), and fill and sand every nail
          hole before paint. Because we also paint, the same standard follows the wood all the
          way to the final coat — one team, one finish, no handoffs.</p>
        <p>We install crown molding and coffered ceilings, wainscoting and board-and-batten,
          window and door casings, baseboards, mantels, mudroom built-ins, bookcases and
          closet systems — matched to your home's era or reimagined entirely.</p>
        <p>Whether it's one room that needs character or a whole first floor, we'll help you
          choose profiles and proportions that fit the scale of your space, then deliver the
          crisp lines the photos promise.</p>
      </div>
      <div class="f-quote">
        <p>The finish carpentry and crown molding came out beautiful. True craftsmen who care
          about the details.</p>
        <span class="section__eyebrow">— Homeowner, Boston</span>
      </div>
      <div class="f-tags">
        <span>Crown molding</span><span>Wainscoting</span><span>Board &amp; batten</span>
        <span>Built-ins</span><span>Window &amp; door casing</span><span>Baseboards</span>
        <span>Mantels</span><span>Mudroom lockers</span><span>Coffered ceilings</span>
      </div>
    </div>
  </section>

  <!-- ===== FAQ ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Questions</span>
        <h2>Finish carpentry FAQ</h2>
      </div>
      <div class="svc-faq">
        <details>
          <summary>Is the price painted or unpainted?</summary>
          <p>Your choice — but most clients have us paint, since we prime, fill, caulk and finish
            the trim as one seamless job with a uniform result.</p>
        </details>
        <details>
          <summary>Can you match my home's existing trim?</summary>
          <p>Yes. We match existing profiles from stock where possible and can have knives ground
            for exact historical reproductions when it matters.</p>
        </details>
        <details>
          <summary>MDF or solid wood?</summary>
          <p>Painted trim in dry rooms is often best in MDF (stable, seamless, economical).
            Moisture-prone areas and stained work call for poplar, oak or PVC. We'll recommend
            per room.</p>
        </details>
        <details>
          <summary>How much does crown molding cost?</summary>
          <p>Installed and painted, most rooms fall between $8 and $16 per linear foot depending
            on profile size and ceiling height. We confirm with a free written estimate.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Give your rooms the finish they deserve</h2>
        <p>Free design advice and written estimates across <?= BUSINESS_AREA ?>.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <section class="section">
    <div class="container" style="text-align:center;">
      <span class="section__eyebrow">Explore More</span>
      <div class="svc-other">
        <a href="interior-painting.php">Interior Painting</a>
        <a href="exterior-painting.php">Exterior Painting</a>
        <a href="general-carpentry.php">General Carpentry</a>
        <a href="home-remodeling.php">Home Remodeling</a>
      </div>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Finish Carpentry",
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
      { "@type": "Question", "name": "Is the price painted or unpainted?",
        "acceptedAnswer": { "@type": "Answer", "text": "Your choice - but most clients have us paint, since we prime, fill, caulk and finish the trim as one seamless job." } },
      { "@type": "Question", "name": "Can you match my home's existing trim?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes. We match existing profiles from stock where possible and can have knives ground for exact reproductions." } },
      { "@type": "Question", "name": "MDF or solid wood?",
        "acceptedAnswer": { "@type": "Answer", "text": "Painted trim in dry rooms is often best in MDF. Moisture-prone areas and stained work call for poplar, oak or PVC. We recommend per room." } },
      { "@type": "Question", "name": "How much does crown molding cost?",
        "acceptedAnswer": { "@type": "Answer", "text": "Installed and painted, most rooms fall between $8 and $16 per linear foot depending on profile size and ceiling height." } }
    ]
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
