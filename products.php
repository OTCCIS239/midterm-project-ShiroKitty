<?php
require_once('./includes/init.php');
require_once('./includes/db.php');

$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
if ($category_id == null || $category_id == false) {
    $category_id = 1;
}

//Gets the name for the selected category
    $queryCategory = 'SELECT * FROM categories
                    WHERE categoryID = :category_id';
    $statement1 = $conn -> prepare($queryCategory);
    $statement1 -> bindValue(':category_id', $category_id);
    $statement1 -> execute();
    $category = $statement1 -> fetch();
    $category_name = $category['categoryName'];
    $statement1 -> closeCursor();

    //Get all categories
    $queryAllCategories = 'SELECT * FROM categories
                        ORDER BY categoryID';
    $statement2 = $conn -> prepare($queryAllCategories);
    $statement2 -> execute();
    $categories = $statement2 -> fetchAll();
    $statement2 -> closeCursor();

    //Gets products for the selected category
    $queryProducts = 'SELECT * FROM products
                    WHERE categoryID = :category_id
                    ORDER BY `productName`
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
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <?php foreach($products as $product) : ?>
            <tr>
                <td><?php echo $product['productID']; ?></td>
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
