<?php $code = $_lang == 'vn' ? 'vn_contact' : 'en_contact';
$parentWhere = "parent = (select id from tbl_content_category where code='$code')";
$introRecord = getRecord("tbl_content",$parentWhere);
echo $introRecord['detail_short'];
?>
