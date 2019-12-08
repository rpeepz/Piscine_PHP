<?php
session_start();

if ($_GET['empty'] == "true") {
    if (isset($_SESSION['logged_user']) && isset($_SESSION['cart'])) {
        unset($_SESSION['total_items']);
        unset($_SESSION['total_price']);
        unset($_SESSION['cart']);
        header('Refresh: 0; URL = basket.php');
    }
    if (isset($_COOKIE['cart']))
        header('Refresh: 0; URL = ../shop_front.php?empty=true');
    exit();
}
?>

<html lang = "en">
	<head>
		<title>Basket</title>
		<link rel="stylesheet" type="text/css" href="../css/account.css">
	</head>
	<body>
		<div class = "container form-signin">
            
<?php
if (isset($_SESSION['logged_user'])) {
    if (isset($_SESSION['cart'])) {
        print "<h4>Basket</h4>";
        $a = explode("\n", $_SESSION['cart']);
        foreach ($a as $b) {
            $b = trim($b, '"');
            print $b."<br>";
        }
        print "<br>";
        print "<h4>Items :  ".$_SESSION['total_items']."</h4>";
        print "<h4>Total : $".$_SESSION['total_price']."</h4>";
    } else {
        print "Basket is empty!\n";
    }
}
else {
    if (isset($_COOKIE['cart'])) {
        print "<h4>Basket</h4>";
        $a = explode("\n", $_COOKIE['cart']);
        foreach ($a as $b) {
            $b = trim($b, '"');
            print $b."<br>";
        }
        print "<br>";
        print "<h4>Items :  ".$_COOKIE['total_items']."</h4>";
        print "<h4>Total : $".$_COOKIE['total_price']."</h4>";
    } else {
        print "Basket is empty!\n";
    }
    // print "ERROR<br>";
    // print "must have account to view Basket.";
    // print " sending login page";
    // header('Refresh: 2; URL = ../login.html');
}
?>
    <button>
        <a href="../shop_front.php" tite="back"> BACK</a>
    </button>
    <button>
        <a href="basket.php?empty=true" tite="back"> Empty Basket</a>
    </button>
    </body>
</html>