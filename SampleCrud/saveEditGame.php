<?php include('dbconnector.php');//let's include the db connection php file 
$id = $_GET['id'];
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
	<title>UPDATE GAME</title>
</head>
<body>
	<?php 
		$sql1 = "UPDATE game SET gameTitle = '$gameTitle', developer = '$developer', description = '$gameDescription', year = '$year', price = '$price', img = '$img' WHERE gameID = '$id' ";
	$result = $dbcon->query($sql1) or die ("Couldn't execute query.");
	if($result){
		echo "<meta http-equiv=\"refresh\" content=\"0; URL = viewGames.php\">";
	}
	?>
</body>
</html>
