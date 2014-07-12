<?php
/**
 * Class Modele
 * 
 * @author 
 * @version 1.0
 * @update 2013-05-27 
 */
class Accueil

{
    
    private static $instance = null;
    private $idbd;
    private $monArticle;
    private $monArtPopulaire;
 	   
 	public function __construct($base, $param) {
        require_once($param.".inc.php");
		$data="mysql:host=".HOST.";dbname=".$base.";charset=utf8";
		$user=USER;
		$pass=PASS;
		try{
			return $this->idbd = new PDO($data,$user,$pass);
			
		} catch(PDOException $pdoe){
			echo "echec de la connexion : ",$pdoe->getMessage();
			return false;
			exit();
		}
	}
    // fonction qui va servir pour instancier cette classe 
    public static function getInstance($base, $param)
    {
        if (is_null(self::$instance)) {
            self::$instance = new Accueil($base, $param);
        }
        return self::$instance;
    }
    
    public function getBD()
    {
        return $this->idbd;
    }
     public function getMonarticle()
    {
        return $this->monarticle;
    }
    public function get_article_acceuil(){
        
        $req =$this->idbd->query("SELECT *FROM articles LIMIT 0,06");

        if (!$req) {
                  
            throw new Exception("Resultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
                $monArticle[]     = $article;
                $this->monArticle = $monArticle;
            }
            
        }
        
	    // filtrer le resultat retourné afin de l'envoyer a la vue(acceuil)
	    /*for ($i = 0; $i < count($this->monArticle); $i++) {
	        
	        // mettre chaque resultat dans un tableau quis sera envoyer a chaque itération

	        $titre[$i]   = $this->monArticle[$i]['article_titre'];
	        $contenu[$i] = $this->monArticle[$i]['article_contenu'];
	        $image[$i]   = $this->monArticle[$i]['art_image'];
	    }*/
       	return $this->monArticle;
           
    }

    public function get_article_populaire(){
        
        $reqArtPopul =$this->idbd->query("SELECT *FROM articles WHERE art_nb_vues > 0 LIMIT 0,04");
        
        
        if (!$reqArtPopul) {
            
            
            throw new Exception("Resultat introuvable sur le serveur : " . HOST);
            
        } else {
            
            while ($artPopulaire = $reqArtPopul->fetch(PDO::FETCH_ASSOC)) {
                    $monArtPopulaire[]     = $artPopulaire;
                    $this->monArtPopulaire = $monArtPopulaire;
            }
            
        }
       

	    /*
	    for ($i = 0; $i < count($artPopulaire); $i++) {
	        
	        // mettre chaque resultat dans un tableau quis sera envoyer a chaque itération
	           $titreArtPopul[$i] = $artPopulaire[$i]['article_titre'];
	           $contenuArtPopul[$i] = $artPopulaire[$i]['article_contenu'];
	        //$imageArtPopul[$i]   = $artPopulaire[$i]['art_image'];
	        
	    }*/

        return $this->monArtPopulaire;
        
   
    
    }
    
    
    public function setSondage($like,$numeroArticle){
        
       $requete = "UPDATE articles SET art_nb_likes='".$like."' WHERE article_ID='".$numeroArticle."'";
       $nb = $this->getBD()->exec($requete);
                                                                                                                                                                    

    } 
	public function setComment($valVues){
        
        $requete = "UPDATE articles SET art_nb_vues='".$valVues."' WHERE article_ID='".$numeroArticle."'";
        $nb = $this->getBD()->exec($requete);
                                                                                                                                                                     

    }  
   		
   		
    
    
}
?>