<?php
/**
 * @class VueAdminArticles
 * ***************
 * @author Équipe3
 * @version beta
 */
//****************

class VueAdminArticles {

    /**
     * fonction :                                     
         * Affiche la page de la liste d'articles
         * 
     * @access public
     * 
     */
    public function afficheAdminArticles($aArticles) {
           
        ?>

        <div class="row">
            <?php
            if(count($aArticles) >0){  ?>

                <table class="col-xs-12 table table-striped">
                    <thead>
                        <tr>

                           
                            <th>Date</th>
                            <th>Titre</th>
                            <th class="td-milieu">Breveté</th>
                            <th class="td-milieu">Financé</th>
                            <th class="td-milieu">Éditer</th>
                            <th class="td-milieu">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                    foreach($aArticles as $cle => $article) { ?>                    
                        <tr>
                           
                            <!-- Afficher la date de soumission -->
                            <td><?php echo $article['art_date_soumis'];?>
                            </td>
                            <!-- Afficher le titre -->
                            <td>
                                <?php echo $article['article_titre']; ?></a>
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
                                <td></td><?php 
                            }?>   
                             <!-- Afficher l'icone "edit" -->   
                            <td class="td-milieu"><a href="index.php?p=adminArticles&action=editer&id=<?php echo $article['article_ID'];?>">                           
                                <img src="img/icones/bd_editer.png" alt="Éditer" title="Éditer"></a>
                            </td>
                            <!-- Afficher l'icone "supprimer" -->   
                                <td class="td-milieu"><a href="index.php?p=adminArticles&action=supprimer&id=<?php echo $article['article_ID'];?>">
                                    <img src="img/icones/bd_supprimer.png" alt="Supprimer" title="Supprimer" ></a>
                                </td>
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

    <?php
        
    } // Fin de la fonction afficheListeArticles
    
    /** *******************************************************************
         *                                                       afficheArticle
     * Affiche la page pour un article
     * @access public
     * 
     *********************************************************************/
    public function afficheAdminArticle($aArticle=Array()) {
        ?>

        <div class="row">

            <?php
            if(count($aArticle) >0)
                { ?>
                    <form role="form" action="index.php?p=soumission" method="POST">
                        
                    <div class="article_ID row">
                        <label for="article_ID" class='col-sm-2'>ID article</label>
                        <div  class='col-sm-2'>
                            <input type="text" id="article_ID" value="<?php echo $aArticle['article_ID']; ?>">
                            <!-- <input type="text" class="form-control col-sm-2" name="membre_ID" value="<php echo $_SESSION['Utilisateur']?>"> -->
                        </div>
                        <span class="error row"><?php echo (isset($tabErr["article_ID"])) ? $tabErr["article_ID"] : "" ?></span>
                        <br />
                    </div>  
                        
                        <div class="membre_ID row">
                        <label for="membre_ID" class='col-sm-2'>ID membre</label>
                        <div  class='col-sm-2'>
                            <input type="text" id="membre_ID" value="<?php echo $aArticle['membre_ID']; ?>">
                            <!-- <input type="text" class="form-control col-sm-2" name="membre_ID" value="<php echo $_SESSION['Utilisateur']?>"> -->
                        </div>
                        <span class="error row"><?php echo (isset($tabErr["membre_ID"])) ? $tabErr["membre_ID"] : "" ?></span>
                        <br />
                    </div>  
                        
                    
                    <div class="art_date_soumis row">
                        <label for="art_date_soumis" class="col-sm-2">Date de soumission</label>
                        <div class='col-sm-2'>
                            <input type="text" id="art_date_soumis" value=<?php echo $aArticle['art_date_soumis']; ?>>
                        </div>
                        <span class="error row"><?php echo (isset($tabErr["art_date_soumis"])) ? $tabErr["art_date_soumis"] : "" ?></span>
                        <br />
                    </div>

                    

                    <div class="article_titre row">
                        <label for="article_titre" class='col-sm-2'>Titre</label>
                        <div class='col-sm-10'>
                            <input type="text" class="col-sm-9" id="article_titre" value="<?php echo $aArticle['article_titre']; ?>" required>
                        </div>
                        <span class="error row"><?php echo (isset($tabErr["article_titre"])) ? $tabErr["article_titre"] : "&nbsp;" ?></span>
                        <br />
                    </div>

                    <div class="article_contenu row">
                        <label for="article_contenu"  class='col-sm-2'>Contenu</label>
                        <div class='col-sm-10'>
                            <textarea rows="10" class="form-control col-sm-9" id="article_contenu" required><?php echo $aArticle['article_contenu']; ?></textarea>
                        </div>
                        <span class="error row"><?php echo (isset($tabErr["article_contenu"])) ? $tabErr["article_contenu"] : "" ?></span>
                        <br />
                    </div>
                        
                    <div class="art_nb_likes row">
                        <label for="art_nb_likes" class="col-sm-2">Nombre de "Like"</label>
                        <div class="col-sm-1">
                            <input type="text" id="art_nb_likes" value=<?php echo $aArticle['art_nb_likes']; ?>>
                        </div>
                        <span class="error row"></span>
                        <br />
                    </div>
                        
                    <div class="art_nb_vues row">
                        <label for="art_nb_vues" class="col-sm-2">Nombre de vues</label>
                        <div class="col-sm-2">
                            <input type="text" id="art_nb_vues" value=<?php echo $aArticle['art_nb_vues']; ?>>
                        </div>
                        <span class="error row"></span>
                        <br />
                    </div>
                        
                    <div class="art_nb_comment row">
                        <label for="art_nb_comment" class="col-sm-2">Nb de commentaires</label>
                        <div class="col-sm-3">
                            <input type="text" id="art_nb_comment" value=<?php echo $aArticle['art_nb_comment']; ?>>
                        </div>
                        <span class="error row"></span>
                        <br />
                    </div>
                        
                    <div class="article_image row">
                        <label for="article_image" class='col-sm-2'>Lien image</label>
                        <div class='col-sm-4'>
                            <input type="text" id="article_image" value="<?php echo $aArticle['article_image']; ?>">
                            <!-- <input type="text" class="form-control col-sm-2" name="membre_ID" value="<php echo $_SESSION['Utilisateur']?>"> -->
                        </div>
                        <span class="error row"><?php echo (isset($tabErr["article_image"])) ? $tabErr["article_image"] : "" ?></span>
                        <br />
                    </div>

                    
                    <div class="categorie_ID row">
                        <label for="categorie_ID" class="col-sm-2">Catégorie</label>
                        <div class='col-sm-3'>
                            <input type="text" id="categorie_ID" value="<?php echo $aArticle['categorie_ID']; ?>">
                            <!-- <input type="text" class="form-control col-sm-2" name="membre_ID" value="<php echo $_SESSION['Utilisateur']?>"> -->
                        </div>
                        <span class="error row"><?php echo (isset($tabErr["categorie_ID"])) ? $tabErr["categorie_ID"] : "" ?></span>
                        
                        <br />
                    </div>

                    <div class="categorie_ID row">
                        <label for="categorie_ID" class="col-sm-2">ID financement</label>
                        <div class='col-sm-3'>
                            <input type="text" id="financement_ID" value=<?php echo $aArticle['financement_ID']; ?>>
                        </div>
                        
                        <span class="error row"><?php echo (isset($tabErr["financement_ID"])) ? $tabErr["financement_ID"] : "" ?></span>
                        <br />
                    </div>
                        
                    <div class="brevet_ID row">
                        <label for="brevet_ID" class="col-sm-2">ID brevet</label>
                        <div class="col-sm-3">
                            <input type="text" id="brevet_ID" value=<?php echo $aArticle['brevet_ID']; ?>>
                        </div>
                        
                        <span class="error row"><?php echo (isset($tabErr["brevet_ID"])) ? $tabErr["brevet_ID"] : "" ?></span>
                        <br />
                    </div>
                        
                   
                    <div class="article_statut row">
                        <label for="article_statut" class="col-sm-2">article_statut</label>
                        <div class="col-sm-3">
                            <input type="text" id="article_statut" value=<?php echo $aArticle['article_statut']; ?>>
                        </div>
                        
                        <span class="error row"><?php echo (isset($tabErr["article_statut"])) ? $tabErr["article_statut"] : "" ?></span>
                        <br />
                    </div>

                    

                    <div class="submit_soumission row">
                        <label for="soumission"  class='col-sm-2'></label>
                        <div class='col-sm-3'>    
                            <button type="submit" name="soumission" class="btn btn-default">Soumettre</button>
                        </div>
                        <br />
                    </div>



                </form> 
            <?php
            }
            else
            {
                ?>
                <p>Aucun article correspondant</p>
                <?php 
            }
        ?></div><?php 
        
    } // Fin de la fonction afficheArticle
    

} // Fin de la classe  VueArticles

?>