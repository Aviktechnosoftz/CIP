function address_validate()
									{
									 
									var address= document.getElementById("person_address").value;
									var letterNumber =/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{0,999})$/;


									 if(address.match(letterNumber) || address!= null)
									  {
					 
									 document.getElementById('error_address').style.display = "none";
									 document.getElementById('person_address').style.border = "1px solid green";
									  document.getElementById('dob').focus();
									  return true;

									  }
									else
									  { 
										document.getElementById('person_address').style.border = "2px solid Red";
									   document.getElementById('error_address').style.display = "block";
									   // document.getElementById('person_address').focus();
									   return false;
									  }
									
									 }

								