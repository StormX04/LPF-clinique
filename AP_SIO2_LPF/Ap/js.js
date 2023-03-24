//var essaie = document.getElementById("code");
var nbr= (Math.floor(Math.random() * 10000) + 10000).toString().substring(1);
console.log(nbr);
//essaie.innerHTML = nbr;

window.onload = function() {
   var essaie = document.getElementById("code");
   essaie.innerHTML = nbr;
}
