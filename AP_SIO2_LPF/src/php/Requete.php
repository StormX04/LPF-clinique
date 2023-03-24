<?php
session_start();

//Demande le fichier pour se connecter à la BDD
include_once('connexion_BDD.php');

/**********************************     INSERTION        ******************************************/
function InsrtCouverturSocial($data) {
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();

    $req = $DB->prepare("INSERT INTO `couverture_social`(`ID`, `Org_secu_social`, `Pa_assure`, `Pa_ald`, `Nom_mutuelle`, `Num_adherent`) VALUES  (?,?,?,?,?,?)");
    $req->execute(array($data[1],$data[0],$data[2],$data[3],$data[4],$data[5]));
    $id = $DB->lastInsertId();
    return $id;
}
function InsrtContact($data,$data2)
{
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();

    $req = $DB->prepare("INSERT INTO `contact_patient`(`Nom`, `Prenom`, `rue`, `Ville`, `CP`, `telephone`) VALUES (?,?,?,?,?,?)");
    $req->execute(array(securise($data[0]),securise($data[1]),securise($data[3]), securise($data[4]),securise($data[5]),securise($data[2])));
    $id1 = $DB->lastInsertId();

    $req2 = $DB->prepare("INSERT INTO `contact_patient`(`Nom`, `Prenom`, `rue`, `Ville`, `CP`, `telephone`) VALUES (?,?,?,?,?,?)");
    $req2->execute(array(securise($data2[0]), securise($data2[1]),securise($data2[3]),securise($data2[4]),securise($data2[5]),securise($data2[2])));
    $id2 = $DB->lastInsertId();

    return array($id1, $id2);
}
function InsrtHospi($data,$data2,$idPatient) {
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();

    $req = $DB->prepare("INSERT INTO `hospitalisation`( `Choix_admission`, `Date_hospitalisation`, `Heure_intervention`, `Choix_medecin`, `Chambre`, `idPatient`) VALUES (?,?,?,?,?,?)");
    $req->execute(array($data[0], $data[2], $data[3], $data[1],$data2[6],$idPatient));
    $id = $DB->lastInsertId();
    return $id;
}
function InsrtPatient($idPatient,$data,$idContact,$idDocument) {
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();

    $req = $DB->prepare("INSERT INTO `patient`(`ID_secu`, `Civ`, `Nom_naissance`, `Nom_epouse`, `Prenom`, `Date_naissance`, `Adresse`, `CP`, `Ville`, `Email`, `Telephone`, `id_couverture_social`, `id_contact_Confiance`, `id_contact_Prevenir`, `ID_Documents`, `id_Hospitalisation`) VALUES  (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $req->execute(array($idPatient,$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$idPatient,$idContact[0],$idContact[1],$idDocument,$idPatient));
    $id = $DB->lastInsertId();
    return $id;
}
function InsrtFichier($data,$idPatient) {
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();

    $req = $DB->prepare("INSERT INTO `documents` (`Carte_identiteRecto`, `Carte_identiteVerso`, `Carte_vitale`, `Carte_mutuelle`, `livret_famille`, `autorisation_mineur`, `ID_Patient`) VALUES(?,?,?,?,?,?,?)");
    $req->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$idPatient));
    $id = $DB->lastInsertId();
    return $id;
}
/*****************************  SECURITE    *************************************************/
function securise($chaine) {
    $chaine = trim($chaine); // Supprime les espaces en début et fin de chaîne
    $chaine = stripslashes($chaine); // Supprime les antislashes
    $chaine = htmlspecialchars($chaine); // Convertit les caractères spéciaux en entités HTML
    return $chaine;
}
/******************************     AFFICHAGE        ****************************************/
function afficherMedecin()
{
    $DBB = new connexion_bdd();
    // Requête SQL pour récupérer toutes les valeurs de la table "personnel" où id_service est égal à 1
    $query = 'SELECT `ID`, `Nom`, `Prenom`, `id_service` FROM `personnel` WHERE id_service = 1';
    $result = $DBB->DB()->query($query);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = securise($row['ID']);
            $nom = securise($row['Nom']);
            $prenom = securise($row['Prenom']);
            echo "<option value='$id'>Medecin. $nom $prenom </option>";
        }
    } else {
        // Aucun résultat trouvé dans la base de données
        echo "Aucune valeur trouvée dans la base de données.";
    }
}
function afficherHospitalisation($id_Secu) {
    $DBB = new connexion_bdd();
    $query = ' SELECT `ID`, `Choix_admission`, `Date_hospitalisation`, `Heure_intervention`, `Choix_medecin`, `Chambre`, `idPatient` FROM `hospitalisation` WHERE  idPatient = '.$id_Secu.';';
    $result = $DBB->DB()->query($query);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <div class="inlinePart">
                 <div class="pre_admi_form" >
                     <h3>Pré-admission :</h3>
                         <select name="pre_admission"  class="select">';
                         if ($row['Choix_admission'] =='ambulatoire')
                         {
                            echo '<option value="ambulatoire" selected>Ambulatoire chirurgie</option>';
                         }else{
                            echo '<option value="hospitalisation">Hospitalisation</option>';
                         }
                         echo '
                          <option value="ambulatoire">Ambulatoire chirurgie</option>
                          <option value="hospitalisation">Hospitalisation</option>
                          </select>
                  </div>';
                 echo '
                     <div class="choix_medecin_form">
                    <h3>Choix du medecin :</h3>
                      <select class="select"  name="choix_medecin">';
                $query2 = 'SELECT `ID`, `Nom`, `Prenom`, `id_service` FROM `personnel` WHERE ID = '.$row['Choix_medecin'].';';
                $result2 = $DBB->DB()->query($query2);
                if ($result->rowCount() > 0) {
                    while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
                        $id = securise($row2['ID']);
                        $nom = securise($row2['Nom']);
                        $prenom = securise($row2['Prenom']);
                        echo "<option value='$id'>Medecin. $nom $prenom </option>";
                    }
            }
            afficherMedecin();
            echo '
                         </select>
                    </div>
                    </div>';
             echo '
                <div class="inlinePart2">
                  <div class="date_hospitalisation_form">
                       <h3>Date de l\'hospitalisation :</h3>
                           <input type="date" id="d_hospitalisation" name="hospitalisation" value="'.$row['Date_hospitalisation'].'">
                   </div>
                <div class="heure_intervention_form">
                    <h3>Heure de l\'intervention :</h3>
                <input type="time" id="inter" name="inter"value="'.$row['Heure_intervention'].'">
                </div>
                </div>';
        }
    } else {
        echo "Aucune valeur trouvée dans la base de données.";
    }
}
function afficherPatient($id_Secu) {
    $DBB = new connexion_bdd();
    $query = ' SELECT `ID_secu`, `Civ`, `Nom_naissance`, `Nom_epouse`, `Prenom`, `Date_naissance`, `Adresse`, `CP`, `Ville`, `Email`, `Telephone`, `id_hospitalisation`, `id_couverture_social`, `id_document`, `id_contact_Confiance`, `id_contact_Prevenir` FROM `patient`  WHERE  ID_secu = '.$id_Secu.';';
    $result = $DBB->DB()->query($query);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '
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
                <h3>Nom d\'epouse :</h3>
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
    </div>';
        }
    } else {
        echo "Aucune valeur trouvée dans la base de données.";
    }
}
/******************************     Verification        ****************************************/
function VerifSecuSocial($id_Secu)
{
    $DBB = new connexion_bdd();
    $query = 'SELECT count(*) FROM `patient` WHERE ID_secu = ' . $id_Secu . ';';
    $result = $DBB->DB()->query($query);
    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $value = $row['count(*)'];
        if ($value > 0) {
            $_SESSION['IDsecusocial'] = $id_Secu;
            return true;
        } else {
            // Aucun résultat trouvé dans la base de données
            echo "Aucune valeur trouvée dans la base de données.";
            return false;
        }
    }
}

?>