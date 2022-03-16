<?php if(!isset($_SESSION['online'])){ 
    mysql_query("insert into tbl_visitor (session_id, activity, ip_address, url, user_agent) values ('".session_id()."', now(), '{$_SERVER['REMOTE_ADDR']}', '{$_SERVER['HTTP_REFERER']}', '{$_SERVER['HTTP_USER_AGENT']}')",$conn); 
    $_SESSION['online']=true;
	
	mysql_query("update tbl_config set detail=detail+1 where code='total_visits'",$conn); 
} else { 
    if(isset($_SESSION['member']))
        mysql_query("update tbl_visitor set activity=now(), member='y' where session_id='".session_id()."'",$conn); 
    else
		mysql_query("update tbl_visitor set activity=now(), member='n' where session_id='".session_id()."'",$conn); 
}

$maxtime = $visitorTimeout; // 5 Minute time out. 60 * 5 = 300 
mysql_query("delete from tbl_visitor where UNIX_TIMESTAMP(activity) < UNIX_TIMESTAMP(now())-$maxtime",$conn); 


$guest  = countRecord("tbl_visitor","member='n'");
$members = countRecord("tbl_visitor","member='y'");

$rConfig = getRecord('tbl_config',"code = 'total_visits'");
$total_visits = $rConfig['detail'];
?>
<link href="../css/css.css" rel="stylesheet" type="text/css" />

<tr><td class="style26"><img src="images/icon_3.gif" width="20" height="9" /><?php echo $_lang=='vn'?'Đang Online : ':'Online : '?>
	 <span class="style10"><?php echo $members+$guest?></span><br />
                  <img src="images/icon_3.gif" width="20" height="9" /><?php echo $_lang=='vn' ?'Lượt truy cập : ':'Total Access : '?> <?php echo $total_visits?></td>
</tr>
