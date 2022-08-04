<?php
function active($toaddress,$toname,$subject,$body,$altbody=null,$from=null,$fromname=null)
{

}



function Send_Mail($toaddress,$toname,$subject,$body,$altbody=null,$from=null,$fromname=null)
{
	require'class.phpmailer.php';//don't change this
	$uname = "admin@aosacademy.com";//change to the email created for authentication
	$pwd = "Aosacademy@##";
	$frm = "admin@aosacademy.com";//may be the same email as above
	$replyto = "admin@aosacademy.com";//define new email if you'd like reply to to change or use the same email
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
		$fromname = 'A.O.S ACADEMY admin@aosacademy.com';//default from name//change it
	}

	$altbodysuffix = "";
	$mail = new PHPMailer();
	$mail->IsSMTP(true); // use SMTP
	$mail->IsHTML(true);
	$mail->SMTPKeepAlive=true;//activate when sending to many (looped)
	$mail->SMTPSecure = "ssl/tls";
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->Host = "mail.aosacademy.com"; //check this from the email section on the cPanel for the email you are using for authentication
	
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