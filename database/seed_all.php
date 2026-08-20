<?php
// database/seed_all.php
// Standalone One-Click Seeder & Database Setup Tool for RKDF University CMS
// Allows entering live database credentials directly in the browser if disconnected

require_once __DIR__ . '/../config/db.php';

$saveMsg = '';
$saveErr = '';
$overridePdo = null;

// Handle manual DB Credentials submission from form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_db_creds') {
    $rawHost = trim($_POST['db_host'] ?? 'localhost');
    $inName  = trim($_POST['db_name'] ?? '');
    $inUser  = trim($_POST['db_user'] ?? '');
    $inPass  = $_POST['db_pass'] ?? '';

    // Handle host:port notation like localhost:3306
    $inHost = $rawHost;
    $inPort = '';
    if (strpos($rawHost, ':') !== false) {
        list($inHost, $inPort) = explode(':', $rawHost, 2);
    }

    // Test connection with submitted credentials
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

        $saveMsg = "Database credentials connected and saved successfully!";
        $overridePdo = $testPdo;
    } catch (Throwable $ex) {
        $saveErr = "Connection failed with entered credentials: " . $ex->getMessage();
    }
}

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RKDF University — Database Synchronizer &amp; Setup</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; }
    body { background: #0f172a; color: #f8fafc; display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 24px; }
    .card { background: #1e293b; border: 1px solid #334155; border-radius: 16px; padding: 36px; max-width: 720px; width: 100%; box-shadow: 0 20px 40px rgba(0,0,0,0.4); }
    h1 { color: #f43f5e; font-size: 24px; font-weight: 800; margin-bottom: 8px; display: flex; align-items: center; gap: 10px; }
    p.sub { color: #94a3b8; font-size: 14px; margin-bottom: 24px; }
    .log-box { background: #090d16; border: 1px solid #1e293b; border-radius: 10px; padding: 18px; font-family: monospace; font-size: 13px; line-height: 1.6; max-height: 380px; overflow-y: auto; margin-bottom: 24px; }
    .log-ok { color: #4ade80; }
    .log-warn { color: #fbbf24; }
    .log-err { color: #f87171; }
    .log-info { color: #38bdf8; }
    .btn { display: inline-flex; align-items: center; gap: 8px; background: #D9232D; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 700; font-size: 14px; border: none; cursor: pointer; transition: background 0.2s; }
    .btn:hover { background: #b01921; }
    .btn-secondary { background: #334155; }
    .btn-secondary:hover { background: #475569; }
    .actions { display: flex; gap: 12px; flex-wrap: wrap; }
    .stat-badge { background: rgba(56, 189, 248, 0.15); color: #38bdf8; padding: 4px 10px; border-radius: 6px; font-weight: 700; font-size: 12px; margin-right: 6px; }

    .form-box { background: #0f172a; border: 1px solid #334155; border-radius: 10px; padding: 20px; margin-bottom: 24px; }
    .form-title { font-size: 15px; font-weight: 800; color: #f8fafc; margin-bottom: 8px; }
    .form-help { font-size: 12.5px; color: #94a3b8; line-height: 1.5; margin-bottom: 16px; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 16px; }
    .form-group { display: flex; flex-direction: column; gap: 4px; }
    .form-group label { font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; }
    .form-group input { background: #1e293b; border: 1px solid #475569; border-radius: 6px; padding: 10px 12px; color: #fff; font-size: 13px; outline: none; }
    .form-group input:focus { border-color: #f43f5e; }
    .alert-ok { background: rgba(74, 222, 128, 0.15); border: 1px solid #4ade80; color: #4ade80; padding: 12px 16px; border-radius: 8px; font-size: 13.5px; margin-bottom: 16px; font-weight: 600; }
    .alert-err { background: rgba(248, 113, 113, 0.15); border: 1px solid #f87171; color: #f87171; padding: 12px 16px; border-radius: 8px; font-size: 13.5px; margin-bottom: 16px; font-weight: 600; }
  </style>
</head>
<body>
  <div class="card">
    <h1>⚡ RKDF Database Synchronizer</h1>
    <p class="sub">Initializes all 119 pages, 549 content cards, homepage sections, navigation &amp; admin accounts.</p>

    <?php if ($saveMsg): ?><div class="alert-ok">✔ <?= htmlspecialchars($saveMsg) ?></div><?php endif; ?>
    <?php if ($saveErr): ?><div class="alert-err">✖ <?= htmlspecialchars($saveErr) ?></div><?php endif; ?>

    <div class="log-box">
      <?php
      echo "<span class='log-info'>[1/3] Connecting to Database...</span><br>";
      $pdo = $overridePdo ?: getDbConnection();

      if (!$pdo) {
          echo "<span class='log-err'>✖ ERROR: Could not connect to MySQL database.</span><br>";
          if (!empty($GLOBALS['LAST_DB_ERROR'])) {
              echo "<span class='log-err'>Details: " . htmlspecialchars($GLOBALS['LAST_DB_ERROR']) . "</span><br><br>";
          }
          echo "<span class='log-warn'>👉 Please enter your live cPanel MySQL Database User &amp; Password below:</span><br>";
      } else {
          echo "<span class='log-ok'>✔ Connected successfully to database!</span><br><br>";
          echo "<span class='log-info'>[2/3] Importing full database dump (rkdf_cms_db_complete.sql)...</span><br>";

          $res = syncCompleteDatabase($pdo);
          if ($res['success']) {
              echo "<span class='log-ok'>✔ " . htmlspecialchars($res['message']) . "</span><br><br>";
          } else {
              echo "<span class='log-err'>✖ " . htmlspecialchars($res['message']) . "</span><br><br>";
          }

          echo "<span class='log-info'>[3/3] Verifying table counts:</span><br>";
          $tables = [
              'site_pages' => 'Site Pages',
              'page_sections' => 'Content Cards / Sections',
              'homepage_sections' => 'Homepage Sections',
              'homepage_items' => 'Homepage Items',
              'footer_links' => 'Footer Links',
              'nav_menu_items' => 'Nav Menu Items',
              'site_settings' => 'Site Settings',
              'admin_users' => 'Admin Users'
          ];

          foreach ($tables as $t => $label) {
              try {
                  $cnt = (int)$pdo->query("SELECT COUNT(*) FROM `$t`")->fetchColumn();
                  echo "<span class='stat-badge'>$cnt</span> $label (`$t`)<br>";
              } catch (Throwable $ex) {
                  echo "<span class='log-warn'>⚠ Table `$t` not queried: " . htmlspecialchars($ex->getMessage()) . "</span><br>";
              }
          }

          echo "<br><span class='log-ok'>✨ Database is 100% READY! All pages and admin portal are fully operational.</span><br>";
      }
      ?>
    </div>

    <?php if (!$pdo): ?>
    <!-- Live Database Credentials Form -->
    <div class="form-box">
      <div class="form-title">🔑 Enter cPanel MySQL Database Details:</div>
      <p class="form-help">
        cPanel hosting par user <code>root</code> nahi hota hai. cPanel me <b>"MySQL Databases"</b> section se apna <b>Database User</b> aur <b>Password</b> check karein:
      </p>
      <form method="POST">
        <input type="hidden" name="action" value="save_db_creds">
        <div class="form-grid">
          <div class="form-group">
            <label>Database Host</label>
            <input type="text" name="db_host" value="<?= htmlspecialchars($_POST['db_host'] ?? 'localhost') ?>" placeholder="localhost" required>
          </div>
          <div class="form-group">
            <label>Database Name</label>
            <input type="text" name="db_name" value="<?= htmlspecialchars($_POST['db_name'] ?? (defined('DB_NAME') ? DB_NAME : 'rkdfu_cms_db')) ?>" placeholder="e.g. rkdfu_cms_db" required>
          </div>
          <div class="form-group">
            <label>Database User (Not 'root')</label>
            <input type="text" name="db_user" value="<?= htmlspecialchars($_POST['db_user'] ?? '') ?>" placeholder="e.g. rkdfu_admin or cpanel_user" required>
          </div>
          <div class="form-group">
            <label>Database Password</label>
            <input type="password" name="db_pass" value="<?= htmlspecialchars($_POST['db_pass'] ?? '') ?>" placeholder="Enter cPanel DB User Password" required>
          </div>
        </div>
        <button type="submit" class="btn" style="width: 100%; justify-content: center;">
          ⚡ Connect &amp; Sync Database Now
        </button>
      </form>
    </div>
    <?php endif; ?>

    <div class="actions">
      <a href="../admin/manage_pages.php" class="btn">Go to Admin Page Manager →</a>
      <a href="../admin/dashboard.php" class="btn btn-secondary">Admin Dashboard</a>
      <a href="../about.php" class="btn btn-secondary" target="_blank">View Live About Page ↗</a>
    </div>
  </div>
</body>
</html>
