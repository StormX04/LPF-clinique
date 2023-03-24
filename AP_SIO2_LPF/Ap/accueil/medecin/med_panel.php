<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);


echo'<div class ="container">';
echo '<div class="baseContent"> <label class="baseText" for="montreStat" >Les statistiques du service : </label>';
include("stats_service.php");

echo '<div class="baseContent"> <label class="baseText" for="montreStatM" >Vos statistiques  : </label>';
include("stats_medecin.php");
echo'</div>';
//echo '<script type="text/javascript"src="lejs.js"></script>';
?>
