<?php
//Created By Azlan on 26 April 2011 12:34 pm for menu permission.
	include"../../session.php";
	include"../../functions/fn.php";
	include"../../functions/fnmenupermission.php";
	
	$pagename = "frmmenuview";
?>
<html>
<head>
<title>View Menu</title>
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
</head>
<body>
<?php
	$collegecode = $_SESSION["empcenterid"];
	$userid = $_SESSION["empusername"];
	$UserGroup = $_SESSION["empgroup"];
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="33" rowspan="2"><img src="../../images/search.JPG"></td>
    <td height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; Menu Permission </td>
</tr>
<tr>
	<td height="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;view menu permission </td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FF9900"></td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
</table>

<form name="form1" method="post" action="frmmenuaction.php">
<FIELDSET style="border:1px solid #cccccc; width:100%;">
<LEGEND class="page_title_small">Menu Details</LEGEND>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
<tr valign="top">
    <td>
    <table width="100%" border="1" cellpadding="0" cellspacing="1">
    <tr>
    	<td width="40%" bgcolor="#FF9900" class="label_text" align="center">Menu</td>
        <?php
			$Group = clsmenupermission::groupsearch(); 
			$GroupsearchStmt = $Group->searchStmt ;
			//echo $GroupsearchStmt;
			$GroupExecQuery  = ExecQuery::ExecSecondQuery($GroupsearchStmt); 
			$GroupResult = $GroupExecQuery->result ;
			$num_rows = mysql_num_rows($GroupResult);
			$totalwidth = 60/$num_rows."%";
			//$total = $GroupExecQuery->total ;
			while($GroupRow = $fetcharray($GroupResult)) {
		?>
        <td width="<?php echo $totalwidth; ?>" bgcolor="#FF9900" class="label_text" align="center"><?php echo $GroupRow['groupname']; ?></td>
        <?php
			}
		?>
    </tr>
    <?php
		$firstparentid = 0;
		$FirstMenu = clsmenupermission::menusearch($firstparentid); 
		$FirstMenusearchStmt = $FirstMenu->searchStmt ;
		//echo $FirstMenusearchStmt;
		$FirstMenuExecQuery  = ExecQuery::ExecSecondQuery($FirstMenusearchStmt); 
		$FirstMenuResult = $FirstMenuExecQuery->result ;
		$FirstMenuRow_Count = 0;
		$SecondMenuRow_Count = 0;
		$ThirdMenuRow_Count = 0;
		while($FirstMenuRow = $fetcharray($FirstMenuResult)) {
	?>
    <tr>
    	<td><span class="label_text">&nbsp;[P]&nbsp;&nbsp;&nbsp;<?php echo $FirstMenuRow['description']; ?></span></td>
        <?php
			$firstid = $FirstMenuRow['id'];;
			$FirstMenuPermission = clsmenupermission::menupermissionsearch($firstid); 
			$FirstMenuPermissionsearchStmt = $FirstMenuPermission->searchStmt ;
			//echo $FirstMenuPermissionsearchStmt;
			$FirstMenuPermissionExecQuery  = ExecQuery::ExecSecondQuery($FirstMenuPermissionsearchStmt); 
			$FirstMenuPermissionResult = $FirstMenuPermissionExecQuery->result ;
			$FirstMenuPermissionRow_Count = 0;
			while($FirstMenuPermissionRow = $fetcharray($FirstMenuPermissionResult)) {
		?>
        <td align="center">
            <input type="hidden" name="first<? print $FirstMenuRow_Count ?><? print $FirstMenuPermissionRow_Count ?>" value="<?php echo $FirstMenuPermissionRow['enabled']."^". $FirstMenuPermissionRow["groupid"]."^". $FirstMenuPermissionRow["menuid"]; ?>">
        	<input name="checkbox<? print $FirstMenuRow_Count ?><? print $FirstMenuPermissionRow_Count ?>" type="checkbox" value="<?php echo $FirstMenuPermissionRow['enabled']."^". $FirstMenuPermissionRow["groupid"]."^". $FirstMenuPermissionRow["menuid"]; ?>" <?php if($FirstMenuPermissionRow['enabled'] == 1){ echo "checked"; }?>>
        </td>
        <?php
				$FirstMenuPermissionRow_Count++;
			}//End FirstMenuPermission While
		?>
    </tr>
    <?php
		$secondparentid = $FirstMenuRow['id'];
		$SecondMenu = clsmenupermission::menusearch($secondparentid); 
		$SecondMenusearchStmt = $SecondMenu->searchStmt ;
		//echo $SecondMenusearchStmt;
		$SecondMenuExecQuery  = ExecQuery::ExecSecondQuery($SecondMenusearchStmt); 
		$SecondMenuResult = $SecondMenuExecQuery->result ;
		while($SecondMenuRow = $fetcharray($SecondMenuResult)) {
	?>
    <tr>
    	<td><span class="label_text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[S1]&nbsp;&nbsp;&nbsp;<?php echo $SecondMenuRow['description']; ?></span></td>
        <?php
			$secondid = $SecondMenuRow['id'];;
			$SecondMenuPermission = clsmenupermission::menupermissionsearch($secondid); 
			$SecondMenuPermissionsearchStmt = $SecondMenuPermission->searchStmt ;
			//echo $SecondMenuPermissionsearchStmt;
			$SecondMenuPermissionExecQuery  = ExecQuery::ExecSecondQuery($SecondMenuPermissionsearchStmt); 
			$SecondMenuPermissionResult = $SecondMenuPermissionExecQuery->result ;
			$SecondMenuPermissionRow_Count = 0;
			while($SecondMenuPermissionRow = $fetcharray($SecondMenuPermissionResult)) {
		?>
        <td align="center">
        	<input type="hidden" name="second<? print $SecondMenuRow_Count ?><? print $SecondMenuPermissionRow_Count ?>" value="<?php echo $SecondMenuPermissionRow['enabled']."^". $SecondMenuPermissionRow["groupid"]."^". $SecondMenuPermissionRow["menuid"]; ?>">
        	<input name="secondcheckbox<? print $SecondMenuRow_Count ?><? print $SecondMenuPermissionRow_Count ?>" type="checkbox"  value="<?php echo $SecondMenuPermissionRow['enabled']."^". $SecondMenuPermissionRow["groupid"]."^". $SecondMenuPermissionRow["menuid"]; ?>" <?php if($SecondMenuPermissionRow['enabled'] == 1){ echo "checked"; }?>>
        </td>
        <?php
				$SecondMenuPermissionRow_Count++;
			}//End SecondMenuPermission While
		?>
    </tr>
    <?php
		$thirdparentid = $SecondMenuRow['id'];
		$ThirdMenu = clsmenupermission::menusearch($thirdparentid); 
		$ThirdMenusearchStmt = $ThirdMenu->searchStmt ;
		//echo $ThirdMenusearchStmt;
		$ThirdMenuExecQuery  = ExecQuery::ExecSecondQuery($ThirdMenusearchStmt); 
		$ThirdMenuResult = $ThirdMenuExecQuery->result ;
		while($ThirdMenuRow = $fetcharray($ThirdMenuResult)) {
	?>
    <tr>
    	<td>
        	<span class="label_text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[S2]&nbsp;&nbsp;&nbsp;
			<?php echo $ThirdMenuRow['description']; ?></span>
        </td>
        <?php
			$thirdid = $SecondMenuRow['id'];;
			$ThirdMenuPermission = clsmenupermission::menupermissionsearch($thirdid); 
			$ThirdMenuPermissionsearchStmt = $ThirdMenuPermission->searchStmt ;
			//echo $ThirdMenuPermissionsearchStmt;
			$ThirdMenuPermissionExecQuery  = ExecQuery::ExecSecondQuery($ThirdMenuPermissionsearchStmt); 
			$ThirdMenuPermissionResult = $ThirdMenuPermissionExecQuery->result ;
			$ThirdMenuPermissionRow_Count = 0;
			while($ThirdMenuPermissionRow = $fetcharray($ThirdMenuPermissionResult)) {
		?>
        <td align="center">
        	<input type="hidden" name="third<? print $ThirdMenuRow_Count ?><? print $ThirdMenuPermissionRow_Count ?>" value="<?php echo $ThirdMenuPermissionRow['enabled']."^". $ThirdMenuPermissionRow["groupid"]."^". $ThirdMenuPermissionRow["menuid"]; ?>">
        	<input name="thirdcheckbox<? print $ThirdMenuRow_Count ?><? print $ThirdMenuPermissionRow_Count ?>" type="checkbox" value="<?php echo $ThirdMenuPermissionRow['enabled']."^". $ThirdMenuPermissionRow["groupid"]."^". $ThirdMenuPermissionRow["menuid"]; ?>" <?php if($ThirdMenuPermissionRow['enabled'] == 1){ echo "checked"; }?>>
        </td>
        <?php
				$ThirdMenuPermissionRow_Count++;
			}//End ThirdMenuPermission While
		?>
    </tr>
    <?php
    		$ThirdMenuRow_Count++;
		}//End ThirdMenu While
			$SecondMenuRow_Count++;
		}//End SecondMenu While
			$FirstMenuRow_Count++;
		}//End FirstMenu While
	?>
    </table>
    </td>
</tr>
<tr>
	<td align="right">
        <input type="hidden" name="FirstMenu_Row" value="<?php print  $FirstMenuRow_Count;?>">
        <input type="hidden" name="FirstMenuPermission_Row" value="<?php print  $FirstMenuPermissionRow_Count;?>">
        <input type="hidden" name="SecondMenu_Row" value="<?php print  $SecondMenuRow_Count;?>">
        <input type="hidden" name="SecondMenuPermission_Row" value="<?php print  $SecondMenuPermissionRow_Count;?>">
        <input type="hidden" name="ThirdMenu_Row" value="<?php print  $ThirdMenuRow_Count;?>">
        <input type="hidden" name="ThirdMenuPermission_Row" value="<?php print  $ThirdMenuPermissionRow_Count;?>">
        <input type="Submit" name="Submit" value="Save" class="text_button">&nbsp;
    </td>
</tr>
</table>
</FIELDSET>
</form>
</body>
</html>
