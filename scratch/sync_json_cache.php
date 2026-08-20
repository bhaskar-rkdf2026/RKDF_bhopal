<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../include/cms_engine.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB connection failed\n";
    exit(1);
}

$pages = $pdo->query("SELECT * FROM site_pages")->fetchAll(PDO::FETCH_ASSOC);
cms_save_json_file('site_pages.json', $pages);

$sections = $pdo->query("SELECT * FROM page_sections")->fetchAll(PDO::FETCH_ASSOC);
cms_save_json_file('page_sections.json', $sections);

$hpSecs = $pdo->query("SELECT * FROM homepage_sections")->fetchAll(PDO::FETCH_ASSOC);
cms_save_json_file('homepage_sections.json', $hpSecs);

$hpItems = $pdo->query("SELECT * FROM homepage_items")->fetchAll(PDO::FETCH_ASSOC);
cms_save_json_file('homepage_items.json', $hpItems);

$settings = $pdo->query("SELECT * FROM site_settings")->fetchAll(PDO::FETCH_ASSOC);
cms_save_json_file('site_settings.json', $settings);

$footer = $pdo->query("SELECT * FROM footer_links")->fetchAll(PDO::FETCH_ASSOC);
cms_save_json_file('footer_links.json', $footer);

$nav = $pdo->query("SELECT * FROM nav_menu_items")->fetchAll(PDO::FETCH_ASSOC);
cms_save_json_file('nav_menu_items.json', $nav);

echo "SUCCESS: Synced JSON cache with " . count($pages) . " pages, " . count($sections) . " sections, " . count($hpSecs) . " homepage sections, " . count($hpItems) . " homepage items.\n";
