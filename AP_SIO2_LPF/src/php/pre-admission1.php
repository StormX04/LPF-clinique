<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $choix_admission = $_POST['pre_admission'];
    $choix_medecin = $_POST['choix_medecin'];
    $date_hospitalisation = $_POST['hospitalisation'];
    $heure_intervention = $_POST['inter'];

    $_SESSION['Hospitalisation'] = array($choix_admission,$choix_medecin,$date_hospitalisation,$heure_intervention);


    if ($_POST['btn_suiv']="Suivant")
    {
        header('Location: ../pre-admission_HTML/pre_admission_2.html');
    }
}

?>


<!--//    $_SESSION['pre_admission'] = $choix_admission;-->
<!--//    $_SESSION['choix_medecin'] = $choix_medecin;-->
<!--//    $_SESSION['hospitalisation'] = $date_hospitalisation;-->
<!--//    $_SESSION['inter'] = $heure_intervention;-->
<!---->
<!--//    var_dump($_SESSION['pre_admission'],$_SESSION['choix_medecin'],$_SESSION['hospitalisation'],$_SESSION['inter']);-->
<!--//    var_dump($_POST['btn_suiv']);-->
