<?php
define("_function", "../connection/");
require (_function."function.php");
require "../lib/gallery.php";
require "../lib/user_checker.php";
  require ("../library/photo.class.php");


// Logo Validaion

if(isset($_POST['LOGO']) && $_POST['LOGO'] == 'Header'){
	$error=false;
	$thelogodata = "";//initial photo data value is empty


  	//now, process attached photo
	  if (isset($_FILES["logo"]) && !empty($_FILES["logo"]['name'])){
	    $max_upload_size = 200;//in KB
	    $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
	    //define allowed file extensions
	    $allowedExts = array("jpg", "jpeg", "png", "jpe");
	    //get the extension of the uploaded file
	    $extension = explode(".", $_FILES["logo"]["name"]);
	    $extension = end($extension);
	    //get the dimension of the uploaded file if necessary //it stores array values
	    $photodimension = getimagesize($_FILES["logo"]["tmp_name"]);
	    $photowidth = $photodimension[0];
	    $photoheight = $photodimension[1];
	    //$ImageType = $_FILES["logo"]["type"];

	    //validate image
	    if ((isset($_FILES["logo"]) && !empty($_FILES["logo"]['name'])) && (($_FILES["logo"]["type"] == "image/png") || ($_FILES["logo"]["type"] == "image/jpeg") || ($_FILES["logo"]["type"] == "image/pjpeg"))  && ($_FILES["logo"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
	    {
	      // if($max_upload_size > 200){
	      //   $error = true;
	      //   $ermsg = "Sorry only passport is allow";
	      // }
	      if($_FILES["logo"]["error"] > 0){
	        $error = true;
	        $ermsg = "Error: " . $_FILES["logo"]["error"];
	      }else{
	        //now convert image to base64
	        //the class and methods are loaded from the included photo.class.php file
	        if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] <= 0) {
	          $file_tmp_name = $_FILES["logo"]["tmp_name"];
	          $file_name = $_FILES["logo"]["name"];    
	          $photo = new Photo($file_tmp_name);
	          $photo->scaleToMaxSide(331);
	          $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
	          $thelogodata = $addr['photo'];
	          //photo is ready to be stored in the database
	          //the photo text data, $addr['photo'] should be stored in a medium text field in the database
	          }
	      }

	    }else{
	      //error has sele
	      $error = true;
	      if(!in_array($extension, $allowedExts)){
	        //if the extension is not in the specified array of extensions
	        $ermsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
	      }
	      elseif($photowidth > $photoheight){
	        //this is an optional
	        $ermsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
	      }
	      elseif($_FILES["logo"]["size"] > $max_upload_size){
	        //if the size is greater than specified max size
	        $ermsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
	      }
	      else{
	        $ermsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
	      }
	    }
	}

	if($error==false){
		$logo_query = mysqli_query($connect,"UPDATE logo SET  logo = '$thelogodata'") or die(mysqli_error($connect));
		if ($logo_query>0){
			$error = true;
			$successmsg = 'logo was succesfully uploaded.';
			$code = base64_encode('logo_upload').sha1($code);
			 header("Location:" .base_url1("settings/slider.php?rdir=logo_upload&lq=").$code);
			
		}else{
			$error = true;
			$ermsg = "Errro";
			 header("Location:" .base_url1("settings/slider.php?rdir=logo_uploaderror&lq=").$code);
		}
	}
}

?>


<!-- Slider Updating body -->
<?php
if(isset($_POST['slider']) && $_POST['slider'] == 'Post_Slider'){
	$error = false;
	$title1 = $_SESSION['title1'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['title1'])))));
	$decription1 = $_SESSION['decription1'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['decription1']))))));
	$title2 = $_SESSION['title2']= mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['title2'])))));
	$decription2 = $_SESSION['decription2'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['decription2']))))));
	$title3 = $_SESSION['title3'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['title3'])))));
	$decription3 = $_SESSION['decription3'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['decription3']))))));

	if(empty($title1) && empty($title3) && empty(($title2) && empty($decription1) && empty($decription2) && empty($decription3))){
		$error  = true;
		$code = base64_encode('Slider_Upload').sha1($code);
		header("Location:" .base_url1("settings/slider.php?rdir=Slider_Uploadem&lq").$code.'/'."slider.php");
	}else{

			$theslider1data = "";//initial photo data value is empty


	  	//now, process attached photo
		  if (isset($_FILES["slider1"]) && !empty($_FILES["slider1"]['name'])){
		    $max_upload_size = 200;//in KB
		    $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
		    //define allowed file extensions
		    $allowedExts = array("jpg", "jpeg", "png", "jpe");
		    //get the extension of the uploaded file
		    $extension = explode(".", $_FILES["slider1"]["name"]);
		    $extension = end($extension);
		    //get the dimension of the uploaded file if necessary //it stores array values
		    $photodimension = getimagesize($_FILES["slider1"]["tmp_name"]);
		    $photowidth = $photodimension[0];
		    $photoheight = $photodimension[1];
		    //$ImageType = $_FILES["slider1"]["type"];

		    //validate image
		    if ((isset($_FILES["slider1"]) && !empty($_FILES["slider1"]['name'])) && (($_FILES["slider1"]["type"] == "image/png") || ($_FILES["slider1"]["type"] == "image/jpeg") || ($_FILES["slider1"]["type"] == "image/pjpeg"))  && ($_FILES["slider1"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
		    {
		      // if($max_upload_size > 200){
		      //   $error = true;
		      //   $ermsg = "Sorry only passport is allow";
		      // }
		      if($_FILES["slider1"]["error"] > 0){
		        $error = true;
		        $ermsg = "Error: " . $_FILES["slider1"]["error"];
		      }else{
		        //now convert image to base64
		        //the class and methods are loaded from the included photo.class.php file
		        if (isset($_FILES["slider1"]) && $_FILES["slider1"]["error"] <= 0) {
		          $file_tmp_name = $_FILES["slider1"]["tmp_name"];
		          $file_name = $_FILES["slider1"]["name"];    
		          $photo = new Photo($file_tmp_name);
		          $photo->scaleToMaxSide(331);
		          $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
		          $theslider1data = $addr['photo'];
		          //photo is ready to be stored in the database
		          //the photo text data, $addr['photo'] should be stored in a medium text field in the database
		          }
		      }

		    }else{
		      //error has sele
		      $error = true;
		      if(!in_array($extension, $allowedExts)){
		        //if the extension is not in the specified array of extensions
		        $ermsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
		      }
		      elseif($photowidth > $photoheight){
		        //this is an optional
		        $ermsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
		      }
		      elseif($_FILES["slider1"]["size"] > $max_upload_size){
		        //if the size is greater than specified max size
		        $ermsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
		      }
		      else{
		        $ermsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
		      }
		    }
		}




		$theslider2data = "";//initial photo data value is empty


	  	//now, process attached photo
		  if (isset($_FILES["slider2"]) && !empty($_FILES["slider2"]['name'])){
		    $max_upload_size = 200;//in KB
		    $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
		    //define allowed file extensions
		    $allowedExts = array("jpg", "jpeg", "png", "jpe");
		    //get the extension of the uploaded file
		    $extension = explode(".", $_FILES["slider2"]["name"]);
		    $extension = end($extension);
		    //get the dimension of the uploaded file if necessary //it stores array values
		    $photodimension = getimagesize($_FILES["slider2"]["tmp_name"]);
		    $photowidth = $photodimension[0];
		    $photoheight = $photodimension[1];
		    //$ImageType = $_FILES["slider2"]["type"];

		    //validate image
		    if ((isset($_FILES["slider2"]) && !empty($_FILES["slider2"]['name'])) && (($_FILES["slider2"]["type"] == "image/png") || ($_FILES["slider2"]["type"] == "image/jpeg") || ($_FILES["slider2"]["type"] == "image/pjpeg"))  && ($_FILES["slider2"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
		    {
		      // if($max_upload_size > 200){
		      //   $error = true;
		      //   $ermsg = "Sorry only passport is allow";
		      // }
		      if($_FILES["slider2"]["error"] > 0){
		        $error = true;
		        $ermsg = "Error: " . $_FILES["slider2"]["error"];
		      }else{
		        //now convert image to base64
		        //the class and methods are loaded from the included photo.class.php file
		        if (isset($_FILES["slider2"]) && $_FILES["slider2"]["error"] <= 0) {
		          $file_tmp_name = $_FILES["slider2"]["tmp_name"];
		          $file_name = $_FILES["slider2"]["name"];    
		          $photo = new Photo($file_tmp_name);
		          $photo->scaleToMaxSide(331);
		          $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
		          $theslider2data = $addr['photo'];
		          //photo is ready to be stored in the database
		          //the photo text data, $addr['photo'] should be stored in a medium text field in the database
		          }
		      }

		    }else{
		      //error has sele
		      $error = true;
		      if(!in_array($extension, $allowedExts)){
		        //if the extension is not in the specified array of extensions
		        $ermsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
		      }
		      elseif($photowidth > $photoheight){
		        //this is an optional
		        $ermsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
		      }
		      elseif($_FILES["slider2"]["size"] > $max_upload_size){
		        //if the size is greater than specified max size
		        $ermsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
		      }
		      else{
		        $ermsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
		      }
		    }
		}





		$theslider3data = "";//initial photo data value is empty


	  	//now, process attached photo
		  if (isset($_FILES["slider3"]) && !empty($_FILES["slider3"]['name'])){
		    $max_upload_size = 200;//in KB
		    $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
		    //define allowed file extensions
		    $allowedExts = array("jpg", "jpeg", "png", "jpe");
		    //get the extension of the uploaded file
		    $extension = explode(".", $_FILES["slider3"]["name"]);
		    $extension = end($extension);
		    //get the dimension of the uploaded file if necessary //it stores array values
		    $photodimension = getimagesize($_FILES["slider3"]["tmp_name"]);
		    $photowidth = $photodimension[0];
		    $photoheight = $photodimension[1];
		    //$ImageType = $_FILES["slider3"]["type"];

		    //validate image
		    if ((isset($_FILES["slider3"]) && !empty($_FILES["slider3"]['name'])) && (($_FILES["slider3"]["type"] == "image/png") || ($_FILES["slider3"]["type"] == "image/jpeg") || ($_FILES["slider3"]["type"] == "image/pjpeg"))  && ($_FILES["slider3"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
		    {
		      // if($max_upload_size > 200){
		      //   $error = true;
		      //   $ermsg = "Sorry only passport is allow";
		      // }
		      if($_FILES["slider3"]["error"] > 0){
		        $error = true;
		        $ermsg = "Error: " . $_FILES["slider3"]["error"];
		      }else{
		        //now convert image to base64
		        //the class and methods are loaded from the included photo.class.php file
		        if (isset($_FILES["slider3"]) && $_FILES["slider3"]["error"] <= 0) {
		          $file_tmp_name = $_FILES["slider3"]["tmp_name"];
		          $file_name = $_FILES["slider3"]["name"];    
		          $photo = new Photo($file_tmp_name);
		          $photo->scaleToMaxSide(331);
		          $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
		          $theslider3data = $addr['photo'];
		          //photo is ready to be stored in the database
		          //the photo text data, $addr['photo'] should be stored in a medium text field in the database
		          }
		      }

		    }else{
		      //error has sele
		      $error = true;
		      if(!in_array($extension, $allowedExts)){
		        //if the extension is not in the specified array of extensions
		        $ermsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
		      }
		      elseif($photowidth > $photoheight){
		        //this is an optional
		        $ermsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
		      }
		      elseif($_FILES["slider3"]["size"] > $max_upload_size){
		        //if the size is greater than specified max size
		        $ermsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
		      }
		      else{
		        $ermsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
		      }
		    }
		}

		if($error==false){
			// $slider_query = mysqli_query($connect, "INSERT INTO slider (title1, title2, title3, decription1, decription2, decription3, image1, image2, image3) VALUES ('$title1', '$title2', '$title3', '$decription1', '$decription2', '$decription3','$theslider1data', '$theslider2data' '$theslider3data')") or die(mysqli_error($connect));
			// if($slider_query >0){
			// 	echo "The Slider is succefully install.";
			// }


			$slider_query = mysqli_query($connect, "UPDATE slider SET title1 = '$title1', title2 = '$title2', title3 = '$title3', decription1 = '$decription1', decription2 = '$decription2', decription3 = '$decription3', image1 = '$theslider1data', image2 = '$theslider2data', image3 = '$theslider3data'") or die(mysqli_error($connect));
			if($slider_query >=0){
				$error = true;
				$code = base64_encode('Slider_Upload').sha1($code);
				 header("Location:" .base_url1("settings/slider.php?rdir=Slider_Upload&lq=").$code."slider.php");
			}else{
				$error = true;
				$ermsg = "Opps Network Problem or Contact your Wapmaster";
				 header("Location:" .base_url1("settings/slider.php?rdir=Slider_Uploaderror&lq").$code."slider.php");

			}
			
		}

	}

	

}

?>



<!-- Testimonies Update -->
<?php
if(isset($_POST['Testimony']) && $_POST['Testimony'] == 'Set_Testimonies'){
	$error = false;
	$comment = $_SESSION['comment'] = mysqli_real_escape_string($connect,ucwords(htmlentities(trim(sanitize($_POST['comment'])))));
	$customer_name = $_SESSION['customer_name'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['customer_name']))))));
	$occupation = $_SESSION['occupation'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['occupation']))))));
	
	if(empty($comment) && empty($customer_name) && empty($occupation)){
		$error = true;
		$code = base64_encode('Update_Letterer').sha1($code);
		header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Lettererm&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
	}else{

		$theTestimonidata = "";//initial photo data value is empty

		//now, process attached photo
	  if (isset($_FILES["tphoto"]) && !empty($_FILES["tphoto"]['name'])){
	    $max_upload_size = 200;//in KB
	    $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
	    //define allowed file extensions
	    $allowedExts = array("jpg", "jpeg", "png", "jpe");
	    //get the extension of the uploaded file
	    $extension = explode(".", $_FILES["tphoto"]["name"]);
	    $extension = end($extension);
	    //get the dimension of the uploaded file if necessary //it stores array values
	    $photodimension = getimagesize($_FILES["tphoto"]["tmp_name"]);
	    $photowidth = $photodimension[0];
	    $photoheight = $photodimension[1];
	    //$ImageType = $_FILES["tphoto"]["type"];

	    //validate image
	    if ((isset($_FILES["tphoto"]) && !empty($_FILES["tphoto"]['name'])) && (($_FILES["tphoto"]["type"] == "image/png") || ($_FILES["tphoto"]["type"] == "image/jpeg") || ($_FILES["tphoto"]["type"] == "image/pjpeg"))  && ($_FILES["tphoto"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
	    {
	      // if($max_upload_size > 200){
	      //   $error = true;
	      //   $ermsg = "Sorry only passport is allow";
	      // }
	      if($_FILES["tphoto"]["error"] > 0){
	        $error = true;
	        $ermsg = "Error: " . $_FILES["tphoto"]["error"];
	      }else{
	        //now convert image to base64
	        //the class and methods are loaded from the included photo.class.php file
	        if (isset($_FILES["tphoto"]) && $_FILES["tphoto"]["error"] <= 0) {
	          $file_tmp_name = $_FILES["tphoto"]["tmp_name"];
	          $file_name = $_FILES["tphoto"]["name"];    
	          $photo = new Photo($file_tmp_name);
	          $photo->scaleToMaxSide(331);
	          $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
	          $theTestimonidata = $addr['photo'];
	          //photo is ready to be stored in the database
	          //the photo text data, $addr['photo'] should be stored in a medium text field in the database
	          }
	      }

	    }else{
	      //error has sele
	      $error = true;
	      if(!in_array($extension, $allowedExts)){
	        //if the extension is not in the specified array of extensions
	        $ermsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
	      }
	      elseif($photowidth > $photoheight){
	        //this is an optional
	        $ermsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
	      }
	      elseif($_FILES["tphoto"]["size"] > $max_upload_size){
	        //if the size is greater than specified max size
	        $ermsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
	      }
	      else{
	        $ermsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
	        $error = true;
			$code = base64_encode('Update_Letterer').sha1($code);
			header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letterer&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
	      }
	    }
	}


	

		if($error == false){
			$testimony_query = mysqli_query($connect, "INSERT INTO testimony (tphoto,comment,customer_name,occupation) VALUES ('$theTestimonidata', '$comment', '$customer_name', '$occupation')");
			if(!empty($testimony_query)){
				$error = true;
				$successmsg = "Testimonies Updated succefully.";
				$code = base64_encode('Update_Letter').sha1($code);
				header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
				exit();
			}else{
				$error = true;
				$ermsg = "Opps Network Problem or Contact your Wapmaster";
			}
		}else{
			$error = true;
			$ermsg = "Opps Network Problem or Contact your Wapmaster";
		}

	}


  	
}else{
		$error = true;
		$ermsg = "Opps Network Problem or Contact your Wapmaster";
	}

?>



<!-- News Update -->
<?php

if(isset($_POST['news_post']) && $_POST['news_post'] == 'Set_News'){
	$error = false;
	$theupdatenewsdata = "";//initial photo data value is empty


  	//now, process attached photo
	  if (isset($_FILES["newsimage"]) && !empty($_FILES["newsimage"]['name'])){
	    $max_upload_size = 200;//in KB
	    $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
	    //define allowed file extensions
	    $allowedExts = array("jpg", "jpeg", "png", "jpe");
	    //get the extension of the uploaded file
	    $extension = explode(".", $_FILES["newsimage"]["name"]);
	    $extension = end($extension);
	    //get the dimension of the uploaded file if necessary //it stores array values
	    $photodimension = getimagesize($_FILES["newsimage"]["tmp_name"]);
	    $photowidth = $photodimension[0];
	    $photoheight = $photodimension[1];
	    //$ImageType = $_FILES["newsimage"]["type"];

	    //validate image
	    if ((isset($_FILES["newsimage"]) && !empty($_FILES["newsimage"]['name'])) && (($_FILES["newsimage"]["type"] == "image/png") || ($_FILES["newsimage"]["type"] == "image/jpeg") || ($_FILES["newsimage"]["type"] == "image/pjpeg"))  && ($_FILES["newsimage"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
	    {
	      // if($max_upload_size > 200){
	      //   $error = true;
	      //   $ermsg = "Sorry only passport is allow";
	      // }
	      if($_FILES["newsimage"]["error"] > 0){
	        $error = true;
	        $ermsg = "Error: " . $_FILES["newsimage"]["error"];
	      }else{
	        //now convert image to base64
	        //the class and methods are loaded from the included photo.class.php file
	        if (isset($_FILES["newsimage"]) && $_FILES["newsimage"]["error"] <= 0) {
	          $file_tmp_name = $_FILES["newsimage"]["tmp_name"];
	          $file_name = $_FILES["newsimage"]["name"];    
	          $photo = new Photo($file_tmp_name);
	          $photo->scaleToMaxSide(331);
	          $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
	          $theupdatenewsdata = $addr['photo'];
	          //photo is ready to be stored in the database
	          //the photo text data, $addr['photo'] should be stored in a medium text field in the database
	          }
	      }

	    }else{
	      //error has sele
	      $error = true;
	      if(!in_array($extension, $allowedExts)){
	        //if the extension is not in the specified array of extensions
	        $ermsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
	      }
	      elseif($photowidth > $photoheight){
	        //this is an optional
	        $ermsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
	      }
	      elseif($_FILES["newsimage"]["size"] > $max_upload_size){
	        //if the size is greater than specified max size
	        $ermsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
	      }
	      else{
	        $ermsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
	      }
	    }
	}


	$ntitle = $_SESSION['ntitle'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['ntitle'])))));
	$ncontent = $_SESSION['ncontent'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['ncontent']))));

	if($error == false){
		$news_query = mysqli_query($connect,"INSERT INTO update_news SET user_level = '$user_logins', title = '$ntitle', short_content = '$ncontent', content = '$ncontent', newsimage = '$theupdatenewsdata'") or die(mysqli_error($connect));
		if(!empty($news_query)){
			$error = true;
			$successmsg = "The News Is Been Published.";
			exit();

		}else{
			$error = true;
			$ermsg = "Opps Network Problem or Contact your Wapmaster";
		}
	}else{
		$error = true;
		$ermsg = "Opps Network Problem or Contact your Wapmaster";
	}
		
}else{
		$error = true;
		$ermsg = "Opps Network Problem or Contact your Wapmaster";
	}

?>



<?php
if(isset($_POST['EVENT']) && $_POST['EVENT'] == 'Set_EVENT'){
	$error = false;
	$event_topic = $_SESSION['event_topic'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['event_topic'])))));
	$event_massage = $_SESSION['event_massage'] = mysqli_real_escape_string($connect, ucwords(htmlentities(trim(sanitize($_POST['event_massage'])))));

	$theEvenupdatedata = "";//initial photo data value is empty


  	//now, process attached photo
	  if (isset($_FILES["even_image"]) && !empty($_FILES["even_image"]['name'])){
	    $max_upload_size = 200;//in KB
	    $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
	    //define allowed file extensions
	    $allowedExts = array("jpg", "jpeg", "png", "jpe");
	    //get the extension of the uploaded file
	    $extension = explode(".", $_FILES["even_image"]["name"]);
	    $extension = end($extension);
	    //get the dimension of the uploaded file if necessary //it stores array values
	    $photodimension = getimagesize($_FILES["even_image"]["tmp_name"]);
	    $photowidth = $photodimension[0];
	    $photoheight = $photodimension[1];
	    //$ImageType = $_FILES["even_image"]["type"];

	    //validate image
	    if ((isset($_FILES["even_image"]) && !empty($_FILES["even_image"]['name'])) && (($_FILES["even_image"]["type"] == "image/png") || ($_FILES["even_image"]["type"] == "image/jpeg") || ($_FILES["even_image"]["type"] == "image/pjpeg"))  && ($_FILES["even_image"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
	    {
	      // if($max_upload_size > 200){
	      //   $error = true;
	      //   $ermsg = "Sorry only passport is allow";
	      // }
	      if($_FILES["even_image"]["error"] > 0){
	        $error = true;
	        $ermsg = "Error: " . $_FILES["even_image"]["error"];
	      }else{
	        //now convert image to base64
	        //the class and methods are loaded from the included photo.class.php file
	        if (isset($_FILES["even_image"]) && $_FILES["even_image"]["error"] <= 0) {
	          $file_tmp_name = $_FILES["even_image"]["tmp_name"];
	          $file_name = $_FILES["even_image"]["name"];    
	          $photo = new Photo($file_tmp_name);
	          $photo->scaleToMaxSide(331);
	          $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
	          $theEvenupdatedata = $addr['photo'];
	          //photo is ready to be stored in the database
	          //the photo text data, $addr['photo'] should be stored in a medium text field in the database
	          }
	      }

	    }else{
	      //error has sele
	      $error = true;
	      if(!in_array($extension, $allowedExts)){
	        //if the extension is not in the specified array of extensions
	        $ermsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
	      }
	      elseif($photowidth > $photoheight){
	        //this is an optional
	        $ermsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
	      }
	      elseif($_FILES["even_image"]["size"] > $max_upload_size){
	        //if the size is greater than specified max size
	        $ermsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
	      }
	      else{
	        $ermsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
	      }
	    }
	}

	if($error == false){
		$evnt_insert = "INSERT INTO `event` (event_topic, event_message, short_event, event_image, post_by) VALUES ('$event_topic', '$event_massage', '$event_massage','$theEvenupdatedata', '$user_levels')";
		$event_query = mysqli_query($connect, $evnt_insert) or die(mysqli_error($connect));
		if(!empty($event_query)){
			$error = true;
				$successmsg =  "The Event is Been Poblished.";
				exit();
		}else{
			$error = true;
			$ermsg = "Opps Network Problem or Contact your Wapmaster";
		}
	}else{
		$error = true;
		$ermsg = "Opps Network Problem or Contact your Wapmaster";
	}
}else{
		$error = true;
		$ermsg = "Opps Network Problem or Contact your Wapmaster";
	}

?>

<!-- Our Students -->

<?php
if(isset($_POST['Our_student']) && $_POST['Our_student'] == 'Set_Student'){
	$error = true;
	$s_topic = $_SESSION['s_topic'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['s_topic'])))));
	$s_content = $_SESSION['s_content'] = mysqli_real_escape_string($connect, ucwords(htmlentities(trim(sanitize($_POST['s_content'])))));

	$theupdateourstudent = "";//initial photo data value is empty

  	//now, process attached photo
	 if (isset($_FILES["s_image"]) && !empty($_FILES["s_image"]['name'])){
	    $max_upload_size = 200;//in KB
	    $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
	    //define allowed file extensions
	    $allowedExts = array("jpg", "jpeg", "png", "jpe");
	    //get the extension of the uploaded file
	    $extension = explode(".", $_FILES["s_image"]["name"]);
	    $extension = end($extension);
	    //get the dimension of the uploaded file if necessary //it stores array values
	    $photodimension = getimagesize($_FILES["s_image"]["tmp_name"]);
	    $photowidth = $photodimension[0];
	    $photoheight = $photodimension[1];
	    //$ImageType = $_FILES["s_image"]["type"];

	    //validate image
	    if ((isset($_FILES["s_image"]) && !empty($_FILES["s_image"]['name'])) && (($_FILES["s_image"]["type"] == "image/png") || ($_FILES["s_image"]["type"] == "image/jpeg") || ($_FILES["s_image"]["type"] == "image/pjpeg"))  && ($_FILES["s_image"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
	    {
	      // if($max_upload_size > 200){
	      //   $error = true;
	      //   $ermsg = "Sorry only passport is allow";
	      // }
	      if($_FILES["s_image"]["error"] > 0){
	        $error = true;
	        $ermsg = "Error: " . $_FILES["s_image"]["error"];
	      }else{
	        //now convert image to base64
	        //the class and methods are loaded from the included photo.class.php file
	        if (isset($_FILES["s_image"]) && $_FILES["s_image"]["error"] <= 0) {
	          $file_tmp_name = $_FILES["s_image"]["tmp_name"];
	          $file_name = $_FILES["s_image"]["name"];    
	          $photo = new Photo($file_tmp_name);
	          $photo->scaleToMaxSide(331);
	          $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
	          $theupdateourstudent = $addr['photo'];
	          //photo is ready to be stored in the database
	          //the photo text data, $addr['photo'] should be stored in a medium text field in the database
	          }
	      }

	    }else{
	      //error has sele
	      $error = true;
	      if(!in_array($extension, $allowedExts)){
	        //if the extension is not in the specified array of extensions
	        $ermsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
	      }
	      elseif($photowidth > $photoheight){
	        //this is an optional
	        $ermsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
	      }
	      elseif($_FILES["s_image"]["size"] > $max_upload_size){
	        //if the size is greater than specified max size
	        $ermsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
	      }
	      else{
	        $ermsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
	      }
	    }
	}


	if($error == false){

		$Our_student_query = mysqli_query($connect, "UPDATE our_student SET s_topic = '$s_topic', s_content = '$s_content', s_image = '$theupdateourstudent')") or die(mysqli_query($connect));
		if(!empty($Our_student_query)){
			echo "successmsg"."<br/>";

		}
	}
}


if(isset($ermsg)){

 echo "<div style='padding: 10px; color: white; background: red;> $ermsg </div>";
}
?>
<!-- Welcome To Our School -->


<?php
if(isset($_POST['gallery']) && $_POST['gallery'] == 'Set_GALLERY'){
	echo "done";
}


?>







<!-- <?php
//if(isset($successmsg)){
?>
  <div style="padding: 10px; color: #fff; background: green;"><?= $successmsg; ?></div>
<?php
}
?> -->