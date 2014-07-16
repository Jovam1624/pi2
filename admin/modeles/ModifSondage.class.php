<?php
/**
 * Class Modele
 * 
 * @author 
 * @version 1.0
 * @update 2013-05-27 
 */
class ModifSondage

{
    
    private static $instance = null;
    private $idbd;
    
 	   
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
            self::$instance = new ModifSondage($base, $param);
        }
        return self::$instance;
    }
    
    public function getBD()
    {
        return $this->idbd;
    }
     
    public function getModifSondage(){
        
        /*$req =$this->idbd->query("SELECT *FROM articles LIMIT 0,06");

        if (!$req) {
                  
            throw new Exception("Resultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
                $monArticle[]     = $article;
                $this->monArticle = $monArticle;
            }
            
        }*/
       
       	//return $this->monArticle;
           
    }

    
    
}
?>