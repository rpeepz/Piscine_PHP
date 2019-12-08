<?php
session_start();
$csv = array_map('str_getcsv', file('../resources/data.csv'));
if ($_GET['item'] == 1){
    $item_name = $csv[1][0];
    $cost = $csv[1][1];
    $item_quantity = $csv[1][2];
} else if ($_GET['item'] == 2){
    $item_name = $csv[2][0];
    $cost = $csv[2][1];
    $item_quantity = $csv[2][2];
} else if ($_GET['item'] == 3){
    $item_name = $csv[3][0];
    $cost = $csv[3][1];
    $item_quantity = $csv[3][2];
} else if ($_GET['item'] == 4){
    $item_name = $csv[4][0];
    $cost = $csv[4][1];
    $item_quantity = $csv[4][2];
} else if ($_GET['item'] == 5){
    $item_name = $csv[5][0];
    $cost = $csv[5][1];
    $item_quantity = $csv[5][2];
} else if ($_GET['item'] == 6){
    $item_name = $csv[6][0];
    $cost = $csv[6][1];
    $item_quantity = $csv[6][2];
} else if ($_GET['item'] == 7){
    $item_name = $csv[7][0];
    $cost = $csv[7][1];
    $item_quantity = $csv[7][2];
} else if ($_GET['item'] == 8){
    $item_name = $csv[8][0];
    $cost = $csv[8][1];
    $item_quantity = $csv[8][2];
}
if (isset($_SESSION['logged_user'])) {
    if (!isset($_SESSION['cart']) && $item_quantity > 0) {
        $_SESSION['total_items'] = 1;
        $_SESSION['total_price'] = $cost;
        $_SESSION['cart'] = $item_name." - $".$cost."\n";
    } else {
        if ($item_quantity == 0) {
            print "Out of stock sorry!<br><br>";
            print "sending shop page";
            header('Refresh: 2; URL = ../shop_front.php');
            exit();
        }
        $_SESSION['total_items'] += 1;
        $_SESSION['total_price'] += $cost;
        $_SESSION['cart'] = $_SESSION['cart'].$item_name." - $".$cost."\n";
    }
} else {
    if ($item_quantity > 0) {
        $items = $_COOKIE['total_items'] + 1;
        $price = $_COOKIE['total_price'] + $cost;
        if (!isset($_COOKIE['cart'])) {
            $cart = $item_name." - $".$cost."\n";
            setcookie('cart', $cart, time() + 3600, '/');
            // setcookie('cart', json_encode($item_name), time() + 3600, '/');
        } else {
            // $cart = json_decode($_COOKIE['cart']);
            $cart = $_COOKIE['cart'].$item_name." - $".$cost."\n";
            // $cart = json_encode($cart);
            setcookie('cart', $cart, time() + 3600, '/');
        }
        setcookie("total_items", $items, time() + 3600, '/');
        setcookie("total_price", $price, time() + 3600, '/');
    } else {
        if ($item_quantity == 0) {
            print "Out of stock sorry!<br><br>";
            print "sending shop page";
            header('Refresh: 2; URL = ../shop_front.php');
            exit();
        }
    }
    // unset($_COOKIE['cart']);
    // print "ERROR<br><br>";
    // print "not logged in. sending login page";
    // header('Refresh: 2; URL = ../login.html');
}
$fout = fopen('../resources/data.csv', 'w');
    $to_write = "";
    $cvs_implode = "";
    foreach  ($csv as $lines) {
        if ($item_name == $lines[0]) {
            $lines[2] -= 1;
            $cvs_implode = implode(",", $lines);
            $to_write = $cvs_implode."\n";
        }
        else {
            $cvs_implode = implode(",", $lines);
            $to_write = $cvs_implode."\n";
        }
        fwrite($fout, $to_write);
    }
    fclose($fout);
    ?>
    <html lang = "en">
	<head>
		<title>add</title>
		<link rel="stylesheet" type="text/css" href="../css/account.css">
	</head>
	<body>
        <div class = "container form-signin">
        Added<?php print " ".$item_name." "; ?> to basket!<br>
        <?php 
        print "<br>redirecting...";
        header('Refresh: 1; URL = ../shop_front.php'); 
        exit();
        ?>
    <button>
        <a href="../shop_front.php" tite="back"> BACK</a>
    </button>
    <?php
?>
</body>
</html>