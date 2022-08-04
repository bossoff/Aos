<?php

function check_login(){
	if(strlen($_SESSION['email'])==0){
		$_SESSION['errnum'] = "Stop this act, trying this in 3 time your Ip Address will be Blocked.";		
		header("Location:" .base_url("research_assistance.php")."?rdir=no_entry_session_not_set");
	      exit();
	}

	elseif(!isset($_SESSION['email'])){
		$_SESSION['errnum'] = "Stop this act, trying this in 3 time your Ip Address will be Blocked.";
		header("Location:" .base_url("research_assistance.php").'?rdir=warning!');	
	     exit();

	}

	elseif(isset($_SESSION['email'])){
  	 	$email = preg_replace('#[^0-9]#i', '', $_SESSION['email']);      
	}

}

$email =  $_SESSION['email'];
// if(isset($email)){
// 	$checker_point = mysqli_query($connect, sprintf("SELECT contact FROM contacts WHERE contact = '".$_SESSION['email']."'"));
// 	$num = mysqli_num_rows($checker_point);
// 		if($num == 0){
// 			$_SESSION['errnum'] = "Warning you have no entry!";
// 		  	header("Location:" .base_url("research_assistance.php")."?rdir=no_entry_invalid_id");
// 		      exit();
// 		}
// }
	

// unset($_SESSION['errnum']);
?>