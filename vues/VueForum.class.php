<?php
/**
 * @class VueForum 
 * ***************
 * @author Équipe3
 * @version beta
 */
//****************
class VueForum {
   
    // ***********************************
    // Méthode pour afficher la page forum
    public function afficherForum($posts, $postComments){
        ?>
         <div class="row col-lg-12 row-forum">
			<div class="col-lg-8">
        <?php 
            foreach ($posts as $key => $post) {
                    ?>

                        <article class="blog">
                            <div class="post-image">
                                <div class="post-heading">
                                    <h1><a href="#"><?= $post['billet_titre'] ?></a></h1>
                                </div>
                            </div>
                            <p><?= $post['billet_contenu'] ?></p>
                            <div class="bottom-article">
                                <ul class="meta-post">
                                    <li><i class="icon-calendar"></i><a href="#"><?= $post['billet_date'] ?></a></li>
                                    <li><i class="icon-comments"></i><a href="index.php?p=forum&id=<?= $post['billet_ID'] ?>"><?= $postComments[$post['billet_ID']]; ?> Commentaire<?= ($postComments[$post['billet_ID']]>1)?'s':'';  ?></a></li>
                                </ul>
                                <a href="#" class="pull-right">Continuer à lire <i class="icon-angle-right"></i></a>
                            </div>
                        </article>
                 <?php 

            }
        ?>   		
		</div>
		<div class="col-lg-4">
			<aside class="right-sidebar">				
			<div class="widget">
                                <h5 class="widgetheading"><strong>Cat&eacute;gories</strong></h5>
				<ul class="cat">
			    	<li><i class="icon-angle-right"></i><a href="#">Les Inventions brevet&eacute;es</a><span> (20)</span></li>
					<li><i class="icon-angle-right"></i><a href="#">Les Inventions tiers Personnes</a><span> (11)</span></li>
					<li><i class="icon-angle-right"></i><a href="#">Les Inventions Financ&eacute;es</a><span> (9)</span></li>						
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
                            <h6><a href="#"><strong>Le d&eacute;veloppement de la technologie et le future</strong></a></h6>
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
						<li><a href="#">Google et sa port&eacute;e</a></li>						
					</ul>
				</div>                                    
				</aside>                            
                    <div>
                        <aside class="col-lg-8">
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
                        </aside>
                   </div> 
			</div>
                    
		</div>                
         <!-- fin contenu -->         
        <?php
    }
    
    	   
   		// *************************************************
        public function afficherForumPost($comments, $post){
            
            ?>
                <article>
                    <div class="post-image">
                        <div class="post-heading">
                            <h3><a href="#"><?= $post['billet_titre'] ?></a></h3>
                        </div>
                    </div>
                    <p><?= $post['billet_contenu'] ?></p>
                    <div class="bottom-article">
                        <ul class="meta-post">
                                <li><i class="icon-calendar"></i><a href="#"><?= $post['billet_date'] ?></a></li>
                            <li><i class="icon-comments"></i><?= count($comments); ?> Commentaires</a></li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <?php 
                            if (empty($comments)) {
                                ?>
                                    <li>No comment yet</li>
                                <?php 

                            } else{
                                foreach ($comments as $key => $comment) {
                                    ?>
                                        <li>
                                            <h4><?= $comment['comment_billet_titre'] ?></h4>
                                            <p><?= $comment['comment_billet_contenu'] ?></p>
                                        </li>
                                     <?php
                                 }
                            }
                            ?> 
                        </ul>
                    </div>
                </article>
            <?php
        
        }         
}
