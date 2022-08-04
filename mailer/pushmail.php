<?php


function project_ac($token, $email, $user_level){
	$subject = $user_level." Verification Code From A.O.S Academy";

				$body = '<body style="width:100% !important;margin:0; padding:0;">
					<table cellpadding="0" width="100%" cellspacing="0" border="0" style="margin:0; padding:0; width:100% !important; line-height: 100% !important;">
						<tr>
							<td>
								<table cellpadding="0" width="620" style="max-width: 600px; width: 95% !important;" align="center" cellspacing="0" border="0">
									<tr>
										<td>
											<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="max-width: 600px; width: 95% !important;">
												<tr>
													<td style="color: #fff;">
			<div>
				<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="max-width: 600px; width: 95% !important;">
					<tr height="40">
						<td width="200">&nbsp;</td>
					</tr>
					<tr>
						<td width="200" valign="top">&nbsp;</td>

						<td width="200" valign="top" align="center">																					
		                	<div class="contentEditable" align="center">
		                  		<img src="http://aosacademy.com/images/aosacademy_logo.png" width="155" height="155"  alt="aosacademy_logo" data-default="placeholder" />
		                	</div>										             
						</td>
						<td width="200" valign="top">&nbsp;</td>
					</tr>
					
				</table>
			</div>

			<div>
				<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="max-width: 600px; width: 95% !important;">
					<tr>
						<td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
							<div class="contentTextEditable">
			                	<div class="contentEditable" align="center">
			                  		<h2 style="color:#f15814;font-family:Helvetica, Arial, sans-serif;font-size:22px;	line-height: 22px;font-weight: normal; font-weight: bold;">Welcome On Board...</h2>
			                	</div>
			              	</div>
						</td>
					</tr>
			<tr>
				<td width="100">&nbsp;</td>
				<td width="400" align="center">
					<div class="contentTextEditable">
	                	<div class="contentEditable" align="left" >
	                  		<p style="color:#555;font-family:Helvetica, Arial, sans-serif;font-size:16px;line-height:160%;"><strong> Hello!, </strong> 
	                  			<br/>
	                  			<br/>
 
								Welcome to our <a href="http://aosacademy.com">'.$user_level.' portal in A.O.S Academy </a>. Here is your token number to complete your registration <br/> <br/>Email:  '.$email.'<br/><br/>Token:  '.$token.'<br/><br/>We appreciate your interest in A.O.S Academy.<br/>For more enquries contact us on: <br/>'.MTN.' || '.AIRTEL.'
							</p>
	                	</div>
	              	</div>
				</td>
				<td width="100">&nbsp;</td>
			</tr>
		</table>

		<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="max-width: 600px; width: 95% !important;">
			<tr>
			<td width="200">&nbsp;</td>
			<td width="200" align="center" style="padding-top:25px;">
			
			<br><br>
			</td><td width="200">&nbsp;</td>
			</tr>						
			</table>
			</div>
			</td>
			</tr>						
			</table>
			</td>
			</tr>
			</table>	
			</td>
			</tr>

			</table>					
				<div style="border-top: 3px solid #f26522;background:#49872E;text-shadow:none;padding:0;padding-top:30px;margin:0;padding:0; max-width: 100%">
					<div style="width: 90%; padding: 2%; color: #fff;">					
						<div style="text-align:center;font-size:16px;">
							<p>  © 2016 - '.date("Y").' || '.FOOTER.'</p>
						</div>
					</div>
				</div>	
			</body>';
			$altbody = "From: support@aosacademy.com\r\n";
			$mail = Do_mail($email,$user_level,$subject,$body,$altbody);
}

function active_reg($email,$surname,$sub_type,$application_no){
	$subject = strtoupper($sub_type)." LOGIN CREDENTIALS FROM A.O.S Academy";

	$body = '<body style="width:100% !important;margin:0; padding:0;">
					<table cellpadding="0" width="100%" cellspacing="0" border="0" style="margin:0; padding:0; width:100% !important; line-height: 100% !important;">
						<tr>
							<td>
								<table cellpadding="0" width="620" style="max-width: 600px; width: 95% !important;" align="center" cellspacing="0" border="0">
									<tr>
										<td>
											<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="max-width: 600px; width: 95% !important;">
												<tr>
													<td style="color: #fff;">
			<div>
				<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="max-width: 600px; width: 95% !important;">
					<tr height="40">
						<td width="200">&nbsp;</td>
					</tr>
					<tr>
						<td width="200" valign="top">&nbsp;</td>

						<td width="200" valign="top" align="center">																					
		                	<div class="contentEditable" align="center">
		                  		<img src="http://aosacademy.com/images/aosacademy_logo.png" width="155" height="155"  alt="aosacademy_logo" data-default="placeholder" />
		                	</div>										             
						</td>
						<td width="200" valign="top">&nbsp;</td>
					</tr>
					
				</table>
			</div>

			<div>
				<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="max-width: 600px; width: 95% !important;">
					<tr>
						<td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
							<div class="contentTextEditable">
			                	<div class="contentEditable" align="center">
			                  		<h2 style="color:#f15814;font-family:Helvetica, Arial, sans-serif;font-size:22px;	line-height: 22px;font-weight: normal; font-weight: bold;">Welcome On Board...</h2>
			                	</div>
			              	</div>
						</td>
					</tr>
			<tr>
				<td width="100">&nbsp;</td>
				<td width="400" align="center">
					<div class="contentTextEditable">
	                	<div class="contentEditable" align="left" >
	                  		<p style="color:#555;font-family:Helvetica, Arial, sans-serif;font-size:16px;line-height:160%;"><strong>Hi '.$surname.' </strong> 
	                  			<br/>
	                  			<br/>

								You have been successfully registered for <a href="http://aosacademy.com">'.$sub_type.' in A.O.S Academy </a>. Here are your Login Credentials <br/> Email:  '.$email.'<br/>Username:  '.$application_no.'.<br/>password: '.$surname.'.<br/><br/>We appreciate your interest in A.O.S Academy.<br/>For more enquries contact us on: <br/>'.MTN.' || '.AIRTEL.'
							</p>
	                	</div>
	              	</div>
				</td>
				<td width="100">&nbsp;</td>
			</tr>
		</table>

		<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" style="max-width: 600px; width: 95% !important;">
			<tr>
			<td width="200">&nbsp;</td>
			<td width="200" align="center" style="padding-top:25px;">
			<table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
				<tr>
					<td align="center" style="border-radius:4px; background: green; color: #fff !important;" width="200" height="50">
						<div class="contentTextEditable">
			            	<div class="contentEditable" align="center" >
			              		<a href="aosacademy.com/portal/" target="_blank" style="color:#fff;text-decoration:none;font-family:Helvetica, Arial, sans-serif;	font-size:16px;	color:#fff;border-radius:4px;">Click Here To Login</a>
			            	</div>
			          	</div>
					</td>
				</tr>
			</table>
			<br><br>
			</td><td width="200">&nbsp;</td>
			</tr>						
			</table>
			</div>
			</td>
			</tr>						
			</table>
			</td>
			</tr>
			</table>	
			</td>
			</tr>

			</table>					
				<div style="border-top: 3px solid #f26522;background:#49872E;text-shadow:none;padding:0;padding-top:30px;margin:0;padding:0; max-width: 100%">
					<div style="width: 90%; padding: 2%; color: #fff;">					
						<div style="text-align:center;font-size:16px;">
							<p>  © 2016 - '.date("Y").' || '.FOOTER.'</p>
						</div>
					</div>
				</div>	
			</body>';

	$altbody = "From: support@aosacademy.com\r\n";

	$mail = Do_mail($email,$surname,$subject,$body,$altbody);
}

function Do_mail($toaddress=null,$toname=null,$subject=null,$body=null,$altbody=null,$from=null,$fromname=null)
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