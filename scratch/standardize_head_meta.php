<?php
$root = realpath(__DIR__ . '/..');

$files = glob($root . '/*.php');
$updatedCount = 0;
$skippedCount = 0;

foreach ($files as $file) {
    $bn = basename($file);
    if (in_array($bn, ['page.php', 'api_search.php', 'favicon.png', 'favicon.ico'])) continue;

    $content = file_get_contents($file);
    
    // If it has <head> and doesn't already include head_meta.php
    if (stripos($content, '<head>') !== false && stripos($content, 'head_meta.php') === false) {
        $newContent = preg_replace_callback('/<head>(.*?)((?:<style|<\/head>))/is', function($matches) {
            $existingHeadInside = $matches[1];
            $followingTag = $matches[2];
            
            $customTitlePhp = '';
            if (preg_match('/<title>(.*?)<\/title>/is', $existingHeadInside, $tm)) {
                $t = trim($tm[1]);
                if ($t !== '' && stripos($t, '<?=') === false && stripos($t, '<?php') === false) {
                    $customTitlePhp = "<?php \$pageTitle = " . var_export($t, true) . "; ?>\n  ";
                }
            }

            return "<head>\n  " . $customTitlePhp . "<?php include __DIR__ . '/include/head_meta.php'; ?>\n  " . $followingTag;
        }, $content, 1);

        if ($newContent !== null && $newContent !== $content) {
            file_put_contents($file, $newContent);
            $updatedCount++;
        }
    } else {
        $skippedCount++;
    }
}

echo "Standardized head_meta across $updatedCount files. Skipped/already updated: $skippedCount\n";
