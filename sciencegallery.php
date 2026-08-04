<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RKDF Gallery — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">RKDF Gallery</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<table width="95%" border="0" cellpadding="0" cellspacing="0">
 
  <tr>
    <td colspan="3"><table width="100%" border="0" background="../../test1/rkdf_university/images/dBg.jpg" cellpadding="0" cellspacing="0">
      <tr>
        <td width="906"><div align="center">
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="715" height="140">
            <param name="movie" value="../../test1/rkdf_university/images/rkdf4.swf" />
            <param name="quality" value="high" />
            <embed src="../../test1/rkdf_university/images/rkdf4.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="715" height="140"></embed>
          </object>
        </div></td>
        <td width="340">
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="92" height="92">
            <param name="movie" value="../../test1/rkdf_university/images/nba1.swf" />
            <param name="quality" value="high" />
            <embed src="../../test1/rkdf_university/images/nba1.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="92" height="92"></embed>
          </object>        </td>
      </tr>
    </table></td>
  </tr>
  <tr >
    <td height="40" colspan="3"><table width="1247" border="0" background="../../test1/images/dropdownBg.png">
      <tr>
        <td width="95" height="30"><a href="http://rkdf.ac.in/index.php"><span class="style1">Home</span></a></td>
        <td width="1139">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="101" colspan="3" valign="top">
	<div id="page">
			<div id="container">
				<h1 class="style2">INNOVATIONS IN SCIENCE</h1>

				<!-- Start Advanced Gallery Html Containers -->
				<div id="gallery" class="content">
					<div id="controls" class="controls"></div>
					<div class="slideshow-container">
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>
					<div id="caption" class="caption-container"></div>
				</div>
				<div id="thumbs" class="navigation">
					<ul class="thumbs noscript">
						<li>
							<a class="thumb" name="leaf" href="images/gallery/science_innovation/DSC00891.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC00891.JPG"  />							</a>
							<div class="caption">
								
								<div class="image-title"> Innovations</div>
								<div class="image-desc">Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" name="drop" href="images/gallery/science_innovation/DSC00968.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC00968.JPG" />							</a>
							<div class="caption"></div>
						</li>

						<li>
							<a class="thumb" name="bigleaf" href="images/gallery/science_innovation/DSC01021.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01021.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc">Science </div>
							</div>
						</li>

						<li>
							<a class="thumb" name="lizard" href="images/gallery/science_innovation/DSC01260.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01260.JPG"/>							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01261.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01261.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01264.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01264.JPG"/>							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01266.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01266.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01270.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01270.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01271.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01271.JPG"/>							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01274.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01274.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01275.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01275.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01290.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01290.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/rkdf_1.jpg" title="rkdf">
								<img src="images/gallery/rkdf_1_s.jpg" alt="rkdf" />							</a>
							<div class="caption">
								
								<div class="image-title">RKDF</div>
								<div class="image-desc">At Campus</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/rkdf_2.jpg" title="rkdf">
							<img src="images/gallery/rkdf_2_s.jpg" alt="rkdf" /></a>
							<div class="caption">
								
								<div class="image-title">RKDF</div>
								<div class="image-desc">At Campus</div>
							</div>
						</li>

						<li>
						<a class="thumb" href="images/gallery/rkdf_3.jpg" title="rkdf">
							<img src="images/gallery/rkdf_3_s.jpg" alt="rkdf" /></a>
						  <div class="caption">
								
								<div class="image-title">RKDF</div>
								<div class="image-desc">At Campus</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01292.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01292.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01293.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01293.JPG"/>							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01295.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01295.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01300.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01300.JPG" />							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01309.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01309.JPG"/>							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01302.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01302.JPG"/>							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/rkdf_716x310_19.jpg" title="University">
								<img src="images/gallery/rkdf_716x310_19_s.jpg" alt="University" />							</a>
							<div class="caption">
								
								<div class="image-title">RKDF University</div>
								<div class="image-desc">Building</div>
							</div>
						</li>

						<li>
						  <a class="thumb" href="images/gallery/DSC_7020.jpg" title="ground">
						  <img src="images/gallery/DSC_7020_s.jpg" alt="ground" /></a>
						  <div class="caption">
								
								<div class="image-title">GROUND</div>
								<div class="image-desc">At Campus</div>
							</div>
						</li>

						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01303.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01303.JPG"/>							</a>
							<div class="caption">
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>
						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01304.JPG">
								<img src="images/gallery/science_innovation/75_75/DSC01304.JPG" />							</a>
							<div class="caption">
								
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>
						<li>
							<a class="thumb" href="images/gallery/science_innovation/DSC01308.JPG">
							<img src="images/gallery/science_innovation/75_75/DSC01308.JPG" /></a>
							<div class="caption">
								
								
								<div class="image-title">Innovations</div>
								<div class="image-desc"> Science 14-Dec-2013</div>
							</div>
						</li>
					</ul>
			  </div>
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
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
