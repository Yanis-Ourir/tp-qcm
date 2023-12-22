<?php
require_once('../utils/connexion_db.php');
session_start();

/**
 * @var PDO $db
 */

if(isset($_SESSION['id']) && isset($_POST['answer'])) {
     $id = $_SESSION['id'];
     $answer = $_POST['answer'];

     $request = $db->prepare('SELECT * FROM answer WHERE content = :content');
     $request->execute(['content' => $answer]);
     $answer = $request->fetch(PDO::FETCH_ASSOC);

     $findQuestion = $db->prepare('SELECT * FROM question WHERE id = :id');
     $findQuestion->execute(['id' => $id]);
     $question = $findQuestion->fetch(PDO::FETCH_ASSOC);

     if($answer['is_correct'] == 1) {
         $_SESSION['score'] += $question['score_granted'];
     }

     $_SESSION['id']++;
     var_dump($_SESSION['score']);

     header('Location: ../question.php');
     exit;
    } else {
     header('Location: ../index.php');
     exit;
}
