
<?php
    session_start();
?>
<html lang = "en">
	<head>
        <title>Modif</title>
        <link rel="stylesheet" type="text/css" href="../css/account.css">
	</head>
	<body>
		<div class = "container form-signin">
            <?php
    // print_r ($_SESSION);
   if ($_POST['submit'] == 'confirm' && $_POST['confirm'] == "No") {
        print "Password change aborted<br><br>";
        print "redirecting...";
        header('Refresh: 2; URL = admin.php');
        exit();
    }
	else if ("admin" == $_SESSION['logged_user']){
                $msg = '';
                if ($_POST['submit'] == 'adminOK') {
                    $_SESSION['admin_change_login'] = $_POST['login'];
                    $_SESSION['admin_change_newpw'] = hash(sha256, $_POST['newpw']);
                }
                $path = "../htdocs/private";
                $file = $path."/passwd";
                $unserialized = unserialize(file_get_contents($file));
                $flag = 0;
                foreach ($unserialized as $key=>$elem) {
                    if ($elem['login'] == $_SESSION['admin_change_login']) {
                        $unserialized["$key"]['passwd'] = $_SESSION['admin_change_newpw'];
                        $flag = 1;
                    }
                }
                if ($flag == 1 && $_POST['submit'] == 'adminOK') {
                    print "Change password for ".$_SESSION['admin_change_login'];
                    ?>
                    <form class="form-signin" method="post" action="modif_admin.php">
                        Confirm New Password:
                        <input type="password" class="form-control" name="conpw" required>
                        <br>
                        <input type="radio" name="confirm" required
                        <?php if (isset($gender) && $gender=="No") echo "checked";?>
                        value="No">No
                        <input type="radio" name="confirm"
                        <?php if (isset($gender) && $gender=="Yes") echo "checked";?>
                        value="Yes">Yes
                        <br>
                        <br>
                        <input type="submit" value="confirm" name="submit">
                    </form>
                    <?php
                }
                else if ($flag == 0 && $_POST['submit'] == 'adminOK')
                    print "<br>Login '".$_SESSION['admin_change_login']."' doesnt exist<br>";
                if ($_POST['submit'] == 'confirm') {
                    if (hash(sha256, $_POST['conpw']) == $_SESSION['admin_change_newpw'])
                        $change = 1;
                    else
                        $change = 0;
                    if ($change == 1 && $flag == 1) {
                        $serialized = serialize($unserialized);
                        file_put_contents($file, $serialized);
                        print "<br> '".$_SESSION['admin_change_login']."' password changed<br><br>";
                        $_SESSION['admin_change_login'] = "";
                        $_SESSION['admin_change_newpw'] = "";
                    } else {
                        print "password confirmation failed<br><br>";
                        print "redirecting...";
                        header('Refresh: 2; URL = admin.php');
                        exit();
                    }
                }
            } else {
                print "forbidden<br>";
                header('Refresh: 2; URL = ../index.html');
                exit();
            }
                ?>
			Click here to <a href="admin.php" tite="back">go back.
                </div>
	</body>
</html>