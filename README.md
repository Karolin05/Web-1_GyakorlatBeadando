# Web-1_GyakorlatBeadando

Téma: A Nemzet Színésze adatbázis és webes felület

A Projekt:
Ez a webes alkalmazás a megadott "A Nemzet Színésze" adatbázisra épülve készült. A rendszer egy egyedi, **Front-controller (MVC) tervezési minta** alapján működik, biztosítva a logika és a megjelenítés éles szétválasztását. A felület reszponzív, **Bootstrap** keretrendszert használ.

Főbb funkciók:
* **Felhasználókezelés:** Regisztráció, titkosított bejelentkezés (SHA1) és kijelentkezés.
* **Jogosultságkezelés:** Bizonyos funkciók (Képfeltöltés, CRUD, Üzenetek) csak bejelentkezett felhasználók számára elérhetőek.
* **CRUD Rendszer:** A Nemzet Színésze adatbázis (színészek és elismerések) teljes körű kezelése (Listázás, Hozzáadás, Módosítás, Törlés).
* **Galéria:** Képfeltöltés szerver és kliens oldali ellenőrzéssel (típus és méretkorlát), dinamikus megjelenítés.
* **Kapcsolat:** Üzenetküldő űrlap JavaScript és PHP validációval, a beérkezett üzenetek adatbázisból való kilistázásával.
* **Multimédia:** Helyi HTML5 videó, beágyazott YouTube tartalom és Google Térkép.
