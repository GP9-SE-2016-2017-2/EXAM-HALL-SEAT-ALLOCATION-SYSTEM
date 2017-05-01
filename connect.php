<?php

$username = "root";
$password = "";
$database = "exam";


$connect=mysql_connect("localhost", $username, $password);
@mysql_select_db($database) or die ("unable to connect");


?>