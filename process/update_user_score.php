<?php
require_once '../utils/connexion_db.php';
/**
 * @var PDO $db
 */
session_start();

if(isset($_SESSION['score']) && !empty($_SESSION['score'])) {
    $pseudo = $_SESSION['pseudo'];
    $score = $_SESSION['score'];

    $request = $db->prepare('UPDATE user SET score = :score WHERE pseudo = :pseudo');
    $request->execute([
        'score' => $score,
        'pseudo' => $pseudo
    ]);

    unset($_SESSION['score']);
    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../index.php');
    exit;
}