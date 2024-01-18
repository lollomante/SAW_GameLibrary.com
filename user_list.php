<?php 
session_start();
require_once 'process/access_control.php';
require_once 'process/config.php';
if (!admin_control()){
  header('Location: login.php');
  exit();
}

if (isset($_GET["success"])) {
  if ($_GET["success"]=='success'){
    $popup_text = 'Operation completed';
    $popup_background = 'popup_background_success';
  }
  else{
    if ($_GET["success"]=='delete_success'){
      $popup_text = 'I delete data like you on the way to real errors';
      $popup_background = 'popup_background_success';
    }
    else{
      $popup_text = 'Operation Failed!';
      $popup_background = 'popup_background_fail';
    }
  }       //echo '<script>window.onload = function() { document.getElementById("id01").style.display = "block"; }</script>';
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>List of users</title>
    <link rel="icon" type="image/x-icon" href="images/Logo.ico">
    <meta name="viewport" content="width=device-width"/>
    <meta charset="utf-8">  
    <link rel="stylesheet" type="text/css" href="style/main.css" />
    <link rel="stylesheet" type="text/css" href="style/navbar.css" />
    <link rel="stylesheet" type="text/css" href="style/footer.css" />  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  </head>

  <body>
    <?php
        include 'navbar.php';
    ?>
    <div class="main_black">
      <h2>List of users</h2>
      <?php
      if (isset($popup_text)) {
        echo '<p>'.$popup_text.'</p>';
      }
      ?>
    </div>
    <div class="mytab">
      <table id="users" class="display" style="width: 90%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstame</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Banned</th>
            <th>Delete</td>
          </tr>
        </thead>
      </table>
    </div>

    <script src="script/user_list.js"></script>
  </body>
</html>


