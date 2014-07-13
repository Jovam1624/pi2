<?php
/**
 * Class Modele
 * 
 * @author 
 * @version 1.0
 * @update 2013-05-27 
 */
class Inscription

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
            self::$instance = new Inscription($base, $param);
        }
        return self::$instance;
    }
    
    public function getBD()
    {
        return $this->idbd;
    }
    
    
    public function getPseudo($pseudo){
    
        $requetesPseudo =$this->idbd->query("SELECT *FROM membres WHERE membre_alias = '".$pseudo."'");      
        $count = $requetesPseudo->rowCount();
        if($count > 0)
        {
        //echo '<img src="./images/tick.gif">';
        //echo "ce pseudo existe deja";
        echo 'ok';

        }
        else
        {
        //echo "ce pseudo est inexistant";
            echo 'non';


        }

        return;
        
    }
    
    public function getEmail($email){
    
        $requetesPseudo =$this->idbd->query("SELECT *FROM membres WHERE membre_courriel = '".$email."'");      
        $count = $requetesPseudo->rowCount();
        if($count > 0)
        {
        //echo '<img src="./images/tick.gif">';
        //echo "ce pseudo existe deja";
        echo 'true';

        }
        else
        {
        //echo "ce pseudo est inexistant";
            echo 'false';


        }

        return;
        
    }
    
    
   		
    
    
}
?>