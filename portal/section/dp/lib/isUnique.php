<?php
include "connection/database.php";
	//email Validations from the exiting database
function isUnique_email($email){
	$email_check_Query = "SELECT email FROM user WHERE email = '$email'";

		global $connect;
			$checkemail = mysqli_query($connect,$email_check_Query);
				$emailresult = mysqli_num_rows($checkemail);

		if ($emailresult >0){
			return false;
		}else{
			return true;
		}

}		
?>


<?php
	//username Validations from the exiting database
function isUnique_username($username){
	$username_check_Query = "SELECT user_login FROM user WHERE user_login = '$username' || user_name = '$username' LIMIT 1";

		global $connect;
			$checkusername = mysqli_query($connect,$username_check_Query);
		//$usernameresult = mysqli_num_rows($checkusername);

		if ($checkusername =1){
			return false;
		}else{
			return true;
		}
	
}
?>

<?php
	//Phone Validations from the exiting database
function isUnique_phone($phone){
	$phone_check_Query = "SELECT phone FROM user WHERE phone = '$phone'";

		global $connect;
			$checkphone = mysqli_query($connect,$phone_check_Query);
		$phoneresult = mysqli_num_rows($checkphone);

		if ($phoneresult >0){
			return false;
		}else{
			return true;
		}
	
}
?>