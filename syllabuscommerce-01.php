<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDUCATION GLORIFIES NATION — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">EDUCATION GLORIFIES NATION</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<section id="content" class="wrapper ">
        <!--- spotlight -->
        <section id="contentLeft">
            <h2 class="titleDescription"><a href="#"> (Commerce) Syllabus</a></h2>

            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <ul>
                <li class="style9">
                    <p>&nbsp;&nbsp;&nbsp;<strong>&nbsp;<span class="style1">SELECT PROGRAM</span></strong> &nbsp;
                        <select onChange="window.location.href=this.value">
                            <?php
				include "include/syllabus.php";
				?>
                        </select>
                    </p>
                </li>
                <br />

                <li class="style9"><br />
                </li>
            </ul>
            <ul>
                <li class="style9">
                    <table width="200" border="1">

                        <tr>
                            <td width="388"><span class="style3" style="font-size:Medium"><br />
                                    &nbsp;&nbsp;Syllabus According to New Education Policy (NEP)</span></td>
                            <td width="167">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.Com.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (PLAIN) 1st SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.COM PLAIN.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (PLAIN) 2nd SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.Com_Plain-3rd-Sem.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (PLAIN) 3rd SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2">
                                <a href="syllabus/NEP/B.Com_Plain-4th-Sem.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (PLAIN) 4th SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2">
                                <a href="syllabus/NEP/B.Com_Plain-5th-Sem.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (PLAIN) 5th SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2">
                                <a href="syllabus/NEP/B.Com_Plain-6th-Sem.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (PLAIN) 6th SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>


                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.COM COMPUTER.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (COMPUTER) 1st SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.COM COMPUTER2nd sem.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (COMPUTER) 2nd SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.Com_Computer-3rd-sem.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (COMPUTER) 3rd SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.Com_Computer-4th-Sem.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (COMPUTER) 4th SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.Com_Computer-5th-Sem.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (COMPUTER) 5th SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.Com_Computer-6th-Sem.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (COMPUTER) 6th SEM
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.COM - 7 Sem..pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM - 7th SEM - Honours
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.COM - 8 Sem..pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM - 8th SEM - Honours
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

						<tr>
                            <td height="33" colspan="2"><a href="syllabus/NEP/B.COM-ENVIRONMNT SYLLSBUS.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM ENVIRONMNTAL STUDIES
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="388"><span class="style3" style="font-size:medium"><br />
                                    &nbsp;&nbsp;B.COM 1st to 3rd Year ( 1st to 6th SEM ALL ) </span></td>
                            <td width="167">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/B.Com (Plain).pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (PLAIN)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/B.Com. (Computer).pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM (COMPUTER)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/b.com(hons).pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; B.COM
                                        (HONS.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="388"><span class="style3" style="font-size:medium"><br />
                                    &nbsp;&nbsp;M.COM 1st to 2nd Year ( 1st to 4th SEM ALL )</span></td>
                            <td width="167">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/M.Com.pdf"
                                    target="_blank"><strong>&nbsp;&nbsp;&nbsp;&nbsp; M.COM &nbsp;(New
                                        Scheme)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="36" colspan="2"></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>
                    <p>&nbsp;</p>
                </li>
            </ul>
            <ul>
                <p>&nbsp;</p>
            </ul>

            <div align="justify"></div>
        </section>
        <!--- contentLeft -->
        <section id="sideBar"> </section>
        <!--- sideBar -->
        <br class="clear" />
    </section>
    <!--- content -->
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#mainNav li').hover(
            function() {
                jQuery(this).find('.dropdown').fadeIn(300);
            },
            function() {
                jQuery(this).find('.dropdown').fadeOut(200);
            }
        );
    });
    </script>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
