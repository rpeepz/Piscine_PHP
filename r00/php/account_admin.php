
<?php
	session_start();
?>
<html lang = "en">
	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/account.css">
	</head>
	<body>
		<div class = "container form-signin">
			<?php
	if ("admin" == $_SESSION['logged_user'] && $_POST['submit'] == 'adminOK') {
                $to_del = $_POST['login'];
				$path = "../htdocs/private";
				$file = $path."/passwd";
				$unserialized = unserialize(file_get_contents($file));
				$flag = 0;
				foreach ($unserialized as $key=>$elem)
					if ($elem['login'] == $to_del)
						$flag = 1;
					if ($to_del == "admin") {
						print "What are you doing?<br>";
						print "You cant delete admin SMH ...<br>";
						print "<br>redirecting...";
						header('Refresh: 3; URL = admin.php');
						exit();
					}
					if ($flag == 1) {
						print "'".$to_del."' will be deleted<br>";
						foreach ($unserialized as $key=>$elem)
							if ($elem['login'] == $to_del) {
								unset($unserialized["$key"]);
					}
					print_r ($unserialized);
                    $serialized = serialize($unserialized);
					file_put_contents($file, $serialized);
					print "'".$to_del."' deleted<br>";
				} else {
					print "user '".$to_del."' not found<br>";
					print "<br>redirecting...";
					header('Refresh: 2; URL = admin.php');
					exit();
				}
            } else {
                print "unfinished page<br>ignore this option :) <br>";
                print "<br>redirecting...";
                header('Refresh: 1; URL = ../index.html');
                exit();
            }
				?>
				<br><br>
			<a href="admin.php" tite="back">go back.
                </div>
	</body>
</html>