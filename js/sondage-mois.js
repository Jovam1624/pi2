//<![CDATA[
	
		$(document).ready(function(){    
          
			$('#sondage-mois').click(function(evt) {
								
				var sondage = $('input[type=radio][name=sondage]:checked').attr('value'); //récuperation des boutons radios
				console.log(sondage);
				
				// Objet Ajax pour envoyer la valeur du sondage radio 
				$.ajax({
                     url: './ajaxControler.php',
                     type: 'POST',
                     data: {
                    //la valeur du champ numéro du dossier
                     //nArticle: parseInt(numeroArticle.value),
                     sondage: sondage
                     },
					success: function(html) //si la requête a été exécutée avec succès
					{ 
                     console.log('ok'); 
					}
				});
				
				//JQuery qui cache les classes pour afficher les résultats du sondage après le vote
				$('.form').addClass( "form-sondage" );
				$('.graphe').addClass( "graphe-sondage" );

				//JQuery qui affiche les résultats du sondage après le vote
				$(".chargement").each(function(index, element) {
				var pourcentage = parseInt($(element).text()); 
				$('#spinner').addClass( "icon-spinner" ).fadeIn(3000);
				$('#spinner').addClass( "icon-spinner" ).fadeTo(2900,0);
				$('#spinner').addClass( "icon-spinner-rotation" );
				//$('#spinner').removeClass( "icon-spinner" );
				$(element).html('<div class="loading"></div>');
				$(element).find('.loading').css({"width":"0px",
                                           "float":"left",
                                           "background-color":"#428BCA",
                                           "color":"white",
                                           "text-align":"center",
                                           "height":"100%"});
                                           
				// Anime l'affichage des résultats du graphique
				$(element).find('.loading').delay(1500).animate({width:($(this).width() * pourcentage) /100},500);
 
                // Ajoute le % dans le graphique     
				if (pourcentage > 12) $(element).find('.loading').html('<span>'+ pourcentage +'%</span>'); 
             										   
													
				});
				
				
			});
         });
	 // ]]>