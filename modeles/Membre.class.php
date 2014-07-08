<?php
/**
 * @class Membre
 * *************
 * @author Équipe3
 * @version beta
 */


class Membre {

    private static $instance = null;
	private $membre;
	private $idbd;
    private $tabErr="";
    

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
	public function getIdbd(){
		return $this->idbd;
	}

    public static function getInstance($base, $param)  {
        if (is_null(self::$instance)) {
            self::$instance = new Membre($base, $param);
        }
        return self::$instance;
    }
	//****************************************
	public function getMembreByAlias($alias){
			
		$req = $this->getIdbd()->query("SELECT * from membre WHERE membre_alias='".$alias."'");

		if(!$req) {
            // lancer l'exception
            throw new Exception("La requête n'a pu être exécutée");

        } else {
          	 while ($membre = $req->fetch(PDO::FETCH_ASSOC)) {
                       $this->membre = $membre;
                    }
                }
            // le retour de la fonction
			return $this->membre; 
    }
	//****************************************
    public function getMembreById($id){
			
		$req = $this->getIdbd()->query("SELECT * from membre WHERE membre_ID='".$id."'");

		if(!$req) {
            // lancer l'exception
            throw new Exception("La requête n'a pu être exécutée");

        } else {
          	 while ($membre = $req->fetch(PDO::FETCH_ASSOC)) {
                       $this->membre = $membre;
                    }
                }
            // le retour de la fonction
			return $this->membre; 
    }
	//****************************************
    public function verifyMembre(){
        if(isset($_POST['utilisateur']) && isset($_POST['mdp'])){
                
        	$req =  $this->getIdbd()->query("SELECT * FROM membres WHERE
        			(membre_alias = '".$_POST['utilisateur']."') AND (membre_mdp ='".$_POST['mdp']."')");

            if(!$req) {
            // lancer l'exception
            throw new Exception("La requête n'a pu être exécutée");

        } else { 
                while ($verif = $req->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['utilisateur'] = $_POST['utilisateur'];
                $_SESSION['mdp'] = $_POST['mdp'];
                $_SESSION['isConnected'] = true;
                }
            }   
        }   

		

    }

    public function afficheErreur(){

        if(isset($_POST['connecter'])){

            if (empty($_POST["utilisateur"])) {
                $this->tabErr[0] = "Le nom est requis";
                } else {
                   $utilisateur = self::test_input($_POST["utilisateur"]);
                   
                    if (!preg_match("/[A-ZÉa-z0-9éçêèô]{5}[A-ZÉa-z0-9éçêèô]+/",$utilisateur)) {
                        $this->tabErr[0] = "Mauvais nom"; 
                        }
                 }       
            
            if (empty($_POST["mdp"])) {
                $this->tabErr[1] = "Le mot de passe est vide";
                } else {
                    $mdp = self::test_input($_POST["mdp"]);
                    if (!preg_match("/[A-ZÉa-z0-9_éçêèô]{7}+/",$mdp)) {
                        $this->tabErr[1] = "Mauvais mot de passe"; 
                        }
                  }
        }
        return $this->tabErr;
    }

    //function qui nettoie l'input 
    public function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }



           	
 	

}	

?>