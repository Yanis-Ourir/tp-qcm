<?php
require_once('utils/connexion_db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rajouter question One Piece</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php if (isset($_GET['success']) && !empty($_GET['success'])) { ?>
        <div class="alert alert-success"><?= $_GET['success'] ?></div>
    <?php } ?>

    <?php if (isset($_GET['error']) && !empty($_GET['error'])) { ?>
        <div class="alert alert-danger"><?= $_GET['error'] ?></div>
    <?php } ?>
    <form action="process/create_question.php" enctype="multipart/form-data" method="post" class="p-4">
        <label>Énoncé de la question :</label>
        <input class="form-control" type="text" name="title" id="title">

        <label>Score de la question :</label>
        <input class="form-control" type="number" name="score" id="score">

        <label>Image de la question : (Pas obligatoire)</label>
        <input class="form-control" type="file" name="image" id="image">

        <button type="submit" class="btn btn-info mt-4">Ajouter</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>