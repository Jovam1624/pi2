//<![CDATA[
	// le scroll top , pour retourner en haut de la page
		$(document).ready(function(){    
          
			$('.commentaire').click(function(evt) {
				
				var id_article = $('.champ-hidden').val();
				var nom = $('#nom').val();
				var courriel = $('#courriel').val();
				var message = $('#message').val();
				
				$.ajax({
                     url: './ajaxControler.php',
                     type: 'POST',
                     data: {
                  	  id : id_article,
                      nom : nom,
					  courriel : courriel,
					  message : message
                     },

					success: function(html) 
					{ 
                     console.log('ok'); 
                    
                      
					}
				});	
				 $( ".message" ).addClass( "msg-confirmation" ).html('message envoyé avec succès');
				 $( ".message" ).fadeIn(3000); 
				 $(".message").fadeTo(2500,0);
					
				
				  //$('.message').html(message envoyé);
				  $('.affichage-comment').last().html(message);

				  // $('.msg-confirmation').html('message envoyé');

				//$('.graphe').addClass( "graphe-sondage" );
				//$(".chargement").each(function(index, element) {
				
				
                     
				
				
				
			});
         });
	 // ]]>