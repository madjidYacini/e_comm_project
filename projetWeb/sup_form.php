<?php
include 'headervendeur.php';  ?>
<!DOCTYPE html>
<html>
<head>
  <title>modifier prix</title>
  <link rel="stylesheet" type="text/css" href="./css/ex2.css">
</head>
<body>

  
 <?php
 $uid= $idm->getUid();
 try {
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $pdo=new PDO($dsn,$username,$password);
  $sql ="SELECT * FROM produits where uid = ? ";
  $res = $pdo-> prepare($sql);
  $res ->execute(array($uid));
  @$check = count($res->fetchAll());
  if ($check==0) {
   ?>
   <script type="text/javascript">
     alert('vous n\'avez pas de produits dans votre liste pour pouvoir supprimer!');
     document.location.href='espacevendeur.php';
   </script>
   <?php
  }else{
    echo'<div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-7 ">
        <h1>Supprimer Un Produit </h1>
  
      </div>
    </div>';
    try{
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $pdo=new PDO($dsn,$username,$password);
     $sql ="SELECT * FROM produits where uid = ? ";
     $res = $pdo-> prepare($sql);
     $res ->execute(array($uid));
     echo "<form methode='post' action='supproduit.php'  >";
     echo
     "<table class=\"table table-striped\">";
     echo "<tr>
     <th>Action</th>
     <th> nom </th>
     <th> description</th>
     <th> qte </th>
     <th>prix</th>
     

   </tr>";

   while ($row = $res->fetch()){

    echo "<tr>
    <td><input type ='radio' name='cbox' value ='$row[pid]' required value=' ' ></td>
    <td> $row[nom]</td>
    <td> $row[description]</td> 
    <td> $row[qte]</td>
    <td> $row[prix]</td>
    
  </tr>";

}

echo "</table>";
echo '<a href ="#mymodalsup"  class="btn btn-primary btn-lg "  data-toggle="modal" data-target ="#mymodalsup" >Supprimer</a>';
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}
}
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}?>

<div class="modal fade" id="mymodalsup">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        <div class="titre">
          <h3>Confirmation De La Suppression</h3>
        </div>
      </div>
      <div class="modal-body">
        <p  class="titre2">regelement :</p>
        <ul id="list">
          <div class="regle">
            <li class="gras"  style="list-style-type: disc;">si vous effectuer cette operation le produit sera supprimé d'une maniere difinitive.</li>
            <li  class="gras"  style="list-style-type: disc;">Si vous voulez juste modifier ou reduire la quantité de votre produit on vous suggére de le modifier soit en allant a la partie modification "modifier un produit" ou bien cliquez sur <a href="modif_form.php">ce lien </a> .</li>
            <li class="gras"  style="list-style-type: disc;">L'action ne s'effecutera pas tant que vous n'avez pas remplie tout les champs du formulaire et vous allez voir apparaitre un message indiquant le champs vide .</li>
            <li class="gras"  style="list-style-type: disc;">Si vous souhaitez vraiment supprimer le produit cliquez sur "Je Confirme".</li>
            <li class="gras"  style="list-style-type: disc;">Si vous voulez abondonner la demarche  cliquez sur "j'Abondonne".</li>
            
          </div>
        </ul>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Je Confirme">
        <?php echo"</form>"  ?>
        <a href="" class="btn btn-warning">J'Abondonne</a>
      </div>
    </div>

  </div>
</div>
</div>
</form>
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

</style> <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

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
</div>
</div>
</div>
</body>
</html>