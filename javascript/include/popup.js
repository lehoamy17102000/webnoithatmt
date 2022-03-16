// Center POPUP
var popUpWin=0;
function popUpWindow(URLStr, width, height, scrolls) {
	if(popUpWin) {
    	if(!popUpWin.closed) popUpWin.close();
    }
    var iMyWidth;
	var iMyHeight;
	iMyWidth = (window.screen.width/2) - (width/2 + 10); 
	iMyHeight = (window.screen.height/2) - (height/2 + 50); 
    if (scrolls != "yes") { scolls = "no"; }
	popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars='+scrolls+',resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+iMyWidth+', top='+iMyHeight+',screenX='+iMyWidth+',screenY='+iMyHeight+'');
}
function close_popUp() {
	if(popUpWin) {
		if(!popUpWin.closed) popUpWin.close();
	} 
}