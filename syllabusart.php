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
            <h2 class="titleDescription"><a href="#"> (Social Science) Syllabus</a></h2>

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
                            <td width="388"><span class="style3" Style="font-size:medium"><br />
                                    Syllabus According to New Education Policy (NEP) </span></td>
                            <td width="167">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA in Psychology.pdf" target="_blank"><strong>&nbsp;B.A. 1st & 2nd SEM - PSYCHOLOGY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/BA.pdf" target="_blank"><strong>&nbsp;B.A. 1st
                                        SEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/BA-2nd-Sem.pdf" target="_blank"><strong>&nbsp;B.A. 2nd
                                        SEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/BA-3rd-sem.pdf" target="_blank"><strong>&nbsp;B.A. 3rd
                                        SEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/BA-4th-sem.pdf" target="_blank"><strong>&nbsp;B.A. 4th
                                        SEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/BA 5th Sem Syllabus.pdf"
                                    target="_blank"><strong>&nbsp;B.A. 5th
                                        SEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/BA 6TH SEMESTER All new.pdf"
                                    target="_blank"><strong>&nbsp;B.A. 6th
                                        SEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <label style="color:blue;font-size: large;font-weight: 800;">BA SEM 7 & 8</label>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/B.A-HI-701 &702.pdf"
                                    target="_blank"><strong>&nbsp;B.A-HI-701 &702 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-EC- 701& 702.pdf"
                                    target="_blank"><strong>&nbsp;BA-EC- 701& 702 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-EN-701 & 702.pdf"
                                    target="_blank"><strong>&nbsp;BA-EN-701 & 702 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BAHS-701 & 702.pdf"
                                    target="_blank"><strong>&nbsp;BAHS-701 & 702 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-PS-701 & 702.pdf"
                                    target="_blank"><strong>&nbsp;BA-PS-701 & 702 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-SO-701 & 702.pdf"
                                    target="_blank"><strong>&nbsp;BA-SO-701 & 702 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/Research Methodology 703.pdf"
                                    target="_blank"><strong>&nbsp;Research Methodology 703 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/B.A-HI-801 & 802.pdf"
                                    target="_blank"><strong>&nbsp;B.A-HI-801 & 802 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-EC- 801 & 802.pdf"
                                    target="_blank"><strong>&nbsp;BA-EC- 801 & 802 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-EN- 801 & 802 .pdf"
                                    target="_blank"><strong>&nbsp;BA-EN- 801 & 802 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BAHS-801 & 802 .pdf"
                                    target="_blank"><strong>&nbsp;BAHS-801 & 802 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-PS-801 & 802.pdf"
                                    target="_blank"><strong>&nbsp;BA-PS-801 & 802 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/SocialScience/Dec2025/BA78/BA-SO-801 & 802.pdf"
                                    target="_blank"><strong>&nbsp;BA-SO-801 & 802 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/Hindi Literature.pdf"
                                    target="_blank"><strong>&nbsp;B.A. Hindi Literature 1st
                                        Year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/NEP/BA-ENVIRONMNT SYLLSBUS.pdf"
                                target="_blank"><strong>&nbsp;B.A. Environmental Studies 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label style="color:blue;font-size: large;font-weight: 800;">MA - ALL SEM </label>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><br>
                                <a href="syllabus/NEP/M.A. Hindi.pdf"
                                    target="_blank"><strong>M.A. Hindi - ALL SEM &nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><br>
                                <a href="syllabus/NEP/MA ECONOMICS.pdf"
                                    target="_blank"><strong>MA ECONOMICS - ALL SEM &nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><br>
                                <a href="syllabus/NEP/MA- ENGLISH NEP SYLLABUS.pdf"
                                    target="_blank"><strong>MA- ENGLISH NEP SYLLABUS - ALL SEM &nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><br>
                                <a href="syllabus/NEP/MA- HISTORY.pdf"
                                    target="_blank"><strong>MA- HISTORY - ALL SEM &nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><br>
                                <a href="syllabus/NEP/MA- POLITICAL SCI. NEP SYLLABUS.pdf"
                                    target="_blank"><strong>MA- POLITICAL SCI. NEP SYLLABUS - ALL SEM &nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><br>
                                <a href="syllabus/NEP/MA PSYCHOLOGU NEP SYLLABUS.pdf"
                                    target="_blank"><strong>MA PSYCHOLOGY NEP SYLLABUS - ALL SEM &nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><br>
                                <a href="syllabus/NEP/MA SOCIOLOGY.pdf"
                                    target="_blank"><strong>MA SOCIOLOGY - ALL SEM &nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="388"><span class="style3" style="font-weight: 800;font-size: medium;"><br />BA 1st to 3rd Year (1st to 6th SEM ALL) </span></td>
                            <td width="167">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/B.A. Syllabus.pdf"
                                    target="_blank"><strong>&nbsp;B.A.
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="388"><span class="style3" style="font-weight: 800;font-size: medium;"><br />
                                    MA 1st to 2nd Year (1st to 4th SEM ALL) </span></td>
                            <td width="167">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/M.A. Hindi.pdf"
                                    target="_blank"><strong>&nbsp;M.A.(Hindi)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>

                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/MA Ecnomics  .pdf"
                                    target="_blank"><strong>&nbsp; M.A.(Ecnomics)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>

                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/M.A. (ENGLISH).pdf"
                                    target="_blank"><strong>&nbsp; M.A. (English)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>

                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/M.A. Polatical Sc.pdf"
                                    target="_blank"><strong>&nbsp; M.A.(Political Science)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>

                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/M.A. History.pdf"
                                    target="_blank"><strong>&nbsp; M.A.(History)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>

                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/M.A Sanskrit.pdf"
                                    target="_blank"><strong>&nbsp; M.A.(Sanskrit)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>

                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/MA Psychology.pdf"
                                    target="_blank"><strong>&nbsp; M.A.(Psychology)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>

                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="34" colspan="2"><a
                                    href="syllabus/Non Technical Syllabus/M.A. SOCIOLOGY I-IVth Sem.pdf"
                                    target="_blank"><strong>&nbsp; M.A.(Sociology)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>

                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="388"><span class="style3"><br />
                                    BSW 1st to 3rd Year (1st to 6th SEM ALL ) </span></td>
                            <td width="167">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/BSW Syllabus.pdf"
                                    target="_blank"><strong>&nbsp;
                                        BSW&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="388"><span class="style3"><br />
                                    MSW 1st to 2nd Year (1st to 4th SEM ALL ) </span></td>
                            <td width="167">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="syllabus/Non Technical Syllabus/MSW Syllabus.pdf"
                                    target="_blank"><strong>&nbsp;
                                        MSW&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></a>
                            </td>
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
