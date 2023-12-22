<?php
require_once('utils/connexion_db.php');
require_once('process/find_question.php');
session_start();
if(!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: index.php');
    exit;
} else if ($_SESSION['id'] > 10) {
    header('Location: result.php');
    exit;
}
/**
 * @var  $questions
 * mes questions sur ma BDD avec la jointure de table
 *
 */


include_once 'partials/header.php';
?>

    <section id="question">
        <div class="d-flex flex-column align-items-center">

           <?php if(isset($questions[0]['image']) && !empty($questions[0]['image'])) { ?>
                <img src="<?=$questions[0]['image']?>" alt="One piece" class="my-4" style="width: 800px; height: 500px">
            <?php } ?> 

            <h4 class="my-4"><?php echo $questions[0]['title']; ?></h4>

            <form action="./process/check_answer.php" method="post">
                <?php foreach ($questions as $question) { ?>
                    <div>
                        <input type="radio" name="answer" id="answer" value="<?= $question['content'] ?>">
                        <label for="answer1"><?php echo $question['content']; ?></label>
                    </div>
                <?php } ?>


                <button type="submit" class="btn btn-info my-4">Valider</button>
            </form>
        </div>
    </section>

<?php include_once 'partials/footer.php' ?>