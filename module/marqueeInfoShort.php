<?php $code = $_lang == 'vn' ? 'vn_marquee' : 'en_marquee';
$parentWhere = "parent = (select id from tbl_content_category where code='$code')";
$marqueeRecord = getRecord("tbl_content",$parentWhere);
echo $marqueeRecord['detail_short'];
?>
