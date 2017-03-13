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

  height: 33.7px;
  width: 230px;
  font-family: "Segoe UI";
  border-radius: 5px;
  font-size: 15px;
  padding: 8px;
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
.space{
  margin-left: -180px;
}
  </style>

  <script>
  function validateForm() {
      if (document.myform.search.value=="") {
        alert("Input Search");
        document.myform.search.focus();
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
</nav><br><br>
<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">
    

<form  name="myform" class="action" action="subject.php" method="POST" onsubmit="return validateForm();">
<input type="text" placeholder="Search Course ID or Name"  name="search">
<input class="btn btn-default" type="submit" value="Search" name="button">
</form><br>
    <table class="table">
    <tr>
    <th>Course ID</th>
    <th>Name</th>
    <th>Add</th>
    </tr>

   <?php

   include_once("connect.php");


   if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from course where cid like '%{$search}%' || name like '%{$search}%' ");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['cid']."</td>
          <td>".$row['Name']."</td>
          <td><a href='add.php?edit=$row[id]'>Add</a></td>
          </tr>";
  }
}
else{
    echo "<h4 align='center'>No Result</h4><br><br>";
  }
}

else{
    
    $query=mysql_query("select * from course");
        

  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['cid']."</td>
          <td>".$row['Name']."</td>
          <td><a href='add.php?edit=$row[id]'>Add</a></td>
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