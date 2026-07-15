<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Home Remodeling in ' . BUSINESS_AREA . ' | Kitchens & Bathrooms | ' . BUSINESS_NAME;
$pageDesc  = 'Kitchen, bathroom and full-room remodeling across ' . BUSINESS_AREA . ' — one accountable team from design help and demo to carpentry, paint and final walkthrough.';
$canonical = SITE_URL . '/home-remodeling.php';
$active    = 'services';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ===== HERO (photo mosaic) ===== -->
  <section class="section">
    <div class="container rhero">
      <div>
        <nav class="svc-breadcrumb"><a href="index.php">Home</a> / <a href="index.php#services">Services</a> / Home Remodeling</nav>
        <h1>Home Remodeling with one accountable team</h1>
        <p>Kitchens, bathrooms and whole-room renovations — planned clearly, built by our own
          carpenters and painters, and managed end to end. No juggling subs, no finger-pointing:
          one crew owns your project from demo to walkthrough.</p>
        <div class="ihero__actions">
          <a href="booking.php" class="btn btn--primary">Book a Free Consultation</a>
          <a href="index.php#projects" class="btn btn--ghost">See Recent Work</a>
        </div>
      </div>
      <div class="r-mosaic">
        <img src="assets/projects/bathroom-renovation-remodeling-massachusetts.jpg"
             alt="Renovated bathroom with wainscoting and marble-top vanity by <?= BUSINESS_NAME ?>" />
        <img src="assets/projects/kitchen-remodel-cabinets-countertop-massachusetts.jpg"
             alt="Kitchen remodel with white shaker cabinets and granite countertop by <?= BUSINESS_NAME ?>" />
        <div class="r-mosaic__badge"><div><strong>500+</strong>projects completed<br />since <?= BUSINESS_FOUNDED ?></div></div>
      </div>
    </div>
  </section>

  <!-- ===== WHAT WE REMODEL ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Scope</span>
        <h2>What we take on</h2>
      </div>
      <ul class="xlist">
        <li><a href="kitchen-remodeling.php">Kitchen remodels</a> — cabinets, counters, tile, lighting</li>
        <li><a href="bathroom-remodeling.php">Bathroom renovations</a> — full gut or refresh</li>
        <li>Basement finishing and home offices</li>
        <li>Mudrooms, laundry rooms and built-in storage</li>
        <li>Open-concept wall removals (engineered &amp; permitted)</li>
        <li>Flooring — hardwood, LVP and tile</li>
        <li>Trim, doors and paint — the finish, in-house</li>
        <li>Aging-in-place and rental-turnover updates</li>
      </ul>
    </div>
  </section>

  <!-- ===== TIMELINE ===== -->
  <section class="section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">The Journey</span>
        <h2>From first walk-through to final walkthrough</h2>
      </div>
      <div class="r-timeline">
        <div class="r-step">
          <h3>1. Consultation &amp; scope</h3>
          <p>We visit, measure and listen. You get honest feedback on what's possible and what
            it should cost — before you spend anything.</p>
        </div>
        <div class="r-step">
          <h3>2. Written proposal</h3>
          <p>An itemized quote with scope, materials, allowances and a realistic timeline. No
            vague line items.</p>
        </div>
        <div class="r-step">
          <h3>3. Selections &amp; scheduling</h3>
          <p>We help you lock in cabinets, fixtures and finishes early — the #1 way to keep a
            remodel on schedule — then order everything before demo day.</p>
        </div>
        <div class="r-step">
          <h3>4. Build</h3>
          <p>Dust protection up, demo out, our carpenters and painters through in sequence.
            You get progress updates and a single point of contact throughout.</p>
        </div>
        <div class="r-step">
          <h3>5. Final walkthrough</h3>
          <p>We punch-list every detail together until you're 100% satisfied — then back the
            work with our written warranty.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== FAQ ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Questions</span>
        <h2>Remodeling FAQ</h2>
      </div>
      <div class="svc-faq">
        <details>
          <summary>How long does a bathroom or kitchen remodel take?</summary>
          <p>A typical full bathroom runs 2–3 weeks on site; kitchens 4–8 weeks depending on
            scope and cabinet lead times. We give you a realistic schedule in the proposal.</p>
        </details>
        <details>
          <summary>Do you handle permits?</summary>
          <p>Yes — we pull the required building permits and coordinate licensed plumbing and
            electrical work, including inspections.</p>
        </details>
        <details>
          <summary>Can we live in the house during the remodel?</summary>
          <p>Almost always. We contain dust, protect floors and keep water/power interruptions
            short and scheduled in advance.</p>
        </details>
        <details>
          <summary>How do payments work?</summary>
          <p>A deposit secures your slot and materials, followed by progress payments tied to
            completed milestones — never large sums up front.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Let's plan your remodel</h2>
        <p>Free consultation, honest advice and a written proposal.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <section class="section">
    <div class="container" style="text-align:center;">
      <span class="section__eyebrow">Explore More</span>
      <div class="svc-other">
        <a href="kitchen-remodeling.php">Kitchen Remodeling</a>
        <a href="bathroom-remodeling.php">Bathroom Remodeling</a>
        <a href="interior-painting.php">Interior Painting</a>
        <a href="exterior-painting.php">Exterior Painting</a>
        <a href="general-carpentry.php">General Carpentry</a>
        <a href="finish-carpentry.php">Finish Carpentry</a>
      </div>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Home Remodeling",
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
      { "@type": "Question", "name": "How long does a bathroom or kitchen remodel take?",
        "acceptedAnswer": { "@type": "Answer", "text": "A typical full bathroom runs 2-3 weeks on site; kitchens 4-8 weeks depending on scope and cabinet lead times." } },
      { "@type": "Question", "name": "Do you handle permits?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes - we pull the required building permits and coordinate licensed plumbing and electrical work, including inspections." } },
      { "@type": "Question", "name": "Can we live in the house during the remodel?",
        "acceptedAnswer": { "@type": "Answer", "text": "Almost always. We contain dust, protect floors and keep water/power interruptions short and scheduled in advance." } },
      { "@type": "Question", "name": "How do payments work?",
        "acceptedAnswer": { "@type": "Answer", "text": "A deposit secures your slot and materials, followed by progress payments tied to completed milestones." } }
    ]
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
