<?php
	include"../../session.php";
	include"../../functions/fn.php";
    include"../../functions/fnrace.php";
	include"../../functions/fngroup.php";
	include"../../functions/fnclass.php";
	include"../../functions/fncourse.php";
	include"../../functions/fnstudent.php";
	include"../../functions/fncollege.php";
	include"../../functions/fnfaculty.php";
	include"../../functions/fnattitude.php";
	include"../../functions/fnreligion.php";
	include"../../functions/fnsemester.php";
	include"../../functions/fngradepoint.php";
	include"../../functions/fndistrict.php";
	

 	$Submit = trim($_POST["Submit"]); 
	
	$collegecode = $_SESSION["empcenterid"];
	$userid = $_SESSION["employeeid"];
	
	/* School Insert and Update Details updated by Mr. Maslani on 10 November 2011 3:09 pm */
 	if ($Submit == "Create School") {
	 
		/* school details */
		$collegegroupid = $_POST["collegegroupid"];
		$collegename = $_POST["collegename"];
		$collegecode = $_POST["collegecode"];
		$address1 = $_POST["address1"];
		$address2 = $_POST["address2"];
		$postcode = $_POST["postcode"];
		$stateid = $_POST["stateid"];
		$districtid = $_POST['districtid'];
		$tel = $_POST["tel"];
		$fax = $_POST["fax"];
	
		/* school insert statement */
		$collegeinsert = clscollege::collegeinsert($collegegroupid,$collegename,$collegecode,$address1,$address2,$postcode,$districtid,$stateid,$tel,$fax,$userid);
		
		$collegeinsert2 = $collegeinsert->InsertStmt ;
		//echo $collegeinsert2;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($collegeinsert2); 	
	 
		if($ExecQuery2) {
			print"<script>";
			print "alert('School Created Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('School Creation Failed. ');";
			print "window.location='frmcollegenew.php'";
			print "</script>";
		}	
	}
 
	if ($Submit == "Update School") {
		
		/* school details */
		$collegeid = $_POST['collegeid'];
		$collegegroupid = $_POST['collegegroupid'];
		$collegecode = $_POST["collegecode"];
		$collegename = $_POST["collegename"];
		$address1 = $_POST["address1"];
		$address2 = $_POST["address2"];
		$postcode = $_POST["postcode"];
		$stateid = $_POST["stateid"];
		$districtid = $_POST['districtid'];
		$tel = $_POST["tel"];
		$fax = $_POST["fax"];
		$status = $_POST['status'];
		
		/* school update statement */
		$collegeupdate1 = clscollege::collegeupdate($collegeid,$collegegroupid,$collegecode,$collegename,$address1,$address2,$postcode,$stateid,$districtid,$tel,$fax,$status,$userid);
		$collegeupdate2 = $collegeupdate1->UpdateStmt ;
		//echo $collegeupdate2;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($collegeupdate2); 	
	
		if($ExecQuery2) {
			print"<script>";
			print "alert('School Updated Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('School Update Failed. ');";
			print "window.location='frmcollegeupdate.php'";
			print "</script>";
		}
	}
	
	/* Level Insert and Update Details updated by Mr. Maslani on 10 November 2011 1:38 pm */
	if ($Submit == "Create Level") {
		
		/* level details */
		$facultyname = $_POST["disciplinename"];
		$facultycode = $_POST["disciplinecode"];
		
		/* level insert statement */
		$facultyinsert = clsfaculty::facultyinsert($facultyname,$facultycode,$userid);
		$facultyinsert2 = $facultyinsert->InsertStmt ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($facultyinsert2); 	
		
		if($ExecQuery2) {
			print"<script>";
			print "alert('Level Created Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('Level Creation Failed. ');";
			print "window.location='frmfacultynew.php'";
			print "</script>";
		}	
	}
	
	if ($Submit == "Update Level") {
		
		/* level details */
		$facultyid = $_POST['disciplineid'];
		$facultyname = $_POST["disciplinename"];
		$facultycode = $_POST["disciplinecode"];
		$status = $_POST['disciplinestatus'];
		
		/* level update statement */
		$facultyupdate1 = clsfaculty::facultyupdate($facultyid,$facultyname,$facultycode,$status,$userid);
		$facultyupdate2 = $facultyupdate1->UpdateStmt ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($facultyupdate2); 	
		
		if($ExecQuery2) {
			print"<script>";
			print "alert('Level Updated Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('Level Update Failed. ');";
			print "window.location='frmfacultyeupdate.php'";
			print "</script>";
		}
	}
	
	/* Class Insert and Update Details updated by Mr. Maslani on 10 November 2011 4:17 pm */
	if ($Submit == "Create Class") {
		
		/* Class details */
		$coursename = $_POST["coursename"];
		$coursecode = $_POST["coursecode"];
		$coursetype2 = $_POST["coursetype2"];
		$facultyid = $_POST['disciplineid'];
		
		/* Class insert statement */
		$CourseInsert = clscourse::courseinsertupdate(1,$coursename,$coursecode,$numsem,$longsem,$shortsem,1,$userid,'',$facultyid,$coursetype2);
		$CourseInsert = $CourseInsert->sql ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($CourseInsert); 	
	
		if($ExecQuery2) {
			print"<script>";
			print "alert('Class Created Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print "<script>";
			print "alert('Class Creation Failed. ');";
			print "window.location='frmcoursenew.php'";
			print "</script>";
		}
	}
	
	if ($Submit == "Update Class") {
		
		/* Class details */
		$coursename = $_POST["coursename"];
		$coursecode = $_POST["coursecode"];
		$coursestatus = $_POST["coursestatus"];
		$courseid = $_POST["courseid"];
		$facultyid = $_POST['disciplineid'];
		$coursetype2 = $_POST['coursetype2'];
	
		/* Class update statement */
		$CourseUpdate = clscourse::courseinsertupdate(2,$coursename,$coursecode,'','','',$coursestatus,$userid,$courseid,$facultyid,$coursetype2);
		$CourseUpdate = $CourseUpdate->sql ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($CourseUpdate); 	
	
		if($ExecQuery2) {
			print"<script>";
			print "alert('Class Updated Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('Class Update Failed. ');";
			print "window.location='frmcourseupdate.php'";
			print "</script>";
		}
	}

	/* Intake Insert and Update Details Updated by Mr. Maslani on 10 November 2011 5:52 pm */
	if ($Submit == "Create Intake") {
	
		/* intake details */
		$intakemonth = $_POST["intakemonth"];
		$intakeyear = $_POST["intakeyear"];
		
		/* Intake search statement */
		$intakemonthName = SearchName("tblmonth","monthid",$intakemonth,"month");
		$intakecode = $intakeyear.$intakemonthName; 	
		$intakesearch = clscourse::intakesearch($intakemonth,$intakeyear,'','');
		$sqlintake = $intakesearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlintake); 
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);
		
		if ($row == 0) {
			
			/* Intake insert statement */
			$intakestatus = 1;
			$intakeInsert = clscourse::intakeinsertupdate(1,$intakemonth,$intakeyear,$intakecode,$intakestatus,$userid);
			$intakeInsert = $intakeInsert->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($intakeInsert); 	
		
			if($ExecQuery2) {
				print"<script>";
				print "alert('Intake Created Successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('Intake Creation Failed. ');";
				print "window.location='frmintakenew.php'";
				print "</script>";
			}
		} else {
			print"<script>";
			print "alert('Intake Already Exist. ');";
			print "window.location='frmintakenew.php'";
			print "</script>";
		}
	}
	
	if ($Submit == "Update Intake") {
		
		/* intake details*/
		$intakecode = $_POST["intakecode"];
		$intakestatus = $_POST["intakestatus"];
	
		/* Intake update statement */
		$intakeUpdate = clscourse::intakeinsertupdate(2,'','',$intakecode,$intakestatus,$userid);
		$intakeUpdate = $intakeUpdate->sql ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($intakeUpdate); 	
	
		if($ExecQuery2) {
			
			/* Course search statement */
			$courseSearch = clscourse::courseintakesearch('',$intakecode,'');
			$courseSearch = $courseSearch->sql ;
			$ExecQuery  = ExecQuery::ExecFirstQuery($courseSearch); 
			$result1 = $ExecQuery->result1 ;
			while($row = $fetcharray($result1)) {
				
				/* course update statement */
				$courseintakeid = $row['id'];
				$courseUpdate = clscourse::courseintakeinsert(2,'','','','','',$courseintakeid,$intakestatus);
				$courseUpdate = $courseUpdate->sql ;
				$ExecQuery3  = ExecQuery::ExecSecondQuery($courseUpdate); 
			}
	
			print"<script>";
			print "alert('Intake Updated Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('Intake Update Failed. ');";
			print "window.location='frmintakeupdate.php'";
			print "</script>";
		}
	}

	/* Term Insert and Update Details created by Mr. Azlan on 25 July 2011 10:20 am */
	if ($Submit == "Create term") {
		
		/* term details */
		$termmonth = $_POST["termmonth"];
		$termyear = $_POST["termyear"];
		$Month = SearchName("tblmonth","monthid",$termmonth,"monthname");
		$Month = strtoupper(substr($Month,0,3));
		$term = $Month.$termyear;
		
		/* Term search statement */
		$termSearch = clscourse::termSearch($termmonth,$termyear,'','');
		$sqlterm = $termSearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlterm); 
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);
		
		if ($row == 0) {
			
			/* Term insert statement */
			$termstatus = 1;
			$termInsert = clscourse::termInsertupdate(1,"",$termmonth,$termyear,$term,$termstatus,$userid);
			$termInsert = $termInsert->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($termInsert); 	
			
			$Searchyear = searchfieldname("tblyear","year"," year = '$termyear'");
			$rowyear = $noofrows($Searchyear);
			if ($rowyear == 0) {
				$yearinsert = clscourse::yearinsert($termyear);
				$yearinsert = $yearinsert->sql ;
				$ExecQuery2  = ExecQuery::ExecSecondQuery($yearinsert); 	
			}
		 
			if($ExecQuery2) {
				print"<script>";
				print "alert('term created successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('term creation failed. ');";
				print "window.location='frmtermnew.php'";
				print "</script>";
			}
		} else {
			print"<script>";
			print "alert('term already exist. ');";
			print "window.location='frmtermnew.php'";
			print "</script>";
		}
	}
 
	if ($Submit == "Update term") {
		
		/* term details */
		$termid = $_POST["termid"];
		$termmonth = $_POST["termmonth"];
		$termyear = $_POST["termyear"];
		$Month = SearchName("tblmonth","monthid",$termmonth,"monthname");
		$Month = strtoupper(substr($Month,0,3));
		$term = $Month.$termyear;
		$termstatus = $_POST["termstatus"];
		
		/* Term search statement */
		$termSearch = clscourse::termSearch($termmonth,$termyear,'','');
		$sqlterm = $termSearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlterm); 
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);
		
		if ($row == 0) {
		 
			/* Term update statement */
			$termUpdate = clscourse::termInsertupdate(2,$termid,$termmonth,$termyear,$term,$termstatus,$userid);
			$termUpdate = $termUpdate->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($termUpdate); 	
		 
			if($ExecQuery2) {
				print"<script>";
				print "alert('term updated successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('term update failed. ');";
				print "window.history.go(-1)";
				print "</script>";
			}
		} else {
			print"<script>";
			print "alert('Term already used cannot modify. ');";
			print "window.location='frmtermnew.php'";
			print "</script>";
		}
	}
	
	/* Subject Insert and Update Details Updated by Mr. Maslani on 11 November 2011 10:58 am */
	if ($Submit == "Create Subject") {
		
		/* subject details */
		$subjectname = $_POST["subjectname"];
		$subjectcode = $_POST["subjectcode"];
		//$credithour = $_POST["credithour"];
		$subjectresulttype = $_POST["result_type"];
		
		// added function by Fazz on July 6th, 2010 :: 
		//str_replace for removing whitespace in subject code :: 
		//strtoupper to change subject code to capital letter
		$subjectcode = str_replace(" ","",strtoupper($subjectcode));
		// end added function by Fazz
		
		$CheckSub = SearchName("tblsubject","subjectcode","$subjectcode","subjectcode");
		if ($CheckSub == "") {
			
			/* Subject insert statement */
			$SubjectInsert = clscourse::subjectinsertupdate(1,$subjectname,$subjectcode,$credithour,1,$userid,$subjectresulttype);
			$SubjectInsert = $SubjectInsert->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($SubjectInsert); 			 
		}
		
		if($ExecQuery2) {
			print"<script>";
			print "alert('Subject Created Successfully. ');";
			print "window.opener.location.href='frmsubjectmanage.php?Submit=Search';";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('Subject Creation Failed. ');";
			print "window.history.go(-1)";
			print "</script>";
		}
	}
		
	if ($Submit == "Update Subject") {
		
		/* subject details */
		$subjectid = $_POST["subjectid"];
		$subjectname = $_POST["subjectname"];
		$subjectcode = $_POST["subjectcode"];
		$subjectstatus = $_POST["subjectstatus"];
		$credithour = $_POST["credithour"];
		$subjectresulttype = $_POST["result_type"];
	
		/* Subject update statement */
		$SubjectUpdate = clscourse::subjectinsertupdate(2,$subjectname,$subjectcode,$credithour,$subjectstatus,$userid,$subjectresulttype,$subjectid);
		$SubjectUpdate = $SubjectUpdate->sql ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($SubjectUpdate); 	
		
		if($ExecQuery2) {
			print"<script>";
			print "alert('Subject Updated Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('Subject Update Failed. ');";
			print "window.history.go(-1)";
			print "</script>";
		}
	}
	
 if ($Submit == "Update credit level")
 {
	 $newlevel = $_POST["newlevel"];
	 
	 $Updatelevel0 = clscourse::creditlevelupdate(0,'');
	 $level0 = $Updatelevel0->sql ;
	 $ExecQuery1  = ExecQuery::ExecSecondQuery($level0); 	
	 
	 $Updatelevel1 = clscourse::creditlevelupdate(1," where credit = '$newlevel'");
	 $level1 = $Updatelevel1->sql ;
	 $ExecQuery2  = ExecQuery::ExecSecondQuery($level1); 
	 
	 if($ExecQuery2)
	{
		$_SESSION["creditlevel"] = $newlevel;
		print"<script>";
		print "alert('credit level updated successfully. ');";
		print "window.location='frmcreditlevel.php'";
		print "</script>";
	}
	else
	{
		print"<script>";
		print "alert('credit level update failed. ');";
		print "window.history.go(-1)";
		print "</script>";
	}
 }
 
 
 
// aime added create/update class, 24/10/07
 if ($Submit == "Create Class")
 {
 	$classcode = $_POST["classcode"];
 	$classintake = $_POST["intakecode"];
 	$courseid = $_POST["courseid"];

 	$ClassSearch = clsclass::classsearch1(1,$classcode,$collegecode,'','','',$empcenterid);
	$sqlClass = $ClassSearch->searchStmt ;
	$ExecQuery  = ExecQuery::ExecFirstQuery($sqlClass); 
    $result1 = $ExecQuery->result1 ;
	$row = $noofrows($result1);
	
	if ($row == 0)
	{
		$classstatus = 1;
		$classinsert = clsclass::classinsert($classcode,$collegecode,$courseid,$classintake,'','','','',$classstatus,$userid);
		$classinsert2 = $classinsert->InsertStmt ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($classinsert2); 	
	 
		if($ExecQuery2)
		{
			print"<script>";
			print "alert('Class created successfully. ');";
			print "window.close()";
			print "</script>";
		}
		else
		{
			print"<script>";
			print "alert('Class creation failed. ');";
			print "window.location='frmclassnew.php'";
			print "</script>";
		}
	}
	else
	{
		print"<script>";
		print "alert('Class already exist. ');";
		print "window.location='frmclassnew.php'";
		print "</script>";
		
	}
	
 }
 
 if ($Submit == "Update Class")
 {
	 /* class details*/
 	$classcode = $_POST["classcode"];
 	$classstatus = $_POST["classstatus"];

	$classupdate = clsclass::classupdate($classcode,'','','','',2,$userid) ;
	$classupdate2 = $classupdate->UpdateStmt ;
	$ExecQuery2  = ExecQuery::ExecSecondQuery($classupdate2); 	
 
	if($ExecQuery2)

	{
		print"<script>";
		print "alert('Class updated successfully. ');";
		print "window.close()";
		print "</script>";
	}
	else
	{
		print"<script>";
		print "alert('Class update failed. ');";
		print "window.location='frmclassupdate.php'";
		print "</script>";
	}
}

/* Race Insert and Update Details created by Mr. Maslani on 04 August 2011 5:22 pm */

 	if ($Submit == "Create Race") {

		/* Race details */
		$racename = $_POST["racename"];

		/* Race search statement */
		$racesearch = clsrace::racesearch($racename,'');
		$sqlrace = $racesearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlrace);
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);

		if ($row == 0) {

			/* Race insert statement */
			$racestatus = 1;
			$raceInsert = clsrace::raceinsertupdate(1,'',$racename,$racestatus,$userid);
			$raceInsert = $raceInsert->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($raceInsert);

			if($ExecQuery2) {
				print"<script>";
				print "alert('Race created successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('Race creation failed. ');";
				print "window.location='frmracenew.php'";
				print "</script>";
			}
		} else {
			print"<script>";
			print "alert('Race already exist. ');";
			print "window.location='frmracenew.php'";
			print "</script>";
		}
	}

	if ($Submit == "Update Race") {

		/* Race details */
		$raceid = $_POST["raceid"];
		$racename = $_POST["racename"];
		$racestatus = $_POST["racestatus"];

		/* Race search statement */
		$raceSearch = clsrace::raceSearch($racename,$racestatus,'');
		$sqlrace = $raceSearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlrace);
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);

		if ($row == 0) {

			/* Race update statement */
			$raceUpdate = clsrace::raceInsertupdate(2,$raceid,$racename,$racestatus,$userid);
			$raceUpdate = $raceUpdate->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($raceUpdate);

			if($ExecQuery2) {
				print"<script>";
				print "alert('Race updated successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('Race update failed. ');";
				print "window.history.go(-1)";
				print "</script>";
			}
		} else {
			print"<script>";
			print "alert('Race already used cannot modify. ');";
			print "window.location='frmracenew.php'";
			print "</script>";
		}
	}

	/* Religion Insert and Update Details created by Mr. Maslani on 05 August 2011 11:07 am */

 	if ($Submit == "Create Religion") {

		/* Religion details */
		$religionname = $_POST["religionname"];

		/* Religion search statement */
		$religionsearch = clsreligion::religionsearch($religionname,'');
		$sqlreligion = $religionsearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlreligion);
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);

		if ($row == 0) {

			/* Religion insert statement */
			$religionstatus = 1;
			$religionInsert = clsreligion::religioninsertupdate(1,'',$religionname,$religionstatus,$userid);
			$religionInsert = $religionInsert->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($religionInsert);

			if($ExecQuery2) {
				print"<script>";
				print "alert('Religion created successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('Religion creation failed. ');";
				print "window.location='frmreligionnew.php'";
				print "</script>";
			}
		} else {
			print"<script>";
			print "alert('Religion already exist. ');";
			print "window.location='frmreligionnew.php'";
			print "</script>";
		}
	}
	if ($Submit == "Update Religion") {

		/* Religion details */
		$religionid = $_POST["religionid"];
		$religionname = $_POST["religionname"];
		$religionstatus = $_POST["religionstatus"];

		/* Religion search statement */
		$religionSearch = clsreligion::religionSearch($religionname,$religionstatus,'');
		$sqlreligion = $religionSearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlreligion);
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);

		if ($row == 0) {

			/* Religion update statement */
			$religionUpdate = clsreligion::religionInsertupdate(2,$religionid,$religionname,$religionstatus,$userid);
			$religionUpdate = $religionUpdate->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($religionUpdate);

			if($ExecQuery2) {
				print"<script>";
				print "alert('Religion updated successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('Religion update failed. ');";
				print "window.history.go(-1)";
				print "</script>";
			}
		} else {
			print"<script>";
			print "alert('Religion already used cannot modify. ');";
			print "window.location='frmreligionupdate.php'";
			print "</script>";
		}
	}

	/* Group Insert and Update Details created by Mr. Maslani on 05 August 2011 11:33 am */

 	if ($Submit == "Create Group") {

		/* Group details */
		$groupname = $_POST["groupname"];

		/* Group search statement */
		$groupsearch = clsgroup::groupsearch($groupname,'');
		$sqlgroup = $groupsearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlgroup);
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);

		if ($row == 0) {

			/* Group insert statement */
			$empstatusid = 1;
			$groupInsert = clsgroup::groupinsertupdate(1,'',$groupname,$empstatusid,$userid);
			$groupInsert = $groupInsert->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($groupInsert);

			if($ExecQuery2) {
				print"<script>";
				print "alert('Group created successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('Group creation failed. ');";
				print "window.location='frmgroupnew.php'";
				print "</script>";
			}
		} else {
			print"<script>";
			print "alert('Group already exist. ');";
			print "window.location='frmgroupnew.php'";
			print "</script>";
		}
	}

	if ($Submit == "Update Group") {

		/* Group details */
		$groupid = $_POST["groupid"];
		$groupname = $_POST["groupname"];
		$empstatusid = $_POST["empstatusid"];

		/* Group search statement */
		$groupSearch = clsgroup::groupSearch($groupname,$empstatusid,'');
		$sqlgroup = $groupSearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlgroup);
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);

		if ($row == 0) {

			/* Group update statement */
			$groupUpdate = clsgroup::groupInsertupdate(2,$groupid,$groupname,$empstatusid,$userid);
			$groupUpdate = $groupUpdate->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($groupUpdate);

			if($ExecQuery2) {
				print"<script>";
				print "alert('Group updated successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('Group update failed. ');";
				print "window.history.go(-1)";
				print "</script>";
			}
		} else {
			print"<script>";
			print "alert('Group already used cannot modify. ');";
			print "window.location='frmgroupupdate.php'";
			print "</script>";
		}
	}

/* Gradepoint Insert and Update Details created by Mr. Maslani on 09 August 2011 10:10 am */

 	if ($Submit == "Create Grade") {

		/* Grade details */
		$minmark = $_POST["minmark"];
		$maxmark = $_POST["maxmark"];
		$gdid = $_POST["gdid"];
		$pointid = $_POST["pointid"];
		$achievementid = $_POST["achievementid"];

			/* Grade insert statement */
			$gradepointstatus = 1;
			$gradeInsert = clsgradepoint::gradepointinsertupdate(1,'',$minmark,$maxmark,$gdid,$pointid,$achievementid,$gradepointstatus,$userid);
			$gradeInsert = $gradeInsert->sql ;
			//echo $gradeInsert;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($gradeInsert);

			if($ExecQuery2) {
				print"<script>";
				print "alert('Grade created successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('Grade creation failed. ');";
				print "window.location='frmgradepointnew.php'";
				print "</script>";
			}
	}

	if ($Submit == "Update Grade") {

		/* Grade details */
		$gradeid = $_POST["gradeid"];
		$minmark = $_POST["minmark"];
		$maxmark = $_POST["maxmark"];
		$grade = $_POST["grade"];
		$gradepoint = $_POST["gradepoint"];
		$achievement = $_POST["achievement"];
		$gradepointstatus = $_POST["gradepointstatus"];


			/* Grade update statement */
			$gradepointUpdate = clsgradepoint::gradepointInsertupdate(2,$gradeid,$minmark,$maxmark,$grade,$gradepoint,$achievement,$gradepointstatus,$userid);
			$gradepointUpdate = $gradepointUpdate->sql ;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($gradepointUpdate);

			if($ExecQuery2) {
				print"<script>";
				print "alert('Grade updated successfully. ');";
				print "window.close()";
				print "</script>";
			} else {
				print"<script>";
				print "alert('Grade update failed. ');";
				print "window.history.go(-1)";
				print "</script>";
			}
	}

	if ($Submit == "Create Semester") {

		/* Semester details */
		$semname = $_POST["semname"];

		/*Semester Search Statement*/
		$semesterdetailsearch = clssemester::semesterdetailssearch($semname,'');
		$sqlsemester = $semesterdetailsearch->searchStmt;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqlsemester);
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);
		
		if ($row == 0) {
			/* Semester insert statement */
			$semstatus = 1;
			$semesterInsert = clssemester::semesterInsertupdate(1,'',$semname,$semstatus,$userid);
			$sqlsemesterInsert = $semesterInsert->sql ;
			$ExecQuery2 = ExecQuery::ExecSecondQuery($sqlsemesterInsert);
		}

		if($ExecQuery2) {
			print"<script>";
			print "alert('Semester created successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print "<script>";
			print "alert('Semester creation failed. ');";
			print "window.location='frmsemnew.php'";
			print "</script>";
		}
	}
	
	if ($Submit == "Update Semester") {

		/* Semester details */
		$semname = $_POST["semname"];
		$semstatus = $_POST["semstatus"];
		$id = $_POST["id"];

		/* Semester update statement */
		$semesterUpdate = clssemester::semesterInsertupdate(2,$id,$semname,$semstatus,$userid);
		$sqlsemesterUpdate = $semesterUpdate->sql ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($sqlsemesterUpdate);

		if($ExecQuery2) {
			print"<script>";
			print "alert('Semester updated successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('Semester update failed. ');";
			print "window.location='frmsemupdate.php'";
			print "</script>";
		}
	}
	
	/* Attitude Insert and Update Details created by Mr. Azlan on 18 October 2011 1:55 pm */
	if ($Submit == "Create Attitude") {
		
		/* attitude details */
		$attitudecode = $_POST["attitudecode"];
		$attitudename = $_POST["attitudename"];
		$attitudestatus = $_POST["attitudestatus"];
		
		//strtoupper to change subject code to capital letter
		$attitudecode = (strtoupper($attitudecode));
		
		$CheckAtt = SearchName("tblattitudetype","attitudecode","$attitudecode","attitudecode");
		if ($CheckAtt == "") {
			
			/* Subject insert statement */
			$AttTypeInsert = clsaattitude::attitudetype_insert($attitudecode,$attitudename,$attitudestatus,$userid);
			$AttTypeInsert = $AttTypeInsert->sql ;
			echo $AttTypeInsert;
			$ExecQuery2  = ExecQuery::ExecSecondQuery($AttTypeInsert); 			 
		}
		
		if($ExecQuery2) {
			print"<script>";
			print "alert('Attitude created successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('Attitude creation failed. ');";
			print "window.history.go(-1)";
			print "</script>";
		}
	}

	if ($Submit == "Update Attitude") {
		
		/* Attitude details */
		$attitudeid = $_POST["attitudeid"];
		$attitudename = $_POST["attitudename"];
		$attitudecode = $_POST["attitudecode"];
		$attitudestatus = $_POST["attitudestatus"];
	
		/* Attitude update statement */
		$AttTypeUpdate = clsaattitude::attitudetype_update($attitudeid,$attitudecode,$attitudename,$attitudestatus,$editby);
		$AttTypeUpdate = $AttTypeUpdate->sql ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($AttTypeUpdate); 	
		
		if($ExecQuery2) {
			print"<script>";
			print "alert('Attitude updated successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('Attitude update failed. ');";
			print "window.history.go(-1)";
			print "</script>";
		}
	}
/* District Insert and Update Details Created by Mr. Maslani on 13 November 2011 12:23 am */
 	if ($Submit == "Create District") {
	 
		/* district details */
		$districtname = $_POST["districtname"];
		$stateid = $_POST["stateid"];
		
		/* district search statement */
		$districtsearch = clsdistrict::districtsearch($districtname,$stateid,'');
		$sqldistrict = $districtsearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqldistrict);
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);
	
		if ($row == 0) {
			
		/* district insert statement */
		$statusid = 1;
		$collegeinsert = clscollege::collegeinsertdistrict($districtname,$stateid,$userid);
		$collegeinsert2 = $collegeinsert->InsertStmt ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($collegeinsert2); 	
	 
		if($ExecQuery2) {
			print"<script>";
			print "alert('District Created Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('District Creation Failed. ');";
			print "window.location='frmcollegedistrictnew.php'";
			print "</script>";
		}	
	  }else {
			print"<script>";
			print "alert('District Already Exist. ');";
			print "window.location='frmcollegedistrictnew.php'";
			print "</script>";
		}
	}
 
	if ($Submit == "Update District") {
		
		/* district details */
		$districtid = $_POST["districtid"];
		$districtname = $_POST["districtname"];
		$stateid = $_POST["stateid"];
		$statusid = $_POST['statusid'];
		
		/* district search statement */
		$districtsearch = clsdistrict::districtsearch($districtname,$stateid,'');
		$sqldistrict = $districtsearch->sql ;
		$ExecQuery  = ExecQuery::ExecFirstQuery($sqldistrict);
		$result1 = $ExecQuery->result1 ;
		$row = $noofrows($result1);
		
		if ($row == 0) {
		
		/* district update statement */
		$districtUpdate = clsdistrict::districtInsertupdate($districtid,$districtname,$stateid,$statusid,$userid);
		$districtUpdate = $districtUpdate->sql ;
		$ExecQuery2  = ExecQuery::ExecSecondQuery($districtUpdate);	
	
		if($ExecQuery2) {
			print"<script>";
			print "alert('District Updated Successfully. ');";
			print "window.close()";
			print "</script>";
		} else {
			print"<script>";
			print "alert('District Update Failed. ');";
			print "window.location='frmcollegedistrictupdate.php'";
			print "</script>";
		} 
	}else {
			print"<script>";
			print "alert('District Already Used Cannot Modify. ');";
			print "window.location='frmcollegedistrictnew.php'";
			print "</script>";
		} 
	}
?>
