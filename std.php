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

$cid = $_POST['sid'];
$name = $_POST['name'];
$lname = $_POST['lname'];
$dept = $_POST['dept'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['pass1'];
$pass2 = $_POST['pass2'];


$passwordmd5 = md5($password);
$sql = ("INSERT INTO `student` VALUES ('', '$cid', '$name', '$lname', '$dept', '$gender', '$dob', '$email', '$passwordmd5')");


      if(!mysql_query($sql)){
               die("strange error");
            }

           else{
            echo '<script language="javascript">';
            echo 'alert("Successfully Added");location.href="std.php"';
            echo '</script>';
           }
    




}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"], input[type="password"] {
  color: black;
  font-size: 15px;
  width: 207px;
  height: 36px;
  font-family: "Segoe UI";
  border: 2px solid #dadada;
  padding: 8px;
  border-radius: 4px;
  outline: none;
}
.myform input[type="text"]:focus , input[type="date"]:focus , input[type="email"]:focus , input[type="password"]:focus{

  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
}
select {
  font-size: 15px;
  width: 207px;
  font-family: "Segoe UI";
  height: 36px;
  background-color: white;
  border: 2px solid #dadada;
  padding: 4px;
  border-radius: 4px;
  outline: none;
}
select:focus{

  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
}
.action input[type="text"]{

  height: 33.5px;
  width: 230px;
  padding: 8px;
  border-radius: 5px;
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
#move{
  margin-left: 50px;
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
  <div class="col-md-1" id="move">
  <form name="myform" class="myform container" action="std" method="post" onsubmit="return validate();" >
  Std ID:<br><input type="text" required="required" name="sid"><br>
  First Name:<br><input type="text" required="required" name="name"><br>
  Last Name:<br><input type="text" required="required" name="lname"><br>
  <?php
  $sql = "SELECT name FROM dept";
  $result = mysql_query($sql);

echo "Department:<br>";
 echo   "  <select name='dept'>";
 while ($row = mysql_fetch_array($result)) {
   echo "<option value='".$row['name']."'>".$row['name']."</option>";
 }
  echo "</select><br>";        
  ?>
  
  Gender:<br>
  <input type="radio" required="required" name="gender" value="Male">Male
  <input type="radio" name="gender" required="required" value="Female">Female<br>
  Dob:<br><input type="date" required="required" name="dob"><br>
  Email: <br><input type="email" required="required" name="email"><br>
  Password: <br><input type="password" required="required" name="pass1"><br>
  Re-enter password: <br><input type="password" required="required" name="pass2"><br><br>
  <input class="btn btn-default" type="submit" value="Submit" name="submit">
</form>
  </div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1">
    
    <form  name="form" class="action" action="std" method="POST" onsubmit="return validateForm();">
<input type="text" placeholder="Search Student ID or Name"  name="search"><p><p>
<input class="btn btn-default" type="submit" value="Search" name="button">
</form><br>


   

    <table class="table table-striped">
    <tr class="info">
    <th>StdID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Department</th>
    <th>Gender</th>
    <th>Dob</th>
    <th>Email</th>
    <th>Delete</th>
    <th>Edit</th>
    </tr>

     <?php

   if(isset($_GET['id']))
{
  $result ="delete from student where id=".$_GET['id'];
  if (!mysql_query($result))
    echo mysql_error();
}

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from student where sid like '%{$search}%' || fname like '%{$search}%' || lname like '%{$search}%' ");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['sid']."</td>
          <td>".$row['fname']."</td>
          <td>".$row['lname']."</td>
          <td>".$row['department']."</td>
          <td>".$row['gender']."</td>
          <td>".$row['dob']."</td>
          <td>".$row['email']."</td>
          <td><a href='std?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='editstd?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
          </tr>";
  }
}
else{
    echo "<h4 class='container'>No Result</h4><br><br>";
  }
}

   
else{

   $query=mysql_query("select * from student");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['sid']."</td>
          <td>".$row['fname']."</td>
          <td>".$row['lname']."</td>
          <td>".$row['department']."</td>
          <td>".$row['gender']."</td>
          <td>".$row['dob']."</td>
          <td>".$row['email']."</td>
          <td><a href='std?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='editstd?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
          </tr>";
  }

}
   ?>

    
    </table>
   
    
</div>
  </div>

  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  <div class="col-md-1"></div>
  




<script>
  function validateForm() {
      if (document.form.search.value=="") {
        alert("Input Search");
        return false;
      }
  }

  function validate() {
      if (document.myform.pass1.value != document.myform.pass2.value) {
        alert("Passsword Does Not Match");
        return false;
      }
    }
  </script>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>