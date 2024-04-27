<!DOCTYPE html>
<html lang="en">

<head>


    <link rel="stylesheet" href="Search_bar.css">
</head>

<body>
    <div class="search_bar">
        <input type="search" class="search_box" onkeyup="Search()" placeholder="Cerca">
    </div>
    <div id="Results">
    </div>
    <script src="Search_bar.js"></script>
</body>

</html>

<?php

//Searches in database
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $game_library = "SELECT name FROM game WHERE name LIKE '%$query%' OR genre LIKE '%$query%' OR engine LIKE '%$query%'";
    $result = $conn->query($game_library);

    //Results shown
    if ($row = $result->fetch_assoc()) {
        echo $row['name'];
    } else {
        echo "Non esiste cio' che cerchi nella libreria";
    }
    $conn->close();
}
?>