<?php

session_start();
include_once './partials/header.php';
?>


<h1 class="text-center">Le résultat de votre quizz est : </h1>

<div class="d-flex flex-column justify-content-center align-items-center">

<h3> <?= $_SESSION['pseudo'] ?>, votre score est de <?= $_SESSION['score'] ?> points</h3>
<?php if($_SESSION['score'] >= 8) { ?>
    <p>Bravo ! Vous êtes bon !</p>
    <img src="https://dojotaku.com/cdn/shop/articles/luffy-age.webp?v=1686482098">
<?php } else { ?>
    <p>Bien guez</p>
    <img src="./public/assets/one-piece-nami.jpg">
<?php } ?>
    <form action="./process/update_user_score.php" method="post">
        <input type="hidden" name="pseudo" value="<?= $_SESSION['pseudo'] ?>">
        <input type="hidden" name="score" value="<?= $_SESSION['score'] ?>">
        <button type="submit" class="btn btn-info my-4">Réessayer</button>
    </form>
</div>

<?php include_once './partials/footer.php' ?>
