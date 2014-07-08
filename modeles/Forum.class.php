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
    private $forumComments;
    private $forumPosts;
    
 	   
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
    
    /********************************************
     * @fonction pour aller chercher les comments
     */
    
    public function getForumComments($id){
        $requetesComments =$this->idbd->query("SELECT * FROM comment_billet where billet_ID = '".$id."'");
        
        if (!$requetesComments) {
                  
            // throw new Exception("Resultat introuvable sur le serveur : " . HOST);
             return array();
        } else {
            $this->forumComments = Array();           
            while ($commentaires = $requetesComments->fetch(PDO::FETCH_ASSOC)) {
                $mesCommentaires[]     = $commentaires;
                $this->forumComments = $mesCommentaires;
                //var_dump($mesCommentaires);
            }
            return $this->forumComments;
        }
    }
    //************************************
    public function getAllForumComments(){
        $requetesComments =$this->idbd->query("SELECT * FROM comment_billet");
        
        if (!$requetesComments) {
                  
            throw new Exception("Résultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($commentaires = $requetesComments->fetch(PDO::FETCH_ASSOC)) {
                $mesCommentaires[]     = $commentaires;
                $this->forumComments = $mesCommentaires;
                //var_dump($mesCommentaires);
            }
            return $this->forumComments;
        }
    }
	//************************************
    public function getAllForumPosts(){
        $requetesPosts =$this->idbd->query("SELECT * FROM billets");
        
        if (!$requetesPosts) {
                  
            throw new Exception("Résultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($posts = $requetesPosts->fetch(PDO::FETCH_ASSOC)) {
                $mesPosts[]     = $posts;
                $this->forumPosts = $mesPosts;
             
            }
            return $this->forumPosts;
        }
    }

    public function getForumPost($id){
        $requetesPost =$this->idbd->query("SELECT * FROM billets where billet_ID = '".$id."'");
        
        if (!$requetesPost) {
                  
            throw new Exception("Résultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($post = $requetesPost->fetch(PDO::FETCH_ASSOC)) {
                $monPost[] = $post;
                $this->forumPosts = $monPost;
                //var_dump($mesCommentaires);
            }
            return $this->forumPosts;
        }
    }
}
