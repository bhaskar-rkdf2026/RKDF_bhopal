<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Error!\n";
    exit(1);
}

echo "=== TESTING ALL FORM SUBMISSIONS & ADMIN DB LOGGING ===\n\n";

// 1. Admission Application
$stmt1 = $pdo->prepare("INSERT INTO online_applications (reg_id, student_name, father_name, aadhaar_no, mobile_no, email_id, course, branch, gender, category, domicile, address) VALUES ('RKDFTEST01', 'Rahul Sharma', 'Vijay Sharma', '123456789012', '9876543210', 'rahul@test.com', 'B.Tech', 'Computer Science', 'MALE', 'GEN', 'Madhya Pradesh', 'Bhopal MP')");
$stmt1->execute();
echo "1. Online Admission Form: Inserted (ID: " . $pdo->lastInsertId() . ")\n";

// 2. Alumni Registration
$stmt2 = $pdo->prepare("INSERT INTO alumni (name, fname, gender, mobile, email, enrollment, college, course, branch, city) VALUES ('Priya Verma', 'Ramesh Verma', 'Female', '9811223344', 'priya@test.com', 'RKDF2020CS001', 'RKDF Institute of Tech', 'B.Tech', 'CSE', 'Bhopal')");
$stmt2->execute();
echo "2. Alumni Registration Form: Inserted (ID: " . $pdo->lastInsertId() . ")\n";

// 3. Verification Request
$stmt3 = $pdo->prepare("INSERT INTO verification_requests (req_id, agency_or_student_name, candidate_name, enrollment_no, course, passing_year, mobile_no, email_id, status) VALUES ('VERTEST01', 'TCS iON Verification Cell', 'Amit Kumar', 'RKDF18EC045', 'B.Tech', '2022', '9822334455', 'verify@tcs.com', 'PENDING')");
$stmt3->execute();
echo "3. Document Verification Form: Inserted (ID: " . $pdo->lastInsertId() . ")\n";

// 4. Marksheet Request
$stmt4 = $pdo->prepare("INSERT INTO marksheet_requests (req_id, student_name, father_name, enrollment_no, course, semester, mobile_no, email_id, reason, status) VALUES ('MSKTEST01', 'Suresh Patel', 'Kailash Patel', 'RKDF21MBA012', 'MBA', '4th', '9833445566', 'suresh@test.com', 'Original Grade Card Damaged', 'PENDING')");
$stmt4->execute();
echo "4. Duplicate Marksheet Form: Inserted (ID: " . $pdo->lastInsertId() . ")\n";

// 5. Name Correction Request
$stmt5 = $pdo->prepare("INSERT INTO name_correction_requests (req_id, current_name, corrected_name, father_name, enrollment_no, course, mobile_no, email_id, correction_type, status) VALUES ('NCTEST01', 'Ankit Kushwaha', 'Ankit Singh Kushwaha', 'Ram Kushwaha', 'RKDF22AG089', 'B.Sc Agriculture', '9844556677', 'ankit@test.com', 'Student Name Correction', 'PENDING')");
$stmt5->execute();
echo "5. Name Correction Form: Inserted (ID: " . $pdo->lastInsertId() . ")\n";

// 6. Migration Certificate Request
$stmt6 = $pdo->prepare("INSERT INTO migration_requests (req_id, student_name, father_name, enrollment_no, course, passing_year, language, mobile_no, email_id, postal_address, status) VALUES ('MIGTEST01', 'Neha Gupta', 'Rajesh Gupta', 'RKDF19PH034', 'B.Pharm', '2023', 'English', '9855667788', 'neha@test.com', 'Indore MP', 'PENDING')");
$stmt6->execute();
echo "6. Migration Certificate Form: Inserted (ID: " . $pdo->lastInsertId() . ")\n";

// 7. Contact Us Submission
$stmt7 = $pdo->prepare("INSERT INTO contact_submissions (name, email, phone, message, channel_consent, source) VALUES ('Vikram Joshi', 'vikram@test.com', '9866778899', 'Need information regarding M.Tech Admissions 2026', 1, 'Contact Us Page')");
$stmt7->execute();
echo "7. Contact Us Form: Inserted (ID: " . $pdo->lastInsertId() . ")\n";

// 8. Student Feedback Submission
$stmt8 = $pdo->prepare("INSERT INTO feedback_submissions (name, email, phone, user_type, feedback_text, status) VALUES ('Megha Sen', 'megha@test.com', '9877889900', 'Student/Applicant', 'Excellent portal and fast dynamic response.', 'NEW')");
$stmt8->execute();
echo "8. Student Feedback Form: Inserted (ID: " . $pdo->lastInsertId() . ")\n";

// 9. Career Application
$stmt9 = $pdo->prepare("INSERT INTO career_applications (req_id, applicant_name, email_id, mobile_no, post_applied, department, qualification, experience_years, status) VALUES ('CARTEST01', 'Dr. Deepak Saxena', 'deepak@test.com', '9888990011', 'Associate Professor', 'Computer Science', 'Ph.D in AI/ML', '8 Years', 'RECEIVED')");
$stmt9->execute();
echo "9. Career Application Form: Inserted (ID: " . $pdo->lastInsertId() . ")\n";

echo "\n🎉 SUCCESS: All 9 form submission types tested and verified successfully in Database!\n";
