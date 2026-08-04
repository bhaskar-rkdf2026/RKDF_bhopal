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
<section id="content" class="wrapper "  style="height: 1950px;">
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
                    <table width="626" height="750" border="1">
                        <tr>
                            <td width="516" height="52"><span class="style3"><br />
                         Syllabus According to New Education Policy (NEP) </span></td>
                            <td width="39">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
						<tr>
                            <td width="516" height="38"><span class="style3">
                         NEP 3RD YEAR SYLLABUS - 5TH SEMESTER </span></td>
                            <td width="39">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><br><strong style="color: navy;">DSE </strong></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/5th Sem Biotech DSE.pdf" target="_blank"><strong>B.SC (Biotech)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/5th Sem Computer Science DSE.pdf" target="_blank"><strong>B.SC (Computer Science)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/5th Sem Microbiology DSE.pdf" target="_blank"><strong>B.SC (Microbiology)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/5th Sem Physics DSE.pdf" target="_blank"><strong>B.SC (Physics)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/Botany Sem 5th DSE.pdf" target="_blank"><strong>B.SC (Botany)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/Chemistry DSE 5th Sem.pdf" target="_blank"><strong>B.SC (Chemistry)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/Maths DSE 5th Sem.pdf" target="_blank"><strong>B.SC (Maths)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dse/Zoology 5th Sem DSE.pdf" target="_blank"><strong>B.SC (Zoology)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        <!-- Major syllabus -->
                        <tr  height="40">
                            <td colspan="2"><br><strong style="color: navy;">MAJOR </strong></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/major/5th Sem BioTech Syallbus Major.pdf" target="_blank"><strong>B.SC (Biotech)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/major/5th Sem Computer Science Major.pdf" target="_blank"><strong>B.SC (Computer Science)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/major/5th Sem Major Microbiology.pdf" target="_blank"><strong>B.SC (Microbiology)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Physics Major 5th Sem.pdf" target="_blank"><strong>B.SC (Physics)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Botany 5th Sem Major.pdf" target="_blank"><strong>B.SC (Botany)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Chemistry 5th Sem Major.pdf" target="_blank"><strong>B.SC (Chemistry)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Maths Major 5th Sem.pdf" target="_blank"><strong>B.SC (Maths)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/major/Zoology 5th Sem Major.pdf" target="_blank"><strong>B.SC (Zoology)</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>


						<tr>
                            <td width="516" height="38"><span class="style3">
                                NEP 3RD YEAR SYLLABUS - 6TH SEMESTER </span></td>
                            <td width="39">&nbsp;</td>
                            <td width="73">&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Biotechology 6TH SEM major.pdf" target="_blank"><strong>Biotechology 6TH SEM Major</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Botany Sem 6th Major.pdf" target="_blank"><strong>Botany Sem 6th Major</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Chemistry 6th sem Major.pdf" target="_blank"><strong>Chemistry 6th Sem Major</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Comp 6th sem major.pdf" target="_blank"><strong>Comp 6th Sem Major</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Maths 6th sem major.pdf" target="_blank"><strong>Maths 6th Sem Major</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Microbiology 6th sem.pdf" target="_blank"><strong>Microbiology 6th Sem</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Phy 6th sem major.pdf" target="_blank"><strong>Phy 6th Sem Major</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/major/Zoology Sem 6th Major.pdf" target="_blank"><strong>Zoology Sem 6th Sem Major</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        <!-- DSE - I -->
                        <tr  height="40">
                            <td colspan="2"><br><strong style="color: navy;">DSE - I - 6th  SEM </strong></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/dse-1/BOTANY 6 SEM DSE 1.pdf" target="_blank"><strong>BOTANY 6 SEM DSE - 1</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/dse-1/CHEMISTRY 6th Sem DSE 1.pdf" target="_blank"><strong>CHEMISTRY 6th Sem DSE - 1</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/dse-1/NEP Maths 6th DSE 1.pdf" target="_blank"><strong>NEP Maths 6th DSE - 1</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_6_Sem/dse-1/" target="_blank"><strong><Physics 6th DSE - 1/strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>


                        <!-- DSE - II -->
                        <tr  height="40">
                            <td colspan="2"><br><strong style="color: navy;">DSE - II </strong></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/Scheme semester.pdf" target="_blank"><strong>Scheme Semester</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/BIOTECHNOLOGY dse 2.pdf" target="_blank"><strong>BIOTECHNOLOGY DSE - II</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/BOTANY 6 SEM dse 2.pdf" target="_blank"><strong>BOTANY 6 SEM DSE - II</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/CHEMISTRY 6th SEM DSE Paper 2.pdf" target="_blank"><strong>CHEMISTRY 6th SEM DSE - II Paper 2</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/comp dse 2.pdf" target="_blank"><strong>COMPUTER SCIENCE - DSE - II  </strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/miro dse 2.pdf" target="_blank"><strong>B.Sc. (Microbiology) - DSE - II</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/nep Maths6th dse2.pdf" target="_blank"><strong>B.Sc. (Maths) – DSE - II</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr  height="40">
                            <td colspan="2"><a href="syllabus/NEP/MAJOR/Science_5_Sem/dseII/Zoology DSE Paper 2.pdf" target="_blank"><strong>Zoology DSE - II Paper 2</strong></a>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <!-- DSE - II Ends Here -->


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
