function formValidation()

{

	// Make quick references to our fields
	
	var type =  document.getElementById('Type');
	var pass =  document.getElementById('psw1');
	var cpass =  document.getElementById('psw2');



	//  to check empty form fields.
	if(validatetype(type))
	{
		if(validatePassword(pass, cpass))
		{

			return true;
		}
	}
									
			return false;
}

	function validatetype(type){

  		if(type.value == 0)
  		{
        	document.getElementById('p4').innerText = "Select Your type";

  		} 		
  		else {
    document.getElementById('p4').innerText = "";
  }
}

function validatePassword(pass, cpass){
  		if(pass.value == cpass.value)
  		{
        	document.getElementById('p5').innerText = "";

  		} 		
  		else {
    document.getElementById('p5').innerText = "Check your password";
  }
}