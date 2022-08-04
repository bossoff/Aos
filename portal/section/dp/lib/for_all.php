 <?php
  require ("library/photo.class.php");
 
// THE BOUNT OF CODE IS WORKING FOR THE NOTIFCATIONS
$notify = mysqli_query($connect, sprintf("SELECT * FROM notification")) or die("Critical issues at the email_query function.."." ".mysqli_error($connect));
	$row_notifications = mysqli_fetch_assoc($notify);
	$new_user = $row_notifications['notification_type'];
	$data = $row_notifications['datetime'];
	$notify_count = mysqli_num_rows($notify);
	$count_row_new_user = mysqli_num_rows($notify);

// This SHORT CODE IS USE TO CALCULATE ALL THE USERS IN THE TABLE
$all_registers = mysqli_query($connect,sprintf("SELECT * FROM user"));
	$all_registers_count = mysqli_num_rows($all_registers);


// THIS BOUNT OF CODE IS USE TO FATCH ALL USER DETAILS FROM THE DATABASE
$check_point = sprintf("SELECT * FROM user WHERE user_login = '$user_login' || user_email = '$user_email' || phone = '$phone' AND user_password = '$user_password' LIMIT 1");
	$check_query = mysqli_query($connect, $check_point) or die("Critical issues at the checking point function.."." ".mysqli_error($connect));
	$check_result = mysqli_num_rows($check_query);
	$userinfo_rows = mysqli_fetch_assoc($check_query);
	$username_row = $userinfo_rows['user_login'];
	$firstname_row = $userinfo_rows['firstname'];
	$lastname_row = $userinfo_rows['lastname'];
	$email_row = $userinfo_rows['user_email'];
	$user_level_row = $userinfo_rows['user_level'];
	$user_avatar_source = embeddedImg1($userinfo_rows['user_avatar_source']);
	$user_avatar_source2 = embeddedImg2($userinfo_rows['user_avatar_source']);
	$date = strftime("%b - %d - %Y", strtotime($userinfo_rows['reg_time']));
	$time = strftime("%I : %M : %S %p", strtotime($userinfo_rows['reg_date']));

$logo_query = mysqli_query($connect, "SELECT * FROM logo");
	$fetch_logo = mysqli_fetch_assoc($logo_query);
	$logo = embeddedImglogo($fetch_logo['logo']);

?>