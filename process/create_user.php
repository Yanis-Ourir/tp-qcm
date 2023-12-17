<?php
require_once('../utils/connexion_db.php');

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];
    $query = $db->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
    $query->bindValue(':pseudo', $pseudo);
    $query->execute();
    $user = $query->fetch();
    
    if(!$user) {
        $query = $db->prepare('INSERT INTO user (pseudo) VALUES (:pseudo)');
        $query->bindValue(':pseudo', $pseudo);
        $query->execute();
        $user = $query->fetch();
    }

    session_start();

    $_SESSION['pseudo'] = $user['pseudo'];
    $_SESSION['id'] = $user['id'];

    header('Location: ../index.php');
}

