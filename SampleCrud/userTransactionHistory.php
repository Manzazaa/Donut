<?php
include('../server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>View Records | Orbit Store</title>
	<link rel="stylesheet" type="text/css" href="stylexs.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
</head>
<body>

	<?php if($_SESSION['username'] == 'admin'){?>
	<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 190px"><h2>ORBIT Store</h2>
			<li><a href="../home.php">Home</a></li>
  			<li><a href="">Store</a></li>
  			<li><a href="../userprofile.php"><?php echo $_SESSION['username'] ?></a></li>
  			<li><a href="">Library</a></li>
  			<li style="float:right"><a href="../home.php?logout='1'">Logout</a></li>
  			<li style="float:right"><a href="../cart.php">Cart </a></li>
  			<li><a href="viewGames.php">Admin Controls</a></li>
		</ul>
	</div>
<?php }else{?>
	<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 190px"><h2>ORBIT Store</h2>
			<li><a href="../home.php">Home</a></li>
  			<li><a href="../home.php">Store</a></li>
  			<li><a href="../userprofile.php"><?php echo $_SESSION['username'] ?></a></li>
  			<li><a href="">Library</a></li>
  			<li style="float:right"><a href="../home.php?logout='1'">Logout</a></li>
  			<li style="float:right"><a href="../cart.php">Cart </a></li>
		</ul>
	</div>
<?php }?>
<h2 id="invtitle" style="color: white"> Transaction History </h2>
<div class="designedtext">
	<table style="margin-left: 175px; color: white; margin-top: 50px;">
		<thead>
			<tr>
				<th>OrderID</th>
				<th>UserID</th>
				<th>Username</th>
				<th>Date Ordered</th>
				<th>Total (Php)</th>
			</tr>
		</thead>
		<?php
			$currentUser = $_SESSION['username'];
			$sql = "SELECT * from gameorder WHERE username = '$currentUser'";
			$result = $dbcon->query($sql);
			if ($result->num_rows>0){
				while ($row = $result -> fetch_assoc()) {
		?>
		<tbody>
			<tr>
				<td><?php echo $row['OrderID']; ?></td>
				<td><?php echo $row['UserID']; ?></td>
				<td><?php echo $row['Username']; ?></td>
				<td><?php echo $row['DateOrdered']; ?></td>
				<td><?php echo $row['Total']; ?></td>
			</tr>
		</tbody>
	<?php }}?>
	</table>
</div>
</body>
</html>

