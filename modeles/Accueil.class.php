<?php
/**
 * @class Accueil
 * **************
 * @author Équipe3
 * @version beta
 * 
 */
class Accueil

{
    
    private static $instance = null;
    private $idbd;
    private $monArticle;
    private $monArtPopulaire;
    private $nbrIdees;
    private  $nbrClick;
    //private const cookSondage=1;
    private $tabMeta = array('title' => 'page accueil-journal d\'idées Eureka inventions 2014' , 'keywords' => 'accueil,inventions,idées,2014', 
                            'description' => 'pages accueil-plate-forme pour partager, financer, publier et commenter de nouvelles inventions brefetées ou non - inventions en 2014');
    
   
    // ****************************************   
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
    // ***************************************************
    // fonction qui va servir pour instancier cette classe 
    public static function getInstance($base, $param)
    {
        if (is_null(self::$instance)) {
            self::$instance = new Accueil($base, $param);
        }
        return self::$instance;
    }
    // **********************************
    public function getBD()
    {
        return $this->idbd;
    }
     public function getMeta(){
        return $this->tabMeta;
    }
    
    public function setCookieSondageMois($cookSondage){
        //self::$cookSondage +=1;
         
    }
    // **********************************
    public function getMonarticle()
    {
        return $this->monarticle;
    }
    // **********************************
    public function get_article_acceuil(){
        
        $req =$this->idbd->query("SELECT *FROM articles LIMIT 0,08");

        if (!$req) {
                  
            throw new Exception("Résultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
            while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
                $monArticle[]     = $article;
                $this->monArticle = $monArticle;
            }    
        }

        return $this->monArticle;
           
    }
    // *************************************
    public function get_article_populaire(){
        
        $reqArtPopul =$this->idbd->query("SELECT *FROM articles WHERE art_nb_vues > 0 LIMIT 0,04");
        
        
        if (!$reqArtPopul) {
            
            
            throw new Exception("Resultat introuvable sur le serveur : " . HOST);
            
        } else {
            
            while ($artPopulaire = $reqArtPopul->fetch(PDO::FETCH_ASSOC)) {
                    $monArtPopulaire[]     = $artPopulaire;
                    $this->monArtPopulaire = $monArtPopulaire;
            }
            
        }

        return $this->monArtPopulaire;

    }
    
    // **********************************
    public function get_statistiques(){
        
        $reqStatistique =$this->idbd->query("SELECT COUNT(*) FROM articles");
        
        
        if (!$reqStatistique) {
            
            
            throw new Exception("Resultat introuvable sur le serveur : " . HOST);
            
        } else {
            
            while ($nbrIdees = $reqStatistique->fetch(PDO::FETCH_ASSOC)) {
                    $nbrIdees     = $nbrIdees;
                    $this->nbrIdees = 30;
            }
            
        }
       


        return $this->nbrIdees;
        
   
    
    }
    // **********************************
    public function setSondage($like,$numeroArticle){
        
       $requete = "UPDATE articles SET art_nb_likes='".$like."' WHERE article_ID='".$numeroArticle."'";
       $nb = $this->getBD()->exec($requete);

    } 

    // **********************************
    public function setNbrVues($nbrVues,$nArticle){
        
        $requete = "UPDATE articles SET art_nb_vues='".$nbrVues."' WHERE article_ID='".$nArticle."'";
        $nb = $this->getBD()->exec($requete);
                                                                                                                                                                     

    } 
    // **********************************
    public function setSondageMois($sondage,$nBtnRadio){
        
        $requete = "UPDATE reponse SET nombre_click='".$sondage."' WHERE nombre_click='".$nBtnRadio."'";
        $nb = $this->getBD()->exec($requete);
                                                                                                                                                                     

    } 
    // **********************************
    public function getSondageMois(){
        
        $req =$this->idbd->query("SELECT reponse_ID,nom_reponse,nombre_click FROM reponse");

        if (!$req) {
                  
            throw new Exception("Resultat introuvable sur le serveur : " . HOST);
            
        } else {
                       
                while($row = $req->fetch(PDO::FETCH_ASSOC))
                      $nbrClick[] = $row;
                      $this->nbrClick = $nbrClick;
            
        }
        
        return $this->nbrClick;
                                                                                                                                                                     
    }  

    public function get_article_plusLu(){
        $fLu = Array();
        $res = $this->idbd->query("SELECT * FROM articles ORDER BY art_nb_vues DESC LIMIT 0,5");
        if($res->rowCount() > 0){
                    while($row = $res->fetch(PDO::FETCH_ASSOC))
                    $this->fLu[] = $row;
                }
        return $this->fLu;
                
        
    }
    
    public function get_article_plusPartage(){
    $fPartage = Array();
    $res = $this->idbd->query("SELECT * FROM articles ORDER BY art_nb_likes DESC LIMIT 0,5");
    if($res->rowCount() > 0){
                while($row = $res->fetch(PDO::FETCH_ASSOC))
                $this->fPartage[] = $row;
            }
    return $this->fPartage;
                
        
    }
    
    public function get_article_plusCommente(){
    $fCommente = Array();
    $res = $this->idbd->query("SELECT * FROM articles ORDER BY art_nb_comment DESC LIMIT 0,5");
    if($res->rowCount() > 0){
                while($row = $res->fetch(PDO::FETCH_ASSOC))
                $this->fCommente[] = $row;
            }
    return $this->fCommente;
                
        
    }
    
}
?>