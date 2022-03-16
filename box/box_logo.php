<link href="../css/css.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php $code = $_lang=='vn' ? "vn_logo" : "en_logo";
$sql = "select * from tbl_content where status=0 and parent in (select id from tbl_content_category where code='".$code."') order by sort, date_added";
$result = @mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($result)){
	if($row['image']!=''){
?>

<tr>
  <td align="center"><a href="<?php echo $row['code']?>" target="_blank">
  	<img border="0" src="<?php echo $row['image']?>" height="100px"></a></td>
</tr>
<?php }
}
?>
</table>