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
			<h2 style="color:#c7d5e0 "> Game Inventory</h2>
		</div>
		<form method="POST" action="viewGames.php">
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
				<th>Game ID</th>
				<th>Game Title</th>
				<th>Developer</th>
				<th>Year</th>
				<th>Price (Php)</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
<?php
	$searchQuery = $_POST['search'];
	$searchQuery = htmlspecialchars($searchQuery);
	//$searchQuery = mysql_real_escape_string($searchQuery);
	$SQLsearchQuery = ("SELECT * FROM game
            WHERE (`gameID` LIKE '%".$searchQuery."%') OR (`gametitle` LIKE '%".$searchQuery."%') OR (`developer` LIKE '%".$searchQuery."%')OR (`year` LIKE '%".$searchQuery."%') OR (`price` LIKE '%".$searchQuery."%')") or die(mysql_error());
	$searchResults = $dbcon->query($SQLsearchQuery);
	
	if ($searchResults->num_rows>0){
		while ($searchRow = $searchResults->fetch_assoc()) {
		?>
<tbody>
			<tr>
				<td><?php echo $searchRow['gameID']; ?></td>
				<td><?php echo $searchRow['gametitle']; ?></td>
				<td><?php echo $searchRow['developer']; ?></td>
				<td><?php echo $searchRow['year']; ?></td>
				<td><?php echo $searchRow['price']; ?></td>
				<td><?php echo $searchRow['img']; ?></td>

				<td><a href="editGame.php?id=<?php echo $row['gameID']; ?>" style="text-decoration: none;">Update</a>
				<a href="deleteGame.php?id=<?php echo $row['gameID'];?>" style="text-decoration: none;">Delete</a></td>

			</tr>
		</tbody>
	<?php }}}else{?>

<div class="designedtext">
	<table style="margin-left: 175px; color: white;">
		<thead>
			<tr>
				<th>Game ID</th>
				<th>Game Title</th>
				<th>Developer</th>
				<th>Year</th>
				<th>Price (Php)</th>
				<th>Image</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php
			$sql = "SELECT * from game";
			$result = $dbcon->query($sql);
			if ($result->num_rows>0){
				while ($row = $result -> fetch_assoc()) {
		?>
		<tbody>
			<tr>
				<td><?php echo $row['gameID']; ?></td>
				<td><?php echo $row['gametitle']; ?></td>
				<td><?php echo $row['developer']; ?></td>
				<td><?php echo $row['year']; ?></td>
				<td><?php echo $row['price']; ?></td>
				<td><?php echo $row['img']; ?></td>

				<td><a href="editGame.php?id=<?php echo $row['gameID']; ?>" style="text-decoration: none;">Update</a>
				<a href="deleteGame.php?id=<?php echo $row['gameID'];?>" style="text-decoration: none;">Delete</a></td>

			</tr>
		</tbody>
	<?php }}}?>
	</table>
</div>
</body>
</html>
