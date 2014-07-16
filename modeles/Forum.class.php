<?php
/**
 * @Class Forum
 * ************
 * @author Équipe3
 * @version beta
 * 
 */
class Forum {
    // déclaration des variables
    private static $instance = null;
    private $idbd;
    private $forumCommentairesBillets;
    private $forumBillets;
    private $tabMeta = array('title' => 'page forum-journal d\'idées Eureka inventions 2014' , 'keywords' => 'forum,blog,inventions,idées,2014', 
                            'description' => 'pages forum-plate-forme pour partager, financer, publier et commenter de nouvelles inventions brefetées ou non - inventions en 2014');
    
 	   
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
            self::$instance = new Forum($base, $param);
        }
        return self::$instance;
    }
    
    // 
    public function getBD()
    {
        return $this->idbd;
    }
     //fonction qui va chercher le tableau de meta et title 
      public function getMeta(){
        return $this->tabMeta;
    }
    /********************************************
     * @fonction pour aller chercher les comments
     */
    
     public function getForumCommentairesBillets($id){
        $requetesComments =$this->idbd->query("SELECT * FROM comment_billet where billet_ID = '".$id."'");
        
        if (!$requetesComments) {
                  
            // throw new Exception("Resultat introuvable sur le serveur : " . HOST);
             return array();
        } else {
            $this->forumCommentairesBillets = Array();           
            while ($commentaires = $requetesComments->fetch(PDO::FETCH_ASSOC)) {
                $mesCommentaires[]     = $commentaires;
                $this->forumCommentairesBillets = $mesCommentaires;
                //var_dump($mesCommentaires);
            }
            return $this->forumCommentairesBillets;
        }
    }
    //************************************
    public function getTousCommentairesBillets(){
        $requetesComments =$this->idbd->query("SELECT * FROM comment_billet");
        
        if (!$requetesComments) {
                  
            throw new Exception("Résultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($commentaires = $requetesComments->fetch(PDO::FETCH_ASSOC)) {
                $mesCommentaires[]     = $commentaires;
                $this->forumCommentairesBillets = $mesCommentaires;
                //var_dump($mesCommentaires);
            }
            return $this->forumCommentairesBillets;
        }
    }
    //************************************
    public function getTousForumBillets(){
        $requetesTousBillets =$this->idbd->query("SELECT * FROM billets");
        
        if (!$requetesTousBillets) {
                  
            throw new Exception("Résultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($posts = $requetesTousBillets->fetch(PDO::FETCH_ASSOC)) {
                $mesPosts[]     = $posts;
                $this->forumBillets = $mesPosts;
             
            }
            return $this->forumBillets;
        }
    }

    public function getForumBillets($id){
        $requetesBillets =$this->idbd->query("SELECT * FROM billets where billet_ID = '".$id."'");
        
        if (!$requetesBillets) {
                  
            throw new Exception("Résultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($post = $requetesBillets->fetch(PDO::FETCH_ASSOC)) {
                $monPost[] = $post;
                $this->forumBillets = $monPost;
                //var_dump($mesCommentaires);
            }
            return $this->forumBillets;
        }
    }
    //  rajouter par A.A le 09-06-2014 a 12:19
   public function setCommentaire($nom,$courriel,$message){
    
        $requete = "INSERT INTO comment_billet VALUES ('','1','".$nom."','".$courriel."','titre_par_defaut','".$message."','CURRENT_TIMESTAMP','1','1')";
        
        $nb = $this->getBD()->exec($requete);
    
    
    
    }
}
