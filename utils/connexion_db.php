<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=quizz_qcm', 'root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

