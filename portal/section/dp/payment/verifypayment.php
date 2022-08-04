<?php
require "connection/function.php";
require "connection/user_checker.php";
check_login();
require "inc/header.php";

define("LIVESECRETKEY", "sk_live_242d6d986731365dac92e0ed28704de26e612af1");
define("LIVEPUBLICKEY", "pk_live_5565d6eda993427fdeefdc675985f3604189a0bf");
define("CHECKSTATUSURL", "http://www.paystack.co/pay/");
define("GATEWAYURL", "http://www.paystack.co/pay/");
define("PATH", 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']));
define("CALLBACKURL",base_url('payment/verifypayment.php'));
// define("WEBHOOK", "http://www.yoursite.com/webhookpage");//not compulsory but may read about it on payment documentation page



//This is payment verification page
if ( isset($_REQUEST['prefid']) && !empty($_REQUEST['prefid'])) {

//post or get variable prefid is the payment ref id you sent with the payment. It should bear the name you gave to the ref
	
	$er = false;
	
	$prefid = $_REQUEST["prefid"];

	$success_ref = $prefid;

	if($_REQUEST['r']=="success"){//I defined r as part of success URL on Paystack 
		$result = array();
		//The parameter after verify/ is the transaction reference to be verified
		$url = 'https://api.paystack.co/transaction/verify/'.$prefid;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt(
		  $ch, CURLOPT_HTTPHEADER, [
		    'Authorization: Bearer '.LIVESECRETKEY]
		);// I define LIVESECRETKEY in payStack_constants.php
		$request = curl_exec($ch);
		curl_close($ch);

		if ($request) {
		  $result = json_decode($request, true);
		}

		if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
			//"Transaction was successful"
			//Perform necessary action
			$success = true;
			//update database and credit the user
			$callUserBack = mysqli_query($onnect, "SELECT * FROM payments INNER JOIN users ON payments.uid=users.user_id WHERE transaction_id='$prefid'") or die('Something went wrong');//I already stored ref_number when user initiated payment order, which was sent as prefid to the server. Now I want to know if it exists in db 

			$countCalled = $callUserBack->num_rows;

			if ($countCalled) {
				$fetchCalled = mysqli_fetch_assoc($callUserBack);
				$theuserid = $fetchCalled['user_id'];
				$email = $fetchCalled['email'];
				$fulltoname = $fetchCalled['firstname']." ".$fetchCalled['lastname'];
				$current_status = $fetchCalled['is_complete'];
					
				if ($current_status == 0) {//Checking if transaction has never been completed 
					
					$transupdatestmt = mysqli_query($onnect, "UPDATE payments SET is_complete = 1, transaction_id = '$success_ref' WHERE uid = '$theuserid' AND transaction_id = '$prefid'") or die('Something went wrong');
					if(!empty($transupdatestmt)){
						$er = false;
						$succes = "Transaction was successful. Thank you! ";
						$msg = "Transaction was successful. Thank you! ";
					}
					
					// $transtatus = 1;
			        
			  //       $transbind = $transupdatestmt->bind_param("isis",$transtatus,$success_ref,$theuserid,$prefid) or die('Something went wrong');

			  //       $transexec = $transupdatestmt->execute() or die('Something went wrong');


					
			        	
			        	
			        	//process email or SMS notification if needed
			        	
			        else{
			        	$er = true;
			        	$errmsg = "Something went wrong.<p class='tcenter'>Please feel free to contact us.</p>";
			        }
			    }
			    elseif($current_status == 1){
			    	$er = true;
					$errmsg = "Transaction already processed and completed.";
			    }
			    else{
			    	$er = true;
					$errmsg = "An unexpected error occured!";
			    }
			}
			else{
				//$er = false;
				$er = true;
				$errmsg = "Unexpected error encountered: Unlinked transaction.";
			}
		}else{
		  	//$er = false;
			$er = true;
			$errmsg = "<p class='tcenter'>Transaction not successful. Please try again.</p>";
		}
	}//end success
	elseif ($_REQUEST['r']=="failed") {//set as part of my failed URL on Paystack server or inline redirection
		//$er = false;
		$er = true;
		$errmsg = "<p class='tcenter'>Transaction was not successful. Please try again.</p>";
	}
	elseif ($_REQUEST['r']=="canceled") {
		//$success = false;
		$er = true;
		$errmsg = "<p class='tcenter'>Transaction was canceled. You can try again.</p>";
	}
}
else{
	$er = true;
	$errmsg = "<p class='tcenter'>Transaction was not successfully completed.<br>Required values are missing!</p>";
}

if (isset($msg)) {
	echo $msg;
}
elseif (isset($errmsg)) {
	echo $errmsg;
}
?>

<title><?=TITLE18;?></title>
<?php require"inc/footer.php";?>