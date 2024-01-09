<?php
session_start();
require_once 'access_control.php';
require_once 'config.php';
if (!admin_control()){
    header('Location: ../login_page.php? success=fail');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include 'mysqli_connect.php';
    $stmt=$link->prepare("SELECT banned, email FROM user WHERE user_id=?");
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
    if($stmt==false){
        $link->close(); 
        header('Location: ../user_list.php? success=fail');
        exit();
    }
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    if($row['banned'] == 0){
        $stmt=$link->prepare("UPDATE `user` SET `banned`='1'WHERE user_id=?");
    } 
    else{
        $stmt=$link->prepare("UPDATE `user` SET `banned`='0'WHERE user_id=?");
    }
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
        header('Location: ../user_list.php? success=success');
        exit();          
    }
}
$link->close();
header('Location: ../user_list.php? success=fail');
exit();     

/*made on earth by humans*/
?>