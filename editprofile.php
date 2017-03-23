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
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<style type="text/css">
    .myform input[type="text"], input[type="email"], input[type="date"], input[type="password"]  {
  font-size: 15px;
  font-family: "Segoe UI";
  width: 210px;
  height: 36px;
  border: 2px solid #dadada;
  padding: 8px;
  border-radius: 4px;
  outline: none;
}
.myform input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus {
box-shadow: 0 0 5px rgba(81, 203, 238, 1);
padding: ;
border: 2px solid rgba(81, 203, 238, 1);
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
<body>
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
<br><br><br><br>
<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">
    
    <?php

include_once("connect.php");

$query = mysql_query("SELECT * FROM student WHERE sid = '".$_SESSION['name']."'");
  $row = mysql_fetch_array($query);
  
if( isset($_POST['submit']))
     { 
              $id = $_POST['id'];
              //$passwordmd5 = md5($_POST['pass']);
               $UpdateQuery = "UPDATE student SET sid ='$_POST[sid]', fname='$_POST[name]', lname='$_POST[lname]', dob='$_POST[dob]', department='$_POST[dept]', email='$_POST[email]' WHERE ID='$id'";

               if(!mysql_query($UpdateQuery)){
               die("strange error");
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Successful Updated");location.href="editprofile.php"';
                echo '</script>';
              }


              
               //echo "<meta http-equiv='refresh' content='0; url=get.php'>";

     }

?>


<form class="myform" action="editprofile" method="post">

   <br><input type="hidden" name="sid" value="<?php echo $row[1];   ?>"><br>
   First Name:<br><input type="text" name="name" required="required" value="<?php echo $row[2];   ?>"><br>
   Last Name:<br><input type="text" name="lname" required="required" value="<?php echo $row[3];   ?>"><br>
   Department:<br><input type="text" name="dept" required="required" value="<?php echo $row[4];   ?>"><br>
   Dob<br><input type="date" name="dob" required="required" value="<?php echo $row[6];   ?>"><br>
   Email:<br><input type="email" name="email" required="required" value="<?php echo $row[7];   ?>">
   <br><br>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
<input class="btn btn-default" type="submit" value="Update" name="submit">
<a class="btn btn-default" href="user" role="button">Cancel</a>
</form>

  </div>
</div>


<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>