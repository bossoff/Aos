<?php 
session_start();
 // MY DB CONNECTION

// require "connection/database.php";
//require "core/blocking_injection.php";
  //CHINKING IF WHO IS TRYING TO THIS PAGE IS THE RIGHT PERSON
  if (!isset($_SESSION['userid']) || !isset($_SESSION['user_login']) || !isset($_SESSION['user_email']) || !isset($_SESSION['phone'])) {
      //header("Location: ../index.php?rdir=you_log_out"); 
      // header("Location:" .base_url("?rdir=you_log_out"));
      if(session_destroy()){
       header("Location:" .base_url("html/session_expired.html?rdir=you_log_out"));
        exit;
      } 
  }

  // WE ARE TRYING TO FILTER EVERYTHING 
  if (isset($_SESSION['userid']) && isset($_SESSION['user_login']) && isset($_SESSION['user_email']) && isset($_SESSION['phone'])){
      preg_replace('#[^0-9]#i', '', $_SESSION['userid']);

      $userid = preg_replace('#[^0-9]#i', '', $_SESSION['user_login']);
      $user_login = preg_replace('#[^a-zA-Z]#i', '', $_SESSION['user_login']);
      $user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION['user_login']);
      $user_login = preg_match("/^[a-zA-Z ]*$/", $_SESSION['user_login']);

      $user_email = preg_replace('#[^0-9]#i', '', $_SESSION['user_email']);
      $user_email = preg_replace('#[^a-zA-Z]#i', '', $_SESSION['user_email']);
      $user_email = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION['user_email']);
      $user_email = preg_match("/^[a-zA-Z ]*$/", $_SESSION['user_email']);

      $user_password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION['user_password']);

      $phone = preg_replace('#[^0-9]#i', '', $_SESSION['phone']);
  }

  elseif(isset($_COOKIE['userid']) && isset($_COOKIE['user_login']) && isset($_COOKIE['user_email']) && isset($_COOKIE['phone'])){
        $_SESSION['userid'] = preg_replace('#[^0-9]#i', '', $_COOKIE['id']);

        $_SESSION['login'] = preg_replace('#[^0-9]#i', '', $_COOKIE['login']);
        $_SESSION['login'] = preg_replace('#[^a-zA-Z]#i', '', $_COOKIE['login']);
        $_SESSION['login'] = preg_replace('#[^A-Za-z0-9]#i', '', $_COOKIE['login']);
        $_SESSION['login'] = preg_match("/^[a-zA-Z ]*$/", $_COOKIE['user_login']);

        $_SESSION['email'] =preg_replace('#[^0-9]#i', '', $_COOKIE['email']);
        $_SESSION['email'] =preg_replace('#[^a-zA-Z]#i', '', $_COOKIE['email']);
        $_SESSION['email'] =preg_replace('#[^A-Za-z0-9]#i', '', $_COOKIE['email']);
        $_SESSION['email'] =preg_match("/^[a-zA-Z ]*$/", $_COOKIE['email']);
        $_SESSION['pass'] =preg_match("/^[a-zA-Z ]*$/", $_COOKIE['pass']);

        $_SESSION['phone'] =preg_replace('#[^0-9]#i', '', $_COOKIE['phone']);
    
  }
 
// echo $userid."<br/>";
//  echo $user_login."<br/>";
//  echo $user_email."<br/>";
//  echo $phone."<br/>";
  // CHECKING IF THE USER WHO IS TRYING TO ACCESSING THIS PAGE IS FROM OUR DATABASE

    $check_username = sprintf("SELECT userid FROM user WHERE user_login = '$user_login'|| user_email = '$user_email' || phone = '$phone' AND user_password= '$user_password' LIMIT 1");
      $username_exit = mysqli_query($connect,$check_username);
        $username_found = mysqli_num_rows($username_exit);
        

          $call_name = sprintf("SELECT * FROM user WHERE user_login = '$user_login'|| user_email = '$user_email' || phone = '$phone' AND user_password= '$user_password' LIMIT 1");
      $call_name_exit = mysqli_query($connect,$call_name);
        $fetchies_row = mysqli_fetch_assoc($call_name_exit);
          $user_logins = $fetchies_row['user_login'];
          $user_levels = $fetchies_row['user_level'];

        if ($username_found == 0) {
          //header("Location:" .base_url("?rdir=No_access"));
          //header("Location: ../index.php?");
            // exit();

            if(session_destroy()){
             header("Location:" .base_url("html/error.html?rdir=you_log_out"));
              exit();
            } 
        } 

        if(!empty($username_exit)){
          $activate_profile = sprintf("SELECT status_switch FROM user WHERE status_switch = '0' AND user_login = '$user_login'|| user_email = '$user_email' || phone = '$phone' LIMIT 1");
          $activate_profile_query = mysqli_query($connect, $activate_profile) or die("Critical issues at the user status function.."." ".mysqli_error($connect));
          $activate_profile_result = mysqli_num_rows($activate_profile_query);

      
          if($activate_profile_result==0){
            if(session_destroy()){
    
              header("Location:" .base_url("html/error.html?rdir=you_log_out"));
            }else{
              header("LOCATION:".base_url("aosadmin/home.php?Admin_rdir=Welcom&&Successful_Active_into/NG_log=1_".$user));
            }
          }
          
        }


        

?>  