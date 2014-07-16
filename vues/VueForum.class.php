<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VueForum
 *
 * @author JacquesJunior
 */
class VueForum {
   
    
    //declaration de la methode pour afficher la page forum
    public function afficherForum($posts, $postComments){
        ?>
         <main class="row col-lg-12 row-forum">
            <section class="col-lg-8">
                <?php 
                    foreach ($posts as $key => $post) {
                            ?>

                                <article>
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <h3><a href="#"><?= $post['billet_titre'] ?></a></h3>
                                        </div>
                                    </div>
                                    <p><?= Coupechaine::coupeChaineArticle($post['billet_contenu']) ?></p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <li><i class="icon-calendar"></i><?= $post['billet_date'] ?></li>
                                            <li><i class="icon-comments"></i><a href="index.php?p=forum&id=<?= $post['billet_ID'] ?>"><?= $postComments[$post['billet_ID']]; ?> Commentaire<?= ($postComments[$post['billet_ID']]>1)?'s':'';  ?></a></li>
                                        </ul>
                                        
                                        <a href="#" class="pull-right"><a href="index.php?p=forum&id=<?= $post['billet_ID'] ?>">Lire la suite</a><i class="icon-angle-right"></i></a>
                                    </div>
                                </article>
                               
                         <?php 

                    }
                ?>          
            </section>
            <section class="col-lg-4">
                <aside class="right-sidebar">               
                    <div class="widget">
                                        <h5 class="widgetheading"><strong>Catégories</strong></h5>
                        <ul class="cat">
                            <li><i class="icon-angle-right"></i><a href="index.php?p=forum&id=<?= $post['categories_inventions_ID'] ?>">Les Inventions brevetées</a><span></span></li>
                            <li><i class="icon-angle-right"></i><a href="#">Les Inventions tiers Personnes</a><span</span></li>
                            <li><i class="icon-angle-right"></i><a href="#">Les Inventions Financées</a><span></span></li>                      
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widgetheading">Dernières publications</h5>
                        <ul class="recent">
                                <li>                                                   
                                    <h6><a href="#"><strong>L'internet et le lendemain</strong></a></h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                                </li>
                                <li>                        
                                    <h6><a href="#"><strong>Le développement de la technologie et le future</strong></a></h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                                </li>
                                <li>                        
                                    <h6><a href="#"><strong>Les inventions de nos jours</strong></a></h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widgetheading"><strong>A la une</strong></h5>
                            <ul class="tags">
                                <li><a href="#">Le web mobile et l'avenir</a></li>
                                <li><a href="#">Internet</a></li>
                                <li><a href="#"> La Technologie et l'Homme</a></li>
                                <li><a href="#">Google et sa portée</a></li>                        
                            </ul>
                        </div>                                    
                </aside>                            
                    <aside>
                        <article class="col-lg-8">
                            <div class="widget">
                                <div>
                                    <div >
                                        <h5 class="widgetheading"><strong>Archives</strong></h5>
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                        </p>    
                                    </div>
                                    <div class="box-bottom">
                                        <a href="#">Plus d'informations</a>
                                    </div>
                                </div>                                       
                           </div>
                        </article>
                    </aside> 
            </section>                    
        </main>                
         <!-- fin contenu -->         
        <?php
    }
        public function afficherForumBillet($comments, $post){
            
            ?>
                <article class="forum_contenu">
                    <div class="post-image">
                        <div class="post-heading">
                            <h3 class="forum_contenu"><?= $post['billet_titre'] ?></h3>
                        </div>
                    </div>
                    <p class="forum_contenu"><?= $post['billet_contenu'] ?></p>
                    <div class="bottom-article">
                        <ul class="meta-post">
                            <li><i class="icon-calendar"></i><a href="#"><?= $post['billet_date'] ?></a></li>
                            <li><i class="icon-comments"></i><?= count($comments); ?> Commentaires</li>
                        </ul>
                    </div>
                    <div class="form-comment">
                     
                            <?php 
                            if (empty($comments)) {
                                ?>
                                 
                                <?php 

                            } else{
                                foreach ($comments as $key => $comment) {
                                    ?>
                                       <article class="affichage-comment">
                                        
                                           <p><?= $comment['comment_billet_contenu'] ?></p>
                                           <p></p>
                                       </article>
                                     <?php
                                 }
                            }
                            ?> 
                      
                    </div>
                </article>
                <article>
                <span class="message"></span>
                       <form class="form-comment forum_contenu">   
                               <div class="form-group">
                                       <label for="nom">Nom</label>
                                       <input type="text" class="form-control" x-moz-errormessage="Veillez remplir ce champs" title="Veillez remplir ce champs"  name="nom" id="nom" value="" placeholder=" Veuillez Entrer le nom" required  pattern="[A-Za-z-0-9]+\s" >                              
                               </div>
                               <div class="form-group">
                                       <label for="courriel">Courriel</label>
                                       <input type="email" class="form-control" name="courriel"  x-moz-errormessage="Veillez remplir ce champs" title="Veillez remplir ce champs" id="courriel" value="" placeholder=" Veillez mettre votre Courriel" required pattern="[A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4}">

                               </div>
                               <div class="form-group">
                                       <label for="message">Commentaire</label>
                                       <textarea type="textarea" class="form-control" name="message" id="message" value="message" rows="4" cols="50" placeholder=" Veillez mettre votre commentaire ici.." required>
                                       </textarea>                       
                               </div>                   
                           <input type="button" id="btnPost" class="commentaire" value="Poster">
                       </form>
                      
                </article>
            <?php
        
        }         
}
