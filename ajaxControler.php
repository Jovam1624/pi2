<?php
session_start();
/**
 * Controlleur AJAX. Ce fichier est la porte d'entrée des requêtes AJAX (XHR)
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-03-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

	require_once("./config.php");	
		$_SESSION['like'] = 0;
	  // nombre likes 
	   if(isSet($_POST['like']) 
		   	&& isSet($_POST['numeroArticle']))
	   {
	   	 $nbrLike = $_POST['like'];
         $numeroArticle = $_POST['numeroArticle'];
	     $_SESSION['like'] = 1;
	   	 // instancier l'objet acceuil et invoquer les methode aproprier
	     $bdd = Accueil::getInstance("e1395254", "dbconnect");
	     $bdd->setSondage($nbrLike,$numeroArticle);
		 

	   }
	   // nombre vues
	    if(isSet($_POST['nArticle']) && isSet($_POST['nbrVues']))
	   {
	   	 $nArticle = $_POST['nArticle'];
         $nbrVues = $_POST['nbrVues'];


	   	 // instancier l'objet acceuil et invoquer les methode aproprier
	     $bdd = Accueil::getInstance("e1395254", "dbconnect");
	     $bdd->setNbrVues($nbrVues,$nArticle);

	   }
	   if(isSet($_POST['sondage']))
	   {
	   		
	   		$sondage = $_POST['sondage'];
	   		$bdd = Accueil::getInstance("e1395254", "dbconnect");
	        $bdd->setSondageMois($sondage,$nBtnRadio= $sondage-1);
	        $bdd->getCookieSondageMois();
	   }
	   // partie forum
	   if(isSet($_POST['nom']) 
		   	&& isSet($_POST['courriel']) 
		   	&& isSet($_POST['message']))
	   {	   	 
	   	 /// variable du forum ///	   	   
	     $nom = $_POST['nom'];
	     $courriel = $_POST['courriel'];
	     $message = $_POST['message'];
	   	 /// invoquer la methode setCommentaire dans le modele ///
		 $bdd2  = Forum::getInstance("e1395254", "dbconnect");
		 $bdd2->setCommentaire($nom,$courriel,$message);

	   }
	   // partie inscription pour nom utilisateur
	   if(isSet($_POST['pseudo'])){
	   	 $pseudo = $_POST['pseudo'];
		 $bdd3  = Inscription::getInstance("e1395254", "dbconnect");
		 $bdd3->getPseudo($pseudo);
		
		}
	    // fin partie inscription user
	    // partie inscription pour email
	   if(isSet($_POST['email'])){
	   	 $email = $_POST['email'];
		 $bdd  = Inscription::getInstance("e1395254", "dbconnect");
		 $bdd->getEmail($email);
		
		}
	    // fin partie inscription email

      
   
?>