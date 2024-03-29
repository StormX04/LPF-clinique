<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <title>Pré-admission page:1</title>
    <link rel="stylesheet" href="../pre-admission_CSS/pre_admission_1.css">
    <link rel="stylesheet" href="../pre-admission_CSS/text.css">
    <link rel="stylesheet" href="../pre-admission_CSS/main.css">
    <?php include_once '../php/Requete.php'?>
</head>


<body>
<header>
    <div class="logo"></div>
</header>
    <h1 class="red TitlePreAdmi">Formulaire de pré-admission</h1>

<section class="niveau_bar">
    <div class="progress-bar">
        <div class="progress-bar__progress">0%</div>
    </div>
</section>

    <h2 class="SousTitlePreAdmi red">Information de l'hospitalisation :</h2>

<section class="group_form">
    <form action="../php/pre-admission1.php" method="POST" >
    <div class="inlinePart">
        <div class="pre_admi_form" >
            <h3>Pré-admission :</h3>
                <select name="pre_admission"  class="select">
                    <option value="ambulatoire">Ambulatoire chirurgie</option>
                    <option value="hospitalisation">Hospitalisation</option>
                </select>
        </div>
        <div class="choix_medecin_form">
            <h3>Choix du medecin :</h3>
                <select class="select"  name="choix_medecin">
                          <?php afficherMedecin();?>
                </select>
        </div>
    </div>
    <div class="inlinePart2">
        <div class="date_hospitalisation_form">
            <h3>Date de l'hospitalisation :</h3>
                <input type="date" id="d_hospitalisation" name="hospitalisation">
        </div>
        <div class="heure_intervention_form">
            <h3>Heure de l'intervention :</h3>

                <input type="time" id="inter" name="inter">
        </div>
    </div>
    <div class="group_buttun">
        <div class="button_suiv_prea1_form">
                <input type="submit"  formmethod="post" name="btn" class="button_s" value="Suivant">

        </div>
    </div>
    </form>
</section>

</body>
</html>