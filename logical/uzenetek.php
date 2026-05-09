<?php
include('./include/kapcsolat.inc.php');
$uzenetLista = [];

if (isset($_SESSION['login'])) {
    try {
        $stmt = $dbh->query("SELECT * FROM uzenetek ORDER BY datum DESC");
        $uzenetLista = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $hiba = "Hiba: " . $e->getMessage();
    }
}
?>