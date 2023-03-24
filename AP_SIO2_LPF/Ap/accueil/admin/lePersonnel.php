
<?php



$reqMedInfo = 'Select Nom, Prenom, personnel.ID FROM personnel WHERE personnel.ID !='.$activeUsr.';';
$resultMed = mysqli_query($conn, $reqMedInfo);
echo '<div id="PersonnelAction" class="baseContentStyle">';
echo '<label for="montrelePerso" style="padding-right : 0.7%;">Suppression d\'un membre du personnel : </label>';
echo '<div id="persosuppr" ><form method="post" action="tableau_de_bord.php"><label for="personnel-choix" style="padding-left : 4.5%;">Sélectionner un membre du personnel : </label><select name="personnel" id="personnel-choix" value=""><option value="">--Choisissez un personnel--</option>';
while($colonn = mysqli_fetch_array($resultMed, MYSQLI_ASSOC)){
	echo '<option value="'.$colonn['ID'].'">'.$colonn["Nom"].' '.$colonn["Prenom"].'</option>' ;
}
echo'</select>
<input type="submit" id="idMed" onclick="return choix(\'personnel\')" value="Supprimer"> 
</form></div>'; // <input id="userID" type="hidden" name="userID" value="'.$_SESSION['identifiant'].'">  <input id="mdp" type="hidden" name="mdp" value="'.$_SESSION['lemdp'].'">
if(isset($_POST['personnel'])) {
	$requete = 'DELETE FROM clinique_lpf.personnel WHERE ID='.$_POST['personnel'].';';
	$resultest = mysqli_query($conn, $requete);
	echo'<script type="text/javascript">window.location.assign(\'tableau_de_bord.php\');</script>';
}
echo '<br> ';
$reqServInfo = 'Select * FROM service ;';
$resultServ = mysqli_query($conn, $reqServInfo);
echo '<label for="PersoAjout" style="padding-right : 0.7%;">Ajout d\'un membre du personnel : </label>';
echo'
<div id="persoajt" >
<form method="post" action="tableau_de_bord.php">
<label for="nomPerso">Nom :</label>
<input id="nomPerso" type="text" name="nomPerso">
<label for="prenomPerso">Prenom :</label>
<input id="prenomPerso" type="text" name="prenomPerso">
<label for="service-choix-P" style="padding-left : 1%;">Sélectionner un service : </label><select name="service-P" id="service-choix-P" value=""><option value="">--Choisissez un service--</option>';
while($colonn = mysqli_fetch_array($resultServ, MYSQLI_ASSOC)){
	echo '<option value="'.$colonn['ID'].'">'.$colonn["libelle"].'</option>' ;
}
echo'</select> <br>
<label for="mdpPerso">Son mot de passe :</label>
<input id="mdpPerso" type="text" name="mdpPerso">
<label for="role-choix-P" style="padding-left : 1%;">Sélectionner un rôle : </label><select name="role-P" id="role-choix-P" value=""><option value="">--Choisissez un rôle--</option>';
echo '<option value="1">secrétaire</option>' ;
echo '<option value="3">médecin</option>' ;

echo'</select>
<input type="submit" value="Ajouter"> 
</form></div>  <br> ';

echo'</div>';
if(isset($_POST['nomPerso']) && !empty($_POST['nomPerso'])) {
	$reqAJTPerso = "INSERT INTO clinique_lpf.personnel (Nom, Prenom, id_service) VALUES('".$_POST['nomPerso']."', '".$_POST['prenomPerso']."', ".$_POST['service-P']."); ";
	mysqli_query($conn, $reqAJTPerso);
	$reqPinfo = 'Select ID FROM personnel WHERE Nom ="'.$_POST['nomPerso'].'" AND Prenom="'.$_POST['prenomPerso'].'" AND id_service='.$_POST['service-P'].' LIMIT 1 ;';
	$resultPinfo = mysqli_query($conn, $reqPinfo);
	$identifiant = substr($_POST['nomPerso'],0,2).".".substr($_POST['prenomPerso'],0,2)."_LPF";
	while($colonn = mysqli_fetch_array($resultPinfo, MYSQLI_ASSOC)){
		$reqAJTAuthen = "INSERT INTO clinique_lpf.authentification (nom_utilisateur, Motdepasse, Id_personnel, Id_permissions) VALUES('".$identifiant."', '".$_POST['mdpPerso']."', ".$colonn['ID'].", ".$_POST['role-P']."); ";
		mysqli_query($conn, $reqAJTAuthen);
		echo'<script type="text/javascript">alert("Voici les informations de connexion de l\'utilisateur créer  identifiant : '.$identifiant.' Son mot de passe : '.$_POST['mdpPerso'].'");</script>';
		echo'<script type="text/javascript">window.location.assign(\'tableau_de_bord.php\');</script>';
}
}




?>

