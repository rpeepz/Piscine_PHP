<?PHP
    session_start();
if (isset($_SESSION['logged_user']) && $_SESSION['logged_user'] != NULL) {
    print "<h4>Logged in as '".($_SESSION['logged_user']."'</h4>");
?>
<div class="container">
			<form class="form-signin" role="form" method="post" action="modif.php">
                Change password?<br>
                Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="form-control" name="login" required autofocus>
				<br>
                old password:&nbsp;&nbsp;
                <input type="password" class="form-control" name="oldpw" required>
				<br>
                new password:
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