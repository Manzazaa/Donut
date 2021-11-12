<?php include('dbconnector.php');//let's include the db connection php file
include('../server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>View Records | Orbit Store</title>
	<link rel="stylesheet" type="text/css" href="stylexs.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
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
	<div id="invtitle">
			<h2 style="color:#c7d5e0 "> Transactions</h2>
		</div>
		<form method="POST" action="viewTransactions.php">
			<input id="txtfld1" type="text" name="search" placeholder="Search" style="width: 250px; margin-bottom: 20px; margin-left: 800px;">
			<button type="submit" name="searchBtn" class="button1">Search</button>
		</form>
<?php
	if (isset($_POST['searchBtn'])) {
		?>
		<div class="designedtext">
	<table style="margin-left: 175px; color: white;">
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
			$searchQuery = $_POST['search'];
	$searchQuery = htmlspecialchars($searchQuery);
	//$searchQuery = mysql_real_escape_string($searchQuery);
	$SQLsearchQuery = ("SELECT * FROM gameorder
            WHERE (`OrderID` LIKE '%".$searchQuery."%') OR (`UserID` LIKE '%".$searchQuery."%') OR (`Username` LIKE '%".$searchQuery."%')OR (`DateOrdered` LIKE '%".$searchQuery."%') OR (`Total` LIKE '%".$searchQuery."%')") or die(mysql_error());
	$searchResults = $dbcon->query($SQLsearchQuery);
	
	if ($searchResults->num_rows>0){
		while ($searchRow = $searchResults->fetch_assoc()) {
		?>
		<tbody>
			<tr>
				<td><?php echo $searchRow['OrderID']; ?></td>
				<td><?php echo $searchRow['UserID']; ?></td>
				<td><?php echo $searchRow['Username']; ?></td>
				<td><?php echo $searchRow['DateOrdered']; ?></td>
				<td><?php echo $searchRow['Total']; ?></td>
			</tr>
		</tbody>
	<?php }}}else{?>
<div class="designedtext">
	<table style="margin-left: 175px; color: white;">
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
			$sql = "SELECT * from gameorder";
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
	<?php }}}?>
	</table>
</div>
</body>
</html>

