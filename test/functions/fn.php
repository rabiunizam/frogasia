<?php
	include"connection.php";
	include"dbconnection.php";
	include"colorscheme.php";
	include"dbproperties.php";
	include"combolist.php";
	include"crypt.php";
	include"decrypt.php";

	class ExecQuery { 


   	function ExecFirstQuery($Statement1) { 
       
			$rs = new stdClass;
			$result1 = mysqli_query($GLOBALS['conn'],$Statement1);
			$rs->result1 = $result1;
			$total = mysqli_num_rows($result1);
			$rs->total = $total;
			return $rs; 
			
			$GLOBALS['conn']->close();
		}
        
		function ExecSecondQuery($Statement2) { 
		
			$rs2 = new stdClass;
			$result = mysqli_query($GLOBALS['conn'],$Statement2);
			
			$rs2->result = $result;
			return $rs2; 
			
			$GLOBALS['conn']->close();
			}
	} 
?>
