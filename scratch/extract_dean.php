<?php
$file = 'C:/Users/Synergytop/.gemini/antigravity-ide/brain/32901b28-3cda-4af5-824f-e70e8c94751b/.system_generated/steps/211/content.md';
$c = file_get_contents($file);

if (preg_match('/<section id="contentLeft".*?<\/section>/s', $c, $m)) {
    echo "FOUND CONTENT:\n";
    echo $m[0];
} else {
    echo "Searching for Dean...\n";
    $pos = strpos($c, 'Dean');
    if ($pos !== false) {
        echo substr($c, max(0, $pos - 200), 4000);
    } else {
        echo "Dean not found in content.md";
    }
}
