<!DOCTYPE HTML PUBLIC "aosacademy.com">
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="A.O.S Academy" />


	<link rel="stylesheet" href="<?=base_url("assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css");?> ">
	<link rel="stylesheet" href="<?=base_url("assets/css/font-icons/entypo/css/entypo.css");?>">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.css");?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/neon-theme.css");?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/neon-forms.css");?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/skins/green.css");?>">


	<script src="<?=base_url("assets/js/jquery-1.11.3.min.js");?>"></script>

	<link rel="icon" href="assets/images/favicon.jpg">

</head>
<body class="page-body login-page login-form-fall">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '<?php echo base_url('');?>';
    //Ajax login function 
    function ajax_login() {
        $response = array();

        //Recieving post input of email, password from ajax request
        $email = $_POST["email"];
        $password = $_POST["password"];
        $response['submitted_data'] = $_POST;

        //Validating login
        $login_status = $this->validate_login($email, $password);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = '';
        }

        //Replying ajax request with validation response
        echo json_encode($response);
    }
</script>



<div class="login-container">
	
	<div class="login-header login-caret" style="background: #fff">
		
		<div class="login-content">
			
				
				
			<a href="<?=base_home("");?>" class="logo">
				<img src="assets/images/aosacademy_logo.png" width="100" alt="aosacademy" style="margin-top: -37px; margin-bottom: 0spx;" />
				<h1 class="hero-title" style="color: #49872E; margin-bottom: 0px;">A.O.S Academy<sup>®</sup></h1>
					<p class="description" style="margin: 0 auto;color: #f15814;">The No. 1 Language and Linguistics Institute...</p>
			</a>
					

			<!-- <p >Dear user, log in to access the admin area!</p> -->
			<!-- </div>	 -->
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
	


