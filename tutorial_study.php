<?php
// session_start();
require "connection/function.php";

if(isset($_POST['create2']) && $_POST['create2'] == "Register" && $_POST['create2'] !=""){
	$er = false;

	date_default_timezone_set('Africa/Lagos');// change according timezone
	$currentTime = date( 'd-m-Y h:i:s A', time () );

	$surname= $_SESSION['surname'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['surname']))))))));
	$firstname = $_SESSION['firstname'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['firstname']))))))));
	$email = $_SESSION['email'] = mysqli_real_escape_string($connect, strtolower(($_POST['email'])));
	$gender = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtoupper(removeBadChars($_POST['gender']))))))));
	$dob = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtoupper(removeBadChars($_POST['dob']))))))));

	$phone = $_SESSION['phone'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['phone']))))))));
	$dob = mysqli_real_escape_string($connect, $_POST['dob']);
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
			include "mailer/sendmail.php";
			$send = "final_stage";
			$user_level = "Tutorial";
			$active = base64_encode("succesfull");
			$ip_address = check_behind_proxy();
			$application_no_query = mysqli_query($connect, "SELECT application_no FROM users WHERE user_level = '$user_level'  ORDER BY `users`.`application_no` DESC") or die(mysqli_error($connect));	
			$application_no_result = mysqli_num_rows($application_no_query);
			if($application_no_result==0){
					$application_no = $_SESSION['application_no'] = 'AOS'."/".date("y")."/".strtoupper("TS"."/".'01');
					// insert emails to the email list 
					$check_mails = mysqli_query($connect, "SELECT email FROM emails") or die(mysqli_error($connect));
					$getmails = mysqli_fetch_assoc($check_mails);
					if($getmails['email']==$email){
						$mail = mysqli_query($connect, "UPDATE emails SET name = '$surname', email = '$email'")or die(mysqli_error($connect));
					}else{
						$mail = mysqli_query($connect, "INSERT INTO emails SET name = '$surname', email = '$email'")or die(mysqli_error($connect));
					}
					
				$query_insert = mysqli_query($connect, sprintf("INSERT INTO users SET surname = '$surname', firstname = '$firstname', fullname = '$fullname', user_level = '$user_level', email = '$email', application_no = '$application_no', gender = '$gender', dob = '$dob', phone = '$phone', courses = '$courses', ip_address = '$ip_address', department = 'Tutorial Studies', password = '$password', creation_date = '$currentTime', session ='".date("Y")."'")) or die(mysqli_error($connect));
				
				if(!empty($query_insert)){
					$subject = "LOGIN CRIDENTIALS FROM A.O.S Academy";

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

																					You have been succesfull registered for <a href="http://aosacademy.com">A.O.S Academy (TUTORIAL STUDIES)</a>. Here are your Login Cridentials <br/> Email: "'.$email.'"<br/>Username:"'.$application_no.'".<br/>password:"'.$surname.'".<br/>We appreciate your interest in A.O.S Academy services. We are the best as a topflight professionals in Fench Language Studies.<br/>For more enquries contact us on: "'.MTN.'
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
				
						 $_SESSION['surname'];
						 $_SESSION['email'];
						 $_SESSION['phone'];
						 $_SESSION['application_no'];
						 $_SESSION['echomsg'] = ' Your Tutorial Section account as been Created.';
						header("LOCATION:".base_url("cridential.php?".$send."_rdir=otp&access=".$active."/Active_into/AOS_TUTORIAL%STUDIES_log=1_".$number));
					
					
							//  $_SESSION['surname'];
							//  $_SESSION['email'];
							//  $_SESSION['phone'];
							//  $_SESSION['application_no'];
							//  $_SESSION['echomsg'] = ' Your French Laguage Department account as been Created.';
							// header("LOCATION:".base_url("cridential.php?".$send."_rdir=otp&access=".$active."/Active_into/AOS_TUTORIAL%STUDIES_log=1_".$phone));

				}

			}elseif($application_no_result>0){
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

					// insert emails to the email list 
					$check_mails = mysqli_query($connect, "SELECT email FROM emails") or die(mysqli_error($connect));
					$getmails = mysqli_fetch_assoc($check_mails);
					if($getmails['email']==$email){
						$mail = mysqli_query($connect, "UPDATE emails SET name = '$surname', email = '$email'")or die(mysqli_error($connect));
					}else{
						$mail = mysqli_query($connect, "INSERT INTO emails SET name = '$surname', email = '$email'")or die(mysqli_error($connect));
					}
					
				$application_no = $_SESSION['application_no'] = 'AOS'."/".date("y")."/".strtoupper("TS"."/".$nextneededid);
				$query_insert = mysqli_query($connect, sprintf("INSERT INTO users SET surname = '$surname', firstname = '$firstname', fullname = '$fullname', user_level = '$user_level', email = '$email', application_no = '$application_no', gender = '$gender', dob = '$dob', phone = '$phone', courses = '$courses', ip_address = '$ip_address', department = 'Tutorial Studies', password = '$password', creation_date = '$currentTime', session ='".date("Y")."'")) or die(mysqli_error($connect));
				if(!empty($query_insert)){
					$subject = "LOGIN CRIDENTIALS FROM A.O.S Academy";
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

																						You have been succesfull registered for <a href="http://aosacademy.com">A.O.S Academy (TUTORIAL STUDIES)</a>. Here are your Login Cridentials <br/> Email: "'.$email.'"<br/>Username:"'.$application_no.'".<br/>password:"'.$surname.'".<br/>We appreciate your interest in A.O.S Academy services. We are the best as a topflight professionals in Fench Language Studies.<br/>For more enquries contact us on: "'.MTN.'
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
					
						 $_SESSION['surname'];
						 $_SESSION['email'];
						 $_SESSION['phone'];
						 $_SESSION['application_no'];
						 $_SESSION['echomsg'] = ' Your Tutorial Section account as been Created.';
						header("LOCATION:".base_url("cridential.php?".$send."_rdir=otp&access=".$active."/Active_into/AOS_TUTORIAL%STUDIES_log=1_".$number));
					

					
							//  $_SESSION['surname'];
							//  $_SESSION['email'];
							//  $_SESSION['phone'];
							//  $_SESSION['application_no'];
							//  $_SESSION['echomsg'] = ' Your Tutorial Section account as been Created.';
							// header("LOCATION:".base_url("cridential.php?".$send."_rdir=otp&access=".$active."/Active_into/AOS_TUTORIAL%STUDIES_log=1_".$phone));

				}
			}

		}
	}


}


?>



<?php
require "inc/header.php";
?>
<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
function userAvailability1() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'phone='+$("#phone").val(),
type: "POST",
success:function(data){
$("#user-availability-status2").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<title><?=TITLE13;?></title>
		<!-- end header -->
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="<?= base_url('');?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li><a href="<?= base_url('');?>">Features</a><i class="icon-angle-right"></i></li>
							<li class="active">Create Acount</li>
						</ul>
					</div>
				</div>
			</div>
		</section>



		<section id="content">
			<div class="container">
				<fieldset>
	<legend>Create Account</legend>
	<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
						<form role="form" action="<?=base_url("tutorial_study.php?rdir=set_account&&account==create_account/input.php");?>" method="POST" class="register-form" enctype="multipart/form-data">
							<h2>Please Sign Up <br><small>Please all applicants most be careful when filling the forms, to avoid any mistakes.</small></h2>
							<hr class="colorgraph">
							<?php if(isset($_SESSION['errmsg1'])){?>
											<div class="btn-success"><p style="color: #fff; padding: 5px;"><?=$_SESSION['errmsg1'];?></p></div>
										<?php }?>
										<br>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="surname" id="firstname" class="form-control input-lg" required="required" placeholder="Surname" tabindex="1">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="firstname" id="firstname" e class="form-control input-lg" required="required" placeholder="Firstname" tabindex="2">
									</div>
								</div>
							</div>
								

							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<span id="user-availability-status1" style="font-size:12px;"></span>
										<?php if(isset($_SESSION['errnum1'])){?>
											<div class="btn-danger"><?=$_SESSION['errnum1'];?></div>
										<?php }?>
										<input type="email" name="email" id="email" onBlur="userAvailability()" class="form-control input-lg" required="required" placeholder="Email Address" tabindex="1">
									</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<span id="user-availability-status2" style="font-size:12px;"></span>								
										<?php if(isset($_SESSION['errnum3'])){?>
											<div class="btn-danger"><?=$_SESSION['errnum3'];?></div>
										<?php }?>
										<input type="text" name="phone" id="phone" onBlur="userAvailability1()" class="form-control input-lg" required="required" placeholder="Phone Number" tabindex="2">
									</div>
								</div>
							</div>

						

							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<!-- <div style="background: green; padding: 2px; color: #fff;"> Date of Birth </div> -->
									<div class="form-group">
										<input type="text" name="dob" id="dob" title="Date Of Birth" value="" class="form-control input-lg" required="required" placeholder="25/60/1993" tabindex="6">
									</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<select name="gender" class="form-control input-lg" required="required">
											<option style="align-items: center;">-- Gender --</option>
											<option type="radio" required="required" value="Male">MALE</option>
											<option type="radio" required="required" value="Female">FEMALE</option>
										</select>
									</div>
								</div>

								
							</div>


						



							<div class="row">
								<div class="col-xs-4 col-sm-3 col-md-3">
									<!-- <span class="button-checkbox">
										<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
				                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
									</span> -->
								</div>

								<div class="col-xs-8 col-sm-9 col-md-9">
									By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
								</div>
							</div>

							<hr class="colorgraph">

							<div class="row">
								<div class="col-xs-12 col-md-6"><input type="submit" name="create2" value="Register" class="btn btn-theme btn-block btn-lg" tabindex="7"></div>
								<div class="col-xs-12 col-md-6">Already have an account? <a href="<?=base_url("");?>">Sign In</a></div>
							</div>

						</form>
					</div>
				</div>

				<!-- Modal -->
				<!-- <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
							</div>
							<div class="modal-body">
								<p>Welcome you warmly to Mind Map Educational Services (MMES), to a teaching and learning community! Mind map is located in the capital city of ilorin, Ilorin, Nigeria. We are an educational approved citadel of learning with the sole responsibility of preparing young and able minds for both internal and external examinations. At Mind Map, we offer an all-inclusive, academically challenging and selective co-educational service to all willing Nigeria students seeking university admission. Our mission is to develop responsible global citizens and cultivate leadership skills through academic excellence in our students. We also have a vision, is to assist all Nigeria student who have serious concern getting university education, get closer to fulfilling their educational potentials through our A’ level programmes (IJMB, JUPEB and NABTEB). You are cordially welcome to a conducive learning environment, where your success is our ultimate priority!. Register with us today! You can also inform a friend. Come and let build your world together.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
							</div>
						</div>
					</div>
				</div>
 -->				<!-- /.modal -->
</fieldset>
				
			</div>
		</section>



<?php
include "inc/foot.php";
unset($_SESSION['errnum1']);
unset($_SESSION['errnum3']);
unset($_SESSION['errmsg1']);
?>