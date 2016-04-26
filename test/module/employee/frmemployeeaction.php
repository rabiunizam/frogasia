<?php
include"../../session.php";
include"../../functions/fnemployee.php";
include"../../functions/fn.php";

$empbranch = $_SESSION["empbranchid"];
$userid = $_SESSION["empusername"];
$Submit = $_POST["Submit"]; 

$empname1 = $_POST["empname1"];
$empno1  = $_POST["empno1"];
$empnricpassportno1 = $_POST["empnricpassportno1"];
$empusername1 = $_POST["empusername1"];

$emppassword1 = crypter($_POST["emppassword1"],'xs:a/55p;',1);
$empbranchid1 = $_POST["empbranchid1"];
$empsex1 = $_POST["empsex1"];
$emphandphoneno1 = $_POST["emphandphoneno1"];
$empgroup1  = $_POST["empgroup1"];
$empstatus1 = $_POST["empstatus1"];

if($Submit == "Save"){

		$Employee  = clsemployee::employeeinsert($empname1,$empno1,$empnricpassportno1,$empusername1,$emppassword1,
												 $empbranchid1,$empsex1,"",$emphandphoneno1,"",
												 "",$empgroup1,$empstatus1,$userid);
		$InsertStmt = $Employee->InsertStmt ;
		//echo $InsertStmt;
		$ExecQuery  = ExecQuery::ExecSecondQuery($InsertStmt); 
		if($ExecQuery) {
			
			$Employee6  = clsemployee::employeesearch1(2,"","","",$empusername1);
			$searchStmt6 = $Employee6->searchStmt ;
			$ExecQuery6  = ExecQuery::ExecSecondQuery($searchStmt6); 
			$result6 = $ExecQuery6->result ;
			$data = $fetcharray($result6);
			$employeeid = $data["employeeid"];
			

			print"<script>";
			print "alert('Employee  : $empname1 Details saved succesfully');";
			print "window.close()";
			print "</script>";
		}
} elseif($Submit == "Update") {

	$Employee  = clsemployee::employeeupdate($empname1,$empno1,$empnricpassportno1,$empusername1,
											 $emppassword1,$empbranchid1,$empsex1,"",
											 $emphandphoneno1,"","",$empgroup1,
											 $empstatus1,$userid) ;
	$UpdateStmt = $Employee->UpdateStmt ;
	//print $UpdateStmt;
	$ExecQuery  = ExecQuery::ExecSecondQuery($UpdateStmt); 
	if($ExecQuery) {
			
		$Employee6  = clsemployee::employeesearch1(2,"","","",$empusername1);
		$searchStmt6 = $Employee6->searchStmt ;
		$ExecQuery6  = ExecQuery::ExecSecondQuery($searchStmt6); 
		$result6 = $ExecQuery6->result ;
		$data = $fetcharray($result6);
		$employeeid = $data["employeeid"];
		
 		print"<script>";
		print "alert('Employee  : $empname1 Details updated succesfully. ');";
		print "window.close()";
		print "</script>";
	}}
 elseif($Submit == "Change Password") {

	$Employee  = clsemployee::changepassword($empname1,$empusername1,$emppassword1) ; 
	$UpdateStmt = $Employee->UpdateStmt ;
	//print $UpdateStmt;
	$ExecQuery  = ExecQuery::ExecSecondQuery($UpdateStmt); 
	if($ExecQuery) {
			
		print"<script>";
		print "alert('Employee  : $empname1 Password updated succesfully. ');";
		//print "window.close()";
		print "document.location = 'frmChangePassword.php';";
		print "</script>";
	}
}else {
}
?>

