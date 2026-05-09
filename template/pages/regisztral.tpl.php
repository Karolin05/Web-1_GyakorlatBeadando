<div class="alert <?= $ujra ? 'alert-danger' : 'alert-success' ?> text-center mt-4 shadow-sm">
    <h2><?= $uzenet ?></h2>
    <?php if($ujra) { ?>
        <a href="belepes" class="btn btn-warning mt-3">Próbálja újra!</a>
    <?php } else { ?>
        <a href="belepes" class="btn btn-primary mt-3">Tovább a bejelentkezéshez</a>
    <?php } ?>
</div>