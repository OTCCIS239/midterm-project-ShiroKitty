<?php
require_once('./includes/init.php');
require_once('./includes/db.php');

$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

    //Gets products for category
    $queryProducts = 'SELECT * FROM products
                    ORDER BY `categoryID`
                    ';
    $statement = $conn -> prepare($queryProducts);
    $statement -> bindValue(':category_id', $category_id);
    $statement -> execute();
    $products = $statement -> fetchAll();
    $statement -> closeCursor();

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            <tr class="dbRow" onclick="function()">
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
    <script src="scripts/app.js"></script>
</body>
</html>
