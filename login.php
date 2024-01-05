<?php
session_start();
require_once 'process/config.php';
require_once 'process/access_control.php';
require_once 'process/utility_function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!Validate_Input($_POST["email"])||!Validate_Input($_POST["pass"])){
        header('Location: login.php? success=fail');
        exit();
    }
    include 'process/mysqli_connect.php';
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);
    $stmt=$link->prepare("SELECT firstname, lastname, pass, user_id, email FROM user WHERE email=?");
    if($stmt == false){
        $link->close(); 
        header('Location: login.php? success=fail');
        exit();
    }
    $stmt->bind_param('s', $email);
    if($stmt == false){
        $link->close(); 
        header('Location: login.php? success=fail');
        exit();
    }
    $stmt->execute();
    if($stmt == false){
        $link->close(); 
        header('Location: login.php? success=fail');
        exit();
    }
    $res = $stmt->get_result();
    if($res->num_rows!=1){
        $link->close(); 
        header('Location: login.php? success=fail');
        exit();
    }
    $row = $res->fetch_assoc();
    if(password_verify($password, $row['pass'])){
        if(create_session(session_id(),$row['email'],$row['firstname'],$row['lastname'],$row['user_id'])){
            
            //"remember me" management
            if(isset($_POST['remember'])){
                $user_id = hash('sha256', $_POST['email']);
                $token = hash('sha256', random_int(0, 1000000));
                $expire_date = time() + REMEMBER_ME_DURATION; 
                $email = $_POST['email'];
                $BDtoken = password_hash($token, PASSWORD_DEFAULT);
                $stmt=$link->prepare("UPDATE user SET `remember_user_id`=?, `remember_user_token`=?, `remember_expire`=? WHERE email=?");
                if($stmt == false){
                    $stmt->bind_param('ssss', $user_id, $BDtoken, $expire_date, $email);
                    if($stmt == false){
                        $stmt->execute();
                        if($stmt->affected_rows == 1){
                            $data = $user_id.'/'.$token;
                            setcookie('remember_me', $data, $expire_date);     
                        }
                    }         
                }
            }
        $link->close(); 
        header('Location: index.php');
        exit();        
        }
        header('Location: login.php? success=account_suspended');
        $link->close(); 
    }
    $link->close(); 
    header('Location: login.php? success=fail');
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" type="text/css" href="style/main.css" />
    <link rel="stylesheet" type="text/css" href="style/form.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="main">
        <div class="container">
            <div class="inner_container">
                <form action="login.php" method="post">

                    <p class="formtitle"> Welcome, please log in </p>

                    <label class = "input_label" for="email">Email:</label>
                    <input class= "input" type="email" placeholder="Enter Email" id="email" name="email" required><br><br>

                    <label class = "input_label" for="pass">Password:</label>
                    <input class= "input" type="password" placeholder="Enter Password" id="pass" name="pass" required><br><br>

                    <label class="smallgentext" for="RemenberMe"> Remember Me </label>
                    <input type="checkbox"  id="remember" name="remember"> <br><br>
                    
                    <button class= "button" type="submit" > Login </button>
                </form>
                <p class="smallgentext"> Not a member? <span> <a class = "link" href="registration.php"> Register</a> </span> </p>
                <?php 
                    if (isset($_GET["success"])) {
                        if ($_GET["success"] == 'fail'){
                            echo '<p class = error> Error: something went wrong, try again </p>';
                        }
                        else{
                            if ($_GET["success"]=='account_suspended'){
                                echo '<p class = error> Error: This account has been suspendes, contact admin </p>';
                            }
                        }   
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php'
    ?>
</body>
<!-- made on eatrh by humans-->
</html>