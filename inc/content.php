<!--content-->

	


		<div class="content">
			<!--banner-bottom-->
			<div class="banner-bottom" style="border-bottom: 1px solid #49872E; border-top: 3px solid  #f26522;">
				<div class="col-md-3 ban-grid">
					<div class="ban-left">
						<h4>Expert Teachers</h4>
						<p>Nullam egestas diam eu felis </p>
					</div>
					<div class="ban-right">
						<i class="glyphicon glyphicon-user"> </i>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-3 ban-grid">
					<div class="ban-left">
						<h4>Video Courses</h4>
						<p>Nullam egestas diam eu felis </p>
					</div>
					<div class="ban-right">
						<i class="glyphicon glyphicon-facetime-video"> </i>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-3 ban-grid">
					<div class="ban-left">
						<h4>Library</h4>
						<p>Nullam egestas diam eu felis </p>
					</div>
					<div class="ban-right">
						<i class="glyphicon glyphicon-book"> </i>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-3 ban-grid">
					<div class="ban-left">
						<h4>Online Courses</h4>
						<p>Nullam egestas diam eu felis </p>
					</div>
					<div class="ban-right">
					<i class="glyphicon glyphicon-blackboard"> </i>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!--banner-bottom-->
			<!--welcome-->
			<div class="welcome-w3">
				<div class="wrap">
					<h2 class="tittle">Welcome To Our School </h2>
					<div class="heading-underline">
						<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
					</div>

					<?php 
						$our_school = mysqli_query($connect, "SELECT * FROM school_advert");
						while($fetch_our_school = mysqli_fetch_assoc($our_school)){
							$image1 = $fetch_our_school['image1'];
							$image2 = $fetch_our_school['image2'];
							$image3 = $fetch_our_school['image3'];
							$image4 = $fetch_our_school['image4'];
							$image5 = $fetch_our_school['image5'];
							$s_title = $fetch_our_school['s_title'];
						

					 ?>

					<div class="wel-grids">
						<div class="col-md-4 wel-grid">
							<div class="port-7 effect-2">
								<div class="image-box">
									<img src="<?=$image5;?>" class="img-responsive" alt="Image-2">
								</div>
								<div class="text-desc">
									<h4><?=$s_title;?></h4>
								</div>
							</div>

							<div class="port-7 effect-2">
								<div class="image-box">
									<img src="<?=$image4;?>" class="img-responsive" alt="Image-2">
								</div>
								<div class="text-desc">
									<h4><?=$s_title;?></h4>
								</div>
							</div>
						</div>

						<div class="col-md-4 wel-grid">
							<img src="<?=$image1;?>"  class="img-responsive" alt="Image-2">
							<div class="text-grid">
								<h4><?=$s_title;?></h4>
							</div>
						</div>

						<div class="col-md-4 wel-grid">
							<div class="port-7 effect-2">
								<div class="image-box">
									<img src="<?=$image3;?>" class="img-responsive" alt="Image-2">
								</div>
								<div class="text-desc">
									<h4><?=$s_title;?></h4>
								</div>
							</div>

							<div class="port-7 effect-2">
								<div class="image-box">
									<img src="<?=$image2;?>" class="img-responsive" alt="Image-2">
								</div>
								<div class="text-desc">
									<h4><?=$s_title;?></h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<?php } ?>
				</div>
			</div>
			<!--welcome-->

<br>
			<!-- Services -->
					<h3 class="tittle">Our Core Services</h3>
					<div class="heading-underline">
						<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
					</div>
					<div class="services-grids">
						<a href="#">
							<div class="col-md-4 ser-grid">
								<div class="icon">
									<i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
								</div>
								<h4>FRENCH STUDIES</h4>
								<p>Learn the French Language at your own convenience.</p>
							</div>
						</a>
						<a href="#">
							<div class="col-md-4 ser-grid">
								<div class="icon">
									<i class="glyphicon glyphicon-book" aria-hidden="true"></i>
								</div>						
								<h4>TUTORIAL SESSIONS</h4>
								<p>Take Tutorials on your Departmental Core and Elective Courses.</p>
							</div>
						</a>
						<a href="#">
							<div class="col-md-4 ser-grid">
								<div class="icon">
									<i class="glyphicon glyphicon-magnet" aria-hidden="true"></i>
								</div>
								<h4>RESEARCH ASSISTANCE</h4>
								<p>Let's Assist you with your Project or Thesis works.</p>
							</div>
						</a>

						<div class="clearfix"></div>
					</div>

			<!-- Services -->

<br>


			<!--student-->
			<div class="student-w3ls">
				<div class="wrap">
					<h3 class="tittle"> DIRECTOR'S NOTE</h3>
					<div class="heading-underline">
						<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
					</div>
					<div class="student-grids">
						<div class="col-md-6 student-grid">
						<?php
							$our_student = mysqli_query($connect, "SELECT * FROM our_students");
							while($fetch_our_student = mysqli_fetch_assoc($our_student)){
								$s_topic = $fetch_our_student['s_topic'];
								$s_content = $fetch_our_student['s_content'];
								$s_short_content = $fetch_our_student['s_short_content'];
								$s_image = $fetch_our_student['s_image'];
								// $s_image1 = embeddedImgOur_student1($fetch_our_student['s_image']);
							
						?>													
							<h4><?= $s_topic; ?></h4>

								<p><?= $s_short_content."....."; ?> <div class="read">
						<a href="#" class="view resw3" data-toggle="modal" data-target="#myModal">Read More</a>
					</div></p>
								

						</div>
						<div class="col-md-6 student-grid">
							<img src="<?= $s_image;?>" class="img-responsive" alt="Image-2">
						</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!--student-->

<div class="col-md-6 student-grid">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4>Our Student</h4>
							<img src="<?= $s_image;?>" class="img-responsive" alt="Image-2">
					<!-- <img src="images/banner2.jpg" alt="blog-image" /> -->
					<span><p>

						<?= $s_content; ?>
							<ul class="grid-part">
									<li><i class="glyphicon glyphicon-ok-sign"> </i>Praesent vestibulum molestie lacus</li>
									<li><i class="glyphicon glyphicon-ok-sign"> </i>Donec sagittis interdum tellusplacerat adipiscing</li>
									<li><i class="glyphicon glyphicon-ok-sign"> </i>Nulla consectetur adipiscing</li>
									<li><i class="glyphicon glyphicon-ok-sign"> </i>Donec ac rhoncus libero vestibulum aliquet</li>
									<li><i class="glyphicon glyphicon-ok-sign"> </i>Erci eu tincidunt lacinia sit amet pretium</li>
								</ul>


					</p></span>
					<!-- <img src="images/banner2.jpg" alt="blog-image" /> -->
					
				</div>
			</div>
		</div>
	</div>

</div>

<div class="signup" id="signup">
	<div class="container">
		<div class="head-top-w3ls"><i class="glyphicon glyphicon-user"></i></div>
			<h5 class="title-w3">Play, Explore and Learn a Language.</h5>
			<p>Register for any of our programs today in order to learn a second language with our world-class curriculum at any age and stage in your Linguistic journey.</p>

			<div class="button2">
				<h5><a href="#" data-toggle="modal" data-target="#myModal3">Enrol Now <span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></h5>
			</div>
		</div>
				<!-- Modal2 -->
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<div class="signin-form profile">
						<h3 class="agileinfo_sign">Sign Up >> A.O.S</h3>
						<div class="login-form">
							<form action="register_pro.php?rdr=Reg_1" method="POST">
								<!-- <input type="text" name="firstname" placeholder="Firstname" >
								<input type="text" name="lastname" placeholder="Lastname" > -->
								<input type="text" name="username" placeholder="Username">
								<input type="text" name="phone" placeholder="phone">
								<input type="text" name="email" placeholder="Email" >
								<select type="text" name="user_level">
									<option value=""> -User Levels-</option>
									<option value="Administrator">ADMIN</option>
									<option value="Staff">Staff</option>
									<option value="Student">Student</option>
								</select>
								<input type="password" name="password" id="password1" placeholder="Password" >
								<input type="password" name="con_password" id="password2" placeholder="Confirm Password" >

								<input type="submit" name="REGISTER" value="CREATE ACCOUNT">
								<p><input type="checkbox" name="checkbox" href="#"> By clicking register, I agree to your terms</p>
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal2 -->
				<!-- //Modal1 -->
 </div>
