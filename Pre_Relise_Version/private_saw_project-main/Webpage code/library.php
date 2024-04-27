<?php
    session_start();
    if (!isset($config)){
        include 'process/config.php';
    }
    if (!isset($access_control)){
    include 'process/access_control.php';
    }
    if (!session_control()){
        header('Location: login.php');
    }

    include 'process/mysqli_connect.php';
    $stmt=$link->prepare("SELECT game.name, game.game_id FROM game INNER JOIN library_rel ON game.game_id = library_rel.game_id WHERE library_rel.user_id = ? ORDER BY game.name");
    $stmt->bind_param('s', $_SESSION['user_id']);
    $stmt->execute();
    $res = $stmt->get_result();
    $rowcount=$res->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Style/library.css" />
    <title>Your library</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class ="main">
        <p class="title">Your library</p>
        <div class="container">
            <div class="inner_container">
                <?php 
                    while($row=$res->fetch_array()){
                        echo '<span>';
                        echo '<a class = "poster" href = "game.php?game_id='.$row['game_id'].'">
                                <img class="poster" src="../images/game/posters/'.$row['game_id'].'.jpg" width="300" height="450" alt="'.$row['name'].'"></a>';
                        echo'</span>';
                        }
                ?>
            </div>

        </div>
    </div>

    <?php //include 'footer.php'; ?>

</body>

</html>