<?php

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $idQuestion = $_GET['id'];
    $query = $db->prepare('SELECT * FROM question WHERE id = :id');
    $query->bind(':id', $idQuestion);
    $query->execute();
    $question = $query->fetch();
} else {
    header('Location: index.php');
    exit;
}

