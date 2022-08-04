
			<!-- 	<div class="testimonials-w3">
					<div class="container">
					<h3 class="tittle2">Testimonials</h3>
						<div class="test-grid">
							<img src="images/quote.png" alt=/>
						<h5>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu 
						fugiat nulla pariatur.</h5>
						<p><i>Thomas Bishop</i></p>
						</div>
					</div>
				</div> -->
			<!--testimonials-->

<!-- carousal -->
	<script src="<?= base_url('js/slick.js');?>" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).on('ready', function() {
		  $(".center").slick({
			dots: true,
			infinite: true,
			centerMode: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			responsive: [
				{
				  breakpoint: 768,
				  settings: {
					arrows: true,
					centerMode: false,
					slidesToShow: 2
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '40px',
					slidesToShow: 1
				  }
				}
			 ]
		  });
		});
	</script>
<!-- //carousal -->

<div class="events-section">
		<div class="container">
			<div class="welcome-w3" style="margin-top: -60px;">
					<h3 class="tittle" style="color: #f15814;">OUR EVENTS</h3>
					<div class="heading-underline">
						<div class="h-u1" ></div> <div class="h-u2" ></div><div class="h-u3" style="color:#fff;"></div><div class="clearfix"></div>
					</div>
				</div>

				<?php
	        		$even_query = mysqli_query($connect, "SELECT * FROM event ORDER BY `event`.`eventtime` DESC LIMIT 3");
	        		while ($fetch_event = mysqli_fetch_assoc($even_query)) {
        			$event_id = $fetch_event['eventid'];
        			$event_topic = $fetch_event['event_topic'];
        			$event_message = $fetch_event['event_message'];
        			$short_event = $fetch_event['short_event'];
        			$event_image = embeddedImgevent($fetch_event['event_image']);
        			$posted_by = $fetch_event['post_by'];
        			$eventtime = $fetch_event['eventtime'];
        			// $id = $_GET['eventid'];
        			$date = strftime("%b - %d - %Y", strtotime($fetch_event['eventtime']));
        			// $date = strftime("JS F, Y", strtotime($fetch_event['eventtime']));
					$time = strftime("%I : %M : %S %p", strtotime($fetch_event['eventtime']));
	        		
	        	?>
				<div class="col-sm-4 live-grids-w3ls">
					<div class="live-left3" style="margin-bottom: -20px;">
						<?= $event_image; ?>
						<!-- <img src="" alt=" " class="img-responsive"> -->
					</div>
					<div class="live-info">
						<ul>
							<li><span class="fa fa-calendar-o" aria-hidden="true"></span><?= $date;?> || <?= $time;?></li>
						</ul>
						<h4><?= $event_topic;?></h4>
						<p ><?= $event_message;?> 
			            	<<!-- div class="read1">
								<a href="news.php?id=<?=$event_id;?>" class="view1 resw1" data-toggle="modal" data-target="#myModal01" style="color: #fff;">Read More<span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
							</div> -->

						</p>
					</div>
					
				</div>

			<?php } ?>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //Events -->





<!-- testimonials -->
	<div class="testimonials">
		<div class="container">
		<div class="welcome-w3" style="margin-top: -60px;">
					<h3 class="tittle">HEAR FROM OUR STUDENTS</h3>
					<div class="heading-underline">
						<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
					</div>
				</div>
			
			<div class="w3ls_testimonials_grids">
				 <section class="center slider">
				 		<?php
				 		$testimonies_query = mysqli_query($connect, "SELECT * FROM testimony  ORDER BY `testimony`.`datetime` DESC LIMIT 4");
				 			while ($fetch_testimony = mysqli_fetch_assoc($testimonies_query)) {
				 				$tphoto = embeddedImgtestimony($fetch_testimony['tphoto']);
								$comment = $fetch_testimony['comment'];
								$occupation = $fetch_testimony['occupation'];
								$customer_name = $fetch_testimony['customer_name'];
				 		?>
						<div class="agileits_testimonial_grid">
							<div class="w3l_testimonial_grid">
								<p><?= $comment;?></p>
								<h4><?= $customer_name;?></h4>
								<h5><?=$occupation;?></h5>
								<div class="w3l_testimonial_grid_pos">
									<?= $tphoto;?>
								</div>
							</div>
						</div>
						<?php } ?>
				</section>
			</div>
		</div>
	</div>
<!-- //testimonials -->




			<!--news-->
<div class="experience">
	<div class="container">
		<div class="welcome-w3" style="margin-top: -60px;">
					<h3 class="tittle">FREQUENTLY ASKED QUESTIONS</h3>
					<div class="heading-underline">
						<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
					</div>
				</div>
		<div class="experience-info">
			<div class="col-md-7 exp-matter">

				<?php
				$query_faq =  mysqli_query($connect, "SELECT * FROM faq LIMIT 4");				
				while($get_faq = mysqli_fetch_assoc($query_faq)){
					$question = $get_faq['question'];
					$answer = $get_faq['answer'];
					$date = strftime("%b - %d - %Y", strtotime($get_faq['creation_date']));
				
			?>
			
				<div class="exp-left">
					<div class="ex-lt">
						<h6><span><?=$date;?></span></h6>
					</div>
					<div class="ex-rt">
						<h5><?=$question;?></h5>
						<p style="color: #1e3953;"><?= $answer;?></p>
						<p>1 COMMENTS</p>
					</div>
					<div class="clearfix"></div>
				</div>

			<?php }?>
				

			</div>
			<div class="col-md-5 exp-info-right">
				<div class="ex-top">
					<h4>LEARNING FACILITIES</h4>
					<?php 
						$query_learn = mysqli_query($connect, "SELECT * FROM learning");
						while($get_lerning = mysqli_fetch_assoc($query_learn)){
							$post = $get_lerning['topic'];
					?>
					<li><span class="fa fa-check" aria-hidden="true"></span><?=$post;?></li>
					
				<?php }?>
				</div>

<br>
				
			<!-- </div>
 -->


			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>




			<!--news-->
		</div>
		



												

	




<!-- The Modal Calll -->
								          		<div class="modal fade" id="myModal01" tabindex="-1" role="dialog">
								          			<?php 	
														// $id = isset($_GET['id']) && $_GET['id'] =='$event_id';
														$query_get_event = mysqli_query($connect, "SELECT * FROM event WHERE eventid ='".$event_id."'") or die(mysqli_error($connect));
														while($fetch_get_event = mysqli_fetch_assoc($query_get_event)){
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

																		<span>
																			<p>						
																				<?= $event_message;?>
																			</p>
																		</span>
																		
																			<li class="odd ">
																				<h7>Posted by: <?= $posted_by;?></h7>
								            									<h6><?= $eventtime;?></h6>
								            								
																			</li>
																		
																	<!-- </div> -->																	
																</div>
															</div>
														</div>													
													</div>
													<?php }?>
												</div>
												<!-- The Modal call End -->
