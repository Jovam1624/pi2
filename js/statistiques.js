/**
  * Fichier js qui gère le bouton like et autre boutons
  * ****************************************************
  * Author Équipe 3 

  *
  */

    
$(function() {

  // Génère les boutons nécessaires de bootstrap
  $(".thumbs-up").append('<span class="inc button"><span class="glyphicon glyphicon-thumbs-up"></span></span>');
  $(".eye-open").append('<span class="inc "><span class="glyphicon glyphicon-eye-open"></span></span>');
  $(".comment").append('<span class="inc "><span class="glyphicon glyphicon-comment"></span></span>');
  
  // Met tous les "like" dans une variable
  var recompense = $(".like").val();
  
        // Le switch qui va attribuer une médaille selon le like
        // Pas actif à 100% dans la version beta
        switch (recompense) {

        	case 0:
            	recompense < 50;
             	$(".star").append('<span class="inc "><img src="./img/medaille-bronze.png" alt="medaille bronze">');
              	console.log('bronze');
			  	break;
          	case 1:
              	recompense > 50;
                $(".star").append('<span class="inc "><img src="./img/medaille-or.png" alt="medaille or">');
              	console.log('or');
			  	break;
          	case 2:
             	recompense > 100;
              	$(".star").append('<span class="inc "><img src="./img/medaille-diamon.png" alt="medaille diamon">');
              	break;

          	default:
              	$(".star").append('<span class="inc "><img src="./img/aucune-medaille.png" alt="aucune medaille">');
         
      } 
    
  	// Quand on clicke sur thumbs-up (le like)
  	// Pas actif dans la version beta
  	$(".button").on("click", function() {
  	
    // Le like courant (selon l'article "actif")
    var $button = $(this);
    
    // Chercher et met la valeur de l'input courant dans valeur
    
    var valeur = $button.parent().find("input").val();
    
    // si le contenu du 2eme span est vide (aucun node texte)
    if ($button.text() == "") {
    
  	} 
   
  });

});