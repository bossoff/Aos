
<?php
require ('connection/function.php');
// require "library/photo.class.php";

	
	
if(isset($_POST['comment']) && $_POST['comment'] == 'Submit_Comment'){
	
		
			$error = false;
			$name = $_SESSION['name'] = mysqli_real_escape_string($connect,ucwords(strtoupper(htmlentities(trim(sanitize($_POST['name']))))));
		    $email = $_SESSION['email'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['email']))));
		    $comment1 = $_SESSION['comment1'] = mysqli_real_escape_string($connect, ucwords(htmlentities(trim(sanitize($_POST['comment1'])))));    
			
			// if (!empty($name)) {
			// 	if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			// 		$error = true;
			// 		$code = base64_encode('comment_live').sha1($code);
			// 		header("Location:" .base_url("loadblog.php?rdir=drop_comment_Set=error=1&lq").'_'.md5('Update_comment').'_'.$code.'/'."blog.php");
			// 			exit();
			// 		$namerr = 'Only letters and white space allowed';
			// 	}				
			// }

			// if (!empty($email)) {
			// 	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			// 	$error  = true;
			// 	$code = base64_encode('comment_live').sha1($code);
			// 	header("Location:" .base_url("loadblog.php?rdir=drop_comment_Set=error=2&lq").'_'.md5('Update_comment').'_'.$code.'/'."blog.php");
			// 		exit();
			// 	$emailrr = "Invalid Email address";
			// 	}
			// }

			// if (str_word_count($comment)<5) {
			// 	$err = true;
			// 	$code = base64_encode('comment_live').sha1($code);
			// 	header("Location:" .base_url("loadblog.php?rdir=drop_comment_Set=error=3&lq").'_'.md5('Update_comment').'_'.$code.'/'."blog.php");
				
			// 	$errmsg = "<span style='color:red;'>comment cannot contain words fewer than 5!</span>";
			// }


			
		if(isset($_GET['comments'])){
				$news_query = mysqli_query($connect, "SELECT * FROM update_news WHERE postid ='".$_GET['comments']."'");
			if(!empty($news_query)){
				$fetch_news = mysqli_fetch_assoc($news_query);
				$postnews_id = $fetch_news['postid'];
				if($error == false){
					$update_comment = mysqli_query($connect,"INSERT INTO comment SET user_name = '$name', post_id = '$postnews_id', user_email = '$email', comment = '$comment1' ")or die(mysqli_error($connect));
					if(!empty($update_comment)){
						header("Location:" .base_url("loadblog.php?a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c=$postnews_id").'_'.md5('Update_comment').'_'.$code.'/'."blog.php");
						exit();
					}
				}
			}
		}

		// echo "ptrocess";


	// if (str_word_count($comment)<5) {
	// 	$err = true;
	// 	$code = base64_encode('comment_live').sha1($code);
	// 	header("Location:" .base_url("loadblog.php?rdir=drop_comment_Set=error=3&lq").'_'.md5('Update_comment').'_'.$code.'/'."blog.php");
		
	// 	$errmsg = "<span style='color:red;'>comment cannot contain words fewer than 5!</span>";
	// }

	
}
if(isset($name)) echo $name;
if(isset($email)) echo $email;
if(isset($comment)) echo $comment;

?>