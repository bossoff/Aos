<?php 
// session_start();
require "connection/function.php";
require "lib/number_validate.php";
check_login();

$email = $_SESSION['email'];

// $info = mysqli_query($connect, sprintf("SELECT * FROM users WHERE phone = '$number' AND surname = '$surname'"));
// 	if(!empty($info)){

// 	}

?>
<?php
require "inc/header.php";
?>
<title><?=TITLE8;?></title>
<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="<?=base_url("");?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li><a href="<?=base_url("");?>">Features</a><i class="icon-angle-right"></i></li>
							<li class="active">Succesfull</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					<fieldset style="margin-bottom: 3%;">
							<legend>Account Active</legend>
						<div class="text-center">
							<h2>Hi, You have recieve a confirmation notification through this Email: <a><?=$email;?></a><br></h2>
							<h4> Kindly Check Your Email Address to confirm your Email to proceed your registration.</h4>
							<h4><a>Note:</a> If you unable to find the link your Inbox, kindly check your Spam Box. Thanks</h4>

			<br>
							<a href="mailto:"> <button class="btn btn-theme btn-add">Open Your Mail</button></a>
							

							

							

						</div>
					</fieldset>
						
					</div>
				</div>
			</div>
			<br><br><br>
		</section>
<?php require "inc/foot.php";?>