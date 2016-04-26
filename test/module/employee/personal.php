<?php
include"../../session.php";
include"../../functions/fn.php";

$username = $_SESSION["empusername"];
  $empcenterid=$_SESSION["empcenterid"];



?><html>
<head>
<title>Corporate Training Quotation System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 00px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #003366;
	font-weight: bold;
}
.style2 {color: #000000}
.style3 {font-weight: bold}
.style4 {color: #333333}
.style8 {color: #FF0000; font-weight: bold; font-size: 16px; }
-->
</style>
</head>

<body>


<table width="100%" height="205" border="0" align="center" cellpadding="0" cellspacing="0">

	    <tr>
      <td>&nbsp;
	  
              <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                <?php if($_SESSION['emplevel']=="2"){ ?>
				<tr>
                  <td height="35"><div align="center"><strong><a href="../../help/casv2help.chm" class="style4"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" ><span class="style8"><font face="Verdana, Arial, Helvetica, sans-serif">**  Download Help By click this Link ** </font></span></font></a></strong></div></td>
                </tr>
               <tr>
                 <td height="35"><div align="center"><strong><!--<a href="../help/casv2help_attc.chm" class="style4"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" ><span class="style8"><font face="Verdana, Arial, Helvetica, sans-serif">** Download Attendance Help By click this Link ** </font></span></font></a>--></strong></div></td>
                </tr>
                <?php  }
				else
				{
				 ?><tr>
                  <td height="35"><div align="center"><strong><!--<a href="../help/casv2help_attl.chm" class="style4"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" ><span class="style8"><font face="Verdana, Arial, Helvetica, sans-serif">** Download Help By click this Link ** </font></span></font></a>--></strong></div></td>
                </tr>
                <?php  }
				
				 ?>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
    </tr>
  </table>
</body>
</html>
