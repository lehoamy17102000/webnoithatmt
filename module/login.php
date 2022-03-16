
<style type="text/css">
.err{
	font-family:tahoma;
	color:#FFFFFF;
	font-size:12px;	
}

</style>
<script language="javascript">
function btnLogin_onclick(){
	if(test_empty(document.frmLogin.txtUid.value)){
		alert(mustInput_Uid);document.frmLogin.txtUid.focus();return false;
	}
	if(test_empty(document.frmLogin.txtPwd.value)){
		alert(mustInput_Pwd);document.frmLogin.txtPwd.focus();return false;
	}
	return true;
}
</script>
<?php $errMsg =''?>
<?php $l_notmember = $_lang == 'vn' ? 'Bạn chưa là thành viên' : 'Not member';
$l_member    = $_lang == 'vn' ? 'Bạn đã là thành viên' : 'Member';

$l_Uid       = $_lang == 'vn' ? 'Tên đăng nhập' : 'Username';
$l_Pwd       = $_lang == 'vn' ? 'Mật khẩu' : 'Password';
$l_ForgotPwd = $_lang == 'vn' ? 'Quên mật khẩu' : 'Forgot Password';

$l_btnRegistry = $_lang == 'vn' ? 'Đăng ký' : 'Registry';
$l_btnLogin    = $_lang == 'vn' ? 'Đăng nhập' : 'Login';
$l_btnLogout   = $_lang == 'vn' ? 'Đăng xuất' : 'Logout';

$l_Welcome      = $_lang == 'vn' ? 'Chào' : 'Welcome';
$l_LoginSuccess = $_lang == 'vn' ? 'Bạn đã đăng nhập thành công.' : 'Login Successfully.';

if ($_REQUEST['frame']=='logout'){
	unset($_SESSION['member']);
	echo "<script>window.location='./'</script>";
}
if(!isset($_SESSION['member']) || $_SESSION['member']==''){
	$flagLogin = false;
}else{
	$flagLogin = true;
}

if($_REQUEST['boxUid']!=''){
	$uid = $_REQUEST['boxUid'];
	$pwd = $_REQUEST['boxPwd'];
	
	if(!isset($_SESSION['member']) || $_SESSION['member']==''){
		$result = mysql_query("select * from tbl_member where uid='".$uid."'",$conn);
		$rows = mysql_num_rows($result);
		if($rows<1){
			$errMsg = $_lang == 'vn'?'Sai "tên đăng nhập" !':'Username wrong !';
		}else{
			$row = mysql_fetch_array($result);
			if($pwd != $row['pwd']){
				$errMsg = $_lang == 'vn'?'Sai "mật khẩu" !':'Password wrong !';
			}else{
				$flagLogin = true;
			}
		}
	}
}

if (isset($_POST['btnLogin'])){
	$uid = isset($_POST['txtUid']) ? trim($_POST['txtUid']) : "";
	$pwd = isset($_POST['txtPwd']) ? trim($_POST['txtPwd']) : "";
	
	if(!isset($_SESSION['member']) || $_SESSION['member']==''){
		$result = mysql_query("select * from tbl_member where uid='".$uid."'",$conn);
		$rows = mysql_num_rows($result);
		if($rows<1){
			$errMsg = $_lang == 'vn'?'Sai "tên đăng nhập" !':'Username wrong !';
		}else{
			$row = mysql_fetch_array($result);
			if($pwd != $row['pwd']){
				$errMsg = $_lang == 'vn'?'Sai "mật khẩu" !':'Password wrong !';
			}else{
				$flagLogin = true;
			}
		}
	}
}

if($flagLogin){
	$_SESSION['member'] = isset($_SESSION['member'])?$_SESSION['member']:$uid;
?>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<table align="center" border="0" width="214" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td>
			<table align="center" border="0" width="164" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center">
						<br><br><br>
						<?php echo $l_Welcome.' <b class="fontRed">'.$_SESSION['member'].'</b>'?>
						<br><br>
						<span style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#FFCC00">
							<b><?php echo $l_LoginSuccess?></b>
						</span>
						<br><br>
						[ <a class="aMagenta" href="./?frame=logout"><?php echo $l_btnLogout?></a> ]
						<br><br><br>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height="5"></td></tr>
</table>

<?php }else{
?>

<table width="214" border="0" align="center" cellpadding="0" cellspacing="0">
                      <form name="frmLogin" action="./" method="post">
					  <tr>
                        <td align="left" valign="middle" id="bg_login"><input name="txtUid" type="text" class="inputbox1"
							 onFocus="this.value='';"  value="<?php echo $_lang=='vn'?'Tên đăng nhập...':'Input name...'?>" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
					  <tr>
                        <td align="left" valign="middle" id="bg_login"><input name="txtPwd" type="password" class="inputbox1" 
							onFocus="this.value='';" value="password" /></td>
                      </tr>
					  <tr>
					    <td height="26" align="left" valign="bottom">
							<input class="buttonorange" onmouseover="this.className='bg_over'" style="WIDTH: 89px; HEIGHT: 22px; cursor:pointer" onmouseout="this.className='bg_out'" type="submit" value="<?php echo $l_btnLogin?>" name="btnLogin" onclick="return btnLogin_onclick()"/> 
							</td>
					    </tr>
					  </form>
                    </table> 
 					
<?php }?>

<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'</p>';
	echo '<br/>';
}?>          