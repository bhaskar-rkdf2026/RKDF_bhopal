<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
 <link rel="icon" type="image/jpg" href="images/rkdflogo.jpg">
        <title>RKDF Question Paper</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animate.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>
<style>
 .float-container {
  border: solid 1px #ccc;
  padding: 0 8px;
  position: relative;
}
.float-container input {
  border: 1px solid;
  font-size: 16px;
  margin: 16px 0 10px;
  outline: 0;
}
label {
  font-size: 16px;
  position: absolute;
  transform-origin: top left;
  transform: translate(0, 16px) scale(1);
  transition: all .1s ease-in-out;
}
.float-container.active label {
  transform: translate(0, 4px) scale(.75);
}
.contactinfo p{
   font-family:sans-serif;
   font-size:28px; 
   font-weight:200;
   text-align: center;
   margin-top:60px; 
}
.contactinfo ul li{
    margin:20px;
    margin-left:30px;
}
</style>
    </head>
    <body>
        <!-- This part contains the header section-->
       <?php include 'include/headindex.php';?>
                <div class="row">
                    <div class="contactheader"></div>
            <div class="col-md-12 headerContent">
                <h1 class="animated flash">Contact Us</h1>
                <p class="lead">Have questions? We have answers.</p>
            </div>
</div>
        <div class="modal fadeInUp" id="exampleModalLabel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div style="text-align:center;background-color:#EBF8A4;" class="modal-body" id="submitted">
                          
                        </div>
                      </div>
                    </div> 
               </div>
        <div class="row content-area">
            <div class="card col-md-12">
                <div class="row">
                <div class="col-md-8">
                    <form class="validate-form" id="data" action="contactus_action" method="post">
                <h2 style="margin:40px 0px;" class="wow fadeInUp" data-wow-delay="0.4s"><i class="fa fa-envelope"></i> Write to us:</h2>
                <div class="row">
					<div class="wrap-input2 validate-input wow fadeInUp" data-wow-delay="0.2s" data-validate="Name is required">
						<input class="input2" type="text" id="name" name="name">
						<span class="focus-input2" data-placeholder="Your name"></span>
					</div>

					<div class="wrap-input2 validate-input wow fadeInUp" data-wow-delay="0.4s" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input2" type="text" id="email" name="email">
						<span class="focus-input2" data-placeholder="Your email"></span>
					</div>
                </div>
                <div class="row">
                                         <div class="wrap-input2 validate-input wow fadeInUp" data-wow-delay="0.2s" data-validate = "Valid Phone is required: 9000900088">
						<input class="input2" id="phone" type="text" name="phone">
						<span class="focus-input2" data-placeholder="Your phone"></span>
					</div>
                
                                          <div class="wrap-input2 validate-input wow fadeInUp" data-wow-delay="0.4s" data-validate = "Enter your college name:">
						<input class="input2" id="college" type="text" name="college">
						<span class="focus-input2" data-placeholder="Your college"></span>
					</div>
                </div>
					<div class="messagewrap-input2 validate-input wow fadeInUp" data-wow-delay="0.4s" data-validate = "Message is required">
						<textarea class="input2" id="message" name="message"></textarea>
						<span class="focus-input2" data-placeholder="Your message"></span>
					</div>
                                                        <button name="send" class="btn btn-primary" style="margin-bottom:10px;">
                                                            <i class="fa fa-send"></i>
							</button>
                                     </form>
                </div>
                <div class="col-md-4"  style="background-color:#007bff; color:#FFFFFF">
                    <div class="contactinfo" >
                        <p class="wow fadeInUp" data-wow-delay="0.2s">Contact Information</p>
                    <ul algin="center" style="list-style: none; font-size:16px;">
                        <li class="wow fadeInUp" data-wow-delay="0.3s"><i class="fa fa-map-marker"></i> Bhopal,Madhya Pradesh (462001), India</li>
                        <li class="wow fadeInUp" data-wow-delay="0.4s"><i class="fa fa-phone"></i> + 91 9000000909</li>
                        <li class="wow fadeInUp" data-wow-delay="0.5s"><i class="fa fa-envelope"></i> contact@example.com</li>
                        <hr style="background-color:white;">
                        <li  class="wow fadeInUp" data-wow-delay="0.5s" style="text-align:center;">
                            <div class="row">
                            <div class="col-md-2"><a class="wow fadeInUp" data-wow-delay="0.4s" style="color:white;" target="_blank" title="facebook" href="https://www.facebook.com/rkdfuniversitybhopal/"><i class="fa fa-facebook"></i></a></div>
                                <div class="col-md-2"><a class="wow fadeInUp" data-wow-delay="0.6s" style="color:white;" target="_blank" title="twitter" href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></div>
                                <div class="col-md-2"><a class="wow fadeInUp" data-wow-delay="0.8s" style="color:white;" target="_blank" title="linkedin" href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></div>
                            </div>
                         </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
                </div>
        <div class="jumbotron j2">
            <div class="row">
                <div class="col-md-5 bg-info text-white rksize">
                     <h1 class="display-4 head wow fadeInLeft">RKDF University</h1>
                     <p class="lead wow fadeInUp">Moving towards the better tomorrow.</p>
                </div>
                <div id="carouselExampleControls" class="col-md-7 carousel slide carousel-fade j2img rksize" data-ride="carousel">
                          <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/rkdf.jpg" class="rksize carouselsize" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/rkdf1.jpg" class="rksize carouselsize" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/rkdf2.jpg" class="rksize carouselsize" alt="...">
                        </div>
                      </div>
                </div>
            </div>
        </div>
<?php include 'include/footindex.php'; ?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script src="js/main.js"></script>
    <script src="css/select2/select2.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
        <script>
          $(document).on('submit','#data',function(event){
              event.preventDefault();
              var name=$('#name').val();
              var email=$('#email').val();
              var phone=$('#phone').val();
              var college=$('#college').val();
              var message=$('#message').val();
              
              var data="name="+name+"&email="+email+"&phone="+phone+"&college="+college+"&message="+message;
             
            // AJAX Code To Submit Form.
             $.ajax({
            type: "POST",
            url: "contactus_action",
            data: data,
            success: function(data){
                $("#exampleModalLabel").modal("show");
                $("#submitted").html(data);
                var delay=1000;
                setTimeout(function(){
                    window.location.href="contact";
                },delay)
            }
            });
          });
    </script>
     <script type="text/javascript">
    $(document).ready(function () {
    //Disable full page
    $("body").on("contextmenu",function(e){
        return false;
    })
     });
    </script>
</body>
</html>
