<?php
include"../../session.php";
include"../../functions/fnstudent.php";
include"../../functions/fn.php";
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="../../css/style.css" type=text/css rel=stylesheet>
<style type="text/css">
style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style7 {color: #000000}
.style18 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; color: #000000; }
a:hover {
	color: #333333;
}
a:link {
	color: #333333;
}
.style32 {color: #000000; font-size: 11px; font-family: Verdana, Arial, Helvetica, sans-serif; }
a:visited {
	color: #333333;
}
a:active {
	color: #333333;
}
.even {
	background:	#eee;
}

.odd {

}
.style39 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
</style>
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
<!--
var popup_detailsWindow=null;
function popup_details(mypage,myname,w,h,pos,infocus){

if (pos == 'random')
{LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
else
{LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
settings='width='+ w + ',height='+ h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';popup_detailsWindow=window.open('',myname,settings);
if(infocus=='front'){popup_detailsWindow.focus();popup_detailsWindow.location=mypage;}
if(infocus=='back'){popup_detailsWindow.blur();popup_detailsWindow.location=mypage;popup_detailsWindow.blur();}

}
// -->
</script>
<SCRIPT language=JavaScript>
function Form1_Validator(theForm)
{

   if (theForm.grantno1.value == "")
  {
    alert("You must enter Grant No .");
  theForm.grantno1.focus();
   return (false);
  }
}

</SCRIPT><script type="text/javascript" src="../../common/sortabletable.js"></script>
</head> <body text="#000066" leftmargin="0" topmargin="0">

  <table width="773" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="773">
	<form action="frmemployees.php" method="post" name="frmstudentlist" id="frmstudentlist">
  <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
 <?php
   $Today = date("Y-m-d");
   
   if(isset($_POST["Submit"]))
  {
    $Search=$_POST["Submit"];
  }
  elseif(isset($_GET["Submit"]))
  {
    $Search=$_GET["Submit"];
  }
  else
  {
    $Search="";
  }

  
  if(isset($_POST["grantno"])){  $grantno = trim($_POST["grantno"]);  }  
elseif(isset($_GET["grantno"])) {  $grantno = trim($_GET["grantno"]); }  
else  {  $grantno = "";   }
  if(isset($_POST["studentno"])){  $studentno = trim($_POST["studentno"]);  }  
elseif(isset($_GET["studentno"])) {  $studentno = trim($_GET["studentno"]); }  
else  {  $studentno = "";   }
 if(isset($_POST["studname"])){  $studname = trim($_POST["studname"]);  }  
elseif(isset($_GET["studname"])) {  $studname = trim($_GET["studname"]); }  
else  {  $studname = "";   }
 if(isset($_POST["studnricpassportno"])){  $studnricpassportno = trim($_POST["studnricpassportno"]);  }  
elseif(isset($_GET["studnricpassportno"])) {  $studnricpassportno = trim($_GET["studnricpassportno"]); }  
else  {  $studnricpassportno = "";   }
 if(isset($_POST["programid"])){  $programid = trim($_POST["programid"]);  }  
elseif(isset($_GET["programid"])) {  $programid = trim($_GET["programid"]); }  
else  {  $programid = "";   }

if($Search == "ListAll"){
$studentno="";
$studname="";
$studnricpassportno="";
$grantno="";
$programid = ""; 
}

$collegecode = $_SESSION["empcenterid"];
$userid = $_SESSION["empusername"];

?>

    <tr> 
      <td width="703" height="74">
	<FIELDSET style="border:1px solid #cccccc; width:750;">
      <LEGEND class="style7"  ><strong> student </strong></LEGEND>  
<table width="740" border="0" align="center" cellpadding="0" cellspacing="0">
           <tr align="left" valign="middle">
             <td width="66" height="25"><div align="right"><span class="style7">L<font size="2" face="Verdana, Arial, Helvetica, sans-serif">evel </font></span></div></td>
                 <td width="14" height="25"><div align="center"><strong>:</strong></div></td>
                 <td width="202" height="25"><div align="left"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                   <?php
					print selectfield("empgroup",$rst1["empgroup"],150,"tblemplevel","empgroupid","empgroupName");
					?>
                 </font></strong>
</div></td>
                 <td width="49" height="25"><span class="style7"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">status</font></span></td>
                 <td width="158"><?php 
	  
	  print selectfield("empstatus",$rst1["empstatus"],"130","tblemployeestatus","empstatusid","empstatusname"); 
	  
	  ?></td>
                 <td width="214">&nbsp;</td>
           </tr>
				<tr align="left" valign="middle">
				  <td height="25" align="right"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Center</font></td> 
                  <td height="25" align="right"><div align="center"><strong>:</strong></div></td>
                  <td height="25" colspan="3" align="right"><div align="left"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  
                      <?php
					print selectfield("empcenterid",$rst1["empcenterid"],200,"tblcollege","collegeid","collegeName");
					?>
</font></strong></div>                    <div align="right"><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
				      </font><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></font></font></font></font></font></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> </font></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif">

                  </font></font></font></div><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></font></font></font></font></font></font></font></font></font></td>
                  <td height="25" align="right"><font color="#000000"><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
                  <input type="Submit" name="Submit" value="Search" class="navButton">
&nbsp; </font><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> </font><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> </font><font color="#000000"><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
<input type="Reset" name="Reset" value="Clear">
</font><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> </font></font></font></font></font></font></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></font></font></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> </font></font></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> </font><font color="#000000"><font color="#000000"><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> </font></font></font></font><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> &nbsp;
<input type="Submit" name="Submit" value="ListAll" class="navButton">
</font></font></font></font></font></font></font></font></font></font></td>
				</tr>
        </table>
       </FIELDSET> 
      </td>
    </tr> </table>
</form	   
  ><?php
if($Search == "Search"){

	$student  = clsstudent::studentsearch1(4,$studentno,$studname,$studnricpassportno,$grantno,$programid,$collegecode); 
    $searchStmt = $student->searchStmt ;
	$ExecQuery  = ExecQuery::ExecFirstQuery($searchStmt); 
    $result1 = $ExecQuery->result1 ;
	$total = $ExecQuery->total ;
}
elseif($Search == "ListAll"){
$studentno="";
$studname="";
$studnricpassportno="";
$grantno="";
	$student  = clsstudent::studentsearch1(4,$studentno,$studname,$studnricpassportno,$grantno,$programid,$collegecode); 
    $searchStmt = $student->searchStmt ;
	$ExecQuery  = ExecQuery::ExecFirstQuery($searchStmt); 
    $result1 = $ExecQuery->result1 ;
	$total = $ExecQuery->total ;
}
else
{
$total = "" ;
}
 ?> 	
    <table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php print"$tablebordercolor"; ?>">
         <tr >
       <td height="20" class="bodybold2" ><span class="style39">&nbsp;<strong> Record(s) :&nbsp; <?php print $total; ?> </strong></span></td>
     </tr>
<tr>
       <td><table width="749" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr align="center">
           <td width="769"><table width="100%" border="0" cellpadding="0" cellspacing="0">

               <tr>
                 <td><table width="725" height="21" border="0" cellpadding="0" cellspacing="0" >
                     <tr valign="middle" background="<?php print"../../admission/$tablerowbg"; ?>" >
                        <td width="50"><div align="center" class="style18">
                         <input name="Button" type="button" style='width:50;height:20'  value="Action" >
                         </div></td><td width="300"><div align="center" class="style18">
                         </div>                           <div align="center" class="style18">
                           <input type="button" name="Button" value="Employee Name" style='width:300;height:20'  onclick="st.sort(2)" >
                           </div></td>
						 
                       <td width="160" align="left" ><div align="left" class="style18">
                         <input type="button" name="Button" value="Center" style='width:160;height:20' onClick="st.sort(4)"  >
                       </div></td>
                       <td width="110" align="left" ><div align="left" class="style18">
                         <input type="button" name="Button" value="level" style='width:110;height:20' onClick="st.sort(5)"  >
                       </div></td>
                        <td width="100" align="left" ><div align="center" class="style18">
                           <div align="left">
                             <input type="button" name="Button" value="status" style='width:100;height:20'  onclick="st.sort(6)"   >
                           </div>
                       </div></td>
                     </tr>
                   </table>

       <DIV id="Smartlayer"  
								style='
								visibility: visible; 
								border: solid 0px #3D5054; 
								left:0px;
								width:745px;
								height:250px; 
								overflow-x: hidden;
								overflow-y: scroll;'>               
                     <table width="725" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC"  class="sort-table" id="table1" >
				<tbody>
					 <?php
 if($Search != ""){  
$rowoutcolor = $tablebordercolor ;
$rowcolor = "white";
$color1 = "even" ; 
$color2 = "odd" ;
$row_count = 0;

while($row = $fetcharray($result1))
{
$row_color = ($row_count % 2) ? $color1 : $color2;	

$studentno1 = $row["studentno"];
	  // print"<tr bgcolor=\"$row_color\" > ";
   //print"CustomerView1.php?Quotationid=$Quotationid&Submit=Search&CustName=$CustName&CustCity=$CustCity&CustState=$CustState";
	 ?>

                                                   
                       <tr class="<?php print $row_color; ?>" onMouseOver="this.bgColor='<?php print $rowoutcolor; ?>'" onMouseOut="this.bgColor='<?php print $rowcolor; ?>'" >
                                           <td  width="25" align="center"><a href= "javascript:popup_details('<?php 
	  print"frmprogram.php?programid=$programid&Action=2";?>','programDetails','500','500','center','front');" >
	  <strong><img src="../../images/edit20n.gif" alt="Update : <?php print $row["programcode"];?>" width="20" height="20" border="0"></strong> </a></td>
                         <td  width="25" align="center">
							   <div align="center"> <a href= "javascript:popup_details('<?php 
	  print"frmprogram.php?programid=$programid&Action=3";?>','programDetails','500','500','center','front');" >
	  <strong><img src="../../images/view20.gif" alt="View : <?php print $row["programcode"];?>" width="20" height="20" border="0"></strong> </a> </div></td>
           
                        <td width="300" align="center" valign="middle"><span class="style32"> 
                         </span><span class="style32"> <?php print $row["empname"];?></span></td>
                      <td width="160" align="left" valign="middle"><span class="style32"><?php print $row["collegeName"];?></span></td>
                         <td width="110" align="left" valign="middle"><span class="style32"><?php print $row["empgroupName"];?></span></td>
                         <td width="100" align="left" valign="middle"><span class="style32"><strong>&nbsp;</strong><?php print $row["empstatus"];  ?> </span></td>
                       </tr>
                       
                      
                       <?php 
				 $row_count++;
				  } ?>
                 </tbody></table>
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
	["","Number", "CaseInsensitiveString", "String", "String", "String", "String"]);

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
       </DIV></td>
               </tr>
           </table></td>
         </tr>
     
       
     
         
       </table></td>
    </tr></table>
   <?php }

	?>
     </td>
    </tr>

  </table>
  
</body>
</html>   
