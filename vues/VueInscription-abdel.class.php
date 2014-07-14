<?php
/**
 * Class VueInscription
 * Template de classe Vue. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */


class VueInscription {

    public function afficheInscription(){
    ?>  
      <article class="inscription container">
        <div class="col-md-4">
          </div>
           <div class="col-md-4">
              <form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="pseudo" value="" placeholder="Pseudo">
             <span id="ifexist"></span>
          </div>
        </div>
         <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" value="" placeholder="Email">
          </div>
        </div>
         <div class="form-group">
          <label for="nom" class="col-sm-2 control-label">Nom</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="nom" placeholder="Nom">
          </div>
        </div>
      
       
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-default">S'inscrire</button>
          </div>
        </div>
      </form>
      </div>
<div class="col-md-4">
          </div>
    </article>
  <?php
  }

  public function afficheConnecte(){
    ?>
      <article class="inscription container">
        <h1>Bienvenue sur Journal Eureka <?php echo $_SESSION["utilisateur"]." !!!";?></h1>   
         <form role="form" action="index.php?p=index" method="POST">
           <button type="submit" name="deconnect" class="btn btn-default">Se deconnecter</button>
         </form>

      </article> 
      <?php  
    }

}
?>

