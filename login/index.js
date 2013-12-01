window.onload=function(){
	//localStorage.setItem('username','test');
	//localStorage.setItem('password','test');
}

function login(){
	var username = localStorage.getItem("username");
	var password = localStorage.getItem("password");
	if($('input[id=username]').val() == username && $('input[id=password]').val() == password)
	{
	alert("Welcome Back " + username);
	window.location = ("./order.php");
	}
	else
	{
		alert("Please enter a VALID Username & Password!");	
	}
}

function registerAccountPage(){
window.location = ("./register.php");
}

function registerAccount(){
	if($('input[id=usernameREG]').val().trim() != "")
    { 
        var user = $('input[id=usernameREG]').val();
        if($('input[id=passwordREG]').val().trim() !="")
        {
        var pass = $('input[id=passwordREG]').val();
		localStorage.setItem('username',user);
        localStorage.setItem('password',pass);
        alert("Registration Success!");
        logout();//code reuse sends user to login :)
	   window.location =("./index.php");
	   
        }
        else
        {
            alert("Please Enter a Password")
        }
    }
    else
    {
       alert("Please Enter a Username")
    }

}

function logout(){
window.location = ("./login.php");
}
function cancel(){
var r=confirm("Are you sure you want to cancel registration");
	if (r==true)
	{
	x="Registration Cancled!";
	alert(x);
	}	
}