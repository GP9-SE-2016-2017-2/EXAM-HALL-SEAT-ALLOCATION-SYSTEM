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
            //echo '<script language="javascript">';
            //echo 'alert("Successfully Added");location.href="dept.php"';
            //echo '</script>';
            echo '
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
    <script src="dist/sweetalert.min.js"></script>
    <script type="text/javascript">

    swal({
      title: "Success",
      text: "Successful Added",
      type: "success",
      showConfirmButton: false,
      timer: 1200
    },
    function(){
      window.location.href = "dept";
      });
    </script>
</body>
</html>
';
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
  body{
    background-color: #F3F3F3;
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
            <li><a href="std"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Student</a></li>
            <li><a href="dept"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Department</a></li>
            <li><a href="sub"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Course</a></li>
            <li><a href="hall"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Hall</a></li>
          </ul>
        </li>


			<li><a href="logoutadmin">Log out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
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
        <div class="form-group">
        <label for="exampleInputDid">Dept ID</label>
        <input type="text" class="form-control" required="required" name="did" >
        </div>
        <div class="form-group">
        <label for="exampleInputDid">Name</label>
        <input type="text" class="form-control" required="required" name="name" >
        </div>
  <input class="btn btn-primary" type="submit" value="Submit" name="submit">
</form>

    </div>
  </div>
  <div class="col-xs-6">
   <div class="panel panel-primary">
  <div class="panel-heading">DEPARTMENT</div>
    <table class="table table-striped">
    <tr class="info">
    <th>DeptID</th>
    <th>Name</th>
    <th>Delete</th>
    <th>Edit</th>
    </tr>

    <?php

   if(isset($_GET['id']))
   {
  $result ="delete from dept where id=".$_GET['id'];
  if (!mysql_query($result))
    echo mysql_error();
    else{

      echo '
  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
  </head>
  <body>
      <script src="dist/sweetalert.min.js"></script>
      <script type="text/javascript">

      swal({
        title: "Success",
        text: "Successful Removed",
        type: "success",
        showConfirmButton: false,
        timer: 1200
      },
      function(){
        window.location.href = "dept";
        });
      </script>
  </body>
  </html>
  ';
    }
}





   $query=mysql_query("select * from dept");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr>
          <td>".$row['deptid']."</td>
          <td>".$row['name']."</td>
          <td><a href='dept?id=".$row[0]."'><button type='button' class='btn btn-danger btn-sm '>Delete</button></a></td>
          <td><a href='deptedit?edit=$row[id]'><button type='button' class='btn btn-default btn-sm'>Edit</button></a></td>
          </tr>";
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
