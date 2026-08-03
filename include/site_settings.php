<?php
// include/site_settings.php
// Global site settings loader for RKDF University Website

require_once __DIR__ . '/../config/db.php';

$siteSettings = [
    'site_title' => 'RKDF University Bhopal',
    'contact_phone' => '+91-755-2740395',
    'contact_email' => 'info@rkdf.ac.in',
    'admission_email' => 'admission@rkdf.ac.in',
    'admission_year' => '2026-27',
    'admission_status' => 'OPEN',
    'erp_portal_url' => 'https://erplive.rkdf.ac.in',
    'prospectus_pdf' => 'Content/Documents/Prospectus  2024-25.pdf',
    'fee_structure_pdf' => 'University_Fees_Structure.pdf',
    'admission_policy_pdf' => 'ADMISSION POLICY 2026-27.pdf',
    'ticker_text' => 'Admissions Open 2026-27 for B.Tech, MBA, B.Pharm, Ph.D and Nursing Programs!',
    'footer_address' => 'RKDF University, Airport Bypass Road, Gandhi Nagar, Bhopal, Madhya Pradesh 462033',
    'copyright_text' => '© ' . date('Y') . ' RKDF University Bhopal. All rights reserved.'
];

try {
    $pdo = getDbConnection();
    $stmt = $pdo->query("SELECT setting_key, setting_value FROM site_settings");
    while ($row = $stmt->fetch()) {
        if (!empty($row['setting_key'])) {
            $siteSettings[$row['setting_key']] = $row['setting_value'];
        }
    }
} catch (Exception $e) {
    // Fallback gracefully to defaults if DB query fails
}

/**
 * Get site setting value by key with fallback
 * @param string $key Setting key name
 * @param string $default Fallback default value
 * @return string
 */
function get_site_setting(string $key, string $default = ''): string {
    global $siteSettings;
    return $siteSettings[$key] ?? $default;
}
