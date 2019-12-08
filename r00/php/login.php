<?PHP
    include 'auth.php';
    session_start();

    $tab['login'] = $_POST['login'];
    $tab['passwd'] = hash("sha256", $_POST['passwd']);
    $path = "../htdocs/private";
    $file = $path."/passwd";

    if (!file_exists($path)) {
        mkdir ("htdocs/");
        mkdir ($path);
    }
    if (!file_exists($file)) {
        $tab = NULL;
    } else {
        // print "<br>post - login: ".$_POST['login']."<br>";
        // print "<br>post - pass: ".$_POST['passwd']."<br>";
        // print "<br>session - login: ".$_SESSION['login']."<br>";
        // print "<br>session - pass: ".$_SESSION['passwd']."<br>";
        $unserialized = unserialize(file_get_contents($file));
        foreach ($unserialized as $elem) {
            foreach ($elem as $login=>$value) {
                if ($value == $tab['login']) {
                    if ($tab['passwd'] == $elem['passwd']){
                        if (!isset($_SESSION['logged_user'])) {
                            $_SESSION['logged_user'] = $tab['login'];
                            $_SESSION['passwd'] = $tab['passwd'];
                            $_SESSION["pwtry"] = 0;
                            if (isset($_COOKIE['cart']))
                            {
                                print "updating cart<br>";
                                $_SESSION['cart'] = $_COOKIE['cart'];
                                $_SESSION['total_items'] = $_COOKIE['total_items'];
                                $_SESSION['total_price'] = $_COOKIE['total_price'];
                                unset( $_COOKIE['total_items']);
                                unset($_COOKIE['total_price']);
                                unset($_COOKIE['cart']);
                                unset($_COOKIE);
                                setcookie("cart", "", time() - 3600);
                                setcookie("total_price", "", time() - 3600);
                                setcookie("total_items", "", time() - 3600);
                            }
    
                            print "Successfuly logged in as '".$_SESSION['logged_user']."'<br>";
                            header('Refresh: 1; URL = ../index.html');
                            exit();
                        } else {
                            print "Already logged in as ".$_SESSION['logged_user']."<br>redirecting...";
                            header('Refresh: 1; URL = ../index.html');
                            exit();
                        }
                    } else {
                        $_SESSION["pwtry"] += 1;
                        print "Incorrect password<br>attempts: ".$_SESSION['pwtry']."...";
                        header('Refresh: 2; URL = ../login.html');
                        exit();
                    }
                }
            }
        }
    }
    ?>
        <html>
            <head>
                <title>Login</title>
                <link rel="stylesheet" type="text/css" href="../css/account.css">
            </head>
            <body>
                <div class="container form-signin">
    <?PHP
    print "The name '".$_POST['login']."' is unregistered<br>";
    print "Create an account to continue";
    ?>
        <form class="form-signin" role="form" method="post" action="create.php">
            Username: <br>
            <input type="text" class="form-control" name="login" required autofocus>
            <br>
            Password: <br>
            <input type="password" class="form-control" name="passwd" required>
            <br>
            <button type="submit" name="create">Create Account<br></button>
            <button>
                <a href="../index.html" tite="back"> BACK</a>
                    </button>
                </form>
            </div>
	    </body>
    </html>
		 