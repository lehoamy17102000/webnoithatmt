<?php if(!session_id()); session_start(); ?>
<?php require("../config.php");
require("../common_start.php");
$errMsg='';

if (isset($_POST['btnLogin'])){
	$uid = $_POST['txtUid'];
	$pwd = $_POST['txtPwd'];
	$sql = "select * from tbl_user where uid='".$uid."' and pwd='".$pwd."' limit 1";
	if (mysql_num_rows(mysql_query($sql,$conn))>0) {
		$log = $uid;
		
		$_SESSION['log'] = $uid;
		echo "<script>window.location='./'</script>";
	}else{
		$errMsg="Tên đăng nhập / mật khẩu không đúng !";
	}
} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK href="../lib/cssAdmin.css" rel="stylesheet" type="text/css">
<title></title>
<script language="javascript" src="../lib/md5.js"></script>
<script language="javascript" src="../lib/javascript.lib.js"></script>
<script language="javascript" src="../lib/varAlert.vn.unicode.js"></script>
<script language="javascript">
function btnLogin_onClick(){
	if(test_empty(document.frmLogin.txtUid.value)){
		alert('Hãy nhập "tên đăng nhập" !');document.frmLogin.txtUid.focus();return false;
	}
	if(test_empty(document.frmLogin.txtPwd.value)){
		alert('Hãy nhập "mật khẩu" !');document.frmLogin.txtPwd.focus();return false;
	}
	document.frmLogin.txtPwd.value = hex_md5(document.frmLogin.txtPwd.value);
	return true;
}
</script>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="document.frmLogin.txtUid.focus();">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td valign="top">
<form method="post" name="frmLogin" style="padding-top:50px">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3" valign="middle" style="background-image:url(images/menu_top.jpg); height:67px" >&nbsp;</td>
    </tr>
    <tr>
      <td width="7" style="background-image:url(images/login_line_left.jpg)"></td>
      <td width="786"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="40" align="center"><?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br>&nbsp;</p>';}?></td>
        </tr>
        <tr>
          <td align="center"><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="7" height="7" style="background-image:url(images/login_top_left.jpg)"></td>
              <td width="486" height="7" style="background-image:url(images/login_line_top.jpg)"></td>
              <td width="7" height="7" align="left" style="background-image:url(images/login_top_right.jpg)"></td>
            </tr>
            <tr>
              <td style="background-image:url(images/login_line_left.jpg)"></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  
                  <tr align="left">
                    <td colspan="2" class="font_bule">shop MT </td>
                  </tr>
                  <tr align="left">
                    <td colspan="2" height="10">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="40%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" valign="top" class="font_login">Sử dụng tên người dùng và mật khẩu hợp lệ để truy cập vào Administrator </td>
                        </tr>
                        <tr>
                          <td height="10" align="left" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center"><img src="images/lock.jpg" width="84" height="126" /></td>
                        </tr>
                    </table></td>
                    <td width="60%" align="left" valign="top"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="7" height="7" style="background-image:url(images/login_top_left.jpg)"></td>
                          <td width="236" height="7" style="background-image:url(images/login_line_top.jpg)"></td>
                          <td width="7" height="7" align="left" style="background-image:url(images/login_top_right.jpg)"></td>
                        </tr>
                        <tr>
                          <td style="background-image:url(images/login_line_left.jpg)"></td>
                          <td><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
                              <tr>
                                <td class="font_xam">Username </td>
                                <td><input type="text" name="txtUid" size="20"></td>
                              </tr>
                              <tr>
                                <td valign="top" class="font_xam">Password</td>
                                <td valign="top"><input type="password" name="txtPwd" size="20"></td>
                              </tr>
                              <tr>
                                <td align="right" valign="top"><input name="rem" type="checkbox" id="rem" value="1" {checked} /></td>
                                <td valign="top" class="font_login">Lưu lại mật khẩu </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="btnLogin" id="button" value="Đăng nhập"  onClick="return btnLogin_onClick();"/></td>
                              </tr>
                          </table></td>
                          <td style="background-image:url(images/login_line_right.jpg)"></td>
                        </tr>
                        <tr>
                          <td height="7" style="background-image:url(images/login_bottom_left.jpg)"></td>
                          <td height="7" style="background-image:url(images/login_line_bottom.jpg)"></td>
                          <td height="7" style="background-image:url(images/login_bottom_right.jpg)"></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
              <td style="background-image:url(images/login_line_right.jpg)"></td>
            </tr>
            <tr>
              <td height="7" style="background-image:url(images/login_bottom_left.jpg)"></td>
              <td height="7" style="background-image:url(images/login_line_bottom.jpg)"></td>
              <td height="7" style="background-image:url(images/login_bottom_right.jpg)"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td height="60" align="center">&nbsp;</td>
        </tr>
      </table></td>
      <td width="7" style="background-image:url(images/login_line_right.jpg)"></td>
    </tr>
    <tr>
      <td height="7" style="background-image:url(images/login_bottom_left.jpg)"></td>
      <td height="7" style="background-image:url(images/login_line_bottom.jpg)"></td>
      <td height="7" style="background-image:url(images/login_bottom_right.jpg)"></td>
    </tr>
	<tr>
		<td colspan="3" align="center" style="padding:5px;">
		<font style="font-size: 8.5pt" face="Tahoma">Copyright 
		2013 @ Powered by </font>
		<a href="http://quatangtraitim.vn/" rel="nofollow"><font style="font-size: 8.5pt" face="Tahoma">quatangtraitim.vn</font></a>
		</td>
	</tr>
</table>
</form>

		</td>
	</tr>
</table>
	

</body>
</html>
<?php require("../common_end.php") ?>

