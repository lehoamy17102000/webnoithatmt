<script language="javascript">
function btnEdit_onclick(){
	if(test_empty(document.frmAccount.txtName.value)){
		alert(mustInput_Name);document.frmAccount.txtName.focus();return false;
	}
	if(document.frmAccount.cmbSex.selectedIndex==0){
		alert(mustSelect_Sex);return false;
	}
	if(test_empty(document.frmAccount.txtAddress.value)){
		alert(mustInput_Address);document.frmAccount.txtAddress.focus();return false;
	}
	if(test_empty(document.frmAccount.txtCity.value)){
		alert(mustInput_city);document.frmAccount.txtCity.focus();return false;
	}
	if(document.frmAccount.cmbCountry.selectedIndex==0){
		alert(mustSelect_Country);return false;
	}
	if(test_empty(document.frmAccount.txtTel.value)){
		alert(mustInput_Tel);document.frmAccount.txtTel.focus();return false;
	}
	//if(test_integer(document.frmAccount.txtTel.value)){
//		alert(mustInterger_Tel);document.frmAccount.txtTel.focus();return false;
//	}
	if(test_empty(document.frmAccount.txtEmail.value)){
		alert(mustInput_Email);document.frmAccount.txtEmail.focus();return false;
	}
	if(!checkEmail(document.frmAccount.txtEmail.value)){
		alert(invalid_Email);document.frmAccount.txtEmail.focus();return false;
	}
	if(test_empty(document.frmAccount.txtRobust.value)){
		alert(mustInput_Robust);document.frmAccount.txtRobust.focus();return false;
	}
	return true;
}
</script>
<?php $alphanum  = "abcdefghijlmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$rand = substr(str_shuffle($alphanum), 0, 5);
$randE = PKI_Encrypt($rand, 6733, 82393793)?>

<?php $errMsg =''?>
<?php $l_Request     = $_lang == 'vn' ? 'Thông tin phải nhập' : 'Request info';
$l_PerInfo     = $_lang == 'vn' ? 'Thông tin cá nhân' : 'Personal info';
$l_AddressInfo = $_lang == 'vn' ? 'Địa chỉ' : 'Address info';
$l_ContactInfo = $_lang == 'vn' ? 'Thông tin liên hệ' : 'Contact info';
$l_UserInfo    = $_lang == 'vn' ? 'Tên truy cập & mật khẩu' : 'User info';
$l_strConfirm  = $_lang == 'vn' ? 'Chuỗi xác nhận' : 'Confirm string';

$l_Sex         = $_lang == 'vn' ? 'Giới tính' : 'Sex';
$l_Male        = $_lang == 'vn' ? 'Nam' : 'Male';
$l_Female      = $_lang == 'vn' ? 'Nữ' : 'Female';
$l_Name        = $_lang == 'vn' ? 'Họ và tên' : 'Full name';
$l_Company     = $_lang == 'vn' ? 'Công ty' : 'Company name';
$l_Address     = $_lang == 'vn' ? 'Địa chỉ' : 'Address';
$l_State       = $_lang == 'vn' ? 'Tỉnh / Thành phố' : 'State';
$l_Country     = $_lang == 'vn' ? 'Quốc gia' : 'Country';
$l_Tel         = $_lang == 'vn' ? 'Điện thoại' : 'Tel';
$l_Email       = $_lang == 'vn' ? 'Hộp thư' : 'Email';
$l_Fax         = $_lang == 'vn' ? 'Số fax' : 'Fax';
$l_Website     = $_lang == 'vn' ? 'Trang web' : 'Website';
$l_Uid         = $_lang == 'vn' ? 'Tên đăng nhập' : 'Username';
$l_Pwd         = $_lang == 'vn' ? 'Mật khẩu' : 'Password';
$l_Pwd2        = $_lang == 'vn' ? 'Nhập lại mật khẩu' : 'Confirm password';
$l_strR        = $_lang == 'vn' ? 'Chuỗi xác nhận' : 'Confirm string';


$l_btnEdit      = $_lang == 'vn' ? 'Hiệu chỉnh' : 'Edit';
$l_btnReset     = $_lang == 'vn' ? 'Nhập lại' : 'Reset';
$l_btnChangePwd = $_lang == 'vn' ? 'Đổi mật khẩu' : 'Change password';

$l_EditSuccess  = $_lang == 'vn' ? 'Đã hiệu chỉnh thành công.' : 'Edit successfully.';

$l_min4char     = $_lang == 'vn' ? 'tối thiểu 4 ký tự' : 'Min 4 characters';

if (isset($_POST['btnEdit'])){
	$sex        = $_POST['cmbSex'];
	$name       = isset($_POST['txtName']) ? trim($_POST['txtName']) : '';
	$company    = isset($_POST['txtCompany']) ? trim($_POST['txtCompany']) : '';
	$address    = isset($_POST['txtAddress']) ? trim($_POST['txtAddress']) : '';
	$city       = isset($_POST['txtCity']) ? trim($_POST['txtCity']) : '';
	$country    = $_POST['cmbCountry'];
	$tel        = isset($_POST['txtTel']) ? trim($_POST['txtTel']) : '';
	$fax        = isset($_POST['txtFax']) ? trim($_POST['txtFax']) : '';
	$email      = isset($_POST['txtEmail']) ? trim($_POST['txtEmail']) : '';
	$website    = isset($_POST['txtWebsite']) ? trim($_POST['txtWebsite']) : '';
	$status     = $_POST['chkStatus']!='' ? 1 : 0;
	
	$Rdx        = isset($_POST['HidRd']) ? trim($_POST['HidRd']) : "";
	$strRobust  = isset($_POST['txtRobust']) ? trim($_POST['txtRobust']) : "";
	if (md5($strRobust) == $Rdx){
		if (!empty($_POST['id'])){
			$oldid = $_POST['id'];
			$arrField = array(
				"name"          => "'$name'",
				"sex"           => "$sex",
				"company"       => "'$company'",
				"address"       => "'$address'",
				"city"          => "'$city'",
				"country"       => "'$country'",
				"tel"           => "'$tel'",
				"fax"           => "'$fax'",
				"email"         => "'$email'",
				"website"       => "'$website'",
				"status"        => "'$status'",
				"last_modified" => "now()",
			);
			$result = update("tbl_member",$arrField,"id=".$oldid);
		}else{
			$arrField = array(
				"name"          => "'$name'",
				"sex"           => "$sex",
				"company"       => "'$company'",
				"address"       => "'$address'",
				"city"          => "'$city'",
				"country"       => "'$country'",
				"tel"           => "'$tel'",
				"fax"           => "'$fax'",
				"email"         => "'$email'",
				"website"       => "'$website'",
				"uid"           => "'$uid'",
				"pwd"           => "'$pwd'",
				"status"        => "'$status'",
				"date_added"    => "now()",
				"last_modified" => "now()",
			);
			$result = insert("tbl_member",$arrField);
		}
		if($result){
			echo "<script>window.location='./?frame=account&code=1'</script>";
		}
	}else{
		$errMsg = 'Sai "Chuỗi xác nhận" !';
	}
}else{
	if (isset($_SESSION['member'])){
		$sql = "select * from tbl_member where uid='".$_SESSION['member']."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			$id            = $row['id'];
			$sex           = $row['sex'];
			$name          = $row['name'];
			$company       = $row['company'];
			$address       = $row['address'];
			$city          = $row['city'];
			$country       = $row['country'];
			$tel           = $row['tel'];
			$fax           = $row['fax'];
			$email         = $row['email'];
			$website       = $row['website'];
			$uid           = $row['uid'];
			$pwd           = $row['pwd'];
			$pwd2          = $row['pwd'];
			$status        = $row['status'];
			$date_added    = $row['date_added'];
			$last_modified = $row['last_modified'];
		}
	}
}

if ($_REQUEST['code']=='1'){
?>

<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td>
			<table align="center" border="1" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center">
						<br><br><br>
						<font color="#0000FF" size="2" face="Verdana, Arial, Helvetica, sans-serif">
						<b><?php echo $l_EditSuccess?></b>
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

<form method="POST" name="frmAccount" action="./">
<input type="hidden" name="frame" value="account">
<input type="hidden" name="id" value="<?php echo $id?>">

<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<table align="center" border="1" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center">

<table border="0" cellspacing="5" cellpadding="0" width="100%" align="center">
	<tr>
		<td height="20" colspan="3" class="normalfont" align="right">
			<font color="#FF0000">* </font><font color="#3D3D3D"><?php echo $l_Request?>&nbsp;&nbsp;&nbsp;</font>
		</td>
	</tr>

	<tr><td height="20" colspan="3" class="normalTitle"><?php echo $l_PerInfo?><HR size="1" noshade></td></tr>

	<tr>
		<td align="right" class="normalFont"><?php echo $l_Name?></td>
		<td><font color="#FF0000">*</font></td>
		<td><input class="textbox" size="30" name="txtName" value="<?php echo $name?>"></td>
	</tr>
	
	<tr>
		<td align="right" class="normalFont" width="35%"><?php echo $l_Sex?></td>
		<td width="7"><font color="#FF0000">*</font></td>
		<td><?php echo comboSex($sex,$_lang)?></td>
	</tr>
	
	<tr>
		<td align="right" class="normalFont"><?php echo $l_Company?></td>
		<td>&nbsp;</td>
		<td><input class="textbox" size="30" name="txtCompany" value="<?php echo $company?>"></td>
	</tr>


	<tr><td height="20" colspan="3" class="normalTitle"><b><?php echo $l_AddressInfo?></b><HR size="1" noshade></td></tr>


	<tr>
		<td align="right" class="normalFont"><?php echo $l_Address?></td>
		<td><font color="#FF0000">*</font></td>
		<td><input class="textbox" size="30" name="txtAddress" value="<?php echo $address?>"></td>
	</tr>

	<tr>
		<td align="right" class="normalFont"><?php echo $l_State?></td>
		<td><font color="#FF0000">*</font></td>
		<td><input class="textbox" size="30" name="txtCity" value="<?php echo $city?>"></td>
	</tr>

	<tr valign="middle" height="22">
		<td align="right" class="normalFont"><?php echo $l_Country?></td>
		<td><font color="#FF0000">*</font></td>
		<td>
			<?php echo comboCountry($country,$_lang)?>
		</td>
	</tr>
	
	<tr><td height="20" colspan="3" class="normalTitle"><b><?php echo $l_ContactInfo?></b><HR size="1" noshade></td></tr>

	<tr>
		<td align="right" class="normalFont"><?php echo $l_Tel?></td>
		<td><font color="#FF0000">*</font></td>
		<td><input class="textbox" size="30" name="txtTel" value="<?php echo $tel?>"></td>
	</tr>
	
	<tr>
		<td align="right" class="normalFont"><?php echo $l_Fax?></td>
		<td>&nbsp;</td>
		<td><input class="textbox" size="30" name="txtFax" value="<?php echo $fax?>"></td>
	</tr>
	
	<tr>
		<td align="right" class="normalFont"><?php echo $l_Email?></td>
		<td><font color="#FF0000">*</font></td>
		<td><input class="textbox" size="30" name="txtEmail" value="<?php echo $email?>"></td>
	</tr>
	
	<tr>
		<td align="right" class="normalFont"><?php echo $l_Website?></td>
		<td>&nbsp;</td>
		<td><input class="textbox" size="30" name="txtWebsite" value="<?php echo $website?>"></td>
	</tr>

	
	<tr><td height="20" colspan="3" class="normalTitle"><?php echo $l_strConfirm?><HR size="1" noshade></td></tr>
	
	<tr>
		<td align="right" class="normalFont"></td>
		<td class="Star"></td>
		<td>
			<input type="hidden" name="HidRd" id="HidRd" value="<?php print( md5($rand)) ?>">
			<img name="robust" src= "<?php print('lib/RD_Img.php?RD='.$randE) ?>" width="120" height="70">
		</td>
	</tr>
	
	<tr>
		<td align="right" class="normalFont"><?php echo $l_strR?></td>
		<td class="Star"></td>
		<td>
			<input class="textbox" size="30" name="txtRobust" type="text"> 
		</td>
	</tr>
	
	<tr><td height="20" colspan="3" class="normalTitle"><HR size="1" noshade></td></tr>

	<tr>
		<td></td>
		<td></td>
		<td></td>
	</tr>

	<tr>
		<td align="center">
			<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 120px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" type="button" value="<?php echo $l_btnChangePwd?>" name="btnChangePwd" onclick="window.location='./?frame=changepassword'">
		</td>
		<td></td>
		<td>
			<input class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" type="submit" value="<?php echo $l_btnEdit?>" name="btnEdit" onclick="return btnEdit_onclick()">
			<input type=reset class="buttonorange" onmouseover="this.className='buttonblue'" style="WIDTH: 89px; HEIGHT: 18px" onmouseout="this.className='buttonorange'" name=butReset value="<?php echo $l_btnReset?>">
		</td>
	</tr>
	
	<tr><td colspan="3" height="10"></td></tr>
</table>

					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height="5"></td></tr>
</table>
</form>

<?php }?>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>