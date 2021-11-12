<?php include('dbconnector.php');//let's include the db connection php file 
$id = $_GET['id'];
$sql = "SELECT * FROM developer WHERE developerid = '$id'";

$result = $dbcon->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylexs.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Update a Game | ORBIT Store</title>
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

	<div>
		<form method="POST" action="saveEditDeveloper.php?id=<?php echo $id; ?> " name="form">
			<?php $gameName=""; $devAdd=""; ?>
			
		<div class="designedtext" id="logindiv" style="margin-top: 90px;">
			<h2 style="color: white">UPDATE DEVELOPER</h2>
			Fill this form to update developer.<br><br>
			<div style="color: white">
				<p>Game ID: <?php echo $row['developerid']; ?></p>

				<p>Developer Name</p>
				<input id="txtfld1" type="text" name="devName" required style="width: 350px" value="<?php echo $row['developerName'];?> ">

				<p>Address</p>
				<input id="txtfld1" type="text" name="devAdd" required style="width: 350px" value="<?php echo $row['address'];?> ">

				<br><br><br>
				<a href="viewDeveloper.php">Back</a>

				<button type="submit" class="button1" name="register" style="margin-left: 195px; padding: 8px;">Update Game</button>
			</div>
		</div>
	</form>
			</div>
		</div>


		</form>


	</div>
</body>
</html>