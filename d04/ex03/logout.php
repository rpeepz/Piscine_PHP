<?php
   session_start();
   $_SESSION['logged_user'] = "";
   print "logout successful<br>redirecting...";
   header('Refresh: 2; URL = login.php');
?>