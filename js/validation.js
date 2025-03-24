<html>
<head>
<title>Log in page</title>
<script language="javascript">
function validatefun(field,alerttxt)
{
with (field)
{
if (value==null||value=="")
{
alert(alerttxt);
return false;
}
else 
{
return true
}
}
}

function checklength(field,alerttxt)
{
with(field)
{
if(value.length<5)
{
alert("Please Enter Valid Name");
return false;
}
}
}
function number(field,alerttxt)
{
with(field)
{
for (var i = 0; i < field.value.length; ++i)
{
if(!(isNaN(field.value.charAt(i))))
{
alert(alerttxt);
return false;
}
}

}
}
function validateemail(field,alerttxt)
{
with (field)
{
var apos=value.indexOf("@");
var dotpos=value.lastIndexOf(".");
if (apos<1||dotpos-apos<2)
{
alert(alerttxt);
return false;
}
else {return true;}
}
}
function validate_acount(thisform)
{
with (thisform)
{
if (validateemail(email,"Not a valid e-mail address!")==false)
{
email.focus();
return false;}
}
}

function validate_acount(thisform)
{
with(thisform)
{
if(validatefun(username,"Please Enter user Name!")==false)
{
username.focus();
return false;
}
if(checklength(username,"User Name Must be contain Three character!")==false)
{
username.value="";
username.focus();
return false;
}
if(number(username,"Name can not contain space or number!")==false)
{
username.value="";
username.focus();
return false;
}
}
with (thisform)
{
if (validatefun(email,"Please enter your email!")==false)
{
email.focus();
return false;
}
if(validateemail(email,"Please enter correct e-mail address")==false)
{
email.focus();
return false;
}
}


with (thisform)
{
if (validatefun(password,"Password can not be empty!")==false)
{
password.focus();
return false;
}
if(checklength(password,"Password must be contain Three character!")==false)
{
password.value="";
password.focus();
return false;
}
}

with(thisform)
{
if(validatefun(firstname,"Please enter your first name!")==false)
{
firstname.focus();
return false;
}
if(number(firstname,"Name can not contain space or number!")==false)
{
firstname.value="";
firstname.focus();
return false;
}
}
with(thisform)
{
if(validatefun(lastname,"Please enter your last name!")==false)
{
lastname.focus();
return false;
}
if(number(lastname,"Name can not contain space or number!")==false)
{
lastname.value="";
lastname.focus();
return false;
}
}
with(thisform)
{
if(validatefun(college,"Please enter your College!")==false)
{
college.focus();
return false;
}
}
with(thisform)
{
if(validatefun(dept,"Please enter your Department!")==false)
{
dept.focus();
return false;
}
}
with(thisform)
{
if(validatefun(city,"Please enter your city!")==false)
{
city.focus();
return false;
}
}
with(thisform)
{
if(validatefun(sex,"Please enter your sex!")==false)
{
sex.focus();
return false;
}
}


}
</script>

</head>
<body>
