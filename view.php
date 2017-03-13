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
	<title>Subject</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
		.action input[type="text"]{

	height: 33.5px;
	width: 230px;
	border-radius: 5px;
	font-size: 15px;
	border: 1px solid black;
}

.table{
  font-family: "Segoe UI";
  font-size: 15.3px;
}

.space{
  margin-left: -180px;
}

	</style>

	<script>
  function validateForm() {
      if (document.myform.search.value=="") {
        alert("Input Search");
        return false;
      }
  }
  </script>

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
</nav><br><br><br>
<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">
    
   <table class="table">
    <tr>
    <th>Course ID</th>
    <th>Name</th>
    <th>Drop</th>
    </tr>

   <?php
error_reporting(0);
   include_once("connect.php");


   session_start();


  
    if( isset($_SESSION['name'])){


 if(isset($_GET['id']))
{
  $result ="delete from subject where id=".$_GET['id'];
  if (!mysql_query($result))
    echo mysql_error();
}

  
$query = mysql_query("SELECT * FROM subject WHERE sid = '".$_SESSION['name']."'");
  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['cid']."</td>
          <td>".$row['name']."</td>
          <td><a href='view.php?id=".$row[0]."'>Drop</a></td>
          </tr>";
  }
}


   ?>
   
    </table> 

  </div>
</div>
 
<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>