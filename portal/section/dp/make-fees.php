<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
?>

<title><?=TITLE4;?></title>

                  


        
        	<!------CONTROL TABS START------->
    		<ul class="nav nav-tabs bordered">
                		<li class="active">
		                	<a href="#list" data-toggle="tab">	
		                		
		                        <i class="entypo-bell"></i>	
		                    	
		    				<?=get_phrase('All Payments');?>

		    				</a></li>

    			
    		</ul>
        	<!------CONTROL TABS END------->



				<div class="row">
					<div class="col-lg-12">
					<div class="col-lg-12">
						<!-- <h4>Example on <strong>4 columns</strong></h4> -->
					</div>


				


				<?php

					$payment_type = mysqli_query($connect, "SELECT * FROM fees WHERE user_level='$user_level'");
	                while($ty = mysqli_fetch_assoc($payment_type)){
	                $title = $ty['title'];
	                $price = $ty['price'];
	                if($ty['semester']==1):
	                	$semester = "First Semester";
	                else:
	                	$semester = "Second Semester";
	                endif;
	                $id = $ty['id'];
				?>

					<div class="col-lg-3 ">
						<div class="pricing-box-alt special">
							<div class="pricing-heading" style="background: #f15814;">
								<h3><?=$title;?></h3>
							</div>
							<div class="pricing-terms">
								<h6 style="font-size: 18px;">NGN <?= number_format($price);?></h6>
							</div>
							<div class="pricing-content">
								<ul>
									<li style="background: green; color: #fff; font-weight: bold;"><i class="icon-ok"></i> <?=$semester;?></li>
									<!-- <li><i class="icon-ok"></i> 24x7 support available</li>
									<li><i class="icon-ok"></i> No hidden fees</li>
									<li><i class="icon-ok"></i> Free 30-days trial</li>
									<li><i class="icon-ok"></i> Stop anytime easily</li> -->
								</ul>
							</div>
							<div class="pricing-action">
								<a href="<?=base_url('payment/paymentform.php');?>?pays=<?=base64_encode($id);?>" class="btn btn-md btn-success" ><i class="icon-bolt"></i>Proceed Payment Now</a>
							</div>
						</div>
					</div>


				<?php } ?>
				</div>
			</div>



<style type="text/css">
	
/* --- Pricing box --- */


.pricing-title{
	background:#fff;
	text-align:center;
	padding:10px 0 10px 0;
}

.pricing-title h3{
	font-weight:600;
	margin-bottom:0;
}

.pricing-offer{
	background: #fcfcfc;
	text-align: center;
	padding:40px 0 40px 0;
	font-size:18px;
	border-top:1px solid #e6e6e6;
	border-bottom:1px solid #e6e6e6;
}
.pricing-box-alt.special .pricing-heading {
	background: #d9232d;
}

.pricing-box.special .pricing-offer{
	color:#fff;
}

.pricing-offer strong{
	font-size:78px;
	line-height:89px;
}

.pricing-offer sup{
	font-size:28px;
}

.pricing-content{
	background: #fff;
	text-align:center;
	font-size:14px;
}

.pricing-content strong{
color:#353535;
}

.pricing-content ul{
	list-style:none;
	padding:0;
	margin:0;
}

.pricing-content ul li{
	border-bottom:1px solid #e9e9e9;
	list-style:none;
	padding:15px 0 15px 0;
	margin:0 0 0 0;
	color: #888;
}

.pricing-action{
	margin:0;
	background: #fcfcfc;
	text-align:center;
	padding:20px 0 30px 0;
}

.pricing-wrapp{
	margin:0 auto;
	width:100%;
	background:#fd0000;
}

/* --- pricing box alt 1 --- */
.pricing-box-alt {
border: 1px solid #e6e6e6;
	background:#fcfcfc;
	position:relative;
	margin:0 0 20px 0;
	padding:0;
  -webkit-box-shadow: 0 2px 0 rgba(0,0,0,0.03);
  -moz-box-shadow: 0 2px 0 rgba(0,0,0,0.03);
  box-shadow: 0 2px 0 rgba(0,0,0,0.03);
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.pricing-box-alt .pricing-heading {
	background: #fcfcfc;
	text-align: center;
	padding:40px 0 0px 0;
	display:block;
}
.pricing-box-alt.special .pricing-heading {
	background: #fcfcfc;
	text-align: center;
	padding:40px 0 1px 0;
	border-bottom:none;
	display:block;
	color:#fff;
}
.pricing-box-alt.special .pricing-heading h3 {
	color:#fff;
}

.pricing-box-alt .pricing-heading h3 strong {
	font-size:32px;
	font-weight:700;
	letter-spacing:-1px;
}
.pricing-box-alt .pricing-heading h3 {
	font-size:32px;
	font-weight:300;
	letter-spacing:-1px;
}

.pricing-box-alt .pricing-terms {
	text-align: center;
	background:#333;
	display:block;
	overflow:hidden;
	padding:30px 0 20px;
}

.pricing-box-alt .pricing-terms  h6 {
	font-style:italic;
	margin-top:10px;
	color:#fff;
	
	font-family:'Roboto', sans-serif;
}

.pricing-box-alt .icon .price-circled {
    margin: 10px 10px 10px 0;
    display: inline-block !important;
    text-align: center !important;
    color: #fff;
    width: 68px;
    height: 68px;
	padding:12px;
    font-size: 16px;
	font-weight:700;
    line-height: 68px;
    text-shadow:none;
    cursor: pointer;
    background-color: #888;
    border-radius: 64px;
    -moz-border-radius: 64px;
    -webkit-border-radius: 64px;
}

.pricing-box-alt  .pricing-action{
	margin:0;
	text-align:center;
	padding:30px 0 30px 0;
}

</style>
            
    	
    		
    





<?php include('inc/footer.php'); ?>
