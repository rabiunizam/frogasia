<?php
	include"../../session.php";
	include"../../functions/fnemployee.php";
	include"../../functions/fnfaculty.php";
	include"../../functions/fncourse.php";
	include"../../functions/fncollege.php";
	include"../../functions/fn.php";
	$pagename = "frmemployee";
?>
<html>
<head>
<title>Change Password</title>
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
	}
</SCRIPT>
</head>
<body>
<?php
	$collegecode = $_SESSION["empcenterid"];
	$userid = $_SESSION["empusername"];
	$EmpId = $_SESSION["employeeid"];
	$UserGroup = $_SESSION["empgroup"];
	
	$Action = $_GET["Action"]; 
	$username = $_GET["username"]; 
	$Employee  = clsemployee::employeesearch1(2,"","","",$userid,"",""); 
    $searchStmt = $Employee->searchStmt ;
	$ExecQuery  = ExecQuery::ExecSecondQuery($searchStmt); 
    $result = $ExecQuery->result ;
 		
 	$rst = $fetcharray($result);
	
	$empusername1 = $rst["empusername"];
	$empname1 = $rst["empname"];
	$empno1  = $rst["empno"];
	$empnricpassportno1 = $rst["empnricpassportno"];
	$empusername1 = $rst["empusername"];
	$emppassword1 = $rst["emppassword"];
	$empcenterid1 = $rst["empcenterid"];
	$empsex1 = $rst["empsex"];
	$emphomephoneno1 = $rst["emphomephoneno"];
	$emphandphoneno1 = $rst["emphandphoneno"];
	$empemail1 = $rst["empemail"];
	$description1 = $rst["description"];
	$empgroup1  = $rst["empgroup"];
	$empstatus1 = $rst["empstatus"];
	$employeedicipline = $rst["employeedicipline"];
	$employeecourse = $rst["employeecourse"];
	$employeeid = $rst["employeeid"];
	
	$disciplinename = Searchname("tblfaculty","facultyid",$employeedicipline,"facultyname");
	$coursename = Searchname("tblcourse","id",$employeecourse,"coursename");        
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="33" rowspan="2"><img src="../../images/search.JPG"> </td>
    <td  height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; Change Password</td>
</tr>
<tr>
	<td height="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;Change Password </td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FF9900"></td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
</table>
<form action="frmemployeeaction.php" method="post" name="form1" onSubmit="return Form1_Validator(this)">
<table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
    <td>
    <FIELDSET style="border:1px solid #cccccc; width:700;">
    <LEGEND class="page_title_black">Employee Details</LEGEND>
    <table width="700" border="0" align="left" cellpadding="0" cellspacing="0">
    <tr>
        <td width="700">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="<?php print"$tablebordercolor"; ?>">
        <tr>
        	<td>		
			<table width="95%" border="0" align="center" cellpadding="3" cellspacing="0">
            <tr>
                <td width="30%" height="20" class="label_text">Name </td>
                <td width="70%" height="20">
                	<input name="empname1" type="text" id="empname1" value="<?php print $empname1; ?>" size="50" maxlength="200" class="textinput">
            	</td>
            </tr>
            <tr>
                <td height="20" class="label_text">User Name </td>
                <td height="20">
                	<input name="empusername1" type="text" id="empusername1" size="30" maxlength="60" value="<?php print $empusername1;  ?>" class="textinput" readonly="" >
					<span class="label_text"><font color="#CC3333"><b>** Username Cannot Edit..</b></font></span>
				</td>
            </tr>
            <tr>
                <td height="20" class="label_text">Password</td>
                <td height="20">
					<?php $CryptedPassword = crypter($emppassword1,'xs:a/55p;',0); ?>
					<input name="emppassword1" type="password" id="emppassword1" value="<?php print $CryptedPassword; ?>" size="30" class="textinput">
                </td>
            </tr>
            <tr>
                <td height="20" class="label_text">Confirmed Password </td>
                <td height="20">
                	<input name="emppassword2" type="password" id="emppassword2" value="<?php print $CryptedPassword;  ?>" size="30" maxlength="100" class="textinput">
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
    <td height="47" align="center">
        <input type="submit" name="Submit" class="text_button" value="Change Password">
        <input type="reset" name="Reset" value="Reset" class="text_button">
        <input name="Close" type="button" id="Close" class="text_button" value="Close" onClick="self.close();">
    </td>
</tr>
</table>
</form>
</body>
</html>
