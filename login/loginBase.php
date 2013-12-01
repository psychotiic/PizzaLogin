<?php	if (!($user -> LoggedIn()))
{
	if (isset($_POST['login-btn']))
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