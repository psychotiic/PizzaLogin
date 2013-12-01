<?php 
//this starts the session for the users, like weather loged in an what not 
ob_start();
//this calls to require the database info you could have used includes as well right?
require 'db.php';
?>

<!DOCTYPE html> 
<html> 
<head> 
	<title>D & T's Pizza Emporium</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="theme.css">
    <script src="./lib/jquery-1.10.1.js"></script>
	<script type="text/javascript" src="index.js"></script>


</head> 

<body class="centered"> 
		<div id="registerBody">
		<header><h1>P & T's Pizza Emporium</h1></header>
		<div class="move"><br/>
		Enter Username<span style="padding-left: 5px;"><input type="text" for Username: id="username"/><br/></span>
		Enter Password&nbsp;&nbsp;<span style="padding-left: 3px;"><input type="password" for Password: id="password"/></span>
		<!-- Confirm Password<input type="password" for Password: id="confirmPassREG"/> -->
		<div id="regButton">
			<button id="loginButton" class="btn" type="submit" />Login
			<button id="registerButton" type="submit" class="btn" onClick="registerAccountPage()"/>Register
		</div>
	</div></div>
	
</body>
</html>

<?php	if (isset($_SESSION['username']))
{
	if (isset($_POST['loginButton']))
	{
		$username = $_POST['user'];
		$password = $_POST['pass'];
		$errors = array();
		if (!ctype_alnum($username) || strlen($username) < 4 || strlen($username) > 15)
		{
			$errors[] = 'Username Must Be  Alphanumberic And 4-15 characters in length';
		}
		
		if (empty($username) || empty($password))
		{
			$errors[] = 'Please fill in all fields';
		}
		
		if (empty($errors))
		{
			$SQLCheckLogin = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username AND `password` = :password");
			$SQLCheckLogin -> execute(array(':username' => $username, ':password' => $password));
			$countLogin = $SQLCheckLogin -> fetchColumn(0);
			if ($countLogin == 1)
			{
				$SQLGetInfo = $odb -> prepare("SELECT `username`, `ID` FROM `users` WHERE `username` = :username AND `password` = :password");
				$SQLGetInfo -> execute(array(':username' => $username, ':password' => $password));
				$userInfo = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);
				if ($userInfo['status'] == 0)
				{
					$_SESSION['username'] = $userInfo['username'];
					$_SESSION['ID'] = $userInfo['ID'];
					echo '<center><div class="alert green ">Success! </h4>Logging In.. <meta http-equiv="refresh" content="3;url=order.php"></div><center>';
				}
				else
				{
					echo '<center><div class="alert red "><p><strong>Error!: </strong>Your user was banned</p></div></center>';
				}
			}
			else
			{
				echo '<center><div class="alert red "><p><strong>Error!: </strong>Login Failed</p></div></center>';
			}
		}
		else
		{
			echo '<center><div class="alert red "><p><strong>Error!:</strong><br />';
			foreach($errors as $error)
			{
				echo '-'.$error.'<br />';
			}
			echo '</div></center>';
		}
	}
}
else
{
	header('location: order.php');
}
?>
