<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <title>Pré-admission page:4</title>
    <link rel="stylesheet" href="../pre-admission_CSS/main.css">
    <link rel="stylesheet" href="../pre-admission_CSS/text.css">
    <link rel="stylesheet" href="../pre-admission_CSS/pre-admission4.css">
    <script src="../js/ValidationFiles.js"></script>
</head>
<body>
<header>
    <div class="logo"></div>
</header>
<h1 class="red TitlePreAdmi">Formulaire de pré-admission</h1>
<section class="niveau_bar">
    <div class="progress-bar">
        <div class="progress-bar__progress">80%</div>
    </div>
</section>
<h2 class="SousTitlePreAdmi red">Information sur la couverture social du patient</h2>
<section class="group_form">
    <form action="../php/pre-admission4.php" method="POST">
        <div class="inlinePart">
            <div class="Organisme_securite_social">
                <h3>Organisme de securite social ou nom de la caisse d'assurance maladie : <a href="https://www.service-public.fr/particuliers/vosdroits/F648">*</a></h3>
<!--                <input type="text" id="Organisme_securite_social" name="Organisme_securite_social">-->
                <select id="Organisme_securite_social" name="Organisme_securite_social">
                    <option value="Salarie du prive">Salarie du prive</option>
                    <option value="Fonctionnaire">Fonctionnaire</option>
                    <option value=">Activite agricole">Activite agricole</option>
                    <option value="Independent">Independent</option>
                    <option value="Militaire">Militaire</option>
                    <option value="Activites ambulantes">Activites ambulantes</option>
                    <option value="Statut particulier">Statut particulier (entreprise publiques, marin, employé des mines...)</option>
                    <option value="Autre situation">Autre situation</option>
                </select>
            </div>
        </div>
        <div class="inlinePart">
            <div class="Numero_secu_social">
                <h3>Numerode securite social :</h3>
                <input type="text" id="Numero_secu_social" name="Numero_secu_social">
            </div>

            <div class="Pa_assure">
                <h3>Le patient est-il assuré ?</h3>
                <select id="Pa_assure" name="Pa_assure">
                    <option value="1">Vrai</option>
                    <option value="0">Faux</option>
                </select>
            </div>
        </div>
        <div class="inlinePart">
            <div class="Pa_ald">
                <h3>Le patient est-il en <a href="ww.googe.com">ALD *</a> ?</h3>
                <select id="Pa_ald" name="Pa_ald">
                    <option value="1">Vrai</option>
                    <option value="0">Faux</option>
                </select>
            </div>

            <div class="Nom_mutuelle_assurance">
                <h3>Nom de la mutuelle ou assurance :</h3>
                <input type="text" id="Nom_mutuelle_assurance" name="Nom_mutuelle_assurance">
            </div>
        </div>
        <div class="inlinePart">
            <div class="Num_adherent">
                <h3>Numero de l'adherent :</h3>
                <input type="text" id="Num_adherent" name="Num_adherent">
            </div>

            <div class="Chambre_part">
                <h3>Chambre particuliere : :</h3>
                <select id="Chambre_part" name="Chambre_part">
                    <option value="1">TV</option>
                    <option value="2">Bain</option>
                    <option value="2">Handicape</option>
                </select>
            </div>
        </div>

    <div class="group_buttun">
        <div class="button_suiv_prea4_form">
            <input class="button_s" formmethod="post" name="btn" value="Suivant" id="bouton-suivant" onclick="verifieFormulaireCouverturreSocial()" >
        </div>
        <div class="button_precendent_prea4_form">
                <input class="button_s"   onclick="javascript:history.back()" value="Precedent">
        </div>
    </div>
    </form>
</section>





</body>
</html>