<?php
/**
 * @class VueContact
 * ***************
 * @author Équipe3
 * @version beta
 */
//****************

class VueContact {

	//********************************
    public function afficheContact(){
        ?>
         <div class="thumbnail contact">
                    <div>
                        <h1 class="text-center">CONTACT</h1> <!-- titre -->   
                    </div>
                    <div>
                        <h2 class="text-center">Informations g&eacute;n&eacute;rales</h2> <!-- subtitre -->   
                            <p class="text-center"> 2030, boulevard Pie-IX Bureau 430</p>
                            <p class="text-center"> Montr&eacute;al (Qu&eacute;bec)  H1V 2C8</p>   
                            <p class="text-center"> T&eacute;l.: 514.254.7131, poste 4800.</p>
                    </div>
                    <div>
                        <h2 class="text-center">Horaire</h2> <!-- subtitre -->   
                            <p class="text-center"> Lun - Ven: 7:00 - 23:00</p>
                            <p class="text-center"> Sam - Dim: 7:00 - 18:00</p>  
                    </div>
                </div>
                <div class="thumbnail contact">  <!-- Commence la div pour le form -->  
                    <h1 class="text-center">Contactez Journal Eureka</h1> <!-- titre -->   
                    <p class="text-center"> Veuillez remplir ce formulaire afin qu'un membre de notre &eacute;quipe puisse vous aider.</p>
                    <form class="form-horizontal" role="form" method="post" action="" >  <!-- Include toeus les inputs du formulaire. -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="exampleInputnom">Nom:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="exampleInputnom" name="nom" pattern="[A-Za-z \s ÀÁÄÇÈeacuteÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜàáâãäæçèeacuteêëìíîñòóšùúûüýÿ]{2,30}" required> <!-- le pattern permet seulement les voyelles, les consonnes,l'espace et les accents indiqueacutes . -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="exampleInputprenom">Pr&eacute;nom:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="exampleInputprenom" name="pnom" pattern="[A-Za-z \s ÀÁÄÇÈeacuteÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜàáâãäæçèeacuteêëìíîñòóšùúûüýÿ]{2,30}"required> <!-- le pattern permet seulement les voyelles, les consonnes,l'espace et les accents indiqueacutes . -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="exampleInputEmail">Courriel: </label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Courriel" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="exampleTypecomentaire">Type de Commentaire: </label>
                            <div class="col-sm-6" id="exampleTypecomentaire">
                                <select  class="col-sm-12">
                                    <option value="article">Communiqu&eacute; de presse</option>
                                    <option value="comerreur">Commentaire ou erreur</option>
                                    <option value="concours">Concours</option>
                                    <option value="publicite">Publicit&eacute;</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="exampleInputCommentaire">Commentaires: </label>
                            <div class="col-sm-6">
                                <textarea rows="3" cols="45" name="commentaires" id="exampleInputCommentaire">Tapez ici vos commentaires...</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="exampleInputHuman">Combien font 5*2? (Anti-spam) </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="exampleInputHuman" name="human" placeholder="Saisir ici" required>
                            </div>
                        </div>
                                                                                   
                            </form> <!-- ici finit le form -->
                            <button type="submit" name="soumettre" class="btn btn-default form-control bouton">Soumettre</button>

                        </div>
                   
                    <?php
                         if (isset($_POST['soumettre'])){           
                            $pnom = $_POST['pnom'];
                            $nom = $_POST['nom'];
                            $email = $_POST['email'];
                            $commentaires = $_POST['commentaires'];
                            $from = "From: JournalEureka"; 
                            $to = "jovam1624@gmail.com"; 
                            $subject = "Contact";
                            $human = $_POST['human'];
                            $body = "From: $pnom, $nom\n E-Mail: $email\n Message:\n $commentaires";
                            if ($pnom && $nom && $email && $commentaires && $human == '10') {
                                    mail("jovam1624@gmail.com", $pnom, $nom, $email, $commentaires); 
                                    ?>
                                    <div class="contactConfirm">
                                        <h3>Vos commentaires sont d&eacute;jà envoy&eacute;!</h3>
                                    </div>   
                                    <?php
                                 } else { 
                                    ?>
                                    <div class="contactConfirm">
                                        <h4>S.V.P V&eacute;rifier l'information !</h4>
                                    </div></div>
                                    <?php
                                }
                        }
             }
    }                         
?>  