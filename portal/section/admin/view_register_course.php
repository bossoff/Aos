<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";


?>
	<title><?=TITLE14;?></title>	


		
		<h3 style="">
            <i class="entypo-right-circled"></i> 
               All Register Course Student    
            </h3>
		
		<h3></h3>
		<br />



<div class="row">
       






<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-users"></i> 
                        <?php echo get_phrase('All Register Course Student');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
   



		
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
					<th>Surname</th>
					<th>Application No</th>
					<th>semester 1</th>
					<th>semester 2</th>
					<th>Section</th>
					<th>Department</th>
					<th>Register Date</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
						 $cnt=1; 
						$Query_register_course = mysqli_query($connect, "SELECT * FROM users INNER JOIN reg_courses ON users.user_id = reg_courses.uid INNER JOIN courses ON reg_courses.courseid = courses.cid ")or die(mysqli_error($connect));
					$get_register_course = mysqli_fetch_assoc($Query_register_course);
							$course_code = $get_register_course['course_code'];
							$name = $get_register_course['surname'];
							$course_title = $get_register_course['course'];
							$semester = $get_register_course['semester'];
							$session = $get_register_course['session'];
							$application = $get_register_course['application_no'];
							$user_level = $get_register_course['user_level'];
							$creation_date = $get_register_course['creation_date'];
							$active = $get_register_course['active'];

							if($user_level=='French'){
								$color = 'btn-warning';
							}
							elseif($user_level=='Project'){
								$color = 'btn-success';
							}
							elseif($user_level='Tutorial'){
								$color = 'btn-danger';
							}

							if($active = 1){
								$semester1 = "First Semester";
							}
							if($active = 2){
								$semester2 = "Second Semester";
							}
								
					?>
				<tr class="odd gradeX" style="font-weight: bold;">			
					<td><?= $cnt;?></td>
					<td><?= $name;?></td>
					<td><?= $application;?></td>
					<td class="center"><?= $semester1;?></td>
					<td class="center"><?= $semester2;?></td>
					<td class="center"><?= $session;?></td>
					<td class="<?=$color;?>"><?= $user_level;?></td>
					<td class="center"><?= $creation_date;?></td>
					
				</tr>
				<?php $cnt=$cnt+1;?>
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
