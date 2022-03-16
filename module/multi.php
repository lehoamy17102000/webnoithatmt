<table align="center" cellSpacing="0" cellPadding="0" width="100%" border="0">
	<tr><td height="10"></td></tr>
</table>
<?php $request = $_REQUEST['frame'];
$code = $_lang == 'vn' ? 'vn_'.$request : 'en_'.$request;
$parentWhere = "and parent = (select id from tbl_content_category where code='$code')";

$parentRecord = getRecord("tbl_content","1=1 ".$parentWhere);

$cat = killInjection($_REQUEST['cat']);
if ($cat=='') $cat = $parentRecord['parent'];
$per_page = 5;
$p=0;
if ($_REQUEST['p']!='') $p=killInjection($_REQUEST['p']);

$total = countRecord("tbl_content","status=0 and parent=".$cat);
if($total==0){
?>
<table align="center" cellSpacing="0" cellPadding="0" width="100%" border="0">
	<tr><td height="20"></td></tr>
	<tr>
		<td align="center">
			<font color="#993300"><b><?php echo $_lang=="vn"?'Dữ liệu đang cập nhật !':'Data are being updated !'?></b></font>
		</td>
	</tr>
	<tr><td height="20"></td></tr>
</table>
<?php }else{

$sql = "select * from tbl_content where status=0 $parentWhere order by sort,date_added desc limit ".$per_page*$p.",".$per_page;
$result = @mysql_query($sql,$conn);
while($row=mysql_fetch_assoc($result)){
?>
<table align="center" border="0" width="98%" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<font color="#09B3CC">
			<b><a class="a2" href="./?frame=<?php echo $request?>_detail&id=<?php echo $row['id']?>">
				<?php echo $row['subject']?></a></b></font>
		</td>
	</tr>
	<tr><td height="5"></td></tr>
	<tr>
		<td>
			<?php if($row['image']){?>
			<a href="./?frame=<?php echo $request?>_detail&id=<?php echo $row['id']?>">
			<img border="0" src="<?php echo $row['image']?>" width="120" align="left" hspace="10">
			</a>
			<?php }?>
			<font color="#999999"><?php echo dateFormat($row['date_added'], $_lang)?></font><br>
			<?php echo $row['detail_short']?>
		</td>
	</tr>
	<tr>
		<td align="right">
			<a href="./?frame=<?php echo $request?>_detail&id=<?php echo $row['id']?>">
				<font color="#FF0000"><b>» <?php echo $_lang=="vn" ? "xem tiếp" : "More"?></b></font>
			</a>
		</td>
	</tr>
	<tr><td height="10"></td></tr>
</table>
<?php }?>


<table align="center" cellSpacing="0" cellPadding="0" width="98%" border="0">
	<tr><td><hr align="center" color="#1A76B7" size="1"></td></tr>
</table>

<table align="center" cellSpacing=0 cellPadding=0 width="98%" border=0>
<?php $rowPage       = $_lang=="vn" ? "tin" : "news";
$pagePage       = $_lang=="vn" ? "Trang" : "Page";
$titleFirst     = $_lang=="vn" ? "Đầu Tiên" : "First";
$titlePrevious  = $_lang=="vn" ? "Về trước" : "Previous";
$titleNext      = $_lang=="vn" ? "Tiếp theo" : "Next";
$titleLast      = $_lang=="vn" ? "Cuối cùng" : "Last";

$pages = countPages($total,$per_page);
echo '<tr><td colspan="2" align="center"></td></tr>';
echo '<tr><td class="smallfont" align="left"><b>'.$total.'</b> '.$rowPage.'</td>';
echo '<td class="smallfont" align="right">'.$pagePage.' : ';
$param="";
if ($p>1) echo '<a class="aLink3" title="'.$titleFirst.'" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p=0">[&lt;&lt;]</a> ';
if ($p>0) echo '<a class="aLink3" title="'.$titlePrevious.'" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p-1).'">[&lt;]</a> ';
$from=($p-10>0?$p-10:0);
$to=($p+10<$pages?$p+10:$pages);
for ($i=$from;$i<$to;$i++){
	if ($i!=$p) echo '<a class="aLink3" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.$i.'">'.($i+1).' </a>';
	else echo '<b>'.($i+1).'</b> ';
}
if ($p<$i-1) echo '<a class="aLink3" title="'.$titleNext.'" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($p+1).'">[&gt;]</a> ';
if ($p<$pages-1) echo '<a class="aLink3" title="'.$titleLast.'" href="./?frame='.$_REQUEST['frame'].'&cat='.$_REQUEST['cat'].'&'.$param.'&p='.($pages-1).'">[&gt;&gt;]</a>'; 
echo '</td></tr>';
?>
</table><br>

<?php }?>