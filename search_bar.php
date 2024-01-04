<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['search_bar'])) {
        include 'process/mysqli_connect.php';
        if($_GET['search_bar']=='/ALL'){
            $stmt=$link->prepare("SELECT name, series, genre, developer, publisher, publ_date, game_id FROM game ORDER BY name");
            if($stmt != false){
                $stmt->execute();
            }
        }
        else{
            $stmt=$link->prepare("SELECT name, series, genre, developer, publisher, publ_date, game_id FROM game WHERE name LIKE ? ORDER BY name");
            if($stmt != false){
                $parameter = $_GET['search_bar'].'%';
                $stmt->bind_param('s', $parameter);
                if($stmt != false){
                    $stmt->execute();
                }
            }
        }
        if($stmt != false){
            $res = $stmt->get_result();
            $rowcount =$res->num_rows;
        }
    }
}

?>
<div class="search_bar">
    <div class="bar">
        <form action="index.php" method="GET">
            <span><input class= "input" type="text" placeholder="Search something, type '/ALL' to wiew all games" id="search_bar" name="search_bar"></span>
            <span><button class= "button" type="submit" > Submit </button></span>
        </form>
    </div>
</div>
