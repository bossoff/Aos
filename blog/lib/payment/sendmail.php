<?php
/*
 * Store this file inside PHPMailer folder where class.phpmailer.php file is
don't forget to change the changeable details such as username, password and other details below
 * This is the file you will include on every page where you want to send email on your website
 * Then you'll call the function Send_Mail() and supply the required parameters whenever you want to send mail
 * The function will return TRUE (1)  if mail sent or FALSE (0) if not sent
*/
function Send_Mail($toaddress,$toname,$subject,$body,$altbody=null,$from=null,$fromname=null)
{
	require'class.phpmailer.php';//don't change this
	$uname = "username@yourdomain.com";//change to the email created for authentication
	$pwd = "4gQP7g1vUT)!i2";
	$frm = "username@yourdomain.com";//may be the same email as above
	$replyto = "username@yourdomain.com";//define new email if you'd like reply to to change or use the same email
	if(isset($from) && ($from!=null && !empty($from))){
		$from = $from;
	}
	else{
		$from = $frm;//default from Email
	}
	if(isset($fromname) && ($fromname!=null && !empty($fromname))){
		$fromname = $fromname;
	}
	else{
		$fromname = 'Name of Website';//default from name//change it
	}

	$altbodysuffix = "";
	$mail = new PHPMailer();
	$mail->IsSMTP(true); // use SMTP
	$mail->IsHTML(true);
	$mail->SMTPKeepAlive=true;//activate when sending to many (looped)
	$mail->SMTPSecure = "ssl/tls";
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->Host = "mail.yourdomain.com"; //check this from the email section on the cPanel for the email you are using for authentication
	
	$mail->Port = 25; // set the SMTP port. Default to 25
	$mail->Username = $uname; // SMTP username
	$mail->Password = $pwd; // SMTP password
	$mail->SetFrom($from, $fromname);
	$mail->AddReplyTo($from, $fromname);
	$mail->Subject = $subject;
	$mail->AltBody = $altbody . $altbodysuffix; // optional - MsgHTML will create an alternate automatically
	//$body = file_get_contents($body);
	//$body = eregi_replace("[\]",'',$body);
	$mail->MsgHTML($body);
	$mail->AddAddress($toaddress, $toname);
	$mail->Send();
}
$altbody = null; //setting default altBody infix content
?>