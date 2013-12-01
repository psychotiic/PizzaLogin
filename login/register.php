<!DOCTYPE html>
<html>
<head>
	<title>D & T's Pizza Emporium</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="theme.css">
	<script type="text/javascript" src="index.js"></script>
	 <script src="./lib/jquery-1.10.1.js"></script>
   <!-- <script src="./lib/jqm/jquery.mobile-1.3.1.js"></script> -->
   <style type="text/javascript">
   .m {
      margin-top: 146cm;
    }
   </style>
	
</head>
<body class="centered">
	<div id="registerBody">
		<header><h1>P & T's Pizza Emporium</h1></header>
		<div class="move"><h3> Become a new customer...</h3><br/>
		Enter Username<span style="padding-left: 5px;"><input type="text" for Username: id="usernameREG"/><br/></span>
		Enter Password&nbsp;&nbsp;<span style="padding-left: 3px;"><input type="password" for Password: id="passwordREG"/></span>
		<!-- Confirm Password<input type="password" for Password: id="confirmPassREG"/> -->
		<div id="regButton">
			<button id="registerButton" class="btn" type="submit" onClick="registerAccount()"/>Register</button>
			<button id="cancelButton" type="submit" class="btn" onClick="cancel()"/>Cancel</button>
		</div>
	</div></div>
</body>
</html>