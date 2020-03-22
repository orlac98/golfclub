<?php 
    include "header.php";
    ?>

<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

  function_alert("Welcome");

function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<body>

<div class="header">
	<h2>Home Page</h2>
</div>

<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
<div class="calender" style="text-align:center;">
   <h1> 2020 Calender</h1>
   <iframe src="https://calendar.google.com/calendar/embed?src=en.irish%23holiday%40group.v.calendar.google.com&ctz=Europe%2FDublin" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#3c404d",
      "text": "#d6d6d6"
    },
    "button": {
      "background": "transparent",
      "text": "#83cda3",
      "border": "#8bed4f"
    }
  },
  "position": "bottom-right"
});
</script>
</html>