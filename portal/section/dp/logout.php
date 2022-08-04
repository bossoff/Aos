<?php
// Initialize the session.
require "connection/function.php";
    
   // Unset all of the session variables.
    $_SESSION = array();
    
    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (isset($_COOKIE[session_name()])) {
       setcookie(session_name(), '', time()-42000, '/');
    }
    
    // Finally, destroy the session.
    //session_destroy();
    // Destroying All Sessions
    if(session_destroy()){
      //header("Location: ../index.php?rdr=Home"); // Redirecting To Home Page
      header("LOCATION: ".base_home('?rdr=logout'));
        exit;
      }

      //echo "<script>alert('Welcome Back Home')</script>";

    //header("Location: index.php?log=out");
?>
<meta http-equiv="refresh" content="0; ../index.php" />