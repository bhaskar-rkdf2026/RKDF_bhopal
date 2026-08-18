<?php
foreach(['examtimetable.php', 'Exam_Time_Table.php', 'exam_timetable.php', 'Exam_Timetable.php', 'exam.php'] as $f) {
    echo $f . ': ' . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
