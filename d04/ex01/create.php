
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
		<title>Create</title>
		<link rel="stylesheet" type="text/css" href="account.css">
	</head>
	<body>
		<div class = "container form-signin">
			<?php
				// $path = "../htdocs/private";
				// $file = $path."/passwd";
				// if (!file_exists($path)) {
				// 	mkdir ("../htdocs/");
				// 	mkdir ($path);
				// }
				// output session info to file
				$msg = '';
				if (!empty($_POST['login']) && !empty($_POST['passwd'])) {
					if (!isset($_SESSION['login'])) {
						$_SESSION['login'] = $_POST['login'];
						$_SESSION['passwd'] = $_POST['passwd'];
						$_SESSION['timeout'] = time() + 3600;
						$_SESSION['valid'] = true;
						print "Account create success!<br>";
					} else {
						if ($_POST['login'] == $_SESSION['login']
						&& $_POST['passwd'] == $_SESSION['passwd']) {
							$msg = "Account Exists!";
						}
						else {
							$msg = 'Wrong username or password';
						}
					}
					$tab['login'] = $_SESSION['login'];
					$tab['passwd'] = hash(sha256, $_SESSION['passwd']);
				} else {
					print "ERROR<br>";
					exit();
				}
			?>
		</div>
		<div class = "container">
			<form class="form-signin" role="form" method="post">
				<h4 class="form-signin-heading"><?php echo $msg; ?></h4>
				Username: <br>
				<input type="text" class="form-control" name="login" required autofocus>
				<br>
				Password: <br>
				<input type="password" class="form-control" name="passwd" required>
				<button class = "btn btn-lg btn-primary btn-block" type="submit"
					name="submit" value="OK">Login</button>
			</form>
			Click here to clean <a href = "logout.php" tite = "Logout">Session.
		</div>
	</body>
</html>