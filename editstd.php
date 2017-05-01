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

 if( isset($_GET['edit']))
     {
             $id = $_GET['edit'];
             $res = mysql_query("SELECT * FROM student WHERE ID='$id'");
             $row = mysql_fetch_array($res);

     }
     if( isset($_POST['submit']))
     { 
              $id = $_POST['id'];
              $passwordmd5 = md5($_POST['pass']);
               $UpdateQuery = "UPDATE student SET sid ='$_POST[sid]', fname='$_POST[name]', lname='$_POST[lname]', department='$_POST[dept]' , gender='$_POST[gender]', dob='$_POST[dob]', email='$_POST[email]' , password='$passwordmd5' WHERE ID='$id'";

               if(!mysql_query($UpdateQuery)){
               die("strange error");
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Successful Updated");location.href="std.php"';
                echo '</script>';
              }


              
               //echo "<meta http-equiv='refresh' content='0; url=get.php'>";

     }
   

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit std</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"], input[type="password"] {
  font-size: 15px;
  width: 210px;
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
  color: black;
  font-size: 15px;
  width: 210px;
  height: 36px;
  background-color: white;
  border: 1px solid black;
  padding: 8px;
  border-radius: 4px;
  outline: none;
}

.space{
  margin-left: -150px;
}
.navbar-default{
    background-color: #efeff4;
    border-color: #efeff4;
    color: #FFFFFF;
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
<br><br><br><br><br>

<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">
    
    <form class="myform" action="editstd" method="post">
  <br>
   Std ID:<br><input type="text" required="required" name="sid" value="<?php echo $row[1];   ?>"><br>
   First Name:<br><input type="text" name="name" required="required" value="<?php echo $row[2];   ?>"><br>
   Last Name:<br><input type="text" name="lname" required="required" value="<?php echo $row[3];   ?>"><br>
   Department:<br><input type="text" name="dept" required="required" value="<?php echo $row[4];   ?>"><br>
   Gender:<br><input type="text" name="gender" required="required" value="<?php echo $row[5];   ?>" ><br>
   Dob<br><input type="date" name="dob" required="required" value="<?php echo $row[6];   ?>"><br>
   Email:<br><input type="email" name="email" required="required" value="<?php echo $row[7];   ?>"><br>
   Password:<br><input type="password" name="pass" required="required" value="<?php echo $row[8];   ?>"><br><br>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
<input class="btn btn-default" type="submit" value="Update" name="submit">
<a class="btn btn-default" href="std" role="button">Cancel</a>
</form>

  </div>
</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>