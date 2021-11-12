<?php include('dbconnector.php');//let's include the db connection php file 
$devName = $_POST['devName'];
$devAdd = $_POST['devAdd'];
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Game</title>
</head>
<body>
	<?php 
		$sql = "INSERT INTO developer(developerName, address) VALUES ('$devName', '$devAdd')";
	$result = $dbcon->query($sql) or die ("Couldn't execute query.");
	if($result){
		echo "<meta http-equiv=\"refresh\" content=\"0; URL = viewDeveloper.php\">";
	}
	?>
</body>
</html>
