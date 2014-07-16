<?php
/**
 * @class AdminArticles
 * ***************
 * @author Équipe3
 * @version finale
 * 
 */
//****************
class AdminArticles {
	private static $instance = null;
        private $idbd;

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

		}
	}
    // fonction qui va servir pour instancier cette classe 
    public static function getInstance($base, $param)
    {
        if (is_null(self::$instance)) {
            self::$instance = new AdminArticles($base, $param);
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
	public function getAdminArticles() 
    {
        
        $res = $this->idbd->query("SELECT *
                                   FROM articles");
        
        if($res->rowCount() > 0)
        {
                while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    $this->aArticles[] = $row;
                }
        }
        return $this->aArticles;
    }

    /**
     * Retourne un tableau qui contient un article spécifique
     * @param int id (ID de l'article)
     * @access public
     * @return Array
     */
    public function getAdminArticle($id=1) 
    {
        $res = $this->idbd->query("SELECT *
                                   FROM articles
                                   WHERE article_ID = '". $id ."' ORDER BY art_date_soumis DESC");
        if($res->rowCount() >0)
        {	
                while($row = $res->fetch(PDO::FETCH_ASSOC)) 
                    $this->aArticle = $row;    
        }
        return $this->aArticle;
    }
}




?>