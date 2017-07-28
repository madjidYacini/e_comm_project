<?php 
include 'headervendeur.php'; ?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title >Inscription</title>

 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" type="text/css" href="css/app.css">
 <link rel="stylesheet" type="text/css" href="assets/css/main.css">
 <link rel="stylesheet" type="text/css" href="assets/css/style.css">
 <script type="text/javascript" src="bower_components/jquery/dist/app.js"></script>
 <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>

</head>

<body>

  <body>
  <form action="ajoutproduit.php" method="post">
   <div class="container" >
    <div class="row">
      <div class="col-md-offset-4 col-md-8 " ">
        <h1>ajouter un produit </h1>
        <h2><small>Merci de renseigner les informations </small></h2>
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
            <label >quantité</label>
            <input type="number" class="form-control"  name="qte" id="qte"  min="1" placeholder="qte"   required aria-required="true" value="<?= $data['qte']??""?>" ><tr><td><span class="error_form" id="qte-error"> </td></tr>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-3">
         <label> categorie </label>
          <div class="form-group">
            <select class="selectpicker form-control" name="categorie"  width="auto" required value="<?= $data['categorie']??""?>" >
              <option>Alimentaire</option>
           <option>Vêtements</option>
           <option> Jouets</option>
            </select>
          </div>
        </div>
       <div class="col-md-offset-2 col-md-3">
        <div class="form-group">
          <label class="col-md-offset-5 col-md-2"> Prix</label>
          <input type="number" step="0.01" min="0" class="form-control" name="prix" id="prix" placeholder=""    required value="<?= $data['prix']??""?>"><tr><td><span class="error_form" id="prix-error"></span> </td></tr>
        </div>
      </div>
    </div>
    <div class="row">


     <div class="col-md-offset-2 col-md-8">
      <div class="form-group">
        <label class="col-md-offset-5 col-md-2">discription</label>
        <input type="text" class="form-control" name="description" id="discription" placeholder=" "    required value="<?= $data['description']??""?>"><tr><td><span class="error_form" id="discription-error"> </td></tr>
      </div>
    </div>
  </div>
  <div class="col-md-offset-5 col-md-6">

    <a  href="#mymodal3" class="btn btn-primary btn-lg "  data-toggle="modal" data-target ="#mymodal3" >ajouter</a>
    </form>
    </form>
    <div class="modal fade" id="mymodal3">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header ">
            <div class="titre">
              <h3>Confirmation De L'Ajout</h3>
            </div>
          </div>
          <div class="modal-body">
            <p  class="titre2">Conditions D'ajout:</small></p>
            <ul id="list">
              <div class="regle">
                <li class="gras"  style="list-style-type: disc;">Si le produit est ajouté pour la premiere fois , alors celui-ci figurera dans votre liste.</li>
                <li  class="gras"  style="list-style-type: disc;">Si le produit  est déjà stocké dans votre liste (qui a le meme nom est descritpion) alors,ça va augmenter la quantité et le prix de ce dernier en fonction de ce que vous avez introduit.</li>
                 <li class="gras"  style="list-style-type: disc;">L'action ne s'effecutera pas tant que vous n'avez pas rempli tout les champs du formulaire et vous allez voir apparaitre un message indiquant le champs vide .</li>
                <li class="gras"  style="list-style-type: disc;">Si vous souhaitez vraiment l'ajouter ou modifier le produit cliquez sur "Je Confirme".</li>
                <li class="gras"  style="list-style-type: disc;">Si vous voulez abondonner ou ne pas ajouter ce produit cliquez sur "j'Abondonne".</li>
                
              </div>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" >Je Confirme</button>
            <a href="ajout_form.php" class="btn btn-warning">J'Abondonne</a>
          </div>
        </div>

      </div>
    </div>
  </div>
  <style >
    h3{
      text-decoration-line: underline;
      text-align: center;
      color: #1a8c97;
    }
    .titre2{
      font-size: xx-large;
      margin-top: 35px;
      text-align: left;
      font-size: 2em;
       font-family: "Fira Sans", "Source Sans Pro", Helvetica, Arial, sans-serif;
    }
    #list{
      list-style-type:disc;
      padding: 14px 35px;
    }
  
    .regle li{
      margin-bottom: 10px;
    }

    .gras{
      font-weight: 700;
      margin-bottom: 15px;
    }
    .gras:first-letter{
      margin-left: 10px;
    }

  </style>
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

</html>
