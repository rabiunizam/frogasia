<?php
	include"../../session.php";
	include"../../functions/fnfrog.php";
	include"../../functions/fn.php";
	
    $empbranch = $_SESSION["empbranchid"];
    $userid1 = $_SESSION["empusername"];
    $Submit = $_POST["Submit"];

	/* frog details */
 
	$frogid1 = $_POST["frogid"];
	$frogname1 = $_POST["frogname"];
	$frognamesc1 = $_POST["frognamesc"];
	$DOBday = $_POST["DOBday"];
	$DOBMonth = $_POST["DOBMonth"];
	$DOByear = $_POST["DOByear"];
	$frogdob1 = sprintf("%04d-%02d-%02d",$DOByear,$DOBMonth,$DOBday);
	$frogsexid1 = $_POST["frogsexid"];
	$frogcountryid1 = $_POST["frogcountryid"];
	$frogfamilyid1 = $_POST["frogfamilyid"];
	$frogorderid1 = $_POST["frogorderid"];
	$froggenus1 = $_POST["froggenus"];
	$frogepithet1 = $_POST["frogepithet"];
    $frogsubgenus1 = $_POST["frogsubgenus"];
	$frogsubfamily1 = $_POST["frogsubfamily"];
	$ponddetails1 = $_POST["ponddetails"];


	/* insert action */
	if($Submit == "Save")
     {

     $getfrog = SearchName("tblfrog","frogname",$frogname1,"frogname");
		
		if($getfrog == "")
                 {
                 $flogIns = clsfrog::froginsert($frogname1,$frognamesc1,$frogdob1,$frogsexid1,
                        $frogcountryid1,$frogfamilyid1,$frogorderid1,$froggenus1,$frogepithet1,
                        $frogsubgenus1,$frogsubfamily1,$ponddetails1,$userid1);
                        
			    		$InsertStmt = $flogIns->InsertStmt ;
						$ExecQuery  = ExecQuery::ExecSecondQuery($InsertStmt);

						if($ExecQuery ) {
							$message = " Saved succesfully.";

						print"<script>";
						print "alert('Frog Name: $frogname1 $message');";
						print "window.location='frmnew.php'";
						print "</script>";
					    }
                        else
                        {
	   					print"<script>";
						print "alert('Sorry the details you entered not saved. Please try again. ');";
						print "window.history.go(-1)";
						print "</script>";
                        }
				}
			    else
                {
				print"<script>";
				print "alert('Frog Details already exists! ');";
				print "window.history.go(-1)";
				print "</script>"; 
			   }
		}
   elseif($Submit == "Update") {

	$flogUpd = clsfrog::frogupdate($frogid1,$frogname1,$frognamesc1,$frogdob1,$frogsexid1,
                        $frogcountryid1,$frogfamilyid1,$frogorderid1,$froggenus1,$frogepithet1,
                        $frogsubgenus1,$frogsubfamily1,$ponddetails1,$userid1);

    $UpdateStmt = $flogUpd->UpdateStmt ;
	//print $UpdateStmt;
	$ExecQuery  = ExecQuery::ExecSecondQuery($UpdateStmt);
	if($ExecQuery) {

		$frogsearch  = clsfrog::frogsearch1('2',"","","","","","","",$frogid1);
        $searchStmt6 = $frogsearch->searchStmt ;
		$ExecQuery6  = ExecQuery::ExecSecondQuery($searchStmt6);
		$result6 = $ExecQuery6->result ;
		$data = $fetcharray($result6);
		$frogname = $data["frogname"];

 		print"<script>";
		print "alert('Frog Name  : $frogname Details updated succesfully. ');";
		print "window.close()";
		print "</script>";
	}}
 else
 {
 }


?>
