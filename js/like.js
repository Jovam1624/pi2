 //<![CDATA[
        // Appelle le gestionnaire d'évènements pour les éléments du dom

        window.addEventListener("load", function(){
             
             var lesLikes = document.getElementsByClassName("glyphicon-thumbs-up"); 
             var lireLaSuite = document.getElementsByClassName("consultez"); 
			 
            for (var i = 0; i < lesLikes.length; i++) {
                lesLikes[i].addEventListener("click", envoi, true);
                
            }
            for (var i = 0; i < lireLaSuite.length; i++) {
                lireLaSuite[i].addEventListener("click", envoiNbrVues, true);
                
            }

        });

        // Fonction pour envoyer le nombre de vues dans la BD
        function envoiNbrVues(evt){
        
            
            var liens = evt.currentTarget;
            var comment = liens.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling;
			var vues = comment.previousSibling.previousSibling.previousSibling.firstChild.nextSibling;
			
			var attriLien = liens.getAttribute('href');
			 
            var nArticle = attriLien.substring(attriLien.indexOf('id')+3); //extraction de la valeur du bouton "consulter"
            
            //objet Ajax qui envoie le numero d'article et le nombre de vues dans le controleur Ajax
            $.ajax({
                     url: './ajaxControler.php',
                     type: 'POST',
                     data: {
                   
                     nArticle: parseInt(nArticle),
                     nbrVues: parseFloat(vues.value)+parseFloat(1) //incrémentation 
                     },

            });

        }
        // Fonction pour envoyer le nombre de likes dans la BD
        function envoi(evt){
            var verifLike = document.getElementById("verifLike");
                verifLike = verifLike.value;
           	var nbrLike = evt.currentTarget.parentNode.previousSibling.previousSibling;
                evt.currentTarget.setAttribute("class", "glyphicon glyphicon-thumbs-up thumbs-up-desactive");
           	
          	var numeroArticle = nbrLike.previousSibling.previousSibling;
               
        	var lesLikes = document.getElementsByClassName("glyphicon-thumbs-up");
            for (var i = 0; i < lesLikes.length; i++) {
                    
                    lesLikes[i].removeEventListener("click", envoi, false);
                
                                
            }
            if(verifLike == 1){
                //evt.currentTarget.className = "dectiver";

            }
             
            // Objet Ajax qui envoie le numéro d'article et de likes dans le contrôleur Ajax
            $.ajax({
                url: './ajaxControler.php',
                type: 'POST',
                data: {
                   
                numeroArticle: parseInt(numeroArticle.value),
                      
                like: parseFloat(nbrLike.value)+parseFloat(1)//incrémentation
                },
                    
                      
            });
            var NouveauLike = parseFloat(nbrLike.value)+parseFloat(1);
            nbrLike.value = NouveauLike;
        }

// ]]>