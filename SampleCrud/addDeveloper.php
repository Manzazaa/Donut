<?php include('dbconnector.php');//let's include the db connection php file ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylexs.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Add a Developer | ORBIT Store</title>
</head>
<body>
	<div>
		 <ul>
		 	<li style="color: #66c0f4; margin-left: 50px;margin-right: 50px"><h2>ORBIT Store | Administrator</h2>
        <li>
            <a href="#">ADD RECORD &#9662;</a>
            <ul class="dropdown">
                <li><a href="addGame.php">Game</a></li>
                <li><a href="addDeveloper.php">Developer</a></li>
            </ul>
        </li>
        <li>
            <a href="#">VIEW RECORD &#9662;</a>
            <ul class="dropdown">
                <li><a href="viewGames.php">Games</a></li>
                <li><a href="viewDeveloper.php">Developers</a></li>
                <li><a href="viewUsers.php">Users</a></li>
                 <li><a href="viewSpecTransaction.php">Specific Transactions</a></li>
                  <li><a href="viewTransactions.php">All Transactions</a></li>

            </ul>
        </li>
        <li><a href="../home.php">Home</a></li>

        <li style="float:right">
			<a href="../home.php?logout='1'">Logout</a></li>
    </ul>
			</div>
		<form method="POST" action="saveDeveloper.php" name="form">
			<?php $gameName=""; $devAdd=""; ?>
			
		<div class="designedtext" id="logindiv" style="margin-top: 50px;">
			<h2 style="color: white">ADD DEVELOPER</h2>
			Fill this form to add a developer.<br><br>
			<div style="color: white">
				<p>Developer Name</p>
				<input id="txtfld1" type="text" name="devName" required style="width: 350px">
				<p>Country</p>
				<input id="txtfld1" type="text" name="devAdd" required style="width: 350px">
		
				<br><br><br>
				<a href="viewDeveloper.php"style="margin-left:3px">Back</a>
				<button type="submit" class="button1" name="register" style="margin-left: 130px">Add Developer</button>
			</div>
		</div>
	</form>
			</div>
		</div>


		</form>


	</div>
</body>
</html>