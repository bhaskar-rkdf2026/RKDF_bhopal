<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>::RAM KRISHNA COLLEGE OF HOMOEOPATHY & MEDICAL SCIENCES, RKDF University::</title>
    <meta name="keywords" content="free templates, Business Website, Free CSS Template, CSS, HTML" />
    <meta name="description" content="Business Template is a free css template provided by templatemo.com" />
    <link href="templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
    <script language="javascript" type="text/javascript">
    function clearText(field) {
        if (field.defaultValue == field.value) field.value = '';
        else if (field.value == '') field.value = field.defaultValue;
    }
    </script>
    <style type="text/css">
    <!--
    .style1 {
        color: #FFFFFF;
        font-weight: bold;
        font-size: 28px;
    }

    .style2 {
        color: #FFFFFF;
        font-size: 18px;

    }
    -->
    </style>
</head>

<body>
    <div id="templatemo_header_wrapper">

        <div id="templatemo_header">

            <div></div>
        </div> <br /> <br /><!-- end of header -->
        <p align="center" class="style1">RAM KRISHNA COLLEGE OF HOMOEOPATHY & MEDICAL SCIENCES,RKDF UNIVERSITY</p><br />

        <p align="center" class="style2">(Gandhi Nagar Campus) Bhopal</p>
    </div>
    <!-- end of header wrapper -->

    <div id="templatemo_menu_wrapper">

        <div id="templatemo_menu">
            <?php
		include "include/menu.php";
		
		?>
        </div> <!-- end of menu -->
    </div> <!-- end of menu wrapper -->

    <div id="tempatemo_content_wrapper">

        <div id="templatemo_content">
            <div id="content_panel">

                <div id="column_w610">

                    <div class="header_01">STUDENTS FEEDBACK FORM : </div>
                    <p>
                        <?php
          // This PHP Contact Form is offered &quot;as is&quot; without warranty of any kind, either expressed or implied.
          // David Carter at www.css3templates.co.uk shall not be liable for any loss or damage arising from, or in any way
          // connected with, your use of, or inability to use, the website templates (even where David Carter has been advised
          // of the possibility of such loss or damage). This includes, without limitation, any damage for loss of profits,
          // loss of information, or any other monetary loss.

          // Set-up these 3 parameters
          // 1. Enter the email address you would like the enquiry sent to
          // 2. Enter the subject of the email you will receive, when someone contacts you
          // 3. Enter the text that you would like the user to see once they submit the contact form
          $to = 'rkchms2016@gmail.com';
          $subject = 'students feedback';
          $contact_submitted = 'Your message has been sent.';

          // Do not amend anything below here, unless you know PHP
          function email_is_valid($email) {
            return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
          }
          if (!email_is_valid($to)) {
            echo '<p style="color: red;">You must set-up a valid (to) email address before this contact page will work.</p>';
          }
          if (isset($_POST['contact_submitted'])) {
            $return = "\r";
            $youremail = trim(htmlspecialchars($_POST['your_email']));
            $yourname = stripslashes(strip_tags($_POST['your_name']));
            $yourmessage = stripslashes(strip_tags($_POST['your_message']));
            $contact_name = "Name: ".$yourname;
            $message_text = "Message: ".$yourmessage;
            $user_answer = trim(htmlspecialchars($_POST['user_answer']));
            $answer = trim(htmlspecialchars($_POST['answer']));
            $message = $contact_name . $return . $message_text;
            $headers = "From: ".$youremail;
            if (email_is_valid($youremail) && !eregi("\r",$youremail) && !eregi("\n",$youremail) && $yourname != "" && $yourmessage != "" && substr(md5($user_answer),5,10) === $answer) {
              mail($to,$subject,$message,$headers);
              $yourname = '';
              $youremail = '';
              $yourmessage = '';
              echo '<p style="color: blue;">'.$contact_submitted.'</p>';
            }
            else echo '<p style="color: red;">Please enter your name, a valid email address, your message and the answer to the simple maths question before sending your message.</p>';
          }
          $number_1 = rand(1, 9);
          $number_2 = rand(1, 9);
          $answer = substr(md5($number_1+$number_2),5,10);
        ?>

                    <form id="contact" action="feedback.php" method="post">
                        <div class="form_settings">
                            <p><strong>Name&nbsp;&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="contact" title="Enter Your Full Name" type="text" name="your_name"
                                    value="<?php echo $yourname; ?>" />
                            </p>
                            <p><strong>Email
                                    Address&nbsp;&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="contact" type="text" name="your_email"
                                    value="<?php echo $youremail; ?>" />
                            </p>
                            <p><strong>Message ( for your feedback)</strong>
                                <textarea class="contact textarea" title="Enter Your Message " rows="5" cols="50"
                                    name="your_message"><?php echo $yourmessage; ?></textarea>
                            </p>
                            <p style="line-height: 1.7em;">To help prevent spam, please enter the answer to this
                                question:</p>
                            <p><strong><?php echo $number_1; ?> + <?php echo $number_2; ?> =
                                    ?&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="user_answer" /><input type="hidden" name="answer"
                                    value="<?php echo $answer; ?>" />
                            </p>
                            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit"
                                    name="contact_submitted" value="send" /></p>
                        </div>
                    </form>


                    </p>

                </div> <!-- end of column w610 -->
                <!-- end of column 290 -->
                <div class="cleaner"></div>

            </div> <!-- end of content panel -->

            <div class="cleaner"></div>
        </div> <!-- end of content -->

    </div> <!-- end of content wrapper -->

    <div id="templatemo_footer_wrapper">

        <div id="templatemo_footer">

            <?php
    include "include/footer.php";
 
      ?>
            <div class="cleaner"></div>
        </div> <!-- end of footer -->
    </div> <!-- end of footer -->
</body>

</html> <!-- end of content wrapper -->