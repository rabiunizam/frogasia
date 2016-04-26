<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0037)http://www.4templates.com/aff/signup/ -->
<HTML>
<HEAD>
<TITLE>Assessment</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/new_style.css" rel="stylesheet" type="text/css">
<style type="text/css">
    INPUT {
        BORDER-BOTTOM: 0pt outset; 
        BORDER-LEFT: 0pt outset; 
        BORDER-RIGHT: 0pt outset; 
        BORDER-TOP: 0pt outset; 
        background-color:#CCCCCC; 
        FONT-FAMILY: verdana,arial; 
        FONT-SIZE: 10pt; 
    }
    a {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 11px;
    }
    body {
        background-color: #ece9d8;
    }
    .style47 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 12px;
    }
    .style4 {	
        font-size: 14pt;
        color: white;
    }
    .style50 {	font-size: 12px	}
    .style51 {	color: #666666	}
    .style65 {
        color: #444444;
        font-size: 16;
    }
    .style66 {	color: #FF0000	}
</style>
<!--<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>-->

<SCRIPT language=JavaScript>
    function Form1_Validator(theForm) {
        var alertsay = ""; 
        
        if (theForm.UserName.value == "") {
            alert("UserName Cannot be blank");
            theForm.UserName.focus();
            return (false);
        }
    
        // allow ONLY alphanumeric keys, no symbols or punctuation
        // this can be altered for any "checkOK" string you desire
        var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-@_.";
        var checkStr = theForm.UserName.value;
        var allValid = true;
        for (i = 0;  i < checkStr.length;  i++) {
            ch = checkStr.charAt(i);
            for (j = 0;  j < checkOK.length;  j++)
            if (ch == checkOK.charAt(j))
                break;
            if (j == checkOK.length) {
                allValid = false;
                break;
            }
        }
        if (!allValid) {
            alert("User Name Contains only \n \n ABCDEFGHIJKLMNOPQRSTUVWXYZ \n abcdefghijklmnopqrstuvwxyz \n 1234567890-@_. ");
            theForm.UserName.focus();
            return (false);
        }
        
        if (theForm.Password.value == "") {
            alert("Password  Cannot be blank");
            theForm.Password.focus();
            return (false);
        }
    
        // allow ONLY alphanumeric keys, no symbols or punctuation
        // this can be altered for any "checkOK" string you desire
        var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-@_.";
        var checkStr = theForm.Password.value;
        var allValid = true;
        for (i = 0;  i < checkStr.length;  i++) {
            ch = checkStr.charAt(i);
            for (j = 0;  j < checkOK.length;  j++)
            if (ch == checkOK.charAt(j))
                break;
            if (j == checkOK.length) {
                allValid = false;
                break;
            }
        }
        if (!allValid) {
            alert("Password Contains only \n \n ABCDEFGHIJKLMNOPQRSTUVWXYZ \n abcdefghijklmnopqrstuvwxyz \n 1234567890-@_. ");
            theForm.Password.focus();
            return (false);
        }
    }
</SCRIPT>
</HEAD>
<BODY leftMargin=0 topMargin=0 rightMargin=0 marginheight="0" marginwidth="0">
<table width="1000" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#518DC3">
<tr>
    <td>
    <table width="100%"  height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4F4F4">
    <tr>
    	<td valign="center">
		<table width="100%" height="100%" border=0 cellPadding=0 cellSpacing=0>
        <tbody>
        <tr>
            <td height="70">
         	</td>
        </tr>
        <tr>
			<td width="100%" valign="middle" bgcolor="#FFFFFF">
            <table width="1000" border=0 cellPadding=0 cellSpacing=0 bgcolor="#FFFFFF" >
			<tbody>
            <tr>
            	<td width="999"  bgcolor="#FFFFFF" valign="top" align="center">
				<table width="250" height="166" border=1 cellPadding=0 cellSpacing=0 bordercolor="#EEEEEE">
                <tbody>
                <tr>
					<td height="30" align="center" valign="bottom" background="images/subheader.gif" class="news_title">
                    	<span class="style65"><strong>User </strong><b>Login</b></span>
                    </td>
				</tr>
                <tr bgcolor="#df3b15">
                	<td bgcolor="#FFFFFF" width="100%" align="center">

                    <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#F3F3F3">
                    <tr>
						<td>
                        <form name="form1" method="post" action="login.php"  onsubmit="return Form1_Validator(this)">
                        <table width="100%" border=0 align="center" cellPadding=0 cellSpacing=0>
                        <tbody>
                        <tr>
                            <td height="15" align="center" class="small_title">
                            	<b>User Name :</b>&nbsp;<input name=UserName class="textinput" id="UserName" size=14 maxlength=50>
                            </td>
						</tr>
                        <tr>
                        	<td height="15" >&nbsp;&nbsp;&nbsp;&nbsp; </td>
                        </tr>
                        <tr>
                            <td height="15" align="center" class="small_title">
                            	<b>Password &nbsp;&nbsp;&nbsp;:</b>&nbsp;<input name=Password type=password class="textinput" id="Password" size=14 maxlength=50>
                            </td>
                        </tr>
                        <tr>
                        	<td height="10" colSpan=2></td>
                        </tr>
                        <tr>
                            <td height="30" colSpan=2>
                            	<div align="center">
                            	<input name="Submit" type="submit" class="page_title_black" value="Submit" alt="Submit">&nbsp;
                            	<input type="reset" name="Reset" value="Reset" class="page_title_black">
                            	</div>
                            </td>
                        </tr>
                        </tbody>
                        </table>
						</form>
                        </td>
                    </tr>
                    </table>
                    </td>
                </tr>
                </tbody>
                </table>
                </td>
				<td width="1" align="center" valign="top"  bgcolor="#FFFFFF"></td>
			</tr>
            <tr>
            	<td  bgcolor="#FFFFFF" valign="top" align="center">&nbsp;</td>
            </tr>
            <tr>
            	<td  bgcolor="#FFFFFF" valign="top" align="center">&nbsp;</td>
            </tr>
            </tbody>
            </table>
            </td>
        </tr>
        <tr>
        	<td valign="bottom">
             </td>
        </tr>
        </tbody>
        </table>
        </td>
    </tr>
    </table>
    </td>
</tr>
</table>
</BODY>
</HTML>
