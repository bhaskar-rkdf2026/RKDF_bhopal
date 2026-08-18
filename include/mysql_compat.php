<?php
// ============================================================
// RKDF University — PHP 7 / 8+ MySQL Legacy Function Polyfill
// Prevents 500 Internal Server Errors on live servers when running modern PHP
// ============================================================
require_once __DIR__ . '/../config/db.php';

$global_mysql_pdo = null;

if (!function_exists('mysql_connect')) {
    function mysql_connect($host = null, $user = null, $pass = null) {
        global $global_mysql_pdo;
        $global_mysql_pdo = getDbConnection();
        return $global_mysql_pdo ?: true;
    }
}

if (!function_exists('mysql_select_db')) {
    function mysql_select_db($db = null, $link = null) {
        return true;
    }
}

if (!function_exists('mysql_query')) {
    function mysql_query($query, $link = null) {
        global $global_mysql_pdo;
        if (!$global_mysql_pdo) {
            $global_mysql_pdo = getDbConnection();
        }
        if (!$global_mysql_pdo) return false;
        try {
            return $global_mysql_pdo->query($query);
        } catch (Throwable $e) {
            error_log("mysql_query polyfill notice: " . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('mysql_fetch_array')) {
    function mysql_fetch_array($result, $result_type = 3) { // 3 = BOTH
        if ($result instanceof PDOStatement) {
            return $result->fetch(PDO::FETCH_BOTH);
        }
        return false;
    }
}

if (!function_exists('mysql_fetch_assoc')) {
    function mysql_fetch_assoc($result) {
        if ($result instanceof PDOStatement) {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
}

if (!function_exists('mysql_num_rows')) {
    function mysql_num_rows($result) {
        if ($result instanceof PDOStatement) {
            return $result->rowCount();
        }
        return 0;
    }
}

if (!function_exists('mysql_real_escape_string')) {
    function mysql_real_escape_string($string, $link = null) {
        return addslashes($string);
    }
}

if (!function_exists('mysql_close')) {
    function mysql_close($link = null) {
        return true;
    }
}

if (!function_exists('mysql_error')) {
    function mysql_error($link = null) {
        return '';
    }
}
