// Bloc qui fait la verification des formulaires 
// Pas encore actif dans la version beta


/*if(document.getElementById('boutonInv')){
    document.getElementById("boutonInv").addEventListener("click", valideFrom,false);
} else if (document.getElementById("boutonPhi")) {    
    document.getElementById("boutonPhi").addEventListener("click", valideFrom,false);
}

// fonction qui valide le champ nom
function valideNom(){
	var verif = document.getElementById("UserName").value;
    var valide = /^[A-Z][a-z]+$/;
    if(valide.test(verif) == false || verif == "") {
	   var erreur = false;
	}
	return erreur;
}	

function validePrenom(){
	var verif = document.getElementById("UserLastName").value;
    var valide = /^[A-Z][a-z]+$/;
    if(valide.test(verif) == false || verif == "") {
	   var erreur = false;
	}
	return erreur;
}

function valideEmail(){
	var verif = document.getElementById("exampleInputEmail1").value;
    var valide = /^[\w\.]*\w@\w[\w\.]*\.\w{2,4}$/;
    if(valide.test(verif) == false || verif == "") {
	   var erreur = false;
	}
	return erreur;
}

function validePassword(){
	var verif = document.getElementById("exampleInputPassword1").value;
    var valide = /^A-ZÉa-z0-9_éçêèô]{7}$/;
    if(valide.test(verif) == false || verif == "") {
	   var erreur = false;
	}
	return erreur;
}

// Fonction qui récupère l'erreur et affiche la bordure en rouge

function valideFrom(){
    if(valideNom()==false){
        document.getElementById("UserName").focus(); 
		document.getElementById("UserName").select();
        document.getElementById("UserName").className+=" erreur"; 
    } else if (validePrenom()==false){
        document.getElementById("UserLastName").focus(); 
		document.getElementById("UserLastName").select();
        document.getElementById("UserLastName").className+=" erreur"; 
    } else if (valideEmail()==false){
        document.getElementById("exampleInputEmail1").focus(); 
		document.getElementById("exampleInputEmail1").select();
        document.getElementById("exampleInputEmail1").className+=" erreur"; 
    } else if (validePassword()==false){
        document.getElementById("exampleInputPassword1").focus(); 
		document.getElementById("exampleInputPassword1").select();
        document.getElementById("exampleInputPassword1").className+=" erreur"; 
    }
     
}  */

 window.addEventListener("load", function(){
             
            var alias = document.getElementById("alias"); 
            var courriel = document.getElementById("email"); 
             //alias.addEventListener("click", testUser, true);
            //console.log(courriel);

        });
        

         var verif = {

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
                     alias: $('#alias').val()
                    //courriel: $('#email').val() 
                 },

                 // succes c'est la fonction qui va recevoir l'objet ajax (la réponse)
                  success: function(msg){ 
                        if(msg == 'ok'){ 
                              
							console.log('ce pseudo existe');
							$("#alias").addClass("object_ok");							
                             //$("#ifexist").removeClass('nbr_error');
                             //$("#ifexist").addClass("object_ok");
                             //$(this).html('&nbsp;<img src="../images/tick.gif">');
                         } else {
							console.log('ce pseudo n\'existe pas');
                            // $("#ifexist").removeClass('object_ok'); 
                            // $("#ifexist").addClass("nbr_error");
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
             verifEmail: function () {
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
		 
		 	 
		 
         // fonction qui controle si l'utilisateur est entrain d'ecrire
         $(function () {

         
             $('#alias').keyup(function (e) {
             verif.pile++; 
             
             window.setTimeout('verif.verif()', 500); // chaque 1/5 une requette va etre envoyer
             
             
             })
    		 
    		
             
             $('#email').keyup(function (e) {
             verifEmail.pile++; 
             
             window.setTimeout('verifEmail.verifEmail()', 500); // chaque 1/5 une requette va etre envoyer
             
             
             })
        });


