document.cookie= "servchoix=aucun;SameSite=Lax;";

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
            choixStat.style.display = "flex";
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

function fCookie(valeur,lecookie) {
    //console.log(lecookie);
    document.cookie= "servchoix="+valeur+";SameSite=Lax;";
    //window.location.reload();
}

