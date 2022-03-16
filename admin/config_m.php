<script language="javascript">
function btnSave_onclick(){
	if(test_empty(document.frmForm.txtName.value)){
		alert('Hãy nhập "họ tên" !');document.frmForm.txtName.focus();return false;
	}
}
</script>
<?php $errMsg =''?>
<?php if (isset($_POST['btnSave'])){
	$name = isset($_POST['txtName']) ? trim($_POST['txtName']) : '';
	$detail = isset($_POST['txtDetail']) ? trim($_POST['txtDetail']) : '';

	if (!empty($_POST['id'])){
		$oldid = $_POST['id'];
		$arrField = array(
			"name"          => "'$name'",
			"detail"        => "'$detail'",
			"last_modified" => "now()",
		);
		$result = update("tbl_config",$arrField,"id=".$oldid);
	}else{
		$arrField = array(
			"name"          => "'$name'",
			"detail"        => "'$detail'",
			"date_added"    => "now()",
			"last_modified" => "now()",
		);
		$result = insert("tbl_config",$arrField);
	}
	if($result){
		echo "<script>window.location='./?act=config&code=1'</script>";
	}
	
	
}else{
	if (isset($_GET['id'])){
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from tbl_config where id='".$oldid."'";
		if ($result = mysql_query($sql,$conn)) {
			$row = mysql_fetch_array($result);
			$code = $row['code'];
			$name = $row['name'];
			$detail = $row['detail'];
		}
	}
}

?>

<form method="post" name="frmForm" enctype="multipart/form-data" action="./">
<input type="hidden" name="act" value="config_m">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page']?>">
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tr>
    	<td>
    		<table border="0" cellpadding="2" bordercolor="#111111" width="100%" cellspacing="0">
				<tr><td height="10"></td></tr>
        		
				<tr>
        			<td width="15%" class="smallfont" align="right">Mã</td>
        			<td width="1%" class="smallfont" align="center"><font color="#FF0000" size="2">*</font></td>
        			<td width="83%" class="smallfont">
						<input readonly value="<?php echo $code?>" type="text" name="txtCode" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">Tên</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $name?>" type="text" name="txtName" class="textbox" size="34">
					</td>
      			</tr>
				
				<tr>
        			<td width="15%" class="smallfont" align="right">Giá trị</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $detail?>" type="text" name="txtDetail" class="textbox" size="34">
					</td>
      			</tr>

				
				<tr>
					<td width="15%" class="smallfont"></td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="submit" name="btnSave" VALUE="Cập nhật" class="button" onclick="return btnSave_onclick()">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>