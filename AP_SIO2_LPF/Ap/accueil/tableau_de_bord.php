<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/unstyle.css" />
    <script type="text/javascript" src="js/lejs.js"> </script>

    <title>Accueil</title>
</head>
<body>
<div class="background-image"></div> <div class="leHeader"> <div class="logo"></div> 
<?php
session_start(); 
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);
$conn = mysqli_connect("localhost","root","sio2021","clinique_lpf");
if(!$conn) {
    die("connection pas marcher ".mysqli_connect_error());
}

/*
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
    	echo'<button class="boutonDeco" onclick="window.location.assign(\'/Ap/index.html\'); document.cookie= \'servchoix= *; expires=Thu, 01 Jan 1970 00:00:01 UTC;SameSite=Lax;\';" type="button">Déconnexion</button>';
    	echo'<div class="infUser"><p class="textUser"> '.$_SESSION['identifiant'].'</p> </div></div>';
    	while($colonn = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		if($_SESSION['lemdp'] == $colonn["Motdepasse"] &&  $colonn["id_permissions"] == 1){
		    $activeUsr = $colonn["id_personnel"];
		    echo'<form method="post" action="preadmission.php">
		    <input type="submit" value="Formulaire de Pre admission">
		    </form> ';
		    include("secretaire/user_panel.php");
		}
		elseif($_SESSION['lemdp'] == $colonn["Motdepasse"] &&  $colonn["id_permissions"] == 2){
		    $activeUsr = $colonn["id_personnel"];
		    include("admin/admin_panel.php");
		}
		elseif($_SESSION['lemdp'] == $colonn["Motdepasse"] &&  $colonn["id_permissions"] == 3){
		    $activeUsr = $colonn["id_personnel"];
		    include("medecin/med_panel.php");
		}
    	}
    	
    }else {
    
    	header('Location: /Ap/index.html');
	exit;
    }
}

mysqli_close($conn);
?>
</body>
</html> 
