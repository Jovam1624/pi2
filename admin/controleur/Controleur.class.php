<?php
/**
 * Classe Controleur
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-10
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * Adapté pour le projet d'intégration II - Équipe III
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
				case 'admin':
					
					$this->admin();
					
					break;
				case 'accueil':
					$this->header();
					$this->accueil();
					$this->footer();
					break;
				case 'sondage':
					$this->header();
					$this->sondage();
					$this->footer();
					break;	
				case 'adminArticles':
					$this->header();
					$this->forum();
					$this->footer();
					break;						
				default:
					
					$this->admin();
					
					break;
			}
		}
		
		public function header() {
			//$aInfo = $oPage->getPageInfo('accueil');	// retour array('titre' => 'accueil', 'meta' => 'ceci est le mot-clÈ', 'auteur' => 'Jonathan Martel')
			$hVue = new VueHeader();
			$hVue->afficheEntete();
			//hVue->afficheMenu();
		}
		
		public function footer(){
			$fVue = new VueFooter();
			$fVue->afficheFooter();
		}  
		public function accueil(){
    		
			$bdd = Accueil::getInstance("e1395254", "dbconnect");			 
			$aVue = new VueAccueil();
			$aVue->afficheAccueilAdmin();
			
		}
		public function sondage(){
    		
			$bdd = Sondage::getInstance("e1395254", "dbconnect");			 
			$aVue = new VueSondageAdmin();
			$aVue->afficheSondageAdmin();
			
		}
		public function adminArticles(){

			$bdd = AdminArticles::getInstance("e1395254", "dbconnect");
			
			$fVue= new VueAdminArticles();
			$fVue->afficherAdminArticles();
		}
		
		public function admin(){
    		
			$bdd = Admin::getInstance("e1395254", "dbconnect");
			
			
			$aVue = new VueAdmin();
			$aVue->afficheAdmin();
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
				//$oVueArticle->afficheListeArticles($aArticles);
			}
			
		}

		
}
?>















