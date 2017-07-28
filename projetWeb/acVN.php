<?php

require("auth/EtreAuthentifie.php");

$title = 'Accueil';
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>BlaBlaBuy</title>

  </head>

<body>
<nav class="navbar navbar-default ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">BlaBlaBuy</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li ><a href="logout.php"><i class="fa fa-sign-out" alt="logout"></i></a></li>
         </ul> 
        
        <ul class="nav navbar-nav navbar-right collapse navbar-collapse">
            <li ><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
             <li ><a href="https://instagram.com"><i class="fa fa-instagram"></i></a></li>
              <li ><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
              

          </ul>
          </div>
      </div>
    </nav>
<h1>connexion reussie</h1>
<?php

$var =$idm->getRole();
if ($var =="vendeur") {
redirect($pathFor['vendeur']);

}else{
  redirect($pathFor['acheteur']);
}
?>
<script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/jquery/dist/bootstrap.min.js"></script>
</body>
</html>