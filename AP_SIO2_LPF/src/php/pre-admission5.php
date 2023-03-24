<?php
include 'Requete.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Connexion à la base de données
$DBB = new connexion_bdd();
$DB = $DBB->DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['btn'] == "Precedent") {
        echo "<script>window.location.href='../pre-admission_Pages/Update_pre_admission_4.php'</script>";
    }
    $Hospitalisation = $_SESSION['Hospitalisation'];
    $Patient = $_SESSION['Patient'];
    $ContactPrevenir = $_SESSION['ContactPrevenir'];
    $ContactConfiance = $_SESSION['ContactConfiance'];
    $CouvertureSocial = $_SESSION['CouvertureSocial'];
    $Fichier = array();
    $InsrtFichier = array();


//      Définir l'emplacement où les fichiers seront enregistré
    if (isset($_FILES['Fi_IdentiteRecto']) && isset($_FILES['Fi_IdentiteVerso']) && isset($_FILES['Fi_Carte_vitale']) && isset($_FILES['Fi_autorisation']) && isset($_FILES['Fi_Carte_Mutuelle'])) {
        $nomPatient = $CouvertureSocial[1];
        // Vérification du type de fichier
        $allowedTypes = array('jpg', 'jpeg', 'png', 'pdf');
        $fileExtension = strtolower(pathinfo($_FILES['Fi_IdentiteRecto']['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedTypes)) {
            $nom = $_FILES['Fi_IdentiteRecto']['name'];
            $message = "Le type de fichier ".$nom." n'est pas autorisé.";
            echo "<script>alert($message)</script>";
        }
        if (isset($_FILES['Fi_IdentiteRecto'])) {
            $extension = substr(strrchr($_FILES['Fi_IdentiteRecto']['name'], "."), 1);
            $nouveauNom = 'CarteIdentiteRecto_' . $nomPatient . '.' . $extension;
            array_push($Fichier, $nouveauNom);
            $Cheminetnomtemp = $_FILES['Fi_IdentiteRecto']['tmp_name'];
            $cheminetnomDef = '../../image/fichier/' . $nouveauNom;
            $moveDef = move_uploaded_file($Cheminetnomtemp, $cheminetnomDef);
            if ($moveDef) {
                $message = "le fichier $nouveauNom a etait upload";
                echo "<script>console.log($message)</script>";
            array_push($InsrtFichier,true);
        } else {
            $message = "le fichier $nouveauNom n'a pas etait upload";
            echo "<script>console.log($message)</script>";
            array_push($InsrtFichier,false);
        }
        }
        // Vérification du type de fichier
        $fileExtension = strtolower(pathinfo($_FILES['Fi_IdentiteVerso']['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedTypes)) {
            $nom = $_FILES['Fi_IdentiteVerso']['name'];
            $message = "Le type de fichier ".$nom." n'est pas autorisé.";
            echo "<script>alert($message)</script>";
        }
        if (isset($_FILES['Fi_IdentiteVerso'])) {
            $extension = substr(strrchr($_FILES['Fi_IdentiteVerso']['name'], "."), 1);
            $nouveauNom = 'Fi_IdentiteVerso' . $nomPatient . '.' . $extension;
            array_push($Fichier, $nouveauNom);
            $Cheminetnomtemp = $_FILES['Fi_IdentiteVerso']['tmp_name'];
            $cheminetnomDef = '../../image/fichier/' . $nouveauNom;
            $moveDef = move_uploaded_file($Cheminetnomtemp, $cheminetnomDef);
            if ($moveDef) {
                $message = "le fichier $nouveauNom a etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,true);
            } else {
                $message = "le fichier $nouveauNom n'a pas etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,false);
            }
        }
        // Vérification du type de fichier
      $fileExtension = strtolower(pathinfo($_FILES['Fi_Carte_vitale']['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedTypes)) {
            $nom = $_FILES['Fi_Carte_vitale']['name'];
            $message = "Le type de fichier ".$nom." n'est pas autorisé.";
            echo "<script>alert($message)</script>";
        }
        if (isset($_FILES['Fi_Carte_vitale'])) {
            $extension = substr(strrchr($_FILES['Fi_Carte_vitale']['name'], "."), 1);
            $nouveauNom = 'Fi_Carte_vitale' . $nomPatient . '.' . $extension;
            array_push($Fichier, $nouveauNom);
            $Cheminetnomtemp = $_FILES['Fi_Carte_vitale']['tmp_name'];
            $cheminetnomDef = '../../image/fichier/' . $nouveauNom;
            $moveDef = move_uploaded_file($Cheminetnomtemp, $cheminetnomDef);
            if ($moveDef) {
                $message = "le fichier $nouveauNom a etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,true);
            } else {
                $message = "le fichier $nouveauNom n'a pas etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,false);
            }
        }
        // Vérification du type de fichier
        $fileExtension = strtolower(pathinfo($_FILES['Fi_Carte_Mutuelle']['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedTypes)) {
            $nom = $_FILES['Fi_Carte_Mutuelle']['name'];
            $message = "Le type de fichier ".$nom." n'est pas autorisé.";
            echo "<script>alert($message)</script>";
        }
        if (isset($_FILES['Fi_Carte_Mutuelle'])) {
            $extension = substr(strrchr($_FILES['Fi_Carte_Mutuelle']['name'], "."), 1);
            $nouveauNom = 'Fi_Carte_Mutuelle' . $nomPatient . '.' . $extension;
            array_push($Fichier, $nouveauNom);
            $Cheminetnomtemp = $_FILES['Fi_Carte_Mutuelle']['tmp_name'];
            $cheminetnomDef = '../../image/fichier/' . $nouveauNom;
            $moveDef = move_uploaded_file($Cheminetnomtemp, $cheminetnomDef);
            if ($moveDef) {
                $message = "le fichier $nouveauNom a etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,true);
            } else {
                $message = "le fichier $nouveauNom n'a pas etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,false);
            }
        }
        // Vérification du type de fichier
        $fileExtension = strtolower(pathinfo($_FILES['Fi_Livret_famille']['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedTypes)) {
            $nom = $_FILES['Fi_Livret_famille']['name'];
            $message = "Le type de fichier ".$nom." n'est pas autorisé.";
            echo "<script>alert($message)</script>";
        }
        if (isset($_FILES['Fi_Livret_famille'])) {
            $extension = substr(strrchr($_FILES['Fi_Livret_famille']['name'], "."), 1);
            $nouveauNom = 'Fi_Livret_famille' . $nomPatient . '.' . $extension;
            array_push($Fichier, $nouveauNom);
            $Cheminetnomtemp = $_FILES['Fi_Livret_famille']['tmp_name'];
            $cheminetnomDef = '../../image/fichier/' . $nouveauNom;
            $moveDef = move_uploaded_file($Cheminetnomtemp, $cheminetnomDef);
            if ($moveDef) {
                $message = "le fichier $nouveauNom a etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,true);
            } else {
                $message = "le fichier $nouveauNom n'a pas etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,false);
            }
        }
        // Vérification du type de fichier
        $fileExtension = strtolower(pathinfo($_FILES['Fi_autorisation']['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedTypes)) {
            $nom = $_FILES['Fi_autorisation']['name'];
            $message = "Le type de fichier".$nom."n'est pas autorisé.";
            echo "<script>alert($message)</script>";
        }
        if (isset($_FILES['Fi_autorisation'])) {
            $extension = substr(strrchr($_FILES['Fi_autorisation']['name'], "."), 1);
            $nouveauNom = 'Fi_autorisation' . $nomPatient . '.' . $extension;
            array_push($Fichier, $nouveauNom);
            $Cheminetnomtemp = $_FILES['Fi_autorisation']['tmp_name'];
            $cheminetnomDef = '../../image/fichier/' . $nouveauNom;
            $moveDef = move_uploaded_file($Cheminetnomtemp, $cheminetnomDef);
            if ($moveDef) {
                $message = "le fichier $nouveauNom a etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,true);
            } else {
                $message = "le fichier $nouveauNom n'a pas etait upload";
                echo "<script>console.log($message)</script>";
                array_push($InsrtFichier,false);
            }
        }

        $idPatient = $CouvertureSocial[1];
        $idSocial = InsrtCouverturSocial($CouvertureSocial);
        $idContact = InsrtContact($ContactConfiance,$ContactPrevenir);
        $idHospitalisation = InsrtHospi($Hospitalisation, $CouvertureSocial,$idPatient);
        $idDocument = InsrtFichier($Fichier,$idPatient);
        InsrtPatient($idPatient,$Patient,$idContact,$idDocument);
//        Vérifier si les fonctions ont fonctionné sans erreur
        $FichierIsInsrt = true;
        foreach ($InsrtFichier as $val)
        {
            if ($val != $FichierIsInsrt)
            {
                $FichierIsInsrt = false;
            }
        }
        if (!$idSocial || !$idContact || !$idHospitalisation || !$idDocument || !$FichierIsInsrt) {
            // Si une des fonctions a échoué, imprimer un message d'erreur
            echo "<script>window.location.href='../pre-admission_Pages/pre_admission_5.php'</script>";
            echo "<script>window.alert('Une erreur sest produite lors de lexécution des fonctions PHP.');</script>";
        } else {
            // Si toutes les fonctions ont fonctionné correctement, exécuter le script JavaScript
            echo "<script>window.location.href='../../Ap/index.html'</script>";
        }
    }else {
        echo "<script>window.location.href='../pre-admission_Pages/pre_admission_5.php'</script>";
        echo "<script>window.alert('Une erreur s est produite lors de l upload des fichiers.');</script>";
    }






}







?>




