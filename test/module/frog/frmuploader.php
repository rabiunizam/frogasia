<?php
	include"../../session.php";
	include"../../functions/fnfrog.php";
	include "../../functions/fn.php";
	$pagename = "frmuploader";

 if(isset($_POST["frogid1"])) { $frogid = trim($_POST["frogid1"]); }
	elseif(isset($_GET["frogid1"])) { $frogid = trim($_GET["frogid1"]); }
	else { $frogid = ""; }
  $empbranch = $_SESSION["empbranchid"];
    $userid1 = $_SESSION["empusername"];

// http://www.tizag.com/phpT/fileupload.php
// Where the file is going to be placed 
$target_path = "../../photo/";

/* Add the original filename to our target path.  
Result is "uploads/filename.extension" */
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
$_FILES['uploadedfile']['tmp_name'];  


$target_path = "../../photo/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
{
	$UpdateStmtPhoto  = clsfrog::uploadphoto($frogid,$target_path,$userid1);
	$UpdateStmt = $UpdateStmtPhoto->UpdateStmt;
	//print $UpdateStmtPhoto;
	$ExecQuery5  = ExecQuery::ExecSecondQuery($UpdateStmt);
	
    $message = "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded";
    print"<script>";
	print "alert('$message');";
	print "window.location='frmuploadphoto.php?frogid1=$frogid'";
	print "</script>";
} 
else
{
    $message = "There was an error uploading the file, please try again!";
    print"<script>";
	print "alert('$message');";
	print "window.history.go(-1)";
	print "</script>";

}

?>
