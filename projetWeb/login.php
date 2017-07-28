<!DOCTYPE html>
<html>
<head>
  <title>connexion</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="./app.css">
  <link rel="stylesheet" type="text/css" href="./css/styleConnexion.css">
   <link rel="icon" sizes="144x144" href="./img/logo.png">


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
          <li class=""><a href="index.php">Home</a></li>
        </ul> 
        
        <ul class="nav navbar-nav navbar-right collapse navbar-collapse">
         <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
         <li><a href="https://instagram.com"><i class="fa fa-instagram"></i></a></li>
         <li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
       </ul>
     </div>
   </div>
 </nav>
</body>
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/jquery/dist/bootstrap.min.js"></script>
</html>
<?php

include("auth/EtreInvite.php");


if ((empty($_POST['login']) && empty($_POST['password']))) {
  include('login_form.php');
  exit();
}

$error = "";

foreach (['login', 'password'] as $name) {
  if (empty($_POST[$name])) {
    $error .= "La valeur du champs '$name' ne doit pas être vide";
  }
}


if (empty($error)) {
  $data['login'] = $_POST['login'];
  $data['password'] = $_POST['password'];
  if (!$auth->existIdentity($data['login'])) {
    $error =  "<script> alert('utilisateur inexistant');</script>";
  }
}


if (empty($error)) {
  $role = $auth->authenticate($data['login'], $data['password']);
  if (!$role) {
    $error = "<script>alert('Echec de l\'authentification');</script>";
  }
}



if (!empty($error)) {
  include('login_form.php');
  exit();
}




if (isset($_SESSION[SKEY])) {
  $uri = $_SESSION[SKEY];
  unset($_SESSION[SKEY]);
  redirect($uri);
  exit();
}
redirect($pathFor['acc']);



