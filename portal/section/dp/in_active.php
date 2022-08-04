<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
?>

<title><?=TITLE4;?></title>
<h4 style="">
    <i class="entypo-right-circled"></i> 
    <?= $application_no;?> (Submition Message)      
</h4> 

<?php
	// $check = mysqli_query($connect, "SELECT fullpayment, halfpayment FROM project WHERE uid = '$uid'");
	// $get = mysqli_num_rows($check);
	// if($get['halfpayment'] == 0 && $get['fullpayment'] == 0):

	//      header("LOCATION:".base_url("").'in_active.php?rdir=project_submitted%proceed');
	// endif;
?>

<hr>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				
				<div class="panel minimal">
					
					<!-- panel head -->
					<div class="panel-heading">
						<div class="panel-title"><h4>Submition Message</h4></div>

						<div class="panel-options">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#tab1" data-toggle="tab"><i class="entypo-mail"></i></a>
								</li>
							</ul>
						</div>
					</div>
					
					<!-- panel body -->
					<div class="panel-body">
						
						<div class="tab-content">
							<div class="tab-pane active" id="tab1" style="background: #fff;">
								<!-- <br/> -->
								<div class="col-md-12">
									<h4 class="bold text-success">WOW! <img src="<?=base_url('assets/images/smile1.png');?>"> 
									<?=$surname;?></h4>
								</div>
								<br>
								<div class="bold" style="font-size: 18px;">Your project has been recieved by the managements. We are cross checking your submitted details. Kindly wait for few minutes.</div>

							<h4 class="bold text-success"><strong class="bold" style="color: green"> NOTE:</strong> We might give you a call at anytime concerning your project.</div>

								<!-- <link rel="stylesheet" type="text/css" href="<?=base_url("assets/style.css");?>"> -->
									<div class="row col-md-offset-2">
										<ul id="example" style="font-weight: bold; font-size: 26px; margin: 0 auto; margin-bottom: 20px; margin-top: 20px;">
											<li style="display: inline-block;"><span class="minutes" style="color: green !important">00</span><p class="minutes_text">Minutes</p></li>
											<li class="seperator" style="display: inline-block;">:</li>
											<li style="display: inline-block;"><span class="seconds" style="color: green !important">00</span><p class="seconds_text">Seconds</p></li>
										</ul>
										<script type="text/javascript" src="<?=base_url('');?>assets/js/jquery.countdown.min.js"></script>
										<script type="text/javascript">
											$('#example').countdown({
												date: '12/24/2020 00:05:59',
												offset: -8,
												day: '5',
												days: 'Days'
											}, function () {
												alert('Done!');
											});
										</script>
									</div>
								
								 <div><a href="<?=base_url('');?>project.php" class="col-md-offset-3"><div class="btn btn-lg btn-success" style="color: #fff;">Check for payment Approval</div></a></div>
				
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
		</div>



<?php require "inc/footer.php"?>

    
</div>
