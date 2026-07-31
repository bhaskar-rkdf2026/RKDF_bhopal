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