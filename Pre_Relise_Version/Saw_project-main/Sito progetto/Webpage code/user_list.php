<?php 
    session_start();
    if(!isset($admin_control)){
    	include 'process/access_control.php';
    }
    if(!isset($config)){
    	include 'process/config.php';
    }
    if (!admin_control()){
        header('Location: login.php');
    }
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
        //echo '<script>window.onload = function() { document.getElementById("id01").style.display = "block"; }</script>';
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>List of users</title>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" >
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  </head>

  <body>
    <?php
        include 'navbar.php';
    ?>
    <h2>List of users</h2>
    <!--<p> <a href = "process/get_user_list.php"> get user list</a> </p>-->

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

    <script>
      $(document).ready(function () {
        $("#users").DataTable({
          ajax: {
           url: "process/get_user_list.php",
           dataType: 'json'
          },
          columns: [
            { data: "user_id" },
            { data: "firstname" },
            { data: "lastname" },
            { data: "email" },
            { data: "admin" },
            { data: "banned" },
            { data: "delete"},
          ],
          order: [
            [3, "asc"],
          ],
        });
      });
    </script>
  </body>
</html>


