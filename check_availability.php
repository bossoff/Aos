<?php 
include'connection/function.php';
if(!empty($_POST["email"])) {
	$email= $_POST["email"];	
	$result1 =mysqli_query($connect, "SELECT email FROM users WHERE email='$email'");
	$count1=mysqli_num_rows($result1);
	echo $count1;
	if($count1>0){
	echo "<span style='color:red'> This Email already exists .</span>";
	 echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		
		echo "<span style='color:green'>This Email is available for Registration .</span>";
	 echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

elseif(!empty($_POST['matric'])){
	$matric= $_POST["matric"];	
	$result2 =mysqli_query($connect, "SELECT matric FROM users WHERE matric='$matric'");
	$count2=mysqli_num_rows($result2);
	echo $count2;
	if($count2>0){
	echo "<span style='color:red'> This Matric already exists .</span>";
	 echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		
		echo "<span style='color:green'> This Matric available for Registration.</span>";
	 echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

elseif(!empty($_POST['phone'])){
	$phone= trim($_POST["phone"]);	
	$result3 =mysqli_query($connect, "SELECT phone FROM users WHERE phone ='$phone'");
	$count3=mysqli_num_rows($result3);
	echo $count3;
	if($count3>0){
	echo "<span style='color:red'> This Phone Number is already exists for one Account.</span>";
	 echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		
		echo "<span style='color:green'> This Phone Number available for Acount creation.</span>";
	 echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

elseif(!empty($_POST['email'])){
	$email= trim($_POST["email"]);	
	$result3 =mysqli_query($connect, "SELECT email FROM users WHERE email ='$email'");
	$count3=mysqli_num_rows($result3);
	echo $count3;
	if($count3>0){
	echo "<span style='color:red'> This Email Address is already exists for one Account.</span>";
	 echo "<script>$('#submit').prop('disabled',true);</script>";
	} else{
		
		echo "<span style='color:green'> This Email Address is valid for creation.</span>";
	 	echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

?>
