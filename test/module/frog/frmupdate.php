<?php
	include"../../session.php";
	include"../../functions/fnfrog.php";
	include "../../functions/fn.php";
	$pagename = "frmupdate";

?>
<html>
<head>
<title>Update Frog</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK REL="stylesheet" HREF="tabs.css">
<link href="../../css/new_style.css" rel="stylesheet" type="text/css">
<link href="../../css/tabcontent.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="../../ajax/ajax_js.js"></script>
<script language="JavaScript" SRC="../../js/tabs.js"></script>
<script language="JavaScript" SRC="../../js/tabcontent.js"></script>
<script language="javascript"> DrawTabs(); </script>
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
	<!--
	var popup_detailsWindow=null;
	function popup_details(mypage,myname,w,h,pos,infocus) {
		if (pos == 'random') {
			LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;
			TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;
		} else {
			LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;
		}
		settings='width='+ w + ',height='+ h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes';popup_detailsWindow=window.open('',myname,settings);
		if(infocus=='front') {
			popup_detailsWindow.focus();
			popup_detailsWindow.location=mypage;
		}
		if(infocus=='back'){
			popup_detailsWindow.blur();
			popup_detailsWindow.location=mypage;
			popup_detailsWindow.blur();
		}
	}
	-->   
</script>
<SCRIPT language=JavaScript>
function Form1_Validator(theForm) {
	var alertsay = ""; // define for long lines
	
	if (theForm.studname.value == "") {
		alert("Please insert student Name.");
		theForm.studname.focus();
		return (false);
	}
	
	if (theForm.matrixno.value == "") {
		alert("Please insert Student No.");
		return (false);
	}   
	
  	if (theForm.ans.selectedIndex == 0) {	
		if(theForm.studnricpassportno.value.length==0) { 
			alert("Please Insert NRIC");
			return (false);
		}	
		if(isNaN(theForm.studnricpassportno.value)) {
			 alert("Invalid data format.\n\nOnly numbers are allowed.");
     		 theForm.studnricpassportno.focus();
			 return (false); 
		}
		if (theForm.studnricpassportno.value == "") {
			alert("Please enter your NRIC");			
			theForm.studnricpassportno.focus();
			return (false);
		}
		if ((theForm.studnricpassportno.value.length < 12) || (theForm.studnricpassportno.value.length > 12)) {
			alert("Your NRIC is more or less than 12 digit");			
			theForm.studnricpassportno.focus();
			return (false);
		}
	}
	
	if (theForm.ans.selectedIndex == 1) {
		if (theForm.studnricpassportno.value == "") {
			alert("Please enter your passport no");			
			theForm.studnricpassportno.focus();
			return (false);
		}
	}
	
	if (theForm.DOBday.value == "") {
		alert("Please insert day of birth.");
		return (false);
	}
	
	if (theForm.DOBMonth.value == "") {
		alert("Please insert month of birth.");
		return (false);
	}
	
	if (theForm.DOByear.value == "") {
		alert("Please insert year of birth.");
		return (false);
	}
	
	if (theForm.studnationalityid.selectedIndex <= 0) {
		alert("Please select Nationality.");
		theForm.studnationalityid.focus();
		return (false);
	}
	
	if (theForm.studsex.selectedIndex <= 0) {
		alert("Please select gender.");
		return (false);
	}
	
	if (theForm.studraceid.selectedIndex <= 0) {
		alert("Please select race.");
		return (false);
	}
	
	if (theForm.studreligionid.selectedIndex <= 0) {
		alert("Please select religion.");
		return (false);
	}
	
	if (theForm.studemail.value!="") {
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(theForm.email.value)){
			return (true)
		}
		alert("Invalid E-mail Address! Please re-enter.")
		return (false)
	}
	
	if (theForm.collegeid.selectedIndex <= 0) {
		alert("Please select Institution.");
		return (false);
	}
	
	if (theForm.facultyid.selectedIndex <= 0) {
		alert("Please select Faculty.");
		return (false);
	}
	
	if (theForm.studCourse.selectedIndex <= 0) {
		alert("Please select Course.");
		return (false);
	}
	
	if (theForm.studterm.selectedIndex <= 0) {
		alert("Please select Term.");
		return (false);
	}
	
	if (theForm.studintake.selectedIndex <= 0) {
		alert("Please select intake.");
		return (false);
	}   
	
	if (theForm.studadd1.value == "") {
		alert("Please insert Address.");
		return (false);
	}
	
	if (theForm.studcountryid.selectedIndex <= 0) {
		alert("Please select Country.");
		return (false);
	}   
	
	if (theForm.studmobile.value=="") {
		alert("You must enter the Contact Tel (HP)");
		theForm.mobile_no.focus();
		return(false);
	}
   
	// allow ONLY alphabet keys and symbols
	// this can be altered for any "checkOK" string you desire
	var checkOK1 = "1234567890 ";
	var checkStr1 = theForm.studmobile.value;
	var allValid1 = true;
	
	for (i = 0;  i < checkStr1.length;  i++) {
		ch = checkStr1.charAt(i);
		for (j = 0;  j < checkOK1.length;  j++)
			if (ch == checkOK1.charAt(j))
		break;
		if (j == checkOK1.length) {
			allValid1 = false;
			break;
		}
	}
  
	if (!allValid1) {
		alert("Please insert valid Contact Tel (HP)  !!!");
		theForm.studmobile.focus();
		return (false);
	}
}
</SCRIPT>
<style type="text/css">
	<!--
	.style1 {font-size: 10px}
	body {
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
	}
	-->
</style>
</head>
<body>
<?php
    $empbranch = $_SESSION["empbranchid"];
    $userid1 = $_SESSION["empusername"];


	if(isset($_POST["frogid1"])) { $frogid = trim($_POST["frogid1"]); }
	elseif(isset($_GET["frogid1"])) { $frogid = trim($_GET["frogid1"]); }
	else { $frogid = ""; }
	

	if ($frogid != "") {
		$frogsearch  = clsfrog::frogsearch1('2',"","","","","","","",$frogid);
        $searchStmt = $frogsearch->searchStmt ;
		$ExecQuery  = ExecQuery::ExecSecondQuery($searchStmt);
		$result = $ExecQuery->result ;
		$row = $fetcharray($result);
	
	$frogid1 = $row["frogid"];
	$frogname1 = $row["frogname"];
	$frognamesc1 = $row["frognamesc"];
	$frogdob1 = $row["frogdob"];
	$frogsexid1 = $row["frogsexid"];
	$frogcountryid1 = $row["frogcountryid"];
	$frogfamilyid1 = $row["frogfamilyid"];
	$frogorderid1 = $row["frogorderid"];
	$froggenus1 = $row["froggenus"];
	$frogepithet1 = $row["frogepithet"];
    $frogsubgenus1 = $row["frogsubgenus"];
	$frogsubfamily1 = $row["frogsubfamily"];
	$ponddetails1 = $row["ponddetails"];
 		$DOByear   			= trim(substr($row["frogdob"],0,4));
		$DOBMonth 				= trim(substr($row["frogdob"],5,2));
		$DOBday  				= trim(substr($row["frogdob"],8,2));

		}
?>
<form action="frmaction.php" method="post" name="frmupdate" id="frmupdate" onSubmit="return Form1_Validator(this)">
<table width="950" height="350" border="0" align="left" cellpadding="0" cellspacing="0" bordercolor="<?php print $tablebordercolor; ?>" >
<tr height="200"> 
   	<td valign="top"> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="31" rowspan="2"><img src="../../images/frog.jpeg" width="31" height="35"> </td>
        <td height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp;Edit Frog </td>
    </tr>
    <tr>
    	<td height="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;Edit Frog Details  </td>
    </tr>
    <tr>
    	<td height="5" colspan="2" bgcolor="#FF9900"></td>
    </tr>
    <tr>
    	<td height="5" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
   	<tr align="left" valign="middle">
		<td width="4%">&nbsp;</td>
        <td width="15%" height="25" valign="middle" class="label_text">Frog Name *</td>
		<td width="35%">
        <input name="frogid" type="hidden"  id="frogid" value="<?php print $frogid1; ?>">
     	<input name="frogname" type="text" class="textinput" id="frogname" size="50"  value="<?php print $frogname1; ?>" style="text-transform:uppercase"></td>
		<td width="2%">&nbsp;</td>
        <td width="15%"class="label_text">Date of Birth </td>
		<td width="20%">
	        	<input name="DOBday" type="text" class="textinput" id="DOBday" value="<?php print $DOBday; ?>" size="2" maxlength="2" > /
            <input name="DOBMonth" type="text" class="textinput" id="DOBMonth" value="<?php print $DOBMonth; ?>" size="2" maxlength="2"> /
         	<input name="DOByear" type="text" class="textinput" id="DOByear" value="<?php print $DOByear; ?>" size="4" maxlength="4">
         	<span class="style5"><span class="style1"><strong> <font color="#CC3333">(DD/MM/YYYY)</font></strong></span>
	</td>
		<td width="4%">&nbsp;</td>
	</tr>
	<tr align="left" valign="middle">
				<td width="4%">&nbsp;</td>
		<td height="15%" class="label_text">Scientific Name </td>
		<td height="35%">
        	<input name="frognamesc" class="textinput" type="text" id="frognamesc"   value="<?php print $frognamesc1; ?>" size="50" style="text-transform:uppercase">
        </td>
		<td width="4%">&nbsp;</td>

		<td>&nbsp;</td>
	</tr>
    </table>
    <br>
    <ul id="maintab" class="shadetabs">
        <li class="selected"><a href="#" rel="a">Frog Details</a></li>
        <li><a href="#" rel="b">Pond environments</a></li>
    </ul>
    <div class="tabcontentstyle">
        <div id="a" class="tabcontent">
        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr align="left" valign="middle">
            <td width="15%" height="25" class="label_text">Gender *</td>
            <td width="35%" height="25"><?php print selectfield("frogsexid",$frogsexid1,"130","tblgender","gendercode","gendername"); ?> </td>
            <td width="15%" height="25" class="label_text">Country *</td>
           <td><?php print selectfield("frogcountryid",$frogcountryid1,"200","tblcountry","countryid","countryname"); ?></td>
        </tr>
        <tr align="left" valign="middle">
        <td height="25" valign="middle" class="label_text">Genus</td>
		<td><input name="froggenus" type="text" class="textinput" id="froggenus"  value="<?php print $froggenus1; ?>" size="30" style="text-transform:uppercase"></td>
        <td class="label_text">Specific Epithet</td>
		<td><input name="frogepithet" class="textinput" type="text" id="frogepithet"  value="<?php print $frogepithet1; ?>" size="30" style="text-transform:uppercase">
        </td>
        </tr>
        <tr align="left" valign="middle">
        <td height="25" valign="middle" class="label_text">Clade/Subgenus</td>
		<td><input name="frogsubgenus" type="text" class="textinput" id="frogsubgenus" size="30"  value="<?php print $frogsubgenus1; ?>" style="text-transform:uppercase"></td>
        <td class="label_text">Subfamily</td>
		<td><input name="frogsubfamily" class="textinput" type="text" id="frogsubfamily" value="<?php print $frogsubfamily1; ?>" size="30" style="text-transform:uppercase">
        </td>
        </tr>
         <tr align="left" valign="middle" class="label_text">
            <td height="25" class="label_text">Family *</td>
            <td height="25"><div align="left"><?php print selectfield("frogfamilyid",$frogfamilyid1,"180","tblfamily","familyid","familyname"); ?></div></td>
            <td height="25" class="label_text">Order *</td>
            <td height="25"><?php  print selectfield("frogorderid",$frogorderid1,"150","tblorder","orderid","ordername"); ?></td>
        </tr>
         <tr>
        	<td height="30" class="label_text">&nbsp;</td>
            <td colspan="3">&nbsp;</td>
        </tr>

        </table>
        </div>
        <div id="b" class="tabcontent">
        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr align="left" valign="middle">
        	<td width="15%" height="25" class="label_text">Pond Details *</td>
            <td colspan="3">
            <TEXTAREA NAME="ponddetails" COLS=100 ROWS=10><?php print $ponddetails1; ?></TEXTAREA>
         </td>
        </tr>
        </table>
        </div>
    </div>
    </td>
</tr>
<tr>
	<td>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="25" align="right">
            <input name="Submit" type="submit" class="text_button" id="Update" style="width:120" value="Update">
            <input name="Reset" type="reset" class="text_button" id="Reset" style="width:120" value="Reset">&nbsp;
		</td>
	</tr>
	</table>
    </td>
</tr></table>
</form>
</body>
<script type='text/javascript'>initializetabcontent("maintab");</script>
</html>
