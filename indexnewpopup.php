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
<!--- popbox Model    -->

    <!--<div class="container">

                <h2>CSS3 Modal</h2>

                <p><a href="#modal" class="btn go">Activate Modal</a></p>

        </div>

    

        <div id="modal">

                <div class="modal-content">

                        <div class="header">

                                <h2>Modal Heading</h2>

                                <a href="#" class="btn"><img src="close.png"></a>

                        </div>

                        <div class="copy">

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        </div>

                        <div class="cf footer">

                        </div>

                </div>

                <div class="overlay">

                </div>

        </div>

        -->

    <!--- ------------------  Popbox Model --------------------------------------------------->





    <section id="content" class="wrapper ">

        <section id="spotlight">

            <!--- slider -->

            <div class="sixteen columns">
                <div class="slider-wrapper fullwidth">
                    <div class="news_pad">
                        <!--				<div id="admission" title="UGC REPORT">

    <a href="ugccomnt.php" target="_blank"> <span ><img src="images/img/ugclogo2.jpg" width="34" height="41" /></span></a>

    <h3><a href="ugccomnt.php" target="_blank">UGC Report </a></h3>

    <h3><a href="ugccomnt.php" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;submitted  </a></h3>

</div>-->
                        <!--<div id="admission" title="ADMISSION NOTICE"> <a href="images/06/WARNING.pdf" target="_blank"> <span ><img src="images/Warning.png" width="33" height="39" /></span></a>

                          <h3><a href="images/06/WARNING.pdf" target="_blank">ADMISSION/ </a></h3>

                        <h3><a href="images/06/WARNING.pdf" target="_blank">ALERT </a></h3>

                      </div>-->

                        <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="ncc.php"> <img src="images/NCC Av.gif" width="160" height="21" border="0" alt="NATIONAL CADET CORPS (NCC)" /></a>-->
                        <div id="admission" title="current Events">
                            <!--<img src="images/news_events_title.jpg" width="189" height="26" border="0" alt="" /><a href="enrollment.php"> <img src="exam/enrll.jpg" width="164" height="27"  /> </a>-->
                            <img src="images/news_events_title.jpg" width="189" height="26" border="0" alt="" />
                        </div>
                        <div class="news_cont">
                            <marquee direction="up" behavior="scroll" style="height:260px;" scrollamount="3"
                                onmouseover="this.stop();" onmouseout="this.start();">
                                <ul>

                                    <li>
                                        <div class="left"><a href="images/" target="_blank"><img
                                                    src="images/06/pdf.jpg" width="60" height="40" /></a></div>
                                        <p><a href="https://rkdf.ac.in/Content/Documents/NAAC-Certificate-of-Accrediation-RKDF-University-Bhopal.pdf" target="_blank">
                                                <strong1>NAAC Certificate of Accrediation</strong1>
                                                <br />
                                                NAAC Certificate of Accrediation, RKDF University
                                            </a><br />

                                        </p>
                                    </li>
                                    <li>
                                        <div class="left"><a href="images/06/Womens Achievers.pdf" target="_blank"><img
                                                    src="images/womens day.png" width="60" height="40" /></a></div>
                                        <p><a href="images/06/Womens Achievers.pdf" target="_blank">
                                                <strong1>Womens Achiever's Award</strong1>
                                                <br />
                                                Dainik Bhaskar Women Achiever's award- 2023
                                            </a><br />

                                        </p>
                                    </li>
                                    <li>
                                        <div class="left"><a href="UPI Notice 2024.pdf" target="_blank"><img
                                                    src="images/img/notice imp.jpg" width="89" height="40" /></a></div>
                                        <p><a href="UPI Notice 2024.pdf" target="_blank">
                                                <strong1> UPI NOTICE</strong1> <img src="images/img/new11.gif" />
                                                <br />
                                                Technical Glitch in UPI Transactions.
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    <li>
                                        <div class="left"><a href="Download/JOB_ORIENTED_PROG.pdf" target="_blank"><img
                                                    src="images/img/result.jpg" width="80" height="65" /></a></div>
                                        <p><a href="Download/JOB_ORIENTED_PROG.pdf" target="_blank">
                                                <strong1>&nbsp; JOB ORIENTED</strong1> <img
                                                    src="images/img/new11.gif" />
                                                <br />
                                                &nbsp;Certificate courses for Aspirants students (Skill Development Progammes)
                                            </a><br />
                                        </p>
                                    </li>

                                    <li>
                                        <div class="left"><a href="odl.php"><img src="images/img/result.jpg"
                                                    width="80" height="65" /></a></div>
                                        <p><a href="odl.php">
                                                <strong1> Open and Distance Leaning Programs</strong1> <img src="images/img/new11.gif" />
                                            </a><br />
                                        </p>
                                    </li>

                                    <li>
                                        <div class="left"><a href="Convocation.php"><img src="images/img/result.jpg"
                                                    width="80" height="65" /></a></div>
                                        <p><a href="Convocation.php">
                                                <strong1> दीक्षांत समारोह-2024</strong1>
                                                <br />
                                                &nbsp;Convocation Ceremony- 2024 <img src="images/img/new11.gif" />
                                            </a><br />
                                        </p>
                                    </li>


                                    <li>
                                        <div class="left"><a href="images/seminar/web.pdf" target="_blank"><img
                                                    src="images/img/result.jpg" width="80" height="65" /></a></div>
                                        <p><a href="images/seminar/web.pdf" target="_blank">
                                                <strong1>Expert Lecture</strong1>
                                                <br />
                                                &nbsp;Expert Talk on Web GIS and Development Using Open Source software
                                                on 10th-Feb- 2024 <img src="images/img/new11.gif" /> <br />
                                            </a>
                                        </p>
                                    </li>



                                    <!--<li>
                                        <div class="left"><a href="images/06/CAPT_CFS.pdf" target="_blank"><img
                                                    src="images/img/result.jpg" width="80" height="65" /></a></div>
                                        <p><a href="images/06/CAPT_CFS.pdf" target="_blank">
                                                <strong1>Education Visit</strong1>
                                                <br />
                                                &nbsp;RKDF Students ( Science,Paramedical and NCC) have  gone on an Education visit to Central Forensic Science Laboratory & Forensic Unit of Central Academy for Police Training, Bhopal, Ministry of Home Affairs Government of  India<img src="images/img/new11.gif" /> <br />
                                            </a>
                                        </p>
                                    </li>-->
                                    <li>
                                        <div class="left"><a href="images/seminar/International Seminar.pdf"
                                                target="_blank"><img src="images/img/result.jpg" width="80"
                                                    height="65" /></a></div>
                                        <p><a href="images/seminar/International Seminar.pdf" target="_blank">
                                                <strong1>International Seminar</strong1>
                                                <br />
                                                &nbsp;Two Days International Seminar on Current Biotech Cutting edge
                                                technology. 04-05th Jan 2024 <img src="images/img/new11.gif" /> <br />
                                            </a>
                                        </p>
                                    </li>


                                    <!--<li>
                                        <div class="left"><a href="images/SCIENCE OF HAPPINESS.pdf" target="_blank"><img
                                                    src="images/happyness.jpg" width="80" height="65" /></a></div>
                                        <p><a href="images/SCIENCE OF HAPPINESS.pdf" target="_blank">
                                                <strong1>Science of Happiness</strong1>
                                                <br />
                                                &nbsp;Rising India Through Spiritual Empowerment National Education
                                                Campaign. 21st November 2023  <br />
                                            </a>
                                        </p>
                                    </li>-->
                                    <li>
                                        <div class="left"><a href="ayurveda/Ayurveda_Day.pdf" target="_blank"><img
                                                    src="images/img/yoga2.jpg" width="80" height="65" /></a></div>
                                        <p><a href="ayurveda/Ayurveda_Day.pdf" target="_blank">
                                                <strong1>National Ayurveda Day </strong1>
                                                <br />
                                                &nbsp;Professional Development Program at Ram Krishna College of
                                                Ayurveda and Medical Sciences (RKCAMS) from 6th to 10th November 2023
                                                <br />
                                            </a> <br />
                                        </p>
                                    </li>
                                    <!-- <li>
                                        <div class="left"><a href="https://rkdf.ac.in/phdresult2023.pdf"
                                                target="_blank"><img src="images/img/result.jpg" width="80"
                                                    height="65" /></a></div>
                                        <p><a href="https://rkdf.ac.in/phdresult2023.pdf">
                                                <strong1>Ph.D. Result -2023</strong1>
                                                <br />
                                                &nbsp;Ph.D. Result- 2023  <br />
                                            </a> <br />
                                        </p>
                                    </li>
-->


                                    <li>
                                        <div class="left"><a href="images/img/Model_Exhibition.jpeg"
                                                target="_blank"><img src="images/img/Model_Exhibition.jpeg" width="80"
                                                    height="65" /></a></div>
                                        <p><a href="images/img/Model_Exhibition.jpeg" target="_blank">
                                                <strong1>Model Exhibition</strong1>
                                                <br />
                                                &nbsp;Celebrating the talent, technology, and innovation transforming
                                                the future,November 1st, 2023 <br />
                                            </a><a href="https://forms.gle/U8M9JEV1CFcy8WZD7"
                                                target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
                                                    class="blink"> Register Here </span></a><br />
                                        </p>
                                    </li>
                                    <!-- <li>
                                        <div class="left"><a href="images/06/Seminar_report.pdf" target="_blank"><img
                                                    src="images/img/result.jpg" width="80" height="65" /></a></div>
                                        <p><a href="images/06/Seminar_report.pdf" target="_blank">
                                                <strong1>National Seminar</strong1>
                                                <br />
                                                &nbsp;National Seminar on Emerging Production and Productivity of Crops
                                                on 13 th of October 2023 <br />
                                            </a> <br />
                                        </p>
                                    </li>-->

                                    <li>
                                        <div class="left"><a href="images/06/Awards2023.pdf" target="_blank"><img
                                                    src="images/education awards.jpg" width="89" height="40" /></a>
                                        </div>
                                        <p><a href="images/06/Awards2023.pdf" target="_blank">
                                                <strong1> Awards-2023 </strong1>
                                                <br />
                                                World Education Leadership Award 2023 for Best Private University.
                                            </a> <br /> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span
                                                class="blink">&nbsp; Congratulations &nbsp;</span>
                                            <br />
                                            <br />
                                        </p>
                                    </li>
                                    <li>
                                        <div class="left"><a href="images/Chandrayaan - 3.pdf" target="_blank"><img
                                                    src="images/Chandrayaan3.jpg" width="89" height="40" /></a></div>
                                        <p><a href="images/Chandrayaan - 3.pdf" target="_blank">
                                                <strong1> Chandrayan-3 </strong1>
                                                <br />
                                                Our Student in Chandrayan-3 Mission
                                            </a> <br /> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span
                                                class="blink">&nbsp; Congratulations &nbsp;</span>
                                            <br />
                                            <br />
                                        </p>
                                    </li>
                                    <li>
                                        <div class="left"><a href="images/06/MOU 2023.pdf" target="_blank"><img
                                                    src="images/MoU.jpg" width="89" height="40" /></a></div>
                                        <p><a href="images/06/MOU 2023.pdf" target="_blank">
                                                <strong1> MOU Signed</strong1>
                                                <br />
                                                MoU Signed between CSIR New Delhi and RKDF University, Bhopal at IIT
                                                Bombay on 4th Aug, 2023
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    <li>
                                        <div class="left"><a href="images/06/kargil_Diwas.pdf" target="_blank"><img
                                                    src="images/img/nasha mukti.jpeg" width="89" height="40" /></a>
                                        </div>
                                        <p><a href="images/06/kargil_Diwas.pdf" target="_blank">
                                                <strong1>Kargil Vijay Diwas</strong1>
                                                <br />
                                                Kargil Vijay Diwas is celebrated on 26th July, RKDF University, Bhopal.
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    <li>
                                        <div class="left"><a href="images/06/Yoga Days.pdf" target="_blank"><img
                                                    src="images/img/yoga2.jpg" width="60" height="40" /></a></div>
                                        <p><a href="images/06/Yoga Days.pdf" target="_blank"
                                                title="International Yoga Day">
                                                <strong1>International Yoga Day</strong1>
                                                <br />
                                                International Day of Yoga - June 21st.
                                            </a><br />

                                            <br />
                                        </p>
                                    </li>
                                    <!-- 
                                    
                                     <li>
                                        <div class="left"><a href="examtimetable.php"><img src="images/img/exam.jpg"
                                                    width="89" height="40" /></a></div>
                                        <p><a href="examtimetable.php">
                                                <strong1>EXAM ALERT <img src="images/img/new11.gif" /></strong1>
                                                <br />
                                                Exam Time Table <br />Dec-2023
                                            </a><br />
                                        </p>
                                        <br />
                                    </li>
                                    <li>
                                        <div class="left"><a href="exam.php"><img src="images/img/exam.jpg" width="89"
                                                    height="40" /></a></div>
                                        <p><a href="exam.php">
                                                <strong1>EXAM ALERT <img src="images/img/new11.gif" /></strong1>
                                                <br />
                                                Exam Form Fees Notice & Circular Dec-2023
                                            </a><br />
                                        </p>
                                        <br />
                                    </li>
                                    
                                    Seminar March-2023 Delete 29.8.23<li>
                                        <div class="left"><a href="images/06/Law Deprtment.pdf" target="_blank"><img src="images/img/webinarDec.jpeg" width="60"
                                                    height="40" /></a></div>
                                        <p><a href="images/06/Law Deprtment.pdf" target="_blank">
                                                <strong1>Orientation Programme</strong1>
                                                <br />
                                              Internship Opportunities with Bhopal Police Commissionerate </a><br />
                                             
                                            <br />
                                        </p>
                                    </li>
                                     <li>
                                        <div class="left"><a href="images/Times of India Womens Day.pdf"
                                                target="_blank"><img src="images/womens day.png" width="60"
                                                    height="40" /></a></div>
                                        <p><a href="images/Times of India Womens Day.pdf" target="_blank">
                                                <strong1>Celebrating Womens</strong1>
                                                <br />
                                                Celerating Women's Day,Celebrations - Times of India (TOI). 06th March
                                                2023.
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    
                                    -->

                                    <li>
                                        <div class="left"><a href="images/06/Training Programme.pdf"
                                                target="_blank"><img src="images/img/notice imp.jpg" width="89"
                                                    height="40" /></a></div>
                                        <p><a href="images/06/Training Programme.pdf" target="_blank">
                                                <strong1> Training Programme</strong1>
                                                <br />
                                                Dissertation Training Programme.
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    <li>
                                        <div class="left"><a href="https://rkdf.ac.in/Result.php"><img
                                                    src="images/img/result.jpg" width="80" height="65" /></a></div>
                                        <p><a href="https://rkdf.ac.in/Result.php">
                                                <strong1>Result -2023</strong1>
                                                <br />
                                                &nbsp;All Result- 2023 <img src="images/img/new11.gif" /> <br />
                                            </a> <br />
                                        </p>
                                    </li>



                                    <li>
                                        <div class="left"><a href="images/Oxford Award.pdf" target="_blank"><img
                                                    src="images/oxford.jpeg" width="70" height="50" /></a></div>
                                        <p><a href="images/Oxford Award.pdf" target="_blank">
                                                <strong1>‘ग्रैंड स्टार सक्सेस अवार्ड’</strong1>
                                                <br />
                                                आरकेडीएफ विश्वविद्यालय की कुलाधिपति डॉ. साधना कपूर को अकादमिक यूनियन
                                                ऑक्सफोर्ड द्वारा विश्वविद्यालय के सामाजिक कार्य, अकादमिक उन्नयन एवं
                                                अनुसंधान के क्षेत्र में श्रेष्ठ प्रदर्शन के लिए ‘ग्रैंड स्टार सक्सेस
                                                अवार्ड’ से सम्मानित किया गया |
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>


                                    <!-- Delete on 29.08.2023--------------
                                      
                                       <li>
                                        <div class="left"><a href="images/PythonMLDS.pdf" target="_blank"><img src="images/img/webinarDec.jpeg" width="60"
                                                    height="40" /></a></div>
                                        <p><a href="images/PythonMLDS.pdf" target="_blank">
                                                <strong1>Value added Course</strong1>
                                                <br />
                                              Three Months Value Added Course on Python, Machine Learning and Data Science, (1st Feb – 29th Apr 2023)</a><br />
                                              REGISTRATION LINK :<br />
                                              <a href="https://docs.google.com/forms/d/e/1FAIpQLSe6HHh4EW3z98RXUxS0npwX_aDiT3BZNys4MPV2v60t5qA0RQ/viewform" target="_blank" >https://forms.gle/zkSyNCEyUNk3cXtNA </a> <br />
                                            <br />
                                        </p>
                                    </li>
                                      <li>
                                        <div class="left"><a href="images/National Seminar.pdf" target="_blank"><img src="images/img/webinarDec.jpeg" width="60"
                                                    height="40" /></a></div>
                                        <p><a href="images/National Seminar.pdf" target="_blank">
                                                <strong1>National Seminar</strong1>
                                                <br />
                                              One Day National Seminar on Gender Discrimination on India. 17th March 2023.  
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    
                                    <li>
                                        <div class="left"><a href="images/National-Conference.pdf" target="_blank"><img src="images/img/webinarDec.jpeg" width="60"
                                                    height="40" /></a></div>
                                        <p><a href="images/National-Conference.pdf" target="_blank">
                                                <strong1>National Conference on</strong1>
                                                <br />
                                              Contemporary Technological Solutions towards Fulfillment of Social Needs. 3rd-4th March 2023.  
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>-->

                                    <!--<li>
                                        <div class="left"><a href="images/Seminar.pdf" target="_blank"><img src="images/img/webinarDec.jpeg" width="60"
                                                    height="40" /></a></div>
                                        <p><a href="images/Seminar.pdf" target="_blank">
                                                <strong1>  A Seminar on </strong1>
                                                <br />
                                               Cooperative Awareness ( Ministry of Cooperative, Govt. of India) 16th Dec. 2022.  
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    
                                     <li>
                                        <div class="left"><a href="images/06/Unity Day - ACP Richa Jain.pdf"
                                                target="_blank"><img src="images/img/nasha mukti.jpeg" width="89"
                                                    height="40" /></a></div>
                                        <p><a href="images/06/Unity Day - ACP Richa Jain.pdf" target="_blank">
                                                <strong1> National Unity Day </strong1>
                                                <br />
                                                Rastriya ekta diwas (National Unity Day) was Celebrated by RKDF
                                                University, Bhopal on 31st Oct. 2022.
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    
                                    -->





                                    <!--
                                      
                                    <li>
                                        <div class="left"><a href="NCC/NCC Day Ceremony.pdf" target="_blank"><img src="images/img/nasha mukti.jpeg" width="89"
                                                    height="40" /></a></div>
                                        <p><a href="NCC/NCC Day Ceremony.pdf" target="_blank">
                                                <strong1> NCC Day Ceremony</strong1>
                                                <br />
                                              The National Cadet Corps (NCC) observed its 74th anniversary on Sunday.  
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    
                                    <li>
                                        <div class="left"><a href="NCC/awareness ncc.pdf" target="_blank"><img src="images/img/nasha mukti.jpeg" width="89"
                                                    height="40" /></a></div>
                                        <p><a href="NCC/awareness ncc.pdf" target="_blank">
                                                <strong1> Nasha Mukti Abhiyaan </strong1>
                                                <br />
                                              RKDF UNIVERSITY 1 MP CTR NCC BHOPAL has Organised a Nasha Mukti Abhiyaan.  
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    
                                     <li>
                                        <div class="left"><a href="RKDF-FDP.pdf" target="_blank"><img src="images/img/notice imp.jpg" width="89"
                                                    height="40" /></a></div>
                                        <p><a href="RKDF-FDP.pdf" target="_blank">
                                                <strong1> Online FDP </strong1>
                                                <br />
                                               Online Faculty Development Programme on Implementation of NEP 2020 in Higher Education. <span class='date1'><br /> 17.02.2022 to 22.02.22 </span>. 
                                            </a><br />
                                            <br />
                                        </p>
                                    </li>
                                    <li>
                                        <div class="left"><a href="rkdf_admin_2012/Uploads/News_enevt/IIGP award.pdf"
                                                target="_blank"><img src="images/img/result.jpg" width="80"
                                                    height="65" /></a></div>
                                        <p><a href="rkdf_admin_2012/Uploads/News_enevt/IIGP award.pdf" target="_blank">
                                                <strong1>&nbsp;&nbsp;ACHIVEMENTS</strong1>
                                                <br />
                                                &nbsp;RKDF University Students won an Award of 10 Lacs at the ?India
                                                Innovation Growth Program ? IIGP 2.0? from Department of Science &
                                                Technology (Government of India) & TATA Trust.&nbsp;<br />
                                            </a> <br />
                                        </p>
                                    </li>
                                    
                                    -->

                                    <li>
                                        <div class="left"><a href="foreign_stud/index.html" target="_blank"><img
                                                    src="images/img/admission notice.jpg" width="89" height="80" /></a>
                                        </div>
                                        <p><a href="foreign_stud/index.html" target="_blank">
                                                <strong1>&nbsp;Admission </strong1>
                                                <br />
                                                For International <br />
                                                Students Admission
                                            </a><br />
                                            <br />
                                        </p>
                                        <br />
                                        <br />
                                    </li>


                                </ul>
                                <ul>

                                    <!--

                         ----- dipawali-----------------------------

                               

                          

                         ---------------- ---end dipawali ------------------------------------

                         

                         

                          <li>

                            <div class="left"><a href="examtimetable2014.php"><img src="images/img/examalrt2.jpg" width="89" height="80" /></a></div>

                            <p><a href="examtimetable2014.php" >

                              <strong1> Time Table</strong1>

                              </a><a href="rkdf_admin_2012/Uploads/Current_event/MOU_JBM.pdf"  target="_blank" ><img src="images/img/new11.gif" /></a><a href="examtimetable2014.php" ><br/>

                              &nbsp; Time Table <br />

&nbsp;June 2015</a><br/>

                              <span class='date1'>&nbsp;2015-06-17 </span><br/>

                            </p><br/>

                          </li>

                          <li>

                            <div class="left"><a href="rkdf_admin_2012/Office Notice.pdf" target="_blank" ><img src="images/img/notice.jpg" width="89" height="80" /></a></div>

                            <p><a href="rkdf_admin_2012/Office Notice.pdf" target="_blank" >

                              <strong1>&nbsp;Students Notice </strong1>

                              </a><a href="rkdf_admin_2012/Office Notice.pdf" target="_blank" ><br/>

                        Deposit their due fees to Account section before 31st March 2015</a><br/>

                              <span class='date1'>2015-03-25</span><br/>

                            </p>

                          </li>

                          <li>

                            <div class="left"><a href="exam/Adhisuchna M.Ed Exam Form.pdf" target="_blank" ><img src="images/img/notice.jpg" width="89" height="80" /></a></div>

                            <p><a href="exam/Adhisuchna M.Ed Exam Form.pdf" target="_blank" >

                              <strong1>&nbsp;M.Ed Exam form </strong1>

                              </a><a href="exam/Adhisuchna M.Ed Exam Form.pdf" target="_blank" ><br/>

                       M.Ed Exam Form Notice 2014-15</a><br/>

                              <span class='date1'>2015-04-01</span><br/>

                            </p><br />

                          </li>-->
                                    <!--<li>

                            <div class="left"><a href="images/tour_agriculture.pdf" target="_blank" ><img src="images/img/tour_agri.JPG" width="87" height="75" /></a></div>

                            <p><a href="images/tour_agriculture.pdf" target="_blank">

                              <strong1>Students Study Tour</strong1><br/>

                         Study Tour for Agriculture Department</a><br/>

                              <span class='date1'>2014-11-20</span><br/>

                            </p><br />

                          </li>-->
                                    <!--

                          <li>

                            <div class="left"><a href="images/inv_sangram_2014.pdf" target="_blank"><img src="images/inv3.jpg" width="100" height="75" /></a></div>

                            <p><a href="images/inv_sangram_2014.pdf" target="_blank">

                              <strong1> "SANGRAAM closing ceremony INVITATION"</strong1>

                              </a><br /><a href="images/inv_sangram_2014.pdf" target="_blank" >We Hereby Cordially Invite You.</a><br/>

                              <span class='date1'>2014-10-15</span><br/>

                            </p>

                          </li>-->
                                    <!--<li>

                            <div class="left"><a href="Ph.D/Application Form.pdf" target="_blank" ><img src="images/img/academic.jpeg" width="100" height="75" /></a></div>

                            <p><a href="Ph.D/Application Form.pdf" target="_blank">

                              <strong1>APPLICATION FORM </strong1>

                              </a><a href="Ph.D/LIST OF QUALIFIED CANDIDATES 2014-15.pdf" target="_blank" ></a><a href="Ph.D/Application Form.pdf"target="_blank"><br/>

                          Application Form for the Enrolment of the Ph.D Entrance Exam Programme 2014-15</a><br />

                              <span class='date1'>2014-07-12</span><br/>

                            </p>

                          </li>-->
                                    <!--<li>

                            <div class="left"><a href="rkdf_admin_2012/Uploads/Current_event/Congratulation.pdf" target="_blank" ><img src="rkdf_admin_2012/Uploads/Current_event/Dr.Vora.jpg" width="100" height="75" /></a></div>

                            <p><a href="rkdf_admin_2012/Uploads/Current_event/Congratulation.pdf" target="_blank">

                              <strong1>Adjunct Professor</strong1>

                              </a><a href="rkdf_admin_2012/Uploads/Current_event/Congratulation.pdf" target="_blank"><br/>

                          Adjunct Professor, RKDF University, Bhopal (India) in the Faculty of Engineering & Management </a><br />

                              <span class='date1'>2014-08-11</span><br/>

                            </p>

                          </li>-->
                                    <!--<li>

                            <div class="left"><a href="images/practical schedual of bsc.pdf" target="_blank" ><img src="images/img/examfrom.jpg" width="100" height="75" /></a></div>

                              <p><a href="images/practical schedual of bsc.pdf" target="_blank">

                              <strong1>B.Sc Practical Exam Date</strong1>

                              <img src="images/img/new11.gif" width="29" height="13" /><br/>

                              Time Table For B.Sc(All Semester) Practical Date</a><img src="images/img/new11.gif" width="29" height="13" /><br />

                                <span class='date1'>2013-12-16</span><br/>

                            </p>

                          </li>-->
                                    <!--<li>

                            <div class="left"><a href="" ><img src="images/faculty.jpg" width="100" height="75" /></a></div>

                              <p><a href="">

                              <strong1>Faculty Development Programme  </strong1>

                              <br/>

                                we are organizing a two week faculty development programme sponsored

                                by All India Council for Technical Education (AICTE). between 11 to 24 Nov. 2013 </a><br />

                                <span class='date1'>2013-10-17</span><br/>

                            </p>

                          </li>-->
                                    <!--<li>

                            <div class="left"> <a href="rkdf_admin_2012/Uploads/Current_event/Press News for Orientation Programme.pdf" target="_blank" ><img src="rkdf_admin_2012/Uploads/Current_event/DSC_0106.JPG" width="100" height="75"/></a></div>

                              <p><a href="rkdf_admin_2012/Uploads/Current_event/Press News for Orientation Programme.pdf"  target="_blank" >

                              <strong1>Seminar </strong1>

                              <br/>

                                By "CHIFLEY BUSINESS SCHOOL AUSTRALIA" two days seminar in rkdf university. </a><br />

                                <span class='date1'>2013-10-23</span>.<br/>

                            </p>

                              <span class='date1'></span></li>-->
                                    <!--<li>

                            <div class="left"><a href="images/RKDF Women's Day Function.pdf" target="_blank"><img width="80" height="85" class="leftimage" src="images/img/womensday.jpg" /></a></div>

                              <p><a href="images/RKDF Women's Day Function.pdf" target="_blank" >

                              <strong1>Womes's Day/ Seminar</strong1>

                              <br/>

                                On THE GENDER AGENDA GAINING MOMENTUM organized by Women's Grievance cell RKDF University,Bhopal </a></p>

                              <span class='date1'>2013-03-08</span><br/>

                            <br/>

                          </li>
                          <img src="images/happy ind day.jpg" width="220"  height="250"/>
                          
                          
        <a href="http://rkdf.ac.in/admissionform.php" target="_blank" ><strong><span class="style3">Apply Now For Admission Session 2020-21 </span></strong>  <img src="images/img/New32.gif" width="28" height="14" /> </a>
                          
                          15.01.2022
                              
                           <div align="center">
                                <marquee behavior="scroll" onmouseover="stop()" onmouseout="start()"
                                    scrollamount="4"><a href="circular/Revised Add Ayurveda.pdf" target="_blank"><span class="style3">Urgent Requirement Walk-In Interview Revised Schedule</span></a> ||
                                     <a href="circular/Ayurveda Requirement.pdf" target="_blank"><span
                                                class="style3">Urgent Requirement Walk-In Interview 15 & 16 January </span></a> 
                                </marquee>
                            </div>
                          
                          -->
                                </ul>
                            </marquee>
                        </div>
                        <div align="right"><a href="#" class="readmore">RKDF UNIV<span>+</span></a></div>
                        <div><img src="images/news_events_btm.jpg" width="252" height="9" border="0" alt="" /></div>
                    </div>
                    <div class=panel>
                        <div class=container>
                            <div align="center">
                                <marquee behavior="scroll" onmouseover="stop()" onmouseout="start()" scrollamount="4">

                                    <!--<a href="https://www.rkdf.ac.in/exam.php" ><span class="style3"> EXAM FEES NOTICE 2022-2023 </span></a>-->

                                    <a href="https://rkdf.ac.in/Content/Documents/NAAC-Certificate-of-Accrediation-RKDF-University-Bhopal.pdf" target="_blank"><span class="style3">NAAC Certificate of Accrediation, RKDF University</span></a>
                                    ||
                                    <a href="https://rkdf.ac.in/odl.php" target="_blank"><span class="style3"> ONLINE
                                    Open and Distance Leaning Programs</span></a>
                                    ||
                                    <a href="https://rkdf.ac.in/admissions" target="_blank"><span class="style3"> ONLINE
                                            ADMISSION FORM 2024-25 </span></a>
                                    ||
                                    <a href="examtimetable.php"><span class="style3">Exam Time Table June-2024 </span>
                                        <img src="images/img/new12.gif" width="32" height="14" />
                                    </a>
                                    ||
                                    <a href="Fees_Notice2024.pdf" target="_blank"><span class="style3"> NOTICE FOR FEES
                                            SUBMISSION </span> <img src="images/img/new12.gif" width="32"
                                            height="14" /></a>

                                    <!-- ||
                                <a href="phd_entrance.php"><span class="" style="font-size:medium; font-weight:bold; color:#A60000">EXAM TIME TABLE DEC- 2023 </span> <img src="images/img/new12.gif" width="38" height="19" /> </a>
                                <a href="ncc.php"><span class="style3">NCC AVAILABLE </span> </a> -->

                                </marquee>
                            </div>


                            <div class="wt-rotator">
                                <div class="screen">
                                    <noscript>
                                        <img src="" />
                                    </noscript>
                                </div>
                                <div class="c-panel">
                                    <div class="thumbnails">
                                        <ul>
                                            <!--<li><a title="RKDF @ UNIVERSITY" href="images/11/independence-day.jpg">
 <img src="images/11/thumb_nil/rkdf_45x45_11.jpg" /></a>
 <a href="" target="_blank"></a> </li>
 
                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/republic day.jpg"> <img
                                                        src="images/11/thumb_nil/republic day.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>
                                                    
                                                     <li><a title="RKDF @ UNIVERSITY" href="images/11/15Aug.jpg">
 <img src="images/11/thumb_nil/rkdf_45x45_11.jpg" /></a>
 <a href="" target="_blank"></a> </li>
 
 -->


                                            <li><a title="ALUMNI MEET-2023" href="images/11/naac_visit1.JPG">
                                                    <img src="images/11/thumb_nil/naac_visit1.JPG" /></a> <a href=""
                                                    target="_blank"></a> </li>
                                            <li><a title="ALUMNI MEET-2023" href="images/11/naac_visit2.JPG">
                                                    <img src="images/11/thumb_nil/naac_visit2.JPG" /></a> <a href=""
                                                    target="_blank"></a> </li>
                                            <li><a title="ALUMNI MEET-2023" href="images/11/naac_visit3.JPG">
                                                    <img src="images/11/thumb_nil/naac_visit3.JPG" /></a> <a href=""
                                                    target="_blank"></a> </li>
                                            <li><a title="ALUMNI MEET-2023" href="images/11/naac_visit4.JPG">
                                                    <img src="images/11/thumb_nil/naac_visit4.JPG" /></a> <a href=""
                                                    target="_blank"></a> </li>


                                            <li><a title="ALUMNI MEET-2023" href="images/11/viksit bh.jpg">
                                                    <img src="images/11/thumb_nil/viksit bh.jpg" /></a> <a href=""
                                                    target="_blank"></a>
                                            </li>
                                            <li><a title="ALUMNI MEET-2023" href="images/11/alumni meet.png">
                                                    <img src="images/11/thumb_nil/alumni meet_2.png" /></a> <a href=""
                                                    target="_blank"></a>
                                            </li>
                                            <li><a title="RKDF @ UNIVERSITY VIGYAN MELA"
                                                    href="images/11/vigyan_mela.jpeg">
                                                    <img src="images/11/thumb_nil/vigyan_mela.jpeg" /></a> <a href=""
                                                    target="_blank"></a>
                                            </li>
                                            <li><a title="RKDF @ UNIVERSITY AWARDS" href="images/11/awd.jpg">
                                                    <img src="images/11/thumb_nil/awd.jpg" /></a> <a href=""
                                                    target="_blank"></a>
                                            </li>
                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/MoU.jpeg">
                                                    <img src="images/11/MoU_2.jpeg" /></a> <a href=""
                                                    target="_blank"></a>
                                            </li>
                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/sat3.JPG">
                                                    <img src="images/11/thumb_nil/sat3.JPG" /></a> <a href=""
                                                    target="_blank"></a>
                                            </li>
                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/sat1.JPG">
                                                    <img src="images/11/thumb_nil/sat1.JPG" /></a> <a href=""
                                                    target="_blank"></a>
                                            </li>
                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/sat4.JPG">
                                                    <img src="images/11/thumb_nil/sat4.JPG" /></a> <a href=""
                                                    target="_blank"></a>
                                            </li>
                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/sat2.JPG">
                                                    <img src="images/11/thumb_nil/sat2.JPG" /></a> <a href=""
                                                    target="_blank"></a> </li>

                                            <!-- <li><a title="RKDF @ UNIVERSITY" href="images/11/26th jan.jpeg"> 
     <img src="images/11/thumb_nil/26th jan.jpeg" /></a> <a href="" target="_blank"></a> </li>-->

                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/rkdf_716x310_12.jpg">
                                                    <img src="images/11/thumb_nil/rkdf_45x45_12.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>

                                            <!-- <li><a title="RKDF @ UNIVERSITY" 

  href="images/11/rkdf_716x310_13.JPG"><img 

  src="images/11/thumb_nil/rkdf_45x45_13.JPG" /></a> <a 

  href="" target="_blank"></a> </li>
  <li><a title="RKDF @ UNIVERSITY" href="images/11/mam_oxford.jpg"><img
                                                        src="images/11/thumb_nil/mam_oxford.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>
  -->

                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/oxford.jpg"><img
                                                        src="images/11/thumb_nil/oxford.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>

                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/oxford awd.jpg"><img
                                                        src="images/11/thumb_nil/oxford awd.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>

                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/oxford award.jpg"><img
                                                        src="images/11/thumb_nil/oxford award.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>
                                            <li><a title="Inaugural ceremony of RKDF University Sports"
                                                    href="images/11/rkdf utsav st.jpeg"><img
                                                        src="images/11/thumb_nil/rkdf utsav st45x45.jpeg" /></a> <a
                                                    href="" target="_blank"></a> </li>
                                            <li><a title="Governer of Madhya Pradesh on 9.Nov. 2022 at Rajbhawan"
                                                    href="images/11/govmeet.jpeg"><img
                                                        src="images/11/thumb_nil/govmeet_45x45.jpeg" /></a> <a href=""
                                                    target="_blank"></a> </li>
                                            <li><a title="NCC RKDF UNIVERSITY" href="images/11/NCC 1MP CTR.jpeg"><img
                                                        src="images/11/thumb_nil/NCC 1MP CTR.jpeg" /></a> <a href=""
                                                    target="_blank"></a> </li>

                                            <li><a title="TNP @ UNIVERSITY" href="images/11/TNP_Placed Stud.jpg"><img
                                                        src="images/11/thumb_nil/TNP_Placed Stud.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>
                                            <li><a title="TNP @ UNIVERSITY" href="images/11/TNP_Placed.jpg"><img
                                                        src="images/11/thumb_nil/TNP_Placed.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>

                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/rkdf_716x310_22.jpg"><img
                                                        src="images/11/thumb_nil/rkdf_45x45_22.jpeg" /></a><a href=""
                                                    target="_blank"></a> </li>

                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/rkdf_716x310_23.jpg"><img
                                                        src="images/11/thumb_nil/rkdf_45x45_23.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>
                                            <li><a title="RKDF @ UNIVERSITY" href="images/11/rkdf_716x310_27.jpg"><img
                                                        src="images/11/thumb_nil/rkdf_45x45_27.jpg" /></a> <a href=""
                                                    target="_blank"></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='nivo-caption gdl-slider-caption' id='nivo-caption0'>
                        <div class='gdl-slider-title gdl-title'> Adding Intuition </div>
                        <p>The AEC is dedicated to helping students to learn and develop their skills and potential. Our
                            faculty is committed to quality teaching and enhanced learning for students, preparing them
                            for subsequent careers in professions and public services.</p>
                    </div>
                    <div class='nivo-caption gdl-slider-caption' id='nivo-caption1'>
                        <div class='gdl-slider-title gdl-title'> Serving Mankind </div>
                        <p>Create sound basis for engineering principles, innovative research capabilities and exemplary
                            professional ethics, which will be utilized for the overall development of the nation and
                            mankind.</p>
                    </div>
                    <div class='nivo-caption gdl-slider-caption' id='nivo-caption2'>
                        <div class='gdl-slider-title gdl-title'> Applying Insight </div>
                        <p>Creation of a world class engineering professional caliber, in which persons from the
                            deprived sections of the community will be an inseparable part.</p>
                    </div>
                    <div class='nivo-caption gdl-slider-caption' id='nivo-caption3'>
                        <div class='gdl-slider-title gdl-title'> Assimilating Knowledge </div>
                        <p>To provide an open opportunity to the young generation for evolving their core competencies
                            for building up their career as World-Class professionals with broad foundation, in-depth
                            knowledge and versatility to meet the challenges of global economy.</p>
                    </div>
                    <div class='nivo-caption gdl-slider-caption' id='nivo-caption4'>
                        <div class='gdl-slider-title gdl-title'> Welcome to AWH Engineering College </div>
                        <p>The AWH engineering college, approved by AICTE &#038; affiliated to University of Calicut
                            commenced its activities in 2001 as a private self-financing college fully committed to
                            provide quality education for the all-round development of engineering students.</p>
                    </div>
                </div>
                <a class="nivo-prevNav"></a> <a class="nivo-nextNav"></a>
            </div>

            <!--- slider -->



            <div id="shortNote">

                <ul id="marquee2" class="marquee">


                    <li>
                        <div class="left"><a href="images/06/WARNING.pdf" target="_blank"><img width="80" height="55"
                                    class="leftimage" src="images/Warning.png" /></a></div>
                        <a href="images/06/WARNING.pdf" target="_blank"><strong>Warning regarding Information Centre &
                                Study Centre </strong></a>&nbsp;<br />
                        <span class="date1">2023-07-08</span><br />
                    </li>

                    <!-- Commented on 08-June-2024 -->
                    <!-- <li>
                        <div class="left">
                            <a href="https://rkdf.ac.in/phd_entrance.php"><img width="75" height="44"
                                    class="leftimage" src="images/img/notice imp.jpg" /></a></div>
                            <a href="https://rkdf.ac.in/phd_entrance.php"><strong>Ph.D. Admission Notification-
                                2023</strong></a>&nbsp;
                        <span class="date1"></span> <br />
                    </li> -->

                    <!--<li><div class="left"><a href="images/mpcst2.pdf" target="_blank"><img width="80" height="55" class="leftimage" src="images/img/rkdf_univ.jpg"/></a></div>

        <a href="images/mpcst2.pdf" target="_blank"><strong>MPCST Science Festival </strong></a>&nbsp;<br/>

              <span class="date1">2015-01-27</span><br/>

              </li>

              <li><div class="left"><a href="images/06/BUS_ROUTES_AND_TIMINGS.pdf" target="_blank"><img width="80" height="55" class="leftimage" src="images/img/notice.jpg"/></a></div>

              <a href="images/06/BUS_ROUTES_AND_TIMINGS.pdf" target="_blank"><strong>Bus Routes And Timing</strong></a>&nbsp;<br/>

              <span class="date1">2015-09-01</span><br/>

              </li>
              -->
                    <li>
                        <div class="left"><a href="Result.php"><img width="75" height="44" class="leftimage"
                                    src="images/img/result.jpg" /></a></div>
                        <a href="Result.php"><strong>Result Dec-2023 </strong></a>&nbsp;<br />
                        <span class="date1"></span><br />
                    </li>


                    <li>
                        <div class="left"><a href="Fees_Notice2024.pdf" target="_blank"><img width="75" height="44"
                                    class="leftimage" src="images/img/notice imp.jpg" /></a></div>
                        <a href="Fees_Notice2024.pdf" target="_blank"><strong>Fees Submission Notice </strong></a>&nbsp;
                        <img src="images/img/new11.gif" /><br />
                        <span class="date1">2024-03-18</span><br />
                    </li>
                    <li>
                        <div class="left"><a href="UPI Notice 2024.pdf" target="_blank"><img width="75" height="44"
                                    class="leftimage" src="images/img/notice imp.jpg" /></a></div>
                        <a href="UPI Notice 2024.pdf" target="_blank"><strong>UPI Transaction Notice </strong></a>&nbsp;
                        <img src="images/img/new11.gif" /><br />
                        <span class="date1">2024-03-18</span><br />
                    </li>

                    <li>
                        <div class="left"><a href="images/06/Account Details.pdf" target="_blank"><img width="75"
                                    height="44" class="leftimage" src="images/img/notice imp.jpg" /></a></div>
                        <a href="images/06/Account Details.pdf" target="_blank"><strong>RKDF University Account Details
                            </strong></a>&nbsp;<br />
                        <br />
                    </li>



                    <!-- <li><div class="left"><a href="examtimetable2014.php" ><img width="80" height="55" class="leftimage" src="images/img/exam.jpg"/></a></div>

              <a href="examtimetable2014.php"><strong>Exam Time Table June-2015  </strong></a>&nbsp;<br/>

              <span class="date1">2015-06-22</span><br/>

              </li>-->



                    <!--<li><div class="left"><a href="sciencegallery.php" target="_blank" ><img width="80" height="55" class="leftimage" src="science Development prog/Science.jpg"/></a></div>

              <a href="sciencegallery.php"  target="_blank"  ><strong> Innovations In Science Gallery</strong> </a><br/>

              <span class="date1">2013-12-14</span><br/>

              </li>-->



                    <!--<li><div class="left"><a href="http://erp.rkdf.ac.in" target="_blank" ><img width="80" height="55" class="leftimage" src="images/img/login.jpg" /></a></div>

              <a href="http://erp.rkdf.ac.in" target="_blank"  ><strong> Student Enrollment Link are Now Open </strong></a><br/>

              <span class="date1">2013-11-19</span><br/>-->

                    <div align="right"><a href="#" class="readmore">Latest Update</a></div>
                </ul>
            </div>

            <!-- 
                <div id="admission" title="SAMAGAM 2K15">
                    <h2><a href="samagam 15.pdf" target="_blank" ><font color="#FFFF00">SAMAGAM 2K15</font></a>&nbsp;<img src="images/img/new11.gif" width="32" height="12" /></h2>
                </div>	
                <div id="admission1" title="">
                                <h3><a href="https://erplive.rkdf.ac.in/Student/Registration" target="_blank">Admission 2022-23</a> <img src="images/img/new31.gif" /></h3>
                </div>
            -->
            <div id="admission1" title="NEW STUDENT LOGIN">
                <h3><a href="https://erplive.rkdf.ac.in" target="_blank">Student Login</a></h3>
            </div>

            <div id="admission1" title="NAAC Certificate of Accrediation, RKDF University">
                <h3><a href="https://rkdf.ac.in/Content/Documents/NAAC-Certificate-of-Accrediation-RKDF-University-Bhopal.pdf" target="_blank">NAAC Certificate of Accrediation</a></h3>
            </div>

            <!-- Commented on 08-June-2024 -->

            <!--
 <div id="admission" title="UNIVERSITY RESULT">
    <h3><a href="Result.php">Result Jan &nbsp;</a></h3>
    <h3><a href="Result.php">&nbsp;2020</a></h3><img src="images/img/new11.gif"/>
</div> 
 
<div id="admission" title="UGC REPORT"><a href="sangram15.pdf" target="_blank"> <span ><img src="Sangraam logo.jpg" width="219" height="60" /></span></a></div>

<div id="admission" title="RKDF UNIVERSITY PROFILE"><a href="rkdf_admin_2012/UNIV PROFILE.pdf" target="_blank"> 

  <h3>RKDF UNIV&nbsp; </h3> 

    <h3>&nbsp;PROFILE <img src="images/img/new9.gif" width="35" height="12" /></h3>

</a>

</div>

<div id="admission" title="UNIVERSITY RESULT"><a href="Result.php"> <span ><img src="images/img/result_univ2.jpg" width="80" height="35" /></span></a>

    <h3><a href="Result.php">Result &nbsp;</a></h3>

    <h3><a href="Result.php">&nbsp;2015  </a><img src="images/img/new11.gif"   /></h3>

</div> 

 <div id="admission" title="UGC REPORT"><a href="ugccomnt.php" target="_blank"> <span ><img src="images/img/ugclogo2.jpg" width="34" height="41" /></span></a>

    <h3><a href="ugccomnt.php" target="_blank">UGC Report </a></h3>

    <h3><a href="ugccomnt.php" target="_blank">&nbsp;&nbsp;submitted  </a></h3>

</div>

 <div id="admission" title="SAMAGAM 2K15">

    <h2><a href="samagam 15.pdf" target="_blank" ><font color="#FFFF00">SAMAGAM 2K15</font></a>&nbsp;<img src="images/img/new11.gif" width="32" height="12" /></h2>

</div>	-->
        </section>

        <a href="Convocation.php" class="style8">&nbsp; दीक्षांत समारोह- 2024 &#09;&#09;</a> <img src="images/img/new25.gif" />        
        <a href="odl.php" class="style8">&nbsp; Open and Distance Leaning Programs</a>

        <!--- spotlight -->

        <section id="contentLeft">
            <!--<div class="impnotice" >
              <h2><img src="images/img/IMPORTANT NOTICE.jpg" width="253" height="19" /></h2>
              <br />
              <marquee direction="up" onmouseover="stop()" onmouseout="start()" scrollamount="3"> 			  
              
              <br />
              <div ><a href="Result.php" class="style6"><strong>RESULT DECLARED JAN-2020 </strong></a><img src="images/img/new11.gif"/></div>
              <br />
              <div ><a href="examtimetable.php" class="style6"><strong>EXAM TIME TABLE DEC-JAN-2019-20 </strong></a><img src="images/img/new11.gif"/></div>
              <br />
              <div ><a href="RKDF Conference/CONFERENCE 3rd.pdf" target="_blank" class="style6"><strong>3rd INTERNATIONAL CONFERENCE </strong></a><img src="images/img/new11.gif"/></div>
              <br />
              <div ><a href="RKDF Conference/index.html" target="_blank" class="style6"><strong>2nd INTERNATIONAL CONFERENCE </strong></a></div>
              <br />
              <div ><a href="images/TENDER NOTE MNRE.pdf"  target="_blank" class="style6"><strong>TENDER NOTICE FOR MNRE II PROJECT ON SOLAR</strong></a></div>
              <br />
               <div ><a href="https://goo.gl/forms/fKrEbtoAUQCWBp6q1" target="_blank"  class="style6"><strong>ALUMNI REGISTRATION FORM </strong></a></div>
              <br />
              <div ><a href="approval/Distance Education Bureau(DEB).pdf" target="_blank"  class="style6"><strong>DISTANCE EDUCATION BUREAU(DEB) FORM FILED</strong></a></div>
              <br />
              </marquee>	
               </div>-->

            <div id="collegeDetail">
                <h2 class="titleDescription"><a href="Chancellor.php">Chancellor's Message</a></h2>
                <a href="Chancellor.php" class="thump"><img src="images/img/vcnew.jpg" title="Chancellor" /></a>
                <p align="left">Education is the prerequisite for socio-economic development of the Nation in general
                    and people in particular. Not enough educational facilities are available for the
                    professional.<br /> <strong>Dr. Sadhna Kapoor</strong><br />
                    (Chancellor , RKDF University, Bhopal )
                    <a href="Chancellor.php" class="readmore">Read More<span>+</span></a>
                </p>
            </div>
            <div id="collegeDetail">
                <h2 class="titleDescription"><a href="Vice-Chancellor-Desk.php">Vice Chancellor's Message</a></h2>
                <a href="Vice-Chancellor-Desk.php" class="thump"><img src="images/img/VC Sir Pic.jpg"
                        title="Vice Chancellor" /></a>
                <p align="left">Higher education in the country is at the threshold of major Institutional reforms
                    targeted towards cutting edge R&D and innovations.<br /> <strong>Prof. Vijay K.
                        Agrawal</strong><br />
                    <span class="style5">M.Sc., D.Phil., PGD (Chem. & Chem. Engg.)<br />
                        Tokyo Institute of Technology, Japan</span><br />
                    (Vice-Chancellor , RKDF University, Bhopal )
                    <a href="Vice-Chancellor-Desk.php" class="readmore">Read More<span>+</span></a>
                </p>
            </div>




            <?php /*?><section class="widget">

           <a href="Facilities.php" class="widgetThump"><img title="Our Facilities" alt="Our Facilities"
                   src="images/07/facilities-215x120.jpg" /></a>

           <div>

               <h3 class="widgetTitle"><a href="Facilities.php">Our Facilities</a></h3>

               <p>The College building has five blocks, with the state of the art facilities....</p>

               <a href="Facilities.php" class="linkMore"></a>
           </div>

       </section><?php 



<section class="widget">

<a href="Mission.php" class="widgetThump"><img title="Our Mission" alt="Our Mission" src="images/07/mission-215x120.jpg" /></a>

<div>

<h3 class="widgetTitle"><a href="Mission.php">Our Mission</a></h3>

<p>Our mission is to see the benefits of quality technical education reach the...</p>

<a href="Mission.php" class="linkMore"></a>	</div>

</section>*/ ?>
        </section>
        <!--- contentLeft -->

        <section id="sideBar">
            <aside id="customMenu" class="sidebarWidget">
                <aside>
                    <h2><a href="http://governor.mp.gov.in" target="_blank">Hon'ble Governor of M.P.</a></h2>
                    <p><a href="http://governor.mp.gov.in/honorable-governorMCP.aspx" target="_blank"><img
                                src="images/Hon'ble-governor.jpg" width="110" height="130" /> </a></p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>
                        <font color="#0000FF"> Shri Mangubhai Patel </font> <br />
                        Hon'ble Governor of Madhya Pradesh<br />
                        <span class="style14"> <a href="http://governor.mp.gov.in/honorable-governorMCP.aspx"
                                target="_blank">Read More..[+]</a></span>
                    </p>

                </aside>

                <h2>Important Links<span>&nbsp;</span></h2>

                <div class="glossymenu">
                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />Statutory Declaration</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="Content/Documents/Statutory Declaration.pdf" target="_blank">Statutory
                                    Declaration</a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>
                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />COVID-19</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="images/On-Line Learning - ICT initiatives of MHRD and UGC.pdf"
                                    target="_blank">UGC-MHRD ICT Initiatives</a></li>
                            <li><a href="https://www.unicef.org/" target="_blank">www.unicef.org</a></li>
                            <li><a href="http://www.health.mp.gov.in/en" target="_blank">www.health.mp.gov.in</a></li>
                            <li><a href="https://www.mohfw.gov.in/" target="_blank">www.mohfw.gov.in</a></li>
                            <li><a href="https://www.who.int/" target="_blank">www.who.int</a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>
                    <a class="menuitem" href="Result.php"><img src="images/bullet.png" />Results</a>
                    <a class="menuitem" href="alumni.php" target="_blank" title="Alumni"><img
                            src="images/bullet.png" />Alumni </a>
                    <a class="menuitem" href="t&p.php" target="_blank" title="Training & Placement"><img
                            src="images/bullet.png" />Training & Placement </a>
                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />Entrance Exam</a>

                    <!-- Commented on 08-June-2024 -->
                    <div class="submenu">
                        <ul>
                            <!-- <li><a href="phd_entrance.php">Ph.D. Admission Notification- 2023</a></li> -->
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>
                    <!-- <a class="menuitem" href="https://erplive.rkdf.ac.in" target="_blank"><img
                            src="images/bullet.png" />Enrollment 21-22</a>-->
                    <a class="menuitem" href="https://erplive.rkdf.ac.in/Student/Registration" target="_blank"><img
                            src="images/bullet.png" />Admission
                        Enquiry Form</a>
                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />Examination</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="exam.php">Exam Alert </a></li>
                            <li><a href="examtimetable.php">Exam Time Table </a></li>
                            <li><a href="Result.php">Result </a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>

                    <!--<a class="menuitem" href="http://myonlinecourse.in/rKdFu_vErIfY_sTaTuS_2015-16"><img src="images/bullet.png" />Assignment</a>
<a class="menuitem" href="curriculum.php"><img src="images/bullet.png" /> Curriculums </a>
-->

                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />Grievance Redressal
                        SGRC</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="grievance.php" target="_blank">Grievance Redressal SGRC Grievance Form</a></li>
                            <li><a href="images/06/Student Grievance Redressal Committee (SGRC)- 2022.pdf"
                                    target="_blank">Student Grievance Redressal Committee (SGRC)</a></li>
                            <li><a href="images/06/Woman_Grievance_Cell.pdf" target="_blank"
                                    title=" RKDF Women Grievance Cell">Women Grievance Cell</a></li>
                            <li><a href="images/06/antiragging/Internal Complaint Committee.pdf" target="_blank"
                                    title=" Internal Complaint Committee">Internal Complaint Committee</a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>
                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />Antiragging</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="Antiragging&All_Committee.php" target="_blank">Committee</a></li>
                            <li><a href="images/06/antiragging/antiragging_form.pdf" target="_blank">Anti Ragging
                                    Committee & Form</a></li>
                            <li><a href="images/06/antiragging/Anti Ragging Squad.pdf" target="_blank">Anti Ragging
                                    Squad</a></li>
                            <li><a href="images/06/antiragging/Disciplie Committee.pdf" target="_blank">Disciplie
                                    Committee</a></li>
                            <li><a href="antiragging.php" target="_blank">Anti Ragging Online Form</a></li>
                            <li><a href="images/06/antiragging/punishment.pdf" target="_blank">Ragging is Prohibited</a>
                            </li>
                            <li><a href="images/06/antiragging/stopragging.pdf" target="_blank">Stop Ragging</a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>
                    <!--<a class="menuitem" href="circular.php"><img src="images/bullet.png" />Circular</a>-->
                    <a class="menuitem" href="Committee.php" target="_blank"><img src="images/bullet.png" />All
                        Committees</a>
                    <a class="menuitem" href="approval/Statute_of_RKDF_University.pdf" target="_blank"><img
                            src="images/bullet.png" />Statute</a>

                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />Ordinance</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="approval/Ordinance 80 A.pdf" target="_blank">Ordinance (23-Dec-2022)</a></li>
                            <li><a href="approval/Ordinance 2022.pdf" target="_blank">Ordinance (30th-Sep-2022)</a></li>
                            <li><a href="approval/ordinance 2018.pdf" target="_blank">Ordinance (31st-Aug-2018)</a></li>
                            <li><a href="approval/ordinance 2017.pdf" target="_blank">Ordinance (25th-Aug-2017)</a></li>
                            <li><a href="approval/ordinance 2016.pdf" target="_blank">Ordinance (4th-march-2016)</a>
                            </li>
                            <li><a href="approval/ordinance.pdf" target="_blank">Ordinance (4th-may-2012)</a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>

                    <a class="menuitem submenuheader"><img src="images/bullet.png" />Approvals</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="approvals.php" target="_blank">All Approvals</a></li>
                            <li><a href="approval/State_Notification_RKDF_University.pdf" target="_blank">State Notification of University</a></li>
                            <li><a href="approval/UGC_approvals.pdf" target="_blank">UGC Approval</a></li>
                            <li><a href="images/auap_certificate2.pdf" target="_blank">AUAP Membership </a></li>
                            <li><a href="aicte_approval.php" target="_blank">AICTE Approval</a></li>
                            <li><a href="pci_approval.php" target="_blank">PCI Approval</a></li>
                            <li><a href="ncte.php" target="_blank">NCTE Approval</a></li>
                            <!--  <li><a href="approval/ICAR.pdf" target="_blank">ICAR Approval</a></li>-->
                            <!-- <li><a href="approval/COA_2023-24.pdf" target="_blank">COA Approval</a></li> -->
                            <li><a href="COA_approval.php" target="_blank">COA Approval</a></li>
                            <li><a href="approval/nata.pdf" target="_blank">NATA Approval</a></li>
                            <li><a href="approval/BCI_2022-23.pdf" target="_blank">BCI Approval</a></li>
                            <li><a href="approval/RKCMS_BHMS_2023.pdf" target="_blank">NCH Approval</a></li>
                            <li><a href="ayurveda/LOP-BAMS 2023-24.pdf" target="_blank">NCISM,New Delhi(B.A.M.S)
                                    Approval</a></li>
                            <li><a href="approval/nursing_2022.pdf" target="_blank">M.P. NRC Approval</a></li>
                            <li><a href="approval/INC_2022-23.pdf" target="_blank">INC Approval</a></li>
                            <li><a href="approval/paramedical 2022-23.pdf" target="_blank">M.P. PARAMEDICAL </a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>
                    <a class="menuitem" href="approval/UGC_Approvals_latter.pdf" target="_blank"><img
                            src="images/bullet.png" />UGC Recognised Order</a>
                    <a class="menuitem" href="naac/AQAR NAAC.pdf" target="_blank"><img
                            src="images/bullet.png" />Guidline for NAAC Accreditation</a>
                    <!-- <a class="menuitem" href="naac.php"><img src="images/bullet.png" />NAAC</a>-->

                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />NAAC</a>
                    <div class="submenu">
                        <ul>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br /><a href="naac/SSR.pdf"
                                    target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SSR</b></a>
                            </li>

                            <li><a href="GoverningbodyMeetings.php" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp;
                                        Governing Body Meetings</b></a></li>

                            <li><a href="BoMM.php" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp;
                                        Board of Management Meetings</b></a>
                            </li>
                            <li><a href="Academic_Council.php" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp;
                                        Academic Council Meetings</b></a>
                            </li>
                            <li><a href="naac/IQAC/IQAC_Composition.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp;
                                        IQAC Composition</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR1.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 1.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR2.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 2.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR3.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 3.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR4.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 4.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR5.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 5.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR6.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 6.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR7.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 7.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR8.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 8.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR9.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 9.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR10.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 10.</b></a>
                            </li>
                            <li><a href="naac/IQAC/ATR11.pdf" target="_blank"><b>&nbsp;&nbsp;&nbsp;&nbsp; IQAC Meeting
                                        Minuts ATR 11.</b></a>
                            </li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>


                    <a class="menuitem" href="NIRF.php"><img src="images/bullet.png" />NIRF</a>
                    <a class="menuitem" href="https://swayam.gov.in" target="_blank"><img
                            src="images/bullet.png" />Swayam</a>
                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />Campus Facilities</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="images/06/Campus_Facility.pdf" target="_blank">Campus All Facilities</a></li>
                            <li><a href="Campus_Facilities_Video.php">Campus Facility Video</a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>
                    <a class="menuitem" href="feedbackcmplnt.php" target="_blank"><img
                            src="images/bullet.png" />Feedback</a>
                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />Policies</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="policies.php">Policies of the University</a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>
                    <a class="menuitem" href="https://rkdf.ac.in/naac/criteria7/7.2/7.2_Report_on_Best_Practices.pdf"
                        target="_blank"><img src="images/bullet.png" />Best Practices</a>

                    <a class="menuitem" href="News_Letter.php"><img src="images/bullet.png" />News Letter</a>

                    <a class="menuitem" href="nad-abc.php" target="_blank"><img src="images/bullet.png" />NAD-ABC</a>
                    <a class="menuitem submenuheader" href=""><img src="images/bullet.png" />GOVT. LINKS</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="https://www.ugc.ac.in/" target="_blank">UGC</a></li>
                            <li><a href="https://www.aicte-india.org/" target="_blank">AICTE</a></li>
                            <li><a href="https://www.pci.nic.in/" target="_blank">PCI</a></li>
                            <li><a href="http://www.indiannursingcouncil.org/" target="_blank">INC</a></li>
                            <li><a href="https://ncte.gov.in/website/index.aspx" target="_blank">NCTE</a></li>
                            <li><a href="https://www.tribal.mp.gov.in/mptaas" target="_blank">MPTAASC</a></li>
                            <li><a href="https://www.mpnvva.in/" target="_blank">M.P Private University Regulatory
                                    Commission</a></li>
                            <li><a href="http://www.mhrdnats.gov.in/" target="_blank">National Apprenticeship Training
                                    Scheme</a></li>
                            <li><a href="https://www.ayush.gov.in/" target="_blank">Department Of Ayush, GoI</a></li>
                            <li><a href="https://www.ccrhindia.nic.in/" target="_blank">Central Council For Research In
                                    Homoeopathy</a></li>
                            <li><a href="https://innovateindia.mygov.in/viksitbharat2047/" target="_blank">Viksit Bharat
                                    @2047</a></li>
                        </ul>
                        <a href="">&nbsp;</a>
                    </div>


                    <!--<a class="menuitem submenuheader" href="" title="Ph.D 2013-14 Form Download Here"><img src="images/bullet.png" />Forms</a>
<div class="submenu">

    <ul>
    <li><a href="" >  </a></li>
    </ul>

    <a href="">&nbsp;</a></div>
    
    <a class="menuitem submenuheader" href="contact-vc.php"><img src="images/bullet.png" />Contact Us</a>

<div class="submenu">

    <ul>

    <li><a href="contact-vc.php">V.C.</a></li>

    <li><a href="contact-reg.php">Registrar</a></li>

    </ul>

    <a href="">&nbsp;</a></div>
    
    -->
                </div>

                <!--<a name="ex1" id="ex1"></a>

                    -->
            </aside>

            <aside>
                <h2><a href="images/06/Prospectus_2023-24.pdf" target="_blank">Prospectus/Brochure </a></h2>

                <p><a href="images/06/Prospectus_2023-24.pdf" target="_blank"><img src="images/prospectus.jpg"
                            width="151" /></a>
                <div title="FOR ADD"></div>
                </p>
            </aside>
            <aside>
                <h2><a href="images/06/pressmedia.pdf" target="_blank">Media / Press</a></h2>

                <p><a href="images/06/pressmedia.pdf" target="_blank"><img src="images/img/media2.jpg" width="132"
                            height="81" /></a>
                <div title="FOR ADD"></div>
                </p>
            </aside>

            <aside>
                <!--		<a href="prospectus.php" target="_blank"><img src="images/prospectus.jpg" width="243"/></a>-->
            </aside>
        </section>

        <!--- sideBar -->

        <section id="contentLeft">
            <div id="collegeDetail">
                <h2 class="titleDescription"></h2>
            </div>

            <a href="NSS About.pdf" target="_blank">
                <section class="widget">

                    <img src="images/NSS.jpeg" width="192" height="245" />
                </section>
            </a>


            <a href="ncc.php">
                <section class="widget">

                    <img src="images/NCC.jpeg" width="192" height="245" />
                </section>
            </a>

            <section class="widget">

                <a href="whyrkdf.php" class="widgetThump"><img src="images/07/rkdfuniv.jpg" width="215"
                        height="120" /></a>

                <div>

                    <h3 class="widgetTitle"><a href="whyrkdf.php">Why RKDF UNIVERSITY</a></h3>

                    <p>Its not a Campus. Its a Springboard....</p>

                    <a href="whyrkdf.php" class="linkMore"></a>
                </div>
            </section>
            <!--<section class="widget">

                <a href="" class="widgetThump"><img src="images/save_water.gif" alt="Glimpses of the campus" width="196"
                        title="Save Water / Save Tree" /></a>

              <div>

                    <h3 class="widgetTitle"><a href=""> Save Water / Save Tree </a></h3>

                    <p>RKDF University Bhopal Launced a programme "RAIN WATER HARVESTING" with coordination of all the
                        staff memebers and students.</p>

                    <a href="" class="linkMore"></a>                </div>
            </section>-->

            <!--  flip content exam , admission, r&d -->
            <section class="widget">
                <!-- use in css/flip.css-->
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front"><img src="images/img/r&d2.jpg" alt=" R & D"
                                style="width:190px;height:190px;" /></div>
                        <div class="flip-card-back">
                            <h1>R&D Activities</h1>
                            <p>&nbsp;</p>
                            <p> <a href="research/Project List.pdf" target="_blank"><span class="style17">List of
                                        Projects </span></a></p>
                            <p><a href="research/Projects At a Glance.PDF" target="_blank"><span class="style17">
                                        Projects At A Glance </span></a></p>
                            <p><a href="http://shodhsangam.rkdfuniv.in/" target="_blank"><span class="style17">Journals
                                    </span></a></p>
                            <p><a href="research/Funding agencies for Research Projects.pdf" target="_blank"><span
                                        class="style17">Funding Agencies </span></a></p>
                            <p><a href="research/List of Publications.pdf" target="_blank"><span class="style17">List of
                                        Publication </span></a></p>
                            <p><a href="patent.php"><span class="style17">University Patents </span></a></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="widget">
                <!-- use in css/flip.css-->
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-frontm"><img src="images/img/Admission-info.jpg" alt="ADMISSION"
                                style="width:190px;height:190px;" /></div>
                        <div class="flip-card-backm">
                            <h1>ADMISSION</h1>
                            <p>&nbsp;</p>
                            <p> <a href="https://rkdf.ac.in/admissions" target="_blank"><span class="style17">Admission
                                        Registration-2024-25 </span></a></p>
                            <p><a href="phd_entrance.php"><span class="style17"> Ph.D Admission Notification 2023
                                    </span></a></p>
                            <p><a href="admission_guidelines_23-24.pdf" target="_blank"><span class="style17">Admission
                                        Notice/Eligibility/Intake </span></a></p>
                            <p><a href="foreign_stud/index.html" target="_blank"><span class="style17">For International
                                        Admission </span></a></p>
                            <p><a href="images/06/Account Details.pdf" target="_blank"><span class="style17">University
                                        Account Details </span></a></p>
                            <p><a href="University_Fees_Structure.pdf" target="_blank"><span class="style17">Fees
                                        Structure </span></a></p>
                            <p><a href="images/06/Prospectus_2023-24.pdf" target="_blank"><span
                                        class="style17">Prospectus </span></a></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="widget">
                <!-- use in css/flip.css  our css folder -->
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front"><img src="images/exam-img2.jpg" alt="EXAMINATION"
                                style="width:190px;height:190px;" /></div>
                        <div class="flip-card-back">
                            <h1>EXAMINATION</h1>
                            <p>&nbsp;</p>
                            <p> <a href="exam.php"><span class="style17">Examination Notice</span></a></p>
                            <p><a href="examtimetable.php"><span class="style17"> Exam Time Table</span></a></p>
                            <p><a href="Result.php"><span class="style17">Result</span></a></p>
                            <p><a href="images/Alumni-form.pdf" target="_blank"><span class="style17">Alumni
                                        Registration Form</span></a></p>
                            <p><a href="forms/Application For English.pdf" target="_blank"><span class="style17">Degree
                                        Migration Form</span></a></p>
                            <p><a href="https://erplive.rkdf.ac.in/" target="_blank"><span class="style17">Student
                                        Login</span></a></p>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <video width="400" height="150" controls autoplay muted>
            <source src="images/gallery/video/RKDF Univ_CarbonCap.mp4" type="video/mp4">
            Your browser does not support this video.
        </video>

        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td height="60" colspan="4">
                    <font size="+1" color="#C10000"><b>Art Gallery </b></font>
                </td>
            </tr>
            <tr>

                <td width="150" height="135">
                    <div class="flip-box">
                        <div class="flip-box-inner">
                            <div class="flip-box-front">
                                <h2><img src="images/img/art/a01.jpg" style="width:140px;height:120px;" /></h2>
                            </div>
                            <div class="flip-box-back">
                                <h2><img src="images/img/art/a1.jpg" style="width:140px;height:120px;" /></h2>
                            </div>
                        </div>
                    </div>
                </td>
                <td width="150" height="135">
                    <div class="flip-box">
                        <div class="flip-box-inner">
                            <div class="flip-box-front">
                                <h2><img src="images/img/art/a2.jpg" style="width:140px;height:120px;" /></h2>
                            </div>
                            <div class="flip-box-back">
                                <h2><img src="images/img/art/a3.jpg" style="width:140px;height:120px;" /></h2>
                            </div>
                        </div>
                    </div>
                </td>
                <td width="150" height="135">
                    <div class="flip-box">
                        <div class="flip-box-inner">
                            <div class="flip-box-front">
                                <h2><img src="images/img/art/a4.jpg" style="width:140px;height:120px;" /></h2>
                            </div>
                            <div class="flip-box-back">
                                <h2><img src="images/img/art/a5.jpg" style="width:140px;height:120px;" /></h2>
                            </div>
                        </div>
                    </div>
                </td>
                <td width="150" height="135">
                    <div class="flip-box">
                        <div class="flip-box-inner">
                            <div class="flip-box-front">
                                <h2><img src="images/img/art/a6.jpeg" style="width:140px;height:120px;" /></h2>
                            </div>
                            <div class="flip-box-back">
                                <h2><img src="images/img/art/a02.jpg" style="width:140px;height:120px;" /></h2>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td height="65" colspan="4">
                    <font size="+1" color="#C10000"><b>Placed Students(Shining Star) </b></font>
                </td>
            </tr>
            <tr>
            <tr>
                <td colspan="4">
                    <marquee behavior="scroll" width="610" height="140" onmouseover="stop()" onmouseout="start()"><img
                            src="t&p/tphmpg.jpg" /> <img src="t&p/tphmpg2.jpg" /> </marquee>
                </td>
            </tr>


        </table>

        <br class="clear" />
        <a href="https://innovateindia.mygov.in/viksitbharat2047/" target="_blank"> <img
                src="images/viksit bh.jpg" /></a>

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

    <footer id="footer">
        <div class="wrapper">
            <div id="newsEvents">
                <h3 class="footerTitle">Our Achivements</h3>
                <div id="newsBox">
                    <ul>
                        <li>
                            <a href="rkdf_admin_2012/Uploads/News_enevt/NSS Student Achivement.pdf" target="_blank"
                                class="style1"><img src="images/img/result.png" width="35" height="20" /></a>
                            <p><a href="rkdf_admin_2012/Uploads/News_enevt/NSS Student Achivement.pdf"
                                    target="_blank">RKDF
                                    University Students Achivements </a></p>
                            <span class="date">&nbsp;</span>
                        </li>
                        <li>
                            <a href="rkdf_admin_2012/Uploads/News_enevt/Student Acchivement.pdf" target="_blank"
                                class="style1"><img src="images/img/result.png" width="35" height="20" /></a>
                            <p><a href="rkdf_admin_2012/Uploads/News_enevt/Student Acchivement.pdf" target="_blank">RKDF
                                    University Students Achivements </a></p>
                            <span class="date">&nbsp;</span>
                        </li>
                        <li>
                            <a href="images/06/Awards2023.pdf" target="_blank" class="style1"><img
                                    src="images/img/result.png" width="35" height="20" /></a>
                            <p><a href="images/06/Awards2023.pdf" target="_blank">World Education Leadership Award-2023
                                </a></p>
                            <span class="date">&nbsp;</span>
                        </li>
                        <li>
                            <a href="images/Chandrayaan - 3.pdf" target="_blank" class="style1"><img
                                    src="images/img/result.png" width="35" height="20" /></a>
                            <p><a href="images/Chandrayaan - 3.pdf" target="_blank">Our Student in Chandrayan-3 Mission
                                </a></p>
                            <span class="date">&nbsp;</span>
                        </li>
                        <li>
                            <a href="images/06/VIGYAN MELA.pdf" target="_blank" class="style1"><img
                                    src="images/img/result.png" width="35" height="20" /></a>
                            <p><a href="images/06/VIGYAN MELA.pdf" target="_blank">University Students Achivements</a>
                            </p>
                            <span class="date">&nbsp;</span>
                        </li>

                        <li>
                            <a href="rkdf_admin_2012/Uploads/News_enevt/IIGP award.pdf" target="_blank"
                                class="style1"><img src="images/img/result.png" width="35" height="20" /></a>
                            <p><a href="rkdf_admin_2012/Uploads/News_enevt/IIGP award.pdf" target="_blank">RKDF
                                    University Students Achivements </a></p>
                            <span class="date">&nbsp;</span>
                        </li>


                        <!-- 
                        <li>
                            <a href="images/06/Bhaskar News.PDF" target="_blank" class="style1"><img src="images/img/result.png"
                                    width="35" height="20" /></a>
                            <p><a href="images/06/Bhaskar News.PDF" target="_blank">RKDF University Students Achivements
                                </a></p>
                            <span class="date">&nbsp;</span>
                        </li>
                       <li>
                            <a href="images/auap_certificate2.pdf" target="_blank"><img
                                    src="rkdf_admin_2012/Uploads/News_enevt/auap_univ.jpg" width="100"
                                    height="75" /></a>
                            <p><a href="images/auap_certificate2.pdf" target="_blank">RKDF UNIV ASSOCIATION OF
                                    "AUAP"</a></p>
                            <span class="date">&nbsp;</span>
                        </li>-->
                    </ul>
                </div>
                <a href="" class="readmore">View More<span>+</span></a>
            </div>
            <!--- newsEvents -->
            <!--- association -->
            <div id="contact">
                <div id="social">
                    <!-- <h3 class="footerTitle" align="right"><a href="">
                            <font color="#FFFFFF"> JOBS</font>
                        </a></h3>-->
                    <h3 class="footerTitle"> Rules and Regulations</h3>
                    <div class="facebook">
                        <h4><a href="terms&condition.php">Terms & Condition</a></h4>
                    </div>
                    <div class="twitter">
                        <h4><a href="privacy.php"> Privacy Policy </a></h4>
                    </div>
                    <div class="googlePlus">
                        <h4><a href="refund.php">Refund and Cancellation </a></h4>
                    </div>
                </div>
            </div>

            <!--- contact -->
            <div id="social">
                <div class="facebook">
                    <a href="https://www.facebook.com/rkdfuniversitybhopal" target="_blank" class=""><img
                            src="images/fb2.png" /></a>
                    <h4><a href="https://www.facebook.com/rkdfuniversitybhopal" target="_blank">Facebook</a></h4>
                    <p>Visit our FB</p>
                </div>
                <div class="twitter">
                    <a href="https://twitter.com/universityRkdf" target="_blank" class=""><img
                            src="images/Twitter.png" /></a>
                    <h4><a href="https://twitter.com/universityRkdf" target="_blank">Twitter</a></h4>
                    <p>Get tweets</p>
                </div>
                <div class="twitter">
                    <a href="https://www.instagram.com/rkdfuniversitybhopal/" target="_blank" class=""><img
                            src="images/insta.jpg" width="53" height="58" /></a>

                    <h4>
                        <a href="https://www.instagram.com/rkdfuniversitybhopal/" target="_blank">Instagram</a>
                    </h4>
                    <p>Instagram</p>
                </div>
            </div>
        </div>
        <div title="FOR ADD" id="feedback">
            <a href="https://erplive.rkdf.ac.in/Student/Registration" title="For Admission Query" target="_blank"><img
                    src="images/img/admisn2.JPG" width="37" height="152" /></a>
        </div>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
