<?php


include_once("connect.php");
session_start();

if( isset($_POST['submit']))
{ 

$inputuser =$_POST['user'];
$inputpass =$_POST['pass'];

$query = "SELECT * FROM `admin` WHERE BINARY `username` = '$inputuser' AND BINARY `password` = '$inputpass'";
$result = mysql_query($query);

if (mysql_num_rows($result)==1) {
	$_SESSION['admin'] = $inputuser;
	header('location: admin');
}
else{

	//header('location: wadmin');

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
      title: "Error",
      text: "wrong username or password",
      type: "error",
      showConfirmButton: false,
      timer: 1200
    },
    function(){
      window.location.href = "adminlogin";  
      });
    </script>
</body>
</html>
';

}
}


?>


