<?php
	include"../../session.php";
	include"../../functions/fngroup.php";
	include"../../functions/fn.php";
	$pagename = "frmgroupnew";
?>
<html>
<head>
<title>New Group</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../../css/new_style.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript>
function Form1_Validator(theForm)
{
  	if (theForm.groupname.value == '')
    {
    	alert("Please enter Group");
    	return (false);
  	}  		
}
</SCRIPT>
<script type="text/javascript" src="../../common/sortabletable.js"></script>
</head> 
<body>
<table width="500" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="33" rowspan="2"><img src="../../images/new.JPG" width="31" height="35"> </td>
    <td height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; New Group</td>
</tr>
<tr>
    <td height="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;Create New Group</td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FF9900"></td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
<tr>
    <td width="500" colspan="2">
    <form action="frmaction.php" method="post" name="frmgroupnew" id="frmgroupnew" onSubmit="return Form1_Validator(this)">
    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <?php
		
		$empcenterid = $_SESSION["empcenterid"];
		$userid = $_SESSION["empusername"];
		
		if(isset($_POST["groupname"])) { $groupname = trim($_POST["groupname"]); }  
		elseif(isset($_GET["groupname"])) { $groupname = trim($_GET["groupname"]); }  
		else { $groupname = ""; }
		
    ?>
    <tr> 
        <td width="500" height="74">
        <FIELDSET style="border:1px solid #cccccc; width:100%;">
        <LEGEND class="page_title_black"  ><strong> New Group </strong></LEGEND>  
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="left" valign="middle">
            <td height="25" class="label_text">&nbsp;</td>
			<td width="70%" height="25">&nbsp;</td>
        </tr>
        <tr>
        	 <td width="30%" height="25" class="label_text">Group</td>
            <td width="70%" height="25"><input name="groupname" type="text" class="textinput" id="groupname" size="15"></td>
        </tr>
        <tr>
            <td height="25" align="right" colspan="2"> 
                <input type="Submit" name="Submit" value="Create Group" class="text_button">
                <input type="Reset" name="Reset" value="Clear" class="text_button">&nbsp;
            </td>
        </tr>
        </table>
        </FIELDSET> 
    	</td>
    </tr> 
    </table>
	</form>
	</td>
</tr>
</table>
</body>
</html>