<?php
session_start();
require_once 'config.php';
require_once 'access_control.php';
if (!session_control()){
    header('Location: ../index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['game_id'])){
        $data = explode('|', $_GET['game_id']);
        include 'mysqli_connect.php';
        $stmt=$link->prepare("SELECT main_compl, secondary_compl, objectives_compl FROM library_rel WHERE user_id=? AND game_id=?");
        $stmt->bind_param('ss', $_SESSION['user_id'], $data[0]);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        if($res->num_rows!=1){
            $link->close(); 
            header('Location: ../index.php');
            exit();
        }
        //ceck which data need to update
        if($data[1]=='main'){
            if($row['main_compl']==0){
                $stmt=$link->prepare("UPDATE `library_rel` SET `main_compl`=1 WHERE user_id=? AND game_id=?");
            }else{
                $stmt=$link->prepare("UPDATE `library_rel` SET `main_compl`=0 WHERE user_id=? AND game_id=?");
            }
        }
        else if($data[1]== 'sec'){
            if($row['secondary_compl']==0){
                $stmt=$link->prepare("UPDATE `library_rel` SET `secondary_compl`=1 WHERE user_id=? AND game_id=?");
            }else{
                $stmt=$link->prepare("UPDATE `library_rel` SET `secondary_compl`=0 WHERE user_id=? AND game_id=?");
            }
        }
        else if($data[1]== 'obj'){
            if($row['objectives_compl']==0){
                $stmt=$link->prepare("UPDATE `library_rel` SET `objectives_compl`=1 WHERE user_id=? AND game_id=?");
            }else{
                $stmt=$link->prepare("UPDATE `library_rel` SET `objectives_compl`=0 WHERE user_id=? AND game_id=?");
            }
        }
        else{
            $link->close();
            header('Location: ../index.php');
            exit();
        }
        $stmt->bind_param('ss', $_SESSION['user_id'], $data[0]);
        $stmt->execute();
        if($stmt->affected_rows == 1){
            $link->close(); 
            header('Location: ../game.php? game_id='.$data[0]);
            exit();          
        }
    }
}
header('Location: ../index.php');
exit();
