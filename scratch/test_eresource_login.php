<?php
ob_start();
include __DIR__ . '/../eresourse_login.php';
$out = ob_get_clean();

echo "HTML Output Length: " . strlen($out) . " bytes\n";
echo "Contains 'Library E-Resource Portal Login': " . (strpos($out, 'Library E-Resource Portal Login') !== false ? 'YES' : 'NO') . "\n";
echo "Contains form action 'e_resources.php': " . (strpos($out, 'e_resources.php') !== false ? 'YES' : 'NO') . "\n";
echo "Contains input 'rollno': " . (strpos($out, 'name="rollno"') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'SWAYAM': " . (strpos($out, 'SWAYAM') !== false ? 'YES' : 'NO') . "\n";
echo "Contains 'Shodhganga': " . (strpos($out, 'Shodhganga') !== false ? 'YES' : 'NO') . "\n";
