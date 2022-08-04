<!DOCTYPE html>
<html lang="en">
<?php
session_start();
// if(!session_start()){
// 	header("LOCATION: index.php");

// }
if(!isset($_SESSION['err']) || !isset($_SESSION['msg'])){
	header("LOCATION: index.php");
}

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>A.O.S Academy || Response</title>
    <link rel="icon" href="images/favicon-icon.jpg" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<h4 class="log-title" style="color: #49872E;text-align: center; ">Registration Complete!</h4>
						<br>
							<p class="log-title">
								<?php 


									if(isset($_SESSION['msg'])){
										echo '<div class="alert-success" style="padding: 20px !important; text-align: center !important; margin: 10px !important;">'.$_SESSION["msg"].'</div>';
									}elseif(isset($_SESSION['err'])){
										echo '<div class="alert-danger style="padding: 20px !important; text-align: center !important; margin: 10px !important;">'.$_SESSION["err"].'</div>';
									}else{
										header("LOCATION: index.php");
									}



								?>
							<div class="submit-btns">
							    <a href="index.php"><button class="mtr-btn btn-block signin" name="Get" value="res" type="submit"><span>Back Home</span></button></a>
							</div>
							
							</p>
						
					</div>

				</div>
			</div>




			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Wecome On Board</h1>
						<p>
							Welcome to A.O.S ACADEMY News Letter.
						</p>
						<div class="friend-logo">
							<span><img src="images/aos.png" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Scrol Down!</a>
					</div>	
				</div>
			</div>

		</div>
	</div>
</div>
	
	<!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>
	<?php
		unset($_SESSION['err']);
		unset($_SESSION['msg']);

	?>

</body>	

<!-- Mirrored from wpkixx.com/html/winku/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Sep 2019 11:06:57 GMT -->
</html>