<?php
$title="Ajout de l'utilisateur";
?>
<p class="error"><?= $error??""?></p>
<!DOCTYPE html>
<html lang="fr">
<head >
 
    <meta charset="UTF-8">
    <title >Inscription</title>
  
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
   <link rel="stylesheet" type="text/css" href="./css/style.css">
   <link rel="stylesheet" type="text/css" href="./css/styleConnexion.">
</head>
<body class="myBackground" > 


  
    <div >
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
            <li class="active"><a href="index.php">Home</a></li>
         </ul> 
        
        <ul class="nav navbar-nav navbar-right collapse navbar-collapse">
            <li ><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
             <li ><a href="https://instagram.com"><i class="fa fa-instagram"></i></a></li>
              <li ><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
               
           
          </ul>
          </div>
      </div>
    </nav>

    <div class="container">
    <div class="row">
      <div class="col-md-offset-4 col-md-8 container-fluid">
        <h1>login d'inscription </h1>
        <h2><small>Merci de renseigner vos informations </small></h2>
      </div>
  </div>
  <form  method="post" >
  <div class="row">
    <div class="col-md-offset-2 col-md-3">
      <div class="form-group">
        <label>Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom"  required value="<?= $data['nom']??""?>"><tr><td><span class="error_form" id="nom-error"> </td></tr>
      </div>
    </div>

     <div class="col-md-offset-2 col-md-3">
        <div class="form-group">
          <label >Prenom</label>
          <input type="text" class="form-control"  name="prenom" id="prenom"  placeholder="Prenom"   required aria-required="true" value="<?= $data['prenom']??""?>" ><tr><td><span class="error_form" id="prenom-error"> </td></tr>
      </div>
     </div>
   </div>

   <div class="row">
      <div class="col-md-offset-2 col-md-3">
          <div class="form-group">
          <label >Login</label>
          <input type="text" class="form-control" name="login" id="login" placeholder="ex: xxx@aaa.fr"    required value="<?= $data['login']??""?>"><tr><td><span class="error_form" id="login-error"> </td></tr>
      </div>
   </div>
   <div class="col-md-offset-2 col-md-3">
     <div class="form-group">
       <label > Password</label>
       <input type="password" class="form-control" name="mdp" id="password" placeholder="password"   required value=""><tr><td><span class="error_form" id="password-error"> </td></tr>
     </div>
   </div>

     


</div>

 <div class="row">
   
<div class="col-md-offset-2 col-md-3">
     <div class="form-group">
       <label >Verification password</label>
       <input type="password" class="form-control" name="mdp2" id="vpassword" placeholder="verification du mot de passe"   required value=""><tr><td><span class="error_form" id="vpassword-error"></td></tr>
     </div>
   </div> 

<div class="col-md-offset-2 col-md-3">
         <label> categorie </label>
          <div class="form-group">
            <select class="selectpicker form-control" name="role"  width="auto" required value="<?= $data['categorie']??""?>" >
              <option>Acheteur</option>
           <option>Vendeur</option>
           
            </select>
          </div>
        </div>
   
 </div>
 <div class="row">

   <div class="col-md-offset-5 col-md-6">

 <button type="submit" class="btn btn-success">S'Inscrire</button>
     </div>
   </div>
</div>
    </div>
  </div>


   <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/jquery/dist/bootstrap.min.js"></script>

 <!-- <script type="text/javascript" src="bower_components/jquery/form.js">-->
   
  </script>
  <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

<script type="text/javascript">
  $(document).ready(function(){
    $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
      } else {
        $('#back-to-top').fadeOut();
      }
    });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
          $('#back-to-top').tooltip('hide');
          $('body,html').animate({
            scrollTop: 0
          }, 800);
          return false;
        });
        
        $('#back-to-top').tooltip('show');

      });
    </script>

</body>


