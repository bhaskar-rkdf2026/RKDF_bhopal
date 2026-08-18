<?php
$file = 'C:/Users/Synergytop/.gemini/antigravity-ide/brain/32901b28-3cda-4af5-824f-e70e8c94751b/.system_generated/steps/383/content.md';
$c = file_get_contents($file);

if (preg_match('/<section id="contentLeft".*?<\/section>/s', $c, $m)) {
    echo "FOUND CONTENT:\n";
    echo $m[0];
} else {
    echo "Searching for BOS...\n";
    $pos = strpos($c, 'Board');
    if ($pos !== false) {
        echo substr($c, max(0, $pos - 200), 5000);
    } else {
        echo "Board not found in content.md";
    }
}
