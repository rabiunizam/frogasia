<?php 
	session_start();
	include"functions/fn.php";

    include"functions/dbconnection.php";

    $Uname = $_POST["UserName"];
	$Pass = $_POST["Password"];
	$encrypted_string = crypter($Pass,'xs:a/55p;',1);
	//print $encrypted_string;

	$query = "SELECT * FROM tblemployee WHERE empusername ='$Uname' AND emppassword='$encrypted_string' AND empstatus='1'";
	$result= mysqli_query($conn,$query );
	$rst = mysqli_fetch_array($result);

	if(!empty($rst)) 
	{
     		$empusername 	= $rst["empusername"];
			$emppassword 	= $rst["emppassword"];
			$empname 		= $rst["empname"];
			$empbranchid 	= $rst["empbranchid"];
			$empgroup 		= $rst["empgroup"];
			$employeeid 	= $rst["employeeid"];
				$_SESSION['empgroup']=$empgroup;
			$_SESSION['empusername']=$empusername;
			$_SESSION['emppassword']=$emppassword;
			$_SESSION['empname']=$empname;
			$_SESSION['empbranchid']=$empbranchid;
			$_SESSION['employeeid']=$employeeid;


?>
		<script>
        	document.location='index_en.php'
        </script>
<?php
	} else {
?>
		<script>
        	document.location="index.php?Error=Invalid UserName or Password (or) UserName InActive"
        </script>
<?php
	 }
?>
