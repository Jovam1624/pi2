//<![CDATA[
	// le scroll top , pour retourner en haut de la page
		$(document).ready(function(){    
          
			$('.commentaire').click(function(evt) {
				
				
				var nom = $('#nom').val();
				var courriel = $('#courriel').val();
				var message = $('#message').val();
				
				$.ajax({
                     url: './ajaxControler.php',
                     type: 'POST',
                     data: {
                  
                      nom : nom,
					  courriel : courriel,
					  message : message
                     },
					success: function(html) 
					{ 
                     //console.log('ok'); 
					}
				});	
				
				  //$('.affichage-comment').html('wewwe');
				  // $('.msg-confirmation').html('message envoyé');

				//$('.graphe').addClass( "graphe-sondage" );
				//$(".chargement").each(function(index, element) {
				
				
                     
				
				
				
			});
         });
	 // ]]>