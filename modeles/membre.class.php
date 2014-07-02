<?php

class Membre {

	private $membre;
	private $idbd;

	public function __construct($base, $param) {
        require_once($param.".inc.php");
		$data="mysql:host=".HOST.";dbname=".$base;
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

    public function verifyMembre(){

    	$req =  $this->getIdbd()->query("SELECT * FROM membre WHERE
    			(membre_alias = '".mysql_real_escape_string($_POST['utilisateur'])."') AND (password ='".mysql_real_escape_string($_POST['mdp'])."')");


		if(!$req) {
            // lancer l'exception
            throw new Exception("La requête n'a pu être exécutée");

        } else { 
        		while ($verif = $req->fetch(PDO::FETCH_ASSOC)) {
        	 	$_SESSION['utilisateur'] = $_POST['utilisateur'];
        	 	}
        	}	

    }
           	
 	

}	

?>