<?php

require("auth/EtreAuthentifie.php");
require ('db_config.php');
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" sizes="144x144" href="./img/logo.png">

 <link rel="stylesheet" type="text/css" href="css/app.css">
 
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
        <a class="navbar-brand active" href="">  BlaBlaBuy</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
         <li class=""><a href="espaceacht.php"><i class="fa fa-home" style="font-size: 1em;"> Accueil</i></a></li>
         <li class=""><a href="listeproo_form.php"><i class="fa fa-list" style="font-size: 1em;"> Rechercher Un Produit</i></a></li>
         <li class=""><a href="historique.php"><i class="fa fa-history" style="font-size: 1em;"> Mon Historique</a></i></li>
         <li class=""><a href="supCommande.php"><i class="fa fa-shopping-cart" style="font-size: 1em;"> Mon Panier</a></i></li>
        
       </ul> 
       <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="#mymodal1"  data-toggle="modal" data-target ="#mymodal1"> <i class="fa fa-bar-chart" aria-hidden="true" style="font-size: 1em;">  Voir Mes Statistiques</i></a></li>
        <li class="" ><a href="logout.php"><i class="fa fa-power-off " style="font-size: 1.3em;" > Logout</i></a></li> 
      </ul> 

      

    </div>
  </div>
</nav>
</body>
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/jquery/dist/bootstrap.min.js"></script>
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


<div class="modal fade" id="mymodal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        <div class="titre">
          <h3> <i class="fa fa-user" hidden="true"> Mes Statistiques</i></h3>
        </div>
      </div>
      <div class="modal-body">

        <ul id="list">
          <div class="regle">
            <li class="gras"  style="list-style-type: disc;"> le nombre de Commandes acceptées:
             <?php try{
              $stat="acceptee";

              $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
              $pdo=new PDO($dsn,$username,$password,$pdo_options);
              $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE commande.uid =? AND commande.statut = ?";
              $res = $pdo-> prepare($sql);
              $res ->execute(array($idm->getUid(),$stat));
              @$check = count($res->fetchAll());
              echo "$check";
            }catch(Exception $e){
              http_response_code(500);
              echo "Erreur de serveur.";
              exit();
            } 
            /**/
            ?></li>
            <li  class="gras"  style="list-style-type: disc;">
              le Nombre De Commandes refusées:
              <?php try{
                $stat="refusee";

                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $pdo=new PDO($dsn,$username,$password,$pdo_options);
                $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE commande.uid =? AND commande.statut = ?";
                $res = $pdo-> prepare($sql);
                $res ->execute(array($idm->getUid(),$stat));
                @$check1 = count($res->fetchAll());
                echo "$check1";
              }catch(Exception $e){
                http_response_code(500);
                echo "Erreur de serveur.";
                exit();
              } 
              ?></li>
              <li  class="gras"  style="list-style-type: disc;">
              le Nombre De Commandes en cours :
              <?php try{
                $stat="en_cours";

                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $pdo=new PDO($dsn,$username,$password,$pdo_options);
                $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE commande.uid =? AND commande.statut = ?";
                $res = $pdo-> prepare($sql);
                $res ->execute(array($idm->getUid(),$stat));
                @$check1 = count($res->fetchAll());
                echo "$check1";
              }catch(Exception $e){
                http_response_code(500);
                echo "Erreur de serveur.";
                exit();
              } 
              ?></li>
              <li class="gras"  style="list-style-type: disc;">  montant total des commandes :
               <?php
              
                 
                
                 try{
                $stat="acceptee";
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                  $pdo=new PDO($dsn,$username,$password,$pdo_options);
                  $sql="SELECT * FROM commande WHERE  uid = ? AND statut =?";
                  $res=$pdo->prepare($sql);
                  $res->execute(array($idm->getUid(),$stat));
                  $check= count($res->fetchAll());
                if($check==0){
                  echo "00.00€";
                }else{
                try{
                  $stat="acceptee";
                  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                  $pdo=new PDO($dsn,$username,$password,$pdo_options);
                  $sql ="SELECT produits.prix AS PRICE,commande.qte AS Quantity FROM( produits INNER JOIN commande ON produits.pid = commande.pid) WHERE commande.uid =? AND commande.statut = ?";
                  $res = $pdo-> prepare($sql);
                  $res ->execute(array($idm->getUid(),$stat));
                  $somme= 0;
                  while ($row = $res->fetch()){

                    $somme= $somme+ $row['PRICE']* $row['Quantity'];
                  }
                  echo $somme."€";
                }catch(Exception $e){
                  http_response_code(500);
                  echo "Erreur de serveur.";
                  exit();
                } 
              }  }catch(Exception $e){
                  http_response_code(500);
                  echo "Erreur de serveur.";
                  exit();
                } 


             
              ?></li>

            </div>
          </ul>
        </div>
        <div class="modal-footer">

          <a href="espaceacht.php" class="btn btn-success">Revenir à L'Accueil</a>
        </div>
      </div>

    </div>
  </div>
</div>

</html>