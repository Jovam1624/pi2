<?php
/**
 * @class Vuemembre
 * *********************
 * @author Équipe3
 * @version ALPHA
 * Pas encore implémentée dans la version Beta
 */
//*********************


class VueMembre {

    public function afficheConnexion($err){
    ?>  
      <article class="login container">
        
        <div class="sign col-md-4">
          <h1>Connexion</h1>
          <form role="form" action="index.php?p=connexion" method="POST">
            <div class="form-group">
              <label for="NomUtilisateur">Nom d'utilisateur</label>
              <input type="text" name="utilisateur" class="form-control" id="NomUtilisateur" placeholder="Entrez nom d'utilisateur">
            
            </div>
            <div class="form-group">
              <label for="Mdpasse">Mot de passe</label>
              <input type="password" name="mdp" class="form-control" id="Mdpasse" placeholder="Entrez Mot de passe">
              
            </div>
            <button type="submit" name="connecter" class="btn btn-default">Se connecter</button>
          </form>
           <span class="error"><?php echo (isset($err)) ? $err : "" ?></span>
        </div>
    </article>
  <?php
  }

   public function afficheFormulaire($tabErr =""){ //$tabErr a pas oublier
    ?>
    <article class="login container">
      <h1>Inscription</h1>
        <div class="sign col-md-4">
           <form role="form" action="index.php?p=inscription" method="POST">
              <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control valid" name="nom" placeholder="Nom" pattern="[A-Z][a-z]+" required>
                <span class="error"><?php echo (isset($tabErr["nom"])) ? $tabErr["nom"] : "" ?></span>
              </div>
              <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control valid" name="prenom" placeholder="Prenom" pattern="[A-Z][a-z]+" required>
                <span id="ifexist"><?php echo (isset($tabErr["prenom"])) ? $tabErr["prenom"] : "" ?></span>
              </div>
              <div class="form-group">
                <label for="utilisateur">Nom d'utilisateur</label>
                <input type="text" class="form-control valid" id="alias" name="utilisateur" placeholder="au moins 6 caracteres" pattern="[A-Za-z0-9]{5}[A-Za-z0-9]+" required>
                <span  id="ifexist" ><?php echo (isset($tabErr["utilisateur"])) ? $tabErr["utilisateur"] : "" ?></span>
                <span ><?php echo (isset($tabErr["conflit"])) ? $tabErr["conflit"] : "" ?></span>

              </div>
              <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control valid" name="mdp" placeholder="Au moins 7 caracteres" pattern="[A-ZÉa-z0-9_éçêèô]{6}[A-ZÉa-z0-9_éçêèô]+" required>
                <span class="error"><?php echo (isset($tabErr["mdp"])) ? $tabErr["mdp"] : "" ?></span>
              </div> 
              <div class="form-group">
                <label for="courriel">Adresse email</label>
                <input type="email" class="form-control valid" name="courriel" id="email" placeholder="Entrer email" pattern="[\w]+@[\w]+.[\w]+" required>
                <span class="error"><?php echo (isset($tabErr["courriel"])) ? $tabErr["courriel"] : "" ?></span>
              </div>
               <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control " name="adresse" placeholder="Adresse" pattern="[0-9]+ [A-Za-z]+ [A-Za-z]+">
                <span class="error"><?php echo (isset($tabErr["adresse"])) ? $tabErr["adresse"] : "" ?></span>
              </div>
              <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control " name="ville" placeholder="Ville" pattern="[A-Za-z][a-z- ]+">
                <span class="error"><?php echo (isset($tabErr["ville"])) ? $tabErr["ville"] : "" ?></span>
              </div>
               <div class="form-group">
                <label for="tel">Telephone</label>
                <input type="text" class="form-control" name="telephone" placeholder="# de telephone" pattern="[0-9]+">
                <span class="error"><?php echo (isset($tabErr["telephone"])) ? $tabErr["telephone"] : "" ?></span>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="type" value="oui"> Voulez-vous être membre payant? 
                </label>
              </div>
              

               <span class="error"><?php echo (isset($tabErr["conflit"])) ? $tabErr["conflit"] : "" ?></span>
               <button type="submit" name="inscription" class="btn btn-default">S'inscrire</button>
          </form>    
   </article> 
   <?php         
   }

  
}
?>

