<?php
	session_start();
	header("Cache-control: private");
	if ($_SESSION['empusername'] == "" || $_SESSION['emppassword'] == "" || $_SESSION['empname'] == "" || $_SESSION['empbranchid'] == "" || $_SESSION['empgroup'] == ""|| $_SESSION['employeeid'] == "") {
?>
	<script>
    	document.location='index.php'
    </script> 
<?php
	}
?>
