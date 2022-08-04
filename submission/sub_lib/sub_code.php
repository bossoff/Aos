 <?php
 
 //require "connection/database.php";
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
$query = mysqli_query($connect, sprintf("SELECT * FROM user WHERE user_login = '$user_login'|| user_email = '$user_email' || phone = '$phone' AND user_password= '$user_password' LIMIT 1"));
       $user_row = mysqli_fetch_assoc($query);
       $username = $user_row['user_login'];


?>