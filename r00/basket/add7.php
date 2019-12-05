<?php
session_start();
$csv = array_map('str_getcsv', file('../resources/data.csv'));
?>
<html lang = "en">
	<head>
		<title>add</title>
		<link rel="stylesheet" type="text/css" href="../css/account.css">
	</head>
	<body>
        <div class = "container form-signin">
            <?php
if (isset($_SESSION['logged_user'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['total_items'] = 1;
        $_SESSION['total_price'] = $csv[7][1];
        $_SESSION['cart'] = array($csv[7][0]);
    } else {
        if ($csv[7][2] == 0) {
            print "Out of stock sorry!<br><br>";
            print "sending shop page";
            header('Refresh: 2; URL = ../shop_front.php');
            exit();
        }
        $_SESSION['total_items'] += 1;
        $_SESSION['total_price'] += $csv[7][1];
        array_push($_SESSION['cart'], $csv[7][0]);
    }
    $fout = fopen('../resources/data.csv', 'w');
    $to_write = "";
    $cvs_implode = "";
    foreach  ($csv as $lines) {
        if ($csv[7][0] == $lines[0]) {
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
    print "Added ".$csv[7][0]." to cart!<br>";
    // header('Refresh: 2; URL = ../shop_front.php');
    ?>
    <button>
        <a href="../shop_front.php" tite="back"> BACK</a>
    </button>
    <?php
}
else {
    print "ERROR<br><br>";
    print "not logged in. sending login page";
    header('Refresh: 2; URL = ../login.html');
}
?>
</body>
</html>