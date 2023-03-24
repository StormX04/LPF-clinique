

function fPerso(actvaleur) {
    var choixMed = document.getElementById("perso" + actvaleur);
    if (choixMed.style.display === "none") {
        choixMed.style.display = "block";
    }
    else {
        choixMed.style.display = "none";
    }

}
function choix(actvaleur) {
    var leChoix = document.getElementById( actvaleur + "-choix");
    var accord = confirm("Etes-vous sur de supprimer le "+actvaleur+" : " + leChoix.options[leChoix.selectedIndex].text);
    if (accord) {
        return true ;
    }
    else {
        return false ;
    }
}

function fServ(actvaleur) {
    var choixServ = document.getElementById("Serv" + actvaleur);
    if (choixServ.style.display === "none") {
        choixServ.style.display = "block";
    }
    else {
        choixServ.style.display = "none";
    }

}
function fStat(actvaleur) {
    if(actvaleur === "rbase") {
        choixswitch = document.getElementById("Statannee");
        choixswitch.style.display = "none";
        choixswitch2 = document.getElementById("Statmois");
        choixswitch2.style.display = "none";
    }
    var choixStat = document.getElementById("Stat" + actvaleur);
    if (choixStat.style.display === "none") {
        if(actvaleur === "annee") {
            choixswitch = document.getElementById("Statmois");
            choixswitch.style.display = "none";
            choixStat.style.display = "block";
        }
        else if(actvaleur === "mois") {
            choixswitch = document.getElementById("Statannee");
            choixswitch.style.display = "none";
            choixStat.style.display = "block";
        }
        else {
            choixStat.style.display = "block";
        }
    }
    else {
        choixStat.style.display = "none";
    }


}
function fStatM(actvaleur) {
    if(actvaleur === "rbase") {

        choixswitch = document.getElementById("StatMannee");
        choixswitch.style.display = "none";
        choixswitch2 = document.getElementById("StatMmois");
        choixswitch2.style.display = "none";

    }
    var choixStat = document.getElementById("StatM" + actvaleur);
    if (choixStat.style.display === "none") {
        if(actvaleur === "annee") {
            choixswitch = document.getElementById("StatMmois");
            choixswitch.style.display = "none";
            choixStat.style.display = "block";

        }
        else if(actvaleur === "mois") {
            choixswitch = document.getElementById("StatMannee");
            choixswitch.style.display = "none";
            choixStat.style.display = "block";
        }
        else {
            choixStat.style.display = "flex";
        }
    }
    else {

        choixStat.style.display = "none";
    }



}
function Affact(actvaleur) {
    var affaction = document.getElementById( actvaleur +"Action");
    if (affaction.style.display === "none") {
        affaction.style.display = "block";
    }
    else {
        affaction.style.display = "none";
    }

}

