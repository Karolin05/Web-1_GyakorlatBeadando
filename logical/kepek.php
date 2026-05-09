<?php
$uzenet = array();
$MAPPA = './images/';
$TIPUSOK = array ('.jpg', '.png', '.jpeg');
$MEDIATIPUSOK = array('image/jpeg', 'image/png');
$MAXMERET = 500 * 1024;

if(!file_exists($MAPPA)) {
    mkdir($MAPPA, 0777, true);
}

if(isset($_POST['kuld']) && isset($_SESSION['login'])) {
    foreach($_FILES as $fajl) {
        if ($fajl['error'] == 4);
        elseif (!in_array($fajl['type'], $MEDIATIPUSOK)) {
            $uzenet[] = "Nem megfelelő típus: " . $fajl['name'];
        }
        elseif ($fajl['error'] == 1 or $fajl['error'] == 2 or $fajl['size'] > $MAXMERET) {
            $uzenet[] = "Túl nagy állomány (max 500KB): " . $fajl['name'];
        }
        else {
            $vegsohely = $MAPPA.strtolower($fajl['name']);
            if (file_exists($vegsohely)) {
                $uzenet[] = "Már létezik ilyen nevű kép: " . $fajl['name'];
            }
            else {
                move_uploaded_file($fajl['tmp_name'], $vegsohely);
                $uzenet[] = 'Sikeres feltöltés: ' . $fajl['name'];
            }
        }
    }
}

$kepek = array();
$olvaso = opendir($MAPPA);
while (($fajl = readdir($olvaso)) !== false) {
    if (is_file($MAPPA.$fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl)-4));
        if (in_array($vege, $TIPUSOK) || in_array(strtolower(substr($fajl, strlen($fajl)-5)), $TIPUSOK)) {
            $kepek[] = $MAPPA.$fajl;
        }
    }
}
closedir($olvaso);
?>