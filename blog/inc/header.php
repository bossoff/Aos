<?php
require "connection/function.php";
// require "lib/call_all.php"; 
require "library/photo.class.php";

$logo_query = mysqli_query($connect, "SELECT * FROM logo");
	if(!empty($logo_query)){
		$fetch_logo = mysqli_fetch_assoc($logo_query);
		$logo = embeddedImglogoHome($fetch_logo['logo']);
	}

?>

<!DOCTYPE HTML PUBLIC "aosacademy.com">
<html>
<head> 
    
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
<link rel="stylesheet" href="<?= base_url('css/progressbar.css');?>" type="text/css" media="all" />
<link rel="stylesheet" href="<?= base_url('css/style_s.css');?>  " type="text/css" media="all" />

<link href="<?= BOOTSTRAP ;?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?= base_url('css/aosacademy.css');?>  " rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="<?= base_url('css/ken-burns.css');?>  " type="text/css" media="all" />
<link rel="stylesheet" href="<?= base_url('css/animate.min.css');?>" type="text/css" media="all" />
<link href="<?= FONTaWESOME ;?>" rel="stylesheet">
<link href="<?=base_url('css/cubeportfolio.min.css');?>" rel="stylesheet" />
<link id="t-colors" href="<?=base_url('css/green.css');?>" rel="stylesheet" />
<link rel="icon" type="image/jpg" sizes="32x32" href="<?= base_url('images/favicon-icon.jpg');?>">




<!--css-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js-->
<script type="text/javascript" src="<?= base_url('js/progressbar.js');?>"></script>
<script src="<?= base_url('js/jquery.min.js');?>"></script>
<script src="<?= base_url('js/botstrap.min.js');?>"></script>

<!-- <script src="js/jquery.min.js"></script>
 --> <!--mycart-->
<script type="text/javascript" src="<?= base_url('js/bootstrap-3.1.1.min.js');?>"></script>





<link href="<?=base_url('');?>assets/css/animsition.min.css" rel="stylesheet">
<link href="<?=base_url('');?>assets/themify-icons/themify-icons.css" rel="stylesheet">
<link href="<?=base_url('');?>assets/css/bootsnav.css" rel="stylesheet">
<link href="<?=base_url('');?>assets/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?=base_url('');?>assets/owl-carousel/owl.theme.css" rel="stylesheet">
<link href="<?=base_url('');?>assets/owl-carousel/owl.transitions.css" rel="stylesheet">
<link href="<?=base_url('');?>assets/css/magnific-popup.css" rel="stylesheet">
<link href="<?=base_url('');?>assets/css/fluidbox.min.css" rel="stylesheet">
<link href="<?=base_url('');?>assets/css/style.css" rel="stylesheet">

<!--js-->
<!--webfonts-->
<!-- <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' -->


 <style type="text/css">
    	ul.agile_forms {
    margin-bottom: 1em;
  }

ul.agile_forms {
    float: right;
    margin-top: 25px;
}


ul.agile_forms {
    float: right;

}
ul.agile_forms li a {
    background: #49872E;
    color: #fff;
    font-weight: bold;
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
    /*margin-bottom: 1em;*/
  }

    </style>

</head>
<body style="width:100%;">

<!-- Progress bar -->

	<div class='progress' id="progress_div">
	    <div class='bar' id='bar1'></div>
	    <div class='percent' id='percent1'></div>
	 </div>
  
 
 <!-- end top progressbar -->
	<!--header-->
		<div class="header" id="wrapper" style="margin-top: 3px;">
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

	<header>
		<div class="wrap">
			<div class="navbar navbar-default navbar-static-top" style="margin-bottom: -25px; margin-top: -20px;">
				<ul class="agile_forms">
						<li><a class="active" href="<?=home('portal');?>"> Sign In</a> </li>
					</ul>
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a href="<?=home("");?>"><?= $logo;?></a></h1>
						<!-- <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="" width="199" height="52" /></a> -->
					</div>
					<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
						<div class="link-effect-2" id="link-effect-2">
						<ul class="nav navbar-nav">
							<li class="active"><a href="<?=home('');?>"><span data-hover="Home" style="color: #fff; padding: 5px;">Home</span></a></li>


							<li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Departments <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="<?=home('');?>french_classes.php">French Classes</a></li>
									<li><a href="<?=home('');?>tutorial_sessions.php">Tutorial Sessions</a></li>
									<li><a href="<?=home('');?>research_assistance.php">Research Assistance</a></li>
								</ul>
							</li>



							<!-- <li class="dropdown">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Services <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="topics.php">Project Topics Collection</a></li>
									<li><a href="compilation.php"></a></li>
									<li><a href="materials"></a></li>


									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown">Project Compilation</a>
										<ul class="dropdown-menu">
											<li><a href="Partial_compilation.php">Partial Compilation</a></li>
											<li><a href="chapter_compilation.php">Chapter Compilation</a></li>
											<li><a href="complete_compilation.php">Complete Compilation</a></li>
											
										</ul>
									</li>


									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown">Materials Sourcing</a>
										<ul class="dropdown-menu">
											<li><a href="past_projects.php">Past Projects</a></li>
											<li><a href="relevant_pdf.php">Books and Relevant PDFs</a></li>
											<li><a href="articles_papers.php">Articles and Papers</a></li>
											<li><a href="data_recording.php">Data and Recordings</a></li>
											
										</ul>
									</li>



									<li><a href="data_collection.php">Data Collection and Analysis</a></li>




								</ul>
							</li> -->


							<li><a href="<?=home('');?>about.php">About Us</a></li>
							<li><a href="<?=home('');?>gallery.php">Gallery</a></li>
							<li><a href="<?=home('');?>blog">blog</a></li>
							
							<li><a href="<?=home('');?>contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
		
		<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=113168056011230&autoLogAppEvents=1"></script>
		</header>
	</div>
 