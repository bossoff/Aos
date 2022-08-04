<?php 
//session_start();
  // SESSION START HERE FOR THE ENTRING TRUE LOGIN PAGE

  // remote file inclusion, check for strange characters in $_GET keys
  // all keys with "/", "\", ":" or "%-0-0" are blocked, so it becomes virtually impossible
  // to inject other pages or websites
    foreach($_GET as $get_key => $get_value){
        if(is_string($get_value) && ((preg_match("/\//", $get_value)) || (preg_match("/\[\\\]/", $get_value)) || (preg_match("/:/", $get_value)) || (preg_match("/%00/", $get_value)))){
            if(isset($_GET[$get_key])){
              //die("A hacking attempt has been detected. For security reasons, we're blocking any code execution.");
              header("LOCATION: hacking.php?rdir=A%20%hacking%20%attempt%20%has%20%been%20%detected.%20%For%20%security%20%reasons,%20%we're%20%blocking any%20%code%20%execution.");
            } 
            unset($_GET[$get_key]);
        }
    }

?>

<?php 
// THIS WAS REPORTING THE ERROR 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
