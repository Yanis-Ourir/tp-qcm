<?php
require_once('utils/connexion_db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir  son pseudo</title>
</head>
<body>
    <form action='process/create_user.php' method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
        <button type="submit">Valider</button>
    </form>
</body>
</html>