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



    switch ($_POST['btn'])
    {
        case "Suivant":
            header('Location: ../pre-admission_HTML/pre_admission_3.html');
            break;
        case "Precedent":
            header('Location: ../pre-admission_HTML/pre_admission_1.html');
            break;
    }

}
//        $_SESSION['civilite'] = $civilite;
//        $_SESSION['nom_naissance'] = $nom_naiss;
//        $_SESSION['nom_epouse'] = $nom_epouse;
//        $_SESSION['Prenom'] = $prenom;
//        $_SESSION['Date_naissance'] = $date_naiss;
//        $_SESSION['adresse'] = $adresse;
//        $_SESSION['Cp'] = $CP;
//        $_SESSION['Ville'] = $ville;
//        $_SESSION['Email'] = $email;
//        $_SESSION['Telephone'] = $telephone;
?>