<!DOCTYPE html>
<html lang="fr">
<?php include ("db_config.php");?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" sizes="144x144" href="./img/logo.png">

  <link rel="stylesheet" type="text/css" href="css/app.css">
  <title>BlaBlaBuy</title>

</head>

<body class="mybackground">

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
          <li class="active"><a href="home.php"><i class="fa fa-home" style=" font-size: 1em;"> Home</i></a></li>
          <li><a href="adduser.php"> S'enregistrer</a></li>
          <li><a href="login.php">Log In</a></li>

        </ul> 
        
        <ul class="nav navbar-nav navbar-right">

         <li class="" ><a href="login.php"><i class="fa fa-sign-in" style="font-size: 1em;"></i> Login</a></li> 
         <li class="" ><a href="logout.php"><i class="fa fa-power-off" style="font-size: 1em;"></i> Logout</a></li> 
          <li ><a href="#mymodal3" data-toggle="modal" data-target ="#mymodal3" ><i  style="font-size: 1em;"  class="fa fa-question-circle"> A Propos</i></a></li>
          <li ><a href="#mymodal4" data-toggle="modal" data-target ="#mymodal4" ><i style="font-size: 1em;" class="fa fa-bar-chart" aria-hidden="true"> statistiques du site </i></a></li>
       </ul>
     </div>
   </div>
 </nav>

 <div class="showcase">
  <div class="container col-md-4  col-lg-4 col-md-offset-4  col-lg-offset-4">
    <p class="lead">Shopping Made Simple </p>
    
  </div>
</div>
<footer class="site-footer" id="footer">
  <div class="container">
   <p class="col-md-offset-4 col-md-3" style="font-size: 1.7em; margin: bottom;">© 2017 Copyright BlaBlaBuy</p>

 </div>
</footer>
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/jquery/dist/bootstrap.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){
    var position = $("#footer").position();
    var screen = $(window).height();
    if ( ( position.top + 150 ) < screen ){
      var pos = screen-150;
      $("#footer").offset({top:pos});
    } 
  });
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

  <div class="modal fade" id="mymodal3">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header ">
          <div class="titre">
            <h3>Reglement Du Site</h3>
          </div>
        </div>
        <div class="modal-body">
          <ul id="list">
            <li class="gras" >Rendez vos achats et ventes plus simples et rapides avec  BlaBlaBuy ...</li>
            <li class="gras" >Binevenus sur ce site qui a pour but de faciliter les achats et les ventes.</li>
            <li class="gras" >Vous devez obligatoirement respecter les consignes decrites ci-dessous </li>
            <div class="regle">
            <h3 style="text-align: center;">Important pour Vendeur</h3>
             <li class="list">La mise des produits suspectibles d'être dangeureux pour la société et pour les acheteurs (Exemple: Armes, drogues,..etc.) ne doivent absolument pas être mis en vente.</li>
             <li class="list">Vous avez le droit d'accepter ou de refuser des commandes comme vous souhaitez .</li>
             <li class="list">Si le stock d'un produit est epuisé, vous n'avez pas le droit d'accepter une commande et l'operation ne s'effecuera pas tant que la quantité demandée n'est pas disponible.</li>
             <li class="list">Pour le bon usage de cette plate-forme on vous conseille de voir le catalogue des vendeur en cliquant sur ce lien.</li>

              <h3 style="text-align: center;">Important pour Acheteur</h3>
             <li class="list">Concernant l'acheteur une fois la commande est effectuée vous devez attendre jusqu'à ce que le vendeur consulte ses commandes meme si cela pourra prendre un peu de temps .</li>
             <li class="list">Vous n'avez pas le droit de demander plus de ce que le vendeur en a mis pour le produit.</li>
             

            </div>
          </ul>
        </div>
        <div class="modal-footer">
         <a href ="adduser.php" class="btn btn-primary"> Je M'Inscris</button>
          <a href="login.php" class="btn btn-success">Je Me Connecte</a>
        </div>
      </div>

    </div>
  </div>
</div>
<style>
  .titre{
    font-size: xx-large;
    margin-top: 35px;
  }
  #list{
    list-style-type:disc;
    padding: 14px 35px;
  }
  @media screen and (max-width:601px){
    #list{
      padding: 14px 0px;
    }
    .regle{
      margin-left: 20px;
    }
  }
  .gras{
    font-weight: 700;
    margin-bottom: 15px;
  }
  .gras:first-letter{
    margin-left: 10px;
  }

  @media screen and (min-width:601px){
    .regle{
      margin-left: 40px;
    }
  }
  .regle li{
    margin-bottom: 10px;
  }

  </style> 


<div class="modal fade" id="mymodal4">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        <div class="titre">
     
          <h3 style="text-align: center;"> <i class="fa fa-user" hidden="true" > Mes Statistiques</i></h3>

        </div>
      </div>
      <div class="modal-body">

        <ul id="list">
          <div class="regle">
            <li class="gras"  style="list-style-type: disc;"> lles d'utilisateur du site :
             <?php try{
        

              $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
              $pdo=new PDO($dsn,$username,$password,$pdo_options);
              $sql ="SELECT *FROM users";
              $res = $pdo-> prepare($sql);
              $res ->execute(array());
              @$check = count($res->fetchAll());
              echo "$check";
            }catch(Exception $e){
              http_response_code(500);
              echo "Erreur de serveur.";
              exit();
            } 
            
            ?></li>
            <li class="gras"  style="list-style-type: disc;"> le nombre total de produit :
             <?php try{
        

              $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
              $pdo=new PDO($dsn,$username,$password,$pdo_options);
              $sql ="SELECT *FROM produits ";
              $res = $pdo-> prepare($sql);
              $res ->execute(array());
              @$check = count($res->fetchAll());
              echo "$check";
            }catch(Exception $e){
              http_response_code(500);
              echo "Erreur de serveur.";
              exit();
            } 
            
            ?></li>
            <li  class="gras"  style="list-style-type: disc;">
              le Nombre De produits  refusées:

              <?php try{
                $stat="refusee";

                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $pdo=new PDO($dsn,$username,$password,$pdo_options);
                $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE  commande.statut = ?";
                $res = $pdo-> prepare($sql);
                $res ->execute(array($stat));
                @$check1 = count($res->fetchAll());
                echo "$check1";
              }catch(Exception $e){
                http_response_code(500);
                echo "Erreur de serveur.";
                exit();
              } 
              ?></li>
              <li  class="gras"  style="list-style-type: disc;">
              le Nombre De produits  acceptées :
              <?php try{
                $stat="acceptee";

                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $pdo=new PDO($dsn,$username,$password,$pdo_options);
                $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE  commande.statut = ?";
                $res = $pdo-> prepare($sql);
                $res ->execute(array($stat));
                @$check1 = count($res->fetchAll());
                echo "$check1";
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

          <a href="index.php" class="btn btn-success">Revenir à L'Accueil</a>
          <a href="login.php" class="btn btn-primary">Se Connecter</a>
        </div>
      </div>

    </div>
  </div>
</div>