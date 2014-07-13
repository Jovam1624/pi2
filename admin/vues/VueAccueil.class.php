<?php
/**
 * Class Vue
 * Template de classe Vue. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */


class VueAccueil {

	private $_vueHeader;
	private $_vueFooter;
	
	/*public function __construct() {
		$this->_vueHeader = new VueHeader;
		$this->_vueFooter = new VueFooter;
	}
	/**
	 * Affiche la page d'accueil 
	 * @access public
	 * 
	 */
	public function afficheAccueilAdmin() {
	//$this->_vueHeader->AfficheEntete();
	
		?>
	
    <!-- enssemble contenu-->
          <div class="main row">
            <article class="content col-md-8">
              <div class="row">
                  <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                      <img src="./img/icone-1.png" alt="icone rubrique">
                        <small>Gestion - Accueil</small>    

                    </a>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <a href="index.php?p=adminArticles" class="thumbnail">
                      <img src="./img/icone-2.png" alt="icone rubrique">
                    <small>Gestion - Articles</small>    
                    </a>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <a href="adminMembres.php" class="thumbnail">
                      <img src="./img/icone-4.png" alt="icone rubrique">
                      <small>Gestion - Membres</small>  
                    </a>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <a href="adminForum.php" class="thumbnail">
                      <img src="./img/icone-5.png" alt="icone rubrique">
                      <small>Gestion - Forum</small>
                    </a>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <a href="adminActualites.php" class="thumbnail">
                      <img src="./img/icone-6.png" alt="icone rubrique">
                    <small>Gestion - ActualitÃ©s</small>    
                    </a>
                  </div>
                   <div class="col-xs-6 col-md-3">
                    <a href="index.php?p=sondage" class="thumbnail">
                      <img src="./img/icone-6.png" alt="icone rubrique">
                    <small>Gestion - Actualités</small>    
                    </a>
                  </div>
              
                </div>


          
            </article>
            <!-- le aside-->
           <aside class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Panel heading without title</div>
                    <div class="panel-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut lorem lacus. Proin viverra congue dolor et consectetur. Mauris rhoncus justo vestibulum tellus convallis, pharetra tristique est mollis. Donec laoreet rutrum sollicitudin. Praesent pharetra cursus nisi sit amet tempus. Nam et nisl consequat, accumsan nulla eget, varius justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam non tincidunt tortor, et iaculis tellus. Nullam pharetra lectus leo, mattis vulputate justo mollis malesuada. Curabitur ut ante tortor. Mauris consequat elit arcu, ut facilisis eros suscipit id. In sagittis quis felis eget adipiscing. Fusce molestie malesuada urna at aliquam. Cras volutpat nunc vitae mi ornare sagittis. 
                    </div>
               </div>

    </aside>
  </div>

<?php include ("VueFooter.class.php"); ?>



	   <?php
	   
	}
	
		
	
	
	
	
	
	

}
?>