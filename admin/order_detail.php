<?php $errMsg =''?>
<?php switch ($_GET['action']){
	case 'del' :
		$id = $_GET['id'];
		$sql = "delete from tbl_order_detail where id='".$id."'";
		$result = mysql_query($sql,$conn);
		echo mysql_error();
		if ($result) $errMsg = "Đã xóa thành công.";
			else $errMsg = "Không thể xóa dữ liệu !";
		break;
}

if (isset($_POST['btnDel'])){
	$cnt=0;
	if($_POST['chk']!=''){
		foreach ($_POST['chk'] as $id){
			@$result = mysql_query("delete from tbl_order_detail where id='".$id."'",$conn);
			if ($result) $cnt++;
		}
		$errMsg = "Đã xóa ".$cnt." phần tử.";
	}else{
		$errMsg = 'Hãy chọn trước khi xóa !';
	}
}
?>
<form method="POST" name="frmForm" action="./">
<input type="hidden" name="act" value="order_detail">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
<?php $orderId=$_REQUEST['id'];
if ($orderId=='') return;
$orderinfo=getRecord("tbl_order","id=".$orderId);
$cust=getRecord("tbl_member","id=".$orderinfo['member_id']);
?>

<table width="100%" border="0" cellpadding="2" cellspacing="0">
	<tr><td class="3" height="10"></td></tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Họ và tên</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['name']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Công ty</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['company']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Địa chỉ</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['address']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Tình / thành phố</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['city']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Quốc gia</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['country']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">Điện thoại</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['tel']?></b></td>
	</tr>
	
	<tr>
		<td width="15%" class="smallfont" align="right">E-mail</td>
		<td width="1%" class="smallfont" align="center"></td>
		<td width="83%" class="smallfont"><b><?php echo $cust['email']?></b></td>
	</tr>
	
	<tr><td class="3" height="10"></td></tr>
</table>

<table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title"><input type="checkbox" name="chkall" onclick="chkallClick(this);"></th>
		<th width="20" class="title"></th>
		<th width="20" class="title"></th>
		<th class="title">Mã hàng</th>
		<th class="title">Tên SP</th>
		<th class="title">Số lượng</th>
		<th class="title">Đơn giá</th>
		<th class="title">Thành tiền</th>    
	</tr>
  
<?php $page = $_GET["page"];
$sql="select * from tbl_order_detail where order_id=$orderId order by id";
$result=mysql_query($sql,$conn);
$i=0;
while($row=mysql_fetch_array($result)){
	$pro=getRecord("tbl_product","id=".$row['product_id']);
	$color = $i++%2 ? '#d5d5d5' : '#e5e5e5';
?>
  
	<tr>
		<td bgcolor="<?php echo $color?>" class="smallfont">
			<input type="checkbox" name="chk[]" value="<?php echo $row['id']?>"></td>
		<td bgcolor="<?php echo $color?>" class="smallfont">
			<a href="./?act=product_m&id=<?php echo $pro['id']?>&page=<?php echo $page?>">Sửa</a>
		</td>
		<td bgcolor="<?php echo $color?>" class="smallfont">
			<a onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" href="./?act=order_detail&action=del&id=<?php echo $row['id']?>">Xóa</a>
		</td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $pro['id']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $pro['name']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['quantity']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="right"><?php echo number_format($row['price'])?>&nbsp;<font color="#FF0000"><?php echo $currencyUnit?></font></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="right"><?php echo number_format($row['quantity']*$row['price'])?>&nbsp;<font color="#FF0000"><?php echo $currencyUnit?></font></td>
	</tr>
<?php }
?>
</table>
<input type="submit" value="Xóa chọn" name="btnDel" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button">
</form>
<script language="JavaScript">
function chkallClick(o) {
  	var form = document.frmForm;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
			form.elements[i].checked = document.frmForm.chkall.checked;
		}
	}
}
</script>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>

<table width="100%">
	<tr><td height="10"></td></tr>
	<tr><td class="smallfont"><?php echo 'Tổng số hàng : <b>'.countRecord('tbl_order_detail','order_id='.$_REQUEST['id']).'</b>'?></td></tr>
</table>