<?php 
session_start();
require_once 'process/access_control.php';
require_once 'process/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />
    <title>Under construction</title>
    <link rel="icon" type="image/x-icon" href="images/Logo.ico">
</head>
<body class ="body">
    <?php 
        include "navbar.php";
    ?>
    <p> <img src = "images/under_construction.jpeg" class = "ud" alt = "page under construction"> </p>

    <?php 
        include 'footer.php';
    ?>
</body>
<!--made on earth by humans-->
</html>