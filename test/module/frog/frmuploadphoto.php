<?php
	include"../../session.php";
	include"../../functions/fnfrog.php";
	include "../../functions/fn.php";
	$pagename = "frmupload";
?><html>
<head>
<title>Upload Photo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../css/new_style.css" rel="stylesheet" type="text/css">
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


var enabler = "";


function NewDetails(form) {
form.enabler.value = form.studentno.value;
enabler = form.enabler.value;
window.location = 'frmstudent.php?studentno=' + enabler
}

function NewDetails2(form) {
form.enabler.value = form.studentno.value;
enabler = form.enabler.value;
window.location = 'frmstudentview2.php?Approve=Y&studentno=' + enabler
}
//  End -->
</script>
<script type="text/javascript" src="../common/sortabletable.js"></script>
<SCRIPT language=JavaScript>
function Form1_Validator(theForm)
{

  var alertsay = ""; // define for long lines

 // check if no drop down selected
  if (theForm.studentno.value == "")
  {
    alert("You cannot proceed any action without studentno.");
 return (false);
  }
 

}

</SCRIPT>
</head>
<body>
<?php
   $empbranch = $_SESSION["empbranchid"];
    $userid1 = $_SESSION["empusername"];

if(isset($_GET["page"])){  $page = trim($_GET["page"]);  }  else  {  $page = 1;   }
if(isset($_GET["offset"])) {  $offset = $_GET["offset"]; } else {  $offset = "";   } 

	if(isset($_POST["frogid1"])) { $frogid1 = trim($_POST["frogid1"]); }
	elseif(isset($_GET["frogid1"])) { $frogid1 = trim($_GET["frogid1"]); }
	else { $frogid1 = ""; }

		$frogsearch  = clsfrog::frogsearch1('2',"","","","","","","",$frogid1);
        $searchStmt = $frogsearch->searchStmt ;
	//print $searchStmt;
	$ExecQuery  = ExecQuery::ExecSecondQuery($searchStmt); 
	$result = $ExecQuery->result ;
	$row = $fetcharray($result);

      $frogid = $row["frogid"];
      $frogname = $row["frogname"];
      $frognamesc = $row["frognamesc"];
      $familyname = $row["familyname"];
      $frogphoto = $row["frogphotoaddress"];

 

?> 
<form enctype="multipart/form-data" action="frmuploader.php" method="POST">
<input name="frogid1" type="hidden" class="textinput" id="frogid1" value="<?php print $frogid; ?>" size="20" maxlength="15" readonly="">
	<table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
		<tr>
				<td width="5%" rowspan="2"><img src="../../images/frog.jpeg" width="31" height="35"></td>
	<td width="657"  height="17"  bgcolor="#FFFFFF" class="page_title_black">&nbsp;&raquo;&nbsp; Upload Photo </td>
		</tr>
		<tr>
			<td height="5" colspan="5" bgcolor="#FFFFFF" class="label_text">&nbsp;&nbsp;Upload Frog's photo </td>
		</tr>
    <tr>
    	<td height="5" colspan="2" bgcolor="#FF9900"></td>
    </tr>
    <tr>
    	<td height="5" colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
		<tr>
			<td colspan="2">   <FIELDSET style="border:1px solid #cccccc; width:750;">
			<LEGEND class="page_title_black" ><strong> Frog Details </strong></LEGEND>
				<table width="616" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr align="left" valign="middle">
						<td width="134" height="25" valign="middle" class="label_text">Frog Name </td>
						<td width="482" height="25"><input name="frogname" type="text" style="text-transform:uppercase"
                        class="textinput" id="frogname"
                        value="<?php print $frogname; ?>" size="40" maxlength="200" readonly="">
						<td rowspan="3"><div align="center">&nbsp;<img src="<?php if($frogphoto) {print $frogphoto;} else
						{ print '../photo/default.gif';} ?>" name="studPhoto" border="1" width="70" height="100"></div></td>
					</tr>
					<tr align="left" valign="middle">
						<td width="134" height="25" valign="middle" class="label_text">Scientific Name</td>
						<td height="27">          
						<input name="studname" type="text" class="textinput" id="studname" style="text-transform:uppercase" 
                        value="<?php print $frognamesc; ?>"
                        size="40" readonly="">
						</td>
					</tr>
					<tr align="left" valign="middle">
						<td height="25" valign="middle" class="label_text">Family</td>
						<td height="27"><input name="studnricpassportno" type="text" class="textinput"  id="studnricpassportno"
                        value="<?php print $familyname; ?>" size="40" readonly=""></td>
					</tr>
				</table>
			</FIELDSET>
			<br>
			<FIELDSET style="border:1px solid #cccccc; width:750; ">
			<LEGEND class="page_title_black" > Upload Photo </LEGEND>
				<table width="616" height="60" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr align="left" valign="middle">
						<td height="27" colspan="2"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif" 
                    	class="label_text">Choose a file to upload: </font></td>
					</tr>
					<tr align="left" valign="middle">
						<td height="30" colspan="2" align="center"> <input name="uploadedfile" type="file" class="textinput" size="60"></td>
					</tr>
				</table>
			</FIELDSET>  <br>
			</td>
		</tr>
		<tr>
			<td height="30" colspan="2"><div align="right"><input name="Submit" type="submit" class="text_button" value="Upload" >&nbsp;
            <input name="Reset" type="Reset" class="text_button" value="Clear">&nbsp; &nbsp;</div></td>
		</tr>
	</table>
</form>
</body>
</html>
