<?PHP
    session_start();
if (isset($_SESSION['logged_user']) && $_SESSION['logged_user'] != NULL)
	print ($_SESSION['logged_user']."\n");
else
    print "ERROR<br>";
    print "<br>redirecting...";
    header('Refresh: 2; URL = login.php');
?>