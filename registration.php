<?php
session_start();
require_once 'process/config.php';
require_once 'process/access_control.php';
require_once 'process/utility_function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //ceck that all field are valid
    if(!Validate_Input($_POST['firstname']) || !Validate_Input($_POST['lastname']) || !Validate_Input($_POST['email']) || !Validate_Password($_POST['pass']) || !Validate_Password($_POST['confirm'])){
        header('Location: registration.php? success=fail');
        exit();
    }
    if(trim($_POST["pass"]) != trim($_POST["confirm"])){
        header('Location: registration.php? success=password_mismatch');
        exit();
    }
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $pass = password_hash(trim($_POST["pass"]), PASSWORD_DEFAULT);
    //connection to DB
    include 'process/mysqli_connect.php';

    $stmt=$link->prepare("INSERT INTO user (firstname, lastname, email, pass) VALUES (?, ?, ?, ?)");
    if($stmt == false){
        $link->close(); 
        header('Location: registration.php? success=fail');
        exit();
    }
    $stmt->bind_param('ssss', $firstname, $lastname, $email, $pass,);
    if($stmt == false){
        $link->close(); 
        header('Location: registration.php? success=fail');
        exit();
    }
    try{
        $stmt->execute();
    }
    catch(Exception $e){
        header('Location: registration.php? success=email_already_exist');
        exit();
    }
    if($stmt == false){
        $link->close(); 
        header('Location: registration.php? success=fail');
        exit();
    }
    $res = $stmt->get_result();
    $rowcount = $stmt->affected_rows;
    if($rowcount==1){
        $link->close(); 
        header('Location: registration.php? success=success');
        exit();
    }
    else{
        $link->close(); 
        header('Location: registration.php? success=fail');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
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
                <form action="registration.php" method="post">

                    <p class="formtitle"> Register, all fields are required </p>

                    <label class = "input_label" for="firstname">First name:</label>
                    <input class= "input" type="text" placeholder="Enter First Name" id="firstname" name="firstname" required><br><br>

                    <label class = "input_label" for="lastname">Last name:</label>
                    <input class= "input" type="text" placeholder="Enter Last Name" id="lastname" name="lastname" required><br><br>

                    <label class = "input_label" for="email">Email:</label>
                    <input class= "input" type="email" placeholder="Enter Email" id="email" name="email" required><br><br>

                    <label class = "input_label" for="pass">Password: (min. 8 char)</label>
                    <input class= "input" type="password" placeholder="Enter Password" id="pass" name="pass" required><br><br>

                    <label class = "input_label" for="confirm">Confirm Password:</label>
                    <input class= "input" type="password" placeholder="Confirm Password" id="confirm" name="confirm" required><br><br>

                    <input class= "button" type="submit" value="Register">
                </form>
                <p class="smallgentext"> Already a member? <span> <a class = "link" href="login.php"> Login</a> </span> </p>
                <?php
                    if (isset($_GET["success"])) {
                        if ($_GET["success"] == 'fail'){
                            echo '<p class="error"> Error: something went wrong, try again later </p>';
                        }
                        if ($_GET["success"] =='password_mismatch'){
                                echo '<p class="error"> Error: Password do not match </p>';
                        }
                        if ($_GET['success'] == 'email_already_exist'){
                            echo '<p class="error"> Error: Email already exist </p>';
                        }
                        if($_GET["success"] == 'success'){
                            echo '<p class="success"> <span>Registration sucessfull, go to </span><span class = "link"> <a class = "link" href = "login.php">Login</a></span></p>';
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