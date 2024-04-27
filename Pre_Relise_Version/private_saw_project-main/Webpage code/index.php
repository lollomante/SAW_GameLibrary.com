<?php
    session_start();
    if(!isset($config)){
    	include 'process/config.php';
    }
    if (!isset($access_control)){
        include 'process/access_control.php';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Game Library</title>
    <link rel="stylesheet" href="../Style/index.css" />
</head>

<body>
<?php
    //NOTE: navbar.php style is not working correcly (style leaks into the rest of the page)
    //better not implelemt it as a table

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