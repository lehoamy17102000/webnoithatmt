<?php $code = $_lang == 'vn' ? 'vn_intro' : 'en_intro';
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
<table align="center" border="0" width="98%" cellspacing="0" cellpadding="5">	
	<tr>
		<td style="padding-top:10px">
			<?php echo $row['detail_short']?>
		</td>
    </tr>
</table>
<?php }?>