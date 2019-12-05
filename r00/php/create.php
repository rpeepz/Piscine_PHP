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
		<link rel="stylesheet" type="text/css" href="../css/account.css">
	</head>
	<body>
		<div class = "container form-signin">
			<?php
				// $msg = '';
			$tab['login'] = $_POST['login'];
			$tab['passwd'] = hash(sha256, $_POST['passwd']);

				// print($tab['login']);
			$path = "../htdocs/private";
			$file = $path."/passwd";
				
			if (!file_exists($path)) {
				mkdir ("../htdocs/");
				mkdir ($path);
			}
			if (!file_exists($file)) {
				$unserialized[] = $tab;
				$serialized[] = serialize($unserialized);
				file_put_contents($file, $serialized);
			} else {
				$unserialized = unserialize(file_get_contents($file));
				foreach ($unserialized as $elem) {
					foreach ($elem as $login=>$value) {
						if ($value == $tab['login']) {
							print "ERROR\n";
							print "duplicate found: '".$value."'<br>redirecting...";
							header('Refresh: 2; URL = ../login.html');
							exit();
						}
					}
				}
				$unserialized[] = $tab;
				$serialized = serialize($unserialized);
				file_put_contents($file, $serialized);
			}
			print "account '".$tab['login']."' created<br><br>";?>
			<a href="../login.html" tite="login">Login now</a>
			<br>
			<br>
			<a href="../index.html" tite="home">Home</a>
		</div>
	</body>
</html>