<?PHP
    session_start();
if (isset($_SESSION['logged_user']) && $_SESSION['logged_user'] != NULL)
	print "Logged in as '".($_SESSION['logged_user']."'<br>");
else
    print "ERROR<br>";
    print "<br>redirecting...";
    header('Refresh: 2; URL = ../index.html');
?>