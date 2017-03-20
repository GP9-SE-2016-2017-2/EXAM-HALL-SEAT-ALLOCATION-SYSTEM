<?php
//error_reporting(0);
session_start();
if (!$_SESSION['admin']) {
  header('location: adminlogin');
  
  exit();
}



?>
<?php

include_once("connect.php");


if(isset($_POST['submit'])){

$hid = $_POST['hid'];
$name = $_POST['name'];
$capacity = $_POST['capacity'];



$sql = ("INSERT INTO `hall` VALUES ('', '$hid', '$name', '$capacity')");


      if(!mysql_query($sql)){
               //die("strange error");
        echo '<script language="javascript">';
              echo 'alert("Car Id Already Exist");location.href="hall.php"';
              echo '</script>';
            }

           else{
            echo '<script language="javascript">';
            echo 'alert("Successfully Added");location.href="hall.php"';
            echo '</script>';
           }
    



}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hall</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"] {
  color: black;
  font-size: 15px;
  width: 210px;
  height: 36px;
  font-family: "Segoe UI";
  background-color: white;
  border: 2px solid #dadada;
  padding: 8px;
  border-radius: 4px;
  outline: none;
}
select {
  color: black;
  font-size: 15px;
  width: 200px;
  height: 36px;
  background-color: white;
  border: 1px solid black;
  padding: 8px;
  border-radius: 4px;
  outline: none;
}

.myform input[type="text"]:focus{
box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
}

.table{
  font-family: "Segoe UI";
  font-size: 15.3px;
}
.navbar-default{
    background-color: #efeff4;
    border-color: #efeff4;
    color: #FFFFFF;
  }

  </style>
</head>
<body class="">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="admin">Exam Hall Seat Allocation System</a>
	
	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">
		  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="std">Student</a></li>
            <li><a href="dept">Department</a></li>
            <li><a href="sub">Course</a></li>
            <li><a href="hall">Hall</a></li>
          </ul>
        </li>
        
			
			<li><a href="logoutadmin">Log out</a></li>
			
      </ul>
	</div>
 </div>
</nav>
<br><br><br><br><br><br>
<div class="row container">
  <div class="col-xs-6">
    <div class="col-md-1"></div>
    <div class="col-md-1"></div>
    <div class="col-md-1">
    <form class="myform" action="hall" method="post">
  Hall.ID:<br><input type="text" required="required" name="hid"><br>
  Name:<br><input type="text" required="required" name="name"><br>
  Capacity: <br><input type="text" required="required" name="capacity"><br><br>
  <input class="btn btn-default" type="submit" value="Submit" name="submit">
</form>
    </div>
  </div>
  <div class="col-xs-6">
    <table class="table">
    <tr>
    <th>Hall ID</th>
    <th>Name</th>
    <th>Capacity</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
   <?php

   if(isset($_GET['id']))
{
  $result ="delete from hall where id=".$_GET['id'];
  if (!mysql_query($result))
    echo mysql_error();
}


   


   $query=mysql_query("select * from hall");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['hallId']."</td>
          <td>".$row['name']."</td>
          <td>".$row['capacity']."</td>
          <td><a href='hall?id=".$row[0]."'>Delete</a></td>
          <td><a href='edithall?edit=$row[id]'>Edit</a></td>
          </tr>";
  }


   ?>
    
    </table>
  </div>
</div>


<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>