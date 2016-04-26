<?php
include "../functions/fn.php";
	
	if (trim($_GET[action])=='getDepartment')
	{
		 $collegeid = $_GET["collegeid"];
		if(!empty($collegeid))
		{
		$Query = "select tblcollegecourse.collegeid,tblcollegecourse.facultyid ,tblfaculty.facultyname
		from tblcollegecourse  inner join tblfaculty on 
		tblfaculty.facultyid = tblcollegecourse.facultyid
		where tblcollegecourse.collegeid='$collegeid' and tblfaculty.status = 1 
		group by tblfaculty.facultyname order by tblfaculty.facultyname";
		//echo $Query;
		$ExecQuery  = ExecQuery::ExecSecondQuery($Query); 
		$result = $ExecQuery->result ;
			echo "^Select|";
			while($row = $fetcharray($result))
			{
				echo trim($row["facultyid"])."^".trim($row["facultyname"])."|";
			}
		}
		exit;
		
	}
	
	if (trim($_GET[action])=='getYear')
	{
		 $studCourse = $_GET["studCourse"];
		if(!empty($studCourse))
		{
		$Query = "select tblcoursesubject.courseid,tblcoursesubject.semesterid ,tblcourse.coursename
		from tblcoursesubject  inner join tblintake on 
		tblintake.intakeid = tblcoursesubject.semesterid inner join tblcourse on 
		tblcourse.id = tblcoursesubject.courseid
		where tblcoursesubject.courseid='$studCourse' and tblintake.intakestatus = 1 
		group by tblintake.intakeyear order by tblintake.intakeyear";
		//echo $Query;
		$ExecQuery  = ExecQuery::ExecSecondQuery($Query); 
		$result = $ExecQuery->result ;
			echo "^Select|";
			while($row = $fetcharray($result))
			{
				echo trim($row["intakeid"])."^".trim($row["intakeyear"])."|";
			}
		}
		exit;
		
	}
	
	if (trim($_GET[action])=='getStudYear')
	{
		 $facultyid = $_GET["facultyid"];
		 $collegeid = $_GET["collegeid"];
		 $studCourse = $_GET["studCourse"];
		if(!empty($studCourse) && !empty($collegeid) && !empty($facultyid))
		{
		$Query = "select tblstudentsemester.*,tblstudent.collegecode,tblintake.intakeyear,tblintake.intakeid
				  from tblstudentsemester 
				  inner join tblstudent on tblstudent.studentno = tblstudentsemester.studentno
				  inner join tblintake on tblstudentsemester.year = tblintake.intakeid
				  where tblstudentsemester.class='$studCourse' and tblstudent.collegecode='$collegeid' and tblstudentsemester.level='$facultyid' tblintake.intakestatus = 1 
				  group by tblintake.intakeyear order by tblintake.intakeyear";
		//echo $Query;
		$ExecQuery  = ExecQuery::ExecSecondQuery($Query); 
		$result = $ExecQuery->result ;
			echo "^Select|";
			while($row = $fetcharray($result))
			{
				echo trim($row["intakeid"])."^".trim($row["intakeyear"])."|";
			}
		}
		exit;
		
	} 
	
	if (trim($_GET[action])=='getCourse')
	{
		$facultyid = $_GET["facultyid"];
		$collegeid = $_GET["collegeid"];
		if(!empty($facultyid) && !empty($collegeid))
		{
		$Query = "select tblcourse.id,tblcourse.coursecode,tblcourse.coursename,
		tblcollegecourse.facultyid from tblcollegecourse  
		inner join tblcourse on tblcourse.id = tblcollegecourse.courseid
		where tblcollegecourse.facultyid='$facultyid' 
		and tblcollegecourse.collegeid='$collegeid' 
		and tblcollegecourse.status='1'
		group by tblcourse.coursename order by tblcourse.coursename";
		//echo $Query;
		$ExecQuery  = ExecQuery::ExecSecondQuery($Query); 
		$result = $ExecQuery->result ;
			echo "^Select|";
		while($row = $fetcharray($result))
		{
			echo trim($row["id"])."^".trim($row["coursename"])."|";
		}
		}
		exit;
		
	}
	
	
	
	if (trim($_GET[action])=='getCourse2')
	{
		$employeedicipline = $_GET["employeedicipline"];
		//$collegeid = $_GET["collegeid"];
		if(!empty($employeedicipline))
		{
		$Query = "select tblcourse.id,tblcourse.coursecode,tblcourse.coursename,
		tblcollegecourse.facultyid from tblcollegecourse  
		inner join tblcourse on tblcourse.id = tblcollegecourse.courseid
		where tblcollegecourse.facultyid='$employeedicipline' 
		and tblcollegecourse.status='1'
		group by tblcourse.coursename order by tblcourse.coursename";
		//echo $Query;
		$ExecQuery  = ExecQuery::ExecSecondQuery($Query); 
		$result = $ExecQuery->result ;
		//	echo "^Select|";
		while($row = $fetcharray($result))
		{
			echo trim($row["id"])."^".trim($row["coursename"])."|";
		}
		}
		exit;
		
	}
		
	if (trim($_GET[action])=='getDispCourse')
	{
		$facultyid = $_GET["facultyid"];
		if(!empty($facultyid))
		{
		$Query = "select tblcourse.id,tblcourse.coursecode,tblcourse.coursename,tblcollegecourse.facultyid 
		from tblcollegecourse  inner join tblcourse on tblcourse.id = tblcollegecourse.courseid
		where tblcollegecourse.facultyid='$facultyid' 
		and tblcollegecourse.status='1'
		group by tblcourse.coursename order by tblcourse.coursename";
		//echo $Query;
		$ExecQuery  = ExecQuery::ExecSecondQuery($Query); 
		$result = $ExecQuery->result ;
			echo "^Select|";
		while($row = $fetcharray($result))
		{
			echo trim($row["id"])."^".trim($row["coursename"])."|";
		}
		}
		exit;
		
	}
	
	
	if (trim($_GET[action])=='getCourseSubject')
	{
		$courseid = $_GET["studCourse"];
		$semester = $_GET["year"];
		if(!empty($courseid) && !empty($semester))
		{
		$Query = "Select tblsubject.subjectid,tblsubject.subjectcode,tblsubject.subjectname,
						tblcoursesubject.coursesubjectid,tblintake.intakeyear,tblcoursesubject.courseid,
						tblcourse.coursename
						from tblsubject
						inner join tblcoursesubject on tblcoursesubject.subjectid = tblsubject.subjectid
						inner join tblintake on tblintake.intakeid = tblcoursesubject.semesterid
						inner join tblcourse on tblcourse.id = tblcoursesubject.courseid
						where tblcoursesubject.subjectstatus='1' and tblcourse.id = '$courseid' and tblintake.intakeid = '$semester' ";
		//echo $Query;
		$ExecQuery  = ExecQuery::ExecSecondQuery($Query); 
		$result = $ExecQuery->result ;
			echo "^Select|";
		while($row = $fetcharray($result))
		{
			echo trim($row["coursesubjectid"])."^".trim($row["subjectname"])."|";
		}
		}
		exit;
		
	}

	if (trim($_GET[action])=='getDistrict')
	{
		 $stateid = $_GET["stateid"];
		if(!empty($stateid))
		{
		$Query = "select tbldistrict.stateid,tbldistrict.districtid,tbldistrict.districtname
		from tbldistrict inner join tblstate on 
		tblstate.stateid = tbldistrict.stateid
		where tbldistrict.stateid='$stateid'  
		group by tbldistrict.districtname order by tbldistrict.districtname";
		//echo $Query;
		$ExecQuery  = ExecQuery::ExecSecondQuery($Query); 
		$result = $ExecQuery->result ;
			echo "^Select|";
			while($row = $fetcharray($result))
			{
				echo trim($row["districtid"])."^".trim($row["districtname"])."|";
			}
		}
		exit;
		
	}
	
	if (trim($_GET[action])=='getSchool')
	{
		$districtid = $_GET["districtid"];
		$stateid = $_GET["stateid"];
		if(!empty($districtid) && !empty($stateid))
		{
		$Query = "select tblcollege.collegeid,tblcollege.collegename,tblcollege.districtid,
		tblcollege.stateid,tblcollege.status from tblcollege  
		inner join tbldistrict on tbldistrict.districtid = tblcollege.districtid
		inner join tblstate on tblstate.stateid = tblcollege.stateid
		where tblcollege.districtid='$districtid' 
		and tblcollege.stateid='$stateid' 
		and tblcollege.status='1'
		group by tblcollege.collegename order by tblcollege.collegename";
		//echo $Query;
		$ExecQuery  = ExecQuery::ExecSecondQuery($Query); 
		$result = $ExecQuery->result ;
			echo "^Select|";
		while($row = $fetcharray($result))
		{
			echo trim($row["collegeid"])."^".trim($row["collegename"])."|";
		}
		}
		exit;
		
	}
		
?>