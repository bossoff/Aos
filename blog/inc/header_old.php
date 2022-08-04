
<?php 

// function base_url($value)
// {
// 	$url = 'http://localhost/aos/'.$value;
// 	return $url;
// }
// $value ='';
// 	// Base url
// define('BASE_URL', 'http://localhost/aos/');


// require (base_url("connection/constant_var.php"));
// require ("connection/constant_var.php");
?>
<!DOCTYPE HTML PUBLIC "aosacademy.com">
<html>
<head> 
 
     <?php //require "connection/database.php"; ?>
    <style type="text/css">
    	ul.agile_forms {
    margin-bottom: 1em;
  }

ul.agile_forms {
    float: right;
    margin-top: 5px;
}


ul.agile_forms {
    float: right;

}
ul.agile_forms li a {
    background: #49872E;
    color: #fff;
    font-size: 0.9em;
    padding: 8px 1em;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
}
ul.agile_forms li a:hover{
      background: #f15814;
}
ul.agile_forms li{
  
  display:inline-block;
  list-style:none;
  
} 

ul.agile_forms {
    margin-bottom: 1em;
  }

    </style>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?= META ;?>" />
	<meta name="title" content="<?= NAME ;?>" />
    <meta property="og:title" content="<?= NAME ;?>" />
    <meta property="og:url" content=" <?= LINK ;?>" />
    <meta property="og:site_name" content="<?= NAME ;?>T" />
    <meta name="twitter:domain" content="<?= DOMAIN ;?>" />
    <meta name="twitter:card" content="summary" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="initial-scale=1.0" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--css-->
<link href="<?= BOOTSTRAP ;?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url('css/aosacademy.css');?>  " rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="<?= base_url('css/style_s.css');?>  " type="text/css" media="all" />
<link rel="stylesheet" href="<?= base_url('css/ken-burns.css');?>  " type="text/css" media="all" />
<link rel="stylesheet" href="<?= base_url('css/animate.min.css');?>" type="text/css" media="all" />
	<link href="<?= FONTaWESOME ;?>" rel="stylesheet">
	<link rel="icon" type="image/jpg" sizes="32x32" href="<?= base_url('images/favicon-icon.jpg');?>">

<!--css-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js-->
<script src="<?= base_url('js/jquery.min.js');?>"></script>
<script src="<?= base_url('js/bootstrap.min.js');?>"></script>

<!-- <script src="js/jquery.min.js"></script>
 --> <!--mycart-->
<script type="text/javascript" src="<?= base_url('js/bootstrap-3.1.1.min.js');?>"></script>
<!--js-->
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--webfonts-->
</head>
<body>
	<!--header-->
		<div class="header">
			<div class="header-top">
				<div class="wrap">
					<div class="detail">
						<ul>
							<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> <?= MTN ;?> || <?= AIRTEL ;?></li>
							<!-- <li><i class="glyphicon glyphicon-time" aria-hidden="true"></i> Mon-Sat 9:00 Am to 16:00 Pm </li> -->
						</ul>
					</div>
					<div class="indicate">
						<p><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><?= ADDRESS ;?> </p>
			
					</div>

					<div class="clearfix"></div>
				</div>
			</div>
			<div class="wrap">
				
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<ul class="agile_forms">
						<li><a class="active" href="#" data-toggle="modal" data-target="#myModal2"> Sign In</a> </li>
					</ul>
				<!---Brand and toggle get grouped for better mobile display-->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>				  
							<div class="navbar-brand">
								<h1><a href="index.php"><?= $logo;?></a></h1>
							</div>
						</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<nav class="link-effect-2" id="link-effect-2">
								<ul class="nav navbar-nav">
									<li class="active"><a href="<?= base_url('');?>"><span data-hover="Home" style="color: #fff;">Home</span></a></li>


									<li><a href="about.php"><span data-hover="About">About</span></a></li>
											<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Queries <span class="caret"></span></a>
												<ul class="dropdown-menu">
													<li><a href="Combination.php">Result Combination</a></li>
													<li><a href="ijmb_fee.php">Ijmbe Fees</a></li>
													<li><a href="jupeb_fee.php">Jupeb Fees</a></li>
													<li><a href="nabteb_fee.php">Nabteb Fees</a></li>
												</ul>
										</li>
											
									<li><a href="services.php"><span data-hover="Services">Services</span></a></li>
									<li><a href="projects.php"><span data-hover="Projects">Projects</span></a></li>	
									<li><a href="courses.php"><span data-hover="Courses">Courses</span></a></li>
									<li><a href="blog.php"><span data-hover="Blog">Blog</span></a></li>
									<!-- <li><a href="codes.html"><span data-hover="Codes">Codes</span></a></li> -->
									<li><a href="contact.php"><span data-hover="Contact">Contact</span></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</nav>
			</div>
		</div>
	<!--header-->

	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<div class="signin-form profile">
						<h3 class="agileinfo_sign">Sign In</h3>
						<div class="login-form">
							<form action="login_pro.php?rdr=log_1" method="POST">
								<input type="text" name="email" placeholder="E-mail">
								<input type="password" name="password" placeholder="Password">
								<div class="tp">
									<input type="submit" name="GO" value="Sign in">
								</div>
							</form>
						</div>
						<div class="login-social-grids">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
						<p><a href="#" data-toggle="modal" data-target="#myModal3"> Don't have an account?</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
