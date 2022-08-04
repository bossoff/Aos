<?php
 session_start();
  require "connection/function.php";
  require "sub_lib/checker.php";
  require ("library/photo.class.php");
if(isset($_POST['account']) && $_POST['account'] == 'Finish'){
  $error = false;
  $firstname = $_SESSION['firstname'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['firstname']))))));
  $lastname = $_SESSION['lastname'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['lastname']))))));
  $email = $_SESSION['email'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['email']))));
  //$sex = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['sex']))));
  //$sex = 'Male';//$_POST['sex'];
  $sex = isset($_POST['sex']) ? $_POST['sex'] : "";
  $address = $_SESSION['address'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['address']))))));
  $occupation = $_SESSION['occupation'] =  mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['occupation']))))));
  $city = $_SESSION['city'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['city']))))));
  $country = $_SESSION['country'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['country']))))) );
  $bio = $_SESSION['bio'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['bio']))))));


  $thephotodata = "";//initial photo data value is empty


  //now, process attached photo
  if (isset($_FILES["user_image"]) && !empty($_FILES["user_image"]['name'])){
    $max_upload_size = 200;//in KB
    $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
    //define allowed file extensions
    $allowedExts = array("jpg", "jpeg", "png", "jpe");
    //get the extension of the uploaded file
    $extension = explode(".", $_FILES["user_image"]["name"]);
    $extension = end($extension);
    //get the dimension of the uploaded file if necessary //it stores array values
    $photodimension = getimagesize($_FILES["user_image"]["tmp_name"]);
    $photowidth = $photodimension[0];
    $photoheight = $photodimension[1];
    //$ImageType = $_FILES["user_image"]["type"];

    //validate image
    if ((isset($_FILES["user_image"]) && !empty($_FILES["user_image"]['name'])) && (($_FILES["user_image"]["type"] == "image/png") || ($_FILES["user_image"]["type"] == "image/jpeg") || ($_FILES["user_image"]["type"] == "image/pjpeg"))  && ($_FILES["user_image"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
    {
      // if($max_upload_size > 200){
      //   $error = true;
      //   $ermsg = "Sorry only passport is allow";
      // }
      if($_FILES["user_image"]["error"] > 0){
        $error = true;
        $ermsg = "Error: " . $_FILES["user_image"]["error"];
      }else{
        //now convert image to base64
        //the class and methods are loaded from the included photo.class.php file
        if (isset($_FILES["user_image"]) && $_FILES["user_image"]["error"] <= 0) {
          $file_tmp_name = $_FILES["user_image"]["tmp_name"];
          $file_name = $_FILES["user_image"]["name"];    
          $photo = new Photo($file_tmp_name);
          $photo->scaleToMaxSide(331);
          $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
          $thephotodata = $addr['photo'];
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
      elseif($_FILES["user_image"]["size"] > $max_upload_size){
        //if the size is greater than specified max size
        $ermsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
      }
      else{
        $ermsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
      }
    }
  }
    if($error==false){
      $query1 = mysqli_query($connect,"UPDATE user SET firstname = '$firstname', lastname  = '$lastname', public_email = '$email', gender = '$sex', user_avatar_source = '$thephotodata', address = '$address', city = '$city', user_occupation = '$occupation', bio = '$bio', state = '$country', country = '$country', status_switch = '1' WHERE user_name = '".$_SESSION['user_login']."'") or die(mysqli_error($connect));
            $user_switch = mysqli_query($connect,"SELECT * FROM user WHERE user_login = '".$_SESSION['user_login']."'");

          if ($query1 >0){
            $fetch_row = mysqli_fetch_assoc($user_switch);
            $status_switch = $fetch_row['status_switch']; $user_level = $fetch_row['user_level'];
            if($status_switch == 1 && $user_level=='Administrator'){
              header("LOCATION:".base_url("aosadmin/home.php?".$username.'&request=login&status=Update1?_log_act'));
            }else{
              echo "Sorry your status_switch is steel zero.";
            }                   
          }else{
            echo "unable to update the db";
          }
    }

}
//  print_r($user_switch);
// echo $_SESSION['user_login'];
// print_r($fetch_row);
// echo $fetch_row['user_level'];

// echo embeddedImg($user_avatar_source);



?>

<?php
if(isset($error) && $error==true && isset($ermsg)){
?>
  <div style="padding: 10px; color: #fff; background: #ec3434;"><?= $ermsg; ?></div>
<?php
}
?>