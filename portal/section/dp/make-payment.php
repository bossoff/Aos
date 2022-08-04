<?php

if(isset($_POST['login']) && $_POST['login']=='ogins'){
	$er = false;
	date_default_timezone_set('Africa/Lagos');// change according timezone
	$currentTime = date( 'd-m-Y h:i:s A', time () );
	$email = $_SESSION['email'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower($_POST['email'])))))));
	$password = $_SESSION['password'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['password']))))))));
	function filter($email,$password){
		switch ($er == false){
			case '$email':
				$email = $_SESSION['email'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['email']))))))));
				break;

				case '$password':
				$password = $_SESSION['password'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['password']))))))));
				break;
			
			default:
				$email = $_SESSION['email'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['email']))))))));
				$password = $_SESSION['password'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['password']))))))));
				break;
		}
	}

	if(empty($email) || empty($password)){
		$er = true;
		$_SESSION['ermsg'] = "Sory this field can't be empty.";
		// exit();
	}else{

		$check_validate = mysqli_query($connect, sprintf("SELECT email, password FROM ceoadmin WHERE email = '$email' AND password = '$password'")) or die(mysqli_error($connect));
		if(empty($check_validate)){
			$er = true;
			$_SESSION['ermsg'] = "Please enter correct email and password!";
		}

		$check_validate1 = mysqli_query($connect, sprintf("SELECT email, password FROM ceoadmin WHERE email = '$email' AND password = '$password'")) or die(mysqli_error($connect));
		if($check_validate1){
			$er = true;
			$_SESSION['ermsg'] = "Please enter correct email and password!";
		}

        $password = md5(sha1($password)).sha1($password);
		$query_checkpoint = mysqli_query($connect, sprintf("SELECT email, password FROM ceoadmin WHERE email = '$email' AND password = '$password'")) or die(mysqli_error($connect));
		$checkpoint_num  = mysqli_num_rows($query_checkpoint);
		if($checkpoint_num>0){
			$get_admin_query = mysqli_query($connect, sprintf("SELECT * FROM ceoadmin WHERE email = '$email' AND password = '$password'")) or die(mysqli_error($connect));
			$admin_num = mysqli_num_rows($get_admin_query);
			if($admin_num>0){
				$er = true;	
				$ip_address= check_behind_proxy();
				$status=1;
				$get_admin = mysqli_fetch_assoc($get_admin_query);
				 $ad_email = $_SESSION['ad_email'] = $get_admin['email'];
				 $id = $_SESSION['ad_id'] = $get_admin['id'];
				$ad_password = $_SESSION['ad_password'] = $get_admin['password'];
				$_SESSION['firstname'] = $get_admin['firstname'];
				$_SESSION['lastname'] = $get_admin['lastname'];
				$_SESSION['name'] = $get_admin['name'];
				$_SESSION['avartar'] = $get_admin['avartar'];
				$admin = "Controller";
				setcookie("ad_id", $id, strtotime('+30 days'), "/","","", TRUE);
				setcookie("ad_email", $ad_email, strtotime('+30 days'), "/","","", TRUE);
				setcookie("ad_password", $ad_password, strtotime('+30 days'), "/","","", TRUE);
				$check_log = mysqli_query($connect, "SELECT email FROM memberslog WHERE email = '$ad_email' || uid = '$id' AND status = '$status' ")or die(mysqli_error($connect));
				$check_num = mysqli_num_rows($check_log);
				if($check_num == 0){
					 $logCONT = mysqli_query($connect, "INSERT INTO memberslog SET uid = '$id', email = '$ad_email', userip = '$ip_address', status = '$status', loginTime = '$currentTime'") or die(mysqli_error($connect));
					 if(!empty($logCONT)){
						header("LOCATION:".base_url("section/admin/home.php?".$admin."_rdir=Welcom&&Successful_'".base64_encode(active)."'Active_into/AOS=1_".$admin));
					}					
				}else{
					$logCONT1 = mysqli_query($connect, "UPDATE memberslog SET uid = '$id', email = '$ad_email', loginCount = loginCount+1, userip = '$ip_address',status = '$status', loginTime = '$currentTime' WHERE email = '$ad_email' AND uid = '$id'")or die(mysqli_error($connect));
					if(!empty($logCONT1)){
						header("LOCATION:".base_url("section/admin/home.php?".$admin."_rdir=Welcom&&Successful_'".base64_encode(active)."'Active_into/AOS=1_".$admin));
					}
				}
			}else{
				// $er = true;
				$_SESSION['ermsg'] = "Please enter correct email and password!";
			}
		}else{
			$query_checkpoint1 = mysqli_query($connect, sprintf("SELECT application_no, email, password FROM users WHERE application_no = '$email' || email = '$email' AND password = '$password'")) or die(mysqli_error($connect));
			$checkpoint_num1  = mysqli_num_rows($query_checkpoint1);

			if($checkpoint_num1>0){
				$get_users_query = mysqli_query($connect, sprintf("SELECT * FROM users WHERE application_no = '$email' AND email = '$email' AND password = '$password'")) or die(mysqli_error($connect));
				$users_num = mysqli_num_rows($get_users_query);
				if($users_num>0){
					$get_user = mysqli_fetch_assoc($get_users_query);
					$user_level = $get_user['user_level'];	
						$ip_address= check_behind_proxy();
						$status=2;
						$_SESSION['uid'] = $get_user['user_id'];
						$_SESSION['user_level'] = $get_user['user_level'];

								if($user_level == 'French'){
									 $acc = 'French';
								}
								elseif($user_level === 'Project'){
									 $acc = 'Project';
								}
								elseif($user_level == 'Tutorial'){
									 $acc = 'Tutorial';
								}

							
								header("LOCATION:".base_url("section/dp/home.php?".$acc."_rdir=Welcom&&Successful_'".base64_encode(active)."'Active_into/AOS=1_".$acc));
							


						// $check_log = mysqli_query($connect, "SELECT email FROM memberslog WHERE email = '".$get_user['email']."' || uid = '".$get_user['user_id']."' AND status = '$status' ")or die(mysqli_error($connect));
						// $check_num = mysqli_num_rows($check_log);

						// if($check_num == 0){							
						// 	 $logCONT = mysqli_query($connect, "INSERT INTO memberslog SET uid = '".$get_user['user_id']."', email = '".$get_user['email']."', userip = '$ip_address', status = '$status', loginTime = '$currentTime'") or die(mysqli_error($connect));
						// 	 if(!empty($logCONT)){
						// 		header("LOCATION:".base_url("section/dp/home.php?".$acc."_rdir=Welcom&&Successful_'".base64_encode(active)."'Active_into/AOS=1_".$acc));
						// 	}					
						// }else{
						// 	$logCONT1 = mysqli_query($connect, "UPDATE memberslog SET uid = '".$get_user['user_id']."', email = '".$get_user['email']."', loginCount = loginCount+1, userip = '$ip_address',status = '$status', loginTime = '$currentTime' WHERE email = '".$get_user['email']."' AND uid = '".$get_user['user_id']."'")or die(mysqli_error($connect));
						// 	if(!empty($logCONT1)){
						// 		header("LOCATION:".base_url("section/dp/home.php?".$acc."_rdir=Welcom&&Successful_'".base64_encode(active)."'Active_into/AOS=1_".$acc));
						// 	}
						// }

					}

				}else{
					$er = true;
					$_SESSION['ermsg'] = "Please enter correct email and password!";
				}
			}
			
		}
		
	
// print_r($get_admin);
}


?>


<title><?=TITLE1?></title>
<?php
require "inc/header.php";
?>
	
	<div class="login-form">
		
		<div class="login-content">
				
			<?php
				if(isset($_GET['rdir']) && $_GET['rdir'] =='Invalid'){?>
					<div class="errorspage">
						<h3>Invalid login</h3>
						<p>Please enter correct email and password!</p>
					</div>			
			<?php } ?>

			<?php
				if(isset($_SESSION['ermsg']) && $er == true){?>
					<div class="errorspage">
							<h3>Invalid login</h3>
						<p><?=$_SESSION['ermsg'];?></p>
					</div>			
			<?php } ?>

			<form role="form" id="form_login" action="<?=base_url('');?>" method="POST">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="email"  placeholder="Email OR Application Number" autocomplete="off" />
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
					<button type="submit" name="login" value="ogins" class="btn btn-primary btn-block btn-login">
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
	unset($_SESSION['ermsg']);
	// unset($_SESSION['errlogin']);
	?>