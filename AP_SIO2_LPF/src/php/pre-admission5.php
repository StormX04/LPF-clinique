<?php
include 'Requete.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fi_Mutuelle = $_POST['Fi_Mutuelle'];
    $fi_Carte_Vitale = $_POST['Fi_Carte_vitale'];
    $fi_Livret_famille = $_POST['Fi_Livret_famille'];
    $fi_autorisation = $_POST['Fi_autorisation'];

    $_SESSION['Fichier'] = array($fi_Mutuelle, $fi_Carte_Vitale, $fi_Livret_famille, $fi_autorisation);


    $Hospitalisation = $_SESSION['Hospitalisation'];
    $Patient = $_SESSION['Patient'];
    $ContactPrevenir = $_SESSION['ContactPrevenir'];
    $ContactConfiance = $_SESSION['ContactConfiance'];
    $CouvertureSocial = $_SESSION['CouvertureSocial'];
    $Fichier = $_SESSION['Fichier'];
    var_dump($_SESSION);
    $insrtHospi = array($Hospitalisation[0],$Hospitalisation[2],$Hospitalisation[3],$Hospitalisation[1],(int)$CouvertureSocial[5]);
    InsrtHospi($insrtHospi);

//`(`ID_secu`, `Civ`, `Nom_naissance`, `Nom_epouse`, `Prenom`, `Date_naissance`, `Adresse`, `CP`, `Ville`, `Email`, `Telephone`, `id_hospitalisation`, `id_couverture_social`, `id_document`, `id_mineur`, `id_contact`)
//    var_dump((int)$CouvertureSocial[1],$Patient[0],$Patient[1],$Patient[2],$Patient[3],$Patient[4],$Patient[5],$Patient[6],$Patient[7],$Patient[8],$Patient[9],$Patient[],$Patient[],$Patient[],$Patient[],$Patient[]);

//    (`ID`, `Choix_admission`, `Date_hospitalisation`, `Heure_intervention`, `Choix_medecin`, `Chambre`)

}

?>


