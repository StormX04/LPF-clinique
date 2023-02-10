<?php
session_start();

//Demande le fichier pour se connecter à la BDD
include_once('connexion_BDD.php');


//Récupère tout les produit disponible dans la BDD
function toutProduit() {
    //Connexion à la BDD
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();

    //Requete pour les informations voulu
    $req = $DB->prepare(" ");
    $req->execute();

    return $req;
}

function InsrtHospi($data) {
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();

    $req = $DB->prepare("INSERT INTO hospitalisation VALUES (?,?,?,?,?,?);");
    $req->execute(array( $req->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5]))));

    return $req;
}
function InsrtPatient($data) {
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();

    $req = $DB->prepare("INSERT INTO patient(`ID_secu`, `Civ`, `Nom_naissance`, `Nom_epouse`, `Prenom`, `Date_naissance`, `Adresse`, `CP`, `Ville`, `Email`, `Telephone`, `id_hospitalisation`, `id_couverture_social`, `id_document`, `id_mineur`, `id_contact`)
                                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $req->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],$data[14],$data[15],$data[16]));

    return $req;
}
function InsrtContact($data,$data2) {
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();
    $compteur = 0;
    if( count($data) == count($data2))
    {
        for($i=0;$i<count($data);$i++)
        {
            if( $data[$i] == $data2[$i] )
            {
                $compteur +=1;
            }
        }
        if($compteur == count($data) )
        {
            $role = 3;
            $req = $DB->prepare("INSERT INTO contact_patient(`ID`,`Nom`, `Prenom`, `rue`, `Ville`, `CP`, `telephone`, `Roles`) VALUES (?,?,?,?,?,?,?,?)");
            $req->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$role));
//            $req->execute(array(1,"a","b","c","d",1,"1",3));

        }else {
            $role = 1;
            $req = $DB->prepare("INSERT INTO contact_patient(`ID`,`Nom`, `Prenom`, `rue`, `Ville`, `CP`, `telephone`, `Roles`) VALUES (?,?,?,?,?,?,?,?)");
            $req->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$role));
            $role = 2;
            $req = $DB->prepare("INSERT INTO contact_patient(`ID`,`Nom`, `Prenom`, `rue`, `Ville`, `CP`, `telephone`, `Roles`) VALUES (?,?,?,?,?,?,?,?)");
            $req->execute(array($data2[0],$data2[1],$data2[2],$data2[3],$data2[4],$data2[5],$data2[6],$data2[7],$role));
            $role = 1;
        }
        var_dump($role);
    }



}
function InsrtCouverturSocial($data) {
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();


    $req = $DB->prepare("INSERT INTO couverture_social VALUES (?,?,?,?,?,?)");
    $req->execute(array( $req->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5]))));

    return $req;
}
function InsrtFichier($data) {
    $DBB = new connexion_bdd();
    $DB = $DBB->DB();


    $req = $DB->prepare("INSERT INTO couverture_social VALUES (?,?,?,?,?,?)");
    $req->execute(array( $req->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6]))));

    return $req;
}


?>