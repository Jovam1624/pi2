<?php
/**
 * @class VueSoumission
 * *********************
 * @author Équipe3
 * @version finale
 * 
 */
//*********************


class VueSoumission {

    
   public function afficheFormulaire($tabErr =""){ 
      
    ?>
      

        <!--  - - - - - - - - - - - - - - - - - - - - - - -ARTICLE PRINCIPAL -->
        <article class="enssemble-articles">
            <div class="row">

                <!-- - - - - - - - - - Colonne de gauche (MENU DES ARTICLES) -->
                <div class="col-sm-2 visible-lg">
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
                <article class="col-sm-10 nouvelles-panel">

                    <div class="panel panel-default">

                        <div class="panel-heading col-sm-12">
                             Les champs marqués d'un * sont obligatoires
                        </div>
                    </div> 

                    <section class="panel-body">

                        <div class="row">

                            <form role="form" action="index.php?p=soumission" method="POST">



                                <div class="alias_membre row">
                                    <label for="alias" class='col-sm-2'>Alias membre</label>
                                    <div class='col-sm-3'>
                                       <!-- <input type="text" id="membre_alias" value="Remplacer"> -->
                                        <input type="text" class="form-control col-sm-2" name="alias" value=<?= "'".$_SESSION['utilisateur']."'" ?>> 
                                    </div>
                                    <span class="error col-sm-2-offset"><?php echo (isset($tabErr["membre_alias"])) ? $tabErr["membre_alias"] : "" ?></span>
                                    <br />
                                </div>

                                <div class="art_date_soumis row">
                                    <label for="art_date_soumis" class="col-sm-2">Date</label>
                                    <div class='col-sm-3'>
                                        <input type="text" id="art_date_soumis" name="dateSoumission" value=<?php echo $art_date_soumis = date("Y/m/d") ?>>
                                    </div>
                                    <br />
                                    <span class="error col-sm-2-offset"><?php echo (isset($tabErr["art_date_soumis"])) ? $tabErr["art_date_soumis"] : "" ?></span>
                                    <br />
                                </div>

                                <div class="brevet_ID row">
                                    <label for="brevet_ID" class="col-sm-2">No. de brevet</label>
                                    <div class="col-sm-3">
                                        <input type="text" id="brevet_ID" name="brevet">
                                    </div>
                                    <div class="col-offset-1 col-sm-5">
                                        Laisser vide si invention  non brevetée
                                    </div>
                                    <span class="col-sm-2-offset error"><?php echo (isset($tabErr["brevet_ID"])) ? $tabErr["brevet_ID"] : "" ?></span>
                                    <br />
                                </div>

                                <div class="article_titre row">
                                    <label for="article_titre" class='col-sm-2'>Titre<sup>*</sup></label>
                                    <div class='label_titre col-sm-10'>
                                        <input type="text" class="form-control col-sm-12" name="titre" id="article_titre" placeholder="Titre de l'article" required>
                                    </div>
                                    <span class="col-sm-2-offset error" col-sm-offset-2 col-sm-10><?php echo (isset($tabErr["article_titre"])) ? $tabErr["article_titre"] : "&nbsp;" ?></span>
                                    <br />
                                </div>

                                <div class="article_contenu row">
                                    <label for="article_contenu"  class='col-sm-2'>Contenu<sup>*</sup></label>
                                    <div class='label_contenu col-sm-10'>
                                        <textarea rows="10" cols="100" class="form-control col-sm-12" name="contenu" id="article_contenu" required>
                                        </textarea>
                                    </div>
                                    <span class="col-sm-2-offset error"><?php echo (isset($tabErr["article_contenu"])) ? $tabErr["article_contenu"] : "" ?></span>
                                    <br />
                                </div>

                                <div class="categorie_ID row">
                                    <label for="categorie_ID" class="col-sm-2">Catégorie</label>
                                    <div class="label_category col-sm-3">
                                        <select name="categorie">

                                            <option value="1">Santé</option>
                                            <option value="2">Environnement</option>
                                            <option value="3">Éducation</option>
                                            <option value="4">Technologie</option>
                                            <option value="5">Insolite</option>
                                            <!-- MIMI À FAIRE : Aller chercher les catégories dans la BdeD
                                            <!-- ?php

                                            while ($row=PDO::FETCH_COLUMN(2)) {

                                                $categorie = $row["categorie_titre"];
                                                 echo "<option value='$categorie'>$categorie</option>\n";
                                            }
                                            ?> -->

                                        </select>
                                    </div>
                                    <br />
                                </div>

                                <div class="checkbox row">
                                    <label for="categorie_ID"  class='col-sm-2'></label>
                                    <div class='col-sm-3'>    
                                        <input type="checkbox" name="financement" value="non" id="categorie_ID"> Je cherche du financement
                                    </div>
                                    <br />
                                </div>
                                
                                <div class="note row">
                                    <label for="note"  class='col-sm-2'></label>
                                    <div class='col-sm-12'>    
                                        Notez qu'une fois l'article approuvé pour 
                                        publication, nous vous enverrons un courriel
                                        vous permettant de nous envoyer des images si
                                        vous le désirez
                                    </div>
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
                        </div>
                    </section>
                </article> 
            </div>
      </article>
           
   <?php         
   }

}
?>

