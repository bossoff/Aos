<?php
session_start();
require "connection/function.php";
 require "sub_lib/checker.php";
if(isset($_POST['account']) && $_POST['account'] == 'Finish'){
  $error = false;
  $firstname = $_SESSION['firstname'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['firstname']))));
  $lastname = $_SESSION['lastname'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['lastname']))));
  $email = $_SESSION['email'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['email']))));
  //$sex = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['sex']))));
  //$sex = 'Male';//$_POST['sex'];
  $sex = isset($_POST['sex']) ? $_POST['sex'] : "";
  $address = $_SESSION['address'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['address']))));
  $occupation = $_SESSION['occupation'] =  mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['occupation']))));
  $city = $_SESSION['city'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['city']))));
  $country = $_SESSION['country'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['country']))));
  $bio = $_SESSION['bio'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['bio']))));
  //$file = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['file']))));


  // $key = md5(sha1("RAJIH")).sha1("RAJIH");
  // $salt = md5(sha1("RAJIH")).sha1("RAJIH");

  // function encrypty($string, $key){
  //   $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
  //   return  $string;
  // }

  //DECRYPT

  // function decrypt ($string, $key){
  //   $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
  //   return $string;

  // }

  // Th encrypting code is for the blob function only so if you fill lik to EDIT.



	$Destination = 'images';
  		if($sex == "Male"){
  			if(!isset($_FILES['user_image']) || !is_uploaded_file($_FILES['user_image']['tmp_name'])){
            $NewImageName= 'male.png';
            move_uploaded_file($_FILES['user_image']['tmp_name'], "$Destination/$NewImageName");
        	}
  		}
  		elseif($sex == "Female"){
  			if(!isset($_FILES['user_image']) || !is_uploaded_file($_FILES['user_image']['tmp_name'])){
            $NewImageName= 'female.png';
            move_uploaded_file($_FILES['user_image']['tmp_name'], "$Destination/$NewImageName");
        	}  			
  		}else{

  			$RepresentName = strtoupper("A.O.S_Profile_'".$firstname."'".substr(str_shuffle("a123bcd456ef789ghi098jklmn3628oprst98765uvw654310xyz"),0,9)."_".date("Y"));
            $RandomNum =  "";//rand(0, 9999999999);
           	$ImageName = str_replace(' ','-',strtolower($_FILES['user_image']['name']));
            $ImageType = $_FILES['user_image']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            $NewImageName = $RepresentName.'.'.$ImageExt;
            $blob = mysqli_real_escape_string($connect,trim(file_get_contents($_FILES['user_image']['tmp_name'])));
        
        		//Updates and confirm changing details
		        //$password = md5(sha1($password)).sha1($password);	  
            if(substr($ImageType, 0,5) == 'image'){
              $UpdateQuery = sprintf("UPDATE user SET firstname = '$firstname', lastname  = '$lastname', public_email = '$email', gender = '$sex', user_avatar_source = '$NewImageName', address = '$address', city = '$city', user_occupation = '$occupation', state = '$country', country = '$country', status_switch = '1' WHERE user_name = '$user_login' || user_email = '$user_email' LIMIT 1");
                      $query1 = mysqli_query($connect,$UpdateQuery) or die(mysqli_error($connect));
                          if ($query1 >0){
                            $fetch_row = mysqli_fetch_assoc($query1);
                            $status_switch = $fetch_row['status_switch'];
                            if($status_switch == 1){
                              header("LOCATION:".base_url("aosadmin/home.php?".$username.'&request=login&status=Update1?_log_act'));
                            }else{
                              echo "Sorry your status_switch is steel zero.";
                            }                   
                          }else{
                            echo "unable to update the db";
                          }
                          
            }   	
    
  		}

}

?>