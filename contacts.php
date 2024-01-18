<?php
session_start();
require_once 'process/config.php';
require_once 'process/access_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameLibrary.com</title>
    <link rel="icon" type="image/x-icon" href="images/Logo.ico">
    <meta name="viewport" content="width=device-width"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <link rel="stylesheet" type="text/css" href="style/search_bar.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />
</head>
<body class="body">
    <?php include 'navbar.php'; ?>
    <div class="main">
        <h1 class="title"> Contacts: </h1>
        <div>
            <ul>
                <li><span class="list_label"> Email: </span><span class='gentext'>Assistance@gamelibrary.com</span></li>
                <li><span class="list_label"> Telephone: </span><span class='gentext'>010 1234567</span></li>
                <li><span class="list_label"> Office: </span><a class='link' href="https://www.openstreetmap.org/#map=18/44.40244/8.97106">Via Dodecaneso 35</li>
            </ul>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
