<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);



echo '<div id="StatServAction" style="display: none;">';
echo '<label for="montreStatServ" style="padding-right : 0.7%;">Afficher les admissions du jour  : </label><button id="montreStatServ" onclick="fStat(\'edtServ\')" >Afficher</button>';

$leservUsr = 0;
$requUsrServ = 'Select id_service FROM personnel WHERE ID ="'.$activeUsr.'";';
$resultUsrServ = mysqli_query($conn, $requUsrServ);
while($colonn = mysqli_fetch_array($resultUsrServ, MYSQLI_ASSOC)){
    $leservUsr = $colonn["id_service"];
}


echo '<br><label for="montreStat" style="padding-right : 0.7%;">Selectionner la période de temps pour vos stats: </label>';
echo '<select name="service" id="service-choix" onChange="fStat(this.value)"><option value="rbase"  >Choix</option><option value="annee"  > année</option><option value="mois"  >mois</option></select>';

echo'<div id="Statannee" style="display: none;">';
$requStatUsrY = 'Select count(*) AS "patientnbr" FROM hospitalisation INNER JOIN personnel ON hospitalisation.Choix_medecin = personnel.ID WHERE Year(Date_hospitalisation) = YEAR(CURDATE()) AND id_service = "'.$leservUsr.'";';
$resultStatUsrY = mysqli_query($conn, $requStatUsrY);
while($colonn = mysqli_fetch_array($resultStatUsrY, MYSQLI_ASSOC)){
    echo 'Nombre de patient sur l\'année actuelle admis dans le service est de : '.$colonn['patientnbr'];
}
echo'</div>';

echo'<div id="Statmois" style="display: none;">';
$requStatUsrM = 'Select count(*) AS "patientnbr" FROM hospitalisation INNER JOIN personnel ON hospitalisation.Choix_medecin = personnel.ID WHERE MONTH(Date_hospitalisation) = MONTH(CURDATE()) AND Year(Date_hospitalisation) = YEAR(CURDATE()) AND id_service = "'.$leservUsr.'";';
$resultStatUsrM = mysqli_query($conn, $requStatUsrM);
while($colonn = mysqli_fetch_array($resultStatUsrM, MYSQLI_ASSOC)){
    echo 'Nombre de patient sur le mois actuel admis dans le service est de : '.$colonn['patientnbr'];
}
echo'</div>';


echo'<div id="StatedtServ" style="display: none;">';

$reqStatServ = 'Select Date_hospitalisation, Heure_intervention, personnel.Nom AS "Medecin en charge" FROM hospitalisation INNER JOIN personnel ON hospitalisation.Choix_medecin = personnel.ID WHERE Date_hospitalisation = CURDATE() AND id_service = "'.$leservUsr.'" ;';
$resultStatServ = mysqli_query($conn, $reqStatServ);
echo '<table style=" background-color: Lavender;  border-collapse: collapse;  border:5px solid #eb0227;">';
while($colonn = mysqli_fetch_array($resultStatServ, MYSQLI_ASSOC)){

	echo '<tr>';
	for($i = 0 ; $i<mysqli_field_count($conn); $i++){
		$nomcolonne = array_keys($colonn);
		echo '<th style="background-color: gray; color: white; padding-right: 10px; padding-left: 10px; border-right:4px solid #eb0227;">'.$nomcolonne[$i].' : </th>';
	}
	echo'</tr><tr>';
	foreach ($colonn as $value){
		echo '<td style="border-right:4px solid #eb0227;">'.$value.'</td>' ;
	}

	echo'</tr>' ;
	//print_r( $colonn) ;
	
}
echo'</table>';
echo'</div></div>';


?>
