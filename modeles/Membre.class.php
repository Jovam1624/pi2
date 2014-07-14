<?php
/**
 * @class Membre
 * *************
 * @author Équipe3
 * @version beta
 */


class Membre {

    private static $instance = null;
	private $mdp="";
    private $membre="";
	private $idbd;
    private $tabErreur=array('nom' => '', 'prenom' => '', 'nom' => '', 'utilisateur' => '', 'mdp' => '', 'courriel' => '',
                             'adresse'=>'', 'ville'=> '', 'telephone' =>'', 'conflit'=>'');
    private $loginErreur;
    private $valid = true;
    

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

    public function getValid(){
        return $this->valid;
    }

    public static function getInstance($base, $param)  {
        if (is_null(self::$instance)) {
            self::$instance = new Membre($base, $param);
        }
        return self::$instance;
    }
	//****************************************
	public function verifyUtilisateur($alias){
			
		$req =  $this->getIdbd()->query("SELECT * FROM membres WHERE
                    (membre_alias = '".$_POST['utilisateur']."') AND (membre_mdp ='".$_POST['mdp']."')");

		if(!$req) {
            // lancer l'exception
            throw new Exception("La requête n'a pu être exécutée");

        } else {
            if ($req->rowCount() == 1) {
                $this->membre = self::test_input($alias);
                $mdp = $req->fetch(PDO::FETCH_ASSOC);
                $this->mdp =  self::test_input($mdp['membre_mdp']);
                self::connectMembre($_POST["utilisateur"]);
               
            } else {
                $this->loginErreur = "Votre nom d'utilisateur ou votre mot de passe est incorrect";
                }
          	                      
            }
    }
	
    public function connectMembre(){

        
        $_SESSION['utilisateur'] = $this->membre;
        $_SESSION['mdp'] = $this->mdp;
        $_SESSION['isConnected'] = true;
        
    }   
    

    public function verifyErreurLogin(){

        if(isset($_POST['connecter'])){

            if (empty($_POST["utilisateur"])) {
                $this->loginErreur = "Le champ utilisateur est vide";
                } else if (empty($_POST["mdp"])) {
                $this->loginErreur = "Le mot de passe est vide";
                    } else {
                        self::verifyUtilisateur($_POST['utilisateur']);
                        
                        }
                  
        }
        return $this->loginErreur;
    }

    //function qui nettoie l'input des injections SQL et autre caracteres non-permis
    //source : http://www.w3schools.com/php/php_forms.asp
    public function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    //fonction qui ajoute des membres inscrits dans la base de donneée

	//verifie si lusager existe!!

    public function AjoutMembre(){

        if(isset($_POST['inscription'])){
            $req = $this->getIdbd()->exec("INSERT INTO membres VALUES ('','".$_POST['nom']."','".$_POST['prenom']."',
                                        '".$_POST['utilisateur']."','".$_POST['mdp']."','".$_POST['courriel']."',
                                         '".$_POST['adresse']."','".$_POST['ville']."','".$_POST['telephone']."','".$_POST['type']."')"); 
            if(!$req) {
            // lancer l'exception
            throw new Exception("La requête n'a pu être exécutée");
            }
            
        }
  
    }

    //fonction qui prepare un tableau d'erreur a afficher dans la vue
    //inspiration de http://www.w3schools.com/php/php_form_required.asp
    public function verifyErreurInscription(){

        
        if(isset($_POST['inscription'])){


            if (empty($_POST["nom"])) {
                $this->tabErreur["nom"] = "Le nom est requis";
                } else {
                    $nom = self::test_input($_POST["nom"]);
                    if (!preg_match("/^[A-ZÉ][a-zéçêèô]+$/",$nom)) {
                        $this->tabErreur["nom"] = "Vous devez respecter le patron"; 
                        }
                }  


            if (empty($_POST["prenom"])) {
                $this->tabErreur["prenom"] = "Le prenom est requis";
                } else {
                    $prenom = self::test_input($_POST["prenom"]);
                    if (!preg_match("/^[A-ZÉ][a-zéçêèô]+$/",$prenom)) {
                        $this->tabErreur["prenom"] = "Vous devez respecter le patron"; 
                        }
                 }
                      
            if (empty($_POST["utilisateur"])) {
                $this->tabErreur["utilisateur"] = "Le nom d'utilisateur est requis";
                } else {
                    $utilisateur = self::test_input($_POST["utilisateur"]);
                    if (!preg_match("/^[A-ZÉa-z0-9éçêèô]{5}[A-ZÉa-z0-9éçêèô]+$/",$utilisateur)) {
                        $this->tabErreur["utilisateur"] = "Vous devez respecter le patron"; 
                        }
                 }       
            
            if (empty($_POST["mdp"])) {
                $this->tabErreur['mdp'] = "Le mot de passe est vide";
                } else {
                    $mdp = self::test_input($_POST["mdp"]);
                    if (!preg_match("/^[A-ZÉa-z0-9_éçêèô]{6}+/",$mdp)) {
                        $this->tabErr["mdp"] = "Vous devez respecter le patron"; 
                        }
                  }

            if (empty($_POST["courriel"])) {
                $this->tabErreur["courriel"] = "Le courriel est requis";
                } else {
                    $courriel = self::test_input($_POST["courriel"]);
                    if (!preg_match("/^([\w\-]+\@[\w\-]+\.[\w\-]+)$/",$courriel)) {
                        $this->tabErreur["courriel"] = "Vous devez respecter le patron"; 
                        }
                 }   


            $adresse = self::test_input($_POST["adresse"]);
            if (!preg_match("/^[0-9]+ [A-Za-zéçêèô]+ [A-Za-zéçêèô]+$/",$adresse)) {
                $this->tabErreur["adresse"] = "Vous devez respecter le patron"; 
                    }
                


            $ville = self::test_input($_POST["ville"]);
            if (!preg_match("/^[A-Za-zéçêèô][a-z- ]+$/",$ville)) {
                $this->tabErreur["ville"] = "Vous devez respecter le patron"; 
                    }
            

            $telephone = self::test_input($_POST["telephone"]);
            if (!preg_match("/^[0-9]+[0-9- ]+$/",$telephone)) {
                $this->tabErreur["telephone"] = "Vous devez respecter le patron"; 
                    }
            self::dejaInscritMembre();        

        }
        return $this->tabErreur;
    }
     
    public function dejaInscritMembre($alias){

        $req1 =  $this->getIdbd()->query("SELECT membre_alias FROM membres WHERE
                    (membre_alias = '".$alias."')");

        if(!$req1) {
            // lancer l'exception
            throw new Exception("La requête n'a pu être exécutée");
            } else {

                if ($req1->rowCount() == 1) {
                    //$this->tabErreur["conflit"] = "Ce nom d'utilisateur est déjà utilisé";
                    echo "true";

                }else  {
                    //$this->tabErreur["conflit"] = ""; 
                    echo "false";

                }

            }
            return;
         
        }
      public function dejaInscritCourriel($email){

               
        $req2 =  $this->getIdbd()->query("SELECT membre_courriel FROM membres WHERE
                    (membre_courriel = '".$email."')");

        if(!$req2) {
            // lancer l'exception
            throw new Exception("La requête n'a pu être exécutée");
            } else {
                if ($req2->rowCount() == 1) {
                    $this->tabErreur["conflit"] = "Ce courriel est déjà inscrit";

                }else  $this->tabErreur["conflit"] = "";
            }   
    }

     
    public function validFormulaire(){
        foreach ($this->tabErreur as $key => $value) {
            if ($value != ""){
                //var_dump($value);
                $this->valid=false;
            }
        }
        return $this->valid;
    }

}	

?>