
<?php



$reqMedInfo = 'Select Nom, Prenom, personnel.ID FROM personnel WHERE personnel.ID !='.$activeUsr.';';
$resultMed = mysqli_query($conn, $reqMedInfo);
echo '<div id="PersonnelAction" style="display: none;">';
echo '<label for="montrelePerso" style="padding-right : 0.7%;">Suppression d\'un membre du personnel : </label><button id="montrelePerso" onclick="fPerso(\'suppr\')" >Afficher</button>';
echo '<div id="persosuppr" style="display: none;"><form method="post" action="tableau_de_bord.php"><label for="medecin-choix" style="padding-left : 4.5%;">Sélectionner un médecin : </label><select name="medecin" id="medecin-choix" value=""><option value="">--Choisissez un médecin--</option>';
while($colonn = mysqli_fetch_array($resultMed, MYSQLI_ASSOC)){
	echo '<option value="'.$colonn['ID'].'">'.$colonn["Nom"].' '.$colonn["Prenom"].'</option>' ;
}
echo'</select>
<input id="userID" type="hidden" name="userID" value="'.$_SESSION['identifiant'].'">
<input id="mdp" type="hidden" name="mdp" value="'.$_SESSION['lemdp'].'">
<input type="submit" id="idMed" onclick="return choix(\'medecin\')" value="Supprimer"> 
</form></div>';
if(isset($_POST['medecin'])) {
	$requete = 'Select * FROM personnel WHERE ID = '.$_POST['medecin'].';';
	$resultest = mysqli_query($conn, $requete);
	while($colonn = mysqli_fetch_array($resultest, MYSQLI_ASSOC)){
    		print_r( $colonn) ;
    		
	}
	echo'<script type="text/javascript">window.location.assign(\'tableau_de_bord.php\');</script>';
}
echo '<br> <br>';
$reqServInfo = 'Select * FROM service ;';
$resultServ = mysqli_query($conn, $reqServInfo);
echo '<label for="PersoAjout" style="padding-right : 0.7%;">Ajout d\'un membre du personnel : </label><button id="PersoAjout" onclick="fPerso(\'ajt\')" >Afficher</button>';
echo'
<div id="persoajt" style="display: none;">
<form method="post" action="tableau_de_bord.php">
<label for="nomPerso">Nom :</label>
<input id="nomPerso" type="text" name="nomPerso">
<label for="prenomPerso">Prenom :</label>
<input id="prenomPerso" type="text" name="prenomPerso"><br>
<label for="service-choix-P" style="padding-left : 3%;">Sélectionner un service : </label><select name="service-P" id="service-choix-P" value=""><option value="">--Choisissez un service--</option>';
while($colonn = mysqli_fetch_array($resultServ, MYSQLI_ASSOC)){
	echo '<option value="'.$colonn['ID'].'">'.$colonn["libelle"].'</option>' ;
}
echo'</select>
<input type="submit" value="Ajouter"> 
</form></div>  <br> <br>';


echo'</div>';






?>
</body>
</html> 
