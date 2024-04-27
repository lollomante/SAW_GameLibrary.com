<?php 
    session_start();
    if (!isset($access_control)){
        include 'scripts/access_control.php';
    }
    if (!session_control()){
        header('Location: login_page.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
    <?php 
        include "navbar.php";
    ?>
    <h1> area riservata </h1>
    <?php
        header('Location: underconstruction.php');
    ?>
</body>
</html>