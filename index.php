<?php
require_once('utils/connexion_db.php');

// Récupérer l'utilisateur connecté, s'il n'est pas connecté l'envoyer vers la page de connexion
session_start();
if (!isset($_SESSION['pseudo'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz One Piece FR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="bg-info d-flex align-items-center p-4">
        <a href="index.php" class="text-white">Accueil</a>
        <ul class="d-flex list-style-none text-white">
            <li>
                <a href="#" class="text-white">Déconnexion</a>
            </li>
            <li>
                <a href="#" class="text-white">Classement</a>
            </li>
        </ul>
    </nav>

    <div class="d-flex flex-column align-items-center">
        <h1>Quizz One Piece</h1>
        <h2>Bienvenue <?php echo $_SESSION['pseudo']; ?></h2>
        <h3>Vous devez répondre à 10 questions sur le thème de One piece !</h3>
        <p>Bonne chance !</p>
        <img src="public/assets/episode-one-piece.jpg" alt="One piece">
        <a href="question.php?id=1" class="btn btn-info mt-4">Commencer</a>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>