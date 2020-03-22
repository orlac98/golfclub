<?php 
    include "header.php";
    ?>


<?php

// Check if the user has submitted data into the form

if (isset ($_POST ['update'])){
	$GOLF_CLUB_ID = $_POST ['GOLF_CLUB_ID'];
	$CLUB_ADDRESS = $_POST ['CLUB_ADDRESS'];
	
	//Check if both fields have been entered
	if ($GOLF_CLUB_ID && $CLUB_ADDRESS){
		
			//Connect to the server and the golfclubs database
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
	
	// Check if that club id exists
	$exists= mysqli_query ($conn,"SELECT * FROM GOLF_CLUBS WHERE GOLF_CLUB_ID = '$GOLF_CLUB_ID' ") or die ("Query could not be completed");
	
	// Update the DATE LEFT in the STAFF table
	if (mysqli_num_rows($exists) !=0){
		mysqli_query ($conn,"UPDATE GOLF_CLUBS SET CLUB_ADDRESS = '$CLUB_ADDRESS' WHERE GOLF_CLUB_ID = '$GOLF_CLUB_ID'") or die ("Update could not be applied");
		echo '<script>alert("Successful CLUB ADDRESS Updated")</script>'; 
			}else echo "That GOLF CLUB ID does not exist.  Please re-enter:";
					}else echo "You must enter values for both fields.  Please re-enter";
					header("location:updategolf.php");
		
		
		
		
	}
	
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Update Club Name</h2>
  </div>
<form action ="updategolf.php" method ="POST">
<div class="input-group">
<label for="GOLF_CLUB_ID">CLUB ID:</label>

<input type="text"  placeholder="e.g 123" name="GOLF_CLUB_ID" id="GOLF_CLUB_ID">
</div>

<div class="input-group">

            <label for="CLUB_ADDRESS">CLUB ADDRESS:</label>

            <input type="text"  placeholder="e.g Co.Roscommon" name="CLUB_ADDRESS" id="CLUB_ADDRESS">

       </div>

	   <div class="input-group">
  	  <button type="submit" class="btn" name="update">Update</button>
  	</div>
	  
		 </BODY>
		
		 <?php

//1.  Create a database connection
$dbhost ="localhost";
$dbuser ="root";
$dbpassword="";
$dbname = "golfclub";

$connection= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

//Test if connection occured

if(mysqli_connect_errno()){
	die("DB connection failed: " .
		mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
			);
}


if (!$connection)
  {
  die('Could not connect: ' . mysqli_error());
  }

//2.  Perform Database Query

$result = mysqli_query($connection,"SELECT * FROM GOLF_CLUBS");

echo "<table>
<center>
<tr>
<th>Club ID</th>
<th>Club Name</th>
<th>Year Established</th>
<th>Address</th?
</tr>
</center>";

//3. Use returned data 

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['GOLF_CLUB_ID'] . "</td>";
  echo "<td>" . $row['CLUB_NAME'] . "</td>";
  echo "<td>" . $row['YEAR_ESTABLISHED'] ."</td>";
  echo "<td>" . $row['CLUB_ADDRESS'] ."</td>";
  echo "</tr>";
  }
echo "</table>";

//4.  Release returned data 

mysqli_free_result($result);

//5.  Close database connection

mysqli_close($connection);
?> 

</FORM>



<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Update Professionals</h2>
  </div>
<form action ="updateprof.php" method ="POST">
<div class="input-group">
<label for="PRO_ID">PRO ID:</label>

<input type="text"  placeholder="e.g 1" name="PRO_ID" id="PRO_ID">
</div>

<div class="input-group">

            <label for="HANDICAP">HANDICAP:</label>

            <input type="text"  placeholder="e.g +5" name="HANDICAP" id="HANDICAP">

       </div>

	   <div class="input-group">
  	  <button type="submit" class="btn" name="update">Update</button>
  	</div>
		 </BODY>
		</HTML>
		<?php

//1.  Create a database connection
$dbhost ="localhost";
$dbuser ="root";
$dbpassword="";
$dbname = "golfclub";

$connection= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

//Test if connection occured

if(mysqli_connect_errno()){
	die("DB connection failed: " .
		mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
			);
}


if (!$connection)
  {
  die('Could not connect: ' . mysqli_error());
  }

//2.  Perform Database Query

$result = mysqli_query($connection,"SELECT * FROM PROFESSIONALS");

echo "<table>
<center>
<tr>
		<th>Pro ID| </th>
		<th>Club ID| </th>
		<th>DOB| </th>
		<th>Gender| </th>
		<th>Handicap| </th>
        <th>FN| </th>
		<th>LN| </th>
</tr>
</center>";

//3. Use returned data 

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['PRO_ID'] . "</td>";
  echo "<td>" . $row['GOLF_CLUB_ID'] . "</td>";
  echo "<td>" . $row['DATE_OF_BIRTH'] . "</td>";
  echo "<td>" . $row['GENDER'] ."</td>";
  echo "<td>" . $row['HANDICAP'] ."</td>";
  echo "<td>" . $row['PRO_FIRST_NAME'] ."</td>";
  echo "<td>" . $row['PRO_LAST_NAME'] ."</td>";
  echo "</tr>";
  }
echo "</table>";

//4.  Release returned data 

mysqli_free_result($result);

//5.  Close database connection

mysqli_close($connection);
?> 