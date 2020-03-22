
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

// Escape user inputs for security

$GOLF_CLUB_ID = $_POST['GOLF_CLUB_ID'];

$CLUB_NAME = $_POST['CLUB_NAME'];

$YEAR_ESTABLISHED = $_POST ['YEAR_ESTABLISHED'];

$CLUB_ADDRESS = $_POST ['CLUB_ADDRESS'];

 

// attempt insert query execution

mysqli_query($conn, "INSERT INTO golf_clubs (GOLF_CLUB_ID, CLUB_NAME, YEAR_ESTABLISHED,CLUB_ADDRESS) VALUES 
('$GOLF_CLUB_ID', '$CLUB_NAME', '$YEAR_ESTABLISHED', '$CLUB_ADDRESS')");

if(mysqli_affected_rows($conn)>0){

    echo "Records added successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}
header("location:insert.php");
 

// close connection

mysqli_close($conn);


?>