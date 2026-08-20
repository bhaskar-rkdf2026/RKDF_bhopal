<?php
// admin/db_sync.php
// Dedicated Database Synchronization & Health Check Panel in Admin Portal

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../include/cms_engine.php';

$saveMsg = '';
$saveErr = '';
$syncResult = null;

// Handle manual DB Credentials submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_db_creds') {
    $rawHost = trim($_POST['db_host'] ?? 'localhost');
    $inName  = trim($_POST['db_name'] ?? '');
    $inUser  = trim($_POST['db_user'] ?? '');
    $inPass  = $_POST['db_pass'] ?? '';

    $inHost = $rawHost;
    $inPort = '';
    if (strpos($rawHost, ':') !== false) {
        list($inHost, $inPort) = explode(':', $rawHost, 2);
    }

    try {
        $dsnParts = ["mysql:host={$inHost}"];
        if (!empty($inPort)) {
            $dsnParts[] = "port={$inPort}";
        }
        $dsnParts[] = "dbname={$inName}";
        $dsnParts[] = "charset=utf8mb4";
        $testDsn = implode(';', $dsnParts);

        $testPdo = new PDO($testDsn, $inUser, $inPass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ]);

        // Connection successful! Save to config/db_credentials.json
        $configFile = __DIR__ . '/../config/db_credentials.json';
        @file_put_contents($configFile, json_encode([
            'db_host' => $inHost . (!empty($inPort) ? ":{$inPort}" : ''),
            'db_name' => $inName,
            'db_user' => $inUser,
            'db_pass' => $inPass,
            'updated_at' => date('Y-m-d H:i:s')
        ], JSON_PRETTY_PRINT));

        $saveMsg = "Database credentials saved and verified successfully!";
    } catch (Throwable $ex) {
        $saveErr = "Connection failed with entered credentials: " . $ex->getMessage();
    }
}

$pdo = getDbConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'sync_db') {
    if ($pdo) {
        $syncResult = syncCompleteDatabase($pdo);
    }
}

$pageTitle = 'Database Sync & Content Importer — RKDF Admin Portal';
require_once __DIR__ . '/header.php';

// Get Current Counts
$tableCounts = [];
if ($pdo) {
    $inspectTables = [
        'site_pages'        => 'Registered Site Pages',
        'page_sections'     => 'Section Content Cards',
        'homepage_sections' => 'Homepage Sections',
        'homepage_items'    => 'Homepage Items',
        'footer_links'      => 'Footer Menu Links',
        'nav_menu_items'    => 'Top Navigation Links',
        'site_settings'     => 'Site Settings',
        'admin_users'       => 'Admin Accounts'
    ];

    foreach ($inspectTables as $tbl => $lbl) {
        try {
            $c = (int)$pdo->query("SELECT COUNT(*) FROM `$tbl`")->fetchColumn();
            $tableCounts[$tbl] = ['label' => $lbl, 'count' => $c, 'ok' => $c > 0];
        } catch (Throwable $e) {
            $tableCounts[$tbl] = ['label' => $lbl, 'count' => 0, 'ok' => false];
        }
    }
}
?>

<style>
.sync-box {
  background: #ffffff;
  border: 1px solid var(--border-color);
  border-radius: 12px;
  padding: 28px;
  margin-bottom: 24px;
}
.sync-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
  flex-wrap: wrap;
  gap: 16px;
}
.status-pill-ok {
  background: #dcfce7;
  color: #166534;
  padding: 6px 14px;
  border-radius: 99px;
  font-weight: 700;
  font-size: 13px;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.status-pill-err {
  background: #fee2e2;
  color: #991b1b;
  padding: 6px 14px;
  border-radius: 99px;
  font-weight: 700;
  font-size: 13px;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.stat-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 16px;
  margin-bottom: 24px;
}
.stat-item {
  background: #f8fafc;
  border: 1px solid var(--border-color);
  border-radius: 10px;
  padding: 16px 20px;
}
.stat-num {
  font-size: 26px;
  font-weight: 800;
  color: var(--primary);
  line-height: 1.2;
}
.stat-label {
  font-size: 13px;
  font-weight: 600;
  color: var(--text-muted);
  margin-top: 4px;
}
.btn-sync {
  background: var(--primary);
  color: #fff;
  border: none;
  padding: 14px 28px;
  border-radius: 8px;
  font-size: 15px;
  font-weight: 800;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  transition: background 0.2s;
}
.btn-sync:hover {
  background: var(--primary-dark);
}
.alert-box-ok {
  background: #dcfce7;
  color: #166534;
  border: 1px solid #bbf7d0;
  padding: 14px 18px;
  border-radius: 8px;
  margin-bottom: 20px;
  font-weight: 600;
}
.alert-box-err {
  background: #fee2e2;
  color: #991b1b;
  border: 1px solid #fecaca;
  padding: 14px 18px;
  border-radius: 8px;
  margin-bottom: 20px;
  font-weight: 600;
}
.cred-form-box {
  background: #f8fafc;
  border: 2px dashed #cbd5e1;
  border-radius: 12px;
  padding: 24px;
  margin-bottom: 28px;
}
.cred-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 16px;
  margin-bottom: 16px;
}
.cred-field label {
  display: block;
  font-size: 12px;
  font-weight: 700;
  color: var(--secondary);
  margin-bottom: 6px;
  text-transform: uppercase;
}
.cred-field input {
  width: 100%;
  padding: 10px 14px;
  border: 1px solid var(--border-color);
  border-radius: 8px;
  font-size: 14px;
  box-sizing: border-box;
  background: #ffffff;
}
.cred-field input:focus {
  border-color: var(--primary);
  outline: none;
}
.btn-save-creds {
  background: #0f172a;
  color: #ffffff;
  border: none;
  padding: 12px 24px;
  border-radius: 8px;
  font-weight: 700;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.2s;
}
.btn-save-creds:hover {
  background: var(--primary);
}
</style>

<div class="sync-box">
  <div class="sync-header">
    <div>
      <h2 style="font-size:20px;font-weight:800;color:var(--secondary);margin-bottom:4px;">
        <i class="fa-solid fa-database" style="color:var(--primary);"></i> Database Content Synchronizer
      </h2>
      <p style="font-size:14px;color:var(--text-muted);">
        Ensures all 119 site pages, 549 content cards, homepage sections, and settings are fully synchronized into the database.
      </p>
    </div>
    <div>
      <?php if ($pdo): ?>
        <span class="status-pill-ok"><i class="fa-solid fa-circle-check"></i> Database Connected</span>
      <?php else: ?>
        <span class="status-pill-err"><i class="fa-solid fa-circle-xmark"></i> Database Disconnected</span>
      <?php endif; ?>
    </div>
  </div>

  <?php if ($saveMsg): ?>
    <div class="alert-box-ok"><i class="fa-solid fa-circle-check"></i> <?= htmlspecialchars($saveMsg) ?></div>
  <?php endif; ?>
  <?php if ($saveErr): ?>
    <div class="alert-box-err"><i class="fa-solid fa-triangle-exclamation"></i> <?= htmlspecialchars($saveErr) ?></div>
  <?php endif; ?>

  <?php if ($syncResult): ?>
    <?php if ($syncResult['success']): ?>
      <div class="alert-box-ok">
        <i class="fa-solid fa-circle-check"></i> <?= htmlspecialchars($syncResult['message']) ?>
      </div>
    <?php else: ?>
      <div class="alert-box-err">
        <i class="fa-solid fa-triangle-exclamation"></i> <?= htmlspecialchars($syncResult['message']) ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (!$pdo): ?>
    <!-- Live Database Credentials Input Form -->
    <div class="cred-form-box">
      <h3 style="font-size:16px;font-weight:800;color:var(--secondary);margin-bottom:6px;">
        <i class="fa-solid fa-plug" style="color:var(--primary);"></i> Enter Live cPanel Database Credentials:
      </h3>
      <p style="font-size:13px;color:var(--text-muted);margin-bottom:16px;">
        Live database disconnect hone par apne cPanel MySQL database ka name, user aur password yahan enter karein:
      </p>
      
      <?php if (!empty($GLOBALS['LAST_DB_ERROR'])): ?>
        <div style="font-size:12px;background:#fef2f2;color:#991b1b;padding:8px 12px;border-radius:6px;margin-bottom:14px;font-family:monospace;">
          Error Details: <?= htmlspecialchars($GLOBALS['LAST_DB_ERROR']) ?>
        </div>
      <?php endif; ?>

      <form method="POST">
        <input type="hidden" name="action" value="save_db_creds">
        <div class="cred-grid">
          <div class="cred-field">
            <label>Database Host</label>
            <input type="text" name="db_host" value="localhost" required>
          </div>
          <div class="cred-field">
            <label>Database Name</label>
            <input type="text" name="db_name" placeholder="e.g. rkhare_rkdfcms" required>
          </div>
          <div class="cred-field">
            <label>Database User</label>
            <input type="text" name="db_user" placeholder="e.g. rkhare_prashant" required>
          </div>
          <div class="cred-field">
            <label>Database Password</label>
            <input type="password" name="db_pass" placeholder="Enter DB Password">
          </div>
        </div>
        <button type="submit" class="btn-save-creds">
          <i class="fa-solid fa-link"></i> Save &amp; Connect Live Database
        </button>
      </form>
    </div>
  <?php endif; ?>

  <?php if ($pdo): ?>
    <h3 style="font-size:15px;font-weight:700;color:var(--secondary);margin-bottom:14px;">Current Database Records:</h3>
    <div class="stat-grid">
      <?php foreach ($tableCounts as $tbl => $info): ?>
        <div class="stat-item">
          <div class="stat-num"><?= $info['count'] ?></div>
          <div class="stat-label"><?= htmlspecialchars($info['label']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>

    <form method="POST" onsubmit="return confirm('Do you want to synchronize all 119 pages and 549 section cards into the database now?');">
      <input type="hidden" name="action" value="sync_db">
      <button type="submit" class="btn-sync">
        <i class="fa-solid fa-arrows-rotate"></i> 1-Click Sync Database with Complete Content
      </button>
    </form>
  <?php endif; ?>

  <div style="margin-top:24px;padding-top:20px;border-top:1px solid var(--border-color);display:flex;gap:12px;flex-wrap:wrap;">
    <a href="manage_pages.php" class="btn-ghost" style="padding:10px 20px;text-decoration:none;font-weight:700;border:1px solid var(--border-color);border-radius:8px;color:var(--text-main);">
      ← Back to Page Content Editor
    </a>
    <a href="../database/seed_all.php" target="_blank" class="btn-ghost" style="padding:10px 20px;text-decoration:none;font-weight:700;border:1px solid var(--border-color);border-radius:8px;color:var(--text-main);">
      Open Standalone Seeder ↗
    </a>
  </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
