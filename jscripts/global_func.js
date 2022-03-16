
//------------------------------------------ Begin TRIM -------------------------------------------------------------
function Trim(TRIM_VALUE){
if(TRIM_VALUE.length < 1){
return"";
}
TRIM_VALUE = RTrim(TRIM_VALUE);
TRIM_VALUE = LTrim(TRIM_VALUE);
if(TRIM_VALUE==""){
return "";
}
else{
return TRIM_VALUE;
}
} //End Function

function RTrim(VALUE){
var w_space = String.fromCharCode(32);
var v_length = VALUE.length;
var strTemp = "";
if(v_length < 0){
return"";
}
var iTemp = v_length -1;

while(iTemp > -1){
if(VALUE.charAt(iTemp) == w_space){
}
else{
strTemp = VALUE.substring(0,iTemp +1);
break;
}
iTemp = iTemp-1;

} //End While
return strTemp;

} //End Function

function LTrim(VALUE){
var w_space = String.fromCharCode(32);
if(v_length < 1){
return"";
}
var v_length = VALUE.length;
var strTemp = "";

var iTemp = 0;

while(iTemp < v_length){
if(VALUE.charAt(iTemp) == w_space){
}
else{
strTemp = VALUE.substring(iTemp,v_length);
break;
}
iTemp = iTemp + 1;
} //End While
return strTemp;
} //End Function



function emailCheck_en (emailStr) {
	var emailPat=/^(.+)<!--@(.+)$/
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]";
	var validChars="\[^\\s" + specialChars + "\]";
	var quotedUser="(\"[^\"]*\")";
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
	var atom=validChars + '+';
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
	var matchArray=emailStr.match(emailPat);
	if (matchArray==null) {
		alert("kt lai dia chi email");
		return false;
	}
	var user=matchArray[1];
	var domain=matchArray[2];
	if (user.match(userPat)==null) {
		alert("The username doesn't seem to be valid.");
		return false;
	}
	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) {
		  for (var i=1;i<=4;i++) {
			if (IPArray[i]>255) {
				alert("Destination IP address is invalid!");
			return false;
			}
		}
		return true
	}
	var domainArray=domain.match(domainPat)
	if (domainArray==null) {
		alert("The domain name doesn't seem to be valid.")
		return false
	}
	var atomPat=new RegExp(atom,"g")
	var domArr=domain.match(atomPat)
	var len=domArr.length
	if (domArr[domArr.length-1].length<2 || 
		domArr[domArr.length-1].length>3) {
	   alert("The address must end in a three-letter domain, or two letter country.")
	   return false
	}
	if (len<2) {
	   var errStr="This address is missing a hostname!"
	   alert(errStr)
	   return false
	}
	return true;
}

function emailCheck_vn (emailStr) {
	var emailPat=/^(.+)@(.+)$/
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
	var validChars="\[^\\s" + specialChars + "\]"
	var quotedUser="(\"[^\"]*\")"
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
	var atom=validChars + '+'
	var word="(" + atom + "|" + quotedUser + ")"
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
	var matchArray=emailStr.match(emailPat)
	if (matchArray==null) {
		alert("Sai địa chỉ email!")
		return false
	}
	var user=matchArray[1]
	var domain=matchArray[2]
	if (user.match(userPat)==null) {
		alert("Sai địa chỉ email!")
		return false
	}
	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) {
		  for (var i=1;i<=4;i++) {
			if (IPArray[i]>255) {
				alert("Sai địa chỉ email!")
			return false
			}
		}
		return true
	}
	var domainArray=domain.match(domainPat)
	if (domainArray==null) {
		alert("Sai địa chỉ email!")
		return false
	}
	var atomPat=new RegExp(atom,"g")
	var domArr=domain.match(atomPat)
	var len=domArr.length
	if (domArr[domArr.length-1].length<2 || 
		domArr[domArr.length-1].length>3) {
	   alert("Sai địa chỉ email!")
	   return false
	}
	if (len<2) {
	   alert("Sai địa chỉ email!")
	   return false
	}
	return true;
}

//  End -->
//------------------------------------------ End Check Email ----------------------------------------------------


function checkValueNull(sObjName, sMsgError)
{
	var selectObj = document.getElementsByName(sObjName)
	if (Trim(selectObj.item(0).value) == '')
	{
		alert(sMsgError);
		selectObj.item(0).focus();
		return false;
	}
	
	return true;
}

function checkValueCheckbox(sObjName, sMsgError)
{
	var checks = document.getElementsByName(sObjName);

	var c=0;
	for(i=0;i<checks.length;i++)
	{
		if (checks[i].checked == true) c++;
	}
	
	if (c == 0)
	{
		alert(sMsgError);
		return false;
	}
	
	return true;
}

function fetch_object(idname)
{
	if (document.getElementById)
		return document.getElementById(idname);
	else if (document.all)
		return document.all[idname];
	else if (document.layers)
		return document.layers[idname];
	else
		return null;
}

function check2string(string1,string2)
{
	if(string1==string2)
		return true;
	else
		return false;
}

function popupWindow(url,w,h) {
	l = screen.availWidth/2-(w/2);
	t = screen.availHeight/2-(h/2);
    window.open(url, 'wAdv','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=yes,resizable=yes,left='+l+',top='+t+',width='+w+',height='+h);
}

