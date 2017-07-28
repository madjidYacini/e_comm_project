<link rel="stylesheet" type="text/css" href="./css/ex2.css">
 <link rel="stylesheet" type="text/css" href="css/app.css">
<?php
require 'headervendeur.php'; 
require 'db_config.php';
try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$pdo = new PDO ($dsn,$username,$password,$pdo_options);
$var = $idm->getUid();
 $sql ="SELECT * FROM produits WHERE uid=? ";
   $res =$pdo->prepare($sql);
   $res ->execute(array($var));
 @$check = count($res->fetchAll());
 //echo $check;
 	          if($check ==0){
 	         ?>
            <script type="text/javascript">
              alert('votre compte est vide pensez à le remplir  !');
              document.location.href("espacevendeur.php");
            </script><?php
 	          }else if ($check>=1) {
 	          	$pdo = new PDO ($dsn,$username,$password);
$var = $idm->getUid();
$qte=0;
 $sql ="SELECT produits.nom as name,produits.description,produits.qte ,produits.prix ,categories.nom FROM (produits inner join categories on produits.ctid= categories.ctid)  WHERE produits.uid=? ";
   $res =$pdo->prepare($sql);
   $res ->execute(array($var));
echo"<h1>Mes Produits</h1>";
echo
"<table class=\"table table-striped\">";
echo "<tr>
<th> nom </th>
<th> description</th>
  <th> quantité </th>
    <th>prix à l'unité</th>
  <th> categorie </th>
    </tr>";
 while ($row = $res->fetch()){

 	echo "<tr><td> $row[name]</td><td> $row[description]</td><td> $row[qte]</td><td> $row[prix]</td><td> $row[nom]</td></tr>";

  }
   echo "</table>";

}
}catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
              }

 ?>
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