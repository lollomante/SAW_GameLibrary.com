<?php
session_start();
require_once 'process/config.php';
require_once 'process/access_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />
    <title>My Game Library</title>
</head>

<body class="body">
<?php
    include 'navbar.php';
?>

<div>
    <p>Temporary stuff: this section of the page is for debugging and will be removed when navbar is completed</p>
    <?php 
        if (!session_control()){
            echo '<p> <a href = "login.php"> Login</a> </p>';
            echo '<p> <a href = "registration.php">Register</a> </p>';                    
        }
        else{
            //user is sutenticated
            echo '<p> <a href = "library.php"> Library</a> </p>';
            echo '<p> <a href = "userprofile.php">User profile</a> </p>';
            echo '<p> <a href = "process/logout.php"> Logout</a> </p>';

            if(admin_control()){
                //user is an admin
                echo '<p> <a href = "user_list.php"> User list</a> </p>';
            }
        }
    ?>
    <p> <a href = "index.php"> Homepage</a> </p>
</div>

    <?php include 'footer.php'; ?>
</body>

</html>