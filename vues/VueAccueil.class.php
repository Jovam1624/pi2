<?php

/**
 * @class VueContact
 * ***************
 * @author Équipe3
 * @version beta
 */
//****************


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
	public function afficheAccueil($monarticle,$monArtPopulaire,$nbrIdees,$nbrClick,$plusLu, $plusPartage, $plusCommente,$sondageMois) {
	//$this->_vueHeader->AfficheEntete();
	
		?>
		 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
               <!-- contenu du carousel -->
               <div class="carousel-inner hidden-xs">
                  <div class="item active">
                     <img src="./img/accueil/image.png" alt="image slide">
                  </div>
                  <div class="item">
                     <img src="./img/accueil/image.png" alt="image slide">
                  </div>
               </div>
            </div>
		<!-- debut de l'ensemble des articles (id&eacute;es) -->
		<article class="enssemble-articles">
  	 	  <article class="col-xs-12 col-md-8">
     	    <?php
       		  // cette boucle va afficher les articles (id&eacute;es).
     	    	
	 	      for ($i = 0;$i < 6; $i++) {
            ?>
            
      	  	<article class="col-xs-12 col-sm-6 col-md-6 idee">
         	<!-- le thumbnail -->
         	  <div class="thumbnail">
                <img src=<?php echo "./img/articles/".$monarticle[$i]["article_image"]?> alt="image application">
            	  <div class="caption">
               		<h4><?php echo ($monarticle[$i]["article_titre"]);?></h4>
               		
                  	  <!-- contenu du thumbnails -->
                  	  <p><?php echo Coupechaine::coupeChaineArticle($monarticle[$i]["article_contenu"]); ?></p>
               		
               	  	<!-- les icones du thumbnails -->
               		<div class="thumbs-up btnThumbs">
               			<input type="hidden" name="nArticle" value=<?php echo $monarticle[$i]["article_ID"]; ?>>
                  	  <input class='like' type="text" name="statistiques" value=<?php echo $monarticle[$i]["art_nb_likes"]; ?> disabled>
               		</div>
               		<div class="eye-open btnThumbs">
                  	  <input type="text" name="statistiques" value=<?php echo $monarticle[$i]["art_nb_vues"]; ?> disabled>
               		</div>
               		<div class="comment btnThumbs">
                  	  <input type="text" name="statistiques" value="3" disabled>
               		</div>
               		 <div class="medaille btnThumbs">
                    </div>
               		<!-- bouton lire la suite -->
               		<a href=<?php echo "index.php?p=articles&id=".$monarticle[$i]['article_ID'];?>?w=500 rel="popup_name" class="btn btn-default consultez" role="button">Consultez
               		</a>

           		 </div>

        	  </div>

    		</article>
      		<?php
       		  }
         
       		  ?>



  		  </article>
   		  <!-- col-xs-12  -->
<div id="popup_name" class="le_pop_up">
	<h2>Connexion</h2>
	<p>Veuillez vous connecter</p>
</div>
		</article>
		<aside>
		   <aside class="col-md-4 visible-md visible-lg">
		     <div class="panel panel-default">
		        <div class="panel-heading">
		           <h3 class="panel-title">SONDAGE DU MOIS</h3>
		        </div>
		        <div class="panel-body sondage">
		           <form action="#" class="form">

		              <p>
		                 Que pensez vous de l'invention des arbres lumineux ?
		              </p>
		              <?php
       		 
	 	      			for ($i = 0;$i < 3; $i++) {
            		  ?>
		              <input type="radio" name="sondage" class="ChoixSondage" id="btn"<?php echo $sondageMois[$i]["reponse_ID"]; ?> value=<?php echo $sondageMois[$i]["nombre_click"]; ?> checked="checked"> 
		              <label for="btn1"><?php echo $sondageMois[$i]["nom_reponse"]; ?></label>
		              <?php		           

             		}
         
		            ?>
		              <input class="btn btn-default" type="button" name="sondage" class="sondage" id="sondage-mois" value="Valider">
		           
		           </form>
		           <span id="spinner"></span>
		           <div class="graphe">
		           	
				    <?php
		           
             		for ($i = 0;$i < 3; $i++) {
         
		            ?>
					
					<div class="chargement"><?php echo $nbrClick[$i][ 'nombre_click' ] ?></div>
					 <?php
		           

             		}
         
		            ?>
		        </div>
				 </div>
		     </div>
		    
		  </aside>
		   <!-- file actualit&eacute; -->
		    <aside class="col-md-4 visible-md visible-lg"> <!-- ****** Modifications por le Fil d'actualit&eacute; par Vanessa ****** -->
		      <div class="panel-group" id="accordion">
		         <div class="panel">
		            <div class="panel-heading">
		               <h1 class="panel-title">
		                  <a data-toggle="collapse" data-parent="#accordion" href="#plusLu">LES PLUS LUS</a>
		               </h1>
		            </div>
           			<div id="plusLu" class="panel-collapse collapse in">
               		  <div class="panel-body">
		                  <ul>
		                    <?php 
							foreach ($plusLu as $cle=> $article){ //Pour chaque article qu'il trove dans la categorie de plusLu
							?>
                             <li><a href=<?php echo "index.php?p=articles&id=".$article['article_ID']?>><?php echo $article['article_titre']?></a><p><small> publi&eacute; le <?php echo $article['art_date_soumis']?></small><p/></li>
                             <?php
							}
							 ?>
		                  </ul>
	               </div>
           		  </div>
        	    </div>
		        <div class="panel"> 
		            <div class="panel-heading">
		               <h1 class="panel-title">
		                  <a data-toggle="collapse" data-parent="#accordion" href="#plusPartage">LES PLUS PARTAG&Eacute;S</a>
		               </h1>
		            </div>
		            <div id="plusPartage" class="panel-collapse collapse">
		               <div class="panel-body">
		                  <ul>
		                     <?php 
							foreach ($plusPartage as $cle=> $article){//Pour chaque article qu'il trove dans la categorie de plusPartage
							?>
                             <li><a href=<?php echo "index.php?p=articles&id=".$article['article_ID']?>><?php echo $article['article_titre']?></a><p><small> publi&eacute; le <?php echo $article['art_date_soumis']?></small><p/></li>
                             <?php
							}
							 ?>
		                  </ul>
		               </div>
		            </div>
				</div>
		         <div class="panel">
		            <div class="panel-heading">
		               <h1 class="panel-title">
		                  <a data-toggle="collapse" data-parent="#accordion" href="#plusCommente">LES PLUS COMMENT&Eacute;S</a>
		               </h1>
		            </div>
		            <div id="plusCommente" class="panel-collapse collapse">
		               <div class="panel-body">
		                  <ul>
		                     <?php 
							foreach ($plusCommente as $cle=> $article){  //Pour chaque article qu'il trove dans la categorie de plusCommente
							?>
                             <li><a href=<?php echo "index.php?p=articles&id=".$article['article_ID']?>><?php echo $article['article_titre']?></a><p><small> publi&eacute; le <?php echo $article['art_date_soumis']?></small><p/></li>
                             <?php
							}
							 ?>
                          </ul>
		               </div>
		            </div>
		         </div>
     		 </div>  
   		  </aside>
		  <!-- articles populaires -->
		  <aside class="col-md-4 visible-md visible-lg">
		      <div class="panel panel-default">
		         <div class="panel-heading">
		            <h3 class="panel-title">ARTICLES LES PLUS POPULAIRES</h3>
		         </div>
		         <div class="panel-body">
		            <?php
		            // cette boucle va afficher les articles (id&eacute;es).

             		for ($i = 0;$i < 4; $i++) {
         
		            ?>
		            <div class="media">
		               <a class="pull-left" href="#">
		               <img class="media-object" src=<?php echo "./img/articles/".$monArtPopulaire[$i]["article_image"]?> alt="image 1" width="80" height="60">
		               </a>
		               <div class="media-body">
		                  <h5 class="media-heading"><?php echo $monArtPopulaire[$i]['article_titre']; ?></h5>
		                  <?php echo Coupechaine::coupeChaineTitrePopul($monArtPopulaire[$i]['article_contenu']); ?> 
		                  <a href="#" class="btn-default" role="button"> <span class="glyphicon glyphicon-comment"></span> 15</a> 
		               </div>
				    </div>
		            <?php
		               
		               }
		            
		            ?>
       			  </div>
   			   </div>
  		  </aside>
  		   <!-- debut aside  -->
		   <aside class="col-md-4 visible-md visible-lg">
		       <!--<ul class="list-group">
		         <li class="list-group-item active">STATISTIQUES ACTUELLES</li>
		         <li class="list-group-item">
		            <span class="badge"><?php echo $nbrIdees; ?></span>
		            Nombre d'inventions
		         </li>
		         <li class="list-group-item">
		            <span class="badge"><?php echo $nbrIdees; ?></span>       
		            Nombre d'inventeurs
		         </li>
		         <li class="list-group-item"> 
		            <span class="badge">2</span>
		            Nombre de bailleurs de fonds
		         </li>
		      </ul>
		   </aside>-->
		  <!-- sondage -->
		 
	   </aside>
	   <!-- fin aside -->

	   <?php
	  
	}
	
		
	
	
	
	
	
	

}
?>