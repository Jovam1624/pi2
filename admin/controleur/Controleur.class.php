<?php
session_start();
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
					$this->adminArticles();
					$this->footer();
					break;	
				case 'modifSondage':
					$this->header();
					$this->modifSondage();
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
			//$inputUser = $_POST['inputUser'];
			$_SESSION['user'] = 'abdellah';
			$aVue->afficheAccueilAdmin();
			
		}
		public function sondage(){
    		
			$bdd = Sondage::getInstance("e1395254", "dbconnect");			 
			$aVue = new VueSondageAdmin();			
			$aVue->afficheSondageAdmin();
			
		}
		public function modifSondage(){
    		
			$bdd = ModifSondage::getInstance("e1395254", "dbconnect");			 
			$aVue = new VueModifSondage();
			
			$id = $_GET['id'];
			$nomBtn = $_GET['nomBtn'];
			$monSondage = $bdd-> getSondageAdmin($id);
			$aVue->afficheModifSondage($id,$nomBtn,$monSondage);
			
		}
		
		
		public function admin(){
    		
			$bdd = Admin::getInstance("e1395254", "dbconnect");
			
			
			$aVue = new VueAdmin();
			$aVue->afficheAdmin();
		}
		public function adminArticles()	{
			$bd = AdminArticles::getInstance("e1395254", "dbconnect");
				
			
			if($_GET['id'] != '') {
				$aArticles=Array();
				try	{
					$aArticles = $bd->getAdminArticle($_GET['id'] );
				} catch(Exception $e)	{
					$erreur = $e->getMessage();
					}
				$oVueArticle = new VueAdminArticles();
				$oVueArticle->afficheAdminArticle($aArticles);
			}
			else {
				$oVueArticle = new VueAdminArticles();
				$aArticles = $bd->getAdminArticles();
				$oVueArticle->afficheAdminArticles($aArticles);
			}
			
		}

		
		

		
}
?>















