
<?php
/*
    Laravel collections - illuminate/support
    http://carbon.nesbot.com/docs/#api-comparison
*/
use Carbon\Carbon;
// $carbon = new Carbon();
require_once('./includes/init.php');
require_once('./includes/db.php');

$getOrders = filter_input(INPUT_GET, 'gopher', FILTER_VALIDATE_INT);

//pulls data from products, orderitems, orders, customers, and addresses
$queryProducts = 'SELECT * FROM products
INNER JOIN orderItems on products.productID = orderItems.productID
INNER JOIN orders ON orderItems.orderID = orders.orderID
INNER JOIN customers ON orders.customerID = customers.customerID
INNER JOIN addresses ON addresses.addressID = customers.billingAddressID';

    $statement = $conn -> prepare($queryProducts);
    $statement -> bindValue(':gopher', $getOrders);
    $statement -> execute();
    $orders = $statement -> fetchAll();
    $statement -> closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/guitarBrown.ico">
    <title>Orders</title>
    <link rel="stylesheet" href="css/foundation.css" type="text/css">
    <link rel="stylesheet" href="css/app.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php include('./includes/navbar.php') ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Order Date</th>
        </tr>
        <?php foreach($orders as $order) : ?>
                <tr class="dbRow" onclick="displayOrder(`<?= $order['orderDate'] ?>`, `<?= $order['shipDate'] ?>`, <?= $order['cardNumber'] ?>, `<?= $order['line1'] ?>`, <?= $order['listPrice'] ?>, <?= $order['discountAmount'] ?>, <?= $order['taxAmount'] ?>, <?= $order['shipAmount'] ?>)">
                    <td><?php echo ($order['firstName'] . ' ' . $order['lastName']); ?></td>
                    <td><?php echo $order['emailAddress']; ?></td>
                    <td><?php 
                            // Carbon::setToStringFormat();
                            echo Carbon::parse($order['orderDate']); 
                        ?></td>
                </tr>
        <?php endforeach; ?>
    </table>
    <div class="grid-container">
        <div class="grid-x">
            <div class="button-group expanded stacked-for-small">
                <a href="ordersInfo.php" class="button navBtn">Detailed Order View</a>
                <a href="unshipped.php" class="button navBtn">Show Unshipped Orders</a>
            </div>
        </div>
    </div>
    <script src="scripts/app.js"></script>
</body>
</html>
