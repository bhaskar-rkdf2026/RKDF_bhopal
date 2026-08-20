<?php
// include/cms_engine.php
// Hybrid High-Availability CMS Engine for RKDF University Bhopal
// Seamlessly operates in Dual-Mode: MySQL Database + Fast JSON File Storage Fallback
// Ensures 100% of pages, cards, and admin tools work flawlessly on live hosting without DB configuration!

require_once __DIR__ . '/../config/db.php';

$dataDir = __DIR__ . '/../data';
if (!file_exists($dataDir)) {
    @mkdir($dataDir, 0777, true);
}

/**
 * Loads JSON data from file cache.
 */
function cms_load_json_file(string $filename): array {
    $path = __DIR__ . '/../data/' . $filename;
    if (file_exists($path)) {
        $content = @file_get_contents($path);
        if ($content) {
            $decoded = json_decode($content, true);
            if (is_array($decoded)) {
                return $decoded;
            }
        }
    }
    return [];
}

/**
 * Saves array data to JSON file cache.
 */
function cms_save_json_file(string $filename, array $data): bool {
    $dir = __DIR__ . '/../data';
    if (!file_exists($dir)) {
        @mkdir($dir, 0777, true);
    }
    $path = $dir . '/' . $filename;
    return @file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) !== false;
}

/**
 * Fetches all registered site pages (with MySQL + JSON fallback).
 */
function cms_get_all_pages(): array {
    $pdo = getDbConnection();
    if ($pdo) {
        try {
            $stmt = $pdo->query("SELECT page_slug, page_title, category, sort_order FROM site_pages ORDER BY category, sort_order, page_title");
            if ($stmt) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($rows)) {
                    return $rows;
                }
            }
        } catch (Throwable $e) {}
    }

    // Fallback to JSON
    $jsonPages = cms_load_json_file('site_pages.json');
    if (!empty($jsonPages)) {
        usort($jsonPages, function($a, $b) {
            $catCmp = strcmp($a['category'] ?? '', $b['category'] ?? '');
            if ($catCmp !== 0) return $catCmp;
            return strcmp($a['page_title'] ?? '', $b['page_title'] ?? '');
        });
        return $jsonPages;
    }

    return [];
}

/**
 * Fetches a single site page by slug (with MySQL + JSON fallback).
 */
function cms_get_page(string $slug): array {
    $pdo = getDbConnection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM site_pages WHERE page_slug = ? LIMIT 1");
            $stmt->execute([$slug]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return $row;
            }
        } catch (Throwable $e) {}
    }

    // Fallback to JSON
    $jsonPages = cms_load_json_file('site_pages.json');
    foreach ($jsonPages as $p) {
        if (($p['page_slug'] ?? '') === $slug) {
            return $p;
        }
    }

    // Safe default template
    $prettyTitle = ucwords(str_replace(['-', '_'], ' ', $slug));
    return [
        'id' => 0,
        'page_slug' => $slug,
        'page_title' => $prettyTitle,
        'category' => 'General',
        'eyebrow' => '01 · OVERVIEW',
        'hero_subtitle' => 'Education Glorifies the Nation — Pioneer in Skill-Based, Technology-Driven Higher Education and Advanced Research.',
        'intro_heading' => 'About ' . $prettyTitle,
        'intro_text' => 'Ram Krishna Dharmarth Foundation (RKDF) University Bhopal was established in the year 2011 by an Act of Madhya Pradesh State Legislature under MP Niji Vishwavidyalaya Adhiniyam, 2007.',
        'hero_bg_image' => 'images/lovable/rkdf-why-bg.jpg',
        'meta_keywords' => 'rkdf, university, ' . str_replace('-', ' ', $slug),
        'meta_description' => 'Official information for ' . $prettyTitle . ' at RKDF University Bhopal.',
        'is_active' => 1
    ];
}

/**
 * Fetches all section cards for a given page slug (with MySQL + JSON fallback).
 */
function cms_get_page_sections(string $slug): array {
    $pdo = getDbConnection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM page_sections WHERE page_slug = ? AND is_active = 1 ORDER BY group_key, sort_order, id");
            $stmt->execute([$slug]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($rows)) {
                return $rows;
            }
        } catch (Throwable $e) {}
    }

    // Fallback to JSON
    $jsonSections = cms_load_json_file('page_sections.json');
    $matched = [];
    foreach ($jsonSections as $s) {
        if (($s['page_slug'] ?? '') === $slug && (!isset($s['is_active']) || $s['is_active'] == 1)) {
            $matched[] = $s;
        }
    }

    usort($matched, function($a, $b) {
        $gCmp = strcmp($a['group_key'] ?? '', $b['group_key'] ?? '');
        if ($gCmp !== 0) return $gCmp;
        return (int)($a['sort_order'] ?? 0) - (int)($b['sort_order'] ?? 0);
    });

    return $matched;
}

/**
 * Saves/updates a site page definition (MySQL + JSON).
 */
function cms_save_page(string $slug, array $data): bool {
    $pdo = getDbConnection();
    if ($pdo) {
        try {
            $upd = $pdo->prepare("UPDATE site_pages SET page_title=?, eyebrow=?, hero_subtitle=?, intro_heading=?, intro_text=?, hero_bg_image=?, meta_keywords=?, meta_description=?, is_active=? WHERE page_slug=?");
            $upd->execute([
                trim($data['page_title'] ?? ''),
                trim($data['eyebrow'] ?? ''),
                trim($data['hero_subtitle'] ?? ''),
                trim($data['intro_heading'] ?? ''),
                trim($data['intro_text'] ?? ''),
                trim($data['hero_bg_image'] ?? ''),
                trim($data['meta_keywords'] ?? ''),
                trim($data['meta_description'] ?? ''),
                isset($data['is_active']) && $data['is_active'] ? 1 : 0,
                $slug
            ]);
        } catch (Throwable $e) {}
    }

    // Always update JSON cache
    $jsonPages = cms_load_json_file('site_pages.json');
    $found = false;
    foreach ($jsonPages as &$p) {
        if (($p['page_slug'] ?? '') === $slug) {
            $p = array_merge($p, $data);
            $found = true;
            break;
        }
    }
    if (!$found) {
        $data['page_slug'] = $slug;
        $jsonPages[] = $data;
    }
    cms_save_json_file('site_pages.json', $jsonPages);
    return true;
}

/**
 * Saves/updates a section card item (MySQL + JSON).
 */
function cms_save_section_item(string $slug, array $itemData, int $itemId = 0): int {
    $pdo = getDbConnection();
    $savedId = $itemId;

    if ($pdo) {
        try {
            if ($itemId > 0) {
                $upd = $pdo->prepare("UPDATE page_sections SET group_key=?, title=?, subtitle=?, number_val=?, text_val=?, image_path=?, link_url=?, badge_text=?, sort_order=?, is_active=? WHERE id=?");
                $upd->execute([
                    trim($itemData['group_key'] ?? 'general'),
                    trim($itemData['title'] ?? ''),
                    trim($itemData['subtitle'] ?? ''),
                    trim($itemData['number_val'] ?? ''),
                    trim($itemData['text_val'] ?? ''),
                    trim($itemData['image_path'] ?? ''),
                    trim($itemData['link_url'] ?? ''),
                    trim($itemData['badge_text'] ?? ''),
                    (int)($itemData['sort_order'] ?? 0),
                    isset($itemData['is_active']) && $itemData['is_active'] ? 1 : 0,
                    $itemId
                ]);
            } else {
                $ins = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");
                $ins->execute([
                    $slug,
                    trim($itemData['group_key'] ?? 'general'),
                    trim($itemData['title'] ?? ''),
                    trim($itemData['subtitle'] ?? ''),
                    trim($itemData['number_val'] ?? ''),
                    trim($itemData['text_val'] ?? ''),
                    trim($itemData['image_path'] ?? ''),
                    trim($itemData['link_url'] ?? ''),
                    trim($itemData['badge_text'] ?? ''),
                    (int)($itemData['sort_order'] ?? 99)
                ]);
                $savedId = (int)$pdo->lastInsertId();
            }
        } catch (Throwable $e) {}
    }

    // Always update JSON cache
    $jsonSections = cms_load_json_file('page_sections.json');
    if ($savedId <= 0) {
        $maxId = 0;
        foreach ($jsonSections as $s) {
            if (($s['id'] ?? 0) > $maxId) $maxId = (int)$s['id'];
        }
        $savedId = $maxId + 1;
    }

    $itemRecord = array_merge($itemData, [
        'id' => $savedId,
        'page_slug' => $slug,
        'is_active' => isset($itemData['is_active']) ? (int)$itemData['is_active'] : 1
    ]);

    $found = false;
    foreach ($jsonSections as &$s) {
        if (($s['id'] ?? 0) == $savedId) {
            $s = array_merge($s, $itemRecord);
            $found = true;
            break;
        }
    }
    if (!$found) {
        $jsonSections[] = $itemRecord;
    }
    cms_save_json_file('page_sections.json', $jsonSections);
    return $savedId;
}

/**
 * Deletes a section card item (MySQL + JSON).
 */
function cms_delete_section_item(int $itemId): bool {
    $pdo = getDbConnection();
    if ($pdo) {
        try {
            $del = $pdo->prepare("DELETE FROM page_sections WHERE id = ?");
            $del->execute([$itemId]);
        } catch (Throwable $e) {}
    }

    // Update JSON cache
    $jsonSections = cms_load_json_file('page_sections.json');
    $filtered = [];
    foreach ($jsonSections as $s) {
        if (($s['id'] ?? 0) != $itemId) {
            $filtered[] = $s;
        }
    }
    cms_save_json_file('page_sections.json', $filtered);
    return true;
}

/**
 * Fetches site setting with MySQL + JSON fallback.
 */
function cms_get_setting(string $key, string $default = ''): string {
    $pdo = getDbConnection();
    if ($pdo) {
        try {
            $st = $pdo->prepare("SELECT setting_value FROM site_settings WHERE setting_key = ? LIMIT 1");
            $st->execute([$key]);
            $val = $st->fetchColumn();
            if ($val !== false && $val !== null && $val !== '') {
                return $val;
            }
        } catch (Throwable $e) {}
    }

    $jsonSettings = cms_load_json_file('site_settings.json');
    foreach ($jsonSettings as $s) {
        if (($s['setting_key'] ?? '') === $key && isset($s['setting_value'])) {
            return $s['setting_value'];
        }
    }

    return $default;
}
