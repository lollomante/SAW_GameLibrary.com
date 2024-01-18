<?php 
session_start();
require_once 'process/access_control.php';
require_once 'process/config.php';
require_once 'process/utility_function.php';
if (!admin_control()){
    header('Location: login.php');
    exit();
}
//get data from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //ceck that all field are valid
    if(!Validate_Input($_POST['game_name']) || !Validate_Input($_POST['game_series']) || !Validate_Optional_input($_POST['game_engine'])|| !Validate_Input($_POST['game_genre']) || !Validate_Input($_POST['game_developer']) 
        || !Validate_Input($_POST['game_publisher'])|| !Validate_Input($_POST['game_publication_date'])|| !Validate_Description($_POST['game_description'])
        || !Validate_Input($_POST['game_trailer_link'])|| !Validate_Input($_POST['game_trailer_title'])|| !Validate_data($_POST['game_publication_date'])){
        header('Location: add_game.php? game_id='.NULL);
        exit();
    }

    //connection to DB and insert date
    include 'process/mysqli_connect.php';
    $stmt=$link->prepare("INSERT INTO `game`(`name`,`series`,`engine`,`genre`,`developer`,`publisher`,`publ_date`,`description`,`trailer_link`,`trailer_title`) VALUES (?,?,?,?,?,?,?,?,?,?)");
    if($stmt == false){
        $link->close(); 
        header('Location: add_game.php? game_id='.NULL);
        exit();
    }
    $stmt->bind_param('ssssssssss', $_POST['game_name'], $_POST['game_series'], $_POST['game_engine'], $_POST['game_genre'], $_POST['game_developer'], $_POST['game_publisher'], $_POST['game_publication_date'],$_POST['game_description'],$_POST['game_trailer_link'],$_POST['game_trailer_title']);
    if($stmt == false){
        $link->close(); 
        header('Location: add_game.php? game_id='.NULL);
        exit();
    }
    try{
        $stmt->execute();
    }
    catch(Exception $e){
        header('Location: add_game.php? game_id='.NULL);
        exit();
    }
    $rowcount = $stmt->affected_rows;
    if($rowcount!=1){
        $link->close(); 
        header('Location: add_game.php? game_id='.NULL);
        exit();
    }

    //get 'game_id' from database to save images and create link to game page
    include 'process/mysqli_connect.php';
    $stmt=$link->prepare("SELECT `game_id` FROM `game` WHERE `name`=?");
    if($stmt==false){
        $link->close(); 
        header('Location: add_game.php? game_id='.NULL);
        exit();
    }
    $stmt->bind_param('s', $_POST['game_name']);
    if($stmt==false){
        $link->close(); 
        header('Location: add_game.php? game_id='.NULL);
        exit();
    }
    $stmt->execute();
    if($stmt==false){
        $link->close(); 
        header('Location: add_game.php? game_id='.NULL);
        exit();
    }
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    if($res->num_rows!=1){
        $link->close(); 
        header('Location: add_game.php? game_id='.NULL);
        exit();
    }
        
    //get uploaded images and save to correct folders
    move_uploaded_file($_FILES["Poster"]["tmp_name"], 'images/game/posters/'.$row['game_id'].'.jpg');
    move_uploaded_file($_FILES["Background"]["tmp_name"], 'images/game/background/'.$row['game_id'].'.jpg');
    $link->close(); 
    header('Location: add_game.php? game_id='.$row['game_id']);
    exit();
}
?>  


<!doctype html>
<html lang="en">
<head>
    <title>Add game</title>
    <link rel="icon" type="image/x-icon" href="images/Logo.ico">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" type="text/css" href="style/main.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />
    <link rel="stylesheet" type="text/css" href="style/admin.css" />
</head>

<body class="body">
    <?php
        include 'navbar.php';
    ?>
    <div class="main">
        <div class="container">
            <div class="inner_container">
                <form action="add_game.php" method="post" enctype="multipart/form-data" >

                    <P class="formtitle">Add new game</P>

                    <label class = "input_label" for="game_name">Game Name*:</label>
                    <input class= "input" type="text" placeholder="Enter game name" id="game_name" name="game_name" required><br><br>

                    <label class = "input_label" for="game_series">Game Series*:</label>
                    <input class= "input" type="text" placeholder="Enter game series" id="game_series" name="game_series" required><br><br>

                    <label class = "input_label" for="game_engine">Engine:</label>
                    <input class= "input" type="text" placeholder="Enter game engine" id="game_engine" name="game_engine" ><br><br>

                    <label class = "input_label" for="game_genre">Genre*:</label>
                    <input class= "input" type="text" placeholder="Enter game genre" id="game_genre" name="game_genre" required><br><br>

                    <label class = "input_label" for="game_developer">Developer*:</label>
                    <input class= "input" type="text" placeholder="Enter game developer" id="game_developer" name="game_developer" required><br><br>
                    
                    <label class = "input_label" for="game_publisher">Publisher*:</label>
                    <input class= "input" type="text" placeholder="Enter game publisher" id="game_publisher" name="game_publisher" required><br><br>
                    
                    <label class = "input_label" for="game_publication_date">Publication date*:</label>
                    <input class= "input" type="date" id="game_publication_date" name="game_publication_date"required><br><br>

                    <label class = "input_label" for="game_description">Description*:</label>
                    <input class= "input" type="text" placeholder="Enter description" id="game_description" name="game_description" required><br><br>

                    <label class = "input_label" for="game_trailer_link">Trailer link*:</label>
                    <input class= "input" type="text" placeholder="Enter trailer link" id="game_trailer_link" name="game_trailer_link" required><br><br>

                    <label class = "input_label" for="game_trailer_title">Trailer title*:</label>
                    <input class= "input" type="text" placeholder="Enter trailer title" id="game_trailer_title" name="game_trailer_title" required><br><br>

                    <label class = "input_label" for="Poster">Game poster</label>
                    <input class= "input" type="file" id = "Poster" name="Poster"/><br><br>

                    <label class = "input_label" for="Background">Game background</label>
                    <input class= "input" type="file" id = "Background" name="Background"/><br><br>

                    <input class= "button" type="submit" value="Submit">
                </form>
                <?php
                if (isset($_GET["game_id"])){
                    if($_GET["game_id"]=='NULL'){
                        echo '<p class="error"> Error: Something went wrong </p>';
                    }
                    else{
                        echo '<p class="success"> <span>Operation completed, go to </span><span><a class="link" href = "game.php?game_id='.$_GET["game_id"].'"> New game page </a></span></p>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!--made on earth by humans-->
</body>
</html>


