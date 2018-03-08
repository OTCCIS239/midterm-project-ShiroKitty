<?php
require_once('./includes/init.php');
require_once('./includes/db.php');

$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

    //Gets products for category
    $queryProducts = 'SELECT * FROM products
                    ORDER BY `categoryID`
                    ';
    $statement3 = $conn -> prepare($queryProducts);
    $statement3 -> bindValue(':category_id', $category_id);
    $statement3 -> execute();
    $products = $statement3 -> fetchAll();
    $statement3 -> closeCursor();

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
            <th>Category</th>
            <th>Name</th>
            <!-- <th>Description</th> -->
            <th>Price</th>
        </tr>
        <?php foreach($products as $product) : ?>
            <tr class="dbRow">
                <td>
                    <?php
                        if($product['categoryID'] == 1){
                            echo 'Guitars';
                        } elseif($product['categoryID'] == 2) {
                            echo 'Basses';
                        } elseif($product['categoryID'] == 3) {
                            echo 'Drums';
                        }
                    ?>
                </td>
                <td><?php echo $product['productName']; ?></td>
                <!-- <td><?php echo $product['description']; ?></td> -->
                <td><?php echo $product['listPrice']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="scripts/guitar-shop.js"></script>
</body>
</html>
