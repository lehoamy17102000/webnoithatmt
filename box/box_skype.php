<table width="196" align="center">
<?php $code = $_lang=='vn' ? "vn_skype" : "vn_skype";
$sql = "select * from tbl_content where status=0 and parent in (select id from tbl_content_category	 where code='".$code."') order by sort, date_added";
$result = @mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($result)){
?>	
	<tr><td style="padding-bottom:5px; padding-top:5px" align="center"><?php echo $row['name']?></td></tr>
	<tr>
		<td align="center">
			<a href="skype:<?php echo $row['code']?>?call">   
			<img src="http://download.skype.com/errors/i/images/logos/skype_logo.png" style="border: none;" width="119" height="49" alt="<?php echo $row['name']?>"/></a>		</td>
	</tr>	
<?php }?>	
</table>