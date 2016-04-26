<?php
	include"../../session.php";
	include"../../global.inc.php";
	include"../../functions/fnfrog.php";
	include"../../functions/fn.php";
	$pagename = "frmfrogs";
	
	$userid = $_SESSION["empusername"];
	$empgroup = $_SESSION["empgroup"];
	$employeeid = $_SESSION["employeeid"];
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../../css/new_style.css" type=text/css rel=stylesheet>
<script language="JavaScript" type="text/javascript" src="../../ajax/ajax_js.js"></script>
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
		settings='width='+ w + ',height='+ h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=yes';popup_detailsWindow=window.open('',myname,settings);
		if(infocus=='front') {
			popup_detailsWindow.focus();
			popup_detailsWindow.location=mypage;
		}
		if(infocus=='back'){
			popup_detailsWindow.blur();
			popup_detailsWindow.location=mypage;
			popup_detailsWindow.blur();
		}
	}
	function popup_details1(mypage,myname,w,h,pos,infocus){
		if (pos == 'random') {
			LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;
			TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;
		} else {
			LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;
		}
		settings='width='+ w + ',height='+ h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=yes,location=no,directories=no,status=no,menubar=yes,toolbar=yes,resizable=no';popup_detailsWindow=window.open('',myname,settings);
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
<SCRIPT language=JavaScript>
	function Form1_Validator(theForm) {
		if (theForm.intakecode1.value == "") {
			alert("You must enter Grant No .");
			theForm.intakecode1.focus();
			return (false);
		}
	}
</SCRIPT>
<script type="text/javascript" src="../common/sortabletable.js"></script>
</head> 
<body text="#000066" leftmargin="0" topmargin="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="5%" rowspan="2"><img src="../../images/search.JPG"> </td>
    <td height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; Search Frog </td>
</tr>
<tr>
	<td height="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;Search For Frog Using Specified Criteria </td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FF9900"></td>
</tr>
<tr>
	<td height="5" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
</tr>
</table>
<form action="frmfrogs.php" method="post" name="form1" id="form1">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
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
	
	if(isset($_POST["frogname"])) { $frogname = trim($_POST["frogname"]); }
	elseif(isset($_GET["frogname"])) { $frogname = trim($_GET["frogname"]); }
	else { $frogname = ""; }
	
	if(isset($_POST["frognamesc"])) { $frognamesc = trim($_POST["frognamesc"]); }
	elseif(isset($_GET["frognamesc"])) { $frognamesc = trim($_GET["frognamesc"]); }
	else { $frognamesc = ""; }
	
	if(isset($_POST["frogfamilyid"]) ){ $frogfamilyid = trim($_POST["frogfamilyid"]); }
	elseif(isset($_GET["frogfamilyid"])) { $frogfamilyid = trim($_GET["frogfamilyid"]); }
	else { $frogfamilyid = ""; }
	
	if(isset($_POST["frogorderid"])) { $frogorderid = trim($_POST["frogorderid"]); }
	elseif(isset($_GET["frogorderid"])) { $frogorderid = trim($_GET["frogorderid"]); }
	else { $frogorderid = ""; }
	
	if(isset($_POST["froggenus"])) { $froggenus = trim($_POST["froggenus"]); }
	elseif(isset($_GET["froggenus"])) { $froggenus = trim($_GET["froggenus"]); }
	else { $froggenus = ""; }
	
	if(isset($_POST["frogepithet"])) { $frogepithet = trim($_POST["frogepithet"]); }
	elseif(isset($_GET["frogepithet"])) { $frogepithet = trim($_GET["frogepithet"]); }
	else { $frogepithet = ""; }
	
	if(isset($_POST["frogsubgenus"])) { $frogsubgenus = trim($_POST["frogsubgenus"]); }
	elseif(isset($_GET["frogsubgenus"])) { $frogsubgenus = trim($_GET["frogsubgenus"]); }
	else { $frogsubgenus = ""; }
	
	if(isset($_POST["frogsubfamily"])) { $frogsubfamily = trim($_POST["frogsubfamily"]); }
	elseif(isset($_GET["frogsubfamily"])) { $frogsubfamily = trim($_GET["frogsubfamily"]); }
	else { $frogsubfamily = ""; }
	

	$total='';

	?>
<tr> 
    <td width="100%" height="74">
    <FIELDSET style="border:1px solid #cccccc; width:90%;">
    <LEGEND class="page_title_black">Search Criteria</LEGEND>  
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr align="left" valign="middle">
        <td width="15%" height="25" valign="middle" class="label_text">Frog Name *</td>
		<td width="35%"><input name="frogname" type="text" class="textinput" id="frogname" size="30" style="text-transform:uppercase"></td>
			<td height="15%" class="label_text">Scientific Name </td>
		<td height="35%">
        	<input name="frognamesc" class="textinput" type="text" id="frognamesc" value="" size="30" style="text-transform:uppercase">
        </td>
		<td width="4%">&nbsp;</td>

		<td>&nbsp;</td>
	</tr>
        <tr align="left" valign="middle" class="label_text">
            <td height="25" class="label_text">Family *</td>
            <td height="25"><div align="left"><?php print selectfield("frogfamilyid","","180","tblfamily","familyid","familyname"); ?></div></td>
            <td height="25" class="label_text">Order *</td>
            <td height="25"><?php  print selectfield("frogorderid","","150","tblorder","orderid","ordername"); ?></td>
        </tr>
         <tr align="left" valign="middle">
        <td height="25" valign="middle" class="label_text">Genus</td>
		<td><input name="froggenus" type="text" class="textinput" id="froggenus" size="30" style="text-transform:uppercase"></td>
        <td class="label_text">Specific Epithet</td>
		<td><input name="frogepithet" class="textinput" type="text" id="frogepithet" value="" size="30" style="text-transform:uppercase">
        </td>
        </tr>
        <tr align="left" valign="middle">
        <td height="25" valign="middle" class="label_text">Clade/Subgenus</td>
		<td><input name="frogsubgenus" type="text" class="textinput" id="frogsubgenus" size="30" style="text-transform:uppercase"></td>
        <td class="label_text">Subfamily</td>
		<td><input name="frogsubfamily" class="textinput" type="text" id="frogsubfamily" value="" size="30" style="text-transform:uppercase">
        </td>
        </tr>
   <tr align="left" valign="middle">
     	<td height="25" class="label_text"></td>
        <td height="25" >    </td>
    	<td height="25" colspan="2" align="right">
    		<input type="Submit" name="Submit" value="Search" class="text_button">
    		<input name="Reset" type="Reset" class="text_button" value="Clear">&nbsp;
    	</td>
    </tr>
    </table>
	</FIELDSET> 
	</td>
</tr> 
</table>
</form>
<?php
	if($Search == "Search"){
		$limit = 10;
		$frogsearch  = clsfrog::frogsearch1('1',$frogname,$frogfamilyid,$frogorderid,$froggenus,$frogepithet,
                           $frogsubgenus,$frogsubfamily,"");
        $searchStmt = $frogsearch->searchStmt ;
		//echo $searchStmt;
		$ExecQuery  = ExecQuery::ExecFirstQuery($searchStmt); 
		$result1 = $ExecQuery->result1 ;
		$total = $ExecQuery->total ;
		$pager  = Pager::getPagerData($total, $limit, $page); 
		$offset = $pager->offset; 
		$limit  = $pager->limit; 
		$page   = $pager->page; 
		if($noofrows($result1) != 0 ) {	
			$frog  = clsfrog::frogsearch2($offset,$limit,$searchStmt);
			$searchStmt = $frog->searchStmt ;
		}
		$ExecQuery  = ExecQuery::ExecSecondQuery($searchStmt); 
		$result = $ExecQuery->result ;
	}
?> 	
<form action="frmstudentaction1.php" method="post" name="frmstudentlist2" id="frmstudentlist2" onSubmit="return Form1_Validator(this)">
<table width="960" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php print"$tablebordercolor"; ?>">
<tr>
	<td width="526" height="20" class="bodybold2" >
    	<span class="style39">&nbsp;<strong class="page_title_black"> Record(s) :&nbsp; <?php print $total; ?> </strong></span>
    </td>
</tr>
</table>         
<table width="960" height="21" border="0" align="center" cellpadding="0" cellspacing="0">
<tr valign="middle" background="<?php print"$tablerowbg"; ?>" >
	<td width="30">
    	<div align="left" class="style18">
		<input name="Button" type="button" class="text_button" style='width:30;height:20'  onclick="st.sort(0)" value="No" >
    	</div>
    </td>
    <td width="150">
    	<div align="left" class="style18">
        <input name="Button" type="button" class="text_button" style='width:150;height:20'  onclick="st.sort(0)" value="Frog Name" >
        </div>
    </td>
    <td width="150">
    	<div align="left" class="style18">
        <input name="Button" type="button" class="text_button" style='width:150;height:20'  onclick="st.sort(1)" value="Scientific Name"   >
        </div>
    </td>
    
    <td width="120">
        <div align="left" class="style18">
        <input name="Button" type="button" class="text_button" style='width:120;height:20' onClick="st.sort(2)" value="Family"  >
        </div>
    </td>
    <td width="200">
        <div align="left" class="style18">
        <input name="Button" type="button" class="text_button" style='width:200;height:20'  onclick="st.sort(5)" value="Order" >
        </div>
    </td>
    <td width="90">
        <div align="left" class="style18">
        <input name="Button" type="button" class="text_button" style='width:90;height:20' onClick="st.sort(3)" value="Gender"  >
        </div>
    </td> 
    <td width="200">
        <div align="left" class="style18">
        <input name="Button" type="button" class="text_button" style='width:200;height:20' onClick="st.sort(3)" value="Action"  >
        </div>
    </td>
</tr>
<tr valign="middle" background="<?php print"$tablerowbg"; ?>" >
	<td colspan="7">
    <DIV id="Smartlayer"  
      style='visibility: visible; 
    		 border: solid 0px #3D5054; 
             left:0px;
             width:960px;
             height:220px; 
             overflow-x: hidden;
             overflow-y: scroll;'>               
    <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC"  class="sort-table" id="table1" >
    <tbody>
	<?php
    	if($Search != "") {  
			$rowoutcolor = $tablebordercolor ;
			$rowcolor = "white";
			$color1 = "even" ; 
			$color2 = "odd" ;
			$row_count = 0;
			$page_no = $page;
			if ($page_no != "")
				$row_count = $row_count + 10*($page_no - 1);
				while($row = $fetcharray($result)) {
   					$row_color = ($row_count % 2) ? $color1 : $color2;	
                 $frogid =  $row["frogid"];
			   ?>


    <tr class="<?php print $row_color; ?>" onMouseOver="this.bgColor='<?php print $rowoutcolor; ?>'" onMouseOut="this.bgColor='<?php print $rowcolor; ?>'">
		<td width="30" height="20" align="center" valign="middle" class="news_date"><?php print $row_count+1; ?></td>
    	<td width="150" align="center" style="text-transform:uppercase" valign="middle" class="news_date"><?php print $row["frogname"]; ?></td>
   		<td width="150" align="center" style="text-transform:uppercase" valign="middle" class="news_date"><?php print $row["frognamesc"]; ?></td>
    	<td width="120" align="center" valign="middle" class="news_date"><?php print $row["familyname"]; ?></td>
    	<td width="200" align="center" valign="middle" class="news_date"><?php print $row["ordername"]; ?></td>
    	<td width="90" align="center" valign="middle" class="news_date"><?php print $row["gendername"]; ?></td>
    	<td width="200" align="center" valign="middle" class="news_date">
        	<a href= "javascript:popup_details('<?php print"frmview.php?frogid1=$frogid";?>','FrogDetails','980','350','center','front');" style="text-decoration:none">
            	<img src="../../images/pview20.jpg" border="0" width="15" height="15" title="View Frog">
            </a> 
            <a href= "javascript:popup_details('<?php print"frmupdate.php?frogid1=$frogid";?>','FrogDetails','980','400','center','front');" style="text-decoration:none">
            	<img src="../../images/file_edit.png" border="0" width="15" height="15" title="Edit Frog">
            </a>
             <a href= "javascript:popup_details('<?php print"frmuploadphoto.php?frogid1=$frogid";?>','FrogDetails','980','400','center','front');" >
             <img src="../../images/image-up-icon.png" border="0" width="15" height="15" title="Upload Photo"></a>
    	</td>
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
		
		var st = new SortableTable(document.getElementByid("table1"),["String","String","String", "String","String" , "Number", "String"]);
		
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
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC"  class="sort-table" id="table1" >
<?php
	if ($noofrows($result1) != 0 ) {
?>
<tr class="page_title_black">
	<td colspan="2" align="center" bgcolor="#728AD3">
    <span class="style29">
	<?php
		// output paging system (could also do it before we output the page content) 
		echo "<a href=\"frmfrogs.php?Submit=Search&frogname=$frogname&frognamesc=$frognamesc&frogfamilyid=$frogfamilyid
		&frogorderid=$frogorderid&froggenus=$froggenus&frogepithet=$frogepithet&frogsubgenus=$frogsubgenus&page=1\"><strong>First</strong></a>";
		echo " | ";
		if ($page == 1) // this is the first page - there is no previous page 
		echo "Previous"; 
		else            // not the first page, link to the previous page 
  		echo "<a href=\"frmfrogs.php?Submit=Search&frogname=$frogname&frognamesc=$frognamesc&frogfamilyid=$frogfamilyid
		&frogorderid=$frogorderid&froggenus=$froggenus&frogepithet=$frogepithet&frogsubgenus=$frogsubgenus&page=" . ($page - 1) . "\">Previous</a>";

		$new1 = ($page-5) ;
		$new2 = ($page+5) ;
		if($new1<=0){ $prev1 = 1; }
		else { $prev1 = $new1; }
		
		if($new2 >= $pager->numPages){ $prev2 = $pager->numPages;}
		else { $prev2 = $new2; }
		
		for ($i = $prev1; $i <= $prev2; $i++) { 
		echo " | "; 
		if ($i == $pager->page) 
		echo "$i"; 
		else 
		echo "<a href=\"frmfrogs.php?Submit=Search&frogname=$frogname&frognamesc=$frognamesc&frogfamilyid=$frogfamilyid
		&frogorderid=$frogorderid&froggenus=$froggenus&frogepithet=$frogepithet&frogsubgenus=$frogsubgenus&page=$i\"><strong>$i</strong></a>";
		} 
		echo " | "; 
		if ($page == $pager->numPages) // this is the last page - there is no next page 
		echo " Next"; 
		else            // not the last page, link to the next page 
		echo "<a href=\"frmfrogs.php?Submit=Search&frogname=$frogname&frognamesc=$frognamesc&frogfamilyid=$frogfamilyid
		&frogorderid=$frogorderid&froggenus=$froggenus&frogepithet=$frogepithet&frogsubgenus=$frogsubgenus&page=" . ($page + 1) . "\"> Next</a>";
		
		echo " | ";
		echo "<a href=\"frmfrogs.php?Submit=Search&frogname=$frogname&frognamesc=$frognamesc&frogfamilyid=$frogfamilyid
		&frogorderid=$frogorderid&froggenus=$froggenus&frogepithet=$frogepithet&frogsubgenus=$frogsubgenus&page=$pager->numPages\"><strong>Last</strong></a>";
    ?>
	</span> 
    </td>
</tr>
</table>
<?php 
	} 
}
?>
</form>
</body>
</html>   
