
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?= TITLE_SUBMISSION; ?></title>
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
    <link rel="icon" type="image/jpg" sizes="32x32" href="dist/img/favicon-icon.jpg">

        <!-- Bootstrap 3.3.2 -->
    <link href="<?= BOOTSTRAP ;?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?= PLUGINS;?>" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?= PLUGINS2;?>" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?= PLUGINS3;?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= AOSCSS1;?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?= AOSCSS2;?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
     
      <header class="main-header" style="background: #49872E">
        <!-- Logo -->
        <a href="<?php base_url('index.php?Home');?>" class="logo">
            <img src="dist/img/logo.png" class="img-responsive" alt="" width="170" style="margin-top:0px; " />
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
         <!--  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a> -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"><?= $notify_count;?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?= $count_row_new_user;?> notifications</li>
                  <li>
                </ul>
              </li>      



              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="logout.php" class="dropdown-toggle">
                  <img src="dist/img/user2-160x160.jpg"  class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?=$username;?> </span>
                </a>
              </li>
                
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->



             <!-- jQuery 2.1.3 -->
    <script src="<?=jsPLUGINS1;?> "></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=jsBOOTSTRAP;?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=jsPLUGINS2;?>'></script>
    <!-- AdminLTE App -->
    <script src="<?=jsAPP;?>" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?=jsPLUGINS3;?>" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?=jsPLUGINS4;?>" type="text/javascript"></script>
    <script src="<?=jsPLUGINS5;?>" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?=jsPLUGINS6;?>" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?=jsPLUGINS7;?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=jsPLUGINS8;?>" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=jsPLUGINS9;?>" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?=jsPLUGINS10;?>" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=jsDASHBOARD;?>" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?=jsDEMO;?>" type="text/javascript"></script>


