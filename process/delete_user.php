<?php
session_start();
require_once 'access_control.php';
require_once 'config.php';
if (!admin_control()){
    header('Location: ../login.php? success=fail');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include 'mysqli_connect.php';
    //ceck if a profile picture exists 
    if (file_exists('../images/profile/'.$_GET["user_id"].'.jpg')){
        unlink('../images/profile/'.$_GET["user_id"].'.jpg');
    }
    $stmt=$link->prepare("DELETE FROM user WHERE user_id=?");
    if($stmt == false){
        $link->close();
        header('Location: ../user_list.php? success=fail');
        exit();
    }
    $stmt->bind_param('s', $_GET["user_id"]);
    if($stmt == false){
        $link->close(); 
        header('Location: ../user_list.php? success=fail');
        exit();
    }
    $stmt->execute();
    if($stmt->affected_rows == 1){
        $link->close(); 
        header('Location: ../user_list.php? success=delete_success');
        exit();          
    }
    $link->close();
    header('Location: ../user_list.php? success=fail');
    exit();     
}
?>