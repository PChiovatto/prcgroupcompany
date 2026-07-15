<?php
require_once __DIR__ . '/config.php';
$pageTitle = $pageTitle ?? (BUSINESS_NAME . ' | Painting, Carpentry & Home Remodeling in ' . BUSINESS_AREA);
$pageDesc  = $pageDesc  ?? 'PRC Group delivers professional interior & exterior painting, general & finish carpentry, and full home remodeling across ' . BUSINESS_AREA . '. Licensed, insured & free estimates.';
$canonical = $canonical ?? SITE_URL . '/';
$extraCSS  = $extraCSS  ?? [];
$active    = $active    ?? '';
function nav_active($k, $cur) { return $k === $cur ? ' aria-current="page"' : ''; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>" />
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>" />
  <meta name="robots" content="index, follow, max-image-preview:large" />
  <meta name="theme-color" content="#111111" />

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GA_MEASUREMENT_ID ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?= GA_MEASUREMENT_ID ?>');
  </script>

  <!-- Microsoft Clarity -->
  <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "<?= CLARITY_PROJECT_ID ?>");
  </script>

  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>" />
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>" />
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>" />
  <meta property="og:site_name" content="<?= BUSINESS_NAME ?>" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:image" content="<?= SITE_URL ?>/assets/og-image.jpg" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:image" content="<?= SITE_URL ?>/assets/og-image.jpg" />

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "GeneralContractor",
    "name": "<?= BUSINESS_NAME ?>",
    "url": "<?= SITE_URL ?>",
    "telephone": "<?= BUSINESS_PHONE_RAW ?>",
    "email": "<?= BUSINESS_EMAIL_PUBLIC ?>",
    "sameAs": ["<?= GOOGLE_PROFILE_URL ?>", "<?= INSTAGRAM_URL ?>"],
    "foundingDate": "<?= BUSINESS_FOUNDED ?>",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?= BUSINESS_STREET ?>",
      "addressLocality": "<?= BUSINESS_CITY ?>",
      "addressRegion": "<?= BUSINESS_STATE ?>",
      "postalCode": "<?= BUSINESS_ZIP ?>",
      "addressCountry": "US"
    },
    "priceRange": "$$",
    "areaServed": { "@type": "State", "name": "<?= BUSINESS_AREA ?>" },
    "description": "Interior and exterior painting, general and finish carpentry, and full home remodeling throughout <?= BUSINESS_AREA ?>.",
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
      "opens": "08:00", "closes": "18:00"
    }
  }
  </script>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
  <link rel="icon" type="image/svg+xml" href="assets/favicon.svg" />
  <link rel="stylesheet" href="css/styles.css" />
  <?php foreach ($extraCSS as $css): ?>
  <link rel="stylesheet" href="<?= htmlspecialchars($css) ?>" />
  <?php endforeach; ?>
</head>
<body>

  <div class="topbar">
    <div class="container topbar__inner">
      <div class="topbar__left">
        <span>📍 Serving all of <?= BUSINESS_AREA ?></span>
        <span class="topbar__sep">•</span>
        <span>🕐 <?= BUSINESS_HOURS ?></span>
      </div>
      <div class="topbar__right">
        <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="topbar__phone">📞 <?= BUSINESS_PHONE ?></a>
        <a href="booking.php" class="topbar__cta">Book Now</a>
      </div>
    </div>
  </div>

  <header class="header" id="header">
    <div class="container header__inner">
      <a href="index.php" class="brand">
        <svg class="logo" viewBox="0 0 168 120" role="img" aria-label="<?= BUSINESS_NAME ?> logo">
          <path class="logo__blob" d="M60 4 C28 4 3 28 3 60 C3 92 28 116 60 116 C80 116 92 109 97 99 C99 95 100 88 100 80 L100 30 C100 19 97 11 90 7 C85 4 78 3 69 3 Z"/>
          <text class="logo__prc" x="51" y="75" text-anchor="middle">PRC</text>
          <text class="logo__group" transform="translate(124 113) rotate(-90)">GROUP</text>
        </svg>
        <span class="brand__tag"><?= BUSINESS_TAG ?></span>
      </a>

      <nav class="nav" id="nav">
        <a href="index.php#services"<?= nav_active('services', $active) ?>>Services</a>
        <a href="index.php#about"<?= nav_active('about', $active) ?>>About</a>
        <a href="index.php#projects"<?= nav_active('projects', $active) ?>>Projects</a>
        <a href="tools.php"<?= nav_active('tools', $active) ?>>Tools</a>
        <a href="booking.php"<?= nav_active('booking', $active) ?>>Book</a>
        <a href="index.php#contact" class="nav__cta">Get a Quote</a>
      </nav>

      <button class="nav-toggle" id="navToggle" aria-label="Open menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

  <main id="main">
