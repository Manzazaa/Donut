<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="format.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Login | XYT Company</title>
	<style type="text/css">
		#transactiondiv{

		}
	</style>
</head>
<body>
	<div class="split left">
		<div id="header">
			<h1>Orbit Store</h1>
		<div id="subtitlediv">
			<h3>The most trusted game store, like, ever. </h3>
			<p><h3>50 Million games, I promise.</h3></p>
			<br><br><br>
			<h6>Join now to get the latest and epicest games.</h6>
		<form action="sign-up.php" method="GET">
			<button type="submit" class="button1">Join ORBIT Store</button>
		</form>
		<br><br>
		<h6>Visit <a href="">FAQ</a></h6>
		</div>
	</div>

	<div class="split right">
		<form method="POST">
		<div  class="designedtext" id="logindiv">
			<h2 style="color: white">Sign In</h2>
			<?php include('server.php')?>
			<p>Username:</p>
			<input id="txtfld1" type="text" name="uname" required>
			<p>Password:</p>
			<input id="txtfld1" type="Password" name="pass" required>
			<input type="checkbox"/> 
    		<label style="font-size: 10px; color: white">Remember password</label><br><br>
   			<button type="submit" name="loginbtn" class="button1">Sign In </button><br><br>
  			 <u style="font-size: 10px; color: white">Forgot password?</u>
		</div>
		</form>
	</div>
</body>
</html>
