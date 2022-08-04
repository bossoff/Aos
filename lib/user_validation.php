<?php
session_start();
  //CHINKING IF WHO IS TRYING TO THIS PAGE IS THE RIGHT PERSON
  if (!isset($_SESSION['email'])) {
    //header("Location: ../index.php?rdir=you_log_out"); 
    header("Location: ../index.php?rdir=you_log_out"); 
    exit();
  }

  // WE ARE TRYING TO FILTER EVERYTHING 
  preg_replace('#[^0-9]#i', '', $_SESSION['email']);
  preg_replace('#[^a-zA-Z]#i', '', $_SESSION['email']);
  preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION['email']);
  preg_match("/^[a-zA-Z ]*$/", $_SESSION['email']);
  // MY DB CONNECTION
  include "dbconnect/database.php";
  // CHECKING IF THE USER WHO IS TRYING TO ACCESSING THIS PAGE IS FROM OUR DATABASE
    $email = $_SESSION['email'];

    $check_username = "SELECT * FROM admin WHERE email = '$email' || phone = '$email' || username = '$email' ";
      $username_exit = mysqli_query($connect,$check_username);
        $username_found = mysqli_num_rows($username_exit);

        if ($username_found == 0) {
          header("Location: ../ab_login.php?rdir=No_access");
            exit();
        }  
?>

?>