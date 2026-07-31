<?php

if (session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}

define('DB_HOST', 'localhost');
define('DB_USER', 'vedica_rkdfresults');
define('DB_PASS', 'CcW6JcDUF-Sl01');
define('DB_NAME', 'vedica_rkdf_results');

$con = mysqli_connect(
    DB_HOST,
    DB_USER,
    DB_PASS,
    DB_NAME
);

if (!$con)
{
    die(
        'Database Connection Failed : '
        . mysqli_connect_error()
    );
}

mysqli_set_charset($con, 'utf8');