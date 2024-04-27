
<link rel="stylesheet" type="text/css" href="../Style/navbar.css" />

<?php
if (!isset($access_control)) {
    include 'process/access_control.php';
}
?>
<div class="topnav">
    <span class="logo"> <a href="index.php"> <img src="../images/Logo.png" alt="homepage button" with="70px" height="70px"></a> </span>
    <?php

    if (!session_control()) {
        echo '<span class = "link" > <a class = "linktext" href = "login.php"> Login</a> </span>';
        echo '<span class = "link"> | </span>';
        echo '<span class = "link" > <a class = "linktext" href = "registration.php">Register</a> </span> ';
    } else {
        echo '<span class = "link"> <a class = "linktext" href = "library.php"> Library</a> </span>';
        echo '<span class = "link"> | </span>';
        echo '<span class = "link"> <a class = "linktext" href = "userprofile.php">Profile</a> </span>';
        echo '<span class = "link"> | </span>';
        echo '<span class = "link"> <a class = "linktext" href = "process/logout.php">Logout</a> </span>';
        if (admin_control()) {
            echo '<span class = "link"> | </span>';
            echo '<span class = "link" > <a class = "linktext" href = "user_list.php"> User List</a> </span>';
        }
    }
?>

</div>
