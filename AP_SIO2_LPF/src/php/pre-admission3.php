<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_contact_prevenir = $_POST['Nom_contact_prevenir'];
    $prenom_contact_prevenir = $_POST['Prenom_contact_prevenir'];
    $telephone_contact_prevenir = $_POST['Telephone_contact_prevenir'];
    $adresse_contact_prevenir = $_POST['Adresse_contact_prevenir'];
    $ville_contact_prevenir = $_POST['Ville_contact_prevenir'];
    $CP_contact_prevenir = $_POST['CP_contact_prevenir'];

    $nom_contact_confiance = $_POST['Nom_contact_confiance'];
    $prenom_contact_confiance = $_POST['Prenom_contact_confiance'];
    $telephone_contact_confiance = $_POST['Telephone_contact_confiance'];
    $adresse_contact_confiance = $_POST['Adresse_contact_confiance'];
    $ville_contact_confiance = $_POST['Ville_contact_confiance'];
    $CP_contact_confiance = $_POST['CP_contact_confiance'];


    $_SESSION['ContactPrevenir'] = array($nom_contact_prevenir,$prenom_contact_prevenir,$telephone_contact_prevenir,$adresse_contact_prevenir,$ville_contact_prevenir,$CP_contact_prevenir);
    $_SESSION['ContactConfiance']= array($nom_contact_confiance,$prenom_contact_confiance,$telephone_contact_confiance,$adresse_contact_confiance,$ville_contact_confiance,$CP_contact_confiance);

    if ($_POST['btn'] == "Suivant"){
        echo "<script>window.location.href='../pre-admission_Pages/pre_admission_4.php'</script>";
    }
}


