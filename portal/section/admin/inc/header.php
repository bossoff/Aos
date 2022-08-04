
	
<?php
 require "style.php";
$logo_query = mysqli_query($connect, "SELECT * FROM logo");
	if(!empty($logo_query)){
		$fetch_logo = mysqli_fetch_assoc($logo_query);
		$logo = embeddedImglogoPanel($fetch_logo['logo']);
	}

?>

</head><body class="page-body">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env" style="background: #fff; border-bottom: 2px solid #49872E; border-right: 2px solid #f15814;padding: 20px;">

				<!-- logo -->
				<div class="logo with-animation">
					<a href="<?=base_url('home.php');?>">
						<?=$logo;?>
						<!-- <img src="<?=base_url('');?>assets/images/logo.jpg" style='margin-top: -10px' width="176" alt="A.O.S Academy" /> -->
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
				<li class="active opened active has-sub">
					<a href="<?=base_url('home.php');?>">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>					
				</li>




				<li class="has-sub">
					<a href="Update_Home_Page">
						<i class="entypo-monitor"></i>
						<span class="title">Update Home Pages</span>
					</a>
					<ul>					
						
						<li>
							<a href="<?=base_url('');?>update-logo.php">
								<span class="title">Update Logo</span>
							</a>
						</li>

						<li>
							<a href="<?=base_url('');?>update-slider.php">
								<span class="title">Update Slider</span>
							</a>
						</li>


						<li>
							<a href="<?=base_url('');?>our_school.php">
								<span class="title">Update To Our School</span>
							</a>
						</li>


						<li>
							<a href="<?=base_url('');?>dirctor_note.php">
								<span class="title">Director's Note</span>
							</a>
						</li>

						<li>
							<a href="<?=base_url('');?>gallery.php">
								<span class="title">Gallery</span>
							</a>
						</li>

						<li>
							<a href="<?=base_url('');?>youtube.php">
								<span class="title">Youtube Video Link</span>
							</a>
						</li>

						<li>
							<a href="<?=base_url('');?>hear_from_the_students.php">
								<span class="title">Hear From Our Students</span>
							</a>
						</li>

						<li>
							<a href="<?=base_url('');?>events.php">
								<span class="title">Events</span>
							</a>
						</li>

						<li>
							<a href="<?=base_url('');?>faq.php">
								<span class="title">FAQ and Learning</span>
							</a>
						</li>


						<li class="has-sub">
							<a href="About">
								<span class="title">About Lists</span>
							</a>
							<ul>
								<li>
									<a href="<?=base_url('');?>about.php">
										<span class="title">About Us</span>
									</a>
								</li>
								<li>
									<a href="<?=base_url('');?>what-we-do.php">
										<span class="title">What We Do</span>
									</a>
								</li>
								<li>
									<a href="<?=base_url('');?>fun-fact.php">
										<span class="title">Fun Fact</span>
									</a>
								</li>
								<li>
									<a href="<?=base_url('');?>admin_update.php">
										<span class="title">Our Admin</span>
									</a>
								</li>
							</ul>
						</li>
						
						<!-- <li>
							<a href="layout-boxed.html">
								<span class="title">Boxed Layout</span>
							</a>
						</li> -->
					</ul>
				</li>










				<li class="has-sub">
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
				</li>

				<li>
					<a href="<?=base_url('');?>add_courses.php">
						<i class="entypo-pencil"></i>
						<span class="title">Add Courses</span>						
					</a>
				</li>


				<li>
					<a href="<?=base_url('');?>fees.php">
						<i class="entypo-bag"></i>
						<span class="title">Add Fees</span>						
					</a>
				</li>


				<li>
					<a href="<?=base_url('');?>view_register_course.php">
						<i class="entypo-pencil"></i>
						<span class="title">View all Register Courses</span>						
					</a>
				</li>

				<li>
					<a href="<?=base_url('');?>project_managements.php">
						<i class="entypo-book"></i>
						<span class="title">Project Management</span>						
						<span class="badge badge-danger"><?=$project_num;?></span>
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
						<span class="badge badge-danger"><?=$com_num;?></span>
					</a>
				</li>
				
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
							<img src="<?=base_home('');?><?=$avartar;?>" alt="" class="img-circle" width="50" height="50" style="border-radius: 50%;" />
							<?=$name;?>
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
		
							<!-- <li>
								<a href="<?=base_url('');?>inbox.php">
									<i class="entypo-mail"></i>
									Inbox
								</a>
							</li> -->
		
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