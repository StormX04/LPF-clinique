
<?php

$reqServInfo = 'Select * FROM service ;';
$resultServ = mysqli_query($conn, $reqServInfo);
echo '<div id="ServiceAction" style="display: none;">';
echo '<label for="montrelesServ" style="padding-right : 0.7%;">Suppression d\'un service : </label><button id="montrelesServ" onclick="fServ(\'suppr\')" >Afficher</button>';
echo '<div id="Servsuppr" style="display: none;"><form method="post" action="tableau_de_bord.php"><label for="service-choix" style="padding-left : 4.5%;">Sélectionner un service : </label><select name="service" id="service-choix" value=""><option value="">--Choisissez un service--</option>';
while($colonn = mysqli_fetch_array($resultServ, MYSQLI_ASSOC)){
	echo '<option value="'.$colonn['ID'].'">'.$colonn["libelle"].'</option>' ;
}
echo'</select>
<input type="submit" id="idserv" onclick="return choix(\'service\')" value="Supprimer"> 
</form></div><br><br>';

echo '<label for="ServAjout" style="padding-right : 0.7%;">Ajout d\'un service : </label><button id="ServAjout" onclick="fServ(\'ajt\')" >Afficher</button>';
echo'
<div id="Servajt" style="display: none;">
<form method="post" action="tableau_de_bord.php">
<label for="nomServ">Nom du Service à ajouter :</label>
<input id="nomServ" type="text" name="nomServ">
<input type="submit" value="Ajouter"> 
</form></div>  <br> <br>';

echo'</div>';
if(isset($_POST['nomServ'])) {

	$reqAJTServ = "INSERT INTO clinique_lpf.service (libelle) VALUES('".$_POST["nomServ"]."');";
	mysqli_query($conn, $reqAJTServ);
	echo'<script type="text/javascript">window.location.assign(\'tableau_de_bord.php\');</script>';

}


if(isset($_POST['service'])) {
	$requete = 'DELETE FROM clinique_lpf.service WHERE ID='.$_POST['service'].';';
	$resultest = mysqli_query($conn, $requete);
	echo'<script type="text/javascript">window.location.assign(\'tableau_de_bord.php\');</script>';
}





?>
</body>
</html> 
