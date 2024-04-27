<?php
    session_start();
    if (!isset($config)){
        include 'config.php';
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(null == trim($_POST["email"])||null == trim($_POST["pass"])){
            header('Location: ../login_page.php? success=0');
        }
        //connectiong to DB
        include 'mysql_connect.php';

        $email = trim($_POST['email']);
        $password = trim($_POST['pass']);
        $stmt=$link->prepare("SELECT firstname, lastname, pass, email FROM user WHERE email=?");
        if($stmt == false){
            $link->close(); 
            header('Location: ../login_page.php? success=-1');
        }
        $stmt->bind_param('s', $email);
        if($stmt == false){
            $link->close(); 
            header('Location: ../login_page.php? success=-1');
        }
        $stmt->execute();
        if($stmt == false){
            $link->close(); 
            header('Location: ../login_page.php? success=-1');
        }
        $res = $stmt->get_result();
        $rowcount= $res->num_rows;
        if($rowcount!=1){
            $link->close(); 
            header('Location: ../login_page.php? success=0');
        }
        $row = $res->fetch_assoc();
        if(password_verify($password, $row['pass'])){
            $_SESSION['key'] = session_id();
            $_SESSION['email'] = $row['email'];
            $_SESSION['fistname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            //"remember me" management
            if(isset($_POST['remember'])){
                $user_id = hash('sha256', $_POST['email']);
                $token = hash('sha256', random_int(0, 1000000));
                $expire_date = time() + $RememberMeDuration; 
                $email = $_POST['email'];
                $BDtoken = password_hash($token, PASSWORD_DEFAULT);
                $stmt=$link->prepare("UPDATE user SET `user_id`=?, `user_token`=?, `expire`=? WHERE email=?");
                $stmt->bind_param('ssss', $user_id, $BDtoken, $expire_date, $email);
                $stmt->execute();
                if($stmt->affected_rows == 1){
                    $data = $user_id.'/'.$token;
                    setcookie('remember_me', $data, $expire_date);     
                }         
            }
            $link->close(); 
            header('Location: ../index.php');
        }
        else{
            $link->close(); 
            header('Location: ../login_page.php? success=0');
        }
    }
?>