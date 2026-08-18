<?php
require_once __DIR__ . '/../config/db.php';

$pdo = getDbConnection();
if (!$pdo) {
    echo "DB Connection Failed!\n";
    exit(1);
}

// 1. online_applications
$pdo->exec("CREATE TABLE IF NOT EXISTS `online_applications` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `reg_id` VARCHAR(50) NOT NULL,
    `student_name` VARCHAR(100) NOT NULL,
    `father_name` VARCHAR(100) NOT NULL,
    `aadhaar_no` VARCHAR(20) NOT NULL,
    `mobile_no` VARCHAR(20) NOT NULL,
    `email_id` VARCHAR(100) NOT NULL,
    `course` VARCHAR(100) NOT NULL,
    `branch` VARCHAR(150) NOT NULL,
    `gender` VARCHAR(20) NOT NULL,
    `category` VARCHAR(20) NOT NULL,
    `domicile` VARCHAR(20) NOT NULL,
    `address` TEXT NOT NULL,
    `reference_by` VARCHAR(100) DEFAULT NULL,
    `qual_10th` TEXT NULL,
    `qual_12th` TEXT NULL,
    `qual_diploma` TEXT NULL,
    `qual_grad` TEXT NULL,
    `qual_pg` TEXT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// 2. alumni
$pdo->exec("CREATE TABLE IF NOT EXISTS `alumni` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `fname` VARCHAR(100) NOT NULL,
    `gender` VARCHAR(20) DEFAULT NULL,
    `marital` VARCHAR(20) DEFAULT NULL,
    `mobile` VARCHAR(20) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `add` TEXT DEFAULT NULL,
    `enrollment` VARCHAR(50) DEFAULT NULL,
    `college` VARCHAR(150) DEFAULT NULL,
    `course` VARCHAR(100) DEFAULT NULL,
    `branch` VARCHAR(100) DEFAULT NULL,
    `occupation` VARCHAR(100) DEFAULT NULL,
    `company` VARCHAR(150) DEFAULT NULL,
    `job` VARCHAR(100) DEFAULT NULL,
    `city` VARCHAR(100) DEFAULT NULL,
    `course_study` VARCHAR(100) DEFAULT NULL,
    `college_study` VARCHAR(150) DEFAULT NULL,
    `univ` VARCHAR(150) DEFAULT NULL,
    `contribute` TEXT DEFAULT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// 3. verification_requests
$pdo->exec("CREATE TABLE IF NOT EXISTS `verification_requests` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `req_id` VARCHAR(50) NOT NULL,
    `agency_or_student_name` VARCHAR(150) NOT NULL,
    `candidate_name` VARCHAR(100) NOT NULL,
    `enrollment_no` VARCHAR(50) NOT NULL,
    `roll_no` VARCHAR(50) DEFAULT NULL,
    `course` VARCHAR(100) NOT NULL,
    `passing_year` VARCHAR(20) NOT NULL,
    `mobile_no` VARCHAR(20) NOT NULL,
    `email_id` VARCHAR(100) NOT NULL,
    `verification_type` VARCHAR(100) NOT NULL,
    `transaction_ref` VARCHAR(100) DEFAULT NULL,
    `remarks` TEXT DEFAULT NULL,
    `status` VARCHAR(50) DEFAULT 'PENDING',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// 4. marksheet_requests
$pdo->exec("CREATE TABLE IF NOT EXISTS `marksheet_requests` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `req_id` VARCHAR(50) NOT NULL,
    `student_name` VARCHAR(100) NOT NULL,
    `father_name` VARCHAR(100) NOT NULL,
    `enrollment_no` VARCHAR(50) NOT NULL,
    `roll_no` VARCHAR(50) DEFAULT NULL,
    `course` VARCHAR(100) NOT NULL,
    `branch` VARCHAR(100) DEFAULT NULL,
    `semester` VARCHAR(20) NOT NULL,
    `passing_year` VARCHAR(20) NOT NULL,
    `mobile_no` VARCHAR(20) NOT NULL,
    `email_id` VARCHAR(100) NOT NULL,
    `reason` TEXT NOT NULL,
    `status` VARCHAR(50) DEFAULT 'PENDING',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// 5. name_correction_requests
$pdo->exec("CREATE TABLE IF NOT EXISTS `name_correction_requests` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `req_id` VARCHAR(50) NOT NULL,
    `current_name` VARCHAR(100) NOT NULL,
    `corrected_name` VARCHAR(100) NOT NULL,
    `father_name` VARCHAR(100) NOT NULL,
    `enrollment_no` VARCHAR(50) NOT NULL,
    `course` VARCHAR(100) NOT NULL,
    `mobile_no` VARCHAR(20) NOT NULL,
    `email_id` VARCHAR(100) NOT NULL,
    `correction_type` VARCHAR(100) NOT NULL,
    `reason` TEXT NOT NULL,
    `status` VARCHAR(50) DEFAULT 'PENDING',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// 6. migration_requests
$pdo->exec("CREATE TABLE IF NOT EXISTS `migration_requests` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `req_id` VARCHAR(50) NOT NULL,
    `student_name` VARCHAR(100) NOT NULL,
    `father_name` VARCHAR(100) NOT NULL,
    `enrollment_no` VARCHAR(50) NOT NULL,
    `course` VARCHAR(100) NOT NULL,
    `branch` VARCHAR(100) DEFAULT NULL,
    `passing_year` VARCHAR(20) NOT NULL,
    `language` VARCHAR(20) DEFAULT 'English',
    `mobile_no` VARCHAR(20) NOT NULL,
    `email_id` VARCHAR(100) NOT NULL,
    `postal_address` TEXT NOT NULL,
    `status` VARCHAR(50) DEFAULT 'PENDING',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// 7. contact_submissions
$pdo->exec("CREATE TABLE IF NOT EXISTS `contact_submissions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) DEFAULT NULL,
    `email` VARCHAR(100) DEFAULT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `subject` VARCHAR(150) DEFAULT NULL,
    `message` TEXT DEFAULT NULL,
    `channel_consent` TINYINT(1) DEFAULT 1,
    `source` VARCHAR(50) DEFAULT 'Contact Us Page',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// 8. feedback_submissions
$pdo->exec("CREATE TABLE IF NOT EXISTS `feedback_submissions` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `user_type` VARCHAR(50) NOT NULL,
    `department` VARCHAR(100) DEFAULT NULL,
    `rating` VARCHAR(20) DEFAULT NULL,
    `feedback_text` TEXT NOT NULL,
    `status` VARCHAR(50) DEFAULT 'NEW',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// 9. career_applications
$pdo->exec("CREATE TABLE IF NOT EXISTS `career_applications` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `req_id` VARCHAR(50) NOT NULL,
    `applicant_name` VARCHAR(100) NOT NULL,
    `email_id` VARCHAR(100) NOT NULL,
    `mobile_no` VARCHAR(20) NOT NULL,
    `post_applied` VARCHAR(100) NOT NULL,
    `department` VARCHAR(100) NOT NULL,
    `qualification` VARCHAR(100) NOT NULL,
    `experience_years` VARCHAR(20) NOT NULL,
    `resume_path` VARCHAR(255) DEFAULT NULL,
    `status` VARCHAR(50) DEFAULT 'RECEIVED',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

echo "All 9 submission database tables initialized successfully in rkdf_cms_db!\n";
