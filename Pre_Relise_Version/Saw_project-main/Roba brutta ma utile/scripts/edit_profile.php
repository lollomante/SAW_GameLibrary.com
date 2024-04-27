<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
            $image = file_get_contents($_FILES["ProfilePic"]["tmp_name"]);
            include 'mysql_connect.php';
            $stmt=$link->prepare("UPDATE `user` SET `profilePic`=? WHERE `email`=?");
            if($stmt == false){
                $link->close(); 
                header('Location: ../profile.php? success=-1');
            }   
            $stmt->bind_param("ss", $image, $_SESSION["email"]);
            if($stmt == false){
                $link->close(); 
                header('Location: ../profile.php? success=-1');
            }
            $stmt->execute();
            if($stmt == false){
                $link->close();
                header('Location: ../profile.php? success=-1');
            }
            if($stmt->affected_rows==1){
                $link->close(); 
                header('Location: ../profile.php? success=1');
            }
            else{
                $link->close(); 
                header('Location: ../profile.php? success=-1');
                }
            }
        } 
    header('Location: ../profile.php? success=-1');  
?>  