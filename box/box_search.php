<script language="javascript">
function btnSearch_onclick(){
	if(test_empty(document.formSearch.keyword.value)){
		alert(mustInput_Search);document.formSearch.keyword.focus();return false;
	}
	document.formSearch.submit();
	return true;
}
</script>
<table align="center" width="100%" border="1" bordercolor="#003399" cellpadding="0" cellspacing="0">
<form method="GET" action="./" name="formSearch">
	<input type="hidden" name="act" value="search">
	<input type="hidden" name="frame" value="search">
	<tr><td align="center">

<table align="center" width="95%" border="0" bordercolor="#003399" cellpadding="0" cellspacing="0">
	<tr><td colspan="2" height="10"></td></tr>
	<tr>
		<td><input type="text" name="keyword" id="keyword" class="textbox" style="width:90"/></td>
		<td><input type="button" name="btnSearch" value="<?php echo _SEARCH?>" onclick="return btnSearch_onclick()" class="button"/></td>
	</tr>
	<tr><td colspan="2" height="5"></td></tr>
	<tr><td colspan="2" align="right"><a class="aMagenta" href="./?frame=search"><?php echo _SEARCH_ADVANCE?></a></td></tr>
	<tr><td colspan="2" height="10"></td></tr>
</table>

	</td></tr>
</form>
</table>