<?php
    session_start();
    if (!isset($access_control)){
        include 'access_control.php';
    }
    if(!isset($config)){
    	include 'config.php';
    }

    if (!admin_control()){
        header('Location: ../login_page.php? success='.$GenericFail);
        exit();
    }
?>

<?php
   if ($_SERVER["REQUEST_METHOD"] == "GET") {
        include 'mysql_connect.php';

        $stmt=$link->prepare("SELECT email FROM user WHERE user_id=?");
        if($stmt == false){
            $link->close(); 
            header('Location: ../user_list.php? success='.$GenericFail);
            exit();
        }
        $stmt->bind_param('s', $_GET["user_id"]);
        if($stmt == false){
            $link->close(); 
            header('Location: ../user_list.php? success='.$GenericFail);
            exit();
        }
        $stmt->execute();
        if($stmt==false){
            $link->close(); 
            header('Location: ../user_list.php? success='.$GenericFail);
            exit();
        }
        $res = $stmt->get_result();{
        $row = $res->fetch_assoc();
        if($row['email'] == $SuperUserEmail){
            $link->close(); 
            header('Location: ../user_list.php? success='.$GenericFail);
            exit();
        }
        $stmt=$link->prepare("DELETE FROM user WHERE user_id=?");
        if($stmt == false){
            $link->close();
            header('Location: ../user_list.php? success='.$GenericFail);
            exit();
        }
        $stmt->bind_param('s', $_GET["user_id"]);
        if($stmt == false){
            $link->close(); 
            header('Location: ../user_list.php? success='.$GenericFail);
            exit();
        }
        $stmt->execute();
        echo $stmt->affected_rows;
        if($stmt->affected_rows == 1){
            $link->close(); 
            header('Location: ../user_list.php? success='.$DeleteSuccess);
            exit();          
        }
        $link->close();
        header('Location: ../user_list.php? success='.$GenericFail);
        exit();     
    }
}
?>
</body>
</html>