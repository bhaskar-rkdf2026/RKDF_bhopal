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
            <h2 class="titleDescription"><a href=""> Bachelor of Engineering (B.E.) Syllabus</a></h2>

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
                    <table width="400" border="1">
                        <tr style="background-color: darkgray;">
                            <td><span class="style3" Colspan=3  style="font-size:medium;"><br />1st & 2nd Sem Common</span></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3"><a
                                    href="syllabus/Technical syllabus/B.E/BE I Year (All Branches) for 2018 admitted.pdf"
                                    target="_blank"><strong> &nbsp; Bachelor of Engineering(B.E.) Common to All Branch
                                        2018 Admitted &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></a></td>
                        </tr>
                        <tr>
                            <td colspan="3"><a
                                    href="syllabus/Technical syllabus/B.E/BE I Year (All Branches) for 2020 admitted.pdf"
                                    target="_blank"><strong> &nbsp; Bachelor of Engineering(B.E.) Common to All Branch
                                        2020 Admitted&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></a></td>
                        </tr>


                        <tr style="background-color: darkgray;">
                            <td width="388" height="67" colspan=3 style="padding-top:22px;"><span class="style3" style="font-size:medium;">New Scheme & Syllabus For Admitted Student
                                    June 2025<br /><br />
                                    3rd Sem To 8th Sem </span></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (Mechanical Engineering)</td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech_ME_SCHEME_ 3 TO 8 UPDATED_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/BTech-ME-Final Syllabus-3rd-8th-Sem.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (Civil Engineering)</td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech_Civil_Scheme_3rd_8th_Sem_2025_26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/BTech_Civil_Syllabus_3rd_8th_Sem_1.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (CSE Engineering) </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech_CSE_SCHEME_ 3 TO 8 UPDATED_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/BTech CSE Syllabus 2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (EC Engineering) </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech_ECE_SCHEME_ 3 TO 8 UPDATED_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/BTech_Electronic_3rd_8th_Sem_Syllabus_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (EE Engineering) </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech_EE_SCHEME_ 3 TO 8 UPDATED_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/BTech_EE-FINAL SYLLABUS_3rd_8th_Sem.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (EEE Engineering) </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech_EEE_SCHEME_ 3 TO 8 UPDATED_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="12">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/B.Tech_EEE-FINAL SYLLABUS_3rd_8th_Sem.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (IT Engineering) </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech_IT_SCHEME_ 3 TO 8 UPDATED_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/BTech IT Syllabus 2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (AI & Data Science Engineering)
                            </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech_AI & Data Science SCHEME 3 TO 8 UPDATED_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/BE_AI & DS_ Syllabus_3rd_8th_Sem_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (AI & ML Engineering) </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech_AI & ML SCHEME 3 TO 8 UPDATED_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="12">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/BE_AI & ML_Syllabus_3rd_8th_ 2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:black; font-size:medium"> B.E. (CSE- IoT & Cyber Security
                                Engineering) </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Scheme/BTech CSE- IoT & Cyber Security SCHEME 3 TO 8 UPDATED_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Scheme
                                </a>
                            </td>
                            <td colspan="2">
                                <a href="syllabus/Technical syllabus/B.E/NewSyllabus/Syllabus/BE_CSE - IoT & Cyber Security_3rd_8th_Syllabus_2025-26.pdf"
                                    target="_blank" style="color:blue; font-size:medium"> Syllabus
                                </a>
                            </td>
                        </tr>





                        <tr style="background-color: darkgray;">
                            <td width="388" height="76"><span class="style3" colspan="3" style="padding-top:22px;font-size:medium">(Old Scheme)<br />
                                    <br />
                                    2nd to 4th Year ( 3rd to 8th SEM ALL) </span></td>
                        </tr>

                        <tr>
                            <td colspan="2"><a href="syllabus/Technical syllabus/B.E/CE Syllabus.pdf"
                                    target="_blank"><strong> B.E. ( CIVIL Engineering )</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Technical syllabus/B.E/CSE Syllabus.pdf"
                                    target="_blank"><strong>B.E. ( CSE Engineering )</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Technical syllabus/B.E/EC Syllabus.pdf"
                                    target="_blank"><strong>B.E. (Electronics and Comm. Engg.) EC</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Technical syllabus/B.E/EE Syllabus.pdf"
                                    target="_blank"><strong>B.E. (Electrical Engineering) EE</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Technical syllabus/B.E/EX Syllabus.pdf"
                                    target="_blank"><strong>B.E. (Electrical and Electronics ) EX</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Technical syllabus/B.E/IT Syllabus.pdf"
                                    target="_blank"><strong>B.E. (Information Tech.) IT</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Technical syllabus/B.E/ME Syllabus.pdf"
                                    target="_blank"><strong>B.E. ( Mechanical Engineering) ME</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>
                </li>
            </ul>
            <ul>
                <p>&nbsp;</p>
                <li class="style9"></li>
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
