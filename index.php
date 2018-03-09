<?php

require_once('./includes/init.php');
require_once('./includes/db.php');

$queryOrders = 'SELECT * FROM orders';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/guitarBrown.ico">
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="css/foundation.css" type="text/css">
    <link rel="stylesheet" href="css/app.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php include('./includes/navbar.php') ?>
    <div class="grid-container">
        <div class="grid-x iHeaders padMe">
            <div class="cell small-5 indexHeader iLeft">
                <h2>Products</h2>
            </div>
            <div class="cell small-5 indexHeader iRight">
                <h2>Orders</h2>
            </div>
        </div>
        <div class="grid-x">
            <div class="cell small-5 indexBody iLeft">
                <h4>Here you'll find an inventory of all our products.</h4>
                <div>
                    <a href="orders.php" class="button expand navBtn">Go To Products</a>
                </div>
            </div>
            <div class="cell small-5 indexBody iRight">
                <h4>This is where you'll find detailed information on customer orders.</h4>
                <div>
                    <a href="orders.php" class="button expand navBtn">Go To Orders</a>
                </div>
            </div>
        </div>
    </div>
    <script src="scripts/app.js"></script>
</body>
</html>
