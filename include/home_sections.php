<?php
// ============================================================
// RKDF University — Dynamic Homepage Sections Engine
// 100% CMS Connected to DB (homepage_sections & homepage_items)
// 17 Sequential Sections (sec_00_hero to sec_16_final_cta)
// ============================================================
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/site_settings.php';

$cmsSections = [];
$cmsItems = [];
try {
    $pdo = getDbConnection();
    if ($pdo) {
        $stmtSec = $pdo->query("SELECT * FROM homepage_sections WHERE is_active = 1 ORDER BY sort_order ASC");
        if ($stmtSec) {
            while ($sec = $stmtSec->fetch(PDO::FETCH_ASSOC)) {
                $cmsSections[$sec['section_key']] = $sec;
            }
        }
        $stmtItems = $pdo->query("SELECT * FROM homepage_items WHERE is_active = 1 ORDER BY sort_order ASC, id ASC");
        if ($stmtItems) {
            while ($item = $stmtItems->fetch(PDO::FETCH_ASSOC)) {
                $cmsItems[$item['section_key']][] = $item;
            }
        }
    }
} catch (Throwable $e) { /* DB optional fallback */ }

// Helper function to format eyebrow tag text with section number
if (!function_exists('format_eyebrow_tag')) {
    function format_eyebrow_tag($sec) {
        $tagNum = $sec['tag_number'] ?? '';
        $tagText = $sec['tag_text'] ?? '';
        if (empty($tagNum)) return htmlspecialchars($tagText);
        // If tag_text already contains tag_number, return as is
        if (strpos($tagText, $tagNum) !== false) return htmlspecialchars($tagText);
        return htmlspecialchars($tagNum . ' · ' . $tagText);
    }
}

// Helper function to extract numeric target for counter animation
if (!function_exists('extract_numeric_target')) {
    function extract_numeric_target($val) {
        $clean = preg_replace('/[^0-9.]/', '', $val);
        $num = (float)$clean;
        if (stripos($val, 'k') !== false) {
            $num *= 1000;
        }
        return $num;
    }
}

$admYear = htmlspecialchars(get_site_setting('admission_year', '2026–27'));
$policyPdf = htmlspecialchars(get_site_setting('admission_policy_pdf', 'ADMISSION POLICY 2026-27.pdf'));
$feePdf = htmlspecialchars(get_site_setting('fee_structure_pdf', 'University_Fees_Structure.pdf'));
$prospectus = htmlspecialchars(get_site_setting('prospectus_pdf', 'Content/Documents/Prospectus  2024-25.pdf'));
?>

<!-- ══════════════════════════════════════════════════════════
  §00. HERO BANNER
══════════════════════════════════════════════════════════ -->
<?php
$sec0 = $cmsSections['sec_00_hero'] ?? null;
if (!$sec0 || ($sec0['is_active'] ?? 1)):
  $heroTitle   = $sec0['title_main']   ?? 'Where heritage';
  $heroAccent  = $sec0['title_accent'] ?? 'meets innovation.';
  $heroEyebrow = $sec0['tag_text']     ?? 'EST. 2011 · BHOPAL, MP';
  $heroVideo   = !empty($sec0['video_path']) ? $sec0['video_path'] : 'images/lovable/rkdf-drone.mp4';
  $heroPoster  = !empty($sec0['image_path']) ? $sec0['image_path'] : 'images/lovable/rkdf-building-enhanced.jpg';

  $dbHeroItems = $cmsItems['sec_00_hero'] ?? [];
  $heroBtn1Text = $sec0['extra_text_1'] ?? "APPLY NOW — ADMISSIONS $admYear";
  $heroBtn1Url  = "admissionform.php";
  $heroBtn2Text = $sec0['extra_text_2'] ?? "EXPLORE CAMPUS";
  $heroBtn2Url  = "videogallery.php";

  if (!empty($dbHeroItems[0])) {
      $heroBtn1Text = $dbHeroItems[0]['title'] ?: $heroBtn1Text;
      $heroBtn1Url  = $dbHeroItems[0]['link_url'] ?: $heroBtn1Url;
  }
  if (!empty($dbHeroItems[1])) {
      $heroBtn2Text = $dbHeroItems[1]['title'] ?: $heroBtn2Text;
      $heroBtn2Url  = $dbHeroItems[1]['link_url'] ?: $heroBtn2Url;
  }
?>
<section class="rk-hero" id="hero">
  <div class="rk-hero-video-wrap">
    <video class="rk-hero-video" autoplay muted loop playsinline poster="<?= htmlspecialchars($heroPoster) ?>">
      <source src="<?= htmlspecialchars($heroVideo) ?>" type="video/mp4">
    </video>
  </div>
  <div class="rk-hero-overlay-gradient"></div>
  <div class="rk-hero-overlay-radial"></div>

  <div class="rk-hero-body">
    <div class="rk-hero-eyebrow">
      <span class="rk-gold-line"></span>
      <span class="rk-eyebrow-mono"><?= htmlspecialchars($heroEyebrow) ?></span>
    </div>

    <div class="rk-hero-foot">
      <h1 class="rk-hero-headline">
        <?= htmlspecialchars($heroTitle) ?><br>
        <em class="rk-italic-gold"><?= htmlspecialchars($heroAccent) ?></em>
      </h1>
      <div class="rk-hero-ctas">
        <a href="<?= htmlspecialchars($heroBtn1Url) ?>" class="rk-btn-gold rk-hero-apply">
          <?= htmlspecialchars($heroBtn1Text) ?>
          <span class="rk-btn-arrow">↗</span>
        </a>
        <a href="<?= htmlspecialchars($heroBtn2Url) ?>" class="rk-btn-outline-paper rk-hero-explore">
          <span class="rk-explore-inner">
            <span class="rk-play-icon">▶</span>
            <?= htmlspecialchars($heroBtn2Text) ?>
          </span>
          <span class="rk-btn-arrow">↗</span>
        </a>
      </div>
    </div>
  </div>
  <div class="rk-hero-scroll-ind">
    <span>Scroll</span>
    <span class="rk-scroll-line"></span>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §01. NUMBERS — Institute in Numbers
══════════════════════════════════════════════════════════ -->
<?php
$sec1 = $cmsSections['sec_01_numbers'] ?? null;
if (!$sec1 || ($sec1['is_active'] ?? 1)):
  $sec1Tag = format_eyebrow_tag($sec1 ?: ['tag_number'=>'01','tag_text'=>'THE INSTITUTE IN NUMBERS']);
  $stats = [
    ['num'=>'100+',  'label'=>'Academic Programs',  'to'=>100],
    ['num'=>'25k+',  'label'=>'Enrolled Students',  'to'=>25000],
    ['num'=>'1.5k+', 'label'=>'Expert Faculty',     'to'=>1500],
    ['num'=>'95%',   'label'=>'Placement Rate',      'to'=>95],
    ['num'=>'50+',   'label'=>'Research Labs',       'to'=>50],
    ['num'=>'40+',   'label'=>'Years of Legacy',     'to'=>40],
  ];
  $dbStats = $cmsItems['sec_01_numbers'] ?? [];
  if (!empty($dbStats)) {
    $stats = [];
    foreach ($dbStats as $i) {
      $valStr = $i['number_val'] ?: $i['title'];
      $stats[] = [
        'num'   => $valStr,
        'label' => strtoupper($i['subtitle'] ?: $i['text_val'] ?: $i['title']),
        'to'    => extract_numeric_target($valStr)
      ];
    }
  }
?>
<section class="rk-stats" id="stats">
  <div class="rk-container">
    <div class="rk-eyebrow rk-reveal">
      <?= $sec1Tag ?>
    </div>
    <div class="rk-stats-grid">
      <?php foreach ($stats as $idx => $s): ?>
      <div class="rk-stat-item rk-reveal" style="--delay:<?= $idx * 0.08 ?>s">
        <div class="rk-stat-border-top"></div>
        <div class="rk-stat-num rk-count-up" data-target="<?= $s['to'] ?>"><?= htmlspecialchars($s['num']) ?></div>
        <div class="rk-stat-label"><?= htmlspecialchars($s['label']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §02. UNIVERSITY — About RKDF & Timeline
══════════════════════════════════════════════════════════ -->
<?php
$sec2 = $cmsSections['sec_02_university'] ?? null;
if (!$sec2 || ($sec2['is_active'] ?? 1)):
  $sec2Tag    = format_eyebrow_tag($sec2 ?: ['tag_number'=>'02','tag_text'=>'THE UNIVERSITY']);
  $sec2Title  = $sec2['title_main']   ?? 'A four-decade legacy,';
  $sec2Accent = $sec2['title_accent'] ?? 'reimagined';
  $sec2Sub    = $sec2['subtitle']     ?? 'RKDF University brings together eleven professional schools, thirty-five departments and a cross-disciplinary research culture.';
  $sec2Img    = !empty($sec2['image_path']) ? $sec2['image_path'] : 'images/lovable/rkdf-library.jpg';
  $sec2Quote  = !empty($sec2['extra_text_1']) ? $sec2['extra_text_1'] : '"An education worth having is one that makes you useful — to yourself, and to a world in motion."';
  $sec2Name   = !empty($sec2['extra_text_2']) ? $sec2['extra_text_2'] : '— Shri Sunil Kapoor, Chancellor';

  $timeline = [
    ['year'=>'1995', 'title'=>'Founding vision',    'desc'=>'RKDF Group commits to accessible, quality higher education in central India.'],
    ['year'=>'2011', 'title'=>'University status',  'desc'=>'Established as a private state university under the MP Act.'],
    ['year'=>'2017', 'title'=>'Research charter',   'desc'=>'50+ specialised labs, incubation cell and doctoral programs launched.'],
    ['year'=>'2024', 'title'=>'Global outlook',     'desc'=>'Partnerships across 12 countries, NAAC reaccreditation.'],
  ];
  $dbTimeline = $cmsItems['sec_02_university'] ?? [];
  if (!empty($dbTimeline)) {
    $timeline = [];
    foreach ($dbTimeline as $i) {
      $timeline[] = ['year'=>$i['number_val']?:'2026', 'title'=>$i['title'], 'desc'=>$i['subtitle']?:$i['text_val']];
    }
  }
?>
<section class="rk-about" id="about">
  <div class="rk-container">
    <div class="rk-about-12col">
      <!-- Left sticky col -->
      <div class="rk-about-left rk-reveal">
        <div class="rk-eyebrow"><?= $sec2Tag ?></div>
        <h2 class="rk-about-h2">
          <?= htmlspecialchars($sec2Title) ?> <em class="rk-italic"><?= htmlspecialchars($sec2Accent) ?></em>
        </h2>
        <p class="rk-about-sub"><?= htmlspecialchars($sec2Sub) ?></p>
        <a href="About_Us.pdf" target="_blank" class="rk-link-arrow">
          Read our story <span>↗</span>
        </a>
        <div class="rk-timeline-2col">
          <?php foreach ($timeline as $t): ?>
          <div class="rk-timeline-entry">
            <div class="rk-timeline-top-border"></div>
            <div class="rk-timeline-head">
              <span class="rk-timeline-year-mono"><?= htmlspecialchars($t['year']) ?></span>
              <span class="rk-timeline-title-serif"><?= htmlspecialchars($t['title']) ?></span>
            </div>
            <p class="rk-timeline-desc"><?= htmlspecialchars($t['desc']) ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right image col -->
      <div class="rk-reveal" style="--delay:0.15s">
        <div class="rk-about-img-frame">
          <img src="<?= (strpos($sec2Img, '/') !== false) ? htmlspecialchars($sec2Img) : 'images/lovable/' . htmlspecialchars($sec2Img) ?>" alt="RKDF University" loading="lazy">
          <div class="rk-about-img-overlay">
            <div class="rk-founder-label">Founder's Note</div>
            <p class="rk-founder-quote"><?= htmlspecialchars($sec2Quote) ?></p>
            <div class="rk-founder-name"><?= htmlspecialchars($sec2Name) ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §02B. ACADEMIC LEADERSHIP — Chancellor, VC & Governor Messages
══════════════════════════════════════════════════════════ -->
<?php
$secLead = $cmsSections['sec_02_leadership'] ?? null;
if (!$secLead || ($secLead['is_active'] ?? 1)):
  $secLeadTag   = format_eyebrow_tag($secLead ?: ['tag_number'=>'02B','tag_text'=>'ACADEMIC LEADERSHIP']);
  $secLeadTitle = $secLead['title_main']   ?? 'Guiding vision &';
  $secLeadAccent= $secLead['title_accent'] ?? 'leadership.';
  $secLeadSub   = $secLead['subtitle']     ?? 'Inspiring mentorship from our Chancellor, Vice-Chancellor and Hon\'ble Governor of MP.';

  $leaders = $cmsItems['sec_02_leadership'] ?? [];
?>
<section class="rk-leadership" id="leadership" style="background:#ffffff;padding:80px 0;border-top:1px solid #e2e8f0;border-bottom:1px solid #e2e8f0;">
  <div class="rk-container">
    <div class="rk-section-header rk-reveal">
      <div>
        <div class="rk-eyebrow" style="color:#C5A059;font-weight:700;font-family:'JetBrains Mono',monospace;font-size:12px;"><?= $secLeadTag ?></div>
        <h2 class="rk-h2-xl" style="margin-top:12px;color:#0C1424;font-family:'Instrument Serif',Georgia,serif;">
          <?= htmlspecialchars($secLeadTitle) ?> <em class="rk-italic" style="color:#E31B23;"><?= htmlspecialchars($secLeadAccent) ?></em>
        </h2>
      </div>
      <p class="rk-section-sub" style="color:#475569;font-size:16px;max-width:540px;"><?= htmlspecialchars($secLeadSub) ?></p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:28px;margin-top:40px;">
      <?php foreach ($leaders as $l): ?>
      <div class="rk-reveal" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:16px;padding:32px;box-shadow:0 6px 20px rgba(12,20,36,0.04);display:flex;flex-direction:column;justify-content:space-between;transition:all 0.3s ease;">
        <div>
          <div style="display:flex;align-items:center;gap:18px;margin-bottom:20px;">
            <img src="<?= htmlspecialchars($l['image_path'] ?: 'images/rkdflogo.JPG') ?>" alt="<?= htmlspecialchars($l['title']) ?>" style="width:72px;height:72px;border-radius:50%;object-fit:cover;border:2px solid #C5A059;box-shadow:0 4px 12px rgba(0,0,0,0.1);" onError="this.src='images/rkdflogo.JPG';">
            <div>
              <span style="font-family:'JetBrains Mono',monospace;font-size:10px;font-weight:700;color:#E31B23;background:rgba(227,27,35,0.08);padding:3px 8px;border-radius:99px;"><?= htmlspecialchars($l['badge_text'] ?: 'LEADERSHIP') ?></span>
              <h3 style="font-size:19px;font-weight:800;color:#0C1424;margin-top:4px;margin-bottom:2px;"><?= htmlspecialchars($l['title']) ?></h3>
              <div style="font-size:13px;color:#64748b;font-weight:500;"><?= htmlspecialchars($l['subtitle']) ?></div>
            </div>
          </div>
          <p style="font-size:14.5px;color:#334155;line-height:1.7;font-style:italic;margin-bottom:24px;">
            "<?= htmlspecialchars($l['text_val']) ?>"
          </p>
        </div>
        <div>
          <?php if (!empty($l['link_url'])): ?>
          <a href="<?= htmlspecialchars($l['link_url']) ?>" class="rk-link-arrow" style="font-weight:700;color:#0C1424;text-decoration:none;">Read Full Message <span>↗</span></a>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §03. GATEWAY — Student Gateway
══════════════════════════════════════════════════════════ -->
<?php
$sec3 = $cmsSections['sec_03_gateway'] ?? null;
if (!$sec3 || ($sec3['is_active'] ?? 1)):
  $sec3Tag    = format_eyebrow_tag($sec3 ?: ['tag_number'=>'03','tag_text'=>'STUDENT GATEWAY']);
  $sec3Title  = $sec3['title_main']   ?? 'Everything you need,';
  $sec3Accent = $sec3['title_accent'] ?? 'one click away.';
  $sec3Sub    = $sec3['subtitle']     ?? 'Quick links to the tools, portals and resources students, parents and applicants reach for most.';

  $gateways = [
    ['icon'=>'🎓','label'=>'Admissions',   'url'=>'admissionform.php'],
    ['icon'=>'📖','label'=>'Courses',      'url'=>'academic&departments.php'],
    ['icon'=>'💰','label'=>'Fee Structure','url'=>$feePdf],
    ['icon'=>'🏆','label'=>'Scholarships', 'url'=>'scholarship.php'],
    ['icon'=>'🛏','label'=>'Hostel',       'url'=>'Hostel.php'],
    ['icon'=>'📋','label'=>'Examinations', 'url'=>'examtimetable.php'],
    ['icon'=>'📄','label'=>'Results',      'url'=>'Result.php'],
    ['icon'=>'🏛','label'=>'Downloads',    'url'=>'Announcements.php'],
    ['icon'=>'🧭','label'=>'Virtual Tour', 'url'=>'videogallery.php'],
  ];
  $dbGateways = $cmsItems['sec_03_gateway'] ?? [];
  if (!empty($dbGateways)) {
    $gateways = [];
    foreach ($dbGateways as $i) {
      $gateways[] = ['icon'=>$i['number_val']?:'🔗', 'label'=>$i['title'], 'url'=>$i['link_url']?:'#'];
    }
  }
?>
<section class="rk-gateway" id="gateway">
  <div class="rk-container">
    <div class="rk-section-header rk-reveal">
      <div>
        <div class="rk-eyebrow"><?= $sec3Tag ?></div>
        <h2 class="rk-h2-xl" style="margin-top:16px;">
          <?= htmlspecialchars($sec3Title) ?> <em class="rk-italic"><?= htmlspecialchars($sec3Accent) ?></em>
        </h2>
      </div>
      <p class="rk-section-sub"><?= htmlspecialchars($sec3Sub) ?></p>
    </div>

    <div class="rk-gateway-9col">
      <?php foreach ($gateways as $idx => $g): ?>
      <a href="<?= htmlspecialchars($g['url']) ?>" class="rk-gw-card rk-reveal" style="--delay:<?= $idx * 0.04 ?>s">
        <div class="rk-gw-icon"><?= $g['icon'] ?></div>
        <div class="rk-gw-bottom">
          <div class="rk-gw-label"><?= htmlspecialchars($g['label']) ?></div>
          <span class="rk-gw-arrow">↗</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §04. SCHOOLS — Schools & Faculties Rail
══════════════════════════════════════════════════════════ -->
<?php
$sec4 = $cmsSections['sec_04_schools'] ?? null;
if (!$sec4 || ($sec4['is_active'] ?? 1)):
  $sec4Tag         = format_eyebrow_tag($sec4 ?: ['tag_number'=>'04','tag_text'=>'SCHOOLS & FACULTIES']);
  $sec4Title       = $sec4['title_main']   ?? 'Eleven schools.';
  $sec4Accent      = $sec4['title_accent'] ?? 'One purpose.';
  $sec4DragText    = !empty($sec4['extra_text_1']) ? $sec4['extra_text_1'] : 'DRAG TO EXPLORE';
  $sec4ExploreText = !empty($sec4['extra_text_2']) ? $sec4['extra_text_2'] : 'Explore school';

  $schools = [
    ['name'=>'Engineering & Technology',  'img'=>'rkdf-engineering.jpg',  'tag'=>'12 PROGRAMS', 'note'=>'Robotics · AI · Civil · Mech · CS',  'url'=>'Engineering.php', 'num'=>'01'],
    ['name'=>'Management Studies',        'img'=>'rkdf-management.jpg',   'tag'=>'9 PROGRAMS',  'note'=>'MBA · BBA · Analytics · Finance',    'url'=>'Management.php',  'num'=>'02'],
    ['name'=>'Pharmaceutical Sciences',   'img'=>'rkdf-pharmacy.jpg',     'tag'=>'7 PROGRAMS',  'note'=>'B.Pharm · M.Pharm · D.Pharm',        'url'=>'pharmacy.php',    'num'=>'03'],
    ['name'=>'Legal Studies',             'img'=>'rkdf-law.jpg',          'tag'=>'6 PROGRAMS',  'note'=>'BA-LLB · LLM · Corporate Law',       'url'=>'Law.php',         'num'=>'04'],
    ['name'=>'Agriculture',               'img'=>'rkdf-agriculture.jpg',  'tag'=>'5 PROGRAMS',  'note'=>'B.Sc · Horticulture · Agri-tech',    'url'=>'Agriculture.php', 'num'=>'05'],
    ['name'=>'Architecture & Design',     'img'=>'rkdf-architecture.jpg', 'tag'=>'4 PROGRAMS',  'note'=>'B.Arch · Interior · Planning',       'url'=>'architect.php',   'num'=>'06'],
  ];
  $dbSchools = $cmsItems['sec_04_schools'] ?? [];
  if (!empty($dbSchools)) {
    $schools = [];
    foreach ($dbSchools as $idx => $i) {
      $schools[] = [
        'name' => $i['title'],
        'img'  => $i['image_path'] ?: 'rkdf-engineering.jpg',
        'tag'  => strtoupper($i['badge_text'] ?: 'DEGREE PROGRAMS'),
        'note' => $i['subtitle'] ?: $i['text_val'],
        'url'  => $i['link_url'] ?: 'academic&departments.php',
        'num'  => sprintf("%02d", $idx + 1)
      ];
    }
  }
?>
<section class="rk-schools" id="academics">
  <div class="rk-container" style="padding-bottom:0;">
    <div class="rk-section-header rk-reveal">
      <div>
        <div class="rk-eyebrow"><?= $sec4Tag ?></div>
        <h2 class="rk-h2-huge" style="margin-top:16px;">
          <?= htmlspecialchars($sec4Title) ?> <em class="rk-italic-plain"><?= htmlspecialchars($sec4Accent) ?></em>
        </h2>
      </div>
      <div class="rk-slider-header-controls" style="display:flex;align-items:center;gap:16px;">
        <div class="rk-drag-hint rk-reveal" style="--delay:0.15s">
          <span><?= htmlspecialchars($sec4DragText) ?></span>
          <span class="rk-chevron">›</span>
        </div>
        <div class="rk-slider-nav-btns" style="display:flex;gap:8px;">
          <button type="button" class="rk-slider-btn rk-slider-prev" id="sec4-prev" aria-label="Previous School">‹</button>
          <button type="button" class="rk-slider-btn rk-slider-next" id="sec4-next" aria-label="Next School">›</button>
        </div>
      </div>
    </div>
  </div>

  <div class="rk-schools-outer">
    <div class="rk-schools-rail no-scrollbar" id="sec4-rail">
      <?php foreach ($schools as $i => $s): ?>
      <a href="<?= htmlspecialchars($s['url']) ?>" class="rk-school-card rk-reveal" style="--delay:<?= $i * 0.06 ?>s">
        <div class="rk-school-aspect">
          <img src="<?= (strpos($s['img'], '/') !== false) ? htmlspecialchars($s['img']) : 'images/lovable/' . htmlspecialchars($s['img']) ?>" alt="<?= htmlspecialchars($s['name']) ?>" loading="lazy">
          <div class="rk-school-overlay"></div>
          <div class="rk-school-top-badges">
            <span class="rk-school-num-mono">0<?= $i+1 ?></span>
            <span class="rk-school-tag-badge"><?= htmlspecialchars($s['tag']) ?></span>
          </div>
          <div class="rk-school-bottom-info">
            <div class="rk-school-name"><?= htmlspecialchars($s['name']) ?></div>
            <div class="rk-school-note"><?= htmlspecialchars($s['note']) ?></div>
          </div>
        </div>
        <div class="rk-school-foot">
          <span class="rk-school-explore"><?= htmlspecialchars($sec4ExploreText) ?></span>
          <span class="rk-school-foot-arrow">↗</span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §05. WHY RKDF — Glassmorphism Cards
══════════════════════════════════════════════════════════ -->
<?php
$sec5 = $cmsSections['sec_05_why'] ?? null;
if (!$sec5 || ($sec5['is_active'] ?? 1)):
  $sec5Tag    = format_eyebrow_tag($sec5 ?: ['tag_number'=>'05','tag_text'=>'WHY RKDF']);
  $sec5Title  = $sec5['title_main']   ?? 'A university built around the';
  $sec5Accent = $sec5['title_accent'] ?? 'student.';
  $sec5Sub    = $sec5['subtitle']     ?? 'Everything from our teaching philosophy to our campus design is calibrated for one outcome — graduates who leave here more prepared, more curious, and more useful.';
  $sec5Img    = !empty($sec5['image_path']) ? $sec5['image_path'] : 'images/lovable/rkdf-why-bg.jpg';

  $whyCards = [
    ['num'=>'01','title'=>'Industry Collaboration', 'desc'=>'Live projects with 200+ industry partners, from TCS to Tata Motors.'],
    ['num'=>'02','title'=>'Experienced Faculty',    'desc'=>'1,500+ scholars, 62% with doctoral degrees and international exposure.'],
    ['num'=>'03','title'=>'Modern Campus',          'desc'=>'150-acre campus with 24/7 study spaces, sports arena and innovation labs.'],
    ['num'=>'04','title'=>'Research Culture',       'desc'=>'50+ funded labs across AI, biotech, renewable energy and materials science.'],
    ['num'=>'05','title'=>'International Exposure', 'desc'=>'Exchange partnerships across 12 countries, three continents.'],
    ['num'=>'06','title'=>'Placement Support',      'desc'=>'Dedicated placement cell with a 95% success rate across five years.'],
  ];
  $dbWhy = $cmsItems['sec_05_why'] ?? [];
  if (!empty($dbWhy)) {
    $whyCards = [];
    foreach ($dbWhy as $idx => $i) {
      $whyCards[] = ['num'=>sprintf("%02d", $idx+1), 'title'=>$i['title'], 'desc'=>$i['subtitle']?:$i['text_val']];
    }
  }
?>
<section class="rk-why" id="why">
  <div class="rk-why-bg-img">
    <img src="<?= (strpos($sec5Img, '/') !== false) ? htmlspecialchars($sec5Img) : 'images/lovable/' . htmlspecialchars($sec5Img) ?>" alt="">
    <div class="rk-why-overlay-1"></div>
    <div class="rk-why-overlay-2"></div>
  </div>
  <div class="rk-why-hairline-grid"></div>

  <div class="rk-container rk-why-inner">
    <div class="rk-why-header">
      <div class="rk-reveal">
        <div class="rk-eyebrow tone-gold"><?= $sec5Tag ?></div>
        <h2 class="rk-why-h2">
          <?= htmlspecialchars($sec5Title) ?> <em class="rk-italic-gold"><?= htmlspecialchars($sec5Accent) ?></em>
        </h2>
      </div>
      <div class="rk-reveal" style="--delay:0.15s">
        <p class="rk-why-sub"><?= htmlspecialchars($sec5Sub) ?></p>
      </div>
    </div>

    <div class="rk-why-grid">
      <?php foreach ($whyCards as $idx => $p): ?>
      <div class="rk-glass-card rk-reveal" style="--delay:<?= $idx * 0.07 ?>s">
        <div class="rk-glass-head">
          <span class="rk-glass-num"><?= $p['num'] ?></span>
          <span class="rk-glass-arr">↗</span>
        </div>
        <h3 class="rk-glass-title"><?= htmlspecialchars($p['title']) ?></h3>
        <p class="rk-glass-desc"><?= htmlspecialchars($p['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §06. ADMISSIONS — 4-Step Process
══════════════════════════════════════════════════════════ -->
<?php
$sec6 = $cmsSections['sec_06_admissions'] ?? null;
if (!$sec6 || ($sec6['is_active'] ?? 1)):
  $sec6Tag    = format_eyebrow_tag($sec6 ?: ['tag_number'=>'06','tag_text'=>'ADMISSIONS 2026-27']);
  $sec6Title  = $sec6['title_main']   ?? 'A simple path';
  $sec6Accent = $sec6['title_accent'] ?? 'to joining us.';
  $sec6Sub    = $sec6['subtitle']     ?? 'Four transparent steps. A dedicated counsellor at every stage. Applications for the 2026–27 intake are open.';

  $steps = [
    ['num'=>'01','title'=>'Choose Program', 'desc'=>'Browse 100+ undergraduate, postgraduate and doctoral offerings.'],
    ['num'=>'02','title'=>'Apply Online',   'desc'=>'Submit your application and academic records through the portal.'],
    ['num'=>'03','title'=>'Verification',  'desc'=>'Our admissions team reviews documents and eligibility.'],
    ['num'=>'04','title'=>'Confirm & Enroll','desc'=>'Pay your fee, receive your ID and join orientation week.'],
  ];
  $dbSteps = $cmsItems['sec_06_admissions'] ?? [];
  if (!empty($dbSteps)) {
    $steps = [];
    foreach ($dbSteps as $idx => $i) {
      $steps[] = ['num'=>sprintf("%02d", $idx+1), 'title'=>$i['title'], 'desc'=>$i['subtitle']?:$i['text_val']];
    }
  }
?>
<section class="rk-admissions" id="admissions">
  <div class="rk-container">
    <div class="rk-adm-header">
      <div class="rk-reveal">
        <div class="rk-eyebrow"><?= $sec6Tag ?></div>
        <h2 class="rk-h2-huge" style="margin-top:16px;">
          <?= htmlspecialchars($sec6Title) ?><br>
          <em class="rk-italic-plain"><?= htmlspecialchars($sec6Accent) ?></em>
        </h2>
      </div>
      <div class="rk-reveal" style="--delay:0.15s">
        <p class="rk-adm-sub"><?= htmlspecialchars($sec6Sub) ?></p>
      </div>
    </div>

    <div class="rk-steps-wrap">
      <div class="rk-steps-line"></div>
      <div class="rk-steps-grid">
        <?php foreach ($steps as $idx => $step): ?>
        <div class="rk-step rk-reveal" style="--delay:<?= $idx * 0.1 ?>s">
          <div class="rk-step-box <?= ($idx === 3) ? 'rk-step-box--gold' : '' ?>">
            <span class="rk-step-num"><?= $step['num'] ?></span>
            <?php if ($idx === 3): ?>
            <div class="rk-step-gold-border"></div>
            <?php endif; ?>
          </div>
          <h3 class="rk-step-title"><?= htmlspecialchars($step['title']) ?></h3>
          <p class="rk-step-desc"><?= htmlspecialchars($step['desc']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="rk-reveal" style="--delay:0.3s">
      <div class="rk-adm-ctas">
        <a href="admissionform.php" class="rk-btn-navy">START APPLICATION ↗</a>
        <a href="<?= $prospectus ?>" target="_blank" class="rk-btn-outline-navy">DOWNLOAD PROSPECTUS</a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §06B. KEY CAMPUS SERVICES — Youth Wings & Portals
══════════════════════════════════════════════════════════ -->
<?php
$secServ = $cmsSections['sec_06_key_services'] ?? null;
if (!$secServ || ($secServ['is_active'] ?? 1)):
  $secServTag   = format_eyebrow_tag($secServ ?: ['tag_number'=>'06B','tag_text'=>'CAMPUS SERVICES & WINGS']);
  $secServTitle = $secServ['title_main']   ?? 'Key Campus Units &';
  $secServAccent= $secServ['title_accent'] ?? 'Portals.';
  $secServSub   = $secServ['subtitle']     ?? 'Explore national service programs, research activities, admissions and results.';

  $services = $cmsItems['sec_06_key_services'] ?? [];
?>
<section class="rk-services" id="services" style="background:#fafafa;padding:80px 0;border-top:1px solid #e2e8f0;border-bottom:1px solid #e2e8f0;">
  <div class="rk-container">
    <div class="rk-section-header rk-reveal">
      <div>
        <div class="rk-eyebrow" style="color:#C5A059;font-weight:700;font-family:'JetBrains Mono',monospace;font-size:12px;"><?= $secServTag ?></div>
        <h2 class="rk-h2-xl" style="margin-top:12px;color:#0C1424;font-family:'Instrument Serif',Georgia,serif;">
          <?= htmlspecialchars($secServTitle) ?> <em class="rk-italic" style="color:#E31B23;"><?= htmlspecialchars($secServAccent) ?></em>
        </h2>
      </div>
      <p class="rk-section-sub" style="color:#475569;font-size:16px;max-width:540px;"><?= htmlspecialchars($secServSub) ?></p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:24px;margin-top:40px;">
      <?php foreach ($services as $s): ?>
      <a href="<?= htmlspecialchars($s['link_url'] ?: '#') ?>" class="rk-reveal" style="text-decoration:none;background:#ffffff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;box-shadow:0 4px 16px rgba(12,20,36,0.04);transition:all 0.3s ease;display:block;">
        <div style="height:180px;overflow:hidden;position:relative;">
          <img src="<?= htmlspecialchars($s['image_path'] ?: 'images/lovable/rkdf-building-enhanced.jpg') ?>" alt="<?= htmlspecialchars($s['title']) ?>" style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s ease;" onError="this.src='images/rkdflogo.JPG';">
          <span style="position:absolute;top:12px;left:12px;font-family:'JetBrains Mono',monospace;font-size:10px;font-weight:700;color:#ffffff;background:#E31B23;padding:4px 10px;border-radius:99px;"><?= htmlspecialchars($s['badge_text'] ?: 'PORTAL') ?></span>
        </div>
        <div style="padding:24px;">
          <h3 style="font-size:18px;font-weight:800;color:#0C1424;margin-bottom:6px;"><?= htmlspecialchars($s['title']) ?></h3>
          <div style="font-size:13px;color:#C5A059;font-weight:600;margin-bottom:8px;"><?= htmlspecialchars($s['subtitle']) ?></div>
          <p style="font-size:14px;color:#475569;line-height:1.6;margin:0;"><?= htmlspecialchars($s['text_val']) ?></p>
          <div style="margin-top:16px;font-size:13px;font-weight:700;color:#0C1424;display:flex;align-items:center;gap:6px;">Explore Portal <span style="color:#E31B23;">↗</span></div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §07. FEATURED PROGRAMS
══════════════════════════════════════════════════════════ -->
<?php
$sec7 = $cmsSections['sec_07_programs'] ?? null;
if (!$sec7 || ($sec7['is_active'] ?? 1)):
  $sec7Tag = format_eyebrow_tag($sec7 ?: ['tag_number'=>'07','tag_text'=>'FEATURED PROGRAMS']);
  $dbProgs = $cmsItems['sec_07_programs'] ?? [];

  $bigProg = [
    'title' => 'B.Tech in Computer Science & AI',
    'badge' => 'Flagship · Engineering',
    'subtitle' => '4 Years · 240 Seats · 10+2 PCM',
    'img'   => 'images/lovable/rkdf-engineering.jpg',
    'url'   => 'Engineering.php'
  ];
  $smallProgs = [
    ['tag'=>'Management', 'title'=>'MBA in Business Analytics',   'detail'=>'2 Years · 120 Seats', 'img'=>'images/lovable/rkdf-management.jpg',  'url'=>'Management.php'],
    ['tag'=>'Pharmacy',   'title'=>'M.Pharm Clinical Research',   'detail'=>'2 Years · 60 Seats',  'img'=>'images/lovable/rkdf-pharmacy.jpg',     'url'=>'pharmacy.php'],
    ['tag'=>'Law',        'title'=>'BA-LLB (Hons.) Integrated',   'detail'=>'5 Years · 180 Seats', 'img'=>'images/lovable/rkdf-law.jpg',          'url'=>'Law.php'],
  ];

  if (!empty($dbProgs)) {
    $first = $dbProgs[0];
    $bigProg = [
      'title' => $first['title'],
      'badge' => $first['badge_text'] ?: 'Flagship Program',
      'subtitle' => $first['subtitle'] ?: $first['text_val'],
      'img'   => $first['image_path'] ?: 'images/lovable/rkdf-engineering.jpg',
      'url'   => $first['link_url'] ?: 'academic&departments.php'
    ];
    if (count($dbProgs) > 1) {
      $smallProgs = [];
      for ($sp = 1; $sp < count($dbProgs); $sp++) {
        $item = $dbProgs[$sp];
        $smallProgs[] = [
          'tag'    => $item['badge_text'] ?: 'Program',
          'title'  => $item['title'],
          'detail' => $item['subtitle'] ?: $item['text_val'],
          'img'    => $item['image_path'] ?: 'images/lovable/rkdf-management.jpg',
          'url'    => $item['link_url'] ?: 'academic&departments.php'
        ];
      }
    }
  }
?>
<section class="rk-programs" id="programs">
  <div class="rk-container">
    <div class="rk-eyebrow rk-reveal"><?= $sec7Tag ?></div>

    <div class="rk-programs-grid">
      <!-- Big feature card -->
      <div class="rk-prog-big rk-reveal">
        <img src="<?= (strpos($bigProg['img'], '/') !== false) ? htmlspecialchars($bigProg['img']) : 'images/lovable/' . htmlspecialchars($bigProg['img']) ?>" alt="<?= htmlspecialchars($bigProg['title']) ?>" loading="lazy">
        <div class="rk-prog-big-overlay"></div>
        <div class="rk-prog-big-body">
          <span class="rk-prog-big-eyebrow"><?= htmlspecialchars($bigProg['badge']) ?></span>
          <h3 class="rk-prog-big-title"><?= htmlspecialchars($bigProg['title']) ?></h3>
          <div class="rk-prog-big-meta">
            <?php
            $metaParts = explode('·', $bigProg['subtitle']);
            foreach ($metaParts as $mp):
            ?>
            <div>
              <div class="rk-prog-meta-label">Info</div>
              <div class="rk-prog-meta-val"><?= htmlspecialchars(trim($mp)) ?></div>
            </div>
            <?php endforeach; ?>
          </div>
          <a href="<?= htmlspecialchars($bigProg['url']) ?>" class="rk-btn-gold-sm">Apply for this program ↗</a>
        </div>
      </div>

      <!-- Small program cards stack -->
      <div class="rk-prog-stack">
        <?php foreach ($smallProgs as $idx => $p): ?>
        <a href="<?= htmlspecialchars($p['url']) ?>" class="rk-prog-small rk-reveal" style="--delay:<?= 0.1 + $idx * 0.08 ?>s">
          <div class="rk-prog-small-img">
            <img src="<?= (strpos($p['img'], '/') !== false) ? htmlspecialchars($p['img']) : 'images/lovable/' . htmlspecialchars($p['img']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy">
          </div>
          <div class="rk-prog-small-body">
            <div class="rk-prog-small-tag"><?= htmlspecialchars($p['tag']) ?></div>
            <h4 class="rk-prog-small-title"><?= htmlspecialchars($p['title']) ?></h4>
            <div class="rk-prog-small-detail"><?= htmlspecialchars($p['detail']) ?></div>
            <div class="rk-prog-small-link">Explore ↗</div>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §08. CAMPUS LIFE
══════════════════════════════════════════════════════════ -->
<?php
$sec8 = $cmsSections['sec_08_campus'] ?? null;
if (!$sec8 || ($sec8['is_active'] ?? 1)):
  $sec8Tag    = format_eyebrow_tag($sec8 ?: ['tag_number'=>'08','tag_text'=>'CAMPUS LIFE']);
  $sec8Title  = $sec8['title_main']   ?? 'A campus that';
  $sec8Accent = $sec8['title_accent'] ?? 'breathes.';
  $sec8Sub    = $sec8['subtitle']     ?? 'Beyond the classroom — 42 clubs, seven residential blocks, indoor and outdoor sports arenas, a two-story library, and a maker-space open around the clock.';

  $campusStats = [
    ['num'=>'18', 'label'=>'SPORTS ARENAS'],
    ['num'=>'42', 'label'=>'STUDENT CLUBS'],
    ['num'=>'7',  'label'=>'RESIDENTIAL BLOCKS'],
    ['num'=>'12', 'label'=>'INNOVATION LABS'],
  ];
  $dbCampusStats = $cmsItems['sec_08_campus'] ?? [];
  if (!empty($dbCampusStats)) {
    $campusStats = [];
    foreach ($dbCampusStats as $i) {
      $campusStats[] = ['num'=>$i['number_val']?:$i['title'], 'label'=>strtoupper($i['subtitle']?:$i['text_val'])];
    }
  }
?>
<section class="rk-campus" id="campus">
  <div class="rk-container">
    <div class="rk-campus-grid">
      <!-- Left col: text + stats -->
      <div class="rk-campus-left rk-reveal">
        <div>
          <div class="rk-eyebrow"><?= $sec8Tag ?></div>
          <h2 class="rk-campus-h2">
            <?= htmlspecialchars($sec8Title) ?> <em class="rk-italic"><?= htmlspecialchars($sec8Accent) ?></em>
          </h2>
          <p class="rk-campus-sub"><?= htmlspecialchars($sec8Sub) ?></p>
        </div>
        <div class="rk-campus-stats">
          <?php foreach ($campusStats as $cs): ?>
          <div>
            <div class="rk-campus-stat-num"><?= htmlspecialchars($cs['num']) ?></div>
            <div class="rk-campus-stat-label"><?= htmlspecialchars($cs['label']) ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right col: 12-col masonry collage -->
      <div class="rk-reveal" style="--delay:0.15s">
        <div class="rk-campus-collage">
          <div class="rk-col-tall rk-col-span-7">
            <img src="images/lovable/rkdf-campus-hero.jpg" alt="RKDF main quadrangle" loading="lazy">
          </div>
          <div class="rk-col-span-5">
            <img src="images/lovable/rkdf-campus-2.jpg" alt="Sports arena" loading="lazy">
          </div>
          <div class="rk-col-span-5">
            <img src="images/lovable/rkdf-campus-4.jpg" alt="Hostel block" loading="lazy">
          </div>
          <div class="rk-col-span-12">
            <img src="images/lovable/rkdf-campus-3.jpg" alt="Auditorium event" loading="lazy">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §09. RESEARCH & INNOVATION
══════════════════════════════════════════════════════════ -->
<?php
$sec9 = $cmsSections['sec_09_research'] ?? null;
if (!$sec9 || ($sec9['is_active'] ?? 1)):
  $sec9Tag    = format_eyebrow_tag($sec9 ?: ['tag_number'=>'09','tag_text'=>'RESEARCH & INNOVATION']);
  $sec9Title  = $sec9['title_main']   ?? 'Advancing the frontiers of';
  $sec9Accent = $sec9['title_accent'] ?? 'human knowledge.';
  $sec9Sub    = $sec9['subtitle']     ?? 'Fifty specialised laboratories. Nine funded research centres. A doctoral cohort working across artificial intelligence, clean energy, biosciences and public policy.';
  $sec9Img    = !empty($sec9['image_path']) ? $sec9['image_path'] : 'images/lovable/rkdf-research.jpg';

  $resStats = [
    ['num'=>'142',  'label'=>'ACTIVE PATENTS',   'to'=>142],
    ['num'=>'2.4k+','label'=>'PUBLICATIONS',     'to'=>2400],
    ['num'=>'68',   'label'=>'FUNDED GRANTS',    'to'=>68],
    ['num'=>'32',   'label'=>'INDUSTRY PARTNERS','to'=>32],
  ];
  $labs = [
    ['title'=>'Sustainable Energy Lab',   'desc'=>'Grid-scale battery chemistry and rural microgrid deployment.'],
    ['title'=>'AI & Cognitive Systems',   'desc'=>'Multi-modal reasoning, low-resource NLP, applied computer vision.'],
    ['title'=>'Materials & Nanoscience',  'desc'=>'Additive manufacturing, functional polymers, bio-composites.'],
  ];
  $dbResearchItems = $cmsItems['sec_09_research'] ?? [];
  if (!empty($dbResearchItems)) {
    $resStats = [];
    $labs = [];
    foreach ($dbResearchItems as $i) {
      if ($i['item_type'] === 'stat' || !empty($i['number_val'])) {
        $valStr = $i['number_val'];
        $resStats[] = [
          'num'   => $valStr,
          'label' => strtoupper($i['subtitle'] ?: $i['title']),
          'to'    => extract_numeric_target($valStr)
        ];
      } else {
        $labs[] = ['title'=>$i['title'], 'desc'=>$i['subtitle']?:$i['text_val']];
      }
    }
    if (empty($labs)) {
      $labs = [
        ['title'=>'Sustainable Energy Lab',   'desc'=>'Grid-scale battery chemistry and rural microgrid deployment.'],
        ['title'=>'AI & Cognitive Systems',   'desc'=>'Multi-modal reasoning, low-resource NLP, applied computer vision.'],
        ['title'=>'Materials & Nanoscience',  'desc'=>'Additive manufacturing, functional polymers, bio-composites.'],
      ];
    }
  }
?>
<section class="rk-research" id="research">
  <div class="rk-research-bg">
    <img src="<?= (strpos($sec9Img, '/') !== false) ? htmlspecialchars($sec9Img) : 'images/lovable/' . htmlspecialchars($sec9Img) ?>" alt="">
    <div class="rk-research-overlay"></div>
  </div>
  <div class="rk-container rk-research-inner">
    <div class="rk-research-header">
      <div class="rk-reveal">
        <div class="rk-eyebrow tone-gold"><?= $sec9Tag ?></div>
        <h2 class="rk-research-h2">
          <?= htmlspecialchars($sec9Title) ?> <em class="rk-italic-gold"><?= htmlspecialchars($sec9Accent) ?></em>
        </h2>
      </div>
      <div class="rk-reveal" style="--delay:0.15s">
        <p class="rk-research-sub"><?= htmlspecialchars($sec9Sub) ?></p>
      </div>
    </div>

    <!-- 4 stat grid -->
    <?php if (!empty($resStats)): ?>
    <div class="rk-research-stats-grid">
      <?php foreach ($resStats as $rs): ?>
      <div class="rk-research-stat">
        <div class="rk-research-stat-num rk-count-up" data-target="<?= $rs['to'] ?>"><?= htmlspecialchars($rs['num']) ?></div>
        <div class="rk-research-stat-label"><?= htmlspecialchars($rs['label']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- labs -->
    <div class="rk-research-labs">
      <?php foreach ($labs as $lab): ?>
      <div class="rk-reveal">
        <h4 class="rk-lab-title"><?= htmlspecialchars($lab['title']) ?></h4>
        <p class="rk-lab-desc"><?= htmlspecialchars($lab['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §10. PLACEMENTS — Stats + Marquee Recruiters
══════════════════════════════════════════════════════════ -->
<?php
$sec10 = $cmsSections['sec_10_placements'] ?? null;
if (!$sec10 || ($sec10['is_active'] ?? 1)):
  $sec10Tag    = format_eyebrow_tag($sec10 ?: ['tag_number'=>'10','tag_text'=>'PLACEMENTS']);
  $sec10Title  = $sec10['title_main']   ?? 'Careers that';
  $sec10Accent = $sec10['title_accent'] ?? 'go somewhere.';
  $sec10Sub    = $sec10['subtitle']     ?? 'Our placement cell partners with 300+ recruiters across India and abroad, running mock interviews, CV clinics and a full-year internship track.';

  $placementStats = [
    ['num'=>'95%',   'label'=>'PLACEMENT RATE', 'to'=>95],
    ['num'=>'42 LPA','label'=>'HIGHEST PACKAGE','to'=>42],
    ['num'=>'8 LPA', 'label'=>'AVERAGE PACKAGE','to'=>8],
    ['num'=>'300+',  'label'=>'RECRUITERS',     'to'=>300],
  ];
  $recruiters = array_values(array_unique(['Tata Consultancy Services','Infosys','Wipro','Accenture','Deloitte','HDFC Bank','Reliance','L&T','Cognizant','IBM','Amazon','Capgemini']));

  $dbPlacementItems = $cmsItems['sec_10_placements'] ?? [];
  if (!empty($dbPlacementItems)) {
    $placementStats = [];
    $dbRecs = [];
    foreach ($dbPlacementItems as $i) {
      if ($i['item_type'] === 'recruiter') {
        $dbRecs[] = $i['title'];
      } else {
        $valStr = $i['number_val'] ?: $i['title'];
        $placementStats[] = [
          'num'   => $valStr,
          'label' => strtoupper($i['subtitle'] ?: $i['text_val'] ?: $i['title']),
          'to'    => extract_numeric_target($valStr)
        ];
      }
    }
    if (!empty($dbRecs)) {
      $recruiters = array_values(array_unique($dbRecs));
    }
  }
?>
<section class="rk-placements" id="placements">
  <div class="rk-container">
    <div class="rk-eyebrow rk-reveal"><?= $sec10Tag ?></div>
    <div class="rk-placement-header">
      <h2 class="rk-h2-huge rk-reveal">
        <?= htmlspecialchars($sec10Title) ?> <em class="rk-italic"><?= htmlspecialchars($sec10Accent) ?></em>
      </h2>
      <p class="rk-placement-sub rk-reveal" style="--delay:0.1s"><?= htmlspecialchars($sec10Sub) ?></p>
    </div>

    <!-- 4 stat boxes -->
    <div class="rk-placement-stats-grid">
      <?php foreach ($placementStats as $ps): ?>
      <div class="rk-placement-stat">
        <div class="rk-placement-stat-num rk-count-up" data-target="<?= $ps['to'] ?>"><?= htmlspecialchars($ps['num']) ?></div>
        <div class="rk-placement-stat-label"><?= htmlspecialchars($ps['label']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Marquee row -->
  <div class="rk-marquee-row">
    <div class="rk-marquee-track rkdf-marquee">
      <?php for ($r = 0; $r < 2; $r++): foreach ($recruiters as $rec): ?>
      <span class="rk-marquee-name"><?= htmlspecialchars($rec) ?><span class="rk-marquee-dot">✦</span></span>
      <?php endforeach; endfor; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §09B. SHINING STARS — Placed Alumni Showcase
══════════════════════════════════════════════════════════ -->
<?php
$secStar = $cmsSections['sec_09_shining_stars'] ?? null;
if (!$secStar || ($secStar['is_active'] ?? 1)):
  $secStarTag   = format_eyebrow_tag($secStar ?: ['tag_number'=>'09B','tag_text'=>'ALUMNI PLACEMENT STARS']);
  $secStarTitle = $secStar['title_main']   ?? 'Placed Students —';
  $secStarAccent= $secStar['title_accent'] ?? 'Shining Stars.';
  $secStarSub   = $secStar['subtitle']     ?? 'RKDF graduates securing top corporate packages in Fortune 500 companies.';

  $stars = $cmsItems['sec_09_shining_stars'] ?? [];
  if (empty($stars)) {
    $stars = [
      ['title'=>'Aman Sharma',    'subtitle'=>'Package: ₹44.5 LPA · Amazon',        'badge_text'=>'B.Tech CSE 2024',  'text_val'=>'Software Development Engineer at Amazon AWS Cloud Team.', 'image_path'=>'images/lovable/rkdf-student-1.jpg'],
      ['title'=>'Pooja Verma',    'subtitle'=>'Package: ₹38.0 LPA · Microsoft',     'badge_text'=>'B.Tech AI 2024',   'text_val'=>'Data Scientist at Microsoft Azure AI & Machine Learning.', 'image_path'=>'images/lovable/rkdf-student-2.jpg'],
      ['title'=>'Rohan Gupta',    'subtitle'=>'Package: ₹32.0 LPA · Google',        'badge_text'=>'B.Tech ECE 2023',  'text_val'=>'System Architect at Google India Technology Center.',    'image_path'=>'images/lovable/rkdf-student-3.jpg'],
      ['title'=>'Shreya Mishra',  'subtitle'=>'Package: ₹28.5 LPA · Goldman Sachs', 'badge_text'=>'MBA Finance 2024',  'text_val'=>'Financial Risk Analyst at Goldman Sachs Global division.', 'image_path'=>'images/lovable/rkdf-student-1.jpg'],
      ['title'=>'Vikram Singh',   'subtitle'=>'Package: ₹24.0 LPA · TCS Digital',   'badge_text'=>'M.Tech CS 2023',   'text_val'=>'Lead Full-Stack Architect at Tata Consultancy Services.',   'image_path'=>'images/lovable/rkdf-student-2.jpg'],
      ['title'=>'Ananya Patel',   'subtitle'=>'Package: ₹22.0 LPA · Deloitte',      'badge_text'=>'B.Pharm 2024',     'text_val'=>'Healthcare & Pharma Consultant at Deloitte Strategy.',     'image_path'=>'images/lovable/rkdf-student-3.jpg'],
    ];
  }
?>
<section class="rk-stars" id="shining-stars" style="background:#ffffff;padding:80px 0;border-top:1px solid #e2e8f0;border-bottom:1px solid #e2e8f0;">
  <div class="rk-container">
    <div class="rk-section-header rk-reveal" style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:32px;flex-wrap:wrap;gap:16px;">
      <div>
        <div class="rk-eyebrow" style="color:#C5A059;font-weight:700;font-family:'JetBrains Mono',monospace;font-size:12px;"><?= $secStarTag ?></div>
        <h2 class="rk-h2-xl" style="margin-top:12px;color:#0C1424;font-family:'Instrument Serif',Georgia,serif;">
          <?= htmlspecialchars($secStarTitle) ?> <em class="rk-italic" style="color:#E31B23;"><?= htmlspecialchars($secStarAccent) ?></em>
        </h2>
        <p class="rk-section-sub" style="color:#475569;font-size:16px;max-width:540px;margin-top:8px;margin-bottom:0;"><?= htmlspecialchars($secStarSub) ?></p>
      </div>
      <div class="rk-slider-nav-btns" style="display:flex;gap:8px;">
        <button type="button" class="rk-slider-btn rk-slider-prev" id="secStar-prev" aria-label="Previous Alumni Star">‹</button>
        <button type="button" class="rk-slider-btn rk-slider-next" id="secStar-next" aria-label="Next Alumni Star">›</button>
      </div>
    </div>
  </div>

  <div class="rk-stars-outer">
    <div class="rk-stars-rail no-scrollbar" id="secStar-rail">
      <?php foreach ($stars as $st): ?>
      <div class="rk-star-card rk-reveal">
        <div class="rk-star-avatar">
          <img src="<?= htmlspecialchars($st['image_path'] ?: 'images/rkdflogo.JPG') ?>" alt="<?= htmlspecialchars($st['title']) ?>" onError="this.src='images/rkdflogo.JPG';">
        </div>
        <span class="rk-star-badge"><?= htmlspecialchars($st['badge_text'] ?: 'PLACED') ?></span>
        <h4 class="rk-star-name"><?= htmlspecialchars($st['title']) ?></h4>
        <div class="rk-star-sub"><?= htmlspecialchars($st['subtitle']) ?></div>
        <p class="rk-star-desc"><?= htmlspecialchars($st['text_val']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Slider JavaScript Engine for Section 04 and Section 09B -->
<script>
(function() {
  function initRkSlider(railId, prevBtnId, nextBtnId) {
    const rail = document.getElementById(railId);
    const prevBtn = document.getElementById(prevBtnId);
    const nextBtn = document.getElementById(nextBtnId);
    if (!rail) return;

    function getScrollStep() {
      const card = rail.querySelector('.rk-school-card, .rk-star-card');
      return card ? (card.offsetWidth + 24) * 2 : 600;
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', function(e) {
        e.preventDefault();
        rail.scrollBy({ left: -getScrollStep(), behavior: 'smooth' });
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', function(e) {
        e.preventDefault();
        rail.scrollBy({ left: getScrollStep(), behavior: 'smooth' });
      });
    }

    // Mouse Drag Scroll
    let isDown = false;
    let startX;
    let scrollLeft;

    rail.addEventListener('mousedown', function(e) {
      isDown = true;
      rail.classList.add('is-dragging');
      startX = e.pageX - rail.offsetLeft;
      scrollLeft = rail.scrollLeft;
    });

    rail.addEventListener('mouseleave', function() {
      isDown = false;
      rail.classList.remove('is-dragging');
    });

    rail.addEventListener('mouseup', function() {
      isDown = false;
      rail.classList.remove('is-dragging');
    });

    rail.addEventListener('mousemove', function(e) {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - rail.offsetLeft;
      const walk = (x - startX) * 1.5;
      rail.scrollLeft = scrollLeft - walk;
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
      initRkSlider('sec4-rail', 'sec4-prev', 'sec4-next');
      initRkSlider('secStar-rail', 'secStar-prev', 'secStar-next');
    });
  } else {
    initRkSlider('sec4-rail', 'sec4-prev', 'sec4-next');
    initRkSlider('secStar-rail', 'secStar-prev', 'secStar-next');
  }
})();
</script>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §11. VOICES — Student Testimonials
══════════════════════════════════════════════════════════ -->
<?php
$sec11 = $cmsSections['sec_11_voices'] ?? null;
if (!$sec11 || ($sec11['is_active'] ?? 1)):
  $sec11Tag    = format_eyebrow_tag($sec11 ?: ['tag_number'=>'11','tag_text'=>'VOICES']);
  $sec11Title  = $sec11['title_main']   ?? 'What our graduates';
  $sec11Accent = $sec11['title_accent'] ?? 'carry with them.';

  $testimonials = [
    ['name'=>'Priya Sharma', 'role'=>'M.Sc. Data Science, 2024','quote'=>'The research culture here doesn\'t wait for permission. I published two papers before graduation and joined a team at Amazon straight after.','img'=>'images/lovable/rkdf-student-1.jpg'],
    ['name'=>'Arjun Verma',  'role'=>'B.Tech CSE, 2023',        'quote'=>'Faculty who actually build things, labs open past midnight, and a placement cell that treated every one of my 12 offers as if it mattered.','img'=>'images/lovable/rkdf-student-2.jpg'],
    ['name'=>'Meera Iyer',   'role'=>'BA-LLB, 2024',            'quote'=>'The moot court program at RKDF is genuinely national-tier. I argued in six states before I even sat for the bar.','img'=>'images/lovable/rkdf-student-3.jpg'],
  ];
  $dbTestimonials = $cmsItems['sec_11_voices'] ?? [];
  if (!empty($dbTestimonials)) {
    $testimonials = [];
    foreach ($dbTestimonials as $i) {
      $testimonials[] = ['name'=>$i['title'],'role'=>$i['subtitle'],'quote'=>$i['text_val'],'img'=>$i['image_path']?:'images/lovable/rkdf-student-1.jpg'];
    }
  }
?>
<section class="rk-voices" id="voices">
  <div class="rk-container">
    <div class="rk-eyebrow rk-reveal"><?= $sec11Tag ?></div>
    <h2 class="rk-h2-huge rk-reveal" style="margin-bottom:48px;">
      <?= htmlspecialchars($sec11Title) ?> <em class="rk-italic-plain"><?= htmlspecialchars($sec11Accent) ?></em>
    </h2>
    <div class="rk-testimonials-grid">
      <?php foreach ($testimonials as $idx => $t): ?>
      <div class="rk-testi-card rk-reveal <?= ($idx === 1) ? 'rk-testi-offset' : '' ?>" style="--delay:<?= $idx * 0.1 ?>s">
        <div>
          <div class="rk-testi-quote-mark">&ldquo;</div>
          <p class="rk-testi-quote"><?= htmlspecialchars($t['quote']) ?></p>
        </div>
        <div class="rk-testi-author">
          <img src="<?= (strpos($t['img'], '/') !== false) ? htmlspecialchars($t['img']) : 'images/lovable/' . htmlspecialchars($t['img']) ?>" alt="<?= htmlspecialchars($t['name']) ?>" loading="lazy">
          <div>
            <div class="rk-testi-name"><?= htmlspecialchars($t['name']) ?></div>
            <div class="rk-testi-role"><?= htmlspecialchars($t['role']) ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §12. NEWS — News & Events
══════════════════════════════════════════════════════════ -->
<?php
$sec12 = $cmsSections['sec_12_news'] ?? null;
if (!$sec12 || ($sec12['is_active'] ?? 1)):
  $sec12Tag    = format_eyebrow_tag($sec12 ?: ['tag_number'=>'12','tag_text'=>'NEWS & EVENTS']);
  $sec12Title  = $sec12['title_main']   ?? 'This week at';
  $sec12Accent = $sec12['title_accent'] ?? 'RKDF.';
  $sec12Img    = !empty($sec12['image_path']) ? $sec12['image_path'] : 'images/lovable/rkdf-campus-aerial.jpg';

  $featuredArticle = [
    'title' => '14th Annual Convocation honours 4,200 graduates across 11 schools',
    'desc'  => "Chancellor Sunil Kapoor conferred degrees on the largest graduating cohort in RKDF's history.",
    'date'  => '28 August 2024',
    'tag'   => 'Featured',
    'img'   => $sec12Img,
    'url'   => 'news_detail.php?id=1'
  ];

  $newsItems = [
    ['date'=>'26 Aug 2024','cat'=>'RESEARCH',   'title'=>'Physics dept. wins DST grant for quantum sensing research', 'url'=>'r&d.php'],
    ['date'=>'22 Aug 2024','cat'=>'PLACEMENTS', 'title'=>'Placements open: Deloitte, Cognizant, HDFC on campus next week', 'url'=>'t&p.php'],
    ['date'=>'18 Aug 2024','cat'=>'GLOBAL',     'title'=>'International summer school with Politecnico di Milano concludes', 'url'=>'international-relation.php'],
    ['date'=>'14 Aug 2024','cat'=>'CULTURE',    'title'=>'Independence Day: RKDF Cultural Society stages \'Rang Bharat\'', 'url'=>'imggallery.php'],
  ];
  $dbNews = $cmsItems['sec_12_news'] ?? [];
  if (!empty($dbNews)) {
    $newsItems = [];
    foreach ($dbNews as $idx => $i) {
      if ($i['item_type'] === 'featured') {
        $featuredArticle = [
          'title' => $i['title'],
          'desc'  => $i['subtitle'] ?: $i['text_val'],
          'date'  => $i['number_val'] ?: '2026',
          'tag'   => $i['badge_text'] ?: 'Featured',
          'img'   => $i['image_path'] ?: $sec12Img,
          'url'   => $i['link_url'] ?: ('news_detail.php?id=' . ($i['id'] ?? 1))
        ];
      } else {
        $newsItems[] = [
          'date'  => $i['number_val'] ?: '',
          'cat'   => strtoupper($i['badge_text'] ?: 'NEWS'),
          'title' => $i['title'],
          'url'   => $i['link_url'] ?: ('news_detail.php?id=' . ($i['id'] ?? ($idx + 1)))
        ];
      }
    }
  }
?>
<section class="rk-news" id="news">
  <div class="rk-container">
    <div class="rk-news-header">
      <div class="rk-reveal">
        <div class="rk-eyebrow"><?= $sec12Tag ?></div>
        <h2 class="rk-news-h2">
          <?= htmlspecialchars($sec12Title) ?> <em class="rk-italic-plain"><?= htmlspecialchars($sec12Accent) ?></em>
        </h2>
      </div>
      <a href="Announcements.php" class="rk-news-all-link rk-reveal" style="--delay:0.1s">All updates ↗</a>
    </div>

    <div class="rk-news-layout">
      <!-- Left: big featured article -->
      <a href="<?= htmlspecialchars($featuredArticle['url']) ?>" class="rk-news-featured-link" style="text-decoration:none;color:inherit;">
        <article class="rk-news-featured rk-reveal">
          <div class="rk-news-featured-img">
            <img src="<?= (strpos($featuredArticle['img'], '/') !== false) ? htmlspecialchars($featuredArticle['img']) : 'images/lovable/' . htmlspecialchars($featuredArticle['img']) ?>" alt="<?= htmlspecialchars($featuredArticle['title']) ?>" loading="lazy">
          </div>
          <div class="rk-news-featured-meta">
            <span class="rk-news-meta-tag"><?= htmlspecialchars($featuredArticle['tag']) ?></span>
            <span class="rk-news-meta-divider"></span>
            <span class="rk-news-meta-date"><?= htmlspecialchars($featuredArticle['date']) ?></span>
          </div>
          <h3 class="rk-news-featured-title"><?= htmlspecialchars($featuredArticle['title']) ?></h3>
          <p class="rk-news-featured-desc"><?= htmlspecialchars($featuredArticle['desc']) ?></p>
        </article>
      </a>

      <!-- Right: stacked news items -->
      <div class="rk-news-list">
        <?php foreach ($newsItems as $idx => $n): ?>
        <a href="<?= htmlspecialchars($n['url']) ?>" class="rk-news-item rk-reveal" style="--delay:<?= $idx * 0.06 ?>s">
          <div class="rk-news-item-date"><?= htmlspecialchars($n['date']) ?></div>
          <div class="rk-news-item-body">
            <div class="rk-news-item-cat"><?= htmlspecialchars($n['cat']) ?></div>
            <h4 class="rk-news-item-title"><?= htmlspecialchars($n['title']) ?></h4>
          </div>
          <span class="rk-news-item-arr">↗</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §11B. ART GALLERY — Fine Arts & Campus Life Showcase
══════════════════════════════════════════════════════════ -->
<?php
$secArt = $cmsSections['sec_11_art_gallery'] ?? null;
if (!$secArt || ($secArt['is_active'] ?? 1)):
  $secArtTag   = format_eyebrow_tag($secArt ?: ['tag_number'=>'11B','tag_text'=>'CAMPUS ART & CREATIVITY']);
  $secArtTitle = $secArt['title_main']   ?? 'Campus Life &';
  $secArtAccent= $secArt['title_accent'] ?? 'Art Gallery.';
  $secArtSub   = $secArt['subtitle']     ?? 'Glimpses of fine arts, cultural events, campus fests, and student creations.';

  $artItems = $cmsItems['sec_11_art_gallery'] ?? [];
?>
<section class="rk-art-gallery" id="art-gallery" style="background:#fafafa;padding:80px 0;border-top:1px solid #e2e8f0;border-bottom:1px solid #e2e8f0;">
  <div class="rk-container">
    <div class="rk-section-header rk-reveal">
      <div>
        <div class="rk-eyebrow" style="color:#C5A059;font-weight:700;font-family:'JetBrains Mono',monospace;font-size:12px;"><?= $secArtTag ?></div>
        <h2 class="rk-h2-xl" style="margin-top:12px;color:#0C1424;font-family:'Instrument Serif',Georgia,serif;">
          <?= htmlspecialchars($secArtTitle) ?> <em class="rk-italic" style="color:#E31B23;"><?= htmlspecialchars($secArtAccent) ?></em>
        </h2>
      </div>
      <p class="rk-section-sub" style="color:#475569;font-size:16px;max-width:540px;"><?= htmlspecialchars($secArtSub) ?></p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:24px;margin-top:40px;">
      <?php foreach ($artItems as $a): ?>
      <a href="<?= htmlspecialchars($a['link_url'] ?: 'imggallery.php') ?>" class="rk-reveal" style="text-decoration:none;background:#ffffff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;box-shadow:0 4px 16px rgba(12,20,36,0.04);display:block;transition:all 0.3s ease;">
        <div style="height:220px;overflow:hidden;position:relative;">
          <img src="<?= htmlspecialchars($a['image_path'] ?: 'images/lovable/rkdf-building-enhanced.jpg') ?>" alt="<?= htmlspecialchars($a['title']) ?>" style="width:100%;height:100%;object-fit:cover;" onError="this.src='images/rkdflogo.JPG';">
          <span style="position:absolute;top:12px;left:12px;font-family:'JetBrains Mono',monospace;font-size:10px;font-weight:700;color:#ffffff;background:#0C1424;padding:4px 10px;border-radius:99px;"><?= htmlspecialchars($a['badge_text'] ?: 'GALLERY') ?></span>
        </div>
        <div style="padding:20px;">
          <h4 style="font-size:17px;font-weight:800;color:#0C1424;margin-bottom:4px;"><?= htmlspecialchars($a['title']) ?></h4>
          <p style="font-size:13.5px;color:#64748b;margin:0;"><?= htmlspecialchars($a['subtitle']) ?></p>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §13. GALLERY — Campus Gallery
══════════════════════════════════════════════════════════ -->
<?php
$sec13 = $cmsSections['sec_13_gallery'] ?? null;
if (!$sec13 || ($sec13['is_active'] ?? 1)):
  $sec13Tag   = format_eyebrow_tag($sec13 ?: ['tag_number'=>'13','tag_text'=>'CAMPUS GALLERY']);
  $sec13Title = $sec13['title_main'] ?? 'The everyday here.';

  $photos = [
    ['title'=>'Campus View',          'img'=>'images/lovable/rkdf-campus-1.jpg',   'tall'=>false],
    ['title'=>'Engineering Block',    'img'=>'images/lovable/rkdf-engineering.jpg','tall'=>false],
    ['title'=>'Central Library',      'img'=>'images/lovable/rkdf-library.jpg',    'tall'=>true],
    ['title'=>'Auditorium Event',     'img'=>'images/lovable/rkdf-campus-3.jpg',   'tall'=>false],
    ['title'=>'Architecture Studio', 'img'=>'images/lovable/rkdf-architecture.jpg','tall'=>false],
    ['title'=>'Sports Arena',         'img'=>'images/lovable/rkdf-sports.jpg',     'tall'=>true],
    ['title'=>'Agricultural Farms',   'img'=>'images/lovable/rkdf-agriculture.jpg','tall'=>false],
    ['title'=>'Hostel Building',      'img'=>'images/lovable/rkdf-hostel.jpg',     'tall'=>false],
  ];

  $dbPhotos = $cmsItems['sec_13_gallery'] ?? [];
  if (!empty($dbPhotos)) {
    $photos = [];
    foreach ($dbPhotos as $idx => $i) {
      $photos[] = [
        'title' => $i['title'],
        'img'   => $i['image_path'] ?: 'images/lovable/rkdf-campus-1.jpg',
        'tall'  => ($idx == 2 || $idx == 5)
      ];
    }
  }
?>
<section class="rk-gallery" id="gallery">
  <div class="rk-container">
    <div class="rk-eyebrow rk-reveal"><?= $sec13Tag ?></div>
    <h2 class="rk-news-h2 rk-reveal" style="margin-bottom:48px;">
      <?= htmlspecialchars($sec13Title) ?>
    </h2>
    <div class="rk-masonry-grid">
      <?php foreach ($photos as $idx => $p): ?>
      <div class="rk-masonry-item <?= $p['tall'] ? 'rk-masonry-tall' : '' ?> rk-reveal" style="--delay:<?= $idx * 0.04 ?>s">
        <img src="<?= (strpos($p['img'], '/') !== false) ? htmlspecialchars($p['img']) : 'images/lovable/' . htmlspecialchars($p['img']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy">
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §14. RECOGNITION — Accreditation & Statutory Approvals
══════════════════════════════════════════════════════════ -->
<?php
$sec14 = $cmsSections['sec_14_recognition'] ?? null;
if (!$sec14 || ($sec14['is_active'] ?? 1)):
  $sec14Tag   = format_eyebrow_tag($sec14 ?: ['tag_number'=>'14','tag_text'=>'ACCREDITATION & RECOGNITION']);
  $sec14Title = $sec14['title_main'] ?? 'Recognised where it counts.';
  $approvals = [
    ['name'=>'NAAC A+ ACCREDITED', 'sub'=>'Grade A+ Accreditation', 'img'=>'images/img/NaccLogo.jpg', 'url'=>'Content/Documents/NAAC-Certificate-of-Accrediation-RKDF-University-Bhopal.pdf'],
    ['name'=>'ICAR ACCREDITED', 'sub'=>'Indian Council of Agr. Research', 'img'=>'images/img/icarlogo.png', 'url'=>'images/Accreditation/ICAR Accreditation.jpeg'],
    ['name'=>'UGC RECOGNISED', 'sub'=>'Under Sec 2(f) & 12(B)', 'img'=>'images/img/approval.gif', 'url'=>'ugcfile.php'],
    ['name'=>'AICTE APPROVED', 'sub'=>'Technical Courses Approved', 'img'=>'images/img/approval.gif', 'url'=>'aicte_approval.php'],
    ['name'=>'PCI APPROVED', 'sub'=>'Pharmacy Council of India', 'img'=>'images/img/approval.gif', 'url'=>'pci_approval.php'],
    ['name'=>'ISO 9001:2015', 'sub'=>'Quality Management System', 'img'=>'images/img/approval.gif', 'url'=>'approvals.php'],
  ];
  $dbApprovals = $cmsItems['sec_14_recognition'] ?? [];
  if (!empty($dbApprovals)) {
    $approvals = [];
    foreach ($dbApprovals as $i) {
      $approvals[] = [
        'name' => $i['title'],
        'sub'  => $i['subtitle'] ?: 'Statutory Approval',
        'img'  => $i['image_path'] ?: 'images/img/approval.gif',
        'url'  => $i['link_url'] ?: 'approvals.php'
      ];
    }
  }
?>
<section class="rk-accred" id="recognitions" style="background:#fafafa;padding:70px 0;border-top:1px solid #e2e8f0;border-bottom:1px solid #e2e8f0;">
  <div class="rk-container">
    <div class="rk-accred-inner" style="display:grid;grid-template-columns:1fr;gap:40px;align-items:center;">
      <div class="rk-accred-left rk-reveal">
        <div class="rk-eyebrow" style="color:#C5A059;font-weight:700;letter-spacing:0.1em;margin-bottom:8px;font-family:'JetBrains Mono',monospace;font-size:12px;"><?= $sec14Tag ?></div>
        <h3 class="rk-accred-title" style="font-family:'Instrument Serif',Georgia,serif;font-size:clamp(2.2rem,4vw,3.2rem);color:#0C1424;margin-bottom:12px;line-height:1.2;"><?= htmlspecialchars($sec14Title) ?></h3>
        <p style="font-size:15px;color:#475569;margin-top:12px;line-height:1.7;max-width:540px;">
          RKDF University holds national accreditations and statutory approvals from central regulatory councils, ensuring highest academic &amp; quality standards.
        </p>
      </div>
      <div class="rk-accred-badges rk-reveal" style="--delay:0.1s;display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:16px;">
        <?php foreach ($approvals as $app): ?>
        <a href="<?= htmlspecialchars($app['url']) ?>" target="_blank" class="rk-accred-badge-card" style="text-decoration:none;">
          <div class="rk-accred-badge-img-wrap">
            <img src="<?= htmlspecialchars($app['img']) ?>" alt="<?= htmlspecialchars($app['name']) ?>" onError="this.src='images/rkdflogo.JPG';">
          </div>
          <div>
            <div class="rk-accred-badge-name" style="font-size:14px;font-weight:700;color:#0C1424;"><?= htmlspecialchars($app['name']) ?></div>
            <div style="font-size:12px;color:#64748b;margin-top:2px;font-weight:500;"><?= htmlspecialchars($app['sub']) ?></div>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<style>
@media (min-width: 992px) {
  .rk-accred-inner {
    grid-template-columns: 360px 1fr !important;
  }
}
.rk-accred-badge-card {
  display: flex;
  align-items: center;
  gap: 14px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  padding: 16px 20px;
  border-radius: 12px;
  box-shadow: 0 4px 16px rgba(12,20,36,0.04);
  transition: all 0.25s ease;
}
.rk-accred-badge-card:hover {
  background: #ffffff;
  border-color: #E31B23;
  transform: translateY(-3px);
  box-shadow: 0 10px 24px rgba(12,20,36,0.08);
}
.rk-accred-badge-img-wrap {
  width: 48px;
  height: 48px;
  background: #f8fafc;
  border-radius: 8px;
  border: 1px solid #e2e8f0;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  flex-shrink: 0;
  padding: 4px;
}
.rk-accred-badge-img-wrap img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}
</style>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §14B. IMPORTANT LINKS — Statutory Approvals & Quick Links Matrix
══════════════════════════════════════════════════════════ -->
<?php
$secImp = $cmsSections['sec_14_important_links'] ?? null;
if (!$secImp || ($secImp['is_active'] ?? 1)):
  $secImpTag   = format_eyebrow_tag($secImp ?: ['tag_number'=>'14B','tag_text'=>'STATUTORY & QUICK LINKS']);
  $secImpTitle = $secImp['title_main']   ?? 'Statutory Approvals &';
  $secImpAccent= $secImp['title_accent'] ?? 'Quick Links.';
  $secImpSub   = $secImp['subtitle']     ?? 'Direct access to official university certificates, committees, ordinances, webmail, and e-tenders.';

  $impLinks = $cmsItems['sec_14_important_links'] ?? [];
?>
<section class="rk-imp-links" id="important-links" style="background:#ffffff;padding:80px 0;border-top:1px solid #e2e8f0;border-bottom:1px solid #e2e8f0;">
  <div class="rk-container">
    <div class="rk-section-header rk-reveal">
      <div>
        <div class="rk-eyebrow" style="color:#C5A059;font-weight:700;font-family:'JetBrains Mono',monospace;font-size:12px;"><?= $secImpTag ?></div>
        <h2 class="rk-h2-xl" style="margin-top:12px;color:#0C1424;font-family:'Instrument Serif',Georgia,serif;">
          <?= htmlspecialchars($secImpTitle) ?> <em class="rk-italic" style="color:#E31B23;"><?= htmlspecialchars($secImpAccent) ?></em>
        </h2>
      </div>
      <p class="rk-section-sub" style="color:#475569;font-size:16px;max-width:540px;"><?= htmlspecialchars($secImpSub) ?></p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px;margin-top:40px;">
      <?php foreach ($impLinks as $link): ?>
      <a href="<?= htmlspecialchars($link['link_url'] ?: '#') ?>" target="_blank" class="rk-reveal" style="text-decoration:none;display:flex;align-items:center;justify-content:space-between;background:#f8fafc;border:1px solid #e2e8f0;padding:16px 20px;border-radius:12px;transition:all 0.25s ease;">
        <div>
          <span style="font-family:'JetBrains Mono',monospace;font-size:10px;font-weight:700;color:#E31B23;background:rgba(227,27,35,0.08);padding:2px 8px;border-radius:99px;"><?= htmlspecialchars($link['badge_text'] ?: 'LINK') ?></span>
          <h4 style="font-size:14.5px;font-weight:700;color:#0C1424;margin-top:6px;margin-bottom:2px;"><?= htmlspecialchars($link['title']) ?></h4>
          <div style="font-size:12px;color:#64748b;"><?= htmlspecialchars($link['subtitle']) ?></div>
        </div>
        <span style="font-size:16px;color:#0C1424;font-weight:700;">↗</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §15. VIRTUAL TOUR — Virtual Campus Experience
══════════════════════════════════════════════════════════ -->
<?php
$sec15 = $cmsSections['sec_15_virtual_tour'] ?? null;
if (!$sec15 || ($sec15['is_active'] ?? 1)):
  $sec15Tag   = format_eyebrow_tag($sec15 ?: ['tag_number'=>'15','tag_text'=>'VIRTUAL CAMPUS EXPERIENCE']);
  $sec15Title = $sec15['title_main']   ?? 'Take a walk through';
  $sec15Accent= $sec15['title_accent'] ?? 'campus';
  $sec15Sub   = $sec15['subtitle']     ?? 'A guided cinematic tour through the quadrangle, the library, the labs and the residential blocks. Six minutes. Then decide.';
  $sec15Video = !empty($sec15['video_path']) ? $sec15['video_path'] : 'images/lovable/rkdf-drone.mp4';
  $sec15Poster= !empty($sec15['image_path']) ? $sec15['image_path'] : 'images/lovable/rkdf-building-enhanced.jpg';
  $sec15Btn1  = $sec15['extra_text_1'] ?? 'Begin the Tour';
  $sec15Btn2  = $sec15['extra_text_2'] ?? 'Book a Campus Visit ↗';
?>
<section class="rk-virtual-cta" id="virtual-tour">
  <div class="rk-virtual-bg">
    <video autoplay muted loop playsinline class="rk-virtual-video" poster="<?= htmlspecialchars($sec15Poster) ?>">
      <source src="<?= htmlspecialchars($sec15Video) ?>" type="video/mp4">
    </video>
    <div class="rk-virtual-overlay"></div>
  </div>
  <div class="rk-container rk-virtual-inner">
    <div class="rk-reveal">
      <div class="rk-eyebrow tone-gold"><?= $sec15Tag ?></div>
      <h2 class="rk-virtual-h2">
        <?= htmlspecialchars($sec15Title) ?> <em class="rk-italic-gold"><?= htmlspecialchars($sec15Accent) ?></em> — without leaving your desk.
      </h2>
      <p class="rk-virtual-sub"><?= htmlspecialchars($sec15Sub) ?></p>
      <div class="rk-virtual-ctas">
        <a href="videogallery.php" class="rk-btn-gold rk-virtual-btn-play">
          <span class="rk-virtual-play-circle">▶</span>
          <?= htmlspecialchars($sec15Btn1) ?>
        </a>
        <a href="admissionform.php" class="rk-btn-outline-paper">
          <?= htmlspecialchars($sec15Btn2) ?>
        </a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  §16. FINAL CTA — Your Next Chapter
══════════════════════════════════════════════════════════ -->
<?php
$sec16 = $cmsSections['sec_16_final_cta'] ?? null;
if (!$sec16 || ($sec16['is_active'] ?? 1)):
  $sec16Tag    = format_eyebrow_tag($sec16 ?: ['tag_number'=>'16','tag_text'=>'JOIN RKDF TODAY']);
  $sec16Title  = $sec16['title_main']   ?? 'Your next chapter';
  $sec16Accent = $sec16['title_accent'] ?? 'starts here.';
  $sec16BtnText= $sec16['extra_text_1'] ?? 'Apply Today ↗';
  $sec16BtnUrl = $sec16['extra_text_2'] ?? 'admissionform.php';
?>
<section class="rk-final-cta" id="apply-now">
  <div class="rk-container">
    <div class="rk-final-cta-block rk-reveal">
      <div class="rk-final-cta-text">
        <div class="rk-eyebrow"><?= $sec16Tag ?></div>
        <h2 class="rk-final-h2">
          <?= htmlspecialchars($sec16Title) ?> <em class="rk-italic"><?= htmlspecialchars($sec16Accent) ?></em>
        </h2>
      </div>
      <div class="rk-final-cta-action">
        <a href="<?= htmlspecialchars($sec16BtnUrl) ?>" class="rk-btn-navy rk-btn-lg">
          <?= htmlspecialchars($sec16BtnText) ?>
        </a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ══════════════════════════════════════════════════════════
  JS — Scroll-reveal + counter animations
══════════════════════════════════════════════════════════ -->
<script>
(function() {
  // Intersection Observer for .rk-reveal
  var revealEls = document.querySelectorAll('.rk-reveal');
  var revealObs = new IntersectionObserver(function(entries) {
    entries.forEach(function(e) {
      if (e.isIntersecting) {
        var delay = parseFloat(e.target.style.getPropertyValue('--delay') || 0);
        setTimeout(function() { e.target.classList.add('rk-revealed'); }, delay * 1000);
        revealObs.unobserve(e.target);
      }
    });
  }, { rootMargin: '-60px', threshold: 0.05 });
  revealEls.forEach(function(el) { revealObs.observe(el); });

  // Counter animation for .rk-count-up
  var counters = document.querySelectorAll('.rk-count-up');
  var counterObs = new IntersectionObserver(function(entries) {
    entries.forEach(function(e) {
      if (!e.isIntersecting) return;
      var el = e.target;
      var target = parseFloat(el.dataset.target || 0);
      if (!target) { counterObs.unobserve(el); return; }
      var start = 0, duration = 2000, startTime = null;
      function step(ts) {
        if (!startTime) startTime = ts;
        var progress = Math.min((ts - startTime) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3);
        var current = Math.round(eased * target);
        if (target >= 1000) {
          el.textContent = (current >= 1000) ? (current / 1000).toFixed(target >= 10000 ? 0 : 1) + 'k+' : current + '+';
        } else {
          el.textContent = current + (el.dataset.suffix || '');
        }
        if (progress < 1) requestAnimationFrame(step);
      }
      requestAnimationFrame(step);
      counterObs.unobserve(el);
    });
  }, { rootMargin: '-40px' });
  counters.forEach(function(el) { counterObs.observe(el); });
})();
</script>
