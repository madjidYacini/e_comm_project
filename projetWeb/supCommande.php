<?php 
include 'headeracht.php';  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Annuler une Commande</title>
  <link rel="stylesheet" type="text/css" href="./css/ex2.css">
</head>
<body>

  
 <?php
 $uid= $idm->getUid();
 try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $pdo=new PDO($dsn,$username,$password,$pdo_options);
  $sql ="SELECT * FROM commande where uid =? ";
  $res =$pdo->prepare($sql);
  $res->execute(array($idm->getUid()));
  
  @$checkexist = count($res->fetchAll());
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}
 $statut="en_cours";
 try {
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $pdo=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
  $sql ="SELECT * FROM commande where uid = ? AND statut= ? ";
  $res = $pdo-> prepare($sql);
  $res ->execute(array($uid,$statut));
  @$check = count($res->fetchAll());
  if ($checkexist==0) {
    ?>
<script type="text/javascript">
  alert("pour pouvoir supprimer un produit vous devez en premier lieu  en commander un ");
  document.location.href='espaceacht.php';
</script>
<?php
  }elseif ($check==0) {
?>
<script type="text/javascript">
  alert("tout vos produit commandés sont déja traité !");
  document.location.href='espaceacht.php';
</script>
<?php
  }else{
    echo'<div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-5 ">
        <h1>Mes Commandes en cours  </h1>
      </div>
    </div>';
    try{
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $stat='en_cours';
     $pdo=new PDO($dsn,$username,$password);
    $sql = "SELECT commande.cmdid, produits.pid , produits.nom , produits.description, produits.qte ,commande.qte as qtedemande ,produits.prix ,commande.date , commande.statut FROM produits INNER JOIN commande ON  produits.pid = commande.pid WHERE commande.uid =? AND commande.statut = ?" ;
     $res = $pdo-> prepare($sql);
     $res ->execute(array($uid,$stat));
     echo "<form methode='post'   >";
     echo
     "<table class=\"table table-striped\">";
     echo "<tr>
     

     <th> nom</th>
     <th> quantité </th>
     <th>prix unitaire</th>
     <th>date</th>
     <th>statut</th>
     <th>Action</th>
     

   </tr>";

   while ($row = $res->fetch()){

    echo "<tr>
    <td> $row[nom]</td> 
    <td> $row[qtedemande]</td>
    <td> $row[prix]</td>
    <td> $row[date]</td>
    <td> $row[statut]</td>
    <td><a  href ='suppcommande.php?cmdid=$row[cmdid]' title='suprimer une commande' >Annuler la commande</a></td>
    
  </tr>";

}

echo "</table>";

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


</div>
</div>
</div>
</body>
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
</html>
