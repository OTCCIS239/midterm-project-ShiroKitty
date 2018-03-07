<?php
require_once('./includes/init.php');
require_once('./includes/db.php');

$product_ID = filter_input(INPUT_GET, 'product_ID', FILTER_VALIDATE_INT);
$product_ID = 1;
// if ($product_ID == null || $product_ID == false){
//     $product_ID = 1;
// }
$getProducts = 'SELECT * FROM products
                WHERE productID = :product_ID';
$getProds = $conn -> prepare($getProducts);
$getProds -> bindValue(':product_ID', $product_ID);
$getProds  -> execute();
$products = $getProds -> fetchAll();
$getProds -> closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="css/foundation.css" type="text/css">
    <link rel="stylesheet" href="css/app.css" type="text/css">
</head>
<body>
    <?php include('./includes/navbar.php') ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <?php foreach($products as $product) : ?>
            <tr>
                <td><?php echo $product['productName']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['listPrice']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="scripts/guitar-shop.js"></script>
</body>
</html>
