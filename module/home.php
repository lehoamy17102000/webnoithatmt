<link href="../css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style30 {color: #E6E6FA}
-->
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="style17"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="6"><img src="images/c_bg1.jpg" width="6" height="29" /></td>
                                <td class="style11">SẢN PHẨM MỚI <img src="images/new.gif" width="33" height="16" align="absmiddle" /></td>
                        </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td class="style20">
					  	<?php $row = 5;
$col = 4;

$cat = 0;
if($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);

$p_new=0;
if ($_REQUEST['p_new']!='') $p_new=$_REQUEST['p_new'];
$sql = "select tbl_product.*,tbl_product_new.sort as sort from tbl_product_new,tbl_product where tbl_product_new.lang='".$_lang."' and tbl_product_new.product_id = tbl_product.id order by tbl_product_new.sort limit ".$row*$col*$p_new.",".$row*$col;
$result = @mysql_query($sql,$conn);
$total = countRecord("tbl_product_new","status=0 and lang='".$_lang."'");
if($total==0){
?>
<table align="center" cellSpacing="0" cellPadding="0" width="100%" border="0">
	<tr><td height="10"></td></tr>
	<tr>
		<td align="center">
			<font color="#FFFFFF"><strong><?php echo $_lang=="vn"?'Sản phẩm mới đang cập nhật !':'Products are being updated !'?></strong></font>
		</td>
	</tr>
	<tr><td height="10"></td></tr>
</table>
<?php }else{
?>

<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<?php for($i=0; $i<$row; $i++){
?>
	<tr>			  
			
<?php for($j=0; $j<$col&&$products=mysql_fetch_assoc($result); $j++){
		$pro = getRecord("tbl_product","id=".$products['id'])?><td width="10px"></td><td>
		<table width="130" border="0" cellspacing="0" cellpadding="0" style="float:left">
			<tr><td height="10px"></td></tr>
			<tr>
			  <td align="center" class="style13"><a href="./?frame=product_detail&id=<?php echo $pro['id']?>" title="<?php echo $pro['name']?>">  
			  	<?php 
					if($pro['image']!='' || $pro['image_large']!='')
					{ $img = $pro['image']!='' ? $pro['image'] : $pro['image_large'];
						?>
							<img src="<?php echo $img?>" width="120" height="100" border="0" />
						<?php }
				?>
			  	</a></td>
			</tr>
			<tr>
            <td height="25" align="left"><div align="center"><a href="./?frame=product_detail&id=<?php echo $pro['id']?>" class="link4">
              <?php echo $pro['name']?>
            </a><span class="style30"><br />
            Giá : </span>
                    <span class="style30">
<?php echo number_format($pro['price'],0,',','.') ?> <?php echo $currencyUnit?>
                    </span><a href="./?frame=product_detail&id=<?php echo $pro['id']?>" class="link4"><br />
                </a></div></td>
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

<?php }?>					 </td>
                    </tr>
                    </table></td>
  </tr>
                <tr>
                  <td class="style4"><?php include('box/box_logo.php')?></td>
  </tr>
                <tr>
                  <td class="style4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="style17"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="6"><img src="images/c_bg1.jpg" width="6" height="29" /></td>
                                <td class="style11">TIN TỨC &amp; SỰ KIỆN <img src="images/new.gif" width="33" height="16" align="absmiddle" /></td>
                        </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td class="style20"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					  
                        <tr>
                          <td class="style4">
						  	<?php $code = $_lang == 'vn' ? 'vn_news' : 'en_news';
								$parentWhere = "and parent = (select id from tbl_content_category where code='".$code."')";								
								$parentRecord = getRecord("tbl_content","1=1 ".$parentWhere);								
								$cat = killInjection($_REQUEST['cat']);
								if ($cat=='') $cat = $parentRecord['parent'];
								$per_page =1;
								$p=0;
								if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);								
								$sql = "select * from tbl_content where status=0 $parentWhere order by sort,date_added desc limit ".$per_page;
								$result = @mysql_query($sql,$conn);
								while($row=mysql_fetch_assoc($result)){
								?>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
										  <td width="27%" rowspan="3" valign="top" class="style21">
										  <a href="./?frame=news_detail&amp;id=<?php echo $row['id']?>"><img src="<?php echo $row['image']?>" width="122" height="75" border="0" /></a><a href="./?frame=news_detail&id=<?php echo $row['id']?>" title="<?php echo $row['name']?>"></a></td>
												  <td width="73%" valign="top"><a href="./?frame=news_detail&id=<?php echo $row['id']?>" class="link5"><?php echo $row['name']?></a></td>
										</tr>
										<tr>
										  <td valign="top" class="style19"><?php echo $row['detail_short']?></td>
										</tr>
										<tr>
										  <td valign="bottom" class="style19" style="padding-top:5px"><a href="./?frame=news_detail&id=<?php echo $row['id']?>">
										  	<img src="images/more.gif" width="49" height="11" border="0"/></a></td>
										</tr>
                           		 </table>
								<?php }
								?>													  
						  	
						  </td>
                        </tr>
						<tr><td height="20px"></td></tr>	
						<?php $code = $_lang == 'vn' ? 'vn_news' : 'en_news';
						$parentWhere = "and parent = (select id from tbl_content_category where code='".$code."')";						
						$parentRecord = getRecord("tbl_content","1=1 ".$parentWhere);						
						$cat = killInjection($_REQUEST['cat']);
						if ($cat=='') $cat = $parentRecord['parent'];
						$per_page = 1;
						$p=1;
						$p1=5;
						if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);						
						$sql = "select * from tbl_content where status=0 $parentWhere order by sort,date_added desc limit ".$per_page*$p.",".$p1;
						$result = @mysql_query($sql,$conn);
						while($row=mysql_fetch_assoc($result)){
						?>
						 <tr>
							 <td style="padding:2px 0px 2px 0px"><img src="images/icon_2.gif" width="17" height="6" />
								<a href="./?frame=news_detail&id=<?php echo $row['id']?>" class="link6"><?php echo $row['name']?></a> 
								<em class="style23">(<?php echo dateFormat($row['last_modified'])?>)</em><br /> 								
							 </td>
						 </tr>
						<?php }?>	
		</table></td>
		</tr>
	</table></td>
  </tr>
</table>