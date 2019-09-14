<?php
   session_start();
   session_destroy();
   unset($_SESSION);
   print "logout successful<br>redirecting...";
   header('Refresh: 2; URL = ../index.html');
?>