<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diploma AG Result - RKDF University, Bhopal — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Diploma AG Result - RKDF University, Bhopal</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<!--
        The main layout table. Using inline style for background image for simplicity,
        but typically background images are handled in CSS classes.
    -->
    <table class="main-layout-table" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="3">
                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                    style="background-image: url('<?php echo BACKGROUND_IMAGE_PATH; ?>'); background-size: cover;">

                    <tr>
                        <td class="header-bg-cell">
                            <!--
                                Images with alt attributes for accessibility. Using PHP constants for image paths.
                            -->
                            <img src="<?php echo LOGO_IMAGE_PATH; ?>" width="812" height="111" alt="RKDF University Logo" />
                            <img src="<?php echo APPROVAL_IMAGE_PATH; ?>" width="100" height="118" alt="Approval Logo" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="45" colspan="3">
                <table class="dropdown-bg-table" width="100%" border="0">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td width="6">&nbsp;</td>
            <td width="965">
                <form method="post" action="new_diplomaAG.php">
                    <table class="main-content-table" width="100%" height="249" border="0">
                        <tr>
                            <td width="8" height="55">&nbsp;</td>
                            <td width="320">&nbsp;</td>
                            <td width="623">
                                <span class="style11">RESULT : DIPLOMA AG. - June - 2025</span>
                            </td>
                        </tr>
                        <tr>
                            <td height="41">&nbsp;</td>
                            <td>
                                <div align="center">
                                    <label for="rollnoInput" class="style3">Enter Your Rollno.</label>
                                </div>
                            </td>
                            <td>
                                <input type="text" name="rno" id="rollnoInput" required
                                    placeholder="e.g., 123456789" /> </td>
                        </tr>
                        <tr>
                            <td height="31">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" name="Submit" value="Show Result" />
                            </td>
                        </tr>
                        <tr>
                            <td height="45" colspan="3">&nbsp;</td> </tr>
                        <tr>
                            <td height="36">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>
                                <?php if (!empty($errorMessage)): ?>
                                    <span class="style12"><?php echo $errorMessage; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td height="24" colspan="3">&nbsp;</td> </tr>
                    </table>
                </form>
            </td>
            <td width="4">&nbsp;</td>
        </tr>
        <!--
            Consolidated remaining empty rows. In a modern layout, these
            would likely be replaced by CSS spacing (padding/margin) instead of empty table rows.
        -->
        <tr>
            <td colspan="3" height="220">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
    </table>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
