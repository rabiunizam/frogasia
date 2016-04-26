<?php
include"../../session.php";
include"../../functions/fnmenupermission.php";
include"../../functions/fn.php";
?>
<?php
  	$collegecode = $_SESSION["empcenterid"];
	$userid = $_SESSION["empusername"];
 	$Submit = $_POST["Submit"]; 

	if($Submit == "Save"){
		
		$FirstMenu_Row = $_POST["FirstMenu_Row"];
		for ($x=0; $x<$FirstMenu_Row; $x++) {// Row Menu
			
			$FirstMenuPermission_Row = $_POST["FirstMenuPermission_Row"];
			for ($i=0; $i<$FirstMenuPermission_Row; $i++) {// Row Menu Permission
			
				$a = $i;
				$responses[$a] = ereg_replace("\n", "", $_POST["checkbox$x$i"]);
				$responses[$a1] = ereg_replace("\n", "", $_POST["first$x$i"]);
				$detailDataFirst = explode("^", $responses[$a]);
				$detailDataFirst1 = explode("^", $responses[$a1]);
				$enabled = $detailDataFirst[0]; 
				$enabled1 = $detailDataFirst1[0];
				$groupid = $detailDataFirst[1];
				$groupid1 = $detailDataFirst1[1];
				$menuid = $detailDataFirst[2];
				$menuid1 = $detailDataFirst1[2];
				
				if(empty($enabled) && empty($groupid) && empty($menuid)) {
					if($enabled1 == 1) {
						$enabled1 = 0;
					} 
					$FirstMenuPermission  = clsmenupermission::menupermissionupdate($enabled1,$groupid1,$menuid1,$userid); 
					$FirstMenuPermissionUpdateStmt = $FirstMenuPermission->UpdateStmt ;
					//print $FirstMenuPermissionUpdateStmt;
					$FirstMenuPermissionExecQuery  = ExecQuery::ExecSecondQuery($FirstMenuPermissionUpdateStmt); 
				} elseif ($enabled == 0 && $enabled1 == 0) {
					if($enabled1 == 0) {
						$enabled1 = 1;
					} 
					$FirstMenuPermission  = clsmenupermission::menupermissionupdate($enabled1,$groupid1,$menuid1,$userid); 
					$FirstMenuPermissionUpdateStmt = $FirstMenuPermission->UpdateStmt ;
					//print $FirstMenuPermissionUpdateStmt;
					$FirstMenuPermissionExecQuery  = ExecQuery::ExecSecondQuery($FirstMenuPermissionUpdateStmt); 
				}
			}
			$SecondMenu_Row = $_POST["SecondMenu_Row"];
			for ($y=0; $y<$SecondMenu_Row; $y++) {// Row Menu
				
				$SecondMenuPermission_Row = $_POST["SecondMenuPermission_Row"];
				for ($j=0; $j<$SecondMenuPermission_Row; $j++) {// Row Menu Permission
					$b = $j;
					$responses[$b] = ereg_replace("\n", "", $_POST["secondcheckbox$y$j"]);
					$responses[$b1] = ereg_replace("\n", "", $_POST["second$y$j"]);
					$detailDataSecond = explode("^", $responses[$b]);
					$detailDataSecond1 = explode("^", $responses[$b1]);
					$secondenabled = $detailDataSecond[0]; 
					$secondenabled1 = $detailDataSecond1[0];
					$secondgroupid = $detailDataSecond[1];
					$secondgroupid1 = $detailDataSecond1[1];
					$secondmenuid = $detailDataSecond[2];
					$secondmenuid1 = $detailDataSecond1[2];
					
					if(empty($secondenabled) && empty($secondgroupid) && empty($secondmenuid)) {
						if($secondenabled1 == 1) {
							$secondenabled1 = 0;
						} 
						$SecondMenuPermission  = clsmenupermission::menupermissionupdate($secondenabled1,$secondgroupid1,$secondmenuid1,$userid); 
						$SecondMenuPermissionUpdateStmt = $SecondMenuPermission->UpdateStmt ;
						//print $SecondMenuPermissionUpdateStmt;
						$SecondMenuPermissionExecQuery  = ExecQuery::ExecSecondQuery($SecondMenuPermissionUpdateStmt); 
					} elseif ($secondenabled == 0 && $secondenabled1 == 0) {
						if($secondenabled1 == 0) {
							$secondenabled1 = 1;
						} 
						$SecondMenuPermission  = clsmenupermission::menupermissionupdate($secondenabled1,$secondgroupid1,$secondmenuid1,$userid); 
						$SecondMenuPermissionUpdateStmt = $SecondMenuPermission->UpdateStmt ;
						//print $SecondMenuPermissionUpdateStmt;
						$SecondMenuPermissionExecQuery  = ExecQuery::ExecSecondQuery($SecondMenuPermissionUpdateStmt); 
					}
				}
				$ThirdMenu_Row = $_POST["ThirdMenu_Row"];
				for ($z=0; $z<$ThirdMenu_Row; $z++) {// Row Menu
					
					$ThirdMenuPermission_Row = $_POST["ThirdMenuPermission_Row"];
					for ($k=0; $k<$ThirdMenuPermission_Row; $k++) {// Row Menu Permission
						$c = $k;
						$responses[$c] = ereg_replace("\n", "", $_POST["thirdcheckbox$z$k"]);
						$responses[$c1] = ereg_replace("\n", "", $_POST["third$z$k"]);
						$detailDataThird = explode("^", $responses[$c]);
						$detailDataThird1 = explode("^", $responses[$c1]);
						$thirdenabled = $detailDataThird[0]; 
						$thirdenabled1 = $detailDataThird1[0];
						$thirdgroupid = $detailDataThird[1];
						$thirdgroupid1 = $detailDataThird1[1];
						$thirdmenuid = $detailDataThird[2];
						$thirdmenuid1 = $detailDataThird1[2];
						
						if(empty($thirdenabled) && empty($thirdgroupid) && empty($thirdmenuid)) {
							if($thirdenabled1 == 1) {
								$thirdenabled1 = 0;
							} 
							$ThirdMenuPermission  = clsmenupermission::menupermissionupdate($thirdenabled1,$thirdgroupid1,$thirdmenuid1,$userid); 
							$ThirdMenuPermissionUpdateStmt = $ThirdMenuPermission->UpdateStmt ;
							//print $ThirdMenuPermissionUpdateStmt;
							$ThirdMenuPermissionExecQuery  = ExecQuery::ExecSecondQuery($ThirdMenuPermissionUpdateStmt); 
						} elseif ($thirdmenuid == 0 && $thirdenabled1 == 0) {
							if($thirdenabled1 == 0) {
								$thirdenabled1 = 1;
							} 
							$ThirdMenuPermission  = clsmenupermission::menupermissionupdate($thirdenabled1,$thirdgroupid1,$thirdmenuid1,$userid); 
							$ThirdMenuPermissionUpdateStmt = $ThirdMenuPermission->UpdateStmt ;
							//print $ThirdMenuPermissionUpdateStmt;
							$ThirdMenuPermissionExecQuery  = ExecQuery::ExecSecondQuery($ThirdMenuPermissionUpdateStmt); 
						}
					}
				}
			}
		}
	}
?>
<script>document.location='frmmenuview.php'</script>
