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
    <form action="../php/update/Upd-pre-admission1.php" method="POST" >
     <?php
     afficherHospitalisation($_SESSION['IDsecusocial']);?>
    <div class="group_buttun">
        <div class="button_suiv_prea1_form">
                <input type="submit"  formmethod="post" name="btn" class="button_s" value="Suivant">

        </div>
    </div>
    </form>
</section>

</body>
</html>
