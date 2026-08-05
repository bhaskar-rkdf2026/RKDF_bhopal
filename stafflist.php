<?php
// ============================================================
// RKDF University — Academic Faculty & Research Staff Directory
// World-Class Premium Design + High-Res Media Assets + 100% Complete Staff Dataset & Pagination Preserved
// ============================================================
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';

// --- Data Source: Complete Academic Faculty & Research Staff Directory ---
$allRecords = array(
    array('name' => '1', 'designation' => 'Dr. Virendra Singh Chaudhary', 'subject_discipline' => 'Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR VIRENDRA CHAUDHARY.pdf'),
    array('name' => '2', 'designation' => 'Dr. Virendra Kumar Patel', 'subject_discipline' => 'Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR VIRENDRA KUMAR PATEL.pdf'),
    array('name' => '3', 'designation' => 'Dr. Vandana Chaturvedi', 'subject_discipline' => 'Professor', 'Discipline' => 'Education', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR VANDANA CHATURVEDI.pdf'),
    array('name' => '4', 'designation' => 'Dr. V. K. Pandey', 'subject_discipline' => 'Professor', 'Discipline' => 'Botany', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR. V K PANDEY.pdf'),
    array('name' => '5', 'designation' => 'Dr. Sunil Patil', 'subject_discipline' => 'Professor', 'Discipline' => 'Computer Science and Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR SUNIL PATIL.pdf'),
    array('name' => '6', 'designation' => 'Dr. Suchi Singh', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Agriculture', 'profile_pdf' => ''),
    array('name' => '7', 'designation' => 'Dr. Sonal Singh', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Management', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR SONAL SINGH.pdf'),
    array('name' => '8', 'designation' => 'Dr. Satendra Singh Thakur', 'subject_discipline' => 'Professor', 'Discipline' => 'Management', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR SATENDRA SINGH THAKUR.pdf'),
    array('name' => '9', 'designation' => 'Dr. Sarita B. Malviya', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Law', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR SARITA MALVIYA.pdf'),
    array('name' => '10', 'designation' => 'Dr. Santram Lodhi', 'subject_discipline' => 'Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR SANTRAM LODHI.pdf'),
    array('name' => '11', 'designation' => 'Dr. Sanjay Jain', 'subject_discipline' => 'Professor', 'Discipline' => 'Electrical Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR SANJAY JAIN.pdf'),
    array('name' => '12', 'designation' => 'Dr. Sandeep Sahu', 'subject_discipline' => 'Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR SANDEEP SAHU.pdf'),
    array('name' => '13', 'designation' => 'Dr. Sachin Bandewar', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR SACHIN BANDEBAR.pdf'),
    array('name' => '14', 'designation' => 'Dr. Ritesh Sadiwala', 'subject_discipline' => 'Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR. RITESH SADIWALA.pdf'),
    array('name' => '15', 'designation' => 'Dr. Rimpa Manna', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Microbiology', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR RIMPA MANNA.pdf'),
    array('name' => '16', 'designation' => 'Dr. Richa Ankush Pathe', 'subject_discipline' => 'Professor', 'Discipline' => 'Architecture', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR RICHA ANKUSH PATHE.pdf'),
    array('name' => '17', 'designation' => 'Dr. Rekha Nayak', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Education', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR. REKHA NAYAK.pdf'),
    array('name' => '18', 'designation' => 'Dr. Rekha Bhadrasen', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Art', 'profile_pdf' => ''),
    array('name' => '19', 'designation' => 'Dr. Ratnesh Kumar Jain', 'subject_discipline' => 'Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR RATNESH KUMAR JAIN.pdf'),
    array('name' => '20', 'designation' => 'Dr. Rakesh Singh', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR RAKESH SINGH.pdf'),
    array('name' => '21', 'designation' => 'Dr. Rakesh Kumar', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'History', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR. RAKESH KUMAR.pdf'),
    array('name' => '22', 'designation' => 'Dr. R. K. Sharma', 'subject_discipline' => 'Professor', 'Discipline' => 'Homeopathy', 'profile_pdf' => ''),
    array('name' => '23', 'designation' => 'Dr. Punit Singh', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR PUNIT SINGH.pdf'),
    array('name' => '24', 'designation' => 'Dr. Puneet Dwivedi', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Computer Science and Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR PUNEET DWIVEDI.pdf'),
    array('name' => '25', 'designation' => 'Dr. Pratyush Tripathi', 'subject_discipline' => 'Professor', 'Discipline' => 'Management', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR PRATYUSH TRIPATHI.pdf'),
    array('name' => '26', 'designation' => 'Dr. Pradeep Adlak', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR PRADEEP ADLAK.pdf'),
    array('name' => '27', 'designation' => 'Dr. Papiya Bigonia', 'subject_discipline' => 'Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR PAPIYA BIGONIA.pdf'),
    array('name' => '28', 'designation' => 'Dr. Nilesh Verma', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Law', 'profile_pdf' => ''),
    array('name' => '29', 'designation' => 'Dr. Neha Jain', 'subject_discipline' => 'Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR NEHA JAIN.pdf'),
    array('name' => '30', 'designation' => 'Dr. N. K. Shrivastava', 'subject_discipline' => 'Professor', 'Discipline' => 'Commerce', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR N K SHRIVASTAVA.pdf'),
    array('name' => '31', 'designation' => 'Dr. Minni Walia', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Library and Information Science', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR. MINNI WALIYA.pdf'),
    array('name' => '32', 'designation' => 'Dr. Meenakshi Samartha', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Zoology', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR MEENAKSHHI SAMARTHA.pdf'),
    array('name' => '33', 'designation' => 'Dr. Manish Gangil', 'subject_discipline' => 'Professor', 'Discipline' => 'Mechanical Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR MANISH GANGIL.pdf'),
    array('name' => '34', 'designation' => 'Dr. M.S. Pawar', 'subject_discipline' => 'Professor', 'Discipline' => 'Education', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR M S PAWAR.pdf'),
    array('name' => '35', 'designation' => 'Dr. Kuldeep Pandey', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR KULDEEP PANDEY.pdf'),
    array('name' => '36', 'designation' => 'Dr. Huda Khan', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Chemistry', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR. HUDA BEGAM.pdf'),
    array('name' => '37', 'designation' => 'Dr. Huda Faiz', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Sociology/Social Work', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR HUDA FAIZ.pdf'),
    array('name' => '38', 'designation' => 'Dr. Gagan Sharma', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Computer Science and Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR GAGAN SHARMA.pdf'),
    array('name' => '39', 'designation' => 'Dr. Firdosh Khan', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'English Literature', 'profile_pdf' => ''),
    array('name' => '40', 'designation' => 'Dr. Devendra Kumar Bhopte', 'subject_discipline' => 'Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR DEVENDRA KUMAR BHOPTE.pdf'),
    array('name' => '41', 'designation' => 'Dr. Chirag Gupta', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Electrical Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR CHIRAG GUPTA.pdf'),
    array('name' => '42', 'designation' => 'Dr. C. B. S. Dangi', 'subject_discipline' => 'Professor', 'Discipline' => 'Biotechnology', 'profile_pdf' => ''),
    array('name' => '43', 'designation' => 'Dr. Brajendra Tiwari', 'subject_discipline' => 'Professor', 'Discipline' => 'Mathematics', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR BRAJENDRA TIWARI.pdf'),
    array('name' => '44', 'designation' => 'Dr. Bharti Sahu', 'subject_discipline' => 'Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR BHARTI SAHU.pdf'),
    array('name' => '45', 'designation' => 'Dr. Balprada Shrivastava', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Hindi', 'profile_pdf' => 'Content/Documents/Research_Supervisors/Dr BALPRADA SHRIVASTAVA.pdf'),
    array('name' => '46', 'designation' => 'Dr. Balajee Sharma', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR BALAJEE SHARMA.pdf'),
    array('name' => '47', 'designation' => 'Dr. Ashvini Joshi', 'subject_discipline' => 'Professor', 'Discipline' => 'English Literature', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR ASHVINI JOSHI.pdf'),
    array('name' => '48', 'designation' => 'Dr. Arvind Gwatiya', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Mechanical Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR ARVIND GWATIYA.pdf'),
    array('name' => '49', 'designation' => 'Dr. Arun Kumar Patel', 'subject_discipline' => 'Professor', 'Discipline' => 'Civil Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR ARUN KUMAR PATEL.pdf'),
    array('name' => '50', 'designation' => 'Dr. Arpit Bhargava', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Biotechnology', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR ARPIT BHARGAVA.pdf'),
    array('name' => '51', 'designation' => 'Dr. Anshuma Upadhyay', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Law', 'profile_pdf' => ''),
    array('name' => '52', 'designation' => 'Dr. Anoop Choudhary', 'subject_discipline' => 'Professor', 'Discipline' => 'Homeopathy', 'profile_pdf' => ''),
    array('name' => '53', 'designation' => 'Dr. Ankush Shrivastava', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Computer Science and Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR ANKUSH SHRIVASTAVA.pdf'),
    array('name' => '54', 'designation' => 'Dr. Amitesh Kuamr Paul', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Mechanical Engineering', 'profile_pdf' => ''),
    array('name' => '55', 'designation' => 'Dr. Amit Sharma', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Mechanical Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR AMIT SHARMA.pdf'),
    array('name' => '56', 'designation' => 'Dr. Ambresh Patel', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR AMBRESH PATEL.pdf'),
    array('name' => '57', 'designation' => 'Dr. Akant Kumar Raghuwanshi', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR AKANT RAGHUWANSHI.pdf'),
    array('name' => '58', 'designation' => 'Dr. Ajay Kumar Barapatre', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR AJAY KUMAR BARAPATRE.pdf'),
    array('name' => '59', 'designation' => 'Dr. Abhishek Kumar', 'subject_discipline' => 'Associate Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR ABHISHEK KUMAR.pdf'),
    array('name' => '60', 'designation' => 'Dr. Abhishek Dwivedi', 'subject_discipline' => 'Professor', 'Discipline' => 'Pharmaceutical Sciences', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR ABHISHEK DWIVEDI.pdf'),
    array('name' => '61', 'designation' => 'Dr. Abhimanyu Kumar', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Electrical Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR ABHIMANYU KUMAR.pdf'),
    array('name' => '62', 'designation' => 'Dr. A. C. Nayak', 'subject_discipline' => 'Professor', 'Discipline' => 'Physics', 'profile_pdf' => 'Content/Documents/Research_Supervisors/A C NAYAK.pdf'),
    array('name' => '63', 'designation' => 'Rashmi Dwivedi', 'subject_discipline' => 'Professor', 'Discipline' => 'Mechanical Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR RASHMI DWIVEDI.pdf'),
    array('name' => '64', 'designation' => 'Hemant Rajoriya', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR HEMANT RAJORIYA.pdf'),
    array('name' => '65', 'designation' => 'DR. AMRENDRA PRATAP YADAV', 'subject_discipline' => 'PROFESSOR', 'Discipline' => 'PHARMACEUTICAL SCIENCE', 'profile_pdf' => ''),
    array('name' => '66', 'designation' => 'DR. ASHEESH KUMAR BAJPAI', 'subject_discipline' => 'PROFESSOR', 'Discipline' => 'EDUCATION', 'profile_pdf' => ''),
    array('name' => '67', 'designation' => 'DR. MOHAN LAL KORI', 'subject_discipline' => 'PROFESSOR', 'Discipline' => 'PHARMACEUTICAL SCIENCE', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR M L KORI.pdf'),
    array('name' => '68', 'designation' => 'Dr. Sohail Bux', 'subject_discipline' => 'Professor', 'Discipline' => 'Mechanical Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR SOHAIL BUX.pdf'),
    array('name' => '69', 'designation' => 'DR. SHIV SINGH BASEDIYA', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Agriculture', 'profile_pdf' => 'Content/Documents/Research_Supervisors/Dr. SHIV SINGH VASEDIYA.pdf'),
    array('name' => '70', 'designation' => 'Dr. Yogesh Mishra', 'subject_discipline' => 'Assistant Professor', 'Discipline' => 'Electronics and Communication Engineering', 'profile_pdf' => 'Content/Documents/Research_Supervisors/DR YOGESH MISHRA.pdf')
);

$recordsPerPage = 10;
$totalRecords = count($allRecords);
$totalPages = ceil($totalRecords / $recordsPerPage);

$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
$currentPage = max(1, min($currentPage, $totalPages));
$startIndex = ($currentPage - 1) * $recordsPerPage;
$currentRecords = array_slice($allRecords, $startIndex, $recordsPerPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faculty &amp; Staff Directory — RKDF University Bhopal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/rkdf-home.css">
  <link rel="stylesheet" href="css/rkdf-navbar.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/ai_stafflist/rkdf_staff_banner.jpg') center/cover no-repeat;
      color: #FAF9F5;
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }

    .sstaff-main-section {
      padding: 80px 0 100px;
      background: #FAF9F5;
      color: #0C1424;
    }

    .sstaff-grid-layout {
      display: grid;
      grid-template-columns: 8.5fr 3.5fr;
      gap: 48px;
      align-items: start;
    }
    @media (max-width: 992px) {
      .sstaff-grid-layout { grid-template-columns: 1fr; }
    }

    .sstaff-block-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
      margin-bottom: 36px;
      transition: transform 0.35s ease, box-shadow 0.35s ease;
    }
    .sstaff-block-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(12, 20, 36, 0.08);
    }

    .sstaff-card-header {
      background: #0C1424;
      color: #ffffff;
      padding: 24px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #C5A059;
    }

    .sstaff-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.15em;
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(197, 160, 89, 0.18);
      color: #C5A059;
      border: 1px solid rgba(197, 160, 89, 0.3);
    }

    .sstaff-card-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    .sstaff-card-body {
      padding: 32px 36px;
    }

    /* Table Styling */
    .sstaff-table-wrapper {
      width: 100%;
      overflow-x: auto;
      border-radius: 14px;
      border: 1px solid rgba(12, 20, 36, 0.08);
      margin-bottom: 24px;
    }

    .sstaff-table {
      width: 100%;
      border-collapse: collapse;
      background: #ffffff;
      text-align: left;
    }

    .sstaff-table th {
      background: #0C1424;
      color: #ffffff;
      padding: 16px 20px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12.5px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
    }

    .sstaff-table td {
      padding: 16px 20px;
      border-bottom: 1px solid rgba(12, 20, 36, 0.06);
      font-size: 14.5px;
      color: #334155;
    }

    .sstaff-table tr:hover td {
      background: rgba(197, 160, 89, 0.04);
    }

    .sstaff-pdf-link {
      font-size: 12px;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: #E31B23;
      text-decoration: none;
      padding: 6px 12px;
      border-radius: 6px;
      background: rgba(227, 27, 35, 0.08);
      border: 1px solid rgba(227, 27, 35, 0.2);
      transition: all 0.2s ease;
      white-space: nowrap;
    }
    .sstaff-pdf-link:hover {
      background: #E31B23;
      color: #ffffff !important;
    }

    /* Pagination Styling */
    .sstaff-pagination {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 24px;
      padding-top: 20px;
      border-top: 1px solid rgba(12, 20, 36, 0.08);
    }

    .sstaff-pag-btn {
      padding: 10px 20px;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 700;
      text-decoration: none;
      background: #FAF9F5;
      color: #0C1424;
      border: 1px solid rgba(12, 20, 36, 0.12);
      transition: all 0.25s ease;
    }
    .sstaff-pag-btn:hover:not(.disabled) {
      background: #0C1424;
      color: #ffffff;
      border-color: #0C1424;
    }
    .sstaff-pag-btn.disabled {
      opacity: 0.4;
      cursor: not-allowed;
    }

    .sstaff-pag-info {
      font-size: 13.5px;
      font-family: 'JetBrains Mono', monospace;
      color: #64748B;
      font-weight: 600;
    }

    /* Sidebar Links */
    aside {
      position: sticky;
      top: 100px;
    }

    .sidebar-card {
      background: #ffffff;
      border: 1px solid rgba(12, 20, 36, 0.08);
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 4px 24px rgba(12, 20, 36, 0.04);
    }

    .sidebar-title {
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 20px;
      font-weight: 700;
      color: #0C1424;
      padding-bottom: 14px;
      border-bottom: 2px solid #E31B23;
      margin-bottom: 20px;
    }

    .sidebar-nav-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .sidebar-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 16px;
      border-radius: 8px;
      color: #334155;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      background: #FAF9F5;
      border: 1px solid rgba(12, 20, 36, 0.05);
      transition: all 0.25s ease;
    }
    .sidebar-link:hover,
    .sidebar-link.active {
      background: #0C1424;
      color: #ffffff !important;
      border-color: #0C1424;
      transform: translateX(4px);
    }
    .sidebar-link.active {
      background: #E31B23;
      border-color: #E31B23;
    }
  </style>
</head>
<body>

  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">78 · ACADEMIC FACULTY &amp; RESEARCH SUPERVISORS</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Faculty &amp; Staff Directory</h1>
      <p style="margin-top:18px;font-size:18px;line-height:1.7;color:rgba(250,249,245,0.85);max-width:720px;">
        Official directory of academic professors, associate professors, research supervisors, and department faculty across RKDF University Bhopal.
      </p>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <main class="sstaff-main-section">
    <div class="rk-container">
      <div class="sstaff-grid-layout">
        
        <!-- LEFT COLUMN: FACULTY TABLE & PAGINATION -->
        <div>

          <article class="sstaff-block-card">
            <div class="sstaff-card-header">
              <h2 class="sstaff-card-title">Academic Staff &amp; Supervisors</h2>
              <span class="sstaff-badge">PAGE <?php echo $currentPage; ?> OF <?php echo $totalPages; ?></span>
            </div>
            <div class="sstaff-card-body">

              <div class="sstaff-table-wrapper">
                <table class="sstaff-table">
                  <thead>
                    <tr>
                      <th style="width:70px;">S.NO.</th>
                      <th>FACULTY NAME</th>
                      <th>DESIGNATION</th>
                      <th>SUBJECT / DISCIPLINE</th>
                      <th style="text-align:center;">PROFILE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($currentRecords) > 0): ?>
                      <?php foreach ($currentRecords as $record): ?>
                        <tr>
                          <td style="font-family:'JetBrains Mono',monospace;font-weight:700;"><?php echo htmlspecialchars($record['name']); ?></td>
                          <td style="font-weight:700;color:#0C1424;"><?php echo htmlspecialchars($record['designation']); ?></td>
                          <td><span class="rk-badge" style="background:rgba(12,20,36,0.06);color:#0C1424;"><?php echo htmlspecialchars($record['subject_discipline']); ?></span></td>
                          <td><?php echo htmlspecialchars($record['Discipline']); ?></td>
                          <td style="text-align:center;">
                            <?php if (!empty($record['profile_pdf'])): ?>
                              <a href="<?php echo htmlspecialchars($record['profile_pdf']); ?>" target="_blank" class="sstaff-pdf-link">View Profile ↗</a>
                            <?php else: ?>
                              <span style="font-size:12px;color:#94A3B8;font-style:italic;">No Profile</span>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="5" style="text-align:center;padding:30px;color:#64748B;">No staff records found.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>

              <!-- PAGINATION CONTROLS -->
              <div class="sstaff-pagination">
                <?php if ($currentPage > 1): ?>
                  <a href="?page=<?php echo ($currentPage - 1); ?>" class="sstaff-pag-btn">← Previous Page</a>
                <?php else: ?>
                  <span class="sstaff-pag-btn disabled">← Previous Page</span>
                <?php endif; ?>

                <span class="sstaff-pag-info">Displaying records <?php echo ($startIndex + 1); ?> – <?php echo min($startIndex + $recordsPerPage, $totalRecords); ?> of <?php echo $totalRecords; ?> total faculty</span>

                <?php if ($currentPage < $totalPages): ?>
                  <a href="?page=<?php echo ($currentPage + 1); ?>" class="sstaff-pag-btn">Next Page →</a>
                <?php else: ?>
                  <span class="sstaff-pag-btn disabled">Next Page →</span>
                <?php endif; ?>
              </div>

            </div>
          </article>

        </div>

        <!-- RIGHT COLUMN: QUICK NAVIGATION SIDEBAR -->
        <aside>
          <div class="sidebar-card">
            <h3 class="sidebar-title">University Links</h3>
            <ul class="sidebar-nav-list">
              <li><a href="stafflist.php" class="sidebar-link active">Faculty &amp; Staff Directory <span>→</span></a></li>
              <li><a href="staffLnew.php" class="sidebar-link">Department Staff Search <span>→</span></a></li>
              <li><a href="dean.php" class="sidebar-link">Faculty Deans <span>→</span></a></li>
              <li><a href="hod.php" class="sidebar-link">Heads of Department <span>→</span></a></li>
              <li><a href="phdsubjects.php" class="sidebar-link">Ph.D. Supervisors <span>→</span></a></li>
              <li><a href="Vision&amp;mission.php" class="sidebar-link">Vision &amp; Mission <span>→</span></a></li>
              <li><a href="LMS.php" class="sidebar-link">LMS Portal <span>→</span></a></li>
            </ul>
          </div>
        </aside>

      </div>
    </div>
  </main>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
