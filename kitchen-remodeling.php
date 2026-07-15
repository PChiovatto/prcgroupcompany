<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Kitchen Remodeling in ' . BUSINESS_AREA . ' | ' . BUSINESS_NAME;
$pageDesc  = 'Kitchen remodeling across ' . BUSINESS_AREA . ' — custom cabinets, countertops, tile, flooring and lighting, managed end to end by ' . BUSINESS_NAME . '. Licensed, insured, free estimates.';
$canonical = SITE_URL . '/kitchen-remodeling.php';
$active    = 'services';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ===== HERO (bold type) ===== -->
  <section class="chero">
    <div class="container">
      <nav class="svc-breadcrumb"><a href="index.php">Home</a> / <a href="home-remodeling.php">Home Remodeling</a> / Kitchen Remodeling</nav>
      <h1>Kitchen Remodeling &amp; Custom Cabinets in <?= BUSINESS_AREA ?></h1>
      <p>The kitchen is where a remodel pays you back every day. <?= BUSINESS_NAME ?> handles the whole
        job — cabinets, counters, tile, flooring, lighting and the carpentry and paint to finish it —
        with one accountable crew from demo to the final walkthrough.</p>
    </div>
  </section>

  <!-- ===== WHAT'S INCLUDED (3 col) ===== -->
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">What's Included</span>
        <h2>Everything your kitchen needs, one team</h2>
      </div>
      <div class="x3">
        <div class="x3__col">
          <span class="x3__step">Cabinets &amp; Storage</span>
          <h3>Cabinet design &amp; install</h3>
          <p>New stock, semi-custom or fully custom cabinets — plus refacing and repainting when the
            boxes are sound. Islands, pantries and smart storage built to fit.</p>
        </div>
        <div class="x3__col">
          <span class="x3__step">Surfaces</span>
          <h3>Countertops, tile &amp; flooring</h3>
          <p>Quartz, granite and butcher-block counters, tile backsplashes, and durable hardwood or
            LVP flooring — coordinated so everything lines up.</p>
        </div>
        <div class="x3__col">
          <span class="x3__step">Finishing</span>
          <h3>Lighting, trim &amp; paint</h3>
          <p>Recessed and under-cabinet lighting, crown and trim carpentry, and a flawless paint
            finish — the details that make a kitchen feel finished.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== SCOPE ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Scope</span>
        <h2>From a refresh to a full gut</h2>
      </div>
      <ul class="xlist">
        <li>Cabinet replacement, refacing or repainting</li>
        <li>Countertop fabrication &amp; installation</li>
        <li>Tile backsplashes and floor tile</li>
        <li>Hardwood &amp; LVP flooring</li>
        <li>Recessed, pendant &amp; under-cabinet lighting</li>
        <li>Coordinated plumbing &amp; electrical (licensed trades)</li>
        <li>Wall removals for open concept (engineered &amp; permitted)</li>
        <li>Crown molding, trim and final paint</li>
      </ul>
    </div>
  </section>

  <!-- ===== PROCESS (timeline) ===== -->
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">How It Works</span>
        <h2>Your kitchen remodel, step by step</h2>
      </div>
      <div class="r-timeline">
        <div class="r-step"><h3>1. Consultation &amp; measure</h3>
          <p>We visit, measure and talk through layout, budget and the look you're after.</p></div>
        <div class="r-step"><h3>2. Design &amp; written proposal</h3>
          <p>Cabinet layout, material allowances and an itemized quote with a realistic timeline.</p></div>
        <div class="r-step"><h3>3. Order &amp; schedule</h3>
          <p>We lock in cabinets and finishes early — the #1 way to keep a kitchen on schedule.</p></div>
        <div class="r-step"><h3>4. Demo &amp; build</h3>
          <p>Dust protection up, old kitchen out, new cabinets, counters, tile and lighting in — clean and in sequence.</p></div>
        <div class="r-step"><h3>5. Final walkthrough</h3>
          <p>We review every detail together and back the work with our written warranty.</p></div>
      </div>
    </div>
  </section>

  <!-- ===== FAQ ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Questions</span>
        <h2>Kitchen remodeling FAQ</h2>
      </div>
      <div class="svc-faq">
        <details>
          <summary>How long does a kitchen remodel take?</summary>
          <p>Most kitchens run 4–8 weeks on site once materials are in. Cabinet lead times are the
            biggest variable, which is why we order early and give you a realistic schedule up front.</p>
        </details>
        <details>
          <summary>How much does a kitchen remodel cost in <?= BUSINESS_AREA ?>?</summary>
          <p>Mid-range kitchens typically start around $25,000–$45,000 depending on size, cabinets and
            counters; high-end and full-gut projects run higher. You get an itemized written estimate —
            no vague numbers.</p>
        </details>
        <details>
          <summary>Can you just reface or repaint my cabinets?</summary>
          <p>Yes. If the boxes are solid, refacing or a factory-smooth repaint is a big update for a
            fraction of full replacement. We'll tell you honestly which makes sense.</p>
        </details>
        <details>
          <summary>Do you handle plumbing, electrical and permits?</summary>
          <p>Yes — we coordinate licensed plumbing and electrical work and pull the required permits,
            including inspections.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Ready to remodel your kitchen?</h2>
        <p>Free consultation and a written proposal across <?= BUSINESS_AREA ?>.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <section class="section">
    <div class="container" style="text-align:center;">
      <span class="section__eyebrow">Explore More</span>
      <div class="svc-other">
        <a href="bathroom-remodeling.php">Bathroom Remodeling</a>
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
    "serviceType": "Kitchen Remodeling",
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
      { "@type": "Question", "name": "How long does a kitchen remodel take?",
        "acceptedAnswer": { "@type": "Answer", "text": "Most kitchens run 4-8 weeks on site once materials are in. Cabinet lead times are the biggest variable, which is why we order early." } },
      { "@type": "Question", "name": "How much does a kitchen remodel cost in <?= BUSINESS_AREA ?>?",
        "acceptedAnswer": { "@type": "Answer", "text": "Mid-range kitchens typically start around $25,000-$45,000 depending on size, cabinets and counters; full-gut projects run higher. You get an itemized written estimate." } },
      { "@type": "Question", "name": "Can you just reface or repaint my cabinets?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes. If the boxes are solid, refacing or a factory-smooth repaint is a big update for a fraction of full replacement." } },
      { "@type": "Question", "name": "Do you handle plumbing, electrical and permits?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes - we coordinate licensed plumbing and electrical work and pull the required permits, including inspections." } }
    ]
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
