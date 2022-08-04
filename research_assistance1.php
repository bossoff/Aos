
<?php
require ('connection/function.php');
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_SESSION['V_rToken']) && isset($_SESSION['V_remail'])){
	header("LOCATION: ".base_url("verify.php"));
}
if(isset($_POST['postcode']) && $_POST['postcode']=='account'){
	include "mailer/pushmail.php";
	$er = false;
	$email = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(strtolower(removeBadChars($_POST['email'])))))));
	$surname = "user";
	$user_level = "Research Assistance";
	$token = substr((int)rand()*999, 8);
	if(empty($email)){
		$er = true; 
		$errnum = "Sorry field can't not be empty.";
	}
	$check_resent = mysqli_query($connect,sprintf("SELECT `email` FROM users WHERE `email` = '$email'"));
	$row_resent = mysqli_fetch_assoc($check_resent);
	if($email == $row_resent['email']){
		$er = true;
		$errtakein = "The email address has already been used to create an account recently.";
	}
	else{
		if($er == false){

			$checkpoint = mysqli_query($connect,"SELECT email FROM activate WHERE email = '$email'");
			if(!empty($checkpoint)){
				$q_up = mysqli_query($connect,"UPDATE activate SET email = '$email', token = '$token', status = 'ACTIVE' WHERE email = '$email'");
				if(!empty($q_up)){
					project_ac($token, $email, $user_level);
					$_SESSION['V_rToken'] =$token;
					$_SESSION['V_remail'] =$email;
					// header("LOCATION:".base_url("verify.php"));
					header("LOCATION: ".base_url("verify.php?=1"));
				}
			}else{
				$insert = mysqli_query($connect, "INSERT INTO activate SET email = '$email', token = '$token', status = 'ACTIVE'");
				if(!empty($insert)){				
					$_SESSION['V_rToken'] =$token;
					$_SESSION['V_remail'] =$email;
					project_ac($token, $email, $user_level);
					header("LOCATION: ".base_url("verify.php"));
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
function numberAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'number='+$("#number").val(),
type: "POST",
success:function(data){
$("#user-availability-status3").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="<?=base_url("");?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li><a href="<?=base_url("");?>">Features</a><i class="icon-angle-right"></i></li>
							<li class="active">Security Checker</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					<fieldset style="margin-bottom: 5%;">
							<legend>Email Validator</legend>
						<div class="text-center">
							<h2 style="margin-top: 5%">Kindly Enter Your Email Address</h2>
							<h4><a>NOTE:</a>This system will take your Email Address for the security level. Thanks </h4>
							<!-- <div id="countdown"></div> -->
							<br>
							<?php if(isset($errnum) && $er==true){?>
								<div class="btn-danger"><?=$errnum;?></div>
							<?php }?>

							<?php if(isset($errtakein)){?>
								<div class="btn-danger"><?=$errtakein;?></div>
							<?php }?>

							<?php if(isset($errmsg) && $er==true){?>
								<div class="btn-danger"><?=$errmsg;?></div>
							<?php }?>
									<span id="user-availability-status3" style="font-size:12px; "></span>									

								<form class="form-inline signup" action="<?=base_url("research_assistance.php?");?>" method="POST" role="form">
								<div class="form-group multiple-form-group input-group" style="margin-top: 0.2%;">
									<input type="email" name="email" id="number" class="form-control input-lg" onBlur="numberAvailability()" placeholder="Enter Email Address" data-mask="phone"  style="margin-bottom: 10px;">
									<!-- <span class="input-group-btn"> -->
                           			 <button type="submit" name="postcode" value="account" class="btn btn-theme btn-add">Get Verify </button>
                        		<!-- </span> -->
								</div>
							</form>

							<!--  -->

						</div>
					</fieldset>
						
					</div>
				</div>
			</div>
			<br>
		</section>





<title><?=TITLE8;?></title>


<?php
// require "checkpoint.php";
require "inc/foot.php";
?>