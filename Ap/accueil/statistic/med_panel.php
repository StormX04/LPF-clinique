<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);

echo'<br> médecin  <br> <br>';


echo '<label for="montreStat" style="padding-right : 0.7%;">Affiche les statistiques du service : </label><button id="montreStat" onclick="Affact(\'StatServ\')" >Afficher</button><br>';
include("stats_service.php");


echo '<script type="text/javascript"src="lejs.js"></script>';
?>
