<?php
require_once('config/db_config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Diploma AG - Result - RKDF University, Bhopal</title>
  <style type="text/css">
      .style8 {
      font-size: 66px;
      font-weight: bold;
    }

    .style1 {
      font-size: 24px;
      font-weight: bold;
    }

    .bg {
      background-image: url(/images/logobg_2.png);
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: scroll;
    }

    .style9 {
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;
    }

    .fonttb {
      font-size: 15px;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 400;
      padding-left:10px;
      
    }

    .style10 {
      font-size: 15px;
      font-weight: bold;
    }
    
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #f44336; /* Button color */
        color: white; /* Text color */
        text-align: center;
        text-decoration: none; /* Remove underline */
        border-radius: 5px; /* Rounded corners */
    }
  </style>
</head>

<body bgcolor="#E6E9D1">
<?php
    if (!isset($_SESSION['xrno']))
    {
        die("SESSION NOT FOUND!");
    }
    
    $xrno = mysqli_real_escape_string($con, $_SESSION['xrno'] );
    $sql = "SELECT * FROM diploma_ag WHERE rollno = '".$xrno."' LIMIT 1";
    $result = mysqli_query($con, $sql);
    
    if (!$result)
    {
        header('Location: diplomaAG_result.php?err=1');
        exit;
        die(mysqli_error($con));
    }
?>

<?php
    if (!isset($_SESSION['xrno']) || empty($_SESSION['xrno'])) {
        header('Location: diplomaAG_result.php');
        exit;
    }
    
    $xrno = $_SESSION['xrno'];
    $stmt = mysqli_prepare($con, "SELECT * FROM diploma_ag WHERE rollno = ?  LIMIT 1 " );
    
    if (!$stmt) {
        die('Database Error');
    }
    mysqli_stmt_bind_param($stmt, "s", $xrno);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if (!$result || mysqli_num_rows($result) === 0) {
        header('Location: diplomaAG_result.php?err=1');
        exit;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $rollno	 = $row["rollno"];
        $name	= $row["name"];
        $fname = $row["fname"];
        $ExamSession = $row["ExamSession"];
        $SubCode = $row["SubCode"];
        $SubSection_A = $row["SubSection_A"];
        $SubSection_B = $row["SubSection_B"];
        $SubSection_C = $row["SubSection_C"];
        $SubSection_D = $row["SubSection_D"];
        $theory1 = $row["theory1"];
        $sessional1 = $row["sessional1"];
        $total1 = $row["total1"];
        $theory2 = $row["theory2"];
        $sessional2 = $row["sessional2"];               
        $total2	= $row["total2"];
        $Theory3 = $row["Theory3"];
        $Sessional3	= $row["Sessional3"];
        $Total3	= $row["Total3"];
        $Theory4 = $row["Theory4"];
        $Sessional4 = $row["Sessional4"];
        $Total4 = $row["Total4"];
        $TotalMarks = $row["TotalMarks"];
        $Total = $row["Total"];
        $FIGURE = $row["FIGURE"];
        $Percentage = $row["Percentage"];
        $totalword = $row["totalword"];
        $RESULT = $row["RESULT"];
    }
?>
<table class="bg" width="68%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="18%" rowspan="2"><img src="/images/RKDF_LOGO2.png" width="118" height="160" /></td>
        <td height="75" colspan="2" align="center"><span class="style8">RKDF UNIVERSITY </span><br>
        <span class="style9">&quot;Established under M.P. Govt. Act and Registered with UGC under Act2(f) 1956&quot;</span>
        </td>
    </tr>
    <tr>
        <td height="57" colspan="3" align="center"><span class="style1 style7">STATEMENT OF MARKS JUN- 2026</span></td>
    </tr>
    
          <tr>
        <td colspan="3">
          <table width="100%" cellpadding="0" cellspacing="0" border="1">
            <tr>
              <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
              <td width="34%" height="24" class="fonttb" style="padding-left:12px"><strong>ROLL NO. : </strong></td>
              <td width="39%" class="fonttb"><strong><?php echo $rollno; ?> </strong></td>
              <td width="14%" class="fonttb">
                <div align="left"><strong>STATUS :</strong></div>
              </td>
              <td width="13%" class="fonttb">
                <div align="left"><strong>Regular</strong></div>
              </td>
            </tr>
            <tr>
              <td width="34%" height="25" class="fonttb"><strong>NAME OF STUDENT : </strong></td>
              <td width="39%" class="fonttb"><strong><?php echo $name; ?> </strong></td>
              <td width="14%" class="fonttb">&nbsp;</td>
              <td width="13%" class="fonttb">&nbsp;</td>
            </tr>

            <tr>
              <td height="21" class="fonttb"><strong>FATHER'S/HUSBAND NAME: </strong></td>
              <td colspan="3" class="fonttb"><strong><?php echo $fname; ?> </strong></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td height="35" colspan="3" align="center" style="background-color: darkgray;"><strong>DIPLOMA IN AGRICULTURE </strong></td>
      </tr>
      <tr>
        <td colspan="3">
          <table width="100%" height="100%" border="1" cellpadding="0" cellspacing="0">
            <tr>
              <td width="11%" rowspan="2" class="fonttb">
                <div align="center"><strong>SUBJECT CODE</strong></div>
              </td>
              <td width="25%" rowspan="2" class="style10">
                <div align="center">TITLE OF PAPER</div>
              </td>
              <td height="26" colspan="3" class="style10">
                <div align="center">MAXIMUM MARKS</div>
              </td>
              <td colspan="3" class="style10">
                <div align="center">MARKS OBTAINED</div>
              </td>
            </tr>
            <tr>
              <td width="10%" height="51" class="style10">
                <div align="center">FINAL EXAM</div>
              </td>
              <td width="13%" class="style10">
                <div align="center">SESSIONAL</div>
              </td>
              <td width="10%" class="style10">
                <div align="center">TOTAL MARKS</div>
              </td>
              <td width="8%" class="style10">
                <div align="center">FINAL EXAM</div>
              </td>
              <td width="13%" class="style10">
                <div align="center">SESSIONAL</div>
              </td>
              <td width="10%" class="style10">
                <div align="center">TOTAL MARKS</div>
              </td>
            </tr>
            <tr>
              <td height="49" class="fonttb">&nbsp;</td>
              <td colspan="7" class="fonttb">&nbsp;
                <div align="center"><strong>MANAGEMENT FOR INPUT DEALERS (PESTICIDES & FERTILIZERS) IN AGRICULTURE EXTENSION SERVICES</strong></div>
              </td>
            </tr>
            <tr>
              <td rowspan="4" class="fonttb">
                <div align="center"><strong>DAG - 101</strong></div>
              </td>
              <td height="23" class="fonttb">
                <div align="left"><strong>(A)PLANT PROTECTION AND PESTICIDE MANAGEMENT </strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>25</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>25</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>50</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $theory1; ?></strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $sessional1; ?></strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $total1; ?></strong></div>
              </td>
            </tr>
            <tr>
              <td height="23" class="fonttb">
                <div align="left"><strong>(B)SOIL FERTILITY AND FERTILIZER MANAGEMENT </strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>25</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>25</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>50</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $theory2; ?></strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $sessional2; ?></strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $total2; ?></strong></div>
              </td>
            </tr>
            <tr>
              <td height="23" class="fonttb">
                <div align="left"><strong>(C)PRACTICAL &amp; FIELD VISIT </strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>20</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>20</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>40</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $Theory3; ?></strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $Sessional3; ?></strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $Total3; ?></strong></div>
              </td>
            </tr>
            <tr>
              <td height="23" class="fonttb">
                <div align="left"><strong>(D) VIVA </strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>05</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>05</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>10</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $Theory4; ?></strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $Sessional4; ?></strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong><?php echo $Total4; ?></strong></div>
              </td>
            </tr>
            <tr>
              <td height="46" class="fonttb">
                <div align="center"></div>
              </td>
              <td class="fonttb">
                <div align="center"></div>
              </td>
              <td class="fonttb">
                <div align="center"></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>TOTAL</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"><strong>150</strong></div>
              </td>
              <td class="fonttb">
                <div align="center"></div>
              </td>
              <td class="fonttb">
                <div align="center"></div>
              </td>
              <td class="style10">
                <div align="center"><strong><?php echo $Total; ?></strong></div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <table width="87%" height="56" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="249" class="fonttb">
                <div align="right"><strong>OBTAINED MARKS IN WORDS : </strong></div>
              </td>
              <td width="311" height="25" class="fonttb"><strong>&nbsp; <?php echo $FIGURE ; ?></strong></td>
            </tr>
            <tr>
              <td height="29" class="fonttb">
                <div align="right"><strong>RESULT : </strong></div>
              </td>
              <td colspan="2" class="fonttb"><strong> &nbsp; <?php echo $RESULT; ?></strong></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="81%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td class=""fonttb" colspan=3 style="color:red"><strong>NOTE:-</strong> This is a Computer Generated Statement Should Not Be Treated As Original* </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class=""fonttb btn" colspan=3  style="text-align: center;font-family: sans-serif;font-size: larger;">
            <a class="btn" href="diplomaAG_result.php">Back To Roll No Page</a>
        </td>
        <td>&nbsp;</td>
      </tr>
</table>

</body>
</html>
