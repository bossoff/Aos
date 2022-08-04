<?php
define("_function", "../connection/");
require (_function."function.php");
require "../lib/gallery.php";
require "../lib/user_checker.php";
require ("../library/photo.class.php");
?>

<!-- Welcome to our school -->
<?php
if(isset($_POST['gallery']) && $_POST['gallery'] == 'Set_GALLERY'){
	$error = false;
	$s_title = $_SESSION['s_title'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['s_title'])))));	
    $image_name = $_FILES['image1']['name'];
    $image_type = $_FILES['image1']['type'];
    $image_size = $_FILES['image1']['size'];
    $image_tmp  = $_FILES['image1']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image1 = strtoupper("AOS_WELCOME_GALLERY_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

    $image_name = $_FILES['image2']['name'];
    $image_type = $_FILES['image2']['type'];
    $image_size = $_FILES['image2']['size'];
    $image_tmp  = $_FILES['image2']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image2 = strtoupper("AOS_WELCOME_GALLERY_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

    $image_name = $_FILES['image3']['name'];
    $image_type = $_FILES['image3']['type'];
    $image_size = $_FILES['image3']['size'];
    $image_tmp  = $_FILES['image3']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image3 = strtoupper("AOS_WELCOME_GALLERY_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

    $image_name = $_FILES['image4']['name'];
    $image_type = $_FILES['image4']['type'];
    $image_size = $_FILES['image4']['size'];
    $image_tmp  = $_FILES['image4']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image4 = strtoupper("AOS_WELCOME_GALLERY_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

    $image_name = $_FILES['image5']['name'];
    $image_type = $_FILES['image5']['type'];
    $image_size = $_FILES['image5']['size'];
    $image_tmp  = $_FILES['image5']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image5 = strtoupper("AOS_WELCOME_GALLERY_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

        $destination = "../upload_image";
        if (empty($_POST['s_title']) || empty('image1') || empty('image2') || empty('image3') || empty('image4') || empty('image5')){
            $error = true;
            $code = base64_encode('welcomeToourSchool').sha1($code);
			header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=error=1&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
        }else{

            if (!in_array($image_extension, $image_allowed_extention)) {
                $error = true;
                $errorimage = "File not allowed";
            }

            if (!in_array($image_type, $image_allowed_type)) {
                $error = true;
                $errormessage = "Invalid Image type";
            }

            if ($image_size > ($image_allowed_size*1024)){
                $error = true;
                $errormessage = "Sorry Image size should not be less than 100kb";
            }

            if ($error == false){
            	//Insert Query
	            if ($image_type=='image/jpeg' || $image_type=='image/png' || $image_type=='image/jpg' || $image_type=='image/gif'){	                
                    $query = mysqli_query($connect,"UPDATE school_advert SET s_title = '$s_title', image1 = '$Representgallery_image1', image2 = '$Representgallery_image2', image3 = '$Representgallery_image3', image4 = '$Representgallery_image4', image5 = '$Representgallery_image5'") or die(mysqli_error($connect));
                        if ($query>0){
                            $error = true;
                             move_uploaded_file($_FILES['image1']['tmp_name'],"$destination/$Representgallery_image1");
                             move_uploaded_file($_FILES['image2']['tmp_name'],"$destination/$Representgallery_image2");
                             move_uploaded_file($_FILES['image3']['tmp_name'],"$destination/$Representgallery_image3");
                             move_uploaded_file($_FILES['image4']['tmp_name'],"$destination/$Representgallery_image4");
                             move_uploaded_file($_FILES['image5']['tmp_name'],"$destination/$Representgallery_image5");
                             $code = base64_encode('Update_Letter').sha1($code);
							header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=successful=1&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
							exit();

                            $errordone = "Your Image as been successful!";
            			}           
            	}
	        
            }else{
                header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=errorr=1&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
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
		header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_set=error=2&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
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
			header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Lettererset=error=2&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
	      }
	    }
	}
		if($error == false){
			$testimony_query = mysqli_query($connect, "INSERT INTO testimony (tphoto,comment,customer_name,occupation) VALUES ('$theTestimonidata', '$comment', '$customer_name', '$occupation')");
			if(!empty($testimony_query)){
				$error = true;
				$successmsg = "Testimonies Updated succefully.";
				$code = base64_encode('Update_Letter').sha1($code);
				header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=successful=2&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
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
    $ntitle = $_SESSION['ntitle'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['ntitle'])))));
    $ncontent = $_SESSION['ncontent'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['ncontent']))));

    $image_name = $_FILES['newsimage']['name'];
    $image_type = $_FILES['newsimage']['type'];
    $image_size = $_FILES['newsimage']['size'];
    $image_tmp  = $_FILES['newsimage']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Represent_newsimage = strtoupper("AOS_NEWS_IMAGE_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

        $destination = "../upload_image";
        if (empty($_POST['ntitle']) || empty('ncontent') || empty('newsimage')){
            $error = true;
            $code = base64_encode('welcomeToourSchool').sha1($code);
            header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=error=3&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
        }else{

            if (!in_array($image_extension, $image_allowed_extention)) {
                $error = true;
                $errorimage = "File not allowed";
            }

            if (!in_array($image_type, $image_allowed_type)) {
                $error = true;
                $errormessage = "Invalid Image type";
            }

            if ($image_size > ($image_allowed_size*1024)){
                $error = true;
                $errormessage = "Sorry Image size should not be less than 100kb";
            }

            if ($error == false){
                //Insert Query
                if ($image_type=='image/jpeg' || $image_type=='image/png' || $image_type=='image/jpg' || $image_type=='image/gif'){                 
                    $news_query = mysqli_query($connect,"INSERT INTO update_news SET user_level = '$user_logins', title = '$ntitle', short_content = '$ncontent', content = '$ncontent', newsimage = '$Represent_newsimage'") or die(mysqli_error($connect));
                        if ($news_query>0){
                            $error = true;
                             move_uploaded_file($_FILES['newsimage']['tmp_name'],"$destination/$Represent_newsimage");
                            $code = base64_encode('Update_Letter').sha1($code);
                            header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=successful=3&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
                            exit();
                       }                }                 
            }else{
                 header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=errorr=3&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
            }
        }

            
} 

?>


<!-- Event Update -->
<?php


?>



<!-- Our Students -->
<?php
if(isset($_POST['Our_student']) && $_POST['Our_student'] == 'Set_Student'){
    $error = false;
    $s_topic = $_SESSION['s_topic'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['s_topic'])))));
    $s_content = $_SESSION['s_content'] = mysqli_real_escape_string($connect, ucwords(htmlentities(trim(sanitize($_POST['s_content'])))));

    $image_name = $_FILES['s_image']['name'];
    $image_type = $_FILES['s_image']['type'];
    $image_size = $_FILES['s_image']['size'];
    $image_tmp  = $_FILES['s_image']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Represent_s_image = strtoupper("AOS_OUR_STUDENT_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

        $destination = "../upload_image";
        if (empty($_POST['s_topic']) || empty('s_content') || empty($_FILES['s_image']['name'])){
            $error = true;
            $code = base64_encode('welcomeToourSchool').sha1($code);
            header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=error=5&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
        }else{

            if (!in_array($image_extension, $image_allowed_extention)) {
                $error = true;
                $errorimage = "File not allowed";
            }

            if (!in_array($image_type, $image_allowed_type)) {
                $error = true;
                $errormessage = "Invalid Image type";
            }

            if ($image_size > ($image_allowed_size*1024)){
                $error = true;
                $errormessage = "Sorry Image size should not be less than 100kb";
            }

            if ($error == false){
                //Insert Query
                if ($image_type=='image/jpeg' || $image_type=='image/png' || $image_type=='image/jpg' || $image_type=='image/gif'){
                    $Our_student_query = mysqli_query($connect, "UPDATE our_student SET s_topic = '$s_topic', s_content = '$s_content', s_image = '$Represent_s_image'") or die(mysqli_query($connect));                 
                    // $news_query = mysqli_query($connect,"INSERT INTO update_news SET user_level = '$user_logins', title = '$ntitle', short_content = '$ncontent', content = '$ncontent', s_image = '$Represent_s_image'") or die(mysqli_error($connect));
                        if ($Our_student_query>0){
                            $error = true;
                             move_uploaded_file($_FILES['s_image']['tmp_name'],"$destination/$Represent_s_image");
                            $code = base64_encode('Update_Letter').sha1($code);
                            header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=successful=5&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
                            exit();
                       }                }                 
            }else{
                 header("Location:" .base_url1("settings/update_letter.php?rdir=Update_Letter_Set=errorr=5&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."update.php");
            }
        }
}

?>




 <!-- Logo Validaion -->
<?php
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

    if(empty($title1) || empty($title3) || empty($title2) || empty($decription1) || empty($decription2) || empty($decription3)){
        $error  = true;
        $code = base64_encode('Slider_Upload').sha1($code);
        header("Location:" .base_url1("settings/slider.php?rdir=Slider_Upload_Set=error=01&lq").'_'.md5('Slider_Upload_Set').'_'.$code.'/'."slider.php");
    }else{
        $image_name = $_FILES['slider1']['name'];
        $image_type = $_FILES['slider1']['type'];
        $image_size = $_FILES['slider1']['size'];
        $image_tmp  = $_FILES['slider1']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $Representgallery_slider1 = strtoupper("AOS_SLIDER1_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

        $image_name = $_FILES['slider2']['name'];
        $image_type = $_FILES['slider2']['type'];
        $image_size = $_FILES['slider2']['size'];
        $image_tmp  = $_FILES['slider2']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $Representgallery_slider2 = strtoupper("AOS_SLIDER2_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

        $image_name = $_FILES['slider3']['name'];
        $image_type = $_FILES['slider3']['type'];
        $image_size = $_FILES['slider3']['size'];
        $image_tmp  = $_FILES['slider3']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $Representgallery_slider3 = strtoupper("AOS_SLIDER3_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

            $destination = "../upload_image";
            if (!in_array($image_extension, $image_allowed_extention)) {
                    $error = true;
                    $errorimage = "File not allowed";
                }

                if (!in_array($image_type, $image_allowed_type)) {
                    $error = true;
                    $errormessage = "Invalid Image type";
                }

                if ($image_size > ($image_allowed_size*1024)){
                    $error = true;
                    $errormessage = "Sorry Image size should not be less than 100kb";
                }

                if ($error == false){
                    //Insert Query
                    if ($image_type=='image/jpeg' || $image_type=='image/png' || $image_type=='image/jpg' || $image_type=='image/gif'){
                    $slider_query = mysqli_query($connect, "UPDATE slider SET title1 = '$title1', title2 = '$title2', title3 = '$title3', decription1 = '$decription1', decription2 = '$decription2', decription3 = '$decription3', image1 = '$Representgallery_slider1', image2 = '$Representgallery_slider2', image3 = '$Representgallery_slider3'") or die(mysqli_error($connect));

                            if ($slider_query>0){
                                $error = true;
                                 move_uploaded_file($_FILES['slider1']['tmp_name'],"$destination/$Representgallery_slider1");
                                 move_uploaded_file($_FILES['slider2']['tmp_name'],"$destination/$Representgallery_slider2");
                                 move_uploaded_file($_FILES['slider3']['tmp_name'],"$destination/$Representgallery_slider3");
                                 
                                 $code = base64_encode('Update_Letter').sha1($code);
                                header("Location:" .base_url1("settings/slider.php?rdir=Slider_Upload_Set=successful=01&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."slider.php");
                                exit();

                                $errordone = "Your Image as been successful!";
                            }           
                    }else{
                        header("Location:" .base_url1("settings/slider.php?rdir=Update_Letter_Set=errorr=01&lq").'_'.md5('Slider_Upload_Set').'_'.$code.'/'."slider.php");
                    }
                
                }else{
                    header("Location:" .base_url1("settings/slider.php?rdir=Update_Letter_Set=errorr=01&lq").'_'.md5('Slider_Upload_Set').'_'.$code.'/'."update.php");
                }
                
            

               

    }
}
?>



<!-- About Update -->
<?php
if(isset($_POST['About']) && $_POST['About'] == 'Set_ABOUT'){
    $error = false;
    $a_heading = $_SESSION['a_heading'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['a_heading'])))));
    $a_content = $_SESSION['a_content'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['a_content']))))));
    $a_video_link = $_SESSION['a_video_link'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['a_video_link'])))));
    if (empty($a_content) || empty($a_heading) || empty($a_video_link)) {
        $code = base64_encode('About').sha1($code);
        header("Location:" .base_url1("settings/about.php?rdir=about_Upload_Set=error=01&lq").'_'.md5('Slider_Upload_Set').'_'.$code.'/'."about.php");
    }else{
        if($error == false){
        $about_query = mysqli_query($connect, "UPDATE about SET a_heading = '$a_heading', a_content = 'a_content', a_video_link = '$a_video_link'");
            if(!empty($about_query)){
                header("Location:" .base_url1("settings/about.php?rdir=about_Upload_Set=successful=01&lq").'_'.md5('About Update').'_'.$code.'/'."about.php");
                    exit();            
            }
        }
    }    
}
?>



<!-- What we do -->
<?php
if(isset($_POST['WHAT_WE_DO']) && $_POST['WHAT_WE_DO'] == 'Set_DO'){
    $error = false;
    $w_heading1 = $_SESSION['w_heading1'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['w_heading1'])))));
    $w_content1 = $_SESSION['w_content1'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['w_content1']))))));
    $w_heading2 = $_SESSION['w_heading2'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['w_heading2'])))));
    $w_content2 = $_SESSION['w_content2'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['w_content2']))))));

        $image_name = $_FILES['w_image1']['name'];
        $image_type = $_FILES['w_image1']['type'];
        $image_size = $_FILES['w_image1']['size'];
        $image_tmp  = $_FILES['w_image1']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $Representgallery_w_image1 = strtoupper("AOS_what_we_do_image_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

         $image_name = $_FILES['w_image2']['name'];
        $image_type = $_FILES['w_image2']['type'];
        $image_size = $_FILES['w_image2']['size'];
        $image_tmp  = $_FILES['w_image2']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $Representgallery_w_image2 = strtoupper("AOS_what_we_do_image_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

        if(empty($w_heading1) || empty($w_content1) || empty($w_heading2) || empty($w_content2)){
                $code = base64_encode('about').sha1($code);
            header("Location:" .base_url1("settings/about.php?rdir=whatwedo_Set=error=01&lq").'_'.md5('about_Upload_Set').'_'.$code.'/'."about.php");

        }else{
            $destination = "../upload_image";
            if (!in_array($image_extension, $image_allowed_extention)) {
                    $error = true;
                    $errorimage = "File not allowed";
                }

                if (!in_array($image_type, $image_allowed_type)) {
                    $error = true;
                    $errormessage = "Invalid Image type";
                }

                if ($image_size > ($image_allowed_size*1024)){
                    $error = true;
                    $errormessage = "Sorry Image size should not be less than 100kb";
                }

                if ($error == false){
                    //Insert Query
                    if ($image_type=='image/jpeg' || $image_type=='image/png' || $image_type=='image/jpg' || $image_type=='image/gif'){
                        $what_we_do_query = mysqli_query($connect, "UPDATE what_we_do SET w_heading1 = '$w_heading1', w_content1 = '$w_content1', w_image1 = '$Representgallery_w_image1', w_heading2 = '$w_heading2', w_content2 = '$w_content2', w_image2 = '$Representgallery_w_image2'") or die(mysqli_error($connect));

                            if ($what_we_do_query>0){
                                $error = true;
                                 move_uploaded_file($_FILES['w_image1']['tmp_name'],"$destination/$Representgallery_w_image1");                             
                                 move_uploaded_file($_FILES['w_image2']['tmp_name'],"$destination/$Representgallery_w_image2");                             
                                 
                                header("Location:" .base_url1("settings/about.php?rdir=whatwedo_Upload_Set=successful=01&lq").'_'.md5('Update_Letterer').'_'.$code.'/'."about.php");
                                exit();

                                $errordone = "Your Image as been successful!";
                            }           
                    }else{
                        header("Location:" .base_url1("settings/about.php?rdir=whatwedo_Set=errorr=01&lq").'_'.md5('about_Upload_Set').'_'.$code.'/'."about.php");
                    }

            }
        }
}

?>



<!-- Our Staff -->
<?php
if(isset($_POST['our_staff']) && $_POST['our_staff'] == 'Set_STAFF'){
    $error = false;
    $staff1 = $_SESSION['staff1'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['staff1']))))));
    $staff2 = $_SESSION['staff2'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['staff2']))))));
    $staff3 = $_SESSION['staff3'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['staff3']))))));
    $staff4 = $_SESSION['staff4'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['staff4']))))));
    $post1 = $_SESSION['post1'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['post1']))))));
    $post2 = $_SESSION['post2'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['post2']))))));
    $post3 = $_SESSION['post3'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['post3']))))));
    $post4 = $_SESSION['post4'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['post4']))))));
    $facebook1 = $_SESSION['facebook1'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['facebook1'])))));
    $facebook2 = $_SESSION['facebook2'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['facebook2'])))));
    $facebook3 = $_SESSION['facebook3'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['facebook3'])))));
    $facebook4 = $_SESSION['facebook4'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['facebook4'])))));
    $twitter1 = $_SESSION['twitter1'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['twitter1'])))));
    $twitter2 = $_SESSION['twitter2'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['twitter2'])))));
    $twitter3 = $_SESSION['twitter3'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['twitter3'])))));
    $twitter4 = $_SESSION['twitter4'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['twitter4'])))));
    $google_plus1 = $_SESSION['google_plus1'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['google_plus1'])))));
    $google_plus2 = $_SESSION['google_plus2'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['google_plus2'])))));
    $google_plus3 = $_SESSION['google_plus3'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['google_plus3'])))));
    $google_plus4 = $_SESSION['google_plus4'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['google_plus4'])))));
    $office_number1 = $_SESSION['office_number1'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['office_number1']))));
    $office_number2 = $_SESSION['office_number2'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['office_number2']))));
    $office_number3 = $_SESSION['office_number3'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['office_number3']))));
    $office_number4 = $_SESSION['office_number4'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['office_number4']))));
    $mobile_number1 = $_SESSION['mobile_number1'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['mobile_number1']))));
    $mobile_number2 = $_SESSION['mobile_number2'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['mobile_number2']))));
    $mobile_number3 = $_SESSION['mobile_number3'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['mobile_number3']))));
    $mobile_number4 = $_SESSION['mobile_number4'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['mobile_number4']))));


        $image_name = $_FILES['staff_image1']['name'];
        $image_type = $_FILES['staff_image1']['type'];
        $image_size = $_FILES['staff_image1']['size'];
        $image_tmp  = $_FILES['staff_image1']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $staff_image1 = strtoupper("Our_staff_image_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

         $image_name = $_FILES['staff_image2']['name'];
        $image_type = $_FILES['staff_image2']['type'];
        $image_size = $_FILES['staff_image2']['size'];
        $image_tmp  = $_FILES['staff_image2']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $staff_image2 = strtoupper("Our_staff_image_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

         $image_name = $_FILES['staff_image3']['name'];
        $image_type = $_FILES['staff_image3']['type'];
        $image_size = $_FILES['staff_image3']['size'];
        $image_tmp  = $_FILES['staff_image3']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $staff_image3 = strtoupper("Our_staff_image_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

         $image_name = $_FILES['staff_image4']['name'];
        $image_type = $_FILES['staff_image4']['type'];
        $image_size = $_FILES['staff_image4']['size'];
        $image_tmp  = $_FILES['staff_image4']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $staff_image4 = strtoupper("Our_staff_image_".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,10)."_".date("Y")).".".$image_extension;

        if(!$image_type=='image/jpeg' || !$image_type=='image/png' || !$image_type=='image/jpg' || !$image_type=='image/gif'){
                $code = base64_encode('about').sha1($code);
            header("Location:" .base_url1("settings/about.php?rdir=ourstaffimage_Set=error=01&lq").'_'.md5('Our_staff_image').'_'.$code.'/'."about.php");

        }else{
            $destination = "../upload_image";
            if (!in_array($image_extension, $image_allowed_extention)) {
                    $error = true;
                    $errorimage = "File not allowed";
                }

                if (!in_array($image_type, $image_allowed_type)) {
                    $error = true;
                    $errormessage = "Invalid Image type";
                }

                if ($image_size > ($image_allowed_size*1024)){
                    $error = true;
                    $errormessage = "Sorry Image size should not be less than 100kb";
                }

                if ($error == false){
                    //Insert Query
                    if ($image_type=='image/jpeg' || $image_type=='image/png' || $image_type=='image/jpg' || $image_type=='image/gif'){
                        $what_we_do_query = mysqli_query($connect, "UPDATE our_staff SET staff1 = '$staff1', staff2 = '$staff2', staff3 = '$staff3', staff4 = '$staff4', post1 = '$post1', post2 = '$post2', post3 = '$post3', post4 = '$post4', staff_image1 = '$staff_image1', staff_image2 = '$staff_image2', staff_image3 = '$staff_image3', staff_image4 = '$staff_image4', facebook1 = '$facebook1', facebook2 = '$facebook2', facebook3 = '$facebook3', facebook4 = '$facebook4', twitter1 = '$twitter1', twitter2 = '$twitter2', twitter3 = '$twitter3', twitter4 = '$twitter4', google_plus1 = '$google_plus1', google_plus2 = '$google_plus2', google_plus3 = '$google_plus3', google_plus4 = '$google_plus4', office_number1 = '$office_number1', office_number2 = '$office_number2', office_number3 = '$office_number3', office_number4 = '$office_number4', mobile_number1 = '$mobile_number1', mobile_number2 = '$mobile_number2', mobile_number3 = '$mobile_number3', mobile_number4 = '$mobile_number4'") or die(mysqli_error($connect));

                            if ($what_we_do_query>0){
                                $error = true;
                                 move_uploaded_file($_FILES['staff_image1']['tmp_name'],"$destination/$staff_image1");                             
                                 move_uploaded_file($_FILES['staff_image2']['tmp_name'],"$destination/$staff_image2");                             
                                 move_uploaded_file($_FILES['staff_image3']['tmp_name'],"$destination/$staff_image3");                             
                                 move_uploaded_file($_FILES['staff_image4']['tmp_name'],"$destination/$staff_image4");                             
                                 
                                header("Location:" .base_url1("settings/about.php?rdir=ourstaffimage_Set=successful=01&lq").'_'.md5('Our_staff_image').'_'.$code.'/'."about.php");
                                exit();

                                $errordone = "Your Image as been successful!";
                            }else{
                                header("Location:" .base_url1("settings/about.php?rdir=ourstaffimage_Set=errorr=01&lq").'_'.md5('Our_staff_image').'_'.$code.'/'."about.php");
                            }           
                    }else{
                        header("Location:" .base_url1("settings/about.php?rdir=ourstaffimage_Set=errorr=01&lq").'_'.md5('Our_staff_image').'_'.$code.'/'."about.php");
                    }

            }
        }

   
}

?>