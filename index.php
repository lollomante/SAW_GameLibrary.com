<?php
session_start();
require_once 'process/config.php';
require_once 'process/access_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GameLibrary.com</title>
    <meta name="viewport" content="width=device-width"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <link rel="stylesheet" type="text/css" href="style/search_bar.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />
</head>

<body class="body">
    <?php include 'navbar.php'; ?>
    <div class="main">
        <div>
            <?php include 'search_bar.php'; ?>
        </div>
        <div>
            <p class="title"> GameLibrary.com</p>
            <?php
            if (isset($rowcount)&&$rowcount>0){
                echo'<table class="table">';
                echo '<tr class="tableROW">
                        <th class="tableHD">Name</th>
                        <th class="tableHD">Series</th>
                        <th class="tableHD">Genre</th>
                        <th class="tableHD">Developer</th>
                        <th class="tableHD">Publisher</th>
                        <th class="tableHD">Released in</th>
                    </tr>';
                for($i= 0;$i<$rowcount;$i++){
                    $row = $res->fetch_assoc();
                    echo '<tr class="tableROW">
                            <td><a class = "link" href = "game.php?game_id='.$row['game_id'].'">'.$row['name'].'</a></td>
                            <td>'.$row['series'].'</td>
                            <td>'.$row['genre'].'</td>
                            <td>'.$row['developer'].'</td>
                            <td>'.$row['publisher'].'</td>
                            <td>'.$row['publ_date'].'</td>
                        </tr>';
                }  
                echo '</table><br><br><br><br><br>';         
            }
            else{
                echo"
                <p class='gentext'> At GameLibrary.com, we're dedicated to celebrating your passion for video games. We understand that your game collection is more than just a stack of discs or a digital library; it's a reflection of your gaming journey, memories, and achievements.</p>
                <div>
                    <p class='paratitle'> Discover, Organize, and Share: </p>
                    <ul>
                    <li class='gentext'>Explore your extensive game library with ease.</li>
                    <li class='gentext'>Organize your games the way you want, from classic titles to the latest releases.</li>
                    <li class='gentext'>Connect with fellow gamers who share your interests.</li>
                    </ul>
                </div>
                <div>
                    <p class='paratitle'> Why Choose Us: </p>
                    <ul>
                    <li class='gentext'>Personalized collections that tell your unique gaming story.</li>
                    <li class='gentext'>Tools to make managing your game library a breeze.</li>
                    <li class='gentext'>Join a community of like-minded gamers who appreciate the art of gaming.</li>
                    </ul>
                </div>
                <div style='margin-bottom:100px;'>
                    <p class='paratitle'>Start Your Journey:</p>
                    <p class='gentext'> <span> <a class='link' href='registration.php'> Sign up</a> </span> today and unlock the potential of your gaming collection. Whether you're a casual player, a completionist, or a die-hard fan, Gamelibrary.com is here to make your gaming experience even more exciting.</p>
                </div>";
            }
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <!--made on earth by humans-->
</body>

</html>
