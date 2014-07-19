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


class VueSondageAdmin {

	private $_vueHeader;
	private $_vueFooter;
	
	
	public function afficheSondageAdmin() {
	//$this->_vueHeader->AfficheEntete();
	
		?>
	
    <!-- enssemble contenu-->
          <div class="main row">
            <article class="content col-md-8">
            	<div class="icones-admin-sondage">
          
          <div class="support-icones">
         	

          </div>
        </div>
              <div class="table-responsive">
              <table class="table">
                <table class="table">
      <thead>
      	
        <tr>
          <th>#</th>
          <th>Reponse</th>
          <th>Nombre cliques</th>
          <th>Question</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="active">
          <td>1</td>
          <td>Excellent application</td>
          <td>50</td>
          <td>Que pensez vous des arbres...</td>
          <td>
          	<label>
          	 <input type="checkbox">
        	 </label>
     	  </td>

        <td>
            <label>
              <input type="hidden" class="ajouter" name="ajouter" value="ajouter">
              <a href="index.php?p=modifSondage&amp;id=1&amp;nomBtn=modifier"><span class="glyphicon glyphicon-cog icone-sondage"> </span></a>
           </label>
        </td>
        <td>
            <label>
               <a href="index.php?p=modifSondage&amp;id=1&amp;nomBtn=supprimer"><span class="glyphicon glyphicon-minus-sign icone-sondage"> </span></a>
           </label>
        </td>
        <td>
            <label>
                <a href="index.php?p=modifSondage&amp;id=1&amp;nomBtn=ajouter"><span class="glyphicon glyphicon-plus-sign icone-sondage"> </span></a>
           </label>
        </td>
        </tr>
        <tr>
          <td>1</td>
          <td>Bonne application</td>
          <td>75</td>
          <td>Que pensez vous des arbres...</td>
          <td>
            <label>
             <input type="checkbox">
           </label>
        </td>

        <td>
            <label>
              <a href="index.php?p=modifSondage&amp;id=2&amp;nomBtn=modifier"><span class="glyphicon glyphicon-cog icone-sondage"> </span></a>
           </label>
        </td>
        <td>
            <label>
               <a href="index.php?p=modifSondage&amp;id=2&amp;nomBtn=supprimer"><span class="glyphicon glyphicon-minus-sign icone-sondage"> </span></a>
           </label>
        </td>
        <td>
            <label>
                <a href="index.php?p=modifSondage&amp;id=2&amp;nomBtn=ajouter"><span class="glyphicon glyphicon-plus-sign icone-sondage"> </span></a>
           </label>
        </td>
        </tr>
        <tr class="active">
          <td>1</td>
          <td>Tres mauvaise application 	</td>
          <td>100</td>
          <td>Que pensez vous des arbres...</td>
          <td>
            <label>
             <input type="checkbox">
           </label>
        </td>

        <td>
            <label>
              <a href="index.php?p=modifSondage&amp;id=3&amp;nomBtn=modifier"><span class="glyphicon glyphicon-cog icone-sondage"> </span></a>
           </label>
        </td>
        <td>
            <label>
               <a href="index.php?p=modifSondage&amp;id=3&amp;nomBtn=supprimer"><span class="glyphicon glyphicon-minus-sign icone-sondage"> </span></a>
           </label>
        </td>
        <td>
            <label>
                <a href="index.php?p=modifSondage&amp;id=3&amp;nomBtn=ajouter"><span class="glyphicon glyphicon-plus-sign icone-sondage"> </span></a>
           </label>
        </td>
        </tr>
        
        
       
        
      </tbody>
    </table>
					
					
              </table>
            </div>
          
            </article>
            <!-- le aside-->
           <aside class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Panel heading without title</div>
                    <div class="panel-body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut lorem lacus. Proin viverra congue dolor et consectetur. Mauris rhoncus justo vestibulum tellus convallis, pharetra tristique est mollis. Donec laoreet rutrum sollicitudin. Praesent pharetra cursus nisi sit amet tempus. Nam et nisl consequat, accumsan nulla eget, varius justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam non tincidunt tortor, et iaculis tellus. Nullam pharetra lectus leo, mattis vulputate justo mollis malesuada. Curabitur ut ante tortor. Mauris consequat elit arcu, ut facilisis eros suscipit id. In sagittis quis felis eget adipiscing. Fusce molestie malesuada urna at aliquam. Cras volutpat nunc vitae mi ornare sagittis. 
                    </div>
               </div>

    </aside>
  </div>

<?php include ("VueFooter.class.php"); ?>



	   <?php
	   
	}
	
		
	
	
	
	
	
	

}
?>