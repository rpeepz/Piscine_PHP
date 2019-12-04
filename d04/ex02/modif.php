
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
		<link rel="stylesheet" type="text/css" href="account.css">
	</head>
	<body>
		<div class = "container form-signin">
			<?php
				$msg = '';
				$tab['login'] = $_POST['login'];
				$tab['newpw'] = hash(sha256, $_POST['newpw']);
				$tab['oldpw'] = hash(sha256, $_POST['oldpw']);

				$path = "../htdocs/private";
				$file = $path."/passwd";
				
				$unserialized = unserialize(file_get_contents($file));
				$flag = 0;
				foreach ($unserialized as $key=>$elem) {
					if ($elem['login'] == $tab['login']) {
						if ($elem['passwd'] == $tab['oldpw']) {
							$unserialized["$key"]['passwd'] = $tab['newpw'];
							$flag = 1;
						}
						else {
							$flag = -1;
							break;
						}
					}
				}
				if ($flag == 1) {
					$serialized = serialize($unserialized);
					file_put_contents($file, $serialized);
					print "OK password changed<br>";
				} else if ($flag == -1) {
					// bad password
					print "AMBIGUOUS ERROR2<br>Login or Password invalid<br>";
					header('Refresh: 2; URL = index.html');
					exit();
				} else {
					// bad login
					print "AMBIGUOUS ERROR1<br>Login or Password invalid<br>";
					header('Refresh: 2; URL = index.html');
					exit();
				}
			?>
			Click here to <a href="index.html" tite="back">go back.
		</div>
	</body>
</html>