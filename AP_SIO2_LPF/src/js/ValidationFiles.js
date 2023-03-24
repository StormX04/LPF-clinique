
function verifieFormulairePatient() {
    // Récupérer les valeurs des champs du formulaire
    var civilite = document.getElementById("Civilite").value;
    var nomNaissance = document.getElementById("nom_naissance").value;
    var prenom = document.getElementById("Prenom").value;
    var dateNaissance = document.getElementById("Date_naissance").value;
    var adresse = document.getElementById("adresse").value;
    var ville = document.getElementById("Ville").value;
    var codePostal = document.getElementById("Cp").value;
    var telephone =  document.getElementById("Telephone").value;
    // Vérifier si tous les champs sont remplis
    if (
        civilite === "" ||
        nomNaissance === "" ||
        prenom === "" ||
        dateNaissance === "" ||
        adresse === "" ||
        ville === "" ||
        valideCodePostal(codePostal) != true ||
        valideEmail() != true ||
        valideTelephone(telephone) != true
    ) {
        alert("Tous les champs du formulaire doivent être remplis");
        console.log("errueur valeur !");
        changeBouton(false);
        return false;
    }
    // Si toutes les vérifications ont été passées, exécuter le code PHP ou le bouton suivant
    changeBouton(true);
    console.log("valeur ok !");
    return true;
}
function verifieFormulaireContact() {
    // Récupérer les valeurs des champs du formulaire
    var Nom_contact_prevenir = document.getElementById("Nom_contact_prevenir").value;
    var Prenom_contact_prevenir = document.getElementById("Prenom_contact_prevenir").value;
    var Telephone_contact_prevenir = document.getElementById("Telephone_contact_prevenir").value;
    var Adresse_contact_prevenir = document.getElementById("Adresse_contact_prevenir").value;
    var Ville_contact_prevenir = document.getElementById("Ville_contact_prevenir").value;
    var CP_contact_prevenir = document.getElementById("CP_contact_prevenir").value;

    var Nom_contact_confiance = document.getElementById("Nom_contact_confiance").value;
    var Prenom_contact_confiance = document.getElementById("Prenom_contact_confiance").value;
    var Telephone_contact_confiance = document.getElementById("Telephone_contact_confiance").value;
    var Adresse_contact_confiance = document.getElementById("Adresse_contact_confiance").value;
    var Ville_contact_confiance = document.getElementById("Ville_contact_confiance").value;
    var CP_contact_confiance = document.getElementById("CP_contact_confiance").value;
    console.log( Nom_contact_prevenir === "" ,
        Prenom_contact_prevenir === "" ,
        Adresse_contact_prevenir === "" ,
        Ville_contact_prevenir === "" ,
        valideCodePostal(CP_contact_prevenir) ,
        valideTelephone(Telephone_contact_prevenir) );

    console.log(  Nom_contact_confiance === "" ,
        Prenom_contact_confiance === "" ,
        Adresse_contact_confiance === "" ,
        Ville_contact_confiance === "" ,
        valideCodePostal(CP_contact_confiance) ,
        valideTelephone(Telephone_contact_confiance)  );
    // Vérifier si tous les champs sont remplis
    if (
        Nom_contact_prevenir === "" ||
        Prenom_contact_prevenir === "" ||
        Adresse_contact_prevenir === "" ||
        Ville_contact_prevenir === "" ||
        valideCodePostal(CP_contact_prevenir) != true ||
        valideTelephone(Telephone_contact_prevenir) != true ||
        Nom_contact_confiance === "" ||
        Prenom_contact_confiance === "" ||
        Adresse_contact_confiance === "" ||
        Ville_contact_confiance === "" ||
        valideCodePostal(CP_contact_confiance) != true ||
        valideTelephone(Telephone_contact_confiance) != true
    ) {
        alert("Tous les champs du formulaire doivent être remplis");
        console.log("errueur valeur !");
        changeBouton(false);
        return false;
    }
    // Si toutes les vérifications ont été passées, exécuter le code PHP ou le bouton suivant
    changeBouton(true);
    console.log("valeur ok !");
    return true;
}
function verifieFormulaireCouverturreSocial() {
    // Récupérer les valeurs des champs du formulaire
    var form = document.querySelector('form');
    var Organisme_securite_social = form.querySelector('#Organisme_securite_social').value;
    var Numero_secu_social = form.querySelector('#Numero_secu_social').value;
    var Pa_assure = form.querySelector('#Pa_assure').value;
    var Pa_ald = form.querySelector('#Pa_ald').value;
    var Nom_mutuelle_assurance = form.querySelector('#Nom_mutuelle_assurance').value;
    var Num_adherent = form.querySelector('#Num_adherent').value;
    var Chambre_part = form.querySelector('#Chambre_part').value;


    console.log(Organisme_securite_social == "" ,
        Numero_secu_social == "" ,
        Pa_assure == "" ,
        Pa_ald == "" ,
        Nom_mutuelle_assurance == "" ,
        Num_adherent == "" ,
        Chambre_part == "" ,
        valideNumCodeSocial(Numero_secu_social) != true);
    // Vérifier si tous les champs sont remplis
    if (
        Organisme_securite_social == "" ||
        Numero_secu_social == "" ||
        Pa_assure == "" ||
        Pa_ald == "" ||
        Nom_mutuelle_assurance == "" ||
        Num_adherent == "" ||
        Chambre_part == "" ||
        valideNumCodeSocial(Numero_secu_social) != true
    ) {
        alert("Tous les champs du formulaire doivent être remplis");
        console.log("errueur valeur !");
        return false;
    }
    // Si toutes les vérifications ont été passées, exécuter le code PHP ou le bouton suivant
    changeBouton(true);
    console.log("valeur ok !");
    return true;
}


function changeBouton(valeur) {
    var boutonSuivant = document.getElementById("bouton-suivant");
    var formulaire = document.querySelector("form");
    if ( valeur == true) {
        // Activer le bouton suivant
        formulaire.submit();
    } else {
        return false;
    }

}

function valideEmail() {
    var email = document.forms[0]["Email"].value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expression régulière pour valider l'e-mail
    if (!emailRegex.test(email)) { // Si l'adresse e-mail n'est pas valide
        alert("Veuillez saisir une adresse e-mail valide.");
        return false; // Empêcher l'envoi du formulaire
    }
    return true; // Autoriser l'envoi du formulaire si l'adresse e-mail est valide
}
function valideTelephone(telephone) {
    var regexTelephone = /^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/; // regex pour numéro de téléphone français
    if (regexTelephone.test(telephone))
    {
        return true;
    }
    return false;
}
function valideCodePostal(codePostal) {
    // Vérifier si la chaîne de caractères est vide ou null
    if (!codePostal) {
        alert("Veuillez saisir un Code Postal valide.");
        return false;
    }
    // Vérifier si la chaîne de caractères ne contient que des chiffres
    return /^\d+$/.test(codePostal);
}
function valideNumCodeSocial(nombre) {
    // Check that nombre is a string
    alert("Veuillez saisir un numeros de carte sociale  valide.");
    if (typeof nombre !== 'string') {
        return false;
    }

    // Supprimer tous les caractères non numériques de la chaîne de caractères

    nombre = nombre.replace(/[^0-9]/g, '');

    // Vérifier la longueur de la chaîne résultante
    if (nombre.length !== 13 && nombre.length !== 15) {
        return false;
    }

    // Vérifier le premier chiffre (sexe)
    if (nombre[0] < '1' || nombre[0] > '2') {
        return false;
    }

    // Vérifier le mois de naissance
    var month = parseInt(nombre.substr(3, 2));
    if (month < 1 || month > 12) {
        console.log('erreur carte securite social invalide ');
        return false;
    }
    console.log('carte securite social valide ');
    return true;
}
