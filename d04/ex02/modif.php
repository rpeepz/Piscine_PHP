
<?php
	ob_start();
	session_start();
?>
<?
	// error_reporting(E_ALL);
	// ini_set("display_errors", 1);
?>
<html lang = "en">
	<head>
		<title>Modif</title>
	</head>
	<body>
		<div class = "container form-signin">
            <?php
				$msg = '';
				if (!empty($_POST['oldpw']) && !empty($_POST['newpw'])) {
                    if (!isset($_SESSION['login'])) {
						$msg = "Session invalid, please create an account<br>";
					} else {
                        if ($_POST['oldpw'] == $_SESSION['passwd']
                        && $_POST['newpw'] != $_POST['oldpw']) {
                            $_SESSION['passwd'] = $_POST['newpw'];
                            $msg = "Password changed<br>";
                        } else {
							$msg = 'Password format incorrect<br>';
						}
					}
				} else {
					print "ERROR<br>";
					exit();
				}
			?>
		</div>
		<div class = "container">
			<form class="form-signin" role="form" method="post">
				<h4 class="form-signin-heading"><?php echo $msg; ?></h4>
				old password: <br>
				<input type="text" class="form-control" name="oldpw" required autofocus>
				<br>
				new password: <br>
				<input type="password" class="form-control" name="newpw" required>
				<button class = "btn btn-lg btn-primary btn-block" type="submit"
					name="submit" value="OK">Login</button>
			</form>
			Click here to clean <a href = "logout.php" tite = "Logout">Session.
		</div>
	</body>
</html>