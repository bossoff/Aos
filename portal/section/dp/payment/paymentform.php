<?php
require "connection/function.php";
require "connection/user_checker.php";
check_login();
require "inc/header.php";
$urk= "http://$_SERVER[HTTP_HOST]";

define("LIVESECRETKEY", "sk_live_242d6d986731365dac92e0ed28704de26e612af1");
define("LIVEPUBLICKEY", "pk_live_5565d6eda993427fdeefdc675985f3604189a0bf");
define("TESTSECRETKEY", "sk_test_");
define("TESTPUBLICKEY", "pk_test_");

// define("LIVESECRETKEY", "sk_live_");
// define("LIVEPUBLICKEY", "pk_live_");
// define("TESTSECRETKEY", "sk_test_95c6601dc1d49d216fdf31ad3d5e42c3b819e984");
// define("TESTPUBLICKEY", "pk_test_74da26e0cce5039826ef2c9e70955dd4c6ee84f0");
define("CHECKSTATUSURL", "http://www.paystack.co/pay/");
define("GATEWAYURL", "http://www.paystack.co/pay/");
define("PATH", 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));
define("CALLBACKURL",base_url('payment/verifypayment.php'));
// define("WEBHOOK", "http://localhost/aos/portal/section/dp/payment/paymentform.php/webhookpage");//not compulsory but may read about it on payment documentation page
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
	// $fid = "";$pid = "";
	
	$fid = base64_decode($_GET['pays']);	
	$pid = base64_decode($_GET['pay']);
	if(isset($fid)):
		$query_fee = mysqli_query($connect, "SELECT price, title, semester FROM fees WHERE id = '$fid' AND user_level = '$user_level'");
		$get_p = mysqli_fetch_assoc($query_fee);
		$title = $get_p['title'];
		$pay1 = $get_p['price'];
		$semester = $get_p['semester'];
		$tran_id = 'aos_pay_'.time();
		$amount = isset($get_p['price']) ? $get_p['price'] : 0;
	endif;

	if(isset($pid)):
		$query_cash = mysqli_query($connect, "SELECT id, fullpayment, halfpayment FROM project WHERE fullpayment = '$pid' || halfpayment ='$pid' ");
		$get_pay = mysqli_fetch_assoc($query_cash);
		$cash1 = $get_pay['halfpayment'];
		$cash2 = $get_pay['fullpayment'];
		$cashid = $get_pay['id'];

		if($get_pay['halfpayment'] = $pid):
			$get_p = mysqli_fetch_assoc($query_fee);
			$title = "Project";
			$pay1 = $get_pay['halfpayment'];
			$semester = 'None';
			$tran_id = 'aos_pay_'.time();
			$amount = isset($get_pay['halfpayment']) ? $get_pay['halfpayment'] : 0;

		elseif($get_pay['fullpayment'] = $pid):
			$get_p = mysqli_fetch_assoc($query_fee);
			$title = "Project";
			$pay1 = $get_pay['halfpayment'];
			$semester = 'None';
			$tran_id = 'aos_pay_'.time();
			$amount = isset($get_pay['fullpayment']) ? $get_pay['fullpayment'] : 0;
		endif;
	endif; 

//start processing payment
//This section gets values for the variables from a form or database data
			// $amount = isset($get_pay['fullpayment']) ? $get_pay['fullpayment'] : 0;
	$amount = isset($amount) ? $amount : 0;
	$amount = $amount*100;//coverted to kobo
	if (empty($amount) || $amount == 0) {
		$er = true;
		$errmsg = "Invalid amount!<p class='tcenter'>Please <a href='buy'>try your request again.</a></p>";
	}
	$customerFName = isset($surname) ? $surname : "";
	$customerLName = isset($firtname) ? $firtname : "";
	$customerFullName = $customerFName." ".$customerLName;
	$customerEmail = isset($email) ? $email : "";
	if (empty($customerEmail) || $customerEmail==FALSE) {
		$er = true;
		$errmsg = "Invalid email!<p class='tcenter'>Please <a href='buy'>try your request again.</a></p>";
	}
	$customerPhone = isset($phone) ? $phone : "";
	$customerUsername = isset($application_no) ? $application_no : "";
	$currency = isset($_POST['payment-currency-options']) ? $_POST['payment-currency-options'] : "NGN";
	$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

	$transref = isset($tran_id) ? $tran_id : "";

	$description = isset($get_p['description']) ? $get_p['description'] : "";

	
?>


<?php
	$er = false;
	//This is the guy that will process payment script
	if ($er == false) {
		echo "<script type='text/javascript'>";
		echo " var pkey = '".LIVEPUBLICKEY."';";
		echo " var tpkey = '".TESTPUBLICKEY."';";
		echo " var callbackurl = '".CALLBACKURL."';";
		echo "</script>";

			$query_check = mysqli_query($connect, "SELECT title, semester FROM payments");
			$get_check = mysqli_fetch_assoc($query_check);

			if($get_check['title'] != $title && $get_check['semester'] != $semester):
				$query_pay = mysqli_query($connect, "INSERT INTO payments SET title = '$title', payment_type = 'Online Machine', transaction_id = '$tran_id', uid = '$uid', method = 'Paystack', description = '$title', semester = '$semester', amount = '$pay1', creation_date = '$currentTime'") or die(mysqli_error($connect));				
			else:
				$query_update = mysqli_query($connect, "UPDATE payments SET title = '$title', payment_type = 'Online Machine', transaction_id = '$tran_id', uid = '$uid', method = 'Paystack', description = '$title', semester = '$semester', amount = '$pay1', creation_date = '$currentTime', count = count+1 WHERE uid = '$uid'")or die(mysqli_error($connect));
			
			endif;
	}
?>
	
	<script src='st_includes/js/payment.js'></script>
	<script src="https://js.paystack.co/v1/inline.js"></script>
	<script type="text/javascript">
	  function payWithPaystack(){

	  	//write an ajax code that will update database

	  	var pamount = document.getElementById('psamt').value;
	  	var pmail = document.getElementById('customerEmail').value;
	  	var pref = document.getElementById('prefid').value;
	  	var phone = document.getElementById('customerPhone').value;
	    var handler = PaystackPop.setup({
	      key: pkey,
	      email: pmail,
	      amount: pamount,
	      ref: pref,
	      subaccount: '',
	      bearer: '',
	      metadata: {
	         custom_fields: [
	            {
	                display_name: "Mobile Number",
	                variable_name: "mobile_number",
	                value: phone
	            }
	         ]
	      },
	      callback: function(response){
	      	
	      	alert('Transaction was successful! Your transaction reference is ' + response.reference + "\nClick OK to continue...");
	      	
	      	document.getElementById('busygif').innerHTML = '';
      	
	      	var rdirurl = pagethatreceivespaymentstatus+"&prefid="+response.reference+"&r=success";

	      	giveUserValue(rdirurl);

	      },
	      onClose: function(){
	      	alert('Transaction was canceled! You can try again.');

	      	document.getElementById('busygif').innerHTML = '';

	      	var rdirurl = pagethatreceivespaymentstatus+"&prefid="+pref+"&r=canceled";
			
			giveUserValue(rdirurl);
	      }
	    });
	    handler.openIframe();
	  }

	</script>

	<form onsubmit="payWithPaystack()" id="paystack_form" name="paystack_form" method="POST">
		<!-- Supply the following data -->
		<input id="psamt" name="psamt" value="<?= $amount; ?>" type="hidden"/>
		<input id="customerName" name="customerName" value="<?= $customerFullName; ?>" type="hidden"/>
		<input id="customerEmail" name="customerEmail" value="<?= $customerEmail; ?>" type="hidden"/>
		<input id="customerPhone" name="customerPhone" value="<?= $customerPhone; ?>" type="hidden"/>
		<input id="prefid" name="prefid" value="<?= $transref; ?>" type="hidden" />
			<!-- <input type="submit" class="w3-red" id="chpassbtn" value="Click here to proceed" /> -->
			<script type="text/javascript">
			var newcontent = "<button type='button' id='makingdifferenttimer' onclick='payWithPaystack()' class='w3-red w3-padding-medium'>Click here to proceed</button>"
			jQuery(document).ready(function() {
			var sec = 5
			$("#makingdifferenttimer").hide(0);
			var timer = setInterval(function() {
			$("#mdtimer span").text(sec--);
				if (sec == 0) {
					$("#makingdifferenttimer").delay(1000).fadeIn(1000);
					$("#mdtimer").hide(1000) .fadeOut(fast);}
				},1000);
			});
		</script>
		<div id="mdtimer" class="tcenter">
			<b></b>
			<div style="font-size: large;">
				<b>Please wait <span>5</span> seconds for redirection</b>
			</div>
		</div>
		<div class="tcenter" id="makingdifferenttimer" style="font-size: large;">
			<h5><span id="waiting">Please wait</span> for redirection...</h5>
			<button type='button' id='makingdifferenttimer' onclick='payWithPaystack()' class='btn btn-lg btn-success'>Click here to proceed</button>
		</div>
	</form>
	<script type="text/javascript">payWithPaystack();</script>

	<title><?=TITLE17;?></title>

	<?php require"inc/footer.php";?>