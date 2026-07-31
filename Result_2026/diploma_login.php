<?php

require_once('config/db_config.php');

if (!isset($_POST['rno']))
{
    header("Location: diplomaAG_result.php?err=1");
}

$rno = trim($_POST['rno']);

if ($rno == '')
{
    header("Location: diplomaAG_result.php?err=1");
}

$rno = mysqli_real_escape_string($con, $rno);

$sql = "SELECT rollno FROM diploma_ag WHERE rollno = '".$rno."' LIMIT 1 ";

$result = mysqli_query($con, $sql);

if (!$result)
{
    error_log(mysqli_error($con));

    header("Location: diplomaAG_result.php?err=1");
}

if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);

    session_regenerate_id(true);

    $_SESSION['xrno'] = $row['rollno'];
}

// header("Location: diplomaAG_result.php?err=1-Step-04");
header("Location: diplomaAG.php" );
exit;