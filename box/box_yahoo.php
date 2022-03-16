<table width="180" border="0" cellspacing="0" cellpadding="0">
<?php $code = $_lang=='vn' ? "vn_yahoo" : "vn_yahoo";
$sql = "select * from tbl_content where status=0 and parent in (select id from tbl_content_category where code='".$code."') order by sort, date_added";
$result = @mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($result)){
?>
  <tr><td align="center" style="padding-bottom:2px; padding-top:2px"><?php echo $row['name']?></td></tr>	
  <tr>
	<td height="25" align="center" valign="middle" style="padding-bottom:2px"><a href="ymsgr:sendIM?<?php echo $row['code']?>">
		<img border="0" src="http://mail.opi.yahoo.com/online?u=<?php echo $row['code']?>&m=g&t=2" alt="<?php echo $row['name']?>"></a></td>
  </tr>	    
<?php }?>		 
</table>