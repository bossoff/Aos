<?php
require ('connection/function.php');
require "inc/header.php";


?>
<title><?= TITLE7; ?></title>

		<div class="banner-w3agile">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Contact</span></h3>
			</div>
		</div>
		<div class="content">
			<!--contact-->
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">How To Find Us</h2>
					<div class="contact-bottom">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20710912.242732543!2d-119.74791551885588!3d57.80230286198458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x549e2319b9444f43%3A0x7b507aa0262d61af!2sEducation+Consultants+LLC!5e0!3m2!1sen!2sin!4v1466162893366"  allowfullscreen></iframe>
					</div>
					<div class="col-md-4 contact-left">
						<div class="contct-info">
							<h4> Contact Information</h4>
							<p><?= ADDRESS ;?></p>
							<ul>
								
								<li>Free Phone :<?= MTN ;?> </li>
								<li>Telephone :<?= AIRTEL ;?></li>
								<!-- <li>Fax :+1 078 4589 2456</li> -->
								<li><a href="mailto:example@mail.com"><?= EMAIL ;?><//a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-8 contact-left cont">
						<div class="contct-info">
							<h4>Contact Form</h4>
							<form action="#" method="post">
								<div class="row">
									<div class="col-md-6 row-grid">
									<input type="text" name="Name" placeholder="Your Name" required>
									</div>
										<div class="col-md-6 row-grid">
											<input type="text" name="Email" placeholder="Email address" required>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="row">
									<div class="col-md-6 row-grid">
									<input type="text" name="Subject" placeholder="Subject" required>
									</div>
										<div class="col-md-6 row-grid">
									<input type="text" name="Subject" placeholder="Phone number" required>
									</div>
									<div class="clearfix"></div>
								</div>
								<textarea placeholder="Message" name="Message" ></textarea>
								<input type="submit" value="Submit" >
								<input type="reset" value="Clear" >
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--contact-->
		</div>


	<?php require "inc/foot.php";?>