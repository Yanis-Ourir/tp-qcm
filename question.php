<?php
require_once('utils/connexion_db.php');
require_once('process/find_question.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Quizz - One piece</title>
</head>

<body>
    <nav class="bg-info d-flex align-items-center p-4">
        <a href="index.php" class="text-white">Accueil</a>
        <ul class="d-flex list-style-none text-white">
            <li>
                <a href="#" class="text-white">Déconnexion</a>
            </li>
            <li>
                <a href="#" class="text-white">Classement</a>
            </li>
        </ul>
    </nav>

    <section id="question">
        <div class="d-flex flex-column align-items-center">

           <?php if(isset($question['image']) && !empty($question['image'])) { ?>
                <img src="<?=$question['image']?>" alt="One piece">
            <?php } ?> 

            <p><?php echo $question['title']; ?></p>

            <form action="process/answer_question.php" method="post">
                <input type="hidden" name="idQuestion" value="<?php echo $question['id']; ?>">
                <div>
                    <input type="radio" name="answer" id="answer1" value="1">
                    <label for="answer1"><?php echo $question['first_answer']; ?></label>
                </div>
                <div>
                    <input type="radio" name="answer" id="answer2" value="2">
                    <label for="answer2"><?php echo $question['second_answer']; ?></label>
                </div>
                <div>
                    <input type="radio" name="answer" id="answer3" value="3">
                    <label for="answer3"><?php echo $question['third_answer']; ?></label>
                </div>
                <button type="submit">Valider</button>
            </form>
        </div>
    </section>


</body>

</html>