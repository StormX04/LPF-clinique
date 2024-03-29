<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <title>Pré-admission page:5</title>
    <link rel="stylesheet" href="../pre-admission_CSS/main.css">
    <link rel="stylesheet" href="../pre-admission_CSS/text.css">
    <link rel="stylesheet" href="../pre-admission_CSS/pre-admission5.css">
</head>
<body>
<header>
    <div class="logo"></div>
</header>
<h1 class="red TitlePreAdmi">Formulaire de pré-admission</h1>
<section class="niveau_bar">
    <div class="progress-bar">
        <div class="progress-bar__progress">100%</div>
    </div>
</section>
<h2 class="SousTitlePreAdmi red">Document a fournir</h2>
<section class="group_form">
    <form action="../php/pre-admission5.php" method="POST" enctype="multipart/form-data">
        <div class="inlinePart">
            <div class="Fi_Identite">
                <h3>Carte d'identite (reto)</h3>
                <input type="file"
                       id="Fi_IdentiteRecto" name="Fi_IdentiteRecto"
                       accept="image/png, image/jpeg, image/pdf">
            </div>
            <div class="Fi_IdentiteVerso">
                <h3>Carte d'identite (verso)</h3>
                <input type="file"
                       id="Fi_IdentiteVerso" name="Fi_IdentiteVerso"
                       accept="image/png, image/jpeg, image/pdf">
            </div>

            <div class="Fi_Carte_vitale">
                <h3>Carte vitale</h3>
                <input type="file"
                       id="Fi_Carte_vitale" name="Fi_Carte_vitale"
                       accept="image/png, image/jpeg, image/pdf">
            </div>
        </div>
        <div class="inlinePart">
            <div class="Fi_Carte_Mutuelle">
                <h3>Carte mutuelle</h3>
                <input type="file"
                       id="Fi_Carte_Mutuelle" name="Fi_Carte_Mutuelle"
                       accept="image/png, image/jpeg, image/pdf">
            </div>

            <div class="Fi_Livret_famille">
                <h3>Livret de famille</h3>
                <input type="file"
                       id="Fi_Livret_famille" name="Fi_Livret_famille"
                       accept="image/png, image/jpeg, image/pdf">
            </div>
        </div>
        <br>
        <div class="inlinePart">
            <div class="Fi_autorisation">
                <h3>Autorisation ( si -18ans)</h3>
                <input type="file"
                       id="Fi_autorisation" name="Fi_autorisation"
                       accept="image/png, image/jpeg, image/pdf">
            </div>
        </div>

    <div class="group_buttun">
        <div class="button_Valider_form">
                <input class="button_s" type="submit" formmethod="post" name="btn" value="Valider">
        </div>
        <div class="button_precendent_prea5_form">
                <input class="button_s"  onclick="javascript:history.back()" value="Precedent">
        </div>
    </div>
    </form>
</section>





</body>
</html>