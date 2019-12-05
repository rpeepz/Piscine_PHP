<?php
session_start();
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
        print "<h4>Cart</h4>";
        foreach ($_SESSION['cart'] as $item) {
            print "&nbsp;&nbsp;&nbsp;&nbsp;".$item."<br>";
        }
        print "<br>";
        print "<h4>Items :  ".$_SESSION['total_items']."</h4>";
        print "<h4>Total : $".$_SESSION['total_price']."</h4>";
    } else {
        print "Cart is empty!\n";
    }
    
    ?>
    <button>
        <a href="../shop_front.php" tite="back"> BACK</a>
    </button>
    <?php
}
else {
    print "ERROR<br>";
    print "must have account to view cart.";
    print " sending login page";
    header('Refresh: 2; URL = ../login.html');
}
?>
    </body>
</html>