<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

?>	

<?php
	
	if(isset($_GET['delete'])){
		$delete = mysqli_real_escape_string($connect,$_GET['delete']);
		$D_query = mysqli_query($connect, "DELETE FROM project WHERE id = '$delete'");
		if(!empty($D_query)):
				$er = true;
				$errmsg = 'This Project as been Deleted';
		endif;
	}


	if(isset($_GET['complete'])){
		$complete = mysqli_real_escape_string($connect, $_GET['complete']);
		$update_complete = mysqli_query($connect, "UPDATE project SET status = 1 WHERE id = '$complete'");
		// $num = mysqli_num_rows($update_complete);
		if(!empty($update_complete)):
			$er = false;
			$succes = 'This Project as been Mark Complete';
		endif; 
	}

	
	if(isset($_GET['Payment'])):
		$er = false;
		$Payment = mysqli_real_escape_string($connect, trim($_GET['Payment']));
		$pay1 = mysqli_real_escape_string($connect, trim($_POST['pay1']));
		$pay2 = mysqli_real_escape_string($connect, trim($_POST['pay2']));

		// $query_check_pay = mysqli_query($connect, "SELECT halfpayment, fullpayment FROM project WHERE id='$Payment'");
		// $row_checkpay = mysqli_fetch_assoc($query_check_pay);
		// if($row_checkpay['halfpayment']==0 && $row_checkpay['fullpayment']==0){
		// 	header("Refresh: 1; URL=\"". $url. "\"");
		// }else{
			$query_pay = mysqli_query($connect, "UPDATE project SET halfpayment = '$pay2',status = 3, fullpayment = '$pay1' WHERE id = '$Payment'");
				if(!empty($query_pay)):
					$er = false;
					$succes = "This particular Price as been fixed.";
				endif;
		// }

		
	endif;

	

?>
	
<title><?=TITLE11;?></title>

 			<h3 style="">
            	<i class="entypo-right-circled"></i> 
                All Placed Projects       
            </h3> 
		
		<br />
		
		<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			var $table1 = jQuery( '#table-1' );
			
			// Initialize DataTable
			$table1.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
		} );
		</script>

	<script src="assets/js/jquery-1.11.3.min.js"></script>

		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th data-hide="phone">S/N</th>
					<th>Topic</th>
					<th>Supervisor</th>
					<th>Matric</th>
					<th>FullName</th>
					<th>Level</th>
					<th>Phone</th>					
					<th>Department</th>
					<th>School</th>
					<th>Year</th>					
					<th>Posted Date</th>
					<th data-hide="phone,tablet">Status</th>
					<th data-hide="phone,tablet">Action</th>
				</tr>
			</thead>
				<?php
					$fet_project=mysqli_query($connect,"SELECT * FROM project  ORDER BY `project`.`creation_date` DESC") or die(mysli_error($connect));
					$cnt=1;
					while($get_project=mysqli_fetch_assoc($fet_project)){				
					$cid = $get_project['uid'];
					$pid = $get_project['id'];

					
									
					$get_status=mysqli_query($connect,"SELECT status FROM project WHERE id = '". $get_project['id']."'");
					$get_sta=mysqli_fetch_assoc($get_status);
					
                ?>
			<tbody>
				
				<tr class="odd gradeX">
					<td><?=$cnt;?></td>
					<td><?=$get_project['topic'];?></td>
					<td><?=$get_project['supervisor'];?></td>
					<td><?=$get_project['matric'];?></td>
					<td><?=$get_project['fullname'];?></td>
					<td class="center"><?=$get_project['level'];?></td>
					<td><?=$get_project['department'];?></td>
					<td class="center"><?=$get_project['school'];?></td>
					<td><?=$get_project['phone'];?></td>				
					<td><?=$get_project['year'];?></td>					
					<td class="center"><?=$get_project['creation_date'];?></td>
					<?php

						if($get_sta['status'] == 0){
                         	echo $load = " <td class='btn-danger'> No Price Setup </a>";
	                    }

	                    if($get_sta['status'] == 3){
                         	echo $load = " <td class='btn-info'> Price as been Setup </a>";
	                    }

	                    elseif ($get_sta['status'] == 2) {
	                       echo $load = "<td class='btn-warning'> Payment Made</td>";
	                    }

	                    elseif($get_sta['status'] == 1){
	                        echo $load = "<td class='btn-success'> Completed</td>";
	                    }
					?>
					<td>
						<a href="<?=base_url('');?>project_managements.php?complete=<?=$pid;?>" class="btn btn-success btn-sm btn-icon icon-left">
							<i class="entypo-check"></i>
							Mark project Complete
						</a>

					<!-- 	<a href="javascript:;" data-target="#modal-6" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});" class="btn btn-info btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							checker
						</a> -->
						<a href="javascript:;" data-target="#modal-6_<?=$pid;?>" onclick="jQuery('#modal-6_<?=$pid;?>').modal('show', {backdrop: 'static'});" class="btn btn-info btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Place Price for Project
						</a>
											
						
						<a href="<?=base_url('');?>project_managements.php?delete=<?=$pid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Delete this Project
						</a>
						
												
					</td>
				</tr>										
							
			</tbody>

 		<div class="modal fade" id="modal-6_<?=$pid;?>">
				 	<?php

					$queryload_com_msg = mysqli_query($connect, "SELECT * FROM project WHERE id = '$pid'") or die(mysqli_error($connect));
					while($get_complains_load=mysqli_fetch_assoc($queryload_com_msg)){									 
				
				?>

						<div class="modal-dialog">
							<div class="modal-content">
								
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Update updation</h4>
								</div>
								
								<div class="modal-body">
									
								<form method="POST" action="<?=base_url('project_managements.php?');?>Payment=<?=$pid;?>">
									<div class="row">
										<div class="col-md-6">
											
											<div class="form-group">
												<label for="field-1" class="control-label">Full Payment</label>
												
												<input type="text" required="" name="pay1" class="form-control" id="field-1" placeholder="Example @ 11000">
											</div>	
											
										</div>
										
										<div class="col-md-6">
											
											<div class="form-group">
												<label for="field-2" class="control-label">Half Payments</label>
												
												<input type="text" name="pay2" required="" class="form-control" id="field-2" placeholder=" Example @ 30000">
											</div>	
										
										</div>
									</div>				
									
									
								</div>
								
								<div class="modal-footer">
								
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" name="pay" value="price" class="btn btn-info">Submit Payments</button>

								</form>
								</div>
								<?php } ?> 
							</div>
						</div>
					</div>

				<?php 
					$cnt=$cnt+1;
				 }?>



		</table>
	
		
<br><br>		
							
	

      <!-- Imported styles on this page -->
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/datatables/datatables.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2.css">


	<!-- Imported scripts on this page -->
	<script src="<?=base_url('');?>assets/js/datatables/datatables.js"></script>
	<script src="<?=base_url('');?>assets/js/select2/select2.min.js"></script>
	<script src="<?=base_url('');?>assets/js/neon-chat.js"></script>

<?php require "inc/footer.php"?>
          
     
</div>