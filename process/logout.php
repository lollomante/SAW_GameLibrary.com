<?php
session_start();
require_once 'config.php';

if(isset($_COOKIE['remember_me'])){
    include 'mysqli_connect.php';
    $stmt=$link->prepare("UPDATE user SET `remember_user_id`=NULL, `remember_user_token`=NULL, `remember_expire`=NULL WHERE email=?");
    if($stmt != false){
        $stmt->bind_param('s', $_SESSION['email']);
        if($stmt != false){
            $stmt->execute();
        }
    }
    setcookie('remember_me', NULL, time()-3600); 
    $link->close();
}         
session_destroy();
header('Location: ../index.php');
exit;

/*made on earth by humans*/
?>
