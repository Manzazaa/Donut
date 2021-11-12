<?php
		//mysql connection here
		include('dbconnector.php');
		$id = $_GET['id'];
		$sql = "Delete FROM developer WHERE developer.developerid ='$id'";

		$result = $dbcon->query($sql) or die ("Couldn't execute query.");
	
		if($result){
			//echo "1 file is deleted.";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=viewDeveloper.php\">";
		}
exit();
?>