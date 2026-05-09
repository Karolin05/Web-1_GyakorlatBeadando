<h1 class="mt-4 mb-4">A Nemzet Színészei - Adatbázis Kezelés</h1>

<?php if($uzenet): ?>
    <div class="alert alert-success shadow-sm"><?= $uzenet ?></div>
<?php endif; ?>

<?php if(isset($_SESSION['login'])): ?>
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white" id="crud-title">Új színész hozzáadása</div>
        <div class="card-body">
            <form action="crud" method="post">
                <input type="hidden" name="action" id="crud-action" value="create">
                <input type="hidden" name="id" id="crud-id" value="">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Név</label>
                        <input type="text" name="nev" id="crud-nev" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Születési név</label>
                        <input type="text" name="szuletesinev" id="crud-szuletesinev" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Választás dátuma</label>
                        <input type="date" name="valasztas" id="crud-valasztas" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Született</label>
                        <input type="date" name="szuletett" id="crud-szuletett" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Születési hely</label>
                        <input type="text" name="szuletesihely" id="crud-szuletesihely" class="form-control">
                    </div>
                </div>
                <button type="submit" id="crud-submit" class="btn btn-success w-100">Hozzáadás</button>
            </form>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning shadow-sm mb-4">
        Új adatok rögzítéséhez, módosításához vagy törléséhez <strong>be kell jelentkeznie</strong>!
    </div>
<?php endif; ?>

<div class="table-responsive shadow-sm bg-white rounded">
    <table class="table table-striped table-hover mb-0">
        <thead class="thead-dark">
            <tr>
                <th>Név</th>
                <th>Születési név</th>
                <th>Választás éve</th>
                <th>Született</th>
                <th>Születési hely</th>
                <?php if(isset($_SESSION['login'])): ?><th class="text-center">Műveletek</th><?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($szineszek as $sz): ?>
            <tr>
                <td class="align-middle fw-bold"><?= htmlspecialchars($sz['nev']) ?></td>
                <td class="align-middle"><?= htmlspecialchars($sz['szuletesinev']) ?></td>
                <td class="align-middle"><?= htmlspecialchars($sz['valasztas']) ?></td>
                <td class="align-middle"><?= htmlspecialchars($sz['szuletett']) ?></td>
                <td class="align-middle"><?= htmlspecialchars($sz['szuletesihely']) ?></td>
                
                <?php if(isset($_SESSION['login'])): ?>
                <td class="align-middle text-center">
                    <button type="button" class="btn btn-sm btn-warning mb-1" 
                        onclick="editActor('<?= $sz['id'] ?>', '<?= htmlspecialchars(addslashes($sz['nev'])) ?>', '<?= htmlspecialchars(addslashes($sz['szuletesinev'])) ?>', '<?= $sz['valasztas'] ?>', '<?= $sz['szuletett'] ?>', '<?= htmlspecialchars(addslashes($sz['szuletesihely'])) ?>')">
                        Szerkesztés
                    </button>
                    <form action="crud" method="post" class="d-inline">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $sz['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Biztosan törli a rekordot?');">Törlés</button>
                    </form>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function editActor(id, nev, sznev, valasztas, szuletett, szuletesihely) {
    document.getElementById('crud-action').value = 'update';
    document.getElementById('crud-id').value = id;
    document.getElementById('crud-nev').value = nev;
    document.getElementById('crud-szuletesinev').value = sznev;
    document.getElementById('crud-valasztas').value = valasztas;
    document.getElementById('crud-szuletett').value = szuletett;
    document.getElementById('crud-szuletesihely').value = szuletesihely;
    
    document.getElementById('crud-submit').innerText = 'Adatok Módosítása';
    document.getElementById('crud-submit').className = 'btn btn-warning w-100';
    
    let title = document.getElementById('crud-title');
    title.innerText = 'Színész adatainak módosítása';
    title.className = 'card-header bg-warning text-dark';
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>