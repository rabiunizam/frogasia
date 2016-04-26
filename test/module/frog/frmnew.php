<?php
	include"../../session.php";
	include"../../functions/fnemployee.php";
	include "../../functions/fn.php";
	$pagename = "frmnew";
	
?>
<html>
<head>
<title>New</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK REL="stylesheet" HREF="tabs.css">
<link href="../../css/new_style.css" rel="stylesheet" type="text/css">
<link href="../../css/tabcontent.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="../../ajax/ajax_js.js"></script>
<script language="JavaScript" src="../../js/tabs.js"></script>
<script language="JavaScript" src="../../js/tabcontent.js"></script>
<script language="javascript"> DrawTabs(); </script>
<SCRIPT language=JavaScript>
function Form1_Validator(theForm) {
	var alertsay = ""; // define for long lines
	
	if (theForm.frogname.value == "") {
		alert("Please Insert Frog Name.");
		theForm.frogname.focus();
		return (false);
	}
	
 	if (theForm.frognamesc.value == "") {
		alert("Please Insert Scientific Name.");
		theForm.frognamesc.focus();
		return (false);
	}

	if (theForm.DOBday.value == "") {
		alert("Please Insert Day Of Birth.");
		return (false);
	}
	
	if (theForm.DOBMonth.value == "") {
		alert("Please Insert Month Of Birth.");
		return (false);
	}
	
	if (theForm.DOByear.value == "") {
		alert("Please Insert Year Of Birth.");
		return (false);
	}
	
	if (theForm.frogsex.selectedIndex <= 0) {
		alert("Please Select Gender.");
		return (false);
	}
	
	if (theForm.frogcountryid.selectedIndex <= 0) {
		alert("Please Select Country.");
		return (false);
	}
	
 	if (theForm.frogfamilyid.selectedIndex <= 0) {
		alert("Please Select Family.");
		return (false);
	}
	
	if (theForm.frogorderid.selectedIndex <= 0) {
		alert("Please Select Order.");
		return (false);
	}
	

}
</SCRIPT>
<style type="text/css">
	<!--
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
	$userid = $_SESSION["empusername"];
	$UserGroup = $_SESSION["empgroup"];
	$employeeid = $_SESSION["employeeid"];
?>
<form name="form1" method="post" action="frmaction.php" onSubmit="return Form1_Validator(this)">
<table width="980" height="400" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr> 
	<td width="100%" valign="top" bgcolor="#FFFFFF"> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr> 
		<td width="5%" rowspan="2"><img src="../../images/frog.jpeg" width="31" height="35"></td>
		<td height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; New Frog</td>
	</tr>
	<tr>
		<td height="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;&nbsp;Registration For New Frog</td>
    </tr>
	<tr>
    	<td height="5" colspan="2" bgcolor="#FF9900"></td>
	</tr>
    <tr>
    	<td height="5" colspan="2" bgcolor="#FFFFFF"></td>
    </tr>
    </table>
    <br>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr align="left" valign="middle"> 
		<td width="4%">&nbsp;</td>
        <td width="15%" height="25" valign="middle" class="label_text">Frog Name *</td>
		<td width="35%"><input name="frogname" type="text" class="textinput" id="frogname" size="50" style="text-transform:uppercase"></td>
		<td width="2%">&nbsp;</td>
        <td width="15%"class="label_text">Date of Birth </td>
		<td width="20%">
			<input name="DOBday" type="text" class="textinput" id="DOBday" onKeyUp="javascript:this.value=this.value.replace(/[^0-9]/g, '');" size="2" maxlength="2" >/
			<input name="DOBMonth" type="text" class="textinput" id="DOBMonth" onKeyUp="javascript:this.value=this.value.replace(/[^0-9]/g, '');" size="2" maxlength="2" >/
			<input name="DOByear" type="text" class="textinput" id="DOByear" onKeyUp="javascript:this.value=this.value.replace(/[^0-9]/g, '');" size="4" maxlength="4" >
            <span class="label_text"><font color="#CC3333"><b>(DD/MM/YYYY)</b></font></span>
		</td>
		<td width="4%">&nbsp;</td>
	</tr>
	<tr align="left" valign="middle"> 
				<td width="4%">&nbsp;</td>
		<td height="15%" class="label_text">Scientific Name </td>
		<td height="35%">
        	<input name="frognamesc" class="textinput" type="text" id="frognamesc" value="" size="50" style="text-transform:uppercase">
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
            <td width="35%" height="25"><?php print selectfield("frogsexid",0,"130","tblgender","gendercode","gendername"); ?> </td>
            <td width="15%" height="25" class="label_text">Country *</td>
           <td><?php print selectfield("frogcountryid",151,"200","tblcountry","countryid","countryname"); ?></td>
        </tr>
        <tr align="left" valign="middle">
        <td height="25" valign="middle" class="label_text">Genus</td>
		<td><input name="froggenus" type="text" class="textinput" id="froggenus" size="30" style="text-transform:uppercase"></td>
        <td class="label_text">Specific Epithet</td>
		<td><input name="frogepithet" class="textinput" type="text" id="frogepithet" value="" size="30" style="text-transform:uppercase">
        </td>
        </tr>
        <tr align="left" valign="middle">
        <td height="25" valign="middle" class="label_text">Clade/Subgenus</td>
		<td><input name="frogsubgenus" type="text" class="textinput" id="frogsubgenus" size="30" style="text-transform:uppercase"></td>
        <td class="label_text">Subfamily</td>
		<td><input name="frogsubfamily" class="textinput" type="text" id="frogsubfamily" value="" size="30" style="text-transform:uppercase">
        </td>
        </tr>
         <tr align="left" valign="middle" class="label_text">
            <td height="25" class="label_text">Family *</td>
            <td height="25"><div align="left"><?php print selectfield("frogfamilyid",1,"180","tblfamily","familyid","familyname"); ?></div></td>
            <td height="25" class="label_text">Order *</td>
            <td height="25"><?php  print selectfield("frogorderid",1,"150","tblorder","orderid","ordername"); ?></td>
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
            <TEXTAREA NAME="ponddetails" COLS=100 ROWS=10></TEXTAREA>
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
            <input name="Submit" type="submit" class="text_button" id="Save" style="width:120" value="Save">
            <input name="Reset" type="reset" class="text_button" id="Reset" style="width:120" value="Reset">&nbsp;
		</td>
	</tr>
	</table>
    </td>
</tr>
</table>
</form>
</body>
<script type='text/javascript'>initializetabcontent("maintab");</script>
</html>
