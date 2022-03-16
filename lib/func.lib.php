<?php //*********************************************************************************************************
//***************************************** Check PHP Version *********************************************
//echo 'Current PHP version: ' . phpversion();
if (phpversion()< "4.1.0") {
	$_GET = $HTTP_GET_VARS;
	$_POST = $HTTP_POST_VARS;
	$_SERVER = $HTTP_SERVER_VARS;
}
//*********************************************************************************************************
//************************************** Get email config *************************************************
$emailConfigRecord = getRecord("tbl_config","code='adminEmail'");
$adminEmail = $emailConfigRecord['detail'];
//*********************************************************************************************************
//*********************************** Get currency unit config ********************************************
$currencyUnitConfigRecord = getRecord("tbl_config","code='currencyUnit'");
$currencyUnit = $currencyUnitConfigRecord['detail'];
//*********************************************************************************************************
//************************************** Public Key Interface *********************************************
function mo ($g, $l) {
	return $g - ($l * floor ($g/$l));
}
function powmod ($base, $exp, $modulus){
	$accum = 1;
	$i = 0;
	$basepow2 = $base;
	while (($exp >> $i)>0) {
		if ((($exp >> $i) & 1) == 1) {
			$accum = mo(($accum * $basepow2) , $modulus);
		}
		$basepow2 = mo(($basepow2 * $basepow2) , $modulus);
		$i++;
	}
	return $accum;
}
function PKI_Encrypt ($m, $e, $n){
	$asci = array ();
	for ($i=0; $i<strlen($m); $i+=3) {
		$tmpasci="1";
		for ($h=0; $h<3; $h++) {
			if ($i+$h <strlen($m)) {
				$tmpstr = ord (substr ($m, $i+$h, 1)) - 30;
				if (strlen($tmpstr) < 2) {
					$tmpstr ="0".$tmpstr;
				}
			} else {
				break;
			}
			$tmpasci .=$tmpstr;
		}
		array_push($asci, $tmpasci."1");
	}
	$coded = '';
	for ($k=0; $k< count ($asci); $k++) {
		$resultmod = powmod($asci[$k], $e, $n);
		$coded .= $resultmod." ";
	}
	return trim($coded);
}
function PKI_Decrypt ($c, $d, $n) {
	$decryptarray = split(" ", $c);
	for ($u=0; $u<count ($decryptarray); $u++) {
		if ($decryptarray[$u] == "") {
			array_splice($decryptarray, $u, 1);
		}
	}
	for ($u=0; $u< count($decryptarray); $u++) {
		$resultmod = powmod($decryptarray[$u], $d, $n);
		$deencrypt.= substr ($resultmod,1,strlen($resultmod)-2);
	}
	for ($u=0; $u<strlen($deencrypt); $u+=2) {
		$resultd .= chr(substr ($deencrypt, $u, 2) + 30);
	}
	return $resultd;
}
//************************************************************************************************************
function killInjection($str){//HAM NAY LOAI BO CAC LENH INJECTION
	$bad = array("\\","=",":");
	$good = str_replace($bad,"", $str);
	return $good;
}
//************************************************************************************************************
//************************************************* PAGING ***************************************************
function countPages($total, $n){
	if($total%$n==0) return (int)($total/$n);
	return (int)($total/$n)+1;
}
function createPage($total,$link,$nitem,$itemcurrent,$step=10){
	if($total<1){return false;}
	global $conn;
	$ret="";
	$param="";
	$pages = countPages($total,$nitem);
	if ($itemcurrent>0) $ret.='<a title="&#272;&#7847;u ti&ecirc;n" href="'.$link.'0" class="lslink">[&lt;&lt;]</a> ';
	if ($itemcurrent>1) $ret.='<a title="V&#7873; tr&#432;&#7899;c" href="'.$link.($itemcurrent-1).'" class="lslink">[&lt;]</a> ';
	$from=($itemcurrent-$step>0?$itemcurrent-$step:0);
	$to=($itemcurrent+$step<$pages?$itemcurrent+$step:$pages);
	for ($i=$from;$i<$to;$i++){
		if ($i!=$itemcurrent) $ret.='<a href="'.$link.$i.'" class="lslink">'.($i+1).'</a> ';
		else $ret.='<b>'.($i+1).'</b> ';
	}
	if (($itemcurrent<$pages-2) && ($pages>1)) $ret.='<a title="Ti&#7871;p theo" href="'.$link.($itemcurrent+1).'">[&gt;]</a> ';
	if ($itemcurrent<$pages-1) $ret.='<a title="Cu&#7889;i c&ugrave;ng" href="'.$link.($pages-1).'">[&gt;&gt;]</a>'; 
	return $ret;
}
//************************************************************************************************************
//********************************************** SORT ********************************************************
function getLinkSort($order){
	$direction="";
	if ($_REQUEST['direction']==''||$_REQUEST['direction']!='0')
		$direction="0";
	else
		$direction="1";

	return "./?act=".$_REQUEST['act']."&cat=".$_REQUEST['cat']."&page=".$_REQUEST['page']."&sortby=".$order."&direction=".$direction;
}
//************************************************************************************************************
//************************************** file : upload *******************************************************
function getFileExtention($filename){  
    return strrchr($filename, ".");
}
function checkUpload($f,$ext="",$maxsize=0,$req=0){
	$fname=strtolower(basename($f['name']));
	$ftemp=$f["tmp_name"];
	$fsize=$f["size"];
	$fext=getFileExtention($fname);
	if($fsize==0){
		if ($req!=0) return "B&#7841;n ch&#432;a ch&#7885;n file !";
		return "";
	}else{
		if ($ext!="") if (strpos($ext, $fext)===false) 
			return "T&#7853;p tin kh&ocirc;ng &#273;&uacute;ng &#273;&#7883;nh d&#7841;ng : $fname";
		if ($maxsize>0) if ($fsize > $maxsize) 
			return "K&iacute;ch th&#432;&#7899;c h&igrave;nh ph&#7843;i nh&#7887; h&#417;n ".$maxsize." byte";
	}
	return "";
}
function makeUpload($f,$newfile){
	if (move_uploaded_file($f["tmp_name"], $newfile))	return $newfile;
	return false;
}
//************************************************************************************************************
function getRecord($table, $where='1=1'){
    global $conn;
    if ($table == '') return false;
	$result = mysql_query("select * from $table where $where limit 1",$conn);
	return @mysql_fetch_assoc($result);
}
function countRecord($table,$where=""){
	global $conn;
    if ($table=="") return false;
    if ($where=="") $where="1=1";
	$result = mysql_query("select count(*) as cnt from $table where $where",$conn);
	$row = @mysql_fetch_assoc($result);
	return $row['cnt'];
}
function dateFormat($dateField, $lang='vn'){
	if($dateField==''){return false;}
	$arrVN = array("Chủ nhật","Thứ Hai","Thứ Ba","Thứ tư","Thứ; năm","Thứ sáu","Thứ bảy");
	$arrEN = array("Sunday","Monday","Tueday","Wednesday","Thuday","Friday","Satuday");
	$date = strtotime($dateField);
	
	$arr = $lang=='vn'?$arrVN:$arrEN;
	
	return $arr[date('w',$date)].', '.date('d/m/Y, H:i',$date);
}

function getArrayCategory($table, $catid="", $split="="){
    global $conn;
    $hide = "status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret = array();
    if ($catid=="") $catid=2;
	$result = @mysql_query("select * from $table where $hide and parent=$catid",$conn);
	while($row=mysql_fetch_assoc($result)){
		$ret[] = array($row['id'],($catid==1?"":$split).$row['name']);
		$getsub = getArrayCategory($table, $row['id'], $split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}

function getArrayCategoryChild($table, $catid="", $split="="){
    global $conn;
    $hide = "status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret = array();
    if ($catid=="") $catid=77;
	$result = @mysql_query("select * from $table where $hide and parent=$catid",$conn);
	while($row=mysql_fetch_assoc($result)){
		$ret[] = array($row['id'],($catid==2?"":$split).$row['name']);
		$getsub = getArrayCategory($table, $row['id'], $split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}

function getArrayNews($table, $catid="", $split="="){
    global $conn;
    $hide = "status=0";
    if (isset($_SESSION['log'])) $hide="1=1";
    $ret = array();
    if ($catid=="") $catid=2;
	$result = mysql_query("select * from $table where $hide and parent=$catid",$conn);
	while($row=mysql_fetch_assoc($result)){
		$ret[] = array($row['id'],($catid==1?"":$split).$row['name']);
		$getsub = getArrayCategory($table, $row['id'], $split.$split);
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}

function getArrayCombo($table, $valueField, $textField, $where=""){
	global $conn;
	$ret = array();
	$hide = "status=0";
	$where = $where!="" ? $where : "1=1";
	$result = mysql_query("select $valueField,$textField from $table where $hide and $where",$conn);
	while($row=mysql_fetch_assoc($result)){
		$ret[] = array($row[$valueField],$row[$textField]);
	}
	return $ret;
}
function getArray($query){
    global $conn;
    	$result = mysql_query($query,$conn);
	while($row=mysql_fetch_assoc($result)){
		$ret[] = array($row['id'],($catid==0?"":$split).$row['name']);
		$getsub = getArrayCategory($table, $row['id'], $split.'===');
		foreach ($getsub as $sub)
			$ret[]=array($sub[0],$sub[1]);
	}
	return $ret;
}

function isHaveChild($table, $id){
	global $conn;
	$result = mysql_query("select * from $table where parent=$id",$conn);
	$numRow = mysql_num_rows($result);
	return $numRow > 0 ? true : false;
}
//************************************************************************************************************
//****************************************** combo out HTML **************************************************
function comboLanguage($name, $langSelected, $class){
	global $arrLanguage;
	$name = $name != '' ? $name : 'cmbLang';
	$out = '';
	$out .= '<select size="1" name="'.$name.'" class="'.$class.'">';
	foreach ($arrLanguage as $lang){
		if ($lang[0] == $langSelected)
			$out .= '<option value="'.$lang[0].'" selected>'.$lang[1].'</option>';
		else
			$out .= '<option value="'.$lang[0].'">'.$lang[1].'</option>';
	}
	$out .= '</select>';
	return $out;
}

// $name            : name of combobox
// $arrSource  : function return array ; example : getListCategory(), getListNewsCategory()
// $index           : paramater selected
// $all             : $all==1 => show [Tat ca]
function comboCategory($name, $arrSource, $class, $index, $all){
	$name = $name != '' ? $name : 'cmbParent';
	if(!$arrSource){return false;}
	$out = '';
	$out .= '<select size="1" name="'.$name.'" class="'.$class.'">';
	$out .= $all==1 ? '<option value="">[Tất cả]</option>' : '';
	$cats = $arrSource;
	foreach ($cats as $cat){
		$selected = $cat[0] == $index ? 'selected' : '';
		$out .= '<option value="'.$cat[0].'" '.$selected.'>'.$cat[1].'</option>';
	}
	$out .= '</select>';
	return $out;
}

function comboSex($index, $lang="vn", $name="cmbSex", $class="textbox"){
	$arrValue  = array('0','1');
	$arrTextVN = array('Nam','Nữ');
	$arrTextEN = array('Male','Female');
	$arrText = $lang=="vn"?$arrTextVN:$arrTextEN;
	$firstValue = $lang=="vn"?"[Chọn phái]":"[Select sex]";
	$out = '';
	$out .= '<select name="'.$name.'" id="'.$name.'" class="'.$class.'">';
	$out .= '<option value="-1">'.$firstValue.'</option>';
	for($i=0; $i<count($arrValue); $i++){
		$selected = $arrValue[$i] == $index ? 'selected' : '';
		$out .= '<option value="'.$arrValue[$i].'" '.$selected.'>'.$arrText[$i].'</option>';
	}
	$out .= '</select>';
	return $out;
}

function comboCity($index, $lang="vn", $name="cmbCity", $class="textbox"){
	$arrValue  = array('Tp. Hồ Chí Minh','Hà Nội','An Giang','Bà Rịa- Vũng Tàu','Bắc Giang','Bắc Cạn','Bạc Liêu','Bắc Ninh','Bến Tre','Bình Dương','Bình Phước','Bình Thuận','Bình Định','Cà Mau','Cần Thơ','Cao Bằng','Gia Lai','Hà Giang','Hà Nam','Hà Tĩnh','Hải Dương','Hải Phòng','Hậu Giang','Hòa Bình','Hưng Yên','Khánh Hòa','Kiên Giang','Kon Tum','Lai Châu','Lâm Đồng','Lạng Sơn','Lào Cai','Long An','Nam Định','Nghệ An','Ninh Bình','Ninh Thuận','Nước ngoài','Phú Thọ','Phú Yên','Quảng Bình','Quảng Nam','Quảng Ngãi','Quảng Ninh','Quảng Trị','Sóc Trăng','Sơn La','Tây Ninh','Thái Bình','Thái Nguyên','Thanh Hóa','Thừa Thiên Huế','Tiền Giang','Trà Vinh','Tuyên Quang','Vĩnh Long','Vĩnh Phúc','Yên Bái','Đà Nẵng','Đắk Lắk','Đắk Nông','Điện Biên','Đồng Nai','Đồng Tháp','Địa Điểm Khác');
	
	$arrTextVN = array('Tp. Hồ Chí Minh','Hà Nội','An Giang','Bà Rịa- Vũng Tàu','Bắc Giang','Bắc Cạn','Bạc Liêu','Bắc Ninh','Bến Tre','Bình Dương','Bình Phước','Bình Thuận','Bình Định','Cà Mau','Cần Thơ','Cao Bằng','Gia Lai','Hà Giang','Hà Nam','Hà Tĩnh','Hải Dương','Hải Phòng','Hậu Giang','Hòa Bình','Hưng Yên','Khánh Hòa','Kiên Giang','Kon Tum','Lai Châu','Lâm Đồng','Lạng Sơn','Lào Cai','Long An','Nam Định','Nghệ An','Ninh Bình','Ninh Thuận','Nước ngoài','Phú Thọ','Phú Yên','Quảng Bình','Quảng Nam','Quảng Ngãi','Quảng Ninh','Quảng Trị','Sóc Trăng','Sơn La','Tây Ninh','Thái Bình','Thái Nguyên','Thanh Hóa','Thừa Thiên Huế','Tiền Giang','Trà Vinh','Tuyên Quang','Vĩnh Long','Vĩnh Phúc','Yên Bái','Đà Nẵng','Đắk Lắk','Đắk Nông','Điện Biên','Đồng Nai','Đồng Tháp','Địa Điểm Khác');
	
	$arrTextEN = array('Ho chi minh City','Ha Noi','An Giang','Ba Ria - Vung Tau','Bac Giang','Bac Can','Bac Lieu','Bac Ninh','Ben Tre','Binh Dương','Binh Phuoc','Binh Thuan','Binh Đinh','Ca Mau','Can Tho','Cao Bang','Gia Lai','Ha Giang','Ha Nam','Ha Tinh','Hai Duong','Hai Phong','Hau Giang','Hoa Binh','Hung Yen','Khanh Hoa','Kien Giang','Kon Tum','Lai Chau','Lam Đong','Lang Son','Lao Cai','Long An','Nam Đinh','Nghe An','Ninh Binh','Ninh Thuan','Foreign','Phu Tho','Phu Yen','Quang Binh','Quang Nam','Quang Ngai','Quang Ninh','Quang Tri','Soc Trang','Son La','Tay Ninh','Thai Binh','Thai Nguyen','Thanh Hoa','Thua Thien Hue','Tien Giang','Tra Vinh','Tuyen Quang','Vinh Long','Vinh Phuc','Yen Bai','Da Nang','Đak Lak','Đak Nong','Đien Bien','Đong Nai','Đong Thap','Locations');
	
	$arrText = $lang=="vn"?$arrTextVN:$arrTextEN;
	$firstValue = $lang=="vn"?"[Chọn Tỉnh / Thành phố]":"[Select City]";
	$out = '';
	$out .= '<select name="'.$name.'" id="'.$name.'" class="'.$class.'">';
	$out .= '<option value="-1">'.$firstValue.'</option>';
	for($i=0; $i<count($arrValue); $i++){
		$selected = $arrValue[$i] == $index ? 'selected' : '';
		$out .= '<option value="'.$arrValue[$i].'" '.$selected.'>'.$arrText[$i].'</option>';
	}
	$out .= '</select>';
	return $out;
}

//--------------------Country---------------------------------------------------------------

function comboCountry($index, $lang="vn", $name="cmbCountry", $class="textbox"){
	$arrValue = array(
		'Afghanistan','Albania','Algeria','American Samoa','Andorra','Angola','Anguilla','Antarctica','Antigua and Barbuda','Argentina','Armenia','Aruba','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus',
		'Belgium','Belize','Benin','Bermuda','Bhutan','Bolivia','Bosnia and Herzegowina','Botswana','Bouvet Island','Brazil','British Indian Ocean Territory','British Virgin Islands','Brunei Darussalam','Bulgaria','Burkina Faso','Burundi','Cambodia','Cameroon','Canada','Cape Verde',
		'Cayman Islands','Central African Republic','Chad','Chile','China','Christmas Island','Cocos (Keeling) Islands','Colombia','Comoros','Congo','Cook Islands','Costa Rica','Cote D\'ivoire','Croatia','Cuba','Cyprus','Czech Republic','Denmark','Djibouti','Dominica',
		'Dominican Republic','East Timor','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Falkland Islands (Malvinas)','Faroe Islands','Fiji','Finland','France','France, Metropolitan','French Guiana','French Polynesia','French Southern Territories','Gabon','Gambia',
		'Georgia','Germany','Ghana','Gibraltar','Greece','Greenland','Grenada','Guadeloupe','Guam','Guatemala','Guinea','Guinea-Bissau','Guyana','Haiti','Heard and McDonald Islands','Honduras','Hong Kong','Hungary','Iceland','India',
		'Indonesia','Iraq','Ireland','Islamic Republic of Iran','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kiribati','Korea','Korea, Republic of','Kuwait','Kyrgyzstan','Laos','Latvia','Lebanon','Lesotho',
		'Liberia','Libyan Arab Jamahiriya','Liechtenstein','Lithuania','Luxembourg','Macau','Macedonia','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands','Martinique','Mauritania','Mauritius','Mayotte','Mexico','Micronesia',
		'Moldova, Republic of','Monaco','Mongolia','Montserrat','Morocco','Mozambique','Myanmar','Namibia','Nauru','Nepal','Netherlands','Netherlands Antilles','New Caledonia','New Zealand','Nicaragua','Niger','Nigeria','Niue','Norfolk Island','Northern Mariana Islands',
		'Norway','Oman','Pakistan','Palau','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Pitcairn','Poland','Portugal','Puerto Rico','Qatar','Reunion','Romania','Russian Federation','Rwanda','Saint Lucia','Samoa',
		'San Marino','Sao Tome and Principe','Saudi Arabia','Senegal','Serbia and Montenegro','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','Spain','Sri Lanka','St. Helena','St. Kitts and Nevis','St. Pierre and Miquelon','St. Vincent and the Grenadines','Sudan',
		'Suriname','Svalbard and Jan Mayen Islands','Swaziland','Sweden','Switzerland','Syrian Arab Republic','Taiwan','Tajikistan','Tanzania, United Republic of','Thailand','Togo','Tokelau','Tonga','Trinidad and Tobago','Tunisia','Turkey','Turkmenistan','Turks and Caicos Islands','Tuvalu','Uganda',
		'Ukraine','United Arab Emirates','United Kingdom (Great Britain)','United States','United States Virgin Islands','Uruguay','Uzbekistan','Vanuatu','Vatican City State','Venezuela','Vietnam','Wallis And Futuna Islands','Western Sahara','Yemen','Zaire','Zambia'
	);			
	$arrText = array(
		'Afghanistan','Albania','Algeria','American Samoa','Andorra','Angola','Anguilla','Antarctica','Antigua and Barbuda','Argentina','Armenia','Aruba','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus',
		'Belgium','Belize','Benin','Bermuda','Bhutan','Bolivia','Bosnia and Herzegowina','Botswana','Bouvet Island','Brazil','British Indian Ocean Territory','British Virgin Islands','Brunei Darussalam','Bulgaria','Burkina Faso','Burundi','Cambodia','Cameroon','Canada','Cape Verde',
		'Cayman Islands','Central African Republic','Chad','Chile','China','Christmas Island','Cocos (Keeling) Islands','Colombia','Comoros','Congo','Cook Islands','Costa Rica','Cote D\'ivoire','Croatia','Cuba','Cyprus','Czech Republic','Denmark','Djibouti','Dominica',
		'Dominican Republic','East Timor','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Falkland Islands (Malvinas)','Faroe Islands','Fiji','Finland','France','France, Metropolitan','French Guiana','French Polynesia','French Southern Territories','Gabon','Gambia',
		'Georgia','Germany','Ghana','Gibraltar','Greece','Greenland','Grenada','Guadeloupe','Guam','Guatemala','Guinea','Guinea-Bissau','Guyana','Haiti','Heard and McDonald Islands','Honduras','Hong Kong','Hungary','Iceland','India',
		'Indonesia','Iraq','Ireland','Islamic Republic of Iran','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kiribati','Korea','Korea, Republic of','Kuwait','Kyrgyzstan','Laos','Latvia','Lebanon','Lesotho',
		'Liberia','Libyan Arab Jamahiriya','Liechtenstein','Lithuania','Luxembourg','Macau','Macedonia','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands','Martinique','Mauritania','Mauritius','Mayotte','Mexico','Micronesia',
		'Moldova, Republic of','Monaco','Mongolia','Montserrat','Morocco','Mozambique','Myanmar','Namibia','Nauru','Nepal','Netherlands','Netherlands Antilles','New Caledonia','New Zealand','Nicaragua','Niger','Nigeria','Niue','Norfolk Island','Northern Mariana Islands',
		'Norway','Oman','Pakistan','Palau','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Pitcairn','Poland','Portugal','Puerto Rico','Qatar','Reunion','Romania','Russian Federation','Rwanda','Saint Lucia','Samoa',
		'San Marino','Sao Tome and Principe','Saudi Arabia','Senegal','Serbia and Montenegro','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','Spain','Sri Lanka','St. Helena','St. Kitts and Nevis','St. Pierre and Miquelon','St. Vincent and the Grenadines','Sudan',
		'Suriname','Svalbard and Jan Mayen Islands','Swaziland','Sweden','Switzerland','Syrian Arab Republic','Taiwan','Tajikistan','Tanzania, United Republic of','Thailand','Togo','Tokelau','Tonga','Trinidad and Tobago','Tunisia','Turkey','Turkmenistan','Turks and Caicos Islands','Tuvalu','Uganda',
		'Ukraine','United Arab Emirates','United Kingdom (Great Britain)','United States','United States Virgin Islands','Uruguay','Uzbekistan','Vanuatu','Vatican City State','Venezuela','Vietnam','Wallis And Futuna Islands','Western Sahara','Yemen','Zaire','Zambia'
	);
	$firstValue = $lang=="vn"?"[Ch&#7885;n qu&#7889;c gia]":"[Select country]";
	$out = '';
	$out .= '<select name="'.$name.'" id="'.$name.'" class="'.$class.'">';
	$out .= '<option value="-1">'.$firstValue.'</option>';
	for($i=0; $i<count($arrValue); $i++){
		$selected = $arrValue[$i] == $index ? 'selected' : '';
		$out .= '<option value="'.$arrValue[$i].'" '.$selected.'>'.$arrText[$i].'</option>';
	}
	$out .= '</select>';
	return $out;
}

//************************************************************************************************************
//***************************************** SQL Query function ***********************************************
function insert($table,$fields_arr){
	global $conn;
	if(!$conn){return false;}
	$strfields="";
	$strvalues="";
	list($key, $val) = each($fields_arr);
	if(is_string($key)){
		$strfields = " ($key";
		$strvalues= $val;
		while(list($key, $val) = each($fields_arr)){
			$strfields.= ", $key";
			$strvalues.= ",".$val;
		}
			$strfields.=")";
	}else{
		$strvalues=$fields_arr[0];
		for($i=1;$i<(count($fields_arr));$i++){
			$strvalues .= ", $fields_arr[$i]";
		}
	}
	
	$query = "INSERT INTO $table $strfields VALUES ($strvalues)";
	//echo $query;
	return mysql_query($query, $conn);
}

function update($table,$fields_arr,$where) {
	global $conn;
	if (!$conn) { return false; }
	list($key, $val) = each($fields_arr);
	$strset=" $key = $val";
	while(list($key, $val) = each($fields_arr)){
		$strset .= ", $key = $val";
	}
	$query = "UPDATE $table SET $strset WHERE $where"; 
	$result = mysql_query($query, $conn);
	return !$result?false:true;
}

function delete_rows($table,$fields_arr,$where_ext="") {
	global $conn;
	if (!$conn) { return false; }
	if(count($fields_arr)>0){
		list($key, $val) = each($fields_arr);
		$strwhere=" $key = $val";
		while(list($key, $val) = each($fields_arr)){
			$strwhere .= "OR $key = $val";
		}
	}
	
	$query = "DELETE FROM $table WHERE $strwhere $where_ext";      
	#echo $query;#exit;
	$result = mysql_query($query, $conn);
	if (!$result) {return false;}
	return true;
}
//************************************************************************************************************
//************************************************ MAIL ******************************************************
function check_mail($email){
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) return false;
	return true;
}

function send_mail($from,$to,$subject,$body){
	return mail_smtp($from,$to,$subject,$body,1);
}

function mail_smtp($from,$to,$subject,$body,$html=0){
	require_once("smtp.php");

	$smtp=new smtp_class;

	$smtp->host_name="localhost";       /* Change this variable to the address of the SMTP server to relay, like "smtp.myisp.com" */
	$smtp->localhost="localhost";       /* Your computer address */
	$smtp->direct_delivery=0;           /* Set to 1 to deliver directly to the recepient SMTP server */
	$smtp->timeout=10;                  /* Set to the number of seconds wait for a successful connection to the SMTP server */
	$smtp->data_timeout=0;              /* Set to the number seconds wait for sending or retrieving data from the SMTP server.
	                                       Set to 0 to use the same defined in the timeout variable */
	$smtp->debug=0;                     /* Set to 1 to output the communication with the SMTP server */
	$smtp->html_debug=1;                /* Set to 1 to format the debug output as HTML */
	$smtp->pop3_auth_host="vietnextco.com.vn";           /* Set to the POP3 authentication host if your SMTP server requires prior POP3 authentication */
	$smtp->user="client@vietnextco.com.vn";                     /* Set to the user name if the server requires authetication */
	$smtp->realm="";                    /* Set to the authetication realm, usually the authentication user e-mail domain */
	$smtp->password="degoimail";                 /* Set to the authetication password */
	$smtp->workstation="";              /* Workstation name for NTLM authentication */
	$smtp->authentication_mechanism=""; /* Specify a SASL authentication method like LOGIN, PLAIN, CRAM-MD5, NTLM, etc..
	                                       Leave it empty to make the class negotiate if necessary */

	if($smtp->direct_delivery){
		if(!function_exists("GetMXRR")){
			$_NAMESERVERS=array();
			include("getmxrr.php");
		}
	}

	$header="";
	if ($html==0)
		$header = array(
			"From: $from",
			"To: $to",
			"Subject: $subject",
			"Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z")
		);
	else
		$header = array(
			"MIME-Version: 1.0",
			"Content-type: text/html; charset=iso-8859-1",
			"From: $from",
			"To: $to",
			"Subject: $subject",
			"Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z")
		);
	$ret = $smtp->SendMessage($from,array($to),$header,$body);
	return $ret;
}
//************************************************************************************************************
//************************************************************************************************************
?>