<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'FAQ | ' . BUSINESS_NAME . ' — Painting, Carpentry & Remodeling';
$pageDesc  = 'Answers to common questions about painting, carpentry and home remodeling with ' . BUSINESS_NAME . ' in ' . BUSINESS_AREA . ' — timelines, cost ranges, prep, permits and warranty.';
$canonical = SITE_URL . '/faq.php';
$active    = '';
$extraCSS  = ['css/service.css'];
include __DIR__ . '/includes/header.php';

// Grouped FAQ. Answers mirror the service pages so the site stays consistent.
$faqGroups = [
  'General' => [
    ['Are you licensed and insured?', 'Yes — ' . BUSINESS_NAME . ' is fully licensed and insured across ' . BUSINESS_AREA . ', and every project is backed by a written workmanship warranty.'],
    ['How do estimates work?', 'We visit your home, measure and listen, then send a written, itemized estimate — free and no-pressure. Based in Wakefield, we schedule quickly across the North Shore.'],
    ['What areas do you serve?', 'We\'re based at ' . BUSINESS_ADDRESS . ' and serve Wakefield and the communities north of Boston, including Winchester, Lynnfield, Reading, Melrose, Stoneham, Lexington, Andover and more.'],
  ],
  'Painting' => [
    ['How long does it take to paint a room?', 'A standard bedroom takes about a day including prep and two coats. A whole-house interior typically runs 3–7 days depending on size, repairs and trim work.'],
    ['Do I need to move out while you paint?', 'No. We work room by room, use low-odor low-VOC paints and clean up daily, so your home stays livable throughout the project.'],
    ['When is the best time to paint a house exterior?', 'Late spring through early fall. Modern acrylics can go on down to about 35°F, but we schedule around dry stretches with moderate temperatures for the best cure.'],
    ['How long should an exterior paint job last?', 'With proper prep and quality paint, 8–12 years on siding and 4–6 on high-wear spots like decks and south-facing trim. Skipped prep is why cheap jobs peel early.'],
  ],
  'Carpentry' => [
    ['Do you do both carpentry repairs and painting?', 'Yes — one crew, one schedule. Rotted clapboards, damaged trim and the finish coat are all handled in the same project.'],
    ['How much does a new deck cost?', 'Pressure-treated decks typically start around $40–60 per square foot; composite runs higher. We quote exactly after a free site visit.'],
    ['Can you match my home\'s existing trim?', 'Yes. We match existing profiles from stock where possible and can have knives ground for exact reproductions when it matters.'],
  ],
  'Remodeling' => [
    ['How long does a kitchen remodel take?', 'Most kitchens run 4–8 weeks on site once materials are in. Cabinet lead times are the biggest variable, which is why we order early.'],
    ['How long does a bathroom remodel take?', 'A typical full bathroom runs about 2–3 weeks on site. Layout changes and custom tile can extend that — we give you a realistic schedule in the proposal.'],
    ['Do you handle permits, plumbing and electrical?', 'Yes — we pull the required permits and coordinate licensed plumbing and electrical work, including inspections.'],
    ['How do payments work?', 'A deposit secures your slot and materials, followed by progress payments tied to completed milestones — never large sums up front.'],
  ],
];
?>

  <!-- ===== HERO ===== -->
  <section class="chero">
    <div class="container">
      <nav class="svc-breadcrumb"><a href="index.php">Home</a> / FAQ</nav>
      <h1>Frequently Asked Questions</h1>
      <p>Straight answers on timelines, cost ranges, prep, permits and warranty for painting,
        carpentry and remodeling with <?= BUSINESS_NAME ?>.</p>
    </div>
  </section>

  <?php foreach ($faqGroups as $group => $items): ?>
  <section class="section<?= $group === 'Painting' || $group === 'Remodeling' ? ' section--alt' : '' ?>">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow"><?= $group ?></span>
        <h2><?= $group ?> questions</h2>
      </div>
      <div class="svc-faq">
        <?php foreach ($items as $qa): ?>
        <details>
          <summary><?= htmlspecialchars($qa[0]) ?></summary>
          <p><?= $qa[1] ?></p>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endforeach; ?>

  <!-- ===== CTA ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Still have a question?</h2>
        <p>Call us or request a free written estimate — we're happy to help.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      <?php
      $all = [];
      foreach ($faqGroups as $items) {
        foreach ($items as $qa) {
          $q = json_encode($qa[0]);
          $a = json_encode(trim(preg_replace('/\s+/', ' ', str_replace(['–', '—'], '-', $qa[1]))));
          $all[] = '{ "@type": "Question", "name": ' . $q . ', "acceptedAnswer": { "@type": "Answer", "text": ' . $a . ' } }';
        }
      }
      echo implode(",\n      ", $all);
      ?>
    ]
  }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
