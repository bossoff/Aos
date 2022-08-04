<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";


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
			<tbody>
				<?php
					$fet_complains=mysqli_query($connect,"SELECT * FROM complains") or die(mysli_error($connect));
					$cnt=1;
					while($get_complains=mysqli_fetch_assoc($fet_complains)){				
					$cid = $get_complains['id'];
				?>
				<tr class="odd gradeX">
					<td><?=$cnt;?></td>
					<td><?=$get_complains['application_no'];?></td>
					<td><?=$get_complains['subject'];?></td>
					<td class="center"><?=$get_complains['short_msg'];?></td>
					<td class="center"><?=$get_complains['posted_date'];?></td>
					<td>

						<?php
						if(isset($_GET['approved'])){
						$approved = mysqli_real_escape_string($connect,$_GET['approved']);
							$er = false;
							$query_approve = mysqli_query($connect, "UPDATE complains SET Status = '1' WHERE id = '$approved'");
								if(empty($query_approve)){
									$er = false;
									$succes = 'This complain as been Approved';
								}						
						}
						?>
						<a href="<?=base_url('');?>complains.php?approved=<?=$cid;?>" class="btn btn-success btn-sm btn-icon icon-left">
							<i class="entypo-check"></i>
							Approve
						</a>

						<a href="javascript:;" data-target="#modal-4_<?=$cid;?>" onclick="jQuery('#modal-4_<?=$cid;?>').modal('show', {backdrop: 'static'});" class="btn btn-info btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Read
						</a>
						
						<a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Delete
						</a>
						
						
					</td>
				</tr>

										<?php 

										$queryload_com_msg = mysqli_query($connect, "SELECT * FROM complains WHERE uid = '$cid'") or die(mysqli_error($connect));
										while($get_complains_load=mysqli_fetch_assoc($queryload_com_msg)){
											
											 
											
											// $get_complains_load['subject'];
											// $get_complains_load['application_no'];
										
										?>
						<!-- Modal 4 (Confirm)-->
						<div class="modal fade" id="modal-4_<?= $cid; ?>" data-backdrop="static">
							<div class="modal-dialog">
								<div class="modal-content">
									
									
									<div class="modal-header">
										<h4 class="modal-title">Reading Complains</h4>
									</div>
									
									<div class="modal-bod">									
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

		                                <br>
		                            </div>

		                                <div class="form-group">
		                                    <div class="col-sm-12">
		                                    	<p style="margin-top: 15px; color: #000; line-height: 23px;"><?= $get_complains_load['message'];?></p>
		                                         <hr>
		                                    </div>
		                                </div>


										
			

									<div class="modal-footer">
										<a type="button" href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
										<a href="<?= base_url('');?>reply.php?cid=<?=$cid;?>" class="btn btn-success">Reply</a>
									</div>
									
								</div>
							</div>
						</div>
						<?php } ?>
				<?php 
					$cnt=$cnt+1;
				 }?>			
			</tbody>
		</table>

		
	<script src="assets/js/jquery-1.11.3.min.js"></script>

	
<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>

<?php //require "inc/footer.php"?>
          
           
         <?php
            if (isset($er) && $er == false) { ?>
                <script>
                     var opts = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        
        toastr.success("<?=$succes;?>", "<?=$name;?>", opts);
                </script>
            <?php }?>


        <?php
            if (isset($er) && $er == true) { ?>
                <script>
             toastr.error('<?=$errmsg;?>');
        </script>
    <?php }?>

</div>


<style type="text/css">
	
#sub-footer1{
	border-top: 3px solid #f26522;
	background:#49872E;
	margin: 0px;
	padding: 20px;
}

#sub-footer1{
	text-shadow:none;
	padding:0;
	padding-top:20px;
}

.copyright {
	text-align:left;
	font-size:12px;
}	

	.row {
	margin-bottom:5px;
}





</style>

<footer class="main">
	<div id="sub-footer1" style="padding: 15px; margin-bottom: -25px;">
		
			<div class="row">
				<div class="col-lg-6 footer-grid">
					<div class="copyright" style="color: #fff; margin-top: 10px;">
						<p>  © 2016 - <?= date('Y');?> || <?=FOOTER;?></p>
					</div>
				</div>

			</div>

	</div>