<?php
/**
 * @class VueArticles
 * ***************
 * @author Équipe3
 * @version beta
 */
//****************

class VueArticles {

    /**
     * fonction :                                       afficheListeArticles
         * Affiche la page de la liste d'articles
         * 
     * @access public
     * 
     */
    public function afficheListeArticles($aArticles) {
           
            ?>
            <article class="enssemble-articles">
                
                <div class="row">

                    <!-- - - - - - - - - - Colonne de gauche (MENU DES ARTICLES) -->
                    <div class="col-sm-2 visible-lg articles">
                        <div class="panel panel-default ">

                            <div class="panel-heading" >Les inventions</div> 
                            <div class="panel-body">
                                <ul class="nav nav-stacked">
                                    <li><a href="index.php?p=articles&cat=1">Sant&eacute;</a></li>
                                    <li><a href="index.php?p=articles&cat=2">Environnement</a></li>
                                    <li><a href="index.php?p=articles&cat=3">&Eacute;ducation</a></li>
                                    <li><a href="index.php?p=articles&cat=4">Technologie</a></li>
                                    <li><a href="index.php?p=articles&cat=5">Ing&eacute;nierie</a></li>
                                    <li><a href="index.php?p=articles&cat=6">Insolite</a></li>
                                </ul>
                            </div><!-- fin du panel body -->
                        </div><!-- fin du panel heading -->
                    </div><!-- fin de la colonne du menu des articles -->

                    <!-- - - - - - - - -  Colonne de droite (LISTE DES ARTICLES) -->
                    <div class="col-sm-9 articles">
                        <div class="panel panel-default">
                            <!-- Boîte de recherche dans l'entête -->
                             
                            <div class="panel-heading col-md-12">Cat&eacute;gorie : <?= $aArticles[0]['categorie_titre'];?>
                              
                            </div>


                            <div class="panel-body">

                                <div class="row">
                                    <?php
                                    if(count($aArticles) >0){  ?>
                                       Les articles (plus r&eacute;cent au plus ancien)

                                        <!-- table -->
                                        <table class="col-xs-12 table table-striped">
                                            <thead>
                                                <tr>

                                                    <th></th>
                                                    <th></th>
                                                    <th>Brevet?</th>
                                                    <th class="td-milieu">Cherche<br />financement ?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php
                                            foreach($aArticles as $cle => $article) { ?>                    
                                                <tr>
                                                   
                                                    <!-- Afficher l'image -->
                                                    <td><a href="index.php?p=articles&id=<?php echo $article['article_ID'];?>">
                                                        <?php $src="./img/articles/".$article['article_image'];?>
                                                        <img src="<?= $src;?>" width="70" height="70" alt="<?php echo $article['article_titre'];?>"></a>
                                                    </td>
                                                    <!-- Afficher le titre -->
                                                    <td><a href="index.php?p=articles&id=<?php echo $article['article_ID'];?>">
                                                        <?php echo $article['article_titre']?></a>
                                                    </td>
                                                    <!-- Mettre un crochet si invention brevet&eacute;e -->
                                                    <?php 
                                                    // var_dump($article);
                                                    if ($article['brevet_ID'] != NULL) {?> 
                                                        <td class="td-milieu"><i class="glyphicon glyphicon-ok"></i>
                                                        </td> <?php
                                                    } 
                                                    else {?>
                                                        <td></td> <?php    
                                                    }

                                                    if ($article['financement_ID'] == NULL) {?> 
                                                        <!-- Mettre un crochet si invention cherche financement -->
                                                        <td class="td-milieu"><i class="glyphicon glyphicon-ok"></i>
                                                        </td><?php    } 
                                                    else {?>
                                                        <td></td>
                                                    <?php    }?>

                                                </tr>

                                            <?php 
                                            }

                                        }
                                    else
                                    {
                                        ?>
                                            <li>Aucun article à afficher</li>
                                        <?php 
                                    }
                                    ?>
                                        </tbody>

                                    </table>  

                                    <!-- fin table -->                          
                                </div><!-- fin du "row" -->
                            </div><!-- fin du panel body -->
                        </div><!-- fin du panel -->
                    </div><!-- fin de la colonne du menu des articles -->

                </div><!-- fin de l'article principal -->
            </article> 
    <?php
        
    } // Fin de la fonction afficheListeArticles
    
    /** *******************************************************************
         *                                                       afficheArticle
     * Affiche la page pour un article
     * @access public
     * 
     *********************************************************************/
    public function afficheArticle($aArticles=Array()) {
            ?>
            <article>
              
                <div class="row">
                
                <!-- - - - - - - - - - Colonne de gauche (MENU DES ARTICLES) -->
                <div class="col-sm-2 visible-lg articles">
                    <div class="panel panel-default ">
                        
                        <div class="panel-heading" >Les inventions</div> 
                        <div class="panel-body">
                            <ul class="nav nav-stacked">
                                <li><a href="index.php?p=articles&cat=1">Sant&eacute;</a></li>
                                <li><a href="index.php?p=articles&cat=2">Environnement</a></li>
                                <li><a href="index.php?p=articles&cat=3">&Eacute;ducation</a></li>
                                <li><a href="index.php?p=articles&cat=4">Technologie</a></li>
                                <li><a href="index.php?p=articles&cat=5">Ing&eacute;nierie</a></li>
                                <li><a href="index.php?p=articles&cat=6">Insolite</a></li>
                            </ul>
                        </div><!-- fin du panel body -->
                    </div><!-- fin du panel heading -->
                </div><!-- fin de la colonne du menu des articles -->
                <!-- - - - - - - - -  Colonne de droite (ARTICLE À AFFICHER) -->
                <?php
                if(count($aArticles) >0)
                { ?>
                    <div class="col-sm-10">
                        <div class="panel panel-default">
                            
                            <div class="panel-heading">Cat&eacute;gorie : <?= $aArticles['categorie_titre'];?>

                            </div>

                            <div class="panel-body m-panel-body">

                                <div class="row m-panel-body">

                                    <!-- Afficher l'image -->
                                    <?php $src="./img/articles/".$aArticles['article_image'];?>
                                    <img src="<?= $src;?>" class="img-responsive pull-right" alt="<?php echo $aArticles['article_titre'];?>">
                                    
                                    <!-- Afficher date de soumission -->
                                    Date de soumission : <?= strftime("%Y/%m/%d",strtotime($aArticles['art_date_soumis'])) . "\n"; ?><br />
                                    
                                    <!-- Mettre "OUI" si invention brevet&eacute;e -->
                                    <?php 
                                    if ($aArticles['brevet_ID'] != NULL) {?> 
                                        BREVET : OUI<br/>
                                        <?php
                                    } 
                                    else {?>
                                        BREVET : NON<br/><?php    
                                    }

                                    if ($aArticles['financement_ID'] == NULL) {?> 
                                        <!-- Mettre OUI si cherche financement -->
                                         CHERCHE FINANCEMENT : OUI<br/>
                                        <?php
                                    } 
                                    else {?>
                                        CHERCHE FINANCEMENT : NON<br/><?php    
                                    }?>
                                    <!-- MIMI : À FAIRE 
                                    <!--<a class="btn btn-default btn-financer" href="#" >Je veux FINANCER ce projet</a> <br /> -->
                                    <?php
                                    echo "<h2>".$aArticles['article_titre'] ."</h2>";
                                    echo "<p>".$aArticles['article_contenu'] ."</p>";
                                   ?>
                                    <p>Auxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit rectoremque ut sibi iudicio imperiali addictum calcibus incessens et pugnis conculcans seminecem laniatu miserando discerpsit. post cuius lacrimosum interitum in unius exitio quisque imaginem periculi sui considerans documento recenti similia formidabat.
                                    </p>

                                     <p>Thalassius vero ea tempestate praefectus praetorio praesens ipse quoque adrogantis ingenii, considerans incitationem eius ad multorum augeri discrimina, non maturitate vel consiliis mitigabat, ut aliquotiens celsae potestates iras principum molliverunt, sed adversando iurgandoque cum parum congrueret, eum ad rabiem potius evibrabat, Augustum actus eius exaggerando creberrime docens, idque, incertum qua mente, ne lateret adfectans. quibus mox Caesar acrius efferatus, velut contumaciae quoddam vexillum altius erigens, sine respectu salutis alienae vel suae ad vertenda opposita instar rapidi fluminis irrevocabili impetu ferebatur.
                                    </p>

                                    <p>Auxerunt haec vulgi sordidioris audaciam, quod cum ingravesceret penuria commeatuum, famis et furoris inpulsu Eubuli cuiusdam inter suos clari domum ambitiosam ignibus subditis inflammavit rectoremque ut sibi iudicio imperiali addictum calcibus incessens et pugnis conculcans seminecem laniatu miserando discerpsit. post cuius lacrimosum interitum in unius exitio quisque imaginem periculi sui considerans documento recenti similia formidabat.
                                    </p>
                                </div><!-- fin du "row" -->
                            </div><!-- fin du panel body -->
                        </div><!-- fin du panel -->
                    </div><!-- fin de la colonne du menu des articles -->
                <?php
                }
                else
                {
                    ?>
                    <p>Aucun article correspondant</p>
                    <?php 
                }
                ?>

            </article>
            <?php
        
    } // Fin de la fonction afficheArticle
    

} // Fin de la classe  VueArticles

?>