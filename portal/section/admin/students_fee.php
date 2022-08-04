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
               All Payments    
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
					<th>Payment Name</th>
					<th>Name</th>
					<th>Application No</th>
					<th>Payment Type</th>
					<th>Payment Method</th>
					<th>Amount</th>
					<th>Department</th>
					<th>Register Date</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
						 $cnt=1; 
						$Query_register_course = mysqli_query($connect, "SELECT * FROM payments ")or die(mysqli_error($connect));
					$get_register_course = mysqli_fetch_assoc($Query_register_course);
							$title = $get_register_course['title'];
							$name = $get_register_course['surname'];
							$application = $get_register_course['application_no'];
							$payment_type = $get_register_course['payment_type'];
							$payment_method = $get_register_course['payment_method'];
							$amount = $get_register_course['amount'];
							$user_level = $get_register_course['user_level'];
							$creation_date = $get_register_course['creation_date'];
							
								
					?>
				<tr class="odd gradeX" style="font-weight: bold;">			
					<td><?= $cnt;?></td>
					<td><?= $title;?></td>
					<td><?= $name;?></td>
					<td><?= $application;?></td>
					<td class="center"><?= $payment_type;?></td>
					<td class="center"><?= $payment_method;?></td>
					<td class="center"><?= $amount;?></td>
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
