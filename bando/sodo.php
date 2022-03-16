<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>So do duong di</title>
<!--    Chuỗi khai báo lấy tham số của google maps   -->
<script type="text/javascript" 
src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi"></script>
<script type="text/javascript">
var map;
function initialize() {
      var myLatlng = new google.maps.LatLng(10.369929, 106.34104);
      var myOptions = {
    zoom: 16,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}
map = new google.maps.Map(document.getElementById("div_id"), myOptions); 
  // Biến text chứa nội dung sẽ được hiển thị
var text;
text= "<b style='color:#00F' " + 
         "style='text-align:center'>Shop MQ<br />" + 
     "<img src='http://lenhattruong.byethost12.com/images/icon_viewcart.gif'  /></b>";
   var infowindow = new google.maps.InfoWindow(
    { content: text,
        size: new google.maps.Size(100,50),
        position: myLatlng
    });
       infowindow.open(map);    
    var marker = new google.maps.Marker({
      position: myLatlng, 
      map: map,
      title:"So do duong di"
  });
}
</script>
<style type="text/css">
<!--
body {
	background-color: #003366;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style9 {
	font-family: Tahoma;
	font-size: 12px;
	color: #FFFFFF;
}
-->
</style>
</head>
<body onLoad="initialize()">
    <table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="28"><img src="images/Untitled-1_01.gif" width="28" height="22" /></td>
        <td width="723"><img src="images/Untitled-1_02.gif" width="895" height="22" /></td>
        <td width="199"><img src="images/Untitled-1_03.gif" width="27" height="22" /></td>
      </tr>
      <tr>
        <td><img src="images/Untitled-1_04.gif" width="28" height="553" /></td>
        <td valign="top">    <div id="div_id" style="height:550px; width:40px; text-align:'center'"><br />
    </div></td>
        <td><img src="images/Untitled-1_06.gif" width="27" height="553" /></td>
      </tr>
      <tr>
        <td><img src="images/Untitled-1_07.gif" width="28" height="25" /></td>
        <td><img src="images/Untitled-1_08.gif" width="895" height="25" /></td>
        <td><img src="images/Untitled-1_09.gif" width="27" height="25" /></td>
      </tr>
</table>
    <table width="61%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="2%">&nbsp;</td>
        <td width="98%"><div align="center" class="style9"><strong>Shop MQ</strong><br />
234 Hoàng Quốc Việt<br />
Điện thoại: 099999999</div></td>
      </tr>
</table>
	<p>&nbsp;</p>
</body>
</html>