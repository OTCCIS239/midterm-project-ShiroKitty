<?php
require_once('./includes/init.php');
require_once('./includes/db.php');

$getProducts = 'SELECT productName, description, listPrice
                FROM products';
// $get1 =
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
    <?php echo $getProducts; ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <?php
            // while($row1 = )
        ?>
        <tr>
            <td></td>
        </tr>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="scripts/guitar-shop.js"></script>
</body>
</html>