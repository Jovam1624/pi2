//<![CDATA[
	
		$(document).ready(function(){    
          
			$('.consultez').mouseover(function(evt) {
				
				console.log('consultez');


	var leIdPopUp = $(this).attr('rel'); 
	var leUrlPopUp = $(this).attr('href'); 

	
	var query= leUrlPopUp.split('?');
	var dim= query[1].split('&amp;');
	var popWidth = dim[0].split('=')[1]; 

	
	$('#' + leIdPopUp).fadeIn().css({
		'width': Number(popWidth)
	})
	.prepend('<a href="#" class="close"><img src="./img/accueil/fermer_pop_up.png" class="btn_close" title="Fermer" alt="Fermer" /></a>');

	
	var popMargTop = ($('#' + leIdPopUp).height() + 80) / 2;
	var popMargLeft = ($('#' + leIdPopUp).width() + 80) / 2;

	
	$('#' + leIdPopUp).css({
		'margin-top' : -popMargTop,
		'margin-left' : -popMargLeft
	});

	
	$('body').append('<div id="fade"></div>'); 
	
	$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();

	return false;
});


$('a.close, #fade').mouseover('click', function() { 
	console.log('fermeture');
	$('#fade , .le_pop_up').fadeOut(function() {
		$('#fade, a.close').remove();  
	});
	return false;
});

				
			
         });
	 // ]]>