<?php // Config
$codeSelect = $multiLanguage == 0 ? "code='".$_lang."_download'" : "code='vn_download' or code='en_download'";
$tableCategoryConfig = 'tbl_content_category';
$tableConfig         = 'tbl_content';
$actConfig           = 'download';
$firstWhere          = "parent in (select id from $tableCategoryConfig where $codeSelect)";
$arraySourceCombo    = getArrayCombo($tableCategoryConfig,'id','name',$codeSelect);
?>

<?php $errMsg =''?>
<?php switch ($_GET['action']){
	case 'del' :
		$id = $_GET['id'];
		$r = getRecord($tableConfig,"id=".$id);
		@$result = mysql_query('delete from '.$tableConfig.' where id="'.$id.'"',$conn);
		if ($result){
			if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
			if(file_exists('../'.$r['image_large'])) @unlink('../'.$r['image_large']);
			$errMsg = 'Đã xóa thành công.';
		}else $errMsg = 'Không thể xóa dữ liệu !';
		break;
}

if (isset($_POST['btnDel'])){
	$cntDel=0;
	$cntNotDel=0;
	if($_POST['chk']!=''){
		foreach ($_POST['chk'] as $id){
			$r = getRecord($tableConfig,"id=".$id);
			@$result = mysql_query('delete from '.$tableConfig.' where id="'.$id.'"',$conn);
			if ($result){
				if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
				if(file_exists('../'.$r['image_large'])) @unlink('../'.$r['image_large']);
				$cntDel++;
			}else $cntNotDel++;
		}
		$errMsg = 'Đã xóa '.$cntDel.' phần tử.<br><br>';
		$errMsg .= $cntNotDel>0 ? 'Không thể xóa '.$cntNotDel.' phần tử.<br>' : '';
	}else{
		$errMsg = 'Hãy chọn trước khi xóa !';
	}
}

$page = $_GET['page'];
$p=0;
if ($page!='') $p=$page;
$where = $firstWhere;
if ($_REQUEST['cat']!='') $where='parent='.$_REQUEST['cat']?>
<form method="POST" action="./" name="frmForm" enctype="multipart/form-data">
<input type="hidden" name="page" value="<?php echo $page?>">
<input type="hidden" name="act" value="<?php echo $actConfig ?>">
<?php $pageindex = createPage(countRecord($tableConfig,$where),'./?act='.$actConfig.'&cat='.$_REQUEST['cat'].'&page=',$MAXPAGE,$page)?>

<?php if ($_REQUEST['code']==1) $errMsg = 'Cập nhật thành công.'?>

<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td height="30" class="smallfont">Trang : <?php echo $pageindex?></td>
		<td align="right" class="smallfont">
			<?php echo comboCategory('ddCat',$arraySourceCombo,'smallfont',$_REQUEST['cat'],1)?>
			<input type="button" value="Chuyển" class="button" 
				onClick="window.location='./?act=<?php echo $actConfig?>&cat='+ddCat.value">
		</td>
	</tr>
</table>

<table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
	  <th width="35" class="title"><input type="checkbox" name="chkall" onClick="chkallClick(this);"></th>
		<th class="title"></th>
		<th width="44" class="title"><a class="title" href="<?php echo getLinkSort(1)?>">ID</a></th>
		<th width="179" class="title"><a class="title" href="<?php echo getLinkSort(3)?>">Tên </a></th>
		<th width="95" class="title"><a class="title" href="<?php echo getLinkSort(8)?>">Bảng giá</a></th>
		<th width="141" class="title"><a class="title" href="<?php echo getLinkSort(10)?>">Thứ tự sắp xếp</a></th>
		<th width="98" class="title"><a class="title" href="<?php echo getLinkSort(11)?>">Không hiển thị</a></th>
		<th width="150" class="title"><a class="title" href="<?php echo getLinkSort(12)?>">Ngày tạo lập</a></th>
		<th width="156" class="title"><a class="title" href="<?php echo getLinkSort(13)?>">Lần hiệu chỉnh trước</a></th>
		<th width="90" class="title"><a class="title" href="<?php echo getLinkSort(14)?>">Ngôn ngữ</a></th>
	</tr>
  
<?php $sortby = 'order by date_added';
if ($_REQUEST['sortby']!='') $sortby='order by '.(int)$_REQUEST['sortby'];
$direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?'desc':'');

$sql="select *,DATE_FORMAT(date_added,'%d/%m/%Y %h:%i') as dateAdd,DATE_FORMAT(last_modified,'%d/%m/%Y %h:%i') as dateModify from $tableConfig where $where $sortby $direction limit ".($p*$MAXPAGE).",".$MAXPAGE;
$result=mysql_query($sql,$conn);
$i=0;
while($row=mysql_fetch_array($result)){
	$parent = getRecord($tableCategoryConfig,'id = '.$row['parent']);
	$color = $i++%2 ? '#d5d5d5' : '#e5e5e5'?>
  
	<tr>
		<td align="center" bgcolor="<?php echo $color?>" class="smallfont">
		<input type="checkbox" name="chk[]" value="<?php echo $row['id']?>"></td>
		<td width="35" align="center" bgcolor="<?php echo $color?>" class="smallfont">
			<a href="./?act=<?php echo $actConfig ?>_m&cat=<?php echo $_REQUEST['cat']?>&page=<?php echo $_REQUEST['page']?>&id=<?php echo $row['id']?>">Sửa</a>		</td>
		<!--<td width="29" align="center" bgcolor="<?php echo $color?>" class="smallfont">
			<a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');" 
				href="./?act=<?php echo $actConfig ?>&action=del&page=<?php echo $_REQUEST['page']?>&id=<?php echo $row['id']?>">Xóa</a></td>-->			
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['id']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont"><?php echo $row['name']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['image']!='' ? '...':'&nbsp;'?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['sort']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center">
			<input type="checkbox" disabled <?php echo $row['status']>0?'checked':''?>>
		</td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['dateAdd']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['dateModify']?></td>
		<td bgcolor="<?php echo $color?>" class="smallfont" align="center"><?php echo $row['lang']?></td>
	</tr>
<?php }
?>
</table>
<input type="submit" value="Xóa chọn" name="btnDel" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button">
<!--<input type="button" value="Thêm mới" name="btnNew" onClick="window.location='./?act=<?php echo $actConfig?>_m&page=<?php echo $_REQUEST['page']?>&cat=<?php echo $_REQUEST['cat']?>'" class="button">-->
</form>
<script language="JavaScript">
function chkallClick(o) {
  	var form = document.frmForm;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="chkall") {
			form.elements[i].checked = document.frmForm.chkall.checked;
		}
	}
}
</script>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>

<table width="100%">
	<tr><td height="10"></td></tr>
	<tr><td class="smallfont"><?php echo 'Tổng số hàng : <b>'.countRecord($tableConfig,$firstWhere).'</b>'?></td></tr>
</table>