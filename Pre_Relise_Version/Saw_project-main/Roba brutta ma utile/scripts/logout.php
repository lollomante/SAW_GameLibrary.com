<?php
session_start();

if(isset($_COOKIE['remember_me'])){
    include 'mysql_connect.php';
    $stmt=$link->prepare("UPDATE user SET `user_id`=NULL, `user_token`=NULL, `expire`=NULL WHERE email=?");
    $stmt->bind_param('s', $_SESSION['email']);
    $stmt->execute();
    setcookie('remember_me', NULL, time()-3600); 
    $link->close();
}         
session_destroy();
header('Location: ../index.php');
exit;
?>
