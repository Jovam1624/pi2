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

	public function afficheAccueil($monarticle,$monArtPopulaire,$nbrIdees,$nbrClick,$plusLu, $plusPartage, $plusCommente,$sondageMois,$monIp) {
	
		?>
		 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
               
               <div class="carousel-inner hidden-xs">
                  <div class="item active">
                     <video autoplay="true">
                <!--<source src="./video/eurekaApps.mp4" type="video/mp4">-->
                Cet Navigateur ne support pas ce video.
            </video>
                  </div>
                  
               </div> 
            
        </div>
		<!-- debut de l'ensemble des articles (id&eacute;es) -->
		<article class="enssemble-articles">
  	 	  <article class="col-xs-12 col-md-8">
  	 	  	<input type="hidden" name="ip" id="ip" value=<?php echo $monIp=0; ?>>
     	    <?php
       		  // cette boucle va afficher les articles (id&eacute;es).
     	    	
	 	      for ($i = 0;$i < 8; $i++) {
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
                  	  <input class='like' id="verifLike" type="text" name="statistiques" value=<?php echo $monarticle[$i]["art_nb_likes"]; ?> disabled>
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
               		<a href=<?php echo "index.php?p=articles&id=".$monarticle[$i]['article_ID'];?> rel="popup_name" class="btn btn-default consultez" role="button">Consultez
               		</a>

           		 </div>

        	  </div>

    		</article>
      		<?php
       		  }
         
       		  ?>
<div id="pop-up-insc" class="pop-up-insc modale">
  <div class="row-fluid">
    <div class="offset1 span10">
      <form>
        <div class="control-group">
          <h1>Login:</h1>
       </div>
       <div class="control-group">
       	<h1>Pas encore membre?</h1>
       </div>
       <div class="control-group">
        <a href="index.php?p=connexion" type="button" class="btn btn-default btn-sm btn-clique">Connexion</a>
          			<a href="index.php?p=inscription" type="button" class="btn btn-default btn-sm btn-clique">Inscription</a> 
       </div>
       
       
     </form>
   </div>
  </div>
</div>
		<div id="bg-obscure">

		</div>



  		  </article>
   		  <!-- col-xs-12  -->

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
                             <li>
                                <a href=<?php echo "index.php?p=articles&id=".$article['article_ID']?>><img class="images col-xs-3" src=<?php echo "./img/articles/".$article["article_image"]?> alt="image" height="60"></a>
                                <a class="titre col-xs-9" href=<?php echo "index.php?p=articles&id=".$article['article_ID']?>><?php echo $article['article_titre']?></a>
                                <p  class="datePublie col-xs-10 col-xs-offset-3"> publi&eacute; le <?php echo $article['art_date_soumis']?><p/>
                             </li>
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
                             <li>
                                <a href=<?php echo "index.php?p=articles&id=".$article['article_ID']?>><img class="images col-xs-3" src=<?php echo "./img/articles/".$article["article_image"]?> alt="image" height="60"></a>
                                <a class="titre col-xs-9" href=<?php echo "index.php?p=articles&id=".$article['article_ID']?>><?php echo $article['article_titre']?></a>
                                <p  class="datePublie col-xs-10 col-xs-offset-3"> publi&eacute; le <?php echo $article['art_date_soumis']?><p/>
                             </li>
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
                             <li>
                                <a href=<?php echo "index.php?p=articles&id=".$article['article_ID']?>><img class="images col-xs-3" src=<?php echo "./img/articles/".$article["article_image"]?> alt="image" height="60"></a>
                                <a class="titre col-xs-9" href=<?php echo "index.php?p=articles&id=".$article['article_ID']?>><?php echo $article['article_titre']?></a>
                                <p  class="datePublie col-xs-10 col-xs-offset-3"> publi&eacute; le <?php echo $article['art_date_soumis']?><p/>
                             </li>
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
		            <h3 class="panel-title">RESEAUX SOCIAUX</h3>
		         </div>
		         <div class="panel-body">
		            <div class="fb-like col-lg-4 col-md-4" data-href="https://www.facebook.com/pages/Journal-Eureka/1435830350024137" data-width="159" data-layout="button_count" data-action="like" data-share="false"></div>    <!-- div partager par FACEBOOK-->
            <script>
                (function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/fr_CA/sdk.js#xfbml=1&version=v2.0";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
        
                <div class="twitter-share-button col-lg-6 col-md-6"> <!-- div partager par TWITTER-->
                    <a href="https://twitter.com/Eureka_Journal" class="twitter-follow-button" data-show-count="false" data-lang="fr">Suivre @JournalEureka</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </div>
                <div class="col-lg-2 col-md-2">  <!-- div partager par courriel-->
                    <a href="mailto:jovam1624@gmail.com" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-envelope"></span></a>
                </div>
                <div class="fb-like-box" data-href="https://www.facebook.com/pages/Journal-Eureka/1435830350024137" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
                </div>     
                    
                
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