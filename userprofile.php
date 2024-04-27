<?php 
session_start();
require_once 'process/config.php';
require_once 'process/access_control.php';
require_once 'process/utility_function.php';
if (!session_control()){
    header('Location: login_page.php');
    exit();
}

//display profile info
include 'process/mysqli_connect.php';
$stmt=$link->prepare("SELECT* FROM user WHERE email=?");
if($stmt == false){
    $link->close(); 
    header('Location: index.php');
    exit();
}
$stmt->bind_param('s', $_SESSION["email"]);
if($stmt == false){
    $link->close(); 
    header('Location: index.php');
    exit();
}
$stmt->execute();
if($stmt == false){
    $link->close(); 
    header('Location: index.php');
    exit();
}
$res = $stmt->get_result();
$row = $res->fetch_assoc();
if($res->num_rows!=1){
    $link->close(); 
    header('Location: index.php');
}
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$user_id = $row['user_id'];
if (file_exists('images/profile/'.$user_id.'.jpg')){
    $profilepic = '"images/profile/'.$user_id.'.jpg"';
}else{
    $profilepic = '"images/profile/default.jpg"';
}

//update profile info
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $success=false;
    if (isset($_FILES['ProfilePic'])){
        $success = move_uploaded_file($_FILES["ProfilePic"]["tmp_name"], 'images/profile/'.$user_id.'.jpg');
    }
    if (isset($_POST['firstname'])){
        if(Validate_Input($_POST['firstname'])){
            $firstname = $_POST["firstname"];   
        }
    }
    if (isset($_POST['lastname'])){
        if(Validate_Input($_POST['lastname'])){
            $lastname = $_POST["lastname"];   
        }
    }
    try{
        $stmt=$link->prepare("UPDATE `user` SET `profilePic`=?, `firstname`=?, `lastname`=?  WHERE `user_id`=?");
        $stmt->bind_param("ssss", $image, $firstname, $lastname, $user_id);
        $stmt->execute();
    }
    catch(Exception $e) {
        $link->close();
        header('Location: userprofile.php?success=false');
    }    
    if(($stmt->affected_rows==1)||($success=true)){
        $link->close();
        header('Location: userprofile.php?success=true');
    }
    header('Location: userprofile.php');
}
$link->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" type="text/css" href="style/main.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />
    <link rel="stylesheet" type="text/css" href="style/form.css" />
    <link rel="icon" type="image/x-icon" href="images/Logo.ico">
</head>
<body>
    <?php
        include 'navbar.php';
    ?>
    <div class="main">
        <div class="container">
            <div class="inner_container">
                <div>
                    <?php 
                    if(isset($_GET['success'])){
                        if ($_GET['success']=='true'){
                            echo '<p class="success"> Operation completed </p>';
                        }
                        else{
                            echo '<p class="error"> Operation failed </p>';
                        }
                    }
                ?>
                </div>
                <form action = "userprofile.php" method="post"  enctype="multipart/form-data">
                    <p class="formtitle">User Profile</p>
                    <div class="pic_container">    
                        <img class="profile_pic" width="150" src=<?php echo $profilepic;?> alt="your profile picture">
                        <p><label class = "input_label">Change pic (MAX 2Mb)</label></p>
                        <input type="file" id = "ProfilePic" name="ProfilePic"/>
                    </div>
                    <div>
                        <label class = "input_label" for="firstname">First name:</label>
                        <input class= "input" type="text" placeholder="<?php echo htmlspecialchars($firstname);?>" id="firstname" name="firstname"><br><br>

                        <label class = "input_label" for="lastname">Last name:</label>
                        <input class= "input" type="text" placeholder="<?php echo htmlspecialchars($lastname);?>" id="lastname" name="lastname"><br><br>
                            
                        <label class = "input_label" for="lastname">Email:</label>
                        <p> <?php echo htmlspecialchars($email);?>" </p><br><br>
                    </div>
                    <div>
                        <input class= "button" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
</body>
<!--made on earth by humans-->
</html>
