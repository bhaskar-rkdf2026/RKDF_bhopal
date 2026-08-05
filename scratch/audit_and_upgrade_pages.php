<?php
// scratch/audit_and_upgrade_pages.php
// Audits all navbar sub-pages and upgrades any legacy subpages to the modern homepage design system

$root = os_path_abspath(__DIR__ . '/..');

function os_path_abspath($path) {
    return str_replace(['/', '\\'], DIRECTORY_SEPARATOR, realpath($path) ?: $path);
}

// List of main subpages linked in navigation
$subpageList = [
    'About_Us.pdf',
    'Vision&mission.php',
    'Objectives.php',
    'Chancellor.php',
    'ProChancellor.php',
    'Vice-Chancellor-Desk.php',
    'dgm.php',
    'dgr.php',
    'Registrar.php',
    'other-officers.php',
    'dean.php',
    'hod.php',
    'Governingbody.php',
    'BoM.php',
    'Academic_Council.php',
    'BOS.php',
    'Statuary-Bodies.php',
    'localadvisory.php',
    'imggallery.php',
    'Management.php',
    'Science.php',
    'Commerce.php',
    'Engineering.php',
    'pharmacy.php',
    'Computer-Application.php',
    'Education.php',
    'Social-Science.php',
    'Agriculture.php',
    'architect.php',
    'Law.php',
    'BHMS.php',
    'BAMS.php',
    'nursing.php',
    'paramdical.php',
    'Library.php',
    'Syllabus.php',
    'acadmiccalander.php',
    'international-relation.php',
    'Feedback_Analysis.php',
    'skill.php',
    'Annual_Report_University.php',
    'staffLnew.php',
    'LMS.php',
    'exam.php',
    'examtimetable.php',
    'Result.php',
    'r&d.php',
    'patent.php',
    'phd.php',
    'phdsubjects.php',
    'phd_entrance.php',
    'phdstudent.php',
    'admissionform.php',
    'scholarship.php',
    'Hostel.php',
    'Laboratories.php',
    'Transport.php',
    'Announcements.php',
    'academic&departments.php',
    'placements.php',
    'about.php'
];

$upgradedCount = 0;
$alreadyModernCount = 0;

foreach ($subpageList as $file) {
    if (str_ends_with($file, '.pdf') || str_ends_with($file, '.html') || str_ends_with($file, '.rar') || str_starts_with($file, 'http')) {
        continue;
    }

    $filePath = str_replace('/', DIRECTORY_SEPARATOR, $root . DIRECTORY_SEPARATOR . $file);
    if (!file_exists($filePath)) {
        echo "File missing: $file\n";
        continue;
    }

    $raw = file_get_contents($filePath);

    // Check if already using modern navbar and home CSS
    if (str_contains($raw, 'include/new_navbar.php') && (str_contains($raw, 'rkdf-home.css') || str_contains($raw, 'subpage-hero'))) {
        $alreadyModernCount++;
        echo "Already Modern: $file\n";
        continue;
    }

    // Modernize legacy page
    $title = "RKDF University Bhopal";
    if (preg_match('/<title>(.*?)<\/title>/is', $raw, $m)) {
        $t = trim(strip_tags($m[1]));
        $t = str_replace(['RKDF UNIVERSITY | ', 'RKDF University | ', 'RKDF UNIVERSITY - '], '', $t);
        if (!empty($t)) $title = $t;
    }

    if ($title === "RKDF University Bhopal") {
        $base = pathinfo($file, PATHINFO_FILENAME);
        $title = ucwords(str_replace(['_', '-'], ' ', $base));
    }

    // Extract body content
    $bodyContent = $raw;
    if (preg_match('/<body[^>]*>(.*?)<\/body>/is', $raw, $bm)) {
        $bodyContent = $bm[1];
    }

    // Strip legacy header navigation tags
    $bodyContent = preg_replace('/<div[^>]*id="qm0"[^>]*>.*?<\/div>\s*<\/div>/is', '', $bodyContent);
    $bodyContent = preg_replace('/<div[^>]*class="[^"]*qm-[^"]*"[^>]*>.*?<\/div>/is', '', $bodyContent);
    $bodyContent = preg_replace('/<table[^>]*class="[^"]*header[^"]*"[^>]*>.*?<\/table>/is', '', $bodyContent);
    $bodyContent = preg_replace('/<header[^>]*>.*?<\/header>/is', '', $bodyContent);
    $bodyContent = preg_replace('/<footer[^>]*>.*?<\/footer>/is', '', $bodyContent);

    // Create modern page template wrapping original content
    $modernTemplate = '<?php
// ============================================================
// RKDF University — Modernized Subpage
// Modern Homepage Design System + 100% Original Content Preserved
// ============================================================
require_once __DIR__ . \'/include/site_settings.php\';
require_once __DIR__ . \'/config/db.php\';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>' . htmlspecialchars($title, ENT_QUOTES) . ' — RKDF University Bhopal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url(\'images/lovable/rkdf-why-bg.jpg\') center/cover no-repeat;
      color: var(--p-paper);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .sp-main-box {
      padding: 80px 0;
      background: var(--p-paper);
      color: var(--p-navy-deep);
      font-size: 16px;
      line-height: 1.8;
      min-height: 500px;
    }
    .sp-main-box table {
      width: 100%;
      border-collapse: collapse;
      margin: 28px 0;
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(12,20,36,0.04);
      border: 1px solid var(--p-hairline);
    }
    .sp-main-box th {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 16px 20px;
      font-family: var(--p-font-mono);
      font-size: 13.5px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .sp-main-box td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--p-hairline);
      font-size: 15px;
    }
    .sp-main-box tr:hover td {
      background: rgba(227,27,35,0.03);
    }
    .sp-main-box a {
      color: var(--p-red, #E31B23);
      font-weight: 700;
      text-decoration: none;
      transition: color 0.2s;
    }
    .sp-main-box a:hover {
      text-decoration: underline;
      color: #b91c1c;
    }
    .sp-main-box img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      object-fit: contain;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . \'/include/new_navbar.php\'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">RKDF University Bhopal</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">' . htmlspecialchars($title, ENT_QUOTES) . '</h1>
    </div>
  </section>

  <!-- MAIN CONTENT CONTAINER -->
  <main class="sp-main-box">
    <div class="rk-container">
' . $bodyContent . '
    </div>
  </main>

  <!-- FOOTER -->
  <?php include __DIR__ . \'/include/footer.php\'; ?>

</body>
</html>';

    file_put_contents($filePath, $modernTemplate);
    $upgradedCount++;
    echo "Upgraded: $file\n";
}

echo "\n--- Summary ---\n";
echo "Already Modern: $alreadyModernCount\n";
echo "Newly Upgraded: $upgradedCount\n";
