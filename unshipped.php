
<?php
require_once('./includes/init.php');
require_once('./includes/db.php');

$getOrders = filter_input(INPUT_GET, 'gopher', FILTER_VALIDATE_INT);

//pulls data from products, orderitems, orders, customers, and addresses
$queryProducts = 'SELECT * FROM products
INNER JOIN orderItems on products.productID = orderItems.productID
INNER JOIN orders ON orderItems.orderID = orders.orderID
INNER JOIN customers ON orders.customerID = customers.customerID
INNER JOIN addresses ON addresses.addressID = customers.billingAddressID
WHERE orders.shipDate IS NULL
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
    <link rel="icon" href="img/guitarBrown.ico">
    <title>Unshipped Orders</title>
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
                <td><?php echo $order['line1'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="grid-container">
        <div class="grid-x">
            <a href="orders.php" class="button expand navBtn">Return</a>
        </div>
    </div>
    <script src="scripts/app.js"></script>
</body>
</html>
