<?php
session_start();
if (!isset($config)) {
    include 'process/config.php';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" href="../Style/registration.css" />
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="form-container">
        <div id="divreg">
            <form action="process/registration_process.php" method="post">
                <h1>REGISTRATION</h1>

                <label class="registration_label" for="firstname">First Name:</label><br>
                <input class="registration" type="text" placeholder="Enter First Name" id="firstname" name="firstname"
                    required><br><br>

                <label class="registration_label" for="lastname">Last Name:</label><br>
                <input class="registration" type="text" placeholder="Enter Last Name" id="lastname" name="lastname"
                    required><br><br>

                <label class="registration_label" for="email">Email:</label><br>
                <input class="registration" type="email" placeholder="Enter Email" id="email" name="email"
                    required><br><br>

                <label class="registration_label" for="pass">Password:</label><br>
                <input class="registration" type="password" placeholder="Enter Password" id="pass" name="pass"
                    required><br><br>

                <label class="registration_label" for="confirm">Confirm Password:</label><br>
                <input class="registration" type="password" placeholder="Confirm Password" id="confirm" name="confirm"
                    required><br><br>

                <input type="submit" class="button" value="Register">
            </form>
        </div>
    </div>
    <?php
    if (isset($_GET["success"])) {
        if ($_GET["success"] == GenericFail) {
            echo '<p class = error> Error: something went wrong, try again later </p>';
        }
        if ($_GET["success"] == PasswordNotMatch) {
            echo '<p class = error> Error: Password do not match </p>';
        }
        if ($_GET['success'] == DuplicateEntryError) {
            echo '<p class = error> Error: Email already exist </p>';
        }
        if ($_GET["success"] == GenericSucccess) {
            echo '<p> <span>Registration sucessfull, go to </span><span class = "link" > <a class = "linktext" href = "login.php"> Login</a></span></p>';
        }
    }
    ?>
</body>

</html>