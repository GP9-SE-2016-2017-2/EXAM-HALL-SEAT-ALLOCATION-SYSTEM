<?php

include_once("connect.php");

session_start();

if( isset($_POST['submit']))
{ 

$inputuser =$_POST['user'];
$inputpass =md5($_POST['pass']);

$query = "SELECT * FROM `student` WHERE `sid` = '$inputuser' AND  `password` = '$inputpass'";
$result = mysql_query($query);



if (mysql_num_rows($result)==1) {
	$_SESSION['name'] = $inputuser;
	header('location: user');
}
else
	header('location: wlogin');

}

?>


