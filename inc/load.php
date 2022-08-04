<div class="modal fade" id="myModal01" tabindex="-1" role="dialog">
	<?php 
	
		$id = isset($_GET['id']) && $_GET['id'] =='$event_id';
		$query_get_event = mysqli_query($connect,"SELECT * FROM event WHERE eventid ='".$_GET['id']."'") or die(mysqli_error($connect));
		$fetch_get_event = mysqli_fetch_assoc($query_get_event);
			$event_id1 = $fetch_get_event['eventid'];
			$event_topic = $fetch_get_event['event_topic'];
			$event_message = $fetch_get_event['event_message'];
			$short_event = $fetch_get_event['short_event'];
			$event_imageid = embeddedImgeventid($fetch_get_event['event_image']);
			$posted_by = $fetch_get_event['post_by'];
			$eventtime = $fetch_get_event['eventtime'];

	?>	 
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="agileinfo_sign"><?= $event_topic;?></h3>
					<?= $event_imageid; ?>
					<div class="signin-form profile">
						
						<!-- <div class="login-form"> -->																																		
							<span>
								<p>						
								<?= $event_message;?>
								</p>
							</span>
							
								<li class="odd ">
									<h7>Posted by: <?= $posted_by;?></h7>
									<h6><?= $eventtime;?></h6>
									<h6><?= $event_id1;?></h6>
								</li>
							
						<!-- </div> -->																	
					</div>
				</div>
			</div>													
		</div>
</div>