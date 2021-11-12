<?php include('server.php');
if (!isset($_SESSION['username'])) {//if there is no session, go to log in page instead of the home page
	header('location: log-in.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="format.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Home | ORBIT Store</title>
	<style type="text/css">
		#slider{
  overflow: hidden;
}
#slider figure{
margin-top: 60px;
  position: relative;
  width: 300%;
  margin-left: 0;
  left: 0;
  animation: 50s slider infinite; 
}
#slider figure img{
  width: 20%;
  float: left;
}
@keyframes slider{
	0%{
		left: 0;
	}
	25%{
		left: -40%;
	}
	50%{
		left: -100%;
	}
	75%{
		left: -160%;
	}100%{
		left: 0%;
	}
}

	</style>
</head>
<body>
	<?php if($_SESSION['username'] == 'admin'){?>
	<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 190px"><h2>ORBIT Store</h2>
			<li><a href="">Home</a></li>
  			<li><a href="">Store</a></li>
  			<li><a href="userprofile.php"><?php echo $_SESSION['username'] ?></a></li>
  			<li><a href="">Library</a></li>
  			<li style="float:right"><a href="home.php?logout='1'">Logout</a></li>
  			<li style="float:right"><a href="cart.php">Cart </a></li>
  			<li><a href="SampleCrud/viewGames.php">Admin Controls</a></li>
		</ul>
		<div id="shoptitle">
			<h2 style="color:#c7d5e0 "> Browse the most epicest Games</h2>
		</div>
	</div>
<?php }else{?>
	<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 190px"><h2>ORBIT Store</h2>
			<li><a href="">Home</a></li>
  			<li><a href="">Store</a></li>
  			<li><a href="userprofile.php"><?php echo $_SESSION['username'] ?></a></li>
  			<li><a href="">Library</a></li>
  			<li style="float:right"><a href="home.php?logout='1'">Logout</a></li>
  			<li style="float:right"><a href="cart.php">Cart </a></li>
		</ul>

		<div id ="slider">
			<figure>
				<img src="images/c1.jpg">
				<img src="images/c2.jpg">
				<img src="images/c3.jpg">
				<img src="images/c5.jpg">
				<img src="images/c4.jpg">
			</figure>
		</div>

		<div id="shoptitle">
			<h2 style="color:#c7d5e0 "> Browse the most epicest Games</h2>
		</div>
	</div>
<?php }?>
	<div class= "designedtext" id="shopcontent">
		<?php
			$sql = "SELECT * from game";
			$result = $dbcon->query($sql);
			if (mysqli_num_rows($result)>0){
				while ($row = mysqli_fetch_array($result)) {
		?>
		<a href="gamePage.php?id=<?php echo $row['gameID'];?>"><img src="<?php echo $row['img'] ?>" width="220" height="330">
			<?php }}?>
	</div>
	<div><!-- div for the welcome message-->
		<?php if (isset($_SESSION['success'])){ ?>
			<div>
				<?php echo $_SESSION['success']; 
					unset($_SESSION['success']);
				?>
			</div>
		<?php } ?>
	</div>

</body>
</html>