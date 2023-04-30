function letters(evt)
{
var charCode=(evt.which) ? evt.which : event.keyCode
if(charCode>32 && (charCode<97 || charCode>122)&& (charCode<65 || charCode>90))
return false;

return true;
}

function numbers(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;
	
	return true;
}

