<?php
/**
 * Class Modele
 * Template de classe modèle. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Articles {
	private static $instance = null;
        private $idbd;
        private $aArticles;
        private $aArticle;
    
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
            self::$instance = new Articles($base, $param);
        }
        return self::$instance;
    }
    
    public function getBD()
    {
        return $this->idbd;
    }
		
	/**
	 * Retourne un tableau qui contient tous les articles
	 * @access public
	 * @return Array
	 */
	public function getArticles($cat=1) 
	{
		$aArticles = Array();
		$res = $this->idbd->query("select * from articles where (categorie_ID = '". $cat ."')");
		if($res->rowCount() > 0)
		{
		
                        while($row = $res->fetch(PDO::FETCH_ASSOC))
                            $this->aArticle[] = $row;
			
		}
		return $this->aArticle;
	}
	
	/**
	 * Retourne un tableau qui contient un article spécifique
	 * @param int id
	 * @access public
	 * @return Array
	 */
	public function getArticle($id=1) 
	{
		$aArticle = Array();
		if(!is_numeric($id))
		{
			throw new Exception("La valeur doit être numérique", 1);
		}
		$res = $this->idbd->query("select * from articles where (article_ID = '". $id ."')");
		if($res->rowCount() >0)
		{
			
                        while($row = $res->fetch(PDO::FETCH_ASSOC))
                            $this->aArticle[] = $row;
			$this->aArticle = $aArticle[0];
			
		}
		return $this->aArticle;
	}
}




?>