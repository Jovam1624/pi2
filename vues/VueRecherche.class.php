<?php
/**
 * @class VueRecherche
 * ***************
 * @author Équipe3
 * @version beta
 */
//****************
class VueRecherche {

  //*********************************************  
  public function afficheRecherche($monRecherche){
    ?>
    <div class="row col-lg-12 recherche">
        <div class="col-lg-12">
            <h1>Recherche Rapide</h1>
        </div>
        <div class="col-lg-12">
             <h2>Il y a <?php echo sizeof($monRecherche) ?> article<?php echo (sizeof($monRecherche)== 1)? "" : "s";?> correspondant à votre recherche:</h2>
                <table class="col-lg-12 table table-striped">
                    <tbody>
                        <?php
                        if(count($monRecherche) > 0){
                            foreach($monRecherche as $cle => $article){
                        ?>
                        <tr>
                            <td><a href="<?php echo "index.php?p=articles&id=".$article['article_ID'];?>">
                                <img src="<?php echo "./img/articles/".$article['article_image'];?>" width="70" height="70" alt="<?php echo $article['article_titre'];?>"></a></td>
                            <td><a href="<?php echo "index.php?p=articles&id=".$article['article_ID']?>"><?php echo $article['article_titre']?></a></td>    
                        </tr>
                         <?php }
                        }else{
                        ?>
                        <h3>R&eacute;aliser une nouvelle recherche</h3>
                         <?php 
                        }
                         ?>
                     </tbody>
                 </table>
        </div>
    </div>
  <?php
  }
}

?>