<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <title>Pré-admission page:2</title>
    <link rel="stylesheet" href="../pre-admission_CSS/main.css">
    <link rel="stylesheet" href="../pre-admission_CSS/text.css">
    <link rel="stylesheet" href="../pre-admission_CSS/pre_admission2.css">
    <script src="../js/ValidationFiles.js"></script>
    <?php include_once '../php/Requete.php'?>
</head>
<body>

<header>
    <div class="logo"></div>
</header>
<h1 class="red TitlePreAdmi">Formulaire de pré-admission</h1>
<section class="niveau_bar">
    <div class="progress-bar">
        <div class="progress-bar__progress">20%</div>
    </div>
</section>
<h2 class="red SousTitlePreAdmi">Information du patient</h2>
<section class="group_form">
    <form action="../php/pre-admission2.php" method="POST">
        <?php
        afficherPatient($_SESSION['IDsecusocial']);?>
    </form>
</section>

</body>
</html>