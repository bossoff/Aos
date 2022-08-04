
<?php
require ('connection/function.php');

require "inc/header.php";


?>

<link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" />


<title><?= TITLE4; ?></title>

		<div class="banner-w3agile">
			<div class="container">
				<h3><a href="<?=base_url("");?>">Home</a> / <span>Gallery</span></h3>
			</div>
		</div>
<!--Projects-->
		<div class="content">
			<div class="projects-agile">
				<div class="container">
					<!-- <h2 class="tittle">Our Projects</h2> -->


						<div class="portfolio_grid_w3lss">
							<?php
					$query = mysqli_query($connect, "SELECT * FROM gallery LIMIT 13");
						while($row = mysqli_fetch_assoc($query)){
						?>
							<div class="col-md-4 w3agile_Projects_grid">
								<div class="w3agile_Projects_image">
									<a class="sb" href="<?=base_url("");?><?=$row['image'];?>" title="<?=$row['content'];?>">
										<figure>
											<img src="<?=base_url("");?><?=$row['image'];?>" style="margin-bottom: 20%;" alt="" class="img-responsive"  />
											<figcaption>
												<h4><?=$row['title'];?></h4>
												<p>
													<?=$row['short'];?>
												</p>
											</figcaption>
										</figure>
									</a>
								</div>
							</div>
							
							<?php } ?>
							<div class="clearfix"> </div>
						</div>
						
					<script type="text/javascript" src="js/smoothbox.jquery2.js"></script>
				</div>
			</div>
		</div>
		<!--Projects-->
<?php 
require "inc/foot.php";

?>

				
</body>
</html>
