<?php

	function SearchName($table,$sendname,$sendvalue,$showname)
	{
 	$db = New database();
		$db->connectdb ();

		$query = "Select $showname from $table where $sendname='$sendvalue' ";
		$result = mysqli_query($GLOBALS['conn'],$query);
		$rst = mysqli_fetch_array($result);
		return $rst[$showname];
  $db->closedb ();
	}
	
	function SearchNameByWhere($table,$where,$showname)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select $showname from $table $where ";
	//	echo $query;
  $result = mysqli_query($GLOBALS['conn'],$query);
		$rst = mysqli_fetch_array($result);
		return $rst[$showname];
  $db->closedb ();
	}
	function selectfield($selectname,$selectedvalue,$width,$table,$sendvalue,$showvalue,$javascript="")
	{
 	$db = New database();
		$db->connectdb ();

		$query = "Select * from $table order by $sendvalue ";
  $result = mysqli_query($GLOBALS['conn'],$query);
		//echo $query;
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" class=\"selectinput\" onChange=\"$javascript\" >";
		
		print "<OPTION VALUE='0'> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			//$showvalue1 = ucwords(strtolower($row[$showvalue]));
			$showvalue1 = $row[$showvalue];
			$sendvalue1 = $row[$sendvalue];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
  $db->closedb ();
	}
	
function SelectField2($SelectName,$SelectedValue,$width,$table,$sendvalue,$showvalue,$event,$event_name)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from $table order by $sendvalue ";

  $result = mysqli_query($GLOBALS['conn'],$query);


		print "<SELECT NAME=\"$SelectName\" SIZE=\"1\" style=\"width:$width\" $event =\"$event_name\" >";

		print "<OPTION VALUE=''> Select   </OPTION>";

   while($row=mysqli_fetch_array($result))
		 {
			$ShowValue1 = ucwords(strtolower($row[$showvalue]));
			$SendValue1 = $row[$sendvalue];

			$NewValue = $SelectedValue;

			if ($SendValue1 == $NewValue)
				{
					print " <option value=\"$SendValue1\" selected>".$ShowValue1."</option>";
				}
			else
				{	print "<option value=\"$SendValue1\">".$ShowValue1."</option>";
				}
		  }
		echo "</select>";
  $db->closedb ();
	}


function SelectField3($SelectName,$SelectedValue,$SelectedItem1,$SelectedValue1,$width,$table,$sendvalue,$showvalue)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from $table where $SelectedItem1='$SelectedValue1' order by $sendvalue ";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$SelectName\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE='0'> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$ShowValue1 = ucwords(strtolower($row[$showvalue]));
			$SendValue1 = $row[$sendvalue];
		
			$NewValue = $SelectedValue;
		
			if ($SendValue1 == $NewValue)
				{
					print " <option value=\"$SendValue1\" selected>".$ShowValue1."</option>";
				}
			else
				{	print "<option value=\"$SendValue1\">".$ShowValue1."</option>";
				}
		  }
		echo"</select>";
  $db->closedb ();
	}

function SelectField4($SelectName,$SelectedValue,$width,$table,$sendvalue,$showvalue,$showvalue2,$event_tocall,$fn_name,$where="")
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from $table $where order by $showvalue ";
		//echo $query;
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT class=InputText NAME=\"$SelectName\" SIZE=\"1\" style=\"width:$width\" $event_tocall =\"$fn_name\" >";
		
		print "<OPTION VALUE=''> Select  </OPTION>";
		
		 while($row = mysqli_fetch_array($result))
		 {
			//$ShowValue1 = ucwords(strtolower($row[$showvalue]));
			$ShowValue1 = strtoupper($row[$showvalue] . " - " . $row[$showvalue2]);
			$SendValue1 = $row[$sendvalue];
		
			$NewValue = $SelectedValue;
		
			if ($SendValue1 == $NewValue)
				{
					print " <option value=\"$SendValue1\" selected>".$ShowValue1."</option>";
				}
			else
				{	print "<option value=\"$SendValue1\">".$ShowValue1."</option>";
				}
		  }
		echo "</select>";
 	$db->closedb ();
	}

	function Lecatttype($selectname,$selectedvalue,$width,$emplevel,$typeclass)
	{
		$db = New database();
		$db->connectdb ();
		$Curdate = date("Y=m-d");
		$curtime = date("H:i:s");
		/* $NewStart = date("H:i:s",mktime(date("H"),date("i")-15,date("s"),1,1,2005));
		$NewEnd = date("H:i:s",mktime(date("H"),date("i")+15,date("s"),1,1,2005));
		 */
		$searchStmt = "Select * from tblempatttype where ";
		if ($emplevel==3)
		$searchStmt .= "attstart < '$curtime'  and attend > '$curtime'  and  " ;
		if ($typeclass != "Replacement")
		$searchStmt .= "atttypeid < 5  and   " ;
		$searchStmt= substr($searchStmt, 0, strlen($searchStmt)-6) ;
		$searchStmt .= "order by atttypeid " ;
		//print $searchStmt;
		$result = mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE=''> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row["atttypename"];
			$sendvalue1 = $row["atttypeid"];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	function atttype($selectname,$selectedvalue,$width,$emplevel,$typeclass)
	{
		$db = New database();
		$db->connectdb ();
		$Curdate = date("Y=m-d");
		$curtime = date("H:i:s");
		$searchStmt = "Select * from tblatttype where ";
		if ($emplevel==3)
		$searchStmt .= "attstart < '$curtime'  and attend > '$curtime'  and  " ;
		if ($typeclass != "Replacement")
		$searchStmt .= "atttypeid < 3  and   " ;
		$searchStmt= substr($searchStmt, 0, strlen($searchStmt)-6) ;
		$searchStmt .= "order by atttypeid " ;
		//print $searchStmt;
		$result = mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE=''> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row["atttypename"];
			$sendvalue1 = $row["atttypeid"];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	function userlevel($selectname,$selectedvalue,$width,$collegecode,$userlevel)
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = "Select * from tblemplevel where ";
		if ($userlevel==2 && $collegecode!=1)
		$searchStmt .= "emplevelid > '$userlevel' " ;
		if ($userlevel==2 && $collegecode==17)
		$searchStmt .= "emplevelid >= '$userlevel' " ;
		if ($userlevel==1 )
		$searchStmt .= "emplevelid >= '$userlevel' " ;
		$result = mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE=''> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row["emplevelname"];
			$sendvalue1 = $row["emplevelid"];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	function Grant($selectname,$selectedvalue,$width,$collegecode,$programid)
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = "Select * from tblgrant where ";
		if ($collegecode!=1)
		$searchStmt .= "collegecode = '$collegecode'  and   " ;
		if ($programid)
		$searchStmt .= "programid = '$programid'  and   " ;
		$searchStmt= substr($searchStmt, 0, strlen($searchStmt)-6) ;
		$searchStmt .= "order by grantno " ;
		$result = mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		//print "<OPTION VALUE=''> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row["grantno"];
			$sendvalue1 = $row["grantno"];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	function classcode($selectname,$selectedvalue,$width,$collegecode)
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = "Select * from tblclass where classstatus = 1  and   ";
		if ($collegecode!=1)
		$searchStmt .= "collegecode = '$collegecode'  and   " ;
		$searchStmt= substr($searchStmt, 0, strlen($searchStmt)-6) ;
		$searchStmt .= "order by classid " ;
		$result = mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE='0'> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row["classcode"];
			$sendvalue1 = $row["classid"];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	function repclasscode($selectname,$selectedvalue,$width,$collegecode,$classid)
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = "Select * from tblreplacementclass
						where classid = '$classid'  and 
								repclassstatus = 1  and   ";
		if ($collegecode!=1)
		$searchStmt .= "collegecode = '$collegecode'  and   " ;
		$searchStmt= substr($searchStmt, 0, strlen($searchStmt)-6) ;
		$searchStmt .= "order by repclassid " ;
		$result = mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE='0'> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row["repclasscode"];
			$sendvalue1 = $row["repclassid"];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}

	
	function termlist($selectname,$selectedvalue,$width)	// aime edited, 18/10/07
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = " Select termid, term from tblterm where termstatus = 1";
		
		$result = mysqli_query($searchStmt);
		//print $searchStmt;
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE='0'>Select</OPTION>";
		
		 while($row = mysqli_fetch_array($result))
		 {
			$showvalue1 = $row["term"];
			$sendvalue1 = $row["termid"];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	function termdetail($selectname,$selectedvalue,$width,$programid)
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = "Select tblprogramfee.paymenttype,tblpaymenttype.paymenttypename
						from tblprogramfee 
						inner join tblpaymenttype on
						tblpaymenttype.paymenttypeid = tblprogramfee.paymenttype 
						where tblprogramfee.programid = '$programid'  and   " ;
		$searchStmt= substr($searchStmt, 0, strlen($searchStmt)-6) ;
		$searchStmt .= "order by tblprogramfee.paymenttype " ;
		$result = mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE='0'>Select</OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row["paymenttypename"];
			$sendvalue1 = $row["paymenttype"];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	function intake($selectname,$selectedvalue,$width)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from tblintake order by intakeid ";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE='0'> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			
			 $showvalue = $row['intakeyear']."".sprintf("%02s",$row["intakemonth"]); 
			 
			 
	  	$sendvalue = $row["intakeid"];
		
			$NewValue =$selectedvalue;
		
			if ($sendvalue == $NewValue)
				{
					print " <option value=\"$sendvalue\" selected>".$showvalue."</option>";
				}
			else
				{	print "<option value=\"$sendvalue\">".$showvalue."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}



	function program($selectname,$selectedvalue,$width)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from tblprogram order by programid ";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE='0'> Select program </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue = $row['programcode']." - ".$row['programname'];
			$sendvalue = $row["programid"];
		
			$NewValue =$selectedvalue;
		
			if ($sendvalue == $NewValue)
				{
					print " <option value=\"$sendvalue\" selected>".$showvalue."</option>";
				}
			else
				{	print "<option value=\"$sendvalue\">".$showvalue."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}



	function programstatus($selectname,$selectedvalue,$width)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from tblprogramstatus order by programstatusid ";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE='0'> All status  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue = $row["programstatus"];
			$sendvalue = $row["programstatusid"];
		
			$NewValue =$selectedvalue;
		
			if ($sendvalue == $NewValue)
				{
					print " <option value=\"$sendvalue\" selected>".$showvalue."</option>";
				}
			else
				{	print "<option value=\"$sendvalue\">".$showvalue."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}

	function facultycode($selectname,$selectedvalue,$width,$javascript="")
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from tblfaculty where status = 1 order by facultyname";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" class=\"selectinput\" onChange=\"$javascript\" >";
		print "<OPTION VALUE=''>Select</OPTION>";
	
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue = ucwords(strtolower($row["facultyname"]));
			$sendvalue = $row["facultyid"];
		
			$NewValue =$selectedvalue;
		
			if ($sendvalue == $NewValue)
				{
					print " <option value=\"$sendvalue\" selected>".$showvalue."</option>";
				}
			else
				{	print "<option value=\"$sendvalue\">".$showvalue."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	function programtype($selectname,$selectedvalue,$width)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from tblprogramtype order by programtypeid ";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
	
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue = ucwords(strtolower($row["programtypename"]));
			$sendvalue = $row["programtypeid"];
		
			$NewValue =$selectedvalue;
		
			if ($sendvalue == $NewValue)
				{
					print " <option value=\"$sendvalue\" selected>".$showvalue."</option>";
				}
			else
				{	print "<option value=\"$sendvalue\">".$showvalue."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}

	function programfrom($selectname,$selectedvalue,$width)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from tblprogramfrom order by programfromid ";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
	
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue = ucwords(strtolower($row["programfromname"]));
			$sendvalue = $row["programfromid"];
		
			$NewValue =$selectedvalue;
		
			if ($sendvalue == $NewValue)
				{
					print " <option value=\"$sendvalue\" selected>".$showvalue."</option>";
				}
			else
				{	print "<option value=\"$sendvalue\">".$showvalue."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	function college($selectname,$selectedvalue,$width,$javascript="")
	{
		$db = New database();
		$db->connectdb ();

		//$query = "Select * from tblcollege order by collegecode ";
		$query = "Select * from tblcollege where status = 1 and collegename<>'' group by collegename order by collegename";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" class=\"selectinput\" onChange=\"$javascript\" >";
		
		
		print "<OPTION VALUE=''>Select</OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue = $row["collegename"];
			$sendvalue = $row["collegeid"];
		
			$NewValue =$selectedvalue;
		
			if ($sendvalue == $NewValue)
				{
					print " <option value=\"$sendvalue\" selected>".$showvalue."</option>";
				}
			else
				{	print "<option value=\"$sendvalue\">".$showvalue."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
		
	}
	
	function marketing($selectname,$selectedvalue,$width)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from tblstaff where positionid between 7 and 9 order by staffid ";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE='0'> Select marketing </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue = $row['staffname'];
			$sendvalue = $row['staffid'];
		
			$NewValue =$selectedvalue;
		
			if ($sendvalue == $NewValue)
				{
					print " <option value=\"$sendvalue\" selected>".$showvalue."</option>";
				}
			else
				{	print "<option value=\"$sendvalue\">".$showvalue."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}

/************************************************************************************/
	function subjectlist($selectname,$selectedvalue,$width,$intakecode,$coursecode,$semester)
	{
		$db = New database();
		$db->connectdb ();

		//$searchStmt = "Select * from tblsubject where status = 1  and   ";
		$searchStmt = " Select tblsubject.subjectcode,tblsubject.subjectname
						from tblsubject
						inner join tblcoursesubject 
							on tblcoursesubject.subjectid = tblsubject.subjectid
						inner join tblintakecourse 
							on tblintakecourse.id = tblcoursesubject.intakecourseid
						inner join tblsemester 
							on tblsemester.id = tblcoursesubject.semesterid
						where 
						";
						
		if($intakecode)
			$searchStmt .= " tblintakecourse.intakecode = $intakecode  and   ";
		if($coursecode)
			$searchStmt .= " tblintakecourse.courseid = $coursecode  and   ";	
		if($semester)
			$searchStmt .= " tblsemester.semname = $semester  and   ";
			
		$searchStmt= substr($searchStmt, 0, strlen($searchStmt)-6) ;
		//echo $searchStmt;
		$result = @mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE=''> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row["subjectcode"];
			$sendvalue1 = $row["subjectid"];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
				{
					print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
				}
			else
				{	print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
				}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
/************************************************************************************/
	function distinctlist($selectname,$selectedvalue,$width,$tblname,$selectvalue,$selectstatus)
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = " Select distinct $selectvalue from $tblname ";
		
		if ($selectstatus)
			$searchStmt .= " where ".$selectstatus;
			
		$result = mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE=''> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row[$selectvalue];
			$sendvalue1 = $row[$selectvalue];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
			{
				print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
			}
			else
			{	
				print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
			}
		  }
		echo"</select>";
		$db->closedb ();
	}

/************************************************************************************/
	function checkboxfield($checkboxname,$tblname,$showvalue,$sendvalue)
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = " Select * from $tblname";
		$result = mysqli_query($searchStmt);
		
		$m = 1;
		 while($row=mysqli_fetch_array($result))
		 {
			
			$showvalue1 = $row[$showvalue];
			$sendvalue1 = $row[$sendvalue];
		
			print "<tr><td><input name=\"$checkboxname$m\" type=\"checkbox\"> $showvalue1 </td>
    				</tr>";
			$m++;
		  }
		//echo"</select>";
		$db->closedb ();
	}

	/************************************************************************************/
	function selectcourseintake($selectname,$selectedvalue,$intakecode,$showvalue)
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = " Select tblcourse.coursename as coursename,tblcourse.coursecode as coursecode,
						tblintakecourse.id as id
						from tblcourse
						inner join tblintakecourse on tblintakecourse.courseid = tblcourse.id
						inner join tblintake on tblintake.intakecode = tblintakecourse.intakecode
						where tblintakecourse.status = 1 
						and tblintake.intakestatus = 1 
						and tblintake.intakecode = '$intakecode'
						order by tblcourse.coursename";
		//echo $searchStmt;
		$result = mysqli_query($searchStmt);
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" >";
		print "<OPTION VALUE=''> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row[$showvalue];
			$sendvalue1 = $row["id"];
		
			if ($selectedvalue == $sendvalue1)
				print "<option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
			else
				print "<option value=\"$sendvalue1\" >".$showvalue1."</option>";	
		  }
		echo"</select>";
		$db->closedb ();
						
	}	
	
	/************************************************************************************/
	function selectcreditlevel($selectname,$creditlevel,$selected)
	{
		$db = New database();
		$db->connectdb ();

		$sqlcredit = " Select credit from tblcredit where credit >= $creditlevel order by credit";
		$credit = mysqli_query($sqlcredit);
		 //print $sqlcredit;
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" >";
		print "<OPTION VALUE='0'> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($credit))
		 {
			$showvalue1 = $row["credit"];
			$sendvalue1 = $row["credit"];
		
			if ($sendvalue1 == $selected)
			{
				print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
			}
			else
			{	
				print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
			}
				
		  }
		echo"</select>";
		$db->closedb ();
						
	}	

	/********************************************************************************************/
	function searchfieldname($table,$selectfield,$wherefields)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select $selectfield from $table";
		
		if($wherefields)
		$query .= " where $wherefields ";
		
		
  $result = mysqli_query($GLOBALS['conn'],$query);
		//return $query;
		return $result;
		$db->closedb ();
	}	

	/************************************************************************************/
	function selectintake($selectname,$selectedvalue,$width,$javascript)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select * from tblintake where intakestatus = 1 order by intakeid ";
  $result = mysqli_query($GLOBALS['conn'],$query);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" class=\"selectinput\" onChange=\"$javascript\" >";
		
		print "<OPTION VALUE='0'> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			 $showvalue = $row["intakecode"];
	  		 $sendvalue = $row["intakecode"];
		
			 if ($sendvalue == $selectedvalue)
			 {
				print " <option value=\"$sendvalue\" selected>".$showvalue."</option>";
			 }
			 else
			 {	
				print "<option value=\"$sendvalue\">".$showvalue."</option>";
			 }
		  }
		echo"</select>";
		$db->closedb ();
	}

	function selectdistinct($selectname,$selectedvalue,$width,$tblname,$selectvalue,$showvalue)// aime 25/08/07
	{
		$db = New database();
		$db->connectdb ();

		$searchStmt = " Select distinct $selectvalue,$showvalue from $tblname";
		$result = mysqli_query($searchStmt);
		
		print "<SELECT NAME=\"$selectname\" SIZE=\"1\" style=\"width:$width\" >";
		
		print "<OPTION VALUE=''> Select  </OPTION>";
		
		 while($row=mysqli_fetch_array($result))
		 {
			$showvalue1 = $row[$showvalue];
			$sendvalue1 = $row[$selectvalue];
		
			$NewValue = $selectedvalue;
		
			if ($sendvalue1 == $NewValue)
			{
				print " <option value=\"$sendvalue1\" selected>".$showvalue1."</option>";
			}
			else
			{	
				print "<option value=\"$sendvalue1\">".$showvalue1."</option>";
			}
		  }
		echo"</select>";
		$db->closedb ();
	}
	
	/* function to get user's college */
	function CollegePermission($empcenterid)
	{
		$collegeid = SearchName("tblcollege","collegeid",$empcenterid,"collegeid");
		if ($collegeid == "36")
		{
			$sql = " collegeid <> ".$empcenterid;
		}
		else
		{
			$sql = " collegeid = ".$empcenterid;
		}
		
		return $sql;
	}
	
	/* function to get user's college */
	function EmployeeCollegePermission($employeeid)
	{
		$collegeid = SearchName("tblemployeecollege","employeeid",$employeeid,"employeeid");
		$sql = " tblemployeecollege.employeeid = ".$employeeid;
		
		return $sql;
	}
	
	function selectlevelcourse($SelectName,$SelectedValue,$width,$sendvalue,$showvalue,$searchvalue1,$searchvalue2)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select tblcollegecourse.collegeid,tblcollegecourse.facultyid,tblcollegecourse.courseid,tblcollegecourse.status,tblcourse.coursename
				  from tblcollegecourse
				  INNER JOIN tblcourse on tblcollegecourse.courseid = tblcourse.id 
				  where tblcollegecourse.collegeid = '$searchvalue1' and tblcollegecourse.facultyid = '$searchvalue2' and tblcollegecourse.status = '1' order by $sendvalue ";

      $result = mysqli_query($GLOBALS['conn'],$query);


		print "<SELECT NAME=\"$SelectName\" SIZE=\"1\" style=\"width:$width\" >";

		print "<OPTION VALUE=''> Select   </OPTION>";

   while($row=mysqli_fetch_array($result))
		 {
			$ShowValue1 = ucwords(strtolower($row[$showvalue]));
			$SendValue1 = $row[$sendvalue];

			$NewValue = $SelectedValue;

			if ($SendValue1 == $NewValue)
				{
					print " <option value=\"$SendValue1\" selected>".$ShowValue1."</option>";
				}
			else
				{	print "<option value=\"$SendValue1\">".$ShowValue1."</option>";
				}
		  }
		echo "</select>";
		$db->closedb ();
	}
	
	function selectyear($SelectName,$SelectedValue,$width,$sendvalue,$showvalue,$searchvalue1)
	{
		$db = New database();
		$db->connectdb ();

		$query = "Select tblintake.intakeid,tblintake.intakeyear
				  from tblintake 
				  where intakeid != '$searchvalue1' and intakestatus = '1' order by $sendvalue ";

      $result = mysqli_query($GLOBALS['conn'],$query);


		print "<SELECT NAME=\"$SelectName\" SIZE=\"1\" style=\"width:$width\" >";

		print "<OPTION VALUE=''> Select   </OPTION>";

   while($row=mysqli_fetch_array($result))
		 {
			$ShowValue1 = ucwords(strtolower($row[$showvalue]));
			$SendValue1 = $row[$sendvalue];

			$NewValue = $SelectedValue;

			if ($SendValue1 == $NewValue)
				{
					print " <option value=\"$SendValue1\" selected>".$ShowValue1."</option>";
				}
			else
				{	print "<option value=\"$SendValue1\">".$ShowValue1."</option>";
				}
		  }
		echo "</select>";
		$db->closedb ();
	}
?>
