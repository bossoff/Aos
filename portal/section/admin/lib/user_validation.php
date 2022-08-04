<?php
session_start();
  //CHINKING IF WHO IS TRYING TO THIS PAGE IS THE RIGHT PERSON
   if (!isset($_SESSION['userid']) || !isset($_SESSION['user_login']) || !isset($_SESSION['user_email']) || !isset($_SESSION['phone'])) {
      //header("Location: ../index.php?rdir=you_log_out"); 
      // header("Location:" .base_url("?rdir=you_log_out"));
      if(session_destroy()){
       header("Location:" .base_url("html/session_expired.html?rdir=0"));
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
  // MY DB CONNECTION
 // include "dbconnect/database.php";
  // CHECKING IF THE USER WHO IS TRYING TO ACCESSING THIS PAGE IS FROM OUR DATABASE
   $check_username = sprintf("SELECT userid FROM user WHERE user_login = '$user_login'|| user_email = '$user_email' || phone = '$phone' AND user_password= '$user_password' LIMIT 1");
      $username_exit = mysqli_query($connect,$check_username);
        $username_found = mysqli_num_rows($username_exit);

        if ($username_found == 0) {
          //header("Location:" .base_url("?rdir=No_access"));
          //header("Location: ../index.php?");
            // exit();

            // if(session_destroy()){
            //  header("Location:" .base_url("html/error.html?rdir=you_log_out"));
            //  exit();
            // } 
        } 
?>
