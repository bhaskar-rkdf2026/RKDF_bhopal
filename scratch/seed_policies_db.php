<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

$pageSlug = 'policies';
$introText = "RKDF University Bhopal operates under robust statutory policies, governance regulations, and quality assurance frameworks approved by the Board of Management and Academic Council.\n\nBrowse and download official university policies, statutory committee guidelines, ethical codes of conduct, and accessibility standards below.";

// 1. Update/Insert site_pages for policies
$stmtCheck = $pdo->prepare("SELECT id FROM site_pages WHERE page_slug = ?");
$stmtCheck->execute([$pageSlug]);
if ($stmtCheck->fetch()) {
    $updateStmt = $pdo->prepare("UPDATE site_pages SET 
        page_title = ?, category = ?, eyebrow = ?, hero_subtitle = ?, hero_bg_image = ?, intro_heading = ?, intro_text = ?, is_active = 1 WHERE page_slug = ?");
    $updateStmt->execute([
        'University Policies & Statutory Regulations',
        'About Us',
        'STATUTORY GOVERNANCE · POLICIES & CODES',
        'Official statutory policies, IT policy, research guidelines, ethics codes, anti-ragging rules, and accessibility standards.',
        'images/lovable/rkdf-why-bg.jpg',
        'Institutional Policies & Governance Framework',
        $introText,
        $pageSlug
    ]);
} else {
    $insStmt = $pdo->prepare("INSERT INTO site_pages (page_slug, page_title, category, eyebrow, hero_subtitle, hero_bg_image, intro_heading, intro_text, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)");
    $insStmt->execute([
        $pageSlug,
        'University Policies & Statutory Regulations',
        'About Us',
        'STATUTORY GOVERNANCE · POLICIES & CODES',
        'Official statutory policies, IT policy, research guidelines, ethics codes, anti-ragging rules, and accessibility standards.',
        'images/lovable/rkdf-why-bg.jpg',
        'Institutional Policies & Governance Framework',
        $introText
    ]);
}

// 2. Clear old page_sections for policies
$pdo->prepare("DELETE FROM page_sections WHERE page_slug = ?")->execute([$pageSlug]);

$insSec = $pdo->prepare("INSERT INTO page_sections (page_slug, group_key, title, subtitle, number_val, text_val, image_path, link_url, badge_text, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");

$policyList = [
    // Governance & Strategy
    ['group' => 'Institutional Governance & Planning', 'title' => 'University Strategic Plan Document', 'sub' => 'Planning Board', 'badge' => 'STRATEGIC PLAN PDF', 'link' => 'Policy/strategic_plan.pdf', 'text' => 'Long-term strategic roadmap for academic expansion, infrastructure, and research development.'],
    ['group' => 'Institutional Governance & Planning', 'title' => 'Research Governance Policy', 'sub' => 'Directorate of Research', 'badge' => 'RESEARCH POLICY PDF', 'link' => 'research/Research_Policy_RKDF_University.pdf', 'text' => 'Official research governance framework, intramural grants, publication incentives, and ethical guidelines.'],
    ['group' => 'Institutional Governance & Planning', 'title' => 'IT Infrastructure & Digital Security Policy', 'sub' => 'IT Services Cell', 'badge' => 'IT POLICY PDF', 'link' => 'Policy/IT_policy.pdf', 'text' => 'Guidelines governing campus network security, digital identity, server usage, and cybersecurity.'],
    ['group' => 'Institutional Governance & Planning', 'title' => 'Industrial Consultancy & Testing Policy', 'sub' => 'Consultancy Cell', 'badge' => 'CONSULTANCY PDF', 'link' => 'research/consultancy_policy.pdf', 'text' => 'Policy governing corporate testing services, technical consultancy, and revenue sharing.'],
    ['group' => 'Institutional Governance & Planning', 'title' => 'Human Resource (HR) Policy & Service Rules', 'sub' => 'Administration & HR', 'badge' => 'HR POLICY PDF', 'link' => 'Policy/HR_Policy.pdf', 'text' => 'Statutory service rules, faculty recruitment, leave policies, and employment terms.'],

    // Ethics & Conduct
    ['group' => 'Student & Staff Conduct & Welfare', 'title' => 'Anti-Ragging Policy & Statutory Committee', 'sub' => 'Proctorial Board', 'badge' => 'ANTI-RAGGING PDF', 'link' => 'images/06/antiragging/antiragging_form.pdf', 'text' => 'UGC mandated anti-ragging regulations, anti-ragging cell contacts, and affidavit forms.'],
    ['group' => 'Student & Staff Conduct & Welfare', 'title' => 'Code of Ethics for Teachers & Students', 'sub' => 'Ethics Committee', 'badge' => 'CODE OF ETHICS PDF', 'link' => 'Policy/Code_of_ethics_Policy.pdf', 'text' => 'Professional ethics, academic integrity rules, and conduct standards for faculty and scholars.'],
    ['group' => 'Student & Staff Conduct & Welfare', 'title' => 'Policy for Student Grievance Redressal (SGRC)', 'sub' => 'SGRC Committee', 'badge' => 'STUDENT GRIEVANCE PDF', 'link' => 'images/06/Student Grievance Redressal Committee (SGRC)- 2022.pdf', 'text' => 'Statutory student grievance redressal committee framework and online portal.'],
    ['group' => 'Student & Staff Conduct & Welfare', 'title' => 'Policy for Employee & Women Grievance Redressal', 'sub' => 'Internal Complaints Committee (ICC)', 'badge' => 'EMPLOYEE GRIEVANCE PDF', 'link' => 'images/06/Woman_Grievance_Cell.pdf', 'text' => 'Internal complaints committee policy for gender sensitization and workplace safety.'],
    ['group' => 'Student & Staff Conduct & Welfare', 'title' => 'Students Code of Conduct', 'sub' => 'Dean Students Welfare', 'badge' => 'CODE OF CONDUCT PDF', 'link' => 'Policy/students code of conduct.pdf', 'text' => 'Campus discipline guidelines, attendance norms, and student rights.'],

    // Human Values & Ethics
    ['group' => 'Human Values & Professional Ethics', 'title' => 'Handbook for Human Values & Professional Ethics', 'sub' => 'Value Education Cell', 'badge' => 'HANDBOOK PDF', 'link' => 'Policy/Handbook_for_Human_values_and_Professional_Ethics.pdf', 'text' => 'Comprehensive handbook promoting moral values, social responsibility, and professional ethics.'],
    ['group' => 'Human Values & Professional Ethics', 'title' => 'Manual for Human Values & Professional Ethics', 'sub' => 'Value Education Cell', 'badge' => 'MANUAL PDF', 'link' => 'Policy/Manual_Human_Value_Manual.pdf', 'text' => 'Operational manual for conducting human value courses and workshops.'],
    ['group' => 'Human Values & Professional Ethics', 'title' => 'Brochure on Human Values & Ethics Programs', 'sub' => 'Value Education Cell', 'badge' => 'BROCHURE PDF', 'link' => 'Policy/Brochures_on_Human_Value_and_Professional_Ethics.pdf', 'text' => 'Informational brochure on value-added courses and community extension drives.'],

    // Inclusivity, Sustainability & Accessibility
    ['group' => 'Inclusivity, Accessibility & Environment', 'title' => 'Divyangjan-Friendly Policy & Accessibility Standards', 'sub' => 'Equal Opportunity Cell', 'badge' => 'DIVYANGJAN POLICY PDF', 'link' => 'Policy/Divyangjan_friendly policy.pdf', 'text' => 'Barrier-free campus infrastructure, tactile pathways, ramp access, braille library books, and assistive technology for specially-abled students.', 'id_anchor' => 'accessibility'],
    ['group' => 'Inclusivity, Accessibility & Environment', 'title' => 'Green Campus & Environmental Sustainability Policy', 'sub' => 'Green Campus Committee', 'badge' => 'GREEN CAMPUS PDF', 'link' => 'Policy/Green Campus policy.pdf', 'text' => 'Campus solar power initiatives, rainwater harvesting, tree plantation, and carbon reduction.'],
    ['group' => 'Inclusivity, Accessibility & Environment', 'title' => 'Single-Use Plastic Ban Policy', 'sub' => 'Environmental Cell', 'badge' => 'PLASTIC BAN PDF', 'link' => 'Policy/Single use plastic ban policy.pdf', 'text' => 'Strict campus ban policy on single-use plastics and waste management guidelines.'],

    // Scholarships & Concessions
    ['group' => 'Scholarships & Welfare Schemes', 'title' => 'In-House Student Concession Scheme Policy', 'sub' => 'Scholarship Cell', 'badge' => 'INHOUSE POLICY PDF', 'link' => 'Policy/Inhouse_Scheme_Policy.pdf', 'text' => 'Fee concession scheme for staff wards, alumni siblings, and continuing scholars.'],
    ['group' => 'Scholarships & Welfare Schemes', 'title' => 'Savitribai Phule Girls Scholarship Policy', 'sub' => 'Welfare Board', 'badge' => 'SAVITRIBAI PHULE PDF', 'link' => 'Policy/Savitribai_Phule_Scholarship_Policy.pdf', 'text' => 'Special scholarship scheme promoting higher education for girl students.'],
    ['group' => 'Scholarships & Welfare Schemes', 'title' => 'Meritorious Student Scholarship Policy', 'sub' => 'Merit Board', 'badge' => 'MERIT SCHEME PDF', 'link' => 'Policy/Meritorious_Scheme_Policy.pdf', 'text' => 'Merit-based tuition fee scholarship policy for board and entrance test rankers.'],
    ['group' => 'Scholarships & Welfare Schemes', 'title' => 'Staff & Student Welfare Policy', 'sub' => 'Welfare Committee', 'badge' => 'WELFARE POLICY PDF', 'link' => 'Policy/Welfare_Policy.pdf', 'text' => 'Welfare schemes, medical aid, and financial support for staff and students.'],
    ['group' => 'Scholarships & Welfare Schemes', 'title' => 'Infrastructure & Lab Maintenance Policy', 'sub' => 'Maintenance Cell', 'badge' => 'MAINTENANCE PDF', 'link' => 'Policy/maintenance_policy.pdf', 'text' => 'Guidelines governing campus lab equipment maintenance and physical facility upkeep.']
];

$order = 1;
foreach ($policyList as $p) {
    $insSec->execute([
        $pageSlug,
        $p['group'],
        $p['title'],
        $p['sub'],
        (string)$order,
        $p['text'],
        'images/lovable/rkdf-why-bg.jpg',
        $p['link'],
        $p['badge'],
        $order
    ]);
    $order++;
}

echo "Seeded policies page in CMS DB with " . count($policyList) . " policies and accessibility anchor!\n";
