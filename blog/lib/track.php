<?php

$ip = $_SERVER['REMOTE_ADDR'] ;

/* Set your API key this is a fake example :) */
$api= "ef70e7aa5d1bfd507cbba2038d93067769073b18bf018f51cbee4dcade06fa54 " ;  
$apiurl = "http://api.ipinfodb.com/v3/ip-city/?key=$api&ip=$ip" ; 

/* Prepare connection to ipinfodb.com and parse results into varibles  */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$apiurl");
/**
* Ask cURL to return the contents in a variable
* instead of simply echoing them to the browser. 
*/
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
/**
* Execute the cURL session
*/
$contents = curl_exec ($ch);
/**
* Close cURL session
*/
curl_close ($ch); 
$pieces = explode(";", $contents) ;
$country = "nigeria", //$pieces['4'] ;
$city = 'Sagamu';//$pieces['6'] ;
$city2 = "Ogun"//$pieces['5'] ;
$date = date("Y-m-d") ;
$time = date("H:i:s") ;
$ip = $_SERVER['REMOTE_ADDR'] ;
$query_string = $_SERVER['QUERY_STRING'] ;
$http_referer = isset( $_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "no referer" ;
$http_user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "no User-agent" ;
$web_page = $_SERVER['SCRIPT_NAME'] ;
$isbot = is_Bot() ? '1' : '0' ;


/* Conect to the database --- set your credentials  ---  */
require "dbconnect/database.php";
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connection failed: %s", mysqli_connect_error());
    exit();
		}

/* Insert data into mysql - table  */
mysqli_query($connect,  "INSERT INTO  visitor_tracker (country ,city,date,time,ip,web_page ,query_string ,http_referer ,http_user_agent ,is_bot) VALUES ('$country','$city',  '$date', '$time', '$ip', '$web_page',  '$query_string', '$http_referer', '$http_user_agent','$isbot'
)") ;
/* close DB-connection */
mysqli_close($connection) ;

/* Remove this line on production pages */
echo "Your IP is :" . $ip  . "and database is updated " ;


/* Detect if visitor is a "bot" */
function is_bot() {
$botlist = getBotList() ;
foreach($botlist as $bot) {
if(strpos($_SERVER['HTTP_USER_AGENT'] , $bot) !== false)
return true ;
	}
return false ;
	}//end function is_bot

	
/* Parse the robotId.txt file into an array */
function getBotList(){
if (($handle = fopen("robotid.txt", "r")) !== FALSE) {
$count= 1 ;
$bots = array() ;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {	
	if (strchr($data[0] , "robot-id:")) {
	//echo $count ." $data[0]"."<br>"; // for debuging
	$botId = substr("$data[0]", 9) . "<br>" ;
	array_push($bots, "$botId") ;
	$count++ ;		
	}
	}    
fclose($handle);
return $bots ;
	}
	} // end function getBotList

?>