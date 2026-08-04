<?php
require_once __DIR__ . '/include/site_settings.php';
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Untitled Document — RKDF University Bhopal</title>
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
      <h1 class="rk-h1" style="font-size:clamp(2.5rem, 5.5vw, 5.2rem);margin-top:12px;">Untitled Document</h1>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION (100% Exact Original Inner Content & Links Preserved) -->
  <section class="sp-main-box">
    <div class="rk-container">
<form method="post" action="PaytmKit/pgRedirect.php">
		<table width="704" height="325" border="0" bgcolor="#FFE4CA" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td width="48" height="22">&nbsp;</td>
					<td width="155"><label></label></td>
					<td width="501"><input type="hidden" id="ORDER_ID"  maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">	</td>
				</tr>
				<tr>
					<td height="37">&nbsp;</td>
					<td><span class="style6">
					  <label>CUST_ID ::</label>
					  </span></td>
					<td><input id="CUST_ID"  maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $xid; ?>" ></td>
				</tr>
				
				<tr>
					<td height="35">&nbsp;</td>
					<td><span class="style6">
					  <label>MOBILE NO. ::</label>
					  </span></td>
				  <td><input title="Mobile no." id="MSISDN"	type="text" name="MSISDN" value="<?php echo $mob; ?>" > </td>
				</tr>
				<tr>
					<td height="34">&nbsp;</td>
					<td><span class="style6">
					  <label>EMAIL ID ::</label>
					  </span></td>
					<td><input title="email" id="EMAIL" type="text" name="EMAIL" value="<?php echo $email; ?>" > </td>
				</tr>
				<tr>
					<td height="53">&nbsp;</td>
					<td><span class="style6">
					  <label>TXN AMOUNT <span class="style7">*</span></label>
					  </span></td>
					<td><input title="REGISTRATION AMOUNT" type="number" id="TXN_AMOUNT" min="1000" name="TXN_AMOUNT" required> <span class="style1">(Plz Fill Only Amount You Pay Minimum 1000/-)</span>
				  </td>
				</tr>

				<tr>
					<td height="44"></td>
					<td></td>
					<td><input value=" PAYNOW " type="submit"	onclick=""></td>
				</tr>
				<tr>
					<td height="48">&nbsp;</td>
					<td><label></label></td>
					<td><input type="hidden" id="INDUSTRY_TYPE_ID"  maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="PrivateEducation"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><label></label></td>
					<td><input type="hidden" id="CHANNEL_ID"  maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">					</td>
				</tr>
			</tbody>
  </table>
		<span class="style7">*</span> -<span class="style8"> Mandatory Fields</span>
</form>
    </div>
  </section>

  <!-- APPROVED FOOTER -->
  <?php include __DIR__ . '/include/footer.php'; ?>

</body>
</html>
