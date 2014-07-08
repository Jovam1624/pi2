<?php
/**
 * COURS : Projet d'intégration II 
 * PROF.: Jonathan Martel
 * @author Équipe 3 :  Ait Hadji, Bretoux, Dubreuil, Fernandez Diaz, Tremblay
 * @reference Jonathan Martel - https://github.com/JonathanMartel/simpleMVCStructure
 * @version Beta
 * 
 */
	function mon_autoloader($class) 
	{
		$dossierClasse = array('modeles/', 'vues/', 'lib/', 'controleur/', '' );	
		
		foreach ($dossierClasse as $dossier) 
		{
			
			if(file_exists('./'.$dossier.$class.'.class.php'))
			{
				require_once('./'.$dossier.$class.'.class.php');

			}
		}
	  
	}
	
	spl_autoload_register('mon_autoloader');
	
 	// Affiche les dates (entre autres) en français
	setlocale(LC_ALL, 'fr_FR');
	
?>