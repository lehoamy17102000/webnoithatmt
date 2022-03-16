<script language="javascript">
function btnChange_onClick(){
	if(test_empty(document.frmChangePass.txtPwdOld.value)){
		alert('Hãy nhập "mật khẩu cũ" !');document.frmChangePass.txtPwdOld.focus();return false;
	}
	if(test_empty(document.frmChangePass.txtPwdNew1.value)){
		alert('Hãy nhập "mật khẩu" !');document.frmChangePass.txtPwdNew1.focus();return false;
	}
	if(test_empty(document.frmChangePass.txtPwdNew2.value)){
		alert('Hãy nhập "mật khẩu" lần 2 !');document.frmChangePass.txtPwdNew2.focus();return false;
	}
	if(!test_confirm_pass(document.frmChangePass.txtPwdNew1.value,document.frmChangePass.txtPwdNew2.value)){
		alert('Hai mật khẩu phải đồng nhất !');
		document.frmChangePass.txtPwdNew1.value = '';
		document.frmChangePass.txtPwdNew2.value = '';
		document.frmChangePass.txtPwdNew1.focus();return false;
	}
	
	return true;
}
</script>

<?php $errMsg=''?>
<?php $l_Uid          = $_lang == 'vn' ? 'Tên đăng nhập' : 'Username';
$l_PwdOld       = $_lang == 'vn' ? 'Mật khẩu cũ' : 'Old password';
$l_Pwd          = $_lang == 'vn' ? 'Mật khẩu' : 'Password';
$l_Pwd2         = $_lang == 'vn' ? 'Nhập lại mật khẩu' : 'Confirm password';
$l_btnChangePwd = $_lang == 'vn' ? 'Đổi mật khẩu' : 'Change password';

if (isset($_POST['btnChange'])) {
	$uid  = $_SESSION['member'];
	$old  = $_POST['txtPwdOld'];
	$new1 = $_POST['txtPwdNew1'];
	$new2 = $_POST['txtPwdNew2'];
	
	$result = mysql_query("select * from tbl_member where uid='".$uid."'",$conn);
	$rows = mysql_num_rows($result);
	if($rows<1){
		$errMsg = 'Sai "tên đăng nhập" !';
	}else{
		$row = mysql_fetch_array($result);
		if($old != $row['pwd']){
			$errMsg = 'Sai "mật khẩu" !';
		}else{
			$sql = "update tbl_member set pwd='".$new1."' where uid='".$uid."'";
			if (mysql_query($sql,$conn))
				$errMsg = "Cập nhật thành công.";
			else
				$errMsg = "Không thể cập nhật !";
		}
	}
} 
?>
<form method="POST" name="frmChangePass" action="./">
<input type="hidden" name="frame" value="changepassword">
<table border="0" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tr>
		<td width="100%" align="center">
			<table border="0" cellpadding="2" bordercolor="#111111" width="100%" cellspacing="0">
				<tr><td colspan="2" height="10"></td></tr>
				<tr>
					<td align="right" class="smallfont" width="40%"><?php echo $l_Uid?></td>
					<td class="smallfont"><b><?php echo $_SESSION['member']?></b></td>
				</tr>
				<tr>
					<td align="right" class="smallfont"><?php echo $l_PwdOld?></td>
					<td class="smallfont"><input type="password" name="txtPwdOld" size="34"></td>
				</tr>
				<tr>
					<td align="right" class="smallfont"><?php echo $l_Pwd?></td>
					<td class="smallfont"><input type="password" name="txtPwdNew1" size="34"></td>
				</tr>
				<tr>
					<td align="right" class="smallfont"><?php echo $l_Pwd2?></td>
					<td class="smallfont"><input type="password" name="txtPwdNew2" size="34"></td>
				</tr>
				<tr>
					<td align="right" class="smallfont"></td>
					<td width="100%" class="smallfont">
						<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 120px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" type="submit" name="btnChange" value="<?php echo $l_btnChangePwd?>" onClick="return btnChange_onClick()">
					</td>
				</tr>
				<tr><td colspan="2" height="10"></td></tr>
			</table>
		</td>
	</tr>
</table>
</form>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br>&nbsp;</p>';}?>