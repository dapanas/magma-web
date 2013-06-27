/*

@formvalider.js
@Author www.phpninja.info

-validateEmail
-getValue() get value of a form element
-validate() checks every form input field

@ 25 Enero 2012

*/

function getValue(element){
	switch(element.type){
		case 'select-one':
		case 'select':
			return element.options[element.selectedIndex].value;
		break;
		case 'checkbox':
			if (element.checked) return 1;
			else return 0;
		default:
			if (element.value) return element.value;
			else return 0;
		break;
		
	}
	return 0;
}

function validateEmail(email){
	var regEx = /^[\w\.\+-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]{2,6}$/;
	if (!regEx.test(email)) {
		return false;
	} 
	return true;
}

function validate(z){

	for (var x=0; x < z.length; x++) {

 		if (z[x].getAttribute('required')){
 			input_name = z[x].getAttribute('name');
 			
 			if (z[x].getAttribute('name') == 'confpassword' && getValue(z[x]) != getValue(z[x-1] ) || z[x].getAttribute('name') == 'email' && !validateEmail(getValue(z[x])) || input_name.indexOf('email') > -1 && !validateEmail(getValue(z[x])) || z[x].getAttribute('required') == 'required'  && getValue(z[x]) == "" || getValue(z[x]) == -1){
				var ncampo = z[x].getAttribute('name');
 				//alert("Field "+ncampo+" is required ");
	 			z[x].style.background='#e7e7e7';
				z[x].focus();
 				return false;	
 			} else z[x].style.background='#ffffff';
 		} 
 	}
	z.submit(); 	
}


