<?php
    require_once('./includes/init.php');
    require_once('./includes/db.php');

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
    <div>
        <h2 class="prodName"></h2>
        <br>
        <p class="prodDescription"></p>
        <script src="scripts/app.js"></script>
    </div>
</body>
</html>