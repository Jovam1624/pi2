<?php

/**
 * COURS : Projet d'intégration II 
 * PROF.: Jonathan Martel
 * @author Équipe 3 :  Ait Hadji, Bretoux, Dubreuil, Fernandez Diaz, Tremblay
 * @reference Jonathan Martel - https://github.com/JonathanMartel/simpleMVCStructure
 * @version Beta

 * 
 */
	require_once("./config.php");	
	


	// Récuperer les valeurs retournées par l'objet Ajax
     $nbrLike = $_POST['like'];
     $numeroArticle = $_POST['numeroArticle'];
	 $nArticle = $_POST['nArticle'];
     $nbrVues = $_POST['nbrVues'];
	 
	/// variable du forum ///
	 
	   $nom = $_POST['nom'];
	   $courriel = $_POST['courriel'];
	   $message = $_POST['message']; 
      
	 // Récuperer l'adresse mac de la machine
	 // ob_start pour la temporisation
	 // Pas encore actif pour la version  beta

     ob_start();
	 system("ipconfig /all");
	 $moncom=ob_get_contents();
	 ob_clean();
	 $findme = "physique";
	 $pmac = strpos($moncom, $findme);
	 $mac=substr($moncom,($pmac+36),17);
	 if($mac != 0)
		{
		echo 'ok';


		}
		else
		{
		echo "non";

		}

	 // Instancier l'objet accueil et invoquer les méthodes appropriées

     $bdd = Accueil::getInstance("e1395254", "dbconnect");

     // Arppelle les fonctions du modele accueil pour gérer les likes et 
     // le nombre de vue sur chaque article
     $bdd->setSondage($nbrLike,$numeroArticle);
	 $bdd->setNbrVues($nbrVues,$nArticle);
	 // rajouter par A.A  le 09-06-2014 a 12:20
	 /// invoquer la methode setCommentaire dans le modele ///
	 $bdd2  = Forum::getInstance("e1395254", "dbconnect");
	 $bdd2->setCommentaire($nom,$courriel,$message);
   

?>