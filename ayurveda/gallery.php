<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::RKCAMS::</title>
<meta name="keywords" content="free templates, Business Website, Free CSS Template, CSS, HTML" />
<meta name="description" content="Business Template is a free css template provided by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<style type="text/css">
<!--
.style1 {
	color:#FFFFFF;
	font-weight: bold;
	font-size:20px;
}
.style2 {color: #FFFFFF;
         font-size:18px;

}
.style5 {color:#AA0000; font-size:12px;}
-->

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
.demo1 {  opacity: 0.6;
}
.demo2 {  opacity: 0.6;
}
.demo3 {  opacity: 0.6;
}
.demo4 {  opacity: 0.6;
}
.demo5 {  opacity: 0.6;
}
</style>
</head>
<body>
<div id="templatemo_header_wrapper">

	<div id="templatemo_header">
    
    	<div></div>
    </div> <br/> <br/><!-- end of header -->
<p align="center" class="style1">RAM KRISHNA COLLEGE OF AYURVEDA & MEDICAL SCIENCES,RKDF UNIVERSITY</p> <br/> 
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
  <!-- end of content -->

  <p>&nbsp;</p>
    <p>&nbsp;</p>
	
<h2 style="text-align:center">Slideshow Gallery</h2>

<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="images/slider/ay3.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="images/slider/ay6.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="images/slider/ay4.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="images/slider/ay7.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="images/slider/ay1.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="images/slider/ay5.jpg" style="width:100%">
  </div>
    
   <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column"><img class="demo cursor" src="images/slider/ay3.jpg" style="width:100%" onclick="currentSlide(1)" alt="" /></div>
    <div class="column">
      <img class="demo cursor" src="images/slider/ay6.jpg" style="width:100%" onClick="currentSlide(2)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/slider/ay4.jpg" style="width:100%" onClick="currentSlide(3)" alt="">
    </div>
    <div class="column"><img class="demo cursor" src="images/slider/ay7.jpg" style="width:100%" onclick="currentSlide(4)" alt="" /></div>
    <div class="column"><img class="demo cursor" src="images/slider/ay1.jpg" style="width:100%" onclick="currentSlide(5)" alt="" /></div>    
    <div class="column">
      <img class="demo cursor" src="images/slider/ay5.jpg" style="width:100%" onClick="currentSlide(6)" alt="">
    </div>
  </div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
	
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  <p>&nbsp;</p>
    <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

</div> 
<!-- end of content wrapper -->

<div id="templatemo_footer_wrapper">

	<div id="templatemo_footer">
    	
     <?php
    include "include/footer.php";
      ?>
        <div class="cleaner"></div>
    </div> <!-- end of footer -->
</div> <!-- end of footer -->
</html> <!-- end of content wrapper -->
