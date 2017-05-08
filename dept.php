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

$did = $_POST['did'];
$name = $_POST['name'];




$sql = ("INSERT INTO `dept` VALUES ('', '$did', '$name')");


      if(!mysql_query($sql)){
               die("strange error");
        
            }

           else{
            echo '<script language="javascript">';
            echo 'alert("Successfully Added");location.href="dept.php"';
            echo '</script>';
           }
    



}





?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Department</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <style type="text/css">
    .myform input[type="text"] {
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
<body>
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
      
      <form class="myform container" method="post" action="dept">
  Dept ID:<br><input type="text" required="required" name="did" ><br>
  Name:<br><input type="text" required="required" name="name" ><br><br>
  <input class="btn btn-default" type="submit" value="Submit" name="submit">
</form>

    </div>
  </div>
  <div class="col-xs-6">
    
    <table class="table">
    <tr>
    <th>DeptID</th>
    <th>Name</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    
    <?php

   if(isset($_GET['id']))
{
  $result ="delete from dept where id=".$_GET['id'];
  if (!mysql_query($result))
    echo mysql_error();
}


   


   $query=mysql_query("select * from dept");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['deptid']."</td>
          <td>".$row['name']."</td>
          <td><a href='dept?id=".$row[0]."'>Delete</a></td>
          <td><a href='deptedit?edit=$row[id]'>Edit</a></td>
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