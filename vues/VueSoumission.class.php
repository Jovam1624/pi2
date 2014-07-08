<?php
/**
 * @class VueSoumission
 * ***************
 * @author Équipe3
 * @version alpha
 * Pas encore implémentée
 */
//****************


class VueSoumission {

    public function afficheSoumission(){
            ?>
		 
        <div id="retour" class="container container-globale">

            <!--  - - - - - - - - - - - - - - - - - - - - - - -ARTICLE PRINCIPAL -->
            <article class="enssemble-articles">
                <div class="row">
                    
                    <!-- - - - - - - - - - Colonne de gauche (MENU DES ARTICLES) -->
                    <div class="col-sm-3">
                        <div class="panel panel-default">

                            <div class="panel-heading" >Les inventions</div> 
                            <div class="panel-body">
                                <ul class="nav nav-stacked">
                                    <li><a href="index.php?p=articles&cat=sante">Santé</a></li>
                                    <li><a href="index.php?p=articles&cat=environnement">Environnement</a></li>
                                    <li><a href="index.php?p=articles&cat=education">Éducation</a></li>
                                    <li><a href="index.php?p=articles&cat=technologie">Technologie</a></li>
                                    <li><a href="index.php?p=articles&cat=ingenierie">Ingénierie</a></li>
                                    <li><a href="index.php?p=articles&cat=insolite">Insolite</a></li>
                                </ul>
                            </div><!-- fin du panel body -->
                                
                        </div><!-- fin du panel heading -->
                    </div><!-- fin de la colonne du menu des articles -->

                    <!-- - - - - - - - - - - -   Colonne de droite (FORMULAIRE ) -->
                    <article class="col-sm-9 nouvelles-panel">

                        <div class="panel">

                            <div class="panel-heading col-md-12">
                                 Les champs marqués d'un * sont obligatoires
                            </div>
                        </div> 

                        <section class="panel-body">

                            <div class="well forme_article">

                                <form class="form-horizontal" role="form" method="POST" id="soumission">

                                    <div class="form-group">
                                        <label for="idMembre" class="col-sm-3 control-label">ID membre</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="idMembre" value="Membre 1234">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="date" class="col-sm-3 control-label">Date</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="date" 
                                                   value=<?php echo date("Y/m/d") ?>>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="idBrevet" class="col-sm-3 control-label">No. de brevet</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="idBrevet" placeholder="">
                                        </div>
                                        <div class="col-sm-3">
                                            Laisser en blanc si invention  non brevetée
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="titre" class="col-sm-3 control-label">Titre de l'article<br /> (max. 70)<sup>*</sup></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="titre" placeholder="">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="tLong" class="col-sm-3 control-label">Contenu (copie-coller, max :1000)<sup>*</sup> </label>
                                        <div class="col-sm-9">
                                            <input type="textarea" class="form-control" id="tLong" placeholder="">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                  <input type="checkbox"> Je cherche du financement
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                        <p>
                                        Après vérification, un courriel vous sera envoyé 
                                        pour vous indiquer la façon de nous envoyer des photos si vous le désirez   

                                        </p>

                                    </form> <!-- fin du "formulaire" -->           
                                <!--<a class="btn btn-default btn-publier" href="*" >SOUMETTRE</a> -->
                                <a class="btn btn-default btn-publier" href="index.php?p=accueil" >Annuler</a>                    
                            </div> <!-- Fin du well -->
                        </section> 
                    </article><!-- fin du panel-->

            </article><!-- fin du panel-->


        </div> <!-- Fin du "no gutter" -->
           

    <?php
    }
}
?>
