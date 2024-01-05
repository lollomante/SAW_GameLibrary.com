<?php 
if (!isset ($link)){
    try{
        $link = new mysqli (SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }
    catch (Exception $e){
        $error="Failed to connect to MySQL: " . $mysqli -> connect_error;
        error_log($error, 3, "error_log.txt");
        header('Location: server_error.html');
        exit("connection_error");
        }
    }
?>