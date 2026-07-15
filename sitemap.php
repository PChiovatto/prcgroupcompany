<?php
/**
 * Dynamic XML sitemap — auto-discovers every public page in the site root,
 * so new service/city pages are included automatically with a real lastmod
 * (file modification time). Served as /sitemap.xml via .htaccess rewrite.
 */
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/xml; charset=UTF-8');

$exclude = ['sitemap.php', 'verify_site.php'];

function url_entry($loc, $lastmod, $changefreq, $priority) {
    return "  <url>\n"
         . "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n"
         . "    <lastmod>" . date('Y-m-d', $lastmod) . "</lastmod>\n"
         . "    <changefreq>{$changefreq}</changefreq>\n"
         . "    <priority>{$priority}</priority>\n"
         . "  </url>\n";
}

$entries = '';

// Home first
$entries .= url_entry(SITE_URL . '/', filemtime(__DIR__ . '/index.php'), 'weekly', '1.0');

// Every other public page in the root
$files = glob(__DIR__ . '/*.php');
sort($files);
foreach ($files as $f) {
    $base = basename($f);
    if ($base === 'index.php' || in_array($base, $exclude, true)) continue;

    if (preg_match('/^painting-.+-ma\.php$/', $base)) {
        $freq = 'monthly'; $prio = '0.8';           // city pages
    } elseif (in_array($base, ['interior-painting.php', 'exterior-painting.php',
        'general-carpentry.php', 'finish-carpentry.php', 'home-remodeling.php',
        'kitchen-remodeling.php', 'bathroom-remodeling.php'], true)) {
        $freq = 'monthly'; $prio = '0.9';           // service pages
    } elseif (in_array($base, ['tools.php', 'booking.php'], true)) {
        $freq = 'monthly'; $prio = '0.8';
    } else {
        $freq = 'monthly'; $prio = '0.7';           // service-areas etc.
    }
    $entries .= url_entry(SITE_URL . '/' . $base, filemtime($f), $freq, $prio);
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
echo $entries;
echo "</urlset>\n";
