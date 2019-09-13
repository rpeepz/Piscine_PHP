<?PHP
	session_start();
	$_SESSION["newsession"] = $value;
?>
<html>

	<head>
		<title>Session</title>
	</head>

	<body>
	<?PHP
		$submit = $_GET['submit'];
		if (isset($_GET['login']) && $_GET['login'] != NULL &&
			isset($_GET['passwd']) && $_GET['passwd'] &&
			$_GET['submit'] && $_GET['submit'] === "OK") {
			$_SESSION['login'] = $_GET['login'];
			$_SESSION['passwd'] = $_GET['passwd'];
		}
	?>
	<form method="get" action="index.php">
		Username: <br>
		<input type="text" name="login" value="<?PHP print $_SESSION['login'];?>">
		<br>
		Password: <br>
		<input type="text" name="passwd" value="<?PHP print $_SESSION['passwd'];?>">
		<br>
		<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>
		 