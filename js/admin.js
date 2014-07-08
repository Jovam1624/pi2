// Bloc qui fait apparaitre la bonne section de la page admin
// Pas encore fonctionnel 

var affiche = document.getElementsByTagName("main")
document.getElementById('membre').addEventListener('click', afficheGestionMembre, false);

function afficheGestionMembre(){
    //console.log(affiche[0]);
    affiche[0].className = "";
}