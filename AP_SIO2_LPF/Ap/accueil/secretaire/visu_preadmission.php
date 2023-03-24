<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);
/*
echo'<div id="StatedtMed" class="statTableau">';
$reqStatMed = 'Select Choix_admission AS "Admis pour",Chambre, Heure_intervention, Date_hospitalisation, personnel.Nom FROM hospitalisation INNER JOIN personnel ON hospitalisation.Choix_medecin = personnel.ID WHERE Date_hospitalisation >= CURDATE() AND Date_hospitalisation < DATE_ADD(CURDATE(), INTERVAL 5 WEEK) AND personnel.ID ="'.$activeUsr.'" ;';
$resultStatMed = mysqli_query($conn, $reqStatMed);
echo '<table >';
echo'<tr> <th>Admis pour : </th><th>Chambre : </th><th>Heure d\'intervention : </th><th>Date d\'hospitalisation : </th><th>Médecin : </th></tr>';
while($colonn = mysqli_fetch_array($resultStatMed, MYSQLI_ASSOC)){
	echo'<tr>';
	foreach ($colonn as $value){
		echo '<td >'.$value.'</td>' ;
	}

	echo'</tr>' ;
	//print_r( $colonn) ;
	
}
echo'</table>';
echo'</div>';
*/
echo $_COOKIE['servchoix'];
//echo '<script type="text/javascript"src="lejs.js"></script>';
//mysqli_close($conn);
?>

