<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

?>	

<?php
	if(isset($_GET['approved'])){
	$approved = mysqli_real_escape_string($connect,$_GET['approved']);
		$er = false;
		$query_approve = mysqli_query($connect, "UPDATE complains SET Status = '1', waip = '1' WHERE id = '$approved'");
			if(!empty($query_approve)){
				
				$er = false;
				$succes = 'This complain as been Approved';
			}				
	}

	if(isset($_GET['delete'])){
		$delete = mysqli_real_escape_string($connect,$_GET['delete']);
		$D_query = mysqli_query($connect, "DELETE FROM complains WHERE id = '$delete'");
		if(!empty($D_query)){

				$er = true;
				$errmsg = 'This complain as been Deleted';
		}	
	}
?>	
<title><?=TITLE11;?></title>

 			<h3 style="">
            	<i class="entypo-right-circled"></i> 
                Students Complains       
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
					<th>Application No</th>
					<th>Subject</th>
					<th>Message</th>
					<th>Date</th>
					<th data-hide="phone,tablet">Status</th>
				</tr>
			</thead>
				<?php
					$fet_complains=mysqli_query($connect,"SELECT * FROM complains") or die(mysli_error($connect));
					$cnt=1;
					while($get_complains=mysqli_fetch_assoc($fet_complains)){				
					$cid = $get_complains['id'];
				?>
			<tbody>
				
				<tr class="odd gradeX">
					<td><?=$cnt;?></td>
					<td><?=$get_complains['application_no'];?></td>
					<td><?=$get_complains['subject'];?></td>
					<td class="center"><?=$get_complains['short_msg'];?></td>
					<td class="center"><?=$get_complains['posted_date'];?></td>
					<td>
						<a href="<?=base_url('');?>complains.php?approved=<?=$cid;?>" class="btn btn-success btn-sm btn-icon icon-left">
							<i class="entypo-check"></i>
							Approve
						</a>

						<a href="javascript:;" data-target="#modal-4_<?=$cid;?>" onclick="jQuery('#modal-4_<?=$cid;?>').modal('show', {backdrop: 'static'});" class="btn btn-info btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Read
						</a>
						
						<a href="<?=base_url('');?>complains.php?delete=<?=$cid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Delete
						</a>						
					</td>
				</tr>										
							
			</tbody>

			<div class="modal fade" id="modal-4_<?=$cid;?>" data-backdrop="static">
				<?php

					$queryload_com_msg = mysqli_query($connect, "SELECT * FROM complains WHERE id = '$cid'") or die(mysqli_error($connect));
					while($get_complains_load=mysqli_fetch_assoc($queryload_com_msg)){										 
				
				?>
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header">
							<h4 class="modal-title">Reading Complains</h4>
						</div>
						
						
						<div class="modal-body" style="border-bottom: 0 !important;">
							<div class="form-group">
                               <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" readonly value="<?php echo $get_complains_load['name'];?>"/>
                                </div>

                            </div>
                            <br><br>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" readonly value="<?php echo $get_complains_load['subject'];?>"/>
                                </div>
                            </div>

                            <br><br>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="col-md-9 tocify-content">								
										<p> <?php echo $get_complains_load['message'];?></p>
									</div>			
				
                                </div>
                            </div>

                            <br>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Continue</button>
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


		
							
		




<?php require "inc/footer.php"?>
          
          

</div>