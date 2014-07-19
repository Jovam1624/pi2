<?php
/**
 * Class Vue
 * Template de classe Vue. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-11
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d�utilisation commerciale 3.0 non transpos�)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */


class VueAdmin {

	
	public function afficheAdmin() {
	
	
		?>
	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin cms</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    
       


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
     <div class="container">
          
            <!-- navigation de la page-->

    <!-- enssemble contenu-->
          <div class="main row">
            <article class="content col-md-12">
            <form action="index.php?p=accueil" method="POST" class="form-horizontal" role="form">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
      
          <h4> ADMINISTRATION EUREKA </h4>
        
      
    </div>
    <label for="inputUser" class="col-sm-2 control-label">User</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUser" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="Connexion">
    </div>
  </div>
</form>

      </article>
           
  </div>
  </div>

    
  </body>
</html>
<?php
}
}
?>