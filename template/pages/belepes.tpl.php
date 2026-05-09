<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Bejelentkezés</h3>
            </div>
            <div class="card-body">
                <form action="belep" method="post">
                    <div class="form-group">
                        <label for="felhasznalo">Felhasználónév</label>
                        <input type="text" class="form-control" name="felhasznalo" id="felhasznalo" required>
                    </div>
                    <div class="form-group">
                        <label for="jelszo">Jelszó</label>
                        <input type="password" class="form-control" name="jelszo" id="jelszo" required>
                    </div>
                    <button type="submit" name="belepes" class="btn btn-primary w-100">Belépés</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h3 class="card-title mb-0">Regisztráció</h3>
            </div>
            <div class="card-body">
                <form action="regisztral" method="post">
                    <div class="form-group">
                        <label for="vezeteknev">Vezetéknév</label>
                        <input type="text" class="form-control" name="vezeteknev" id="vezeteknev" required>
                    </div>
                    <div class="form-group">
                        <label for="utonev">Utónév</label>
                        <input type="text" class="form-control" name="utonev" id="utonev" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_felhasznalo">Felhasználónév</label>
                        <input type="text" class="form-control" name="felhasznalo" id="reg_felhasznalo" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_jelszo">Jelszó</label>
                        <input type="password" class="form-control" name="jelszo" id="reg_jelszo" required>
                    </div>
                    <button type="submit" name="regisztracio" class="btn btn-success w-100">Regisztráció</button>
                </form>
            </div>
        </div>
    </div>
</div>