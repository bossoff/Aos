<?php 
// session_start();
require "connection/function.php";
require "lib/number_validate.php";
check_login();
$surname = $_SESSION['surname'];
$number = $_SESSION['number'];
$email = $_SESSION['email'];
$application_no = $_SESSION['application_no'];

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
							<h2>Hi <a><?=$surname;?></a>, Your RESEARCH ASSISTANCE account has been Created. <br><a>Check Your Email Address for more Details.</h2>
							<h4><a>Notice:</a> These are your login Details. Do not disclose it to anyone. </h4>

							<h3 style="margin-bottom: 2%; text-decoration: none;"><a>Username:</a> <?=$application_no;?> Or <?=$number;?></h3>
							<h3 style="margin-bottom: 5%; text-decoration: none;"><a>Password:</a><?=$surname;?></h3>
							<legend style="font-size: 13px;"><a>Don't forget to change your password when you login.</a></legend>
							<a href="<?=portal('').'?rdir=login%'.sha1('login')."/".base64_encode("logon").'%reg';?>"> <button class="btn btn-theme btn-add">Click Here To Login</button></a>
							

							

							

						</div>
					</fieldset>
						
					</div>
				</div>
			</div>
			<br><br><br>
		</section>
<?php require "inc/foot.php";?>