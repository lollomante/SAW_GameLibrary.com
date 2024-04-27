<?php
    session_start();
    if (!isset($config)){
        include 'process/config.php';
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrazione</title>
    <link rel="stylesheet" href="../Style/registration.css" />

</head>

<body>
    <?php
        include 'navbar.php';
    ?>
    <form action="process/registration_process.php" method="post">
        <label for="firstname">First name:</label>
        <input type="text" placeholder="Enter First Name" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Last name:</label>
        <input type="text" placeholder="Enter Last Name" id="lastname" name="lastname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" placeholder="Enter Email" id="email" name="email" required><br><br>

        <label for="pass">Password:</label>
        <input type="password" placeholder="Enter Password" id="pass" name="pass" required><br><br>

        <label for="confirm">Confirm Password:</label>
        <input type="password" placeholder="Confirm Password" id="confirm" name="confirm" required><br><br>

        <input type="submit" value="Register">
    </form>
    <?php
        if (isset($_GET["success"])) {
            if ($_GET["success"] == GenericFail){
                echo '<p class = error> Error: something went wrong, try again later </p>';
            }
            if ($_GET["success"] == PasswordNotMatch){
                    echo '<p class = error> Error: Password do not match </p>';
            }
            if ($_GET['success'] == DuplicateEntryError){
                echo '<p class = error> Error: Email already exist </p>';
            }
            if($_GET["success"] == GenericSucccess){
                echo '<p> <span>Registration sucessfull, go to </span><span class = "link" > <a class = "linktext" href = "login.php"> Login</a></span></p>';
            }
        }   
    ?>
</body>

</html>