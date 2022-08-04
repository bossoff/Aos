<?php
$query_all_users = mysqli_query($connect, "SELECT * FROM users");
$user_num = mysqli_num_rows($query_all_users);
?>
<?php
$query_all_project = mysqli_query($connect, "SELECT * FROM project");
$project_num = mysqli_num_rows($query_all_project);
?>

<?php
$query_get_admin = mysqli_query($connect, "SELECT * FROM ceoadmin");
$row_admin = mysqli_fetch_assoc($query_get_admin);

require "photo.class.php";
$avartar =$row_admin['avartar'];
// $avartar1 =embeddedImg1($row_admin['avartar']);
if(empty($avartar)){
	$avartar = 'assets/images/profile.png';
}else{
	$avartar;
	

}// require "photo.class.php";
// $avartar =embeddedImg1($row_admin['avartar']);
?>

<?php
$check_slider = mysqli_query($connect, "SELECT * FROM slider");
$get_slider = mysqli_fetch_assoc($check_slider);
?>


<?php
$check_oursch= mysqli_query($connect, "SELECT * FROM school_advert");
$get_school = mysqli_fetch_assoc($check_oursch);
?>



<?php
$check_ourstu= mysqli_query($connect, "SELECT * FROM our_students");
$get_student = mysqli_fetch_assoc($check_ourstu);
?>




<?php
$complaains= mysqli_query($connect, "SELECT * FROM complains");
$com_num = mysqli_num_rows($complaains);
?>



<?php
$Query_french = mysqli_query($connect, "SELECT * FROM users WHERE user_level = 'French'");
$Query_tutorial = mysqli_query($connect, "SELECT * FROM users WHERE user_level = 'Tutorial'");
$Query_project = mysqli_query($connect, "SELECT * FROM users WHERE user_level = 'Project'");
$num1 = mysqli_num_rows($Query_french);
$num2 = mysqli_num_rows($Query_tutorial);
$num3 = mysqli_num_rows($Query_project);
?>