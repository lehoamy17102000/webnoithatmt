<?php $request = $_REQUEST['frame'];
$code = $_lang == 'vn' ? 'vn_'.$request : 'en_'.$request;
$parentWhere = "parent = (select id from tbl_content_category where code='$code')";
$record = getRecord("tbl_content",$parentWhere);
?>
	<?php echo $record['detail_short']?>
