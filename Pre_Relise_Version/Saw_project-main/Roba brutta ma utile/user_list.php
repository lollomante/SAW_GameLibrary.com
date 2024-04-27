<?php 
    session_start();
    if(!isset($admin_control)){
    	include 'scripts/access_control.php';
    }
    if(!isset($config)){
    	include 'scripts/config.php';
    }
    if (!admin_control()){
        header('Location: login_page.php');
    }
    
?>

<style>
        table, th, td {
        border:1px solid black;
    }
    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href=".css/main.css" />
    <link rel="stylesheet" type="text/css" href=".css/popup.css" />
    <h1> user list </h1>
</head>

<body class = "main">
    <?php 
        include "navbar.php";
    ?>
    <?php
    if (isset($_GET["success"])) {
        if ($_GET["success"]==$GenericSucccess){
            $popup_text = 'Operation completed';
            $popup_background = 'popup_background_success';
        }
        else{
            if ($_GET["success"]==$DeleteSuccess){
                $popup_text = 'I delete data like you on the way to real errors';
                $popup_background = 'popup_background_success';
            }
            else{
                $popup_text = 'Operation Failed!';
                $popup_background = 'popup_background_fail';
            }
        }
        echo '<script>window.onload = function() { document.getElementById("id01").style.display = "block"; }</script>';
    }
    
    ?>
    <div id="id01" class="modal ">
        <div class="modal-content <?php echo $popup_background; ?> animate">
            <p class = "popup_text"> <?php echo $popup_text; ?> </p> 
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Close</button>
        </div>
    </div>

    <table style="width:80%">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>email</th>
            <th>id</th>
            <th>admin</th>
            <th>banned</th>
            <th>delete</th>
        </tr>
        <?php
            
            include 'scripts/mysql_connect.php';
            $query = "SELECT* FROM user ORDER BY email";
            $res=$link->query($query);
            if($res!=true){
                echo '<p class = "error"> Error: something went wrong </p>';
                    /*for debug*/ echo '<p>' . mysql_error() .'</p>';
            }
            $rowcount=$res->num_rows;
            if($rowcount>0){
                while($row=$res->fetch_array()){
                    echo '<tr>';
                        echo '<td>'.$row["firstname"].'</td>';
                        echo '<td>'.$row["lastname"].'</td>';
                        echo '<td>'.$row["email"].'</td>';
                        echo '<td>'.$row["user_id"].'</td>';
                        if($row["email"]!=$SuperUserEmail){
                            if($row["admin"]==1){
                                echo '<td> <a class = "linktext" href = "scripts/admin_modify.php? user_id='.$row["user_id"].'"> Remove from admin</a> </td>';
                            }
                            else{
                                echo '<td> <a class = "linktext" href = "scripts/admin_modify.php? user_id='.$row["user_id"].'"> Ad to admin</a> </td>';
                            }
                            if($row["banned"]==1){
                                echo '<td> <a class = "linktext" href = "scripts/ban_modify.php? user_id='.$row["user_id"].'"> Unban user</a> </td>';
                            }
                            else{
                                echo '<td> <a class = "linktext" href = "scripts/ban_modify.php? user_id='.$row["user_id"].'"> Ban user</a> </td>';
                            }
                            echo '<td> <a class = "linktext" href = "scripts/delete_user.php? user_id='.$row["user_id"].'">Delete user</a> </td>';
                        }
                        else{
                            echo ' ';
                        }
                    echo '</tr/';
                }
                
            }
            $link->close();
        ?>
    </table>
    <?php 
      // include 'footer.php';
    ?>

</body>
</html>