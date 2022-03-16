<?php $guest  = countRecord("tbl_visitor","member='n'");
$members = countRecord("tbl_visitor","member='y'");

$rConfig = getRecord('tbl_config',"code = 'total_visits'");
$total_visits = $rConfig['detail'];
?>
<table width="100%">
	<tr>
		<td>
		
<table align="center" width="250" cellpadding="5" border="1" bordercolor="#0069A8">
	<tr>
		<td class="smallfont" style="border-right:none;" width="60%">&nbsp;- Đang trực tuyến</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $members+$guest?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ Thành viên</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $members?></b>&nbsp;</td>
	</tr>
	<tr>
		<td class="smallfont" style="border-right:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ Khách</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $guest?></b>&nbsp;</td>
	</tr>
</table>
		
		</td>
	</tr>
	<tr><td height="20"></td></tr>
	<tr>
		<td>
		
<table align="center" width="250" cellpadding="5" border="1" bordercolor="#0069A8">
	<tr>
		<td class="smallfont" style="border-right:none;">&nbsp;- Tổng lượt truy cập</td>
		<td class="smallfont" style="border-left:none;" align="right"><b><?php echo $total_visits?></b>&nbsp;</td>
	</tr>
</table>
		
		</td>
	</tr>
</table>

