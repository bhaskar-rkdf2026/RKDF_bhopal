<?php
// ============================================================
// RKDF University — Admin Page Manager (With Page Dropdown)
// Allows selecting & editing ANY page from sitemap via Dropdown
// ============================================================
$pageTitle = 'Page Content Editor — RKDF CMS';
require_once 'header.php';
require_once '../config/db.php';

$pdo = getDbConnection();

// Fetch all registered site pages for the dropdown
$allPages = $pdo->query("SELECT page_slug, page_title, category FROM site_pages ORDER BY category, sort_order, page_title")->fetchAll();

$selectedSlug = $_GET['slug'] ?? ($allPages[0]['page_slug'] ?? 'scholarship');

// Ensure page exists in DB
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ?");
$stmt->execute([$selectedSlug]);
$pageRow = $stmt->fetch();

if (!$pageRow && !empty($allPages)) {
    $selectedSlug = $allPages[0]['page_slug'];
    $stmt->execute([$selectedSlug]);
    $pageRow = $stmt->fetch();
}

// ── Handle Form Submissions ───────────────────────────────────────
$success = $error = '';
$action = $_POST['action'] ?? '';

// Save Page Header / Hero Content
if ($action === 'save_header') {
    $pdo->prepare("UPDATE site_pages SET page_title=?, eyebrow=?, hero_subtitle=?, intro_heading=?, intro_text=?, meta_keywords=?, meta_description=?, is_active=? WHERE page_slug=?")
        ->execute([
            trim($_POST['page_title']),
            trim($_POST['eyebrow']),
            trim($_POST['hero_subtitle']),
            trim($_POST['intro_heading']),
            trim($_POST['intro_text']),
            trim($_POST['meta_keywords']),
            trim($_POST['meta_description']),
            isset($_POST['is_active']) ? 1 : 0,
            $selectedSlug
        ]);
    $success = 'Page header details updated!';
    $stmt->execute([$selectedSlug]);
    $pageRow = $stmt->fetch();
}

// Add Section Card to selected page
if ($action === 'add_item') {
    $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active)
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)")
        ->execute([
            $selectedSlug,
            trim($_POST['group_key'] ?? 'general'),
            trim($_POST['item_title']),
            trim($_POST['item_subtitle']),
            trim($_POST['number_val']),
            trim($_POST['item_text']),
            trim($_POST['image_path']),
            trim($_POST['link_url']),
            trim($_POST['badge_text']),
            (int)($_POST['sort_order'] ?? 99)
        ]);
    $success = 'Content card added to page!';
}

// Update Section Card
if ($action === 'update_item') {
    $pdo->prepare("UPDATE page_sections SET group_key=?, title=?, subtitle=?, number_val=?, text_val=?, image_path=?, link_url=?, badge_text=?, sort_order=?, is_active=? WHERE id=?")
        ->execute([
            trim($_POST['group_key'] ?? 'general'),
            trim($_POST['item_title']),
            trim($_POST['item_subtitle']),
            trim($_POST['number_val']),
            trim($_POST['item_text']),
            trim($_POST['image_path']),
            trim($_POST['link_url']),
            trim($_POST['badge_text']),
            (int)($_POST['sort_order'] ?? 0),
            isset($_POST['is_active']) ? 1 : 0,
            (int)$_POST['item_id']
        ]);
    $success = 'Content card updated!';
}

// Delete Section Card
if ($action === 'delete_item') {
    $pdo->prepare("DELETE FROM page_sections WHERE id=?")->execute([(int)$_POST['item_id']]);
    $success = 'Content card deleted!';
}

// Fetch items for selected page
$itemsStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug=? ORDER BY group_key, sort_order, id");
$itemsStmt->execute([$selectedSlug]);
$allItems = $itemsStmt->fetchAll();

// Group items
$groupedItems = [];
foreach ($allItems as $it) {
    $groupedItems[$it['group_key']][] = $it;
}

$editItemId = isset($_GET['edit_item']) ? (int)$_GET['edit_item'] : 0;
$editItemRow = $editItemId ? $pdo->query("SELECT * FROM page_sections WHERE id=$editItemId")->fetch() : null;

// Determine live URL
$liveUrl = "../page.php?slug=" . urlencode($selectedSlug);
if ($selectedSlug === 'scholarship')  $liveUrl = "../scholarship.php";
if ($selectedSlug === 'chancellor')   $liveUrl = "../Chancellor.php";
if ($selectedSlug === 'vc-desk')      $liveUrl = "../Vice-Chancellor-Desk.php";
if ($selectedSlug === 'vision-mission') $liveUrl = "../Vision&mission.php";
if ($selectedSlug === 'engineering')  $liveUrl = "../Engineering.php";
if ($selectedSlug === 'pharmacy')     $liveUrl = "../pharmacy.php";
if ($selectedSlug === 'management')   $liveUrl = "../Management.php";
if ($selectedSlug === 'contact')      $liveUrl = "../Contact_us.php";
?>

<style>
.page-dropdown-bar {
  background: #ffffff;
  border: 1px solid var(--border-color);
  border-radius: 12px;
  padding: 20px 24px;
  margin-bottom: 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  flex-wrap: wrap;
  box-shadow: 0 4px 12px rgba(0,0,0,0.03);
}
.page-dropdown-bar label {
  font-size: 14px;
  font-weight: 800;
  color: var(--secondary);
  display: flex;
  align-items: center;
  gap: 8px;
}
.page-select-dropdown {
  padding: 10px 16px;
  font-size: 15px;
  font-weight: 700;
  color: var(--secondary);
  border: 2px solid var(--primary);
  border-radius: 8px;
  background: #fff;
  outline: none;
  cursor: pointer;
  min-width: 320px;
}

.pm-card { background:#fff; border-radius:12px; border:1px solid var(--border-color); padding:24px; margin-bottom:24px; }
.pm-card-head { font-size:16px; font-weight:800; color:var(--secondary); margin-bottom:20px; display:flex; align-items:center; justify-content:space-between; }
.pm-card-head i { color:var(--primary); }

.pm-grid2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.pm-grid3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; }
.pm-full  { grid-column:1 / -1; }

.form-group { display:flex; flex-direction:column; gap:6px; }
.form-group label { font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:.5px; color:var(--text-muted); }
.form-group input, .form-group select, .form-group textarea {
  width:100%; padding:10px 14px; border:1px solid var(--border-color); border-radius:8px;
  font-size:14px; color:var(--text-main); outline:none; transition:border .2s; background:#fafafa;
}
.form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color:var(--primary); background:#fff; }

.btn-save  { background:var(--primary); color:#fff; border:none; padding:10px 24px; border-radius:8px;
             font-weight:700; font-size:13px; cursor:pointer; display:inline-flex; align-items:center; gap:8px; }
.btn-save:hover { background:var(--primary-dark); }
.btn-edit  { background:#e0f2fe; color:#0369a1; border:none; padding:6px 12px; border-radius:6px; font-size:12px; font-weight:700; cursor:pointer; text-decoration:none; }
.btn-del   { background:#fee2e2; color:#b91c1c; border:none; padding:6px 12px; border-radius:6px; font-size:12px; font-weight:700; cursor:pointer; margin-left:6px; }
.btn-ghost { background:transparent; color:var(--text-muted); border:1px solid var(--border-color);
             padding:9px 20px; border-radius:8px; font-weight:600; font-size:13px; cursor:pointer; text-decoration:none; }

.pm-table { width:100%; border-collapse:collapse; font-size:13px; }
.pm-table th { background:#f8fafc; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.5px;
               color:var(--text-muted); padding:12px 14px; text-align:left; border-bottom:2px solid var(--border-color); }
.pm-table td { padding:12px 14px; border-bottom:1px solid var(--border-color); vertical-align:top; }
.pm-badge-active   { background:#dcfce7; color:#166534; padding:2px 8px; border-radius:99px; font-size:11px; font-weight:700; }
.pm-badge-inactive { background:#fee2e2; color:#991b1b; padding:2px 8px; border-radius:99px; font-size:11px; font-weight:700; }

.pm-alert-ok { background:#dcfce7; color:#166534; border:1px solid #bbf7d0; padding:12px 16px; border-radius:8px; font-weight:600; font-size:14px; margin-bottom:20px; }
</style>

<?php if ($success): ?><div class="pm-alert-ok"><i class="fa-solid fa-circle-check"></i> <?= htmlspecialchars($success) ?></div><?php endif; ?>

<!-- ══════════════════════════════════════════════════════════
  PAGE NAME DROPDOWN SELECTOR (Like manage_sections.php)
══════════════════════════════════════════════════════════ -->
<div class="page-dropdown-bar">
  <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
    <label for="pageSelect"><i class="fa-solid fa-file-lines" style="color:var(--primary);font-size:18px;"></i> Select Page to Edit:</label>
    <select id="pageSelect" class="page-select-dropdown" onchange="location.href='manage_pages.php?slug='+this.value">
      <?php foreach ($allPages as $p): ?>
      <option value="<?= htmlspecialchars($p['page_slug']) ?>" <?= $selectedSlug===$p['page_slug'] ? 'selected':'' ?>>
        <?= htmlspecialchars($p['page_title']) ?> (<?= htmlspecialchars($p['page_slug']) ?>)
      </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div>
    <a href="<?= $liveUrl ?>" target="_blank" class="btn-ghost">
      <i class="fa-solid fa-globe"></i> View Live Page ↗
    </a>
  </div>
</div>

<!-- PAGE HEADER & HERO CONTENT EDITOR -->
<div class="pm-card">
  <div class="pm-card-head">
    <div>
      <i class="fa-solid fa-heading"></i>
      Header &amp; Hero Content for: <span style="color:var(--primary);"><?= htmlspecialchars($pageRow['page_title']) ?></span>
    </div>
    <span style="font-size:12px;color:var(--text-muted);font-weight:600;background:#f1f5f9;padding:4px 10px;border-radius:6px;">
      Slug: <?= htmlspecialchars($pageRow['page_slug']) ?>
    </span>
  </div>

  <form method="POST">
    <input type="hidden" name="action" value="save_header">
    <div class="pm-grid2">
      <div class="form-group">
        <label>Page Title (H1) *</label>
        <input type="text" name="page_title" required value="<?= htmlspecialchars($pageRow['page_title']) ?>">
      </div>
      <div class="form-group">
        <label>Eyebrow / Tag Text</label>
        <input type="text" name="eyebrow" value="<?= htmlspecialchars($pageRow['eyebrow']) ?>" placeholder="01 · Category">
      </div>
      <div class="form-group pm-full">
        <label>Hero Subtitle / Summary</label>
        <textarea name="hero_subtitle" rows="2"><?= htmlspecialchars($pageRow['hero_subtitle']) ?></textarea>
      </div>
      <div class="form-group pm-full">
        <label>Intro Section Heading</label>
        <input type="text" name="intro_heading" value="<?= htmlspecialchars($pageRow['intro_heading']) ?>" placeholder="Main introduction heading">
      </div>
      <div class="form-group pm-full">
        <label>Intro Section Paragraph Text</label>
        <textarea name="intro_text" rows="3"><?= htmlspecialchars($pageRow['intro_text']) ?></textarea>
      </div>
      <div class="form-group">
        <label>Meta Keywords (SEO)</label>
        <input type="text" name="meta_keywords" value="<?= htmlspecialchars($pageRow['meta_keywords'] ?? '') ?>" placeholder="rkdf, bhopal, university">
      </div>
      <div class="form-group">
        <label>Meta Description (SEO)</label>
        <input type="text" name="meta_description" value="<?= htmlspecialchars($pageRow['meta_description'] ?? '') ?>" placeholder="Brief description for Google search">
      </div>
      <div class="form-group pm-full">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer;text-transform:none;font-size:14px;">
          <input type="checkbox" name="is_active" value="1" <?= $pageRow['is_active'] ? 'checked':'' ?>>
          <b>Page Active / Published on Live Website</b>
        </label>
      </div>
    </div>
    <div style="margin-top:20px;text-align:right;">
      <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Save Header &amp; Metadata</button>
    </div>
  </form>
</div>

<!-- ADD / EDIT SECTION CARDS & ITEMS -->
<div class="pm-card">
  <div class="pm-card-head">
    <div>
      <i class="fa-solid fa-<?= $editItemRow ? 'pen' : 'plus' ?>"></i>
      <?= $editItemRow ? 'Edit Content Card / Item' : 'Add Content Card / Item to ' . htmlspecialchars($pageRow['page_title']) ?>
    </div>
  </div>

  <form method="POST">
    <input type="hidden" name="action" value="<?= $editItemRow ? 'update_item' : 'add_item' ?>">
    <?php if ($editItemRow): ?><input type="hidden" name="item_id" value="<?= $editItemRow['id'] ?>"><?php endif; ?>

    <div class="pm-grid3">
      <div class="form-group">
        <label>Section Group Key *</label>
        <input type="text" name="group_key" required value="<?= htmlspecialchars($editItemRow['group_key'] ?? 'schemes') ?>" placeholder="e.g. schemes, portals, docs, faculties">
        <small style="font-size:11px;color:#64748b;">Groups items on the page</small>
      </div>
      <div class="form-group">
        <label>Item Title *</label>
        <input type="text" name="item_title" required value="<?= htmlspecialchars($editItemRow['title'] ?? '') ?>" placeholder="Card title">
      </div>
      <div class="form-group">
        <label>Subtitle / Category</label>
        <input type="text" name="item_subtitle" value="<?= htmlspecialchars($editItemRow['subtitle'] ?? '') ?>" placeholder="Subheading or category">
      </div>
      <div class="form-group">
        <label>Number / Index</label>
        <input type="text" name="number_val" value="<?= htmlspecialchars($editItemRow['number_val'] ?? '') ?>" placeholder="01">
      </div>
      <div class="form-group">
        <label>Badge / Tag Text</label>
        <input type="text" name="badge_text" value="<?= htmlspecialchars($editItemRow['badge_text'] ?? '') ?>" placeholder="e.g. State Sponsored">
      </div>
      <div class="form-group">
        <label>Link URL (if clickable)</label>
        <input type="text" name="link_url" value="<?= htmlspecialchars($editItemRow['link_url'] ?? '') ?>" placeholder="http://example.com">
      </div>
      <div class="form-group pm-full">
        <label>Image Path (optional)</label>
        <input type="text" name="image_path" value="<?= htmlspecialchars($editItemRow['image_path'] ?? '') ?>" placeholder="images/lovable/sample.jpg">
      </div>
      <div class="form-group pm-full">
        <label>Description / Detailed Text</label>
        <textarea name="item_text" rows="3" placeholder="Full card text or details"><?= htmlspecialchars($editItemRow['text_val'] ?? '') ?></textarea>
      </div>
      <div class="form-group">
        <label>Sort Order</label>
        <input type="number" name="sort_order" value="<?= htmlspecialchars($editItemRow['sort_order'] ?? 99) ?>">
      </div>
      <?php if ($editItemRow): ?>
      <div class="form-group">
        <label style="visibility:hidden;">Status</label>
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer;margin-top:8px;">
          <input type="checkbox" name="is_active" value="1" <?= $editItemRow['is_active'] ? 'checked':'' ?>>
          <b>Active / Visible</b>
        </label>
      </div>
      <?php endif; ?>
    </div>

    <div style="margin-top:20px;display:flex;gap:10px;">
      <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> <?= $editItemRow ? 'Update Item' : 'Add Item' ?></button>
      <?php if ($editItemRow): ?>
      <a href="manage_pages.php?slug=<?= $selectedSlug ?>" class="btn-ghost">Cancel</a>
      <?php endif; ?>
    </div>
  </form>
</div>

<!-- GROUPED CONTENT CARDS TABLE -->
<?php if (empty($groupedItems)): ?>
<div class="pm-card">
  <p style="color:var(--text-muted);text-align:center;padding:24px;">No content cards/items added to this page yet. Use the form above to add your first item!</p>
</div>
<?php else: ?>
  <?php foreach ($groupedItems as $gKey => $gItems): ?>
  <div class="pm-card">
    <div class="pm-card-head">
      <div>
        <i class="fa-solid fa-folder"></i> Group: <b><?= strtoupper(htmlspecialchars($gKey)) ?></b>
        <span style="background:#f1f5f9;border-radius:6px;padding:2px 8px;font-size:11px;color:#64748b;margin-left:8px;"><?= count($gItems) ?> items</span>
      </div>
    </div>
    <table class="pm-table">
      <thead>
        <tr>
          <th>#</th><th>Num</th><th>Title / Subtitle</th><th>Description</th><th>Badge / Link</th><th>Order</th><th>Status</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($gItems as $it): ?>
        <tr>
          <td><?= $it['id'] ?></td>
          <td><b><?= htmlspecialchars($it['number_val']) ?></b></td>
          <td>
            <b><?= htmlspecialchars($it['title']) ?></b><br>
            <small style="color:#64748b;"><?= htmlspecialchars($it['subtitle']) ?></small>
          </td>
          <td style="max-width:320px;color:#334155;"><?= htmlspecialchars($it['text_val']) ?></td>
          <td>
            <?php if ($it['badge_text']): ?><span style="background:#e0f2fe;color:#0369a1;padding:2px 6px;border-radius:4px;font-weight:700;font-size:11px;"><?= htmlspecialchars($it['badge_text']) ?></span><br><?php endif; ?>
            <?php if ($it['link_url']): ?><a href="<?= htmlspecialchars($it['link_url']) ?>" target="_blank" style="color:var(--primary);font-size:11px;">Link ↗</a><?php endif; ?>
          </td>
          <td><?= $it['sort_order'] ?></td>
          <td><?= $it['is_active'] ? '<span class="pm-badge-active">Active</span>' : '<span class="pm-badge-inactive">Hidden</span>' ?></td>
          <td>
            <a href="manage_pages.php?slug=<?= $selectedSlug ?>&edit_item=<?= $it['id'] ?>" class="btn-edit">Edit</a>
            <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this card item?')">
              <input type="hidden" name="action" value="delete_item">
              <input type="hidden" name="item_id" value="<?= $it['id'] ?>">
              <button type="submit" class="btn-del">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php endforeach; ?>
<?php endif; ?>

<?php require_once 'footer.php'; ?>
