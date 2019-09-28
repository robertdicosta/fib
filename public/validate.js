function validate()
{
	var n=0;
    var arr = new Array("Name","Phone","Email");
	try
	{
		n=document.form1.elements.length;

    	for(i=0;i<3;i++)
		{
          if(document.form1.elements[i].value=="")
			{
			alert(arr[i]+" could not be blank");
			document.form1.elements[i].focus();
			return false;
			}
	     }
        if(!isEmail(document.form1.elements[2]))
		{
			alert('Please check Email ID.');
			document.form1.elements[2].focus();
			return false;
		}

         if(!isPhone(document.form1.elements[1]))
		{
			alert('Only numbers are allowed.');
            document.form1.elements[1].value="";
			document.form1.elements[1].focus();
			return false;
		}
		return true;
	}
	catch(e)
	{
		alert(e);
	}
}
function isEmail(elem){
 var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
 if(elem.value.match(emailExp)){
 return true;
 }else{
 return false;
 }
}

function isPhone(ephone){
 var phoneExp = /^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/;
 if(ephone.value.match(phoneExp)){
 return true;
 }else{
 return false;
 }
}

function isZip(ezip){
 var zipExp = /[0-9]/;
 if(ezip.value.match(zipExp)){
 return true;
 }else{
 return false;
 }
}
