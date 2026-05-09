<h1 class="mt-4 mb-4">Beérkezett Üzenetek</h1>

<?php if(!isset($_SESSION['login'])): ?>
    <div class="alert alert-danger shadow-sm">Ehhez az oldalhoz csak bejelentkezett felhasználók férhetnek hozzá!</div>
<?php else: ?>
    <?php if(isset($hiba)): ?>
        <div class="alert alert-danger shadow-sm"><?= $hiba ?></div>
    <?php endif; ?>
    
    <?php if(empty($uzenetLista)): ?>
        <div class="alert alert-info shadow-sm">Jelenleg nincs egyetlen beérkezett üzenet sem.</div>
    <?php else: ?>
        <div class="row">
            <?php foreach($uzenetLista as $uzenet): ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100 border-left-primary">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 text-primary fw-bold"><?= htmlspecialchars($uzenet['nev']) ?></h5>
                            <small class="text-muted"><?= htmlspecialchars($uzenet['datum']) ?></small>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-3 text-muted">
                                <a href="mailto:<?= htmlspecialchars($uzenet['email']) ?>"><?= htmlspecialchars($uzenet['email']) ?></a>
                            </h6>
                            <p class="card-text"><?= nl2br(htmlspecialchars($uzenet['szoveg'])) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>