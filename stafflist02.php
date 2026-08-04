<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stafflist02 — RKDF University Bhopal</title>
  <link rel="stylesheet" href="css/rkdf-home.css">
  <style>
    .subpage-hero {
      position: relative;
      padding: 160px 0 90px;
      background: linear-gradient(135deg, rgba(12,20,36,0.94) 0%, rgba(21,34,56,0.90) 60%, rgba(12,20,36,0.96) 100%), 
                  url('images/lovable/rkdf-why-bg.jpg') center/cover no-repeat;
      color: var(--p-paper);
      box-shadow: inset 0 -30px 60px rgba(0,0,0,0.4);
    }
    .sp-main-box {
      padding: 80px 0;
      background: var(--p-paper);
      color: var(--p-navy-deep);
      font-size: 16px;
      line-height: 1.8;
    }
    .sp-main-box table {
      width: 100%;
      border-collapse: collapse;
      margin: 28px 0;
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(12,20,36,0.04);
      border: 1px solid var(--p-hairline);
    }
    .sp-main-box th {
      background: var(--p-navy-deep);
      color: #ffffff;
      padding: 16px 20px;
      font-family: var(--p-font-mono);
      font-size: 13.5px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .sp-main-box td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--p-hairline);
      font-size: 15px;
    }
    .sp-main-box tr:hover td {
      background: rgba(220,38,38,0.03);
    }
    .sp-main-box a {
      color: var(--p-gold);
      font-weight: 700;
      text-decoration: none;
      transition: color 0.2s;
    }
    .sp-main-box a:hover {
      text-decoration: underline;
      color: #b91c1c;
    }
    .sp-main-box img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      object-fit: contain;
    }
    .glossymenu a.menuitem {
      display: inline-block;
      padding: 10px 18px;
      margin: 4px;
      background: #ffffff;
      border: 1px solid var(--p-hairline);
      border-radius: 8px;
      color: var(--p-navy-deep);
      font-weight: 700;
      text-decoration: none;
      transition: all 0.25s;
    }
    .glossymenu a.menuitem:hover {
      background: var(--p-gold);
      color: #ffffff;
      border-color: var(--p-gold);
    }
  </style>
</head>
<body>
  <!-- APPROVED NAVBAR -->
  <?php include __DIR__ . '/include/new_navbar.php'; ?>

  <!-- HERO SECTION -->
  <section class="subpage-hero">
    <div class="rk-container">
      <span class="rk-eyebrow tone-gold">RKDF University Bhopal</span>
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Stafflist02</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<?php
// Sample data - an array of employee salary records
$data = array(
array("S. No." => 1 , "Name" => "DR. A.M. NAYAK", "Designation" => "ASSOCIATE PROFESSOR", "Department" => "DEPARTMENT OF HOMEOPATHY", "Specialization" => "PRACTICE OF MEDICINE","Pay Scale" => "37400-67000 AGP 9000", "email" => "dranand.nayak@yahoo.com"),
array("S. No." => 3 , "Name" => "CHARU BHAGAT","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF AGRICULTURE","Specialization" => "Post Harvest Technology and Food Engineering","Pay Scale" => "15600-39100 AGP 7000","email" => "charubhagat16@gmail.com"),
array("S. No." => 4 , "Name" => "Dr. MEENAKSHI SAMARTHA","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF AGRICULTURE","Specialization" => "Bio Technology","Pay Scale" => "15600-39100 AGP 7000","email" => "charubhagat16@gmail.com"),
array("S. No." => 5 , "Name" => "Dr. SUCHI GANGWAR","Designation" => "ASSOCIATE PROFESSOR","Department" => "FACULTY OF AGRICULTURE","Specialization" => "Agronomy","Pay Scale" => "37400-67000 AGP 9000","email" => "singh.suchi40@gmail.com"),
array("S. No." => 6 , "Name" => "Dr. N.K.SHRIVASTAVA","Designation" => "PROFESSOR","Department" => "FACULTY OF COMMERCE & SOCIAL SCIENCE","Specialization" => "COMMERCE","Pay Scale" => "37400-67000 AGP 10000","email" => "drshrivastava.nk@gmail.com"),
array("S. No." => 7 , "Name" => "DR. V.K. PANDEY","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF EDUCATION","Specialization" => "Botany","Pay Scale" => "15600-39100 AGP 7000","email" => "v_pandey53@rediffmail.com"),
array("S. No." => 8 , "Name" => "Dr. M. S. PAWAR","Designation" => "PROFESSOR","Department" => "FACULTY OF EDUCATION","Specialization" => "Research Analysis,Physical Science","Pay Scale" => "37400-67000 AGP 10000","email" => "pawarmohan380@gmail.com"),
array("S. No." => 9 , "Name" => "Dr. AJAY BARAPATRE","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "ELECTRONICS AND COMMUNICATION ENGINEERING","Pay Scale" => "15600-39100 AGP 7000","email" => "barapatre.ajay@yahoo.co.in"),
array("S. No." => 10 , "Name" => "Dr. AKANT KUMAR RAGHUWANSHI","Designation" => "ASSOCIATE PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "ELECTRONICS AND COMMUNICATION ENGINEERING","Pay Scale" => "37400-67000 AGP 9000","email" => "akantthakur7@gmail.com"),
array("S. No." => 11 , "Name" => "Dr. AMBRESH PATEL","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "ELECTRONICS AND COMMUNICATION ENGINEERING","Pay Scale" => "15600-39100 AGP 7000","email" => "ambreshec@gmail.com"),
array("S. No." => 12 , "Name" => "Dr. AMITESH PAUL","Designation" => "PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "MECHANICAL ENGINEERING","Pay Scale" => "37400-67000 AGP 10000","email" => "amitesh.paul07@gmail.com"),
array("S. No." => 13 , "Name" => "Dr. ANKIT SHRIVASTAVA","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "COMPUTER SCIENCE & ENGINEERING","Pay Scale" => "15600-39100 AGP 7000","email" => "ankit19shrivastava@gmail.com"),
array("S. No." => 14 , "Name" => "Dr. ARUN PATEL","Designation" => "PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "CIVIL ENGINEERING","Pay Scale" => "37400-67000 AGP 10000","email" => "arunpatel123@gmail.com"),
array("S. No." => 15 , "Name" => "Dr. BALAJEE SHARMA","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "ELECTRONICS AND COMMUNICATION ENGINEERING","Pay Scale" => "15600-39100 AGP 7000","email" => "balajee982@gmail.com"),
array("S. No." => 16 , "Name" => "Mr. CHIRAG GUPTA","Designation" => "ASSOCIATE PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "ELECTRICAL & ELECTRONICS ENGINEERING","Pay Scale" => "37400-67000 AGP 9000","email" => "cgupta.011@gmail.com"),
array("S. No." => 17 , "Name" => "Dr. GAGAN SHARMA","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "COMPUTER SCIENCE & ENGINEERING","Pay Scale" => "15600-39100 AGP 7000","email" => "gagansharma.cs@gmail.com"),
array("S. No." => 18 , "Name" => "Dr. HEMANT RAJORIYA","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "Electronics & Communication Engg","Pay Scale" => "15600-39100 AGP 7000","email" => "hemantrajoriya25@gmail.com"),
array("S. No." => 19 , "Name" => "Dr. SACHIN BANDEWAR","Designation" => "ASSISTANT PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "ELECTRONICS AND COMMUNICATION ENGINEERING","Pay Scale" => "15600-39100 AGP 7000","email" => "sachin.bandewar9@gmail.com"),
array("S. No." => 20 , "Name" => "Dr. VIRENDRA CHAUDHARY","Designation" => "PROFESSOR","Department" => "FACULTY OF ENGINEERING & TECHNOLOGY","Specialization" => "Electronics & Communication Engg","Pay Scale" => "37400-67000 AGP 10000","email" => "virgwl@gmail.com"),
array("S. No." => 21 , "Name" => "Dr. VANDANA RAGHUWANSHI","Designation" => "PROFESSOR","Department" => "FACULTY OF NURSING","Specialization" => "Mental Health Nursing","Pay Scale" => "37400-67000 AGP 10000","email" => "profvandanaraghuwanshi@gmail.com"),
array("S. No." => 2 , "Name" => "DR. ANOOP J KATYAN", "Designation" => "PROFESSOR","Department" => "DEPARTMENT OF HOMEOPATHY","Specialization" => "MATERIA MEDICA","Pay Scale" => "37400-67000 AGP 10000","email" => "anoop.katyayan@gmail.com")
);

// Number of records per page
$records_per_page = 10;

// Get the current page from the URL, default is page 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the total number of records
$total_records = count($data);

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Ensure the current page is within a valid range
if ($page > $total_pages) {
    $page = $total_pages;
} elseif ($page < 1) {
    $page = 1;
}

// Calculate the starting index for the current page
$start_index = ($page - 1) * $records_per_page;

// Slice the data array to get only the items for the current page
$current_page_data = array_slice($data, $start_index, $records_per_page);

// Display the employee salary data in a table
echo "<h1 style='font-family: sans-serif;'>Employee Records - Page $page</h1>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr  style='font-family: sans-serif;font-size:small'>
        <th>ID</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Department</th>
        <th>Specialization</th>
        <th>Pay Scale</th>
        <th>email</th>
      </tr>";

foreach ($current_page_data as $employee) {
    echo "<tr style='font-family: sans-serif;font-size:small'>
            <td>{$employee['S. No.']}</td>
            <td>{$employee['Name']}</td>
            <td>{$employee['Designation']}</td>
            <td>{$employee['Department']}</td>
            <td>{$employee['Specialization']}</td>
            <td>{$employee['Pay Scale']}</td>
            <td>{$employee['email']}</td>
          </tr>";
}

echo "</table>";

// Display pagination links
echo "<div class='pagination'>";
if ($page > 1) {
    echo "<a href='?page=1'>First</a> ";
    echo "<a href='?page=" . ($page - 1) . "'>Previous</a> ";
}
if ($page < $total_pages) {
    echo "<a href='?page=" . ($page + 1) . "'>Next</a> ";
    echo "<a href='?page=$total_pages'>Last</a>";
}
echo "</div>";
?>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
