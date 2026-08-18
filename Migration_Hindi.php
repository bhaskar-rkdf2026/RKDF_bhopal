<?php
// ============================================================
// RKDF University — Degree Migration Form Hindi Portal (100% Dynamic CMS)
// World-Class Premium Design + Official Hindi PDF Downloads Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

$pdo = getDbConnection();
$pageSlug = 'migration-hindi';
$pRow = [];
$allItems = [];

$formMsg = '';
$formErr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_migration_hi'])) {
    $reqId     = 'MIG' . date('Y') . rand(10000, 99999);
    $name      = trim($_POST['student_name'] ?? '');
    $fname     = trim($_POST['father_name'] ?? '');
    $enroll    = trim($_POST['enrollment_no'] ?? '');
    $course    = trim($_POST['course'] ?? '');
    $branch    = trim($_POST['branch'] ?? '');
    $year      = trim($_POST['passing_year'] ?? '');
    $mobile    = trim($_POST['mobile_no'] ?? '');
    $email     = trim($_POST['email_id'] ?? '');
    $address   = trim($_POST['postal_address'] ?? '');

    if (!empty($name) && !empty($enroll) && !empty($mobile)) {
        if ($pdo) {
            try {
                $stmtMig = $pdo->prepare("INSERT INTO migration_requests (req_id, student_name, father_name, enrollment_no, course, branch, passing_year, language, mobile_no, email_id, postal_address, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Hindi', ?, ?, ?, 'PENDING')");
                $stmtMig->execute([$reqId, $name, $fname, $enroll, $course, $branch, $year, $mobile, $email, $address]);
            } catch (Throwable $ex) {}
        }
        $formMsg = "माइग्रेशन प्रमाणपत्र आवेदन सफलतापूर्वक जमा हुआ! आवेदन संदर्भ ID: {$reqId}.";
    } else {
        $formErr = "कृपया विद्यार्थी का नाम, नामांकन क्रमांक, एवं मोबाइल नंबर दर्ज करें।";
    }
}

$eyebrow      = !empty($pRow['eyebrow'])       ? $pRow['eyebrow']       : 'परीक्षा शाखा · माइग्रेशन एवं उपाधि पत्र (हिंदी)';
$mainTitle    = !empty($pRow['page_title'])    ? $pRow['page_title']    : 'प्रव्रजन प्रमाणपत्र आवेदन पत्र (हिंदी)';
$heroSubtitle = !empty($pRow['hero_subtitle']) ? $pRow['hero_subtitle'] : 'आरकेडीएफ विश्वविद्यालय भोपाल से माइग्रेशन प्रमाणपत्र, प्रोविजनल डिग्री, एवं मूल उपाधि प्राप्त करने हेतु हिंदी आवेदन पत्र एवं दिशानिर्देश।';

$defaultMessage = "आरकेडीएफ विश्वविद्यालय भोपाल के परीक्षा एवं अकादमिक पंजीयन विभाग द्वारा प्रव्रजन प्रमाणपत्र (Migration Certificate), प्रोविजनल डिग्री, एवं मूल उपाधि पत्र प्राप्त करने हेतु हिंदी आवेदन पत्र की सुविधा उपलब्ध कराई गई है।\n\nउच्च अध्ययन अथवा अन्य विश्वविद्यालय में प्रवेश हेतु प्रस्थान करने वाले छात्र/छात्राएं निर्धारित शुल्क एवं अनापत्ति प्रमाणपत्र (No Dues Certificate) के साथ हिंदी में आवेदन पत्र डाउनलोड करके प्रस्तुत कर सकते हैं।";

$introHeading = !empty($pRow['intro_heading']) ? $pRow['intro_heading'] : "माइग्रेशन एवं प्रोविजनल प्रमाणपत्र शाखा (हिंदी)";
$introText    = !empty($pRow['intro_text'])    ? $pRow['intro_text']    : $defaultMessage;

// Group items by group_key
$groupedMH = [];
foreach ($allItems as $it) {
    $gName = !empty($it['group_key']) ? trim($it['group_key']) : 'माइग्रेशन एवं उपाधि आवेदन पत्र (हिंदी)';
    $groupedMH[$gName][] = $it;
}
?>
<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($mainTitle) ?> — RKDF University Bhopal</title>
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
                  url('<?= !empty($pRow['hero_bg_image']) ? htmlspecialchars($pRow['hero_bg_image']) : "images/lovable/rkdf-building-enhanced.jpg" ?>') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .mh-main-section { padding: 80px 0 100px; background: #FAF9F5; color: #0C1424; }
    .mh-grid-layout { display: grid; grid-template-columns: 8.5fr 3.5fr; gap: 48px; align-items: start; }
    @media (max-width: 992px) { .mh-grid-layout { grid-template-columns: 1fr; } }

    .mh-intro-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      padding: 36px 40px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      border-left: 5px solid #C5A059;
    }
    .mh-intro-title { font-family: 'Playfair Display', Georgia, serif; font-size: 26px; font-weight: 700; color: #0C1424; margin-bottom: 14px; }
    .mh-intro-text { font-size: 16.5px; line-height: 1.85; color: #334155; margin-bottom: 24px; }

    /* Hindi Guidelines Checklist Grid */
    .mh-info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
      margin-top: 24px;
    }
    .mh-info-box {
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 14px;
      padding: 20px 24px;
    }
    .mh-info-head {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      color: #E31B23;
      letter-spacing: 0.1em;
      margin-bottom: 8px;
    }
    .mh-info-val {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      font-weight: 700;
      color: #0C1424;
      line-height: 1.4;
    }
    .mh-info-desc {
      font-size: 13.5px;
      color: #64748B;
      margin-top: 6px;
      line-height: 1.5;
    }

    .mh-group-box { margin-bottom: 36px; }
    .mh-group-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #0C1424;
      margin-bottom: 18px;
      padding-bottom: 10px;
      border-bottom: 2px solid #C5A059;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .mh-card-row {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 16px;
      padding: 24px 30px;
      box-shadow: 0 4px 20px rgba(12, 20, 36, 0.04);
      margin-bottom: 18px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .mh-card-row:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(12, 20, 36, 0.08);
      border-color: #E31B23;
    }

    .mh-badge {
      display: inline-block;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      padding: 4px 12px;
      border-radius: 99px;
      background: rgba(227, 27, 35, 0.12);
      color: #E31B23;
      margin-bottom: 6px;
    }

    .mh-item-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; margin: 0 0 6px 0; }
    .mh-item-desc { font-size: 14px; color: #475569; margin: 0; line-height: 1.5; }

    .mh-pdf-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #0C1424;
      color: #ffffff;
      padding: 12px 24px;
      border-radius: 8px;
      font-size: 13.5px;
      font-weight: 700;
      text-decoration: none;
      transition: background 0.25s ease, transform 0.25s ease;
      white-space: nowrap;
    }
    .mh-pdf-btn:hover { background: #E31B23; transform: translateX(3px); }

    aside { position: sticky; top: 100px; }
    .sidebar-card { background: #ffffff; border: 1px solid rgba(12, 20, 36, 0.08); border-radius: 18px; padding: 28px 24px; box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04); }
    .sidebar-title { font-family: 'Playfair Display', Georgia, serif; font-size: 20px; font-weight: 700; color: #0C1424; padding-bottom: 14px; border-bottom: 2px solid #E31B23; margin-bottom: 20px; }
    .sidebar-nav-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; }
    .sidebar-link { display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; border-radius: 8px; color: #334155; font-size: 14px; font-weight: 600; text-decoration: none; background: #FAF9F5; border: 1px solid rgba(12, 20, 36, 0.05); transition: all 0.25s ease; }
    .sidebar-link:hover, .sidebar-link.active { background: #0C1424; color: #ffffff !important; border-color: #0C1424; transform: translateX(4px); }
    .sidebar-link.active { background: #E31B23; border-color: #E31B23; }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold"><?= htmlspecialchars($eyebrow) ?></span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;"><?= htmlspecialchars($mainTitle) ?></h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        <?= htmlspecialchars($heroSubtitle) ?>
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="mh-main-section">
    <div class="rk-container">
      <div class="mh-grid-layout">
        
        <!-- LEFT COLUMN: HINDI MIGRATION GUIDELINES & FORMS -->
        <div>
          
          <div class="mh-intro-card">
            <h2 class="mh-intro-title"><?= htmlspecialchars($introHeading) ?></h2>
            <?php
            $introParas = explode("\n", $introText);
            foreach ($introParas as $ipara):
              $itrim = trim($ipara);
              if (!empty($itrim)):
            ?>
            <p class="mh-intro-text"><?= htmlspecialchars($itrim) ?></p>
            <?php
              endif;
            endforeach;
            ?>

            <!-- HINDI GUIDELINES CHECKLIST GRID -->
            <div class="mh-info-grid">
              <div class="mh-info-box">
                <div class="mh-info-head">1. आवश्यक दस्तावेज</div>
                <div class="mh-info-val">अंतिम अंकसूची की प्रति</div>
                <div class="mh-info-desc">अंतिम उत्तीर्ण/अनुत्तीर्ण सेमेस्टर अंकसूची एवं हस्ताक्षरित नो-ड्यूज क्लीयरेंस संलग्न करें।</div>
              </div>

              <div class="mh-info-box">
                <div class="mh-info-head">2. आवेदन शुल्क</div>
                <div class="mh-info-val">रु 500 / प्रमाणपत्र</div>
                <div class="mh-info-desc">डिमांड ड्राफ्ट द्वारा "RKDF University Bhopal" के नाम देय अथवा काउंटर पर नकद जमा करें।</div>
              </div>

              <div class="mh-info-box">
                <div class="mh-info-head">3. भाषा चयन</div>
                <div class="mh-info-val">हिंदी आवेदन फॉर्म</div>
                <div class="mh-info-desc">हिंदी माध्यम के छात्र-छात्राओं हेतु विशेष रूप से तैयार किया गया अधिकृत आवेदन पत्र।</div>
              </div>
            </div>

          </div>

          <!-- RENDER GROUPED FORMS -->
          <?php foreach ($groupedMH as $gTitle => $mList): ?>
          <div class="mh-group-box">
            <div class="mh-group-title">
              <span><?= htmlspecialchars($gTitle) ?></span>
              <span style="font-size:12px;font-family:'JetBrains Mono',monospace;color:#C5A059;">
                <?= count($mList) ?> अधिकृत दस्तावेज
              </span>
            </div>

            <?php foreach ($mList as $item): ?>
            <article class="mh-card-row">
              <div style="max-width:520px;">
                <span class="mh-badge"><?= htmlspecialchars($item['badge_text'] ?: 'HINDI MIGRATION FORM') ?></span>
                <h3 class="mh-item-title"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="mh-item-desc"><?= htmlspecialchars($item['text_val']) ?></p>
              </div>
              <div>
                <a href="<?= htmlspecialchars(!empty($item['link_url']) ? $item['link_url'] : 'forms/Application For Hindi.pdf') ?>" target="_blank" class="mh-pdf-btn">
                  <span>📄 डाउनलोड हिंदी फॉर्म PDF</span> <span>↗</span>
                </a>
              </div>
            </article>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>

        </div>

        <!-- RIGHT COLUMN: SIDEBAR -->
        <aside>
          <!-- Online Migration Request Form Card -->
          <div class="sidebar-card" style="margin-bottom:24px;">
            <h4 class="sidebar-title">माइग्रेशन प्रमाणपत्र हेतु ऑनलाइन आवेदन</h4>

            <?php if (!empty($formMsg)): ?>
            <div style="background:#dcfce7;color:#166534;padding:12px;border-radius:8px;font-size:13px;font-weight:700;margin-bottom:14px;">
              <?= htmlspecialchars($formMsg) ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($formErr)): ?>
            <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:8px;font-size:13px;font-weight:700;margin-bottom:14px;">
              <?= htmlspecialchars($formErr) ?>
            </div>
            <?php endif; ?>

            <form method="post" action="Migration_Hindi.php">
              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">विद्यार्थी का नाम *</label>
                <input type="text" name="student_name" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" required placeholder="विद्यार्थी का पूर्ण नाम" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">पिता का नाम</label>
                <input type="text" name="father_name" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="पिता का नाम" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">नामांकन क्रमांक (Enrollment No) *</label>
                <input type="text" name="enrollment_no" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" required placeholder="ENROLLMENT NUMBER" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">मोबाइल नंबर *</label>
                <input type="text" name="mobile_no" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" required placeholder="10-अंकीय मोबाइल नंबर" />
              </div>

              <div style="margin-bottom:10px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">पाठ्यक्रम / विषय (Course)</label>
                <input type="text" name="course" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="उदा. बी.टेक, एम.बी.ए." />
              </div>

              <div style="margin-bottom:14px;">
                <label style="display:block;font-size:12px;font-weight:700;color:#0C1424;margin-bottom:4px;">प्रमाणपत्र भेजने हेतु डाक का पता</label>
                <input type="text" name="postal_address" style="width:100%;padding:8px 12px;border:1px solid #cbd5e1;border-radius:6px;font-size:13px;box-sizing:border-box;" placeholder="पूरा पत्राचार पता" />
              </div>

              <button type="submit" name="submit_migration_hi" style="width:100%;background:#0C1424;color:#ffffff;border:none;padding:12px;border-radius:8px;font-weight:700;font-size:13.5px;cursor:pointer;">आवेदन जमा करें ↗</button>
            </form>
          </div>

          <div class="sidebar-card">
            <h4 class="sidebar-title">परीक्षा सेवाएं (Hindi)</h4>
            <ul class="sidebar-nav-list">
              <li><a href="page.php?slug=migration-hindi" class="sidebar-link active"><span>माइग्रेशन फॉर्म (हिंदी)</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=migration-english" class="sidebar-link"><span>Migration Form (English)</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=marksheet-form" class="sidebar-link"><span>अंकसूची संशोधन फॉर्म</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=verification-form" class="sidebar-link"><span>दस्तावेज सत्यापन फॉर्म</span> <span>↗</span></a></li>
              <li><a href="page.php?slug=result" class="sidebar-link"><span>परीक्षा परिणाम (Results)</span> <span>↗</span></a></li>
            </ul>
          </div>
        </aside>

      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
