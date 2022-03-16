<?php function send_mail_order()
	{
		global $conn;
		global $adminEmail;
		$cust=$_SESSION['cust'];
		
		$name		= 	$cust['name'];
		$address	=	$cust['address'];
		$tel		=	$cust['tel'];
		$email		=	$cust['email'];

		$dathang="";
		$cart=$_SESSION['cart'];
	
		$tongcong=0;
		$cnt=0;
		foreach ($cart as $product){
			$sql = "select * from tbl_product where id='".$product[0]."'";
			$result = mysql_query($sql,$conn);
			$pro=mysql_fetch_assoc($result);
			
			$dathang.="Ma san pham : ".$pro['code']."<br>"; 
			$dathang.="Ten san pham : ".$pro['name']."<br>"; 
			$dathang.="So luong : ".$product[1]."<br>"; 
			$dathang.="Don gia : ".number_format($pro['price'],0,',','.')."&nbsp;"."$"."<br>";
			$dathang.="Thanh tien : ".$pro['price']*$product[1]."&nbsp;"."$<br><br>";
			
			$tongcong=$tongcong+$pro['price']*$product[1]."&nbsp;"."$";
			$cnt=$cnt+1;
		} 
		$dathang.="<hr>Tong cong : ".number_format($tongcong,0,',','.')."&nbsp;"."$<br>";

		$m2=send_mail($email,$adminEmail, "Thong tin dat hang cua : ".$name, "Ho ten : ".$name."<br>Dia chi : ".$address."<br>Dien thoai : ".$tel."<br>Email : ".$email."<BR><hr><b>Don hang :</b><br>".$dathang);
		
		if (m2)
		{
			return "";
		}
		else
			return "Không thể gửi thông tin !.";
	}

?>
<?php if (count($_SESSION['cart'])<=0) echo "<script>window.location='./?frame=cart'</script>";
	$cart=$_SESSION['cart'];
	
	$cust=$_SESSION['cust'];
?>    

<?php if (isset($_POST['butSub']))
	{
		$tongcong=0;
		$cnt=0;
		
		if (send_mail_order()=="")
			echo "<script>window.location='./?frame=checkout&code=1'</script>";
		else
			{
				echo "<p align='center' class='err'><font color=red>Không thể gửi thông tin !.</font></p>";
			}
	}
	
?>

<p align="center" style="line-height: 150%" class="err">
<font face="Tahoma" style="font-size: 12px; padding-top:20px">
<?php if ($_REQUEST['code']=='1') {
	
   		echo "<span style='font:'Tahoma; font-size:14px; color:#000000>Thông tin đặt hàng của bạn đã được gửi tới chúng tôi</span><br /><br />";
   		echo "<a href='./'><span style='font:'Tahoma; font-size:14px; color:#000000>Nhấn vào đây để trở về trang chủ !.</span></a><br/><br/>";
		unset($_SESSION['cart']);
	}
	else
{
?>
</font>
</p>
<table border="0" cellspacing="1" cellpadding="2" width="100%" id="table8">

<tr>
<td align="right" width="100"><font color="#000000" face="Tahoma" style="font-size:12px">Họ và tên :</font></td>
<td width="6">&nbsp; </td>
<td nowrap>
	<font face="Tahoma">
	<span style="font-size: 12px">
	<b>
	<?php echo $cust['name']?></b></span></font><b><font color="#000000" style="font-size: 12px">
</font>
	</b>
</td>
</tr>
<tr>
<td align="right" width="100"><font color="#000000" face="Tahoma" style="font-size:12px">Công ty :</font></td>
<td width="6">&nbsp;</td>
<td nowrap>
                                <font face="Tahoma">
                                <span style="font-size:12px">
                                <b>
                                <?php echo $cust['company']?></b></span></font><b><font color="#000000" style="font-size:12px">
</font>
								</b>
</td>
</tr>


<tr>
<td align="right" width="100"><font color="#000000" face="Tahoma" style="font-size:12px">Địa chỉ :</font></td>
<td width="6">&nbsp;</td>
<td nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 12px">
                                <b>
                                <?php echo $cust['address']?></b></span></font><b><font color="#000000" style="font-size: 12px">
</font>
								</b>
</td>
</tr>
<tr height="22">
<td align="right" width="100"><font color="#000000" style="font-size:12px" face="Tahoma">Thành phố :</font></td> 
<td width="6">&nbsp; </td>
<td nowrap>
                                <font face="Tahoma">
                                <span style="font-size: 12px; font-weight:700">
                                <?php echo $cust['city']?></span></font></td>
</tr>

<tr valign="middle" height="22">
<td align="right" width="100"><font color="#000000" style="font-size: 12px" face="Tahoma">Quốc gia :</font></td>
<td width="6">
</td>
<td nowrap>
<font color="#000000" style="font-size: 12px"> <b> <?php echo $cust['country']?></b></font></td>
</tr>

<tr>
<td align="right" width="100"><font color="#000000" face="Tahoma" style="font-size: 12px">Điện thoại:</font></td>
<td width="6">&nbsp; </td>
<td nowrap><font face="Tahoma"><span style="font-size: 12px">
                                <b>
                                <?php echo $cust['tel']?></b></span></font><b><font color="#000000" style="font-size: 12px">
</font>
								</b>
</td>
</tr>
<tr>
<td align="right" width="100"><font color="#000000" face="Tahoma" style="font-size: 12px">E-mail :</font></td>
<td width="6">&nbsp;</td>
<td nowrap>
    <font face="Tahoma">
     <span style="font-size: 12px">
 	  <b> <?php echo $cust['email']?></b></span></font><b><font color="#000000" style="font-size: 12px"></font></b>								
</td>
</tr>
<tr>
<td align="right" width="100"><font color="#000000" face="Tahoma" style="font-size: 12px">Fax :</font></td>
<td width="6">&nbsp;</td>
<td nowrap>
    <font face="Tahoma">
     <span style="font-size: 12px">
 	  <b> <?php echo $cust['fax']?></b></span></font><b><font color="#000000" style="font-size: 12px"></font></b>								
</td>
</tr>
<tr>
<td align="right" width="100"><font color="#000000" face="Tahoma" style="font-size: 12px">Website :</font></td>
<td width="6">&nbsp;</td>
<td nowrap>
    <font face="Tahoma">
     <span style="font-size: 12px">
 	  <b> <?php echo $cust['website']?></b></span></font><b><font color="#000000" style="font-size: 12px"></font></b>								
</td>
</tr>
</table>

<table border="0" cellpadding="10" cellspacing="1" width="100%">
<tr><td class="DialogBox">
<form action="./" method="POST" name="cartform">
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" bordercolor="#333333">
	<tr>
		<td align="center" width="100" height="30">Hình ảnh</td>
		<td width="400" height="34" align="center"><font face="Tahoma" style="font-size: 12px">Sản phẩm</font></td>
		<td align="center" width="100" height="30"><font face="Tahoma" style="font-size: 12px">Số lượng</font></td>
		<td align="center" width="160" height="30"><font face="Tahoma" style="font-size: 12px">Đơn giá</font>
			<span style="font-family:Tahoma; font-weight:600; color:#FF0000"><?php echo $currencyUnit?></span></td>
		<td align="center" width="164" height="30"><font face="Tahoma" style="font-size: 12px">Thành tiền</font>
			<span style="font-family:Tahoma; font-weight:600; color:#FF0000"><?php echo $currencyUnit?></span>
		</td>
	</tr>
<?php $cart=$_SESSION['cart'];
$cnt=0;
$tongcong=0;
foreach ($cart as $product){
$sql = "select * from tbl_product where id='".$product[0]."'";
$result = mysql_query($sql,$conn);
if (mysql_num_rows($result)>0)
{
$pro=mysql_fetch_assoc($result);
?>	
	<tr>
		<td align="center" width="100">
		<font face="Tahoma" style="font-size: 12px">
<A href="./?frame=product_detail&id=<?php echo $pro['id']?>"><img src="<?php echo $pro['image']?>" alt="<?php echo $pro['name']?>" border="0" width="100"></A></font></td>
		<td align="center"><span style="font-size: 12px">
		  <?php echo $pro['name']?>
		</span></td>
		<td align="center" width="100"><span style="font-size: 12px"><?php echo $product[1]?></span></td>
		<td align="center" width="160"><span style="font-size: 12px"><?php echo number_format($pro['price'],0,',','.')?></span> </td>
		<td align="center" width="164"><span style="font-size: 12px"><?php echo number_format(($pro['price']*$product[1]),0,',','.')?>
		</span></td>
	</tr>
<?php }
$tongcong=$tongcong+$pro['price']*$product[1];
$cnt=$cnt+1;
} 
?>
</table>

<table border="0" width="100%">
<tr><td height="10px"></td></tr>
<tr><td align="right" style="padding-right:10px">
		<font face="Tahoma" style="font-size: 12px"><b>Tổng cộng : <?php echo number_format($tongcong,0,',','.')?></b></font>
			<span style="font-family:Tahoma; font-weight:600; color:#FF0000"><?php echo $currencyUnit?></span>
	</td></tr>
</table>
<HR align="left" noshade size="1">
<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table5">
<tr>
<td>
<p align="center"><font face="Verdana" size="1">
<input type="submit" class="buttonorange" onmouseover="this.className='buttonblue'" onmouseout="this.className='buttonorange'" style="height: 22px; width:130px" name="butSub" value="Gửi đơn hàng">

<input  class=""  type="button" class="buttonrange" value="thanh toan">
</font></td>
</tr>
</table>
<input type="hidden" name="frame" value="checkout">
</form>
        
</td></tr>
</table>
<<form action="/vnpay/vnpay.php/"></form>
<input type="submit" value="submit" onclick="test()" />

<?php }
?>

    