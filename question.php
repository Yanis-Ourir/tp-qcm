<?php
require_once('utils/connexion_db.php');
require_once('process/find_question.php');

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header('Location: index.php');
    exit;
} else if ($_SESSION['id'] > 6) {
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
        <div id="timer" class="timer">0</div>

        <?php if (isset($questions[0]['image']) && !empty($questions[0]['image'])) { ?>
            <img src="<?= $questions[0]['image'] ?>" alt="One piece" class="my-4" style="width: 800px; height: 500px">
        <?php } ?>

        <h4 class="my-4"><?php echo $questions[0]['title']; ?></h4>

        <form id="form" action="./process/check_answer.php" method="post">
            <?php foreach ($questions as $question) { ?>
                <div id="question-answers">
                    <input type="hidden" name="id" id="correct" value="<?= $question['is_correct'] ?>">
                    <input type="radio" name="answer" class="answer" value="<?= $question['content'] ?>">
                    <label for="answer"><?php echo $question['content']; ?></label>
                </div>
            <?php } ?>


            <button type="submit" class="btn btn-info my-4">Valider</button>
        </form>
    </div>
</section>


<?php include_once 'partials/footer.php' ?>

<script>
    const timer = document.querySelector('#timer');
    const form = document.querySelector('#form');

    let time = 0;
    setInterval(() => {
        time++;
        timer.innerHTML = time;
        if (time >= 30) {
            form.submit();
        }
    }, 1000);

    const answers = document.querySelectorAll('#question-answers');
    answers.forEach(answer => {
        const checkAnswer = answer.querySelector('#correct');
        console.log(checkAnswer.value);
        answer.addEventListener('click', () => {
            if (checkAnswer.value == 1) {
                answer.style.backgroundColor = 'green';
                answer.style.pointerEvents = 'none';
            } else {
                answer.style.backgroundColor = 'red';
                answer.style.pointerEvents = 'none';
            }
        });
    });

</script>