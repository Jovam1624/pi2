<?php
/**
 * @class Recherche
 * ****************
 * @author Équipe3
 * @version beta
 */
//****************
class Recherche {
    private static $instance = null;
    private $idbd;
    private $rRecherche;
      
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
        
    public static function getInstance($base, $param){
        if (is_null(self::$instance)) {
            self::$instance = new Recherche($base, $param);
        }
        return self::$instance;
    }
    
    public function getBD(){
        return $this->idbd;
    }
		
	/**
	 * Retourne un tableau qui contient tous les articles avec le mot cle 
	 * @access public
	 * @return Array
	 */
    public function getRecherche(){
		$rRecherche = Array();
                if(isset($_GET['recherche'])&& !empty($_GET['recherche'])){
                $motcle = $_GET['recherche'];
		$res = $this->idbd->query("SELECT * FROM articles WHERE (article_titre LIKE '%$motcle%') OR (article_contenu LIKE '%$motcle%')");
		if($res->rowCount() > 0){
                    while($row = $res->fetch(PDO::FETCH_ASSOC))
                    $this->rRecherche[] = $row;
                }
		return $this->rRecherche;
	}
}
}
