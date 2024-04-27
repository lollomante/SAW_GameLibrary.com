<?php
session_start();
if (!isset($config)) {
    include 'process/config.php';
}
if (!isset($access_control)) {
    include 'process/access_control.php';
}
if (!session_control()) {
    header('Location: login_page.php');
}
if (!isset($utility_function)) {
    include 'process/utility_function.php';
}

//display profile info
include 'process/mysqli_connect.php';
$stmt = $link->prepare("SELECT* FROM user WHERE email=?");
$stmt->bind_param('s', $_SESSION["email"]);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$rowcount = $res->num_rows;
if ($rowcount != 1) {
    $link->close();
    header('Location: index.php');
}
if ($row['profilePic'] != null) {
    $profilepic = '"data:image/jpeg;base64,' . base64_encode($row['profilePic']) . '"/>';
} else {
    $profilepic = '"https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"';
}
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$user_id = $row['user_id'];

//update profile info
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['ProfilePic']) && $_FILES['ProfilePic']['error'] === UPLOAD_ERR_OK) {
        //TODO: validate profile pic
        $image = file_get_contents($_FILES["ProfilePic"]["tmp_name"]);
    }
    if (isset($_POST['firstname'])) {
        if (Validate_Input($_POST['firstname'])) {
            $firstname = $_POST["firstname"];
        }
    }
    if (isset($_POST['lastname'])) {
        if (Validate_Input($_POST['lastname'])) {
            $lastname = $_POST["lastname"];
        }
    }
    try {
        $stmt = $link->prepare("UPDATE `user` SET `profilePic`=?, `firstname`=?, `lastname`=?  WHERE `user_id`=?");
        $stmt->bind_param("ssss", $image, $firstname, $lastname, $user_id);
        $stmt->execute();
    } catch (PDOException $e) {
        $success = false;
    }
    if ($stmt->affected_rows == 1) {
        $success = true;
    }
}
$link->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../Style/userprofile.css" />
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <h2>User Profile</h2>
    <div>
        <?php
        if (isset($success)) {
            if ($success == true) {
                echo '<p> operation completed </p>';
            } else {
                echo '<p> operation failed </p>';
            }
        }
        ?>
    </div>
    <form action="userprofile.php" method="post" enctype="multipart/form-data">
        <div>
            <img class="rounded-circle mt-5" width="150px" src=<?php echo $profilepic; ?>>
            <p><label>Change pic</label></p>
            <input type="file" id="ProfilePic" name="ProfilePic" />
        </div>
        <div>
            <label for="firstname">First name:</label><br>
            <input type="text" placeholder="<?php echo htmlspecialchars($firstname); ?>" id="firstname"
                name="firstname"><br><br>

            <label for="lastname">Last name:</label><br>
            <input type="text" placeholder="<?php echo htmlspecialchars($lastname); ?>" id="lastname"
                name="lastname"><br><br>

            <label for="lastname">Email:</label>
            <p>
                <?php echo htmlspecialchars($email); ?>"
            </p><br><br>

        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>

    <?php
    include 'footer.php';
    ?>
</body>

</html>