
<?php
require ('connection/function.php');
// session_start();
require "lib/api_orgds.php";
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['postcode']) && $_POST['postcode']=='account'){
	$er = false;
	$errnum = '';
	$number = $_SESSION['number'] = mysqli_real_escape_string($connect, clean(sanitize(htmlentities(htmlspecialchars(removeBadChars($_POST['number']))))));
	$check_resent = mysqli_query($connect,sprintf("SELECT `number` FROM recent_otp WHERE `number` = '$number'"));
	$row_resent = mysqli_fetch_assoc($check_resent);
	
	if(empty($number)){
		$er = true; 
		$errnum = "Sorry field most not be empty.";
	}
	elseif($number == $row_resent['number']){
		$er = true;
		$errtakein = "The Phone Number is already been used to create account recently.";
	}
	else{
		if($er == false){
			$query_check = mysqli_query($connect, sprintf("SELECT contact FROM contacts WHERE contact = '$number'"));
			// $get_num = mysqli_fetch_assoc($query_check);
			$num = mysqli_num_rows($query_check);
				if($num<0 || $num==0){
					$inset_contact = mysqli_query($connect, sprintf("INSERT INTO contacts SET contact = '$number', creation_date = '$currentTime'"));
					if(!empty($inset_contact)){
						$er = true;
						$number = $_SESSION['number'];
						$otp_code = "sending";
						$active = base64_encode('checkpoint');
						header("LOCATION:".base_url("otp.php?".$otp_code."_rdir=access_granted=".$active."/Active_into/aos_project-managment_log=1_".$number));
					}
				}else{
					$update_contact = mysqli_query($connect, sprintf("UPDATE contacts SET contact = '$number' WHERE contact = '$number'"));
					if(!empty($update_contact)){
						$er = true;
						$number = $_SESSION['number'];
						$otp_code = "sending";
						$active = base64_encode('checkpoint');
						header("LOCATION:".base_url("otp.php?".$otp_code."_rdir=access_granted=".$active."/Active_into/aos_project-managment_log=1_".$number));
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
							<legend>Phone Number Validator</legend>
						<div class="text-center">
							<h2 style="margin-top: 5%">Kindly Enter Your Mobile Phone Number</h2>
							<h4><a>NOTE:</a>This system will take your Phone Number for the security level. Thanks </h4>
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

								<form class="form-inline signup" action="<?=base_url("project_management.php?rdir=checker&&checker==otp/input.php");?>" method="POST" role="form">
								<div class="form-group multiple-form-group input-group" style="margin-top: 0.2%;">
									<input type="text" name="number" id="number" class="form-control input-lg" onBlur="numberAvailability()" placeholder="Enter Phone Number" data-mask="phone"  style="margin-bottom: 10px;">
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