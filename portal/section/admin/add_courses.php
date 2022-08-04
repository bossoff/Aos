<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

if(isset($_POST['courses1']) && $_POST['courses1'] == 'add_c'){
	date_default_timezone_set('Africa/Lagos');// change according timezone
	$currentTime = date( 'd-m-Y h:i:s A', time () );
	$er = false;
	$course_title = mysqli_escape_string($connect,strtoupper(trim($_POST['course_title'])));
	$course_code = mysqli_escape_string($connect, strtoupper(trim($_POST['course_code'])) );
	$semester = mysqli_escape_string($connect, trim($_POST['semester']));
	$session = mysqli_escape_string($connect, trim($_POST['session']));
	$department = mysqli_escape_string($connect, trim($_POST['department']));

	if($er ==  false){
		$query_insert =  mysqli_query($connect, "INSERT INTO courses SET course = '$course_title', course_code = '$course_code', semesters = '$semester', user_level = '$department', creation_date = '$currentTime', year = '$session'") or die(mysqli_query($connect));
			if(!empty($query_insert)){
				$er = false;
				$succes = "Course added successfully.";
			}
	}
}

elseif(isset($_POST['add']) && $_POST['add'] == 'first_semester'){
	$er = false;
	$query_first = mysqli_query($connect, "UPDATE courses SET section = '1' WHERE semesters = 1") or die(mysqli_error($connect));
	mysqli_query($connect, "UPDATE courses SET section = '0' WHERE semesters = 2") or die(mysqli_error($connect));
	if(!empty($query_first)){
		$er = false;
		$succes = "First semester courses set for the students";
	}
}

elseif(isset($_POST['add']) && $_POST['add'] == 'second_semester'){
	$er = false;
	$query_first = mysqli_query($connect, "UPDATE courses SET section = '2' WHERE semesters = 2");
	 mysqli_query($connect, "UPDATE courses SET section = '0' WHERE semesters = 1");
	 mysqli_query($connect, "UPDATE reg_courses SET ok = '0'");
	if(!empty($query_first)){
		$er = false;
		$succes = "Second semester courses set for the students";
	}
}

elseif(isset($_POST['add']) && $_POST['add'] == 'unadd'){
	$er = false;
	$query_first = mysqli_query($connect, "UPDATE courses SET section = '2'");
	if(!empty($query_first)){
		$er = false;
		$succes = "Course registeration cancel for the students";
	}
}

if(isset($_GET['Delete'])){
	$er =false;
	$cid = $_GET['Delete'];
	$query_delete = mysqli_query($connect, "DELETE FROM courses WHERE cid = '$cid'");
	if(!empty($query_delete)){
		$er = true;
		$errmsg = "This Course has been Deleted";
	}
}
?>
	<title><?=TITLE14;?></title>	


		
		<h3 style="">
            <i class="entypo-right-circled"></i> 
               Add Students Course     
            </h3>
		
		<h3></h3>
		<br />



<div class="row">
        <div class="col-md-12">
        
        
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('add_courses.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                             <button type="submit" name="add" value="first_semester" class="btn btn-success"> Set 1st Semester </button>
                             <button type="submit" name="add" value="second_semester" class="btn btn-info"> Set 2st Semester </button>
                             <button type="submit" name="add" value="unadd" class="btn btn-danger"> Course registration cancel </button>
                             	
                            </form>
                        
                    </div>
                </div>
                <!----EDITING FORM ENDS--->
                
            </div>
        </div>
    </div>






<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-pencil"></i> 
                        <?php echo get_phrase('Add Students Course');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('add_courses.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                             	<div class="form-group">
                                    <label class="col-sm-3 control-label"> Course Tittle:</label>
                                    <div class="col-sm-5">
                                        <strong><em>It most be long characters</em></strong>
                                        <input type="text" class="form-control" required="" name="course_title"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Course Code:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" required="" name="course_code"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Departments:</label>
                                    <div class="col-sm-5">
                                    	<select  class="form-control" required="" name="department">
                                    		<option required="" value="">--SELECT--</option>
                                    		<option value="Tutorial" required="">Tutorial</option>
                                    		<option value="French" required="">French</option>
                                    		<option value="Project" required="">Project</option>
                                    	</select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Semester:</label>
                                    <div class="col-sm-5">
                                        <select  class="form-control" required="" name="semester">
                                    		<option  required="" value="">--SELECT--</option>
                                    		<option name="semester" value="1" required="">First Semester</option>
                                    		<option name="semester" value="2" required="">Second Semester</option>
                                    	</select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> Session:</label>
                                    <div class="col-sm-5">
                                        <select  class="form-control" required="" name="session">
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
                                    	</select>
                                    </div>
                                </div>

                               



                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="courses1" value="add_c" class="btn btn-success"> Add Courses</button>
                                  </div>
                                </div>

                            </form>
                        
                    </div>
                </div>
                <!----EDITING FORM ENDS--->
                
            </div>
        </div>
    </div>








		
		<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			var $table4 = jQuery( "#table-4" );
			
			$table4.DataTable( {
				dom: 'Bfrtip',
				buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdfHtml5'
				]
			} );
		} );		
		</script>
		
		<table class="table table-bordered datatable" id="table-4">
			<thead>
				<tr>
					<th>S/N</th>
					<th>Course Code</th>
					<th>Course Title</th>
					<th>semester</th>
					<th>Section</th>
					<th>Department</th>
					<th>Register Date</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
						 $cnt=1; 
						$Query_register_course = mysqli_query($connect, "SELECT * FROM courses")or die(mysqli_error($connect));
						 while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
							$cid = $get_register_course['cid'];
							$course_code = $get_register_course['course_code'];
							$course_title = $get_register_course['course'];
							$year = $get_register_course['year'];
							$creation_date = $get_register_course['creation_date'];


							
							if($get_register_course['semesters']==1){
								$semester = "First Semester";
							}
							elseif ($get_register_course['semesters'] == 2) {
								$semester = "Second Semester";
							}

							$user_level = $get_register_course['user_level'];

							if($user_level=='French'){
								$color = 'btn-warning';
							}
							elseif($user_level=='Project'){
								$color = 'btn-success';
							}
							elseif($user_level='Tutorial'){
								$color = 'btn-danger';
							}

								
					?>
				<tr class="odd gradeX" style="font-weight: bold;">			
					<td><?= $cnt;?></td>
					<td><?= $course_code;?></td>
					<td><?= $course_title;?></td>
					<td class="center"><?= $semester;?></td>
					<td class="center"><?= $year;?></td>
					<td class="<?=$color;?>"><?= $user_level;?></td>
					<td class="center"><?= $creation_date;?></td>
					<td class="center">
						<a href="#" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
						
						<a href="add_courses.php?Delete=<?=$cid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Delete
						</a>

					</td>

					
				</tr>
				<?php $cnt=$cnt+1;}?>
			</tbody>
		
		</table>
		
				
		<br />

<?php require "inc/footer.php"?>
           
           
         

</div>

 <!-- Imported styles on this page -->
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/datatables/datatables.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2.css">


	<!-- Imported scripts on this page -->
	<script src="<?=base_url('');?>assets/js/datatables/datatables.js"></script>
	<script src="<?=base_url('');?>assets/js/select2/select2.min.js"></script>
	<script src="<?=base_url('');?>assets/js/neon-chat.js"></script>
