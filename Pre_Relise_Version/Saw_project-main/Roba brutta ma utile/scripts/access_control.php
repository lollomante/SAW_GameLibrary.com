<?php
    //variable that keeps track if the file has already been included
	$access_control = true;
    
    //return true if you are logged in, false otherwhise
    function session_control(){
        if (isset($_SESSION["key"])){
            return true;
        }
        
        //"remember me" management
        else {
            if (isset($_COOKIE['remember_me'])){
                include 'mysql_connect.php'; 
                $data = explode('/', $_COOKIE['remember_me']);
                $stmt=$link->prepare("SELECT firstname, lastname, email, user_token, expire FROM user WHERE user_id=?");
                $stmt->bind_param('s', $data[0]);
                $stmt->execute();
                $res = $stmt->get_result();
                $rowcount = $res->num_rows;
                if($rowcount==1){
                    $row = $res->fetch_assoc();
                    if ($row['expire']>time()){
                        if(password_verify($data[1], $row['user_token'])){
                            //create session and return true
                            $_SESSION['key'] = session_id();
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['fistname'] = $row['firstname'];
                            $_SESSION['lastname'] = $row['lastname'];
                            $link->close();
                            return true; 
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
        include 'mysql_connect.php';        
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
