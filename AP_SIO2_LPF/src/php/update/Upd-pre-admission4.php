<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $organisme_Secu_Social = $_POST['Organisme_securite_social'];
    $numeros_Secu_Social = $_POST['Numero_secu_social'];
    $pa_Assure = $_POST['Pa_assure'];
    $pa_ALD = $_POST['Pa_ald'];
    $nom_mutuelle_Assurance = $_POST['Nom_mutuelle_assurance'];
    $num_adherent = $_POST['Num_adherent'];
    $chambre_Part = $_POST['Chambre_part'];
   $_SESSION['CouvertureSocial'] = array($organisme_Secu_Social,$numeros_Secu_Social,$pa_Assure,$pa_ALD,$nom_mutuelle_Assurance,$num_adherent,$chambre_Part);
    echo "<script>console.log($_SESSION)</script>";
    if ($_POST['btn'] == "Precedent") {
        echo "<script>window.location.href='../pre-admission_Pages/Update_pre_admission_3.php'</script>";
    }elseif ($_POST['btn'] == "Suivant"){
        echo "<script>window.location.href='../pre-admission_Pages/Update_pre_admission_5.php'</script>";
    }


}


