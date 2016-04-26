<?php
	include "session.php";
	include "functions/fn.php";
?>
<html>
<head>	
<title>Assessment</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="hmenu/src/hmenu.js"></script>
<link href="css/new_style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="hmenu/src/skin-xp-apps.css" title="Yp" />
<style type="text/css">
	body {
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
		overflow:hidden;
	}
	.style1 {
		font-size: 10px;
		color: #5B5B5B;
	}
	.style_link {
		font-size: 8px;
		color: #5B5B5B;
	}
	.downarrow { background: url("hmenu/icons/downarrow.gif") no-repeat 100% 100%; padding-right: 11px; display: block; font-size: 12px;}
	.natural { padding-right: 11px; display: block; font-size: 12px; }
	td.hover .downarrow { background-image: url("hmenu/icons/downarrow-hover.gif"); }
	td.active .downarrow { background-image: url("hmenu/icons/uparrow.gif"); }
	.style7 { font-size: 8px }
	a:link {
		color: #330066;
		text-decoration: none;
	}
	a:visited {
		color: #330066;
		text-decoration: none;
	}
	a:hover {
		color: #330066;
		text-decoration: underline;
	}
	a:active {
		color: #330066;
		text-decoration: none;
	}
	.style11 { color: #000066 }
	.style12 { color: #450066 }
	.style13 { color: #000000 }
</style> 
<script type="text/javascript">
	var menu = null;
	function init() {
		menu = DynarchMenu.setup('menu');
	}
	
	var first_time = true;
	function initFrame(frame) {
		var win = frame.contentWindow || frame.window || frame;
		DynarchMenu.watchFrame(win);
		DynarchMenu.watchFrame(win.document);
	}
</script>
<!--<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>-->
</head><body onLoad="init()">
<TABLE width="100%" height="100%" border=0 cellPadding=0 cellSpacing=0 bordercolor="#ECECDF" bgcolor="#001C2F">
<tr>
    <td ></td>
    <td width="1000" height="11" ></td>
    <td ></td>
</tr>
<tr>
    <td width="9" align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">
	<TABLE width="1000" height="100%" border=0 style="border:groove" cellPadding=0 cellSpacing=0  bgcolor="#FFFFFF">
	<TBODY>
	<tr>
		<td valign="top">
        <TABLE width="100%" height="30" border=0 cellPadding=0 cellSpacing=0 bordercolor="#EEEEEE" bgcolor="#cccccc">
	    <tr>
        <td width="31" rowspan="2"><img src="images/frog.jpeg" width="31" height="35"> </td>
        <td height="17" bgcolor="#FFFFFF" class="page_title_black">&nbsp;&nbsp;Frog Management System</td>
    </tr>
     <tr>
    	<td height="1" colspan="2" bgcolor="#FF9900"></td>
    </tr>
		</TABLE>
		<table width="100%" cellpadding="0" cellspacing="0" bordercolor="#EEEEEE" bgcolor="#999999">
		<tr>
			<td bgcolor="#006AFE">
			<?php
				if (!empty($_SESSION['empusername'])) {
					include"functions/dbconnection.php";
                    $searchStmt = "SELECT tb_menu.*,tb_menu_grouppermission.enabled
								   FROM tb_menu INNER JOIN tb_menu_grouppermission ON tb_menu.id = tb_menu_grouppermission.menuid
								   WHERE tb_menu_grouppermission.groupid='" . $_SESSION['empgroup'] . "' order by tb_menu.sort";
					$result= mysqli_query($conn,$searchStmt );
					$lineno = 0;
					$arrParent = array();
					$arrChild = array();
					$idx = 5000;
					$idxChild = 1;
					while($rst2 = mysqli_fetch_array($result)) {
						$img = '';
						if(!empty($rst2['img']))
							$img = "<img src=\"" . $rst2['img'] . "\" width=\"20\" height=\"20\" alt=\"\" />";
							if($rst2['enabled'] == 1 && $rst2['parentid'] == '0') {
								if($rst2['description'] == 'Home' || $rst2['description'] == 'Logout') {
									if($rst2['url'] != "#")
										$arrParent[$rst2['id']] = "<li>$img<a href=\"" . $rst2['url'] . "\"><span class=\"natural\">" . $rst2['description'] . "</span></a>\n";
									else
										$arrParent[$rst2['id']] = "<li>$img<a><span class=\"downarrow\">" . $rst2['description'] . "</span></a>\n";
								} else {
									if($rst2['url'] != "#")
										$arrParent[$rst2['id']] = "<li>$img<a target=maincontent href=\"" . $rst2['url'] . "\">" . $rst2['description'] . "</a>\n";
									else
										$arrParent[$rst2['id']] = "<li>$img<a><span class=\"downarrow\">" . $rst2['description'] . "</span></a>\n";
								}
								$arrWidthParent[$rst2['id']] = $rst2['width'];		
								$idx++;	
							} elseif($rst2['enabled'] == '1' && $rst2['parentid'] != '0') {
								$tmpIdx = $rst2['parentid'] . "" . $idxChild;
								if($rst2['description'] == 'seperator') {
									$arrChild[$rst2['parentid']][$rst2['id']] = "<li itemType=\"separator\"></li>\n";
								} else {
									if($rst2['url'] != '#')
										$arrChild[$rst2['parentid']][$rst2['id']] = "<li>$img<a target=maincontent href=\"" . $rst2['url'] . "\"><span class=\"natural\">" . $rst2['description'] . "</span></a></li>\n";
									else
										$arrChild[$rst2['parentid']][$rst2['id']] = "<li>$img<a><span class=\"natural\">" .  $rst2['description'] . "</span></a></li>\n";
								}	
								$arrWidthChild[$rst2['id']] = $rst2['width'];		
								$idxChild++;
							}
					}
			?>
				<ul id="menu" style="visibility: hidden">
			<?php
					foreach($arrParent as $keyParent => $valueParent) {
						echo $valueParent ;
						if(array_key_exists($keyParent,$arrChild)) {
							echo "<ul>\n";
							foreach($arrChild[$keyParent] as $keyChild => $valueChild) {
								if(array_key_exists($keyChild,$arrChild)) {
									$valueChild = str_replace("</li>","",$valueChild);
									echo $valueChild;
									echo "<ul>\n";
									foreach($arrChild[$keyChild] as $keyChild2 => $valueChild2) {	
										$valueChild2 = str_replace("</li>","",$valueChild2);
										echo $valueChild2 . "\n";
									}
									echo "</ul>\n\n";
								}
								else
									echo $valueChild;
							}
							echo "</ul>\n\n";
						}
						echo "</li>\n";
					}
			?>
				</ul>          
			<?php 
				} else {
					print"<script>";
					print "window.location='index.php'";
					print "</script>";
				}
			?>
			</td>
        </tr>
        </table>
		<iframe onload="initFrame(this)" id="maincontent" src="module/frog/frmnew.php"  name="maincontent" align=center width=100% frameborder="0" height=88% scrolling="auto">
        </iframe>
        </td>
    </tr>
    <tr>
		<td valign="bottom"  height="2%">	

        </td>
	</tr>
	</TBODY>
	</TABLE>
    </td>
	<td width="16" align="center" valign="middle">&nbsp;</td>
</tr>
<tr>
    <td ></td>
    <td height="10" ></td>
    <td ></td>
</tr>
</TABLE>
</body>
</html>
