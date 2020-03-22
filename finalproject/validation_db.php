<?php

session_start();
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


$con=mysqli_connect('localhost','root','');
mysqli_select_db($con, 'golfclub');

$name = $_POST['user'];
$pass = $_POST['password'];

$s= "select * from usertable where name = '$name' && password ='$pass'";

$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num==1){
	$_SESSION['username']= $name;
	header('location:WelcomeDB.php');
}else{
	header('location:login_db.php');
}

?>