<!-- PROFESIONALS -->
<?PHP

// Check if the user has submitted data into the form

if (isset ($_POST ['update'])){
	$PRO_ID = $_POST ['PRO_ID'];
	$HANDICAP = $_POST ['HANDICAP'];
	
	//Check if both fields have been entered
	if ($PRO_ID && $HANDICAP){
		
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
	$exists= mysqli_query ($conn,"SELECT * FROM PROFESSIONALS WHERE PRO_ID = '$PRO_ID' ") or die ("Query could not be completed");
	
	// Update the DATE LEFT in the STAFF table
	if (mysqli_num_rows($exists) !=0){
		mysqli_query ($conn,"UPDATE PROFESSIONALS SET HANDICAP = '$HANDICAP' WHERE PRO_ID = '$PRO_ID'") or die ("Update could not be applied");
		echo '<script>alert("Handicap Updated")</script>'; 
			}else echo "That PRO ID does not exist.  Please re-enter:";
					}else echo "You must enter values for both fields.  Please re-enter";
					header("location:updategolf.php");
		
		
		
		
	}
	
?>