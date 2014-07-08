//<![CDATA[
	
	// le bouton dans le pied de page (scroll top), pour retourner en haut de la page
		$(document).ready(function(){    
         
			$('.btn-retour').click(function() {
				$("html, body").animate({ scrollTop: 0 }, "slow");
				return false;
			});
         });
	 // ]]>