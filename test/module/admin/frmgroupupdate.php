<?php
	include"../../session.php";
	include"../../functions/fngroup.php";
	include"../../functions/fn.php";
	$pagename = "frmgroupupdate";
?>
<html>
<head>
<title>Edit Group</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../../css/new_style.css" type=text/css rel=stylesheet>
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
	<!--
	var popup_detailsWindow=null;
	function popup_details(mypage,myname,w,h,pos,infocus){
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
		if(infocus=='back') {
			popup_detailsWindow.blur();
			popup_detailsWindow.location=mypage;
			popup_detailsWindow.blur();
		}
	}
	// -->
</script>
<SCRIPT language=JavaScript>
function Form1_Validator(theForm)
{
  	if (theForm.empstatusid.selectedIndex <= 0)
    {
    	alert("Please enter status");
    	return (false);
  	}
  	
}
</SCRIPT>
<script type="text/javascript" src="../../common/sortabletable.js"></script>
</head> 
<body>
<table width="500" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="500">
    <form action="frmaction.php" method="post" name="frmgroupnew" id="frmgroupnew" onSubmit="return Form1_Validator(this)">
    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <?php
		$Today = date("Y-m-d");
		
		if(isset($_POST["Submit"])) {
			$Search=$_POST["Submit"];
		} elseif(isset($_GET["Submit"])) {
			$Search=$_GET["Submit"];
		} else {
			$Search="";
		}
		
		$empcenterid = $_SESSION["empcenterid"];
		$userid = $_SESSION["empusername"];
		
		if(isset($_POST["groupname"])) { $groupname = trim($_POST["groupname"]); }  
		elseif(isset($_GET["groupname"])) { $groupname = trim($_GET["groupname"]); }  
		else { $groupcode = ""; }
		
		$whereFields = " groupname = '$groupname'";	
		$Subjects = searchfieldname("tblgroup","*",$whereFields);
		
		$row = $fetcharray($Subjects);
		$groupid = $row["groupid"];
		$groupname = $row["groupname"];
		$empstatusid = $row["empstatusid"];

    ?>
    <tr>
        <td width="39" rowspan="2"><img src="../../images/new.JPG" width="31" height="35"> </td>
        <td width="461" height="17"  bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; Edit Group</td>
    </tr>
    <tr>
    	<td height="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;Update Group's Status</td>
    </tr>
    <tr>
    	<td height="5" colspan="2" bgcolor="#FF9900"></td>
    </tr>
    <tr>
    	<td height="5" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>		
    <tr> 
        <td height="74" colspan="2">
        <FIELDSET style="border:1px solid #cccccc; width:100%;">
        <LEGEND class="page_title_black"  ><strong> Group Details </strong></LEGEND>  
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="left" valign="middle">
            <td width="30%" height="25" class="label_text">Group Name</td>
            <td width="70%" height="25">
                <input name="groupname" type="text" id="groupname" size="16" value="<?php print $groupname?>" class="textinput">
                <input type="hidden" name="groupid" value="<?php print $groupid ?>">   
            </td>
        </tr>
        <tr>
            <td height="25" class="label_text">Status</td>
            <td><?php print selectfield("empstatusid",$empstatusid,"130","tblemployeestatus","empstatusid","empstatusname"); ?></td>
        </tr>  
        <tr>
            <td height="25" align="right" colspan="2"> 
                <input type="Submit" name="Submit" value="Update Group" class="text_button">&nbsp;
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