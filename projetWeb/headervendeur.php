<?php
require ('db_config.php');
require("auth/EtreAuthentifie.php");
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" sizes="144x144" href="./img/logo.png">

 <link rel="stylesheet" type="text/css" href="css/app.css">
 
 <title>espace vendeur</title>
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
         <li class=""><a href="espacevendeur.php"><i class="fa fa-home" style="font-size: 1em;"> Accueil</i></a></li>
         <li>
           <ul class="nav navbar-nav ">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-tasks"  style="font-size: 1em;"> Mes Actions</i> <span class="caret "></span></a>
              <ul class="dropdown-menu ">
                <li class=""><a href="listeProduit.php"><i class="fa fa-list" style="font-size: 1em;" > Liste Produits</i></a></li>
                <li class=""><a href="ajout_form.php"><i class="fa fa-plus" style="font-size: 1em;">  Ajouter Un Produit</i></a></li>
                <li class=""><a href="modif_form.php"><i class="fa fa-edit" style="font-size: 1em;">  Modifier Un Produit</i></a></li>
                <li class=""><a href="sup_form.php"><i class="fa fa-trash"  style="font-size: 1em;">  Supprimer Un Produit</i></a></li>
                <li class=""><a href="etatproduit.php" > <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 1em;"> etat de  mes produits</i></a></li>
              </ul>
            </li>
          </ul>
        </li>



        <li class=""><a href="historiquevendeur.php" > <i class="fa fa-history" aria-hidden="true" style="font-size: 1em;">  Coonsulter Mon Historique</i></a></li>
        
        
        <li class=""><a href="consult.php" > <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 1em;">  Consulter Les Commandes</i></a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
       <li class=""><a href="#mymodal1"  data-toggle="modal" data-target ="#mymodal1"> <i class="fa fa-bar-chart" aria-hidden="true" style="font-size: 1em;">  Voir Mes Statistiques</i></a></li>


       <li class="" ><a href="#mymodal" data-toggle="modal" data-target ="#mymodal"><i class="fa fa-envelope"  style ="font-size: 1em;"><?php try{
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $stat='en_cours';
     $pdo=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
     $sql ="SELECT * FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? AND  commande.statut = ? ";
     $res = $pdo-> prepare($sql);
     $res ->execute(array($idm->getUid(),$stat));
     $check=count($res->fetchAll());
     if ($check !=0) {  
      try{
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $stat='en_cours';
     $pdo=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
     $sql ="SELECT * FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? AND  commande.statut = ? ";
     $res = $pdo-> prepare($sql);
     $res ->execute(array($idm->getUid(),$stat));
     $check=count($res->fetchAll());
     echo "  $check";
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
  } 
     ?> notification  </i>
         </a></li>
<li class="" ><a href="logout.php"><i class="fa fa-power-off " style="font-size: 1em;" > Logout</i></a></li>
       </ul>

     </div>
   </div>
 </nav>
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

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/jquery/dist/bootstrap.min.js"></script>

    </html>
 <div class="modal fade" id="mymodal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header ">
            <div class="titre">
              <h3>Mes Notifications</h3>
            </div>
          </div>
          <div class="modal-body">
           
            <ul id="list">
              <div class="regle">
                <?php try{
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $stat='en_cours';
     $pdo=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
     $sql ="SELECT * FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? AND  commande.statut = ? ";
     $res = $pdo-> prepare($sql);
     $res ->execute(array($idm->getUid(),$stat));
     $check=count($res->fetchAll());
     if ($check >0) {  
      ?>
      
      <ul>
     <li li class="gras"  style="list-style-type: disc;">Vous avez <?php 
      try{
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $stat='en_cours';
     $pdo=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
     $sql ="SELECT * FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? AND  commande.statut = ? ";
     $res = $pdo-> prepare($sql);
     $res ->execute(array($idm->getUid(),$stat));
     $check=count($res->fetchAll());
     echo "$check";
     }catch(Exception $e){
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
  }
      ?> Commande(s) en cours  </li>
  
        </div>
            </ul>
          </div>
          <div class="modal-footer">
            <a href="consult.php"  class="btn btn-success" >Consulter</a>
            <a href="espacevendeur.php" class="btn btn-warning">plus tard</a>
          </div>
        </div>

      </div>
    </div>
  </div>
     <?php
     }else{
     ?>
<li class="gras"  style="list-style-type: disc;"> pour le moment vous n'avez aucune commande reçu, pensez a consulter votre compte </li>
 
 </div>
            </ul>
          </div>
          <div class="modal-footer">
            <a href="espacevendeur.php" class="btn btn-success">Revenir à L'accueil</a>
          </div>
        </div>

      </div>
    </div>
  </div>
     <?php
     
} }catch(Exception $e){
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
  }
     ?>
    
           
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
                <li class="gras"  style="list-style-type: disc;">  Produits Vendus  :
   <?php try{
      $stat="acceptee";

  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $pdo=new PDO($dsn,$username,$password,$pdo_options);
    $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE produits.uid =? AND commande.statut = ?";
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
   Produits Refusés(Non Vendus) :
   <?php try{
      $stat="refusee";

  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $pdo=new PDO($dsn,$username,$password,$pdo_options);
    $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE produits.uid =? AND commande.statut = ?";
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
                 <li class="gras"  style="list-style-type: disc;"> Le montant total  :
   <?php 
   try{
                $stat="acceptee";
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                  $pdo=new PDO($dsn,$username,$password,$pdo_options);
                  $sql="SELECT * FROM commande inner join produits on commande.pid =produits.pid  WHERE  produits.uid = ? AND commande.statut =?";
                  $res=$pdo->prepare($sql);
                  $res->execute(array($idm->getUid(),$stat));
                  $check= count($res->fetchAll());
                if($check==0){
                  echo "00.00€";
                }else{



   try{

  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $pdo=new PDO($dsn,$username,$password,$pdo_options);
    $sql ="SELECT produits.prix AS PRICE,commande.qte AS Quantity FROM( produits INNER JOIN commande ON produits.pid = commande.pid) WHERE produits.uid =? AND commande.statut = ?";
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
}
}catch(Exception $e){
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
  }

  ?></li>
           
              </div>
            </ul>
          </div>
          <div class="modal-footer">
          
            <a href="espacevendeur.php" class="btn btn-success">Revenir à L'Accueil</a>
          </div>
        </div>

      </div>
    </div>
  </div>
  