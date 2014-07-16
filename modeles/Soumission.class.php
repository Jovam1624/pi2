<?php
/**
 * @class Soumission
 * *************
 * @author Équipe3
 * @version Finale
 */


class Soumission {

    private static $instance = null;

    private $idbd;
    private $tabErreur=array('membre_alias' => '', 'art_date_soumis' => '','brevet_ID' => '','article_titre' => '', 'article_contenu' => '');
    private $valid = true;
    private $tabMeta = array('title' => 'page article-journal d\'idées Eureka inventions 2014' , 'keywords' => 'articles,inventions,idées,2014', 
                            'description' => 'pages articles-plate-forme pour partager, financer, publier et commenter de nouvelles inventions brefetées ou non - inventions en 2014');

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

     //fonction qui va chercher le tableau de meta et title 
      public function getMeta(){
        return $this->tabMeta;
    }

    public static function getInstance($base, $param)  {
        if (is_null(self::$instance)) {
            self::$instance = new Soumission($base, $param);
        }
        return self::$instance;
    }
    
    //fonction qui prepare un tableau d'erreur a afficher dans la vue
    //inspiration de http://www.w3schools.com/php/php_form_required.asp
    public function verifierErreursSoumission(){

        
        if(isset($_POST['soumission'])){
            
            if (empty($_POST["alias"])) {
                $this->tabErreur["membre_alias"] = "L'alias du membre est vide";
                } else {
                    $article_titre = self::test_input($_POST["alias"]);
                }
            
            if (empty($_POST["dateSoumission"])) {
                $this->tabErreur["art_date_soumis"] = "La date est vide";
                } else {
                    $article_titre = self::test_input($_POST["dateSoumission"]);
                }

            if (empty($_POST["titre"])) {
                $this->tabErreur["article_titre"] = "Le titre est requis";
                } else {
                    $article_titre = self::test_input($_POST["titre"]);
                }
            if (empty($_POST["contenu"])) {
                $this->tabErreur["article_contenu"] = "Le contenu est requis";
                } else {
                    $article_contenu = self::test_input($_POST["contenu"]);
                }


            
        }
        return $this->tabErreur;
    }
   
    public function validerFormulaire(){
        foreach ($this->tabErreur as $key => $value) {
            if ($value != ""){
                //var_dump($value);
                $this->valid=false;
            }
        }
        return $this->valid;
    }
    //function qui nettoie l'input des injections SQL et autre caracteres non-permis
    //source : http://www.w3schools.com/php/php_forms.asp
    public function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    public function AjoutSoumission(){

        if(isset($_POST['soumission'])){
            $req = $this->getIdbd()->exec("INSERT INTO articles VALUES ('','".$_POST['titre']."','".$_POST['contenu']."',
                                        '".$_POST['financement']."')"); 
            if(!$req) {
            // lancer l'exception
            throw new Exception("La requête n'a pu être exécutée");
            }
            
        }
  
    }

    

}   

?>