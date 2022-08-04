<?php

$server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "aosacademy";
// yjis for this for the exception class
$connect = mysqli_connect($server,$db_username,$db_password);
	//select database
$db = mysqli_select_db($connect,$db_name) or die(mysqli_error($connect));

class ServerException extends exception{}
class DatabaseException extends exception {}
try{
	if(!@$connect = mysqli_connect($server,$db_username,$db_password)){
		throw new ServerException("Sorry system could not connected to the Server");
	}elseif (!@mysqli_select_db($connect,$db_name)) {
		throw new DatabaseException("Opps the system connected fine but it was unable to select the Database");
	}else{
		// echo "Connected.......";
	}
	//we try to use this to catch the exption
}catch (ServerException $ex){
	echo "ERROR:" .$ex->getMessage();
}catch (DatabaseException $ex){
	echo "ERROR:" .$ex->getMessage();

}

?>