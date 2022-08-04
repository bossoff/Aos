<?php
session_start();
$server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "aosacademy";
// yjis for this for the exception class
$connect = mysqli_connect($server,$db_username,$db_password);
	//select database
$db = mysqli_select_db($connect,$db_name) or die(mysqli_error($connect));
	
	if(isset($_POST['Get']) && $_POST['Get'] == 'res'){
		$er = false;
		$name = mysqli_real_escape_string($connect, ucwords(strtolower(trim($_POST['name']))));
		$phone = mysqli_real_escape_string($connect, ucwords(strtolower(trim($_POST['phone']))));
		$email = mysqli_real_escape_string($connect, strtolower(trim($_POST['email'])));

		if($er == false){
			$checked = mysqli_query($connect,"SELECT email, phone FROM email_lists WHERE email = '$email' AND phone = '$phone'") or die(mysqli_error($connect));
			$num = mysqli_num_rows($checked);
			if($num>0){
				$er = true;
				$_SESSION['err'] = 'Thanks '.$name.', your information has already been taken.';
				header("LOCATION: response.php");
			}else{
				$query_insery = mysqli_query($connect,"INSERT INTO email_lists SET email = '$email', name = '$name', phone = '$phone'") or die(mysqli_error($connect));
				if(!empty($query_insery)){
					$er = false;
					$_SESSION['msg'] = 'Hi! '.$name.', Look out for an Email from us! Do check your spam box or promotion folder.';
					header("LOCATION: response.php");
				}
			}
		}
	}

?>