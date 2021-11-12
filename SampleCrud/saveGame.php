<?php include('dbconnector.php');//let's include the db connection php file 
$gameTitle = addslashes($_POST['gameTitle']);
$developer = addslashes($_POST['gameDev']);
$year = $_POST['GameYear'];
$price = $_POST['GamePrice'];
$img = $_POST['GameImage'];	
$gameDescription = addslashes($_POST['gameDescription']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Game</title>
</head>
<body>
	<?php 
		/**$sqlcheck = "SELECT * from game WHERE gametitle = '$gameTitle'";
	$r_sqlcheck = mysqli_query($dbcon, $sqlcheck);

	if(mysqli_num_rows($r_sqlcheck) > 0){
		echo "Game already exists.";
	}
	else{**/
		$sql = "INSERT INTO game(developer, gametitle, description, year, price, img) VALUES ('$developer', '$gameTitle','$gameDescription', '$year', '$price', '$img')";
	$result = $dbcon->query($sql) or die ("Couldn't execute query.");
	if($result){
		echo "<meta http-equiv=\"refresh\" content=\"0; URL = viewGames.php\">";
	}
	?>
</body>
</html>
