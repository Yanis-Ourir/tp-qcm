<?php
require_once './process/question-list.php';
include_once './partials/header.php';
?>


<h1 class="text-center mt-4">Ajouter une réponse à une question !</h1>

<?php if (isset($_GET['success']) && !empty($_GET['success'])) { ?>
    <div class="alert alert-success"><?= $_GET['success'] ?></div>
<?php } ?>

<form action="./process/create_answer.php" method="post" class="d-flex justify-content-center mt-4 w-100">

    <div class="w-50 d-flex flex-column align-items-center mt-4 border">


        <label for="answer" class="form-label mt-4">Réponse :</label>
        <input type="text" class="form-control w-50" name="answer" id="answer">




        <label for="id" class="mt-4">La question associée :</label>
        <select class="form-select w-50" name="id">
            <?php foreach ($questions as $question) { ?>
                <option value="<?= $question['id'] ?>"><?= $question['title'] ?></option>
            <?php } ?>
        </select>




        <label for="is_correct" class="mt-4">Est-ce la bonne réponse ?</label>
        <select class="form-select w-50" name="isCorrect">
            <option value='1'>Oui</option>
            <option value='0'>Non</option>
        </select>


    <button class="btn btn-info my-4" type="submit">Ajouter</button>
    </div>
<?php include_once('./partials/footer.php') ?>

