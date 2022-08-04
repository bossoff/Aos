<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";


?>
	<title><?=TITLE8;?></title>				
		
		<h3 style="">
            <i class="entypo-right-circled"></i> 
               All Our Students So Far      
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
			<thead>
				<tr>
					<th>S/N</th>
					<th>Surname</th>
					<th>Full Name</th>
					<th>User Type</th>
					<th>Application</th>
					<th>Gender</th>
					<th>Phone Number</th>
					<th>Email</th>
					<th>session</th>
					<th>Register Date</th>
					<!-- <th>Action</th> -->
				</tr>
			</thead>
			<tbody>
				<?php
						 $cnt=1; 
						$Query_all_students = mysqli_query($connect, "SELECT * FROM users");
						 while($get_all_students_department = mysqli_fetch_assoc($Query_all_students)){
							$Surname = $get_all_students_department['surname'];
							$fullname = $get_all_students_department['fullname'];
							$phone = $get_all_students_department['phone'];
							$email = $get_all_students_department['email'];
							$gender = $get_all_students_department['gender'];
							$application = $get_all_students_department['application_no'];
							$user_level = $get_all_students_department['user_level'];
							$session = $get_all_students_department['session'];
							$creation_date = $get_all_students_department['creation_date'];
							$color = "";

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
					<td><?= $Surname;?></td>
					<td><?= $fullname;?></td>
					<td class="<?=$color;?>"><?= $user_level;?></td>
					<td><?= $application;?></td>
					<td class="center"><?= $gender;?></td>
					<td class="center"><?= $phone;?></td>
					<td class="center"><?= $email;?></td>
					<td class="center"><?= $session;?></td>
					<td class="center"><?= $creation_date;?></td>
					<!-- <td>
						<a href="#" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
						
						<a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Delete
						</a>
						
						<a href="#" class="btn btn-info btn-sm btn-icon icon-left">
							<i class="entypo-info"></i>
							Profile
						</a>
					</td> -->
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
