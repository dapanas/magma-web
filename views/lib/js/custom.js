function doSignUp(z){

	for (var x=0; x < z.length; x++) {

 		if (z[x].getAttribute('required')){
 			if (z[x].getAttribute('name') == 'email' && !validateEmail(getValue(z[x])) || z[x].getAttribute('required') == 'required'  && getValue(z[x]) == "" || getValue(z[x]) == 0){
				var ncampo = z[x].getAttribute('name');
 				alert("Field "+ncampo+" is required ");
	 			z[x].style.background='#e7e7e7';
				z[x].focus();
 				return false;	
 			} else z[x].style.background='#ffffff';
 		} 
 	}

	z.submit(); 	


}
function doForm(z){
/* Pre: formID , modalID, action */

		for (var x=0; x < z.length; x++) {	
	 		if (z[x].getAttribute('required')){
	 			if (z[x].getAttribute('name') == 'email' && !validateEmail(getValue(z[x])) || z[x].getAttribute('required') == 'required'  && getValue(z[x]) == "" || getValue(z[x]) == 0){
					var ncampo = z[x].getAttribute('name');
	 				//alert("Field "+ncampo+" is required ");
		 			z[x].style.background='#e7e7e7';
					z[x].focus();
	 				return false;	
	 			} else z[x].style.background='#ffffff';
	 		} 
	 	}
		action= $(z).attr("action");
		formdata = $(z).serialize();
		id = $(z).attr("id");
		id = id.substr(id.indexOf('form')+4);
		console.log(id);
		console.log(action);
		console.log(formdata);

		$.post(base+action, formdata, function(data){
			console.log('#modal'+id);
			console.log('data: '+data);
			if (data != 1){ 	alert("Error: "+data);					console.log(data);		 				} 
			else{
						if ($('#modal'+id).length > 0){
							$('#modal'+id).modal('show');
					}	
			}

		});


}