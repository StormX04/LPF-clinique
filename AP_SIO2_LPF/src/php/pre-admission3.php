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

    switch ($_POST['btn'])
    {
        case "Suivant":
            header('Location: ../pre-admission_HTML/pre_admission_4.html');
            break;
        case "Precedent":
            header('Location: ../pre-admission_HTML/pre_admission_2.html');
            break;

    }
}

//$_SESSION['Nom_contact_prevenir']=$nom_contact_prevenir ;
//$_SESSION['Prenom_contact_prevenir']= $prenom_contact_prevenir ;
//$_SESSION['Telephone_contact_prevenir']=$telephone_contact_prevenir;
//$_SESSION['Adresse_contact_prevenir']= $adresse_contact_prevenir;
//$_SESSION['Ville_contact_prevenir']=$ville_contact_prevenir;
//$_SESSION['CP_contact_prevenir']=  $CP_contact_prevenir ;
//
//$_SESSION['Nom_contact_confiance']=$nom_contact_confiance ;
//$_SESSION['Prenom_contact_confiance']=$prenom_contact_confiance ;
//$_SESSION['Telephone_contact_confiance']=$telephone_contact_confiance ;
//$_SESSION['Adresse_contact_confiance']=$adresse_contact_confiance ;
//$_SESSION['Ville_contact_confiance']= $ville_contact_confiance ;
//$_SESSION['CP_contact_confiance']= $CP_contact_confiance ;

