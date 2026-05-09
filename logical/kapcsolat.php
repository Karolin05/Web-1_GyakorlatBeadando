<?php
$eredmeny = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['szoveg'])) {
        $nev = trim($_POST['nev']);
        $email = trim($_POST['email']);
        $szoveg = trim($_POST['szoveg']);

        if (strlen($nev) < 3) {
            $eredmeny = "A név túl rövid (minimum 3 karakter)!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $eredmeny = "Érvénytelen e-mail cím formátum!";
        } elseif (strlen($szoveg) < 10) {
            $eredmeny = "Az üzenet túl rövid (minimum 10 karakter)!";
        } else {
            include('./include/kapcsolat.inc.php');
            try {
                $sql = "INSERT INTO uzenetek (nev, email, szoveg) VALUES (:nev, :email, :szoveg)";
                $stmt = $dbh->prepare($sql);
                $stmt->execute([
                    ':nev' => $nev,
                    ':email' => $email,
                    ':szoveg' => $szoveg
                ]);
                $eredmeny = "OK";
            } catch (PDOException $e) {
                $eredmeny = "Hiba: " . $e->getMessage();
            }
        }
    }
}
?>