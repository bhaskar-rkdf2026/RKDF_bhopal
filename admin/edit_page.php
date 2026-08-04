<?php
// ============================================================
// RKDF University — Individual Page Editor (CMS)
// Edits content, hero, and cards for a specific page slug
// ============================================================
$pageTitle = 'Edit Page — RKDF CMS';
require_once 'header.php';
require_once '../config/db.php';

$pdo = getDbConnection();
$slug = $_GET['slug'] ?? 'scholarship';

// Fetch target page
$stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ?");
$stmt->execute([$slug]);
$pageRow = $stmt->fetch();

if (!$pageRow) {
    echo "<div class='content-container'><div class='alert alert-danger'>Page '{$slug}' not found. <a href='manage_pages.php'>Return to Pages Directory</a></div></div>";
    require_once 'footer.php';
    exit();
}

$pageTitle = 'Edit Page: ' . $pageRow['page_title'] . ' — RKDF CMS';

// ── Handle Form Submissions ───────────────────────────────────────
$success = $error = '';
$action = $_POST['action'] ?? '';

// Update Header / Hero / Meta
if ($action === 'save_header') {
    $pdo->prepare("UPDATE site_pages SET page_title=?, eyebrow=?, hero_subtitle=?, intro_heading=?, intro_text=?, meta_keywords=?, meta_description=?, is_active=? WHERE id=?")
        ->execute([
            trim($_POST['page_title']),
            trim($_POST['eyebrow']),
            trim($_POST['hero_subtitle']),
            trim($_POST['intro_heading']),
            trim($_POST['intro_text']),
            trim($_POST['meta_keywords']),
            trim($_POST['meta_description']),
            isset($_POST['is_active']) ? 1 : 0,
            $pageRow['id']
        ]);
    $success = 'Page details & header updated successfully!';
    $stmt->execute([$slug]);
    $pageRow = $stmt->fetch();
}

// Add Card / Section Item
if ($action === 'add_item') {
    $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active)
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)")
        ->execute([
            $slug,
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
    $success = 'Content card added successfully!';
}

// Update Card / Section Item
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
    $success = 'Content card updated successfully!';
}

// Delete Card Item
if ($action === 'delete_item') {
    $pdo->prepare("DELETE FROM page_sections WHERE id=?")->execute([(int)$_POST['item_id']]);
    $success = 'Content card deleted.';
}

// Fetch all items for this page
$itemsStmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug=? ORDER BY group_key, sort_order, id");
$itemsStmt->execute([$slug]);
$allItems = $itemsStmt->fetchAll();

// Also fetch old subpage_items if scholarship or migrated page
if (empty($allItems) && $slug === 'scholarship') {
    $oldItems = $pdo->query("SELECT * FROM subpage_items WHERE page_key='scholarship' ORDER BY group_key, sort_order, id")->fetchAll();
    if (!empty($oldItems)) {
        $ins = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES ('scholarship', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        foreach ($oldItems as $oi) {
            $ins->execute([$oi['group_key'], $oi['title'], $oi['subtitle'], $oi['number_val'], $oi['text_val'], $oi['image_path'], $oi['link_url'], $oi['badge_text'], $oi['sort_order'], $oi['is_active']]);
        }
        $itemsStmt->execute([$slug]);
        $allItems = $itemsStmt->fetchAll();
    }
}

$groupedItems = [];
foreach ($allItems as $it) {
    $groupedItems[$it['group_key']][] = $it;
}

$editItemId = isset($_GET['edit_item']) ? (int)$_GET['edit_item'] : 0;
$editItemRow = $editItemId ? $pdo->query("SELECT * FROM page_sections WHERE id=$editItemId")->fetch() : null;

$liveUrl = ($slug === 'scholarship' || $slug === 'chancellor') ? "../{$slug}.php" : "../page.php?slug={$slug}";
?>

<style>
.pe-topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; flex-wrap:wrap; gap:12px; }
.pe-title  { font-size:22px; font-weight:800; color:var(--secondary); }
.pe-sub    { font-size:13px; color:var(--text-muted); }

.pe-card { background:#fff; border-radius:12px; border:1px solid var(--border-color); padding:24px; margin-bottom:24px; }
.pe-card-head { font-size:16px; font-weight:800; color:var(--secondary); margin-bottom:20px; display:flex; align-items:center; gap:10px; }
.pe-card-head i { color:var(--primary); }

.pe-grid2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.pe-grid3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; }
.pe-full  { grid-column:1 / -1; }

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

.pe-table { width:100%; border-collapse:collapse; font-size:13px; }
.pe-table th { background:#f8fafc; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.5px;
               color:var(--text-muted); padding:12px 14px; text-align:left; border-bottom:2px solid var(--border-color); }
.pe-table td { padding:12px 14px; border-bottom:1px solid var(--border-color); vertical-align:top; }
.pe-badge-active   { background:#dcfce7; color:#166534; padding:2px 8px; border-radius:99px; font-size:11px; font-weight:700; }
.pe-badge-inactive { background:#fee2e2; color:#991b1b; padding:2px 8px; border-radius:99px; font-size:11px; font-weight:700; }

.pe-alert-ok { background:#dcfce7; color:#166534; border:1px solid #bbf7d0; padding:12px 16px; border-radius:8px; font-weight:600; font-size:14px; margin-bottom:20px; }
</style>

<?php if ($success): ?><div class="pe-alert-ok"><i class="fa-solid fa-circle-check"></i> <?= htmlspecialchars($success) ?></div><?php endif; ?>

<div class="pe-topbar">
  <div>
    <a href="manage_pages.php" style="color:var(--primary);text-decoration:none;font-weight:700;font-size:13px;">← Back to Pages Directory</a>
    <div class="pe-title" style="margin-top:4px;">
      Editing Page: <span style="color:var(--primary);"><?= htmlspecialchars($pageRow['page_title']) ?></span>
    </div>
    <div class="pe-sub">Slug: <code><?= htmlspecialchars($pageRow['page_slug']) ?></code> &nbsp;·&nbsp; Category: <b><?= strtoupper(htmlspecialchars($pageRow['category'])) ?></b></div>
  </div>
  <div>
    <a href="<?= $liveUrl ?>" target="_blank" class="btn-ghost">
      <i class="fa-solid fa-external-link"></i> View Live Page ↗
    </a>
  </div>
</div>

<!-- Page Header & Hero Settings -->
<div class="pe-card">
  <div class="pe-card-head">
    <i class="fa-solid fa-heading"></i> Hero &amp; Page Metadata
  </div>

  <form method="POST">
    <input type="hidden" name="action" value="save_header">
    <div class="pe-grid2">
      <div class="form-group">
        <label>Page Title (H1) *</label>
        <input type="text" name="page_title" required value="<?= htmlspecialchars($pageRow['page_title']) ?>">
      </div>
      <div class="form-group">
        <label>Eyebrow / Tag Text</label>
        <input type="text" name="eyebrow" value="<?= htmlspecialchars($pageRow['eyebrow']) ?>" placeholder="e.g. 01 · Overview">
      </div>
      <div class="form-group pe-full">
        <label>Hero Subtitle / Summary</label>
        <textarea name="hero_subtitle" rows="2"><?= htmlspecialchars($pageRow['hero_subtitle']) ?></textarea>
      </div>
      <div class="form-group pe-full">
        <label>Intro Section Heading</label>
        <input type="text" name="intro_heading" value="<?= htmlspecialchars($pageRow['intro_heading']) ?>" placeholder="Main introduction heading">
      </div>
      <div class="form-group pe-full">
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
      <div class="form-group pe-full">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer;text-transform:none;font-size:14px;">
          <input type="checkbox" name="is_active" value="1" <?= $pageRow['is_active'] ? 'checked':'' ?>>
          <b>Page Active / Published on Live Site</b>
        </label>
      </div>
    </div>
    <div style="margin-top:20px;text-align:right;">
      <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Save Header &amp; Metadata</button>
    </div>
  </form>
</div>

<!-- Add / Edit Cards / Content Items -->
<div class="pe-card">
  <div class="pe-card-head">
    <i class="fa-solid fa-<?= $editItemRow ? 'pen' : 'plus' ?>"></i>
    <?= $editItemRow ? 'Edit Content Card / Item' : 'Add Content Card / Item to Page' ?>
  </div>

  <form method="POST">
    <input type="hidden" name="action" value="<?= $editItemRow ? 'update_item' : 'add_item' ?>">
    <?php if ($editItemRow): ?><input type="hidden" name="item_id" value="<?= $editItemRow['id'] ?>"><?php endif; ?>

    <div class="pe-grid3">
      <div class="form-group">
        <label>Section Group Key *</label>
        <input type="text" name="group_key" required value="<?= htmlspecialchars($editItemRow['group_key'] ?? 'schemes') ?>" placeholder="e.g. schemes, portals, docs, general">
        <small style="font-size:11px;color:#64748b;">Groups items on the page (e.g. schemes, portals, docs)</small>
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
      <div class="form-group pe-full">
        <label>Image Path (optional)</label>
        <input type="text" name="image_path" value="<?= htmlspecialchars($editItemRow['image_path'] ?? '') ?>" placeholder="images/lovable/sample.jpg">
      </div>
      <div class="form-group pe-full">
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
      <a href="edit_page.php?slug=<?= $slug ?>" class="btn-ghost">Cancel</a>
      <?php endif; ?>
    </div>
  </form>
</div>

<!-- Grouped Content Items Table -->
<?php if (empty($groupedItems)): ?>
<div class="pe-card">
  <p style="color:var(--text-muted);text-align:center;padding:24px;">No content items/cards added to this page yet. Use the form above to add your first item!</p>
</div>
<?php else: ?>
  <?php foreach ($groupedItems as $gKey => $gItems): ?>
  <div class="pe-card">
    <div class="pe-card-head">
      <i class="fa-solid fa-folder"></i> Group: <b><?= strtoupper(htmlspecialchars($gKey)) ?></b>
      <span style="background:#f1f5f9;border-radius:6px;padding:2px 8px;font-size:11px;color:#64748b;margin-left:8px;"><?= count($gItems) ?> items</span>
    </div>
    <table class="pe-table">
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
          <td><?= $it['is_active'] ? '<span class="pe-badge-active">Active</span>' : '<span class="pe-badge-inactive">Hidden</span>' ?></td>
          <td>
            <a href="edit_page.php?slug=<?= $slug ?>&edit_item=<?= $it['id'] ?>" class="btn-edit">Edit</a>
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
