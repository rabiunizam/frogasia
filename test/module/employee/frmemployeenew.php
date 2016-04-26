<?php
	include"../../session.php";
	include"../../functions/fnemployee.php";
	include"../../functions/fn.php";
	$pagename = "frmemployee";
?>
<html>
<head>
<title>New User</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../css/new_style.css" rel="stylesheet" type="text/css">
<style type="text/css">
	<!--
	.style4 {
		font-family: verdana, arial, verdana, "sans serif";
		font-size: 12px;
		color: #000000;
	}
	.style5 {font-size: 14px}
	-->
</style>
<script language="JavaScript" type="text/javascript" src="../../ajax/ajax_js.js"></script>
<SCRIPT language=JavaScript>
	function Form1_Validator(theForm) {
	
		var alertsay = ""; // define for long lines
	
		if (theForm.empbranchid1.selectedIndex <= 0) {
			alert("Please select Branch.");
			theForm.empbranchid1.focus();
			return (false);
		}
		
		if (theForm.empgroup1.selectedIndex <= 0) {
			alert("Please select level.");
			theForm.empgroup1.focus();
			return (false);
		}
		
		if (theForm.empno1.value=="") {
			alert("You must enter the Employee No");
			theForm.empno1.focus();
			return(false);
		}
		// allow ONLY alphabet keys and symbols
		// this can be altered for any "checkOK" string you desire
		var checkOK1 = "1234567890 ";
		var checkStr1 = theForm.empno1.value;
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
			alert("Please insert valid Employee No  !!!");
			theForm.empno1.focus();
			return (false);
		}
	

		if (theForm.empname1.value=="") {
			alert("You must enter the Employee Name");
			theForm.empname1.focus();
			return(false);
		}
		// allow ONLY alphabet keys and symbols
		// this can be altered for any "checkOK" string you desire
		var checkOK1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@./ ";
		var checkStr1 = theForm.empname1.value;
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
			alert("Please insert valid name!!!");
			theForm.empname1.focus();
			return (false);
		}
	
		if (theForm.empsex1.selectedIndex <= 0) {
			alert("Please select gender.");
			theForm.empsex1.focus();
			return (false);
		}
	
		if (theForm.empusername1.value == "") {
			alert("You must enter User Name.");
			theForm.empusername1.focus();
			return (false);
		}
	
		if (theForm.emppassword1.value == "") {
			alert("You must enter Password.");
			theForm.emppassword1.focus();
			return (false);
		}
	
		if (theForm.emppassword2.value == "") {
			alert("You must confirmed the Password.");
			theForm.emppassword2.focus();
			return (false);
		}
		
		//to confirm same password insert
		if (theForm.emppassword1.value!=theForm.emppassword2.value) {
			alert("Your password does not match!!!");
			theForm.emppassword2.focus();
			return(false);
		}
	
		if (theForm.empstatus1.selectedIndex <= 0) {
			alert("Please select employee status.");
			theForm.empstatus1.focus();
			return (false);
		} 
	}
	

</SCRIPT>
</head>
<body>
<?php
	$empbranch = $_SESSION["empbranchid"];
	$userid = $_SESSION["empusername"];
	$UserGroup = $_SESSION["empgroup"];
	$employeeid = $_SESSION["employeeid"];

?>
<table width="600" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="33" rowspan="2"><img src="../../images/user.JPG"> </td>
    <td height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; New User </td>
</tr>
<tr>
	<td height="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;create new user </td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FF9900"></td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
</table>
<form action="frmemployeeaction.php" method="post" name="form1" onSubmit="return Form1_Validator(this)">
<input name="permission" type="hidden" id="permission" value="">

<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
	<td>
    <FIELDSET style="border:1px solid #cccccc; width:600;">
    <LEGEND class="page_title_black">Employee Details</LEGEND>
    <table width="580" border="0" cellpadding="0" cellspacing="0">
    <tr>
		<td width="580">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="<?php print"$tablebordercolor"; ?>">
		<tr>
			<td>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="30%" height="20" class="label_text">Name </td>
                <td width="70%" height="20">
                	<input name="empname1" type="text" id="empname1" value="" size="50" maxlength="200" class="textinput">
               	</td>
			</tr>
            <tr>
            	<td height="20" class="label_text"> IC No./Passport</td>
            	<td height="20" class="label_text">
                	<input name="empnricpassportno1" type="text" id="empnricpassportno1" value="" size="20" maxlength="15" class="textinput">
					<span class="label_text"><font color="#CC3333"><b>(eg. 540617108974)</b></font></span>
            	</td>
            </tr>
            <tr>
                <td height="20" class="label_text">Branch Name </td>
                <td height="20" class="label_text">
				<?php
                                 	print SelectField2("empbranchid1","","400","tblbranch where status = 1 ","branchid","branchname","","");
                ?>
                </td>
            </tr>
            <tr>
                <td height="20" class="label_text">level</td>
                <td height="20" class="label_text">
                <?php 
							print selectfield("empgroup1","",200,"tblgroup","groupid","groupname");
             ?>
                </td>
            </tr>
            <tr>
            	<td width="30%" height="20" class="label_text">Employee No </td>
            	<td width="70%" height="20">
                	<input name="empno1" type="text" id="empno1" value="" size="10" maxlength="10" class="textinput">
            	</td>
            </tr>
            <tr>
                <td height="20" class="label_text">gender</td>
                <td height="20" class="label_text">
					<?php print selectfield("empsex1","","100","tblgender","gendercode","gendername"); ?>
                </td>
            </tr>
            <tr>
            	<td height="20" class="label_text">Mobile Phone No </td>
            	<td height="20">
                	<input name="emphandphoneno1" type="text" id="emphandphoneno1" size="20" maxlength="13" value="" class="textinput">
					<span class="label_text"><font color="#CC3333"><b>(601xxxxxxxx)</b></font></span>
				</td>
            </tr>
            <tr>
                <td height="20" class="label_text">User Name </td>
                <td height="20">
                	<input name="empusername1" type="text" id="empusername1" size="30" maxlength="60" value="" class="textinput">
                </td>
            </tr>
            <tr>
                <td height="20" class="label_text">Password</td>
                <td height="20">
					 <input name="emppassword1" type="password" id="emppassword1" value="" size="20" class="textinput">
            	</td>
            </tr>
            <tr>
                <td height="20" class="label_text">Confirmed Password </td>
                <td height="20">
                	<input name="emppassword2" type="password" id="emppassword2" value="" size="20" maxlength="100" class="textinput">
                </td>
            </tr>
            <tr>
                <td height="20" class="label_text">status</td>
                <td height="20" class="label_text">
					<?php print selectfield("empstatus1","","100","tblemployeestatus","empstatusid","empstatusname"); ?>
                </td>
            </tr>
			</table>
            </td>
		</tr>
		</table>
        </td>
    </tr>
    </table>
    </FIELDSET>
    </td>
</tr>
<tr>
    <td height="47">
        <div align="center">
        <input type="submit" class="text_button" name="Submit" class="text_button" value="Save" onclick="selectAll(document.form1.selectedcollegeid);">
        <input type="reset" class="text_button" name="Reset" value="Reset">&nbsp;
        </div>
    </td>
</tr>
</table>
</form>
</body>
</html>
