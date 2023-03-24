<?php
include 'Requete.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Connexion à la base de données
$DBB = new connexion_bdd();
$DB = $DBB->DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_Secu = $_POST['NumerosSecuVerif'];
    $verifID = VerifSecuSocial($id_Secu);
    if($verifID === true)
    {
        echo "<script>window.location.href='../UpdateAdmission/Update_pre_admission_1.php'</script>";
    }else{
        echo "<script>window.location.href='../pre-admission_Pages/pre_admission_1.php'</script>";
    }
}

