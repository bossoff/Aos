


<?php
require "connection/function.php";
require "inc/check_behind_proxy.php";
	
if(isset($_POST['forget']) && $_POST['forget'] == "password"){
	$er = false;
	$email = mysqli_real_escape_string($connect, strtolower($_POST['email']));
	if(empty($email)){
		$er = true;
		$errmsg = "Sorry Email field can not be empty.";
	}else{
		$query_admin = mysqli_query($connect, "SELECT email, firstname FROM ceoadmin WHERE eamil = '$email'");
		$query_user = mysqli_query($connect, "SELECT email, surname FROM users WHERE eamil = '$email'");
		$query_staff = mysqli_query($connect, "SELECT email FROM staffs WHERE eamil = '$email'");
		include "../mailer/sendmail.php";
		if(!empty($query_admin)){
			$get_info_ad = mysqli_fetch_assoc($query_admin);
			echo$name = $get_info_ad['firstname'];
			$token = time();
			$subject = "Reset Password From A.O.S Academy";
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
															                  		<img src="http://aosacademy.com/portal/assets/images/aosacademy_logo.png" width="155" height="155"  alt="aosacademy_logo"/>
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
																                  		<p style="color:#555;font-family:Helvetica, Arial, sans-serif;font-size:16px;line-height:160%;"><strong>Hi '.$name.' </strong> 
																                  			<br/>
																                  			<br/>
																                  			Your cridential has been verify through our system, you can now click the link below to <strong>
																                  				<a href="'.base_ur("").'resetkey.php?email=$email&&token=$token">Reset Your Password</a>
																                  			</strong>

																                  			<br/> Thanks.														
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
																			                  		<a target="_blank"style="color:#fff;text-decoration:none;font-family:Helvetica, Arial, sans-serif;	font-size:16px;	color:#fff;border-radius:4px;" href="aosacademy.com/portal/">Click Here To Login</a>
																			                	</div>
																			              	</div>
																						</td>
																					</tr>
																				</table>
																				<br><br>
																			</td>
																			<td width="200">&nbsp;</td>
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
					$mail = Send_Mail($email,$surname,$subject,$body,$altbody);
					if(!empty($mail)){
						$er = false;
						$succes = "Reset link has been send to your mail box.";
					}

		}else{
			$er = true;
			$errmsg = "Invalid submitted cridential.";
		}

		// elseif(!empty($query_user)){

		// }

		// elseif(!empty($query_staff)){
		
		// /}
	}

	
		
}



require "inc/header.php";
	// require "inc/foot.php";
?>
<title><?=TITLE1?></title>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<form action="<?=base_url("forgot-password.php?");?>" method="POST" role="form" id="form_forgot_password">
				<?php 
					if(isset($succes) && $er == false){?>
					<div class="form-forgotpassword-success">
						<i class="entypo-check"></i>
						<h3>Reset email has been sent.</h3>
						<p><?=$email;?></p>
						<!-- <p>Please check your email, reset password link will expire in 24 hours.</p> -->
					</div>
				<?php } ?>

				<?php
					if(isset($errmsg) && $er ==true){?>
					<div class="errorspage">
						<h3>Invalid login</h3>
						<p><?=$errmsg;?></p>
					</div>			
				<?php } ?>
				
				<div class="form-steps">
					
					<div class="step current" id="step-1">
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								
								<input type="text" class="form-control" name="email" id="email" placeholder="Email" data-mask="email" autocomplete="on" />
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" name="forget" value="password" class="btn btn-info btn-block btn-login">
								Complete To Reset Password!
								<i class="entypo-right-open-mini"></i>
							</button>
						</div>
					
					</div>
					
				</div>
				
			</form>
			
			
			<div class="login-bottom-links">
				
				<a href="<?=base_url('');?>" class="link">
					<i class="entypo-lock"></i>
					Return to Login Page
				</a>
				
				<br />
				
				<!-- <a href="#">ToS</a>  - <a href="#">Privacy Policy</a> -->
				
			</div>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/neon-forgotpassword.js"></script>
	<script src="assets/js/jquery.inputmask.bundle.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>