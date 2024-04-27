<?php
    session_start();
?>  
<?php
    include 'navbar.php';
?>
<link rel="stylesheet" href="../Style/store.css" />
<div class="container main-content">
    <?php foreach ($games as $game): ?>
        <div class="game-card">
            <h3>
                <?= htmlspecialchars($game['title']); ?>
            </h3>
            <img src="<?= htmlspecialchars($game['image']); ?>" alt="Game Cover" />
            <p>
                <?= htmlspecialchars($game['description']); ?>
            </p>
            <a href="game.php?id=<?= $game['id']; ?>" class="btn btn-primary">More Info</a>
        </div>
    <?php endforeach; ?>
</div>

<?php
include('footer.php');
?>