<?php $row = getRecord("tbl_content", "id=".$_REQUEST['id'])?>
<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr><td height="22"><b><?php echo $row['subject']?></b></td></tr>
	
	<tr>
		<td style="padding-left:10px">					
			<?php echo $row['detail']?>
		</td>
	</tr>	
</table>
<br />
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a href="./?frame=booktour"><span style="color:#0000FF; font-family:tahoma;font-size:12px; font-weight:600"><?php echo $_lang=='vn'?'Đặt tour':'Book tour'?></span></a></td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right" style="padding-right:10px"><a href="javascript:history.back();"><?php echo $_lang == 'vn' ?'<span style="color:#0000FF; font-family:tahoma; font-size:12; font-weight:600">Quay lại</span>' : '<span style="color:#0000FF; font-family:tahoma; font-size:12; font-weight:600">Back</span>'?></a></td>
  </tr>
</table>
<br>

<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
	<tr><td height="20"></td></tr>
	<tr><td><hr align="center" color="#1A76B7" size="1"></td></tr>
	<tr>
	  <td><font color="#FF3300"><b><?php echo $_lang=="vn" ? "NHỮNG TIN KHÁC" : "ORTHER NEWS"?></b></font></td>
	</tr>
	<tr><td><hr align="center" color="#1A76B7" size="1"></td></tr>
</table>



<table align="center" border="0" width="98%" cellpadding="0" cellspacing="0">
<?php $parentRecord = getRecord("tbl_content_category","id=".$row['parent']);
$code = $parentRecord['code'];
$parentWhere = "and parent = (select id from tbl_content_category where code='$code')";

$sql = "select * from tbl_content where status=0 and date_added<'".$row['date_added']."' and parent=".$row['parent']." $parentWhere order by sort,date_added desc";
$result = @mysql_query($sql,$conn);
while($n=mysql_fetch_assoc($result)){
?>
	<tr>
		<td width="20"><img src="images/icon1.jpg" width="8" hspace="8" align="middle"></td>
		<td>
			<a class="aBlack" href="./?frame=<?php echo $_REQUEST['frame']?>&id=<?php echo $n['id']?>"><?php echo $n['subject']?></a>
			&nbsp;<font color="#999999">(<?php echo date('d/m/Y',strtotime($n['date_added']))?>)</font>
		</td>
	</tr>
	<tr><td height="5"></td></tr>
<?php }?>
</table><br>

