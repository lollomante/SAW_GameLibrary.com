<?php
    if(!isset($config)){
    	include 'config.php';
    }
include 'mysqli_connect.php';
    //"SELECT `user_id`, `firstname`, `lastname`, `email`, `admin`, `banned` FROM user WHERE `email` != $SuperUserEmail OR `email` != $_SESSION['email']" 
    $stmt=$link->prepare("SELECT `user_id`, `firstname`, `lastname`, `email`, `admin`, `banned` FROM user");
    //$stmt->bind_param('s', $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $rowcount=$res->num_rows;
    if($rowcount>0){
        echo '{"data":[';
        for($i = 0; $i<$rowcount; $i++){
            $row=$res->fetch_array();
            echo '{';
            echo '"user_id":"'.$row['user_id'].'",';
            echo '"firstname":"'.$row['firstname'].'",';
            echo '"lastname":"'.$row['lastname'].'",';
            echo '"email":"'.$row['email'].'",';
            if($row['admin']==1){
                echo '"admin":"<a class = `linktext` href = `process/admin_modify.php? user_id='.$row['user_id'].'`> Remove from admin</a>'.'",';
            }
            else{
                echo '"admin":"<a class = `linktext` href = `process/admin_modify.php? user_id='.$row['user_id'].'`> Add to admin</a>'.'",';
            }
            if($row['banned']==1){
                echo '"banned":"<a class = `linktext` href = `process/ban_modify.php? user_id='.$row['user_id'].'`> Unban</a>'.'",';
            }
            else{
                echo '"banned":"<a class = `linktext` href = `process/ban_modify.php? user_id='.$row['user_id'].'`> Ban</a>'.'",';
            }
            echo '"delete":"<a class = `linktext` href = `process/delete_user.php? user_id='.$row['user_id'].'`> Delete</a>'.'"';
            echo '}';
            if($i!=$rowcount-1){
                echo ',';
            }
        }
        echo ']}';

    }
?>

