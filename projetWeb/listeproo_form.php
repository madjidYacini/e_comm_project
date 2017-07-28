<?php include 'headeracht.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Rechercher Un Produit</title>
</head>
<body>
<div class="well well-lg">
  <h1 style="text-align: center;">Etape 1/3 : Rechercher le produit souhaité</h1>
</div>
<div class="container col-md-offset-4 col-md-4">
    <div class="row">
      <div class=" container-fluid">
        <h1> rechercher Un Produit  </h1>
        <h2 class="p"><small>Merci de renseigner un des champs pour rechercher </small></h2>
      </div>
  </div>
  
  <form  method="post" action="listeProduitAch.php" >
  <div class="row">
   
      <div class="form-group">
        <label >Le Nom Du Produit </label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom du produit"  ><tr><td><span class="error_form" id="nom-error"> </td></tr>
      </div>
      <div class="row">
     
         <label> categorie </label>
          <div class="form-group">
            <select class="selectpicker form-control" width ='auto' name="categorie" >
            <option></option>
             <option>Alimentaire</option>
           <option>Vêtements</option>
           <option> Jouets</option>
            </select>
          </div>
        </div>

       <div class="form-group">
        <label >le Nom Du Fournisseur </label>
        <input type="text" class="form-control" name="fournisseur" id="nom" placeholder="Nom" ><tr><td><span class="error_form" id="nom-error"> </td></tr>
      </div>

   
       <div class="form-group col-md-6">
      <input type="submit" value="recherche"  class="btn btn-primary btn-lg " >
      </div>

    
      <div class="form-group col-md-5">
      <a href="list.php" class="btn btn-primary btn-lg">tous les produits </a>
      </div>
    
   
    </div>
    </div>
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