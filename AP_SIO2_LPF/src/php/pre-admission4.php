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


    switch ($_POST['btn'])
    {
        case "Suivant":
            header('Location: ../pre-admission_HTML/pre_admission_5.html');
            break;
        case "Precedent":
            header('Location: ../pre-admission_HTML/pre_admission_3.html');
            break;
    }

}
//$_SESSION['Organisme_securite_social'] = $organisme_Secu_Social;
//$_SESSION['Numero_secu_social'] = $numeros_Secu_Social ;
//$_SESSION['Pa_assure'] = $pa_Assure ;
//$_SESSION['Pa_ald'] =  $pa_ALD ;
//$_SESSION['Nom_mutuelle_assurance'] = $nom_mutuelle_Assurance ;
//$_SESSION['Num_adherent'] =  $num_adherent;
//$_SESSION['Chambre_part'] =  $chambre_Part;

