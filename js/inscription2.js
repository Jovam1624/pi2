 //<![CDATA[
        window.addEventListener("load", function(){
             
             var pseudo = document.getElementById("pseudo"); 
            
                 //pseudo.addEventListener("click", testUser, true);
           

        });
        
        // verif pour nom utilisateur
         var verifUtilisateur = {

         pile: 0,
         verif: function () {
         this.pile--;
         if (this.pile == 0) {

            // l'envoi de la variable numéro du dossier
             $.ajax({
                
                // la page qui va effectuer la requette 
                 url: './ajaxControler.php',
                 type: 'POST',
                 data: {
                    //la valeur du champ numéro du dossier
                     pseudo: $('#pseudo').val() 
                 },
                    success: function(msg){ 
                        if(msg == 'ok')
                        { 
                            console.log('ce pseudo existe');
                            //$("#username").removeClass('object_error'); // if necessary
                            $("#pseudo").addClass("object_ok");
                           // $(this).html('&nbsp;<img src="tick.gif" align="absmiddle">');
                        }  
                        else  
                        {  
                            console.log('ce pseudo n\'existe pas');
                            //$("#username").removeClass('object_ok'); // if necessary
                            //$("#username").addClass("object_error");
                            //$(this).html(msg);
                        }  
                       
                      

                     } 
         
         
             });
         
         }
         
         }
         
         }

         // verif pour l'email

          var verifEmail = {

         pile: 0,
         verif: function () {
         this.pile--;
         if (this.pile == 0) {

            // l'envoi de la variable numéro du dossier
             $.ajax({
                
                // la page qui va effectuer la requette 
                 url: './ajaxControler.php',
                 type: 'POST',
                 data: {
                    //la valeur du champ numéro du dossier
                     email: $('#email').val() 
                 },

                    success: function(msg){  

                        if(msg == 'true')
                        { 
                            
                            console.log('cette email existe dèja');
                            //$("#username").removeClass('object_error'); // if necessary
                            $("#email").addClass("object_ok");
                           // $(this).html('&nbsp;<img src="tick.gif" align="absmiddle">');
                        }  
                        else  
                        {  
                            console.log('cette email n\'existe pas');
                            //$("#username").removeClass('object_ok'); // if necessary
                            //$("#username").addClass("object_error");
                            //$(this).html(msg);
                        }  
                       
                      

                     } 
         
         
             });
         
         }
         
         }
         
         }
         /////
         // fonction qui controle si l'utilisateur est entrain d'ecrire
         $(function () {
         
         $('#pseudo').keyup(function (e) {
         verifUtilisateur.pile++; 
         
         window.setTimeout('verifUtilisateur.verif()', 500); // chaque 1/5 une requette va etre envoyer
         
         
         })
         $('#email').keyup(function (e) {
         verifEmail.pile++; 
         
         window.setTimeout('verifEmail.verif()', 500); // chaque 1/5 une requette va etre envoyer
         
         
         })

         
         });
       

// ]]>