var app={ajaxEngine:new RemoteFileLoader("app.ajaxEngine"),destResponse:'divMain',
Load:function(url,dest,callback,showLoading)
{if(showLoading!='N')document.getElementById('divLoading').style.display='';
this.destResponse=((dest!=null)?dest:'divMain');
this.ajaxEngine.loadInto(url,this.destResponse,callback);},
Submit:function(frmObj,dest,evt,callback,showLoading)
{
	if(showLoading!='N')
	document.getElementById('divLoading').style.display='';
	this.destResponse=((dest!=null)?dest:'divMain');
	this.ajaxEngine.submitInto(frmObj,this.destResponse,evt,callback);
	if(!(window.XMLHttpRequest&&!window.ActiveXObject))
		frmObj.submit();
},
CommonCallback:function(docDOM,docText,url)
{
	var ResData=app.ajaxEngine.getContent(docDOM,docText);
    
document.getElementById('divLoading').style.display='none';
if(ResData!='')
{
	document.getElementById(app.destResponse).innerHTML=ResData;
	/*var errorCode=parseInt(Utility.getDataInTagName(ResData,"code"));
	var msg=Utility.getDataInTagName(ResData,"msg");msg=Utility.trim(msg);
	if(errorCode<0)
	{
		if(errorCode==-1)alert('Tài khoản của bạn đã được hủy bỏ.');
		if(errorCode==-2)alert('Thời gian đăng nhập của bạn đã hết hiệu lực, vui lòng đăng nhập lại.');
		window.location=msg;return;
	}
	if(errorCode>0)
	Dialog.alert(msg,{windowParameters:{width:420,height:140},okLabel:'Đóng'});
	if(errorCode==-1||errorCode==0||errorCode==2||errorCode==4)
	{
		var template=Utility.getDataInTagName(ResData,"template");
		var nativeCode=Utility.trim(template[1]);
		template=Utility.trim(template[0]);
		if(errorCode!=-1)
			document.getElementById(app.destResponse).innerHTML=template;
			if(nativeCode!='')
			{
				nativeCode=nativeCode.replace('&gt;', '>');
				nativeCode=nativeCode.replace('&lt;','<');
				nativeCode=nativeCode.replace('&amp;&amp;','&&');
				eval(nativeCode);
			}
	};*/
	};
},
openWindow:function(id,title,width,height,left,top,showEffect,hideEffect)
{
	var loading='<div id="W'+id+'" style="padding: 10px 10px 10px 10px;">'+'<div style="text-align:center" class="loading">Đang load dữ liệu, vui lòng chờ trong giây lát...</div>'+'<div style="text-align:center"><img src="'+images_dir+'/loading.gif"></div></div>';
	if(showEffect==null)
		showEffect=Effect.appear;
	if(hideEffect==null)
		hideEffect=Effect.Fade;
	if(!document.getElementById(id))
	{
		win=new Window(id,{title:title,width:width,height:height,left:left,top:top,maximizable:true,resizable:true,showEffect:showEffect,hideEffect:hideEffect});
		win.setDestroyOnClose();
		if(left==-1&&top==-1)
			win.showCenter();
		else win.show();
	};
	win.getContent().innerHTML=loading;
}
,menuClick:function(obj){var element=document.getElementById(obj);if(element.style.display=='')element.style.display='none';else element.style.display='';},checkRegistration:function(frmName,mode){var day=frmName.day;var month=frmName.month;var year=frmName.year;if(mode=='insert')if(!Utility.checkAccount(frmName.username,frmName.password,frmName.confirm_password))return false;if(Utility.isEmpty(frmName.fullname,'Vui lòng nhập Họ và tên'))return false;if(day[day.selectedIndex].value==-1||month[month.selectedIndex].value==-1||year[year.selectedIndex].value==-1){alert('Vui lòng chọn đầy đủ ngày, tháng, năm sinh');return false;}if(Utility.isEmpty(frmName.address,'Vui lòng nhập Địa chỉ'))return false;if(Utility.isEmpty(frmName.email,'Vui lòng nhập Địa chỉ E-mail'))return false;if(!Utility.checkEmailAddress(frmName.email))return false;if(Utility.isEmpty(frmName.phone,'Vui lòng nhập số điện thoại'))return false;if(frmName.phone.value.length<10){alert('Số điện thoại không hợp lệ, vui lòng kiểm tra lại');return false;}if(Utility.isEmpty(frmName.identity_card,'Vui lòng nhập số CMND'))return false;if(frmName.identity_card.value.length<9){alert('Số CMND không hợp lệ, vui lòng kiệm tra lại');return false;}return true;},checkChangePassword:function(frmName){if(Utility.isEmpty(frmName.pass_old,'Vui lòng nhập Mật khẩu cũ')||Utility.isEmpty(frmName.pass_new,'Vui lòng nhập Mật khẩu mới'))return false;return Utility.checkConfirm_password(frmName.pass_new,frmName.pass_confirm);},checkContact:function(frmName){if(Utility.isEmpty(frmName.fullname,'Vui lòng nhập Họ và tên')||Utility.isEmpty(frmName.address,'Vui lòng nhập Địa chỉ')||Utility.isEmpty(frmName.email,'Vui lòng nhập E-mail'))return false;if(!Utility.checkEmailAddress(frmName.email))return false;if(Utility.isEmpty(frmName.content,'Vui lòng nhập Nội dung liên hệ'))return false;return true;},checkLogin:function(username,password){if(Utility.isEmpty(username,'Vui lòng nhập User name')||Utility.isEmpty(password,'Vui lòng nhập Password'))return false;return true;},checkSentOrder:function(volume,price){if(Utility.isEmpty(volume,'Vui lòng nhập khối lượng')||Utility.isEmpty(price,'Vui lòng nhập giá'))return false;return true;},checkSentInvite:function(frmName){var email=frmName.email.value.split(',');var __tmp=frmName.email.value;if(Utility.isEmpty(frmName.email,'Vui lòng nhập E-mail'))return false;frmName.email.value=email[0];if(!Utility.checkEmailAddress(frmName.email)){frmName.email.value=__tmp;return false;}if(Utility.isEmpty(frmName.message,'Vui lòng nhập thông điệp gửi kèm')){frmName.email.value=__tmp;return false;}frmName.email.value=__tmp;return true;},checkSentNews:function(frmName){if(Utility.isEmpty(frmName.fullname,'Vui lòng nhập tên của bạn')||Utility.isEmpty(frmName.from, 'Vui lòng nhập Email của bạn')||Utility.isEmpty(frmName.to, 'Vui lòng nhập Email cần gửi tới'))return false;if(!Utility.checkEmailAddress(frmName.from))return false;if(!Utility.checkEmailAddress(frmName.to))return false;return true;},calculationPrice:function(price,volume,dest){var total='';if(!Utility.isNull(price.value)&&!Utility.isNull(volume.value)){p=parseFloat(price.value);v=parseInt(volume.value);total=p*v*1000;total=Utility.numberFormat(total,2,',')+'&nbsp;VNĐ';}document.getElementById(dest).innerHTML=total;},refreshCounter:function(docDOM,docText,url){var ResData = app.ajaxEngine.getContent(docDOM,docText);if (ResData!=''){var template = Utility.getDataInTagName(ResData,"template");var nativeCode=Utility.trim(template[1]);template=Utility.trim(template[0]);template=template.split(':');if(template.length>1){document.getElementById('CounterMember').innerHTML=parseInt(template[0]);document.getElementById('CounterSMSActive').innerHTML=parseInt(template[1]);document.getElementById('CounterOnline').innerHTML=parseInt(template[2]);}if(nativeCode!='')eval(nativeCode);}},refreshQueueOrder:function(moduleID,interval,isFirst){if(parent.RefreshQueueOrder)clearInterval(parent.RefreshQueueOrder);if(document.getElementById('IsRefreshQueue')){parent.RefreshQueueOrder=setInterval("app.refreshQueueOrder("+moduleID+","+interval+",'N')",interval);if(isFirst!='Y')
app.Load('main.php?module='+moduleID+'&mode=queue_order',null,app.CommonCallback,'N');}},CcareSelect:function(){var str = '';var nSelect;var index;var found;var maxSelect=20;var selected=new Array();var nPinCode=PIN_CODE.length;if(parent.RefreshCcare)clearInterval(parent.RefreshCcare);if(maxSelect>nPinCode)maxSelect=nPinCode;while(selected.length<maxSelect){index=Math.random();index=Math.floor(index*nPinCode);nSelect=selected.length;if(nSelect==0)selected[0]=index;else{found=false;for(var i=0;i<nSelect;i++){if(selected[i]==index)found=true;}if(!found)selected[nSelect]=index;}}for(var i=0;i<maxSelect;i++)str += '<div id="ccare_'+i+'" class="Ccare"><span style="padding-right:140px;">'+PIN_CODE[selected[i]][0]+'</span><span>'+PIN_CODE[selected[i]][1]+'</span></div>';document.getElementById('Ccare').innerHTML=str;var pick=Math.floor(Math.random()*maxSelect);document.getElementById('ccare_'+pick).style.background="#FF0000";parent.RefreshCcare=setInterval("app.CcareSelect()",3000);}};
