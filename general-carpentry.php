<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'General Carpentry in ' . BUSINESS_AREA . ' | ' . BUSINESS_NAME;
$pageDesc  = 'Licensed general carpentry across ' . BUSINESS_AREA . ' — decks, framing, structural repairs, doors, windows and siding built solid and to code. Free estimates.';
$canonical = SITE_URL . '/general-carpentry.php';
$active    = 'services';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ===== HERO (bold type) ===== -->
  <section class="chero">
    <div class="container">
      <nav class="svc-breadcrumb"><a href="index.php">Home</a> / <a href="index.php#services">Services</a> / General Carpentry</nav>
      <h1>Carpentry that holds up — because it's built right</h1>
      <p>Decks, framing, structural repairs and everything in between. <?= BUSINESS_NAME ?> builds
        solid, code-conscious carpentry across <?= BUSINESS_AREA ?> — the kind you stop thinking
        about because it just works.</p>
    </div>
  </section>

  <!-- ===== CAPABILITIES + STICKY PHOTO ===== -->
  <section class="section">
    <div class="container c-layout">
      <div>
        <div class="crow">
          <span class="crow__num">01</span>
          <div>
            <h3>Decks &amp; Porches</h3>
            <p>New builds, rebuilds and repairs — pressure-treated or composite, properly flashed
              and footed, railings to code. Built to survive New England winters.</p>
          </div>
        </div>
        <div class="crow">
          <span class="crow__num">02</span>
          <div>
            <h3>Framing &amp; Structural Repair</h3>
            <p>Sagging floors, cracked joists, rotted sills and load-bearing changes handled with
              proper sizing, hardware and inspection-ready work.</p>
          </div>
        </div>
        <div class="crow">
          <span class="crow__num">03</span>
          <div>
            <h3>Doors &amp; Windows</h3>
            <p>Interior and exterior door installs, window swaps and trim-outs — square, plumb,
              sealed and smooth-operating.</p>
          </div>
        </div>
        <div class="crow">
          <span class="crow__num">04</span>
          <div>
            <h3>Siding &amp; Exterior Repairs</h3>
            <p>Clapboard and shingle replacement, rot repair, fascia and soffit work — matched to
              your existing exterior and ready for paint.</p>
          </div>
        </div>
        <div class="crow">
          <span class="crow__num">05</span>
          <div>
            <h3>General Repairs &amp; Punch Lists</h3>
            <p>That growing list of small fixes — sticking doors, loose railings, damaged trim —
              knocked out in a single organized visit.</p>
          </div>
        </div>
      </div>
      <figure class="c-photo">
        <img src="assets/projects/deck-construction-carpentry-massachusetts.jpg"
             alt="New pressure-treated deck frame built by <?= BUSINESS_NAME ?> carpenters at a <?= BUSINESS_AREA ?> home" />
        <figcaption>Deck framing in progress — every joist hung, flashed and fastened to code.</figcaption>
      </figure>
    </div>
  </section>

  <!-- ===== FAQ ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Questions</span>
        <h2>Carpentry FAQ</h2>
      </div>
      <div class="svc-faq">
        <details>
          <summary>Are you licensed and insured for structural work?</summary>
          <p>Yes — <?= BUSINESS_NAME ?> is licensed and insured, and we pull permits and schedule
            inspections whenever the job requires them.</p>
        </details>
        <details>
          <summary>How much does a new deck cost?</summary>
          <p>Pressure-treated decks typically start around $40–60 per square foot; composite runs
            higher. Site conditions, height and railings drive the price — we quote exactly after
            a free site visit.</p>
        </details>
        <details>
          <summary>Can you fix rot you find during a painting job?</summary>
          <p>Yes — that's one of the advantages of hiring one company for carpentry and painting:
            we repair the wood and finish it in the same project, with one schedule.</p>
        </details>
        <details>
          <summary>Do you take on small repair jobs?</summary>
          <p>We do. Punch-list visits are a regular part of our week — bundle a few small fixes
            together and we'll handle them in one efficient trip.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Have a project — or a problem?</h2>
        <p>From new decks to structural fixes, we'll give you a straight answer and a written quote.</p>
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
        <a href="finish-carpentry.php">Finish Carpentry</a>
        <a href="home-remodeling.php">Home Remodeling</a>
      </div>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "General Carpentry",
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
      { "@type": "Question", "name": "Are you licensed and insured for structural work?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes - PRC Group is licensed and insured, and we pull permits and schedule inspections whenever the job requires them." } },
      { "@type": "Question", "name": "How much does a new deck cost?",
        "acceptedAnswer": { "@type": "Answer", "text": "Pressure-treated decks typically start around $40-60 per square foot; composite runs higher. We quote exactly after a free site visit." } },
      { "@type": "Question", "name": "Can you fix rot you find during a painting job?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes - we repair the wood and finish it in the same project, with one schedule." } },
      { "@type": "Question", "name": "Do you take on small repair jobs?",
        "acceptedAnswer": { "@type": "Answer", "text": "We do. Bundle a few small fixes together and we'll handle them in one efficient trip." } }
    ]
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
