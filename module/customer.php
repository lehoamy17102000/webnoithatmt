<script language="javascript">
function btnSave_onclick(){
	if(test_empty(document.frmForm.txtFullname.value)){
		alert('Hãy nhập "Họ tên" !');document.frmForm.txtFullname.focus();return false;
	}
	if(test_empty(document.frmForm.txtAddress.value)){
		alert('Hãy nhập "Địa chỉ" !');document.frmForm.txtAddress.focus();return false;
	}
	if(document.frmForm.cmbCity.selectedIndex==0){
		alert('Hãy nhập "Tỉnh / Thành phố" !');return false;
	}
	if(document.frmForm.cmbCountry.selectedIndex==0){
		alert('Hãy chọn "Quốc gia" !');return false;
	}
	if(test_empty(document.frmForm.txtTel.value)){
		alert('Hãy nhập "Số điện thoại" !');document.frmForm.txtTel.focus();return false;
	}
	if(test_empty(document.frmForm.txtEmail.value)){
		alert('Hãy nhập "E-mail" !');document.frmForm.txtEmail.focus();return false;
	}
	if(!checkEmail(document.frmForm.txtEmail.value)){
		alert('"E-mail" không đúng định dạng !');document.frmForm.txtEmail.focus();return false;
	}
	return true;
}
</script>

</head>
<body>
<?php $errMsg="";
if (isset($_POST['butSub'])) {

	$fullname	=	trim($_POST['txtFullname']);
	$company	=	trim($_POST['txtCompany']);
	$address	=	trim($_POST['txtAddress']);
	$city		=	trim($_POST['cmbCity']);
	$country	=	trim($_POST['cmbCountry']);
	$tel		=	trim($_POST['txtTel']);
	$email		=	trim($_POST['txtEmail']);
	$fax		=	trim($_POST['txtFax']);
	$website	=	trim($_POST['txtWebsite']);

	if ($errMsg=='')
	{
		$cust = array();
		$cust['name'] 		=  $fullname;
		$cust['company'] 	=  $company;
		$cust['address'] 	=  $address;
		$cust['city'] 		=  $city;		
		$cust['country'] 	=  $country;
		$cust['tel'] 		=  $tel;
		$cust['email'] 		=  $email;
		$cust['fax'] 		=  $fax;
		$cust['website'] 	=  $website;
		$_SESSION['cust'] 	=  $cust;
		echo "<script>window.location='./?frame=checkout'</script>";
	}
}

?>

<?php if ($_REQUEST['code']=='1') {
   		echo "<p class='err'>Đăng ký thành công !.<br><br>";
   		echo "<a href='./?frame=cart'>Nhấn vào đây xem giỏ hàng của bạn !.</a></p>";
   }
   else
   {
?>
<div align="center">            
<table border="0" cellspacing="5" cellpadding="0" width="526" align="center" bordercolor="#000000">
<form method="POST" name="frmForm" action="./">
<tr>
	<td height="20" colspan="3" align="center" class="err" style="padding-top:5px">
		<span style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#FF6600">
			<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?></span>
   </td>
</tr>
<tr>
<td height="20" colspan="3" style="padding-right:10px">
   <p align="right"> <font color="#FF0000">* </font>&nbsp;
   	<span style="color:#000000; font-family:Tahoma; font-size:12px"><strong>Thông tin phải nhập</strong> </span></td>
</tr>

<tr>
<td height="20" colspan="3" class="titlenormalfontbold" style="padding-left:5px"><b>Thông tin cá nhân</b><HR size="1" noshade></td>
</tr>
<tr>
<td align="right" class="normalfontbold" width="40%">Họ và tên</td>
<td width="5"><font color="#FF0000">*</font></td>
<td nowrap width="60%"><INPUT class="fieldKey" size=33 name="txtFullname" value="<?php echo $fullname?>"></td>
</tr>

<tr><td colspan="3" height="5px"></td></tr>

<tr>
<td align="right" class="normalfontbold" width="40%">Công ty</td>
<td width="5">&nbsp;</td>
<td nowrap width="60%"><INPUT class="fieldKey" size=33 name="txtCompany" value="<?php echo $company?>"></td>
</tr>

<tr>
<td height="20" colspan="3" class="titlenormalfontbold" style="padding-left:5px"><b>Địa chỉ</b><HR size="1" noshade></td>
</tr>

<tr>
<td align="right" class="normalfontbold" width="40%">Địa chỉ</td>
<td width="5"><font color="#FF0000">*</font></td>
<td nowrap width="60%"><INPUT class="fieldKey" size=33 name="txtAddress" value="<?php echo $address?>"></td>
</tr>
<tr><td colspan="3" height="5px"></td></tr>
<tr>
<td align="right" class="normalfontbold" width="40%">Tỉnh / Thành phố</td>
<td width="5"><font color="#FF0000">*</font></td>
<td nowrap width="60%">	
	<?php echo comboCity($city,$_lang)?>
</td>
</tr>
<tr><td colspan="3" height="5px"></td></tr>
<tr valign="middle" height="22">
<td align="right" class="normalfontbold" width="40%">Quốc gia</td>
<td width="5"><font color="#FF0000">*</font></td>
<td nowrap width="50%">
	<?php echo comboCountry($country,$_lang)?>
<font color="#000000"> </font></td>
</tr>
<tr>
<td height="20" colspan="3" class="titlenormalfontbold" style="padding-left:5px"><b>Thông tin liên hệ</b><HR size="1" noshade></td>
</tr>

<tr>
<td align="right" class="normalfontbold" width="40%">Điện thoại</td>
<td width="5"><font color="#FF0000">*</font></td>
<td width="60%"><input class="fieldKey" size=33 name="txtTel" value="<?php echo $tel?>" /></td>
</tr>
<tr><td colspan="3" height="5px"></td></tr>
<tr>
<td align="right" class="normalfontbold" width="40%">E-mail</td>
<td width="5"> <font color="#FF0000">*</font></td>
<td nowrap width="60%"> <INPUT class="fieldKey" size=33 name="txtEmail" value="<?php echo $email?>"></td>
</tr>
<tr>
<td align="right" class="normalfontbold" width="40%">Fax</td>
<td width="5">&nbsp;</td>
<td nowrap width="60%"><INPUT class="fieldKey" size=33 name="txtFax" value="<?php echo $fax?>"></td>
</tr>
<tr><td colspan="3" height="5px"></td></tr>
<tr>
<td align="right" class="normalfontbold" width="40%">Website</td>
<td width="5">&nbsp;</td>
<td nowrap width="60%"> <INPUT class="fieldKey" size=33  name="txtWebsite" value="<?php echo $website?>"></td>
</tr>

<tr>
<td colspan="2" height="10px"></td><td width="60%" height="10px"></td>
</tr>

<tr>
<td colspan="2">&nbsp;</td>
<td width="60%"><input class="buttonorange" onMouseOver="this.className='buttonblue'" style="WIDTH: 189px; HEIGHT: 22px" onMouseOut="this.className='buttonorange'" type="submit" value="Xác nhận đơn hàng" name="butSub" onClick="return btnSave_onclick();"></td>
</tr>
<tr><td colspan="2">&nbsp;</td><td width="60%">&nbsp;</td></tr>
<input type="hidden" name="frame" value="customer">
</form>	
</table>
</div>
<?php }
?>