<?php
	include"../../session.php";
	include"../../functions/fnemployee.php";
	include"../../functions/fn.php";
	$pagename = "frmemployeeview";
?>
<html>
<head>
<title>View User</title>
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
<SCRIPT language=JavaScript>
	function Form1_Validator(theForm) {
	
		var alertsay = ""; // define for long lines
	
		if (theForm.empcenterid1.selectedIndex <= 0) {
			alert("Please select Center.");
			theForm.empcenterid1.focus();
			return (false);
		}
	
		if (theForm.empgroup1.selectedIndex <= 0) {
			alert("Please select level.");
			theForm.empgroup1.focus();
			return (false);
		}
		
		// check to see if the field is blank
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

	$username = $_GET["username"]; 
	$Employee  = clsemployee::employeesearch1(2,"","","",$username,"",""); 
    $searchStmt = $Employee->searchStmt ;
    //echo $searchStmt;
	$ExecQuery  = ExecQuery::ExecSecondQuery($searchStmt); 
    $result = $ExecQuery->result ;
 		
 	$rst = $fetcharray($result);
	
	$empusername1 = $rst["empusername"];
	$employeeid = $rst["employeeid"];
	$empname1 = $rst["empname"];
	$empno1  = $rst["empno"];
	$empnricpassportno1 = $rst["empnricpassportno"];
	$empusername1 = $rst["empusername"];
	$emppassword1 = $rst["emppassword"];
	$empbranchid1 = $rst["empbranchid"];
	$empsex1 = $rst["empsex"];
	$emphomephoneno1 = $rst["emphomephoneno"];
	$emphandphoneno1 = $rst["emphandphoneno"];
	$empemail1 = $rst["empemail"];
	$description1 = $rst["description"];
	$empgroup1  = $rst["empgroup"];
	$empstatus1 = $rst["empstatus"];

	$Empbranch = SearchName("tblbranch","branchid",$empbranchid1,"branchname");
	$empgroupName = SearchName("tblgroup","groupid",$empgroup1,"groupname");
	$empstatusname = Searchname("tblemployeestatus","empstatusid",$empstatus1,"empstatusname");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="33" rowspan="2"><img src="../../images/search.JPG"> </td>
    <td height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; User Details </td>
</tr>
<tr>
	<td height="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;view user details </td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FF9900"></td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
</table>
<form action="frmemployee.php?username=<?php print $empusername1?>" method="post" name="form1" >
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
	<td>
    <FIELDSET style="border:1px solid #cccccc; width:580;">
    <LEGEND class="page_title_small">Employee Details</LEGEND>
    <table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
		<td width="580">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="<?php print"$tablebordercolor"; ?>">
        <tr>
        	<td>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="30%" height="20" class="label_text">Name </td>
                <td width="70%" height="20">
                	<input name="empname1" class="textinput" type="text" id="empname1" value="<?php print $empname1; ?>" size="50" readonly>
                </td>
			</tr>
			<tr>
                <td height="20" class="label_text"> I/C No./Passport</td>
                <td height="20" class="label_text">
                	<input name="empnricpassportno1" class="textinput" type="text" id="empnricpassportno1" value="<?php print $empnricpassportno1; ?>" size="20" readonly>
                </td>
            </tr>
            <tr>
                <td width="30%" height="20" class="label_text">Employee No </td>
                <td width="70%" height="20">
                	<input name="empno1" class="textinput" type="text" id="empno1" value="<?php print $empno1; ?>" size="10" maxlength="10" readonly>
                </td>
            </tr>
            <tr>
                <td height="20" class="label_text">School Name </td>
                <td height="20" class="label_text">
                    <input name="Empbranch" class="textinput" type="text" id="Empbranch" value="<?php print $Empbranch; ?>" size="50" readonly>
                    <input name="empbranchid1"type="hidden" id="empbranchid1" value="<?php print $empbranchid1; ?>" size="20">
                </td>
            </tr>
              </tr>
            <tr>
                <td height="20" class="label_text">Group</td>
                <td height="20" class="label_text">
                    <input name="$empgroupName" class="textinput" type="text" id="$empgroupName" value="<?php print $empgroupName; ?>" size="20" readonly>
                    <input name="$empgroup1" type="hidden" id="$empgroup1" value="<?php print $empgroup1; ?>">
                </td>
            </tr>
            <tr>
                <td height="20" class="label_text">Mobile Phone No</td>
                <td height="20">
                	<input name="emphandphoneno1" class="textinput" type="text" id="emphandphoneno1" size="20" value="<?php print $emphandphoneno1;?>" readonly>
                </td>
            </tr>
            <tr>
                <td height="20" class="label_text">User Name </td>
                <td height="20">
                	<input name="empusername1" class="textinput" type="text" id="empusername1" size="20" value="<?php print $empusername1; ?>" readonly >
            	</td>
            </tr>
            <tr>
                <td height="20" class="label_text">Status</td>
                <td height="20" class="label_text">
                	<input name="empstatusname" class="textinput" type="text" id="empstatusname" size="20" value="<?php print $empstatusname; ?>" readonly >
                	<input name="empstatus1" type="hidden" id="empstatus1" value="<?php print $empstatus1; ?>" >
                </td>
            </tr>
			</table>
            </td>
		</tr>
        <tr>
            <td height="47" align="right">
                <input type="submit" name="Submit" class="text_button" value="Edit">
                <input name="Close" type="button" id="Close" class="text_button" value="Close" onClick="self.close();">&nbsp;
            </td>
        </tr>
		</table>
        </td>
    </tr>
    </table>
	</FIELDSET>
    </td>
</tr>
</table>
</form>
</body>
</html>
