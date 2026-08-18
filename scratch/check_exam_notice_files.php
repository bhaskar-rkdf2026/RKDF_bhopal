<?php
foreach(['Exam_Notice.php', 'exam_notice.php', 'Notice.php', 'notice.php', 'Notice_Board.php', 'examination.php', 'Exam_Time_Table.php', 'exam_timetable.php'] as $f) {
    echo $f . ': ' . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
