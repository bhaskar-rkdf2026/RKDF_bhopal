<?php
// ============================================================
// RKDF University — Dynamic Subpage Router
// Maps all URLs and page slugs to exact standalone files or CMS subpage_template.php
// ============================================================
require_once __DIR__ . '/include/mysql_compat.php';
$pageKey = $_GET['slug'] ?? 'about';

$standaloneMap = [
    'about'                => __DIR__ . '/about.php',
    'pro-chancellor'       => __DIR__ . '/ProChancellor.php',
    'chancellor'           => __DIR__ . '/Chancellor.php',
    'vc-desk'              => __DIR__ . '/Vice-Chancellor-Desk.php',
    'scholarship'          => __DIR__ . '/scholarship.php',
    'dgm'                  => __DIR__ . '/dgm.php',
    'dgr'                  => __DIR__ . '/dgr.php',
    'registrar'            => __DIR__ . '/Registrar.php',
    'other-officers'       => __DIR__ . '/other-officers.php',
    'dean'                 => __DIR__ . '/dean.php',
    'hod'                  => __DIR__ . '/hod.php',
    'bom'                  => __DIR__ . '/BoM.php',
    'governing-body'       => __DIR__ . '/Governingbody.php',
    'governingbody'        => __DIR__ . '/Governingbody.php',
    'academic-council'     => __DIR__ . '/Academic_Council.php',
    'bos'                  => __DIR__ . '/BOS.php',
    'national-advisory'    => __DIR__ . '/Statuary-Bodies.php',
    'local-advisory'       => __DIR__ . '/localadvisory.php',
    'eresource-login'      => __DIR__ . '/eresourse_login.php',
    'staff'                => __DIR__ . '/staffLnew.php',
    'lms'                  => __DIR__ . '/LMS.php',
    'exam-notice'          => __DIR__ . '/Exam_Notice.php',
    'exam-timetable'       => __DIR__ . '/examtimetable.php',
    'result'               => __DIR__ . '/Result.php',
    'results'              => __DIR__ . '/Result.php',
    'verification-form'    => __DIR__ . '/Verification_Form.php',
    'marksheet-form'       => __DIR__ . '/Marksheet_Form.php',
    'name-correction-form' => __DIR__ . '/Name_Correction_Form.php',
    'migration-hindi'      => __DIR__ . '/Migration_Hindi.php',
    'migration-english'    => __DIR__ . '/Migration_English.php',
    'migration-form'       => __DIR__ . '/Migration_English.php',
    'alumni-form'          => __DIR__ . '/Alumni_Form.php',
    'alumni'               => __DIR__ . '/alumni.php',
    't&p'                  => __DIR__ . '/t&p.php',
    'tnp'                  => __DIR__ . '/t&p.php',
    'placement'            => __DIR__ . '/t&p.php',
    'placements'           => __DIR__ . '/t&p.php',
    'training-placement'   => __DIR__ . '/t&p.php',
    't-and-p'              => __DIR__ . '/t&p.php',
    'careers'              => __DIR__ . '/Careers.php',
    'career'               => __DIR__ . '/Careers.php',
    'policies'             => __DIR__ . '/policies.php',
    'accessibility'        => __DIR__ . '/policies.php',
    'terms&condition'      => __DIR__ . '/terms&condition.php',
    'terms-and-conditions' => __DIR__ . '/terms&condition.php',
    'terms'                => __DIR__ . '/terms&condition.php',
    'terms-condition'      => __DIR__ . '/terms&condition.php',
    'privacy'              => __DIR__ . '/privacy.php',
    'privacy-policy'       => __DIR__ . '/privacy.php',
    'contact-us'           => __DIR__ . '/contact-us.php',
    'contact'              => __DIR__ . '/contact-us.php',
    'search'               => __DIR__ . '/search.php',
    'Contact_Us'           => __DIR__ . '/contact-us.php',
    'student-portal'       => __DIR__ . '/Student_Portal.php',
    'rnd-projects'         => __DIR__ . '/RnD_Projects.php',
    'rnd-glance'           => __DIR__ . '/RnD_Projects.php',
    'journals'             => __DIR__ . '/journals.php',
    'patents'              => __DIR__ . '/patent.php',
    'patent'               => __DIR__ . '/patent.php',
    'conferences'          => __DIR__ . '/Confrence-Seminar.php',
    'rnd-videos'           => __DIR__ . '/videogallery.php',
    'phd-subjects'         => __DIR__ . '/phdsubjects.php',
    'phd-admission'        => __DIR__ . '/phd_entrance.php',
    'phd-syllabus'         => __DIR__ . '/phdsyllabus.php',
    'phd-students'         => __DIR__ . '/phdstudent.php',
    'phd-admissions-2026'  => __DIR__ . '/phd_entrance.php',
    'supervisors'          => __DIR__ . '/supervisors01.php',
    'research-policy'      => __DIR__ . '/policies.php',
    'consultancy-policy'   => __DIR__ . '/policies.php',
    'institutional-distinctiveness' => __DIR__ . '/Mission.php',
    'admission-notice'     => __DIR__ . '/admission.php',
    'academic-departments' => __DIR__ . '/academic&departments.php',
    'bank-details'         => __DIR__ . '/Bank-And-ATM.php',
    'campus-facility'      => __DIR__ . '/Campus.php',
    'incubation'           => __DIR__ . '/r&d.php'
];

if (isset($standaloneMap[$pageKey]) && file_exists($standaloneMap[$pageKey])) {
    require_once $standaloneMap[$pageKey];
    exit;
}

require_once __DIR__ . '/include/subpage_template.php';
