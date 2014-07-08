<?php
  /**
   * Assignation des variables avec les isset() ou !empty()
   */
   
   
	if(empty($_GET['p']))
	{
		$_GET['p'] = '';
	}
    
	
	if(empty($_GET['id']))
	{
		$_GET['id'] = '';
	}
	
   	if(empty($_GET['cat']))
	{
		$_GET['cat'] = 1; 	// Afficher la catégorie 'santé' par défaut
	}

     // Nom de la catégorie active
     if(empty($_GET['catNom']))
	{
		$_GET['catNom'] = 'Non définie';
	}
   
?>