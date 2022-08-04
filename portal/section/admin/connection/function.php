<?php
session_start();



$protocol = $_SERVER['REQUEST_SCHEME'];

if($protocol == 'http'){
	$urk= "http://$_SERVER[HTTP_HOST]";	
	function base_url($value){
		$urk= "http://$_SERVER[HTTP_HOST]";	
		$url = $urk.'/aos/portal/section/admin/'.$value;
		return $url;	
	}

	function base_home($value)	{
		$urk= "http://$_SERVER[HTTP_HOST]";	
		$url = $urk.'/aos/'.$value;
		return $url;
	}

		// Base url
	define('BASE_URL', $urk.'/aos/');
}


elseif($protocol == 'https'){

	$urq= "https://$_SERVER[HTTP_HOST]";
	function base_url($value){
		$urq= "https://$_SERVER[HTTP_HOST]";
		$url = $urk.'/aos/portal/section/admin/'.$value;
		return $url;	
	}

	function base_home($value)	{
		$urq= "https://$_SERVER[HTTP_HOST]";
		$url = $urk.'/aos/'.$value;
		return $url;
	}

		// Base url
	define('BASE_URL', $urk.'/aos/');

}



	// Base url
// define('BASE_URL', 'http://localhost/aos/');
define('_CONNECT', "connection/");
define('_LIB', "lib/");
require ( _CONNECT."constant_var.php");
require ( _CONNECT."database.php");
// require (_LIB."check_behind_proxy.php");


//--------------------------------------------------------------------------
// set browser definitions
//--------------------------------------------------------------------------

// Removed the special characters
function removeBadChars($strWords){
    $bad_string = array("select", "drop", ";", "--", "insert","delete", "xp_", "%20union%20", "/*", "*/union/*", "+union+", "load_file", "outfile", "document.cookie", "onmouse", "<script", "<iframe", "<applet", "<meta", "<style", "<form", "<img", "<body", "<link", "_GLOBALS", "_REQUEST", "_GET", "_POST", "include_path", "prefix", "http://", "https://", "ftp://", "smb://" );
    for ($i = 0; $i < count($bad_string); $i++){
        $strWords = str_replace ($bad_string[$i], "", $strWords);
    }
    return $strWords;
}

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

	// clean the bad character true the for link
function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return $str;
}


// THIS FUNCTION IS USE TO GET THE DETAILS
function get_where($table, $field, $value, $action)
{

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
function notify($userid,$notification_type,$is_read,$notification_message)
{
	$do_insert = mysqli_query($connect,"INSERT INTO notification SET userid = '$userid', notification_type = '$notification_type', is_read = '$is_read', notification_message = '$notification_message'
		");
	if ($do_insert) 
	{
		return true;
	}
	else
	{
		return false;
	}
}




//require (base_url("connection/constant_var.php"));




?>