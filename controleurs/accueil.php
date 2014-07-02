<?php

//test..
include_once('./modeles/Modele.class.php');

try {
    $bdd = BD::getInstance("eureka", "dbconnect");
    
    
    if (!$bdd) {
        throw new Exception("Connexion Impossible à la base de données : " . HOST);
    }


    // ce que la methode du modele retourn
    $monArticle = $bdd->get_article_acceuil();
    $artPopulaire = $bdd->get_article_populaire();
    
    // filtrer le resultat retourné afin de l'envoyer a la vue(acceuil)
    for ($i = 0; $i < count($monArticle); $i++) {
        
        // mettre chaque resultat dans un tableau quis sera envoyer a chaque itération
        $titre[$i]   = $monArticle[$i]['article_titre'];
        $contenu[$i] = $monArticle[$i]['article_contenu'];
        $image[$i]   = $monArticle[$i]['art_image'];
        
    }
    //
    for ($i = 0; $i < count($artPopulaire); $i++) {
        
        // mettre chaque resultat dans un tableau quis sera envoyer a chaque itération
           $titreArtPopul[$i] = $artPopulaire[$i]['article_titre'];
           $contenuArtPopul[$i] = $artPopulaire[$i]['article_contenu'];
        //$imageArtPopul[$i]   = $artPopulaire[$i]['art_image'];
        
    }
    // fonction qui coupe le texte
    function coupeChaineArticle($chaine, $nbMaxCaracteres = 150) {
        
        if (strlen($chaine) > $nbMaxCaracteres) {
           
            while ($chaine{$nbMaxCaracteres} != ' ') {
              $nbMaxCaracteres++;
            }
            return substr($chaine, 0, $nbMaxCaracteres);
        }
        else {
            return $chaine;
        }
    }
    function coupeChaineTitrePopul($chaine, $nbMaxCaracteres = 62) {
        
        if (strlen($chaine) > $nbMaxCaracteres) {
           
            while ($chaine{$nbMaxCaracteres} != ' ') {
              $nbMaxCaracteres++;
            }
            return substr($chaine, 0, $nbMaxCaracteres);
        }
        else {
            return $chaine;
        }
    }


        if(isSet($_POST['like'])){
        
            $like=$_POST['like'];
            return $like;
           
        }
    
    
    
    
    include_once('./vues/content/accueil.php');
    
}
catch (Exception $e) {
    echo $e->getMessage();
}



?>




