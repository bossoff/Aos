<?php
require ('connection/function.php');

require "inc/header.php";


?>
<title><?= TITLE2; ?></title>



		<div class="banner-w3agile">
			<div class="container">
				<h3><a href="<?=base_url("");?>">Home</a> / <span>About</span></h3>
			</div>
		</div>
		<!--content-->
		<div class="content">
			<!--about-->
			<div class="about-w3">
				<div class="container">
					<h2 class="tittle">About Us</h2>
					<div class="about-grids">
						<?php
							$about_query = mysqli_query($connect, "SELECT * FROM about");
							while ($fetch_about = mysqli_fetch_assoc($about_query)) {
								$a_heading = $fetch_about['a_heading'];
								$a_content = $fetch_about['a_content'];
								$a_video_link = $fetch_about['a_video_link'];
							

						?>
						<div class="col-md-6 about-grid">
						 <h4><?=$a_heading;?></h4>
							 <p><?=$a_content;?></p>
							<!-- <ul class="grid-part">
								<li><i class="glyphicon glyphicon-ok-sign"> </i>Praesent vestibulum molestie lacus</li>
								<li><i class="glyphicon glyphicon-ok-sign"> </i>Donec sagittis interdum tellusplacerat adipiscing</li>
								<li><i class="glyphicon glyphicon-ok-sign"> </i>Nulla consectetur adipiscing</li>
							</ul> -->
						 </div>
						<div class="col-md-6 video-grid">
							<iframe src="<?=$a_video_link;?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
							<!-- <iframe src="https://player.vimeo.com/video/78554725?color=741731&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>  -->
						</div>
						<div class="clearfix"></div>
					<?php }?>
					</div>
				</div>
			</div>




			<!--about-->
			<!--What we do-->
				<div class="what-w3">
					<div class="container">
						<h3 class="tittle">What we do</h3>
						<?php
								$what_we_do_query = mysqli_query($connect, "SELECT * FROM what_we_do ORDER BY `what_we_do`.`time` DESC LIMIT 2");
								while($fetch_what_we_do = mysqli_fetch_assoc($what_we_do_query)){
									$w_heading1 = $fetch_what_we_do['w_heading1'];
									$w_content1 = $fetch_what_we_do['w_content1'];
									$w_image1 = $fetch_what_we_do['w_image1'];
									$w_heading2 = $fetch_what_we_do['w_heading2'];
									$w_content2 = $fetch_what_we_do['w_content2'];
									$w_image2 = $fetch_what_we_do['w_image2'];
									$time = $fetch_what_we_do['time'];

							?>
						<div class="what-grids">							
							<div class="col-md-6 what-grid">
								<div class="mask">
									<img src="<?=base_url('');?><?=$w_image1;?>" class="img-responsive zoom-img" />
								</div>
								<div class="what-bottom">
									<h4><?=$w_heading1;?></h4>
									<p><?=$w_content1;?></p>
								</div>
							</div>
							<div class="col-md-6 what-grid">
								<div class="what-bottom1">
									<h4><?=$w_heading2;?></h4>
									<p><?=$w_content2;?></p>
								</div>
								<div class="mask">
									<img src="<?=base_url('');?><?=$w_image2;?>" class="img-responsive zoom-img" />
								</div>
							</div>
							<div class="clearfix"></div>
							
						</div>
						<?php }?>
					</div>
				</div>




			<!--What we do-->
			<!--statistics-->
						<div class="statistics-w3">
							<div class="container">
								<h3 class="tittle">Fun Facts</h3>   
								<div class="statistics-grids">
									<?php

									 	$query_fun = mysqli_query($connect, "SELECT * FROM fun_fact ORDER BY `fun_fact`.`fid` DESC LIMIT 4");
									 	while($rew = mysqli_fetch_assoc($query_fun)){
									 ?>
									<div class="col-md-3 statistics-grid">
										<div class="statistic">
											<h4><?=$rew['percent'];?></h4>
											<h5><?=$rew['heading'];?></h5>
											<p><?=$rew['content'];?></p>
										</div>
									</div>	
									<?php }?>								
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					<!--statistics-->




						<!--staff-->
				<div class="staff-w3l">
					<div class="container">
						<h3 class="tittle">Our Staff</h3>						
						<div class="staff-grids">
							<?php
							$staff_query = mysqli_query($connect, "SELECT * FROM our_staff LIMIT 4");
								while($fetch_staff = mysqli_fetch_assoc($staff_query)){
								$staff1 = ucwords($fetch_staff['staff1']);
								$staff_image1 = $fetch_staff['staff_image1'];
								$office_number1 = $fetch_staff['office_number1'];								
								$mobile_number1 = $fetch_staff['mobile_number1'];								
								$facebook1 = $fetch_staff['facebook1'];								
								$twitter1 = $fetch_staff['twitter1'];								
								$google_plus1 = $fetch_staff['google_plus1'];								
								$post1 = $fetch_staff['post1'];			

						?>
							<div class="col-md-6 staff-grid">
								<div class="staff-left">
									<img src="<?=base_url("");?>upload/<?=$staff_image1;?>" class="img-responsive" alt="/">
								</div>
								<div class="staff-right">
									<h4><?=$staff1;?></h4>
									<ul>
										 <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> Office : <?=$office_number1;?></li>
										<li><i class="glyphicon glyphicon-phone" aria-hidden="true"></i> Mobile : <?=$mobile_number1;?></li>
										<li><i class="glyphicon glyphicon-print" aria-hidden="true"></i> Post : <?=$post1;?></li>
									</ul>
									<div class="social-icons">
										<a href="<?=$facebook1;?>"><i class="icon1"></i></a>
										<a href="<?=$twitter1;?>"><i class="icon2"></i></a>
										<a href="<?=$google_plus1;?>"><i class="icon3"></i></a>
										<!-- <a href="#"><i class="icon4"></i></a> -->
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						<?php } ?>
						</div>


						
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!--staff-->
		</div>	
		<!--content-->
		

<?php 
require "inc/foot.php";

?>
				
</body>
</html>
