<?php
foreach(['staff.php', 'staffL.php', 'faculty.php', 'Staff.php', 'dean.php', 'hod.php', 'other-officers.php'] as $f) {
    echo $f . ': ' . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
