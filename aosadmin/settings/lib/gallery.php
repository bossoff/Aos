<?php
// define("_function", "../connection/");
// require (_function."function.php");
if(isset($_GET['logoid'])){
	$logoid = mysqli_real_escape_string($_GET['$logoid']);
	$showlogo_query = mysqli_query($connect, "SELECT * FROM logo WHERE logoid = '$logoid'");
	//$showlogo_query = mysqli_query($connect, "SELECT * FROM logo ");
	while ($logo_row = mysqli_fetch_assoc($showlogo_query)){
		$logo = $logo_row['logo'];
		$logo_type = $logo_row['type'];	
			//echo '<img src="data: $logo_type;base64,'.base64_encode($logo).'" height="100" width="300"/>';
	}
	
	header("content-type: $logo_type");
}

?>