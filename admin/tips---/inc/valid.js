// JavaScript Document
function valida(thisform)
{
	var fName=document.getElementById("fName").value	
	var email=document.getElementById("email").value
	var lName=document.getElementById("lName").value
	var phones=document.getElementById("phones").value
	var services=document.getElementById("services").value
if (fName=="" && lName=="" && email=="" && phones=="" && services=="0")
	{
      alert("The fields marked with (*) are required.")
	  return false
	}
	else
	{
		  if (fName=="")
		  {
			alert("The name is required.")
			return false
		  }
		  if (lName=="")
		  {
			alert("The last name is required.")
			return false
		  }		  
		  with (thisform)
		  {
			if (validate_email(email,"This email is no valid.")==false)
			{
			 email.focus();
			 return false
			}
		  }	
		  
		  if (phones=="")
		  {
			alert("Phone is required.")
			return false
		  }
		  if (services=="0")
		  {
			alert("You have to choose a service.")
			return false
		  }			  
    }
	
}

function validate_email(field,alerttxt)
{
	with (field)
	{
		apos=value.indexOf("@")
		dotpos=value.lastIndexOf(".")
		if (apos < 1 || dotpos-apos < 2) 
		{
		  alert(alerttxt);
		  return false
		}
		else
		 {
			return true
		 }
	}
}
