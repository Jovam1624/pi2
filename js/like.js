 //<![CDATA[
 // Appelle le gestionnaire d'évènements pour les éléments du dom
 window.addEventListener("load", function () {
     // mettre tous les bouton like et les mettres dans une variable
     var lesLikes = document.getElementsByClassName("glyphicon-thumbs-up");
     // mettre tous les bouton consultez de chaque article dans une var..
     var lireLaSuite = document.getElementsByClassName("consultez");
     // mettre l'ip de la connexion dans une variable
     var monIp = document.getElementById("ip").value;
     // parcourrir les bouton like un par un et ajouter un evenement
     for (var i = 0; i < lesLikes.length; i++) {
         lesLikes[i].addEventListener("click", envoi, true);

     }
     // parcourrir les bouton lire la suite de chaque article et ajouter un evenement
     for (var i = 0; i < lireLaSuite.length; i++) {
         lireLaSuite[i].addEventListener("mouseover", envoiNbrVues, true);

     }
 });

 // Fonction pour envoyer le nombre de vues dans la BD
 function envoiNbrVues(evt) {

         // le lien courant de l'article courant
         var liens = evt.currentTarget;
         // l'icone commentaire juste a coter du bouton consultez
         var comment = liens.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling;
         // l'icone vue
         var vues = comment.previousSibling.previousSibling.previousSibling.firstChild.nextSibling;
         // le contenu de l'attribut href de chaque lien consultez
         var attriLien = liens.getAttribute('href');
         // extraire le id de l'article qui se trouve dans le lien (le get du lien)
         var nArticle = attriLien.substring(attriLien.indexOf('id') + 3); //extraction de la valeur du bouton "consulter"

         //objet Ajax qui envoie le numero d'article et le nombre de vues dans le controleur Ajax
         $.ajax({
             url: './ajaxControler.php',
             type: 'POST',
             data: {

                 nArticle: parseInt(nArticle),
                 nbrVues: parseFloat(vues.value) + parseFloat(1) //incrémentation 
             },

         });

     } 

 // Fonction pour envoyer le nombre de likes dans la BD

 function envoi(evt) {
     //le bouton like
     var verifLike = document.getElementById("verifLike");
     // le value du bouton like
     verifLike = verifLike.value;
     // le numero du like de l'article
     var nbrLike = evt.currentTarget.parentNode.previousSibling.previousSibling;
     evt.currentTarget.setAttribute("class", "glyphicon glyphicon-thumbs-up thumbs-up-desactive");
     // le numero de l'article 
     var numeroArticle = nbrLike.previousSibling.previousSibling;
     // tous les likes de tous les articles
     var lesLikes = document.getElementsByClassName("glyphicon-thumbs-up");
     // pour enlever l'evenement 
     for (var i = 0; i < lesLikes.length; i++) {

         lesLikes[i].removeEventListener("click", envoi, false);


     }
     // partie teste a ne pas prendre en consideration ce teste
     if (verifLike == 1) {
         //evt.currentTarget.className = "dectiver";

     }

     // Objet Ajax qui envoie le numéro d'article et de likes dans le contrôleur Ajax
     $.ajax({
         url: './ajaxControler.php',
         type: 'POST',
         data: {

             numeroArticle: parseInt(numeroArticle.value),

             like: parseFloat(nbrLike.value) + parseFloat(1) //incrémentation
         },


     });
     /* pour mettre le resultat de l'incrementation dans le dom en attendant que
        l'incrementation soit reelement mis dans la base de donnée*/

     var NouveauLike = parseFloat(nbrLike.value) + parseFloat(1);
     nbrLike.value = NouveauLike;
 }

 // ]]>