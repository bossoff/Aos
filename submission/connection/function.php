<?php
define('_CONNECT', "connection/");
define("_SUB_LIB", "sub_lib/");
define("_BASE_URL", '../aosadmin/');
define('BASE_URL', 'http://localhost/aos/');
define('_LIB', "lib/");
define('_LIB1', "../lib/");
require (_CONNECT."constant_var.php");
require (_CONNECT."database.php");



// THIS FUNCTION IS USE FOR THE BASE_URL (FOR RHE REDIRECT)

function base_url($value)
{
	$url = 'http://localhost/aos/'.$value;
	return $url;
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





//require (base_url("connection/constant_var.php"));




?>