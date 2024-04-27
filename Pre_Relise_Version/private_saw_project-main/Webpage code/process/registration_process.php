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
        //ceck that all field are valid
        if(!Validate_Input($_POST['firstname']) || !Validate_Input($_POST['lastname']) || !Validate_Input($_POST['email']) || !Validate_Input($_POST['pass']) || !Validate_Input($_POST['confirm'])){
            header('Location: ../registration.php? success='.GenericFail);
            exit();
        }
        if(trim($_POST["pass"]) != trim($_POST["confirm"])){
            header('Location: ../registration.php? success='.PasswordNotMatch);
            exit();
        }
        $firstname = trim($_POST["firstname"]);
        $lastname = trim($_POST["lastname"]);
        $email = trim($_POST["email"]);
        $pass = password_hash(trim($_POST["pass"]), PASSWORD_DEFAULT);
        //connection to DB
        include 'mysqli_connect.php';

        $stmt=$link->prepare("INSERT INTO user (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
        if($stmt == false){
            $link->close(); 
            header('Location: ../registration.php? success='.GenericFail);
            exit();
        }
        $stmt->bind_param('ssss', $firstname, $lastname, $email, $pass,);
        if($stmt == false){
            $link->close(); 
            header('Location: ../registration.php? success='.GenericFail);
            exit();
        }
        try{
            $stmt->execute();
        }
        catch(Exception $e){
            header('Location: ../registration.php? success='. DuplicateEntryError);
            exit();
        }
       //if ($stmt->errno == 1062) {
        //    print 'no way!';
        //}
        if($stmt == false){
            $link->close(); 
            header('Location: ../registration.php? success='.GenericFail);
            exit();
        }
        $res = $stmt->get_result();
        $rowcount = $stmt->affected_rows;
        if($rowcount==1){
            $link->close(); 
            header('Location: ../registration.php? success='.GenericSucccess);
            exit();
        }
        else{
            $link->close(); 
            header('Location: ../registration.php? success='.GenericFail);
            exit();
        }
    }   
?>  