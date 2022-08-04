<?php
require "connection/function.php";
if(!isset($_SESSION['rsemail']) && !isset($_SESSION['VrToken'])){
	header("LOCATION:".base_url("research_assistance.php?=2"));
}
elseif(isset($_SESSION['rsemail']) && isset($_SESSION['VrToken'])){
	$email = $_SESSION['rsemail']; $token = $_SESSION['VrToken'];
	$queryC = mysqli_query($connect,"SELECT email,token,status FROM activate WHERE email = '$email' AND token = '$token'");
	$row = mysqli_fetch_assoc($queryC);
	if($row['status'] != 'USED'){
		header("LOCATION:".base_url("research_assistance.php?=1"));		
	}
}else{
	if(isset($_POST['create']) && $_POST['create'] == "Register" && $_POST['create'] !=""){
		$er = false;
		$email = $_SESSION['rsemail']; $token = $_SESSION['VrToken'];
		date_default_timezone_set('Africa/Lagos');// change according timezone
		$currentTime = date( 'd-m-Y h:i:s A', time () );
		$token = $_SESSION['VrToken'];
		$surname = $_SESSION['surname'] = mysqli_real_escape_string($connect, clean_fun(ucwords($_POST['surname'])));
		$email = $_SESSION['email'] = mysqli_real_escape_string($connect, clean_fun(strtolower($_POST['email'])));
		$matric = mysqli_real_escape_string($connect, clean_fun(strtoupper($_POST['matric'])));
		$level = mysqli_real_escape_string($connect, clean_fun(ucwords($_POST['level'])));
		$sublevel = mysqli_real_escape_string($connect, clean_fun(strtoupper($_POST['sublevel'])));
		$gender = mysqli_real_escape_string($connect, clean_fun(strtoupper($_POST['gender'])));
		$department = mysqli_real_escape_string($connect, clean_fun(ucwords($_POST['department'])));
		$phone = $_SESSION['phone'] = mysqli_real_escape_string($connect, clean_fun($_POST['phone']));
		$password = md5(sha1($surname)).sha1($surname);	
		$get_email  = mysqli_query($connect, sprintf("SELECT email FROM users WHERE email = '$email'"));
		$num1 = mysqli_num_rows($get_email);
		$get_matric  = mysqli_query($connect, sprintf("SELECT matric FROM users WHERE matric = '$matric'"));
		$num2 = mysqli_num_rows($get_matric);
		$get_phone  = mysqli_query($connect, sprintf("SELECT phone FROM users WHERE phone = '$phone'"));
		$num3 = mysqli_num_rows($get_phone);
		if($num1>0){
			$er = true;
			$_SESSION['errnum1'] = "This Email Already Exist.";
		}
		if($num2>0){
			$er = true;
			$_SESSION['errnum2'] = "This Matric Number Already Exist.";
		}
		if($num3>0){
			$er = true;
			$_SESSION['errnum3'] = "This Phone Number Already Exist.";
		}else{
			if($er == false){
				include "mailer/pushmail.php";
				$user_level = "Project";
				$sub_type = 'Research Assistance';
				$ip_address = check_behind_proxy();
				$application_no_query = mysqli_query($connect, "SELECT application_no FROM users WHERE user_level = '$user_level'  ORDER BY `users`.`application_no` DESC") or die(mysqli_error($connect));	
				echo$application_no_result = mysqli_num_rows($application_no_query);
				if($application_no_result==0){
					$application_no = $_SESSION['application_no']= 'AOS'."/".date("y")."/".strtoupper("RA"."/".'01');
					$query_insert = mysqli_query($connect, sprintf("INSERT INTO users SET surname = '$surname', user_level = '$user_level', email = '$email', matric = '$matric', level = '$level', sub_level = '$sublevel', application_no = '$application_no', gender = '$gender', department = '$department', phone = '$phone', ip_address = '$ip_address', password = '$password', creation_date = '$currentTime', session ='".date("Y")."'")) or die(mysqli_error($connect));
					if(!empty($query_insert)){					
						active_reg($email,$surname,$sub_type,$application_no);						
						$insert_resent_otp = mysqli_query($connect,"UPDATE activate SET status = 'EXPIRED'  WHERE email = '$email' AND token = '$token'")or die(mysqli_error($connect));
						if(!empty($insert_resent_otp)){
							 $_SESSION['surname'] = $surname;
							 $_SESSION['email'] = $email;
							 $_SESSION['phone'] = $phone;
							 $_SESSION['application_no'] = $application_no;
							header("LOCATION:".base_url("r_cridentials.php"));
						}						
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
					// $nextneededid = ($nextneededid < 10) ? ('0'.$nextneededid) : $nextneededid;						
					// generate id number 
					$application_no = $_SESSION['application_no']= 'AOS'."/".date("y")."/".strtoupper("RA"."/".$nextneededid);
					$query_insert = mysqli_query($connect, sprintf("INSERT INTO users SET surname = '$surname', user_level = '$user_level', email = '$email', matric = '$matric', level = '$level', sub_level = '$sublevel', application_no = '$application_no', gender = '$gender', department = '$department', phone = '$phone', ip_address = '$ip_address', password = '$password', creation_date = '$currentTime', session ='".date("Y")."'")) or die(mysqli_error($connect));
					if(!empty($query_insert)){
						active_reg($email,$surname,$sub_type,$application_no);						
						$insert_resent_otp = mysqli_query($connect, sprintf("UPDATE activate SET status = 'EXPIRED'  WHERE token = '$token'"))or die(mysqli_error($connect));
						if(!empty($insert_resent_otp)){
							 $_SESSION['surname'];
							 $_SESSION['email'];
							 $_SESSION['phone'];
							 $_SESSION['application_no'];
							header("LOCATION:".base_url("r_cridentials.php"));
						}
					}
				}
			}
		}
	}
}
?>




<?php
require "inc/header.php";
?>
<title><?=TITLE2;?></title>
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
function matricAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'matric='+$("#matric").val(),
type: "POST",
success:function(data){
$("#user-availability-status2").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
function getlevel(val){
	$.ajax({
	type: "POST",
	url: "get_sublevel.php",
	data:'level='+val,
		success: function(data){
			$("#sublevel").html(data);
		}
	});
}
</script>







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
						<form role="form" action="<?=base_url("registration.php?");?>" method="POST" class="register-form">
							<h2>Please Sign Up <br><small>Kindly avoid any mistakes.</small></h2>
							<hr class="colorgraph">

								<div class="form-group">
									<input type="text" name="surname" id="full_name" class="form-control input-lg" required="required" placeholder="Enter Surname" tabindex="1">
								</div>
								

							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<span id="user-availability-status1" style="font-size:12px;"></span>
										<?php if(isset($_SESSION['errnum1']) && $er==true){?>
											<div class="btn-danger"><?=$_SESSION['errnum1'];?></div>
										<?php }?>
										<input type="email" name="email" id="email" readonly="" value="<?=$_SESSION['rsemail'];?>" class="form-control input-lg" required="required" placeholder="Email Address" tabindex="1">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<?php if(isset($_SESSION['errnum3']) && $er==true){?>
											<div class="btn-danger"><?=$_SESSION['errnum3'];?></div>
										<?php }?>
										<input type="text" name="phone" id="display_name" class="form-control input-lg" required="required" placeholder="Phone Number" tabindex="2">
									</div>
								</div>
							</div>

						

							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<span id="user-availability-status2" style="font-size:12px;"></span>
										<?php if(isset($_SESSION['errnum2']) && $er==true){?>
											<div class="btn-danger"><?=$_SESSION['errnum2'];?></div>
										<?php }?>
										<input type="text" name="matric" id="matric" onBlur="matricAvailability()" value="" class="form-control input-lg" required="required" placeholder="Matric Number" tabindex="6">
									</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="department" required="" id="first_name" class="form-control input-lg" placeholder="Departmental" tabindex="1">
									</div>
								</div>

								
							</div>



							<div class="row">

								<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="form-group">
											<select name="level" class="form-control input-lg" onChange="getlevel(this.value);" required="required">
												<option value="" required>-- Level --</option>

												<?php $ret=mysqli_query($connect,"SELECT * FROM school_level");
												while($row=mysqli_fetch_assoc($ret)){
												?>

													<option required value="<?php echo htmlentities($row['level']);?>">
														<?php echo htmlentities($row['level']);?>
													</option>
													<?php } ?>
													
											</select>									
										</div>
									</div>


								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="form-group">
										<select type="text" name="sublevel" readonly class="form-control input-lg" id="sublevel">
											<option>-- Sub Level --</option>											
										</select>										
									</div>
								</div>					
								
							</div>



							<div class="form-group">
									<select name="gender" class="form-control input-lg" required="required">
										<option style="align-items: center;">-- Gender --</option>
										<option type="radio" required="required" value="Male">MALE</option>
										<option type="radio" required="required" value="Female">FEMALE</option>
								</select>
									<!-- <input type="text" name="surname" id="full_name" class="form-control input-lg" required="required" placeholder="Enter Surname" tabindex="1"> -->
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
								<div class="col-xs-12 col-md-6"><input type="submit" name="create" value="Register" class="btn btn-theme btn-block btn-lg" tabindex="7"></div>
								<div class="col-xs-12 col-md-6">Already have an account? <a href="<?=base_url("");?>">Sign In</a></div>
							</div>

						</form>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
							</div>
							<div class="modal-body">
								<!-- <p>Welcome you warmly to Mind Map Educational Services (MMES), to a teaching and learning community! Mind map is located in the capital city of ilorin, Ilorin, Nigeria. We are an educational approved citadel of learning with the sole responsibility of preparing young and able minds for both internal and external examinations. At Mind Map, we offer an all-inclusive, academically challenging and selective co-educational service to all willing Nigeria students seeking university admission. Our mission is to develop responsible global citizens and cultivate leadership skills through academic excellence in our students. We also have a vision, is to assist all Nigeria student who have serious concern getting university education, get closer to fulfilling their educational potentials through our A’ level programmes (IJMB, JUPEB and NABTEB). You are cordially welcome to a conducive learning environment, where your success is our ultimate priority!. Register with us today! You can also inform a friend. Come and let build your world together.</p> -->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
</fieldset>
				
			</div>
		</section>
<?php 
unset($_SESSION['errnum1']);
unset($_SESSION['errnum3']);

unset($_SESSION['errnum2']);
require "inc/foot.php"; 

?>
