<link rel="stylesheet" type="text/css" href=".css/menu.css"/>
<link rel="stylesheet" type="text/css" href=".css/navbar.css"/>



<?php 
    if (!isset($access_control)){
        include 'scripts/access_control.php';
    }
?>
<div class="topnav">
    <span class = "logo" > <a href = "index.php"> <img src = "images/logo.png" alt = "homepage button" with="70px" height="70px"> </a> </span>
    <?php 
    
        if (!session_control()){
            echo '<span class = "link" > <a class = "linktext" href = "login_page.php"> Login</a> </span>
                    <span class = "link"> | </span> 
                    <span class = "link" > <a class = "linktext" href = "registration_page.php">Register</a> </span> ';                    
        }
        else{          
            echo '<span class = "link"> <a class = "linktext" href = "library.php"> Library</a> </span>
                    <span class = "link"> | </span>
                    <span class = "link"> <a class = "linktext" href = "profile.php">Profile</a> </span>
                    <span class = "link"> | </span>
                    <span class = "link"> <a class = "linktext" href = "scripts/logout.php">Logout</a> </span>' ;
            if(admin_control()){
                echo '<span class = "link"> | </span>
                    <span class = "link" > <a class = "linktext" href = "user_list.php"> User List</a> </span>';
            }
        }
        ?>

</div>
