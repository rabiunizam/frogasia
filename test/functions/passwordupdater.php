<?php 
include"fnemployee.php";
include"fn.php";

	   	$db = New database();
		$db->connectdb ();

$query = "Select *
			from tblemployee
			"; 
$result = mysql_query($query);
while($rst = mysql_fetch_array($result))
{
$Name = $rst['empusername'];
 $Crypted = crypter($Name,'xs:a/55p;',1);
 $Updatequery = "update tblemployee set
       emppassword = '$Crypted' 
	   where empusername='$Name'";
 $result1 = mysql_query($Updatequery);

}



?>