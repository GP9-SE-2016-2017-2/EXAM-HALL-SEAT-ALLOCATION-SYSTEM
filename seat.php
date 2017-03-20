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
	<title>Seat</title>
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
b{
  font-family: "Segoe UI";
  font-size: 15.3px;
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
<nav class="navbar navbar-default navbar-fixed-top"  role="navigation">
	<div class="container-fluid">
		<a class="navbar-brand" href="user">Exam Hall Seat Allocation System</a>
	
	<div class="navbar-header navbar-right">
		<ul class="nav navbar-nav">
			<li><a href=""></a></li>
			<li><a href="subject">Add Course</a></li>
      <li><a href="view">View Course</a></li>
			<li class="active"><a href="seat">View Seat</a></li>
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
<br><br><br>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    

  <br><br>
  <?php
include_once("connect.php");

$queryy = mysql_query("SELECT fname,lname FROM student WHERE sid = '".$_SESSION['name']."'");
  while ($roww = mysql_fetch_array($queryy)) {
 echo "<b>Name: ".$roww['fname']. '</b> '. "<b> ".$roww['lname']. '</b> '; 
}
 echo "<br>"; 
 echo " <b>ID: ".$_SESSION['name']. '</b>'; ?>
    <br><br>
    <table class="table">
    <tr>
    <th>Course ID</th>
    <th>Name</th>
    <th>Hall</th>
    <th>Seat Number</th>
    </tr>

   <?php
error_reporting(0);
   include_once("connect.php");


   session_start();


  
    if( isset($_SESSION['name'])){



  
$query = mysql_query("SELECT * FROM subject WHERE sid = '".$_SESSION['name']."'");
  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['cid']."</td>
          <td>".$row['name']."</td>
          <td>".$row['hall']."</td>
          <td>".$row['id']."</td>
          </tr>";
  }
}


   ?>
   
    </table>

    <a class="btn btn-default" href="" id="printpagebutton" onclick="printpage()" role="button">Print</a>

  </div>
  <div class="col-md-4"></div>
</div>
 

<script type="text/javascript">
    function printpage() {
        var printButton = document.getElementById("printpagebutton");
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>