<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="unstyle.css" />
    <!----<script type="text/javascript" src="cours2.js"> </script>-->

    <title>Accueil</title>
</head>
<body>
<?php
session_start(); 
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);
$conn = mysqli_connect("localhost","root","sio2021","clinique_lpf");
if(!$conn) {
    die("connection pas marcher ".mysqli_connect_error());
}/*
if(($_POST['userID'] != '' &&  $_POST['mdp'] != '') && (!isset($_SESSION['identifiant']) &&  !isset($_SESSION['lemdp'])) ) {
    $_SESSION['identifiant'] = $_POST['userID'];
    $_SESSION['lemdp'] = $_POST['mdp'];
}*/
if($_SESSION['identifiant'] != '' &&  $_SESSION['lemdp'] != '' ) {
    $reqConnect = 'Select nom_utilisateur, Motdepasse, id_permissions,id_personnel FROM authentification WHERE nom_utilisateur ="'.$_SESSION['identifiant'].'" AND Motdepasse="'.$_SESSION['lemdp'].'";';
    $prepreq = mysqli_prepare($conn, $reqConnect);
    mysqli_stmt_execute($prepreq);
    $result = mysqli_stmt_get_result($prepreq);
    if(mysqli_num_rows($result) > 0) {
    	while($colonn = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		if($_SESSION['lemdp'] == $colonn["Motdepasse"] &&  $colonn["id_permissions"] == 1){
		    echo'connecté comme : '.$_SESSION['identifiant'];
		    $activeUsr = $colonn["id_personnel"];
		    echo'<br><br> <form method="post" action="/src/pre-admission_HTML/pre_admission_1.html">
		    <input type="submit" value="Formulaire de Pre admission">
		    </form> ';
		}
		elseif($_SESSION['lemdp'] == $colonn["Motdepasse"] &&  $colonn["id_permissions"] == 2){
		    echo'connecté comme : '.$_SESSION['identifiant'];
		    $activeUsr = $colonn["id_personnel"];
		    include("admin/admin_panel.php");
		}
		elseif($_SESSION['lemdp'] == $colonn["Motdepasse"] &&  $colonn["id_permissions"] == 3){
		    echo'connecté comme : '.$_SESSION['identifiant'];
		    $activeUsr = $colonn["id_personnel"];
		    include("statistic/med_panel.php");
		}
    	}
    	echo'<br> <button onclick="window.location.assign(\'/Ap/index.html\');" type="button">Déconnexion</button>';
    }else {
    
    	header('Location: /Ap/index.html');
	exit;
    }
}

mysqli_close($conn);
?>
</body>
</html> 
