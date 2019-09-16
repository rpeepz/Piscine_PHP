<?php
session_start();
$csv = array_map('str_getcsv', file('../resources/data.csv'));

if (isset($_SESSION['logged_user'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['total_items'] = 1;
        $_SESSION['total_price'] = $csv[5][1];
        $_SESSION['cart'] = array($csv[5][0]);
    } else {
        $_SESSION['total_items'] += 1;
        $_SESSION['total_price'] += $csv[5][1];
        array_push($_SESSION['cart'], $csv[5][0]);
    }
    $fout = fopen('../resources/data.csv', 'w');
    $to_write = "";
    $cvs_implode = "";
    foreach  ($csv as $lines) {
        if ($csv[5][0] == $lines[0]) {
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
    print "Added ".$csv[5][0]." to cart!";
    header('Refresh: 2; URL = ../shop_front.php');
}
else {
    print "ERROR<br>";
    print "must have account to add item to cart\n";
    header('Refresh: 2; URL = ../login.html');
}
?>