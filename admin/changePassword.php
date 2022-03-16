<script language="javascript" src="../lib/md5.js"></script>
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
	
	document.frmChangePass.txtPwdOld.value = hex_md5(document.frmChangePass.txtPwdOld.value);
	document.frmChangePass.txtPwdNew1.value = hex_md5(document.frmChangePass.txtPwdNew1.value);
	document.frmChangePass.txtPwdNew2.value = hex_md5(document.frmChangePass.txtPwdNew2.value);
	return true;
}
</script>

<?php $errMsg=''?>
<?php if (isset($_POST['btnChange'])) {
	$uid  = $_SESSION['log'];
	$old  = $_POST['txtPwdOld'];
	$new1 = $_POST['txtPwdNew1'];
	$new2 = $_POST['txtPwdNew2'];
	
	$result = mysql_query("select * from tbl_user where uid='".$uid."'",$conn);
	$rows = mysql_num_rows($result);
	if($rows<1){
		$errMsg = 'Sai "tên đăng nhập" !';
	}else{
		$row = mysql_fetch_array($result);
		if($old != $row['pwd']){
			$errMsg = 'Sai "mật khẩu" !';
		}else{
			$sql = "update tbl_user set pwd='".$new1."' where uid='".$uid."'";
			if (mysql_query($sql,$conn))
				$errMsg = "Cập nhật thành công.";
			else
				$errMsg = "Không thể cập nhật !";
		}
	}
} 
?>
<form method="POST" name="frmChangePass" action="./">
<input type="hidden" name="act" value="changepass">
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tr>
		<td width="100%" align="center">
			<table border="0" cellpadding="2" bordercolor="#111111" width="389" cellspacing="0">
				<tr><td colspan="2" height="10"></td></tr>
				<tr>
					<td align="right" class="smallfont" width="40%">Tên đăng nhập</td>
					<td class="smallfont"><b><?php echo $_SESSION['log']?></b></td>
				</tr>
				<tr>
					<td align="right" class="smallfont">Mật khẩu cũ</td>
					<td class="smallfont"><INPUT TYPE="password" NAME="txtPwdOld" size="34"></td>
				</tr>
				<tr>
					<td align="right" class="smallfont">Mật khẩu mới</td>
					<td class="smallfont"><INPUT TYPE="password" NAME="txtPwdNew1" size="34"></td>
				</tr>
				<tr>
					<td align="right" class="smallfont">Xác nhận mật khẩu mới</td>
					<td class="smallfont"><INPUT TYPE="password" NAME="txtPwdNew2" size="34"></td>
				</tr>
				<tr>
					<td align="right" class="smallfont"></td>
					<td width="100%" class="smallfont">
						<INPUT TYPE="submit" NAME="btnChange" VALUE="Đổi mật khẩu" CLASS="button" onClick="return btnChange_onClick()">
					</td>
				</tr>
				<tr><td colspan="2" height="10"></td></tr>
			</table>
		</td>
	</tr>
</table>
</form>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br>&nbsp;</p>';}?>