<?php 
    include "header.php";
    ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "golfclub";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result=mysqli_query($conn, "SELECT * FROM GOLF_CLUBS");

?>
<body>
<div class="header">
  	<h2>Delete</h2>
  </div>
<form>
<div class="input-group">
<Center>
 <table>
	<tr>
		<th>Golf club ID</th>
		<th>Club Name</th>
		<th>Year Established</th>
		<th>Club Address</th>
		<th>Delete</th>
		
	<tr>
	</center>
<?php

$i=1;

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$GOLF_CLUB_ID = $row['GOLF_CLUB_ID'];
	$CLUB_NAME = $row['CLUB_NAME'];
	$YEAR_ESTABLISHED = $row['YEAR_ESTABLISHED'];
	$CLUB_ADDRESS = $row['CLUB_ADDRESS'];
?>

<tr>

	<td><?php echo $GOLF_CLUB_ID;?></td>
	<td><?php echo $CLUB_NAME;?></td>
	<td><?php echo $YEAR_ESTABLISHED;?></td>
	<td><?php echo $CLUB_ADDRESS;?></td>
	<td>
		<a href ="deletegolf.php?delete=<?php echo $GOLF_CLUB_ID;?>"onclick="return confirm('Are you sure?');">Delete</a>
	</td>

	
</tr>
</div>
	<?php

	$i++;
	}
	if(isset($_GET['delete'])){
		$delete_id= $_GET['delete'];
		
		mysqli_query($conn, "DELETE FROM GOLF_CLUBS WHERE GOLF_CLUB_ID = '$delete_id'");
		
		header("location: deletegolf.php");
	}
	?>
</table>
<center>

</div>
</div>
</form>
</body>
</html>