<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //ceck that all field are filled
        if(null == trim($_POST['firstname']) || null == trim($_POST['lastname']) || null == trim($_POST['email']) || null == trim($_POST['pass']) || null == trim($_POST['confirm'])){
            header('Location: ../registration_page.php? success=0');
        }
        if(trim($_POST["pass"]) != trim($_POST["confirm"])){
            header('Location: ../registration_page.php? success=-2');
        }
        $firstname = trim($_POST["firstname"]);
        $lastname = trim($_POST["lastname"]);
        $email = trim($_POST["email"]);
        $pass = password_hash(trim($_POST["pass"]), PASSWORD_DEFAULT);
        if (isset($_POST["newsletter"])){
            $newsletter = true;
        }
        else{
            $newsletter = false;
        }

        //connection to DB
        include 'mysql_connect.php';

        $stmt=$link->prepare("INSERT INTO user (firstname, lastname, email, pass, newsletter) VALUES (?, ?, ?, ?, ? )");
        if($stmt == false){
            $link->close(); 
            header('Location: ../registration_page.php? success=-1');
        }
        $stmt->bind_param('sssss', $firstname, $lastname, $email, $pass, $newsletter);
        if($stmt == false){
            $link->close(); 
            header('Location: ../registration_page.php? success=-1');
        }
        $stmt->execute();
        if($stmt == false){
            $link->close(); 
            header('Location: ../registration_page.php? success=-1');
        }
        $res = $stmt->get_result();
        $rowcount = $stmt->affected_rows;
        if($rowcount==1){
            $link->close(); 
            header('Location: ../registration_page.php? success=1');
        }
        else{
            $link->close(); 
            header('Location: ../registration_page.php? success=-1');
        }
    }   
?>  