<?PHP
    session_start();
if (isset($_SESSION['logged_user']) && $_SESSION['logged_user'] != NULL && $_SESSION['logged_user'] == "admin") {
print "<h4>Admin page</h4>";

$_SESSION['admin_change_login'] = "";
$_SESSION['admin_change_newpw'] = "";
?>
<html>
	<head>
        <title>admin</title>
        <link rel="stylesheet" type="text/css" href="../css/account.css">
    </head>
	<body>
    <div class="container">
			<form class="form-signin" role="form" method="post" action="modif_admin.php">
                Change anyone's password<br>
                Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" name="login" required>
				<br>
                New Password:
                <input type="password" class="form-control" name="newpw" required>
                <br>
				<button class="btn btn-lg btn-primary btn-block" type="submit"
				name="submit" value="adminOK">Submit</button>
			</form>
			<form class="form-signin" role="form" method="post" action="account_admin.php">
                Delete an account<br>
                Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" name="login" required>
				<br>
				<button class="btn btn-lg btn-primary btn-block" type="submit"
				name="submit" value="adminOK">Submit</button>
            </form>
	</div>
    <button>
        <a href="../index.html" tite="back"> BACK</a>
    </button>
<?php

} else {
    print "forbidden<br>";
    header('Refresh: 2; URL = ../index.html');
}
?>
	</body>
</html>