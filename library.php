<?php
session_start();
require_once 'process/config.php';
require_once 'process/access_control.php';
if (!session_control()){
    header('Location: login.php');
    exit();
}

include 'process/mysqli_connect.php';
$stmt=$link->prepare("SELECT game.name, game.game_id FROM game INNER JOIN library_rel ON game.game_id = library_rel.game_id WHERE library_rel.user_id = ? ORDER BY game.name");
if($stmt == false){
    $link->close(); 
    header('Location: index.php');
    exit();
}
$stmt->bind_param('s', $_SESSION['user_id']);
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
$rowcount=$res->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Your library</title>
    <link rel="icon" type="image/x-icon" href="images/Logo.ico">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" type="text/css" href="style/main.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />
    <link rel="stylesheet" type="text/css" href="style/library.css" />
</head>

<body class="body">
<?php include 'navbar.php'; ?>
    <div class ="main">
        <p class="title">Your library</p>
        <div class="container">
            <div class="inner_container">
                <?php
                    for($i=0; $i<$rowcount;){
                        echo '<div class = "row">';
                        for($j= 0; $j<4 && $i<$rowcount; $j++){
                            $row=$res->fetch_assoc();
                            echo '<span class = "poster">';
                            echo '<a href = "game.php?game_id='.$row['game_id'].'">
                                    <img src="images/game/posters/'.$row['game_id'].'.jpg" width="300" height="450" alt="'.$row['name'].'"></a>';
                            echo'</span>';
                            $i++;
                        }
                        echo '</div>';
                    }
                ?>
            </div>

        </div>
    </div>

    <?php include 'footer.php'; ?>
    <!--made on earth by humans-->
</body>

</html>