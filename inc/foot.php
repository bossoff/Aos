<style type="text/css">
		
.footer1{
	background: #212121;
	/*color: #fff*/
}
#sub-footer1{
	border-top: 3px solid #f26522;
	background:#49872E;
}


.footer1{
	padding:50px 0 0 0;
}

.footer1 a {
	color:#BBB9B9;
}

.footer1 a:hover {
	color:#f26522;
}
.footer1 p{
	color: #fff;
}

.footer1 h1, .footer1 h2, .footer1 h3, .footer1 h4, .footer1 h5, .footer1 h6{
	color:#fff;
	margin-bottom: 20px;

}

.footer1 address {
	line-height:1.6em;
}

.footer1 h5 a:hover, .footer1 a:hover {
	text-decoration:none;
}

ul.social-network {
	list-style:none;
	margin:0;
}

ul.social-network li {
	display:inline;
	margin: 0 5px;
}

.footer1 ul.social-network li i {
	font-size: 1.3em;
}

#sub-footer1{
	text-shadow:none;
	padding:0;
	padding-top:30px;
	margin:20px 0 0 0;
}

#sub-footer1 p{
	margin:0;
	padding:0;
}

#sub-footer1 span{

}

.copyright {
	text-align:left;
	font-size:12px;
}

#sub-footer1 ul.social-network {
	float:right;
}

.footer1 .widget form  input#appendedInputButton {
		  display: block;
		  width: 91%;
		  -webkit-border-radius: 4px 4px 4px 4px;
			 -moz-border-radius: 4px 4px 4px 4px;
				  border-radius: 4px 4px 4px 4px;
	}
	
	.footer1 .widget form  .input-append .btn {
		  display: block;
		  width: 100%;
		  padding-right: 0;
		  padding-left: 0;
		  -webkit-box-sizing: border-box;
			 -moz-box-sizing: border-box;
				  box-sizing: border-box;
				  margin-top:10px;
	}

.footer1 .widgetheading {
	position: relative;
}

.footer1 .widget .social-network {
	position:relative;
}

#bottom .widget .widgetheading span, aside .widget .widgetheading span, .footer1 .widget .widgetheading span {	
	position: absolute;
	width: 60px;
	height: 1px;
	bottom: -1px;
	right:0;

}

	.row,.row-fluid {
	margin-bottom:30px;
}

.row .row,.row-fluid .row-fluid{
	margin-bottom:30px;
}

.row.nomargin,.row-fluid.nomargin {
	margin-bottom:0;
}
/* scroll to top */
.scrollup{
    position:fixed;
	width:32px;
	height:32px;
    bottom:0px;
    right:20px;
	background: #f26522;
-webkit-border-radius: 2px 2px 0 0;	
	-moz-border-radius: 2px 2px 0 0;	
	border-radius:  2px 2px 0 0;	
}

a.scrollup {
	outline:0;
	text-align: center;
}

a.scrollup:hover,a.scrollup:active,a.scrollup:focus {
	opacity:1;
	text-decoration:none;
}
a.scrollup i {
	margin-top: 10px;
	color: #fff;
}
a.scrollup i:hover {
	text-decoration:none;
}


		</style>

		<div class="footer1">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>Get in touch with us</h4>
							<address style="color: #BBB9B9">
					<strong ><?= SCHOOL ;?></strong><br>
					 <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><?= ADDRESS ;?></address>
							<p style="color: #fff;">
								<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> <?= MTN ;?> || <?= AIRTEL ;?> <br>
								<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> <a href="<?= EMAIL ;?>"> <?= EMAIL ;?></a>
							</p>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>Information</h4>
							<ul class="link-list">
								<li ><a href="<?= base_url('');?>"><span data-hover="Home" style="color: #fff; padding: 5px;">Home</span></a></li>
								<li><a href="#">Login</a></li>
								
							
									<li><a href="<?=base_url("");?>french_language.php">French Language Studies</a></li>
									<li><a href="<?=base_url("");?>tutorial_study.php">Tutorial Session</a></li>
									<li><a href="<?=base_url("");?>project_management.php">Research Assistance</a></li>
									<li><a href="#">Terms and conditions</a></li>
									<li><a href="#">Privacy policy</a></li>
									<li><a href="#">Career center</a></li>
							</ul>
						</div>

					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>Pages</h4>
							<ul class="link-list">
								<li><a href="<?=base_url("");?>about.php">About Us</a></li>
								<li><a href="<?=base_url("");?>gallery.php">Gallery</a></li>
								<li><a href="<?=base_url("");?>blog.php">blog</a></li>								
								<li><a href="#">Project Topics Collection</a></li>
								<li><a href="#">Chapter Compilation</a></li>
								<li><a href="#">Complete Compilation</a></li>
								<li><a href="#">Past Projects</a></li>
								<li><a href="#">Books and Relevent PDFs</a></li>
								<li><a href="#">Articles and Papers</a></li>
								<li><a href="#">Data and Recordings</a></li>
								<li><a href="contact.php">Contact Us</a></li>

							</ul>
						</div>
					</div>


					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>Facebook Page</h4>
							<p>Fill your email and sign up for monthly newsletter to keep updated</p>
							<div class="form-group multiple-form-group input-group">
								<!-- <input type="email" name="email" class="form-control"> -->
								<span class="input-group-btn">
                            <button type="button" class="btn btn-theme btn-danger">Subscribe</button>
                        </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer1">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 footer-grid"">
							<div class="copy">
								<p>  © 2016 - <?= date('Y');?> || <?= FOOTER;?></p>
							</div>
						</div>
						<div class="col-lg-6">
							<ul class="social-network">
								<div class="social-icons">
							<a href="http://<?=FACEBOOK;?>"><i class="icon1"></i></a>
							<a href="http://<?=TWITTER;?>"><i class="icon2"></i></a>
							<a href="http://<?=GOOGLPLUS;?>"><i class="icon3"></i></a>
							<a href="http://<?=LINKEDIN;?>"><i class="icon4"></i></a>
						</div>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<!-- <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a> -->
	
  
  <input type="hidden" id="progress_width" value="0">

   <!-- /.End of Sign up  Sing in -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      