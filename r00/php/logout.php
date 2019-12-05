<html>
	<head>
        <title>Logout</title>
        <link rel="stylesheet" type="text/css" href="../css/account.css">
    </head>
	<body>
        <div class="container form-signin">
<?php
   session_start();
   session_destroy();
   unset($_SESSION);
   print "logout successful<br>redirecting...";
   header('Refresh: 2; URL = ../index.html');
?>

</body>
</html>