<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);

$nbrsemaine = 1;
$lemedchoix = false;
$leservchoix = false;

$reqServL = 'Select * FROM service WHERE ID != 1 AND ID != 2;';
$resultServL = mysqli_query($conn, $reqServL);
echo'<label for="service-choix-P" style="padding-left : 1%;">Sélectionner un service : </label><select name="service-P" id="service-choix-P" value="" onChange="fCookie(this.value, \'serv\')"><option value="*">-- Tout les services--</option>';
while($colonn = mysqli_fetch_array($resultServL, MYSQLI_ASSOC)){
	echo '<option value="'.$colonn['ID'].'">'.$colonn["libelle"].'</option>' ;
}
/*
$reqMedL = 'Select Nom, Prenom, personnel.ID FROM personnel WHERE personnel.id_service != 1 AND personnel.id_service != 2;';
$resultMedL = mysqli_query($conn, $reqMedL);
echo '<label for="personnel-choix" style="padding-left : 4.5%;">Sélectionner un membre du personnel : </label><select name="personnel" id="personnel-choix" value="" onChange="document.cookie= "medchoix=this.value";"><option value="*">-- Tous les médecins --</option>';
while($colonn = mysqli_fetch_array($resultMedL, MYSQLI_ASSOC)){
	echo '<option value="'.$colonn['ID'].'">'.$colonn["Nom"].' '.$colonn["Prenom"].'</option>' ;
}
echo'</select>';
*/
include("visu_preadmission.php");
//echo '<script type="text/javascript"src="lejs.js"></script>';
//mysqli_close($conn);
?>

