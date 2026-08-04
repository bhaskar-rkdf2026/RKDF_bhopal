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
      <h2 class="titleDescription"><a href=""> Syllabus according to (NEP) 2022 </a></h2>

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
          <table width="640" height="621" border="1">


            <!-- [Commented on 22-April-2021 as per discussions with Dy. Register]
							<tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC (PHYSICS).pdf"
                                    target="_blank"><strong> (PHYSICS)</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC (CHEMISTRY).pdf"
                                    target="_blank"><strong>(CHEMISTRY) </strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC (Maths).pdf"
                                    target="_blank"><strong>(MATHS)</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC (ZOOLOGY).pdf"
                                    target="_blank"><strong> (ZOOLOGY)</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC(Botany).pdf"
                                    target="_blank"><strong> (BOTANY)</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC (Biology).pdf"
                                    target="_blank"><strong>(BIOLOGY)</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC (MICROBIOLOGY).pdf"
                                    target="_blank"><strong>(MICROBIOLOGY)</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC (BIOTECHNOLOGY).pdf"
                                    target="_blank"><strong> (BIOTECHNOLOGY)</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC (ELECTRONICS).pdf"
                                    target="_blank"><strong>(ELECTRONICS)</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/MINOR/MAJORNon Technical syllabus/NEP/MINOR/MAJORB.SC (CS).pdf"
                                    target="_blank"><strong> (COMPUTER SCIENCE)</strong></a></td>
                            <td>&nbsp;</td>
                        </tr>
						-->
            <tr>
              <td width="516" height="52"><span class="style3"><br />
                  Syllabus According to New Education Policy (NEP) </span></td>
              <td width="39">&nbsp;</td>
              <td width="73">&nbsp;</td>
            </tr>
            <tr>
              <td width="516" height="25"><span class="style3">
                  NEP MINOR 1ST SEM SYLLABUS </span></td>
              <td width="39">&nbsp;</td>
              <td width="73">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_Physic.pdf" target="_blank"><strong> B.SC
                    (PHYSICS)</strong></a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_Zoology.pdf" target="_blank"><strong>B.SC
                    (ZOOLOGY)</strong></a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_CHEM.pdf" target="_blank"><strong>B.SC
                    (CHEMISTRY) </strong></a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_EVS.pdf" target="_blank"><strong>B.SC
                    (ENVIRONMENTAL)</strong></a></td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_Botany.pdf" target="_blank"><strong>B.SC
                    (BOTANY)</strong></a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_Micro.pdf" target="_blank"><strong>B.SC
                    (MICROBIOLOGY)</strong></a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_Mathamatic.pdf" target="_blank"><strong>B.SC
                    (MATHEMATICS)</strong></a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_Biotech.pdf" target="_blank"><strong>B.SC
                    (BIOTECHNOLOGY)</strong></a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_CS.pdf" target="_blank"><strong>B.SC
                    (COMPUTER SCIENCE)</strong></a></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/Minor_Forensic.pdf" target="_blank"><strong>B.SC
                    (FORENSIC SCIENCE)</strong></a></td>
              <td>&nbsp;</td>
            </tr>

            <tr>
              <td height="45" colspan="2"><a href="syllabus/NEP/MINOR/Minor_Electronics.pdf"
                  target="_blank"><strong>B.SC (ELECTRONICS)</strong></a></td>
              <td>&nbsp;</td>
            </tr>


            <tr>
              <td colspan="2">
				<a style="font-weight: 700;font-size: larger;"><h2>NEP - Semester - II Syllabus</h2></a>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Biotech-Syllabus-SEM-2.pdf" target="_blank">
                  <strong>NEP B.Sc. Minor Biotech Syllabus SEM-II</strong></a>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Botany-Syllabus-SEM-2.pdf" target="_blank">
                  <strong>NEP B.Sc. Minor Botany Syllabus SEM-II</strong></a>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/NEP-BSc-Minor-CS-Syllabus-SEM-2.pdf" target="_blank">
                  <strong>NEP B.Sc. Minor CS Syllabus SEM-II</strong></a>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Forensic-Science-SEM-2.pdf" target="_blank">
                  <strong>NEP B.Sc. Minor Forensic Syllabus SEM-II</strong></a>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Mathamatic-SEM-2.pdf" target="_blank">
                  <strong>NEP B.Sc. Minor Mathamatics Syllabus SEM-II</strong></a>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/NEP-BSc-Minor-MChemistry-SEM-2.pdf" target="_blank">
                  <strong>NEP B.Sc. Minor Chemistry Syllabus SEM-II</strong></a>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Physics-SEM-2.pdf" target="_blank">
                  <strong>NEP B.Sc. Minor Physics Syllabus SEM-II</strong></a>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <tdcolspan="2"><a href="syllabus/NEP/MINOR/NEP-BSc-Minor-Zoology-SEM-2.pdf" target="_blank">
                  <strong>NEP B.Sc. Minor Zoology Syllabus SEM-II</strong></a>
              </td>
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
    jQuery(document).ready(function ($) {
      $('#mainNav li').hover(
        function () {
          jQuery(this).find('.dropdown').fadeIn(300);
        },
        function () {
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
