<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <title>Pré-admission page:2</title>
    <link rel="stylesheet" href="../pre-admission_CSS/main.css">
    <link rel="stylesheet" href="../pre-admission_CSS/text.css">
    <link rel="stylesheet" href="../pre-admission_CSS/pre_admission2.css">
    <script src="../js/ValidationFiles.js"></script>
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
        <div class="inlinePart">
            <div class="Civ">
                <h3>Civilite :</h3>
                <select id="Civilite" name="civilite">
                    <option value="h">Homme</option>
                    <option value="F">Femme</option>
                    <option value="A">Autre</option>
                    <option value="Heli">Helicoptere</option>
                </select>
            </div>

            <div class="Nom_naissance">
                <h3>Nom de naissance :</h3>
                <input type="text" id="nom_naissance" name="nom_naissance">
            </div>

            <div class="Nom_epouse">
                <h3>Nom d'epouse :</h3>
                <input type="text" id="nom_epouse" name="nom_epouse">
            </div>
        </div>
        <div class="inlinePart">
            <div class="Prenom">
                <h3>Prenom :</h3>
                <input type="text" id="Prenom" name="Prenom">
            </div>

            <div class="Date_naissance">
                <h3>Date de naissance :</h3>
                <input type="date" id="Date_naissance" name="Date_naissance">
            </div>
        </div>
        <div class="inlinePart">
            <div class="adresse">
                <h3>adresse :</h3>
                <input type="text" id="adresse" name="adresse">
            </div>

            <div class="Cp">
                <h3>Code postal :</h3>
                <input type="text" id="Cp" name="Cp">
            </div>

            <div class="Ville">
                <h3>Ville :</h3>
                <input type="text" id="Ville" name="Ville">
            </div>
        </div>
        <div class="inlinePart">
            <div class="Email">
                <h3>Email :</h3>
                <input type="text" id="Email" name="Email">
            </div>
            <div class="Telephone">
                <h3>Telephone :</h3>
                <input type="text" id="Telephone" name="Telephone">
            </div>
        </div>
        <div class="group_buttun">
        <div class="button_suiv_prea2_form">
            <input class="button_s" formmethod="post" name="btn" value="Suivant" id="bouton-suivant" onclick="verifieFormulairePatient()" >
        </div>
        <div class="button_precendent_prea2_form">

                <input class="button_s" onclick="javascript:history.back()"  value="Precedent">

        </div>
    </div>
    </form>
</section>

</body>
</html>