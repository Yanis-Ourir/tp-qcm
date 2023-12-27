<?php
require_once('../utils/connexion_db.php');
/**
 * @var PDO $db
 */

session_start();

if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['score']) && !empty($_POST['score'])) {
    $title = $_POST['title'];
    $score = $_POST['score'];

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $imageSize = 2097152;
        $extensions = ['jpg', 'png', 'jpeg'];
        if ($_FILES['image']['size'] <= $imageSize) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
            if (in_array($extensionUpload, $extensions)) {
                $pathImage = "../public/image_question/" . $_SESSION['id'] . "-" . $_FILES['image']['name'];
                $uploadToPath = move_uploaded_file($_FILES['image']['tmp_name'], $pathImage);
            } else {
                $error = "Votre image doit être au format jpg, jpeg ou png";
                header("Location: ../add_question.php?error=$error");
            }
        }
        $query = $db->prepare('INSERT INTO question (title, score_granted, image) VALUES (:title, :score_granted, :image)');

    } else {
        $query = $db->prepare('INSERT INTO question (title, score_granted, image) VALUES (:title, :score_granted, :image)');
        $pathImage = null;
    }
    $correctImg = substr($pathImage, 3);
    $query->bindValue(':title', $title);
    $query->bindValue(':score_granted', $score);

    $query->bindValue(':image', $correctImg);
    $query->execute();

    header('Location: ../add_question.php?success=Votre question a bien été ajoutée');
} else {
    header("Location: ../add_question.php?error=Veuillez remplir tous les champs");
    exit;
}
