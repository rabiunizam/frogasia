<?php
class clsemployee 
{ 
 	function employeesearch1($typeview,$empgroup,$empbranchid,$empstatus,$username)
	{ 

		$es1 = new stdClass; 
		if($typeview ==1)
		{
			$searchStmt = "Select tblemployee.*,tblbranch.branchname,
						   tblemployeestatus.empstatusname,tblgroup.groupname
							from tblemployee 
							inner join tblgroup on 
							tblemployee.empgroup = tblgroup.groupid
							inner join tblbranch on
							tblemployee.empbranchid = tblbranch.branchid
							inner join tblemployeestatus on 
							tblemployee.empstatus = tblemployeestatus.empstatusid
							where ";
			if ($empgroup)
				$searchStmt .= "tblemployee.empgroup = '$empgroup'  and   " ;
			if ($empbranchid)
				$searchStmt .= "tblemployee.empbranchid =  '$empbranchid'  and   " ;
			if ($empstatus)
				$searchStmt .= "tblemployee.empstatus = '$empstatus'  and   " ;
				$searchStmt= substr($searchStmt, 0, strlen($searchStmt)-6) ;
		}
		
		if($typeview ==2)
		{
			$searchStmt = "Select tblemployee.*
							from tblemployee 
							where tblemployee.empusername = '$username'" ;

		}	
			$es1->searchStmt = $searchStmt;
		return $es1; 

	} 
	
	
	function employeesearch2($offset,$limit,$searchStmt) 
	{ 

		$ss2 = new stdClass; 
		$searchStmt .= "order by tblemployee.empbranchid,tblemployee.empname limit $limit offset $offset  " ;
		$ss2->searchStmt = $searchStmt;
		return $ss2; 
	
	} 

	function employeeinsert($empname1,$empno1,$empnricpassportno1,$empusername1,$emppassword1,
							$empbranchid1,$empsex1,$emphomephoneno1,$emphandphoneno1,$empemail1,
							$description1,$empgroup1,$empstatus1,$userid)
	{ 

		$si = new stdClass; 
		$InsertStmt = "INSERT into tblemployee 
						(empname,empno,empnricpassportno,empusername,emppassword,
						empbranchid,empsex,emphomephoneno,emphandphoneno,empemail,description,
						empgroup,empstatus,addby,adddate)
						values 
						('$empname1','$empno1','$empnricpassportno1','$empusername1',
						'$emppassword1','$empbranchid1','$empsex1',
						'$emphomephoneno1','$emphandphoneno1',
						'$empemail1','$description1','$empgroup1','$empstatus1','$userid',
						now())";
		$si->InsertStmt = $InsertStmt;
		return $si; 
	}
	
	 

	function employeeupdate($empname1,$empno1,$empnricpassportno1,$empusername1,$emppassword1,
							$empbranchid1,$empsex1,$emphomephoneno1,$emphandphoneno1,$empemail1,
							$description1,$empgroup1,$empstatus1,$userid)
	{ 

		$su = new stdClass; 
		$UpdateStmt = "UPDATE tblemployee  set empname =  '$empname1',empno =  '$empno1',
						empnricpassportno =  '$empnricpassportno1', emppassword ='$emppassword1',
						empbranchid =  '$empbranchid1',empsex =  '$empsex1',
						emphomephoneno =  '$emphomephoneno1',
						emphandphoneno =  '$emphandphoneno1',
						empemail =  '$empemail1',description =  '$description1',
						empgroup =  '$empgroup1',
						empstatus =  '$empstatus1',editby='$userid',editdate=now()
						where empusername = '$empusername1'
						
						" ;
		$su->UpdateStmt = $UpdateStmt;
		return $su; 
	} 

	function employeedelete($empusername1) 
	{ 
		$sd = new stdClass; 
		$DeleteStmt = "Delete from tblemployee where empusername = '$empusername1' " ;
		$sd->DeleteStmt = $DeleteStmt;
		return $sd; 
	}
	
       function changepassword($empname1,$empusername1,$emppassword1)
	{

		$su = new stdClass;
		$UpdateStmt = "UPDATE tblemployee  set empname =  '$empname1', emppassword ='$emppassword1',
						editby='$userid',editdate=now()
						where empusername = '$empusername1'

						" ;
		$su->UpdateStmt = $UpdateStmt;
		return $su;
	} 
} 

?> 

