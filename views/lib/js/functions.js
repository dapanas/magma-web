/* FACEBOOK SHARES */
function obrirPopUp(url, alt, ample, scrollok){
		var altura=screen.height;
		var amp=screen.width;
		xW= (screen.width - ample)/2;
		yW= (altura - alt)/2;
		var esquema;
		esquema=window.open(url ,'esquema','left='+xW+', top='+yW+',width='+ample+', height='+alt+',resizable=0,status=0,statusbar=0,toolbar=0,location=0,scrollbar=0,scrollbars=0,menubar=0');
		esquema.focus();
}


function fbs_click(u) 
{
        obrirPopUp('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u),'480','650',0);

}



