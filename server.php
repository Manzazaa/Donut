<?php
include('SampleCrud/dbconnector.php');
session_start();

//this is for the registration
if(isset($_POST['register'])){//if the user clicks register
	//we store each values in the textfields in the variables

	$username = $_POST['SUuname'];		
	$Email = $_POST['SUemail'];	
	$Password = $_POST['SUpass'];		
	$Password2 = $_POST['SUrpass'];
//this is for confirming whether the user exists
	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_e = "SELECT * FROM users WHERE email='$Email'";

  	$res_u = mysqli_query($dbcon, $sql_u);
  	$res_e = mysqli_query($dbcon, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	   echo "Username already exists.";
  	   	if(mysqli_num_rows($res_e) > 0){
  		echo "<br>Email already exists.";
  	 } 
  	}
  	else if(mysqli_num_rows($res_e) > 0){
  		echo "<br>Email already exists.";
  	 } 
	else if($Password != $Password2){
		 echo "Passwords do not match.";
	}
	else{
		$passwordENC = md5($Password);//encrypt password-san
		$sql = "INSERT INTO users (username, email, password) 
					VALUES ('$username', '$Email', '$passwordENC')";
		mysqli_query($dbcon, $sql);
		$_SESSION['username']=$username;
		$_SESSION['success'] = "Welcome to Orbit Store!";
		header('location: home.php');
}

}

//this is for logout
	if (isset($_GET['logout'])){//if they press the logout button
		//session_write_close();before logging out, this code saves the data from the session
		session_destroy();//we frickin destroy that
		unset($_SESSION['username']);
		header("location: log-in.php");
	}

//this is for login
	if (isset($_POST['loginbtn'])){//if they press the login button
		$username = $_POST['uname'];	
		$Password = $_POST['pass'];
		$passwordENC = md5($Password);

		//this is to check whether that input exists in the database
		$sqlcheck = "SELECT * FROM users WHERE username='$username' AND password = '$passwordENC'";
		$r_sqlcheck = mysqli_query($dbcon, $sqlcheck);

		if(mysqli_num_rows($r_sqlcheck)==1){//if there exists one
			$_SESSION['username']=$username;
			$sqladmin = "SELECT * FROM users WHERE username='admin' AND password = '$passwordENC'";
			$r_sqladmin = mysqli_query($dbcon, $sqladmin);
			if(mysqli_num_rows($r_sqladmin)==1){
				header('location: SampleCrud/viewGames.php');
			}else{
				header('location: home.php');
			}
		}
		else{
			echo "Invalid combination.";
		}
	}

//for the user change password	
if (isset($_POST['changepass'])){//if the change password was clicked, declare the variables below
	$_SESSION['username']=$_POST['username'];
	$username = $_SESSION['username'];
	$oldPass = md5($_POST['oldPass']);//we auto hash em all
	$Password1 = md5($_POST['newPass1']);		
	$Password2 = md5($_POST['newPass2']);

$sqlConfirmPass ="SELECT * FROM users WHERE username = '$username' AND password = '$oldPass'";//to see whether a password constitutes to a username
	$r_sqlConfirmpass = mysqli_query($dbcon, $sqlConfirmPass) or die ("Couldn't execute query.");
	if(mysqli_num_rows($r_sqlConfirmpass)==1){//if the query result is 1
		if ($Password1 == $Password2){//then we go here, if the passwords do match, we can update the password

			$sql1 = "UPDATE users SET password = '$Password1' WHERE username = '$username' ";
			$r_sql1 = $dbcon->query($sql1) or die ("Couldn't execute query.");
			header('location: userprofile.php');
		}
		else{
			echo "New passwords do not match!";
		} 
	}
	else{
		echo "Old password incorrect.";
	}

	}


//for the delete account
if (isset($_POST['deleteAcc'])) {
$_SESSION['username']=$_POST['username'];
$username = $_SESSION['username'];

	$sqlDeleteAcc = "Delete FROM users WHERE users.username ='$username'";
	$r_sqlDeleteAcc = $dbcon->query($sqlDeleteAcc) or die ("Couldn't execute query.");
		session_destroy();//we frickin destroy that
		unset($_SESSION['username']);
		header("location: log-in.php");
}

?>