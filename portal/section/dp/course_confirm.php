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
				<h2><?=$surname;?></h2>
				<?php

					$check_active = mysqli_query($connect, "SELECT ok FROM reg_courses WHERE uid = '$uid'");
					$get_active = mysqli_fetch_assoc($check_active);
						if($get_active['ok']==1){
							echo "<p>Your 1st semester courses has been successfully Registered.</p>";
						}

						elseif($get_active['ok']==0){
							echo "<p>Your 2nd semester courses has been successfully Registered.</p>";
						}
				?>

                  <a href="register-ourse.php"><button cols="9" class="btn btn-success"> Check Registered courses</button></a>

				</div>
			</div>
			
			
			
		</div>
	</div>
<?php require "inc/footer.php"?>