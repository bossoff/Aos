<?php 
// session_start();
require "connection/function.php";

$surname = $_SESSION['surname'];
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$application_no = $_SESSION['application_no'];
$echomsg = $_SESSION['echomsg'];
function check_login(){
	if(strlen($_SESSION['phone'])==1){
		$_SESSION['errnum'] = "Stop this act, trying this in 3 time your Ip Address will be Blocked.";		
		header("Location:" .base_url("french_language.php")."?rdir=no_entry_session_not_set");
	      exit();
	}

	elseif(!isset($_SESSION['phone']) || !isset($_SESSION['email'])){
		$_SESSION['errnum'] = "Stop this act, trying this in 3 time your Ip Address will be Blocked.";
		header("Location:" .base_url("french_language.php").'?rdir=warning!');	
	     exit();

	}

	elseif(isset($_SESSION['phone'])){
  	 	$phone = preg_replace('#[^0-9]#i', '', $_SESSION['phone']);      
	}

}
check_login();

$check_login_details = mysqli_query($connect, "SELECT email, phone FROM users WHERE phone = '$phone' AND email = '".$_SESSION['email']."'");
if(empty($check_login_details)){
	header("Location:" .base_url("").'?rdir=noaccess!');	
	     exit();
}

?>






<?php
require "inc/header.php";
?>
<title><?=TITLE12;?></title>
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
							<h2>Hi <a><?=$surname;?></a>, <?=$echomsg;?> <br><a>Check Your Email Address for more Details.</h2>
							<h4><a>Notice:</a> This are your login Details. Do not disclose it to anyone. </h4>

							<h3 style="margin-bottom: 2%; text-decoration: none;"><a>Username:</a> <?=$application_no;?> Or <?=$phone;?></h3>
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