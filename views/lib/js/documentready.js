$(document).ready(function(){


			var loc = unescape(document.location.href);
			while (loc.indexOf('/') > -1)
				loc = loc.substr(loc.indexOf('/') + 1);
			
				var cadena = loc;
				var obj = $("a[href='"+cadena+"']");
				obj.parent().addClass("current");
				
		

   		
   		
   			
});