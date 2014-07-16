//<![CDATA[
	
		window.addEventListener("load", function(){
             
             var btnSondageAdmin = document.getElementsByClassName("glyphicon"); 
             
			 
            for (var i = 0; i < btnSondageAdmin.length; i++) {
                btnSondageAdmin[i].addEventListener("click", sondage, true);
                
            }
         function sondage(evt){

         	console.log(evt.parent);

         }   

        });
	 // ]]>