<?php
/**
 * @var PDO $db
 */
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $idQuestion = $_SESSION['id'];
    $query = $db->prepare('SELECT * FROM question JOIN answer ON answer.question_id = question.id 
                            WHERE question.id = :id');
    $query->bindValue(':id', $idQuestion);
    $query->execute();
    $questions = $query->fetchAll();
} else {
    header('Location: index.php');
    exit;
}

