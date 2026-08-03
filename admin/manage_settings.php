<?php
// admin/manage_settings.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();

// Handle Settings Update POST (Executed before any HTML output)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $settings = $_POST['settings'] ?? [];

    $stmt = $pdo->prepare("INSERT INTO site_settings (setting_key, setting_value, setting_group) VALUES (?, ?, 'general') ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)");

    foreach ($settings as $key => $value) {
        $stmt->execute([trim($key), trim($value)]);
    }

    header('Location: manage_settings.php?msg=settings_updated');
    exit();
}

// Render Page HTML
$pageTitle = 'Global Site Settings — RKDF CMS';
require_once __DIR__ . '/header.php';

$msg = $_GET['msg'] ?? '';

// Fetch current site settings
$currentSettings = [];
try {
    $stmt = $pdo->query("SELECT setting_key, setting_value FROM site_settings");
    while ($row = $stmt->fetch()) {
        $currentSettings[$row['setting_key']] = $row['setting_value'];
    }
} catch (Exception $e) {
    // Ignore error
}
?>


<style>
  .settings-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid var(--border-color);
    padding: 28px;
    max-width: 900px;
  }

  .settings-section-title {
    font-size: 15px;
    font-weight: 800;
    color: var(--secondary);
    padding-bottom: 8px;
    margin-bottom: 20px;
    border-bottom: 2px solid #f1f5f9;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .form-grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 28px;
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

  input[type="text"], textarea, select {
    width: 100%;
    padding: 11px 14px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 14px;
    color: #0f172a;
    outline: none;
    transition: border 0.2s;
  }

  input[type="text"]:focus, textarea:focus, select:focus {
    border-color: var(--primary);
  }

  .btn-save-settings {
    background: var(--primary);
    color: #ffffff;
    border: none;
    padding: 12px 24px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 14px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background 0.2s;
  }

  .btn-save-settings:hover {
    background: #b01921;
  }
</style>

<div class="settings-card">
  <h2 style="font-size: 20px; font-weight: 800; color: var(--secondary); margin-bottom: 24px;">
    Global Site Settings
  </h2>

  <form action="manage_settings.php" method="POST">
    
    <!-- 1. Contact & Identity -->
    <div class="settings-section-title">
      <i class="fa-solid fa-building-columns" style="color: var(--primary);"></i>
      Contact Information & University Identity
    </div>

    <div class="form-grid-2">
      <div>
        <label>University Title</label>
        <input type="text" name="settings[site_title]" value="<?= htmlspecialchars($currentSettings['site_title'] ?? 'RKDF University Bhopal') ?>">
      </div>
      <div>
        <label>Contact Phone Number</label>
        <input type="text" name="settings[contact_phone]" value="<?= htmlspecialchars($currentSettings['contact_phone'] ?? '+91-755-2740395') ?>">
      </div>
      <div>
        <label>General Email</label>
        <input type="text" name="settings[contact_email]" value="<?= htmlspecialchars($currentSettings['contact_email'] ?? 'info@rkdf.ac.in') ?>">
      </div>
      <div>
        <label>Admissions Email</label>
        <input type="text" name="settings[admission_email]" value="<?= htmlspecialchars($currentSettings['admission_email'] ?? 'admission@rkdf.ac.in') ?>">
      </div>
      <div class="form-group-full">
        <label>Campus Address</label>
        <textarea name="settings[footer_address]" rows="2"><?= htmlspecialchars($currentSettings['footer_address'] ?? 'RKDF University, Airport Bypass Road, Gandhi Nagar, Bhopal, Madhya Pradesh 462033') ?></textarea>
      </div>
    </div>

    <!-- 2. Admissions & Important Links -->
    <div class="settings-section-title">
      <i class="fa-solid fa-user-graduate" style="color: var(--primary);"></i>
      Admissions & Important Document Links
    </div>

    <div class="form-grid-2">
      <div>
        <label>Current Admission Academic Year</label>
        <input type="text" name="settings[admission_year]" value="<?= htmlspecialchars($currentSettings['admission_year'] ?? '2026-27') ?>">
      </div>
      <div>
        <label>Admission Status</label>
        <select name="settings[admission_status]">
          <option value="OPEN" <?= (($currentSettings['admission_status'] ?? 'OPEN') === 'OPEN') ? 'selected' : '' ?>>OPEN</option>
          <option value="CLOSED" <?= (($currentSettings['admission_status'] ?? 'OPEN') === 'CLOSED') ? 'selected' : '' ?>>CLOSED</option>
        </select>
      </div>
      <div class="form-group-full">
        <label>Admission Policy Document Link / Path</label>
        <input type="text" name="settings[admission_policy_pdf]" value="<?= htmlspecialchars($currentSettings['admission_policy_pdf'] ?? 'ADMISSION POLICY 2026-27.pdf') ?>">
      </div>
      <div class="form-group-full">
        <label>University Prospectus Link / Path</label>
        <input type="text" name="settings[prospectus_pdf]" value="<?= htmlspecialchars($currentSettings['prospectus_pdf'] ?? 'Content/Documents/Prospectus  2024-25.pdf') ?>">
      </div>
      <div class="form-group-full">
        <label>Fee Structure PDF Link / Path</label>
        <input type="text" name="settings[fee_structure_pdf]" value="<?= htmlspecialchars($currentSettings['fee_structure_pdf'] ?? 'University_Fees_Structure.pdf') ?>">
      </div>
      <div class="form-group-full">
        <label>Student ERP Portal URL</label>
        <input type="text" name="settings[erp_portal_url]" value="<?= htmlspecialchars($currentSettings['erp_portal_url'] ?? 'https://erplive.rkdf.ac.in') ?>">
      </div>
    </div>

    <!-- 3. Announcement Ticker & Footer -->
    <div class="settings-section-title">
      <i class="fa-solid fa-bullhorn" style="color: var(--primary);"></i>
      Global Announcement Ticker & Footer
    </div>

    <div class="form-grid-2">
      <div class="form-group-full">
        <label>Top Scrolling Announcement Banner Text</label>
        <textarea name="settings[ticker_text]" rows="2"><?= htmlspecialchars($currentSettings['ticker_text'] ?? 'Admissions Open 2026-27 for B.Tech, MBA, B.Pharm, Ph.D and Nursing Programs!') ?></textarea>
      </div>
      <div class="form-group-full">
        <label>Footer Copyright Text</label>
        <input type="text" name="settings[copyright_text]" value="<?= htmlspecialchars($currentSettings['copyright_text'] ?? '© RKDF University Bhopal. All rights reserved.') ?>">
      </div>
    </div>

    <div style="margin-top: 32px; text-align: right;">
      <button type="submit" class="btn-save-settings">
        <i class="fa-solid fa-floppy-disk"></i> Save Global Settings Across All Pages
      </button>
    </div>
  </form>
</div>

<script>
  <?php if (!empty($msg)): ?>
    showToast('Global Site Settings updated successfully across all pages!', 'success');
  <?php endif; ?>
</script>

<?php require_once __DIR__ . '/footer.php'; ?>
