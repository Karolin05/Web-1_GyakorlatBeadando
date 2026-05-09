<?php
include('./include/kapcsolat.inc.php');

if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
        $sqlSelect = "select id, csaladi_nev, uto_nev from felhasznalok where bejelentkezes = :bejelentkezes and jelszo = :jelszo";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => sha1($_POST['jelszo'])));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        
        if($row) {
            $_SESSION['csn'] = $row['csaladi_nev'];
            $_SESSION['un'] = $row['uto_nev'];
            $_SESSION['login'] = $_POST['felhasznalo'];
        } else {
            $uzenet = "A bejelentkezés nem sikerült! Hibás név vagy jelszó.";
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
    }
}
?>