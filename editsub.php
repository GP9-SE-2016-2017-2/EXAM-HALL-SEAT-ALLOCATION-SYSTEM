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
             $res = mysql_query("SELECT * FROM course WHERE ID='$id'");
             $row = mysql_fetch_array($res);

     }
     if( isset($_POST['submit']))
     { 
              $id = $_POST['id'];
               $UpdateQuery = "UPDATE course SET cid ='$_POST[cid]', Name='$_POST[name]' WHERE ID='$id'";

               if(!mysql_query($UpdateQuery)){
               die("strange error");
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Successful Updated");location.href="sub.php"';
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
	<title>Course</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
  <style type="text/css">
    .myform input[type="text"], input[type="date"], input[type="email"] {
  color: black;
  font-size: 15px;
  width: 210px;
  height: 36px;
  background-color: white;
  font-family: "Segoe UI";
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
<br><br><br><br><br><br>
<div class="row container">
  <div class="col-xs-6"></div>
  <div class="col-xs-6 space">
    
    <form class="myform" action="editsub" method="post">
  Course Code:<br><input type="text" name="cid" value="<?php echo $row[1]; ?>"><br>
  Name:<br><input type="text" name="name" value="<?php echo $row[2]; ?>"><br>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
 <br>
  <input class="btn btn-default" type="submit" value="Update" name="submit">
  <a class="btn btn-default" href="sub" role="button">Cancel</a>
</form>

  </div>
</div>


<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>