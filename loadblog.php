

<link href="css/blog.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/single.css" rel="stylesheet" type="text/css" media="all" />


<?php
require ('connection/function.php');
// require "lib/call_all.php"; 
require "lib/get.php"; 

require "inc/header.php";


?>
<title><?= TITLE6; ?></title>




	<div class="services" style="margin: 2%;">
		<div class="container">
			<div class="col-md-8 single-left">
				<?php
				if(isset($_GET['a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c'])){
					$news_query = mysqli_query($connect, "SELECT * FROM update_news WHERE postid ='".$_GET['a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c']."'");

					if(!empty($news_query)){						
						$fetch_news = mysqli_fetch_assoc($news_query);
						$postnews_id = $fetch_news['postid'];
						$post_by = $fetch_news['user_level'];
						$n_title = $fetch_news['title'];
						$short_content = $fetch_news['short_content'];
						$content = $fetch_news['content'];
						$newsimage = $fetch_news['newsimage'];
						$news_date = $fetch_news['date'];
					}else{
						

					}																
				}							
				?>

					<?php
					require "lib/get.php"; 
						$comment_query = mysqli_query($connect, "SELECT * FROM comment WHERE post_id = '$postnews_id'");
						$comment_count = mysqli_num_rows($comment_query);
					?>

				<div class="single-left1">
					<img src="aosadmin/settings/upload_image/<?= $newsimage;?>" alt=" " class="img-responsive" />
					<h3><?=$n_title;?></h3>
					<ul>
						<li><span class="fa fa-user" aria-hidden="true"></span><a ><?=$post_by;?></a></li>
						<li><span class="fa fa-tag" aria-hidden="true"></span><a href="#"><?=$comment_count;?> Tags</a></li>
						<li><span class="fa fa-envelope-o" aria-hidden="true"></span><a href="#LiveComment"><?=$comment_count;?> Comments</a></li>
					</ul>
					<p><?=$content;?></p>
				</div>
				
				


				<!-- <div class="admin">
					<p>But I must explain to you how all this mistaken idea of denouncing 
						pleasure and praising pain was born and I will give you a complete 
						account of the system, and expound the actual teachings of the great 
						explorer of the truth, the master-builder of human happiness. 
						No one rejects, dislikes, or avoids pleasure itself.</p>
					<a href="#"><i>John Frank</i></a>
				</div> -->




				<div class="comments">
					<h3 id="LiveComment" style="color: #f15814">Our Recent Comments</h3>
					<div class="comments-grids">
						<?php 
							

							$comment_query = mysqli_query($connect, "SELECT * FROM comment WHERE post_id = '$postnews_id'");
								while($fetch_comment = mysqli_fetch_assoc($comment_query)){
									$comment_image = mysqli_query($connect,"SELECT * FROM avarta");
								$fetch_avarta = mysqli_fetch_assoc($comment_image);
								$comment_name = $fetch_comment['user_name'];
								$comments = $fetch_comment['comment'];
								$comment_date = strftime("%b - %d - %Y", strtotime($fetch_comment['date']));
								$comment_id = $fetch_comment['com_id'];
								$post_id_comment = $fetch_comment['post_id'];
								$comment_image = embeddedImgevent($fetch_avarta['avarta']);

							
						?>
						<div class="comments-grid">
							<div class="comments-grid-left">
								<?=$comment_image;?>
							</div>
							<div class="comments-grid-right">
								<h4><a ><?=$comment_name;?></a></h4>
								<ul>
									<li><?=$comment_date;?> <i>|</i></li>
									<li><a href="#">Reply</a></li>
								</ul>
								<p><?=$comments;?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php } ?>					

					</div>
				</div>




				<div class="leave-coment-form">
					<h3 >Leave Your Comment</h3>
					<form action="blog_pro.php?comments=<?=$postnews_id;?><?=sha1('loadblog').base64_encode('loadblog')?>lp&q/comments.php" method="POST">
						<input type="text" name="name" placeholder="Name" required="">
						<input type="email" name="email" placeholder="Email" required="">
						<textarea name="comment1" placeholder="Your comment here..." required=""></textarea>
						<div class="w3_single_submit">
							<input type="submit" name="comment" value="Submit_Comment" required="">
						</div>
					</form>
				</div>
			</div>




			<div class="col-md-4 event-right wthree-event-right">
				<div class="event-right1 agileinfo-event-right1">
					<!-- <div class="search1 agileits-search1">
						<form action="#" method="post">
							<input type="search" name="Search" placeholder="Search here..." required="">
							<input type="submit" value="Send">
						</form>
					</div> -->


					<!-- <div class="categories w3ls-categories">
						<h3>Categories</h3>
						<ul style="color: #f15814">
							<li style=""><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">At vero eos et accusamus iusto</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Sed ut perspiciatis unde omnis</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Accusantium doloremque lauda</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Vel illum qui dolorem fugiat quo</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Quis autem vel eum reprehenderit</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="single.html">Neque porro quisquam est qui</a></li>
						</ul>
					</div> -->


					<div class="posts w3l-posts">
						<h3>Our Events</h3>

						<div class="posts-grids w3-posts-grids">
							<?php
					        		$even_query = mysqli_query($connect, "SELECT * FROM event ORDER BY `event`.`eventtime` DESC LIMIT 9");
					        		while ($fetch_event = mysqli_fetch_assoc($even_query)) {
					        			$event_id = $fetch_event['eventid'];
					        			$event_topic = $fetch_event['event_topic'];
					        			$event_message = $fetch_event['event_message'];
					        			$short_event = $fetch_event['short_event'];
					        			$event_image = embeddedImgevent($fetch_event['event_image']);
					        			$posted_by = $fetch_event['post_by'];
					        			$eventtime = $fetch_event['eventtime'];
					        			// $id = $_GET['eventid'];
					        			$date = strftime("%b / %d / %Y", strtotime($fetch_event['eventtime']));
										$time = strftime("%I : %M : %S %p", strtotime($fetch_event['eventtime']));
					        		
					        	?>
							<div class="posts-grid w3-posts-grid">
								<div class="posts-grid-left w3-posts-grid-left">
									<a href="single.html"><?=$event_image;?></a>
								</div>

								<div class="posts-grid-right w3-posts-grid-right">
									<h4><a href="single.html"><?=$event_topic;?></a></h4>
									<ul class="wthree_blog_events_list">
										<li><i class="fa fa-calendar" aria-hidden="true"></i><?=$date;?></li>
										<li><i class="fa fa-user" aria-hidden="true"></i><a href="single.html"><?=$posted_by;?></a></li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php }?>					
						</div>
					</div>
					<!-- <div class="tags tags1 w3layouts-tags">
						<h3>Recent Tags</h3>
						<ul>
							<li><a href="single.html">Designs</a></li>
							<li><a href="single.html">Growth</a></li>
							<li><a href="single.html">Latest</a></li>
							<li><a href="single.html">Price</a></li>
							<li><a href="single.html">Tools</a></li>
							<li><a href="single.html">Agile</a></li>
							<li><a href="single.html">Category</a></li>
							<li><a href="single.html">Themes</a></li>
							<li><a href="single.html">Growth</a></li>
							<li><a href="single.html">Agile</a></li>
							<li><a href="single.html">Price</a></li>
							<li><a href="single.html">Tools</a></li>
							<li><a href="single.html">Business</a></li>
							<li><a href="single.html">Category</a></li>
						</ul>
					</div> -->
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->

	<?php 
require "inc/foot.php";

?>
</body>
</html>