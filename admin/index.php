<?php
error_reporting(0);

if(!session_id()) session_start();
if(!isset($_SESSION["session_message"])){
	$_SESSION["session_message"] = "";
}	

if(isset($_GET['page']))
$page = $_GET['page'];
if ($_REQUEST['act']=='logout') unset( $_SESSION['log'] );
if ( empty($_SESSION['log']) ){
	header("Location: login.php");
}
require("../config.php");
require("../common_start.php");
include("../lib/func.lib.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../lib/cssAdmin.css" rel="stylesheet" type="text/css">
<link href="../images/calendar-mos.css" rel="stylesheet" type="text/css">
<title>Control Panel</title>
<script language="javascript" src="../lib/javascript.lib.js"></script>
<script language="javascript" src="../lib/javascript.lib.js"></script>
<script language="javascript" src="../javascript/include/calendar_mini.js"></script>
<script language="javascript" src="../javascript/include/calendar-en.js"></script>
<script language="javascript" src="../javascript/include/joomla.js"></script>
</head>

<body>

<table border="0" bordercolor="0069A8" style="border-collapse: collapse" width="100%" cellspacing="0" cellpadding="0">
	<tr><td colspan="3"><?php include("panel_Top.php")?></td></tr>
	
	<tr>
		<td width="16%" valign="top"><?php include("panel_Left.php")?></td>
		<td valign="top">

			<table border="0" cellpadding="0" style="border-collapse: collapse" bordercolor="#0069A8" width="100%">
				<tr>
					<td width="5"></td>
					<td>
						<table border="1" bordercolor="#0069A8" style="border-collapse: collapse" cellSpacing="0" cellPadding="0" width="100%">
							<tr align="center">
								<td align="center" class="title" height="20">
									<?php include("processTitle.php")?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="5"></td>
					<td><?php include("processFrame.php")?></td>
				</tr>
			</table>

		</td>
	</tr>
	
	<tr>
	  <td colspan="3"><?php include("panel_Bottom.php")?></td>
	</tr>
</table>

</body>
</html>
<?php require("../common_end.php") ?>