<?php
function check_login(){
	if(strlen($_SESSION['ad_email'] && $_SESSION['ad_password'])==0){
		header("Location:" .base_home()."?rdir=no_entry_session_not_set");
	      exit();
	}

	elseif(!isset($_SESSION['ad_email']) || !isset($_SESSION['ad_id']) || !isset($_SESSION['ad_password'])){  
	       header("Location:" .base_home("").'?rdir=warning_is_not_session!');
	        exit();
	     
	}

	elseif(isset($_SESSION['ad_email']) && isset($_SESSION['ad_id']) && isset($_SESSION['ad_password'])){
	      $password = preg_replace('#[^a-zA-Z]#i', '', $_SESSION['ad_password']);
	      $password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION['ad_password']);
	      $password = preg_match("/^[a-zA-Z ]*$/", $_SESSION['ad_password']);

	      $email = preg_replace('#[^0-9]#i', '', $_SESSION['ad_email']);
	      $email = preg_replace('#[^a-zA-Z]#i', '', $_SESSION['ad_email']);
	      $email = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION['ad_email']);
	      $email = preg_match("/^[a-zA-Z ]*$/", $_SESSION['ad_email']);
	}


	elseif(isset($_SESSION['ad_email']) && isset($_SESSION['ad_id']) && isset($_SESSION['ad_password'])){
        $_SESSION['ad_id'] = preg_replace('#[^0-9]#i', '', $_COOKIE['ad_id']);

        $_SESSION['ad_email'] =preg_replace('#[^0-9]#i', '', $_COOKIE['ad_email']);
        $_SESSION['ad_email'] =preg_replace('#[^a-zA-Z]#i', '', $_COOKIE['ad_email']);
        $_SESSION['ad_email'] =preg_replace('#[^A-Za-z0-9]#i', '', $_COOKIE['ad_email']);
        $_SESSION['ad_email'] =preg_match("/^[a-zA-Z ]*$/", $_COOKIE['ad_email']);

        $_SESSION['ad_password'] =preg_match("/^[a-zA-Z ]*$/", $_COOKIE['ad_password']);
        $_SESSION['ad_id'] =preg_replace('#[^0-9]#i', '', $_COOKIE['ad_id']);
    
  }

}

$ad_email = $_SESSION['ad_email'];
$ad_password = $_SESSION['ad_password'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$name = $_SESSION['name'];

// elseif(!empty($avartar)){
	
// }
	$check_user_information = mysqli_query($connect, sprintf("SELECT email, password, id FROM ceoadmin WHERE email = '".$_SESSION['ad_email']."' AND password = '".$_SESSION['ad_password']."'"));
		$check_user_information_result = mysqli_num_rows($check_user_information);
			if($check_user_information_result ==0){
			  header("Location:" .base_home('portal/')."?rdir=no_entry_invalid_id");
			      exit();
			}
		// print_r($check_user_information);
?>