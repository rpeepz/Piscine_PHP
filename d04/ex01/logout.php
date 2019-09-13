<?php
   session_start();
   unset($_SESSION['login']);
   unset($_SESSION['passwd']);
   
   print "You have cleaned session<br>redirecting...";
   header('Refresh: 2; URL = index.html');
?>