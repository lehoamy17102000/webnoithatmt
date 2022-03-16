<style type="text/css">
	.smallfont
		{
			font-family:Tahoma;
			font-size:12px; 
			color:#000000;
		}
</style>

<?php $l_buymore	 = $_lang == 'vn' ? 'Mua tiếp' : ''; 
$_image		 = $_lang == 'vn' ? 'Hình ảnh' : 'Image';
$l_product   = $_lang == 'vn' ? 'Sản phẩm' : 'Product';
$l_quantity  = $_lang == 'vn' ? 'Số lượng' : 'Quantity';
$l_price     = $_lang == 'vn' ? 'Đơn giá' : 'Unit price';
$l_money     = $_lang == 'vn' ? 'Thành tiền' : 'Cost';
$l_total     = $_lang == 'vn' ? 'Tổng cộng' : 'Total';
$_Delete 	 = $_lang == 'vn' ? 'Xoá' : 'Delete' ;		

$l_btnDel    = $_lang == 'vn' ? 'Xóa' : 'Delete';
$l_btnDelAll = $_lang == 'vn' ? 'Xóa hết' : 'Delete all';
$l_btnUpdate = $_lang == 'vn' ? 'Cập nhật' : 'Update';
$l_btnPay    = $_lang == 'vn' ? 'Thanh toán' : 'Pay';

$l_cartEmpty = $_lang == 'vn' ? 'Bạn chưa chọn bất kỳ sản phẩm nào.' : 'Your cart is empty.';

function checkexist(){
	$cart=$_SESSION['cart'];
	foreach ($cart as $product)
		if ($product[0]==$_REQUEST['p']) return true;
	return false;
}

if ($_REQUEST['act']=='del'){
	if (count($_SESSION['cart'])==1){
		unset($_SESSION['cart']);
	}else{
		$cart=$_SESSION['cart'];
		unset($cart[$_REQUEST['pos']]);
		$_SESSION['cart']=$cart;
	}
}

if (isset($_POST['butUpdate'])||isset($_POST['btnCheckout'])){
	$cart=$_SESSION['cart'];
	$t=0;
	foreach ($_POST['txtQuantity'] as $quantity){
		if (is_numeric($quantity) && $quantity>0 && strlen($quantity)<5)
			$cart[$t][1]=(int)$quantity;
		if ($quantity<=0){
			unset($cart[$t]);
			$t=$t-1;
		}
		$t=$t+1;
	}
	if (count($cart)<=0) unset($cart);
	$_SESSION['cart']=$cart;
	
	if (isset($_POST['btnCheckout'])) echo "<script>window.location='./?frame=customer'</script>";
}

if (isset($_POST['btnBuymore'])) echo "<script>window.location='./'</script>";
	
if (isset($_POST['btnDeleteAll'])) unset($_SESSION['cart']);

if (isset($_REQUEST['p'])){
	if (!isset($_SESSION['cart'])){
		$pro=$_REQUEST['p'];
		$cart=array();
		$cart[] = array($pro,1);
		$_SESSION['cart']=$cart;
	}else{
		$pro=$_REQUEST['p'];
		$cart=$_SESSION['cart'];
		if (countRecord("tbl_product","id='".$_REQUEST['p']."'")>0 && checkexist()==false){
			$cart[]=array($pro,1);
			$_SESSION['cart']=$cart;
		}
	}
}else{
	$cart=$_SESSION['cart'];
}
?>


<?php if (!isset($_SESSION['cart'])){?>
<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td>
			<table align="center" border="1" width="100%" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse">
				<tr>
					<td align="center">
						<br><br><br>
						<font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">
							<b><?php echo $l_cartEmpty?></b>
						</font>
						<br><br><br>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height="5"></td></tr>
</table>
<?php }else{?>


<FORM action="./" method="POST" name="frmCart">
<input type="hidden" name="frame" value="cart"> 
<table border="1" width="100%" cellspacing="0" cellpadding="0" bordercolor="#000000" style="border-collapse:collapse">
	<tr>
		<th width="100" class="smallfont"><?php echo $_image?></th>
		<th class="smallfont"><?php echo $l_product?></th>
		<th width="70" class="smallfont"><?php echo $l_quantity?></th>
		<th width="70" class="smallfont"><?php echo $l_price?><br>(<font color="#FF0000"><?php echo $currencyUnit?></font>)</th>
		<th width="70" class="smallfont"><?php echo $l_money?></th>
		<th width="60" class="smallfont"><?php echo $_Delete?></th>
	</tr>
<?php $cnt=0;
$tongcong=0;
foreach ($cart as $product){
	$sql = "select * from tbl_product where id='".$product[0]."'";
	$result = mysql_query($sql,$conn);	
	if ($r=mysql_num_rows($result)>0){		
	//$s=$r;
	$pro = mysql_fetch_assoc($result)?>
	<tr>
		<td class="smallfont" align="center">
			<a href="./?frame=product_detail&id=<?php echo $pro['id']?>">
				<img src="<?php echo $pro['image']?>" alt="<?php echo $pro['name']?>" border="0" width="100">
			</a>
		</td>
		<td>&nbsp;<?php echo $pro['name']?></td>
		<td align="center">
			<input type="text" name="txtQuantity[]" size="5" value="<?php echo $product[1]?>">
		</td>
		<td align="center"><?php echo number_format($pro['price'],0)?></td>
		<td align="center"><?php echo number_format(($pro['price']*$product[1]),0)?></td>
		<td align="center">
        	<input type="submit" class="buttonorange" onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" style="width:50" name="btnDelete" value="<?php echo $l_btnDel?>" onclick="window.location='./?frame=cart&act=del&pos=<?php echo $cnt?>';return false;">
	  </td>
	</tr>
<?php }
$tongcong=$tongcong+$pro['price']*$product[1];
$cnt=$cnt+1;
//$_SESSION['soluong'] = $s;
} 
?>
</table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td align="right" colspan="2" style="padding-right:10px">
			<b><?php echo $l_total?> : <font color="#000000"><?php echo number_format($tongcong,0)?></font> <font color="#FF0000"><?php echo $currencyUnit?></font></b>
		</td>
	</tr>
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td>
			<input type="submit" class="buttonorange" onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" name="butUpdate" value="<?php echo $l_btnUpdate?>">
			<input type="submit" class="buttonorange" onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" name="btnDeleteAll" value="<?php echo $l_btnDelAll?>">
		</td>
		<td align="right">
			<input type="submit" class="buttonorange" onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" name="btnBuymore" value="<?php echo $l_buymore?>">
			<input type="submit" class="buttonorange" onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" name="btnCheckout" value="<?php echo $l_btnPay?>">
		</td>
	</tr>
</table>

</FORM>
<?php }
?>

