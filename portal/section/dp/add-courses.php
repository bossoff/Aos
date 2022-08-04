<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
?>

<title><?=TITLE14;?></title>
<h4 style="">
    <i class="entypo-right-circled"></i> 
    <?= $application_no;?> (Add Courses)      
</h4>
<hr>

<?php
$check_1 = mysqli_query($connect, "SELECT section, user_level FROM courses WHERE user_level = '$user_level'") or die(myqli_error($connect));
$get_1 = mysqli_fetch_assoc($check_1);
if($get_1['section']==2){
	header("LOCATION:".base_url('registeration_closed.php?rdir=1'));
}

$check_active = mysqli_query($connect, "SELECT ok FROM reg_courses WHERE uid = '$uid'");
$get_active = mysqli_fetch_assoc($check_active);
if($get_active['ok']==1){
	header("LOCATION:".base_url('register-ourse.php?rdir=1'));
}

	date_default_timezone_set('Africa/Lagos');// change according timezone
	$currentTime = date( 'd-m-Y h:i:s A', time () );
	if(isset($_POST['adding']) && $_POST['adding'] == 'ad'){
		$er = false;
		$availabvilty = isset($_POST['adcourses']);
		$semester = $_POST['semester'];
		$query_check = mysqli_query($connect,"SELECT courseid, semester FROM reg_courses WHERE uid = '$uid'")or die(myqli_error());
		$check_available = mysqli_fetch_assoc($query_check);
		if($check_available['courseid'] == $availabvilty AND $check_available['semester'] == $semester){
			$er = true;
			$errmsg = "Sorry: This particular session course has already been register.";			
		}
		else{
			$query_act1 = mysqli_query($connect, "SELECT active FROM reg_courses WHERE uid = '$uid'");
			$get_act1 = mysqli_fetch_assoc($query_act1);
			if($get_act1['active'] == 0){
				if(isset($_POST['adcourses'])){
					if(!empty($_POST['adcourses'])){
						$courses = array();
						$courses = $_POST['adcourses'];
						$semester = $_POST['semester'];			
						$session = $_POST['session'];			
						foreach($courses as $course){
							$query_insert = mysqli_query($connect,"INSERT INTO reg_courses SET courseid ='$course', uid ='$uid', active = 1, session = '$session', semester = '$semester', creation_date = '$currentTime'")or die(mysqli_error());
							if(!empty($query_insert)):
								$er = false;
								header("LOCATION:".base_url('course_confirm.php?rdir=1'));
								$succes = "Your courses has been Registered.";
							endif;							
						}
					}
				}
			}else{
				if(isset($_POST['adcourses'])){
					if(!empty($_POST['adcourses'])){
						$courses = array();
						$courses = $_POST['adcourses'];
						$semester = $_POST['semester'];			
						$session = $_POST['session'];			
						foreach($courses as $course){
							$query_insert = mysqli_query($connect,"INSERT INTO reg_courses SET courseid ='$course', uid ='$uid', active = 2, session = '$session', semester = '$semester', creation_date = '$currentTime'")or die(mysqli_error());
							mysqli_query($connect, "UPDATE reg_courses SET done = 1 WHERE uid = '$uid'");
							if(!empty($query_insert)):
								$er = false;
								header("LOCATION:".base_url('course_confirm.php?rdir=1'));
								$succes = "Your courses has been Registered.";
							endif;							
						}
					}
				}
			}
			
		}
	}

?>

<h2>
<?php
	$query_se = mysqli_query($connect, "SELECT section, user_level FROM courses WHERE user_level = '$user_level'") or die(mysqli_error($connect));
	$get_se = mysqli_fetch_assoc($query_se);
	if($get_se['section'] == 1){
		echo "Register your 1st Semester courses";
	}
	elseif ($get_se['section'] ==0) {
		echo "Register your 2nd Semester courses";
	}

?>
	
</h2>
		<br />

		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							
							Choose carefully before submitting
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						<form role="form" action="<?=base_url('add-courses.php?');?>" method="POST" class="form-horizontal form-groups-bordered">
			
							<div class="form-group">
								<?php

									$query_section = mysqli_query($connect, "SELECT section, user_level, semesters FROM courses") or die(mysqli_error($connect));
									$get_section = mysqli_fetch_assoc($query_section);
									if($get_section['section'] == 1){
										$query_course = mysqli_query($connect, "SELECT * FROM courses WHERE section = '1' AND user_level = '$user_level' AND semesters = '1'") or die(mysqli_error($connect));
										while($get_course = mysqli_fetch_assoc($query_course)){
											echo '
											<div class="col-sm-5">									
												<div class="checkbox checkbox-replace color-green">
													<input type="checkbox" value="'.$get_course['cid'].'" name="adcourses[]" id="chk-23">
													<label> '.$get_course['course_code'].' {'.$get_course['course'].'}</label>
												</div>
											</div>';
										}
									}



									if($get_section['section'] == 0){
										$query_course = mysqli_query($connect, "SELECT * FROM courses WHERE section = '2' AND user_level = '$user_level' AND semesters = '2'") or die(mysqli_error($connect));
										while($get_course = mysqli_fetch_assoc($query_course)){
											echo '
											<div class="col-sm-5">									
												<div class="checkbox checkbox-replace color-green">
													<input type="checkbox" value="'.$get_course['cid'].'" name="adcourses[]" id="chk-23">
													<label> '.$get_course['course_code'].' {'.$get_course['course'].'}</label>
												</div>
											</div>';
										}
									}


								?>

								
							</div>

							<div class="form-group">
								<label class="col-sm-5 control-label">Semester</label>	

								<div class="col-sm-5">								
									<select required="" name="semester"  class="form-control">
										<option value="">-Select</option>
										<option value="First Semester">First Semester (<?=date('Y');?>)</option>
										<option value="Second Semester">Second Semester (<?=date('Y');?>)</option>
									</select>
									
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-5 control-label">Section</label>
								
								<div class="col-sm-5">								
									<select required="" name="session" class="form-control">
										<option value="">-Select</option>

										<?php 
											$date_year = date("Y", strtotime(date("Y")+1));
											for ($i=date("Y"); $i < $date_year+2; $i++) { 
												echo $i.'/'.$i+1;
										
												echo '<option value="'.$i.'/'.($i+1).'">'.$i.'/'.($i+1).'</option>';

											}

										?>

										<!-- <option value="2020/2021">2020/2021</option> -->
									</select>
									
								</div>
							</div>


							<div class="form-group col-md-8">
								<button type="submit" name="adding" value="ad"  data-loading-text="Loading..." class="btn btn-lg btn-primary">
									Add Courses
								</button>
							</div>
						</form>
						
					</div>
					
				</div>
				
			</div>
		</div>
		





<?php require "inc/footer.php"?>
<!-- Imported styles on this page -->
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/selectboxit/jquery.selectBoxIt.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/icheck/skins/minimal/_all.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/icheck/skins/square/_all.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/icheck/skins/flat/_all.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/icheck/skins/futurico/futurico.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/icheck/skins/polaris/polaris.css">


	<!-- Imported scripts on this page -->
	<script src="<?=base_url('');?>assets/js/select2/select2.min.js"></script>
	<script src="<?=base_url('');?>assets/js/bootstrap-tagsinput.min.js"></script>
	<script src="<?=base_url('');?>assets/js/typeahead.min.js"></script>
	<script src="<?=base_url('');?>assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<script src="<?=base_url('');?>assets/js/bootstrap-datepicker.js"></script>
	<script src="<?=base_url('');?>assets/js/bootstrap-timepicker.min.js"></script>
	<script src="<?=base_url('');?>assets/js/bootstrap-colorpicker.min.js"></script>
	<script src="<?=base_url('');?>assets/js/moment.min.js"></script>
	<script src="<?=base_url('');?>assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="<?=base_url('');?>assets/js/jquery.multi-select.js"></script>
	<script src="<?=base_url('');?>assets/js/icheck/icheck.min.js"></script>
	
</div>
