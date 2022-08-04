<?php
$server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "aosacademy";
// yjis for this for the exception class
$connect = mysqli_connect($server,$db_username,$db_password);
	//select database
 mysqli_select_db($connect,$db_name) or die(mysqli_error($connect));
?>