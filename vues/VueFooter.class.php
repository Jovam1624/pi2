<?php
/**
 * @class VueFooter
 * ***************
 * @author Équipe3
 * @version beta
 */
//****************
class VueFooter {

	//******************************
	public function AfficheFooter()
	{
	?>
	<!-- début footer -->
    </div> <!--ferme la division ouverte dans header -->
      <footer>
      <!-- un container pour centrer le contenu du footer -->
	      <div class="container container-footer">
	        <ul class="row">
	           <li class="hidden-xs col-md-4"><a href="index.php?p=accueil">Accueil</a></li>
	           <li class="hidden-xs col-md-4"><a href="index.php?p=form_article">Je veux publier une invention</a></li>
	           <li class="hidden-xs col-md-4"><a href="index.php?p=contact">Contact</a></li>
	           <li class="hidden-xs col-md-4"><a href="index.php?p=articles">Inventions</a></li>
	           <li class="hidden-xs col-md-4"><a href="index.php?p=accueil">Je veux financer un projet</a></li>
	           <li class="hidden-xs col-md-4"><a href="index.php?p=*">Partenariats</a></li>
	           <li class="hidden-xs col-md-4"><a href="index.php?p=forum">Forum</a></li>
	        </ul>
	        <!-- partie copyright -->
	    	<div>
	            <summary>
	                <h6>Copyright 2014. Eureka - Tous droits reacuteserveacutes</h6>
	            </summary>
	        </div>
	      </div>
	  	  <!-- ancre nommée pour retourner en haut -->
	     <button type="button" class="btn btn-default btn-lg btn-retour hidden-xs">
		     <a href="#retour">
		    	<span class="glyphicon glyphicon-chevron-up"></span>
		     </a>
	      </button>
    	</footer>
    	
     <!-- jQuery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <!-- fichier jd bootstrap -->
     <script src="./js/bootstrap.min.js"></script>
     <!-- <script src="js/sondage.js"></script>-->
     <script src="js/statistiques.js"></script>
     <script src="js/like.js"></script>
     <script src="js/inscription.js"></script>
    <!-- <script src="js/verif-user.js"></script>-->
    <!-- <script src="js/admin.js"></script> -->
     <script src="js/scrollTop.js"></script>
	 <script src="js/sondage-mois.js"></script>
	 <script src="js/commentaire.js"></script>
	 <script type="text/javascript">
	</script> 
  </body>
</html>
	<?php
	}
	

}
?>