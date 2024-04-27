<?php
    session_start();
    if (!isset($config)){
        include 'config.php';
    }
    // if (!isset($mysql_connect)){
    //    include 'mysqli_connect.php';
    //}
    if (!isset($access_control)){
        include 'access_control.php';
    }
    if (!isset($utility_function)){
        include 'utility_function.php';
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!Validate_Input($_POST["email"])||!Validate_Input($_POST["pass"])){
            header('Location: ../login.php? success='.GenericFail);
            exit();
        }
        include 'mysqli_connect.php';
        $email = trim($_POST['email']);
        $password = trim($_POST['pass']);
        $stmt=$link->prepare("SELECT firstname, lastname, pass, user_id, email FROM user WHERE email=?");
        if($stmt == false){
            $link->close(); 
            header('Location: ../login.php? success='.GenericFail);
            exit();
        }
        $stmt->bind_param('s', $email);
        if($stmt == false){
            $link->close(); 
            header('Location: ../login.php? success='.GenericFail);
            exit();
        }
        $stmt->execute();
        if($stmt == false){
            $link->close(); 
            header('Location: ../login.php? success='.GenericFail);
            exit();
        }
        $res = $stmt->get_result();
        $rowcount= $res->num_rows;
        if($rowcount!=1){
            $link->close(); 
            header('Location: ../login.php? success='.GenericFail);
            exit();
        }
        $row = $res->fetch_assoc();
        if(password_verify($password, $row['pass'])){
            if(create_session(session_id(),$row['email'],$row['firstname'],$row['lastname'],$row['user_id'])==TRUE){
                //"remember me" management
                if(isset($_POST['remember'])){
                    $user_id = hash('sha256', $_POST['email']);
                    $token = hash('sha256', random_int(0, 1000000));
                    $expire_date = time() + $RememberMeDuration; 
                    $email = $_POST['email'];
                    $BDtoken = password_hash($token, PASSWORD_DEFAULT);
                    $stmt=$link->prepare("UPDATE user SET `remember_user_id`=?, `remember_user_token`=?, `remember_expire`=? WHERE email=?");
                    $stmt->bind_param('ssss', $user_id, $BDtoken, $expire_date, $email);
                    $stmt->execute();
                    if($stmt->affected_rows == 1){
                        $data = $user_id.'/'.$token;
                        setcookie('remember_me', $data, RememberMeDuration);     
                    } 
                }
            $link->close(); 
            header('Location: ../index.php');
            exit();        
            }

            //placeolder for redirecting to a "account suspended" page
            echo "<p>account suspended</p>";
        }
        $link->close(); 
        header('Location: ../login.php? success=0');
        exit();
        
    }
    ?>