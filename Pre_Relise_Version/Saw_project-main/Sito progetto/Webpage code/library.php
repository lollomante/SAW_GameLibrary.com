<?php
session_start();

// Verifica se l'utente è loggato
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Query per ottenere la libreria dell'utente dal database
$stmt = $conn->prepare("SELECT game_id, game_title FROM library WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['userid']);
$stmt->execute();
$result = $stmt->get_result();

$games = [];
while ($row = $result->fetch_assoc()) {
    $games[] = $row;
}

$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>La Tua Libreria</title>
    <link rel="stylesheet" href="../Style/library.css" />
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="library">
        <h2>La Tua Libreria di Giochi</h2>
        <?php foreach ($games as $game): ?>
            <p>
                <?php echo $game['game_title']; ?>
            </p>
            <!-- Altri dettagli del gioco possono essere visualizzati qui -->
        <?php endforeach; ?>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>