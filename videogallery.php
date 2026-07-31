<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>RKDF Gallery</title>
<style type="text/css">
<!--
.style1 {
	color:#0000F0;
	font-weight: bold;
	text-decoration:none;
	font-size:20px;
}
.style3 {
	color:#0000F0;
	font-weight: bold;
	text-decoration:none;
	font-size:14px;
}
-->
</style>


<link rel="stylesheet" href="css/basic.css" type="text/css" />
		<link rel="stylesheet" href="css/galleriffic-3.css" type="text/css" />
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="js/jquery.history.js"></script>
		<script type="text/javascript" src="js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
		<!-- We only want the thunbnails to display when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>
        <style type="text/css">
<!--
.style2 {color: #006595}
-->
        </style>
</head>

<body>
<table width="95%" border="0" cellpadding="0" cellspacing="0">
 
  <tr>
    <td colspan="3">
	<table width="100%" border="0" background="images/dBg.jpg" cellpadding="0" cellspacing="0">
      <tr>
        <td width="890">
       <?php
			include "include/header.php";
			?>        </td>
      </tr>
    </table></td>
  </tr>
  <tr >
    <td height="40" colspan="3"><table width="1080" border="0" background="images/dropdownBg.png">
      <tr>
        <td width="139" height="25"><a href="http://rkdf.ac.in/index.php" class="style1">Home</a></td>
        <td width="931">&nbsp;
          <div align="left"><a href="imggallery.php" class="style3">Image Gallery</a></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="101" colspan="3" valign="top">
	<div id="page">
			<div id="container">
				<h1 class="style2">RKDF UNIVERSITY VIDEO GALLERY</h1>
           
				<!-- Start Advanced Gallery Html Containers -->
				
				<div id="thumbs" class="navigation">
			  </div>
			  <h3 class="style2">विकसित भारत @2047</h3>
<video width="400" controls>
  <source src="images/gallery/video/viksit_bharat.mp4" type="video/mp4">
  Your browser does not support HTML video.
</video>
			  
			  <h3 class="style2">डॉ.साधना कपूर, कुलाधिपति  को ऑक्सफ़ोर्ड अकादमिक यूनियन का सम्मान</h3>
			  <video width="400" controls>
  <source src="images/gallery/video/oxford.mp4" type="video/mp4">
  Your browser does not support HTML video.
</video>
<h3 class="style2">Organizes -Drug De-Addiction Bharat Campaign - Videos</h3>
<video width="400" controls>
  <source src="images/gallery/video/Nasha Mukti.mp4" type="video/mp4">
  Your browser does not support HTML video.
</video>
							
						
						
							<video width="400" controls>
  <source src="images/gallery/video/Nasha Mukti Abhiyan.mp4" type="video/mp4">
  Your browser does not support HTML video.
</video><br />
  <h3 class="style2">National Integration Day programme - October 30, 2022 </h3>
<video width="400" controls>
  <source src="images/gallery/video/National Integration Day.mp4" type="video/mp4">
  Your browser does not support HTML video.
</video>
  <h3 class="style2">पुनीत सागर अभियान के तहत 1 MPCTR <br /> एनसीसी कैडेट कोर ने की सफाई   </h3>
<video width="400" controls>
  <source src="images/gallery/video/nadi safai.mp4" type="video/mp4">
  Your browser does not support HTML video.
</video>
					
					
							
				<!-- End Advanced Gallery Html Containers -->
				<div style="clear: both;"></div>
			</div>
		</div>
		
		<div id="footer">&copy; 2013 RKDF University, Bhopal</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash. 
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				$("a[rel='history']").live('click', function(e) {
					if (e.button != 0) return true;
					
					var hash = this.href;
					hash = hash.replace(/^.*#/, '');

					// moves to a new page. 
					// pageload is called at once. 
					// hash don't contain "#", "?"
					$.historyLoad(hash);

					return false;
				});

				/****************************************************************************************/
			});
		</script>	</td>
  </tr>
</table>
</body>
</html>
