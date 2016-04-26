<?php
	include"../../session.php";
	include"../../functions/fnemployee.php";
	include"../../functions/fn.php";
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../../css/new_style.css" type=text/css rel=stylesheet>
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
	<!--
	var popup_detailsWindow=null;
	function popup_details(mypage,myname,w,h,pos,infocus) {
		if (pos == 'random') {
			LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;
			TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;
		} else {
			LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;
		}
		
		settings='width='+ w + ',height='+ h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';popup_detailsWindow=window.open('',myname,settings);
		if(infocus=='front') {
			popup_detailsWindow.focus();
			popup_detailsWindow.location=mypage;
		}
		if(infocus=='back') {
			popup_detailsWindow.blur();
			popup_detailsWindow.location=mypage;
			popup_detailsWindow.blur();
		}
	}
	// -->
</script>
<script type="text/javascript" src="../../common/sortabletable.js"></script>
</head> 
<body text="#000066" leftmargin="0" topmargin="0"> 
<form action="frmemployees.php" method="post" name="form1">
<?php
	$userid = $_SESSION["empusername"];
	$UserGroup = $_SESSION["empgroup"];

	$Today = date("Y-m-d");
	if(isset($_POST["Submit"])) {
		$Search=$_POST["Submit"];
	} elseif(isset($_GET["Submit"])) {
		$Search=$_GET["Submit"];
	} else {
		$Search="";
	}

	if(isset($_GET["page"])) { $page = trim($_GET["page"]); } else { $page = 1; }
	if(isset($_GET["offset"])) { $offset = $_GET["offset"]; } else { $offset = ""; } 
	if(isset($_POST["empgroup1"])) { $empgroup1 = trim($_POST["empgroup1"]); }  
	elseif(isset($_GET["empgroup1"])) { $empgroup1 = trim($_GET["empgroup1"]); }  
	else { $empgroup1 = ""; }
	if(isset($_POST["empbranchid1"])) { $empbranchid1 = trim($_POST["empbranchid1"]); }
	elseif(isset($_GET["empbranchid1"])) { $empbranchid1 = trim($_GET["empbranchid1"]); }
	else { $empbranchid1 = ""; }
	if(isset($_POST["empstatus1"])) { $empstatus1 = trim($_POST["empstatus1"]); }
	elseif(isset($_GET["empstatus1"])) { $empstatus1 = trim($_GET["empstatus1"]); }  
	else { $empstatus1 = ""; }

	//if($collegecode!=36) { $empcenterid1 = $collegecode; }
	if($Search == "Search") {
		$limit = 20;
		$Employee  = clsemployee::employeesearch1(1,$empgroup1,$empbranchid1,$empstatus1,"");
		$searchStmt = $Employee->searchStmt;
		$ExecQuery  = ExecQuery::ExecFirstQuery($searchStmt); 
		$result1 = $ExecQuery->result1 ;
		$total = $ExecQuery->total ;

		$pager  = Pager::getPagerData($total, $limit, $page); 
		$offset = $pager->offset; 
		$limit  = $pager->limit; 
		$page   = $pager->page; 
		if ($noofrows($result1) != 0 ){	
			$Employee  = clsemployee::employeesearch2($offset,$limit,$searchStmt); 
			$searchStmt = $Employee->searchStmt ;
		}
		$ExecQuery  = ExecQuery::ExecSecondQuery($searchStmt); 
		//print $searchStmt;
		$result = $ExecQuery->result ;
	} else {
		$total = "" ;
	}

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="33" rowspan="2"><img src="../../images/search.JPG"> </td>
    <td height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; Search User </td>
</tr>
<tr>
    <td height="5" colspan="2" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;search for user using specified criteria </td>
</tr>
<tr>
    <td height="5" colspan="2" bgcolor="#FF9900"></td>
</tr>
</table>
<table width="755" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
    <td width="755" height="10" ></td>
</tr>
<tr>
    <td height="20">	
    <FIELDSET style="border:1px solid #cccccc; width:750;">
    <LEGEND class="page_title_black"  >Search Criteria</LEGEND>  
    <table width="740" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr align="left" valign="middle">
        <td width="75" height="30" class="label_text">Group</div></td>
        <td width="235" height="30">
        <?php
            if($UserGroup==1) {
                print selectfield("empgroup1",$empgroup1,150,"tblgroup","groupid","groupname");
            } else {
                print selectfield("empgroup1",11,150,"tblgroup where groupid=11","groupid","groupname");
            }
        ?>
        </td>
        <td width="66" height="30" class="label_text">Status</td>
        <td width="194" height="30" class="label_text">
        <?php 
            print selectfield("empstatus1",$empstatus1,"130","tblemployeestatus","empstatusid","empstatusname"); 
        ?>
        </td>
        <td width="151" height="30">&nbsp;</td>
    </tr>
    <tr align="left" valign="middle">
        <td height="30" class="label_text">Branch</td>
        <td height="30" colspan="3">
        <?php 
            print SelectField2("empbranchid1",$empbranchid1,"400","tblbranch where status = 1 ","branchid","branchname","","");
        ?>
        </td>                  
        <td height="30" align="right">
            <input type="Submit" name="Submit" value="Search" class="text_button">
            <input type="Reset" name="Reset" value="Clear" class="text_button">
        </td>
    </tr>
    </table>
    </FIELDSET>  
    </td>
</tr>
<tr>  
    <td height="20" >&nbsp;&nbsp;&nbsp;
        <input type="button" name="Button" value="Add New User" class="text_button" onClick="javascript:popup_details('<?php print"frmemployeenew.php";?>','NewUser','650','400','center','front','yes','yes');" title="Click button to Add New user" >
    </td>
</tr>
<tr>
    <td height="10"></td>
</tr>
<tr>
    <td height="20" class="page_title_black">&nbsp;Record(s) :&nbsp;<?php print $total; ?></td>
</tr>
<tr>
    <td height="10" >
    <table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php print"$tablebordercolor"; ?>">
    <tr>
        <td>
        <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="center">
            <td width="750">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                <table width="725" height="21" border="0" cellpadding="0" cellspacing="0" >
                <tr valign="middle" background="<?php print"../../admission/$tablerowbg"; ?>" >
                    <td width="30">
                        <div align="center" class="style18">
                        <input name="Button" type="button" style='width:30;height:20'  value="No" class="text_button">
                        </div>
                    </td>
                    <td width="300">
                        <div align="center" class="style18">
                        <input type="button" name="Button" value="Employee Name" style='width:300;height:20' class="text_button" onClick="st.sort(2)">
                        </div>
                    </td>
                    <td width="160" align="left">
                        <div align="left" class="style18">
                        <input type="button" name="Button" value="Branch Name" style='width:160;height:20' class="text_button" onClick="st.sort(3)">
                        </div>
                    </td>
                    <td width="150" align="left">
                        <div align="left" class="style18">
                        <input type="button" name="Button" value="Group" style='width:150;height:20' class="text_button" onClick="st.sort(4)">
                        </div>
                    </td>
                    <td width="105" align="left">
                        <div align="left" class="style18">
                        <input type="button" name="Button" value="Status" style='width:105;height:20' class="text_button" onClick="st.sort(5)">
                        </div>
                    </td>
                    <td width="105" align="left">
                        <div align="left" class="style18">
                        <input type="button" name="Button" value="Details" style='width:105;height:20' class="text_button" onClick="st.sort(5)">
                        </div>
                    </td>
                </tr>
                </table>
                <DIV id="Smartlayer"  
                  style='visibility: visible; 
                         border: solid 0px #3D5054; 
                         left:0px;
                         width:850px;
                         height:250px; 
                         overflow-x: hidden;
                         overflow-y: scroll;'>
                <table width="850" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC"  class="sort-table" id="table1" >
                <tbody>
                <?php
                    if($Search != "") {  
                        $rowoutcolor = $tablebordercolor ;
                        $rowcolor = "white";
                        $color1 = "even" ; 
                        $color2 = "odd" ;
                        $row_count = 0;
                        
                        while($row = $fetcharray($result)) {
                            $row_color = ($row_count % 2) ? $color1 : $color2;	
                            $username = $row["empusername"];
                ?>
                <tr class="<?php print $row_color; ?>" onMouseOver="this.bgColor='<?php print $rowoutcolor; ?>'" onMouseOut="this.bgColor='<?php print $rowcolor; ?>'" >
                    <td height="20" width="35" align="center" class="news_date"><?php print $row_count+1;?></td>
                    <td width="300" align="left" valign="middle" class="news_date"><?php print $row["empname"];?></td>
                    <td width="160" align="left" valign="middle" class="news_date"><?php print $row["branchname"];?></td>
                    <td width="150" align="left" valign="middle" class="news_date"><?php print $row["groupname"];?></td>
                    <td width="105" align="center" valign="middle" class="news_date"><?php print $row["empstatusname"];  ?> </td>
                    <td width="105" align="center" valign="middle" class="news_date"><a href= "javascript:popup_details('<?php 
                    print"frmemployeeview.php?username=$username";?>','programDetails','700','400','center','front','yes','yes');" title="Click to Edit user"><img src="../../images/edit20.jpg" /></a></td>
                </tr>
                <?php 
                            $row_count++;
                        }
                ?>
                </tbody>
                </table>
                <script type="text/javascript">
                    function addClassName(el, sClassName) {
                        var s = el.className;
                        var p = s.split(" ");
                        var l = p.length;
                        for (var i = 0; i < l; i++) {
                            if (p[i] == sClassName)
                            return;
                        }
                        p[p.length] = sClassName;
                        el.className = p.join(" ");
                    }
                
                    function removeClassName(el, sClassName) {
                        var s = el.className;
                        var p = s.split(" ");
                        var np = [];
                        var l = p.length;
                        var j = 0;
                        for (var i = 0; i < l; i++) {
                            if (p[i] != sClassName)
                            np[j++] = p[i];
                        }
                        el.className = np.join(" ");
                    }
                    
                    var st = new SortableTable(document.getElementByid("table1"),
                    ["String", "CaseInsensitiveString", "String", "String"]);
                    
                    // restore the class names
                    st.onsort = function () {
                        var rows = st.tBody.rows;
                        var l = rows.length;
                        for (var i = 0; i < l; i++) {
                            removeClassName(rows[i], i % 2 ? "odd" : "even");
                            addClassName(rows[i], i % 2 ? "even" : "odd");
                        }
                    };
                </script>
                </DIV>
                </td>
            </tr>
            </table>
            </td>
        </tr>
        <?php
            if ($noofrows($result1) != 0 ){
        ?>
        <tr>
            <td align="center" bgcolor="<?php print"$tablebordercolor"; ?>"><span class="label_text">
        <?php
            // output paging system (could also do it before we output the page content) 
            echo "<a href=\"frmemployees.php?Submit=Search&empgroup1=$empgroup1&empstatus1=$empstatus1&empbranchid1=$empbranchid1&page=1\"><strong>First</strong></a>";
            echo " | ";
            if ($page == 1) // this is the first page - there is no previous page 
            echo "Previous"; 
            else            // not the first page, link to the previous page 
            echo "<a href=\"frmemployees.php?Submit=Search&empgroup1=$empgroup1&empstatus1=$empstatus1&empbranchid1=$empbranchid1&page=" . ($page - 1) . "\">Previous</a>";
            
            $new1 = ($page-5) ;
            $new2 = ($page+5) ;
            if($new1<=0){ $prev1 = 1;}
            else { $prev1 = $new1;}
            
            if($new2 >= $pager->numPages){ $prev2 = $pager->numPages;}
            else { $prev2 = $new2;}
            
            for ($i = $prev1; $i <= $prev2; $i++) { 
            echo " | "; 
            if ($i == $pager->page) 
            echo "$i"; 
            else 
            echo "<a href=\"frmemployees.php?Submit=Search&empgroup1=$empgroup1&empstatus1=$empstatus1&empbranchid1=$empbranchid1&page=$i\"><strong>$i</strong></a>";
            } 
            echo " | "; 
            if ($page == $pager->numPages) // this is the last page - there is no next page 
            echo " Next"; 
            else            // not the last page, link to the next page 
            echo "<a href=\"frmemployees.php?Submit=Search&empgroup1=$empgroup1&empstatus1=$empstatus1&empbranchid1=$empbranchid1&page=" . ($page + 1) . "\"> Next</a>";
            
            echo " | ";
            echo "<a href=\"frmemployees.php?Submit=Search&empgroup1=$empgroup1&empstatus1=$empstatus1&empbranchid1=$empbranchid1&page=$pager->numPages\"><strong>Last</strong></a>";
            
        ?>
            </span> 
            </td>
        </tr>
            <?php } ?>
        </table>
        </td>
    </tr>
    </table>
    </td>
</tr>
<tr>
    <td height="10" >
    <table width="750" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php print"$tablebordercolor"; ?>">
    <tr>
        <td></td>
    </tr>
    </table>
    </td>
</tr>
</table>
<?php } ?>
</form>
</body>
</html>   
