<?php
function check_login(){
  if(strlen($_SESSION['uid'] && $_SESSION['user_level'])==0){
    header("Location:" .base_home()."?rdir=no_entry_session_not_set");
        exit();
  }

  elseif(!isset($_SESSION['uid']) || !isset($_SESSION['user_level'])){  
         header("Location:" .base_home("").'?rdir=warning_is_not_session!');
          exit();
       
  }

  elseif(isset($_SESSION['uid']) && isset($_SESSION['ad_id']) && isset($_SESSION['user_level'])){
        $password = preg_replace('#[^a-zA-Z]#i', '', $_SESSION['user_level']);
        $password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION['user_level']);
        $password = preg_match("/^[a-zA-Z ]*$/", $_SESSION['user_level']);

        $email = preg_replace('#[^0-9]#i', '', $_SESSION['uid']);
        $email = preg_replace('#[^a-zA-Z]#i', '', $_SESSION['uid']);
        $email = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION['uid']);
        $email = preg_match("/^[a-zA-Z ]*$/", $_SESSION['uid']);
  }


  elseif(isset($_SESSION['uid']) && isset($_SESSION['ad_id']) && isset($_SESSION['user_level'])){
        $_SESSION['ad_id'] = preg_replace('#[^0-9]#i', '', $_COOKIE['ad_id']);

        $_SESSION['uid'] =preg_replace('#[^0-9]#i', '', $_COOKIE['uid']);
        $_SESSION['uid'] =preg_replace('#[^a-zA-Z]#i', '', $_COOKIE['uid']);
        $_SESSION['uid'] =preg_replace('#[^A-Za-z0-9]#i', '', $_COOKIE['uid']);
        $_SESSION['uid'] =preg_match("/^[a-zA-Z ]*$/", $_COOKIE['uid']);

        $_SESSION['user_level'] =preg_match("/^[a-zA-Z ]*$/", $_COOKIE['user_level']);
        $_SESSION['ad_id'] =preg_replace('#[^0-9]#i', '', $_COOKIE['ad_id']);
    
  }

}

  $check_user_information = mysqli_query($connect, sprintf("SELECT user_id, user_level FROM users WHERE user_id = '".$_SESSION['uid']."' AND user_level = '".$_SESSION['user_level']."'"));
    $check_user_information_result = mysqli_num_rows($check_user_information);
      if($check_user_information_result ==0){
        header("Location:" .base_home('portal/')."?rdir=no_entry_invalid_id");
            exit();
      }

    // print_r($check_user_information);
      $query_user_data = mysqli_query($connect, sprintf("SELECT * FROM users WHERE user_id = '".$_SESSION['uid']."' AND user_level = '".$_SESSION['user_level']."'")) or die(mysqli_error($connect));
      $get_data = mysqli_fetch_assoc($query_user_data);
      $uid =  $_SESSION['uid'];
      $user_level = $get_data['user_level'];
      $surname = $get_data['surname'];
      $firtname = $get_data['firstname'];
      $lastname = $get_data['lastname'];
      $avartar = $get_data['avartar'];
      $default_avartar = $get_data['default_avartar'];
      $email = $get_data['email'];
      $phone = $get_data['phone'];
      $department = $get_data['department'];
      $matric = $get_data['matric'];
      $level = $get_data['level'];
      $sub_level = $get_data['sub_level'];
      $application_no = $get_data['application_no'];
      $courses = $get_data['courses'];
      $program = $get_data['program'];
      $class = $get_data['class'];
      $adult_education = $get_data['adult_education'];
      $dob = $get_data['dob'];
      $gender = $get_data['gender'];



?>