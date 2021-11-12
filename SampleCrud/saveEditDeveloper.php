<?php include('dbconnector.php');//let's include the db connection php file 
$id = $_GET['id'];
$devName = $_POST['devName'];
$devAdd = $_POST['devAdd'];
			
?>
<!DOCTYPE html>
<html>
<head>
	<title>UPDATE GAME</title>
</head>
<body>
	<?php 
		$sql1 = "UPDATE developer SET developername = '$devName', address='$devAdd' WHERE developerid = '$id' ";
	$result = $dbcon->query($sql1) or die ("Couldn't execute query.");
	
	if($result){
		echo "<meta http-equiv=\"refresh\" content=\"0; URL = viewDeveloper.php\">";
	}
	?>
</body>
</html>