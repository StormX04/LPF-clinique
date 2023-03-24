<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <title>Pré-admission page:3</title>
    <link rel="stylesheet" href="../pre-admission_CSS/main.css">
    <link rel="stylesheet" href="../pre-admission_CSS/text.css">
    <link rel="stylesheet" href="../pre-admission_CSS/pre-admission3.css">
    <script src="../js/ValidationFiles.js"></script>
</head>
<body>
<header>
    <div class="logo"></div>
</header>
<h1 class="red TitlePreAdmi">Formulaire de pré-admission</h1>
<section class="niveau_bar">
    <div class="progress-bar">
        <div class="progress-bar__progress">50%</div>
    </div>
</section>

<section class="group_form">
    <h2 class="SousTitlePreAdmi red">Coordonnées de la personne a prevenir</h2>
    <form action="../php/pre-admission3.php" method="POST">
         <div class="group_contact_prevenir">
             <div class="inlinePart">
                 <div class="Nom_contact_prevenir">
                     <h3>Nom :</h3>
                     <input type="text" id="Nom_contact_prevenir" name="Nom_contact_prevenir">
                 </div>
                 <div class="Prenom_contact_prevenir">
                     <h3>Prenom :</h3>
                     <input type="text" id="Prenom_contact_prevenir" name="Prenom_contact_prevenir">
                 </div>
                 <div class="Telephone_contact_prevenir">
                     <h3>Telephone :</h3>
                     <input type="text" id="Telephone_contact_prevenir" name="Telephone_contact_prevenir">
                 </div>
             </div>
             <div class="inlinePart">
                 <div class="Adresse_contact_prevenir">
                     <h3>adresse :</h3>
                     <input type="text" id="Adresse_contact_prevenir" name="Adresse_contact_prevenir">
                 </div>
                 <div class="Ville_contact_prevenir">
                     <h3>Ville :</h3>
                     <input type="text" id="Ville_contact_prevenir" name="Ville_contact_prevenir">
                 </div>
                 <div class="CP_contact_prevenir">
                     <h3>Code postal :</h3>
                     <input type="text" id="CP_contact_prevenir" name="CP_contact_prevenir">
                 </div>
             </div>
        </div>

    <h2 class="SousTitlePreAdmi red">Coordonnées de la personne de confiance</h2>
        <div class="group_contact_confiance">
            <div class="inlinePart">
                <div class="Nom_contact_confiance">
                    <h3>Nom :</h3>
                    <input type="text" id="Nom_contact_confiance" name="Nom_contact_confiance">
                </div>
                <div class="Prenom_contact_confiance">
                    <h3>Prenom :</h3>
                    <input type="text" id="Prenom_contact_confiance" name="Prenom_contact_confiance">
                </div>
                <div class="Telephone_contact_confiance">
                    <h3>Telephone :</h3>
                    <input type="text" id="Telephone_contact_confiance" name="Telephone_contact_confiance">
                </div>
            </div>
            <div class="inlinePart">
                <div class="Adresse_contact_confiance">
                    <h3>adresse :</h3>
                    <input type="text" id="Adresse_contact_confiance" name="Adresse_contact_confiance">
                </div>
                <div class="Ville_contact_confiance">
                    <h3>Ville :</h3>
                    <input type="text" id="Ville_contact_confiance" name="Ville_contact_confiance">
                </div>
                <div class="CP_contact_confiance">
                    <h3>Code postal :</h3>
                    <input type="text" id="CP_contact_confiance" name="CP_contact_confiance">
                </div>
            </div>
        </div>

    <div class="group_buttun">
        <div class="button_suiv_prea3_form">
            <input class="button_s" formmethod="post" name="btn" value="Suivant" id="bouton-suivant" onclick="verifieFormulaireContact()" >
        </div>
        <div class="button_precendent_prea3_form">
                <input class="button_s"  onclick="javascript:history.back()" value="Precedent">
        </div>
    </div>
    </form>
</section>





</body>
</html>