<?php $row = 3;
$col = 3;

$cat = 0;
if($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);

$p_new=0;
if ($_REQUEST['p_new']!='') $p_new=$_REQUEST['p_new'];
$sql = "select tbl_product.*,tbl_product_new.sort as sort from tbl_product_new,tbl_product where tbl_product_new.lang='".$_lang."' and tbl_product_new.product_id = tbl_product.id order by tbl_product_new.sort limit ".$row*$col*$p_new.",".$row*$col;
$result = @mysql_query($sql,$conn);
$total = countRecord("tbl_product_new","status=0 and lang='".$_lang."'");
if($total==0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<table align="center" cellSpacing="0" cellPadding="0" width="100%" border="0">
	<tr><td height="20"></td></tr>
	<tr>
		<td align="center">
			<font color="#FFFFFF"><strong><?php echo $_lang=="vn"?'Sản phẩm mới đang cập nhật !':'Products are being updated !'?></strong></font>
		</td>
	</tr>
	<tr><td height="20"></td></tr>
</table>
<?php }else{
?>

<table align="center" cellSpacing="0" cellPadding="0" width="100%" border="0">
<?php for($i=0; $i<$row; $i++){
?>
	<tr><td colspan="5" height=10></td></tr>
	<tr>			  
		<td width="10px"></td>
			
<?php for($j=0; $j<$col&&$products=mysql_fetch_assoc($result); $j++){
		$pro = getRecord("tbl_product","id=".$products['id'])?><td>&nbsp;</td><td>
			<table width="212" border="0" cellspacing="0" cellpadding="0" style="float:left">					
                        <tr>
                          <td><img src="images/sp_top.jpg" width="213" height="6" /></td>
                          </tr>
                        <tr>
                          <td align="center" valign="top" id="boder_left_right"><table width="100%" border="0" cellspacing="0" cellpadding="0">                           
                            <tr>
                              <td align="center" valign="top">
							  	<?php
									if($pro['image']!='' || $pro['image_large']!='')
										{	$img = $pro['image']!='' ? $pro['image'] : $pro['image_large'] ;
											?> <a href="./?frame=product_detail&id=<?php echo $pro['id']?>"><img src="<?php echo $img?>" width="200" height="147" border="0" /></a><?php }
								?>							  </td>
                              </tr>
							   <tr>
                              <td height="22" align="center" valign="middle"><a href="./?frame=product_detail&id=<?php echo $pro['id']?>"><strong><?php echo $pro['name']?></strong></a></td>
                              </tr>
                            </table></td>
                          </tr>
                        <tr>
                          <td align="center" valign="top" id="sp_button"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="48%" height="54" rowspan="2" align="center" valign="bottom" style="padding-left:15px"> 
							  	<a href="./?frame=product_detail&id=<?php echo $pro['id']?>"><img src="images/detail.jpg" width="84" height="20" border="0"/> </a>
							  </td>
                              <td width="52%" height="30" align="center" valign="middle" class="style4"><strong>
                                <?php echo number_format($pro['price'],0,',','.')?>
                                &nbsp;
                                <?php echo $currencyUnit?>
                              </strong></td>
                            </tr>
							<tr>
                              <td align="center" valign="middle"><a href="./?frame=cart&p=<?php echo $pro['id']?>"><img src="images/muahang.jpg" width="84" height="20" border="0"/> </a></td>
                            </tr>
							                           
                          </table></td>
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
