<?php

/**
 * @class Billets
 * **************
 * @author Équipe3
 * @version beta
 */
//****************
class Billets {
    
    private static $instance = null;
    private $bdd;
    private $aBillets;
    private $aBillet;
    
    public function __construct($base, $param) {
        require_once($param.".inc.php");
		$data="mysql:host=".HOST.";dbname=".$base.";charset=utf8";
		$user=USER;
		$pass=PASS;
		try{
			return $this->bdd = new PDO($data,$user,$pass);
			
		} catch(PDOException $pdoe){
			echo "echec de la connexion : ",$pdoe->getMessage();
			return false;
			exit();
		}
	}
	//****************************************************
    // fonction qui va servir pour instancier cette classe 
    public static function getInstance($base, $param)
    {
        if (is_null(self::$instance)) {
            self::$instance = new Billets($base, $param);
        }
        return self::$instance;
    }
    //****************
    public function getBD()
    {
        return $this->bdd;
    }
    //****************
	public function getBillets($id){
        
        
        $reqBillets =$this->bdd->query("SELECT * FROM billets WHERE billet_id='".$id."'");
        
        
        if (!$reqBillets) {
                  
            throw new Exception("Resultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($commentaires = $reqBillets->fetch(PDO::FETCH_ASSOC)) {
                $this->aBillets[] = $commentaires;

            }
            
            return $this->aBillets;
        }
    }
    
    
}


?>