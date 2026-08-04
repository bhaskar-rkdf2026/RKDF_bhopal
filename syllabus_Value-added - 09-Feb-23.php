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
<h2 class="titleDescription"><a href=""> VALUE ADDED COURSES (APPROVED) SYLLABUS</a></h2>
               
                <p>&nbsp;</p>   <p>&nbsp;</p>
                
                <ul>
   <li class="style9">   <p>&nbsp;&nbsp;&nbsp;<strong>&nbsp;<span class="style1">SELECT PROGRAM</span></strong>  &nbsp;
				  <select onChange="window.location.href=this.value">
				<?php
				include "include/syllabus.php";
				?>
		       </select> </p>
			   </li> 
   <br/>					
									
					                <li class="style9"><br/>	
                </li> 
                </ul>
                <ul>
                  <li class="style9">
                    
                    <p>&nbsp;</p>
                  </li>
                </ul>
                <ul><p>
				
				
				</p>
                  <table width="673"  border="1" cellpadding="1" cellspacing="0" >
                    <tr>
                      <td height="58" class="style10">&nbsp;Name of Faculty</td>
                      <td class="style10">&nbsp;Detail of Value Added Courses</td>
                      <td><span class="style10">&nbsp;Course coordinators</a></span></td>
					  <td width="40">&nbsp;<a href="#" class="style6"></a></td>
                    </tr>
				    <tr>
                      <td width="146" rowspan="3" class="style7">&nbsp;Faculty of Pharmacy</td>
                      <td width="250" height="34" class="style8">&nbsp;Research tools & Applications</td>
					   <td width="196" height="34" class="style8">&nbsp;Dr. Santram Lodhi</td>
                      <td width="40" rowspan="3"><a href="syllabus/Value-Added-Course/VOA- FOP.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="27" class="style8">&nbsp;Writing & Publication Ethics</td>
					    <td height="27" class="style8">&nbsp;Dr. Sandeep Sahu</td>
                    </tr>
                    <tr>
                      <td height="27" class="style8">&nbsp;Excellent Applied Practices</td>
					    <td height="27" class="style8">&nbsp;Dr. Abhishek Dwivedi</td>
                    </tr>
                    <tr>
                      <td width="146" rowspan="4" class="style7">&nbsp;Faculty of Engineering</td>
                      <td width="250" height="40" class="style8">&nbsp;Personality Development</td>
					   <td width="196" height="40" class="style8">&nbsp;Mr. Chirag Gupta</td>
                      <td width="40" rowspan="4"><a href="syllabus/Value-Added-Course/VAC Engineering.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="34" class="style8">&nbsp;Soft Skills</td>
					   <td width="196" height="34" class="style8">&nbsp;Mr. Arun Rai</td>
                    </tr>
                    <tr>
                      <td height="34" class="style8">&nbsp;Computer Proficiency</td>
					   <td width="196" height="34" class="style8">&nbsp;Mr. Anubhav Shukla</td>
                    </tr>
                    <tr>
                      <td height="34" class="style8">&nbsp;Scientific Writing</td>
					   <td width="196" height="34" class="style8">&nbsp;Dr. Ravi Kumar Singh Pippal</td>
                    </tr>
                    <tr>
                      <td height="49" class="style7">&nbsp;Faculty of Paramedical Sciences</td>
                      <td class="style8">&nbsp;A Basic Course on Health Care</td>
					   <td width="196" height="49" class="style8">&nbsp;Dr. Pawan Patidar</td>
					  
                      <td><a href="syllabus/Value-Added-Course/VOC - PMS.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td rowspan="2" class="style7">&nbsp;Faculty of Science</td>
                      <td height="34" class="style8">&nbsp;Making of Agniveer (अग्निवीर)</td>
					  <td width="196" height="34" class="style8">&nbsp;Subedar Major Arjun Prasad</td>
                      <td rowspan="2">&nbsp;<a href="syllabus/Value-Added-Course/VAC - FOS.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="52" class="style8">&nbsp;A basic Course on Diet Nutrition (VCDN) and Crime Investigation <br /> &nbsp; and Forensic Biology (VCFB)</td>
					  <td width="196" height="52" class="style8">&nbsp;Dr. C.B.S. Dangi and <br />Ms. Rimpa Manna</td>
                    </tr>
                    <tr>
                      <td width="146" rowspan="3" class="style7">&nbsp;Faculty of Law</td>
                      <td width="250" height="34" class="style8">&nbsp;Human Rights</td>
					   <td width="196" height="34" class="style8">&nbsp;Dr. Prince Gupta</td>
                      <td width="40" rowspan="3"><a href="syllabus/Value-Added-Course/VAC - FOL.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="34" class="style8">&nbsp;Cyber Security</td>
					   <td width="196" height="34" class="style8">&nbsp;Ms. Anshuma Upadhyay</td>
                    </tr>
                    <tr>
                      <td height="34" class="style8">&nbsp;Intellectual Property Rights, Law of Copyrights, Information Technology</td>
					   <td width="196" height="34" class="style8">&nbsp;Dr. Shikha Bhawani Malviya</td>
                    </tr>
                    <tr>
                      <td width="146" rowspan="3" class="style7">&nbsp;Faculty of Agriculture</td>
                      <td width="250" height="34" class="style8">&nbsp;Gardening & Horticulture</td>
					   <td width="196" height="34" class="style8">&nbsp;Mr. Vivek Gumasta</td>
                      <td width="40" rowspan="3"><a href="syllabus/Value-Added-Course/VAC - Agriculture.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="34" class="style8">&nbsp;Food Processing and Value Addition</td>
					   <td width="196" height="34" class="style8">&nbsp;Ms. Charu Bhagat</td>
                    </tr>
                    <tr>
                      <td height="34" class="style8">&nbsp;Vermi Compost</td>
					   <td width="196" height="34" class="style8">&nbsp;Dr. Shuchi Gangwar</td>
                    </tr>
                    <tr>
                      <td height="44" class="style7">&nbsp;Faculty of Ayurveda</td>
                      <td class="style8">&nbsp;Certificate Course in Yoga and Pranayama</td>
					  <td width="196" height="44" class="style8">&nbsp;Ms. Pooja Dangi</td>
                      <td>&nbsp;<a href="syllabus/Value-Added-Course/VAC - Ayurveda.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="47" class="style7">&nbsp;Faculty of Architecture</td>
                      <td class="style8">&nbsp;AutoCAD</td>
					   <td class="style8">&nbsp;Dr. Nemisha Rajput</td>
                      <td>&nbsp;<a href="syllabus/Value-Added-Course/VAC - Architecture.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td width="146" rowspan="4" class="style7">&nbsp;Faculty of Homeopathy and Medical Sciences</td>
                      <td width="250" height="31" class="style8">&nbsp;Preparation of Homeopathic Medicine</td>
					   <td class="style8">&nbsp;Dr. Sandeepa Sahu</td>
                      <td width="40" rowspan="4"><a href="syllabus/Value-Added-Course/VAC - Homoeopathy.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="28" class="style8">&nbsp;Knowledge of Biochemic Medicine</td>
					   <td class="style8">&nbsp;Dr. Alok Mittal</td>
                    </tr>
                    <tr>
                      <td height="29" class="style8">&nbsp;Water Purification</td>
					   <td class="style8">&nbsp;Dr. Mahesh Mishra</td>
                    </tr>
                    <tr>
                      <td height="31" class="style8">&nbsp;Medicinal Plants in India</td>
					   <td class="style8">&nbsp;Dr. Sandhya Sahu</td>
                    </tr>
                    <tr>
                      <td rowspan="2" class="style7">&nbsp;Faculty of Computer Application</td>
                      <td height="39" class="style8">&nbsp;Microsoft Excel</td>
					   <td class="style8">&nbsp;Dr. Sandeep Dubey</td>
                      <td rowspan="2" class="style8">&nbsp;<a href="syllabus/Value-Added-Course/VAC - Computer Applications.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="50" class="style8">&nbsp;Web Designing </td>
					   <td class="style8">&nbsp;Dr. Sandeep Dubey</td>
                    </tr>
                    <tr>
                      <td rowspan="2" class="style7">&nbsp;Faculty of Commerce</td>
                      <td height="40" class="style8">&nbsp;E-Accounting and Tally with GST Accounting</td>
					   <td class="style8">&nbsp;Ms. Suboora</td>
                      <td rowspan="2" class="style8">&nbsp;<a href="syllabus/Value-Added-Course/VAC - Commerce.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="33" class="style8">&nbsp;Accounting and Tally</td>
					   <td class="style8">&nbsp;Mr. Ankur Shukla</td>
                    </tr>
                    <tr>
                      <td width="146" rowspan="5" class="style7">&nbsp;Faculty of Management</td>
                      <td width="250" height="35" class="style8">&nbsp;Soft Skills</td>
					  <td rowspan="3" class="style8">&nbsp;Dr. Pratyush Tripathi</td>
                      <td width="40" rowspan="5"><a href="syllabus/Value-Added-Course/VCA - FOM.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="29" class="style8">&nbsp;Direct Marketing</td>
				    </tr>
                    <tr>
                      <td height="35" class="style8">&nbsp;Quantitative Aptitude for success <br /> in Competitive Examinations</td>
				    </tr>
                    <tr>
                      <td height="34" class="style8">&nbsp;Capital Markets</td>
					  <td rowspan="2" class="style8">&nbsp;Dr. Satendra S Thakur</td>
                    </tr>
                    <tr>
                      <td height="35" class="style8">&nbsp;Basic tools of Statistics</td>
				    </tr>
                    <tr>
                      <td height="39" class="style7">&nbsp;Faculty of Education</td>
                      <td class="style8">&nbsp;Creative Craft</td>
					   <td class="style8">&nbsp;Dr. M.S. Pawar</td>
                      <td>&nbsp;<a href="syllabus/Value-Added-Course/VAC - Education.pdf" target="_blank" class="style6">OPEN</a></td>
                    </tr>
                    <tr>
                      <td width="146" rowspan="3" class="style7">&nbsp;Faculty of Nursing</td>
                      <td width="250" height="34" class="style8">&nbsp;Care of Diabetics</td>
					  <td class="style8">&nbsp;Ms. Rashmi Yadav</td>
                      <td width="40" rowspan="3"><a href="#">OPEN</a></td>
                    </tr>
                    <tr>
                      <td height="27" class="style8">&nbsp;Stress Management</td>
					  <td class="style8">&nbsp;Ms. Annie Robin Joseph</td>
                    </tr>
                    <tr>
                      <td height="31" class="style8">&nbsp;Personality Development</td>
					  <td class="style8">&nbsp;Ms. Priya Baine</td>
                    </tr>
                  </table>
                </ul>
           
                <div align="justify"></div>
</section>
			<!--- contentLeft -->
  <section id="sideBar">  </section>
			<!--- sideBar -->
			<br class="clear" />
		</section>
<!--- content -->		
<script type="text/javascript">
				jQuery(document).ready(function($){
						$('#mainNav li').hover(
					function(){ jQuery(this).find('.dropdown').fadeIn(300); },
					function(){ jQuery(this).find('.dropdown').fadeOut(200); }
				);
				});	
</script>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
