<?php 
    //error codes constants
    $MYSQLI_CODE_DUPLICATE_KEY = 1062;

    if (!isset($config)){
        include 'config.php';
    }
    $link = new mysqli ($server, $DB_username, $DB_password, $DB_name);
    if(!$link){
        echo '<p class = "error"> Error: cannot reach server, try again later </p>';
        /*for debug*/ echo '<p>' . mysql_error() .'</p>';
    }
    ?>
