<?php
error_reporting(0);
session_start();
if (!$_SESSION['name']) {
  header('location: login');
  
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

	height: 36px;
	width: 230px;
  padding: 8px;
  font-family: "Segoe UI";
	border-radius: 5px;
	font-size: 15px;
	border: 2px solid #dadada;
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
<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #efeff4" role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="user.php">Exam Hall Seat Allocation System</a>
	
	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">
			<li><a href=""></a></li>
			<li class="active"><a href="subject">Add Course</a></li>
      <li><a href="view">View Course</a></li>
			<li><a href="seat">View Seat</a></li>
			<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php  
			session_start();
			echo $_SESSION['name'];
			?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="editprofile">Edit Profile</a></li>
            <li><a href="logout">Log out</a></li>
          </ul>
        </li>
			
      </ul>
	</div>
 </div>
</nav>
<br><br><br><br><br><br>
<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">
    
    <?php

include "connect.php";

  if( isset($_GET['edit']))
     {
             $id = $_GET['edit'];
             $res = mysql_query("SELECT * FROM course WHERE ID='$id'");
             $row = mysql_fetch_array($res);

     }

  if( isset($_POST['submit']))
     { 
        $cid = $_POST['cid'];
        $name = $_POST['name'];
        $sid = $_POST['sid'];

              //$id = $_POST['id'];
               $sql = ("INSERT INTO `subject` VALUES ('', '$cid', '$name', '', '$sid')");

               if(!mysql_query($sql)){
               die("strange error");
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Successful Added");location.href="subject.php"';
                echo '</script>';
              }


              
               //echo "<meta http-equiv='refresh' content='0; url=get.php'>";

     }
?>
  <form class="action" action="add" method="post">
  Course ID:<br><input type="text" readonly="readonly" name="cid" value="<?php echo $row[1]; ?>"><br>
  Name:<br><input type="text" name="name" readonly="readonly"  value="<?php echo $row[2]; ?>"><br><br>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
  <input type="hidden" name="sid" value="<?php echo $_SESSION['name']; ?>">
  <input class="btn btn-default" type="submit" value="Add" name="submit">
  <a class="btn btn-default" href="subject.php" role="button">Cancel</a>
</form>

  </div>
</div>


 
<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>