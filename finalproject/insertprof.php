


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

$PRO_ID = $_POST ['PRO_ID'];

$GOLF_CLUB_ID = $_POST ['GOLF_CLUB_ID'];

$DATE_OF_BIRTH = $_POST ['DATE_OF_BIRTH'];

$GENDER = $_POST ['GENDER'];

$HANDICAP = $_POST ['HANDICAP'];

$PRO_FIRST_NAME = $_POST ['PRO_FIRST_NAME'];

$PRO_LAST_NAME = $_POST ['PRO_LAST_NAME'];

 

// attempt insert query execution

mysqli_query($conn, "INSERT INTO PROFESSIONALS (PRO_ID, GOLF_CLUB_ID, DATE_OF_BIRTH,GENDER,HANDICAP,PRO_FIRST_NAME,PRO_LAST_NAME) 
VALUES ('$PRO_ID','$GOLF_CLUB_ID',  '$DATE_OF_BIRTH', '$GENDER','$HANDICAP','$PRO_FIRST_NAME','$PRO_LAST_NAME')");

if(mysqli_affected_rows($conn)>0){

    echo "Records added successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}

header("location:insert.php");

// close connection

mysqli_close($conn);

?>
