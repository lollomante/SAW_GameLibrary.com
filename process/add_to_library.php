<?php
session_start();
require_once 'config.php';
require_once 'access_control.php';
if (!session_control()){
    header('Location: ../index.php');
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['game_id'])){
        include'mysqli_connect.php';
        $stmt=$link->prepare("INSERT INTO library_rel (user_id, game_id) VALUES (?, ?)");
        if($stmt == false){
            $link->close(); 
            header('Location: ../library.php');
            exit();
        }
        $stmt->bind_param('ss', $_SESSION['user_id'], $_GET['game_id']);
        if($stmt == false){
            $link->close(); 
            header('Location: ../library.php');
            exit();
        }
        try{
            $stmt->execute();
        }
        catch(Exception $e){
            $link->close(); 
            header('Location: ../library.php');
            exit();
        }
    }
}
$link->close(); 
header('Location: ../library.php');
exit();

/*made on earth by humans*/
?>
