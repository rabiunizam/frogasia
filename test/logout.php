<?php
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>LogOut Page</title>
<meta http-equiv="refresh" content="1;URL=index.php">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
	<!--
	.style1 {font-size: 16px}
	-->
</style>
</head>
<body>
<div align="center">
<p>&nbsp;</p>
<table width="615" height="21" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td> 
		<span class="style1"><strong>
		<?php 
			echo "Your Logout Complete...";
			session_unset();
			session_destroy();
        ?>
		</strong></span>
		<div align="center" class="style1"></div>
		<div align="center" class="style1"></div>
	</td>
</tr>
</table>
</div>
<div align="center"></div>
</body>
</html>