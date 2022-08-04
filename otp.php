<?php
// session_start();
require "connection/function.php";
require "lib/number_validate.php";
check_login();
require "lib/api_orgds.php";


if(isset($_POST['postcode']) && $_POST['postcode']=='otp' && $_POST['postcode'] !=''){
	$er = false;
	$number = $_SESSION['number'];
	$otp_code = "sending";
		if($er == false){
			if($number == $number){
				$otp_code = (int)rand()*999;
				$fullname = 'Subscriber';
				$active = base64_encode('otp');
			}
			//I write this bunch of text code to send a message to a mobile number
			$smstxt="Dear ".$fullname.",\nYou're about to create a RESEARCH ASSISTANCE account for your work. \nEnter this code:".$otp_code." to verify & continue the registration.\n\nThanks.";
			$send = odsapi('send',0,$ods_apitoken=null,2,'AOS_Acadamy',$number,$smstxt,$smsbaseurl=null,$schedule=null,$smstype=0,$smsroute=3,$username=null,$password=null);
			if(!empty($send)){
				$query_in_otp = mysqli_query($connect, sprintf("INSERT INTO passcodes SET `number` = '$number', Passcode = '$otp_code', status = 'ACTIVE' ")) or die(mysqli_error($connect));
				if(!empty($query_in_otp)){

					$get_count = mysqli_query($connect, sprintf("SELECT * FROM passcodes WHERE `number` = '$number'")) or die(mysqli_error($connect));
					if(!empty($get_count)){
						$row = mysqli_fetch_assoc($get_count);
						if($row['count'] == 3){
							$er = true;
							$errnum = "Sorry this Number: ".$number." as exceeded the token limit.";
						}else{
							$checke_num = mysqli_query($connect, sprintf("SELECT `number` FROM passcodes WHERE `number` = '$number'")) or die(mysqli_error($connect));
							$num = mysqli_num_rows($checke_num);

							if($num==0){
								$query_in_otp = mysqli_query($connect, sprintf("INSERT INTO passcodes SET `number` = '$number', Passcode = '$otp_code', status = 'ACTIVE', count = count+1 ")) or die(mysqli_error($connect));
								if(!empty($query_in_otp)){
									$number = $_SESSION['number'];
									  $_SESSION['otp_code'] = $otp_code;
									$send = "sending";
									header("LOCATION:".base_url("verify.php?".$send."_rdir=otp&access=".$active."/Active_into/RESEARCH ASSISTANCE_log=1_".$number));
									// header("LOCATION:".base_url("registration.php?".$otp_code."_rdir=access_granted=".$active."/Active_into/RESEARCH ASSISTANCE_log=1_".$number));
								}						
							}else{
								$query_in_otp = mysqli_query($connect, sprintf("UPDATE passcodes SET `number` = '$number', Passcode = '$otp_code', status = 'ACTIVE', count = count+1 WHERE `number` = '$number' ")) or die(mysqli_error($connect));
								if(!empty($query_in_otp)){
									$number = $_SESSION['number'];
									  $_SESSION['otp_code'] = $otp_code;
									$send = "sending";
									header("LOCATION:".base_url("verify.php?".$send."_rdir=otp&access=".$active."/Active_into/RESEARCH ASSISTANCE_log=1_".$number));
								}
							}
						}
					}

				}
			}





				// $get_count = mysqli_query($connect, sprintf("SELECT * FROM passcodes WHERE `number` = '$number'")) or die(mysqli_error($connect));
				// if(!empty($get_count)){
				// 	$row = mysqli_fetch_assoc($get_count);
				// 	if($row['count'] == 3){
				// 		$er = true;
				// 		$errnum = "Sorry this Number: ".$number." as exceeded the token limit.";
				// 	}else{
				// 		$checke_num = mysqli_query($connect, sprintf("SELECT `number` FROM passcodes WHERE `number` = '$number'")) or die(mysqli_error($connect));
				// 		$num = mysqli_num_rows($checke_num);

				// 		if($num==0){
				// 			$query_in_otp = mysqli_query($connect, sprintf("INSERT INTO passcodes SET `number` = '$number', Passcode = '$otp_code', status = 'ACTIVE', count = count+1 ")) or die(mysqli_error($connect));
				// 			if(!empty($query_in_otp)){
				// 				$number = $_SESSION['number'];
				// 				  $_SESSION['otp_code'] = $otp_code;
				// 				$send = "sending";
				// 				header("LOCATION:".base_url("verify.php?".$send."_rdir=otp&access=".$active."/Active_into/RESEARCH ASSISTANCE_log=1_".$number));
				// 			}						
				// 		}else{
				// 			$query_in_otp = mysqli_query($connect, sprintf("UPDATE passcodes SET `number` = '$number', Passcode = '$otp_code', status = 'ACTIVE', count = count+1 WHERE `number` = '$number' ")) or die(mysqli_error($connect));
				// 			if(!empty($query_in_otp)){
				// 				$number = $_SESSION['number'];
				// 				  $_SESSION['otp_code'] = $otp_code;
				// 				$send = "sending";
				// 				header("LOCATION:".base_url("verify.php?".$send."_rdir=otp&access=".$active."/Active_into/RESEARCH ASSISTANCE_log=1_".$number));
				// 			}
				// 		}
				// 	}
				// }				
		}

}

?>


<?php
require "inc/header.php";
?>
<title><?=TITLE10;?></title>
<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="<?=base_url("");?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li><a href="<?=base_url("");?>">Features</a><i class="icon-angle-right"></i></li>
							<li class="active">Generate Otp</li>
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
							<legend>Otp Sender</legend>
						<div class="text-center">
							<h2 style="margin-top: 5%">Welcome Back. <?=$_SESSION['number'];?></h2>
							<br>
							<h4><a>NOTE:</a>This shows that your contact is active for the <a>RESEARCH ASSISTANCE DEPARTMENT.</a> Now a Token will be sent to you in a second by Hitting the Generate Token Button to continue. Thanks </h4>
							<!-- <div id="countdown"></div> -->
							<?php if(isset($errnum) && $er==true){?>
								<div class="btn-danger"><?=$errnum;?></div>
							<?php }?>

							<form class="form-inline signup" action="<?=base_url("otp.php?rdir=checker&&checker==otp/input.php");?>" method="POST" role="form">
								<div class="form-group" style="margin-top: 3%;">
                           			<button type="submit" name="postcode" value="otp" class=" btn btn-theme btn-add btn-block btn-lg" tabindex="7">Generate Token </button>
								</div>
							</form>

							<!--  -->

						</div>
					</fieldset>
						
					</div>
				</div>
			</div>
			<br><br><br>
		</section>
<?php require "inc/foot.php";?>