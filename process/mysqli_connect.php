<?php 
    //TODO: turn this into function

        if (!isset ($link)){
            $link = new mysqli (server, DB_username, DB_password, DB_name);
            if ($link -> connect_errno) {
                //$error="Failed to connect to MySQL: " . $mysqli -> connect_error;
                error_log($error, 3, "error_log.txt");
                exit("connection_error");
            }
        }
?>