<?php
//error_reporting(0);
if (isset($_POST["Submit"]))
{

$name=$_POST["nm"];
$course=$_POST["category"];
$branch=$_POST["choices"];
$mob=$_POST["mob"];
$email=$_POST["eid"];
$place=$_POST["add"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
.style4 {font-family: Arial, Helvetica, sans-serif}
.style3 {font-family: Arial, Helvetica, sans-serif;
font-size:34px}
.style5 {
	color: #D70000;
	font-weight: bold;
	font-size:20px;
}
.style6 {
	color: #007100;
	font-weight: bold;
}
.style7 {
	color: #2D2DFF;
	font-weight: bold;
}
.style8 {font-family: "Times New Roman", Times, serif}
.style9 {color:#0000DD; font-weight: bold; font-family: "Times New Roman", Times, serif; }
.style10 {
	color: #EA0000;
	font-weight: bold;
}
</style>
<head>
<meta name="keywords"
        content="rkdf enquery form, rkdf admission enquery form, online admission query, Best university in bhopal,Best university in Madhya Pradesh,Best engineering college in bhopal,best private university in bhopal,Madhyapradesh,university in bhopal,MBA college in Bhopal, rkdf, " />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RKDF ONLINE ADMISSION ENQUIRY FORM </title>
</head>

<body topmargin="20px" leftmargin="20" >
<table width="95%" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center"> <img src="images/header.jpg" width="780"  height="140"   /></td>
  </tr>
  <tr bgcolor="#FFEADF">
  <td width="348" height="54" align="left"><a href="http://rkdf.ac.in" title="BACK TO HOME"><img src="images/home1.jpg" width="151" height="42"  /></a></td>
    <td  colspan="2">
    <div align="left" class="style5"><u>ONLINE ADMISSION ENQUIRY FORM :  </u> </div></td>
	<td width="336" height="54" align="left"></td>
  </tr>
</table>
  <form method="post" action="admissionquery.php" id="demoForm" class="demoForm" >
  <table width="95%" border="0"  cellspacing="2"  cellpadding="6"  bgcolor="#F2FBFF">
   
  <tr>
    <td width="298" height="42">&nbsp;</td>
    <td width="212"><div align="right" class="style9">
      <div align="left">STUDENT FULL NAME </div>
    </div></td>
    <td width="22"><span class="style7">:</span></td>
    <td width="626"><input type="text" name="nm" style="text-transform: uppercase;"  minlength="2" maxlength="20"  placeholder="STUDENT FULL NAME" required/>	        </td>
  </tr>
  
 <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">COURSE</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><select name="category" required>
	<option value="BE">BACHELOR OF ENGINEERING(BE) </option>
	<option value="BE_LATERAL">BE LATERAL(BE-LATERAL) </option>
	<!--<option value="BE_PT">BACHELOR OF ENGINEERING(Part Time)</option>-->
	<option value="MTECH">MASTER OF TECHNOLOGY (M.TECH)</option>
	<option value="DIPLOMA">DIPLOMA IN ENGINEERING</option>
	<option value="DIPLOMA_LATERAL">DIPLOMA LATERAL(DIPLOMA-LATERAL)</option>
	<!--<option value="DIPLOMA_PT">DIPLOMA IN ENGINEERING (Part Time)</option>-->
	<option value="PHARMACY">PHARMACY</option>
	<option value="AGRICULTURE">AGRICULTURE</option>
	<option value="MANAGEMENT">MANAGEMENT</option>
	<option value="LAW">LAW</option>
	<option value="ARCHITECTURE">ARCHITECTURE</option>
	<option value="COMPUTER_APPLICATION">COMPUTER APPLICATION</option>
	<option value="SCIENCE">SCIENCE</option>
	<option value="COMMERCE">COMMERCE</option>
	<option value="ARTS">ARTS/HUMANITIES</option>
	<option value="EDUCATION">EDUCATION</option>
	<option value="LIBRARY_SC">LIBRARY & INFORMATION SCIENCES </option>
	<!--<option value="HOMOEOPATHY">HOMOEOPATHY</option>-->
	<option value="NURSING">NURSING</option>
	<option value="PARAMEDICAL">PARAMEDICAL</option>
    </select></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">BRANCH</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><select name="choices" id="choices" required>
            <!-- populated using JavaScript -->
        </select>	</td>
  </tr>
  
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">MOBILE NO. </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="tel" name="mob" id="phone" pattern="[6-9]{3}[0-9]{7}"  size="23" placeholder=" 10 DIGIT MOBILE NO." required />      </td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">EMAIL ID </div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><input type="email" name="eid" placeholder="EMAIL ID"  required/>     </td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td><div align="right" class="style9">
      <div align="left">PLACE</div>
    </div></td>
    <td><span class="style7">:</span></td>
    <td><textarea name="add" rows="3" cols="23" style="text-transform: uppercase;" placeholder="YOUR ADDRESS" required></textarea></td>
  </tr>
  <tr>
    <td height="59">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><input type="reset" name="ref" value="Refresh" style="bold:ridge #0000FF; font:bolder;height: 30px; color:#FF0000" /> &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="submit" name="Submit"  value="  SUBMIT  "   style="border:ridge #0000FF; font:bolder;height: 35px; color:#FF0000"/></td>
  </tr>
  <tr>
    <td height="77">&nbsp;</td>
    <td colspan="3" valign="bottom">&nbsp;
	<?php
	if (isset($_POST["Submit"]))
 {
$con=mysql_connect("localhost","rkhare_prashant","Vcwbtbcpii09");
      // $con=mysqli_connect("localhost","root","rootwdp");
	   mysql_select_db("rkhare_result2013",$con);
       $qry= "insert into admission23(name,course,branch,mob,email,place) values('".$name."','".$course."','".$branch."',".$mob.",'".$email."','".$place."')";
	  
	   //echo $qry;
	//exit;		
	 mysql_query($qry);
	mysql_close($con); 
	
	 echo "Thanks & Reply As Soon as Possible";
}	 
	?>
	</td>
    </tr>
	 <tr>
    <td height="45">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&copy; RAM KRISHNA DHARMARTH FOUNDATION(RKDF) UNIVERSITY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Rights Reserved.</td>
    </tr>
</table>
</form>
<script type="text/javascript">
/*
From JavaScript and Forms Tutorial at dyn-web.com
Find information and updates at http://www.dyn-web.com/tutorials/forms/
*/

// removes all option elements in select box 
// removeGrp (optional) boolean to remove optgroups
function removeAllOptions(sel, removeGrp) {
    var len, groups, par;
    if (removeGrp) {
        groups = sel.getElementsByTagName('optgroup');
        len = groups.length;
        for (var i=len; i; i--) {
            sel.removeChild( groups[i-1] );
        }
    }
    
    len = sel.options.length;
    for (var i=len; i; i--) {
        par = sel.options[i-1].parentNode;
        par.removeChild( sel.options[i-1] );
    }
}

function appendDataToSelect(sel, obj) {
    var f = document.createDocumentFragment();
    var labels = [], group, opts;
    
    function addOptions(obj) {
        var f = document.createDocumentFragment();
        var o;
        
        for (var i=0, len=obj.text.length; i<len; i++) {
            o = document.createElement('option');
            o.appendChild( document.createTextNode( obj.text[i] ) );
            
            if ( obj.value ) {
                o.value = obj.value[i];
            }
            
            f.appendChild(o);
        }
        return f;
    }
    
    if ( obj.text ) {
        opts = addOptions(obj);
        f.appendChild(opts);
    } else {
        for ( var prop in obj ) {
            if ( obj.hasOwnProperty(prop) ) {
                labels.push(prop);
            }
        }
        
        for (var i=0, len=labels.length; i<len; i++) {
            group = document.createElement('optgroup');
            group.label = labels[i];
            f.appendChild(group);
            opts = addOptions(obj[ labels[i] ] );
            group.appendChild(opts);
        }
    }
    sel.appendChild(f);
}

// anonymous function assigned to onchange event of controlling select box
document.forms['demoForm'].elements['category'].onchange = function(e) {
    // name of associated select box
    var relName = 'choices';
    
    // reference to associated select box 
    var relList = this.form.elements[ relName ];
    
    // get data from object literal based on selection in controlling select box (this.value)
    var obj = Select_List_Data[ relName ][ this.value ];
    
    // remove current option elements
    removeAllOptions(relList, true);
    
    // call function to add optgroup/option elements
    // pass reference to associated select box and data for new options
    appendDataToSelect(relList, obj);
};


// object literal holds data for optgroup/option elements
var Select_List_Data = {
    
    // name of associated select list
    'choices': {
        
        // names match option values in controlling select list
		BE: {
            // example without optgroups
           text: ['BE (Civil Engg.)', 'BE (Mechanical Engg.)', 'BE (Electrical & Electronics Engg.)','BE (Electrical Engg.)', 'BE (Electronics Comm. Engg.)','BE (Information Tech. Engg.)', 'BE (Computer Science Engg.)'],
                value: ['BE (Civil Engg.)', 'BE (Mechanical Engg.)', 'BE (Electrical & Electronics Engg.)','BE (Electrical Engg.)', 'BE (Electronics Comm. Engg.)','BE (Information Tech. Engg.)', 'BE (Computer Science Engg.)']
            },
		 BE_LATERAL: {
            // example without optgroups
                       text: ['BE LAT(Civil Engg.)', 'BE LAT(Mechanical Engg.)', 'BE LAT(Electrical & Electronics Engg.)','BE LAT(Electrical Engg.)', 'BE LAT(Electronics Comm. Engg.)','BE LAT(Information Tech. Engg.)', 'BE LAT(Computer Science Engg.)'],
                value: ['BE LAT(Civil Engg.)', 'BE LAT(Mechanical Engg.)', 'BE LAT(Electrical & Electronics Engg.)','BE LAT(Electrical Engg.)', 'BE LAT(Electronics Comm. Engg.)','BE LAT(Information Tech. Engg.)', 'BE LAT(Computer Science Engg.)']
        },
		/*BE_PT: {
            // example without optgroups
            text: ['BE(Part Time) Electrical Engineering', 'BE(Part Time) Mechanical Engineering'],
            value: ['M.Tech(VLSI)', 'rotate', 'form']
        },*/
        MTECH: {
            // example without optgroups
            text: ['M.Tech (VLSI Design)', 'M.Tech (Power System)','M.Tech (Power Electronics)','M.Tech (Computer Science)', 'M.Tech (Thermal Engg)','M.Tech (Industrial Production)','M.Tech (Digital Comm)','M.Tech (Electrical Power System)'],
            value: ['M.Tech (VLSI Design)', 'M.Tech (Power System)','M.Tech (Power Electronics)','M.Tech (Computer Science)', 'M.Tech (Thermal Engg)','M.Tech (Industrial Production)','M.Tech (Digital Comm)','M.Tech (Electrical Power System)' ]
        },
		DIPLOMA: {
            // example without optgroups
            text: ['Diploma (Civil)','Diploma (Electrical)','Diploma (Mechanical)','Diploma (Electronics & Telecommunication)','Diploma (Film Technology & TV)','Diploma (Computer Science)'],
            value: ['Diploma (Civil)','Diploma (Electrical)','Diploma (Mechanical)','Diploma (Electronics & Telecommunication)','Diploma (Film Technology & TV)','Diploma (Computer Science)']
            },
		 DIPLOMA_LATERAL: {
            // example without optgroups
            text: ['Diploma LAT(Civil)','Diploma LAT(Electrical)','Diploma LAT(Mechanical)','Diploma LAT(Electronics & Telecommunication)','Diploma LAT(Film Technology & TV)','Diploma LAT(Computer Science)'],
            value: ['Diploma LAT(Civil)','Diploma LAT(Electrical)','Diploma LAT(Mechanical)','Diploma LAT(Electronics & Telecommunication)','Diploma LAT(Film Technology & TV)','Diploma LAT(Computer Science)']
        },
		/*DIPLOMA_PT: {
            // example without optgroups
            text: ['Diploma (Civil) Part Time', 'Diploma (Mechanical) Part Time'],
            value: ['Diploma (Civil) Part Time', 'Diploma (Mechanical) Part Time']
        },*/
		 PHARMACY: {
            // optgroup label
            'PHARMACY': {
                text: ['D.Pharm', 'B.Pharm','B.Pharm(Lateral)', 'B.Pharm (Practice)'],
                value: ['D.Pharm', 'B.Pharm','B.Pharm(Lateral)', 'B.Pharm(Practice)']
            },
            'M.PHARM': {
                text: ['M.Phram (Pharmaceutics)', 'M.Phram (Pharmacology)', 'M.Phram (Pharmacognosy)', 'M.Phram (DRA)'],
                value: ['M.Phram (Pharmaceutics)', 'M.Phram (Pharmacology)', 'M.Phram (Pharmacognosy)', 'M.Phram (DRA)']
            }
        },
        AGRICULTURE: {
            // example without optgroups
            text: ['Diploma (Agriculture)', 'B.Sc Agriculture (Hons.)', 'B.Tech (Agriculture)', 'M.Sc(Agriculture)' ],
            value: ['Diploma (Agriculture)', 'B.Sc Agriculture (Hons.)', 'B.Tech (Agriculture)', 'M.Sc(Agriculture)' ]
        },
		 MANAGEMENT: {
            // example without optgroups
            text: ['BBA','BBA(Logistics)','BMS(Storage & Supply Chain)','MBA' ],
            value: ['BBA','BBA LOGOSTICS','BMS', 'MBA']
        },
		 LAW: {
            // example without optgroups
            text: ['LLB', 'BALLB','LLM' ],
            value: ['LLB', 'BALLB','LLM']
        },
		 ARCHITECTURE: {
            // example without optgroups
            text: ['B.Arch', 'M.Arch' ],
            value: ['B.Arch', 'M.Arch']
        },
		 COMPUTER_APPLICATION: {
            // example without optgroups
            text: ['BCA', 'MCA','DCA', 'PGDCA' ],
            value: ['BCA', 'MCA','DCA', 'PGDCA']
        },
		 SCIENCE: {
            // example without optgroups
            text: ['B.Sc(CBZ)', 'B.Sc(PCM)', 'B.Sc(BioTech)', 'B.Sc(Micro Biology)', 'B.Sc(Computer)','B.Sc( Food Science & Technology)','M.Sc (Chemistry)', 'M.Sc (Computer)', 'M.Sc( Food Science & Technology)', 'M.Sc (Mathematics)', 'M.Sc (Microbiology)', 'M.Sc (Physics)', 'M.Sc (Zoology)', 'M.Sc (Botany)' ],
            value: ['B.Sc(CBZ)', 'B.Sc(PCM)', 'B.Sc(BioTech)', 'B.Sc(Micro Biology)', 'B.Sc(Computer)','B.Sc( Food Science & Technology)','M.Sc (Chemistry)', 'M.Sc (Computer)', 'M.Sc( Food Science & Technology)', 'M.Sc (Mathematics)', 'M.Sc (Microbiology)', 'M.Sc (Physics)', 'M.Sc (Zoology)', 'M.Sc (Botany)']
        },
		 COMMERCE: {
            // example without optgroups
            text: ['B.Com', 'B.Com(Computer)', 'B.Com (Hons.)', 'M.Com' ],
            value: ['B.Com', 'B.Com(Computer)', 'B.Com (Hons.)', 'M.Com']
        },
		 ARTS: {
            // example without optgroups
            text: ['BA', 'M. A(Economics)', 'M. A(Education)', 'M. A(Hindi)', 'M. A(English)', 'M. A(History)', 'M. A(Mathematics)', 'M. A(Political Science)', 'M. A(Sociology)', 'BSW', 'MSW' ],
            value: ['BA', 'M. A(Economics)', 'M. A(Education)', 'M. A(Hindi)', 'M. A(English)', 'M. A(History)', 'M. A(Mathematics)', 'M. A(Political Science)', 'M. A(Sociology)', 'BSW', 'MSW' ]
        },
		 EDUCATION: {
            // example without optgroups
            text: ['D.Ed', 'B.Ed', 'M.Ed' ],
            value: ['D.Ed', 'B.Ed', 'M.Ed']
        },
		 LIBRARY_SC: {
            // example without optgroups
            text: ['B.LIB & I.Sc. ', 'M.LIB & I.Sc.' ],
            value: ['B.LIB', 'M.LIB']
        },
		/* HOMOEOPATHY: {
            // example without optgroups
            text: ['B.H.M.S' ],
            value: ['B.H.M.S']
        },*/
		NURSING: {
            // example without optgroups
            text: ['GNM', 'B.Sc (Nursing)', 'Post Basic .BSc (Nursing)' ],
            value: ['GNM', 'B.Sc (Nursing)', 'POST B.Sc (Nursing)']
        },
		 PARAMEDICAL: {
            // example without optgroups
            text: ['B.M.L.T', 'B.P.T.', 'DMLT', 'D.PHARMA(AYURVED)', 'DIPLOMA IN X RAY TECHNICIAN','CIRTIFICATE OF OT TECHNICIAN', ],
            value: ['B.M.L.T', 'B.P.T', 'DMLT', 'D.PHARMA(AYURVED)', 'DIPLOMA IN X RAY TECHNICIAN', 'CIRTIFICATE OF OT TECHNICIAN']
        }
    }
    
};

(function() { // immediate function to avoid globals
    
    var form = document.forms['demoForm'];
    
    // reference to controlling select box
    var sel = form.elements['category'];
    sel.selectedIndex = 0;
    
    // name of associated select box
    var relName = 'choices';
    // reference to associated select box
    var rel = form.elements[ relName ];
    
    // get data for associated select box passing its name
    // and value of selected in controlling select box
    var data = Select_List_Data[ relName ][ sel.value ];
    
    // add options to associated select box
    appendDataToSelect(rel, data);
    
}());
</script>

</body>
</html>
