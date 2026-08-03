<?php
// ============================================================
// RKDF University — Homepage Sections (v4 — Prototype Exact)
// Matches: prototype/lovable/src/routes/index.tsx exactly
// Sections: Hero → Stats → About → Gateway → Schools → Why
//           Admissions → Programs → Campus → Research →
//           Placements → Testimonials → News → Accreditation
//           Virtual CTA → Final CTA → Footer
// ============================================================
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/site_settings.php';

$cmsSections = [];
$cmsItems = [];
try {
    $pdo = getDbConnection();
    $stmtSec = $pdo->query("SELECT * FROM homepage_sections WHERE is_active = 1 ORDER BY sort_order ASC");
    while ($sec = $stmtSec->fetch()) $cmsSections[$sec['section_key']] = $sec;
    $stmtItems = $pdo->query("SELECT * FROM homepage_items WHERE is_active = 1 ORDER BY sort_order ASC, id ASC");
    while ($item = $stmtItems->fetch()) $cmsItems[$item['section_key']][] = $item;
} catch (Exception $e) { /* DB optional */ }

$admYear = htmlspecialchars(get_site_setting('admission_year', '2026–27'));
$policyPdf = htmlspecialchars(get_site_setting('admission_policy_pdf', 'ADMISSION POLICY 2026-27.pdf'));
$feePdf = htmlspecialchars(get_site_setting('fee_structure_pdf', 'University_Fees_Structure.pdf'));
$prospectus = htmlspecialchars(get_site_setting('prospectus_pdf', 'Content/Documents/Prospectus  2024-25.pdf'));
?>

<!-- ══════════════════════════════════════════════════════════
  §1. HERO — Full viewport drone video + heading + CTAs
══════════════════════════════════════════════════════════ -->
<section class="rk-hero" id="hero">
  <!-- Drone video background -->
  <div class="rk-hero-video-wrap">
    <video class="rk-hero-video" autoplay muted loop playsinline
           poster="images/lovable/rkdf-building-enhanced.jpg">
      <source src="images/lovable/rkdf-drone.mp4" type="video/mp4">
    </video>
  </div>
  <!-- Overlays -->
  <div class="rk-hero-overlay-gradient"></div>
  <div class="rk-hero-overlay-radial"></div>

  <!-- Body -->
  <div class="rk-hero-body">
    <!-- Top eyebrow -->
    <div class="rk-hero-eyebrow">
      <span class="rk-gold-line"></span>
      <span style="font-family:var(--p-font-mono);font-size:11px;text-transform:uppercase;letter-spacing:0.28em;color:var(--p-gold);">Est. 2011 · Bhopal, MP</span>
    </div>

    <!-- Bottom grid: heading left, CTAs right -->
    <div class="rk-hero-foot">
      <h1 class="rk-hero-headline">
        Where heritage <br>
        meets <em style="font-style:italic;color:var(--p-gold);">innovation.</em>
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

  <!-- Scroll indicator -->
  <div class="rk-hero-scroll">Scroll</div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §2. STATS — 01 · The Institute in Numbers
══════════════════════════════════════════════════════════ -->
<section class="rk-stats" id="stats">
  <div class="rk-container">
    <div class="rk-reveal" style="margin-bottom:56px;">
      <span class="rk-eyebrow">01 · The Institute in Numbers</span>
    </div>
    <div class="rk-stats-grid">
      <?php
      $stats = [
        ['num'=>'100+',   'label'=>'Academic Programs'],
        ['num'=>'25,000+','label'=>'Enrolled Students'],
        ['num'=>'1,500+', 'label'=>'Expert Faculty'],
        ['num'=>'95%',    'label'=>'Placement Rate'],
        ['num'=>'50+',    'label'=>'Research Labs'],
        ['num'=>'40+',    'label'=>'Years of Legacy'],
      ];
      // Override from CMS if available
      if (!empty($cmsItems['stats'])) {
        $stats = [];
        foreach ($cmsItems['stats'] as $i) {
          $stats[] = ['num'=>$i['badge_text']??$i['title'], 'label'=>$i['subtitle']??$i['description']];
        }
      }
      foreach ($stats as $s): ?>
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
<section class="rk-about" id="about">
  <div class="rk-container">
    <div class="rk-about-grid">
      <!-- Left: text + timeline -->
      <div class="rk-about-left">
        <div class="rk-reveal">
          <span class="rk-eyebrow">02 · The University</span>
          <h2 class="rk-h2" style="margin-top:24px;margin-bottom:24px;max-width:480px;">
            A four-decade legacy,
            <em class="rk-italic"> reimagined</em>
            for the century ahead.
          </h2>
          <p style="color:rgba(12,20,36,0.7);font-size:17px;line-height:1.7;max-width:400px;margin-bottom:32px;">
            RKDF University brings together eleven professional schools, thirty-five departments
            and a cross-disciplinary research culture — under a single unwavering commitment
            to intellectual rigour and public good.
          </p>
          <a href="About_Us.pdf" target="_blank" class="rk-link-underline">
            Read our story <span style="font-size:16px;">↗</span>
          </a>

          <!-- Timeline milestones -->
          <div class="rk-timeline">
            <div class="rk-timeline-item rk-reveal">
              <div class="rk-timeline-year">1995</div>
              <div class="rk-timeline-title">Founding vision</div>
              <p class="rk-timeline-desc">RKDF Group commits to accessible, quality higher education in central India.</p>
            </div>
            <div class="rk-timeline-item rk-reveal rk-reveal-delay-1">
              <div class="rk-timeline-year">2011</div>
              <div class="rk-timeline-title">University status</div>
              <p class="rk-timeline-desc">Established as a private state university under the MP Act.</p>
            </div>
            <div class="rk-timeline-item rk-reveal rk-reveal-delay-2">
              <div class="rk-timeline-year">2017</div>
              <div class="rk-timeline-title">Research charter</div>
              <p class="rk-timeline-desc">50+ specialised labs, incubation cell and doctoral programs launched.</p>
            </div>
            <div class="rk-timeline-item rk-reveal rk-reveal-delay-3">
              <div class="rk-timeline-year">2024</div>
              <div class="rk-timeline-title">Global outlook</div>
              <p class="rk-timeline-desc">Partnerships across 12 countries, NAAC A+ reaccreditation.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: library image with founder quote -->
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
<section class="rk-gateway" id="gateway">
  <div class="rk-container">
    <div class="rk-reveal" style="margin-bottom:40px;">
      <div style="display:flex;flex-direction:column;gap:16px;">
        <span class="rk-eyebrow">03 · Student Gateway</span>
        <h2 class="rk-h2" style="max-width:480px;">
          Everything you need, <em class="rk-italic">one click away.</em>
        </h2>
      </div>
    </div>

    <div class="rk-gateway-grid">
      <?php
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
      foreach ($gateways as $g): ?>
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
<section class="rk-schools" id="academics">
  <div class="rk-container" style="padding-bottom:0;">
    <div style="display:flex;align-items:flex-end;justify-content:space-between;gap:32px;margin-bottom:64px;flex-wrap:wrap;">
      <div class="rk-reveal">
        <span class="rk-eyebrow" style="margin-bottom:24px;display:block;">03 · Schools &amp; Faculties</span>
        <h2 style="font-family:var(--p-font-serif);font-size:clamp(3rem,6vw,5.5rem);color:var(--p-navy-deep);line-height:0.98;letter-spacing:-0.02em;max-width:560px;">
          Eleven schools. <em style="font-style:italic;">One purpose.</em>
        </h2>
      </div>
      <div class="rk-reveal rk-reveal-delay-2" style="display:flex;align-items:center;gap:12px;color:rgba(12,20,36,0.6);font-size:12px;text-transform:uppercase;letter-spacing:0.25em;font-family:var(--p-font-mono);">
        <span>Drag to explore</span> <span style="font-size:16px;">›</span>
      </div>
    </div>
  </div>

  <!-- Horizontal scrolling rail -->
  <div style="padding-left:clamp(24px,4vw,40px);">
    <div class="rk-schools-rail no-scrollbar">
      <?php
      $schools = [
        ['name'=>'Engineering & Technology','img'=>'rkdf-engineering.jpg','tag'=>'12 programs','note'=>'Robotics · AI · Civil · Mech · CS','url'=>'Engineering.php','num'=>'01'],
        ['name'=>'Management Studies','img'=>'rkdf-management.jpg','tag'=>'9 programs','note'=>'MBA · BBA · Analytics · Finance','url'=>'Management.php','num'=>'02'],
        ['name'=>'Pharmaceutical Sciences','img'=>'rkdf-pharmacy.jpg','tag'=>'7 programs','note'=>'B.Pharm · M.Pharm · D.Pharm','url'=>'pharmacy.php','num'=>'03'],
        ['name'=>'Legal Studies','img'=>'rkdf-law.jpg','tag'=>'6 programs','note'=>'BA-LLB · LLM · Corporate Law','url'=>'Law.php','num'=>'04'],
        ['name'=>'Agriculture','img'=>'rkdf-agriculture.jpg','tag'=>'5 programs','note'=>'B.Sc · Horticulture · Agri-tech','url'=>'Agriculture.php','num'=>'05'],
        ['name'=>'Architecture & Design','img'=>'rkdf-architecture.jpg','tag'=>'4 programs','note'=>'B.Arch · Interior · Planning','url'=>'architect.php','num'=>'06'],
      ];
      foreach ($schools as $i => $s): ?>
      <a href="<?= htmlspecialchars($s['url']) ?>" class="rk-school-card rk-reveal" style="animation-delay:<?= $i*0.06 ?>s;">
        <div class="rk-school-img-wrap">
          <img src="images/lovable/<?= $s['img'] ?>" alt="<?= htmlspecialchars($s['name']) ?>" loading="lazy">
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
  §6. WHY RKDF — 04 · A university built around the student.
══════════════════════════════════════════════════════════ -->
<section class="rk-why" id="why">
  <!-- Background image + overlays -->
  <div class="rk-why-bg">
    <img src="images/lovable/rkdf-why-bg.jpg" alt="" loading="lazy">
  </div>
  <div class="rk-why-overlay"></div>
  <div class="rk-why-overlay-grad"></div>

  <div class="rk-container" style="position:relative;">
    <!-- Header -->
    <div style="display:grid;gap:32px;margin-bottom:56px;" class="why-header-grid">
      <div class="rk-reveal">
        <span class="rk-eyebrow tone-gold" style="margin-bottom:20px;display:block;">04 · Why RKDF</span>
        <h2 style="font-family:var(--p-font-serif);font-size:clamp(2.5rem,5vw,4.5rem);line-height:1.02;color:var(--p-paper);text-shadow:0 2px 12px rgba(0,0,0,0.5);max-width:480px;">
          A university built around the <em style="font-style:italic;color:var(--p-gold);">student.</em>
        </h2>
      </div>
      <div class="rk-reveal rk-reveal-delay-2">
        <p style="color:rgba(250,249,246,0.85);font-size:17px;line-height:1.7;max-width:480px;text-shadow:0 1px 8px rgba(0,0,0,0.5);">
          Everything from our teaching philosophy to our campus design is calibrated for one outcome —
          graduates who leave here more prepared, more curious, and more useful than when they arrived.
        </p>
      </div>
    </div>

    <!-- 6 feature cards -->
    <div class="rk-why-grid">
      <?php
      $features = [
        ['n'=>'01','t'=>'Industry Collaboration','d'=>'Live projects with 200+ industry partners, from TCS to Tata Motors.'],
        ['n'=>'02','t'=>'Experienced Faculty','d'=>'1,500+ scholars, 62% with doctoral degrees and international exposure.'],
        ['n'=>'03','t'=>'Modern Campus','d'=>'150-acre campus with 24/7 study spaces, sports arena and innovation labs.'],
        ['n'=>'04','t'=>'Research Culture','d'=>'50+ funded labs across AI, biotech, renewable energy and materials science.'],
        ['n'=>'05','t'=>'International Exposure','d'=>'Exchange partnerships across 12 countries, three continents.'],
        ['n'=>'06','t'=>'Placement Support','d'=>'Dedicated placement cell with a 95% success rate across five years.'],
      ];
      foreach ($features as $i => $f): ?>
      <div class="rk-why-card rk-reveal" style="transition-delay:<?= $i*0.07 ?>s;">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:24px;">
          <span class="rk-why-num"><?= $f['n'] ?></span>
          <span style="font-size:16px;color:rgba(250,249,246,0.4);">↗</span>
        </div>
        <div>
          <h3 class="rk-why-title"><?= htmlspecialchars($f['t']) ?></h3>
          <p class="rk-why-desc"><?= htmlspecialchars($f['d']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §7. ADMISSIONS — 05 · A simple path to joining us.
══════════════════════════════════════════════════════════ -->
<section class="rk-admissions" id="admissions">
  <div class="rk-container">
    <!-- Header -->
    <div style="display:grid;gap:40px;margin-bottom:48px;" class="adm-header-grid">
      <div class="rk-reveal">
        <span class="rk-eyebrow" style="margin-bottom:24px;display:block;">05 · Admissions <?= $admYear ?></span>
        <h2 class="rk-h2-xl">
          A simple path <br>
          to <em style="font-style:italic;">joining us.</em>
        </h2>
      </div>
      <div class="rk-reveal rk-reveal-delay-2">
        <p style="color:rgba(12,20,36,0.7);font-size:18px;line-height:1.7;">
          Four transparent steps. A dedicated counsellor at every stage.
          Applications for the <?= $admYear ?> intake are now open.
        </p>
      </div>
    </div>

    <!-- 4 steps -->
    <div class="rk-steps">
      <div class="rk-steps-grid">
        <?php
        $steps = [
          ['n'=>'01','t'=>'Choose Program','d'=>'Browse 100+ undergraduate, postgraduate and doctoral offerings.'],
          ['n'=>'02','t'=>'Apply Online','d'=>'Submit your application and academic records through the portal.'],
          ['n'=>'03','t'=>'Verification','d'=>'Our admissions team reviews documents and eligibility.'],
          ['n'=>'04','t'=>'Confirm & Enroll','d'=>'Pay your fee, receive your ID and join orientation week.','active'=>true],
        ];
        foreach ($steps as $i => $s): ?>
        <div class="rk-step rk-reveal" style="transition-delay:<?= $i*0.1 ?>s;">
          <div class="rk-step-box<?= !empty($s['active']) ? ' active' : '' ?>">
            <span class="rk-step-num"><?= $s['n'] ?></span>
          </div>
          <h3 class="rk-step-title"><?= htmlspecialchars($s['t']) ?></h3>
          <p class="rk-step-desc"><?= htmlspecialchars($s['d']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- CTAs -->
    <div class="rk-reveal" style="margin-top:80px;display:flex;flex-wrap:wrap;gap:16px;">
      <a href="admissionform.php" class="rk-btn-navy">
        Start Application <span style="font-size:16px;">↗</span>
      </a>
      <a href="<?= $prospectus ?>" target="_blank" class="rk-btn-outline-navy">
        Download Prospectus
      </a>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §8. FEATURED PROGRAMS — 06 · Magazine layout
══════════════════════════════════════════════════════════ -->
<section class="rk-programs" id="programs">
  <div class="rk-container">
    <div style="display:flex;align-items:center;gap:16px;margin-bottom:64px;" class="rk-reveal">
      <span class="rk-eyebrow">06 · Featured Programs</span>
    </div>

    <div class="rk-programs-grid">
      <!-- Big featured card -->
      <div class="rk-prog-featured rk-reveal">
        <img src="images/lovable/rkdf-engineering.jpg" alt="B.Tech Computer Science & AI" loading="lazy">
        <div class="rk-prog-featured-overlay"></div>
        <div class="rk-prog-featured-body">
          <div class="rk-prog-tag">Flagship · Engineering</div>
          <h3 class="rk-prog-title">B.Tech in Computer Science &amp; AI</h3>
          <div class="rk-prog-meta">
            <div>
              <div class="rk-prog-meta-label">Duration</div>
              <div class="rk-prog-meta-val">4 Years</div>
            </div>
            <div>
              <div class="rk-prog-meta-label">Intake</div>
              <div class="rk-prog-meta-val">240 Seats</div>
            </div>
            <div>
              <div class="rk-prog-meta-label">Eligibility</div>
              <div class="rk-prog-meta-val">10+2 (PCM)</div>
            </div>
          </div>
          <a href="Engineering.php" class="rk-btn-gold" style="align-self:flex-start;padding:12px 24px;">
            Apply for this program <span>↗</span>
          </a>
        </div>
      </div>

      <!-- Side cards -->
      <div class="rk-prog-side">
        <?php
        $sideProgs = [
          ['tag'=>'Management','t'=>'MBA in Business Analytics','d'=>'2 Years · 120 Seats','img'=>'rkdf-management.jpg','url'=>'Management.php'],
          ['tag'=>'Pharmacy','t'=>'M.Pharm Clinical Research','d'=>'2 Years · 60 Seats','img'=>'rkdf-pharmacy.jpg','url'=>'pharmacy.php'],
          ['tag'=>'Law','t'=>'BA-LLB (Hons.) Integrated','d'=>'5 Years · 180 Seats','img'=>'rkdf-law.jpg','url'=>'Law.php'],
        ];
        foreach ($sideProgs as $i => $p): ?>
        <a href="<?= htmlspecialchars($p['url']) ?>" class="rk-prog-side-card rk-reveal" style="transition-delay:<?= 0.1+$i*0.08 ?>s;">
          <div class="rk-prog-side-img">
            <img src="images/lovable/<?= $p['img'] ?>" alt="<?= htmlspecialchars($p['t']) ?>" loading="lazy">
          </div>
          <div class="rk-prog-side-body">
            <div class="rk-prog-side-tag"><?= htmlspecialchars($p['tag']) ?></div>
            <h4 class="rk-prog-side-title"><?= htmlspecialchars($p['t']) ?></h4>
            <div class="rk-prog-side-meta"><?= htmlspecialchars($p['d']) ?></div>
            <span class="rk-prog-side-explore">Explore ↗</span>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §9. CAMPUS LIFE — 07 · A campus that breathes.
══════════════════════════════════════════════════════════ -->
<section class="rk-campus" id="campus">
  <div class="rk-container">
    <div class="rk-campus-grid">
      <!-- Left text -->
      <div style="display:flex;flex-direction:column;justify-content:space-between;">
        <div class="rk-reveal">
          <span class="rk-eyebrow" style="margin-bottom:20px;display:block;">07 · Campus Life</span>
          <h2 class="rk-h2">
            A campus that <em class="rk-italic"> breathes.</em>
          </h2>
          <p style="margin-top:24px;color:rgba(12,20,36,0.7);line-height:1.7;max-width:400px;">
            Beyond the classroom — 42 clubs, seven residential blocks, indoor and outdoor sports arenas,
            a two-story library, and a maker-space open around the clock.
          </p>
        </div>
        <div class="rk-campus-stats rk-reveal rk-reveal-delay-2">
          <div>
            <div class="rk-campus-stat-num">18</div>
            <div class="rk-campus-stat-label">Sports Arenas</div>
          </div>
          <div>
            <div class="rk-campus-stat-num">42</div>
            <div class="rk-campus-stat-label">Student Clubs</div>
          </div>
          <div>
            <div class="rk-campus-stat-num">7</div>
            <div class="rk-campus-stat-label">Residential Blocks</div>
          </div>
          <div>
            <div class="rk-campus-stat-num">12</div>
            <div class="rk-campus-stat-label">Innovation Labs</div>
          </div>
        </div>
      </div>

      <!-- Right: image collage -->
      <div class="rk-reveal rk-reveal-delay-2">
        <div class="rk-campus-collage">
          <div class="rk-campus-img-main">
            <img src="images/lovable/rkdf-campus-hero.jpg" alt="RKDF main quadrangle" loading="lazy">
          </div>
          <div class="rk-campus-img-top">
            <img src="images/lovable/rkdf-campus-2.jpg" alt="Sports arena" loading="lazy">
          </div>
          <div class="rk-campus-img-bot">
            <img src="images/lovable/rkdf-campus-4.jpg" alt="Hostel" loading="lazy">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §10. RESEARCH — 08 · Advancing the frontiers
══════════════════════════════════════════════════════════ -->
<section class="rk-research" id="research">
  <div class="rk-research-bg">
    <img src="images/lovable/rkdf-research.jpg" alt="" loading="lazy">
  </div>
  <div class="rk-research-overlay"></div>

  <div class="rk-container" style="position:relative;">
    <!-- Header -->
    <div style="display:grid;gap:40px;margin-bottom:48px;" class="research-header-grid">
      <div class="rk-reveal">
        <span class="rk-eyebrow tone-gold" style="margin-bottom:24px;display:block;">08 · Research &amp; Innovation</span>
        <h2 style="font-family:var(--p-font-serif);font-size:clamp(2.5rem,5vw,5.5rem);color:var(--p-paper);line-height:0.98;letter-spacing:-0.02em;max-width:560px;">
          Advancing the frontiers of <em style="font-style:italic;color:var(--p-gold);">human knowledge.</em>
        </h2>
      </div>
      <div class="rk-reveal rk-reveal-delay-2">
        <p style="color:rgba(250,249,246,0.6);font-size:18px;line-height:1.7;max-width:440px;">
          Fifty specialised laboratories. Nine funded research centres. A doctoral cohort working across
          artificial intelligence, clean energy, biosciences and public policy.
        </p>
      </div>
    </div>

    <!-- Research stats -->
    <div class="rk-research-stats rk-reveal">
      <?php
      $rStats = [
        ['n'=>142,'s'=>'','l'=>'Active Patents'],
        ['n'=>2400,'s'=>'+','l'=>'Publications'],
        ['n'=>68,'s'=>'','l'=>'Funded Grants'],
        ['n'=>32,'s'=>'','l'=>'Industry Partners'],
      ];
      foreach ($rStats as $rs): ?>
      <div class="rk-research-stat">
        <div class="rk-research-num"><?= $rs['n'].$rs['s'] ?></div>
        <div class="rk-research-label"><?= htmlspecialchars($rs['l']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Labs -->
    <div class="rk-research-labs">
      <?php
      $labs = [
        ['t'=>'Sustainable Energy Lab','d'=>'Grid-scale battery chemistry and rural microgrid deployment.'],
        ['t'=>'AI & Cognitive Systems','d'=>'Multi-modal reasoning, low-resource NLP, applied computer vision.'],
        ['t'=>'Materials & Nanoscience','d'=>'Additive manufacturing, functional polymers, bio-composites.'],
      ];
      foreach ($labs as $lab): ?>
      <div class="rk-reveal">
        <h4 class="rk-research-lab-title"><?= htmlspecialchars($lab['t']) ?></h4>
        <p class="rk-research-lab-desc"><?= htmlspecialchars($lab['d']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §11. PLACEMENTS — 09 · Careers that go somewhere.
══════════════════════════════════════════════════════════ -->
<section class="rk-placements" id="placements">
  <div class="rk-container">
    <div style="margin-bottom:64px;">
      <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;" class="rk-reveal">
        <span class="rk-eyebrow">09 · Placements</span>
      </div>
      <div style="display:grid;gap:40px;" class="placement-header-grid">
        <h2 class="rk-h2-xl rk-reveal">
          Careers that <em class="rk-italic"> go somewhere.</em>
        </h2>
        <p class="rk-reveal rk-reveal-delay-2" style="color:rgba(12,20,36,0.7);line-height:1.7;max-width:400px;">
          Our placement cell partners with 300+ recruiters across India and abroad, running mock interviews,
          CV clinics and a full-year internship track.
        </p>
      </div>
    </div>

    <!-- Placement stats -->
    <div class="rk-placement-stats rk-reveal" style="margin-bottom:64px;">
      <?php
      $pStats = [
        ['n'=>'95%','l'=>'Placement Rate'],
        ['n'=>'42 LPA','l'=>'Highest Package'],
        ['n'=>'8 LPA','l'=>'Average Package'],
        ['n'=>'300+','l'=>'Recruiters'],
      ];
      foreach ($pStats as $ps): ?>
      <div class="rk-placement-stat">
        <div class="rk-placement-num"><?= $ps['n'] ?></div>
        <div class="rk-placement-label"><?= htmlspecialchars($ps['l']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Recruiter marquee -->
  <div class="rk-marquee-wrap">
    <div class="rk-marquee-inner">
      <?php
      $recruiters = ['Tata Consultancy Services','Infosys','Wipro','Accenture','Deloitte',
                     'HDFC Bank','Reliance','L&T','Cognizant','IBM','Amazon','Capgemini'];
      $double = array_merge($recruiters, $recruiters);
      foreach ($double as $r): ?>
      <span class="rk-marquee-item"><?= htmlspecialchars($r) ?><span class="rk-marquee-dot">✦</span></span>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §12. TESTIMONIALS — 10 · Voices
══════════════════════════════════════════════════════════ -->
<section class="rk-testimonials" id="voices">
  <div class="rk-container">
    <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;" class="rk-reveal">
      <span class="rk-eyebrow">10 · Voices</span>
    </div>
    <h2 class="rk-h2-xl rk-reveal" style="margin-bottom:48px;max-width:700px;">
      What our graduates <em style="font-style:italic;">carry with them.</em>
    </h2>

    <div class="rk-testimonials-grid">
      <?php
      $testi = [
        ['img'=>'rkdf-student-1.jpg','name'=>'Priya Sharma','role'=>'M.Sc. Data Science, 2024',
         'quote'=>'The research culture here doesn\'t wait for permission. I published two papers before graduation and joined a team at Amazon straight after.'],
        ['img'=>'rkdf-student-2.jpg','name'=>'Arjun Verma','role'=>'B.Tech CSE, 2023',
         'quote'=>'Faculty who actually build things, labs open past midnight, and a placement cell that treated every one of my 12 offers as if it mattered.','offset'=>true],
        ['img'=>'rkdf-student-3.jpg','name'=>'Meera Iyer','role'=>'BA-LLB, 2024',
         'quote'=>'The moot court program at RKDF is genuinely national-tier. I argued in six states before I even sat for the bar.'],
      ];
      foreach ($testi as $i => $t): ?>
      <div class="rk-testimonial-card rk-reveal<?= !empty($t['offset']) ? ' offset' : '' ?>" style="transition-delay:<?= $i*0.1 ?>s;">
        <div>
          <div class="rk-testimonial-quote-mark">&ldquo;</div>
          <p class="rk-testimonial-text"><?= htmlspecialchars($t['quote']) ?></p>
        </div>
        <div class="rk-testimonial-author">
          <img class="rk-testimonial-img" src="images/lovable/<?= $t['img'] ?>" alt="<?= htmlspecialchars($t['name']) ?>" loading="lazy">
          <div>
            <div class="rk-testimonial-name"><?= htmlspecialchars($t['name']) ?></div>
            <div class="rk-testimonial-role"><?= htmlspecialchars($t['role']) ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §13. NEWS — 11 · This week at RKDF.
══════════════════════════════════════════════════════════ -->
<section class="rk-news" id="news">
  <div class="rk-container">
    <div style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:64px;gap:32px;flex-wrap:wrap;">
      <div>
        <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;" class="rk-reveal">
          <span class="rk-eyebrow">11 · News &amp; Events</span>
        </div>
        <h2 class="rk-h2 rk-reveal">
          This week at <em style="font-style:italic;">RKDF.</em>
        </h2>
      </div>
      <a href="Announcements.php" class="rk-link-underline rk-reveal" style="white-space:nowrap;">
        All updates ↗
      </a>
    </div>

    <div class="rk-news-grid">
      <!-- Featured news -->
      <article class="rk-news-featured rk-reveal">
        <div class="rk-news-featured-img">
          <img src="images/lovable/rkdf-campus-aerial.jpg" alt="Convocation 2024" loading="lazy">
        </div>
        <div class="rk-news-meta">
          <span>Featured</span>
          <span class="rk-news-meta-sep"></span>
          <span class="rk-news-meta-date">28 August 2024</span>
        </div>
        <h3 class="rk-news-title">14th Annual Convocation honours 4,200 graduates across 11 schools</h3>
        <p class="rk-news-excerpt">
          Chancellor Sunil Kapoor conferred degrees on the largest graduating cohort in RKDF's history,
          with a keynote from Dr. R. Chidambaram on the future of Indian higher education.
        </p>
      </article>

      <!-- Side news list -->
      <div>
        <?php
        $newsItems = [
          ['d'=>'26 Aug 2024','t'=>'Physics dept. wins DST grant for quantum sensing research','tag'=>'Research'],
          ['d'=>'22 Aug 2024','t'=>'Placements open: Deloitte, Cognizant, HDFC on campus next week','tag'=>'Placements'],
          ['d'=>'18 Aug 2024','t'=>'International summer school with Politecnico di Milano concludes','tag'=>'Global'],
          ['d'=>'14 Aug 2024','t'=>'Independence Day: RKDF Cultural Society stages \'Rang Bharat\'','tag'=>'Culture'],
        ];
        foreach ($newsItems as $i => $n): ?>
        <a href="Announcements.php" class="rk-news-item rk-reveal" style="transition-delay:<?= $i*0.06 ?>s;">
          <div class="rk-news-item-date"><?= htmlspecialchars($n['d']) ?></div>
          <div style="flex:1;min-width:0;">
            <div class="rk-news-item-tag"><?= htmlspecialchars($n['tag']) ?></div>
            <h4 class="rk-news-item-title"><?= htmlspecialchars($n['t']) ?></h4>
          </div>
          <span style="font-size:16px;color:rgba(12,20,36,0.3);flex-shrink:0;margin-top:8px;">↗</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §14. ACCREDITATION — Recognised where it counts.
══════════════════════════════════════════════════════════ -->
<section class="rk-accreditation" id="accreditation">
  <div class="rk-container">
    <div class="rk-accreditation-layout">
      <div class="rk-accreditation-text rk-reveal">
        <span class="rk-eyebrow">Accreditation &amp; Recognition</span>
        <h3 style="font-family:var(--p-font-serif);font-size:clamp(1.5rem,2.5vw,2rem);color:var(--p-navy-deep);margin-top:8px;line-height:1.2;max-width:240px;">
          Recognised where it counts.
        </h3>
      </div>
      <div class="rk-badge-grid">
        <?php
        $badges = ['NAAC A+','UGC Recognised','AICTE Approved','NBA Accredited','NIRF Ranked','ISO 9001:2015'];
        foreach ($badges as $b): ?>
        <div class="rk-badge-item">
          <div class="rk-badge-icon">✦</div>
          <div class="rk-badge-name"><?= htmlspecialchars($b) ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §15. VIRTUAL CAMPUS CTA — 13 · Take a walk through campus.
══════════════════════════════════════════════════════════ -->
<section class="rk-virtual-cta" id="virtual-tour">
  <div class="rk-virtual-cta-bg">
    <video autoplay muted loop playsinline poster="images/lovable/rkdf-building-enhanced.jpg">
      <source src="images/lovable/rkdf-drone.mp4" type="video/mp4">
    </video>
  </div>
  <div class="rk-virtual-cta-overlay"></div>

  <div class="rk-container" style="position:relative;">
    <div style="max-width:800px;" class="rk-reveal">
      <span class="rk-eyebrow tone-gold" style="margin-bottom:24px;display:block;">13 · Virtual Campus Experience</span>
      <h2 style="font-family:var(--p-font-serif);font-size:clamp(3rem,7vw,6rem);color:var(--p-paper);line-height:0.95;letter-spacing:-0.02em;margin-bottom:40px;">
        Take a walk through <em style="font-style:italic;color:var(--p-gold);">campus</em> — without leaving your desk.
      </h2>
      <p style="color:rgba(250,249,246,0.7);font-size:18px;line-height:1.7;max-width:560px;margin-bottom:48px;">
        A guided cinematic tour through the quadrangle, the library, the labs and the residential blocks.
        Six minutes. Then decide.
      </p>
      <div style="display:flex;flex-wrap:wrap;gap:16px;">
        <a href="videogallery.php" class="rk-btn-gold" style="padding:20px 32px;">
          <span style="width:32px;height:32px;border-radius:50%;background:var(--p-navy-deep);display:inline-flex;align-items:center;justify-content:center;color:var(--p-gold);font-size:12px;">▶</span>
          Begin the Tour
        </a>
        <a href="Contact_us.php" class="rk-btn-outline-paper" style="padding:20px 32px;">
          Book a Campus Visit <span style="font-size:16px;">↗</span>
        </a>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  §16. FINAL CTA — Your next chapter starts here.
══════════════════════════════════════════════════════════ -->
<section class="rk-final-cta" id="apply">
  <div class="rk-container">
    <div class="rk-final-cta-inner rk-reveal">
      <div class="rk-final-cta-grid">
        <div>
          <span class="rk-eyebrow" style="margin-bottom:24px;display:block;">Admissions <?= $admYear ?></span>
          <h2 class="rk-final-heading">
            Your <em class="rk-italic"> next chapter</em> starts here.
          </h2>
        </div>
        <div style="display:flex;justify-content:flex-end;align-items:flex-end;">
          <a href="<?= $policyPdf ?>" target="_blank" class="rk-btn-navy" style="padding:24px 40px;font-size:13px;letter-spacing:0.2em;">
            Apply Today <span style="font-size:18px;">↗</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════════
  Reveal on scroll — IntersectionObserver
══════════════════════════════════════════════════════════ -->
<script>
(function(){
  var els = document.querySelectorAll('.rk-reveal');
  if (!els.length) return;
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(e){
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        io.unobserve(e.target);
      }
    });
  }, { rootMargin: '-80px', threshold: 0.01 });
  els.forEach(function(el){ io.observe(el); });
})();

// Why header responsive grid
(function(){
  var wh = document.querySelector('.why-header-grid');
  if (wh) {
    if (window.innerWidth >= 1024) {
      wh.style.gridTemplateColumns = '5fr 7fr';
    }
  }
  var ah = document.querySelector('.adm-header-grid');
  if (ah && window.innerWidth >= 1024) {
    ah.style.gridTemplateColumns = '6fr 5fr';
  }
  var rh = document.querySelector('.research-header-grid');
  if (rh && window.innerWidth >= 1024) {
    rh.style.gridTemplateColumns = '6fr 5fr';
  }
  var ph = document.querySelector('.placement-header-grid');
  if (ph && window.innerWidth >= 1024) {
    ph.style.gridTemplateColumns = '7fr 4fr';
  }
})();
</script>
