<h1 class="mt-4 mb-4">Képgaléria</h1>

<?php if(isset($_SESSION['login'])) { ?>
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title mb-0">Új kép feltöltése</h4>
        </div>
        <div class="card-body">
            <form action="kepek" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Válassza ki a feltölteni kívánt képet (max 500 KB, JPG vagy PNG):</label>
                    <input type="file" class="form-control-file mt-2" name="kep" required>
                </div>
                <button type="submit" name="kuld" class="btn btn-primary mt-3">Feltöltés</button>
            </form>
            
            <?php if (isset($uzenet) && !empty($uzenet)) { ?>
                <ul class="mt-3 mb-0 text-success fw-bold">
                    <?php foreach($uzenet as $u) echo "<li>$u</li>"; ?>
                </ul>
            <?php } ?>
        </div>
    </div>
<?php } else { ?>
    <div class="alert alert-info shadow-sm mb-5">
        A képfeltöltéshez kérjük, <strong>jelentkezzen be</strong>! A már feltöltött képeket lejjebb tekintheti meg.
    </div>
<?php } ?>

<div class="row">
    <?php foreach($kepek as $kep) { ?>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm h-100">
                <img src="<?= $kep ?>" class="card-img-top" alt="Galéria kép" style="object-fit: cover; height: 200px;">
            </div>
        </div>
    <?php } ?>
    
    <?php if(empty($kepek)) { ?>
        <div class="col-12 text-center text-muted mt-4">
            <h4>Még nincsenek feltöltött képek a galériában.</h4>
            <p>Legyen Ön az első, aki feltölt egyet!</p>
        </div>
    <?php } ?>
</div>