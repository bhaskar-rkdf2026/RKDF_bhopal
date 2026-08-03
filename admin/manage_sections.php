<?php
// admin/manage_sections.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/upload_handler.php';

$pdo = getDbConnection();

// -------------------------------------------------------------
// POST HANDLERS FOR SECTION UPDATE & ITEM CRUD (Executed before any HTML output)
// -------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // 1. UPDATE SECTION HEADER METADATA
    if ($action === 'update_section_meta') {
        $secKey = trim($_POST['section_key']);
        $tagNum = trim($_POST['tag_number']);
        $tagText = trim($_POST['tag_text']);
        $titleMain = trim($_POST['title_main']);
        $titleAccent = trim($_POST['title_accent']);
        $subtitle = trim($_POST['subtitle']);
        $isActive = isset($_POST['is_active']) ? 1 : 0;

        $stmt = $pdo->prepare("INSERT INTO homepage_sections (section_key, tag_number, tag_text, title_main, title_accent, subtitle, is_active)
            VALUES (?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE tag_number=?, tag_text=?, title_main=?, title_accent=?, subtitle=?, is_active=?");
        $stmt->execute([$secKey, $tagNum, $tagText, $titleMain, $titleAccent, $subtitle, $isActive, $tagNum, $tagText, $titleMain, $titleAccent, $subtitle, $isActive]);

        header("Location: manage_sections.php?sec=" . urlencode($secKey) . "&msg=section_updated");
        exit();
    }

    // 2. ADD NEW SECTION ITEM
    if ($action === 'add_item') {
        $secKey = trim($_POST['section_key']);
        $itemType = trim($_POST['item_type']);
        $title = trim($_POST['title']);
        $subtitle = trim($_POST['subtitle']);
        $numVal = trim($_POST['number_val']);
        $textVal = trim($_POST['text_val']);
        $linkUrl = trim($_POST['link_url']);
        $badgeText = trim($_POST['badge_text']);
        $sortOrder = (int)($_POST['sort_order'] ?? 0);
        $imagePath = '';

        // File upload check
        if (isset($_FILES['item_image']) && $_FILES['item_image']['error'] === UPLOAD_ERR_OK) {
            $uploadRes = handleImageUpload($_FILES['item_image']);
            if ($uploadRes['success']) {
                $imagePath = $uploadRes['path'];
            }
        }

        $stmt = $pdo->prepare("INSERT INTO homepage_items (section_key, item_type, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$secKey, $itemType, $title, $subtitle, $numVal, $textVal, $imagePath, $linkUrl, $badgeText, $sortOrder]);

        header("Location: manage_sections.php?sec=" . urlencode($secKey) . "&msg=item_added");
        exit();
    }

    // 3. EDIT EXISTING ITEM
    if ($action === 'edit_item') {
        $itemId = (int)$_POST['item_id'];
        $secKey = trim($_POST['section_key']);
        $itemType = trim($_POST['item_type']);
        $title = trim($_POST['title']);
        $subtitle = trim($_POST['subtitle']);
        $numVal = trim($_POST['number_val']);
        $textVal = trim($_POST['text_val']);
        $linkUrl = trim($_POST['link_url']);
        $badgeText = trim($_POST['badge_text']);
        $sortOrder = (int)$_POST['sort_order'];
        $imagePath = trim($_POST['existing_image']);

        // Check if new image uploaded
        if (isset($_FILES['item_image']) && $_FILES['item_image']['error'] === UPLOAD_ERR_OK) {
            $uploadRes = handleImageUpload($_FILES['item_image']);
            if ($uploadRes['success']) {
                $imagePath = $uploadRes['path'];
            }
        }

        $stmt = $pdo->prepare("UPDATE homepage_items SET item_type=?, title=?, subtitle=?, number_val=?, text_val=?, image_path=?, link_url=?, badge_text=?, sort_order=? WHERE id=?");
        $stmt->execute([$itemType, $title, $subtitle, $numVal, $textVal, $imagePath, $linkUrl, $badgeText, $sortOrder, $itemId]);

        header("Location: manage_sections.php?sec=" . urlencode($secKey) . "&msg=item_updated");
        exit();
    }

    // 4. DELETE ITEM
    if ($action === 'delete_item') {
        $itemId = (int)$_POST['item_id'];
        $secKey = trim($_POST['section_key']);

        $stmt = $pdo->prepare("DELETE FROM homepage_items WHERE id=?");
        $stmt->execute([$itemId]);

        header("Location: manage_sections.php?sec=" . urlencode($secKey) . "&msg=item_deleted");
        exit();
    }
}

// -------------------------------------------------------------
// PAGE RENDERING & DATA FETCHING
// -------------------------------------------------------------
$pageTitle = 'Manage Homepage Sections — RKDF CMS';
require_once __DIR__ . '/header.php';

$msg = $_GET['msg'] ?? '';
$error = $_GET['error'] ?? '';

// Determine active section key
$selectedKey = $_GET['sec'] ?? 'sec_01_numbers';

// Fetch all section keys for tabs
$sectionsList = [];
try {
    $stmtSec = $pdo->query("SELECT * FROM homepage_sections ORDER BY sort_order ASC");
    $sectionsList = $stmtSec->fetchAll();
} catch (Exception $e) {
    // If table doesn't exist yet, handle gracefully
}

// Fetch current active section details & items
$currentSec = null;
$currentItems = [];

try {
    $stmt = $pdo->prepare("SELECT * FROM homepage_sections WHERE section_key = ? LIMIT 1");
    $stmt->execute([$selectedKey]);

    $currentSec = $stmt->fetch();

    $stmtItems = $pdo->prepare("SELECT * FROM homepage_items WHERE section_key = ? ORDER BY sort_order ASC, id ASC");
    $stmtItems->execute([$selectedKey]);
    $currentItems = $stmtItems->fetchAll();
} catch (Exception $e) {
    // Ignore error if empty
}
?>

<style>
  .manage-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 32px;
  }

  .sec-nav-list {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid var(--border-color);
    padding: 12px;
    display: flex;
    flex-direction: column;
    gap: 4px;

  }

  .sec-nav-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    border-radius: 8px;
    color: var(--text-main);
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s;
  }

  .sec-nav-item:hover, .sec-nav-item.active {
    background: rgba(217, 35, 45, 0.1);
    color: var(--primary);
  }

  .sec-nav-item .sec-tag {
    font-size: 11px;
    font-weight: 800;
    opacity: 0.7;
  }

  .cms-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid var(--border-color);
    padding: 24px;
    margin-bottom: 24px;
  }

  .cms-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 16px;
    margin-bottom: 20px;
    border-bottom: 1px solid #f1f5f9;
  }

  .cms-card-title {
    font-size: 16px;
    font-weight: 800;
    color: var(--secondary);
  }

  .form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 16px;
  }

  .form-group-full {
    grid-column: 1 / -1;
  }

  label {
    display: block;
    font-size: 12px;
    font-weight: 700;
    color: #475569;
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  input[type="text"], input[type="number"], select, textarea {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 14px;
    color: #0f172a;
    outline: none;
    transition: border 0.2s;
  }

  input[type="text"]:focus, select:focus, textarea:focus {
    border-color: var(--primary);
  }

  .btn-save {
    background: var(--primary);
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 13px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  .btn-save:hover {
    background: #b01921;
  }

  /* Items Table */
  .items-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 12px;
  }

  .items-table th, .items-table td {
    padding: 14px 16px;
    text-align: left;
    border-bottom: 1px solid var(--border-color);
    font-size: 13px;
  }

  .items-table th {
    background: #f8fafc;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    font-size: 11px;
    letter-spacing: 0.5px;
  }

  .btn-action {
    padding: 6px 12px;
    border-radius: 4px;
    border: none;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
  }

  .btn-edit { background: #e0f2fe; color: #0369a1; }
  .btn-delete { background: #fee2e2; color: #b91c1c; margin-left: 6px; }

  /* Modal */
  .modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1000;
  }
  .modal-content {
    background: #fff;
    border-radius: 12px;
    width: 100%;
    max-width: 560px;
    padding: 28px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
  }
</style>

<div class="manage-layout">
  <!-- Section Selector Tabs -->
  <div class="sec-nav-list">
    <h3 style="font-size: 12px; font-weight: 800; color: #94a3b8; text-transform: uppercase; padding: 8px 12px; letter-spacing: 1px;">
      Select Section
    </h3>

    <?php
    $defaultSecKeys = [
      'sec_01_numbers' => '01. Institute in Numbers',
      'sec_02_university' => '02. About RKDF University',
      'sec_03_gateway' => '03. Student Gateway',
      'sec_04_schools' => '04. Schools & Faculties',
      'sec_05_admissions' => '05. Admissions 2026-27',
      'sec_06_programs' => '06. Featured Programs',
      'sec_07_campus' => '07. Campus Life',
      'sec_08_research' => '08. Research & Innovation',
      'sec_09_placements' => '09. Placement Highlights',
      'sec_10_voices' => '10. Student Testimonials',
      'sec_11_news' => '11. News & Announcements',
      'sec_12_experience' => '12. Campus Experience',
      'sec_13_recognition' => '13. Recognitions & Approvals',
      'sec_14_career' => '14. Global Recruiters'
    ];

    foreach ($defaultSecKeys as $sKey => $sLabel):
      $activeClass = ($selectedKey === $sKey) ? 'active' : '';
    ?>
      <a href="manage_sections.php?sec=<?= urlencode($sKey) ?>" class="sec-nav-item <?= $activeClass ?>">
        <span><?= htmlspecialchars($sLabel) ?></span>
        <i class="fa-solid fa-chevron-right" style="font-size: 10px; opacity: 0.5;"></i>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- Main Management Area -->
  <div>
    <!-- SECTION METADATA FORM -->
    <div class="cms-card">
      <div class="cms-card-header">
        <h2 class="cms-card-title">
          <i class="fa-solid fa-pen-to-square" style="color: var(--primary); margin-right: 8px;"></i>
          Section Metadata Header
        </h2>
      </div>

      <form action="manage_sections.php" method="POST">
        <input type="hidden" name="action" value="update_section_meta">
        <input type="hidden" name="section_key" value="<?= htmlspecialchars($selectedKey) ?>">

        <div class="form-grid">
          <div>
            <label>Tag Number</label>
            <input type="text" name="tag_number" value="<?= htmlspecialchars($currentSec['tag_number'] ?? '01') ?>">
          </div>
          <div>
            <label>Tag Text</label>
            <input type="text" name="tag_text" value="<?= htmlspecialchars($currentSec['tag_text'] ?? '') ?>">
          </div>
          <div class="form-group-full">
            <label>Main Heading Title</label>
            <input type="text" name="title_main" value="<?= htmlspecialchars($currentSec['title_main'] ?? '') ?>">
          </div>
          <div class="form-group-full">
            <label>Accent Heading Title (Red/Highlight text)</label>
            <input type="text" name="title_accent" value="<?= htmlspecialchars($currentSec['title_accent'] ?? '') ?>">
          </div>
          <div class="form-group-full">
            <label>Subtitle / Description</label>
            <textarea name="subtitle" rows="2"><?= htmlspecialchars($currentSec['subtitle'] ?? '') ?></textarea>
          </div>
          <div>
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; text-transform: none; margin-top: 10px;">
              <input type="checkbox" name="is_active" value="1" <?= ($currentSec['is_active'] ?? 1) ? 'checked' : '' ?>>
              <b>Active on Homepage</b>
            </label>
          </div>
        </div>

        <div style="margin-top: 20px; text-align: right;">
          <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save Header Changes
          </button>
        </div>
      </form>
    </div>

    <!-- SECTION ITEMS MANAGEMENT -->
    <div class="cms-card">
      <div class="cms-card-header">
        <h2 class="cms-card-title">
          <i class="fa-solid fa-list" style="color: var(--primary); margin-right: 8px;"></i>
          Section Content Items (<?= count($currentItems) ?>)
        </h2>
        <button class="btn-save" onclick="openAddModal()">
          <i class="fa-solid fa-plus"></i> Add New Item
        </button>
      </div>

      <?php if (empty($currentItems)): ?>
        <p style="color: var(--text-muted); font-size: 14px; text-align: center; padding: 30px;">
          No granular items created for this section yet. Click <b>"Add New Item"</b> to populate content!
        </p>
      <?php else: ?>
        <table class="items-table">
          <thead>
            <tr>
              <th>Order</th>
              <th>Title / Number</th>
              <th>Subtitle / Text</th>
              <th>Image / Link</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($currentItems as $item): ?>
              <tr>
                <td><b><?= $item['sort_order'] ?></b></td>
                <td>
                  <strong><?= htmlspecialchars($item['title'] ?: $item['number_val']) ?></strong>
                  <?php if (!empty($item['badge_text'])): ?>
                    <span style="background: #fef3c7; color: #b45309; padding: 2px 6px; border-radius: 4px; font-size: 10px; font-weight: 700; margin-left: 6px;">
                      <?= htmlspecialchars($item['badge_text']) ?>
                    </span>
                  <?php endif; ?>
                </td>
                <td style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                  <?= htmlspecialchars($item['subtitle'] ?: $item['text_val']) ?>
                </td>
                <td>
                  <?php if (!empty($item['image_path'])): ?>
                    <img src="../<?= htmlspecialchars($item['image_path']) ?>" style="height: 30px; border-radius: 4px;">
                  <?php endif; ?>
                  <?php if (!empty($item['link_url'])): ?>
                    <span style="font-size: 11px; color: #3b82f6;"><i class="fa-solid fa-link"></i> <?= htmlspecialchars($item['link_url']) ?></span>
                  <?php endif; ?>
                </td>
                <td>
                  <button class="btn-action btn-edit" onclick='openEditModal(<?= json_encode($item) ?>)'>
                    <i class="fa-solid fa-pen"></i> Edit
                  </button>
                  <form action="manage_sections.php" method="POST" style="display: inline;" onsubmit="return confirm('Delete this item?');">
                    <input type="hidden" name="action" value="delete_item">
                    <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                    <input type="hidden" name="section_key" value="<?= htmlspecialchars($selectedKey) ?>">
                    <button type="submit" class="btn-action btn-delete">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>

  </div>
</div>

<!-- ADD ITEM MODAL -->
<div id="addModal" class="modal-overlay">
  <div class="modal-content">
    <h3 style="margin-bottom: 20px; font-size: 18px; font-weight: 800;">Add Item to Section</h3>
    <form action="manage_sections.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="add_item">
      <input type="hidden" name="section_key" value="<?= htmlspecialchars($selectedKey) ?>">

      <div class="form-grid">
        <div>
          <label>Item Type</label>
          <input type="text" name="item_type" placeholder="e.g. stat, card, link, program">
        </div>
        <div>
          <label>Sort Order</label>
          <input type="number" name="sort_order" value="1">
        </div>
        <div class="form-group-full">
          <label>Title / Name</label>
          <input type="text" name="title" placeholder="e.g. B.Tech Computer Science">
        </div>
        <div>
          <label>Number Value (for stats)</label>
          <input type="text" name="number_val" placeholder="e.g. 150+">
        </div>
        <div>
          <label>Badge Text</label>
          <input type="text" name="badge_text" placeholder="e.g. HOT PROGRAM">
        </div>
        <div class="form-group-full">
          <label>Subtitle / Details</label>
          <input type="text" name="subtitle" placeholder="e.g. 4 Years | AI & Data Science">
        </div>
        <div class="form-group-full">
          <label>Text Description (Long text)</label>
          <textarea name="text_val" rows="2"></textarea>
        </div>
        <div class="form-group-full">
          <label>Link URL</label>
          <input type="text" name="link_url" placeholder="e.g. Engineering.php">
        </div>
        <div class="form-group-full">
          <label>Upload Image (Optional)</label>
          <input type="file" name="item_image" accept="image/*">
        </div>
      </div>

      <div style="margin-top: 24px; display: flex; justify-content: flex-end; gap: 12px;">
        <button type="button" class="btn-action" style="background: #e2e8f0; padding: 10px 16px;" onclick="closeAddModal()">Cancel</button>
        <button type="submit" class="btn-save">Add Item ↗</button>
      </div>
    </form>
  </div>
</div>

<!-- EDIT ITEM MODAL -->
<div id="editModal" class="modal-overlay">
  <div class="modal-content">
    <h3 style="margin-bottom: 20px; font-size: 18px; font-weight: 800;">Edit Section Item</h3>
    <form action="manage_sections.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="edit_item">
      <input type="hidden" name="item_id" id="edit_item_id">
      <input type="hidden" name="section_key" value="<?= htmlspecialchars($selectedKey) ?>">
      <input type="hidden" name="existing_image" id="edit_existing_image">

      <div class="form-grid">
        <div>
          <label>Item Type</label>
          <input type="text" name="item_type" id="edit_item_type">
        </div>
        <div>
          <label>Sort Order</label>
          <input type="number" name="sort_order" id="edit_sort_order">
        </div>
        <div class="form-group-full">
          <label>Title / Name</label>
          <input type="text" name="title" id="edit_title">
        </div>
        <div>
          <label>Number Value</label>
          <input type="text" name="number_val" id="edit_number_val">
        </div>
        <div>
          <label>Badge Text</label>
          <input type="text" name="badge_text" id="edit_badge_text">
        </div>
        <div class="form-group-full">
          <label>Subtitle / Details</label>
          <input type="text" name="subtitle" id="edit_subtitle">
        </div>
        <div class="form-group-full">
          <label>Text Description</label>
          <textarea name="text_val" id="edit_text_val" rows="2"></textarea>
        </div>
        <div class="form-group-full">
          <label>Link URL</label>
          <input type="text" name="link_url" id="edit_link_url">
        </div>
        <div class="form-group-full">
          <label>Change Image (Optional)</label>
          <input type="file" name="item_image" accept="image/*">
        </div>
      </div>

      <div style="margin-top: 24px; display: flex; justify-content: flex-end; gap: 12px;">
        <button type="button" class="btn-action" style="background: #e2e8f0; padding: 10px 16px;" onclick="closeEditModal()">Cancel</button>
        <button type="submit" class="btn-save">Update Changes ↗</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openAddModal() {
    document.getElementById('addModal').style.display = 'flex';
  }
  function closeAddModal() {
    document.getElementById('addModal').style.display = 'none';
  }

  function openEditModal(item) {
    document.getElementById('edit_item_id').value = item.id;
    document.getElementById('edit_item_type').value = item.item_type || '';
    document.getElementById('edit_sort_order').value = item.sort_order || 1;
    document.getElementById('edit_title').value = item.title || '';
    document.getElementById('edit_number_val').value = item.number_val || '';
    document.getElementById('edit_badge_text').value = item.badge_text || '';
    document.getElementById('edit_subtitle').value = item.subtitle || '';
    document.getElementById('edit_text_val').value = item.text_val || '';
    document.getElementById('edit_link_url').value = item.link_url || '';
    document.getElementById('edit_existing_image').value = item.image_path || '';

    document.getElementById('editModal').style.display = 'flex';
  }
  function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
  }

  <?php if (!empty($msg)): ?>
    showToast('Changes saved successfully!', 'success');
  <?php endif; ?>
</script>

<?php require_once __DIR__ . '/footer.php'; ?>
