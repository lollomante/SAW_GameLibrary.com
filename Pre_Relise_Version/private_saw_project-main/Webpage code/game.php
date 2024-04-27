<?php
    session_start();
    if(!isset($config)){
    	include 'process/config.php';
    }
    if(!isset($access_control)){
    	include 'process/access_control.php';
    }
    //initializa variable to default values
    $game_id = 0;
    $game_name = 'default';
    $game_series = 'default';
    $game_type = 'default';
    $game_engine = 'default';
    $game_genre = 'default';    
    $game_developer = 'default';
    $game_publisher = 'default';
    $game_date = 'default';
    $game_description = 'default';
    $trailer_link = 'default';
    $trailer_title = 'default';


    //get game data from database
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $game_id = $_GET["game_id"];
        include 'process/mysqli_connect.php';
        //get data from game table
        try{
            $stmt=$link->prepare("SELECT* FROM game WHERE game_id=?");
            $stmt->bind_param('s', $game_id);
            $stmt->execute();
            $res = $stmt->get_result();
            $row = $res->fetch_assoc();
        }
        catch(Exception $e) {
            echo 'something went wrong';
        }
        if ($res->num_rows==1){
            $game_name = htmlspecialchars($row['name']);
            $game_series = htmlspecialchars($row['series']);
            $game_type = htmlspecialchars($row['type']);
            $game_engine = htmlspecialchars($row['engine']);
            $game_genre = htmlspecialchars($row['genre']);
            $game_developer = htmlspecialchars($row['dev_id']);
            $game_publisher = htmlspecialchars($row['pub_id']);
            $game_date = htmlspecialchars($row['publ_date']);
            $game_description = htmlspecialchars($row['description']);
            $trailer_link = '"'.htmlspecialchars($row['trailer_link']).'"';
            $trailer_title = '"'.htmlspecialchars($row['trailer_title']).'"';
        }

        //get user specific data
        $game_owned=false;
        if (session_control()){
            //get data from library table
            try{
                $stmt=$link->prepare("SELECT* FROM library_rel WHERE game_id=? AND user_id=?");
                $stmt->bind_param('ss', $game_id, $_SESSION['user_id']);
                $stmt->execute();
                $res2 = $stmt->get_result();
            }
            catch(Exception $e) {
                echo 'something went wrong';
            }
            if ($res2->num_rows== 1){
                $game_owned = true;
                $row2 = $res2->fetch_assoc();
            }
            else{
                $altermative_text = '<p class = "text"> <span>This game is not in your library </span><span><a class="link" href = "process/add_to_library.php? game_id='.$row['game_id'].'"> Add to Library</a></span> <p>';
            }
        }
        else{
            $altermative_text = '<p class = "text"> You need to log in to track progress <p>';
        }

        //get data from dlc_rel table
        try{
            $stmt=$link->prepare("SELECT* FROM dlc_rel WHERE father_game_id=?");
            $stmt->bind_param('s', $game_id);
            $stmt->execute();
            $res3 = $stmt->get_result();
        }
        catch(Exception $e) {
            echo 'something went wrong';
        }
        $dlc_number=$res3->num_rows;
        /*if($dlc_number>0){
            for($i=0; $i<$dlc_number; $i++){
                $row3 = $res3->fetch_assoc();
                $stmt=$link->prepare("SELECT game.name FROM game INNER JOIN dlc_rel ON game.game_id = dlc_rel.father_game_id WHERE father_game_id = ?");
                $stmt->bind_param('s', $game_id);
                $stmt->execute();
                $res = $stmt->get_result();
                
            }*/
        $link->close();
    }
    $poster = '"../images/game/posters/'.$game_id.'.jpg"';

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../Style/navbar.css" />
<link rel="stylesheet" type="text/css" href="../style/game.css" />

<head>
    <title><?php echo $game_name;?></title>
    <style>
        .background-container {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 1)), url(<?php echo '"../images/game/background/'.$game_id.'.jpg"'?>) center/cover no-repeat;
        }
    </style>
  <?php
  ?>
</head>

<body>
<?php include 'navbar.php';?>
<div class = "main background-container">
    <p class="title"> <?php echo $game_name;?></p>
    <div class="row">
        <div class="column">
            <img class="poster"src=<?php echo $poster;?> width="600" height="900" alt=""/>
        </div>
        <div class="column">
            <div class="container">
                <div class ="inner_container">
                    <p><span class="label">Series: </span><span class="text"><?php echo $game_series; ?></span></p>
                    <p><span class="label">Developer: </span><span class="text"><?php echo $game_developer; ?></span></p>
                    <p><span class="label">Publisher: </span><span class="text"><?php echo $game_publisher; ?></span></p>
                    <p><span class="label">Engine: </span><span class="text"><?php echo $game_engine; ?></span></p>
                    <p><span class="label">Released in: </span><span class="text"><?php echo $game_date; ?></span></p>
                    <p><span class="label">Genre: </span><span class="text"><?php echo $game_genre; ?></span></p>
                </div>
            </div>
            <br/><br/>
            <div class="container">
                <div class ="inner_container">
                    <?php
                    if($game_owned){
                        echo '<p><span class="label">In Library: </span><span class="text">'.'Coming Soon!'.'</span></p>';
                        echo '<p><span class="label">Bought in: </span><span class="text">'.'Coming Soon!'.'</span></p>';
                        echo '<p><span class="label">Bought on: </span><span class="text">'.'Coming Soon!'.'</span></p>';
                        echo '<p><span class="label">Price: </span><span class="text">'.'Coming Soon!'.'</span></p>';
                    }
                    else{
                        echo $altermative_text;
                    }
                    ?>    
                </div>                    
            </div>
            <br/><br/>
            <div class="container">
                <div class="inner_container">
                    <?php
                    if($game_owned){
                        echo '<table style="width:100%">';
                        echo'<tr>';
                        echo'<th class="label">Main:</th>';
                        echo'<th class="label">Secondary:</th>';
                        echo'<th class="label">Objectives:</th>';
                        echo '</tr>';
                        echo'<tr>';
                        if($row2['main_compl']==1){
                            echo'<th><a href="process/compl_modify.php?game_id='.$game_id.'%7Cmain"> Completed</a></th>';
                        }
                        if($row2['main_compl']==0){
                            echo'<th><a href="process/compl_modify.php?game_id='.$game_id.'%7Cmain"> Not completed</a></th>';
                        }
                        if($row2['secondary_compl']==1){
                            echo'<th><a href="process/compl_modify.php?game_id='.$game_id.'%7Csec"> Completed</a></th>';
                        }
                        if($row2['secondary_compl']==0){
                            echo'<th><a href="process/compl_modify.php?game_id='.$game_id.'%7Csec"> Not completed</a></th>';
                        }
                        if($row2['objectives_compl']==1){
                            echo'<th><a href="process/compl_modify.php?game_id='.$game_id.'%7Cobj"> Completed</a></th>';
                        }
                        if($row2['objectives_compl']==0){
                            echo'<th><a href="process/compl_modify.php?game_id='.$game_id.'%7Cobj"> Not completed</a></th>';
                        }
                        echo '</tr>';
                        echo '</table>';                       
                    }
                    else{
                        echo $altermative_text;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="container">
        <div class="inner_container">
            <p class="label" style="text-align:center"> DLC: </p>
            <?php
                if($dlc_number>0){
                    /*for($i=0; $i<$dlc_number; $i++){
                        $row3 = $res3->fetch_assoc();

                    }*/
                }else{
                    echo ' <p class="text">No DLC available for this game </p>';
                }
                ?>
                <!--
                <table style="width:100%">
                    <tr>
                        <th class="label"> DLC:</th>
                    </tr>
                    <tr>
                        <td>     
                            <p class="text">Cyberpunk 2077: Phantom Liberty </p>
                        </td>
                    </tr>
                </table>
            -->
            </div>
        </div>
        <br/><br/>
        <div class="container">
            <div class="text inner_container">
                <?php echo $game_description; ?>
            </div>
        </div>


        <div class = "innser_container">
            <iframe width="1250" height="703" src= <?php echo $trailer_link;?> title=<?php echo $trailer_title;?> frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
    </div>
</body>
</html>