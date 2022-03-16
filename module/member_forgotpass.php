<script language="javascript">
function btnSend_onclick(){
	if(test_empty(document.frmForgotpass.txtUid.value)){
		alert(mustInput_Uid);document.frmForgotpass.txtUid.focus();return false;
	}
	if(test_empty(document.frmForgotpass.txtEmail.value)){
		alert(mustInput_Email);document.frmForgotpass.txtEmail.focus();return false;
	}
	if(!checkEmail(document.frmForgotpass.txtEmail.value)){
		alert(invalid_Email);document.frmForgotpass.txtEmail.focus();return false;
	}
	return true;
}
</script>
<?php $errMsg =''?>
<?php $l_Uid          = $_lang == 'vn' ? 'Tên đăng nhập' : 'Username';
$l_Email        = $_lang == 'vn' ? 'Email' : 'Email';
$l_btnSend      = $_lang == 'vn' ? 'Gởi thông tin' : 'Send';

$l_SendSuccess  = $_lang == 'vn' ? 'Đã gởi thông tin thành công.' : 'Sent infomation Successfully.';

$flagForgotpass = false;
if (isset($_POST['btnSend'])){
	$uid   = isset($_POST['txtUid']) ? trim($_POST['txtUid']) : "";
	$email = isset($_POST['txtEmail']) ? trim($_POST['txtEmail']) : "";
	
	$result = mysql_query("select * from tbl_member where uid='".$uid."'",$conn);
	$rows = mysql_num_rows($result);
	if($rows<1){
		$errMsg = $_lang == 'vn'?'Sai "Tên đăng nhập" !':'Username wrong !';
	}else{
		$row = mysql_fetch_array($result);
		if($email != $row['email']){
			$errMsg = $_lang == 'vn'?'Sai "Hộp thư" !':'Email wrong !';
		}else{
			$flagForgotpass = true;
		}
	}
	
	if($flagForgotpass){
		if (send_mail($adminEmail,$email,"Thong tin dang nhap","Username : ".$row['uid']."<br>Password : ".$row['pwd'])){	
			echo "<script>window.location='./?frame=forgotpass&code=1'</script>";
		}else{
			$errMsg = $_lang == 'vn'? 'Không thể gởi thông tin !' : 'Can not send !';
		}
	}
}

if ($_REQUEST['code']=='1'){
?>

<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td>

<table align="center" border="1" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-color:#CCCCCC">
	<tr>
		<td align="center">
			<br><br><br>
			<font color="#0000FF" size="2" face="Verdana, Arial, Helvetica, sans-serif">
			<b><?php echo $l_SendSuccess?></b>
			</font>
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

<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td>

<table align="center" border="1" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; border-color:#CCCCCC">
	<tr>
		<td>
			<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top">
						<form method="POST" name="frmForgotpass" action="./">
						<input type="hidden" name="frame" value="forgotpass">
						<table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
							<tr><td height="10" colspan="3"></td></tr>
							<tr>
								<td colspan="3">
								<p align="justify">
								<?php echo $_lang == 'vn' ? 'Hãy điều đầy đủ thông tin và gởi về cho chúng tôi, bạn sẽ nhận lại mật khẩu theo địa chỉ hộp thư.' : 'Please send your infomation, we\'ll send your password to your e-mail address !'?>
								</p>
								</td>
							</tr>
							<tr><td height="10" colspan="3"></td></tr>
							<tr>
								<td align="right" width="40%"><?php echo $l_Uid?>&nbsp;</td>
								<td width="5"><font color="#FF0000">*</font></td>
								<td>&nbsp;<input name="txtUid" value="<?php echo $uid?>"></td>
							</tr>
							<tr>
								<td align="right" width="40%"><?php echo $l_Email?>&nbsp;</td>
								<td width="5"><font color="#FF0000">*</font></td>
								<td>&nbsp;<input name="txtEmail" value="<?php echo $email?>"></td>
							</tr>
							<tr><td height="10" colspan="3"></td></tr>
							<tr>
								<td></td>
								<td></td>
							  <td>
						<input type="submit" class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 22px" onmouseout="this.className='buttonorange'" name="btnSend" value="<?php echo $l_btnSend?>" onclick="return btnSend_onclick()">
							</td>
							</tr>
						</table>
						</form>
					</td>
				</tr>
			</table>
	
		</td>
	</tr>
</table>

		</td>
	</tr>
	<tr><td height="5"></td></tr>
</table>

<?php }?>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?> 

