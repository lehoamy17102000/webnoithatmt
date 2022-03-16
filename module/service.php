<?php $code = $_lang == 'vn' ? 'vn_service' : 'en_service';
$parentWhere = "and parent = (select id from tbl_content_category where code='$code')";

$parentRecord = getRecord("tbl_content","1=1 ".$parentWhere);

$cat1 = killInjection($_REQUEST['cat']);
if ($cat1=='') $cat1 = $parentRecord['parent'];
$p=0;
if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);

$sql = "select * from tbl_content where status=0 $parentWhere order by sort,date_added desc ";
$result = @mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($result)){
?>
<link href="../css/css.css" rel="stylesheet" type="text/css" />			  
<table align="center" border="0" width="98%" cellspacing="0" cellpadding="5">	
	<tr>
		<td class="menu_left">
			<a href="./?frame=service_detail&id=<?php echo $row['id']?>"><?php echo $row['name']?></a>
		</td>
    </tr>
</table>
<?php }?>

