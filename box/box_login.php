<script language="javascript">
window.onload = function(){
	document.all.boxUid.value = varUid;
	document.all.boxPwd.value = varPwd;
}
function btnBoxLogin_onclick(){
	if(document.all.boxUid.value=="" || document.all.boxUid.value==varUid){
		alert(mustInput_Uid);document.all.boxUid.focus();return false;
	}
	if(document.all.boxPwd.value=="" || document.all.boxPwd.value==varPwd){
		alert(mustInput_Pwd);document.all.boxPwd.focus();return false;
	}
	frmBoxLogin.submit();
	return true;
}
</script>

<form id="login" name="login" action="./" method="post">
					<table width="182" border="0" cellspacing="0" cellpadding="0">                                         
						<tr>
								<td><input type="text" name="txtUid" class="textbox"></td></td>
                        </tr>                       
						<tr>
								<td><input type="password" name="txtPwd" class="textbox"></td>
                        </tr>
                        <tr>
                          <td class="style11" style="padding-top:5px;"><a class="next2" href="#" onClick=" btnLogin_onclick();app.Submit(document.getElementById('login'), 'login2', event, app.CommonCallback)"><?php echo $l_btnLogin?></a> / <a href="./?frame=registry" style="text-decoration:none;" class="next2"><?php echo $l_btnRegistry?></a></td>
                        </tr>
                        <tr>
                          <td class="style11" style="padding-top:5px;"><u><a  class="next2" href="./?frame=forgotpass"><?php echo $l_ForgotPwd?></a></u> </td>
                        </tr>
                    </table>
</form>