<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $civilite = $_POST['civilite'];
    $nom_naiss = $_POST['nom_naissance'];
    $nom_epouse = $_POST['nom_epouse'];
    $prenom = $_POST['Prenom'];
    $date_naiss = $_POST['Date_naissance'];
    $adresse = $_POST['adresse'];
    $CP = $_POST['Cp'];
    $ville = $_POST['Ville'];
    $email = $_POST['Email'];
    $telephone = $_POST['Telephone'];
    $_SESSION['Patient'] = array($civilite,$nom_naiss,$nom_epouse,$prenom,$date_naiss,$adresse,$CP,$ville,$email,$telephone);
    var_dump($_SESSION['Patient']);





    if ($_POST['btn'] == 'Suivant') {
        echo "<script>window.location.href='../pre-admission_Pages/Update_pre_admission_3.php'</script>";
    }
}

?>