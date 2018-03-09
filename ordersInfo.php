<?php
require_once('./includes/init.php');
require_once('./includes/db.php');

$getOrders = filter_input(INPUT_GET, 'gopher', FILTER_VALIDATE_INT);

//pulls data from products, orderitems, orders, customers, and addresses
$queryProducts = 'SELECT * FROM products
                INNER JOIN orderitems on products.productID = orderitems.productID
                INNER JOIN orders ON orderitems.orderID = orders.orderID
                INNER JOIN customers ON orders.customerID = customers.customerID
                INNER JOIN addresses ON addresses.addressID = customers.billingAddressID
                    ';
    $statement3 = $conn -> prepare($queryProducts);
    $statement3 -> bindValue(':gopher', $getOrders);
    $statement3 -> execute();
    $orders = $statement3 -> fetchAll();
    $statement3 -> closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="css/foundation.css" type="text/css">
    <link rel="stylesheet" href="css/app.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php include('./includes/navbar.php') ?>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Ship Date</th>
            <th>Credit Card</th>
            <th>Billing Address</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Discount Amt</th>
            <th>Tax Amt</th>
            <th>Shipping</th>
            <th>Total</th>
        </tr>
        <?php foreach($orders as $order) : ?>
            <tr class="dbRow">
                <td><?php echo $order['orderID']; ?></td>
                <td><?php echo $order['orderDate']; ?></td>
                <td>
                    <?php
                        if($order['shipDate'] != null){
                            echo $order['shipDate'];
                        } else {
                            echo 'No ship date found';
                        }
                    ?>
                </td>
                <td><?php echo $order['cardNumber']; ?></td>
                <td><?php echo $order['line1'] ?></td>
                <td><?php echo $order['productName'] ?></td>
                <td><?php echo '$'.$order['listPrice'] ?></td>
                <td><?php echo '$'.$order['discountAmount'] ?></td>
                <td><?php echo '$'.$order['taxAmount'] ?></td>
                <td><?php echo '$'.$order['shipAmount'] ?></td>
                <?php $total = $order['listPrice'] +  $order['taxAmount'] + $order['shipAmount'] - $order['discountAmount']?>
                <td><?php echo '$'.$total ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script src="scripts/app.js"></script>
</body>
</html>
