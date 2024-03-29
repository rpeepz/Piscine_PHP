<?php
    session_start();
    $csv = array_map('str_getcsv', file('resources/data.csv'));
    if (!isset($_SESSION['logged_user']) && !isset($_COOKIE)) {
        print "setting cookies<br>";
        setcookie("total_items", 0, time() + 3600, '/');
        setcookie("total_price", 0, time() + 3600, '/');
    } else if ($_GET['empty'] == "true" ||
    (!isset($_COOKIE) && isset($_SESSION['logged_user']))) {
        unset($_COOKIE['total_items']);
        unset($_COOKIE['total_price']);
        unset($_COOKIE['cart']);
        unset($_COOKIE);
        setcookie("cart", "", time() - 3600);
        setcookie("total_price", "", time() - 3600);
        setcookie("total_items", "", time() - 3600);
        header('Refresh: 0; URL = shop_front.php');
    }

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/account.css">
	<link rel="stylesheet" type="text/css" href="css/button.css">
	<link rel="stylesheet" type="text/css" href="css/image.css">
	<link rel="stylesheet" type="text/css" href="css/website.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<title>website</title>
	<style>
		body {background-color: rgb(110, 190, 228);
		border-bottom-color: rgb(117, 171, 221);}
	</style>
</head>
<body style="margin-top: 0px;margin-bottom: 0px;">
	<div class="white-block top-block">
		<div class="top-left">
			<a href="index.html">
            <img src="resources/cropped-icon2.png" id="home" alt="shop-home" title="home page"></a>
			<a href="php/basket.php">
					<img src="resources/kisspng-shopping-cart-software-computer-icons-mayline-5b3b72a8c24351.5594516515306226327957.png" id="basket" alt="basket" title="basket"></a>
			<div class="dropdown">
				<button class="dropbtn">
					<img src="resources/person-icon.png" height="35">
				</button>
				<div class="dropdown-content">
					<a href="php/whoami.php">
						veiw account</a>
					<a href="login.html">
						login</a>
					<a href="php/logout.php">
						logout</a>
					</div>
				</div>
			</div>
			<img src="resources/shop.png" id="banner" alt="shop-banner">
		</div>
		<div class="mid">
			<div class="white-block shop-block">

                <div class="navbar">
			    	<div class="dropCdown">
				      <button class="dropCbtn">Categories<i class="fa fa-caret-down"></i></button>
				        <div class="dropCdown-content">
                            <a href="shop_front.php">Default</a>
					       <a href="shop_front.php?sort=50">$0 - $50</a>
					       <a href="shop_front.php?sort=50-100">$50-$100</a>
                           <a href="shop_front.php?sort=100">Above $100</a>
				        </div>
				    </div> 
                 </div>

                 <table id="shop-table">
        <?php
        // Brakes
            if (!isset($_GET['sort']) || (isset($_GET['sort']) && $_GET['sort'] == "50")) { ?>
            <tr>
                <th><img src="resources/shop/brakes.jpg" id="brakes" alt="brakes">
                    <br><?php print $csv[1][0] ?>
                    </th>
                <td>$<?php print $csv[1][1] ?></td>
                    <td>Available: 
        <?php
            if ($csv[1][2] == 0) print "No"; else if ($csv[1][2] < 5) print "low"; else print "Yes"; ?></td>
                <td><a href="php/add.php?item=1">Add to Basket</td>
            </tr>
        <?php } ?>
        
        <?php
        // Clutch
            if (!isset($_GET['sort']) || (isset($_GET['sort']) && $_GET['sort'] == "100")) { ?>
            <tr>
                <th><img src="resources/shop/clutch.jpg" id="clutch" alt="clutch">
                    <br><?php print $csv[2][0] ?>
                    </th>
                <td>$<?php print $csv[2][1] ?></td>
                    <td>Available: 
        <?php
            if ($csv[2][2] == 0) print "No"; else if ($csv[2][2] < 5) print "low"; else print "Yes"; ?></td>
                <td><a href="php/add.php?item=2">Add to Basket</td>
            </tr>
        <?php } ?>


        <?php
        // Alternator
            if (!isset($_GET['sort']) || (isset($_GET['sort']) && $_GET['sort'] == "50-100")) { ?>
            <tr>
                <th><img src="resources/shop/Car-Alternator.jpg" id="alternator" alt="alternator">
                    <br><?php print $csv[3][0] ?>
                    </th>
                <td>$<?php print $csv[3][1] ?></td>
                    <td>Available: 
        <?php
            if ($csv[3][2] == 0) print "No"; else if ($csv[3][2] < 5) print "low"; else print "Yes"; ?></td>
                <td><a href="php/add.php?item=3">Add to Basket</td>
            </tr>
        <?php } ?>

        <?php
        // Ac compressor
            if (!isset($_GET['sort']) || (isset($_GET['sort']) && $_GET['sort'] == "50")) { ?>
            <tr>
                <th><img src="resources/shop/ac_compressor.jpg" id="aircon" alt="aircon">
                    <br><?php print $csv[4][0] ?>
                    </th>
                <td>$<?php print $csv[4][1] ?></td>
                    <td>Available: 
        <?php
            if ($csv[4][2] == 0) print "No"; else if ($csv[4][2] < 5) print "low"; else print "Yes"; ?></td>
                <td><a href="php/add.php?item=4">Add to Basket</td>
            </tr>
        <?php } ?>

        <?php
        // Headlight
            if (!isset($_GET['sort']) || (isset($_GET['sort']) && $_GET['sort'] == "50-100")) { ?>
            <tr>
                <th><img src="resources/shop/led_headlight.png" id="led-light" alt="led-light">
                    <br><?php print $csv[5][0] ?>
                    </th>
                <td>$<?php print $csv[5][1] ?></td>
                    <td>Available: 
        <?php
            if ($csv[5][2] == 0) print "No"; else if ($csv[5][2] < 5) print "low"; else print "Yes"; ?></td>
                <td><a href="php/add.php?item=5">Add to Basket</td>
            </tr>
        <?php } ?>

        <?php
        // Good Turbo
            if (!isset($_GET['sort']) || (isset($_GET['sort']) && $_GET['sort'] == "100")) { ?>
            <tr>
                <th><img src="resources/shop/precision_turbo.jpg" id="p-turbo" alt="turbo">
                    <br><?php print $csv[6][0] ?>
                    </th>
                <td>$<?php print $csv[6][1] ?></td>
                    <td>Available: 
        <?php
            if ($csv[6][2] == 0) print "No"; else if ($csv[6][2] < 5) print "low"; else print "Yes"; ?></td>
                <td><a href="php/add.php?item=6">Add to Basket</td>
            </tr>
        <?php } ?>

        <?php
        // Headlight
            if (!isset($_GET['sort']) || (isset($_GET['sort']) && $_GET['sort'] == "100")) { ?>
            <tr>
                <th><img src="resources/shop/rims.png" id="rims" alt="rims">
                    <br><?php print $csv[7][0] ?>
                    </th>
                <td>$<?php print $csv[7][1] ?></td>
                    <td>Available: 
        <?php
            if ($csv[7][2] == 0) print "No"; else if ($csv[7][2] < 5) print "low"; else print "Yes"; ?></td>
                <td><a href="php/add.php?item=7">Add to Basket</td>
            </tr>
        <?php } ?>

        <?php
        // Small Turbo
            if (!isset($_GET['sort']) || (isset($_GET['sort']) && $_GET['sort'] == "100")) { ?>
            <tr>
                <th><img src="resources/shop/small_turbo.jpg" id="generic-turbo" alt="turbo">
                    <br><?php print $csv[8][0] ?>
                    </th>
                <td>$<?php print $csv[8][1] ?></td>
                    <td>Available: 
        <?php
            if ($csv[8][2] == 0) print "No"; else if ($csv[8][2] < 5) print "low"; else print "Yes"; ?></td>
                <td><a href="php/add.php?item=8">Add to Basket</td>
            </tr>
        <?php } ?>

                </table>
            </div>
            <button style="margin-left: 48%; margin-top: 5px; margin-bottom: 5px">
                <a href="index.html">back
            </button>
            <div class="white-block foot-block" style="margin-bottom: 10px">
                <a href="http://www.facbook.com">
                <img src="resources/Facebook-icon.png" id="icon" alt="facebook"></a>
                <a href="http://www.instagram.com">
                <img src="resources/orange.png" id="icon" alt="instagram"></a>
                <a href="http://www.twitter.com">
                <img src="resources/twitter-icon-61380.png" id="icon" alt="twitter"></a>
            </div>
        </div>
    </body>
</html>