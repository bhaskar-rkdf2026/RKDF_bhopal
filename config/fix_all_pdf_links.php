<?php
// ============================================================
// RKDF University — PDF & Download Resource Links Fixer
// Updates all broken link_url entries in page_sections with verified valid relative paths
// ============================================================
require_once __DIR__ . '/db.php';
$pdo = getDbConnection();
$root = 'C:/xampp/htdocs/RKDF-bhopal/';

$linkFixes = [
  // Admissions category
  'Admission Notice.pdf'             => 'ADMISSION POLICY 2026-27.pdf',
  'Admission_Rules.pdf'              => 'Admission_Rules_2025-26.pdf',
  'CUET_Mapping_2026.pdf'            => 'images/06/Mapping list for CUET(UG)- 2023.pdf',
  'prospectus.pdf'                   => 'Content/Documents/Prospectus  2024-25.pdf',
  'International_Admissions.pdf'     => 'foreign_stud/index.html',
  'Bank_Account_Details.pdf'         => 'images/06/Account Details.pdf',
  'Inhouse_Scheme_Policy.pdf'        => 'Policy/Inhouse_Scheme_Policy.pdf',
  'Meritorious_Scheme_Policy.pdf'    => 'Policy/Meritorious_Scheme_Policy.pdf',
  
  // About Us category
  'Institutional Development Plan.pdf' => 'Content/Documents/Institutional Development Plan.pdf',
  'Organizational Structure.pdf'     => 'images/06/Organizational Structure.pdf',
  'Governingbody.pdf'                => 'Content/Documents/Governingbody.pdf',
  'Public Self Disclosure.pdf'       => 'Public Self Disclosure.pdf',
  
  // Academic category
  'Constituent Units.pdf'            => 'Constituent Units.pdf',
  'University_Fees_Structure.pdf'    => 'University_Fees_Structure.pdf',
  'Fees Notice.pdf'                  => 'Fees Notice.pdf',
  
  // Examination category
  'forms/Verification Form.pdf'      => 'forms/Verification Form.pdf',
  'exam/Marksheet_Correction_form.PDF' => 'exam/Marksheet_Correction_form.PDF',
  'exam/NAME CORRECTION  Form.pdf'   => 'exam/NAME CORRECTION  Form.pdf',
  'forms/Application For Hindi.pdf'   => 'forms/Application For Hindi.pdf',
  'forms/Application For English.pdf' => 'forms/Application For English.pdf',
  'images/Alumni-form.pdf'           => 'images/Alumni-form.pdf',

  // R&D Activities category
  'research/Project List.pdf'        => 'research/Project List.pdf',
  'research/Projects At a Glance.PDF' => 'research/Projects At a Glance.PDF',
  'research/R&D Presentation.pdf'    => 'research/R&D Presentation.pdf',
  'research/R&D FORMATS.rar'         => 'research/R&D FORMATS.rar',
  'research/Funding agencies for Research Projects.pdf' => 'research/Funding agencies for Research Projects.pdf',
  'research/List of Publications.pdf' => 'research/List of Publications.pdf',
  'research/List of MoU.pdf'          => 'research/List of MoU.pdf',
  'research/Conferences__Visits_and_Student_acivities.pdf' => 'research/Conferences__Visits_and_Student_acivities.pdf',
  'Content/Videos/5. Carbon capture plants-Part1.mp4' => 'Content/Videos/5. Carbon capture plants-Part1.mp4',

  // Research Section category
  'syllabus/Ph_D_Course_work__Scheme_and_Syllabus.pdf' => 'syllabus/Ph_D_Course_work__Scheme_and_Syllabus.pdf',
  'research/Research_Policy_RKDF_University.pdf' => 'research/Research_Policy_RKDF_University.pdf',
  'research/consultancy_policy.pdf'   => 'research/consultancy_policy.pdf',
  'research/Institutional_Distinctiveness.pdf' => 'research/Institutional_Distinctiveness.pdf',
  'research/Projects of Govt of India.pdf' => 'research/Projects of Govt of India.pdf',
  'research/Projects at RKDF  PPT- CSIR  Online 13 Sept-R1.pdf' => 'research/Projects at RKDF  PPT- CSIR  Online 13 Sept-R1.pdf',
  'research/Solar Integrated Carbon Capture Plant INDEX of Technical Report.pdf' => 'research/Solar Integrated Carbon Capture Plant INDEX of Technical Report.pdf',
  'research/Innovations.pdf'          => 'research/Innovations.pdf'
];

$stmtUpdate = $pdo->prepare("UPDATE page_sections SET link_url = ? WHERE link_url = ? OR link_url LIKE ?");

$fixedCount = 0;
foreach ($linkFixes as $oldUrl => $newUrl) {
    if (file_exists($root . $newUrl)) {
        $stmtUpdate->execute([$newUrl, $oldUrl, '%' . basename($oldUrl)]);
        $fixedCount++;
        echo "FIXED: '{$oldUrl}' -> '{$newUrl}' (File Exists: YES)\n";
    } else {
        echo "WARNING: File for target '{$newUrl}' not found on disk!\n";
    }
}

echo "\nFIXED {$fixedCount} RESOURCE LINKS IN DB.\n";
