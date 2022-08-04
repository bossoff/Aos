<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="assets/images/favicon.ico">

	<title>Neon | Forgot Password</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>
	
<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="index.html" class="logo">
				<img src="assets/images/logo@2x.png" width="120" alt="" />
			</a>
			
			<p class="description">Enter your email, and we will send the reset link.</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<form method="post" role="form" id="form_forgot_password">
				
				<div class="form-forgotpassword-success">
					<i class="entypo-check"></i>
					<h3>Reset email has been sent.</h3>
					<p>Please check your email, reset password link will expire in 24 hours.</p>
				</div>
				
				<div class="form-steps">
					
					<div class="step current" id="step-1">
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								
								<input type="text" class="form-control" name="email" id="email" placeholder="Email" data-mask="email" autocomplete="off" />
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-login">
								Complete Registration
								<i class="entypo-right-open-mini"></i>
							</button>
						</div>
					
					</div>
					
				</div>
				
			</form>
			
			
			<div class="login-bottom-links">
				
				<a href="extra-login.html" class="link">
					<i class="entypo-lock"></i>
					Return to Login Page
				</a>
				
				<br />
				
				<a href="#">ToS</a>  - <a href="#">Privacy Policy</a>
				
			</div>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/neon-forgotpassword.js"></script>
	<script src="assets/js/jquery.inputmask.bundle.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>























<?
if(isset($_POST['log']) && $_POST['log']=='ogins' && $_POST['log']!=''){
	$er = false;
	$resp = array();
	$email = $_SESSION['email'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['email']))))))));
	$password = $_SESSION['password'] = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['password']))))))));

 //Ajax login function 
    function ajax_login() {
        $response = array();

        //Recieving post input of email, password from ajax request
        $email = $_POST["email"];
        $password = $_POST["password"];
        $response['submit'] = $_POST;
        //Replying ajax request with validation response
        echo json_encode($response);
    }
    // ajax_login();
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
		$erempty = "Sory this field can't be empty.";
	}else{
		$get_admin = mysqli_query($connect, sprintf("SELECT * FROM ceoadmin WHERE email = '$email' || password = '$password'LIMIT 1"));
		if(!empty($get_admin)){
			$checkpoint_in = mysqli_query($connect, sprintf("SELECT email,password FROM ceoadmin WHERE email = '$email' AND password = '$password'"));
			$check_in_num = mysqli_num_rows($checkpoint_in);
			if($check_in_num <0){
				$er = true;
				// $login_status = 'invalid';
				$ermsg = "Please enter correct email and password!";
			}else{
				$get_admin_details = mysqli_fetch_assoc($checkpoint_in);
				// $ip_address= check_behind_proxy();
				$status=1;
				$get_admin_details = mysqli_fetch_assoc($query_con);
				$email_Sess= $_SESSION['ad_email'] = $get_admin_details['email'];
				$id = $_SESSION['id'] = $get_admin_details['id'];
				$password = $_SESSION['ad_password'] = $get_admin_details['password'];
				$admin = "Controller";
				$check_log = mysqli_query($connect, "SELECT username FROM memberslog WHERE username = '$email_Sess' || uid = '$id' AND status = '$status' ")or die(mysqli_error($connect));
				$check_num = mysqli_num_rows($check_log);
				if($check_num == 0){  
					 $logCONT = mysqli_query($connect, "INSERT INTO memberslog SET uid = '$id', username = '$email_Sess', userip = '$ip_address', status = '$status'") or die(mysqli_error($connect));
					 if(!empty($logCONT)){
						header("LOCATION:".base_url("section/admin/home.php?".$admin."_rdir=Welcom&&Successful_'".base64_encode(active)."'Active_into/AOS=1_".$admin));
					}					  
				}else{
					$logCONT1 = mysqli_query($connect, "UPDATE memberslog SET uid = '$id', username = '$email_Sess', loginCount = loginCount+1, userip = '$ip_address',status = '$status' WHERE username = '$email_Sess' AND uid = '$id'")or die(mysqli_error($connect));
					if(!empty($logCONT1)){
						header("LOCATION:".base_url("section/admin/home.php?".$admin."_rdir=Welcom&&Successful_'".base64_encode(active)."'Active_into/AOS=1_".$admin));
					}
				}
			}
		}

	}
$resp['login_status'] = $login_status;
// This array of data is returned for demo purpose, see assets/js/neon-forgotpassword.js
$resp['submitted_data'] = $_POST;
echo json_encode($resp);
}

