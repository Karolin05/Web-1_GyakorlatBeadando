<?php
include('./include/kapcsolat.inc.php');
$uzenet = '';

if (isset($_POST['action']) && isset($_SESSION['login'])) {
    try {
        if ($_POST['action'] == 'create') {
            $stmt = $dbh->query("SELECT MAX(id) FROM szinesz");
            $maxId = $stmt->fetchColumn();
            $newId = $maxId ? $maxId + 1 : 1;

            $sql = "INSERT INTO szinesz (id, nev, szuletesinev, valasztas, szuletett, szuletesihely) VALUES (:id, :nev, :szuletesinev, :valasztas, :szuletett, :szuletesihely)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ':id' => $newId,
                ':nev' => $_POST['nev'],
                ':szuletesinev' => empty($_POST['szuletesinev']) ? null : $_POST['szuletesinev'],
                ':valasztas' => $_POST['valasztas'],
                ':szuletett' => $_POST['szuletett'],
                ':szuletesihely' => empty($_POST['szuletesihely']) ? null : $_POST['szuletesihely']
            ]);
            $uzenet = "Sikeres hozzáadás!";
        }
        elseif ($_POST['action'] == 'update') {
            $sql = "UPDATE szinesz SET nev=:nev, szuletesinev=:szuletesinev, valasztas=:valasztas, szuletett=:szuletett, szuletesihely=:szuletesihely WHERE id=:id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ':id' => $_POST['id'],
                ':nev' => $_POST['nev'],
                ':szuletesinev' => empty($_POST['szuletesinev']) ? null : $_POST['szuletesinev'],
                ':valasztas' => $_POST['valasztas'],
                ':szuletett' => $_POST['szuletett'],
                ':szuletesihely' => empty($_POST['szuletesihely']) ? null : $_POST['szuletesihely']
            ]);
            $uzenet = "Sikeres módosítás!";
        }
        elseif ($_POST['action'] == 'delete') {
            $stmt = $dbh->prepare("DELETE FROM kapott WHERE szineszid=:id");
            $stmt->execute([':id' => $_POST['id']]);

            $stmt = $dbh->prepare("DELETE FROM szinesz WHERE id=:id");
            $stmt->execute([':id' => $_POST['id']]);
            $uzenet = "Sikeres törlés!";
        }
    } catch (PDOException $e) {
        $uzenet = "Hiba: " . $e->getMessage();
    }
}

$szineszek = [];
$stmt = $dbh->query("SELECT * FROM szinesz ORDER BY nev ASC");
$szineszek = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>