<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Sign-up </title>
    <link rel="stylesheet" type="text/css" href=".css/main.css" />
    <link rel="stylesheet" type="text/css" href=".css/form.css" />
</head>

<body class="main">
    <?php 
        include 'navbar.php';
    ?>
    <div class="container">    
        <form class="form" action="scripts/login_process.php" method="post">
            <p class="formtitle"> Welcome, please log in </p>

            <label class = "input_label" for="email">Email:</label>
            <input class= "input" type="email" placeholder="Enter Email" id="email" name="email" required><br><br>

            <label class = "input_label" for="pass">Password:</label>
            <input class= "input" type="password" placeholder="Enter Password" id="pass" name="pass" required><br><br>

            <label class="smallgentext" for="RemenberMe"> Remember Me </label>
            <input type="checkbox"  id="remember" name="remember"> <br><br>
        
            <button class= "button" type="submit" > Login </button>

            <?php 
                if (isset($_GET["success"])) {
                    if ($_GET["success"]==-1){
                        echo '<p class = error> Error: something went wrong, try again later </p>';
                    }
                    else{
                        if ($_GET["success"]==0){
                            echo '<p class = error> Error: Wrong email or password, try again </p>';
                        }
                    }   
                }
            ?>
        
            <p class="smallgentext"> Not a member? <span> <a class = "link" href="registration_page.php"> Register</a> </span> </p>
        </form>
    </div>

    <?php 
        include 'footer.php';
    ?>
</body>
</html>