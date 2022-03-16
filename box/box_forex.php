<script language="javascript" src="http://www.vnexpress.net/Service/Forex_Content.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<table width="140" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" bordercolor="#666666" style="border-collapse:collapse">
<?php $i=0;
while($i<12){
	$vForex = 'vForexs['.$i.']';
	$vCost = 'vCosts['.$i++.']';
	?>
	  <tr>
			<td width="48%" bgcolor="#FFFFFF"><div align="center">&nbsp;<script language="javascript">document.write(<?php echo $vForex?>);</script></div></td>
			<td width="52%" height="17" bgcolor="#FFFFFF"><div align="center"><script language="javascript">document.write(<?php echo $vCost?>);</script>&nbsp;</div></td>
	  </tr> 	
	<?php }
?>	                    
</table>