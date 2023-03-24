<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);

echo'<div class="container">';
echo '<div class="baseContent"><label for="montreServ" class="baseText" style="padding-right : 0.7%;">Actions sur les Services : </label>';
include("lesServices.php");
echo'</div>';


echo '<div class="baseContent"><label for="montrePerso" class="baseText"  style="padding-right : 0.7%;">Actions sur le Personnel : </label>';
include("lePersonnel.php");
echo'</div></div>';
//echo '<script type="text/javascript"src="lejs.js"></script>';
//mysqli_close($conn);
?>

