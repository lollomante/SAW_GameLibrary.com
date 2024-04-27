<?php
session_start();
if (!isset($config)) {
    include 'process/config.php';
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../Style/login.css" />
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="form-container">
        <div id="divlog">
            <form action="process/login_process.php" method="post">
                <h1>LOGIN</h1>

                <label class="input_label" for="email">Email:</label><br>
                <input class="input" type="email" placeholder="Enter Email" id="email" name="email" required><br><br>

                <label class="input_label" for="pass">Password:</label><br>
                <input class="input" type="password" placeholder="Enter Password" id="pass" name="pass"
                    required><br><br>

                <label class="smallgentext" for="RemenberMe"> Remember Me </label>
                <input type="checkbox" id="remember" name="remember"> <br><br>

                <button class="button" type="submit"> Login </button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_GET["success"])) {
        if ($_GET["success"] == GenericFail) {
            echo '<p class = error> Error: something went wrong, try again later </p>';
        } else {
            if ($_GET["success"] == 0) {
                echo '<p class = error> Error: Wrong email or password, try again </p>';
            }
        }
    }
    ?>
</body>

</html>