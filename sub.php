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

$hid = $_POST['cid'];
$name = $_POST['name'];




$sql = ("INSERT INTO `course` VALUES ('', '$hid', '$name')");


      if(!mysql_query($sql)){
               //die("strange error");
        echo '<script language="javascript">';
              echo 'alert("Error Adding Course");location.href="sub.php"';
              echo '</script>';
            }

           else{
            echo '<script language="javascript">';
            echo 'alert("Successfully Added");location.href="sub.php"';
            echo '</script>';
           }
    



}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Course</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"] {
  color: black;
  font-size: 15px;
  width: 210px;
  height: 36px;
  background-color: white;
  border: 2px solid #dadada;
  font-family: "Segoe UI";
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

    .action input[type="text"]{

  height: 33.5px;
  width: 230px;
  border-radius: 5px;
  padding: 8px;
  font-family: "Segoe UI";
  font-size: 15px;
  border: 2px solid #dadada;
  outline: none;
}

.action input[type="text"]:focus{
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
}
 .table{
  font-family: "Segoe UI";
  font-size: 15.3px;
}


.navbar-default{
    background-color: #4373a7;
    border-color: #4373a7;
    border-radius: 0;
  }
  .navbar-default .navbar-brand,
  .navbar-default .navbar-brand:hover,
  .navbar-default .navbar-brand:focus{
    color: #FFF;
  }
  .navbar-default .navbar-nav > li > a {
    color: #FFF;
  }
  .navbar-default .navbar-nav > li > a:hover,
  .navbar-default .navbar-nav > li > a:focus{
    background-color: #428bca;
  }
  .navbar-default .navbar-nav > .active > a,
  .navbar-default .navbar-nav > .active > a:hover,
  .navbar-default .navbar-nav > .active > a:focus{
    color: #FFF;
    background-color: #428bca;
  }
  .navbar-default .navbar-text{
    color: #FFF;
  }
  .navbar-default .navbar-toggle{
    background-color: #428bca;
  }
  .navbar-default .navbar-toggle:hover,
  .navbar-default .navbar-toggle:focus{
    background-color: #428bca;
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
<nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
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
      <form class="myform container" action="sub" method="post">
  Course Code:<br><input type="text" required="required" name="cid"><br>
  Name:<br><input type="text" name="name" required="required"><br>
 <br>
  <input class="btn btn-primary" type="submit" value="Submit" name="submit">
</form>
    </div>
  </div>
  <div class="col-xs-6">
    
    <form  name="myform" class="action" action="sub" method="POST" onsubmit="return validateForm();">
<input type="text" placeholder="Search Course ID or Name"  name="search"><p><p>
<input class="btn btn-default" type="submit" value="Search" name="button">
</form><br>
<div class="panel panel-primary">
  <div class="panel-heading">COURSE</div>
    <table class="table table-striped ">
    <tr class="info">
    <th>Course Code</th>
    <th>Name</th>
    <th>Delete</th>
    <th>Edit</th>
    <th>Allocate</th>
    </tr>
    
    <?php

   if(isset($_GET['id']))
{
  $result ="delete from course where id=".$_GET['id'];
  if (!mysql_query($result))
    echo mysql_error();
}

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from course where cid like '%{$search}%' || name like '%{$search}%' ");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['cid']."</td>
          <td>".$row['Name']."</td>
          <td><a href='sub?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='editsub?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
          <td><a href='allocatehall?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Allocate</button></a></td>
          </tr>";
  }
}
else{
    echo "<h4 class='container'>No Result</h4><br><br>";
  }
}

   
else{

   $query=mysql_query("select * from course");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['cid']."</td>
          <td>".$row['Name']."</td>
          <td><a href='sub?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='editsub?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
          <td><a href='allocatehall?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Allocate</button></a></td>
          </tr>";
  }

}
   ?>
    
    </table>
</div>
  </div>
</div>


<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>