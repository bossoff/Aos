<?php require"inc/header.php";?>

<title><?=TITLE6;?></title>

	<section>
		<div class="block no-padding gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner2">
							<div class="inner-title2">
								<h3>Faq</h3>
								<span>Keep up to date with the latest news</span>
							</div>
							<div class="page-breacrumbs">
								<ul class="breadcrumbs">
									<li><a href="<?=base_url('');?>" title="">Home</a></li>
									<li><a href="#" title="">Pages</a></li>
									<li><a href="#" title="">Faq</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<section>
		<div class="block ">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="faqs">
							<?php
							$cnt =1;
								$query_faq = mysqli_query($connect, "SELECT * FROM faq");
								while($row = mysqli_fetch_assoc($query_faq)){
									
							?>
							<div class="faq-box">
								<div class="service">
										</div>
								<h2>(<?=$cnt;?>). <?=$row['question'];?>? <i class="la la-minus"></i></h2>
							
								<div class="contentbox">
									<p><?=$row['answer'];?></p>
								</div>
							</div>
							<?php  $cnt++;} ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php require"inc/footer.php";?>