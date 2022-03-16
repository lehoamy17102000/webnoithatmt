<?php $conn = @mysql_connect($servername, $username, $password, $databasename) or 
	die("Không thể kết nối cơ sở dữ liệu !");
mysql_select_db("MQ_shop");
mysql_query("SET NAMES 'utf8'");

//----------------------------------------------------------------------------------------------

if(!session_id()) session_start();

//----------------------------------------------------------------------------------------------



if(isset($_POST['set_language']) && $_POST['set_language'] == 'true'){

	if(!isset($_SESSION['LANGUAGE']) || $_SESSION['LANGUAGE'] == NULL){

		

		$_SESSION['LANGUAGE'] = $_POST['LANGUAGE'];

	}else{

		$_SESSION['LANGUAGE'] = $_POST['LANGUAGE'];

	}

}else{

	if(!isset($_SESSION['LANGUAGE']) || $_SESSION['LANGUAGE'] == NULL){

		

		$_SESSION['LANGUAGE'] = 1;

	}

}

if($_SESSION['LANGUAGE']>0){

	include("lib/lang".$_SESSION['LANGUAGE'].".php");

}



if($_SESSION['LANGUAGE']==1) $_lang="vn";

else $_lang = "en";



//----------------------------------------------------------------------------------------------



//$_lang="vn";



//----------------------------------------------------------------------------------------------

$langTitle = '';

if($_lang != "vn"){

	$langTitle = '

		<a class="aLink3" href="#" onClick="doChangeLanguage(1)">

			<img src="images/flagVN.gif" border="0" height="13" width="23">

			Việt Nam

		</a>

	';

}else{

	$langTitle = '

		<a class="aLink3" href="#" onClick="doChangeLanguage(2)">

			<img src="images/flagEN.gif" border="0" height="13" width="23">

			English

		</a>

	';

}

?>

