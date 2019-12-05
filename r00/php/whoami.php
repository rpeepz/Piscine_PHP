<?PHP
    session_start();
if (isset($_SESSION['logged_user']) && $_SESSION['logged_user'] != NULL && $_SESSION['logged_user'] == "admin") {
    print "loading admin page";
    header('Refresh: 2; URL = admin.php');
} else if (isset($_SESSION['logged_user']) && $_SESSION['logged_user'] != NULL) {
    print "<h4>Logged in as '".($_SESSION['logged_user']."'</h4>");

?>
<html>
	<head>
        <title>change pass</title>
        <link rel="stylesheet" type="text/css" href="../css/account.css">
    </head>
	<body>
    <div class="container">
			<form class="form-signin" role="form" method="post" action="modif.php">
                Change password?<br>
                Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" name="login" required autofocus>
				<br>
                Old Password:&nbsp;&nbsp;
                <input type="password" class="form-control" name="oldpw" required>
				<br>
                New Password:
                <input type="password" class="form-control" name="newpw" required>
                <br>
				<button class="btn btn-lg btn-primary btn-block" type="submit"
				name="submit" value="OK">Submit</button>
			</form>
	</div>
    <button>
        <a href="../index.html" tite="back"> BACK</a>
    </button>
<?php

} else {
    print "ERROR -";
    print "no user logged in<br>";
    print "<br>redirecting...";
    header('Refresh: 2; URL = ../index.html');
}
?>
	</body>
</html>