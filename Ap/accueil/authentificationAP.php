<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);
$conn = mysqli_connect("localhost","admin","1234","clinique_lpf");
if(!$conn) {
    die("connection pas marcher ".mysqli_connect_error());
}
session_start(); 
if($_POST['userID'] != '' &&  $_POST['mdp'] != '' ) {
    $_SESSION['identifiant'] = $_POST['userID'];
    $_SESSION['lemdp'] = $_POST['mdp'];
    header('Location: tableau_de_bord.php');
    die();
}else {
    
    	header('Location: index.html');
	exit;
    }

/*
$requete = 'Select * FROM personnel ;';
$result = mysqli_query($conn, $requete);
while($colonn = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    print_r( $colonn) ;
}*/

mysqli_close($conn);
?>
