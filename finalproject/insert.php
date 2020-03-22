<?php 
    include "header.php";
    ?>
    <?php  include('server.php'); ?>
    
    <div class="header">
  	<h2>Golf Clubs</h2>
  </div>
  
<form action="insertgolf.php" method="POST"  >
		<div class="input-group">
        

            <label for="GOLF_CLUB_ID">CLUB ID:</label>

            <input type="text"  placeholder="e.g 123" name="GOLF_CLUB_ID" id="GOLF_CLUB_ID">
		</div>
        

        <div class="input-group">

            <label for="CLUB_NAME">CLUB NAME:</label>

            <input type="text"  placeholder="e.g Ballybunion" name="CLUB_NAME" id="CLUB_NAME">

       </div>

        <div class="input-group">

            <label for="YEAR_ESTABLISHED">YEAR ESTABLISHED:</label>

            <input type="text"  placeholder="e.g 1903" name="YEAR_ESTABLISHED" id="YEAR_ESTABLISHED">

        </div>
		
		<div class="input-group">

            <label for="CLUB_ADDRESS">CLUB ADDRESS:</label>

            <input type="text"  placeholder="e.g Co.Kerry" name="CLUB_ADDRESS" id="CLUB_ADDRESS">

        </div>

        <div class="input-group">
        <button class="btn" type="submit" name="save" value="Submit">Save</button>
        </div>
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

<form>
<div class="input-group">
<Center>
 <table>
	<tr>
		<th>Club ID | </th>
		<th>Club Name | </th>
		<th>Year Established | </th>
		<th>Club Address | </th>
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
		<a href ="insert.php?delete=<?php echo $GOLF_CLUB_ID;?>"onclick="return confirm('Are you sure?');">Delete</a>
	</td>

	
</tr>
</div>

	<?php

	$i++;
	}
	if(isset($_GET['delete'])){
		$delete_id= $_GET['delete'];
		
		mysqli_query($conn, "DELETE FROM GOLF_CLUBS WHERE GOLF_CLUB_ID = '$delete_id'");
		
	
	}
	?>
</table>
<center>

</div>
</div>
</form>
</body>
    </form>
   
	</div>
    </div>

   
</body>



<!-- //PROFESSIONALS -->

<div class="header">
  	<h2>Professionals</h2>
  </div>
  
<form action="insertprof.php" method="POST"  >
		<div class="input-group">
        

            <label for="PRO_ID">PRO ID:</label>

            <input type="number"  placeholder="e.g 1" name="PRO_ID" id="PRO_ID">
		</div>
        

        <div class="input-group">

            <label for="GOLF_CLUB_ID">CLUB ID:</label>

            <input type="text"  placeholder="e.g 123" name="GOLF_CLUB_ID" id="GOLF_CLUB_ID">

       </div>

        <div class="input-group">

            <label for="DATE_OF_BIRTH">DATE OF BIRTH:</label>

            <input type="text"  placeholder="e.g 10/02/1998" name="DATE_OF_BIRTH" id="DATE_OF_BIRTH">

        </div>
		
		<div class="input-group">

            <label for="GENDER">GENDER:</label>

            <input type="text"  placeholder="e.g male" name="GENDER" id="GENDER">

        </div>

        <div class="input-group">

            <label for="HANDICAP">HANDICAP:</label>

            <input type="text"  placeholder="e.g +7" name="HANDICAP" id="HANDICAP">

        </div>

        <div class="input-group">

            <label for="PRO_FIRST_NAME">FIRST NAME:</label>

            <input type="text"  placeholder="e.g john" name="PRO_FIRST_NAME" id="PRO_FIRST_NAME">

        </div>

        <div class="input-group">

            <label for="PRO_LAST_NAME">GENDER:</label>

            <input type="text"  placeholder="e.g hanley" name="PRO_LAST_NAME" id="PRO_LAST_NAME">

        </div>

        <div class="input-group">
        <button class="btn" type="submit" name="save" value="Submit">Save</button>
        </div>
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

$result=mysqli_query($conn, "SELECT * FROM professionals");

?>
<body>

<form>
<div class="input-group">
<Center>
 <table>
	<tr>
        <th>Pro ID| </th>
		<th>Club ID| </th>
		<th>DOB| </th>
		<th>Gender| </th>
		<th>Handicap| </th>
        <th>FN| </th>
		<th>LN| </th>
		<th>Delete</th>
		
	<tr>
	</center>
<?php

$i=1;

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $PRO_ID = $row['PRO_ID'];

    $GOLF_CLUB_ID = $row['GOLF_CLUB_ID'];
    
    $DATE_OF_BIRTH = $row ['DATE_OF_BIRTH'];
    
    $GENDER = $row ['GENDER'];
    
    $HANDICAP = $row['HANDICAP'];
    
    $PRO_FIRST_NAME = $row ['PRO_FIRST_NAME'];
    
    $PRO_LAST_NAME = $row ['PRO_LAST_NAME'];
?>

<tr>

    <td><?php echo $PRO_ID;?></td>
	<td><?php echo $GOLF_CLUB_ID;?></td>
	<td><?php echo $DATE_OF_BIRTH;?></td>
	<td><?php echo $GENDER;?></td>
	<td><?php echo $HANDICAP;?></td>
    <td><?php echo $PRO_FIRST_NAME;?></td>
	<td><?php echo $PRO_LAST_NAME;?></td>
	<td>
		<a href ="insert.php?delete=<?php echo $PRO_ID;?>"onclick="return confirm('Are you sure?');">Delete</a>
	</td>

	
</tr>
</div>
	<?php

	$i++;
	}
	if(isset($_GET['delete'])){
		$delete_id= $_GET['delete'];
		
		mysqli_query($conn, "DELETE FROM PROFESSIONALS WHERE PRO_ID = '$delete_id'");
		
		
	}
	?>
</table>
<center>

</div>
</div>
</form>
</body>
  
</form>
   
   </div>
   </div>

  
</body>