<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
?>

<title><?=TITLE15;?></title>



	<div class="main-content">
		<div class="page-error-404">	
			
			<div class="col-md-4 off-set-3">										
						<?php

							if($default_avartar == 0){

								echo '<img src="'.base_url('').'assets/images/profile.png" alt="" class="img-circle" width="150" height="150" style="border-radius: %;" />
									';									

							}else{
								echo '<img src="'.base_home('').''.$avartar.' " alt="" class="img-circle" width="150" height="150" style="border-radius: 10%;" />
									';									
							}

						?>				
			</div>
			
			<div class="error-text">
				<div>
				<h2>Hi! <?=$surname;?></h2>
				
					<p>SORRY: This Page can't access anymore dou to the late Registration</p>
					<p>Kindly contact the School Mangement</p>

                  <a href="complains.php"><button cols="9" class="btn btn-success"> Contact Management </button></a>

				</div>
			</div>
			
			
			
		</div>
	</div>
<?php require "inc/footer.php"?>