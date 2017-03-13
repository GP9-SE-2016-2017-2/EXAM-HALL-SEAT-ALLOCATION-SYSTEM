<?php
error_reporting(0);
session_start();
if (!$_SESSION['name']) {
	header('location: login.html');
	
	exit();
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="">
<nav class="navbar navbar-default" style="background-color: #efeff4" role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="user.php">Exam Seat</a>
	
	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">
			<li><a href=""></a></li>
			<li><a href="subject.php">Add Course</a></li>
			<li><a href="view.php">View Course</a></li>
			<li><a href="seat.php">View Seat</a></li>
			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php  
			session_start();
			echo $_SESSION['name'];
			?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="editprofile.php">Edit Profile</a></li>
            <li><a href="cpass.php">Change Password</a></li>
            <li><a href="logout.php">Log out</a></li>
          </ul>
        </li>
			
      </ul>
	</div>
 </div>
</nav>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>