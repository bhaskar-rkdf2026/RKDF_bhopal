<?php
// ============================================================
// RKDF University — Dynamic Homepage Sections Engine
// Fully connected to CMS Database (homepage_sections & homepage_items)
// Supports live CRUD updates from admin/manage_sections.php
// ============================================================
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/site_settings.php';

$cmsSections = [];
$cmsItems = [];
try {
    $pdo = getDbConnection();
    $stmtSec = $pdo->query("SELECT * FROM homepage_sections WHERE is_active = 1 ORDER BY sort_order ASC");
    while ($sec = $stmtSec->fetch(PDO::FETCH_ASSOC)) {
        $cmsSections[$sec['section_key']] = $sec;
    }
    $stmtItems = $pdo->query("SELECT * FROM homepage_items WHERE is_active = 1 ORDER BY sort_order ASC, id ASC");
    while ($item = $stmtItems->fetch(PDO::FETCH_ASSOC)) {
        $cmsItems[$item['section_key']][] = $item;
    }
} catch (Exception $e) { /* DB optional fallback */ }

$admYear = htmlspecialchars(get_site_setting('admission_year', '2026–27'));
$policyPdf = htmlspecialchars(get_site_setting('admission_policy_pdf', 'ADMISSION POLICY 2026-27.pdf'));
$feePdf = htmlspecialchars(get_site_setting('fee_structure_pdf', 'University_Fees_Structure.pdf'));
$prospectus = htmlspecialchars(get_site_setting('prospectus_pdf', 'Content/Documents/Prospectus  2024-25.pdf'));
?>

<!-- ══════════════════════════════════════════════════════════
  §1. HERO — Full viewport video + dynamic CMS title & CTAs
══════════════════════════════════════════════════════════ -->
<?php 
$heroSec = $cmsSections['hero'] ?? $cmsSections['sec_00_hero'] ?? null;
$heroTitle = $heroSec['title_main'] ?? 'Where heritage';
$heroAccent = $heroSec['title_accent'] ?? 'meets innovation.';
$heroEyebrow = $heroSec['tag_text'] ?? 'Est. 2011 · Bhopal, MP';
?>
<section class="rk-hero" id="hero">
  <div class="rk-hero-video-wrap">
    <video class="rk-hero-video" autoplay muted loop playsinline poster="images/lovable/rkdf-building-enhanced.jpg">
      <source src="images/lovable/rkdf-drone.mp4" type="video/mp4">
    </video>
  </div>
  <div class="rk-hero-overlay-gradient"></div>
  <div class="rk-hero-overlay-radial"></div>

  <div class="rk-hero-body">
    <div class="rk-hero-eyebrow">
      <span class="rk-gold-line"></span>
      <span style="font-family:var(--p-font-mono);font-size:11px;text-transform:uppercase;letter-spacing:0.28em;color:var(--p-gold);"><?= htmlspecialchars($heroEyebrow) ?></span>
    </div>

    <div class="rk-hero-foot">
      <h1 class="rk-hero-headline">
        <?= htmlspecialchars($heroTitle) ?> <br>
        <em style="font-style:italic;color:var(--p-gold);"><?= htmlspecialchars($heroAccent) ?></em>
      </h1>
      <div class="rk-hero-ctas">
        <a href="<?= $policyPdf ?>" target="_blank" class="rk-btn-gold">
          Apply Now — Admissions <?= $admYear ?>
          <span style="font-size:16px;">↗</span>
        </a>
        <a href="videogallery.php" class="rk-btn-outline-paper">
          <span style="display:inline-flex;align-items:center;gap:12px;">
            <span style="font-size:12px;">▶</span>
            Explore Campus
          </span>
          <span style="font-size:16px;">↗</span>
        </a>
      </div>
    </div>
  </div>
  <div class="rk-hero-scroll">Scroll</div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §2. STATS — 01 · The Institute in Numbers
══════════════════════════════════════════════════════════ -->
<?php
$sec1 = $cmsSections['sec_01_numbers'] ?? $cmsSections['stats'] ?? null;
$sec1Tag = $sec1['tag_text'] ?? '01 · The Institute in Numbers';
$sec1Title = $sec1['title_main'] ?? 'The Institute';
$sec1Accent = $sec1['title_accent'] ?? 'in Numbers';

$stats = [
  ['num'=>'100+',   'label'=>'Academic Programs'],
  ['num'=>'25,000+','label'=>'Enrolled Students'],
  ['num'=>'1,500+', 'label'=>'Expert Faculty'],
  ['num'=>'95%',    'label'=>'Placement Rate'],
  ['num'=>'50+',    'label'=>'Research Labs'],
  ['num'=>'40+',    'label'=>'Years of Legacy'],
];
$dbStats = $cmsItems['sec_01_numbers'] ?? $cmsItems['stats'] ?? [];
if (!empty($dbStats)) {
  $stats = [];
  foreach ($dbStats as $i) {
    $stats[] = ['num' => $i['number_val'] ?: $i['title'], 'label' => $i['subtitle'] ?: $i['text_val']];
  }
}
?>
<section class="rk-stats" id="stats">
  <div class="rk-container">
    <div class="rk-reveal" style="margin-bottom:56px;">
      <span class="rk-eyebrow"><?= htmlspecialchars($sec1Tag) ?></span>
    </div>
    <div class="rk-stats-grid">
      <?php foreach ($stats as $s): ?>
      <div class="rk-stat-item rk-reveal">
        <div class="rk-stat-num"><?= htmlspecialchars($s['num']) ?></div>
        <div class="rk-stat-label"><?= htmlspecialchars($s['label']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §3. ABOUT — 02 · The University
══════════════════════════════════════════════════════════ -->
<?php
$sec2 = $cmsSections['sec_02_university'] ?? $cmsSections['about'] ?? null;
$sec2Tag = $sec2['tag_text'] ?? '02 · The University';
$sec2Title = $sec2['title_main'] ?? 'A four-decade legacy,';
$sec2Accent = $sec2['title_accent'] ?? 'reimagined for the century ahead.';
$sec2Sub = $sec2['subtitle'] ?? 'RKDF University brings together eleven professional schools, thirty-five departments and a cross-disciplinary research culture — under a single unwavering commitment to intellectual rigour and public good.';

$timeline = [
  ['year'=>'1995', 'title'=>'Founding vision', 'desc'=>'RKDF Group commits to accessible, quality higher education in central India.'],
  ['year'=>'2011', 'title'=>'University status', 'desc'=>'Established as a private state university under the MP Act.'],
  ['year'=>'2017', 'title'=>'Research charter', 'desc'=>'50+ specialised labs, incubation cell and doctoral programs launched.'],
  ['year'=>'2024', 'title'=>'Global outlook', 'desc'=>'Partnerships across 12 countries, NAAC A+ reaccreditation.'],
];
$dbTimeline = $cmsItems['sec_02_university'] ?? $cmsItems['about'] ?? [];
if (!empty($dbTimeline)) {
  $timeline = [];
  foreach ($dbTimeline as $i) {
    $timeline[] = ['year'=>$i['number_val']?:'2026', 'title'=>$i['title'], 'desc'=>$i['subtitle']?:$i['text_val']];
  }
}
?>
<section class="rk-about" id="about">
  <div class="rk-container">
    <div class="rk-about-grid">
      <div class="rk-about-left">
        <div class="rk-reveal">
          <span class="rk-eyebrow"><?= htmlspecialchars($sec2Tag) ?></span>
          <h2 class="rk-h2" style="margin-top:24px;margin-bottom:24px;max-width:480px;">
            <?= htmlspecialchars($sec2Title) ?>
            <em class="rk-italic"><?= htmlspecialchars($sec2Accent) ?></em>
          </h2>
          <p style="color:rgba(12,20,36,0.7);font-size:17px;line-height:1.7;max-width:400px;margin-bottom:32px;">
            <?= htmlspecialchars($sec2Sub) ?>
          </p>
          <a href="About_Us.pdf" target="_blank" class="rk-link-underline">
            Read our story <span style="font-size:16px;">↗</span>
          </a>

          <div class="rk-timeline">
            <?php foreach ($timeline as $idx => $t): ?>
            <div class="rk-timeline-item rk-reveal rk-reveal-delay-<?= $idx % 4 ?>">
              <div class="rk-timeline-year"><?= htmlspecialchars($t['year']) ?></div>
              <div class="rk-timeline-title"><?= htmlspecialchars($t['title']) ?></div>
              <p class="rk-timeline-desc"><?= htmlspecialchars($t['desc']) ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="rk-reveal rk-reveal-delay-2">
        <div class="rk-about-img-wrap">
          <img src="images/lovable/rkdf-library.jpg" alt="Main library at RKDF University" loading="lazy">
          <div class="rk-about-img-overlay">
            <div class="rk-founder-label">Founder's Note</div>
            <p class="rk-founder-quote">
              "An education worth having is one that makes you useful — to yourself, and to a world in motion."
            </p>
            <div class="rk-founder-name">— Shri Sunil Kapoor, Chancellor</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §4. QUICK ACCESS — 03 · Student Gateway
══════════════════════════════════════════════════════════ -->
<?php
$sec3 = $cmsSections['sec_03_gateway'] ?? $cmsSections['gateway'] ?? null;
$sec3Tag = $sec3['tag_text'] ?? '03 · Student Gateway';
$sec3Title = $sec3['title_main'] ?? 'Everything you need,';
$sec3Accent = $sec3['title_accent'] ?? 'one click away.';

$gateways = [
  ['icon'=>'🎓','label'=>'Admissions','url'=>'admissionform.php'],
  ['icon'=>'📖','label'=>'Courses','url'=>'academic&departments.php'],
  ['icon'=>'💰','label'=>'Fee Structure','url'=>$feePdf],
  ['icon'=>'🏆','label'=>'Scholarships','url'=>'scholarship.php'],
  ['icon'=>'🛏','label'=>'Hostel','url'=>'Hostel.php'],
  ['icon'=>'📋','label'=>'Examinations','url'=>'examtimetable.php'],
  ['icon'=>'📄','label'=>'Results','url'=>'Result.php'],
  ['icon'=>'🏛','label'=>'Downloads','url'=>'Announcements.php'],
  ['icon'=>'🧭','label'=>'Virtual Tour','url'=>'videogallery.php'],
];
$dbGateways = $cmsItems['sec_03_gateway'] ?? $cmsItems['gateway'] ?? [];
if (!empty($dbGateways)) {
  $gateways = [];
  foreach ($dbGateways as $i) {
    $gateways[] = ['icon'=>$i['number_val']?:'🔗', 'label'=>$i['title'], 'url'=>$i['link_url']?:'#'];
  }
}
?>
<section class="rk-gateway" id="gateway">
  <div class="rk-container">
    <div class="rk-reveal" style="margin-bottom:40px;">
      <div style="display:flex;flex-direction:column;gap:16px;">
        <span class="rk-eyebrow"><?= htmlspecialchars($sec3Tag) ?></span>
        <h2 class="rk-h2" style="max-width:480px;">
          <?= htmlspecialchars($sec3Title) ?> <em class="rk-italic"><?= htmlspecialchars($sec3Accent) ?></em>
        </h2>
      </div>
    </div>

    <div class="rk-gateway-grid">
      <?php foreach ($gateways as $g): ?>
      <a href="<?= htmlspecialchars($g['url']) ?>" class="rk-gateway-card">
        <div class="rk-gateway-icon"><?= $g['icon'] ?></div>
        <div>
          <div class="rk-gateway-title"><?= htmlspecialchars($g['label']) ?></div>
          <span class="rk-gateway-arrow">↗</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §5. SCHOOLS — Eleven schools. One purpose.
══════════════════════════════════════════════════════════ -->
<?php
$sec4 = $cmsSections['sec_04_schools'] ?? $cmsSections['schools'] ?? null;
$sec4Tag = $sec4['tag_text'] ?? '04 · Schools & Faculties';
$sec4Title = $sec4['title_main'] ?? 'Eleven schools.';
$sec4Accent = $sec4['title_accent'] ?? 'One purpose.';

$schools = [
  ['name'=>'Engineering & Technology','img'=>'rkdf-engineering.jpg','tag'=>'12 programs','note'=>'Robotics · AI · Civil · Mech · CS','url'=>'Engineering.php','num'=>'01'],
  ['name'=>'Management Studies','img'=>'rkdf-management.jpg','tag'=>'9 programs','note'=>'MBA · BBA · Analytics · Finance','url'=>'Management.php','num'=>'02'],
  ['name'=>'Pharmaceutical Sciences','img'=>'rkdf-pharmacy.jpg','tag'=>'7 programs','note'=>'B.Pharm · M.Pharm · D.Pharm','url'=>'pharmacy.php','num'=>'03'],
  ['name'=>'Legal Studies','img'=>'rkdf-law.jpg','tag'=>'6 programs','note'=>'BA-LLB · LLM · Corporate Law','url'=>'Law.php','num'=>'04'],
  ['name'=>'Agriculture','img'=>'rkdf-agriculture.jpg','tag'=>'5 programs','note'=>'B.Sc · Horticulture · Agri-tech','url'=>'Agriculture.php','num'=>'05'],
  ['name'=>'Architecture & Design','img'=>'rkdf-architecture.jpg','tag'=>'4 programs','note'=>'B.Arch · Interior · Planning','url'=>'architect.php','num'=>'06'],
];
$dbSchools = $cmsItems['sec_04_schools'] ?? $cmsItems['schools'] ?? [];
if (!empty($dbSchools)) {
  $schools = [];
  foreach ($dbSchools as $idx => $i) {
    $schools[] = [
      'name' => $i['title'],
      'img'  => $i['image_path'] ?: 'rkdf-engineering.jpg',
      'tag'  => $i['badge_text'] ?: 'Degree Programs',
      'note' => $i['subtitle'] ?: $i['text_val'],
      'url'  => $i['link_url'] ?: 'academic&departments.php',
      'num'  => sprintf("%02d", $idx + 1)
    ];
  }
}
?>
<section class="rk-schools" id="academics">
  <div class="rk-container" style="padding-bottom:0;">
    <div style="display:flex;align-items:flex-end;justify-content:space-between;gap:32px;margin-bottom:64px;flex-wrap:wrap;">
      <div class="rk-reveal">
        <span class="rk-eyebrow" style="margin-bottom:24px;display:block;"><?= htmlspecialchars($sec4Tag) ?></span>
        <h2 style="font-family:var(--p-font-serif);font-size:clamp(3rem,6vw,5.5rem);color:var(--p-navy-deep);line-height:0.98;letter-spacing:-0.02em;max-width:560px;">
          <?= htmlspecialchars($sec4Title) ?> <em style="font-style:italic;"><?= htmlspecialchars($sec4Accent) ?></em>
        </h2>
      </div>
      <div class="rk-reveal rk-reveal-delay-2" style="display:flex;align-items:center;gap:12px;color:rgba(12,20,36,0.6);font-size:12px;text-transform:uppercase;letter-spacing:0.25em;font-family:var(--p-font-mono);">
        <span>Drag to explore</span> <span style="font-size:16px;">›</span>
      </div>
    </div>
  </div>

  <div style="padding-left:clamp(24px,4vw,40px);">
    <div class="rk-schools-rail no-scrollbar">
      <?php foreach ($schools as $i => $s): ?>
      <a href="<?= htmlspecialchars($s['url']) ?>" class="rk-school-card rk-reveal" style="animation-delay:<?= $i*0.06 ?>s;">
        <div class="rk-school-img-wrap">
          <img src="<?= (strpos($s['img'], '/') !== false) ? htmlspecialchars($s['img']) : 'images/lovable/' . htmlspecialchars($s['img']) ?>" alt="<?= htmlspecialchars($s['name']) ?>" loading="lazy">
          <div class="rk-school-img-overlay"></div>
          <div class="rk-school-badge-num"><?= $s['num'] ?></div>
          <div class="rk-school-badge-tag"><?= htmlspecialchars($s['tag']) ?></div>
          <div class="rk-school-info">
            <div class="rk-school-name"><?= htmlspecialchars($s['name']) ?></div>
            <div class="rk-school-note"><?= htmlspecialchars($s['note']) ?></div>
          </div>
        </div>
        <div class="rk-school-foot">
          <span class="rk-school-explore">Explore school</span>
          <span style="font-size:16px;color:rgba(12,20,36,0.6);">↗</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §6. WHY RKDF — 05 · A university built around the student.
══════════════════════════════════════════════════════════ -->
<?php
$sec5 = $cmsSections['sec_05_why'] ?? $cmsSections['why'] ?? null;
$sec5Tag = $sec5['tag_text'] ?? '05 · Why RKDF';
$sec5Title = $sec5['title_main'] ?? 'A university built around the';
$sec5Accent = $sec5['title_accent'] ?? 'student.';
$sec5Sub = $sec5['subtitle'] ?? 'Everything from our teaching philosophy to our campus design is calibrated for one outcome — graduates who leave here more prepared, more curious, and more useful than when they arrived.';

$pillars = [
  ['num'=>'01','title'=>'Interdisciplinary By Design','desc'=>'Combine engineering with management, law with public policy, or pharmacy with data science under a single credit framework.'],
  ['num'=>'02','title'=>'Research From Day One','desc'=>'Undergraduates publish papers, build prototypes and work alongside senior scholars in our 50+ research labs.'],
  ['num'=>'03','title'=>'Industry-Embedded Learning','desc'=>'Curricula codesigned with enterprise partners, guaranteed summer internships and live industry capstone projects.'],
  ['num'=>'04','title'=>'Public Good Focus','desc'=>'Community outreach, rural health camps and sustainability projects integrated into the formal degree curriculum.'],
];
$dbPillars = $cmsItems['sec_05_why'] ?? $cmsItems['why'] ?? [];
if (!empty($dbPillars)) {
  $pillars = [];
  foreach ($dbPillars as $idx => $i) {
    $pillars[] = [
      'num' => sprintf("%02d", $idx + 1),
      'title' => $i['title'],
      'desc' => $i['subtitle'] ?: $i['text_val']
    ];
  }
}
?>
<section class="rk-why" id="why">
  <div class="rk-why-bg"><img src="images/lovable/rkdf-why-bg.jpg" alt="" loading="lazy"></div>
  <div class="rk-why-overlay"></div>
  <div class="rk-why-overlay-grad"></div>

  <div class="rk-container" style="position:relative;">
    <div style="display:grid;gap:32px;margin-bottom:56px;" class="why-header-grid">
      <div class="rk-reveal">
        <span class="rk-eyebrow tone-gold" style="margin-bottom:20px;display:block;"><?= htmlspecialchars($sec5Tag) ?></span>
        <h2 style="font-family:var(--p-font-serif);font-size:clamp(2.5rem,5vw,4.5rem);line-height:1.02;color:var(--p-paper);text-shadow:0 2px 12px rgba(0,0,0,0.5);max-width:480px;">
          <?= htmlspecialchars($sec5Title) ?> <em style="font-style:italic;color:var(--p-gold);"><?= htmlspecialchars($sec5Accent) ?></em>
        </h2>
      </div>
      <div class="rk-reveal rk-reveal-delay-2">
        <p style="color:rgba(250,249,246,0.85);font-size:17px;line-height:1.7;max-width:480px;text-shadow:0 1px 8px rgba(0,0,0,0.5);">
          <?= htmlspecialchars($sec5Sub) ?>
        </p>
      </div>
    </div>

    <div class="rk-why-grid">
      <?php foreach ($pillars as $idx => $p): ?>
      <div class="rk-why-card rk-reveal rk-reveal-delay-<?= $idx % 4 ?>">
        <div class="rk-why-num"><?= $p['num'] ?></div>
        <div class="rk-why-title"><?= htmlspecialchars($p['title']) ?></div>
        <p class="rk-why-desc"><?= htmlspecialchars($p['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
