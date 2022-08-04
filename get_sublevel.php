<?php
include('connection/function.php');
require "lib/number_validate.php";
check_login();

if(!empty($_POST["level"])){

 $sql=mysqli_query($connect,"SELECT sub_level FROM school_level WHERE level ='".$_POST['level']."'");?>
	 <!-- <option selected="selected"> -- Sub Level -- </option> -->
	 <?php
	 while($row=mysqli_fetch_assoc($sql))
	 	{?>
	  	<option value="<?php echo htmlentities($row['sub_level']); ?>"><?php echo htmlentities($row['sub_level']); ?></option>
	  <?php
	}
}

?>

