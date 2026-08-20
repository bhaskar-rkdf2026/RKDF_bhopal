<?php
// ============================================================
// RKDF University — Admin Page Manager (With Image Upload & Live Preview)
// Allows selecting, editing, uploading & previewing images for ANY page
// 100% Bulletproof & Resilient across Local and Live Production Environments
// Powered by Dual-Engine (MySQL + JSON Cache High Availability)
// ============================================================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../include/cms_engine.php';

$allPages = cms_get_all_pages();
$selectedSlug = $_GET['slug'] ?? ($allPages[0]['page_slug'] ?? 'about');

// Ensure Upload Directory Exists
$uploadDir = '../images/uploads/';
if (!file_exists($uploadDir)) {
    @mkdir($uploadDir, 0777, true);
}

// ── Handle Form Submissions BEFORE Header Output ──────────────────
$action = $_POST['action'] ?? '';

if (!empty($action)) {
    try {
        // Save Page Header / Hero Content
        if ($action === 'save_header') {
            $heroBgImg = trim($_POST['hero_bg_image'] ?? '');
            
            // Handle File Upload for Hero Image
            if (!empty($_FILES['hero_bg_file']['name']) && $_FILES['hero_bg_file']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['hero_bg_file']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                    $newFilename = 'hero_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $selectedSlug) . '_' . time() . '.' . $ext;
                    if (move_uploaded_file($_FILES['hero_bg_file']['tmp_name'], $uploadDir . $newFilename)) {
                        $heroBgImg = 'images/uploads/' . $newFilename;
                    }
                }
            }

            cms_save_page($selectedSlug, [
                'page_title'       => trim($_POST['page_title']),
                'eyebrow'          => trim($_POST['eyebrow']),
                'hero_subtitle'    => trim($_POST['hero_subtitle']),
                'intro_heading'    => trim($_POST['intro_heading']),
                'intro_text'       => trim($_POST['intro_text']),
                'hero_bg_image'    => $heroBgImg,
                'meta_keywords'    => trim($_POST['meta_keywords']),
                'meta_description' => trim($_POST['meta_description']),
                'is_active'        => isset($_POST['is_active']) ? 1 : 0
            ]);

            header("Location: manage_pages.php?slug=" . urlencode($selectedSlug) . "&msg=header_saved");
            exit();
        }

        // Add Section Card to selected page
        if ($action === 'add_item') {
            $imgPath = trim($_POST['image_path'] ?? '');
            
            // Handle File Upload for Card Image
            if (!empty($_FILES['item_img_file']['name']) && $_FILES['item_img_file']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['item_img_file']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'])) {
                    $newFilename = 'card_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $selectedSlug) . '_' . time() . '.' . $ext;
                    if (move_uploaded_file($_FILES['item_img_file']['tmp_name'], $uploadDir . $newFilename)) {
                        $imgPath = 'images/uploads/' . $newFilename;
                    }
                }
            }

            cms_save_section_item($selectedSlug, [
                'group_key'   => trim($_POST['group_key'] ?? 'general'),
                'title'       => trim($_POST['item_title']),
                'subtitle'    => trim($_POST['item_subtitle']),
                'number_val'  => trim($_POST['number_val']),
                'text_val'    => trim($_POST['item_text']),
                'image_path'  => $imgPath,
                'link_url'    => trim($_POST['link_url']),
                'badge_text'  => trim($_POST['badge_text']),
                'sort_order'  => (int)($_POST['sort_order'] ?? 99),
                'is_active'   => 1
            ]);

            header("Location: manage_pages.php?slug=" . urlencode($selectedSlug) . "&msg=item_added#itemsTable");
            exit();
        }

        // Update Section Card
        if ($action === 'update_item') {
            $imgPath = trim($_POST['image_path'] ?? '');
            
            // Handle File Upload for Card Image
            if (!empty($_FILES['item_img_file']['name']) && $_FILES['item_img_file']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['item_img_file']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'])) {
                    $newFilename = 'card_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $selectedSlug) . '_' . time() . '.' . $ext;
                    if (move_uploaded_file($_FILES['item_img_file']['tmp_name'], $uploadDir . $newFilename)) {
                        $imgPath = 'images/uploads/' . $newFilename;
                    }
                }
            }

            cms_save_section_item($selectedSlug, [
                'group_key'   => trim($_POST['group_key'] ?? 'general'),
                'title'       => trim($_POST['item_title']),
                'subtitle'    => trim($_POST['item_subtitle']),
                'number_val'  => trim($_POST['number_val']),
                'text_val'    => trim($_POST['item_text']),
                'image_path'  => $imgPath,
                'link_url'    => trim($_POST['link_url']),
                'badge_text'  => trim($_POST['badge_text']),
                'sort_order'  => (int)($_POST['sort_order'] ?? 0),
                'is_active'   => isset($_POST['is_active']) ? 1 : 0
            ], (int)$_POST['item_id']);

            header("Location: manage_pages.php?slug=" . urlencode($selectedSlug) . "&msg=item_updated#itemsTable");
            exit();
        }

        // Delete Section Card
        if ($action === 'delete_item') {
            cms_delete_section_item((int)$_POST['item_id']);
            header("Location: manage_pages.php?slug=" . urlencode($selectedSlug) . "&msg=item_deleted#itemsTable");
            exit();
        }
    } catch (Throwable $eForm) {
        $formError = "Action error: " . $eForm->getMessage();
    }
}

// Now include header after handling redirects
$pageTitle = 'Page Content Editor — RKDF Admin Portal';
require_once 'header.php';

// Fetch Current Page Data & Sections using unified CMS engine
$pageRow = cms_get_page($selectedSlug);
$allItems = cms_get_page_sections($selectedSlug);

// Find edit item row if requested
$editItemId = isset($_GET['edit_item']) ? (int)$_GET['edit_item'] : 0;
$editItemRow = null;
if ($editItemId > 0) {
    foreach ($allItems as $it) {
        if (($it['id'] ?? 0) == $editItemId) {
            $editItemRow = $it;
            break;
        }
    }
}

// Group items
$groupedItems = [];
foreach ($allItems as $it) {
    $groupKey = !empty($it['group_key']) ? $it['group_key'] : 'general';
    $groupedItems[$groupKey][] = $it;
}

$success = isset($_GET['msg']) ? 'Changes saved successfully!' : '';

// Determine live URL
$liveUrl = "../page.php?slug=" . urlencode($selectedSlug);
if (file_exists("../" . $selectedSlug . ".php")) $liveUrl = "../" . $selectedSlug . ".php";
if ($selectedSlug === 'vision-mission') $liveUrl = "../Vision&mission.php";
if ($selectedSlug === 'vc-desk') $liveUrl = "../Vice-Chancellor-Desk.php";
if ($selectedSlug === 'chancellor') $liveUrl = "../Chancellor.php";
if ($selectedSlug === 'pro-chancellor') $liveUrl = "../ProChancellor.php";
if ($selectedSlug === 'governing-body') $liveUrl = "../Governingbody.php";
if ($selectedSlug === 'bom') $liveUrl = "../BoM.php";
if ($selectedSlug === 'bos') $liveUrl = "../BOS.php";
if ($selectedSlug === 'academic-council') $liveUrl = "../Academic_Council.php";
if ($selectedSlug === 'national-advisory') $liveUrl = "../Statuary-Bodies.php";
if ($selectedSlug === 'objectives') $liveUrl = "../Objectives.php";
if ($selectedSlug === 'dean') $liveUrl = "../Dean.php";
if ($selectedSlug === 'registrar') $liveUrl = "../Registrar.php";
if ($selectedSlug === 'dgm') $liveUrl = "../dgm.php";
if ($selectedSlug === 'dgr') $liveUrl = "../dgr.php";
if ($selectedSlug === 'other-officers') $liveUrl = "../other-officers.php";
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
.pm-card.editing-mode { border: 2px solid var(--primary); box-shadow: 0 0 20px rgba(217,35,45,0.15); }
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
.pm-table td { padding:12px 14px; border-bottom:1px solid var(--border-color); vertical-align:middle; }
.pm-badge-active   { background:#dcfce7; color:#166534; padding:2px 8px; border-radius:99px; font-size:11px; font-weight:700; }
.pm-badge-inactive { background:#fee2e2; color:#991b1b; padding:2px 8px; border-radius:99px; font-size:11px; font-weight:700; }

.pm-alert-ok { background:#dcfce7; color:#166534; border:1px solid #bbf7d0; padding:12px 16px; border-radius:8px; font-weight:600; font-size:14px; margin-bottom:20px; }

/* Image Upload & Live Preview Styles */
.img-preview-box {
  width: 100%;
  height: 120px;
  border: 2px dashed var(--border-color);
  border-radius: 8px;
  background: #f8fafc;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  position: relative;
  margin-top: 8px;
}
.img-preview-box img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}
.img-preview-empty {
  font-size: 12px;
  color: var(--text-muted);
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 6px;
}
.table-img-thumb {
  width: 54px;
  height: 54px;
  border-radius: 8px;
  object-fit: cover;
  border: 1px solid var(--border-color);
  background: #f8fafc;
}
</style>

<?php if ($success): ?><div class="pm-alert-ok"><i class="fa-solid fa-circle-check"></i> <?= htmlspecialchars($success) ?></div><?php endif; ?>

<!-- PAGE NAME DROPDOWN SELECTOR -->
<div class="page-dropdown-bar">
  <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
    <label for="pageSelect"><i class="fa-solid fa-file-lines" style="color:var(--primary);font-size:18px;"></i> Select Page to Edit:</label>
    <select id="pageSelect" class="page-select-dropdown" onchange="location.href='manage_pages.php?slug='+encodeURIComponent(this.value)">
      <?php 
      $groupedPages = [];
      foreach ($allPages as $p) {
          $catKey = strtoupper($p['category'] ?? 'GENERAL');
          $groupedPages[$catKey][] = $p;
      }
      foreach ($groupedPages as $catLabel => $pList):
      ?>
      <optgroup label="── <?= htmlspecialchars($catLabel) ?> (<?= count($pList) ?> Pages) ──">
        <?php foreach ($pList as $p): ?>
        <option value="<?= htmlspecialchars($p['page_slug']) ?>" <?= $selectedSlug===$p['page_slug'] ? 'selected':'' ?>>
          <?= htmlspecialchars($p['page_title']) ?> (<?= htmlspecialchars($p['page_slug']) ?>)
        </option>
        <?php endforeach; ?>
      </optgroup>
      <?php endforeach; ?>
    </select>
  </div>
  <div style="display:flex;gap:10px;align-items:center;">
    <a href="<?= htmlspecialchars($liveUrl) ?>" target="_blank" class="btn-ghost">
      <i class="fa-solid fa-globe"></i> View Live Page ↗
    </a>
  </div>
</div>

<!-- PAGE HEADER & HERO CONTENT EDITOR WITH IMAGE PREVIEW & UPLOAD -->
<div class="pm-card">
  <div class="pm-card-head">
    <div>
      <i class="fa-solid fa-heading"></i>
      Header &amp; Hero Content for: <span style="color:var(--primary);"><?= htmlspecialchars($pageRow['page_title'] ?? '') ?></span>
    </div>
    <span style="font-size:12px;color:var(--text-muted);font-weight:600;background:#f1f5f9;padding:4px 10px;border-radius:6px;">
      Slug: <?= htmlspecialchars($pageRow['page_slug'] ?? $selectedSlug) ?>
    </span>
  </div>

  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="save_header">
    <div class="pm-grid2">
      <div class="form-group">
        <label>Page Title (H1) *</label>
        <input type="text" name="page_title" required value="<?= htmlspecialchars($pageRow['page_title'] ?? '') ?>">
      </div>
      <div class="form-group">
        <label>Eyebrow / Tag Text</label>
        <input type="text" name="eyebrow" value="<?= htmlspecialchars($pageRow['eyebrow'] ?? '') ?>" placeholder="01 · Category">
      </div>
      <div class="form-group pm-full">
        <label>Hero Subtitle / Summary</label>
        <textarea name="hero_subtitle" rows="2"><?= htmlspecialchars($pageRow['hero_subtitle'] ?? '') ?></textarea>
      </div>

      <!-- Hero Banner Image & Live Preview -->
      <div class="form-group pm-full">
        <label><i class="fa-solid fa-image" style="color:var(--primary);"></i> Hero Banner Image (Upload File OR Enter Path)</label>
        <div style="display:grid;grid-template-columns: 2fr 1fr;gap:16px;align-items:center;">
          <div>
            <div style="margin-bottom:8px;">
              <span style="font-size:11px;font-weight:700;color:var(--text-muted);">OPTION 1: UPLOAD FROM COMPUTER</span>
              <input type="file" name="hero_bg_file" accept="image/*" onchange="previewFile(this, 'heroPreviewImg', 'heroPreviewText')">
            </div>
            <div>
              <span style="font-size:11px;font-weight:700;color:var(--text-muted);">OPTION 2: EXISTING IMAGE PATH / URL</span>
              <input type="text" id="heroBgPathInput" name="hero_bg_image" value="<?= htmlspecialchars($pageRow['hero_bg_image'] ?? '') ?>" placeholder="images/lovable/sample-banner.jpg" onkeyup="previewUrl(this.value, 'heroPreviewImg', 'heroPreviewText')">
            </div>
          </div>
          <div>
            <label style="font-size:11px;font-weight:700;color:var(--text-muted);">LIVE IMAGE PREVIEW</label>
            <div class="img-preview-box">
              <?php $heroPath = !empty($pageRow['hero_bg_image']) ? '../' . $pageRow['hero_bg_image'] : ''; ?>
              <img id="heroPreviewImg" src="<?= htmlspecialchars($heroPath) ?>" style="<?= empty($pageRow['hero_bg_image']) ? 'display:none;' : '' ?>">
              <span id="heroPreviewText" class="img-preview-empty" style="<?= !empty($pageRow['hero_bg_image']) ? 'display:none;' : '' ?>">
                <i class="fa-solid fa-file-image"></i> No Banner Image
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group pm-full">
        <label>Intro Section Heading</label>
        <input type="text" name="intro_heading" value="<?= htmlspecialchars($pageRow['intro_heading'] ?? '') ?>" placeholder="Main introduction heading">
      </div>
      <div class="form-group pm-full">
        <label>Intro Section Paragraph Text</label>
        <textarea name="intro_text" rows="3"><?= htmlspecialchars($pageRow['intro_text'] ?? '') ?></textarea>
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
          <input type="checkbox" name="is_active" value="1" <?= (!isset($pageRow['is_active']) || $pageRow['is_active']) ? 'checked':'' ?>>
          <b>Page Active / Published on Live Website</b>
        </label>
      </div>
    </div>
    <div style="margin-top:20px;text-align:right;">
      <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Save Header, Banner Image &amp; Metadata</button>
    </div>
  </form>
</div>

<!-- ADD / EDIT SECTION CARDS WITH IMAGE UPLOAD & PREVIEW -->
<div id="itemEditor" class="pm-card <?= $editItemRow ? 'editing-mode' : '' ?>">
  <div class="pm-card-head">
    <div>
      <i class="fa-solid fa-<?= $editItemRow ? 'pen' : 'plus' ?>"></i>
      <?php if ($editItemRow): ?>
        <span style="color:var(--primary);">Editing Item #<?= $editItemRow['id'] ?>: "<?= htmlspecialchars($editItemRow['title'] ?? '') ?>"</span>
      <?php else: ?>
        Add Content Card / Item to: <span style="color:var(--primary);"><?= htmlspecialchars($pageRow['page_title'] ?? '') ?></span>
      <?php endif; ?>
    </div>
    <?php if ($editItemRow): ?>
      <a href="manage_pages.php?slug=<?= urlencode($selectedSlug) ?>#itemsTable" class="btn-ghost" style="font-size:12px;padding:4px 12px;">Cancel Edit ✕</a>
    <?php endif; ?>
  </div>

  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?= $editItemRow ? 'update_item' : 'add_item' ?>">
    <?php if ($editItemRow): ?><input type="hidden" name="item_id" value="<?= $editItemRow['id'] ?>"><?php endif; ?>

    <div class="pm-grid3">
      <div class="form-group">
        <label>Section Group Key *</label>
        <input type="text" name="group_key" required value="<?= htmlspecialchars($editItemRow['group_key'] ?? 'general') ?>" placeholder="e.g. vision, mission, values, general">
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
        <input type="text" name="badge_text" value="<?= htmlspecialchars($editItemRow['badge_text'] ?? '') ?>" placeholder="e.g. OUR VISION, CORE VALUE">
      </div>
      <div class="form-group">
        <label>Link / PDF URL</label>
        <input type="text" name="link_url" value="<?= htmlspecialchars($editItemRow['link_url'] ?? '') ?>" placeholder="About_Us.pdf or http://...">
      </div>

      <!-- Card Image & Preview Field -->
      <div class="form-group pm-full">
        <label><i class="fa-solid fa-image" style="color:var(--primary);"></i> Card / Profile Image (Upload File OR Path)</label>
        <div style="display:grid;grid-template-columns: 2fr 1fr;gap:16px;align-items:center;">
          <div>
            <div style="margin-bottom:8px;">
              <span style="font-size:11px;font-weight:700;color:var(--text-muted);">OPTION 1: UPLOAD FROM COMPUTER</span>
              <input type="file" name="item_img_file" accept="image/*" onchange="previewFile(this, 'cardPreviewImg', 'cardPreviewText')">
            </div>
            <div>
              <span style="font-size:11px;font-weight:700;color:var(--text-muted);">OPTION 2: EXISTING IMAGE PATH / URL</span>
              <input type="text" id="cardImgPathInput" name="image_path" value="<?= htmlspecialchars($editItemRow['image_path'] ?? '') ?>" placeholder="images/lovable/sample.jpg" onkeyup="previewUrl(this.value, 'cardPreviewImg', 'cardPreviewText')">
            </div>
          </div>
          <div>
            <label style="font-size:11px;font-weight:700;color:var(--text-muted);">CARD IMAGE PREVIEW</label>
            <div class="img-preview-box">
              <?php $cardImgPath = !empty($editItemRow['image_path']) ? '../' . $editItemRow['image_path'] : ''; ?>
              <img id="cardPreviewImg" src="<?= htmlspecialchars($cardImgPath) ?>" style="<?= empty($editItemRow['image_path']) ? 'display:none;' : '' ?>">
              <span id="cardPreviewText" class="img-preview-empty" style="<?= !empty($editItemRow['image_path']) ? 'display:none;' : '' ?>">
                <i class="fa-solid fa-image"></i> No Image Selected
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group pm-full">
        <label>Description / Detailed Text</label>
        <textarea name="item_text" rows="4" placeholder="Full card text, profile bio, or details"><?= htmlspecialchars($editItemRow['text_val'] ?? '') ?></textarea>
      </div>
      <div class="form-group">
        <label>Sort Order</label>
        <input type="number" name="sort_order" value="<?= htmlspecialchars($editItemRow['sort_order'] ?? 1) ?>">
      </div>
      <?php if ($editItemRow): ?>
      <div class="form-group">
        <label style="visibility:hidden;">Status</label>
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer;margin-top:8px;">
          <input type="checkbox" name="is_active" value="1" <?= (!isset($editItemRow['is_active']) || $editItemRow['is_active']) ? 'checked':'' ?>>
          <b>Active / Visible</b>
        </label>
      </div>
      <?php endif; ?>
    </div>

    <div style="margin-top:20px;display:flex;gap:10px;">
      <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> <?= $editItemRow ? 'Update Item' : 'Add Item' ?></button>
      <?php if ($editItemRow): ?>
      <a href="manage_pages.php?slug=<?= urlencode($selectedSlug) ?>#itemsTable" class="btn-ghost">Cancel Edit</a>
      <?php endif; ?>
    </div>
  </form>
</div>

<!-- GROUPED CONTENT CARDS TABLE WITH LIVE IMAGE THUMBNAILS -->
<div id="itemsTable">
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
          <th>#</th><th>Preview</th><th>Num</th><th>Title / Subtitle</th><th>Description</th><th>Badge / Link</th><th>Order</th><th>Status</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($gItems as $it): ?>
        <tr style="<?= ($editItemId == ($it['id'] ?? 0)) ? 'background:#fff1f2;' : '' ?>">
          <td><?= $it['id'] ?? '' ?></td>
          <td>
            <?php if (!empty($it['image_path'])): ?>
              <img src="../<?= htmlspecialchars($it['image_path']) ?>" class="table-img-thumb" alt="Preview">
            <?php else: ?>
              <div class="table-img-thumb" style="display:flex;align-items:center;justify-content:center;color:#94a3b8;font-size:11px;">No Img</div>
            <?php endif; ?>
          </td>
          <td><b><?= htmlspecialchars($it['number_val'] ?? '') ?></b></td>
          <td>
            <b><?= htmlspecialchars($it['title'] ?? '') ?></b><br>
            <small style="color:#64748b;"><?= htmlspecialchars($it['subtitle'] ?? '') ?></small>
          </td>
          <td style="max-width:320px;color:#334155;"><?= htmlspecialchars($it['text_val'] ?? '') ?></td>
          <td>
            <?php if (!empty($it['badge_text'])): ?><span style="background:#e0f2fe;color:#0369a1;padding:2px 6px;border-radius:4px;font-weight:700;font-size:11px;"><?= htmlspecialchars($it['badge_text']) ?></span><br><?php endif; ?>
            <?php if (!empty($it['link_url'])): ?><a href="<?= htmlspecialchars($it['link_url']) ?>" target="_blank" style="color:var(--primary);font-size:11px;">Link ↗</a><?php endif; ?>
          </td>
          <td><?= $it['sort_order'] ?? 0 ?></td>
          <td><?= (!isset($it['is_active']) || $it['is_active']) ? '<span class="pm-badge-active">Active</span>' : '<span class="pm-badge-inactive">Hidden</span>' ?></td>
          <td>
            <a href="manage_pages.php?slug=<?= urlencode($selectedSlug) ?>&edit_item=<?= $it['id'] ?? 0 ?>#itemEditor" class="btn-edit">Edit</a>
            <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this card item?')">
              <input type="hidden" name="action" value="delete_item">
              <input type="hidden" name="item_id" value="<?= $it['id'] ?? 0 ?>">
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
</div>

<script>
// JavaScript Live Image Preview Handlers
function previewFile(input, imgId, textId) {
  var file = input.files[0];
  var img = document.getElementById(imgId);
  var txt = document.getElementById(textId);
  if (file && img && txt) {
    var reader = new FileReader();
    reader.onload = function(e) {
      img.src = e.target.result;
      img.style.display = 'block';
      txt.style.display = 'none';
    };
    reader.readAsDataURL(file);
  }
}

function previewUrl(url, imgId, textId) {
  var img = document.getElementById(imgId);
  var txt = document.getElementById(textId);
  if (img && txt) {
    if (url.trim() !== '') {
      var src = url.startsWith('http') || url.startsWith('data:') ? url : '../' + url;
      img.src = src;
      img.style.display = 'block';
      txt.style.display = 'none';
    } else {
      img.style.display = 'none';
      txt.style.display = 'flex';
    }
  }
}

// Auto-scroll to editor if editing item
<?php if ($editItemRow): ?>
document.addEventListener("DOMContentLoaded", function() {
  var editor = document.getElementById("itemEditor");
  if (editor) {
    editor.scrollIntoView({ behavior: 'smooth' });
  }
});
<?php endif; ?>
</script>

<?php require_once 'footer.php'; ?>
