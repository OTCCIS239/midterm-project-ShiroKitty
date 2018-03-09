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
        <div class="grid-x iHeaders">
            <div class="cell small-4 indexHeader"><h2>Products</h2></div>
            <div class="cell small-4 indexHeader"><h2>Orders</h2></div>
            <div class="cell small-4 indexHeader"><h2>Shipped Orders</h2></div>
        </div>
        <div class="grid-x">
            <div class="cell small-4"><h4>Come take a look at the quality guitars we have for sale. I promise you won't be disappointed!</h4></div>
            <div class="cell small-4"><h4>Products</h4></div>
            <div class="cell small-4"><h4>Products</h4></div>
        </div>
    </div>
    <script src="scripts/app.js"></script>
</body>
</html>
