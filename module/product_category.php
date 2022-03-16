<link href="../css/css.css" rel="stylesheet" type="text/css" />
<table width="195"  border="0" cellspacing="0" cellpadding="0">	
<?php $catinfo= getRecord("tbl_product_category","id=".$cat);

$parentCode = $_lang=='vn'?'vn':'en';
$sqlParent = "select * from tbl_product_category where status=0 and parent=(select id from tbl_product_category where code='".$parentCode."') order by sort, date_added";
$resultParent = mysql_query($sqlParent,$conn);
while($rowParent = mysql_fetch_assoc($resultParent)){
	$isHaveChild = isHaveChild("tbl_product_category", $rowParent['id'])?0:1;
?>
<?php if($_REQUEST['frame']=='product_detail'){
	$catinfo = getRecord("tbl_product_category","id = (select parent from tbl_product where id=".$_REQUEST['id'].")");
}
?>
	<tr id="menu_cat<?php echo $rowParent['id']?>" <?php echo $catinfo['parent']!=$rowParent['id']?'':''?>>
		<td valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">				
<?php $sqlChild = "select * from tbl_product_category where status=0 and parent='".$rowParent['id']."' order by sort, date_added";
$resultChild = mysql_query($sqlChild,$conn);
while($rowChild = mysql_fetch_assoc($resultChild)){
?>				
	<tr>
        <td class="style6"><img src="images/icon_1.gif" width="25" height="9" /><a href="./?frame=product&cat=<?php echo $rowChild['id']?>" class="link2"><?php echo $rowChild['name']?></a></td>
    </tr>				
<?php }?>
			</table>
		</td>
	</tr>	
<?php }?>
</table>
