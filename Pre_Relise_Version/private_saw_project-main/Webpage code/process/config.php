<?php 
//variable that keeps track if the file has already been included
    $config = true;    

//connection to database
    define('server', 'localhost');
    define('DB_username', 'root');
    define('DB_password', '');
    define('DB_name', 'game_library');

//login
    define('RememberMeDuration', 1296000); // 15 giorni

//superuser email
    define('SuperUserEmail', 'root@root.it');

//pages return values
    define('GenericSucccess', 1);
    define('GenericFail',-1);
    define('PasswordNotMatch', -2);
    define('DeleteSuccess', 2);
    

//mysqli errors
    define('DuplicateEntryError', 1062);
   // $ConnectionError = 
?>
