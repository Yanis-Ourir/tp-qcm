<?php

require_once './utils/connexion_db.php';

/** @var PDO $db */

$query = $db->prepare('SELECT * FROM question');
$query->execute();
$questions = $query->fetchAll();

?>