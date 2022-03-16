<script type="text/javascript" src="../jscripts/FCKeditor/fckeditor.js"></script>
    <script type="text/javascript">
      window.onload = function()
      {
        var oFCKeditor = new FCKeditor( 'txtDetailShort' ) ;
        oFCKeditor.BasePath = "../jscripts/FCKeditor/" ;
		oFCKeditor.Width = "720" ; 
		oFCKeditor.Height = "300" ; 
        oFCKeditor.ReplaceTextarea() ;	
      }
</script>

<?php // Config
$tableCategoryConfig = 'tbl_product_category';
$tableConfig         = 'tbl_product';
$actConfig           = 'product';
$parentWhereConfig   = 'parent<>0';

$path = "../images/product";
$pathdb = "images/product";

?>
<?php if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
	echo '<script language="javascript" src="../lib/scripts/editor.js"></script>';

else
	echo '<script language="javascript" src="../lib/scripts/moz/editor.js"></script>';
?>



<script language="javascript">

function btnSave_onclick(){
	if(test_empty(document.frmForm.txtName.value)){
		alert('Hãy nhập "tên" !');
		document.frmForm.txtName.focus();
		return false;

	}	
	if(test_integer(document.frmForm.txtSort.value)){
		alert('"Thứ tự sắp xếp" phải là số !');
		document.frmForm.txtSort.focus();
		return false;
	}
	return true;
}

</script>

<?php $errMsg =''?>

<?php if (isset($_POST['btnSave'])){
	$code          = isset($_POST['txtCode']) ? trim($_POST['txtCode']) : '';
	$name          = isset($_POST['txtName']) ? trim($_POST['txtName']) : '';
	$price         = isset($_POST['txtPrice']) ? trim($_POST['txtPrice']) : 0;
	$parent        = $_POST['ddCat'];
	$subject       = isset($_POST['txtSubject']) ? trim($_POST['txtSubject']) : '';
	$detail_short  = isset($_POST['txtDetailShort']) ? trim($_POST['txtDetailShort']) : '';
	$detail        = isset($_POST['txtDetail']) ? trim($_POST['txtDetail']) : ''; 
	$sort          = isset($_POST['txtSort']) ? trim($_POST['txtSort']) : 0;
	$status        = $_POST['chkStatus']!='' ? 1 : 0;	

	$catInfo       = getRecord($tableCategoryConfig, 'id='.$parent);
	$lang          = $catInfo['lang'];

	if ($name=="") $errMsg .= "Hãy nhập tên danh mục !<br>";
	$errMsg .= checkUpload($_FILES["txtImage"],".jpg;.gif;.bmp;.png",500*1024,0);
	$errMsg .= checkUpload($_FILES["txtImageLarge"],".jpg;.gif;.bmp;.png",500*1024,0);

	if ($errMsg==''){
		if (!empty($_POST['id'])){
			$oldid = $_POST['id'];
			$sql = "update ".$tableConfig." set code='".$code."',name='".$name."', parent='".$parent."',subject='".$subject."',detail_short='".$detail_short."',detail='".$detail."', sort='".$sort."', status='".$status."',last_modified=now(), lang='".$lang."',price='".$price."' where id='".$oldid."'";

		}else{

			$sql = "insert into ".$tableConfig." (code, name, parent, subject, detail_short, detail, sort, status,  date_added, last_modified, lang,price) values ('".$code."','".$name."','".$parent."','".$subject."','".$detail_short."','".$detail."','".$sort."','".$status."',now(),now(),'".$lang."','".$price."')";

		}

		if (mysql_query($sql,$conn)){
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
			$r = getRecord($tableConfig,"id=".$oldid);

			$sqlUpdateField = "";
			if ($_POST['chkClearImg']==''){
				$extsmall=getFileExtention($_FILES['txtImage']['name']);
				if (makeUpload($_FILES['txtImage'],"$path/".$actConfig."_s".$oldid.$extsmall)){
					@chmod("$path/".$actConfig."_s".$oldid.$extsmall, 0777);
					$sqlUpdateField = " image='$pathdb/".$actConfig."_s".$oldid.$extsmall."' ";
				}

			}else{

				if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);

				$sqlUpdateField = " image='' ";

			}
			
			if ($_POST['chkClearImgLarge']==''){
				$extlarge=getFileExtention($_FILES['txtImageLarge']['name']);
				if (makeUpload($_FILES['txtImageLarge'],"$path/".$actConfig."_l".$oldid.$extlarge)){
					@chmod("$path/".$actConfig."_l".$oldid.$extlarge, 0777);
					if($sqlUpdateField != "") $sqlUpdateField .= ",";
					$sqlUpdateField .= " image_large='$pathdb/".$actConfig."_l".$oldid.$extlarge."' ";
				}
			}else{
				if(file_exists('../'.$r['image_large'])) @unlink('../'.$r['image_large']);
				if($sqlUpdateField != "") $sqlUpdateField .= ",";
				$sqlUpdateField .= " image_large='' ";
		}
			if($sqlUpdateField!='')	{
				$sqlUpdate = "update ".$tableConfig." set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
		}else{
			$errMsg = "Không thể cập nhật !";
		}
	}
	if ($errMsg == '')
		echo '<script>window.location="./?act='.$actConfig.'&cat='.$_REQUEST['cat'].'&page='.$_REQUEST['page'].'&code=1"</script>';

}else{
	if (isset($_GET['id'])){
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from ".$tableConfig." where id='".$oldid."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			$code          = $row['code'];
			$name          = $row['name'];
			$parent        = $row['parent'];
			$subject       = $row['subject'];
			$detail_short  = $row['detail_short'];
			$detail        = $row['detail'];
			$image         = $row['image'];
			$image_large   = $row['image_large'];
			$sort          = $row['sort'];
			$status        = $row['status'];
			$date_added    = $row['date_added'];
			$last_modified = $row['last_modified'];
			$price         = $row['price'];
		}
	}
}
?>

<form method="post" name="frmForm" enctype="multipart/form-data" action="./">
<input type="hidden" name="act" value="<?php echo $actConfig?>_m">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page']?>">

<table border="1" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tr>
    	<td>
   		<table border="0" cellpadding="2" bordercolor="#111111" width="100%" cellspacing="0">
			<tr><td height="10"></td></tr>
			<tr>
				<td colspan="3" align="center">
					<table width="100%">
						<?php if($image!='' || $image_large!=''){?>
						<tr>

								<td width="15%"></td>

							<td width="40%" align="center" class="smallfont">
<?php if ($image!=''){ echo '<img border="0" src="../'.$image.'" width="100"><br><br>Hình nhỏ';}?>								</td>

								

								<td width="40%" align="center" class="smallfont">

<?php if ($image_large!=''){ echo '<img border="0" src="../'.$image_large.'" width="100"><br><br>Hình lớn';}?>								</td>

								<td width="15%"></td>
					  </tr>

							<?php }else{echo '<tr><td colspan="3" class="smallfont" align="center">Chưa có hình ảnh</td></tr>';}?>

							<tr><td colspan="4" height="10"></td></tr>

							<tr><td colspan="4" height="1" bgcolor="#999999"></td></tr>

							<tr><td colspan="4" height="10"></td></tr>
				  </table>					</td>
		  </tr> 		  		     						
				<tr>
					<td width="15%" class="smallfont" align="right">Tên sản phẩm</td>
					<td width="1%" class="smallfont" align="center"><font color="#FF0000">*</font></td>
					<td width="83%" class="smallfont">
						<input value="<?php echo $name?>" type="text" name="txtName" class="textbox" size="34">	</td>
				</tr>
				<tr>
					<td width="15%" class="smallfont" align="right">Mã sản phẩm</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input value="<?php echo $code?>" type="text" name="txtCode" class="textbox" size="34">	</td>
				</tr>
				<tr>
					<td width="15%" class="smallfont" align="right">Giá</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input value="<?php echo $price?>" type="text" name="txtPrice" class="textbox" size="34">&nbsp;<font color="#FF0000"><b><?php echo $currencyUnit?></b></font>				</td>
				</tr>
				<!--<tr>
        			<td width="15%" class="smallfont" align="right">Trọng lượng</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $subject?>" type="text" name="txtSubject" class="textbox" size="34">					</td>
      			</tr>-->			
				<tr><td height="10px"></td></tr>
				<tr>
					<td width="15%" class="smallfont" align="right">Hình nhỏ</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="file" name="txtImage" class="textbox" size="34">
						<input type="checkbox" name="chkClearImg" value="on"> Xóa bỏ hình ảnh					</td>
				</tr>
				
				<tr>

					<td width="15%" class="smallfont" align="right">Hình lớn</td>

					<td width="1%" class="smallfont" align="center"></td>

					<td width="83%" class="smallfont">

						<input type="file" name="txtImageLarge" class="textbox" size="34">

						<input type="checkbox" name="chkClearImgLarge" value="on"> Xóa bỏ hình ảnh					</td>
				</tr>
				
				<tr>
					<td width="15%" class="smallfont" align="right">Thông tin chi tiết</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">						 
						<textarea name="txtDetailShort" cols="80" rows="10" id="txtDetailShort"><?php echo $detail_short?></textarea>					 </td>
				</tr>				
				<tr><td height="10px"></td></tr>																			
				<tr>
					<td width="15%" class="smallfont" align="right">Thuộc danh mục</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<?php echo comboCategory('ddCat',getArrayCategoryChild('tbl_product_category'),'smallfont',$parent,0)?>					</td>
				</tr>
				<tr>
					<td width="15%" class="smallfont" align="right">Thứ tự sắp xếp</td>
					<td width="1%" class="smallfont" align="right"></td>
					<td width="83%" class="smallfont">
						<input value="<?php echo $sort?>" type="text" name="txtSort" class="textbox" size="15">					</td>
				</tr>
				<tr>
					<td width="15%" class="smallfont" align="right">Không hiển thị</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="checkbox" name="chkStatus" value="on" <?php if ($status>0) echo 'checked' ?>>			</td>
				</tr>
				
				<tr>
					<td width="15%" class="smallfont"></td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont"><input type="submit" name="btnSave" value="Cập nhật" class="button" onclick="return btnSave_onclick()" />

				    <input type="reset" class="button" value="Nhập lại">					</td>
				</tr>
		  </table>
		</td>
	</tr>
</table>
</form>

<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>