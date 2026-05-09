<?php if(isset($_SESSION['login'])) { ?>
    <div class="alert alert-success text-center mt-4 shadow-sm">
        <h2>Sikeres bejelentkezés!</h2>
        <p class="lead">Üdvözöljük, <?= $_SESSION['csn'] ?> <?= $_SESSION['un'] ?>!</p>
        <a href="." class="btn btn-primary mt-3">Tovább a főoldalra</a>
    </div>
<?php } else { ?>
    <div class="alert alert-danger text-center mt-4 shadow-sm">
        <h2><?= isset($uzenet) ? $uzenet : "Hiba történt a belépés során." ?></h2>
        <a href="belepes" class="btn btn-warning mt-3">Próbálja újra!</a>
    </div>
<?php } ?>