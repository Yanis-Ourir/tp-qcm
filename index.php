<?php
require_once('utils/connexion_db.php');

// Récupérer l'utilisateur connecté, s'il n'est pas connecté l'envoyer vers la page de connexion
session_start();
if (!isset($_SESSION['pseudo'])) {
    header('Location: login.php');
    exit;
}

$_SESSION['id'] = 1;


include_once('partials/header.php');
?>


    <div class="d-flex flex-column align-items-center mt-4">
        <h1>Quizz One Piece</h1>
        <h2>Bienvenue <?php echo $_SESSION['pseudo']; ?></h2>
        <h3>Vous devez répondre à 10 questions sur le thème de One piece !</h3>
        <p>Bonne chance !</p>
        <img src="./public/assets/episode-one-piece.jpg" alt="One piece">
        <form action="question.php" method="post">
            <input type="hidden" name="id" value="1">
            <button type="submit" class="btn btn-info mt-4">Commencer</button>
        </form>
    </div>


<?php include_once('partials/footer.php'); ?>