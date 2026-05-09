<?php
session_start();

include('./include/config.inc.php');

$keres = $_SERVER['QUERY_STRING'];
if ($keres == "") {
    $oldal = $oldalak['/'];
    $keres = '/';
} else if (isset($oldalak[$keres])) {
    $oldal = $oldalak[$keres];
} else {
    $oldal = $hiba_oldal;
    header("HTTP/1.0 404 Not Found");
}

if (file_exists("./logical/{$oldal['fajl']}.php")) {
    include("./logical/{$oldal['fajl']}.php");
}

include('./template/index.tpl.php'); 
?>