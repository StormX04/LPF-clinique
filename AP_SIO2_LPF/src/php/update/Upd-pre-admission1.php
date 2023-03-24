<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $choix_admission = $_POST['pre_admission'];
    $choix_medecin = $_POST['choix_medecin'];
    $date_hospitalisation = $_POST['hospitalisation'];
    $heure_intervention = $_POST['inter'];

    $_SESSION['Hospitalisation'] = array($choix_admission, $choix_medecin, $date_hospitalisation, $heure_intervention);

    if ($_POST['btn'] == "Suivant") {
        echo "<script>window.location.href='../../UpdateAdmission/Update_pre_admission_2.php'</script>";
    }

}
?>

