<?php $code = $_lang == 'vn' ? 'vn_contact' : 'en_contact';
$parentWhere = "parent = (select id from tbl_content_category where code='$code')";
$introRecord = getRecord("tbl_content",$parentWhere);
?>
<table width="160" border="0" align="center">
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
