<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors",1);
$conn = mysqli_connect("localhost","root","root","lpf_clinique");
if(!$conn) {
    die("connection pas marcher ".mysqli_connect_error());
}
if($_POST['userID'] != '' &&  $_POST['mdp'] != '') {
    $identifiant = $_POST['userID'];
    $lemdp = $_POST['mdp'];
    $reqConnect = 'Select nom_utilisateur, Motdepasse, id_permissions FROM authentification WHERE nom_utilisateur ="'.$identifiant.'" AND Motdepasse="'.$lemdp.'";';
    $result = mysqli_query($conn, $reqConnect);
    while($colonn = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        if($lemdp == $colonn["Motdepasse"] &&  $colonn["id_permissions"] == 1){
            echo'connecté comme : '.$identifiant;
            echo'<br><br> <form method="post" action="preadmission.php">
            <input type="submit" value="Formulaire de Pre admission">
            </form> ';
        }
        if($lemdp == $colonn["Motdepasse"] &&  $colonn["id_permissions"] == 0){
            echo'connecté comme : '.$identifiant;
            include(admin_panel.php);
        }
    }
    echo'<br> <form method="post" action="index.php">
            <input type="submit" value="Deconnexion">
            </form> ';
}

mysqli_close($conn);
?>
