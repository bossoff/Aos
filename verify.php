<?php
// session_start();
require "connection/function.php";
// require "lib/number_validate.php";
// check_login();
if(!isset($_SESSION['V_remail']) && !isset($_SESSION['V_rToken'])){
	header("LOCATION:".base_url("research_assistance.php?rdir=0"));
}else{
	if(isset($_POST['get_verify']) && $_POST['get_verify']=='account' && $_POST['get_verify'] !=''){
		$er = false;
		$email = $_SESSION['V_remail'];
		$token = $_SESSION['V_rToken'];
		$verify = $_SESSION['verify'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['verify']))))))));
		$Query_verify = mysqli_query($connect, sprintf("SELECT email, status, token FROM activate WHERE email = '$email' AND token = '$token'")) or die(mysqli_error($connect));
		if(!empty($Query_verify)){
			$row = mysqli_fetch_assoc($Query_verify);
		 	$em = $row['email'];
		 	$tok = $row['token'];
			$status = $row['status'];
			if($verify != $tok){
				$er = true;
				$errnum = "Invalid token, please get new pin.";
			} 
			elseif($status == 'USED'){
				$er = true;
				$errnum = " This token has been used";
			}
			elseif($status == 'EXPIRED'){
				$er = true;
				$errnum = " This token has been expired";
			}

				if($tok == $verify){
					$update_otp = mysqli_query($connect, sprintf("UPDATE activate SET status = 'USED' WHERE email = '$email' AND token = '$token'")) or die(mysqli_error($connect));
					if(!empty($update_otp)){
						$_SESSION['rsemail'] = $em;
						$_SESSION['VrToken'] = $tok;					
						header("LOCATION:".base_url("registration.php?rdir=".$tok));
					}
				}				
			
		}else{
			header("LOCATION:".base_url("research_assistance.php?rdir==0"));
		}
	}
}				

?>
<?php require "inc/header.php";
?>
<title><?=TITLE11;?></title>
<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="<?=base_url("");?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li><a href="<?=base_url("");?>">Features</a><i class="icon-angle-right"></i></li>
							<li class="active">Verification</li>
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
							<legend>Verification</legend>
						<div class="text-center">
							<h2> A Token has been sent to your Email to continue registration. </h2>
							<h4><a>NOTE:</a> We are using every single token sent to you has our number one security. </h4>
							<br>
							<!-- <div id="countdown"></div> -->
							<?php if(isset($errnum) && $er==true){?>
								<div class="btn-danger"><?=$errnum;?></div>
							<?php }?>							

							<div style='margin-top:3%'> Sorry if you don't get the OTP within a minute please 
								
								<form action="<?=base_url("otp.php?rdir=checker&&checker==otp/input.php");?>" method="POST"><a href="" type="submit" name="postcode" value="otp"> Resend </a></form>

										<form class="form-inline signup" action="verify.php" method="POST" role="form">

										<div class="form-group multiple-form-group input-group" style="margin-top: 3%;">
											<input type="text" name="verify" class="form-control input-lg" required="" placeholder="Place your Token" style="margin-bottom: 10px;">
											
		                           			 <button type="submit" name="get_verify" value="account" class="btn btn-theme btn-add">Verify</button>
		                        		
										</div>
									</form>
						</div>
					</fieldset>
						
					</div>
				</div>
			</div>
			<br><br><br>
		</section>
<?php require "inc/foot.php";?>