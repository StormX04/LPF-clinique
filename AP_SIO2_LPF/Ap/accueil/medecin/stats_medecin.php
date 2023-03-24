<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);

echo '<div id="StatMedAction" class="baseContentStyle">';
echo '<label for="montreStatMed" style="padding-right : 0.7%;">Afficher vos admissions des 5 prochaines semaines  : </label><button id="montreStatMed" onclick="fStat(\'edtMed\')" >Afficher</button>';

$leservUsr = 0;
$requUsrServ = 'Select id_service FROM personnel WHERE ID ="'.$activeUsr.'";';
$resultUsrServ = mysqli_query($conn, $requUsrServ);
while($colonn = mysqli_fetch_array($resultUsrServ, MYSQLI_ASSOC)){
    $leservUsr = $colonn["id_service"];
}


echo '<br><label for="montreStatM" style="padding-right : 0.7%;">Selectionner la période de temps pour vos stats: </label>';
echo '<select name="service" id="service-choix" onChange="fStatM(this.value)"><option value="rbase"  >Choix</option><option value="annee"  > année</option><option value="mois"  >mois</option></select>';

echo'<div id="StatMannee" style="display: none;">';
$requStatUsrYM = 'Select count(*) AS "patientnbr" FROM hospitalisation INNER JOIN personnel ON hospitalisation.Choix_medecin = personnel.ID WHERE Year(Date_hospitalisation) = YEAR(CURDATE()) AND personnel.ID ="'.$activeUsr.'";';
$resultStatUsrYM = mysqli_query($conn, $requStatUsrYM);
while($colonn = mysqli_fetch_array($resultStatUsrYM, MYSQLI_ASSOC)){
    echo 'Nombre de patient total sur l\'année actuelle traitée par vous est de : '.$colonn['patientnbr'];
}
echo'</div>';

echo'<div id="StatMmois" style="display: none;">';
$requStatUsrMM = 'Select count(*) AS "patientnbr" FROM hospitalisation INNER JOIN personnel ON hospitalisation.Choix_medecin = personnel.ID WHERE MONTH(Date_hospitalisation) = MONTH(CURDATE()) AND Year(Date_hospitalisation) = YEAR(CURDATE()) AND personnel.ID ="'.$activeUsr.'";';
$resultStatUsrMM = mysqli_query($conn, $requStatUsrMM);
while($colonn = mysqli_fetch_array($resultStatUsrMM, MYSQLI_ASSOC)){
    echo 'Nombre de patient total sur le mois actuel traité par vous est de : '.$colonn['patientnbr'];
}
echo'</div>';
echo'</div></div>';

echo'<div id="StatedtMed" class="statTableau" style="display: none;">';

$reqStatMed = 'Select Choix_admission AS "Admis pour",Chambre, Heure_intervention, Date_hospitalisation FROM hospitalisation INNER JOIN personnel ON hospitalisation.Choix_medecin = personnel.ID WHERE Date_hospitalisation >= CURDATE() AND Date_hospitalisation < DATE_ADD(CURDATE(), INTERVAL 5 WEEK) AND personnel.ID ="'.$activeUsr.'" ;';
$resultStatMed = mysqli_query($conn, $reqStatMed);
echo '<table >';
echo'<tr> <th>Admis pour : </th><th>Chambre : </th><th>Heure d\'intervention : </th><th>Date d\'hospitalisation : </th> </tr>';
while($colonn = mysqli_fetch_array($resultStatMed, MYSQLI_ASSOC)){
	/*
	echo '<tr>';
	for($i = 0 ; $i<mysqli_field_count($conn); $i++){
		$nomcolonne = array_keys($colonn);
		echo '<th >'.$nomcolonne[$i].' : </th>';
	}
	echo'</tr>';*/
	echo'<tr>';
	foreach ($colonn as $value){
		echo '<td >'.$value.'</td>' ;
	}

	echo'</tr>' ;
	//print_r( $colonn) ;
	
}
echo'</table>';
echo'</div>';

// th style="background-color: gray; color: white; padding-right: 10px; padding-left: 10px; border-right:4px solid #eb0227;"
// td style="border-right:4px solid #eb0227;"
// table style=" background-color: Lavender;  border-collapse: collapse;  border:5px solid #eb0227;"
?>
