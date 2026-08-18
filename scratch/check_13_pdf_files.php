<?php
$files = [
    'research/Subjects Offered for PhD.pdf',
    'research/Admissions In Ph.D Programme.pdf',
    'research/Course Work-Scheme and Syllabus.pdf',
    'research/Ph.D. Students.pdf',
    'research/Supervisors.pdf',
    'research/Research_Policy.pdf',
    'research/consultancy_policy.pdf',
    'research/Institutional_Distinctiveness.pdf',
    'research/Projects of Govt of India.pdf',
    'research/Projects at RKDF  PPT- CSIR  Online 13 Sept-R1.pdf',
    'research/Solar Integrated Carbon Capture Plant INDEX of Technical Report.pdf',
    'research/Innovations.pdf'
];

foreach ($files as $f) {
    echo $f . " => " . (file_exists(__DIR__ . '/../' . $f) ? 'YES' : 'NO') . "\n";
}
