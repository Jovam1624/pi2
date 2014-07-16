<?php
/**
 * @class Controleur
 * ***************** 
 * @author Équipe 3 :  Ait Hadji, Bretoux, Dubreuil, Fernandez Diaz, Tremblay
 * @reference Jonathan Martel - https://github.com/JonathanMartel/simpleMVCStructure
 * @version Beta
 * 
 */

class Controleur
{
		
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer()
		{
			
			switch ($_GET['p']) {
				case 'accueil':
					//$this->header();
					$this->accueil();
					break;
				case 'articles':
					//$this->header();
					$this->articles();
					break;
				case 'forum':
					//$this->header();
					$this->forum();
					break;	
				case 'contact':
					$this->header();
					$this->contact();
					break;	
				case 'connexion':
					$this->connexion();
					break;	
				case 'inscription':
					//$this->header();
					$this->inscription();
					break;		
                case 'recherche':
                	$this->header();
					$this->recherche();
					break;	
				 case 'soumission':
					//$this->header();
					$this->soumission();
					break;	
				default:
					//$this->header();
					$this->accueil();
					
					break;
			}
                    $this->footer();
		}
		
		public function header($tabMeta = array('title' => 'page accueil-journal d\'idées Eureka inventions 2014' , 
                                                'keywords' => 'accueil,inventions,idées,2014', 
                                                'description' => 'pages accueil-plate-forme pour partager, financer, publier et commenter de nouvelles inventions brefetées ou non - inventions en 2014'))
        {
			if(isset($_POST['deconnect'])){
    			session_unset();
    		}
    					
			$hVue = new VueHeader();
			$hVue->afficheEntete($tabMeta);
			$hVue->afficheMenu();
		}
		
		public function footer(){
			$fVue = new VueFooter();
			$fVue->afficheFooter();
		}  
		public function accueil(){
    		
			$bdd = Accueil::getInstance("e1395254", "dbconnect");
			$tabMeta = $bdd->getMeta();
			$this->header($tabMeta);
			$monarticle= $bdd-> get_article_acceuil();
			$monArtPopulaire = $bdd-> get_article_populaire();
			$nbrIdees = $bdd->get_statistiques();
			$nbrClick = $bdd->getSondageMois();
			$plusLu = $bdd-> get_article_plusLu();
			$plusPartage = $bdd-> get_article_plusPartage(); 
			$plusCommente = $bdd-> get_article_plusCommente(); 
			$sondageMois = $bdd-> getSondageMois();
			$aVue = new VueAccueil();
			$aVue->afficheAccueil($monarticle,$monArtPopulaire,$nbrIdees,$nbrClick,$plusLu, $plusPartage, $plusCommente,$sondageMois);
			//var_dump($tabMeta); 
		}
		
		public function articles()	{
			$bd = Articles::getInstance("e1395254", "dbconnect");
            $tabMeta = $bd->getMeta();
			$this->header($tabMeta);  
			$tabErr="";          
                if($_GET['id'] != '') {
						$aArticles=Array();
					try	{
						$aArticles = $bd->getArticle($_GET['id'] );
					}	catch(Exception $e)	{
						$erreur = $e->getMessage();
						}
				$oVueArticle = new VueArticles();
				$oVueArticle->afficheArticle($aArticles);
			}
			else {

				$oVueArticle = new VueArticles();
                $aArticles = $bd->getArticles($_GET["cat"]);
                $oVueArticle->afficheListeArticles($aArticles);
			}
			
		}


		public function forum(){

			$bdd = Forum::getInstance("e1395254", "dbconnect");
			$tabMeta = $bdd->getMeta();
			$this->header($tabMeta);
			$fVue= new VueForum();
			if($_GET['id']){
				$monForum = $bdd->getForumCommentairesBillets($_GET['id']);
				$monPost = $bdd->getForumBillets($_GET['id']);
				$fVue->afficherForumBillet($monForum, $monPost[0]);
			} else{
				$postComments = Array();
				$mesPosts = $bdd->getTousForumBillets();
				foreach ($mesPosts as $post) {
					$idPost = 0;	
					$idPost = $post['billet_ID'];

					$postComments[$idPost] = count($bdd->getForumCommentairesBillets($idPost));
				}
				$fVue->afficherForum($mesPosts, $postComments);
			}
		}

		public function contact(){

			$cVue= new VueContact();
			$cVue->afficheContact();
		}

		public function connexion(){
			
			$bdd = Membre::getInstance("e1395254", "dbconnect");
			$tabMeta = $bdd->getMeta();
			//$bdd->connectMembre();
			$err ="";
			if(isset($_SESSION["utilisateur"])){
				$this->header($tabMeta);
				$this->accueil();
				} else if (isset($_POST["connecter"])) {
					$err = $bdd->verifyErreurLogin();
					if($err != ""){
						$cVue= new VueMembre();
						$this->header($tabMeta);
						$cVue->afficheConnexion($err);
						}else{
						//$this->header($tabMeta);
						$this->accueil();
						}	
			}else {
				$cVue= new VueMembre();
				$this->header($tabMeta);
				$cVue->afficheConnexion($err);
			}
			

		}	

		public function inscription(){
			$bdd = Membre::getInstance("e1395254", "dbconnect");
			$tabMeta = $bdd->getMeta();
			$this->header($tabMeta);
			$tabErr="";
			if(isset($_POST['submit'])){

				$tabErr = $bdd->verifyErreurInscription();
				//var_dump($tabErr);
				$valid = $bdd->validFormulaire();
				//valid le formulaire et envoie si comforme 
				if($valid == true){
					var_dump($_POST);
					$bdd->AjoutMembre($valid);
					$this->accueil();
					}else {
						$iVue = new VueMembre();
						$iVue->afficheFormulaire($tabErr);	
					}
				
				} else {
					$iVue = new VueMembre();
					$iVue->afficheFormulaire($tabErr);	
				}
				
		}
        
        public function recherche(){

			$bdd = Recherche::getInstance("e1395254", "dbconnect");
			$monRecherche= $bdd-> getRecherche();
			$rVue = new VueRecherche();
			$rVue->afficheRecherche($monRecherche);
                     
		}

		public function soumission(){

			$bdd = Soumission::getInstance("e1395254", "dbconnect");
			$tabMeta = $bdd->getMeta();
			$this->header($tabMeta);
			$tabErr="";
			if(isset($_SESSION["utilisateur"])){
				if(isset($_POST['soumission'])){

					$tabErr = $bdd->verifierErreursSoumission();
					$valid = $bdd->validerFormulaire();

				//valid le formulaire et envoie si conforme 

					if($valid == true){
						//$bdd->AjoutSoumission($valid);
						$this->accueil();

						}else {
							$iVue = new VueSoumission();
							$iVue->afficheFormulaire($tabErr);	
							}	

					} else {
						$iVue = new VueSoumission();
						$iVue->afficheFormulaire($tabErr);	
					}

				

			}else $this->accueil();
	}			
	
}
?>















