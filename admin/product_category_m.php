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
	
	document.forms.frmForm.elements.txtSubject.value = oEdit0.getHTMLBody();
	document.forms.frmForm.elements.txtDetailShort.value = oEdit1.getHTMLBody();
	document.forms.frmForm.elements.txtDetail.value = oEdit2.getHTMLBody();
	
	return true;
}
</script>

<?php $errMsg =''?>
<?php $path = "../images/product";
$pathdb = "images/product";
if (isset($_POST['btnSave'])){
	$code          = isset($_POST['txtCode']) ? trim($_POST['txtCode']) : '';
	$name          = isset($_POST['txtName']) ? trim($_POST['txtName']) : '';
	$parent        = $_POST['ddCat'];
	$subject       = isset($_POST['txtSubject']) ? trim($_POST['txtSubject']) : '';
	$detail_short  = isset($_POST['txtDetailShort']) ? trim($_POST['txtDetailShort']) : '';
	$detail        = isset($_POST['txtDetail']) ? trim($_POST['txtDetail']) : '';
	$sort          = isset($_POST['txtSort']) ? trim($_POST['txtSort']) : 0;
	$status        = $_POST['chkStatus']!='' ? 1 : 0;
	
	$catInfo       = getRecord('tbl_product_category', 'id='.$parent);
	if(!$multiLanguage){
		$lang      = $catInfo['lang'];
	}else{
		$lang      = $catInfo['lang'] != '' ? $catInfo['lang'] : $_POST['cmbLang'];
	}

	if ($name=="") $errMsg .= "Hãy nhập tên danh mục !<br>";
	$errMsg .= checkUpload($_FILES["txtImage"],".jpg;.gif;.bmp",500*1024,0);
	$errMsg .= checkUpload($_FILES["txtImageLarge"],".jpg;.gif;.bmp",500*1024,0);

	if ($errMsg==''){
		if (!empty($_POST['id'])){
			$oldid = $_POST['id'];
			$sql = "update tbl_product_category set code='".$code."',name='".$name."', parent='".$parent."',subject='".$subject."',detail_short='".$detail_short."',detail='".$detail."', sort='".$sort."', status='".$status."',last_modified=now(), lang='".$lang."' where id='".$oldid."'";
		}else{
			$sql = "insert into tbl_product_category (code, name, parent, subject, detail_short, detail, sort, status,  date_added, last_modified, lang) values ('".$code."','".$name."','".$parent."','".$subject."','".$detail_short."','".$detail."','".$sort."','".$status."',now(),now(),'".$lang."')";
		}
		if (mysql_query($sql,$conn)){
			if(empty($_POST['id'])) $oldid = mysql_insert_id();
			$r = getRecord("tbl_product_category","id=".$oldid);
			
			$sqlUpdateField = "";
			
			if ($_POST['chkClearImg']==''){
				$extsmall=getFileExtention($_FILES['txtImage']['name']);
				if (makeUpload($_FILES['txtImage'],"$path/product_category_s$oldid$extsmall")){
					@chmod("$path/product_category_s$oldid$extsmall", 0777);
					$sqlUpdateField = " image='$pathdb/product_category_s$oldid$extsmall' ";
				}
			}else{
				if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
				$sqlUpdateField = " image='' ";
			}
			
			if ($_POST['chkClearImgLarge']==''){
				$extlarge=getFileExtention($_FILES['txtImageLarge']['name']);
				if (makeUpload($_FILES['txtImageLarge'],"$path/product_category_l$oldid$extlarge")){
					@chmod("$path/product_category_l$oldid$extlarge", 0777);
					if($sqlUpdateField != "") $sqlUpdateField .= ",";
					$sqlUpdateField .= " image_large='$pathdb/product_category_l$oldid$extlarge' ";
				}
			}else{
				if(file_exists('../'.$r['image_large'])) @unlink('../'.$r['image_large']);
				if($sqlUpdateField != "") $sqlUpdateField .= ",";
				$sqlUpdateField .= " image_large='' ";
			}
			
			if($sqlUpdateField!='')	{
				$sqlUpdate = "update tbl_product_category set $sqlUpdateField where id='".$oldid."'";
				mysql_query($sqlUpdate,$conn);
			}
		}else{
			$errMsg = "Không thể cập nhật !";
		}
	}

	if ($errMsg == '')
		echo '<script>window.location="./?act=product_category&cat='.$_REQUEST['cat'].'&page='.$_REQUEST['page'].'&code=1"</script>';
}else{
	if (isset($_GET['id'])){
		$oldid=$_GET['id'];
		$page = $_GET['page'];
		$sql = "select * from tbl_product_category where id='".$oldid."'";
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
		}
	}
}

?>
<pre id="idTemporary0" name="idTemporary0" style="display:none">
<?php if(isset($subject)){echo $subject;}?>
</pre>

<pre id="idTemporary1" name="idTemporary1" style="display:none">
<?php if(isset($detail_short)){echo $detail_short;}?>
</pre>

<pre id="idTemporary2" name="idTemporary2" style="display:none">
<?php if(isset($detail)){echo $detail;}?>
</pre>

<form method="post" name="frmForm" enctype="multipart/form-data" action="./">
<input type="hidden" name="txtSubject" id="txtSubject">
<input type="hidden" name="txtDetailShort" id="txtDetailShort">
<input type="hidden" name="txtDetail" id="txtDetail">

<input type="hidden" name="act" value="product_category_m">
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page']?>">
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#0069A8" width="100%">
	<tr>
    	<td width="45%">
    		<table border="0" cellpadding="2" bordercolor="#111111" width="100%" cellspacing="0">
				<tr><td height="10"></td></tr>
				<!--<tr>
					<td colspan="3" align="center">
						<table width="100%">
							<?php if($image!='' || $image_large!=''){?>
							<tr>
								<td width="15%"></td>
								<td width="40%" align="center" class="smallfont">
<?php if ($image!=''){ echo '<img border="0" src="../'.$image.'"><br><br>Hình (kích thước nhỏ)';}?>
								</td>
								
								<td width="40%" align="center" class="smallfont">
<?php if ($image_large!=''){ echo '<img border="0" src="../'.$image_large.'"><br><br>Hình (kích thước lớn)';}?>
								</td>
								<td width="15%"></td>
							</tr>
							<?php }else{echo '<tr><td colspan="3" class="smallfont" align="center">Chưa có hình ảnh !</td></tr>';}?>
							<tr><td colspan="4" height="10"></td></tr>
							<tr><td colspan="4" height="1" bgcolor="#999999"></td></tr>
							<tr><td colspan="4" height="10"></td></tr>
						</table>
					</td>
				</tr>-->
        		
			  <!-- <tr>
        			<td width="15%" class="smallfont" align="right">Mã</td>
        			<td width="1%" class="smallfont" align="center"></td>
        			<td width="83%" class="smallfont">
						<input value="<?php echo $code?>" type="text" name="txtCode" class="textbox" size="34">
					</td>
      			</tr>-->
				
				<tr>
					<td width="15%" class="smallfont" align="right">Tên danh mục</td>
					<td width="1%" class="smallfont" align="center"><font color="#FF0000">*</font></td>
					<td width="83%" class="smallfont">
						<input value="<?php echo $name?>" type="text" name="txtName" class="textbox" size="34">
					</td>
				</tr>
				
				<!--<tr>
					<td width="15%" class="smallfont" align="right">Tiêu đề</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<script>
						var oEdit0 = new InnovaEditor("oEdit0");		
						oEdit0.arrStyle = [["BODY",false,"","font:10px verdana,arial,sans-serif;"]];
						oEdit0.width="100%";
						oEdit0.height=150;
						oEdit0.features=[
							"FullScreen","Search",
							"Cut","Copy","Paste","PasteWord","PasteText","|","Undo","Redo","|",
							"ForeColor","BackColor","|","Bookmark","Hyperlink",
							"CustomTag","HTMLSource","BRK","Numbering","Bullets","|","Indent","Outdent",
							"LTR","RTL","|","Image","Flash","Media","|","InternalLink","CustomObject","|",
							"Table","Guidelines","Absolute","|","Characters","Line",
							"Form","Clean","ClearAll","BRK",
							"StyleAndFormatting","TextFormatting","ListFormatting","BoxFormatting",
							"ParagraphFormatting","CssText","Styles","|",
							"Paragraph","FontName","FontSize","|",
							"Bold","Italic",
							"Underline","Strikethrough","|","Superscript","Subscript","|",
							"JustifyLeft","JustifyCenter","JustifyRight","JustifyFull"
						];
						oEdit0.cmdAssetManager="modalDialogShow('../assetmanager/assetmanager.php',640,465)";
						oEdit0.RENDER(document.getElementById("idTemporary0").innerHTML);
						</script>
					</td>
				</tr>-->
		
				<!--<tr>
					<td width="15%" class="smallfont" align="right">Hình (kích thước nhỏ)</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="file" name="txtImage" class="textbox" size="34">
						<input type="checkbox" name="chkClearImg" value="on"> Xóa bỏ hình ảnh
					</td>
				</tr>-->
				
				<!--<tr>
					<td width="15%" class="smallfont" align="right">Hình (kích thước lớn)</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="file" name="txtImageLarge" class="textbox" size="34">
						<input type="checkbox" name="chkClearImgLarge" value="on"> Xóa bỏ hình ảnh
					</td>
				</tr>-->
				
				<!--<tr>
					<td width="15%" class="smallfont" align="right">Mô tả ngắn</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<script>
						var oEdit1 = new InnovaEditor("oEdit1");		
						oEdit1.arrStyle = [["BODY",false,"","font:10px verdana,arial,sans-serif;"]];
						oEdit1.width="100%";
						oEdit1.height=200;
						oEdit1.features=[
							"FullScreen","Search",
							"Cut","Copy","Paste","PasteWord","PasteText","|","Undo","Redo","|",
							"ForeColor","BackColor","|","Bookmark","Hyperlink",
							"CustomTag","HTMLSource","BRK","Numbering","Bullets","|","Indent","Outdent",
							"LTR","RTL","|","Image","Flash","Media","|","InternalLink","CustomObject","|",
							"Table","Guidelines","Absolute","|","Characters","Line",
							"Form","Clean","ClearAll","BRK",
							"StyleAndFormatting","TextFormatting","ListFormatting","BoxFormatting",
							"ParagraphFormatting","CssText","Styles","|",
							"Paragraph","FontName","FontSize","|",
							"Bold","Italic",
							"Underline","Strikethrough","|","Superscript","Subscript","|",
							"JustifyLeft","JustifyCenter","JustifyRight","JustifyFull"
						];
						oEdit1.cmdAssetManager="modalDialogShow('../assetmanager/assetmanager.php',640,465)";
						oEdit1.RENDER(document.getElementById("idTemporary1").innerHTML);
						</script>
					</td>
				</tr>-->
				
				<!--<tr>
					<td width="15%" class="smallfont" align="right">Thông tin chi tiết</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<script>
						var oEdit2= new InnovaEditor("oEdit2");		
						oEdit2.arrStyle = [["BODY",false,"","font:10px verdana,arial,sans-serif;"]];
						oEdit2.width="100%";
						oEdit2.height=400;
						oEdit2.features=[
							"FullScreen","Search",
							"Cut","Copy","Paste","PasteWord","PasteText","|","Undo","Redo","|",
							"ForeColor","BackColor","|","Bookmark","Hyperlink",
							"CustomTag","HTMLSource","BRK","Numbering","Bullets","|","Indent","Outdent",
							"LTR","RTL","|","Image","Flash","Media","|","InternalLink","CustomObject","|",
							"Table","Guidelines","Absolute","|","Characters","Line",
							"Form","Clean","ClearAll","BRK",
							"StyleAndFormatting","TextFormatting","ListFormatting","BoxFormatting",
							"ParagraphFormatting","CssText","Styles","|",
							"Paragraph","FontName","FontSize","|",
							"Bold","Italic",
							"Underline","Strikethrough","|","Superscript","Subscript","|",
							"JustifyLeft","JustifyCenter","JustifyRight","JustifyFull"
						];
						oEdit2.cmdAssetManager="modalDialogShow('../assetmanager/assetmanager.php',640,465)";
						oEdit2.RENDER(document.getElementById("idTemporary2").innerHTML);
						</script>
					</td>
				</tr>-->
				
				<tr>
					<td width="15%" class="smallfont" align="right">Thuộc danh mục</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<?php echo comboCategory('ddCat',getArrayCategory('tbl_product_category'),'smallfont',$parent,0)?>
					</td>
				</tr>
				
				<tr>
					<td width="15%" class="smallfont" align="right">Thứ tự sắp xếp</td>
					<td width="1%" class="smallfont" align="right"></td>
					<td width="83%" class="smallfont">
						<input value="<?php echo $sort?>" type="text" name="txtSort" class="textbox" size="12">
					</td>
				</tr>
				
				<tr>
					<td width="15%" class="smallfont" align="right">Không hiển thị</td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="checkbox" name="chkStatus" value="on" <?php echo $status>0?'checked':''?>>
					</td>
				</tr>
				
				<tr>
					<td width="15%" class="smallfont"></td>
					<td width="1%" class="smallfont" align="center"></td>
					<td width="83%" class="smallfont">
						<input type="submit" name="btnSave" VALUE="Cập nhật" class=button onclick="return btnSave_onclick()">
						<input type="reset" class=button value="Nhập lại">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
<?php if($errMsg!=''){echo '<p align=center class="err">'.$errMsg.'<br></p>';}?>