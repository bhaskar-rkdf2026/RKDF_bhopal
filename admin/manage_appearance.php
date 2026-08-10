<?php
// ============================================================
// RKDF University — Admin Appearance Manager
// Manages: Logo | Header | Nav Menu | Footer Links | Social
// ============================================================
$pageTitle = 'Appearance Manager — RKDF Admin Portal';
require_once 'header.php';
require_once '../config/db.php';
require_once __DIR__ . '/upload_handler.php';

$pdo = getDbConnection();

// ── Auto-create tables if not exist ──────────────────────────
$pdo->exec("
CREATE TABLE IF NOT EXISTS `nav_menu_items` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `label`      VARCHAR(100) NOT NULL,
  `url`        VARCHAR(255) DEFAULT '#',
  `target`     VARCHAR(20)  DEFAULT '_self',
  `parent_id`  INT          DEFAULT NULL,
  `sort_order` INT          DEFAULT 0,
  `is_active`  TINYINT(1)   DEFAULT 1,
  `updated_at` DATETIME     DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `footer_links` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `column_key` VARCHAR(50)  NOT NULL DEFAULT 'col1',
  `column_label` VARCHAR(100) NOT NULL DEFAULT 'Column',
  `label`      VARCHAR(150) NOT NULL,
  `url`        VARCHAR(255) DEFAULT '#',
  `target`     VARCHAR(20)  DEFAULT '_self',
  `sort_order` INT          DEFAULT 0,
  `is_active`  TINYINT(1)   DEFAULT 1,
  `updated_at` DATETIME     DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

// ── Seed default nav items if table empty ────────────────────
$navCount = $pdo->query("SELECT COUNT(*) FROM nav_menu_items")->fetchColumn();
if ($navCount == 0) {
    $seeds = [
        ['Admissions',    'admissionform.php',          '_self', null, 1],
        ['Academics',     'academic&departments.php',   '_self', null, 2],
        ['Schools',       'Engineering.php',            '_self', null, 3],
        ['Research',      'r&d.php',                    '_self', null, 4],
        ['Student Life',  'Hostel.php',                 '_self', null, 5],
        ['About',         'About_Us.pdf',               '_blank', null, 6],
        ['Contact',       'Contact_us.php',             '_self', null, 7],
        ['Apply Now',     'admissionform.php',          '_self', null, 8],
    ];
    $ins = $pdo->prepare("INSERT INTO nav_menu_items (label,url,target,parent_id,sort_order) VALUES (?,?,?,?,?)");
    foreach ($seeds as $s) { $ins->execute($s); }
}

// ── Seed default footer links if table empty ─────────────────
$footCount = $pdo->query("SELECT COUNT(*) FROM footer_links")->fetchColumn();
if ($footCount == 0) {
    $fseeds = [
        ['university','University','About RKDF','About_Us.pdf','_blank',1],
        ['university','University','Chancellor\'s Desk','Chancellor.php','_self',2],
        ['university','University','Vice Chancellor','Vice-Chancellor-Desk.php','_self',3],
        ['university','University','Leadership','Governingbody.php','_self',4],
        ['university','University','Careers','Careers.php','_self',5],
        ['admissions','Admissions','Apply Online','admissionform.php','_self',1],
        ['admissions','Admissions','Programs','academic&departments.php','_self',2],
        ['admissions','Admissions','Fee Structure','University_Fees_Structure.pdf','_blank',3],
        ['admissions','Admissions','Scholarships','scholarship.php','_self',4],
        ['admissions','Admissions','International','foreign_stud/index.html','_blank',5],
        ['academics','Academics','Schools','academic&departments.php','_self',1],
        ['academics','Academics','Departments','academic&departments.php','_self',2],
        ['academics','Academics','Research','r&d.php','_self',3],
        ['academics','Academics','Library','Library.php','_self',4],
        ['academics','Academics','Calendar','acadmiccalander.php','_self',5],
        ['resources','Resources','Student Portal','https://erplive.rkdf.ac.in/','_blank',1],
        ['resources','Resources','Downloads','Announcements.php','_self',2],
        ['resources','Resources','Results','Result.php','_self',3],
        ['resources','Resources','Alumni','Contact_us.php','_self',4],
        ['resources','Resources','Sitemap','sitemap.php','_self',5],
    ];
    $fins = $pdo->prepare("INSERT INTO footer_links (column_key,column_label,label,url,target,sort_order) VALUES (?,?,?,?,?,?)");
    foreach ($fseeds as $fs) { $fins->execute($fs); }
}

// ── Handle FORM SUBMISSIONS ───────────────────────────────────
$success = $error = '';
$action = $_POST['action'] ?? '';

// -- Logo / Header settings --
if ($action === 'save_appearance') {
    // Check for direct image file uploads for logos
    if (isset($_FILES['file_logo_crest']) && $_FILES['file_logo_crest']['error'] === UPLOAD_ERR_OK) {
        $upRes = handleImageUpload($_FILES['file_logo_crest']);
        if ($upRes['success']) $_POST['logo_crest'] = $upRes['path'];
    }
    if (isset($_FILES['file_logo_name']) && $_FILES['file_logo_name']['error'] === UPLOAD_ERR_OK) {
        $upRes = handleImageUpload($_FILES['file_logo_name']);
        if ($upRes['success']) $_POST['logo_name'] = $upRes['path'];
    }
    if (isset($_FILES['file_logo_footer']) && $_FILES['file_logo_footer']['error'] === UPLOAD_ERR_OK) {
        $upRes = handleImageUpload($_FILES['file_logo_footer']);
        if ($upRes['success']) $_POST['footer_logo'] = $upRes['path'];
    }

    $keys = ['logo_crest','logo_name','footer_logo','site_title',
             'footer_address','footer_phone','footer_email',
             'social_facebook','social_instagram','social_twitter',
             'social_linkedin','social_youtube',
             'footer_copyright_extra'];
    $up = $pdo->prepare("INSERT INTO site_settings (setting_key,setting_value,setting_group)
                         VALUES (?,?,?)
                         ON DUPLICATE KEY UPDATE setting_value=VALUES(setting_value)");
    foreach ($keys as $k) {
        $val = trim($_POST[$k] ?? '');
        $up->execute([$k, $val, 'appearance']);
    }
    $success = 'Appearance settings saved!';
}

// -- Add Nav Menu Item --
if ($action === 'add_nav') {
    $pdo->prepare("INSERT INTO nav_menu_items (label,url,target,sort_order,is_active) VALUES (?,?,?,?,1)")
        ->execute([trim($_POST['nav_label']), trim($_POST['nav_url']), $_POST['nav_target']??'_self', (int)($_POST['nav_sort']??99)]);
    $success = 'Nav item added!';
}
// -- Update Nav Item --
if ($action === 'update_nav') {
    $pdo->prepare("UPDATE nav_menu_items SET label=?,url=?,target=?,sort_order=?,is_active=? WHERE id=?")
        ->execute([trim($_POST['nav_label']), trim($_POST['nav_url']), $_POST['nav_target']??'_self',
                   (int)($_POST['nav_sort']??0), isset($_POST['nav_active'])?1:0, (int)$_POST['nav_id']]);
    $success = 'Nav item updated!';
}
// -- Delete Nav Item --
if ($action === 'delete_nav') {
    $pdo->prepare("DELETE FROM nav_menu_items WHERE id=?")->execute([(int)$_POST['nav_id']]);
    $success = 'Nav item deleted!';
}

// -- Add Footer Link --
if ($action === 'add_footer') {
    $pdo->prepare("INSERT INTO footer_links (column_key,column_label,label,url,target,sort_order,is_active) VALUES (?,?,?,?,?,?,1)")
        ->execute([trim($_POST['fc_key']), trim($_POST['fc_label']), trim($_POST['fl_label']),
                   trim($_POST['fl_url']), $_POST['fl_target']??'_self', (int)($_POST['fl_sort']??99)]);
    $success = 'Footer link added!';
}
// -- Update Footer Link --
if ($action === 'update_footer') {
    $pdo->prepare("UPDATE footer_links SET column_key=?,column_label=?,label=?,url=?,target=?,sort_order=?,is_active=? WHERE id=?")
        ->execute([trim($_POST['fc_key']), trim($_POST['fc_label']), trim($_POST['fl_label']),
                   trim($_POST['fl_url']), $_POST['fl_target']??'_self', (int)($_POST['fl_sort']??0),
                   isset($_POST['fl_active'])?1:0, (int)$_POST['fl_id']]);
    $success = 'Footer link updated!';
}
// -- Delete Footer Link --
if ($action === 'delete_footer') {
    $pdo->prepare("DELETE FROM footer_links WHERE id=?")->execute([(int)$_POST['fl_id']]);
    $success = 'Footer link deleted!';
}

// ── Fetch current data ────────────────────────────────────────
require_once '../include/site_settings.php';
$navItems    = $pdo->query("SELECT * FROM nav_menu_items ORDER BY sort_order,id")->fetchAll();
$footerLinks = $pdo->query("SELECT * FROM footer_links ORDER BY column_key,sort_order,id")->fetchAll();

// Group footer links by column
$footerCols = [];
foreach ($footerLinks as $fl) {
    $footerCols[$fl['column_key']]['label'] = $fl['column_label'];
    $footerCols[$fl['column_key']]['items'][] = $fl;
}

// ── Appearance settings ───────────────────────────────────────
$aSettings = [
    'logo_crest'             => get_site_setting('logo_crest',  'images/img/logo33.png'),
    'logo_name'              => get_site_setting('logo_name',   'images/img/logo22.png'),
    'footer_logo'            => get_site_setting('footer_logo', 'images/lovable/rkdf-logo.png'),
    'site_title'             => get_site_setting('site_title',  'RKDF University Bhopal'),
    'footer_address'         => get_site_setting('footer_address','Airport Bypass Road, Gandhi Nagar, Bhopal, MP 462033'),
    'footer_phone'           => get_site_setting('footer_phone', '+91 755 2751 000'),
    'footer_email'           => get_site_setting('footer_email', 'admissions@rkdf.ac.in'),
    'social_facebook'        => get_site_setting('social_facebook',  'https://facebook.com'),
    'social_instagram'       => get_site_setting('social_instagram', 'https://instagram.com'),
    'social_twitter'         => get_site_setting('social_twitter',   'https://twitter.com'),
    'social_linkedin'        => get_site_setting('social_linkedin',  'https://linkedin.com'),
    'social_youtube'         => get_site_setting('social_youtube',   'https://youtube.com'),
    'footer_copyright_extra' => get_site_setting('footer_copyright_extra', ''),
];

$editNavId    = isset($_GET['edit_nav'])    ? (int)$_GET['edit_nav']    : 0;
$editFooterId = isset($_GET['edit_footer']) ? (int)$_GET['edit_footer'] : 0;
$editNavRow    = $editNavId    ? $pdo->query("SELECT * FROM nav_menu_items WHERE id=$editNavId")->fetch() : null;
$editFooterRow = $editFooterId ? $pdo->query("SELECT * FROM footer_links WHERE id=$editFooterId")->fetch() : null;
?>

<style>
.ap-tabs { display:flex; gap:0; border-bottom:2px solid var(--border-color); margin-bottom:28px; }
.ap-tab  { padding:12px 24px; font-size:14px; font-weight:700; color:var(--text-muted); cursor:pointer;
           border:none; background:none; border-bottom:3px solid transparent; margin-bottom:-2px; transition:all .2s; }
.ap-tab.active { color:var(--primary); border-bottom-color:var(--primary); }
.ap-pane { display:none; }
.ap-pane.active { display:block; }

.ap-card { background:#fff; border-radius:12px; border:1px solid var(--border-color); padding:24px; margin-bottom:24px; }
.ap-card-head { font-size:15px; font-weight:800; color:var(--secondary); margin-bottom:20px; display:flex; align-items:center; gap:8px; }
.ap-card-head i { color:var(--primary); }

.ap-grid2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.ap-grid3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; }
.ap-full  { grid-column: 1 / -1; }

.form-group { display:flex; flex-direction:column; gap:6px; }
.form-group label { font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:.5px; color:var(--text-muted); }
.form-group input, .form-group select, .form-group textarea {
  width:100%; padding:10px 14px; border:1px solid var(--border-color); border-radius:8px;
  font-size:14px; color:var(--text-main); outline:none; transition:border .2s; background:#fafafa;
}
.form-group input:focus, .form-group select:focus { border-color:var(--primary); background:#fff; }

.btn-save  { background:var(--primary); color:#fff; border:none; padding:10px 24px; border-radius:8px;
             font-weight:700; font-size:13px; cursor:pointer; display:inline-flex; align-items:center; gap:8px; }
.btn-save:hover { background:var(--primary-dark); }
.btn-edit  { background:#e0f2fe; color:#0369a1; border:none; padding:6px 12px; border-radius:6px; font-size:12px; font-weight:700; cursor:pointer; text-decoration:none; }
.btn-del   { background:#fee2e2; color:#b91c1c; border:none; padding:6px 12px; border-radius:6px; font-size:12px; font-weight:700; cursor:pointer; margin-left:6px; }
.btn-ghost { background:transparent; color:var(--text-muted); border:1px solid var(--border-color);
             padding:9px 20px; border-radius:8px; font-weight:600; font-size:13px; cursor:pointer; }

.ap-table { width:100%; border-collapse:collapse; font-size:13px; }
.ap-table th { background:#f8fafc; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.5px;
               color:var(--text-muted); padding:12px 14px; text-align:left; border-bottom:2px solid var(--border-color); }
.ap-table td { padding:12px 14px; border-bottom:1px solid var(--border-color); vertical-align:middle; }
.ap-table tr:last-child td { border-bottom:none; }
.ap-badge-active   { background:#dcfce7; color:#166534; padding:2px 8px; border-radius:99px; font-size:11px; font-weight:700; }
.ap-badge-inactive { background:#fee2e2; color:#991b1b; padding:2px 8px; border-radius:99px; font-size:11px; font-weight:700; }

.ap-alert-ok  { background:#dcfce7; color:#166534; border:1px solid #bbf7d0; padding:12px 16px; border-radius:8px; font-weight:600; font-size:14px; margin-bottom:20px; }
.ap-alert-err { background:#fee2e2; color:#991b1b; border:1px solid #fecaca; padding:12px 16px; border-radius:8px; font-weight:600; font-size:14px; margin-bottom:20px; }

.logo-preview { display:flex; align-items:center; gap:16px; padding:18px; background:#0f172a; border-radius:10px; border:1px solid #334155; box-shadow: inset 0 2px 4px rgba(0,0,0,0.3); }
.logo-preview img { height:50px; width:auto; object-fit:contain; background: rgba(255,255,255,0.05); padding: 4px; border-radius: 4px; }
.logo-preview .logo-preview-label { font-size:12px; color:#f8fafc; font-weight:700; }
</style>

<?php if ($success): ?><div class="ap-alert-ok"><i class="fa-solid fa-circle-check"></i> <?= htmlspecialchars($success) ?></div><?php endif; ?>
<?php if ($error): ?><div class="ap-alert-err"><i class="fa-solid fa-circle-xmark"></i> <?= htmlspecialchars($error) ?></div><?php endif; ?>

<!-- Tab Navigation -->
<div class="ap-tabs" id="apTabs">
  <button class="ap-tab active" onclick="switchTab('logos')"><i class="fa-solid fa-image"></i> Logo & Branding</button>
  <button class="ap-tab"       onclick="switchTab('nav')">  <i class="fa-solid fa-bars"></i>  Nav Menu</button>
  <button class="ap-tab"       onclick="switchTab('footer')"><i class="fa-solid fa-layer-group"></i> Footer Links</button>
  <button class="ap-tab"       onclick="switchTab('social')"><i class="fa-solid fa-share-nodes"></i> Social & Contact</button>
</div>

<!-- ════════════════════════════════════════════════════════
  TAB 1: Logo & Branding
════════════════════════════════════════════════════════ -->
<div class="ap-pane active" id="pane-logos">
  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="save_appearance">

<?php
function admin_img_url($path) {
    $path = trim($path);
    if (empty($path)) return '';
    if (preg_match('#^(https?://|/|\.\./)#i', $path)) {
        return $path;
    }
    return '../' . $path;
}
?>

    <div class="ap-card">
      <div class="ap-card-head"><i class="fa-solid fa-image"></i> Site Logo Files & File Uploaders</div>

      <!-- Live preview (Dark background for crisp visibility of white logos) -->
      <div class="logo-preview" style="margin-bottom:20px;">
        <img id="prevCrest" src="<?= htmlspecialchars(admin_img_url($aSettings['logo_crest'])) ?>" alt="Crest">
        <div>
          <div class="logo-preview-label">Crest / Badge (logo33)</div>
          <div style="font-size:11px;color:#94a3b8;">Left side of navbar</div>
        </div>
        <div style="width:1px;height:40px;background:#334155;margin:0 8px;"></div>
        <img id="prevName" src="<?= htmlspecialchars(admin_img_url($aSettings['logo_name'])) ?>" alt="Name Logo">
        <div>
          <div class="logo-preview-label">Name / Text Logo (logo22)</div>
          <div style="font-size:11px;color:#94a3b8;">Right side of crest in navbar</div>
        </div>
        <div style="width:1px;height:40px;background:#334155;margin:0 8px;"></div>
        <img id="prevFooter" src="<?= htmlspecialchars(admin_img_url($aSettings['footer_logo'])) ?>" alt="Footer Logo">
        <div>
          <div class="logo-preview-label">Footer Logo</div>
          <div style="font-size:11px;color:#94a3b8;">Shown in footer brand column</div>
        </div>
      </div>

      <div class="ap-grid3">
        <div class="form-group">
          <label>Navbar Crest Logo (logo33)</label>
          <input type="text" name="logo_crest" id="input_logo_crest" value="<?= htmlspecialchars($aSettings['logo_crest']) ?>"
                 placeholder="images/img/logo33.png" oninput="updatePrev('prevCrest', this.value)">
          <div style="margin-top:6px;">
            <span style="font-size:11px;color:#64748b;display:block;margin-bottom:2px;">Upload New Image File:</span>
            <input type="file" name="file_logo_crest" accept="image/*" style="font-size:12px;">
          </div>
        </div>
        <div class="form-group">
          <label>Navbar Name Logo (logo22)</label>
          <input type="text" name="logo_name" id="input_logo_name" value="<?= htmlspecialchars($aSettings['logo_name']) ?>"
                 placeholder="images/img/logo22.png" oninput="updatePrev('prevName', this.value)">
          <div style="margin-top:6px;">
            <span style="font-size:11px;color:#64748b;display:block;margin-bottom:2px;">Upload New Image File:</span>
            <input type="file" name="file_logo_name" accept="image/*" style="font-size:12px;">
          </div>
        </div>
        <div class="form-group">
          <label>Footer Logo</label>
          <input type="text" name="footer_logo" id="input_footer_logo" value="<?= htmlspecialchars($aSettings['footer_logo']) ?>"
                 placeholder="images/lovable/rkdf-logo.png" oninput="updatePrev('prevFooter', this.value)">
          <div style="margin-top:6px;">
            <span style="font-size:11px;color:#64748b;display:block;margin-bottom:2px;">Upload New Image File:</span>
            <input type="file" name="file_logo_footer" accept="image/*" style="font-size:12px;">
          </div>
        </div>
      </div>
    </div>

    <div class="ap-card">
      <div class="ap-card-head"><i class="fa-solid fa-font"></i> Site Identity</div>
      <div class="ap-grid2">
        <div class="form-group">
          <label>Site / University Title</label>
          <input type="text" name="site_title" value="<?= htmlspecialchars($aSettings['site_title']) ?>">
        </div>
        <div class="form-group">
          <label>Footer Copyright Extra Text (optional)</label>
          <input type="text" name="footer_copyright_extra" value="<?= htmlspecialchars($aSettings['footer_copyright_extra']) ?>"
                 placeholder="e.g. · NAAC A+ Accredited">
        </div>
      </div>
    </div>

    <div style="text-align:right;">
      <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Save Appearance</button>
    </div>
  </form>
</div>


<!-- ════════════════════════════════════════════════════════
  TAB 2: Nav Menu
════════════════════════════════════════════════════════ -->
<div class="ap-pane" id="pane-nav">
  <!-- Add / Edit Nav Item Form -->
  <div class="ap-card">
    <div class="ap-card-head"><i class="fa-solid fa-<?= $editNavRow ? 'pen' : 'plus' ?>"></i>
      <?= $editNavRow ? 'Edit Nav Item' : 'Add New Nav Item' ?>
    </div>
    <form method="POST">
      <input type="hidden" name="action" value="<?= $editNavRow ? 'update_nav' : 'add_nav' ?>">
      <?php if ($editNavRow): ?><input type="hidden" name="nav_id" value="<?= $editNavRow['id'] ?>"><?php endif; ?>
      <div class="ap-grid3">
        <div class="form-group">
          <label>Menu Label *</label>
          <input type="text" name="nav_label" required value="<?= htmlspecialchars($editNavRow['label'] ?? '') ?>" placeholder="e.g. Admissions">
        </div>
        <div class="form-group">
          <label>URL / Link *</label>
          <input type="text" name="nav_url" required value="<?= htmlspecialchars($editNavRow['url'] ?? '') ?>" placeholder="admissionform.php">
        </div>
        <div class="form-group">
          <label>Open In</label>
          <select name="nav_target">
            <option value="_self"  <?= ($editNavRow['target']??'_self')==='_self'  ? 'selected':'' ?>>Same Tab</option>
            <option value="_blank" <?= ($editNavRow['target']??'')==='_blank' ? 'selected':'' ?>>New Tab</option>
          </select>
        </div>
        <div class="form-group">
          <label>Sort Order</label>
          <input type="number" name="nav_sort" value="<?= htmlspecialchars($editNavRow['sort_order'] ?? count($navItems)+1) ?>">
        </div>
        <?php if ($editNavRow): ?>
        <div class="form-group" style="justify-content:flex-end;">
          <label style="visibility:hidden;">Active</label>
          <label style="display:flex;align-items:center;gap:8px;cursor:pointer;text-transform:none;font-size:14px;margin-top:8px;">
            <input type="checkbox" name="nav_active" value="1" <?= $editNavRow['is_active'] ? 'checked':'' ?>>
            <b>Active / Visible</b>
          </label>
        </div>
        <?php endif; ?>
      </div>
      <div style="margin-top:16px;display:flex;gap:10px;">
        <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> <?= $editNavRow ? 'Update' : 'Add Item' ?></button>
        <?php if ($editNavRow): ?>
        <a href="manage_appearance.php?tab=nav" class="btn-ghost">Cancel</a>
        <?php endif; ?>
      </div>
    </form>
  </div>

  <!-- Nav Items Table -->
  <div class="ap-card">
    <div class="ap-card-head"><i class="fa-solid fa-list-ul"></i> Current Menu Items (<?= count($navItems) ?>)</div>
    <?php if (empty($navItems)): ?>
    <p style="color:var(--text-muted);text-align:center;padding:24px;">No menu items yet. Add one above!</p>
    <?php else: ?>
    <table class="ap-table">
      <thead><tr>
        <th>#</th><th>Label</th><th>URL</th><th>Target</th><th>Order</th><th>Status</th><th>Actions</th>
      </tr></thead>
      <tbody>
      <?php foreach ($navItems as $ni): ?>
      <tr>
        <td><?= $ni['id'] ?></td>
        <td><b><?= htmlspecialchars($ni['label']) ?></b></td>
        <td><span style="color:#64748b;font-size:12px;"><?= htmlspecialchars($ni['url']) ?></span></td>
        <td><?= $ni['target'] ?></td>
        <td><?= $ni['sort_order'] ?></td>
        <td>
          <?php if ($ni['is_active']): ?>
          <span class="ap-badge-active">Active</span>
          <?php else: ?>
          <span class="ap-badge-inactive">Hidden</span>
          <?php endif; ?>
        </td>
        <td>
          <a href="manage_appearance.php?tab=nav&edit_nav=<?= $ni['id'] ?>" class="btn-edit">Edit</a>
          <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this nav item?')">
            <input type="hidden" name="action" value="delete_nav">
            <input type="hidden" name="nav_id" value="<?= $ni['id'] ?>">
            <button type="submit" class="btn-del">Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>

  <div style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:8px;padding:14px 16px;font-size:13px;color:#1e40af;">
    <i class="fa-solid fa-circle-info"></i>
    <b>Note:</b> Menu changes take effect immediately on the live site. The navbar reads these items from the database on every page load.
  </div>
</div>


<!-- ════════════════════════════════════════════════════════
  TAB 3: Footer Links
════════════════════════════════════════════════════════ -->
<div class="ap-pane" id="pane-footer">
  <!-- Add / Edit Footer Link Form -->
  <div class="ap-card">
    <div class="ap-card-head"><i class="fa-solid fa-<?= $editFooterRow ? 'pen' : 'plus' ?>"></i>
      <?= $editFooterRow ? 'Edit Footer Link' : 'Add Footer Link' ?>
    </div>
    <form method="POST">
      <input type="hidden" name="action" value="<?= $editFooterRow ? 'update_footer' : 'add_footer' ?>">
      <?php if ($editFooterRow): ?><input type="hidden" name="fl_id" value="<?= $editFooterRow['id'] ?>"><?php endif; ?>
      <div class="ap-grid3">
        <div class="form-group">
          <label>Column Key *</label>
          <input type="text" name="fc_key" required
                 value="<?= htmlspecialchars($editFooterRow['column_key'] ?? '') ?>"
                 placeholder="e.g. university, admissions">
          <small style="color:#94a3b8;font-size:11px;">Lowercase slug used to group links</small>
        </div>
        <div class="form-group">
          <label>Column Heading *</label>
          <input type="text" name="fc_label" required
                 value="<?= htmlspecialchars($editFooterRow['column_label'] ?? '') ?>"
                 placeholder="e.g. University">
        </div>
        <div class="form-group">
          <label>Link Label *</label>
          <input type="text" name="fl_label" required
                 value="<?= htmlspecialchars($editFooterRow['label'] ?? '') ?>"
                 placeholder="e.g. About RKDF">
        </div>
        <div class="form-group">
          <label>URL *</label>
          <input type="text" name="fl_url" required
                 value="<?= htmlspecialchars($editFooterRow['url'] ?? '') ?>"
                 placeholder="About_Us.pdf">
        </div>
        <div class="form-group">
          <label>Open In</label>
          <select name="fl_target">
            <option value="_self"  <?= ($editFooterRow['target']??'_self')==='_self'  ? 'selected':'' ?>>Same Tab</option>
            <option value="_blank" <?= ($editFooterRow['target']??'')==='_blank' ? 'selected':'' ?>>New Tab</option>
          </select>
        </div>
        <div class="form-group">
          <label>Sort Order</label>
          <input type="number" name="fl_sort" value="<?= htmlspecialchars($editFooterRow['sort_order'] ?? 99) ?>">
        </div>
        <?php if ($editFooterRow): ?>
        <div class="form-group" style="justify-content:flex-end;">
          <label style="visibility:hidden;">Active</label>
          <label style="display:flex;align-items:center;gap:8px;cursor:pointer;text-transform:none;font-size:14px;margin-top:8px;">
            <input type="checkbox" name="fl_active" value="1" <?= $editFooterRow['is_active'] ? 'checked':'' ?>>
            <b>Active / Visible</b>
          </label>
        </div>
        <?php endif; ?>
      </div>
      <div style="margin-top:16px;display:flex;gap:10px;">
        <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> <?= $editFooterRow ? 'Update Link' : 'Add Link' ?></button>
        <?php if ($editFooterRow): ?>
        <a href="manage_appearance.php?tab=footer" class="btn-ghost">Cancel</a>
        <?php endif; ?>
      </div>
    </form>
  </div>

  <!-- Footer Links Table by Column -->
  <?php foreach ($footerCols as $cKey => $col): ?>
  <div class="ap-card">
    <div class="ap-card-head">
      <i class="fa-solid fa-folder"></i>
      Column: <b><?= htmlspecialchars($col['label']) ?></b>
      <span style="background:#f1f5f9;border-radius:6px;padding:2px 8px;font-size:11px;color:#64748b;margin-left:8px;"><?= htmlspecialchars($cKey) ?></span>
    </div>
    <table class="ap-table">
      <thead><tr><th>#</th><th>Label</th><th>URL</th><th>Target</th><th>Order</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody>
      <?php foreach ($col['items'] as $fl): ?>
      <tr>
        <td><?= $fl['id'] ?></td>
        <td><b><?= htmlspecialchars($fl['label']) ?></b></td>
        <td><span style="color:#64748b;font-size:12px;"><?= htmlspecialchars($fl['url']) ?></span></td>
        <td><?= $fl['target'] ?></td>
        <td><?= $fl['sort_order'] ?></td>
        <td><?= $fl['is_active'] ? '<span class="ap-badge-active">Active</span>' : '<span class="ap-badge-inactive">Hidden</span>' ?></td>
        <td>
          <a href="manage_appearance.php?tab=footer&edit_footer=<?= $fl['id'] ?>" class="btn-edit">Edit</a>
          <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this footer link?')">
            <input type="hidden" name="action" value="delete_footer">
            <input type="hidden" name="fl_id" value="<?= $fl['id'] ?>">
            <button type="submit" class="btn-del">Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endforeach; ?>
</div>


<!-- ════════════════════════════════════════════════════════
  TAB 4: Social & Contact
════════════════════════════════════════════════════════ -->
<div class="ap-pane" id="pane-social">
  <form method="POST">
    <input type="hidden" name="action" value="save_appearance">
    <!-- Need to re-send logo/title fields too so they don't get wiped -->
    <input type="hidden" name="logo_crest"             value="<?= htmlspecialchars($aSettings['logo_crest']) ?>">
    <input type="hidden" name="logo_name"              value="<?= htmlspecialchars($aSettings['logo_name']) ?>">
    <input type="hidden" name="footer_logo"            value="<?= htmlspecialchars($aSettings['footer_logo']) ?>">
    <input type="hidden" name="site_title"             value="<?= htmlspecialchars($aSettings['site_title']) ?>">
    <input type="hidden" name="footer_copyright_extra" value="<?= htmlspecialchars($aSettings['footer_copyright_extra']) ?>">

    <div class="ap-card">
      <div class="ap-card-head"><i class="fa-solid fa-address-book"></i> Footer Contact Info</div>
      <div class="ap-grid3">
        <div class="form-group ap-full">
          <label>Campus Address</label>
          <input type="text" name="footer_address" value="<?= htmlspecialchars($aSettings['footer_address']) ?>">
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="footer_phone" value="<?= htmlspecialchars($aSettings['footer_phone']) ?>">
        </div>
        <div class="form-group">
          <label>Email Address</label>
          <input type="email" name="footer_email" value="<?= htmlspecialchars($aSettings['footer_email']) ?>">
        </div>
      </div>
    </div>

    <div class="ap-card">
      <div class="ap-card-head"><i class="fa-solid fa-share-nodes"></i> Social Media URLs</div>
      <div class="ap-grid3">
        <div class="form-group">
          <label><i class="fa-brands fa-facebook" style="color:#1877f2;"></i> Facebook</label>
          <input type="url" name="social_facebook" value="<?= htmlspecialchars($aSettings['social_facebook']) ?>">
        </div>
        <div class="form-group">
          <label><i class="fa-brands fa-instagram" style="color:#e1306c;"></i> Instagram</label>
          <input type="url" name="social_instagram" value="<?= htmlspecialchars($aSettings['social_instagram']) ?>">
        </div>
        <div class="form-group">
          <label><i class="fa-brands fa-x-twitter"></i> Twitter / X</label>
          <input type="url" name="social_twitter" value="<?= htmlspecialchars($aSettings['social_twitter']) ?>">
        </div>
        <div class="form-group">
          <label><i class="fa-brands fa-linkedin" style="color:#0a66c2;"></i> LinkedIn</label>
          <input type="url" name="social_linkedin" value="<?= htmlspecialchars($aSettings['social_linkedin']) ?>">
        </div>
        <div class="form-group">
          <label><i class="fa-brands fa-youtube" style="color:#ff0000;"></i> YouTube</label>
          <input type="url" name="social_youtube" value="<?= htmlspecialchars($aSettings['social_youtube']) ?>">
        </div>
      </div>
    </div>

    <div style="text-align:right;">
      <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Save Social & Contact</button>
    </div>
  </form>
</div>


<script>
// Live Image Preview helper
function updatePrev(imgId, val) {
  var img = document.getElementById(imgId);
  if (!img) return;
  val = (val || '').trim();
  if (!val) { img.src = ''; return; }
  if (val.startsWith('http://') || val.startsWith('https://') || val.startsWith('/') || val.startsWith('../')) {
    img.src = val;
  } else {
    img.src = '../' + val;
  }
}

// ── Tab switching with URL hash ───────────────────────────────
var tabMap = { logos:'pane-logos', nav:'pane-nav', footer:'pane-footer', social:'pane-social' };
function switchTab(t) {
  document.querySelectorAll('.ap-pane').forEach(function(p){ p.classList.remove('active'); });
  document.querySelectorAll('.ap-tab').forEach(function(b){ b.classList.remove('active'); });
  var pane = document.getElementById('pane-' + t);
  if (pane) pane.classList.add('active');
  var tabs = document.querySelectorAll('.ap-tab');
  var order = Object.keys(tabMap);
  var idx = order.indexOf(t);
  if (tabs[idx]) tabs[idx].classList.add('active');
  history.replaceState(null,'','?tab='+t);
}
// Load tab from URL param
(function(){
  var p = new URLSearchParams(location.search).get('tab');
  if (p && tabMap[p]) switchTab(p);
})();
</script>

<?php require_once 'footer.php'; ?>
