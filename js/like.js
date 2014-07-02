 //<![CDATA[
        window.addEventListener("load", function(){
            
             var lesLikes = document.getElementsByClassName("glyphicon-thumbs-up"); 

            for (var i = 0; i < lesLikes.length; i++) {
                lesLikes[i].addEventListener("click", envoi, true);
                
            }

        });

        function envoi(evt){

            //evt.currentTarget.setAttribute("disabled","disabled");
            var leInput = evt.currentTarget.parentNode.previousSibling.previousSibling;
                evt.currentTarget.setAttribute("class", "glyphicon glyphicon-thumbs-up thumbs-up-desactive");
                
            var lesLikes = document.getElementsByClassName("glyphicon-thumbs-up");
            for (var i = 0; i < lesLikes.length; i++) {
                lesLikes[i].removeEventListener("click", envoi, false);
                
            }
                $.ajax({
                     url: "./controleurs/accueil.php",
                     type: 'POST',
                     data: {
                     // la valeur de chaque champ input
                      
                      like: parseInt(leInput.value)+1
                      
                     },
                });

        }

// ]]>