<?php
/**
 * @class VueHeader
 * ***************
 * @author Équipe3
 * @version beta
 */
//****************

// Afficher le Header de chaque page
class VueHeader {
	
	public function AfficheEntete($tabMeta)	{

	?>
	<!DOCTYPE html>
	<html lang="fr">
   	<head>
      <meta charset="utf-8">
      <!-- Le commentaire qui suit (balise meta) est pour
         fixerle probleme de validation -->
      <!--[if ie]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      -->

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content=<?="'".$tabMeta["description"]."'";?>>
      <meta name="keywords" content=<?="'".$tabMeta["keywords"]."'";?>>
      <title><?= $tabMeta["title"];?></title>
      <link href="./css/bootstrap.min.css" rel="stylesheet">
      <link href="./css/recherche.css" rel="stylesheet">
      <link href="./css/contact.css" rel="stylesheet">
      <link href="./css/inscription.css" rel="stylesheet">
      <link href="./css/categories.css" rel="stylesheet">
      <link href="./css/style.css" rel="stylesheet">
      <link href="./css/forum.css" rel="stylesheet">
      <link href="./css/font-awesome.css" rel="stylesheet">  
       <link href="./css/fonts.css" rel="stylesheet" type="text/css" >
       
 
    </head>
    <body>
    	<div id="retour" class="container container-globale">	
	<?php
	}
	// ***************************
	public function AfficheMenu(){
	?>
	<header class="header-principal">
      <div class="menu">       
    	<nav class="navbar navbar-default navbar-fixed-top hidden-xs" role="navigation">
      		<main>
    		<!--<a class="navbar-brand hidden-xs" href="index.php"><img src="./img/logo.png" alt="logo"/></a>-->
       			<figure><h1>EUREKA</h1>
       				<span>Journal d'inventions</span>
       			</figure>	
     				<div class="inscription">
               		<div class="reseaux-sociaux">
                		<a href="http://www.linkedin.com/pub/eureka-journal-d-id%C3%A9es/9b/741/8a7" target="_blank"><span class="icon-linkedin"></span></a>
                        <a href="https://twitter.com/Eureka_Journal" target="_blank"><span class="icon-twitter"></span></a>
                        <a href="https://www.facebook.com/pages/Journal-Eureka/1435830350024137?fref=ts" target="_blank"><span class="icon-facebook"></span></a>        
                  </div>
   				     <?php if(isset($_SESSION['utilisateur'])) {
   							?>
                	<form role="form" action="index.php?p=index" method="POST">
                  	<small>Bienvenue <?= $_SESSION['utilisateur'] ?></small>
                  	<button type="submit" name="deconnect" class="btn btn-default btn-sm btn-clique">Déconnexion</button>
                 	</form>    							
       				<?php
       				} else {
       					?>
       					<a href="index.php?p=connexion" type="button" class="btn btn-default btn-sm btn-clique">Connexion</a>
          			<a href="index.php?p=inscription" type="button" class="btn btn-default btn-sm btn-clique">Inscription</a> 
              <?php
       				}
    				?>
  			</div>
			</main>
	    </nav>
	    <nav class="navbar navbar-default" role="navigation">
    	  <div class="container-fluid">
         
        	<div class="navbar-header">
          		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
          		</button>
          		<a class="navbar-brand visible-xs" href="index.php?p=accueil"><span class="logo"> Eureka </span></a>
     			<a class="navbar-brand hidden-xs" href="index.php?p=accueil"><i class="fa fa-home"></i></a>
	        </div>
	        
    	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        	  <ul class="nav navbar-nav">
            	<li class="dropdown">
              		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventions <b class="caret"></b></a>
		           	<ul class="dropdown-menu">
		                <li><a href="index.php?p=articles&cat=1">Sant&eacute;</a></li>
		                <li><a href="index.php?p=articles&cat=2">Environnement</a></li>
		                <li><a href="index.php?p=articles&cat=3">&eacute;ducation</a></li>
		                <li><a href="index.php?p=articles&cat=4">Technologie</a></li>
		                <li><a href="index.php?p=articles&cat=5">Ing&eacute;nierie</a></li>
		                <li><a href="index.php?p=articles&cat=6">Insolite</a></li>
	                </ul>
		       </li>
	               <li><a href="index.php?p=soumission">Je veux publier une invention</a></li>
	               <li><a href="index.php?p=forum">Forum</a></li>
	               <li><a href="index.php?p=contact">Contact</a></li>
            </ul>
                <form class="navbar-form navbar-right" role="search" method="get" >
                    <div class="form-group">
             		 <input type="hidden" name="p" value="recherche"/>
                        <input type="text" name="recherche" value="" class="form-control" placeholder="recherche" />
                    </div>
                   
                    <a href="index.php?p=recherche"><button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-search"></span></button></a>
                </form>

            </div><!-- /.navbar-collapse -->
      	  </div><!-- /.container-fluid -->
    	</nav>
	  </div>
    </header><!-- fin header -->

    <?php
    }     	

}
?>