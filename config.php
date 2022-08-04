<?php
// session_start();
require "connection/function.php";

// Tutorials Session form Validation
if(isset($_POST['create2']) && $_POST['create2'] == "Register" && $_POST['create2'] !=""){
	$er = false;
	date_default_timezone_set('Africa/Lagos');// change according timezone
	$currentTime = date( 'd-m-Y h:i:s A', time () );
	$surname= $_SESSION['surname'] = mysqli_real_escape_string($connect, clean_fun(ucwords($_POST['surname'])));
	$firstname = $_SESSION['firstname'] = mysqli_real_escape_string($connect, clean_fun(ucwords($_POST['firstname'])));
	$email = $_SESSION['email'] = mysqli_real_escape_string($connect, clean_fun(strtolower($_POST['email'])));
	$gender = mysqli_real_escape_string($connect, clean_fun($_POST['gender']));
	$dob = mysqli_real_escape_string($connect, clean_fun($_POST['dob']));
	$phone = $_SESSION['phone'] = mysqli_real_escape_string($connect, clean_fun($_POST['phone']));
	$courses = "";
	$fullname = $surname.' '.$firstname;
	$number = $phone;
	$password = md5(sha1($surname)).sha1($surname);
	
	$get_email  = mysqli_query($connect, sprintf("SELECT email FROM users WHERE email = '$email'"));
	$num1 = mysqli_num_rows($get_email);
	$get_phone  = mysqli_query($connect, sprintf("SELECT phone FROM users WHERE phone = '$phone'"));
	$num3 = mysqli_num_rows($get_phone);
	if($num1>0){
		$er = true;
		$_SESSION['errnum1'] = "This Email is Already Exit.";
	}

	if($num3>0){
		$er = true;
		$_SESSION['errnum3'] = "This Phone Number is Already Exit.";
	}else{
		if($er == false){
			include "mailer/pushmail.php";
			$send = "final_stage";
			$user_level = "Tutorial";
			$active = base64_encode("succesfull");
			$ip_address = check_behind_proxy();
			$application_no_query = mysqli_query($connect, "SELECT application_no FROM users WHERE user_level = '$user_level'  ORDER BY `users`.`application_no` DESC") or die(mysqli_error($connect));	
			$application_no_result = mysqli_num_rows($application_no_query);
			if($application_no_result==0){
				$application_no = $_SESSION['application_no'] = 'AOS'."/".date("y")."/".strtoupper("TS"."/".'01');
				// check for available news letter
				$check_mails = mysqli_query($connect, "SELECT email FROM email_lists") or die(mysqli_error($connect));
				$getmails = mysqli_fetch_assoc($check_mails);
				if($getmails['email']==$email){
					$mail = mysqli_query($connect, "UPDATE email_lists SET name = '$surname', phone = '$phone', email = '$email'")or die(mysqli_error($connect));
				}
				else{
					$mail = mysqli_query($connect, "INSERT INTO email_lists SET name = '$surname', phone = '$phone', email = '$email'")or die(mysqli_error($connect));
				}					
				$query_insert = mysqli_query($connect, sprintf("INSERT INTO users SET surname = '$surname', firstname = '$firstname', fullname = '$fullname', user_level = '$user_level', email = '$email', application_no = '$application_no', gender = '$gender', dob = '$dob', phone = '$phone', courses = '$courses', ip_address = '$ip_address', department = 'Tutorial Studies', password = '$password', creation_date = '$currentTime', session ='".date("Y")."'")) or die(mysqli_error($connect));				
				if(!empty($query_insert)){
					active_reg($email,$surname,$user_level,$application_no);
					$_SESSION['surname'];
					 $_SESSION['email'];
					 $_SESSION['phone'];
					 $_SESSION['application_no'];
					 $_SESSION['echomsg'] = ' Your Tutorial Section account as been Created.';
					header("LOCATION:".base_url("t_cridential.php"));
				}				
		}

			elseif($application_no_result>0){
				// fetch the user generate id for looping
				$get_application_no = mysqli_fetch_assoc($application_no_query);
				$application_row = $get_application_no['application_no'];
				// looping start
				$lastfullid = $application_row;						
				$explodedid = explode("/", $lastfullid);
				(int)$lastneededid = $explodedid[3];
				$nextneededid = $lastneededid + 1;
				if($nextneededid < 10){
					$nextneededid = '0'.$nextneededid;
				}else{
					$nextneededid;
				}

				// check for available news letter
				$check_mails = mysqli_query($connect, "SELECT email FROM email_lists") or die(mysqli_error($connect));
				$getmails = mysqli_fetch_assoc($check_mails);
				if($getmails['email']==$email){
					$mail = mysqli_query($connect, "UPDATE email_lists SET name = '$surname', phone = '$phone', email = '$email'")or die(mysqli_error($connect));
				}
				else{
					$mail = mysqli_query($connect, "INSERT INTO email_lists SET name = '$surname', phone = '$phone', email = '$email'")or die(mysqli_error($connect));
				}	
					
				$application_no = $_SESSION['application_no'] = 'AOS'."/".date("y")."/".strtoupper("TS"."/".$nextneededid);
				$query_insert = mysqli_query($connect, sprintf("INSERT INTO users SET surname = '$surname', firstname = '$firstname', fullname = '$fullname', user_level = '$user_level', email = '$email', application_no = '$application_no', gender = '$gender', dob = '$dob', phone = '$phone', courses = '$courses', ip_address = '$ip_address', department = 'Tutorial Studies', password = '$password', creation_date = '$currentTime', session ='".date("Y")."'")) or die(mysqli_error($connect));
				if(!empty($query_insert)){
					active_reg($email,$surname,$user_level,$application_no);
					$_SESSION['surname'];
					 $_SESSION['email'];
					 $_SESSION['phone'];
					 $_SESSION['application_no'];
					 $_SESSION['echomsg'] = ' Your Tutorial Section account as been Created.';
					header("LOCATION:".base_url("t_cridential.php"));
				}	
			}

		}
	}
}


?>

