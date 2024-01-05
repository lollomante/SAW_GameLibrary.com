<?php
    //check if user is not banned and create session, return fase if user is banned, create session and return true otherwise
    function create_session($key, $email, $firstname, $lastname, $id){
        include 'mysqli_connect.php';
        $stmt=$link->prepare("SELECT banned FROM user WHERE email=?");
        if($stmt == false){
            $link->close();
            return false;
        }
        $stmt->bind_param('s', $email);
        if($stmt == false){
            $link->close();
            return false;
        }
        $stmt->execute();
        if($stmt == false){
            $link->close();
            return false;
        }
        $res = $stmt->get_result();
        $rowcount = $res->num_rows;
        if($rowcount==1){
            $row = $res->fetch_assoc();
            if ($row['banned']=='0'){
                $_SESSION['key'] = $key;
                $_SESSION['email'] = $email;
                $_SESSION['fistname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['user_id'] = $id;
                return true;
            }
        }
        return false;
    }
    
    //return true if you are logged in, false otherwhise
    function session_control(){
        if (isset($_SESSION["key"])){
            return true;
        }
        //"remember me" management
        else {
            if (isset($_COOKIE['remember_me'])){
                include 'mysqli_connect.php'; 
                $data = explode('/', $_COOKIE['remember_me']);
                $stmt=$link->prepare("SELECT firstname, lastname, email, user_id, remember_user_token, remember_expire FROM user WHERE remember_user_id=?");
                if($stmt == false){
                    $link->close();
                    return false;
                }
                $stmt->bind_param('s', $data[0]);
                if($stmt == false){
                    $link->close();
                    return false;
                }
                $stmt->execute();
                if($stmt == false){
                    $link->close();
                    return false;
                }
                $res = $stmt->get_result();
                if($res->num_rows==1){
                    $row = $res->fetch_assoc();
                    if ($row['remember_expire']>time()){
                        if(password_verify($data[1], $row['remember_user_token'])){
                            if(create_session(session_id(),$row['email'],$row['firstname'],$row['lastname'],$row['user_id'])==TRUE){
                                return true; 
                            }
                        }
                    }   
                }
            }
        }
        return false;
    }

    //return true if you are logged in with an admin account, false otherwhise
    function admin_control(){
        if (!session_control()){
            return false;
        }
        include 'mysqli_connect.php';        
        $stmt=$link->prepare("SELECT admin FROM user WHERE email=?");
        if($stmt == false){
            return false;
        }
        $stmt->bind_param('s', $_SESSION["email"]);
        if($stmt == false){
            $link->close();
            return false;
        }
        $stmt->execute();
        if($stmt == false){
            $link->close();
            return false;
        }
        $res = $stmt->get_result();          
        if($stmt == false){
            $link->close();
            $stmt->fetch();
        }
        $row = $res->fetch_assoc();
        if($row['admin'] == 1){
            $link->close();
            return true;
        }
        $link->close();
        return false;
    }

    
?>
