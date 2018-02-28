<?php

// This file initializes some goodies that will make your
// development experience nicer! If your PHP throws an
// error, we will show you exactly what went wrong!
// This line should be on every page you create.
require_once('./includes/init.php');

// Here you might connect to the database and show off some of your newest guitars.
require_once('./includes/db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
</head>
<body>
    <h1>Tj's Guitar Shop</h1>
   
    <div>
        <nav>
           <ul> 
               <li>Guitars</li>
               <li>Basses</li>
               <li>Drums</li>
           </ul> 
        </nav>
    </div> 
    
</body>
</html>