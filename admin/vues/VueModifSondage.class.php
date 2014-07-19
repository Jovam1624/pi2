<?php
   /**
    * Class Vue
    * Template de classe Vue. Dupliquer et modifier pour votre usage.
    * 
    * @author Jonathan Martel
    * @version 1.0
    * @update 2013-12-11
    * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
    * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
    * 
    */
   
   
   class VueModifSondage {
   
    private $_vueHeader;
    private $_vueFooter;
    
    
    public function afficheModifSondage($id,$nomBtn,$monSondage) {
    
    
      ?>
    <!-- enssemble contenu-->
    <div class="main row">
       <article class="content col-md-8">
          <?php
             if($nomBtn == "modifier"){  
               ?>
         
          <p>   
             modification</p>
             <?php
                //echo "</br>le id c'est ".$id."</br>"; 
               // echo "pour ".$nomBtn; 
                ?>
              <form class="form-horizontal" role="form">
                <div><h1>ssdsds</h1></div>
                <div class="form-group">
                  <label for="inputId" class="col-sm-2 control-label">Id reponse</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputId" value=<?php echo $monSondage[0]["reponse_ID"]; ?> disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputReponse" class="col-sm-2 control-label">Reponse</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputReponse" value=<?php echo $monSondage[0]["nom_reponse"]; ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNombre" value=<?php echo $monSondage[0]["nombre_click"]; ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputQuestion" class="col-sm-2 control-label">Question</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputQuestion" value=<?php echo $monSondage[0]["question_sondage"]; ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSubmit" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <button type="button" class="btn btn-default">Modifier</button>
                  </div>
                </div>
              </form>   

          
          <?php
             }
             if($nomBtn == "supprimer"){  
             ?>
               <!-- cette partie c'est a enlever -->
              </br></br></br></br> 
              ici........
              <p>
             
             supprimer</br>

                <?php
                echo "</br>le id c'est ".$id."</br>"; 
                echo "pour ".$nomBtn; 
                ?>
                 </p>

             <?php
               }
                if($nomBtn == "ajouter"){  
               

             ?>

             <!-- cette partie c'est a enlever -->
              </br></br></br></br> 
              ici........
              <p>
             
             supprimer</br>

                <?php
                echo "</br>le id c'est ".$id."</br>"; 
                echo "pour ".$nomBtn; 
                ?>

                <?php

                  }

                ?>


       </article>
       <!-- le aside-->
       <aside class="col-md-4">
          <div class="panel panel-default">
             <div class="panel-heading">Panel heading without title</div>
             <div class="panel-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut lorem lacus.
                 Proin viverra congue dolor et consectetur. Mauris rhoncus justo vestibulum
                  tellus convallis, pharetra tristique est mollis. Donec laoreet rutrum sollicitudin.
                   Praesent pharetra cursus nisi sit amet tempus. Nam et nisl consequat, accumsan nulla 
                   eget, varius justo. Pellentesque habitant morbi tristique senectus et netus et malesuada
                    fames ac turpis egestas. Aliquam non tincidunt tortor, et iaculis tellus. Nullam pharetra 
                    lectus leo, mattis vulputate justo mollis malesuada. Curabitur ut ante tortor. Mauris 
                    consequat elit arcu, ut facilisis eros suscipit id. In sagittis quis felis eget adipiscing.
                     Fusce molestie malesuada urna at aliquam. Cras volutpat nunc vitae mi ornare sagittis. 
             </div>
          </div>
       </aside>
    </div>
<?php include ("VueFooter.class.php"); ?>
<?php
   }
   
    
   
   
   
   
   
   
   
   }
   ?>