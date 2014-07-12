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
					$this->header();
					$this->accueil();
					break;
				case 'articles':
					$this->header();
					$this->articles();
					break;
				case 'forum':
					$this->header();
					$this->forum();
					break;	
				case 'contact':
					$this->header();
					$this->contact();
					break;	
				case 'inscription':
					//if(isset($_SESSION["utilisateur"])){
					//$this->header();	
					//$this->accueil();
					//} else {
						
					$this->inscription();
					//	}
					break;	
                case 'recherche':
                	$this->header();
					$this->recherche();
					break;	
				 case 'soumission':
					$this->header();
					$this->soumission();
					break;	
				default:
					$this->header();
					$this->accueil();
					
					break;
			}
                    $this->footer();
		}
		
		public function header() {
			//$aInfo = $oPage->getPageInfo('accueil');	// retour array('titre' => 'accueil', 'meta' => 'ceci est le mot-clÈ', 'auteur' => 'Jonathan Martel')
			if(isset($_POST['deconnect'])){
    			session_unset();
    		}
			$hVue = new VueHeader();
			$hVue->afficheEntete();
			$hVue->afficheMenu();
		}
		
		public function footer(){
			$fVue = new VueFooter();
			$fVue->afficheFooter();
		}  
		public function accueil(){
    		
			$bdd = Accueil::getInstance("e1395254", "dbconnect");
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
		}
		
		public function articles()	{
			$bd = Articles::getInstance("e1395254", "dbconnect");
                        
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
			$fVue= new VueForum();
			if($_GET['id']){
				$monForum = $bdd->getForumComments($_GET['id']);
				$monPost = $bdd->getForumPost($_GET['id']);
				$fVue->afficherForumPost($monForum, $monPost[0]);
			} else{
				$postComments = Array();
				$mesPosts = $bdd->getAllForumPosts();
				foreach ($mesPosts as $post) {
					$idPost = 0;	
					$idPost = $post['billet_ID'];

					$postComments[$idPost] = count($bdd->getForumComments($idPost));
				}
				$fVue->afficherForum($mesPosts, $postComments);
			}
		}

		public function contact(){

			$cVue= new VueContact();
			$cVue->afficheContact();
		}

		public function inscription(){
			
			$bdd = Membre::getInstance("e1395254", "dbconnect");
			$bdd->verifyMembre();
			$err ="";
			if(isset($_SESSION["utilisateur"])){
				$this->header();	
				$this->accueil();
				} else if (isset($_POST["connecter"])) {
					//si pas ok logging
					$iVue= new VueInscription();
					$this->header();
					$err = $bdd->afficheErreur();
					$iVue->afficheInscription($err);
				}else{
					$iVue= new VueInscription();
					$this->header();
					$iVue->afficheInscription($err);
					
					}	
			

		}
        
        public function recherche(){

			$bdd = Recherche::getInstance("e1395254", "dbconnect");
			$monRecherche= $bdd-> getRecherche();
			$rVue = new VueRecherche();
			$rVue->afficheRecherche($monRecherche);
                     
		}

		public function soumission(){

			$sVue= new VueSoumission();
			$sVue->afficheSoumission();
		}


		
}
?>















