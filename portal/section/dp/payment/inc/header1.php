<!DOCTYPE HTML PUBLIC "aosacademy.com">
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="A.O.S Academy" />
	<link rel="stylesheet" href="<?=base_url('');?>js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/css/font-icons/entypo/css/font-awesome.min.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?=base_url('');?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/css/neon-core.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/css/custom.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/css/skins/green.css">
	<script src="<?=base_url('');?>assets/js/jquery-1.11.3.min.js"></script>
	<link rel="icon" href="<?=base_url('');?>assets/images/favicon.jpg">
	
	<script src="http://js.paystack.co/v1/inline.js"></script>
	<script src="<?=base_url('');?>lib/app.js"></script>

	
<?php
require "lib/photo.class.php";
$logo_query = mysqli_query($connect, "SELECT * FROM logo");
	if(!empty($logo_query)){
		$fetch_logo = mysqli_fetch_assoc($logo_query);
		$logo = embeddedImglogoPanel($fetch_logo['logo']);
	}

?>
</head><body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env" style="background: #fff; border-bottom: 2px solid #49872E; border-right: 2px solid #f15814;padding: 20px;">

				<!-- logo -->
				<div class="logo with-animation">
					<a href="<?=base_url('');?>">
						<?=$logo;?>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
									
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

				<?php
					if($user_level == 'Project'){
						echo '

								<li class="active opened active has-sub">
									<a href="'.base_url('?').$user_level.'">
										<i class="entypo-gauge"></i>
										<span class="title">Dashboard</span>
									</a>					
								</li>

								<li>
									<a href="'.base_url('project.php').'">
										<i class="entypo-book"></i>
										<span class="title">Project Management</span>
									</a>
								</li>

								<li>
									<a href="'.base_url('').'complains.php">
										<i class="entypo-bell"></i>
										<span class="title">Complains</span>
										<span class="badge badge-danger"><?=$user_num;?></span>
									</a>
								</li>

						';

					}


					elseif($user_level == 'French'){

						echo '

								<li class="active opened active has-sub">
									<a href="'.base_url('?').$user_level.'">
										<i class="entypo-gauge"></i>
										<span class="title">Dashboard</span>
									</a>					
								</li>

						';

					}



					elseif($user_level == 'Tutorial'){
						echo '

								<li class="active opened active has-sub">
									<a href="'.base_url('?').$user_level.'">
										<i class="entypo-gauge"></i>
										<span class="title">Dashboard</span>
									</a>					
								</li>

						';

					}

				?>
				


				<!-- <li>
					<a href="<?=base_url('');?>project_managements.php">
						<i class="entypo-book"></i>
						<span class="title">Project Management</span>
					</a>
				</li>


				<li>
					<a href="<?=base_url('');?>students_fee.php">
						<i class="entypo-user"></i>
						<span class="title">Students Fees</span>
						<i class="entypo-dollars"></i>
					</a>
				</li>

				<li>
					<a href="<?=base_url('');?>complains.php">
						<i class="entypo-bell"></i>
						<span class="title">Complains</span>
						<span class="badge badge-danger"><?=$user_num;?></span>
					</a>
				</li> -->







				<!-- <li class="has-sub">
					<a href="Sudents">
						<i class="entypo-users"></i>
						<span class="title">Sudents</span>
						<span class="badge badge-danger badge-roundless">New Users</span>
					</a>
					<ul>					
						
						<li>
							<a href="<?=base_url('');?>all_students.php">
								<span class="title">All Students</span>
								<span class="badge badge-info"><?=$user_num;?></span>
							</a>
						</li>
						<li>
							<a href="<?=base_url('');?>french_department.php">
								<span class="title">French Department</span>
								<span class="badge badge-warning"><?=$num1;?></span>
							</a>
						</li>

						<li>
							<a href="<?=base_url('');?>project_department.php">
								<span class="title">Project Department</span>
								<span class="badge badge-primary"><?=$num2;?></span>
							</a>
						</li>


						<li>
							<a href="<?=base_url('');?>tutorial_department.php">
								<span class="title">Tutorial Department</span>
								<span class="badge badge-danger"><?=$num3;?></span>
							</a>
						</li>
						
					</ul>
				</li> -->

				
				
			</ul>
			
		</div>

	</div>





























	<!-- Profile Details -->

<div class="main-content">
				
		<div class="row">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php

								if($default_avartar == 0){

									echo '<img src="'.base_url('').'assets/images/profile.png" alt="" class="img-circle" width="50" height="50" style="border-radius: 50%;" />
										';
									echo $surname.'<sup>(Click)</sup>';

								}else{
									echo '<img src="'.base_home('').''.$avartar.' " alt="" class="img-circle" width="50" height="50" style="border-radius: 50%;" />
										';
									echo $surname.' <sub style="color: red;">(Click)</sub>';
								}

							?>
							<!-- <img src="<?=base_home('');?><?=$avartar;?>" alt="" class="img-circle" width="50" height="50" style="border-radius: 50%;" />
							<?=$name;?> -->

						</a>
		
						<ul class="dropdown-menu">
		
							<!-- Reverse Caret -->
							<li class="caret"></li>
		
							<!-- Profile sub-links -->
							<li>
								<a href="<?=base_url('');?>manage-profile.php">
									<i class="entypo-user"></i>
									Edit Profile
								</a>
							</li>
		
							<li>
								<a href="<?=base_url('');?>inbox.php">
									<i class="entypo-mail"></i>
									Inbox
								</a>
							</li>
		
							<li>
								<a href="<?=base_url('');?>logout.php">
									<i class="entypo-logout right"></i>
									Log Out 
								</a>
							</li>
						</ul>
					</li>
		
				</ul>
				
				
		
			</div>
		
		
		
		</div>
		
		<hr />