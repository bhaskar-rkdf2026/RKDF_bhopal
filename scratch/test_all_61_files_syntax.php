<?php
$files = [
  'admission23data.php',
  'admission_success_details.php',
  'admissionquery.php',
  'bhmsreg.php',
  'card.php',
  'diplomaAG.php',
  'e_resources-org.php',
  'gatepass/display.php',
  'gatepass/gatepass.php',
  'hmlogin.php',
  'hmlogin23.php',
  'login.php',
  'marksheetnew.php',
  'megamindss_data.php',
  'megamindss_reg.php',
  'megamindss_ypdata.php',
  'megamindss_ypreg.php',
  'phdadmitcard.php',
  'phdent_login.php',
  'phdresult.php',
  'result_2016/ayurved.php',
  'result_2016/bed2014.php',
  'result_2016/bed_login2.php',
  'result_2016/dca-07-Sept-24.php',
  'result_2016/dca-24-Sept-2022.php',
  'result_2016/dca.php',
  'result_2016/dca_login.php',
  'result_2016/diplomaAG-07-May-2024.php',
  'result_2016/diplomaAG.php',
  'result_2016/diploma_login.php',
  'result_2016/firesafety_login.php',
  'result_2016/firesafetymarks.php',
  'result_2016/indusrial_login.php',
  'result_2016/industrialmarks.php',
  'result_2016/insert.php',
  'result_2016/login.php',
  'result_2016/login2.php',
  'result_2016/loginAy.php',
  'result_2016/marksheetback.php',
  'result_2016/marksheetnew.php',
  'result_2016/med2014.php',
  'result_2016/med_login2.php',
  'result_2016/pgdca.php',
  'result_2016/pgdca_1stsem.php',
  'result_2016/pgdca_login.php',
  'result_2016/pgdca_login2.php',
  'result_2016/pgdcautd-24-Sept-2022.php',
  'result_2016/pgdcautd.php',
  'result_2016/pgdcautd_login.php',
  'rkdf_admission_enquirydetails.php',
  'rkdf_payment_details.php',
  'samagam_data.php',
  'samagam_reg.php',
  'test_payment.php',
  'ugccomnt.php',
  'ugcprofarma.php',
  'yrcoment.php'
];

$root = realpath(__DIR__ . '/..');
$errors = 0;

foreach ($files as $rel) {
    $full = $root . '/' . $rel;
    if (file_exists($full)) {
        exec("C:\\xampp\\php\\php.exe -l " . escapeshellarg($full), $output, $returnCode);
        if ($returnCode !== 0) {
            echo "[SYNTAX ERROR] " . $rel . "\n";
            $errors++;
        }
    }
}

if ($errors === 0) {
    echo "ALL " . count($files) . " FILES PASSED SYNTAX CHECK WITH ZERO ERRORS!\n";
} else {
    echo "Total Syntax Errors: {$errors}\n";
}
