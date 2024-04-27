<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign-up</title>
    <link rel="stylesheet" type="text/css" href=".css/main.css" />
    <link rel="stylesheet" type="text/css" href=".css/form.css" />
</head>

<body class = "main">
    <?php 
        include 'navbar.php';
    ?>

    <?php
        if (isset($_GET["success"])) {
            if ($_GET["success"]==-1){
                echo '<p class = error> Error: something went wrong, try again later </p>';
            }
            if ($_GET["success"]==-2){
                    echo '<p class = error> Error: Password do not match </p>';
            }
            if($_GET["success"]==1){
                echo '<p> <span>Registration sucessfull, go to </span><span class = "link" > <a class = "linktext" href = "login_page.php"> Login</a></span></p>';
            }
        }   
    ?>
    
    <div class="container">     
        <form class="form" action="scripts/registration_process.php" method="post">
            <p class="formtitle"> please fill up all the following box: </p>

            <label class = "input_label" for="firstname">First name:</label>
            <input class= "input" type="text" placeholder="Enter First Name" id="firstname" name="firstname" required><br><br>

            <label class = "input_label" for="lastname">Last name:</label>
            <input class= "input" type="text" placeholder="Enter Last Name" id="lastname" name="lastname" required><br><br>

            <label class = "input_label" for="email">Email:</label>
            <input class= "input" type="email" placeholder="Enter Email" id="email" name="email" required><br><br>

            <label class = "input_label" for="pass">Password:</label>
            <input class= "input" type="password" placeholder="Enter Password" id="pass" name="pass" required><br><br>

            <label class = "input_label" for="confirm">Confirm Password:</label>
            <input class= "input" type="password" placeholder="Confirm Password" id="confirm" name="confirm" required><br><br>

            <label class="reg" for="Conditions"> I want to subscribe to the newsletter</label>
            <input type="checkbox"  id="newsletter" name="newsletter"> <br><br>

            <label class="reg" for="Conditions"> I have accepted the  <span> <a class = "link" href="Therms_and_conditions.php"> therms and conditions </a> </span></label>
            <input type="checkbox"  id="conditions" name="conditions"> <br><br>
      
            <button class= "button" type="submit" > Login </button>

            <p class="reg"> Already a member? <span> <a class = "link" href="login_page.php">Login </a> </span> </p>
        </form>
    </div>
    <?php 
        include 'footer.php';
    ?>
</body>
</html>