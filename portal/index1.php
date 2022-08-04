<?php
require "connection/function.php";

if(isset($_POST['log']) && $_POST['log']=='ogins' && $_POST['log']!=''){
	$er = false;
	$username = $_SESSION['username'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['username']))))))));
	$password = $_SESSION['password'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['password']))))))));
	function filter($username,$password){
		switch ($er == false){
			case '$username':
				$username = $_SESSION['username'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['username']))))))));
				break;

				case '$password':
				$password = $_SESSION['password'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['password']))))))));
				break;
			
			default:
				$username = $_SESSION['username'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['username']))))))));
				$password = $_SESSION['password'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['password']))))))));
				break;
		}
	}

	if(empty($username) || empty($password)){
		$er = true;
		$erempty = "Sory this field can't be empty.";
	}else{

	}

}
?>


<title><?=TITLE1?></title>
<?php
require "inc/header.php";
?>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Please enter correct email and password!</p>
			</div>

			<?php
				if(isset($erempty) && $er == true){?>
					<div class="form-login-error">
						<h3>Invalid login</h3>
						<p><?=$erempty;?></p>
					</div>			
			<?php } ?>
			
			
			<form method="post" role="form" id="form_login" action="<?=base_url('').'?rdir=loading';?>" method="POST">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="email" id="email" placeholder="Application Number or Phone Number" autocomplete="off" data-mask="email"/>
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" name="log" value="ogins" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Login In
					</button>
				</div>
				
				<!-- Implemented in v1.1.4 -->
				<div class="form-group">
					<em>- or -</em>
				</div>
				
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">
						Login with Facebook
						<i class="entypo-facebook"></i>
					</button>
					
				</div>		
				
			</form>
			
	<?php
	require "inc/footer.php";
	// require "inc/foot.php";
	?>