<?php
/**
 * @class VueInscription
 * *********************
 * @author Équipe3
 * @version ALPHA
 * Pas encore implémentée dans la version Beta
 */
//*********************


class VueInscription {

    public function afficheInscription($tabErr){
    ?>  
      <article class="login container">
        <h1>Connexion</h1>
        <div class="sign col-md-4">
          <form role="form" action=<?php echo (isset($_SESSION["isConnected"]) ? "index.php?p=index" : "index.php?p=inscription")?> method="POST">
            <div class="form-group">
              <label for="NomUtilisateur">Nom d'utilisateur</label>
              <input type="text" name="utilisateur" class="form-control" id="NomUtilisateur" placeholder="Entrez nom d'utilisateur">
              <span class="error"><?php echo (isset($tabErr[0])) ? $tabErr[0]: "" ?></span>
            </div>
            <div class="form-group">
              <label for="Mdpasse">Mot de passe</label>
              <input type="password" name="mdp" class="form-control" id="Mdpasse" placeholder="Entrez Mot de passe">
               <span class="error"><?php echo (isset($tabErr[1])) ? $tabErr[1] : "" ?></span>
            </div>
            <button type="submit" name="connecter" class="btn btn-default">Se connecter</button>
          </form>
        </div>
    </article>
  <?php
  }

  
}
?>

