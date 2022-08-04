<?php
$key = md5(sha1("NIGERIA")).sha1("NIGERIA");
$salt = md5(sha1("NIGERIA")).sha1("NIGERIA");


//ENCRPT
function encrypty($string, $key){
	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
	return  $string;
}

//DECRYPT

function decrypt ($string, $key){
	$string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
	return $string;

}


//hachpassword

function hashword($string, $salt){
	$string = crypt($string, '$1$' . $salt . '$');
	return $string;

}

//prectect
// function protect($string){
// 	$string = trim($string);
// 	$string = strip_tags($string);
// 	$string = addslashes($string);

// 	return $tring;
// }



// function USE_PASSWORD_ENCRYPTION($string, $key){
// 	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
// 	return  $string;
// }
// function PASSWORD_ENCRYPTION_TYPE($string, $key){
// 	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
// 	return  $string;
// }
// function PASSWORD_ENCRYPTION_KEY($string, $key){
// 	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
// 	return  $string;
// }


define("USE_PASSWORD_ENCRYPTION", 'encrypty');
define("PASSWORD_ENCRYPTION_TYPE", 'encrypty');
define("PASSWORD_ENCRYPTION_KEY", 'encrypty');


?>