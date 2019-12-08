
<?php
	session_start();
?>
<html lang = "en">
	<head>
		<title>Modif</title>
	</head>
	<body>
		<div class = "container form-signin">
			
			<?php
	if ($_POST['login'] == $_SESSION['logged_user']){
                $msg = '';
				$tab['login'] = $_POST['login'];
				$tab['newpw'] = hash(sha256, $_POST['newpw']);
				$tab['oldpw'] = hash(sha256, $_POST['oldpw']);
                
				$path = "../htdocs/private";
				$file = $path."/passwd";
				
				$unserialized = unserialize(file_get_contents($file));
				$flag = 0;
				$exists = 1;
				foreach ($unserialized as $key=>$elem) {
                    if ($elem['login'] == $tab['login']) {
						$exists = 1;
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
					print $_SESSION['logged_user']." password changed<br>";
				} else if ($flag == -1) {
					print "Incorrect password entered<br>";
					print "<br>redirecting...";
					header('Refresh: 2; URL =whoami.php');
					exit();
				} else
                print "Login doesnt match<br>";
            } else {
				if ($exists == 0) {
					print $_POST['login']." doesnt exist in our system<br>";
				} else {
					print "unable to change password<br>";
					print "You're not logged in as ".$_POST['login'];
				}
                print "<br>redirecting...";
                header('Refresh: 2; URL =whoami.php');
                exit();
            }
                ?>
			Click here to <a href="../index.html" tite="back">go back.
                </div>
	</body>
</html>