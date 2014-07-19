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
    private $monSondage;
    
 	   
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
     
    public function getSondageAdmin($id){
        
        $req =$this->idbd->query("SELECT *FROM reponse WHERE reponse_ID = '".$id."' LIMIT 0,03");

        if (!$req) {
                  
            throw new Exception("Resultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($sondage = $req->fetch(PDO::FETCH_ASSOC)) {
                $monSondage[]     = $sondage;
                $this->monSondage = $monSondage;
            }
            
        }
       
        return $this->monSondage;
           
    }
    
    
}
?>