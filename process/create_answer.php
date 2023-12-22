<?php
require_once('../utils/connexion_db.php');


if(
    isset($_POST['answer']) && !empty($_POST['answer']) &&
    isset($_POST['id']) && !empty($_POST['id']) &&
    isset($_POST['isCorrect'])
) {
    $answer = $_POST['answer'];
    $idQuestion = $_POST['id'];
    $isCorrect = $_POST['isCorrect'];
    $query = $db->prepare('INSERT INTO answer (question_id, content, is_correct) VALUES (:question_id, :content, :is_correct)');
    $query->execute([
        'question_id' => $idQuestion,
        'content' => $answer,
        'is_correct' => $isCorrect,
    ]);

    header('Location: ../add_answer.php?success=Votre réponse a bien été ajoutée');
} else {
    header("Location: ../add_answer.php?error=Veuillez remplir tous les champs");
    exit;
}