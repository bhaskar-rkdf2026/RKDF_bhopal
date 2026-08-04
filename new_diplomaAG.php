<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diploma AG - Result - RKDF University, Bhopal — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Diploma AG - Result - RKDF University, Bhopal</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<div class="result-container">
        <table class="bg" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="18%" rowspan="3"><img src="images/RKDF_LOGO2.png" width="118" height="160"
                        alt="RKDF University Logo" class="header-logo" /></td>
                <td height="75" colspan="2" align="center"><span class="style8">RKDF UNIVERSITY </span></td>
            </tr>
            <tr>
                <td height="48" colspan="2" align="center"><span class="style9">&quot;Established under M.P. Govt. Act
                        and Registered with UGC under Act2(f) 1956&quot;</span></td>
            </tr>
            <tr>
                <td height="57" colspan="2" align="center"><span class="style1 style7">STATEMENT OF MARKS MAY-2025</span></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="98%" cellpadding="0" cellspacing="0" border="1" class="marks-info-table">
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="34%" height="24" class="fonttb"><strong>ROLL NO. : </strong></td>
                            <td width="39%" class="fonttb"><strong><?php echo $rno; ?> </strong></td>
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
                <td height="25" colspan="3" align="center"><strong>DIPLOMA IN AGRICULTURE </strong></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table class="marks-table" border="1" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="11%" rowspan="2" class="fonttb">SUBJECT CODE</th>
                                <th width="25%" rowspan="2" class="style10">TITLE OF PAPER</th>
                                <th height="26" colspan="3" class="style10">MAXIMUM MARKS</th>
                                <th colspan="3" class="style10">MARKS OBTAINED</th>
                            </tr>
                            <tr>
                                <th width="10%" height="51" class="style10">FINAL EXAM</th>
                                <th width="13%" class="style10">SESSIONAL</th>
                                <th width="10%" class="style10">TOTAL MARKS</th>
                                <th width="8%" class="style10">FINAL EXAM</th>
                                <th width="13%" class="style10">SESSIONAL</th>
                                <th width="10%" class="style10">TOTAL MARKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="49" class="fonttb" colspan="8">
                                    <div align="center">MANAGEMENT FOR INPUT DEALERS (PESTICIDES & FERTILIZERS) IN
                                        AGRICULTURE EXTENSION SERVICES</div>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="4" class="fonttb">
                                    <div align="center"><strong>DAG - 101</strong></div>
                                </td>
                                <td height="23" class="fonttb">
                                    <div align="left"><strong>(A)PLANT PROTECTION AND PESTICIDE MANAGEMENT </strong>
                                    </div>
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
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $theory1; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $sessional1; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $total1; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td height="23" class="fonttb">
                                    <div align="left"><strong>(B)SOIL FERTILITY AND FERTILIZER MANAGEMENT </strong>
                                    </div>
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
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $theory2; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $sessional2; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $total2; ?></div>
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
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $practical1; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $practical2; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $practicaltotal; ?></div>
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
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $viva1; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $viva2; ?></div>
                                </td>
                                <td class="style10">&nbsp;
                                    <div align="center"><?php echo $vivatotal; ?></div>
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
                                    <div align="center"><?php echo $totalfig; ?></div>
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
                            <td width="311" height="25" class="fonttb"><strong>&nbsp; <?php echo $totalword; ?></strong>
                            </td>
                        </tr>

                        <tr>
                            <td height="29" class="fonttb">
                                <div align="right"><strong>RESULT : </strong></div>
                            </td>
                            <td colspan="2" class="fonttb"><strong> &nbsp; <?php echo $fresult; ?></strong></td>
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
                <td><strong>NOTE:-</strong> This is a Computer Generated Statement Should Not Be Treated As Original*
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
