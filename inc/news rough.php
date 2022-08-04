<div class="new-w3agile">
					<div class="container">
						<div class="new-grids">
							<div class="col-md-4 new-left">
								<h3 class="tittle1">Latest Events</h3>
								<div class="heading-underline">
									<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
								</div>
							

									<div id="homepage" >
								      <div class="fl_left">
								        <ul id="hpage_latestnews">
								        	<?php
								        		$even_query = mysqli_query($connect, "SELECT * FROM event ORDER BY `event`.`eventtime` DESC LIMIT 4");
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
							        			$date = strftime("JS F, Y", strtotime($fetch_event['eventtime']));
												$time = strftime("%I : %M : %S %p", strtotime($fetch_event['eventtime']));
								        		
								        	?>

								          <li class="odd new-top">
								            <div class="imgholder"><?= $event_image; ?></div>
								            <a style="text-decoration: none"><?= $event_topic;?></a>
								           
								            <p ><?= $short_event."...";?> 
								            	<div class="read1">
													<a href="news.php?id=<?=$event_id;?>" class="view1 resw1" data-toggle="modal" data-target="#myModal01" style="color: #fff;">Read More<span class="glyphicon glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
												</div>

											</p>
								            <h7>Update by: <?= $posted_by;?></h6>
								            <h6><?= $date;?> || <?= $time;?></h6>
								          </li>

								           
								          <?php } ?>							         
								         
								        </ul>
								      </div>
								  </div>


							</div>



							<div class="col-md-8 new-right">
								<h3 class="tittle1">Latest News</h3>
								<div class="heading-underline">
									<div class="h-u1"></div><div class="h-u2"></div><div class="h-u3"></div><div class="clearfix"></div>
								</div>
									<!-- <h4>Excepteur sint occaecat cupidatat non proident</h4>
									<p>Quisque at tellus ullamcorper, pharetra arcu a, suscipit purus. Nullam feugiat in augue in consequat. Sed ac dictum ligula, et pellentesque velit. In gravida eu felis sit amet molestie. Morbi sed ex ac enim finibus vulputate. Cras arcu magna, auctor ornare neque in, finibus tincidunt augue.</p> -->
								<div class="new-bottom">
									<?php
										$news_query = mysqli_query($connect, "SELECT * FROM update_news ORDER BY `update_news`.`date` DESC LIMIT 3");
										while($fetch_news = mysqli_fetch_assoc($news_query)){
											$postnews_id = $fetch_news['postid'];
											$post_by = $fetch_news['user_level'];
											$n_title = $fetch_news['title'];
											$short_content = $fetch_news['short_content'];
											$content = $fetch_news['content'];
											$newsimage = $fetch_news['newsimage'];
											$news_date = $fetch_news['date'];											
																
									?>
									<div class=" new-bottom-left"">
											<img src="aosadmin/settings/upload_image/<?= $newsimage;?>" class="img-responsive" alt="">
									</div>
										<div class="new-bottom-right">
										<h5><?= $n_title;?></h5>
										<p><?= $short_content.'...';?> <div class="read1">
						<a href="loadblog.php?a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c=<?=$postnews_id;?><?=sha1('loadblog').base64_encode('loadblog')?>lp&q/comments.php" class="view1 resw1">Read More</a>
					</div></p>
										</div>
										<div class="clearfix"></div>
									<?php } ?>
								</div>								
							</div>
								<!-- <div class="clearfix"></div> -->
						</div>
					</div>


				</div>
