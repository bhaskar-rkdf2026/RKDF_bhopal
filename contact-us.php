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
            <div id="collegeDetail">
                <h2 class="titleDescription"><a href="#"></a></h2>
                <a href="" class="thump"></a>
                <p align="justify"><strong>RKDF UNIVERSITY</strong><br />
                </p>
                <p align="justify"><img src="images/img/contact us.jpeg" width="318" height="184" /></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <strong>ADDRESS </strong>:
                <ul>
                    <li><strong>RKDF UNIVERSITY </strong></li>
                    <li><strong>AIRPORT BY PASS ROAD</strong></li>
                    <li><strong>GANDHI NAGAR, BHOPAL,462033</strong></li>
                    <li><strong>MADHYA PRADESH, INDIA</strong></li>
                    <p>&nbsp;</p>
                    <li><strong>Email </strong>: <strong>rkdfuniversitybpl@gmail.com</strong></li>

                    <p>&nbsp;</p>
                    <li><strong>VC OFFICE </strong> :</li>
                    <li><strong> Phone </strong> : <strong>+91 &nbsp;755 2740395</strong></li>
                    <li><strong>Email </strong>: <strong>vc@rkdf.ac.in</strong></li>
                    <p>&nbsp;</p>
                    <li><strong>REGISTRAR </strong> :</li>
                    <li><strong> Phone</strong> :<strong>+91 755-2740395</strong></li>
                    <li><strong>Email </strong>: <strong>registrar@rkdf.ac.in </strong></li>
                </ul>
                <p>&nbsp;</p>
                <ul>
                    <li>
                        <font color="#EA0000" size="4"> TOLL FREE NO.</font>:
                    </li>
                    <li><strong> You may call from Landline or Mobile Phones.</strong></li>
                    <li><strong>18002700320</strong></li>
                </ul>
                <p>&nbsp;</p>


                <p>
                <h2><strong>To Post Your Feedback</strong><a href="feedback.php"> click here</a> </strong></h2>
                </p>

                <h2 style="padding-bottom:22px;">User Registration - SMS, WhatsApp, RCS, Email, and any other communication channel</h2>
                <?php if ($message) echo "<p style='color:red;'>" . htmlspecialchars($message) . "</p>"; ?>

                <form method="POST" action="rcp.php" onsubmit="return validateForm()">
                    <label>Phone Number:</label><br>
                    <input type="text" name="phone" id="phone" required placeholder="9876543210"><br><br>

                    <input type="checkbox" name="consent" id="consent" required>
                    <label for="consent">I agree to receive all updates via SMS, WhatsApp, RCS, Email, and any other
                        communication
                        channel.</label><br><br>

                    <button type="submit">Submit</button>
                </form>

                <script>
                function validateForm() {
                    var phone = document.getElementById("phone").value;
                    var consent = document.getElementById("consent").checked;
                    var indianPhoneRegex = /^[6-9]\d{9}$/;

                    if (!indianPhoneRegex.test(phone)) {
                        alert("Please enter a valid 10-digit Indian mobile number.");
                        return false;
                    }
                    if (!consent) {
                        alert("You must agree to the consent terms.");
                        return false;
                    }
                    return true;
                }
                </script>

                <!-- <p>
                    <input type="checkbox" name="user_consent" id="user_consent" required="required"
                        style="margin-right:8px;" /> <label for="user_consent" style="cursor:pointer;"> I agree to
                        receive all updates via SMS, WhatsApp, RCS, Email, and any other communication channel. </label>
                </p> -->


                <!--	       
     <ul><li><h2><strong>FOR ADMISSION QUERIES VISIT OUR ADMISSION CELL IN UNIVERSITY</strong></h2>
-->
            </div>
            <p>&nbsp;</p>
            <p align="left">&nbsp;</p>
            <div title="Click Here" id="feedback">
                <a href="https://erplive.rkdf.ac.in/Student/Registration" title="POST YOUR FEEDBACK"
                    target="_blank"><img src="images/img/admisn2.JPG" width="37" /></a>
            </div>
        </section>
        <!--- contentLeft -->
        <!--- sideBar -->
        <br class="clear" />
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3664.0905255566895!2d77.35739971403736!3d23.312474084806983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397c41561449e8d7%3A0xfc546b3d8731200e!2sRKDF%20UNIVERSITY%20BHOPAL!5e0!3m2!1sen!2sin!4v1681279428496!5m2!1sen!2sin"
            width="900" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>
    <section id="secfoot">
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
