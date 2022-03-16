<script language="javascript">
function btnSave_onclick(){
	if(test_empty(document.frmForm.txtName.value)){
		alert('Hãy nhập "họ tên" !');document.frmForm.txtName.focus();return false;
	}
	if(document.frmForm.cmbSex.selectedIndex==0){
		alert('Hãy chọn "giới tính" !');return false;
	}
	if(test_empty(document.frmForm.txtAddress.value)){
		alert('Hãy nhập "địa chỉ" !');document.frmForm.txtAddress.focus();return false;
	}
	if(test_empty(document.frmForm.txtCity.value)){
		alert('Hãy nhập "tỉnh / thành phố" !');document.frmForm.txtCity.focus();return false;
	}
	if(document.frmForm.cmbCountry.selectedIndex==0){
		alert('Hãy chọn "quốc gia" !');return false;
	}
	if(test_empty(document.frmForm.txtTel.value)){
		alert('Hãy nhập "số điện thoại" !');document.frmForm.txtTel.focus();return false;
	}
	if(test_integer(document.frmForm.txtTel.value)){
		alert('"Số điện thoại" phải là số !');document.frmForm.txtTel.focus();return false;
	}
	if(test_empty(document.frmForm.txtEmail.value)){
		alert('Hãy nhập "hộp thư" !');document.frmForm.txtEmail.focus();return false;
	}
	if(!checkEmail(document.frmForm.txtEmail.value)){
		alert('"Hộp thư" không đúng định dạng !');document.frmForm.txtEmail.focus();return false;
	}
	if(test_empty(document.frmForm.txtUid.value)){
		alert('Hãy nhập "tên đăng nhập" !');document.frmForm.txtUid.focus();return false;
	}
	if(test_empty(document.frmForm.txtPwd.value)){
		alert('Hãy nhập "mật khẩu" !');document.frmForm.txtPwd.focus();return false;
	}
	if(test_empty(document.frmForm.txtPwd2.value)){
		alert('Hãy nhập "mật khẩu" lần 2 !');document.frmForm.txtPwd2.focus();return false;
	}
	if(!test_confirm_pass(document.frmForm.txtPwd.value,document.frmForm.txtPwd2.value)){
		alert('Hai mật khẩu phải đồng nhất !');
		document.frmForm.txtPwd.value = '';
		document.frmForm.txtPwd2.value = '';
		document.frmForm.txtPwd.focus();return false;
	}
	return true;
}
</script>

<?php $errMsg =''?>
<?php if (isset($_POST['btnSave'])){
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
	$uid        = isset($_POST['txtUid']) ? trim($_POST['txtUid']) : '';
	$pwd        = isset($_POST['txtPwd']) ? trim($_POST['txtPwd']) : '';
	$status     = $_POST['chkStatus']!='' ? 1 : 0;

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
			"uid"           => "'$uid'",
			"pwd"           => "'$pwd'",
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
		echo "<script>window.location='./?act=member&code=1'</script>";
	}
	
	
}else{
	if (isset($_GET['id'])){
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from tbl_member where id='".$oldid."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
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

?>

<form method="post" name="frmForm" enctype="multipart/form-data" action="./">
<input type="hidden" name="act" value="member_m">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page']?>">
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tr>
    	<td>
    		<table border="0" cellpadding="2" bordercolor="#111111" width="100%" cellspacing="0">
				<tr><td height="10"></td></tr>
        		
				<tr>
        			<td width="15%" class="smallfont" align="right">Họ và tên</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $name?>" type="text" name="txtName" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">Phái</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<?php echo comboSex($sex)?>
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">C&ocirc;ng ty</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $company?>" type="text" name="txtCompany" class="textbox" size="60">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">&#272;&#7883;a ch&#7881;</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $address?>" type="text" name="txtAddress" class="textbox" size="60">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">T&igrave;nh / th&agrave;nh ph&#7889; </td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $city?>" type="text" name="txtCity" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">Qu&#7889;c gia</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<?php echo comboCountry($country)?>
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">&#272;i&#7879;n tho&#7841;i</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $tel?>" type="text" name="txtTel" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">S&#7889; fax</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $fax?>" type="text" name="txtFax" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">H&#7897;p th&#432;</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $email?>" type="text" name="txtEmail" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">Trang web</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $website?>" type="text" name="txtWebsite" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">Tên &#273;&#259;ng nh&#7853;p</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $uid?>" type="text" name="txtUid" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">M&#7853;t kh&#7849;u</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $pwd?>" type="password" name="txtPwd" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">X&aacute;c nh&#7853;n m&#7853;t kh&#7849;u</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $pwd2?>" type="password" name="txtPwd2" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
					<td width="15%" class="smallfont" align="right">Không hiển thị</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="checkbox" name="chkStatus" value="on" <?php echo $status>0?'checked':''?>>
					</td>
				</tr>
				
				
				
				<tr>
					<td width="15%" class="smallfont"></td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="submit" name="btnSave" VALUE="Cập nhật" class="button" onclick="return btnSave_onclick()">
						<input type="reset" class="button" value="Nhập lại">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>