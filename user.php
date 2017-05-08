<?php
error_reporting(0);
session_start();
if (!$_SESSION['name']) {
	header('location: stlogin');
	
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
	<style type="text/css">
		.navbar-default{
		background-color: #efeff4;
		border-color: #efeff4;
		color: #FFFFFF;
	}
		.navbar-inverse{
		background-color: #efeff4;
		border-color: #efeff4;
		color: #FFFFFF;
	}
	</style>
</head>
<body class="">
<nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="user">Exam Hall Seat Allocation System</a>
	
	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">
			<li><a href=""></a></li>
			<li><a href="subject">Add Course</a></li>
			<li><a href="view">View Course</a></li>
			<li><a href="seat">View Seat</a></li>
			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php  
			session_start();
			echo $_SESSION['name'];
			?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="editprofile">Edit Profile</a></li>
            <li><a href="cpass">Change Password</a></li>
            <li><a href="logout">Log out</a></li>
          </ul>
        </li>
			
      </ul>
	</div>
 </div>
</nav>


<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
	<div class="container">
		<div class="navbar-text pull-left">
			<p>&copy2017 Gp9-Software Enginnering Project.</p>
		</div>
	</div>
</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>