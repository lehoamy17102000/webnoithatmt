<?php $row = 5;
$col = 1;

$p=0;
if ($_REQUEST['p']!='') $p=$_REQUEST['p'];
$sql = "select tbl_product.*,tbl_product_special.sort as sort from tbl_product_special,tbl_product where tbl_product_special.lang='".$_lang."' and tbl_product_special.product_id = tbl_product.id order by tbl_product_special.sort limit ".$row*$col*$p.",".$row*$col;
$result = @mysql_query($sql,$conn);

$total = countRecord("tbl_product_special","status=0 and lang='".$_lang."'");
if($total==0){
?>
<link href="../css/css.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.style30 {color: #FF0000}
-->
</style>
<table align="center" cellSpacing="0" cellPadding="0" width="100%" border="0">
	<tr><td height="10"></td></tr>
	<tr>
		<td align="center">
			<font color="#993300"><b><?php echo $_lang=="vn"?'Sản phẩm đang cập nhật !':'Products are being updated !'?></b></font>
		</td>
	</tr>
	<tr><td height="10"></td></tr>
</table>
<?php }else{
?>

<table align="center" cellSpacing="0" cellPadding="0" width="100%" border="0">
<?php for($i=0; $i<$row; $i++){
?>
	<tr>
	  <td align="left">
<?php for($j=0; $j<$col&&$products=mysql_fetch_assoc($result); $j++){
		$pro = getRecord("tbl_product","id=".$products['id'])?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="./?frame=product_detail&id=<?php echo $pro['id']?>" title="<?php echo $pro['name']?>">
						<img src="<?php echo $pro['image']?>" width="120" height="100" border="0" /></a></td>
                  </tr>
				   <tr>
                    <td class="style14"><a href="./?frame=product_detail&id=<?php echo $pro['id']?>" class="link3"><?php echo $pro['name']?>
                      <br />
                      <span class="style30">Giá : </span> <span class="style30">
                      <?php echo number_format($pro['price'],0,',','.') ?>
                      <?php echo $currencyUnit?>
                      </span></a></td>
                  </tr>
        </table>
            <?php }
while($j<$col){
	echo "";
	$j=$j+1;
}
?></td>
	</tr>
<?php }?>
</table>
<?php }?>