<?php
require_once('./includes/init.php');
require_once('./includes/db.php');

$queryOrders = 'SELECT * FROM orders'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="css/foundation.css" type="text/css">
    <link rel="stylesheet" href="css/app.css" type="text/css">
</head>
<body>
    <h2>Tj's Guitar Shop</h2>
   
    <div>
        <nav>
           <ul> 
               <li>Guitars</li>
               <li>Basses</li>
               <li>Drums</li>
               <li>Orders</li>
           </ul> 
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="scripts/guitar-shop.js"></script>
</body>
</html>