<?php
/**
 * @class Articles
 * ***************
 * @author Équipe3
 * @version beta
 * 
 */
//****************
class Articles {

	private static $instance = null;
        private $idbd;
        private $aArticles;
        private $aArticle;
        private $tabMeta = array('title' => 'page article-journal d\'idées Eureka inventions 2014' , 'keywords' => 'articles,inventions,idées,2014', 
                            'description' => 'pages articles-plate-forme pour partager, financer, publier et commenter de nouvelles inventions brefetées ou non - inventions en 2014');
      
    //******************************************
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
	//******************************************
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
    //fonction qui va chercher le tableau de meta et title 
      public function getMeta(){
        return $this->tabMeta;
    }
		
	/****************************************************
	 * Retourne un tableau qui contient tous les articles
	 * @access public
	 * @return Array
	 */
	public function getArticles($cat) 
    {
        
        $res = $this->idbd->query("SELECT articles.*, categories.categorie_titre
                                   FROM articles
                                   INNER JOIN categories
                                   ON articles.categorie_ID=categories.categorie_ID
                                   WHERE (articles.categorie_ID = '". $cat ."')");
        
        if($res->rowCount() > 0)
        {
                while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                    $this->aArticles[] = $row;
                }
        }
        return $this->aArticles;
    }

    /********************************************************
     * Retourne un tableau qui contient un article spécifique
     * @param int id (ID de l'article)
     * @access public
     * @return Array
     */
    public function getArticle($id=1) 
    {
        if(!is_numeric($id))
        {
                throw new Exception("La valeur doit être numérique", 1);
        }
        $res = $this->idbd->query("SELECT articles.*, categories.categorie_titre
                                   FROM articles
                                   INNER JOIN categories
                                   ON articles.categorie_ID=categories.categorie_ID
                                   WHERE articles.article_ID = '". $id ."'");
        
        if($res->rowCount() >0)
        {	
                while($row = $res->fetch(PDO::FETCH_ASSOC)) 
                    $this->aArticle = $row;
                
        }
        return $this->aArticle;
    }
}

?>