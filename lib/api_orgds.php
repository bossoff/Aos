<?php
// if(!defined('BASEACCESS')) die('You are not allowed to execute this file directly');
/******************************************************************************** 
@Author: Simeon Ayoade Adedokun
@Company: Simdol Technologies
@Website: www.simdols.com
@Email: ayoade@simdols.com, femsimade@gmail.com
********************************************************************************/ 
/********************************************************************************/
#login to the System
/* DO NOT CHANGE ANYTHING HERE */

//functions
function countSMSpgs($rawmsg)
{
	$touchnotchars = array('%26','%27','%22','%3E','%3C','%2F','%3A','%3B','%40','%23','%21','%2B','%2A','%2C');
	
	$rawmsg = str_replace("%0D%0A", "++", $rawmsg);
	
	$processrawmsg = $rawmsg;
	
	foreach ($touchnotchars as $key => $value) {
		$processrawmsg = str_replace($value, "+", $processrawmsg);
	}

	$msgchars = strlen($processrawmsg);

	if($msgchars <= 160){
    	$smspgs = ceil($msgchars/160);
	}
	else{
		$smspgs = ceil($msgchars/153);
	}
	return $smspgs;
}

function removeDupNums($commaSeparatedNumbers){
	$recipient = implode(",", array_unique(explode(",", $commaSeparatedNumbers)));
	return $recipient;
}

function regenerateNumbers($numbers)
{
	$numbers = explode(",", $numbers);
	$newnumbers = "";
	$countnumberunits = 0;
	$countinternationalNos = 0;
	foreach ($numbers as $number) {
		if ((substr($number, 0, 3)=='234' || substr($number, 0, 1)=='0') && substr($number, 0, 2)!='01') {
			if (empty($newnumbers)) {
				if(substr($number, 0, 3) == '234'){
					$newnumbers .= $number;
				}
				else{
					$newnumbers .= "234".substr($number, 1);
				}
			}
			else{
				if(substr($number, 0, 3) == '234'){
					$newnumbers .= ",".$number;
				}
				else{
					$newnumbers .= ",234".substr($number, 1);
				}
			}
			$countnumberunits += 1;//1 unit for local numbers
		}
		else{
			//number outside Nigeria
			if (empty($newnumbers)) {
				$newnumbers .= $number;
			}
			else{
				$newnumbers .= ",".$number;
			}
			$countnumberunits += 3;// units for international number
			$countinternationalNos += 1;
		}
	}
	$brokennumbers = explode(",", $newnumbers);
	$countnumbers = count($brokennumbers);
	$newnumbers = implode(",", $brokennumbers);
	return $reply = array($newnumbers,$countnumbers,$countinternationalNos,$countnumberunits);
}

function pluralise($data,$suffix=""){
	if(!is_numeric($data)) {
		$suffix = " N/A";
	}
	else {
		if($data <= 1){
			$suffix = $data . " " . $suffix;
		}
		else {
			$suffix = $data . " " . $suffix . "s";
		}
	}
	return $suffix;
}

function InterpreteSMSRoute($route=2)
{
	switch ($route) {
		case 3:
		case 4:
			$meaning = "Corporate";
			break;
		
		default:
			$meaning = "Basic";
			break;
	}
	return $meaning;
}

function InterpreteSMSType($type=0){
	switch ($type) {
		case 0:
			$meaning = "Plain";
			break;

		case 1:
			$meaning = "Flash";
			break;

		case 2:
			$meaning = "Unicode";
			break;

		case 3:
			$meaning = "Flash Unicode";
			break;
		
		default:
			$meaning = "Unknown";
			break;
	}
	return $meaning;
}

//api function
function odsapi($cmd=null,$showreply=0,$ods_apitoken=null,$usersmsbalance=0,$sender='',$sendto='',$message='',$smsbaseurl=null,$schedule=null,$smstype=0,$smsroute=2,$username=null,$password=null) {
	//cmd may be send or balance
	//showreply may be 1(show) or 0(no show)
	//SMS type  may be 0=plain text, 1=Flash Message, 2=Unicode SMS, 3=Unicode Flash SMS
	/*Note: 70 characters makes a page of 1-page Unicode SMS, while 63 characters makes a page for multiple pages Unicode SMS*/

	/*
		SMS Route
		1 = Filter DND Phone numbers //Don't send to numbers on DND
		2 = Send all messages via the Basic Route. DND phone numbers are not charged but may not receive the message
		3= Send message to those on DND via the Corporate Route.
	*/
	//GLOBAL DND_PERCENT_CHARGE;

	//$GLOBALS['DND_PERCENT_CHARGE'] = DND_PERCENT_CHARGE;

	if (empty($smsbaseurl) || $smsbaseurl == null) {
		$smsbaseurl = "http://orgds.org/api";
	}

	if (empty($ods_apitoken) || $ods_apitoken == null) {
		//get your APIX sub-account API_TOKEN at www.orgds.org/createapix
		$ods_apitoken = "APIX_G19211d0c6d4615c54a60d6c95ca743ddc6be7b4b362UA";
	}

	if ($smsroute==3 || $smsroute==4) {
		$smsroute=3;
	}else{
		$smsroute = 2;//default to Filter DND
	}

	$reply='';
	$stop=false;
	$er = false;
	$smstouse = 0;
	$token = 0;
	$allowedcmds = array('send','balance','sentsms');

	if (!empty($ods_apitoken)) {
		$usetoken = true;
	}
	else{
		$usetoken = false;
	}
	
	if (!in_array($cmd, $allowedcmds)) {
		$er = true;
		$msg = "Unknown command!";
	}

	if ((empty($username) && empty($password)) && $usetoken==false) {
		$er = true;
		$msg = "No authentication credential was supplied!<br>Please contact the administrator.";
	}

	if ((!empty($username) && empty($password)) && $usetoken==false) {
		$er = true;
		//$msg = "Password is empty!";
		$msg = "Authetication failed!";
	}
	
	if (!empty($password) && empty($username) && $usetoken==false) {
		$er = true;
		$msg = "Authetication failed!";
	}

	//validate if send
	if (($cmd=="send")) {
		$recipregex = '/^[,0-9- ]*$/';

		if ((empty($message) || $message==null)) {
			$er = true;
			$msg = "Message is empty!";
		}
		$message = trim($message);
		$sendto = urlencode(trim($sendto));
		$sendto = str_replace("+", ",", $sendto);
		$sendto = str_replace("-", "", $sendto);
		$sendto = str_replace(",,", ",", $sendto);
		$sendto = str_replace(" ", "", $sendto);
        $sendtoini = str_replace("%0A%2C", ",", $sendto);
        $sendtoini = str_replace("%0D%0A", ",", $sendtoini);
        $sendtoini = str_replace("%0D", ",", $sendtoini);
        $sendtoini = str_replace("%2C%0A", ",", $sendtoini);
        $sendtoini = str_replace("%0A", ",", $sendtoini);/* replace every enter pressed by comma*/
        $sendtoini = str_replace("%2C", ",", $sendtoini);
        $sendtoini = str_replace(",,", ",", $sendtoini);
        $sendtoini = urldecode($sendtoini);
        $sendtoini = removeDupNums($sendtoini);//remove duplicate

		$internationalSuffix = "";
		$generatednumbers = regenerateNumbers($sendtoini);
		$sendtoini = $generatednumbers[0];
		$numrecipients = $generatednumbers[1];
		(int)$internationalnos = $generatednumbers[2];
		(int)$countrecipientsunits = $generatednumbers[3];
		if ($internationalnos > 0) {
			$internationalSuffix = "<br>".pluralise($internationalnos,'international number')." found";
		}

		$numsms = countSMSpgs($message);

		$smstouse = $numsms*$numrecipients;
		//calculate for DND
		if ($smsroute==3 || $smsroute==4) {
			$smstouse *= 2;
		}

		//
		if(!is_numeric($usersmsbalance) || $smstouse > $usersmsbalance){
			$er =true;
			$msg = "Insufficient balance. You are about to use " . pluralise($smstouse, "SMS unit") . ", but you have " . pluralise($usersmsbalance, "unit");
	  	}

		if (!preg_match($recipregex,$sendtoini)) {
			$er = true;
			$msg = "Recipient list contains an invalid character!";
		}
		
		if (strlen($sender)>11) {
			$er = true;
			$msg = "Sender ID is longer than 11 characters!";
		}
	}
	//switch command url
	switch ($cmd) {
		case 'send':
			$url = $smsbaseurl."?"
			. "cmd=" . $cmd
			. "&sender=" . $sender
			. "&recipients=" . urlencode($sendtoini)
			. "&message=" . $message//message must have been urlencode from source
			. "&type=".$smstype
			. "&token=" . $ods_apitoken
			. "&route=" . $smsroute;
			if(!empty($schedule)){
				$url .= "&schedule=".$schedule;//YYYY-MM-DD HH:MM
			}
			break;

		case 'balance':
			//url type one
			$url = $smsbaseurl."?"
			."cmd=balance"
			."&token=" . $ods_apitoken;
			break;

		default:
			$stop=true;
			break;
	}

	//process send
	if ($er==false) {
		/* call the URL */
		if ($stop==false && $f = @fopen($url, "r")) {
			$answers = trim(fgets($f, 255));
			//$ans = trim(substr($answers, 4));
			$answer = substr($answers,0,3);
			/*
				#LIST OF ANSWERS#
			*/
			switch ($answer) {
				case '600':
					$er = false;
					if ($cmd=="send") {
						if (!empty($schedule)) {
							$sendmsg = "<strong>MESSAGE SCHEDULED SUCCESSFULLY</strong><br>Your ".$numsms."-page message to ".pluralise($numrecipients,'recipient')." has been scheduled for delivery on ".date("l, d-M-Y h:i A",strtotime($schedule)).". You will be charged ".pluralise($smstouse,'SMS unit');

							$alertsendmsg = "Your ".$numsms."-page message to ".pluralise($numrecipients,'recipient')." has been scheduled for delivery on ".date("l, d-M-Y h:i A",strtotime($schedule)).". You will be charged ".pluralise($smstouse,'SMS unit');
						}
						else{
							$sendmsg = "<strong>MESSEAGE SENT SUCCESSFULLY</strong><br>Your ".$numsms."-page message has been sent to ".pluralise($numrecipients,'recipient')." for immediate delivery via ".InterpreteSMSRoute($smsroute)." route, using ".pluralise($smstouse,'SMS unit');

							$alertsendmsg = "Your ".$numsms."-page message has been sent to ".pluralise($numrecipients,'recipient')." for immediate delivery via ".InterpreteSMSRoute($smsroute)." route, using ".pluralise($smstouse,'SMS unit');
						}
						$sendmsg .= '<script type="text/javascript"> alert("'.$alertsendmsg.'"); </script>';
					}
					$token = 1;
					break;
		
				case '700':
					$er = true;
					$msg = "Required parameter/variable is missing";//invalid token
					break;

				case '701':
					$er = true;
					$msg = "Username is empty";
					break;

				case '702':
					$er = true;
					$msg = "Password is empty";
					break;

				case '703':
					$er = true;
					$msg = "Unexpected error";
					break;

				case '704':
					$er = true;
					$msg = "Unknown command";
					break;

				case '705':
					$er = true;
					$msg = "Unable to connect";
					break;

				case '706':
					$er = true;
					$msg = "Wrong access credentials";
					break;

				case '707':
					$er = true;
					$msg = "Message is empty";
					break;

				case '708':
					$er = true;
					$msg = "Recipient is empty";
					break;

				case '709':
					$er = true;
					$msg = "Insufficient balance";
					break;

				case '710':
					$er = true;
					$msg = "Incorrect schedule date format. Accepted format is YYYY-MM-DD HH:MM";
					break;

				case '711':
					$er = true;
					$msg = "Token is empty";
					break;

				case '712':
					$er = true;
					$msg = "Sender ID is empty";
					break;

				case '713':
					$er = true;
					$msg = "Account not active";
					break;

				case '714':
					$er = true;
					$msg = "Unable to send message";
					break;

				case '715':
					$er = true;
					$msg = "Schedule time must be at least 5 minutes ahead";
					break;

				default:
					if ($cmd == "balance") {
						$er = false;
						$token = 1;
						$balmsg = $answers;//"Bal: ".pluralise($answers,"unit");
					}
					elseif ($cmd == "send") {
						$er = true;
						$msg = "Unable to process your request";// due to an unexpected error encountered. Please try again later.";
					}
					break;
			}
			if (isset($er)) {
				if($er==false && $cmd=='send') {
					$reply = array($token,$sendmsg,$smstouse,$numsms,$numrecipients);
				}
				elseif($er==false && $cmd=='balance') {
					$reply = array($token,$balmsg,0,0,0);
				}
				else {
					$reply = array($token,$msg,0,0,0);
				}
			}
			else {
				$reply = array($token,"Unavailable channel!",$smstouse,0,0);//"SMS Channel Unavailable";
			}
		}
		else{
			$reply = array($token,"Unavailable channel!",$smstouse,0,0);//"SMS Channel Unavailable"; 
		}
	}
	else{
		$reply = array($token,$msg,0,0,0);//error occured
	}
	//output reply if set to true
	if($showreply==1){
		return $reply;
	}
}
?>