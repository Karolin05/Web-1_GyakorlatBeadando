<h1 class="mt-4 mb-4">Kapcsolat</h1>

<?php if(isset($eredmeny) && $eredmeny == "OK"): ?>
    <div class="alert alert-success shadow-sm">Köszönjük! Üzenetét sikeresen elküldtük.</div>
<?php elseif(isset($eredmeny) && $eredmeny != ""): ?>
    <div class="alert alert-danger shadow-sm"><?= $eredmeny ?></div>
<?php endif; ?>

<div class="card shadow-sm mb-5">
    <div class="card-header bg-primary text-white">
        <h4 class="card-title mb-0">Írjon nekünk üzenetet!</h4>
    </div>
    <div class="card-body">
        <form action="kapcsolat" method="post" id="kapcsolatForm" onsubmit="return ellenoriz();">
            <div class="form-group">
                <label for="nev">Név <small class="text-muted">(min. 3 karakter)</small></label>
                <input type="text" class="form-control" name="nev" id="nev" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail cím</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="szoveg">Üzenet <small class="text-muted">(min. 10 karakter)</small></label>
                <textarea class="form-control" name="szoveg" id="szoveg" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3 w-100">Üzenet Elküldése</button>
        </form>
    </div>
</div>

<script>
function ellenoriz() {
    let nev = document.getElementById("nev").value.trim();
    let email = document.getElementById("email").value.trim();
    let szoveg = document.getElementById("szoveg").value.trim();
    
    if (nev.length < 3) {
        alert("Hiba: Kérjük, adjon meg egy érvényes nevet (minimum 3 karakter)!");
        return false;
    }
    
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Hiba: Kérjük, adjon meg egy érvényes e-mail címet!");
        return false;
    }
    
    if (szoveg.length < 10) {
        alert("Hiba: Az üzenet túl rövid (minimum 10 karakter)!");
        return false;
    }
    
    return true;
}
</script>