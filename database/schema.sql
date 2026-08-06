-- RKDF Bhopal Admin Panel CMS Database Schema

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `full_name` VARCHAR(100) DEFAULT 'Admin User',
  `email` VARCHAR(100) DEFAULT '',
  `role` VARCHAR(20) DEFAULT 'admin',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `homepage_sections` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `section_key` VARCHAR(50) NOT NULL UNIQUE,
  `tag_number` VARCHAR(20) DEFAULT '',
  `tag_text` VARCHAR(100) DEFAULT '',
  `title_main` VARCHAR(255) DEFAULT '',
  `title_accent` VARCHAR(255) DEFAULT '',
  `subtitle` TEXT DEFAULT NULL,
  `image_path` VARCHAR(255) DEFAULT '',
  `video_path` VARCHAR(255) DEFAULT '',
  `extra_text_1` TEXT DEFAULT NULL,
  `extra_text_2` TEXT DEFAULT NULL,
  `is_active` TINYINT(1) DEFAULT 1,
  `sort_order` INT DEFAULT 0,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `homepage_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `section_key` VARCHAR(50) NOT NULL,
  `item_type` VARCHAR(50) DEFAULT 'default',
  `title` VARCHAR(255) DEFAULT '',
  `subtitle` VARCHAR(255) DEFAULT '',
  `number_val` VARCHAR(100) DEFAULT '',
  `text_val` TEXT DEFAULT NULL,
  `image_path` VARCHAR(255) DEFAULT '',
  `link_url` VARCHAR(255) DEFAULT '',
  `badge_text` VARCHAR(100) DEFAULT '',
  `meta_json` TEXT DEFAULT NULL,
  `sort_order` INT DEFAULT 0,
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_section` (`section_key`),
  INDEX `idx_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `site_pages` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `page_slug` VARCHAR(100) NOT NULL UNIQUE,
  `page_title` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) DEFAULT 'General',
  `eyebrow` VARCHAR(255) DEFAULT '',
  `hero_subtitle` TEXT DEFAULT NULL,
  `intro_heading` VARCHAR(255) DEFAULT '',
  `intro_text` TEXT DEFAULT NULL,
  `meta_keywords` TEXT DEFAULT NULL,
  `meta_description` TEXT DEFAULT NULL,
  `is_active` TINYINT(1) DEFAULT 1,
  `sort_order` INT DEFAULT 0,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `page_sections` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `page_slug` VARCHAR(100) NOT NULL,
  `group_key` VARCHAR(50) DEFAULT 'general',
  `title` VARCHAR(255) DEFAULT '',
  `subtitle` VARCHAR(255) DEFAULT '',
  `number_val` VARCHAR(100) DEFAULT '',
  `text_val` TEXT DEFAULT NULL,
  `image_path` VARCHAR(255) DEFAULT '',
  `link_url` VARCHAR(255) DEFAULT '',
  `badge_text` VARCHAR(100) DEFAULT '',
  `sort_order` INT DEFAULT 0,
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_page_slug` (`page_slug`),
  INDEX `idx_page_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `setting_key` VARCHAR(100) NOT NULL UNIQUE,
  `setting_value` TEXT DEFAULT NULL,
  `setting_group` VARCHAR(50) DEFAULT 'general',
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
