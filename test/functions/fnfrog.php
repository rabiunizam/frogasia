<?php
class clsfrog
{ 
 	function frogsearch1($typeview,$frogname1,$frogfamilyid1,$frogorderid1,$froggenus1,$frogepithet1,
                           $frogsubgenus1,$frogsubfamily1,$frogid1)
	{ 

		$es1 = new stdClass; 
		if($typeview ==1)
		{
			$searchStmt = "Select tblfrog.*,tblfamily.familyname,
						   tblorder.ordername,tblgender.gendername
							from tblfrog
							inner join tblgender on
							tblfrog.frogsexid = tblgender.gendercode
							inner join tblfamily on
							tblfrog.frogfamilyid = tblfamily.familyid
							inner join tblorder on
							tblfrog.frogorderid = tblorder.orderid
							where ";
			if ($frogfamilyid1)
				$searchStmt .= "tblfrog.frogfamilyid = '$frogfamilyid1'  and   " ;
			if ($frogorderid1)
				$searchStmt .= "tblfrog.frogorderid =  '$frogorderid1'  and   " ;
			if ($frogname1)
				$searchStmt .= "tblfrog.frogname like '%$frogname1%'  and   " ;
    		if ($froggenus1)
				$searchStmt .= "tblfrog.froggenus like '%$froggenus1%'  and   " ;
	    	if ($frogepithet1)
				$searchStmt .= "tblfrog.frogepithet like '%$frogepithet1%'  and   " ;
		    if ($frogsubgenus1)
				$searchStmt .= "tblfrog.frogsubgenus like '%$frogsubgenus1%'  and   " ;
        	if ($frogsubfamily1)
				$searchStmt .= "tblfrog.frogsubfamily like '%$frogsubfamily1%'  and   " ;

				$searchStmt= substr($searchStmt, 0, strlen($searchStmt)-6) ;
		}
		
		if($typeview ==2)
		{
			$searchStmt = "Select tblfrog.*,tblfamily.familyname,
						   tblorder.ordername,tblgender.gendername
							from tblfrog
							inner join tblgender on
							tblfrog.frogsexid = tblgender.gendercode
							inner join tblfamily on
							tblfrog.frogfamilyid = tblfamily.familyid
							inner join tblorder on
							tblfrog.frogorderid = tblorder.orderid
							where tblfrog.frogid = '$frogid1'" ;

		}	
			$es1->searchStmt = $searchStmt;
		return $es1; 

	} 
	
	
	function frogsearch2($offset,$limit,$searchStmt)
	{ 

		$ss2 = new stdClass; 
		$searchStmt .= "order by tblfrog.frogname limit $limit offset $offset  " ;
		$ss2->searchStmt = $searchStmt;
		return $ss2; 
	
	} 

	function froginsert($frogname1,$frognamesc1,$frogdob1,$frogsexid1,$frogcountryid1,
                        $frogfamilyid1,$frogorderid1,$froggenus1,$frogepithet1,
                        $frogsubgenus1,$frogsubfamily1,$ponddetails1,$userid1)
	{ 

		$si = new stdClass; 
		$InsertStmt = "INSERT into tblfrog
						(frogname,frognamesc,frogdob,frogsexid,frogcountryid,
                        frogfamilyid,frogorderid,froggenus,frogepithet,
                        frogsubgenus,frogsubfamily,ponddetails,addby,adddate)
						values 
						('$frogname1','$frognamesc1','$frogdob1','$frogsexid1',
						'$frogcountryid1','$frogfamilyid1','$frogorderid1',
						'$froggenus1','$frogepithet1',
						'$frogsubgenus1','$frogsubfamily1','$ponddetails1','$userid1',
						now())";
		$si->InsertStmt = $InsertStmt;
		return $si; 
	}
	
	 

	function frogupdate($frogid1,$frogname1,$frognamesc1,$frogdob1,$frogsexid1,$frogcountryid1,
                        $frogfamilyid1,$frogorderid1,$froggenus1,$frogepithet1,
                        $frogsubgenus1,$frogsubfamily1,$ponddetails1,$userid1)
	{ 

		$su = new stdClass; 
		$UpdateStmt = "UPDATE tblfrog  set frogname='$frogname1',frognamesc ='$frognamesc1',
						frogdob =  '$frogdob1', frogsexid ='$frogsexid1',
						frogcountryid =  '$frogcountryid1',frogfamilyid =  '$frogfamilyid1',
						frogorderid =  '$frogorderid1',
						froggenus =  '$froggenus1',
						frogepithet =  '$frogepithet1',frogsubgenus =  '$frogsubgenus1',
						frogsubfamily =  '$frogsubfamily1',
						ponddetails =  '$ponddetails1',editby='$userid1',editdate=now()
						where frogid = '$frogid1'
						
						" ;
		$su->UpdateStmt = $UpdateStmt;
		return $su; 
	} 
 	function uploadphoto($frogid1,$frogphotoaddress1,$userid1)
	{

		$su = new stdClass;
		$UpdateStmt = "UPDATE tblfrog  set frogphotoaddress='$frogphotoaddress1',
                       editby='$userid1',editdate=now()
						where frogid = '$frogid1'

						" ;
		$su->UpdateStmt = $UpdateStmt;
		return $su;
	}

	function frogdelete($frogname1)
	{ 
		$sd = new stdClass; 
		$DeleteStmt = "Delete from tblfrog where frogname = '$frogname1' " ;
		$sd->DeleteStmt = $DeleteStmt;
		return $sd; 
	}
	

} 

?> 

