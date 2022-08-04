<?php
define('_CONNECT', "connection/");
define('_LIB', "lib/");
define('_LIB1', "../lib/");
 require (_CONNECT."../constant_var.php");
require (_CONNECT."../database.php");
// require (_LIB1."check_behind_proxy.php");
// require (_LIB1."blocking_injection.php");
// define('CONSTANT', "connection/constant_var.php");
//require CONSTANT."constant_var";
// BASE URL FUNCTION FOR THE REDIRECT

// THIS FUNCTION IS USE FOR THE BASE_URL (FOR RHE REDIRECT)
function base_url1($value)
{
	$url1 = 'http://localhost/aos/aosadmin/'.$value;
	return $url1;
}

function base_url($value)
{
	$url = 'http://localhost/aos/'.$value;
	return $url;
}
	// Base url
define('BASE_URL', 'http://localhost/aos/');


// THE FUNCTION IS TO GET PHRASE AND REPLACE WITH UNDERSCORE
function get_phrase($text)
{	 	
	if (!empty($text)) {
		$text = str_replace('_', ' ', $text);
	}
	return ucwords($text);
}

// THIS FUNCTION IS USE TO SANITIZE VALUE
function sanitize($variable){
	$variable = str_replace("",";",$variable);
	if(!get_magic_quotes_gpc()){
		$variable = addslashes($variable);
	}
	return $variable;
}

// THIS FUNCTION IS USE TO GET THE DETAILS
function get_where($table, $field, $value, $action)
{

	include_once ('connection/database.php');

	$query_string = "SELECT * FROM $table WHERE $field = '$value'";

	$query = mysqli_query($connect, $query_string);

	if ($action == 'row') {
		$result = mysqli_fetch_assoc($query);
	}
	elseif ($action == 'count') {
		
	}

	return $result;
}

// THIS FOR THE NOTIFICATION FUNCTION
function notify($userid,$notification_type,$is_read,$notification_message){


	$do_insert = mysqli_query($connect, sprintf("INSERT INTO notification (userid, notification_type, is_read, notification_message) VALUES ('$userid', '$notification_type', '$is_read', '$notification_message')"));
		if ($do_insert){
			return true;
		}else{
			return false;
		}
}




//require (base_url("connection/constant_var.php"));




?>