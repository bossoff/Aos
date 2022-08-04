<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="A.O.S Academy Management Portal" />
	<meta name="author" content="A.O.S Academy" />

	<link rel="stylesheet" href="<?=base_url("");?>assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?=base_url("");?>assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?=base_url("");?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url("");?>assets/css/neon-core.css">
	<link rel="stylesheet" href="<?=base_url("");?>assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?=base_url("");?>assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?=base_url("");?>assets/css/custom.css">
	<link rel="stylesheet" href="<?=base_url("");?>assets/css/skins/green.css">

	<script src="<?=base_url("");?>assets/js/jquery-1.11.3.min.js"></script>
	<link rel="icon" href="<?=base_url("");?>assets/images/favicon.jpg">

	


</head>
<body class="page-body skin-green" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<div class="sidebar-menu">

		<div class="sidebar-men-inner">
			
			<header class="logo-env" style="background: #fff;">

				<!-- logo -->
				<div class="logo with-animation">
					<a href="<?=base_url('');?>">
						<img src="<?=base_url('');?>assets/images/logo.jpg" style='margin-top: -10px' width="176" alt="A.O.S Academy" />
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse with-animation">
					<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
						<div class="sidebar-user-info">

				<div class="sui-normal" style="width:80px; height:auto; border-radius: 50px;">
					<a href="#" class="user-link">
						
					<?=$avartar;?>

						<span>Welcome,</span>
						<strong><?=$name;?></strong>
						<!-- <br> -->
						<span>click to Update</span>
					</a>
				</div>

				<div class="sui-hover animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->
					<a href="manage-profile.php">
						<i class="entypo-pencil"></i>
						Edit Profile
					</a>

					<a href="mailbox.html">
						<i class="entypo-mail"></i>
						Check Inbox
					</a>

					<a href="logout.php">
						<i class="entypo-lock"></i>
						Log Out
					</a>

					<span class="close-sui-popup">&times;</span><!-- this is mandatory -->				
				</div>
			</div>

				<ul id="main-menu" class="main-menu">
				<li class="active has-sb">
					<a href="<?=base_url('?Controller%c_B-admin_home');?>">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>






				<li class="has-sub">
					<a href="layout-api.html">
						<i class="entypo-monitor"></i>
						<span class="title">Update Main Site System</span>
					</a>
					<ul>
						<li>
							<a href="layout-api.html">
								<span class="title">Layout API</span>
							</a>
						</li>
						<li>
							<a href="layout-collapsed-sidebar.html">
								<span class="title">Collapsed Sidebar</span>
							</a>
						</li>
						<li>
							<a href="layout-fixed-sidebar.html">
								<span class="title">Fixed Sidebar</span>
							</a>
						</li>
						
					</ul>
				</li>














				<li>
					<a href="index.html" target="_blank">
						<i class=" entypo-layout"></i>
						<span class="title">Frontend</span>
					</a>
				</li>





				<li class="has-sub">
					<a href="ui-panels.html">
						<i class="entypo-newspaper"></i>
						<span class="title">UI Elements</span>
					</a>
					<ul>
						<li>
							<a href="ui-panels.html">
								<span class="title">Panels</span>
							</a>
						</li>
						<li>
							<a href="ui-tiles.html">
								<span class="title">Tiles</span>
							</a>
						</li>
						<li>
							<a href="forms-buttons.html">
								<span class="title">Buttons</span>
							</a>
						</li>
						<li>
							<a href="ui-typography.html">
								<span class="title">Typography</span>
							</a>
						</li>
						<li>
							<a href="ui-tabs-accordions.html">
								<span class="title">Tabs &amp; Accordions</span>
							</a>
						</li>
						<li>
							<a href="ui-tooltips-popovers.html">
								<span class="title">Tooltips &amp; Popovers</span>
							</a>
						</li>
						<li>
							<a href="ui-navbars.html">
								<span class="title">Navbars</span>
							</a>
						</li>
						<li>
							<a href="ui-breadcrumbs.html">
								<span class="title">Breadcrumbs</span>
							</a>
						</li>
						<li>
							<a href="ui-badges-labels.html">
								<span class="title">Badges &amp; Labels</span>
							</a>
						</li>
						<li>
							<a href="ui-progress-bars.html">
								<span class="title">Progress Bars</span>
							</a>
						</li>
						<li>
							<a href="ui-modals.html">
								<span class="title">Modals</span>
							</a>
						</li>
						<li>
							<a href="ui-blockquotes.html">
								<span class="title">Blockquotes</span>
							</a>
						</li>
						<li>
							<a href="ui-alerts.html">
								<span class="title">Alerts</span>
							</a>
						</li>
						<li>
							<a href="ui-pagination.html">
								<span class="title">Pagination</span>
							</a>
						</li>
					</ul>
				</li>


				<li class="has-sub">
					<a href="mailbox.html">
						<i class="entypo-mail"></i>
						<span class="title">Mailbox</span>
						<span class="badge badge-secondary">8</span>
					</a>
					<ul>
						<li>
							<a href="mailbox.html">
								<i class="entypo-inbox"></i>
								<span class="title">Inbox</span>
							</a>
						</li>
						<li>
							<a href="mailbox-compose.html">
								<i class="entypo-pencil"></i>
								<span class="title">Compose Message</span>
							</a>
						</li>
						<li>
							<a href="mailbox-message.html">
								<i class="entypo-attach"></i>
								<span class="title">View Message</span>
							</a>
						</li>
					</ul>
				</li>





				<li class="has-sub">
					<a href="tables-main.html">
						<i class="entypo-window"></i>
						<span class="title">Tables</span>
					</a>
					<ul>
						<li>
							<a href="tables-main.html">
								<span class="title">Basic Tables</span>
							</a>
						</li>
						<li>
							<a href="tables-datatable.html">
								<span class="title">Data Tables</span>
							</a>
						</li>
					</ul>
				</li>	
				
				
			</ul>
			
		</div>

	</div>