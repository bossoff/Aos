<?php
if(!empty($_POST["add-course"])) {
	$courses= $_POST["add-course"];	
	$check_course = mysqli_query($connect, "SELECT * FROM tutorial WHERE uid = '$uid'");
	$get_cid = mysqli_fetch_assoc($check_course);
	$cid = $get_cid['id'];
	$num=mysqli_num_rows($check_course);
	echo $num;
	if($num > 0){
		$delet_course = mysqli_query($connect, "DELETE FROM tutorial WHERE id = '$cid'");
		if(!empty($delet_course)):
			echo "<span style='color:red'> This deselected course as been deleted from your recode.</span>";
			 echo "<script>$('#submit').prop('disabled',true);</script>";
		endif;
	} 

	elseif($num == 0){
		$insert_course = mysqli_query($connect, "INSERT INTO tutorial SET course '$courses', uid = 'uid', name = '$surname', application_no = '$application_no'");
		if(!empty($delet_course)):
			echo "<span style='color:red'> This course as been as been added to your recode.</span>";
			 echo "<script>$('#submit').prop('disabled',true);</script>";
		endif;
	}
}

?>