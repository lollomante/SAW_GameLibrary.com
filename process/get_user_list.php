<?php
session_start();
require_once 'config.php';
require_once 'access_control.php';
if (!admin_control()){
    header('Location: ../login.php');
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
            $temp = "<a class = 'linktext' href = 'process /admin_modify.php? user_id=".$row['user_id']."'>";
            echo '"admin":"'.$temp.'Remove from admin</a>'.'",';
        }
        else{
            $temp = "<a class = 'linktext' href = 'process /admin_modify.php? user_id=".$row['user_id']."'>";
            echo '"admin":"'.$temp.'Add to admin</a>'.'",';
        }
        if($row['banned']==1){
            $temp = "<a class = 'linktext' href = 'process /ban_modify.php? user_id=".$row['user_id']."'>";
            echo '"banned":"'.$temp.'Unban</a>'.'",';
        }
        else{
            $temp = "<a class = 'linktext' href = 'process /ban_modify.php? user_id=".$row['user_id']."'>";
            echo '"banned":"'.$temp.'Ban</a>'.'",';
        }
        $temp = "<a class = 'linktext' href = 'process /delete_user.php? user_id=".$row['user_id']."'>";
        echo '"delete":"'.$temp.'Delete user</a>'.'"';
        echo '}';
        if($i!=$rowcount-1){
            echo ',';
        }
    }
    echo ']}';
}

/*made on earth by humans*/
?>

