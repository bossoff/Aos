<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
?>

<title><?=TITLE16;?></title>


<h3 style="">
            <i class="entypo-right-circled"></i> 
               <?= $application_no;?> (Payment Status)     
            </h3>
		
		<h3></h3>
		<br />
		
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
			<?php
			// $check_rest = mysqli_query($connect, "SELECT * FROM reg_courses WHERE user_level = '$user_level' AND uid = '$uid'");
			// $get_rest = mysqli_fetch_assoc($check_rest);
			// if($check_rest['active'] == 0){
			// if(empty($check_rest)){
			// 	header("LOCATION:".base_url('add-courses.php?rdir=1'));
			// }

			// $get_active = mysqli_fetch_assoc($check_active);
			// if($get_active['active']==1){

				echo '<thead>
							<h6 style="">
				            	<i class="entypo-book"></i> 
				               1st and 2nd Payments
			            	</h6>
							<tr>
								<th>S/N</th>
								<th>Payment Type</th>
								<th>Method</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Session</th>
								<th>Creation_Date</th>
							</tr>
						</thead>
						<tbody>';
						$cnt=1; 
						$Query_register_course = mysqli_query($connect, "SELECT * FROM payments WHERE uid = '$uid'  ORDER BY `payments`.`creation_date` DESC")or die(mysqli_error($connect));
						 while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
							$title = $get_register_course['title'];
							$payment_type = $get_register_course['payment_type'];
							$amount = $get_register_course['amount'];
							$creation_date = $get_register_course['creation_date'];
							if($get_register_course['semester']==1):
								$session = '1st Semester';
							elseif($get_register_course['semester']==2):
								$session = '2nd Semester';
							endif;



							// if($user_level == "Tutorial"):
							// 	if($get_register_course['semester']==1):
							// 		$session = '1st Semester';
							// 	elseif($get_register_course['semester']==2):
							// 		$session = '2nd Semester';
							// 	endif;
							// elseif($user_level == "French"):
							// 	if($get_register_course['semester']==1):
							// 		$session = '1st Semester';
							// 	elseif($get_register_course['semester']==2):
							// 		$session = '2nd Semester';
							// 	endif;
							// elseif($user_level == "Project"):
							// 	if($get_register_course['semester']==1):
							// 		$session = 'Base on Project';
							// 	endif;
							// endif;




							if($get_register_course['is_complete'] == 0):
								$color = 'btn-danger'; 
								$is_complete = 'Unsuccesful';
							elseif($get_register_course['is_complete'] == 1):
								$color = 'btn-success'; 
								$is_complete = 'Succesful';
							endif;

							if($user_level == "Tutorial"){
								echo'<tr class="odd gradeX" style="font-weight: bold;">			
									<td> '.$cnt.'</td>
									<td> '.$title.'</td>
									<td> '.$payment_type.'</td>
									<td class="center"> '.$amount.'</td>
									<td class="'.$color.'"> '.$is_complete.'</td>
									<td class="center"> '.$session.'</td>
									<td class="center"> '.$creation_date.'</td>

								</tr>';
							}

							elseif($user_level == "French"){
								echo'<tr class="odd gradeX" style="font-weight: bold;">			
									<td> '.$cnt.'</td>
									<td> '.$title.'</td>
									<td> '.$payment_type.'</td>
									<td class="center"> '.$amount.'</td>
									<td class="'.$color.'"> '.$is_complete.'</td>
									<td class="center"> '.$session.'</td>
									<td class="center"> '.$creation_date.'</td>

								</tr>';
							}else{
								echo'<tr class="odd gradeX" style="font-weight: bold;">			
									<td> '.$cnt.'</td>
									<td> '.$title.'</td>
									<td> '.$payment_type.'</td>
									<td class="center"> '.$amount.'</td>
									<td class="'.$color.'"> '.$is_complete.'</td>
									<td class="center"> Base On Project</td>
									<td class="center"> '.$creation_date.'</td>

								</tr>';
							}							
					
				
				 $cnt=$cnt+1;
				}
				echo"</tbody>";

			// }


			// if ($get_active['active']==1) {
			// 	echo '<thead>
			// 				<h6 style="">
			// 	            	<i class="entypo-book"></i> 
			// 	               1st Semester Register Courses
			//             	</h6>
			// 				<tr>
			// 					<th>S/N</th>
			// 					<th>Application No.</th>
			// 					<th>Course Code</th>
			// 					<th>Course Title</th>
			// 					<th>Semester</th>
			// 					<th>Session</th>
			// 					<th>Department</th>
			// 				</tr>
			// 			</thead>
			// 			<tbody>';
			// 			$cnt=1; 
			// 			$Query_register_course = mysqli_query($connect, "SELECT * FROM users INNER JOIN reg_courses ON users.user_id = reg_courses.uid INNER JOIN courses ON reg_courses.courseid = courses.cid WHERE uid = '$uid' AND active = 2")or die(mysqli_error($connect));
			// 			 while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
			// 				$course_code = $get_register_course['course_code'];
			// 				$course_title = $get_register_course['course'];
			// 				$semester = $get_register_course['semester'];
			// 				$session = $get_register_course['session'];
			// 				$application = $get_register_course['application_no'];
			// 				$user_level = $get_register_course['user_level'];							
					
			// 	echo'<tr class="odd gradeX" style="font-weight: bold;">			
			// 		<td> '.$cnt.'</td>
			// 		<td> '.$application.'</td>
			// 		<td> '.$course_code.'</td>
			// 		<td> '.$course_title.'</td>
			// 		<td class="center"> '.$semester.'</td>
			// 		<td class="center"> '.$session.'</td>
			// 		<td class="center"> '.$user_level.'</td>
			// 	</tr>';
			// 	 $cnt=$cnt+1;
			// 	}
			// 	echo"</tbody>";
				
			// }


		?>
			
				
						 
			
		
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
