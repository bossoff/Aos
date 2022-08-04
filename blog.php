<link href="css/style.css" rel='stylesheet' type='text/css' />

<?php
require ('connection/function.php');

require "inc/header.php";


?>
<title><?= TITLE6; ?></title>

		<div class="banner-w3agile">
			<div class="container">
				<h3><a href="index.php">Home</a> / <span>Blog</span></h3>
			</div>
		</div>
	
		<!-- main content start-->
		
			
							<div id="page-wrapper">
								<div class="inner-content">
									<!-- /blog -->
									
							  		<!-- /music-left -->
										<div class="music-left">

									<?php

										$news_query = mysqli_query($connect, "SELECT * FROM update_news ORDER BY `update_news`.`date` DESC LIMIT 4");
										while($fetch_news = mysqli_fetch_assoc($news_query)){
											$post_by = $fetch_news['user_level'];
											$postnews_id = $fetch_news['postid'];
											$n_title = $fetch_news['title'];
											$short_content = $fetch_news['short_content'];
											$content = $fetch_news['content'];
											$newsimage = $fetch_news['newsimage'];
											$news_date = $fetch_news['date'];
											$date = strftime("%b - %d - %Y", strtotime($fetch_news['date']));
											$time = strftime("%I : %M : %S %p", strtotime($fetch_news['date']));
															
									?>
											<div class="post-media second">	
											<?php $code ="";?>										
												  <a href="loadblog.php?a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c=<?=$postnews_id;?><?=sha1('loadblog').base64_encode('loadblog')?>lp&q/comments.php"> <img src="aosadmin/settings/upload_image/<?= $newsimage;?>" style="width: 100%; height: 50%;" class="img-responsive" alt=""></a>
												  <div class="blog-text">
														<a href="loadblog.php?a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c=<?=$postnews_id;?><?=sha1('loadblog').base64_encode('loadblog')?>lp&q/comments.php"><h3 class="h-t"><?= $n_title;?></h3></a>
												      <div class="entry-meta">
															<h6 class="blg"><i class="fa fa-clock-o"></i> <?=$date;?></h6>
															<div class="icons">
																<a ><i class="fa fa-user"></i> <?=$post_by;?></a>
																<a href="loadblog.php?a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c=<?=$postnews_id;?><?=sha1('loadblog').base64_encode('loadblog')?>lp&q/comments.php" id="LiveComment"><i class="fa fa-comments-o"></i>Comment</a>
																<a href="#"><i class="fa fa-thumbs-o-up"></i> 152</a>
																<a href="#"><i class="fa fa-thumbs-o-down"></i>  26</a>
															</div>
																<div class="clearfix"></div>
															<p><?=$short_content;?></p>
													  </div>
												  </div>
											</div>
										<?php } ?>	
											
											<!--start-blog-pagenate-->
												<div class="blog-pagenat">
													<ul>
														<li><a class="frist" href="#">Prev</a></li>
														<li><a href="#">1</a></li>
														<li><a href="#">2</a></li>
														<li><a href="#">3</a></li>
														<li><a href="#">4</a></li>
														<li><a href="#">5</a></li>
														<li><a class="last" href="#">Next</a></li>
														<div class="clearfix"> </div>
													</ul>
												</div>
												<!--//end-blog-pagenate-->

										</div>
										<!-- //music-left-->
										<!-- /music-right-->
										<div class="music-right">
											<!-- //widget -->
											  <div class="widget-side">
												<h4 class="widget-title">Recent Posts</h4>
													<ul>
														<?php
															$news_query = mysqli_query($connect, "SELECT * FROM update_news  ORDER BY `update_news`.`title` DESC LIMIT 10");
															while($fetch_news = mysqli_fetch_assoc($news_query)){
																$post_by = $fetch_news['user_level'];
																$postnews_id= $fetch_news['postid'];
																$n_title = $fetch_news['title'];
																// $short_content = $fetch_news['short_content'];
																// $content = $fetch_news['content'];
																$newsimage = $fetch_news['newsimage'];
																// $news_date = $fetch_news['date'];
																$date = strftime("%b - %d - %Y", strtotime($fetch_news['date']));
																// $time = strftime("%I : %M : %S %p", strtotime($fetch_news['date']));		
														?>
														<li>
															<div class="song-img">
															  <a href="loadblog.php?id=<?=$event_id;?>"><img src="aosadmin/settings/upload_image/<?= $newsimage;?>" class="img-responsive" alt=""></a>
															</div>
															<a href="loadblog.php?a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c=<?=$postnews_id;?><?=sha1('loadblog').base64_encode('loadblog')?>lp&q/comments.php" style="margin-left: 23%;"><?=$n_title;?></a>
															<span class="post-date" style="margin-left: 23%;"><?=$date;?></span>
														</li>
													<?php } ?>													
												</ul>
												 </div>



												 <div class="widget-side second">
												<h4 class="widget-title">Recent Event</h4>
													<ul>
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
														$time = strftime("%I : %M : %S %p", strtotime($fetch_event['eventtime']));
									        		
									        	?>
														<li>
															<div class="song-img">
															  <a href="loadblog.php?id=<?=$event_id;?>"><?= $event_image;?></a>
															</div>
															<div class="song-text">
																<a href="loadblog.php?id=<?=$event_id;?>"><?=$event_topic;?></a>
																<span class="post-date"><?=$date;?></span>
															</div>
															<div class="clearfix"></div>
														</li>
														<?php }?>
														
													</ul>
												 </div>
											  <!-- //widget -->
										</div>
										<div class="clearfix"></div>
									<!-- //blog -->
								</div>
							<div class="clearfix"></div>
						<!--body wrapper end-->
</div>
			 
   </section>
  
	<?php 
require "inc/foot.php";

?>
</body>
</html>